<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Social;
use Illuminate\Http\JsonResponse;

class SocialsApiController extends Controller
{
    public function index(): JsonResponse
    {
        $socials = Social::all();
        return response()->json([
            'data' => $socials
        ]);
    }
}
