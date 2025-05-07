<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\ContactInfo;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContactInfoResource;

class ContactInfoApiController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $contactInfos= ContactInfo::all();
        return ContactInfoResource::collection($contactInfos)->response();
    }
}
