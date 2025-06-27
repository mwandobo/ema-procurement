@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/forms/checkbox-theme.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Checkbox')}}</span></li>
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
                                                <h4>{{__('Basic Checkbox')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form class="form custom-checkbox-1">
                                            <div class="form-group mb-4">
                                                <label>{{__('Default Checkboxes')}}</label>
                                                <div class="checkbox-list">
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="Checkboxes1">
                                                        <span></span>{{__('Default')}}</label>
                                                    <label class="checkbox checkbox-disabled">
                                                        <input type="checkbox" disabled="disabled" checked="checked" name="Checkboxes1">
                                                        <span></span>{{__('Disabled')}}</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" checked="checked" name="Checkboxes1">
                                                        <span></span>{{__('Checked')}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label>{{__('Inline Checkboxes')}}</label>
                                                <div class="checkbox-inline">
                                                    <label class="checkbox">
                                                        <input type="checkbox" checked="checked" name="Checkboxes3">
                                                        <span></span>{{__('Option 1')}}</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="Checkboxes3">
                                                        <span></span>{{__('Option 2')}}</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" checked="checked" name="Checkboxes3">
                                                        <span></span>{{__('Option 3')}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label>{{__('Large Size')}}</label>
                                                <div class="checkbox-inline">
                                                    <label class="checkbox checkbox-lg">
                                                        <input type="checkbox" checked="checked" name="Checkboxes3_1">
                                                        <span></span>{{__('Option 1')}}</label>
                                                    <label class="checkbox checkbox-lg">
                                                        <input type="checkbox" name="Checkboxes3_1">
                                                        <span></span>{{__('Option 2')}}</label>
                                                    <label class="checkbox checkbox-lg">
                                                        <input type="checkbox" name="Checkboxes3_1">
                                                        <span></span>{{__('Option 3')}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label>{{__('Square Style')}}</label>
                                                <div class="checkbox-inline">
                                                    <label class="checkbox checkbox-square">
                                                        <input type="checkbox" checked="checked" name="Checkboxes13_1">
                                                        <span></span>{{__('Option 1')}}</label>
                                                    <label class="checkbox checkbox-square">
                                                        <input type="checkbox" name="Checkboxes13_1">
                                                        <span></span>{{__('Option 2')}}</label>
                                                    <label class="checkbox checkbox-square">
                                                        <input type="checkbox" name="Checkboxes13_1">
                                                        <span></span>{{__('Option 3')}}</label>
                                                </div>
                                                <span class="form-text text-muted">{{__('Some help text goes here')}}</span>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label>{{__('Rounded Style')}}</label>
                                                <div class="checkbox-inline">
                                                    <label class="checkbox checkbox-rounded">
                                                        <input type="checkbox" checked="checked" name="Checkboxes15_1">
                                                        <span></span>{{__('Option 1')}}</label>
                                                    <label class="checkbox checkbox-rounded">
                                                        <input type="checkbox" name="Checkboxes15_1">
                                                        <span></span>{{__('Option 2')}}</label>
                                                    <label class="checkbox checkbox-rounded">
                                                        <input type="checkbox" name="Checkboxes15_1">
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
                                                <h4>{{__('Checkbox Color')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form class="form">
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">{{__('Success')}}</label>
                                                <div class="col-9 col-form-label">
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox checkbox-success">
                                                            <input type="checkbox" name="Checkboxes5">
                                                            <span></span>{{__('Default')}}</label>
                                                        <label class="checkbox checkbox-success">
                                                            <input type="checkbox" name="Checkboxes5" checked="checked">
                                                            <span></span>{{__('Checked')}}</label>
                                                        <label class="checkbox checkbox-success checkbox-disabled">
                                                            <input type="checkbox" name="Checkboxes5" disabled="disabled">
                                                            <span></span>{{__('Disabled')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">{{__('Primary')}}</label>
                                                <div class="col-9 col-form-label">
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox checkbox-primary">
                                                            <input type="checkbox" name="Checkboxes11">
                                                            <span></span>{{__('Default')}}</label>
                                                        <label class="checkbox checkbox-primary">
                                                            <input type="checkbox" name="Checkboxes11" checked="checked">
                                                            <span></span>{{__('Checked')}}</label>
                                                        <label class="checkbox checkbox-primary checkbox-disabled">
                                                            <input type="checkbox" name="Checkboxes11" disabled="disabled">
                                                            <span></span>{{__('Disabled')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">{{__('Danger')}}</label>
                                                <div class="col-9 col-form-label">
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox checkbox-danger">
                                                            <input type="checkbox" name="Checkboxes12">
                                                            <span></span>{{__('Default')}}</label>
                                                        <label class="checkbox checkbox-danger">
                                                            <input type="checkbox" name="Checkboxes12" checked="checked">
                                                            <span></span>{{__('Checked')}}</label>
                                                        <label class="checkbox checkbox-danger checkbox-disabled">
                                                            <input type="checkbox" name="Checkboxes12" disabled="disabled">
                                                            <span></span>{{__('Disabled')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">{{__('Warning')}}</label>
                                                <div class="col-9 col-form-label">
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox checkbox-warning">
                                                            <input type="checkbox" name="Checkboxes12">
                                                            <span></span>{{__('Default')}}</label>
                                                        <label class="checkbox checkbox-warning">
                                                            <input type="checkbox" name="Checkboxes12" checked="checked">
                                                            <span></span>{{__('Checked')}}</label>
                                                        <label class="checkbox checkbox-warning checkbox-disabled">
                                                            <input type="checkbox" name="Checkboxes12" disabled="disabled">
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
                                                <h4>{{__('Checkbox Ripple Effect')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form class="form row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="ripple-checkbox-primary">
                                                        <input class="inp-cbx" id="cbx" type="checkbox" style="display: none">
                                                        <label class="cbx" for="cbx">
                                                                    <span>
                                                                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                        </svg>
                                                                    </span>
                                                            <span class="text-light-black">{{__('Primary Checkbox')}}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="ripple-checkbox-secondary">
                                                        <input class="inp-cbx" id="cbx2" type="checkbox" style="display: none">
                                                        <label class="cbx" for="cbx2">
                                                                    <span>
                                                                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                        </svg>
                                                                    </span>
                                                            <span class="text-light-black">{{__('Secondary Checkbox')}}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="ripple-checkbox-success">
                                                        <input class="inp-cbx" id="cbx3" type="checkbox" style="display: none">
                                                        <label class="cbx" for="cbx3">
                                                                    <span>
                                                                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                        </svg>
                                                                    </span>
                                                            <span class="text-light-black">{{__('Success Checkbox')}}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="ripple-checkbox-warning">
                                                        <input class="inp-cbx" id="cbx4" type="checkbox" style="display: none">
                                                        <label class="cbx" for="cbx4">
                                                                    <span>
                                                                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                        </svg>
                                                                    </span>
                                                            <span class="text-light-black">{{__('Warning Checkbox')}}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="ripple-checkbox-danger">
                                                        <input class="inp-cbx" id="cbx5" type="checkbox" style="display: none">
                                                        <label class="cbx" for="cbx5">
                                                                    <span>
                                                                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                        </svg>
                                                                    </span>
                                                            <span class="text-light-black">{{__('Danger Checkbox')}}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="ripple-checkbox-dark">
                                                        <input class="inp-cbx" id="cbx6" type="checkbox" style="display: none">
                                                        <label class="cbx" for="cbx6">
                                                                    <span>
                                                                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                        </svg>
                                                                    </span>
                                                            <span class="text-light-black">{{__('Dark Checkbox')}}</span>
                                                        </label>
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
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Outline Checkbox')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form class="form">
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">{{__('Outline')}}</label>
                                                <div class="col-9 col-form-label">
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox checkbox-outline checkbox-success">
                                                            <input type="checkbox" name="Checkboxes15">
                                                            <span></span>{{__('Default')}}</label>
                                                        <label class="checkbox checkbox-outline checkbox-success">
                                                            <input type="checkbox" name="Checkboxes15" checked="checked">
                                                            <span></span>{{__('Checked')}}</label>
                                                        <label class="checkbox checkbox-outline checkbox-success checkbox-disabled">
                                                            <input type="checkbox" name="Checkboxes15" disabled="disabled">
                                                            <span></span>{{__('Disabled')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">{{__('Outline Bold')}}</label>
                                                <div class="col-9 col-form-label">
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox checkbox-outline checkbox-outline-bold checkbox-primary">
                                                            <input type="checkbox" name="Checkboxes16">
                                                            <span></span>{{__('Default')}}</label>
                                                        <label class="checkbox checkbox-outline checkbox-outline-bold checkbox-primary">
                                                            <input type="checkbox" name="Checkboxes16" checked="checked">
                                                            <span></span>{{__('Checked')}}</label>
                                                        <label class="checkbox checkbox-outline checkbox-outline-bold checkbox-primary checkbox-disabled">
                                                            <input type="checkbox" name="Checkboxes16" disabled="disabled">
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
