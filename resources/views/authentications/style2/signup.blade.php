@extends('layout.master-auth')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/authentication/auth_2.css') !!}
@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="login-two">
        <div class="container-fluid login-two-container">
            <div class="row main-login-two">
                <div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block p-0">
                    <div class="signup-bg">
                        <div class="left-content-area">
                            <img src="{{url('assets/img/logo_white_transparent.png')}}" class="logo"/>
                            <div>
                                <h2>{{__('A few clicks away from creating your account')}}</h2>
                                <p>{{__('Start your journey in minutes. Save your time and money.')}}</p>
                                <a class="btn mt-4" href="javascript:void(0)" type="button">{{__('Learn More')}}</a>
                            </div>
                            <div class="d-flex align-items-center mt-4">
                                <a class="font-13 text-white mr-3">{{__('Login')}}Find us: </a>
                                <a class="font-13 text-white mr-3" href="javascript:void(0)">{{__('Facebook')}}</a>
                                <a class="font-13 text-white mr-3" href="javascript:void(0)">{{__('Twitter')}}</a>
                                <a class="font-13 text-white mr-3" href="javascript:void(0)">{{__('Linked In')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-5 p-0">
                    <div class="login-two-start">
                        <h6 class="right-bar-heading px-3 mt-2 text-dark text-center font-30 text-uppercase">{{__('Sign Up')}}</h6>
                        <p class="text-center text-muted mt-1 mb-3 font-14">{{__('Fill up and create an account')}}</p>
                        <div class="login-two-inputs mt-5">
                            <input type="text" placeholder="{{__('User Name')}}"/>
                            <i class="las la-user-alt"></i>
                        </div>
                        <div class="login-two-inputs mt-4">
                            <input type="email" placeholder="{{__('Email')}}"/>
                            <i class="las la-envelope"></i>
                        </div>
                        <div class="login-two-inputs mt-4">
                            <input type="password" placeholder="{{__('Password')}}"/>
                            <i class="las la-lock"></i>
                        </div>
                        <div class="login-two-inputs  mt-4 check">
                            <div class="box">
                                <input id="one" type="checkbox">
                                <span class="check"></span>
                                <label for="one">{{__('I agree to the terms and policies')}}</label>
                            </div>
                        </div>
                        <div class="login-two-inputs mt-5 text-center d-flex">
                            <button class="ripple-button ripple-button-primary w-100 btn-login ml-3 mr-3" type="button">
                                <div class="ripple-ripple js-ripple">
                                    <span class="ripple-ripple__circle"></span>
                                </div>
                                {{__('Signup')}}
                            </button>
                            <a class="btn btn-sm btn-outline-primary btn-login w-100 ml-3 mr-3" href="{{url('/authentications/style2/login')}}" type="button">
                                {{__('Login')}}
                            </a>
                        </div>
                        <div class="login-two-inputs mt-4">
                            <div class="find-us-container">
                                <p class="find-us text-center">{{__('Continue With')}}</p>
                            </div>
                        </div>
                        <div class="login-two-inputs social-logins mt-3">
                            <div class="social-btn">
                                <a href="javascript:void(0)" class="fb-btn">
                                    <i class="lab la-facebook-f"></i>
                                </a>
                            </div>
                            <div class="social-btn">
                                <a href="javascript:void(0)" class="twitter-btn">
                                    <i class="lab la-twitter"></i>
                                </a>
                            </div>
                            <div class="social-btn">
                                <a hhref="javascript:void(0)" class="google-btn">
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
