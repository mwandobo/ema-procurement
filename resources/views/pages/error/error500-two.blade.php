@extends('layout.master-auth')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/pages/error/error_2.css') !!}
@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="error-wrapper">
        <div class="col-md-6 error-left-section">
            <a class="navbar-brand" href="{{ url('/dashboard/dashboard2') }}">NEPTUNE</a>
            <div class="error-left-content">
                <h1 class="mb-3 text-white">{{__('Oops!')}}</h1>
                <p class="font-25 mb-5 text-white">{{__('Internal Server Error. Please try again after some time.')}}</p>
                <a class="btn bg-gradient-primary text-white" href="{{ url('/dashboard/dashboard1') }}">{{__('Back to Home')}}</a>
            </div>
        </div>
        <div class="col-md-6 error-right-section">
            <div class="error-menu">
                <a class="nav-link" href="{{ url('/dashboard/dashboard1') }}">{{__('Dashboard')}}</a>
                <a class="nav-link" target="_blank" href="{{ url('/pages/contact-us') }}">{{__('Contact Us')}}</a>
            </div>
            <img src="{{ url('assets/img/error-500-1.jpg') }}" class="error-img" />
        </div>
    </div>
    <!-- Main Body Ends -->
    @include('include.footer')
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('assets/js/pages/faq/faq.js') !!}
@endpush

@push('custom-scripts')

@endpush
