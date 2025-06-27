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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Select Splitter')}}</span></li>
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
                                                <h4>{{__('Select Splitter')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Simple Select, No Multiple')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <select id="example1">
                                                    <optgroup label="{{__('Category 1')}}">
                                                        <option value="1">{{__('Choice 1')}}</option>
                                                        <option value="2">{{__('Choice 2')}}</option>
                                                        <option value="3">{{__('Choice 3')}}</option>
                                                        <option value="4">{{__('Choice 4')}}</option>
                                                    </optgroup>
                                                    <optgroup label="{{__('Category 2')}}">
                                                        <option value="5">{{__('Choice 5')}}</option>
                                                        <option value="6">{{__('Choice 6')}}</option>
                                                        <option value="7">{{__('Choice 7')}}</option>
                                                        <option value="8">{{__('Choice 8')}}</option>
                                                    </optgroup>
                                                    <optgroup label="{{__('Category 3')}}">
                                                        <option value="9">{{__('Choice 9')}}</option>
                                                        <option value="10">{{__('Choice 10')}}</option>
                                                        <option value="11">{{__('Choice 11')}}</option>
                                                        <option value="12">{{__('Choice 12')}}</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Second select is cleared, when first changed')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <select id="example2" multiple="multiple">
                                                    <optgroup label="{{__('Category 1')}}">
                                                        <option value="1">{{__('Choice 1')}}</option>
                                                        <option value="2" selected="selected">{{__('Choice 2')}}</option>
                                                        <option value="3">{{__('Choice 3')}}</option>
                                                        <option value="4">{{__('Choice 4')}}</option>
                                                    </optgroup>
                                                    <optgroup label="{{__('Category 2')}}">
                                                        <option value="5">{{__('Choice 5')}}</option>
                                                        <option value="6">{{__('Choice 6')}}</option>
                                                        <option value="7">{{__('Choice 7')}}</option>
                                                        <option value="8">{{__('Choice 8')}}</option>
                                                    </optgroup>
                                                    <optgroup label="{{__('Category 3')}}">
                                                        <option value="9">{{__('Choice 9')}}</option>
                                                        <option value="10">{{__('Choice 10')}}</option>
                                                        <option value="11">{{__('Choice 11')}}</option>
                                                        <option value="12">{{__('Choice 12')}}</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('You can select maximum 2 options of all categories')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <select id="example3" multiple="multiple">
                                                    <optgroup label="{{__('Category 1')}}">
                                                        <option value="1">{{__('Choice 1')}}</option>
                                                        <option value="2">{{__('Choice 2')}}</option>
                                                        <option value="3" selected="selected">{{__('Choice 3')}}</option>
                                                        <option value="4">{{__('Choice 4')}}</option>
                                                    </optgroup>
                                                    <optgroup label="{{__('Category 2')}}">
                                                        <option value="5">{{__('Choice 5')}}</option>
                                                        <option value="6" selected="selected">{{__('Choice 6')}}</option>
                                                        <option value="7">{{__('Choice 7')}}</option>
                                                        <option value="8">{{__('Choice 8')}}</option>
                                                    </optgroup>
                                                    <optgroup label="{{__('Category 3')}}">
                                                        <option value="9">{{__('Choice 9')}}</option>
                                                        <option value="10">{{__('Choice 10')}}</option>
                                                        <option value="11">{{__('Choice 11')}}</option>
                                                        <option value="12">{{__('Choice 12')}}</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('You can select maximum 3 options only from one cattegory')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <select id="example4" multiple="multiple">
                                                    <optgroup label="{{__('Category 1')}}">
                                                        <option value="1">{{__('Choice 1')}}</option>
                                                        <option value="2">{{__('Choice 2')}}</option>
                                                        <option value="3" selected="selected">{{__('Choice 3')}}</option>
                                                        <option value="4">{{__('Choice 4')}}</option>
                                                    </optgroup>
                                                    <optgroup label="{{__('Category 2')}}">
                                                        <option value="5">{{__('Choice 5')}}</option>
                                                        <option value="6">{{__('Choice 6')}}</option>
                                                        <option value="7">{{__('Choice 7')}}</option>
                                                        <option value="8">{{__('Choice 8')}}</option>
                                                    </optgroup>
                                                    <optgroup label="{{__('Category 3')}}">
                                                        <option value="9">{{__('Choice 9')}}</option>
                                                        <option value="10">{{__('Choice 10')}}</option>
                                                        <option value="11">{{__('Choice 11')}}</option>
                                                        <option value="12">{{__('Choice 12')}}</option>
                                                    </optgroup>
                                                </select>
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
    {!! Html::script('plugins/select-splitter/bootstrap-multiselectsplitter.min.js') !!}
    {!! Html::script('assets/js/forms/select-splitter.js') !!}
@endpush

@push('custom-scripts')

@endpush
