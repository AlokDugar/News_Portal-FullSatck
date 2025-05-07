<header class="navbar-area header-style" id="navbar">
    <div class="header-top">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 md-none">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img class="logo-light" src="{{ $settings->site_logo ? asset('storage/' . $settings->site_logo) : asset('assets/images/frontend/news.png')  }}" alt="logo">
                        <!-- <img class="logo-dark" src="{{ asset('assets/images/frontend/logo-white.webp') }}" alt="logo"> -->
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-7 adimg_wrap">
                    <a href="{{$topBannerAd->url}}"><img src="{{ asset('storage/'.$topBannerAd->details) }}" /></a>
                </div>
                <div class="col-lg-3 col-md-6 col-7">
                    <div class="header__right float-end">
                        <div class="dropdown right-menu d-inline-flex news-language">
                            <a class="dropdown-toggle" href="#" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                English<i class="ri-arrow-down-s-line"></i>
                            </a>
                            <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton2">
                                <a class="dropdown-item" href="#">English</a>
                                <a class="dropdown-item" href="#">Nepali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg">
            <div class="menu-wrap">
                <div class="main-menu offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="navbarOffcanvas">
                    <div class="mobile-logo-area d-lg-none d-flex justify-content-between align-items-center">
                        <div class="mobile-logo-wrap">
                            <img class="logo-light" src="{{ $settings->site_logo ? asset('storage/' . $settings->site_logo) : asset('assets/images/frontend/news.png')  }}" alt="logo">
                        </div>
                        <div class="menu-close-btn d-flex" data-bs-dismiss="offcanvas" aria-label="Close">
                            <i class="ri-close-line text-dark"></i>
                        </div>
                    </div>
                    <ul class="menu-list">
                        <li class="">
                            <a href="{{ route('home') }}" class="">Home</a>
                        </li>
                        <!--
                        <li class="menu-item-has-children">
                            <a href="javascript:void(0);" class="">cooperative news</a>
                            <i class="bi bi-chevron-down dropdown-icon"></i>
                            <ul class="sub-menu">
                                <li><a href="{{ route('category_news', ['category' => 'cooperative-news'])}}">Post Format 01</a></li>
                                <li><a href="{{ route('category_news', ['category' => 'cooperative-news'])}}">Post Format 02</a></li>
                                <li><a href="{{ route('category_news', ['category' => 'cooperative-news'])}}">Post Format 03</a></li>
                                <li><a href="{{ route('category_news', ['category' => 'cooperative-news'])}}">Post Format 04</a></li>
                            </ul>
                        </li>
                        -->
                        @foreach ($categories as $category)
                            <li class="">
                                <a href="{{ route('category_news', ['category' => $category->name]) }}" class="">{{$category->name}}</a>
                            </li>
                        @endforeach
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>

                </div>
                <div class="others-option d-flex align-items-center">
                    <a class="navbar-brand d-lg-none" href="{{ route('home') }}">
                        <img class="logo-light" src="{{ $settings->site_logo ? asset('storage/' . $settings->site_logo) : asset('assets/images/frontend/news.png')}}" alt="logo">
                        <!-- <img class="logo-dark" src="{{ asset('assets/images/frontend/logo-white.webp') }}" alt="logo"> -->
                    </a>

                    <div class="dropdown right-menu d-inline-flex news-language d-lg-none">
                        <a class="dropdown-toggle" href="#" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="img-fluid country-flag" src="{{ asset('images/frontend/country-flags/02.jpg') }}" > English<i class="ri-arrow-down-s-line"></i>
                        </a>
                        <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton2">
                            <a class="dropdown-item" href="#"><img class="img-fluid country-flag" src="{{ asset('images/frontend/country-flags/02.jpg') }}" >English</a>
                            <a class="dropdown-item" href="#"><img class="img-fluid country-flag" src="{{ asset('images/frontend/country-flags/09.jpg') }}" >Nepali</a>
                        </div>
                    </div>

                    <div class="option-item">
                        <button type="button" class="search-btn">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                    <div class="mobile-menu-btn navbar-toggler d-lg-none d-block" data-bs-toggle="offcanvas" href="#navbarOffcanvas" role="button" aria-controls="navbarOffcanvas">
                        <span class="burger-menu">
                            <span class="top-bar"></span>
                            <span class="middle-bar"></span>
                            <span class="bottom-bar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
