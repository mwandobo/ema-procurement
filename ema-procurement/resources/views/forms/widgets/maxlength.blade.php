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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Maxlength')}}</span></li>
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
                                                <h4>{{__('Maxlength')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Basic Usage')}}</label>
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                <input type="text" class="form-control basic" maxlength="25">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Change the threshold value')}}</label>
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                <input type="text" class="form-control threshold" maxlength="25">
                                                <span class="form-text text-muted">{{__('Show up when there are 20 chars or less left')}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Custom Design')}}</label>
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 d-flex align-center">
                                                <input type="text" class="form-control color-change" maxlength="25">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Custom Message')}}</label>
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 d-flex align-center">
                                                <input type="text" class="form-control custom-message" maxlength="25">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Textarea')}}</label>
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 d-flex align-center">
                                                <textarea id="textarea" class="form-control" maxlength="225" rows="2" placeholder="{{__('Forms')}}This textarea has a limit of 225 chars."></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Positions')}}</label>
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                <input type="text" class="form-control bottom" maxlength="25" placeholder="{{__('Bottom')}}">
                                                <div class="mt-3"></div>
                                                <input type="text" class="form-control left" maxlength="25" placeholder="{{__('Left')}}">
                                                <div class="mt-3"></div>
                                                <input type="text" class="form-control right" maxlength="25" placeholder="{{__('Right')}}">
                                                <div class="mt-3"></div>
                                                <input type="text" class="form-control top" maxlength="25" placeholder="{{__('Top')}}">
                                                <div class="mt-3"></div>
                                                <input type="text" class="form-control bottom-right" maxlength="25" placeholder="{{__('Bottom Right')}}">
                                                <div class="mt-3"></div>
                                                <input type="text" class="form-control bottom-left" maxlength="25" placeholder="{{__('Bottom Left')}}">
                                                <div class="mt-3"></div>
                                                <input type="text" class="form-control top-right" maxlength="25" placeholder="{{__('Top Right')}}">
                                                <div class="mt-3"></div>
                                                <input type="text" class="form-control top-left" maxlength="25" placeholder="{{__('Top Left')}}">
                                                <div class="mt-3"></div>
                                                <input type="text" class="form-control centered-right" maxlength="25" placeholder="{{__('Centered Right')}}">
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
    {!! Html::script('plugins/maxlength/bootstrap-maxlength.min.js') !!}
    {!! Html::script('assets/js/forms/custom-maxlength.js') !!}
@endpush

@push('custom-scripts')

@endpush
