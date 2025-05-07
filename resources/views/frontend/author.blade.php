@extends('layouts.app')

@section('content')
    <section class="author-wrap">
        <div class="container">
            <div class="author-box">
                <div class="author-img">
                    <img src="assets/images/frontend/author/single-author.jpg" alt="Image">
                </div>
                <div class="author-info">
                    <h4>Scarlett Emily</h4>
                    <ul class="category">
                        <li><a href="blog-classic.html">Creative,</a></li>
                        <li><a href="blog-classic.html">Lifestyle,</a></li>
                        <li><a href="blog-classic.html">Fashion</a></li>
                    </ul>

                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or ran domised words which don't look even slightly believable.</p>

                    <div class="author-profile">
                        <ul class="meta-list">
                            <li><img src="assets/images/frontend/icons/total-post.svg" alt="image">Total Posts: <span>209</span></li>
                            <li><img src="assets/images/frontend/icons/view.svg" alt="image">Total Views: <span>25199</span></li>
                            <li><img src="assets/images/frontend/icons/like.svg" alt="image">Likes:  <span>11957</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="post-gallery-details pt-60 pb-60">
            <div class="container">
                <div class="post-gallery-content">
                    <div class="widget-title mb-30">
                        <h6 class="title">Articles by Scarlett Emily</h6>
                        <div class="section-title-line"></div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="blog-post">
                                <div class="date">
                                    <h3>20</h3>
                                    <p>November</p>
                                </div>
                                <div class="blog-post-content">
                                    <a href="" class="post-tag">Technology</a>
                                    <div class="date">
                                        <h3>20</h3>
                                        <p>November</p>
                                    </div>
                                    <h2 class="post-title bold-underline"><a href="{{route('blog-details')}}">Iphone Devices Are Going To Incredible Now a days</a></h2>
                                    <p>Browned butter and brown sugar area caramelly goodness, crispy edgesick and soft centers rare melty little puddles of chocolate first favorite thing about these browned butter.</p>
                                </div>
                                <div class="blog-post-thumb">
                                    <a href="{{route('blog-details')}}"><img src="assets/images/frontend/news/recent/trending_post01.jpg" ></a>
                                </div>
                            </div>
                            <div class="blog-post">
                                <div class="date">
                                    <h3>21</h3>
                                    <p>November</p>
                                </div>
                                <div class="blog-post-content">
                                    <a href="javascript:void(0);" class="post-tag">Technology</a>
                                    <div class="date">
                                        <h3>20</h3>
                                        <p>November</p>
                                    </div>
                                    <h2 class="post-title bold-underline"><a href="{{route('blog-details')}}">Iphone Devices Are Going To Incredible Now a days</a></h2>
                                    <div class="blog-post-meta">
                                        <ul class="list-wrap">
                                            <li><i class="ri-account-circle-line"></i>by<a href="{{route('author')}}">Admin</a></li>
                                            <li><i class="ri-calendar-line"></i>27 August, 2024</li>
                                            <li><i class="ri-history-line"></i>20 Mins</li>
                                        </ul>
                                    </div>
                                    <p>Browned butter and brown sugar area caramelly goodness, crispy edgesick and soft centers rare melty little puddles of chocolate first favorite thing about these browned butter.</p>
                                </div>
                                <div class="blog-post-thumb">
                                    <a href="{{route('blog-details')}}"><img src="assets/images/frontend/news/recent/trending_post01.jpg" ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
