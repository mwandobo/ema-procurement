@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/forms/radio-theme.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Radio')}}</span></li>
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
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Basic Radio')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form class="form">
                                            <div class="form-group mb-4">
                                                <label>{{__('Default radios')}}</label>
                                                <div class="radio-list">
                                                    <label class="radio">
                                                        <input type="radio" name="radios1">
                                                        <span></span>{{__('Default')}}</label>
                                                    <label class="radio radio-disabled">
                                                        <input type="radio" disabled="disabled" checked="checked" name="radios1">
                                                        <span></span>{{__('Disabled')}}</label>
                                                    <label class="radio">
                                                        <input type="radio" checked="checked" name="radios1">
                                                        <span></span>{{__('Checked')}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label>{{__('Inline radios')}}</label>
                                                <div class="radio-inline">
                                                    <label class="radio">
                                                        <input type="radio" name="radios2">
                                                        <span></span>{{__('Option 1')}}</label>
                                                    <label class="radio">
                                                        <input type="radio" name="radios2">
                                                        <span></span>{{__('Option 2')}}</label>
                                                    <label class="radio">
                                                        <input type="radio" name="radios2">
                                                        <span></span>{{__('Option 3')}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label>{{__('Inline radios')}}</label>
                                                <div class="radio-inline">
                                                    <label class="radio">
                                                        <input type="radio" checked="checked" name="radios3">
                                                        <span></span>{{__('Option 1')}}</label>
                                                    <label class="radio">
                                                        <input type="radio" name="radios3">
                                                        <span></span>{{__('Option 2')}}</label>
                                                    <label class="radio">
                                                        <input type="radio" checked="checked" name="radios3">
                                                        <span></span>{{__('Option 3')}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label>{{__('Large Size')}}</label>
                                                <div class="radio-inline">
                                                    <label class="radio radio-lg">
                                                        <input type="radio" checked="checked" name="radios3_1">
                                                        <span></span>{{__('Option 1')}}</label>
                                                    <label class="radio radio-lg">
                                                        <input type="radio" name="radios3_1">
                                                        <span></span>{{__('Option 2')}}</label>
                                                    <label class="radio radio-lg">
                                                        <input type="radio" name="radios3_1">
                                                        <span></span>{{__('Option 3')}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label>{{__('Square Style')}}</label>
                                                <div class="radio-inline">
                                                    <label class="radio radio-square">
                                                        <input type="radio" checked="checked" name="radios13_1">
                                                        <span></span>{{__('Option 1')}}</label>
                                                    <label class="radio radio-square">
                                                        <input type="radio" name="radios13_1">
                                                        <span></span>{{__('Option 2')}}</label>
                                                    <label class="radio radio-square">
                                                        <input type="radio" name="radios13_1">
                                                        <span></span>{{__('Option 3')}}</label>
                                                </div>
                                                <span class="form-text text-muted">{{__('Some help text goes here')}}</span>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label>{{__('Rounded Style')}}</label>
                                                <div class="radio-inline">
                                                    <label class="radio radio-rounded">
                                                        <input type="radio" checked="checked" name="radios15_1">
                                                        <span></span>{{__('Option 1')}}</label>
                                                    <label class="radio radio-rounded">
                                                        <input type="radio" name="radios15_1">
                                                        <span></span>{{__('Option 2')}}</label>
                                                    <label class="radio radio-rounded">
                                                        <input type="radio" name="radios15_1">
                                                        <span></span>{{__('Option 3')}}</label>
                                                </div>
                                                <span class="form-text text-muted">{{__('Some help text goes here')}}</span>
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
                                                <h4>{{__('Radio Color')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form class="form">
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">{{__('Success')}}</label>
                                                <div class="col-9 col-form-label">
                                                    <div class="radio-inline">
                                                        <label class="radio radio-success">
                                                            <input type="radio" name="radios5">
                                                            <span></span>{{__('Default')}}</label>
                                                        <label class="radio radio-success">
                                                            <input type="radio" name="radios5" checked="checked">
                                                            <span></span>{{__('Checked')}}</label>
                                                        <label class="radio radio-success radio-disabled">
                                                            <input type="radio" name="radios5" disabled="disabled">
                                                            <span></span>{{__('Disabled')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">{{__('Primary')}}</label>
                                                <div class="col-9 col-form-label">
                                                    <div class="radio-inline">
                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="radios11">
                                                            <span></span>{{__('Default')}}</label>
                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="radios11" checked="checked">
                                                            <span></span>{{__('Checked')}}</label>
                                                        <label class="radio radio-primary radio-disabled">
                                                            <input type="radio" name="radios11" disabled="disabled">
                                                            <span></span>{{__('Disabled')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">{{__('Danger')}}</label>
                                                <div class="col-9 col-form-label">
                                                    <div class="radio-inline">
                                                        <label class="radio radio-danger">
                                                            <input type="radio" name="radios12">
                                                            <span></span>{{__('Default')}}</label>
                                                        <label class="radio radio-danger">
                                                            <input type="radio" name="radios12" checked="checked">
                                                            <span></span>{{__('Forms')}}Checked</label>
                                                        <label class="radio radio-danger radio-disabled">
                                                            <input type="radio" name="radios12" disabled="disabled">
                                                            <span></span>{{__('Disabled')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">{{__('Warning')}}</label>
                                                <div class="col-9 col-form-label">
                                                    <div class="radio-inline">
                                                        <label class="radio radio-warning">
                                                            <input type="radio" name="radios13">
                                                            <span></span>{{__('Forms')}}Default</label>
                                                        <label class="radio radio-warning">
                                                            <input type="radio" name="radios13" checked="checked">
                                                            <span></span>{{__('Checked')}}</label>
                                                        <label class="radio radio-warning radio-disabled">
                                                            <input type="radio" name="radios13" disabled="disabled">
                                                            <span></span>{{__('Disabled')}}</label>
                                                    </div>
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
                                                <h4>{{__('Custom Radio 1')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form class="form">
                                            <div class="custom-radio-1">
                                                <label for="rdo-1" class="btn-radio">
                                                    <input type="radio" id="rdo-1" name="radio-grp">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                        <circle cx="10" cy="10" r="9"></circle>
                                                        <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                                        <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                                                    </svg>
                                                    <span>{{__('Option One')}}</span>
                                                </label>
                                                <label for="rdo-2" class="btn-radio">
                                                    <input type="radio" id="rdo-2" name="radio-grp">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                        <circle cx="10" cy="10" r="9"></circle>
                                                        <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                                        <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                                                    </svg>
                                                    <span>{{__('Option Two')}}</span>
                                                </label>
                                                <label for="rdo-3" class="btn-radio">
                                                    <input type="radio" id="rdo-3" name="radio-grp">
                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                        <circle cx="10" cy="10" r="9"></circle>
                                                        <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                                        <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                                                    </svg>
                                                    <span>{{__('Option Three')}}</span>
                                                </label>
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
                                                <h4>{{__('Outline Radio')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form class="form">
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">{{__('Outline Radio')}}</label>
                                                <div class="col-9 col-form-label">
                                                    <div class="radio-inline">
                                                        <label class="radio radio-outline radio-success">
                                                            <input type="radio" name="radios15">
                                                            <span></span>{{__('Default')}}</label>
                                                        <label class="radio radio-outline radio-success">
                                                            <input type="radio" name="radios15" checked="checked">
                                                            <span></span>{{__('Checked')}}</label>
                                                        <label class="radio radio-outline radio-success radio-disabled">
                                                            <input type="radio" name="radios15" disabled="disabled">
                                                            <span></span>{{__('Disabled')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">{{__('Outline Bold')}}</label>
                                                <div class="col-9 col-form-label">
                                                    <div class="radio-inline">
                                                        <label class="radio radio-outline radio-outline-2x radio-primary">
                                                            <input type="radio" name="radios16">
                                                            <span></span>{{__('Default')}}</label>
                                                        <label class="radio radio-outline radio-outline-2x radio-primary">
                                                            <input type="radio" name="radios16" checked="checked">
                                                            <span></span>{{__('Checked')}}</label>
                                                        <label class="radio radio-outline radio-outline-2x radio-primary radio-disabled">
                                                            <input type="radio" name="radios16" disabled="disabled">
                                                            <span></span>{{__('Disabled')}}</label>
                                                    </div>
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
