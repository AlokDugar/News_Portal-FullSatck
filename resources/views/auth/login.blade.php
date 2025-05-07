<?php
  use App\Models\Setting;

  $settings=Setting::first();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Saccos News Portal</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="" content="">
    <meta name="author" content="pixelstrap">

    <link rel="icon" href="{{ $settings->favicon ? asset('storage/' . $settings->favicon) : asset('assets/images/default_favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ $settings->favicon ? asset('storage/' . $settings->favicon) : asset('assets/images/default_favicon.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themes.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
    <!-- Custom css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/responsive.css"> -->
</head>

<body>
    <!-- Loader starts-->
    <!-- <div class="loader-wrapper">
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"> </div>
    <div class="dot"></div>
    </div> -->
    <!-- Loader ends-->

    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo" href="#"><img class="img-fluid for-light" src="{{ $settings->dashboard_logo ? asset('storage/' . $settings->dashboard_logo) : asset('assets/images/default_favicon.png') }}" alt="logo"></a></div>
                        <div class="login-main">
                            <form class="theme-form" action="{{url('/login')}}" method="POST">
                                @csrf
                                <h4 class="text-center">Sign In</h4>
                                <p class="text-center">Wanna access the Dashboard?</p>
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
                                    <input class="form-control" name="email" type="email" required="" placeholder="demo@example.com">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" name="password" required="" placeholder="*********">
                                        <div class="show-hide"><span class="show"></span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <!--<div class="checkbox p-0">
                                    <input id="checkbox1" type="checkbox">
                                    <label class="text-muted" for="checkbox1">Remember password</label>
                                    </div>
                                    <a class="link" href="{{url('/forgot-password')}}">Forgot password?</a>
                                -->
                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-wrapper Ends-->

    <!-- latest jquery-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap js-->
    <script src="assets/vendor/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="assets/vendor/fonts/feather-icon/js/feather.min.js"></script>
    <script src="assets/vendor/fonts/feather-icon/js/feather-icon.js"></script>
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="assets/vendor/libs/config.js"></script>
    <!-- Template js-->
    <script src="assets/js/script.js"></script>
</body>

</html>
