<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;

class SettingsApiController extends Controller
{
    public function index(){
        $settings = Setting::first();
        return (new SettingResource($settings))->response();
    }

}

