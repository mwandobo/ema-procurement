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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Forms')}}Layouts</span></li>
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
                                                <h4>{{__('Forms')}}Vertical Form Layout</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <form>
                                                    <div class="form-group mb-2">
                                                        <label class="col-form-label">{{__('Forms')}}Name</label>
                                                        <input type="text" class="form-control" id="name" placeholder="" value="" required>
                                                        <span class="form-text text-muted">{{__('Forms')}}Please enter your full name</span>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label class="col-form-label">{{__('Forms')}}Email</label>
                                                        <input type="text" class="form-control" id="name" placeholder="" value="" required>
                                                        <span class="form-text text-muted">{{__('Forms')}}Please enter your email address</span>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label class="col-form-label">{{__('Forms')}}Password</label>
                                                        <input type="password" class="form-control" id="name" placeholder="" value="" required>
                                                        <span class="form-text text-muted">{{__('Forms')}}Please enter a password</span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-footer text-right">
                                        <button type="reset" class="btn btn-primary mr-2">{{__('Forms')}}Submit</button>
                                        <button type="reset" class="btn btn-outline-primary">{{__('Forms')}}Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Forms')}}Horizontal Form Layout</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <div class="col-lg-3 col-sm-12">
                                                <label class="col-form-label">{{__('Forms')}}Name</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="name" placeholder="" value="" required="">
                                                    <span class="form-text text-muted">{{__('Forms')}}Please enter your full name</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-3 col-sm-12">
                                                <label class="col-form-label">{{__('Forms')}}Email</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="name" placeholder="" value="" required="">
                                                    <span class="form-text text-muted">{{__('Forms')}}Please enter your email address</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-3 col-sm-12">
                                                <label class="col-form-label">{{__('Forms')}}Password</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" id="name" placeholder="" value="" required="">
                                                    <span class="form-text text-muted">{{__('Forms')}}Please enter a password</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="login-one-inputs check mb-2">
                                                    <input class="inp-cbx" id="cbx" type="checkbox" style="display: none">
                                                    <label class="cbx" for="cbx">
                                                                <span>
                                                                    <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                    </svg>
                                                                </span>
                                                        <span class="text-light-black">{{__('Forms')}}I agree to the terms and conditions</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-footer text-right">
                                        <button type="reset" class="btn btn-primary mr-2">{{__('Forms')}}Submit</button>
                                        <button type="reset" class="btn btn-outline-primary">{{__('Forms')}}Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Forms')}}Grid Form Layout (2 Columns)</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="w-100">
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{__('Forms')}}Full Name:</label>
                                                    <input type="email" class="form-control" placeholder="Enter full name">
                                                    <span class="form-text text-muted">{{__('Forms')}}Please enter your full name</span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>{{__('Forms')}}Contact Number:</label>
                                                    <input type="email" class="form-control" placeholder="Enter contact number">
                                                    <span class="form-text text-muted">{{__('Forms')}}Please enter your contact number</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{__('Forms')}}Address:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="{{__('Forms')}}Enter your address">
                                                        <div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-map-marker"></i>
																	</span>
                                                        </div>
                                                    </div>
                                                    <span class="form-text text-muted">{{__('Forms')}}Please enter your address</span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Postcode:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="{{__('Forms')}}Enter your postcode">
                                                        <div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-bookmark-o"></i>
																	</span>
                                                        </div>
                                                    </div>
                                                    <span class="form-text text-muted">{{__('Forms')}}Please enter your postcode</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-footer text-right">
                                        <button type="reset" class="btn btn-primary mr-2">{{__('Forms')}}Submit</button>
                                        <button type="reset" class="btn btn-outline-primary">{{__('Forms')}}Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Forms')}}Grid Form Layout (3 Columns)</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="w-100">
                                            <div class="form-group row">
                                                <div class="col-lg-4">
                                                    <label>{{__('Forms')}}Full Name:</label>
                                                    <input type="email" class="form-control" placeholder="{{__('Forms')}}Enter full name">
                                                    <span class="form-text text-muted">{{__('Forms')}}Please enter your full name</span>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>{{__('Forms')}}Email:</label>
                                                    <input type="email" class="form-control" placeholder="{{__('Forms')}}Enter email">
                                                    <span class="form-text text-muted">{{__('Forms')}}Please enter your email</span>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>Username:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="la la-user"></i>
																	</span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="">
                                                    </div>
                                                    <span class="form-text text-muted">{{__('Forms')}}Please enter your username</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-4">
                                                    <label>{{__('Forms')}}Contact:</label>
                                                    <input type="email" class="form-control" placeholder="{{__('Forms')}}Enter contact number">
                                                    <span class="form-text text-muted">{{__('Forms')}}Please enter your contact</span>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>{{__('Forms')}}Fax:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="la la-info-circle"></i>
																	</span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="{{__('Forms')}}Fax number">
                                                    </div>
                                                    <span class="form-text text-muted">{{__('Forms')}}Please enter fax</span>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>{{__('Forms')}}Address:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="{{__('Forms')}}Enter your address">
                                                        <div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-map-marker"></i>
																	</span>
                                                        </div>
                                                    </div>
                                                    <span class="form-text text-muted">{{__('Forms')}}Please enter your address</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-footer text-right">
                                        <button type="reset" class="btn btn-primary mr-2">{{__('Forms')}}Submit</button>
                                        <button type="reset" class="btn btn-outline-primary">{{__('Forms')}}Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <div class="makeitSticky z">
                                                    <h4>{{__('Forms')}}General Form</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="w-100">
                                            <div class="mt-2">
                                                <div class="form-group row">
                                                    <label class="col-3">{{__('Forms')}}First Name</label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-solid" type="text" value="{{__('Forms')}}John">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-3">{{__('Forms')}}Last Name</label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-solid" type="text" value="{{__('Forms')}}Snow">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-3">{{__('Forms')}}Company Name</label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-solid" type="text" value="{{__('Forms')}}Magenta Company">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-3">{{__('Forms')}}Phone</label>
                                                    <div class="col-9">
                                                        <div class="input-group input-group-solid">
                                                            <div class="input-group-prepend">
																		<span class="input-group-text">
																			<i class="la la-phone"></i>
																		</span>
                                                            </div>
                                                            <input type="text" class="form-control form-control-solid" value="{{__('Forms')}}820475845" placeholder="{{__('Forms')}}Phone">
                                                        </div>
                                                        <span class="form-text text-muted">{{__('Forms')}}Don't include your country code.</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-3">{{__('Forms')}}Email Address</label>
                                                    <div class="col-9">
                                                        <div class="input-group input-group-solid">
                                                            <div class="input-group-prepend">
																		<span class="input-group-text">
																			<i class="la la-at"></i>
																		</span>
                                                            </div>
                                                            <input type="text" class="form-control form-control-solid" value="{{__('Forms')}}john@mail.com" placeholder="{{__('Forms')}}Email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-3">{{__('Forms')}}Address Line 1</label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-solid" type="text" value="{{__('Forms')}}P.O. Box 283 8562 Fusce Rd.">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-3">{{__('Forms')}}Address Line 2</label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-solid" type="text" value="{{__('Forms')}}8562 Fusce Rd.">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-3">{{__('Forms')}}City</label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-solid" type="text" value="{{__('Forms')}}Roseville ">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-3">{{__('Forms')}}State / Province / Region</label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-solid" type="text" value="NH ">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-3">{{__('Forms')}}Zip / Postal Code</label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-solid" type="text" value="11523">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-footer text-right">
                                        <button type="reset" class="btn btn-primary mr-2">{{__('Forms')}}Submit</button>
                                        <button type="reset" class="btn btn-outline-primary">{{__('Forms')}}Cancel</button>
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
    {!! Html::script('assets/js/forms/forms-layouts.js') !!}
@endpush

@push('custom-scripts')

@endpush
