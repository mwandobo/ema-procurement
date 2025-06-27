@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/ui-elements/breadcrumbs.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Breadcrumbs')}}</span></li>
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
                                                <h4>{{__('Default Breadcrumb')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <nav class="default-breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="las la-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Components')}}</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">{{__('UI Kit')}}</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Basic Breadcrumbs')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <nav class="default-breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Components')}}</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">{{__('UI Kit')}}</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Basic Breadcrumbs 2')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <ol class="basic-breadcrumb-two">
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Home')}}</a></li>
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Components')}}</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">{{__('UI Kit')}}</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Arrowed Breadcrumbs')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <nav class="arrowed-breadcrumbs" aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Home')}}</a></li>
                                                <li class="breadcrumb-item active"><a href="javascript:void(0);">{{__('Components')}}</a></li>
                                                <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">{{__('UI Kit')}}</a></li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Dotted Seperators')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="dotted-seperators">
                                            <ul class="breadcrumb">
                                                <li class="mb-2"><a href="javscript:void(0);">{{__('Home')}}</a>
                                                </li>
                                                <li class="active mb-2"><a href="javscript:void(0);">{{__('Components')}}</a></li>
                                                <li class="mb-2"><a href="javscript:void(0);">{{__('UI Kit')}}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Breadcrumbs with icons')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="breadcrumb-with-icons">
                                            <ul class="breadcrumb">
                                                <li><a href="javscript:void(0);"><i class="las la-home"></i></a>
                                                </li>
                                                <li class="active"><a href="javscript:void(0);"><i class="las la-drafting-compass"></i> {{__('Components')}}</a></li>
                                                <li><a href="javscript:void(0);"><i class="lab la-elementor"></i> {{__('UI Kit')}}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-xl-6 col-lg-12 layout-spacing d-none d-md-block">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Custom breadcrumbs 1')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="custom-breadcrumb-one">
                                            <ul class="steps">
                                                <li class="step">
                                                    <a href="#">
                                                        <i class="las la-home"></i>
                                                    </a>
                                                </li>
                                                <li class="step">
                                                    <a>
                                                        <i class="far fa-newspaper" aria-hidden="true"></i> {{__('Blog')}}
                                                    </a>
                                                </li>
                                                <li class="step">
                                                    <a>
                                                        <i class="fas fa-utensils" aria-hidden="true"></i> {{__('Cooking')}}
                                                    </a>
                                                </li>
                                                <li class="step">
                                                    <a>
                                                        <i class="fas fa-ice-cream" aria-hidden="true"></i> {{__('ice cream')}}
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
@endpush

@push('custom-scripts')

@endpush
