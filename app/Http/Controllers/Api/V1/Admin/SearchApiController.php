<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\NewsDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;

class SearchApiController extends Controller
{
    public function index(Request $request)
    {
        $query = NewsDetails::query();

        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->has('category')) {
            $categories = $request->category;

            $query->whereHas('categories', function($q) use ($categories) {
                foreach ($categories as $category) {
                    $q->where('name', 'like', '%' . $category . '%');
                }
            });
        }

        if ($request->has('type')) {
            $query->whereHas('type', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->type . '%');
            });
        }

        $news = $query->get();

        return NewsResource::collection($news)->response();
    }
}
