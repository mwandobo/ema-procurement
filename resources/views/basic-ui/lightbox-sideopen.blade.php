@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/basic-ui/custom_lightbox_side_open.css') !!}
    {!! Html::style('plugins/lightbox-side-open/strip.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Lightbox Side Open')}}</span></li>
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
                        <div class="row layout-spacing layout-top-spacing">
                            <div class="col-lg-12">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Click on the image to see the effect')}}</h4>
                                                <p class="ml-3"> {{__('All the options and events can be found in ')}}<a href="http://www.stripjs.com/documentation" target="_blank" class="text-primary strong">{{__('official documentation')}}</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="lightbox-side-open">
                                            <ul class="row">
                                                <li class="col-md-3 mb-4">
                                                    <a href="{{ url('/assets/img/lightbox-1.jpg') }}" class="strip" data-strip-group="shared-options" data-strip-caption="Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).">
                                                        <img class="img-responsive" src="{{ url('assets/img/lightbox-1.jpg') }}">
                                                    </a>
                                                </li>
                                                <li class="col-md-3">
                                                    <a href="{{ url('/assets/img/lightbox-2.jpg') }}" class="strip" data-strip-group="shared-options" data-strip-caption="It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.">
                                                        <img class="img-responsive" src="{{ url('assets/img/lightbox-2.jpg') }}">
                                                    </a>
                                                </li>
                                                <li class="col-md-3">
                                                    <a href="{{ url('/assets/img/lightbox-3.jpg') }}" class="strip" data-strip-group="shared-options" data-strip-caption="It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.">
                                                        <img class="img-responsive" src="{{ url('assets/img/lightbox-3.jpg') }}">
                                                    </a>
                                                </li>
                                                <li class="col-md-3">
                                                    <a href="{{ url('/assets/img/lightbox-4.jpg') }}" class="strip" data-strip-group="shared-options" data-strip-caption="Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text layout.">
                                                        <img class="img-responsive" src="{{ url('assets/img/lightbox-4.jpg') }}">
                                                    </a>
                                                </li>
                                                <li class="col-md-3 mb-4">
                                                    <a href="{{ url('/assets/img/lightbox-5.jpg') }}" class="strip" data-strip-group="shared-options" data-strip-caption="It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.">
                                                        <img class="img-responsive" src="{{ url('assets/img/lightbox-5.jpg') }}">
                                                    </a>
                                                </li>
                                                <li class="col-md-3">
                                                    <a href="{{ url('/assets/img/lightbox-6.jpg') }}" class="strip" data-strip-group="shared-options" data-strip-caption="Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).">
                                                        <img class="img-responsive" src="{{ url('assets/img/lightbox-6.jpg') }}">
                                                    </a>
                                                </li>
                                                <li class="col-md-3">
                                                    <a href="{{ url('/assets/img/lightbox-7.jpg') }}" class="strip" data-strip-group="shared-options" data-strip-caption="Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text layout.">
                                                        <img class="img-responsive" src="{{ url('assets/img/lightbox-7.jpg') }}">
                                                    </a>
                                                </li>
                                                <li class="col-md-3">
                                                    <a href="{{ url('/assets/img/lightbox-8.jpg') }}" class="strip" data-strip-group="shared-options" data-strip-caption="Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).">
                                                        <img class="img-responsive" src="{{ url('assets/img/lightbox-8.jpg') }}">
                                                    </a>
                                                </li>
                                                <li class="col-md-3 mb-4">
                                                    <a href="{{ url('/assets/img/lightbox-9.jpg') }}" class="strip" data-strip-group="shared-options" data-strip-caption="Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text layout.">
                                                        <img class="img-responsive" src="{{ url('assets/img/lightbox-9.jpg') }}">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
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
    {!! Html::script('plugins/lightbox-side-open/strip.pkgd.min.js') !!}
@endpush

@push('custom-scripts')

@endpush
