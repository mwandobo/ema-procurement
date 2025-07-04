<!DOCTYPE html>
<html lang="en">
<?php
$settings= App\Models\Setting::first();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="_token" content="{{ csrf_token() }}">
    <title>@yield('title','') DIY | DIY </title>
    <!-- Core JS files -->
    <script src="asset('global_assets/js/main/jquery.min.js') }}"></script>
    <script src="asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{asset('assets2/js/app.js') }}"></script>
    <!-- /theme JS files -->

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets2/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets2/css/datepicker.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.dateTime.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.dateTime.min.css')}}">
    <!-- /global stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}">
    <!-- Core JS files -->

    <script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>

</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-lg navbar-dark bg-indigo navbar-static">
        <div class="navbar-brand ml-2 ml-lg-0">
            <a href="index.html" class="d-inline-block">

                <img src="{{ url('assets/img/diy.jpg') }}" alt=""> {{ !empty($settings->site_name) ?
                $settings->site_name: ''}}
            </a>
        </div>

        <div class="d-flex justify-content-end align-items-center ml-auto">

        </div>
    </div>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">

                <!-- Content area -->
                <div class="content d-flex justify-content-center align-items-center">

                    <!-- Login form -->
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="card mb-0">
                            <div class="card-body">
                                <!-- Added image above the form -->
                                <div class="text-center mb-4">
                                    <img src="{{ url('assets/img/diy.jpg') }}" alt="Club Logo"
                                        style="max-height: 100px; width: auto;">
                                </div>

                                <div class="text-center mb-3">

                                    <h5 class="mb-0">Login</h5>
                                    <span class="d-block text-muted">Enter your credentials below</span>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        tabindex="1" required autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        tabindex="2" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                </div>

                                <div class="text-center">
                                    <a href="{{url('/authentications/style1/forgot-password')}}">Forgot password?</a>
                                </div>
                               
                            </div>
                        </div>
                    </form>
                    <!-- /login form -->

                </div>
                <!-- /content area -->


                <!-- Footer -->
               <div class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <div class="text-center d-lg-none w-100">
            <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                data-target="#navbar-footer">
                <i class="icon-unfold mr-2"></i>
                Footer
            </button>
        </div>

        <div class="navbar-collapse collapse" id="navbar-footer" style="text-align:center; width: 100%; margin: 0 auto;">
            <span class="navbar-text text-center">
                &copy; <?php echo date('Y'); ?> <a href="#">{{$settings->site_name}}</a> by
                <a href="https://ema.co.tz/" target="_blank">Ujuzinet Company Limited</a>
            </span>
        </div>
    </div>
</div>


        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

    <!-- Main Container Ends -->
    <script src="{{ asset('assets/js/all.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script src="{{asset('assets/js/jautocalc.js')}}"></script>
    <script src="{{asset('assets/js/select2.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            /*
                         * Multiple drop down select
                         */
            $('.m-b').select2({ width: '100%', });
        });
    </script>

</body>

</html>
