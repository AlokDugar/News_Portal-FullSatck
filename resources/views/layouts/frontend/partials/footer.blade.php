@php
    use App\Models\ContactInfo;

    $contact= ContactInfo::first();
@endphp
<footer>
    <div class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4 mb-lg-0">
                        <div class="footer-widget">
                            <div class="fw-logo">
                                <a href="index.html">
                                    <img src="{{ asset('assets/images/frontend/news.png') }}" alt="Logo">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4 mb-lg-0">
                        <div class="footer-widget">
                            <h4 class="fw-title">Quick Links</h4>
                            <div class="footer-link-wrap">
                                <ul class="list-unstyled list-wrap">
                                    <li> <a href="{{route('home')}}">Home</a></li>
                                    @foreach ($categories as $category)
                                        <li class="">
                                            <a href="{{ route('category_news', ['category' => $category->name]) }}" class="">{{$category->name}}</a>
                                        </li>
                                    @endforeach
                                    <li> <a href="{{route('contact')}}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4 class="fw-title">Contact</h4>
                            <div class="footer-link-wrap">
                                <ul class="list-unstyled list-wrap">
                                    <li><a href="#" id="footerEmailLink" target="_blank">Email Us</a></li>
                                    <li><a href="tel:{{$contact->phone}}" target="_blank">Call Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6 col-md-12 copyright">
                        <span>© <script>document.write(new Date().getFullYear());</script>, Copyrights {{$settings->website_name}}. All Rights Reserved</span>
                    </div>
                    <div class="col-lg-6 col-md-12 agency">
                        <a href="https://www.cosys.com.np/">Design &amp; Development by
                            <img src="{{ asset('assets/images/frontend/pa.jpg') }}" class="footerimg" data-no-retina="" alt="Logo" title="Logo" style="width:20px; height:20px;">
                            Pioneer Associate Pvt.Ltd
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
