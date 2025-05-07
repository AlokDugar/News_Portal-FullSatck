<?php

use App\Http\Controllers\Api\V1\Admin\AdvertisementApiController;
use App\Http\Controllers\Api\V1\Admin\NewsApiController;
use App\Http\Controllers\Api\V1\Admin\NewsCategoryApiController;
use App\Http\Controllers\Api\V1\Admin\SettingsApiController;
use App\Http\Controllers\Api\V1\Admin\TypeApiController;
use App\Http\Controllers\Api\V1\Admin\SearchApiController;
use App\Http\Controllers\Api\V1\Admin\VideoGalleryApiController;
use App\Http\Controllers\Api\V1\Admin\ContactInfoApiController;
use App\Http\Controllers\Api\V1\Admin\ContactListApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group(['prefix' => 'v1', 'as' => 'api.'], function () {
    Route::apiResource('news', NewsApiController::class);
    Route::apiResource('news-category', NewsCategoryApiController::class);
    Route::apiResource('news-type', TypeApiController::class);
    Route::apiResource('ads', AdvertisementApiController::class);
    Route::apiResource('settings', SettingsApiController::class);
    Route::apiResource('search', SearchApiController::class);
    Route::apiResource('video-gallery', VideoGalleryApiController::class);
    Route::apiResource('contact-infos', ContactInfoApiController::class);
    Route::apiResource('contact-lists', ContactListApiController::class);
});


