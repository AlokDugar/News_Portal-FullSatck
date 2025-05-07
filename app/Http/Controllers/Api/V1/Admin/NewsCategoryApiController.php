<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewsCategoryResource;

class NewsCategoryApiController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $categories = NewsCategory::where('status','Active')->get();
        return NewsCategoryResource::collection($categories)->response();
    }
/*
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'url' => 'required|string',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        $category = NewsCategory::create($validated);

        return response()->json(['message' => 'Category created successfully!', 'category' => $category], 201);
    }

    public function show($id): JsonResponse
    {
        $category = NewsCategory::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json(['category' => $category], 200);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $category = NewsCategory::find($id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string',
            'url' => 'required|string',
            'status' => 'required|in:Active,Inactive',
        ]);{{  }}

        $category->update($validated);

        return response()->json(['message' => 'Category updated successfully!', 'category' => $category], 200);
    }

    public function destroy($id): JsonResponse
    {
        $category = NewsCategory::find($id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->delete();
        return response()->json(['message' => 'Category deleted successfully!'], 200);
    }
*/
}
