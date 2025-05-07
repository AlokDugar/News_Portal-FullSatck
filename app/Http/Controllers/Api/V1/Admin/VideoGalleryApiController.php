<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\VideoGalleryResource;

class VideoGalleryApiController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $galleries= VideoGallery::where('status','Active')->get();
        return VideoGalleryResource::collection($galleries)->response();
    }
}
