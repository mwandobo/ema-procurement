@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/forms/form-widgets.css') !!}
    {!! Html::style('plugins/flatpickr/flatpickr.css') !!}
    {!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Picker')}}</span></li>
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
                                                <h4>{{__('Picker')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Basic example')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="basicExample" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Date')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('DateTime')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="dateTime" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Date and Time')}}">
                                                <span class="form-text text-muted">{{__('Click on a date to select time')}}
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('User friendly dates')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="userFriendly" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Date')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Min Date')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="minDate" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Date')}}">
                                                <span class="form-text text-muted">{{__('You have to select a date after 31st December,2020')}}
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Max Date')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="maxDate" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Date')}}">
                                                <span class="form-text text-muted">{{__('Max Date')}}x
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Date from today')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="dateFromToday" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Date')}}">
                                                <span class="form-text text-muted">{{__('You have to select a date between 120 days from today')}}
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Disable specific date')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="disableSpecificDate" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Date')}}">
                                                <span class="form-text text-muted">{{__('These dates are disabled "2025-01-15", "2025-02-21", "2025-03-08')}}
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Disable range of date')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="disablerangeOfDate" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Date')}}">
                                                <span class="form-text text-muted">{{__('These range of dates are disabled from: "2025-02-08", to: "2025-02-23" and from: "2025-04-01", to: "2025-04-19"')}}
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Disable Weekends')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="disableWeekends" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Date')}}">
                                                <span class="form-text text-muted">{{__('Disabling using Function')}}
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Enable few dates')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="enableFew" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Date')}}">
                                                <span class="form-text text-muted">{{__('All dates are disabled except these "2025-03-30", "2025-05-21", "2025-06-08"')}}
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Enable range of dates')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="enablerange" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Date')}}">
                                                <span class="form-text text-muted">{{__('These range of dates are enabled from: "2025-02-08", to: "2025-02-23" and from: "2025-04-01", to: "2025-04-19"')}}
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Enable only first 14 days')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="enablefirst" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Date')}}">
                                                <span class="form-text text-muted">{{__('Enabling using Function')}}
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Disable even months')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="disableEvenMonths" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Date')}}">
                                                <span class="form-text text-muted">{{__('Disabling using Function')}}
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Select Multiple Dates')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="multipleDates" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Date')}}">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Range Calender')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="rangeCalender" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select range of dates')}}">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Time Picker')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="timePicker" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Time')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Forms')}}24-hour Time Picker</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="fullTimePicker" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Time')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Time Picker with limits')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="timePickerWithLimits" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Time')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Default Time')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="defaultTime" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Time')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4 d-none d-md-flex">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Inline')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="inline" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Date')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Display Week Numbers')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input id="displayWeekNumbers" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Date')}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('External Buttons')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group flatpickr" id="externalButtons">
                                                    <div class="input-group-prepend">
                                                                <span class="input-group-text bg-primary border-primary pointer" title="toggle" data-toggle>
                                                                    <i class="lar la-calendar font-19"></i>
                                                                </span>
                                                    </div>
                                                    <input class="form-control" type="text" placeholder="{{__('Select Date')}}" data-input>
                                                    <div class="input-group-append">
                                                                <span class="input-group-text bg-danger border-danger pointer" title="clear" data-clear>
                                                                    <i class="las la-times font-19"></i>
                                                                </span>
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
    {!! Html::script('plugins/flatpickr/flatpickr.js') !!}
    {!! Html::script('plugins/flatpickr/custom-flatpickr.js') !!}
@endpush

@push('custom-scripts')

@endpush
