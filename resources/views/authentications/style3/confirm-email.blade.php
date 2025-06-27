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
                <div class="col-xl-6 col-lg-5 col-md-5 d-none d-md-block p-0">
                    <div class="login-bg"></div>
                </div>
                <div class="col-xl-6 col-lg-7 col-md-7">
                    <div class="d-flex flex-column justify-content-between h-100 pr-4 pl-5 pt-5 pb-5">
                        <a>{{__('Confirmation')}}</a>
                        <div>
                            <p class="text-success-teal font-17">{{__('Success !')}}</p>
                            <h2 class="text-black font-20">{{__('A email has been sent to')}} <b>{{__('yourmail@domain.com')}}</b>.
                                {{__('Please check the email and click on the verification link to reset your password.')}} </h2>
                        </div>
                        <div class="login-three-social social-logins mt-4">
                            <p class="text-dark m-0 mr-5">{{__('Social Network')}}</p>
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
