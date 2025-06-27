@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/animate/animate.css') !!}
    {!! Html::style('plugins/sweetalerts/sweetalert2.min.css') !!}
    {!! Html::style('plugins/sweetalerts/sweetalert.css') !!}
    {!! Html::style('assets/css/basic-ui/custom_sweetalert.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Sweet Alerts')}}</span></li>
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
                            <div class="col-md-4 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Basic message')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info message">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Success message')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info success">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Dynamic queue Example')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info dynamic-queue">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('A title with a text under')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info title-text">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Step by Step')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info step-by-step">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Custom animation')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info custom-animation">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Message with auto close timer')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info timer">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Message with custom image')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info custom-image">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Alert with HTML')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info html">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Warning with "Confirm" button')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info warning confirm">{{__('Show')}}</button></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col- layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Width, padding,  background')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info  custom-width-padding-background">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Footer')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info footer">{{__('Show')}}</button>
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
    {!! Html::script('plugins/sweetalerts/promise-polyfill.js') !!}
    {!! Html::script('plugins/sweetalerts/sweetalert2.min.js') !!}
    {!! Html::script('assets/js/basicui/sweet_alerts.js') !!}
@endpush

@push('custom-scripts')

@endpush
