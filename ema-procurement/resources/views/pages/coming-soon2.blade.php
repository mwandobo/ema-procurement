@extends('layout.master-auth')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/pages/coming-soon/style2.css') !!}
@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="coming-soon">
        <div class="coming-soon-container">
            <div class="coming-soon-left">
                <video autoplay loop muted playsinline>
                    <source src="{{ url('assets/img/coming-soon-video-1.mp4') }}" type="video/mp4" />
                </video>
            </div>
            <div class="coming-soon-right">
                <h1>{{__('We\'re Coming Soon!')}}</h1>
                <p class="mb-0 mt-3">{{__('We are currently working really hard on this page.')}}</p>
                <div class="counter">
                    <p>{{__('We\'ll be live after')}}</p>
                    <div id="timer">
                        <div class="days"><span class="count">00</span> <span class="text">{{__('Days')}}</span></div>
                        <div class="hours"><span class="count">00</span> <span class="text">{{__('Hours')}}</span></div>
                        <div class="min"><span class="count">00</span> <span class="text">{{__('Mins')}}</span></div>
                        <div class="sec"><span class="count">00</span> <span class="text">{{__('Secs')}}</span></div>
                    </div>
                </div>
                <form class="d-flex flex-column align-center justify-content-center mt-2">
                    <h6 class="mb-3">{{__('Subscribe to get notified!')}}</h6>
                    <div class="coming-soon-form">
                        <input id="email" name="email" required class="coming-soon-input" type="email" value="" placeholder="{{__('Email')}}">
                        <button type="submit" class="btn btn-sm btn-primary" value="">{{__('Subscribe')}}</button>
                    </div>
                </form>
                <p class="pt-4 mb-1 text-muted font-13">{{__('Subscribe to get notified!')}}x</p>
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
    {!! Html::script('assets/js/pages/coming-soon/coming-soon2.js') !!}
@endpush

@push('custom-scripts')

@endpush
