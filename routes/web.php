<?php

use App\Http\Controllers\Admin\AdvertisementTypeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\VideoGalleryController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\Admin\ContactListController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontendController::class,'home'])->name('home');
Route::get('/contact',[FrontendController::class,'contact'])->name('contact');
Route::get('/author',[FrontendController::class,'author'])->name('author');
Route::get('/news/{category}',[FrontendController::class,'category_news'])->name('category_news');
Route::get('/type-news/{type}',[FrontendController::class,'type_news'])->name('type_news');
Route::get('/search-news/{title}', [FrontendController::class, 'search_news'])->name('search_news');
Route::get('/blog/{id}',[FrontendController::class,'blog_details'])->name('blog-details');
Route::get('/video-news',[FrontendController::class,'video'])->name('video-news');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/admin/check-old-password', [ProfileController::class, 'checkOldPassword'])->name('profile.checkOldPassword');
    Route::put('/profile/socials', [ProfileController::class, 'updateSocials'])->name('profile.updateSocials');

    Route::resource('categories',NewsCategoryController::class);
    Route::resource('types',TypeController::class);
    Route::resource('ads',AdvertisementController::class);
    Route::resource('adTypes',AdvertisementTypeController::class);
    Route::resource('news',NewsController::class);
    Route::resource('video-galleries',VideoGalleryController::class);
    Route::resource('contact-infos',ContactInfoController::class);
    Route::resource('contact-lists',ContactListController::class);

    Route::post('/categories-update-status',[NewsCategoryController::class,'updateStatus'])->name('categories.updateStatus');
    Route::post('/ads-update-status',[AdvertisementController::class,'updateStatus'])->name('ads.updateStatus');
    Route::post('/video-galleries-update-status',[VideoGalleryController::class,'updateStatus'])->name('video-galleries.updateStatus');
    Route::post('/news-update-status',[NewsController::class,'updateStatus'])->name('news.updateStatus');

    Route::post('/news/upload-image', [NewsController::class,'upload'])->name('news.upload');
    Route::get('/news-create', [NewsController::class,'create'])->name('news.create');
    Route::get('/news-edit', [NewsController::class,'edit'])->name('news.edit');

    Route::get('/settings',[SettingsController::class,'index'])->name('settings');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');

    Route::post('/contact-lists/{id}/mark-seen', [ContactListController::class, 'markSeen'])->name('contact-lists.mark-seen');
});

require __DIR__.'/auth.php';
