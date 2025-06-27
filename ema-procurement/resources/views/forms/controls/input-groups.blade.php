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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Input Groups')}}</span></li>
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
                                                <h4>{{__('Basic')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group">
                                            <label>{{__('Left Addon')}}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="{{__('Email')}}">
                                            </div>
                                            <span class="form-text text-muted">{{__('Some help content goes here')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('Right Addon')}}</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="{{__('Username')}}" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">{{__('@example.com')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed my-8"></div>
                                        <div class="form-group">
                                            <label>{{__('Joint Addons')}}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                    <span class="input-group-text">0.00</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="{{__('Amount (to the nearest dollar)')}}">
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>{{__('Left &amp; Right Addons')}}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">#</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="{{__('Units')}}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">px</span>
                                                </div>
                                            </div>
                                        </div>
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
                                                <h4>{{__('Input groups with icons')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group">
                                            <label>{{__('Left Addon')}}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="las la-exclamation-triangle font-17"></i>
                                                            </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="{{__('Email')}}">
                                            </div>
                                            <span class="form-text text-muted">{{__('Some help content goes here')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('Right Addon')}}</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="{{__('Recipient\'s username')}}" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="las la-user font-17"></i>
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed my-8"></div>
                                        <div class="form-group">
                                            <label>{{__('Joint Addons')}}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-17">$</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="0.00" aria-label="{{__('Amount (to the nearest dollar)')}}">
                                                <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="las la-trademark font-17"></i>
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('Both Addons')}}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="las la-user-lock font-17"></i>
                                                            </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="{{__('Recipient\'s username')}}" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="las la-user-shield font-17"></i>
                                                            </span>
                                                </div>
                                            </div>
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
                                                <h4>{{__('Different size of input groups')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group">
                                            <label>{{__('Large Input Group')}}</label>
                                            <div class="input-group input-group-lg">
                                                <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="las la-exclamation-triangle font-17"></i>
                                                            </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="{{__('Forms')}}Large size">
                                            </div>
                                            <span class="form-text text-muted">{{__('Some help content goes here')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('Large Input Group')}}</label>
                                            <div class="input-group input-group-lg">
                                                <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="las la-sync-alt font-17"></i>
                                                            </span>
                                                    <span class="input-group-text">0.00</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="{{__('Large size')}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('Small Input Group')}}</label>
                                            <div class="input-group input-group-sm">
                                                <input type="text" class="form-control" placeholder="{{__('Small size')}}" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="las la-users font-17"></i>
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('Small Input Group')}}</label>
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="las la-paper-plane font-17"></i>
                                                            </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="{{__('Small Input Group')}}x" aria-describedby="basic-addon2">
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>{{__('Small Input Group')}}</label>
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="las la-paper-plane font-17"></i>
                                                            </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="{{__('Small size')}}" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="las la-users font-17"></i>
                                                            </span>
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
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Input groups with checkbox and radio')}}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group">
                                            <label>{{__('Left Checkbox Addon')}}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <label class="checkbox checkbox-inline checkbox-success">
                                                                    <input type="checkbox" checked="checked">
                                                                    <span></span>
                                                                </label>
                                                            </span>
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="{{__('Text input with checkbox')}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('Right Checkbox Addon')}}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="{{__('Right &amp; Left Checkbox Addon')}}x">
                                                <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <label class="checkbox checkbox-inline checkbox-primary">
                                                                    <input type="checkbox" checked="checked">
                                                                    <span></span>
                                                                </label>
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('Right &amp; Left Checkbox Addon')}}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <label class="checkbox checkbox-inline">
                                                                    <input type="checkbox" checked="checked">
                                                                    <span></span>
                                                                </label>
                                                            </span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="{{__('Text input with checkbox')}}">
                                                <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <label class="checkbox checkbox-inline">
                                                                    <input type="checkbox">
                                                                    <span></span>
                                                                </label>
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('Left Radio Addon')}}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <label class="radio radio-single radio-success">
                                                                    <input type="radio" checked="checked">
                                                                    <span></span>
                                                                </label>
                                                            </span>
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="{{__('Text input with radio')}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('Right Radio Addon')}}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="{{__('Text input with radio')}}">
                                                <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <label class="radio radio-single radio-primary">
                                                                    <input type="radio" checked="checked">
                                                                    <span></span>
                                                                </label>
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>{{__('Right &amp; Left Radio Addon')}}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <label class="radio radio-single">
                                                                    <input type="radio">
                                                                    <span></span>
                                                                </label>
                                                            </span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="{{__('Text input with radio')}}">
                                                <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <label class="radio radio-single">
                                                                    <input type="radio">
                                                                    <span></span>
                                                                </label>
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
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
                                                <h4>{{__('Input group with buttons')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group">
                                            <label>{{__('Left Addon Button')}}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-soft-primary" type="button">{{__('Go!')}}</button>
                                                </div>
                                                <input type="text" class="form-control" placeholder="{{__('Search for...')}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('Right Addon Button')}}</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="{{__('Search for...')}}">
                                                <div class="input-group-append">
                                                    <button class="btn btn-soft-secondary" type="button">{{__('Go!')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('Left &amp; Right Addon Button')}}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-danger" type="button">{{__('Go!')}}</button>
                                                </div>
                                                <input type="text" class="form-control" placeholder="{{__('Search for...')}}">
                                                <div class="input-group-append">
                                                    <button class="btn btn-soft-danger" type="button">{{__('o!')}}G</button>
                                                </div>
                                            </div>
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
                                                <h4>{{__('Input group with dropdowns')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group">
                                            <label>{{__('Left Button Dropdown')}}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-soft-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('Action')}} <i class="las la-angle-down"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                        <div role="separator" class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">{{__('Separated link')}}</a>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Text input with dropdown button">
                                            </div>
                                            <span class="form-text text-muted">{{__('Some help content goes here')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('Right Button Dropdown')}}</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" aria-label="{{__('Forms')}}Text input with dropdown button">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-soft-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('Action')}} <i class="las la-angle-down"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                        <div role="separator" class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">{{__('Separated link')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="form-text text-muted">{{__('Some help content goes here')}}</span>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>{{__('Left &amp; Right Button Dropdown')}}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('Action')}} <i class="las la-angle-down"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                        <div role="separator" class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">{{__('Separated link')}}</a>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" aria-label="{{__('Text input with dropdown button')}}">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-soft-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('Action')}} <i class="las la-angle-down"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                        <div role="separator" class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">{{__('Separated link')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="form-text text-muted">{{__('Some help content goes here')}}</span>
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
