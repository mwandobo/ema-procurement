@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/ui-elements/loading-spinners.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('UI Elements')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Loading Spinners')}}</span></li>
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
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Normal loading spinners')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <i class="las la-spinner font-35 text-primary spin"></i>
                                            </div>
                                            <div class="col-md-3">
                                                <i class="las la-circle-notch font-35 text-primary spin"></i>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="spinner-grow text-primary spinner-grow-md" role="status" aria-hidden="true"></span>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="spinner-border text-primary spinner-border-md" role="status" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Loading Spinners in button')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="button-list">
                                                    <button class="btn btn-primary" type="button">
                                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">{{__('Loading...')}}</span>
                                                    </button>
                                                    <button class="btn btn-primary" type="button">
                                                        <span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>
                                                        {{__('Loading...')}}
                                                    </button>
                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-lg-6">
                                                <div class="button-list">
                                                    <button class="btn btn-primary" type="button" disabled="">
                                                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> <span class="sr-only">{{__('Loading...')}}</span>
                                                    </button>
                                                    <button class="btn btn-primary" type="button" disabled="">
                                                        <span class="spinner-grow spinner-grow-sm mr-1" role="status" aria-hidden="true"></span>
                                                        {{__('Loading...')}}
                                                    </button>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Loading Spinners Alignment')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="d-flex align-items-center">
                                            <div class="col-md-4 bg-light-success">
                                                <i class="las la-spinner font-35 text-primary spin"></i>
                                            </div>
                                            <div class="col-md-4 text-center bg-light-primary">
                                                <i class="las la-spinner font-35 text-primary spin"></i>
                                            </div>
                                            <div class="col-md-4 text-right bg-light-danger">
                                                <i class="las la-spinner font-35 text-primary spin"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Loading Spinners Size')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="spinner-border avatar-lg text-primary m-2" role="status"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="spinner-border avatar-md text-primary m-2" role="status"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="spinner-border avatar-sm text-primary m-2" role="status"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="spinner-border text-primary spinner-border-sm m-2" role="status"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Custom Loading Spinners')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area pb-5">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="loading-container">
                                                    <div class="bars-one">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="loading-container">
                                                    <div class="bars-two">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="loading-container">
                                                    <div class="dots-one">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="loading-container">
                                                    <div class="dots-two">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="loading-container">
                                                    <div class="square-one">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="loading-container">
                                                    <div class="circle-one">
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
            </div>
        </div>
    </div>
    <!-- Main Body Starts -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
@endpush

@push('custom-scripts')

@endpush
