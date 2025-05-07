<?php

namespace App\Http\Controllers\Admin;

use App\Models\Advertisement;
use App\Models\AdvertisementType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads=Advertisement::all();
        $adTypes=AdvertisementType::all();
        return view('dashboard.advertisement.advertisements',compact('ads'));
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
            'type_id' => 'required|string',
            'details'   => 'nullable|mimes:jpeg,png,jpg,gif,mp4,mov,avi',
            'image_url' => 'nullable|url',
            'url' => 'nullable|string',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        $imagePath=null;

        if ($request->hasFile('details')) {

            $randomNumber = rand(1000, 9999);

            $extension = $request->file('details')->getClientOriginalExtension();

            $fileName = 'AD_' . $randomNumber . '.' . $extension;

            $imagePath = $request->file('details')->storeAs('advertisements', $fileName, 'public');
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        }

        if (!$imagePath) {
            return redirect()->back()->with('error', 'Please provide an image file or a valid image URL.');
        }

        Advertisement::create([
            'type_id' => $request->type_id,
            'details' => $imagePath,
            'url' => $request->url,
            'status' => $request->status,
        ]);

        return redirect()->route('ads.index')->with('success', 'Advertisement created successfully!');

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type_id' => 'required|string',
            'details' => 'nullable|mimes:jpeg,png,jpg,gif,mp4,mov,avi',
            'image_url' => 'nullable|url',
            'url' => 'nullable|string',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        $imagePath = null;

        $ad = Advertisement::find($id);

        if (!$ad) {
            return redirect()->back()->with('error', 'Advertisement not found.');
        }

        if ($request->hasFile('details')) {
            try {
                if ($ad->details && Storage::disk('public')->exists($ad->details)) {
                    Storage::disk('public')->delete($ad->details);
                }
                $file = $request->file('details');
                $randomNumber = rand(1000, 9999);
                $extension = $file->getClientOriginalExtension();
                $fileName = 'AD_' . $id . '_' . $randomNumber . '.' . $extension;
                $imagePath = $file->storeAs('advertisements', $fileName, 'public');
            } catch (\Exception $e) {
                Log::error('File upload failed.', ['error' => $e->getMessage()]);
                return redirect()->back()->with('error', 'Failed to upload file.');
            }
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        } else {
            $imagePath = $ad->details;
        }
        $ad->type_id = $request->type_id;
        $ad->details = $imagePath;
        $ad->url = $request->url;
        $ad->status = $request->status;
        $ad->save();
        return redirect()->route('ads.index')->with('success', 'Advertisement updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ad = Advertisement::findOrFail($id);
        if ($ad->details){
            Storage::disk('public')->delete($ad->details);
        }
        $ad->delete();

        return redirect()->route('ads.index')->with('success', 'Advertisement deleted successfully!');
    }
    public function updateStatus(Request $request)
    {
        Log::info('Updating advertisement status', ['request' => $request->all()]);

        try {
            $request->validate([
                'ad_id' => 'required|exists:advertisements,id',
                'status' => 'required|in:Active,Inactive',
            ]);

            Log::info('Request validated successfully.');
            $ad = Advertisement::find($request->ad_id);

            if (!$ad) {
                Log::error('Advertisement not found', ['ad_id' => $request->ad_id]);
                return redirect()->back()->with('error', 'Advertisement not found.');
            }

            Log::info('Advertisement found, updating status.', ['ad_id' => $ad->id]);

            $ad->status = $request->status;
            $ad->save();

            Log::info('Status updated successfully.', ['ad_id' => $ad->id, 'status' => $request->status]);

            return redirect()->back()->with('success', 'Status updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating status', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);

            return redirect()->back()->with('error', 'An error occurred while updating the status.');
        }
    }
}
