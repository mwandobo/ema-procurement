@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/forms/form-widgets.css') !!}
    {!! Html::style('assets/css/forms/switch-theme.css') !!}
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
                                <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">{{__('Controls')}}</a></li>
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
                        <div class="row layout-top-spacing switch-outer-container">
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Basic Switch')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form class="form">
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">{{__('Default')}}</label>
                                                <div class="col-3">
															<span class="switch">
																<label>
																	<input type="checkbox" checked="checked" name="select">
																	<span></span>
																</label>
															</span>
                                                </div>
                                                <label class="col-3 col-form-label">{{__('Icon')}}</label>
                                                <div class="col-3">
															<span class="switch switch-icon">
																<label>
																	<input type="checkbox" checked="checked" name="select">
																	<span></span>
																</label>
															</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">{{__('Unchecked')}}</label>
                                                <div class="col-3">
															<span class="switch">
																<label>
																	<input type="checkbox" name="select">
																	<span></span>
																</label>
															</span>
                                                </div>
                                                <label class="col-3 col-form-label">{{__('Icon')}}</label>
                                                <div class="col-3">
															<span class="switch switch-icon">
																<label>
																	<input type="checkbox" name="select">
																	<span></span>
																</label>
															</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">{{__('Disabled')}}</label>
                                                <div class="col-3">
															<span class="switch">
																<label>
																	<input type="checkbox" disabled="disabled">
																	<span></span>
																</label>
															</span>
                                                </div>
                                                <label class="col-3 col-form-label">{{__('Icon')}}</label>
                                                <div class="col-3">
															<span class="switch switch-icon">
																<label>
																	<input type="checkbox" disabled="disabled">
																	<span></span>
																</label>
															</span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="widget-footer text-right">
                                        <button type="reset" class="btn btn-primary mr-2">{{__('Submit')}}</button>
                                        <button type="reset" class="btn btn-outline-primary">{{__('Cancel')}}</button>
                                    </div>
                                </div>
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Switch Color')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form class="form">
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">{{__('Success')}}</label>
                                                <div class="col-3">
															<span class="switch switch-success">
																<label>
																	<input type="checkbox" checked="checked" name="select">
																	<span></span>
																</label>
															</span>
                                                </div>
                                                <label class="col-3 col-form-label">{{__('Primary')}}</label>
                                                <div class="col-3">
															<span class="switch switch-primary">
																<label>
																	<input type="checkbox" checked="checked" name="select">
																	<span></span>
																</label>
															</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">{{__('Danger')}}</label>
                                                <div class="col-3">
															<span class="switch switch-danger">
																<label>
																	<input type="checkbox" checked="checked" name="select">
																	<span></span>
																</label>
															</span>
                                                </div>
                                                <label class="col-3 col-form-label">{{__('Warning')}}</label>
                                                <div class="col-3">
															<span class="switch switch-warning">
																<label>
																	<input type="checkbox" checked="checked" name="select">
																	<span></span>
																</label>
															</span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="widget-footer text-right">
                                        <button type="reset" class="btn btn-primary mr-2">{{__('Submit')}}</button>
                                        <button type="reset" class="btn btn-outline-primary">{{__('Cancel')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Custom Switch 1')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form class="form">
                                            <div class="custom-switch-1 row">
                                                <label class="col-6 col-form-label">{{__('Custom Primary Switch')}}</label>
                                                <div class="col-6 d-flex align-items-center">
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <div>
                                                            <span></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="widget-footer text-right">
                                        <button type="reset" class="btn btn-primary mr-2">{{__('Submit')}}</button>
                                        <button type="reset" class="btn btn-outline-primary">{{__('Cancel')}}</button>
                                    </div>
                                </div>
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Outline Switch')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form class="form">
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">{{__('Success')}}</label>
                                                <div class="col-3">
															<span class="switch switch-outline switch-icon switch-success">
																<label>
																	<input type="checkbox" checked="checked" name="select">
																	<span></span>
																</label>
															</span>
                                                </div>
                                                <label class="col-3 col-form-label">{{__('Primary')}}</label>
                                                <div class="col-3">
															<span class="switch switch-outline switch-icon switch-primary">
																<label>
																	<input type="checkbox" checked="checked" name="select">
																	<span></span>
																</label>
															</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">{{__('Danger')}}</label>
                                                <div class="col-3">
															<span class="switch switch-outline switch-icon switch-danger">
																<label>
																	<input type="checkbox" checked="checked" name="select">
																	<span></span>
																</label>
															</span>
                                                </div>
                                                <label class="col-3 col-form-label">{{__('Warning')}}</label>
                                                <div class="col-3">
															<span class="switch switch-outline switch-icon switch-warning">
																<label>
																	<input type="checkbox" checked="checked" name="select">
																	<span></span>
																</label>
															</span>
                                                </div>
                                            </div>
                                        </form>
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

@endpush

@push('custom-scripts')

@endpush
