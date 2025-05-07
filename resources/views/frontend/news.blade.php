<?php
    use Carbon\Carbon;
?>

@extends('layouts.app')

@section('content')
    <section class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">News</li>
                </ol>
            </nav>
        </div>
    </section>

    <main>
        <section class="blog-list-area pt-60 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-12 post-style">
                        @forelse($articles as $article)
                            <div class="blog-post">
                                <div class="blog-post-thumb">
                                    <a href="{{ route('blog-details', $article->id) }}">
                                        <img src="{{ $article->image_path ? asset('storage/' . $article->image_path) : asset('assets/images/no-image.jpg') }}"  alt="">
                                    </a>
                                </div>
                                <div class="blog-post-content">
                                    @foreach ($article->categories as $category)
                                        <a href="{{ route('category_news', ['category' => $category->name]) }}" class="post-tag">{{ $category->name }}</a>
                                    @endforeach
                                    <h2 class="post-title bold-underline">
                                        <a href="{{ route('blog-details', $article->id) }}">{{$article->title}}</a>
                                    </h2>
                                    <div class="blog-post-meta">
                                        <ul class="list-wrap">
                                            @if($article->author)
                                                <li><i class="ri-account-circle-line"></i>by {{ $article->author ?? 'Admin' }}</li>
                                            @endif
                                            @if($article->published_date)
                                                <li><i class="ri-calendar-line"></i>{{ Carbon::parse($article->published_date)->format('d F, Y') }}
                                            @endif
                                            <li><i class="ri-history-line"></i>{{ ceil(str_word_count(strip_tags($article->content))/200) }} Mins</li>
                                        </ul>
                                    </div>
                                    <p>{{ Str::limit(strip_tags($article->content), 200) }}</p>
                                </div>
                            </div>
                        @empty
                            <p>No articles available at the moment.</p>
                        @endforelse
                        <div class="pagination-wrap">
                            <div class="pagination">
                                {{ $articles->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
