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
                <div class="col-md-12 p-0 ">
                    <div class="login-bg">
                        <div class="center-two-start">
                            <h6 class="right-bar-heading px-3 mt-2 text-dark text-center font-30 text-uppercase">{{__('Forget Password ?')}}</h6>
                            <div class="form-1">
                                <p class="text-center text-muted mt-3 mb-3 font-14">{{__('Enter you email address below')}}</p>
                                <div class="login-two-inputs mt-5">
                                    <input type="text" placeholder="{{__('Email Address')}}"/>
                                    <i class="las la-envelope"></i>
                                </div>
                                <div class="login-two-inputs mt-5 text-center d-flex">
                                    <button class="ripple-button ripple-button-primary w-100 btn-login ml-3 mr-3" type="button" id="getCodeButton">
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
                                <div class="login-two-inputs mt-4">
                                    <input type="password" placeholder="{{__('New Password')}}" required/>
                                    <i class="las la-lock"></i>
                                </div>
                                <div class="login-two-inputs mt-3">
                                    <input type="password" placeholder="{{__('Confirm Password')}}" required/>
                                    <i class="las la-lock"></i>
                                </div>
                                <div class="login-two-inputs text-center mt-4">
                                    <button class="ripple-button ripple-button-primary btn-lg btn-login" type="button">
                                        <div class="ripple-ripple js-ripple">
                                            <span class="ripple-ripple__circle"></span>
                                        </div>
                                        {{__('Change Password')}}
                                    </button>
                                </div>
                                <div class="login-two-inputs mt-3 text-center font-12 strong">
                                    <a href="javascript:void(0)" class="text-primary" id="changeEmailAddress">{{__('Change your email address')}}</a>
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
    {!! Html::script('plugins/bootstrap/js/bootstrap.min.js') !!}
    {!! Html::script('assets/js/authentication/auth_2.js') !!}
@endpush

@push('custom-scripts')

@endpush
