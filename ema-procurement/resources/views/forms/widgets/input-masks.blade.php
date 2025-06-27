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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Input Masks')}}</span></li>
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
                                                <h4>{{__('Input Masks')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Date')}}</label>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <input id="date" type="text" class="form-control" placeholder="">
                                                <span class="form-text text-muted">{{__('Format:')}}
                                                            <code>mm/dd/yyyy</code></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Date 2')}}</label>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <input id="date2" type="text" class="form-control" placeholder="">
                                                <span class="form-text text-muted">{{__('Format:')}}
                                                            <code>mm-dd-yyyy</code></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Date 3')}}</label>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <input id="date3" type="text" class="form-control" placeholder="">
                                                <span class="form-text text-muted">{{__('Format:')}}
                                                            <code>{{__('dd December, yyyy')}}</code></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Hour')}}</label>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <input id="hour" type="text" class="form-control" placeholder="">
                                                <span class="form-text text-muted">{{__('Format:')}}
                                                            <code>HH:MM:SS</code></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('ZIP Code')}}</label>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <input id="zipcode" type="text" class="form-control" placeholder="">
                                                <span class="form-text text-muted">{{__('Format:')}}
                                                            <code>xxxxx-xxx</code></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Currency ($)')}}</label>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <input id="currency" type="text" class="form-control" placeholder="">
                                                <span class="form-text text-muted">{{__('Format:')}}
                                                            <code>{{__('$999,9999,999.99')}}</code></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Currency (£)')}}</label>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <input id="currency-2" type="text" class="form-control" placeholder="">
                                                <span class="form-text text-muted">{{__('Format:')}}
                                                            <code>{{__('£999,9999,999.99')}}</code></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Currency (€)')}}</label>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <input id="currency-3" type="text" class="form-control" placeholder="">
                                                <span class="form-text text-muted">{{__('Format:')}}
                                                            <code>{{__('€999,9999,999.99')}}</code></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('IP Address')}}</label>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <input id="ip-add" type="text" class="form-control" placeholder="">
                                                <span class="form-text text-muted">{{__('Format:')}}
                                                            <code>xxx.xxx.xxx.xxx</code></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Email Address')}}</label>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <input id="email" type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Phone Number')}}</label>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <input id="ph-number" type="text" class="form-control" placeholder="">
                                                <span class="form-text text-muted">{{__('Format:')}}
                                                            <code>{{__('(999) 999-9999')}}</code></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Mobile Number')}}</label>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <input id="m-number" type="text" class="form-control" placeholder="">
                                                <span class="form-text text-muted">{{__('Format:')}}
                                                            <code>{{__('99999-99999')}}</code></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Max Value')}}</label>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <input id="max-value" type="text" class="form-control" placeholder="">
                                                <span class="form-text text-muted">{{__('Format:')}}
                                                            <code>9999</code></span>
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
    {!! Html::script('plugins/input-mask/jquery.inputmask.min.js') !!}
    {!! Html::script('assets/js/forms/input-mask.js') !!}
@endpush

@push('custom-scripts')

@endpush
