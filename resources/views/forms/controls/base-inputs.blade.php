@extends('layout.master')

@push('plugin-styles')

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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Base Input')}}</span></li>
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
                                                <h4>{{__('Base Input')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group">
                                            <label>{{__('Email address')}}
                                                <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" placeholder="{{__('Enter email')}}">
                                            <span class="form-text text-muted">{{__('We\'ll never share your email with anyone else.')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">{{__('Password')}}
                                                <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="{{__('Password')}}">
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('Static:')}}</label>
                                            <p class="form-control-plaintext text-muted">{{__('email@example.com')}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelect1">{{__('Example select')}}
                                                <span class="text-danger">*</span></label>
                                            <select class="form-control" id="exampleSelect1">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelect2">{{__('Example multiple select')}}
                                                <span class="text-danger">*</span></label>
                                            <select multiple="multiple" class="form-control" id="exampleSelect2">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-1">
                                            <label for="exampleTextarea">{{__('Example textarea')}}
                                                <span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="widget-footer text-right">
                                        <button type="reset" class="btn btn-primary mr-2">{{__('Submit')}}</button>
                                        <button type="reset" class="btn btn-outline-primary"> {{__('Cancel')}}</button>
                                    </div>
                                </div>
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4> {{__('Different types of inputs')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label"> {{__('Text')}}</label>
                                            <div class="col-9">
                                                <input class="form-control" type="text" value="{{__('Artisanal kale')}}" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-3 col-form-label"> {{__('Search')}}</label>
                                            <div class="col-9">
                                                <input class="form-control" type="search" value="{{__('How do I shoot web')}}" id="example-search-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-3 col-form-label">{{__('Email')}}</label>
                                            <div class="col-9">
                                                <input class="form-control" type="email" value="{{__('bootstrap@example.com')}}" id="example-email-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-url-input" class="col-3 col-form-label">{{__('URL')}}</label>
                                            <div class="col-9">
                                                <input class="form-control" type="url" value="https://getbootstrap.com" id="example-url-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-3 col-form-label">{{__('Telephone')}}</label>
                                            <div class="col-9">
                                                <input class="form-control" type="tel" value="{{__('1-(555)-555-5555')}}" id="example-tel-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-3 col-form-label">{{__('Password')}}</label>
                                            <div class="col-9">
                                                <input class="form-control" type="password" value="hunter2" id="example-password-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-number-input" class="col-3 col-form-label">{{__('Number')}}</label>
                                            <div class="col-9">
                                                <input class="form-control" type="number" value="42" id="example-number-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-3 col-form-label">{{__('Date and time')}}</label>
                                            <div class="col-9">
                                                <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-date-input" class="col-3 col-form-label">{{__('Date')}}</label>
                                            <div class="col-9">
                                                <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-month-input" class="col-3 col-form-label">{{__('Month')}}</label>
                                            <div class="col-9">
                                                <input class="form-control" type="month" value="2011-08" id="example-month-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-week-input" class="col-3 col-form-label">{{__('Week')}}</label>
                                            <div class="col-9">
                                                <input class="form-control" type="week" value="2011-W33" id="example-week-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-time-input" class="col-3 col-form-label">{{__('Time')}}</label>
                                            <div class="col-9">
                                                <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-color-input" class="col-3 col-form-label">{{__('Color')}}</label>
                                            <div class="col-9">
                                                <input class="form-control" type="color" value="#563d7c" id="example-color-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-3 col-form-label">{{__('Range')}}</label>
                                            <div class="col-9">
                                                <input class="form-control" type="range">
                                            </div>
                                        </div>
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
                                                <h4>{{__('Input States')}}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group">
                                            <label>{{__('Disabled Input')}}</label>
                                            <input type="email" class="form-control" disabled="disabled" placeholder="{{__('Disabled input')}}">
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('Disabled select')}}</label>
                                            <select class="form-control" disabled="disabled">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea">{{__('Disabled textarea')}}</label>
                                            <textarea class="form-control" disabled="disabled" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('Readonly Input')}}</label>
                                            <input type="email" class="form-control" readonly="readonly" placeholder="{{__('Readonly input')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea">{{__('Readonly textarea')}}</label>
                                            <textarea class="form-control" readonly="readonly" rows="3"></textarea>
                                        </div>
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
                                                <h4>{{__('Input Sizing')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group">
                                            <label>{{__('Large Input')}}</label>
                                            <input type="email" class="form-control form-control-lg" placeholder="{{__('Large input')}}">
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('Default Input')}}</label>
                                            <input type="email" class="form-control" placeholder="{{__('Default input')}}">
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('Small Input')}}</label>
                                            <input type="email" class="form-control form-control-sm" placeholder="{{__('Small input')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelectl">{{__('Large Select')}}</label>
                                            <select class="form-control form-control-lg" id="exampleSelectl">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelectd">{{__('Default Select')}}</label>
                                            <select class="form-control" id="exampleSelectd">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelects">{{__('Small Select')}}</label>
                                            <select class="form-control form-control-sm" id="exampleSelects">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
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

@endpush

@push('custom-scripts')

@endpush
