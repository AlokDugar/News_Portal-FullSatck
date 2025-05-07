<?php
    use Carbon\Carbon;
?>

@extends('layouts.app')

@section('content')
    <section class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Video News</li>
                </ol>
            </nav>
        </div>
    </section>

    <main>
        <section class="blog-list-area pt-60 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-12 post-style">
                        @forelse($videos as $video)
                            <div class="blog-post">
                                <div class="blog-post-thumb">
                                    <div class="ratio ratio-16x9">
                                        <iframe src="{{ $video->url }}" title="{{ $video->title }}" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="blog-post-content">
                                    <h2 class="post-title bold-underline">
                                        {{ $video->title }}
                                    </h2>
                                </div>
                            </div>
                        @empty
                            <p>No video news available at the moment.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
