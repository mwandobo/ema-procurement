@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/select2/select2.min.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Select 2')}}</span></li>
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
                                                <h4>{{__('Select 2')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Basic')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="form-control basic">
                                                    <option selected="selected">{{__('Orange')}}</option>
                                                    <option>{{__('White')}}</option>
                                                    <option>{{__('Purple')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Multiple Select')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="form-control multiple" multiple="multiple">
                                                    <option value="AF">{{__('Afghanistan')}}</option>
                                                    <option value="BS">{{__('Bahamas')}}</option>
                                                    <option value="KH" selected>{{__('Cambodia')}}</option>
                                                    <option value="DK">{{__('Denmark')}}</option>
                                                    <option value="EC">{{__('Ecuador')}}</option>
                                                    <option value="FK">{{__('Falkland Islands (Malvinas)')}}</option>
                                                    <option value="GA">{{__('Gabon')}}</option>
                                                    <option value="HT">{{__('Haiti')}}</option>
                                                    <option value="IS">{{__('Iceland')}}</option>
                                                    <option value="JM">{{__('Jamaica')}}</option>
                                                    <option value="KE">{{__('Kenya')}}</option>
                                                    <option value="LA">{{__('Lao People\'s Democratic Republic')}}</option>
                                                    <option value="MO">{{__('Macao')}}</option>
                                                    <option value="NA">{{__('Namibia')}}</option>
                                                    <option value="OM">{{__('Oman')}}</option>
                                                    <option value="PK">{{__('Pakistan')}}</option>
                                                    <option value="QA">{{__('Qatar')}}</option>
                                                    <option value="RO">{{__('Romania')}}</option>
                                                    <option value="SN">{{__('Senegal')}}</option>
                                                    <option value="TH">{{__('Thailand')}}</option>
                                                    <option value="UG">{{__('Uganda')}}</option>
                                                    <option value="VN">{{__('Viet Nam')}}</option>
                                                    <option value="EH">{{__('Western Sahara')}}</option>
                                                    <option value="YE">{{__('Yemen')}}</option>
                                                    <option value="ZW">{{__('Zimbabwe')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Nested')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="form-control nested">
                                                    <optgroup label="Group1">
                                                        <option>{{__('Orange')}}</option>
                                                        <option selected="selected">{{__('White')}}</option>
                                                        <option>{{__('Purple')}}</option>
                                                    </optgroup>
                                                    <optgroup label="Group2">
                                                        <option>{{__('Purple')}}</option>
                                                        <option>{{__('Orange')}}</option>
                                                        <option>{{__('White')}}</option>
                                                    </optgroup>
                                                    <optgroup label="Group3">
                                                        <option>{{__('White')}}</option>
                                                        <option>{{__('Purple')}}</option>
                                                        <option>{{__('Orange')}}</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Placeholder')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="form-control placeholder">
                                                    <option></option>
                                                    <option value="AF">{{__('Afghanistan')}}</option>
                                                    <option value="BS">{{__('Bahamas')}}</option>
                                                    <option value="KH">{{__('Cambodia')}}</option>
                                                    <option value="DK">{{__('Denmark')}}</option>
                                                    <option value="EC">{{__('Ecuador')}}</option>
                                                    <option value="FK">{{__('Falkland Islands (Malvinas)')}}</option>
                                                    <option value="GA">{{__('Gabon')}}</option>
                                                    <option value="HT">{{__('Haiti')}}</option>
                                                    <option value="IS">{{__('Iceland')}}</option>
                                                    <option value="JM">{{__('Jamaica')}}</option>
                                                    <option value="KE">{{__('Kenya')}}</option>
                                                    <option value="LA">{{__('Lao People\'s Democratic Republic')}}</option>
                                                    <option value="MO">{{__('Macao')}}</option>
                                                    <option value="NA">{{__('Namibia')}}</option>
                                                    <option value="OM">{{__('Oman')}}</option>
                                                    <option value="PK">{{__('Pakistan')}}</option>
                                                    <option value="QA">{{__('Qatar')}}</option>
                                                    <option value="RO">{{__('Romania')}}</option>
                                                    <option value="SN">{{__('Senegal')}}</option>
                                                    <option value="TH">{{__('Thailand')}}</option>
                                                    <option value="UG">{{__('Uganda')}}</option>
                                                    <option value="VN">{{__('Viet Nam')}}</option>
                                                    <option value="EH">{{__('Western Sahara')}}</option>
                                                    <option value="YE">{{__('Yemen')}}</option>
                                                    <option value="ZW">{{__('Zimbabwe')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Disabled')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="form-control disabled" disabled="true">
                                                    <optgroup label="Group1">
                                                        <option>{{__('Orange')}}</option>
                                                        <option selected="selected">{{__('White')}}</option>
                                                        <option>{{__('Purple')}}</option>
                                                    </optgroup>
                                                    <optgroup label="Group2">
                                                        <option>{{__('Purple')}}</option>
                                                        <option>{{__('Orange')}}</option>
                                                        <option>{{__('White')}}</option>
                                                    </optgroup>
                                                    <optgroup label="Group3">
                                                        <option>{{__('White')}}</option>
                                                        <option>{{__('Purple')}}</option>
                                                        <option>{{__('Orange')}}</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Disabled Options')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="form-control nested">
                                                    <optgroup label="Group1">
                                                        <option>{{__('Orange')}}</option>
                                                        <option disabled="true">{{__('White (Disabled)')}}</option>
                                                        <option>{{__('Purple')}}</option>
                                                    </optgroup>
                                                    <optgroup label="Group2">
                                                        <option>{{__('Purple')}}</option>
                                                        <option>{{__('Orange')}}</option>
                                                        <option>{{__('White')}}</option>
                                                    </optgroup>
                                                    <optgroup label="Group3">
                                                        <option>{{__('White')}}</option>
                                                        <option disabled="true">{{__('Purple (Disabled)')}}</option>
                                                        <option>{{__('Orange')}}</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Limit Selection (Max 2)')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="form-control maximumSelected" multiple="multiple">
                                                    <optgroup label="Group1">
                                                        <option>{{__('Orange')}}</option>
                                                        <option disabled="true">{{__('White (Disabled)')}}</option>
                                                        <option>{{__('Purple')}}</option>
                                                    </optgroup>
                                                    <optgroup label="Group2">
                                                        <option>{{__('Purple')}}</option>
                                                        <option>{{__('Orange')}}</option>
                                                        <option>{{__('White')}}</option>
                                                    </optgroup>
                                                    <optgroup label="Group3">
                                                        <option>{{__('White')}}</option>
                                                        <option disabled="true">{{__('Purple (Disabled)')}}</option>
                                                        <option>{{__('Orange')}}</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('No Search Box')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="form-control no-search-box">
                                                    <option>{{__('Orange')}}</option>
                                                    <option>{{__('Yellow')}}</option>
                                                    <option>{{__('Purple')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Dynamic Data')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="form-control dynamic-data">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Success Message')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 no-margin">
                                                <select class="form-control dynamic-data">
                                                </select>
                                                <span class="form-text text-success-teal">{{__('You have successfully selected')}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Error Message')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 no-margin">
                                                <select class="form-control dynamic-data">
                                                </select>
                                                <span class="form-text text-danger">{{__('Some error occurred')}}</span>
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
    {!! Html::script('plugins/select2/select2.min.js') !!}
    {!! Html::script('assets/js/forms/custom-select2.js') !!}
@endpush

@push('custom-scripts')

@endpush
