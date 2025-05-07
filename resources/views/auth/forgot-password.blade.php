<!DOCTYPE html>
<html lang="en">

<head>
    <title>Jobseeker</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="" content="">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="" type="image/x-icon">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="assets/css/themes.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
    <!-- Custom css-->
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
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
                        <div><a class="logo" href="#"><img class="img-fluid for-light" src="{{ asset(config('settings.logo')) }}" alt="logo"></a></div>
                        <div class="login-main">
                            <form class="theme-form" action="{{route('password.email')}}" method="POST">
                                @csrf
                                <h4 class="text-center">Reset Password</h4>
                                <p class="text-center">Enter your email for Reset Link</p>
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
                                    <input class="form-control" name="email" type="email" required="" placeholder="demo@example.com">
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block w-100" type="submit">Send Email</button>
                                </div>
                                <p class="mt-4 mb-0 text-center">Remember Your Password?
                                    <a class="ms-2" href="{{route('login')}}">LogIn</a>
                                </p>
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
