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
        <!-- tap on top starts-->
        <div class="tap-top"><i data-feather="chevrons-up"></i></div>
        <!-- tap on tap ends-->

        <!-- Loader starts-->
        <!-- <div class="loader-wrapper">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"> </div>
        <div class="dot"></div>
        </div> -->
        <!-- Loader ends-->

        <!-- page-wrapper Start-->
        <div class="page-wrapper">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="login-card">
                            <div>
                                <div><a class="logo" href="#"><img class="img-fluid for-light" src="{{ asset(config('settings.logo')) }}" alt="logo"></a></div>
                                <div class="login-main">
                                    <form class="theme-form" action="{{ route('password.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="token" value="{{$token}}">
                                        <h4>Reset Your Password</h4>
                                        <div class="form-group">
                                            <label class="col-form-label">Email</label>
                                            <div class="form-input position-relative">
                                                <input class="form-control" type="email" name="email" required="" placeholder="demo@example.com" value="{{ request()->query('email') }}">
                                                <div class="show-hide"><span class="show"></span></div>
                                            </div>
                                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">New Password</label>
                                            <div class="form-input position-relative">
                                                <input class="form-control" type="password" name="password" required="" placeholder="*********">
                                                <div class="show-hide"><span class="show"></span></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Confirm Password</label>
                                            <input class="form-control" type="password" name="password_confirmation" required="" placeholder="*********">
                                        </div>
                                        <div class="form-group mb-0">
                                            <button class="btn btn-primary btn-block w-100 mt-3" type="submit">Done</button>
                                        </div>
                                    </form>

                                </div>
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
