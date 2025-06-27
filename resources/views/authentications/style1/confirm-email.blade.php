@extends('layout.master-auth')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/owl-carousel/owl.carousel.min.css') !!}
    {!! Html::style('plugins/owl-carousel/owl.theme.default.min.css') !!}
    {!! Html::style('assets/css/authentication/auth_1.css') !!}
@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="login-one">
        <div class="container-fluid login-one-container">
            <div class="p-30 h-100" >
                <div class="row main-login-one h-100">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 p-0">
                        <div class="login-one-start text-center">
                            <div class="mt-5">
                                <i class="las la-envelope-open-text text-success-teal font-65"></i>
                            </div>
                            <h3 class="mt-2 text-success-teal">{{__('Success !')}}</h3>
                            <p class="text-muted font-14 mt-4">
                                {{__('A email has been sent to')}} <b>{{__('yourmail@domain.com')}}</b>.
                                {{__('Please check the email and click on the verification link to reset your password.')}}
                            </p>
                            <div class="login-one-inputs mt-5 font-12 strong">
                                <a href="{{url('/authentications/style1/login')}}" class="text-primary"> {{__('Back to Login')}}</a>
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
