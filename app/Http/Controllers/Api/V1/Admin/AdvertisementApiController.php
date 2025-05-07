<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertisementResource;

class AdvertisementApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {

        $ads = Advertisement::with('advertisementType')
        ->where('status', 'Active')
        ->latest()
        ->get();

        return AdvertisementResource::collection($ads)->response();
    }

/*
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'type_id' => 'required|string',
            'details' => 'nullable|mimes:jpeg,png,jpg,gif,mp4,mov,avi',
            'image_url' => 'nullable|url',
            'url' => 'required|string',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        $imagePath = null;
        if ($request->hasFile('details')) {
            $imagePath = $request->file('details')->store('advertisements', 'public');
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        }

        if (!$imagePath) {
            return response()->json(['message' => 'Please provide an image file or a valid image URL.'], 400);
        }

        $ad = Advertisement::create([
            'type_id' => $validated['type_id'],
            'details' => $imagePath,
            'url' => $validated['url'],
            'status' => $validated['status'],
        ]);

        return response()->json(['message' => 'Advertisement created successfully!', 'advertisement' => $ad], 201);
    }

    public function show($id): JsonResponse
    {
        $ad = Advertisement::find($id);
        if (!$ad) {
            return response()->json(['message' => 'Advertisement not found'], 404);
        }
        return response()->json(['advertisement' => $ad], 200);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $ad = Advertisement::find($id);
        if (!$ad) {
            return response()->json(['message' => 'Advertisement not found'], 404);
        }

        $validated = $request->validate([
            'type_id' => 'required|string',
            'details' => 'nullable|mimes:jpeg,png,jpg,gif,mp4,mov,avi',
            'image_url' => 'nullable|url',
            'url' => 'required|string',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        $imagePath = $ad->details;
        if ($request->hasFile('details')) {
            $imagePath = $request->file('details')->store('advertisements', 'public');
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        }

        $ad->update([
            'type_id' => $validated['type_id'],
            'details' => $imagePath,
            'url' => $validated['url'],
            'status' => $validated['status'],
        ]);

        return response()->json(['message' => 'Advertisement updated successfully!', 'advertisement' => $ad], 200);
    }

    public function destroy($id): JsonResponse
    {
        $ad = Advertisement::find($id);
        if (!$ad) {
            return response()->json(['message' => 'Advertisement not found'], 404);
        }
        $ad->delete();
        return response()->json(['message' => 'Advertisement deleted successfully!'], 200);
    }
*/
}
