<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper" style="text-align: center;">
            <a href="{{ route('dashboard') }}">
                <img class="img-fluid for-light" src="{{ asset('assets/images/white_logo.png') }}" alt="logo" style="display: inline-block;">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="pin-title sidebar-list">
                        <h6>Pinned</h6>
                    </li>
                    <hr>
                    <li class="sidebar-list"> <a class="sidebar-link sidebar-title link-nav" href="{{route('dashboard')}}"><i data-feather="home"></i><span>Dashboard</span></a></li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="file-text"></i><span>News</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('categories.index')}}">Categories</a></li>
                            <li><a href="{{route('types.index')}}">Types</a></li>
                            <li><a href="{{route('news.index')}}">Details</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="zap"></i><span>Advertisements</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('adTypes.index')}}">AD Types</a></li>
                            <li><a href="{{route('ads.index')}}">AD Details</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"> <a class="sidebar-link sidebar-title link-nav" href="{{route('video-galleries.index')}}"><i data-feather="play-circle"></i><span>Video Galleries</span></a></li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="user"></i><span>Contact Us</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('contact-infos.index')}}">Contact Infos</a></li>
                            <li><a href="{{route('contact-lists.index')}}">Contact Lists</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"> <a class="sidebar-link sidebar-title link-nav" href="{{route('settings')}}"><i data-feather="settings"></i><span>General Settings</span></a></li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>

