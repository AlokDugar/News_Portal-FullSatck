<?php

namespace App\Http\Controllers\Admin;

use App\Models\Advertisement;
use App\Models\NewsCategory;
use App\Models\NewsDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactList;

class HomeController extends Controller
{
    public function index(){
        $categoriesCount=NewsCategory::count();
        $categories = NewsCategory::withCount('news')
        ->orderByDesc('news_count')
        ->get();
        $ads=Advertisement::all();
        $activeAds=Advertisement::where('status','Active')->count();
        $totalArticles = NewsDetails::count();
        $publishedArticles = NewsDetails::where('state', 'Published')->count();
        $unpublishedArticles = NewsDetails::where('state', 'Unpublished')->count();
        $recentArticles = NewsDetails::latest()->take(5)->get();
        $newInquiries = ContactList::where('is_read', false)->count();
        //dd($newInquiries);
        if ($newInquiries > 0) {
            session()->flash('new_inquiries', $newInquiries);
        }

        return view('dashboard.index', compact('totalArticles','ads','recentArticles', 'categoriesCount','categories','activeAds','publishedArticles', 'unpublishedArticles'));
    }
}
