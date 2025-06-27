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
                        <div class="center-two-start w-50">
                            <div class="mt-2 text-center">
                                <i class="las la-envelope-open-text text-success-teal font-65"></i>
                            </div>
                            <h6 class="right-bar-heading px-3 mt-1 text-success-teal text-center font-25 text-uppercase">{{__('Success !')}}</h6>
                            <p class="text-center text-muted mt-4 mb-3 font-14">
                                {{__('A email has been sent to')}} <b>{{__('yourmail@domain.com')}}</b>.
                                {{__('Please check the email and click on the verification link to reset your password.')}}
                            </p>
                            <div class="mt-4 text-center font-12 strong">
                                <a href="{{url('/authentications/style2/login')}}" class="text-primary">{{__('Back to Login')}}</a>
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
