<?php

namespace App\Http\Controllers\Admin;

use App\Models\NewsCategory;
use App\Models\NewsDetails;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsDetails=NewsDetails::all();
        return view('dashboard.news.news_details',compact('newsDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats=NewsCategory::all();
        $types=Type::all();
        return view('dashboard.news.news_create',compact('cats', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'image_path' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
                'category_ids' => 'required|array',
                'category_ids.*' => 'exists:news_categories,id',
                'type_id' => 'nullable|exists:types,id',
                'author' => 'nullable|string|max:255',
                'publisher' => 'nullable|string|max:255',
                'state' => 'required|string|in:Published,Unpublished',
                'published_date' => 'nullable|date|before:today',
                'content' => 'required|string',
            ]);
            Log::info('Request validated successfully.', ['validated_data' => $data]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed.', ['error' => $e->errors()]);
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        try {
            $news = new NewsDetails();
            $news->title = $request->input('title');
            $news->author = $request->input('author');
            $news->publisher = $request->input('publisher');
            $news->state = $request->input('state');
            $news->content = $request->input('content');
            $news->type_id = $request->input('type_id');
            $news->published_date = $request->input('published_date');
            $news->created_at = now();
            $news->updated_at = now();
            $news->save();
            Log::info('News article created successfully.', ['news_id' => $news->id]);
        } catch (\Exception $e) {
            Log::error('News article creation failed.', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to create news article.');
        }

        if ($request->hasFile('image_path')) {
            try {
                $file = $request->file('image_path');

                $randomNumber = rand(1000, 9999);
                $extension = $file->getClientOriginalExtension();
                $fileName = 'news_image_' . $news->id . '_' . $randomNumber . '.' . $extension;

                $imagePath = $file->storeAs('news_images', $fileName, 'public');

                $news->update(['image_path' => $imagePath]);

                Log::info('Image uploaded successfully.', ['image_path' => $imagePath]);
            } catch (\Exception $e) {
                Log::error('Image upload failed.', ['error' => $e->getMessage()]);
                return redirect()->back()->with('error', 'Failed to upload image.');
            }
        } else {
            Log::info('No image uploaded.');
        }

        try {
            $news->categories()->sync($request->input('category_ids', []));
            Log::info('Categories synced successfully.', ['categories' => $request->input('category_ids')]);
        } catch (\Exception $e) {
            Log::error('Category syncing failed.', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to sync categories.');
        }

        Log::info('News article created successfully. Redirecting to previous page.');
        return redirect()->route('news.index')->with('success', 'News article created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->query('id');
        $cats=NewsCategory::all();
        $types=Type::all();
        $newsDetails=NewsDetails::findOrFail($id);
        return view('dashboard.news.news_edit',compact('newsDetails','cats', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $news = NewsDetails::findOrFail($id);
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'image_path' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
                'category_ids' => 'required|array',
                'category_ids.*' => 'exists:news_categories,id',
                'type_id' => 'nullable|exists:types,id',
                'author' => 'nullable|string|max:255',
                'publisher' => 'nullable|string|max:255',
                'state' => 'required|string|in:Published,Unpublished',
                'content' => 'required|string',
                'published_date' => 'nullable|date|before:today',
                'remove_image' => 'nullable|boolean',
            ]);
            Log::info('Request validated successfully.', ['validated_data' => $data]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed.', ['error' => $e->errors()]);
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        if ($request->input('remove_image')) {
            try {
                if ($news->image_path && Storage::disk('public')->exists($news->image_path)) {
                    Storage::disk('public')->delete($news->image_path);
                }

                $data['image_path'] = null;

                Log::info('Image removed successfully.');
            } catch (\Exception $e) {
                Log::error('Image removal failed.', ['error' => $e->getMessage()]);
                return redirect()->back()->with('error', 'Failed to remove image.');
            }
        } elseif ($request->hasFile('image_path')) {
            try {
                if ($news->image_path && Storage::disk('public')->exists($news->image_path)) {
                    Storage::disk('public')->delete($news->image_path);
                }

                $file = $request->file('image_path');

                $randomNumber = rand(1000, 9999);
                $extension = $file->getClientOriginalExtension();
                $fileName = 'news_image_'. $id .'_'. $randomNumber . '.' . $extension;

                $data['image_path'] = $file->storeAs('news_images', $fileName, 'public');

                Log::info('Image updated successfully.', ['image_path' => $data['image_path']]);
            } catch (\Exception $e) {
                Log::error('Image upload failed.', ['error' => $e->getMessage()]);
                return redirect()->back()->with('error', 'Failed to upload image.');
            }
        } else {
            $data['image_path'] = $news->image_path;
        }

        try {
            $news->published_date = $request->input('published_date');
            $news->update($data);
            Log::info('News article updated successfully.', ['news_id' => $news->id]);
        } catch (\Exception $e) {
            Log::error('News article update failed.', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to update news article.');
        }

        try {
            $news->categories()->sync($request->input('category_ids', []));
            Log::info('Categories synced successfully.', ['categories' => $request->input('category_ids')]);
        } catch (\Exception $e) {
            Log::error('Category syncing failed.', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to sync categories.');
        }

        return redirect()->route('news.index')->with('success', 'News article updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = NewsDetails::findOrFail($id);
        $news->delete();

        return redirect()->back()->with('success', 'Article deleted successfully!');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->
                getClientOriginalExtension();

            $fileName = $fileName .'_'.time() . '.' . $extension;
            $request->file('upload')->move (public_path('media'), $fileName);
            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1,'url' => $url]);
        }
    }

    public function updateStatus(Request $request)
    {
        try {

            $request->validate([
                'news_id' => 'required|exists:news_details,id',
                'status' => 'required|in:Published,Unpublished',
            ]);

            $news = NewsDetails::find($request->news_id);

            $news->state = $request->status;
            $news->save();

            return redirect()->back()->with('success', 'Status updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the status.');
        }
    }
}

