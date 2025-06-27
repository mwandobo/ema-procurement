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
                            <h6 class="right-bar-heading px-3 mt-2 text-dark text-center font-30 text-uppercase"><i class="las la-lock"></i> {{__('Locked')}}</h6>
                            <p class="text-center text-muted mt-1 mb-3 font-14">{{__('Please enter your password to continue')}}</p>
                            <div class="text-center mt-5">
                                <img src="{{url('assets/img/profile-16.jpg')}}" class="img-thumbnail rounded-circle"/>
                            </div>
                            <div class="login-two-inputs mt-4">
                                <input type="password" placeholder="{{__('Password')}}"/>
                                <i class="las la-lock"></i>
                            </div>
                            <div class="login-two-inputs mt-5 text-center d-flex">
                                <button class="ripple-button ripple-button-primary w-100 btn-login ml-3 mr-3" type="button">
                                    <div class="ripple-ripple js-ripple">
                                        <span class="ripple-ripple__circle"></span>
                                    </div>
                                    {{__('Continue')}}
                                </button>
                            </div>
                            <div class="mt-4 text-center font-12 strong">
                                <a href="{{url('/authentications/style2/login')}}" class="text-primary">{{__('Logout & Switch User')}}</a>
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
