@extends('layout.master-auth')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/authentication/auth_3.css') !!}
@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="login-three">
        <div class="container-fluid login-three-container">
            <div class="row main-login-three">
                <div class="col-xl-3 col-lg-3 col-md-2 d-none d-md-block p-0">
                    <div class="login-bg"></div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="d-flex flex-column justify-content-between h-100 center-area">
                        <a>{{__('Forget Password')}}</a>
                        <div class="form-1">
                            <p class="text-dark">{{__('To get your password')}}</p>
                            <h2 class="text-black">{{__('Enter your email address')}}</h2>
                        </div>
                        <div class="form-2">
                            <p class="text-dark">{{__('Verification code has been sent')}}</p>
                            <h2 class="text-black">{{__('Enter code and set a new password')}}</h2>
                        </div>
                        <p class="text-dark d-none d-md-block m-0">{{__('Social Network')}}</p>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div class="d-flex flex-column justify-content-between h-100 right-area">
                        <a class="btn btn-sm w-25 bg-gradient-primary text-white ml-auto" href="{{url('/authentications/style3/signup')}}">{{__('Sign up Now')}}</a>
                        <div class="form-1">
                            <div class="login-three-inputs mt-3">
                                <input type="email" placeholder="{{__('Email')}}">
                                <i class="las la-envelope"></i>
                            </div>
                            <div class="cp-container">
                                <button class="text-white btn bg-gradient-primary" id="getCodeButton">{{__('Get Validation Code')}}</button>
                            </div>
                        </div>
                        <div class="form-2">
                            <form method="get" class="digit-group mt-5" data-group-name="digits" data-autosubmit="false" autocomplete="off">
                                <input type="text" id="digit-1" name="digit-1" data-next="digit-2" />
                                <input type="text" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" />
                                <input type="text" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" />
                                <span class="splitter">&ndash;</span>
                                <input type="text" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" />
                                <input type="text" id="digit-5" name="digit-5" data-next="digit-6" data-previous="digit-4" />
                                <input type="text" id="digit-6" name="digit-6" data-previous="digit-5" />
                            </form>
                            <div class="login-three-inputs mt-4">
                                <input type="password" placeholder="{{__('New Password')}}" required/>
                                <i class="las la-lock"></i>
                            </div>
                            <div class="login-three-inputs mt-3">
                                <input type="password" placeholder="{{__('Confirm Password')}}" required/>
                                <i class="las la-lock"></i>
                            </div>
                            <div class="cp-container">
                                <button class="text-white btn bg-gradient-primary">{{__('Change Password')}}</button>
                                <a class="font-13 text-primary pointer" id="changeEmailAddress">{{__('Change your email address')}}</a>
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
