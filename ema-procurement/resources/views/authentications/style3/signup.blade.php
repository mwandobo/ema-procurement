@extends('layout.master-auth')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/authentication/auth_3.css') !!}
@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="login-three" onload="Captcha();">
        <div class="container-fluid login-three-container">
            <div class="row main-login-three">
                <div class="col-xl-3 col-lg-3 col-md-2 d-none d-md-block p-0">
                    <div class="login-bg"></div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="d-flex flex-column justify-content-between h-100 center-area">
                        <a>{{__('Sign up')}}</a>
                        <div>
                            <p class="text-dark">{{__('A few clicks away from creating your account')}}</p>
                            <h2 class="text-black">{{__('Fill up and create an account')}}</h2>
                        </div>
                        <p class="text-dark d-none d-md-block m-0">{{__('Social Network')}}</p>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div class="d-flex flex-column justify-content-between h-100 right-area">
                        <a class="btn btn-sm w-25 bg-gradient-primary text-white ml-auto"  href="{{url('/authentications/style3/login')}}">{{__('Login')}}</a>
                        <div>
                            <div class="login-three-inputs mt-3">
                                <input type="email" placeholder="{{__('Email')}}">
                                <i class="las la-envelope"></i>
                            </div>
                            <div class="login-three-inputs mt-3">
                                <input type="password" placeholder="{{__('Password')}}">
                                <i class="las la-lock"></i>
                            </div>
                            <div class="capt mt-3">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="captcha">
                                        <h2 type="text" id="mainCaptcha"></h2>
                                    </div>
                                    <a class="text-primary font-25 ml-3 pointer" title="{{__('Email')}}Change Captcha">
                                        <i class="las la-sync-alt" id="refresh" onclick="Captcha();"></i>
                                    </a>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mt-3">
                                    <div class="login-three-inputs mr-3">
                                        <input type="text" id="txtInputCaptcha" placeholder="{{__('Enter Captcha')}}"/>
                                        <i class="las la-robot"></i>
                                    </div>
                                    <input class="btn btn-sm btn-primary" id="Button1" type="button" value="Check" onclick="ValidCaptcha();"/>
                                    <i class="lar la-check-circle captcha-check text-success-teal font-25 " id="checkMark"></i>
                                </div>
                            </div>
                            <div class="login-three-inputs check mt-4">
                                <input class="inp-cbx" id="cbx" type="checkbox" style="display: none">
                                <label class="cbx" for="cbx">
                                <span>
                                    <svg width="12px" height="10px" viewBox="0 0 12 10">
                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                    </svg>
                                </span>
                                    <span class="font-13 text-muted">{{__('I agree to the terms and policies')}}</span>
                                </label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4">
                                <button class="text-white btn bg-gradient-primary">{{__('Sign up')}}</button>
                            </div>
                        </div>
                        <div class="login-three-social social-logins mt-4">
                            <div class="social-btn bg-gradient-primary">
                                <a href="#" class="fb-btn">
                                    <i class="lab la-facebook-f"></i>
                                </a>
                            </div>
                            <div class="social-btn bg-gradient-primary">
                                <a href="#" class="twitter-btn">
                                    <i class="lab la-twitter"></i>
                                </a>
                            </div>
                            <div class="social-btn bg-gradient-primary">
                                <a href="#" class="google-btn">
                                    <i class="lab la-google-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('assets/js/libs/jquery-3.6.0.min.js') !!}
    {!! Html::script('plugins/bootstrap/js/bootstrap.min.js') !!}
    {!! Html::script('assets/js/authentication/auth_2.js') !!}
@endpush

@push('custom-scripts')

@endpush
