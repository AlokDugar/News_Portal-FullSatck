<?php

namespace App\Http\Controllers\Admin;

use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoGalleryController extends Controller
{
    public function index()
    {
        $videoGalleries=VideoGallery::all();
        return view('dashboard.video.video_gallery',compact('videoGalleries'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'url' => 'nullable|string',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        VideoGallery::create([
            'title' => $request->title,
            'url' => $request->url,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Video Gallery created successfully!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'nullable|string',
            'url' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        $gallery = VideoGallery::findOrFail($id);
        $gallery->title = $request->title;
        $gallery->url = $request->url;
        $gallery->status = $request->status;
        $gallery->save();

        return redirect()->back()->with('success', 'Video Gallery updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gallery = VideoGallery::findOrFail($id);
        $gallery->delete();

        return redirect()->back()->with('success', 'Video Gallery deleted successfully!');
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'gallery_id' => 'required|exists:news_categories,id',
            'status' => 'required|in:Active,Inactive',
        ]);

        $gallery = VideoGallery::find($request->gallery_id);
        $gallery->status = $request->status;
        $gallery->save();

        return redirect()->back()->with('success', 'Status updated successfully!');
    }
}
