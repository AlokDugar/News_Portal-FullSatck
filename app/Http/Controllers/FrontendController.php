<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\AdvertisementType;
use App\Models\ContactInfo;
use App\Models\NewsCategory;
use App\Models\NewsDetails;
use App\Models\Setting;
use App\Models\Type;
use App\Models\VideoGallery;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $typeId = Type::where('name', 'breaking')->value('id');
        $breakings = NewsDetails::where('type_id', $typeId)->where('state', 'published')->get();
        $adTypeId = AdvertisementType::where('type', 'banner-top ads')->value('id');
        $topBannerAd = Advertisement::where('type_id', $adTypeId)->where('status', 'Active')->latest()->first();
        $categories = NewsCategory::where('status','Active')->get();
        $recentArticles = NewsDetails::latest()->take(4)->get();
        $adTypeId = AdvertisementType::where('type', 'banner-middle ads')->value('id');
        $middleBannerAd = Advertisement::where('type_id', $adTypeId)->where('status', 'Active')->latest()->first();
        $adTypeId = AdvertisementType::where('type', 'native-side ads')->value('id');
        $sideBarAd = Advertisement::where('type_id', $adTypeId)->where('status', 'Active')->latest()->first();
        $typeId = Type::where('name', 'trending')->value('id');
        $trendingNews = NewsDetails::where('type_id', $typeId)->where('state', 'published')->get();
        $adTypeId = AdvertisementType::where('type', 'banner-bottom ads')->value('id');
        $bottomBannerAd = Advertisement::where('type_id', $adTypeId)->where('status', 'Active')->latest()->first();
        $videos=VideoGallery::where('status','Active')->get();
        $categoryArticles = [];
        $randomCategories = NewsCategory::where('status', 'Active')->inRandomOrder()->take(3)->get();
        foreach ($randomCategories as $category) {
            $articles = NewsDetails::where('state', 'Published')
                ->whereHas('categories', function ($q) use ($category) {
                    $q->where('news_categories.id', $category->id);
                })
                ->latest()
                ->take(3)
                ->get();
            if ($articles->count() > 0) {
                $categoryArticles[] = [
                    'category' => $category,
                    'articles' => $articles,
                ];
            }
        }
        $heroSliderArticles = NewsDetails::where('state', 'Published')->whereNotNull('image_path')->where('image_path', '!=', '')->inRandomOrder()->take(5)->get();
        $popularPosts = NewsDetails::where('state', 'Published')->orderByDesc('views')->take(3)->get();
        return view('frontend.home', compact(['breakings','topBannerAd','categories','recentArticles','middleBannerAd','sideBarAd','trendingNews','bottomBannerAd','videos','categoryArticles','heroSliderArticles','popularPosts']));
    }
    public function contact()
    {
        $typeId = Type::where('name', 'breaking')->value('id');
        $breakings = NewsDetails::where('type_id', $typeId)->where('state', 'published')->get();
        $adTypeId = AdvertisementType::where('type', 'banner-top ads')->value('id');
        $topBannerAd = Advertisement::where('type_id', $adTypeId)->where('status', 'Active')->latest()->first();
        $categories = NewsCategory::where('status','Active')->get();
        $contact= ContactInfo::first();
        return view('frontend.contact', compact(['breakings','topBannerAd','categories','contact']));
    }
    public function category_news($categoryName)
    {
        $categoryName = urldecode($categoryName);
        $typeId = Type::where('name', 'breaking')->value('id');
        $breakings = NewsDetails::where('type_id', $typeId)->where('state', 'published')->get();
        $categories = NewsCategory::where('status','Active')->get();
        $adTypeId = AdvertisementType::where('type', 'banner-top ads')->value('id');
        $topBannerAd = Advertisement::where('type_id', $adTypeId)->where('status', 'Active')->latest()->first();
        $query = NewsDetails::query();
        $articles = $query->where('state','Published')->whereHas('categories', function($q) use ($categoryName) {
                $q->where('name', 'like', '%' . $categoryName . '%');
        })->get();
        return view('frontend.news', compact(['breakings', 'topBannerAd', 'categories', 'articles']));
    }
    public function blog_details($id)
    {
        $typeId = Type::where('name', 'breaking')->value('id');
        $breakings = NewsDetails::where('type_id', $typeId)->where('state', 'published')->get();
        $adTypeId = AdvertisementType::where('type', 'banner-top ads')->value('id');
        $topBannerAd = Advertisement::where('type_id', $adTypeId)->where('status', 'Active')->latest()->first();
        $categories = NewsCategory::where('status','Active')->get();
        $article = NewsDetails::find($id);
        if ($article) {
            $article->increment('views');
        }
        $popularPosts = NewsDetails::where('state', 'Published')->orderByDesc('views')->take(3)->get();
        return view('frontend.blog-details', compact(['breakings','topBannerAd','categories','article','popularPosts']));
    }

    public function search_news($title)
    {
        $title = urldecode($title);
        $typeId = Type::where('name', 'breaking')->value('id');
        $breakings = NewsDetails::where('type_id', $typeId)->where('state', 'published')->get();
        $categories = NewsCategory::where('status','Active')->get();
        $adTypeId = AdvertisementType::where('type', 'banner-top ads')->value('id');
        $topBannerAd = Advertisement::where('type_id', $adTypeId)->where('status', 'Active')->latest()->first();
        $query = NewsDetails::query();
        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
        }
        $articles = $query->where('state', 'Published')->get();
        return view('frontend.news', compact(['breakings', 'topBannerAd', 'categories', 'articles']));
    }
    public function type_news($type)
    {
        $type = urldecode($type);
        $typeId = Type::where('name', 'breaking')->value('id');
        $breakings = NewsDetails::where('type_id', $typeId)->where('state', 'published')->get();
        $categories = NewsCategory::where('status','Active')->get();
        $adTypeId = AdvertisementType::where('type', 'banner-top ads')->value('id');
        $topBannerAd = Advertisement::where('type_id', $adTypeId)->where('status', 'Active')->latest()->first();
        $query = NewsDetails::query();
        if($type==='all'){
            $articles = NewsDetails::latest()->get();
        }
        else{
            $articles = NewsDetails::where('state', 'published')->whereHas('type', function($q) use ($type) {
                $q->where('name', 'like', '%' . $type . '%');
            })->get();
        }
        return view('frontend.news', compact(['breakings', 'topBannerAd', 'categories', 'articles']));
    }
    public function author()
    {
        $typeId = Type::where('name', 'breaking')->value('id');
        $breakings = NewsDetails::where('type_id', $typeId)->where('state', 'published')->get();
        $adTypeId = AdvertisementType::where('type', 'banner-top ads')->value('id');
        $topBannerAd = Advertisement::where('type_id', $adTypeId)->where('status', 'Active')->latest()->first();
        $categories = NewsCategory::where('status','Active')->get();
        $contact= ContactInfo::first();
        return view('frontend.author', compact(['breakings','topBannerAd','categories','contact']));
    }
    public function video()
    {
        $typeId = Type::where('name', 'breaking')->value('id');
        $breakings = NewsDetails::where('type_id', $typeId)->where('state', 'published')->get();
        $categories = NewsCategory::where('status','Active')->get();
        $adTypeId = AdvertisementType::where('type', 'banner-top ads')->value('id');
        $topBannerAd = Advertisement::where('type_id', $adTypeId)->where('status', 'Active')->latest()->first();
        $videos= VideoGallery::where('status','Active')->get();
        return view('frontend.video-news', compact(['breakings', 'topBannerAd', 'categories', 'videos']));
    }
}
