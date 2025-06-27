@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') !!}
    {!! Html::style('assets/css/forms/form-widgets.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Touch Spin')}}</span></li>
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
                                                <h4>{{__('Forms')}}Touch Spin</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Example with postfix')}}</label>
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                <input id="demo1" type="text" value="55" name="demo1">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('With prefix')}}</label>
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                <input id="demo2" type="text" value="0" name="demo2">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Vertical button alignment')}}</label>
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 d-flex align-center">
                                                <input id="verticalButtonAlignment" type="text" value="0" name="verticalButtonAlignment">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Vertical buttons with custom icons')}}</label>
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 d-flex align-center">
                                                <input id="verticalButtonCustomIcon" type="text" value="0" name="verticalButtonCustomIcon">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Init with empty value')}}</label>
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 d-flex align-center">
                                                <input id="initWithEmpty" type="text" value="" name="initWithEmpty">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Value attribute is not set')}}</label>
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                <input id="valueNotSet" type="text" value="" name="valueNotSet">
                                                <span class="form-text text-muted">{{__('Applying settings.initval')}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Button postfix')}}</label>
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                <input id="buttonPostFix" type="text" value="" name="buttonPostFix">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Change button class')}}</label>
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                <input id="changeButtonClass" type="text" value="50" name="changeButtonClass">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-footer text-right">
                                        <button type="reset" class="btn btn-primary mr-2">{{__('Submit')}}</button>
                                        <button type="reset" class="btn btn-outline-primary">{{__('Cancel')}}</button>
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
    {!! Html::script('plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') !!}
    {!! Html::script('assets/js/forms/custom-bootstrap-touchspin.js') !!}
@endpush

@push('custom-scripts')

@endpush
