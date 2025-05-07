<?php
    use Carbon\Carbon;
?>
@extends('layouts.app')
@section('content')
    <main>
        <section class="hero-slider-wrap p-0">
            <div class="featured-slider-2">
                <div class="featured-slider-2-items">
                    @foreach($heroSliderArticles as $article)
                        <div class="slider-single">
                            <div class="post-thumb position-relative">
                                <div class="thumb-overlay position-relative">
                                    <img src="{{ asset('storage/'.$article->image_path) }}" >
                                    <div class="post-content-overlay">
                                        <div class="container">
                                            <div class="entry-meta meta-0 mb-20">
                                                @foreach($article->categories as $cat)
                                                    <a href="{{route('category_news', ['category' => $cat->name])}}"><span class="post-cat post-tag text-uppercase {{ $loop->first ? 'ts' : 'bg-warning' }}">{{ $cat->name }}</span></a>
                                                @endforeach
                                            </div>
                                            <h1 class="post-title mb-20 font-weight-900 text-white">
                                                <a class="text-white line-links" href="{{ route('blog-details', $article->id) }}">{{ $article->title }}</a>
                                            </h1>
                                            <div class="entry-meta meta-1 font-12 text-white mt-10 pr-5 pl-5">
                                                <span class="post-on">{{  $article->published_date?Carbon::parse($article->published_date)->format('d F Y'):'N/A'}}</span>
                                                <span class="hit-count has-dot">{{ $article->views??0 }} Views</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="container position-relative">
                    <div class="arrow-cover color-white"></div>
                    <div class="featured-slider-2-nav-cover">
                        <div class="featured-slider-2-nav">
                            @foreach($heroSliderArticles as $article)
                                <div class="slider-post-thumb mr-15 mt-20 position-relative">
                                    <div class="d-flex hover-up-2 transition-normal">
                                        <div class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5">
                                            <img class="border-radius-5" src="{{ asset('storage/'.$article->image_path) }}" >
                                        </div>
                                        <div class="post-content media-body">
                                            <h5 class="post-title mb-15 text-limit-2-row text-white">{{ $article->title }}</h5>
                                            <div class="entry-meta meta-1 float-left font-10 text-uppercase">
                                                <span class="post-on text-white">{{ $article->published_date?Carbon::parse($article->published_date)->format('d M'):'N/A' }}</span>
                                                <span class="post-by has-dot text-white">{{ $article->views??0 }} views</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- trending-post-area -->
        <section class="trending-post-area pt-60 pb-60">
            <div class="container">
                <div class="trending-post-inner">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="recent-post-wrap">
                                <div class="section-title-wrap mb-30">
                                    <div class="section-title">
                                        <h2 class="title">Recent Posts</h2>
                                    </div>
                                    <div class="view-all-btn">
                                        <a href="{{ route('category_news',['category'=>'all']) }}" class="link-btn">View All
                                            <span class="svg-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10" fill="none">
                                                    <path d="M1.07692 10L0 8.92308L7.38462 1.53846H0.769231V0H10V9.23077H8.46154V2.61538L1.07692 10Z" fill="currentColor"/>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="section-title-line"></div>
                                </div>
                                <div class="row">
                                    @foreach($recentArticles as $index => $article)
                                        @if ($index == 0)
                                            <div class="col-lg-6 col-md-12">
                                                <div class="overlay-post-two">
                                                    <div class="overlay-post-thumb">
                                                        <a href="{{ route('blog-details', $article->id) }}">
                                                            <img src="{{ $article->image_path ? asset('storage/' . $article->image_path) : asset('assets/images/no-image.jpg') }}"  >
                                                        </a>
                                                    </div>
                                                    <div class="overlay-post-content">
                                                        @foreach ($article->categories as $category)
                                                            <a href="{{ route('category_news', ['category' => $category->name]) }}" class="post-tag">{{ $category->name }}</a>
                                                        @endforeach
                                                        <h2 class="post-title">
                                                            <a href="{{ route('blog-details', $article->id) }}">{{ $article->title }}</a>
                                                        </h2>
                                                        <div class="blog-post-meta white-blog-meta">
                                                            <ul class="list-wrap">
                                                                @if($article->author)
                                                                    <li><i class="ri-account-circle-line"></i>by <a href="#">{{ $article->author ?? 'Admin' }}</a></li>
                                                                @endif
                                                                @if($article->published_date)
                                                                    <li><i class="ri-calendar-line"></i>{{ Carbon::parse($article->published_date)->format('d F, Y') }}
                                                                @endif
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                        @elseif ($index > 0)
                                            <div class="horizontal-post-two">
                                                <div class="horizontal-post-thumb">
                                                    <a href="{{ route('blog-details', $article->id) }}">
                                                        <img src="{{ $article->image_path ? asset('storage/' . $article->image_path) : asset('assets/images/no-image.jpg') }}"  >
                                                    </a>
                                                </div>
                                                <div class="horizontal-post-content">
                                                    @foreach ($article->categories as $category)
                                                        <a href="{{ route('category_news', ['category' => $category->name]) }}" class="post-tag">{{ $category->name }}</a>
                                                    @endforeach
                                                    <h2 class="post-title">
                                                        <a href="{{ route('blog-details', $article->id) }}">{{ $article->title }}</a>
                                                    </h2>
                                                    <div class="blog-post-meta">
                                                        <ul class="list-wrap">
                                                            @if($article->published_date)
                                                                <li><i class="ri-calendar-line"></i>{{ Carbon::parse($article->published_date)->format('d F, Y') }}
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($index == count($recentArticles) - 1)
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="ad-banner-img ad-banner-img-two text-center">
                                <a href="{{$middleBannerAd->url}}"><img src="{{ asset('storage/'.$middleBannerAd->details) }}" /></a>
                            </div>
                            <div class="trending-post-wrap">
                                <div class="section-title-wrap mb-30">
                                    <div class="section-title">
                                        <h2 class="title">Trending News</h2>
                                    </div>
                                    <div class="view-all-btn">
                                        <a href="blog.html" class="link-btn">View All
                                            <span class="svg-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10" fill="none">
                                                    <path d="M1.07692 10L0 8.92308L7.38462 1.53846H0.769231V0H10V9.23077H8.46154V2.61538L1.07692 10Z" fill="currentColor" />
                                                    <path d="M1.07692 10L0 8.92308L7.38462 1.53846H0.769231V0H10V9.23077H8.46154V2.61538L1.07692 10Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="section-title-line"></div>
                                </div>
                                <div class="row justify-content-center">
                                    @foreach ($trendingNews as $index => $article)
                                        @if ($index === 0)
                                            <div class="col-lg-12">
                                                <div class="trending-post">
                                                    <div class="trending-post-thumb">
                                                        <a href="{{ route('blog-details', $article->id) }}">
                                                            <img src="{{ $article->image_path ? asset('storage/' . $article->image_path) : asset('assets/images/no-image.jpg') }}"  >
                                                        </a>
                                                    </div>
                                                    <div class="trending-post-content">
                                                        @foreach ($article->categories as $category)
                                                            <a href="{{ route('category_news', ['category' => $category->name]) }}" class="post-tag">{{ $category->name }}</a>
                                                        @endforeach
                                                        <h2 class="post-title bold-underline">
                                                            <a href="{{ route('blog-details', $article->id) }}">{{ $article->title }}</a>
                                                        </h2>
                                                        <div class="blog-post-meta">
                                                            <ul class="list-wrap">
                                                                @if($article->author)
                                                                    <li><i class="ri-account-circle-line"></i>by <a href="#">{{ $article->author ?? 'Admin' }}</a></li>
                                                                @endif
                                                                @if($article->published_date)
                                                                    <li><i class="ri-calendar-line"></i>{{ Carbon::parse($article->published_date)->format('d F, Y') }}
                                                                @endif
                                                                <li><i class="ri-history-line"></i> {{ ceil(count(preg_split('/\s+/', strip_tags($article->content), -1, PREG_SPLIT_NO_EMPTY)) / 200) }} Mins</li>
                                                            </ul>
                                                        </div>
                                                        <p>{{ Str::limit(strip_tags($article->content), 200) }}</p>
                                                        <div class="view-all-btn">
                                                            <a href="{{ route('blog-details', $article->id) }}" class="link-btn">Read More
                                                                <span class="svg-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10" fill="none">
                                                                        <path d="M1.07692 10L0 8.92308L7.38462 1.53846H0.769231V0H10V9.23077H8.46154V2.61538L1.07692 10Z" fill="currentColor" />
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-lg-4 col-md-6">
                                                <div class="trending-post-two">
                                                    <div class="trending-post-thumb-two">
                                                        <a href="{{ route('blog-details', $article->id) }}">
                                                            <img src="{{ $article->image_path ? asset('storage/' . $article->image_path) : asset('assets/images/no-image.jpg') }}"  >
                                                        </a>
                                                        <div class="tag-wrapper">
                                                            @foreach ($article->categories as $category)
                                                                <a href="{{ route('category_news', ['category' => $category->name]) }}" class="post-tag">{{ $category->name }}</a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="trending-post-content-two">
                                                        <h2 class="post-title">
                                                            <a href="{{ route('blog-details', $article->id) }}">{{ $article->title }}</a>
                                                        </h2>
                                                        <div class="blog-post-meta">
                                                            <ul class="list-wrap">
                                                                @if($article->author)
                                                                    <li><i class="ri-account-circle-line"></i>by <a href="#">{{ $article->author ?? 'Admin' }}</a></li>
                                                                @endif
                                                                @if($article->published_date)
                                                                    <li><i class="ri-calendar-line"></i>{{ Carbon::parse($article->published_date)->format('d F, Y') }}
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sidebar-wrap">
                                <div class="sidebar-widget sidebar-widget">
                                    <div class="widget-title mb-30">
                                        <h6 class="title">Subscribe & Followers</h6>
                                        <div class="section-title-line"></div>
                                    </div>
                                    <div class="sidebar-social-wrap">
                                        <ul class="list-unstyled list-wrap row gutter-y-10">
                                            <li><a href="#"><i class="ri-facebook-fill"></i>facebook</a></li>
                                            <li><a href="#"><i class="ri-instagram-fill"></i>instagram</a></li>
                                            <li><a href="#"><i class="ri-youtube-fill"></i>youtube</a></li>
                                            <li><a href="#"><i class="ri-linkedin-fill"></i>LinkedIn</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="sidebar-widget sidebar-widget">
                                    <div class="banner-add" bis_skin_checked="1">
                                        <!-- add -->
                                        <span class="add-title">- Advertisement -</span>
                                        <a href="#"><img src="assets/images/frontend/ad-banner.jpg" class="img-responsive center-block" ></a>
                                    </div>
                                </div>

                                <div class="sidebar-widget sidebar-widget">
                                    <div class="widget-title mb-30">
                                        <h6 class="title">Popular Posts</h6>
                                        <div class="section-title-line"></div>
                                    </div>

                                    @foreach($popularPosts as $post)
                                        <div class="popular-post">
                                            <div class="thumb" style="width: 80px; height: 80px; flex-shrink: 0; background-color: #f0f0f0;">
                                                <a href="{{ route('blog-details', $post->id) }}">
                                                    <img src="{{ $post->image_path ? asset('storage/' . $post->image_path) : asset('assets/images/no-image.jpg') }}" alt="{{ $post->title }}" style="width: 100%; height: 100%; object-fit: contain;">
                                                </a>
                                            </div>
                                            <div class="content">
                                                @foreach ($post->categories as $category)
                                                    <a href="{{ route('category_news', ['category' => $category->name]) }}" class="post-tag-two">{{ $category->name }}</a>
                                                @endforeach
                                                <h2 class="post-title">
                                                    <a href="{{ route('blog-details', $post->id) }}">{{ Str::limit($post->title, 50) }}</a>
                                                </h2>
                                                <div class="blog-post-meta">
                                                    <ul class="list-wrap">
                                                        <li><i class="ri-calendar-line"></i>{{ $post->published_date?Carbon::parse($post->published_date)->format('d F, Y'):'N/A' }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- trending-post-area-end -->
        <div class="ad-banner-area pb-60">
            <div class="container" bis_skin_checked="1">
                <div class="ad-banner-img" bis_skin_checked="1">
                    <a href="{{$bottomBannerAd->url}}"><img src="{{ asset('storage/'.$bottomBannerAd->details) }}" /></a>
                </div>
            </div>
        </div>
        <!-- video-post-area -->
        <section class="video-post-area bg_gray pt-60 pb-60">
            <div class="container">
                <div class="video-post-wrap">
                    <div class="section-title-wrap mb-30">
                        <div class="section-title">
                            <h2 class="title">Video News</h2>
                        </div>
                        <div class="view-all-btn">
                            <a href="blog.html" class="link-btn">View All
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10" fill="none">
                                        <path d="M1.07692 10L0 8.92308L7.38462 1.53846H0.769231V0H10V9.23077H8.46154V2.61538L1.07692 10Z" fill="currentColor" />
                                        <path d="M1.07692 10L0 8.92308L7.38462 1.53846H0.769231V0H10V9.23077H8.46154V2.61538L1.07692 10Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <div class="section-title-line"></div>
                    </div>
                    <ul class="row justify-content-center">
                        @foreach ($videos as $index => $video)
                            @if ($index === 0)
                                <li class="col-lg-6">
                                    <div class="video-post-item big-post">
                                        <div class="YouTubeVideoContainer">
                                            <div class="YouTubeVideoItem jsYouTubeVideoItem" data-youtube-video-link="{{ $video->url }}">
                                                <span class="YouTubeVideoTitle"></span>
                                                <button class="YouTubePlayButton" data-youtube-video-button></button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-lg-6">
                                    <ul class="row gutter-y-20">
                            @else
                                <li class="col-lg-6 wigdet-video-post">
                                    <div class="video-post-item small-post">
                                        <div class="YouTubeVideoContainer">
                                            <div class="YouTubeVideoItem jsYouTubeVideoItem" data-youtube-video-link="{{ $video->url }}">
                                                <span class="YouTubeVideoTitle"></span>
                                                <button class="YouTubePlayButton" data-youtube-video-button></button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                        @if ($videos->count() > 1)
                                    </ul>
                                </li>
                        @endif
                    </ul>

                </div>
            </div>
        </section>
        <!-- video-post-area-end -->
        <!-- <div style="height: 500px;"></div> -->
        <section class="site-bottom pt-50 pb-50">
            <div class="container">
                <div class="row">
                    @foreach ($categoryArticles as $categoryData)
                        <div class="col-lg-4 col-md-6">
                            <div class="sidebar-widget widget-latest-posts mb-30 wow fadeInUp animated">
                                <div class="section-title-wrap mb-30">
                                    <div class="section-title">
                                        <h2 class="title">{{ $categoryData['category']->name }}</h2>
                                    </div>
                                    <div class="section-title-line"></div>
                                </div>
                                <div class="post-block-list post-module-1">
                                    <ul class="list-unstyled list-post">
                                        @forelse ($categoryData['articles'] as $post)
                                            <li>
                                                <div class="d-flex">
                                                    <div class="post-thumb d-flex mr-15 border-radius-5 overflow-hidden align-items-center justify-content-center" style="width: 80px; height: 80px; flex-shrink: 0; background-color: #f0f0f0;">
                                                        <a href="{{ route('blog-details', $post->id) }}">
                                                            <img src="{{ $post->image_path ? asset('storage/' . $post->image_path) : asset('assets/images/no-image.jpg') }}"   style="width: 100%; height: 100%; object-fit: contain;">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-15 fw-500 lineh-21">
                                                            <a href="{{ route('blog-details', $post->id)}}"> {{ $post->title }} </a>
                                                        </h6>
                                                        <div class="entry-meta meta-1 text-uppercase">
                                                            <span class="post-on">{{ $post->published_date ? Carbon::parse($post->published_date)->format('d M'):'N/A' }}</span>
                                                            <span class="post-by has-dot">{{ $post->views ?? '0' }} views</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                            <li>No articles available.</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection

