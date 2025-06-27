@extends('layout.master-auth')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/owl-carousel/owl.carousel.min.css') !!}
    {!! Html::style('plugins/owl-carousel/owl.theme.default.min.css') !!}
    {!! Html::style('assets/css/authentication/auth_1.css') !!}
@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="forget-one">
        <div class="container-fluid login-one-container">
            <div class="p-30 h-100" >
                <div class="row main-login-one h-100">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 p-0">
                        <div class="login-one-start">
                            <h6 class="mt-2 text-primary text-center font-20">{{__('Forget Password ?')}}</h6>
                            <div class="form-1">
                                <p class="text-center text-muted mt-3 mb-3 font-14">{{__('Enter you email address below')}}</p>
                                <div class="login-one-inputs mt-5">
                                    <input type="text" placeholder="{{__('Email Address')}}"/>
                                    <i class="las la-envelope"></i>
                                </div>
                                <div class="login-one-inputs mt-4">
                                    <button class="ripple-button ripple-button-primary btn-lg btn-login" type="button" id="getCodeButton">
                                        <div class="ripple-ripple js-ripple">
                                            <span class="ripple-ripple__circle"></span>
                                        </div>
                                        {{__('Get Validation Code')}}
                                    </button>
                                </div>
                            </div>
                            <div class="form-2">
                                <p class="text-center text-muted mt-3 mb-3 font-14">{{__('A verification code has been sent')}}</p>
                                <form method="get" class="digit-group mt-5" data-group-name="digits" data-autosubmit="false" autocomplete="off">
                                    <input type="text" id="digit-1" name="digit-1" data-next="digit-2" />
                                    <input type="text" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" />
                                    <input type="text" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" />
                                    <span class="splitter">&ndash;</span>
                                    <input type="text" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" />
                                    <input type="text" id="digit-5" name="digit-5" data-next="digit-6" data-previous="digit-4" />
                                    <input type="text" id="digit-6" name="digit-6" data-previous="digit-5" />
                                </form>
                                <div class="login-one-inputs mt-4">
                                    <input type="password" placeholder="{{__('New Password')}}" required/>
                                    <i class="las la-lock"></i>
                                </div>
                                <div class="login-one-inputs mt-3">
                                    <input type="password" placeholder="{{__('Confirm Password')}}" required/>
                                    <i class="las la-lock"></i>
                                </div>
                                <div class="login-one-inputs mt-4">
                                    <button class="ripple-button ripple-button-primary btn-lg btn-login" type="button">
                                        <div class="ripple-ripple js-ripple">
                                            <span class="ripple-ripple__circle"></span>
                                        </div>
                                        {{__('Change Password')}}
                                    </button>
                                </div>
                                <div class="login-one-inputs mt-3 text-center font-12 strong">
                                    <a href="#" class="text-primary" id="changeEmailAddress">{{__('Change your email address')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-6 col-md-6 d-none d-md-block p-0">
                        <div class="slider-half">
                            <div class="slide-content">
                                <div class="top-sign-up ">
                                    <div class="about-comp text-white mt-2">{{__('Neptune')}}</div>
                                    <div class="for-sign-up">
                                        <p class="text-white font-12 mt-2 font-weight-300">{{__('Don\'t have an account ?')}}</p>
                                        <a href="{{url('/authentications/style1/signup')}}">{{__('Sign Up')}}</a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="owl-carousel owl-theme">
                                    <div class="item">
                                        <i class="lar la-grin-alt font-45 text-white"></i>
                                        <h2 class="font-30 text-white mt-2">{{__('Start your journey')}}</h2>
                                        <p class="summary-count text-white font-12 mt-2 slide-text" >{{__('Everyone has been made for some particular work, and the desire for that work has been put in every heart')}}</p>
                                    </div>
                                    <div class="item">
                                        <i class="lar la-clock font-45 text-white"></i>
                                        <h2 class="font-30 text-white mt-2">{{__('Save your time')}}</h2>
                                        <p class="summary-count text-white font-12 mt-2 slide-text" >{{__('Everyone has been made for some particular work, and the desire for that work has been put in every heart')}}</p>
                                    </div>
                                    <div class="item">
                                        <i class="las la-hand-holding-usd font-45 text-white"></i>
                                        <h2 class="font-30 text-white mt-2">{{__('Save your money')}}</h2>
                                        <p class="summary-count text-white font-12 mt-2 slide-text" >{{__('Everyone has been made for some particular work, and the desire for that work has been put in every heart')}}</p>
                                    </div>
                                </div>
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
    {!! Html::script('plugins/owl-carousel/owl.carousel.min.js') !!}
    {!! Html::script('plugins/owl-carousel/owl.carousel.js') !!}
    {!! Html::script('plugins/bootstrap/js/bootstrap.min.js') !!}
    {!! Html::script('assets/js/authentication/auth_1.js') !!}
@endpush

@push('custom-scripts')

@endpush
