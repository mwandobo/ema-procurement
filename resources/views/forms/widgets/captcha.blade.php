@extends('layout.master')

@push('plugin-styles')
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Captcha')}}</span></li>
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
                                                <h4>{{__('Captcha')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12"></label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="capt mt-3">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <div class="captcha">
                                                            <h2 type="text" id="mainCaptcha"></h2>
                                                        </div>
                                                        <a class="text-primary font-25 ml-3 pointer" title="{{__('Change Captcha')}}">
                                                            <i class="las la-sync-alt" id="refresh" onclick="Captcha();"></i>
                                                        </a>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-center mt-3">
                                                        <div class="captcha-input mr-3">
                                                            <input type="text" id="txtInputCaptcha" placeholder="{{__('Enter Captcha')}}"/>
                                                            <i class="las la-robot"></i>
                                                        </div>
                                                        <input class="btn btn-sm btn-primary w-25" id="Button1" type="button" value="Check" onclick="ValidCaptcha();"/>
                                                        <i class="lar la-check-circle captcha-check text-success-teal font-25 " id="checkMark"></i>
                                                    </div>
                                                </div>
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
    {!! Html::script('assets/js/forms/captcha.js') !!}
@endpush

@push('custom-scripts')

@endpush
