<?php
  use App\Models\Setting;

  $settings=Setting::first();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('assets/css/frontend/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/frontend/remixicon.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/frontend/bootstrap-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/frontend/swiper.bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/frontend/vendor/slick.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/frontend/vendor/slicknav.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/frontend/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/frontend/plugin.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/frontend/style.css') }}">
        <!-- <link rel="stylesheet" href="{{ asset('assets/css/frontend/responsive.css') }}"> -->
        <title>{{$settings->website_name}}</title>
        <link rel="icon" href="{{ $settings->favicon ? asset('storage/' . $settings->favicon) : asset('assets/images/default_favicon.png') }}" type="image/x-icon">
        <link rel="shortcut icon" href="{{ $settings->favicon ? asset('storage/' . $settings->favicon) : asset('assets/images/default_favicon.png') }}" type="image/x-icon">
    </head>

    <body onload=updateClock();>

        <div class="loader-wrapper">
            <div class="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>

        <!-- <div class="switch-theme-mode">
            <label id="switch" class="switch">
                <input type="checkbox" onchange="toggleTheme()" id="slider">
                <span class="slider round"></span>
            </label>
        </div> -->

        <!-- =============== search-area start =============== -->

        @include('layouts.frontend.partials.mobileSearch')

        <!-- =============== search-area end  =============== -->

        <!-- top bar start -->
        @include('layouts.frontend.partials.topbar')
        <!-- end top bar-->

        @include('layouts.frontend.partials.header')

        <!-- <div class="modal fade searchModal" id="searchModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <input type="text" class="form-control" placeholder="Search here....">
                        <button type="submit"><i class="bi bi-search"></i></button>
                    </form>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="ri-close-line"></i></button>
                </div>
            </div>
        </div> -->

        @yield('content')

        <!-- footer-area -->
        @include('layouts.frontend.partials.footer')
        <!-- footer-area-end -->


        <button type="button" id="back-to-top" class="position-fixed text-center border-0 p-0">
            <i class="ri-arrow-up-line"></i>
        </button>

        <!-- <div class="modal fade" id="newsletter-popup" tabindex="-1" aria-labelledby="newsletter-popup" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <button type="button" class="btn_close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fi fi-rr-cross"></i>
                    </button>
                    <div class="modal-body">
                        <div class="newsletter-bg bg-f"></div>
                        <div class="newsletter-content">
                            <img src="{{asset('assets/images/frontend/newsletter-icon.webp')}}" alt="Image" class="newsletter-icon">
                            <h2>Join Our Newsletter & Read The New Posts First</h2>
                            <form action="#" class="newsletter-form">
                                <input type="email" placeholder="Email Address">
                                <button type="button" class="btn-one">Subscribe<i class="flaticon-arrow-right"></i></button>
                            </form>
                            <div class="form-check checkbox">
                                <input class="form-check-input" type="checkbox" id="test_21">
                                <label class="form-check-label" for="test_21">
                                    I've read and accept <a href="privacy-policy.html">Privacy Policy</a>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <script src="{{ asset('assets/js/frontend/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/frontend/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/frontend/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/frontend/swiper.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/frontend/date.js') }}"></script>
        <script src="{{ asset('assets/js/frontend/aos.js') }}"></script>
        <script src="{{ asset('assets/js/frontend/vendor/slick.min.js') }}"></script>
        <script src="{{ asset('assets/js/frontend/vendor/youtube/video.js') }}"></script>
        <script src="{{ asset('assets/js/frontend/main.js') }}"></script>
        <script src="{{ asset('assets/js/frontend/active.js') }}"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const searchInput = document.querySelector(".mobile-search input");
                const searchIcon = document.querySelector(".mobile-search .bi-search");

                function performSearch() {
                    const query = encodeURIComponent(searchInput.value.trim());
                    if (!query) return;

                    const url = `/search-news/${query}`;
                    window.location.href = url;
                }

                searchInput.addEventListener("keydown", function (e) {
                    if (e.key === "Enter") {
                        performSearch();
                    }
                });

                searchIcon.addEventListener("click", performSearch);
            });
        </script>
        @yield('scripts')

    </body>
</html>
