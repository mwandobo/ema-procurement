@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/forms/form-widgets.css') !!}
    {!! Html::style('assets/css/forms/custom-switch.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Forms')}}</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">{{__('Widgets')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Switch')}}</span></li>
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
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Switch')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Outline switch with icon')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12 d-flex align-center">
                                                <label class="switch switch-icons switch-outline switch-outline-primary">
                                                    <input type="checkbox" checked="">
                                                    <span class="slider"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Outline rounded switch')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12 d-flex align-center">
                                                <label class="switch switch-icons switch-outline switch-outline-primary mr-2">
                                                    <input type="checkbox" checked>
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Solid switch')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12 d-flex align-center">
                                                <label class="switch switch-primary mr-2">
                                                    <input type="checkbox" checked>
                                                    <span class="slider"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Solid switch rounded')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12 d-flex align-center">
                                                <label class="switch switch-primary mr-2">
                                                    <input type="checkbox" checked>
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Outline switch')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12 d-flex align-center">
                                                <label class="switch  switch-outline  switch-outline-primary mr-2">
                                                    <input type="checkbox" checked>
                                                    <span class="slider"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Outline switch rounded')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12 d-flex align-center">
                                                <label class="switch switch-outline switch-outline-primary mr-2">
                                                    <input type="checkbox" checked>
                                                    <span class="slider round"></span>
                                                </label>
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
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')

@endpush

@push('custom-scripts')

@endpush
