<?php
  use App\Models\Setting;

  $settings=Setting::first();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Dashboard</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="" content="">
        <meta name="author" content="pixelstrap">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="{{ $settings->favicon ? asset('storage/' . $settings->favicon) : asset('assets/images/default_favicon.png') }}" type="image/x-icon">
        <link rel="shortcut icon" href="{{ $settings->favicon ? asset('storage/' . $settings->favicon) : asset('assets/images/default_favicon.png') }}" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

        @include('layouts.partials.stylesheet.home')

    </head>

    <body>
        <div class="un-loader">
            <div class="un-loader-inner">
              <label> <span class="circle"></span> </label>
              <label> <span class="circle"></span> </label>
              <label> <span class="circle"></span> </label>
              <label> <span class="circle"></span> </label>
              <label> <span class="circle"></span> </label>
              <label> <span class="circle"></span> </label>
            </div>
        </div>
        <!-- tap on top starts-->
        <div class="tap-top"><i data-feather="chevrons-up"></i></div>
        <!-- tap on tap ends-->
        <!-- page-wrapper Start-->
        <div class="page-wrapper compact-wrapper" id="pageWrapper">
            @include('layouts.partials.header')
            <div class="page-body-wrapper">
                @include('layouts.partials.sidebar')
                @yield('content')
                @include('layouts.partials.footer')
            </div>
        </div>

        @include('layouts.partials.scripts.home')

    </body>

</html>
