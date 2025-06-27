@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/basic-ui/custom_countdown.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Basic Ui')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Countdown')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="layout-top-spacing mb-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing">
                            <div class="col-lg-6 mb-4">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Circle Countdown')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div id="timer" class="circle-countdown">
                                            <div class="days"><span class="count">00</span> <span class="text">{{__('Days')}}</span></div>
                                            <div class="hours"><span class="count">00</span> <span class="text">{{__('Hours')}}</span></div>
                                            <div class="min"><span class="count">00</span> <span class="text">{{__('Mins')}}</span></div>
                                            <div class="sec"><span class="count">00</span> <span class="text">{{__('Secs')}}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Square Countdown')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div id="timersquare" class="square-countdown">
                                            <div class="days"><span class="count">00</span> <span class="text">{{__('Days')}}</span></div>
                                            <div class="hours"><span class="count">00</span> <span class="text">{{__('Hours')}}</span></div>
                                            <div class="min"><span class="count">00</span> <span class="text">{{__('Mins')}}</span></div>
                                            <div class="sec"><span class="count">00</span> <span class="text">{{__('Secs')}}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6 mb-4">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('No Background Color Countdown')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div id="nocolor" class="square-countdown no-color">
                                            <div class="days"><span class="count">00</span> <span class="text">{{__('Days')}}</span></div>
                                            <div class="hours"><span class="count">00</span> <span class="text">{{__('Hours')}}</span></div>
                                            <div class="min"><span class="count">00</span> <span class="text">{{__('Mins')}}</span></div>
                                            <div class="sec"><span class="count">00</span> <span class="text">{{__('Secs')}}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3"></div>
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
    {!! Html::script('plugins/countdown/jquery.countdown.min.js') !!}
    {!! Html::script('assets/js/basicui/custom-countdown.js') !!}
@endpush

@push('custom-scripts')

@endpush
