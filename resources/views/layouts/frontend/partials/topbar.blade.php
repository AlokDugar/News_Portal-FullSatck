<section class="top-bar">
    <div class="container-fluid">
        <div class="d-flex justify-content-around">
            <div class="topbar-left align-self-center">
                <div class="d-flex justify-content-between align-items-center breaking-news">
                    <h2 class="breaking-title float-left">
                        <i class="ri-flashlight-line"></i> Breaking News :</h2>
                    <marquee class="news-scroll breaking-news-content" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                        <ul class="list-unstyled mb-0">
                            @foreach ($breakings as $breaking )
                                <li>
                                    <a href="javascript:void(0);">
                                        {{$breaking->title}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </marquee>
                </div>
            </div>
            <!-- end col-->

            <div class="topbar-right text-end align-self-center">
                <!-- <ul class="list-unstyled top-header-menu">
                    <li><a href="career.html">CAREER</a></li>
                    <li><a href="login&amp;registration.html">REGISTER/LOGIN</a></li>
                    <li><a href="{{route('contact')}}">CONTACT</a></li>
                </ul> -->

                <div class="meta-wrap">
                    <span class="meta">
                        <i class="ri-calendar-2-line"></i>
                        <div id="current_date_en"></div>
                    </span>
                    <!-- <span class="meta">
                        <i class="ri-calendar-2-line"></i>
                        <div id="current_date_nep"></div>
                    </span> -->
                </div>
                <div class="meta-wrap">
                    <span class="meta">
                        <i class="ri-time-line"></i>
                        <div id="current_time_en"></div>
                    </span>
                    <!-- <span class="meta">
                        <i class="ri-time-line"></i>
                        <div id="current_time_nep"></div>
                    </span> -->
                </div>
                <div class="social-wrap d-none d-xl-block">
                    <ul class="social-profile list-style">
                        <li><a href="https://www.fb.com" target="_blank"><i class="ri-facebook-fill"></i></a></li>
                        <li><a href="https://www.instagram.com" target="_blank"><i class="ri-instagram-line"></i></a></li>
                        <li><a href="https://www.linkedin.com" target="_blank"><i class="ri-linkedin-fill"></i></a></li>
                    </ul>
                </div>

            </div>
            <!--end col -->

        </div>
        <!-- end row -->
    </div>
</section>
