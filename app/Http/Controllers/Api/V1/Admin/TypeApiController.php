<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;

class TypeApiController extends Controller
{

    public function index()
    {
        $types = Type::all();
        return response()->json(['types' => $types]);
    }

}
