@extends('layout.master-auth')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/pages/coming-soon/style.css') !!}
@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="coming-soon">
        <div class="coming-soon-container">
            <div class="coming-soon-top">
                <img src="{{ url('assets/img/coming-soon-bg-1.png') }}" class="coming-soon-bg"/>
                <div class="area" >
                    <ul class="squares">
                        <li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li>
                    </ul>
                </div >
            </div>
            <div class="coming-soon-bottom">
                <h1> {{__('We\'re Launching Soon!')}}</h1>
                <p class="mb-0 mt-3"> {{__('We are currently working really hard on this page.')}}</p>
                <p class="mb-0"> {{__('Subscribe our Newsletter to get update when it\'ll be live')}}</p>
                <form class="d-flex align-center justify-content-center mt-4">
                    <div class="coming-soon-form">
                        <input id="email" name="email" required class="coming-soon-input" type="email" value="" placeholder="{{__('Email')}}" />
                        <button type="submit" class="btn btn-sm btn-primary" value=""> {{__('Subscribe')}}</button>
                    </div>
                </form>
                <p class="pt-4 mb-1 text-muted font-13"> {{__('Follow Us')}}</p>
                <div class="social-media">
                    <a href="javascript:void(0)" class="social-media-icon text-primary"><i class="lab la-facebook-f"></i></a>
                    <a href="javascript:void(0)" class="social-media-icon text-info"><i class="lab la-twitter"></i></a>
                    <a href="javascript:void(0)" class="social-media-icon text-primary"><i class="lab la-linkedin-in"></i></a>
                    <a href="javascript:void(0)" class="social-media-icon text-danger"><i class="lab la-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('assets/js/libs/jquery-3.6.0.min.js') !!}
    {!! Html::script('bootstrap/js/bootstrap.min.js') !!}
@endpush

@push('custom-scripts')

@endpush
