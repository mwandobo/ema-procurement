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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Forms')}}Validation</span></li>
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
                                                <h4>{{__('Forms')}}Single Input Validation</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area validation-container">
                                        <div class="form-group row">
                                            <div class="text-right col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                <label class="col-form-label">{{__('Forms')}}Text Input Validation</label>
                                            </div>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <form class="form simple-example text-right" action="javascript:void(0);" novalidate>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="name" placeholder="{{__('Forms')}}Please enter your name" value="" required>
                                                        <div class="valid-feedback">
                                                            {{__('Forms')}}Success!
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            {{__('Forms')}}Please enter your name
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <button type="submit" class="btn btn-sm  btn-primary mr-2">{{__('Forms')}}Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="text-right col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                <label class="col-form-label">{{__('Forms')}}Email Input Validation</label>
                                            </div>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <form class="form email-form text-right" action="javascript:void(0);" novalidate>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" id="email" placeholder="{{__('Forms')}}Please enter your email" value="" required>
                                                        <div class="valid-feedback">
                                                            {{__('Forms')}}Success!
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            {{__('Forms')}}Please enter your email
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <button type="submit" class="btn btn-sm  btn-primary mr-2">{{__('Forms')}}Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="text-right col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                <label class="col-form-label">{{__('Forms')}}Select Validation</label>
                                            </div>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <form class="form select-form text-right" action="javascript:void(0);" novalidate>
                                                    <div class="form-group">
                                                        <select class="form-control" required>
                                                            <option value="">{{__('Forms')}}Select a value</option>
                                                            <option value="1">CSS</option>
                                                            <option value="2">HTML</option>
                                                            <option value="3">{{__('Forms')}}Javascript</option>
                                                        </select>
                                                        <div class="valid-feedback">
                                                            {{__('Forms')}}Success!
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            {{__('Forms')}}Please select a value
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <button type="submit" class="btn btn-sm  btn-primary mr-2">{{__('Forms')}}Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="text-right col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                <label class="col-form-label">{{__('Forms')}}Checkbox Validation</label>
                                            </div>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <form class="form checkbox-form text-right" action="javascript:void(0);" >
                                                    <div class="form-group text-left mb-0 mt-2 text-black">
                                                        <input type="checkbox" name="gender" value="Male" class="mr-1"> {{__('Forms')}}I agree to the terms and conditions
                                                        <div class="valid-feedback">
                                                            {{__('Forms')}}Success!
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            {{__('Forms')}}Please check this
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <input type="button" class="btn btn-sm btn-primary mr-2" name="SubmitButton" value="{{__('Forms')}}Submit" onClick="validateCheck(this.form)">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="text-right col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                <label class="col-form-label">{{__('Forms')}}Radio Validation</label>
                                            </div>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <form class="form radio-form text-right" action="javascript:void(0);" >
                                                    <div class="form-group text-left mb-0 mt-2">
                                                        <div class="d-flex align-center">
                                                            <div class="d-flex align-center mr-4">
                                                                <label for="s1" class="mb-0 mr-2 text-black">{{__('Forms')}}Yes</label>
                                                                <input type="radio" id="radio1" name="yesno" value="1"/>
                                                            </div>
                                                            <div class="d-flex align-center">
                                                                <label for="s2" class="mb-0 mr-2 text-black">{{__('Forms')}}No</label>
                                                                <input type="radio" id="radio2" name="yesno" value="2"/>
                                                            </div>
                                                        </div>
                                                        <div class="valid-feedback">
                                                            {{__('Forms')}}Success!
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            {{__('Forms')}}Please select a value
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <input type="button" class="btn btn-sm btn-primary mr-2" name="SubmitButton" value="{{__('Forms')}}Submit" onClick="validateRadio()">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="text-right col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                <label class="col-form-label">{{__('Forms')}}Textarea Validation</label>
                                            </div>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <form class="form textarea-form text-right" action="javascript:void(0);" >
                                                    <div class="form-group text-left mb-0 mt-2">
                                                        <textarea id="textarea" class="form-control"></textarea>
                                                        <div class="valid-feedback">
                                                            {{__('Forms')}} Success!
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            {{__('Forms')}}Please type something
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <input type="button" class="btn btn-sm btn-primary mr-2" name="SubmitButton" value="{{__('Forms')}}Submit" onClick="validateTextarea()">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Forms')}}Validation State</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <div class="text-right col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                <label class="col-form-label">{{__('Forms')}}Error</label>
                                            </div>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <form class="form" action="javascript:void(0);" novalidate>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-error" id="name" placeholder="{{__('Forms')}}Please enter your name" value="" required>
                                                        <div class="invalid-feedback d-block">
                                                            {{__('Forms')}}Please enter your name
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="text-right col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                <label class="col-form-label">{{__('Forms')}}Success</label>
                                            </div>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <form class="form" action="javascript:void(0);" novalidate>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-success" id="name" placeholder="{{__('Forms')}}Please enter your name" value="John Snow" required>
                                                        <div class="valid-feedback d-block">
                                                            {{__('Forms')}}That's a nice name !
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Forms')}}Form Validation</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <form class="needs-validation" novalidate action="javascript:void(0);">
                                                    <div class="form-row">
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustom01">{{__('Forms')}}First name</label>
                                                            <input type="text" class="form-control" id="validationCustom01" placeholder="{{__('Forms')}}First name" value="John" required>
                                                            <div class="valid-feedback">
                                                                {{__('Forms')}}Success!
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustom02">{{__('Forms')}}Last name</label>
                                                            <input type="text" class="form-control" id="validationCustom02" placeholder="{{__('Forms')}}Last name" value="Snow" required>
                                                            <div class="valid-feedback">
                                                                {{__('Forms')}}Success!
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-4">
                                                            <label for="validationCustomUsername">{{__('Forms')}}Username</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                                </div>
                                                                <input type="text" class="form-control" id="validationCustomUsername" placeholder="{{__('Forms')}}Username" aria-describedby="inputGroupPrepend" required>
                                                                <div class="invalid-feedback">
                                                                    {{__('Forms')}}Please choose a username.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-4">
                                                            <label for="validationCustom03">{{__('Forms')}}City</label>
                                                            <input type="text" class="form-control" id="validationCustom03" placeholder="{{__('Forms')}}City" required>
                                                            <div class="invalid-feedback">
                                                                {{__('Forms')}} Please provide a valid city.
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mb-4">
                                                            <label for="validationCustom04">{{__('Forms')}}State</label>
                                                            <input type="text" class="form-control" id="validationCustom04" placeholder="{{__('Forms')}}State" required>
                                                            <div class="invalid-feedback">
                                                                {{__('Forms')}}Please provide a valid state.
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mb-4">
                                                            <label for="validationCustom05">Zip</label>
                                                            <input type="text" class="form-control" id="validationCustom05" placeholder="{{__('Forms')}}Zip" required>
                                                            <div class="invalid-feedback">
                                                                {{__('Forms')}}Please provide a valid zip.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <div class="form-check pl-0">
                                                            <div class="custom-control custom-checkbox checkbox-success">
                                                                <input type="checkbox" class="custom-control-input" id="invalidCheck" required>
                                                                <label class="custom-control-label" for="invalidCheck">{{__('Forms')}}Agree to terms and conditions</label>
                                                                <div class="invalid-feedback">
                                                                    {{__('Forms')}}Please check the box
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary mt-3" type="submit">{{__('Forms')}}Submit form</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Forms')}}Validation Type</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <div class="text-right col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                <label class="col-form-label">{{__('Forms')}}Required Field</label>
                                            </div>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <form class="form simple-example text-right" action="javascript:void(0);" novalidate>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="name" placeholder="{{__('Forms')}}Please enter your name" value="" required>
                                                        <div class="valid-feedback">
                                                            {{__('Forms')}}Success!
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            {{__('Forms')}}Please enter your name
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <button type="submit" class="btn btn-sm  btn-primary mr-2">{{__('Forms')}}Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="text-right col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                <label class="col-form-label">{{__('Forms')}}Password Validation</label>
                                            </div>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <form class="form pwd-checking text-right" action="javascript:void(0);" novalidate>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" id="pwd" placeholder="" value="" required>
                                                        <div class="valid-feedback" id="validPasswordField2">
                                                            {{__('Forms')}}Success!
                                                        </div>
                                                        <div class="invalid-feedback" id="invalidPasswordField2">
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <input type="button" class="btn btn-sm btn-primary mr-2" name="SubmitButton" value="{{__('Forms')}}Submit" onClick="validatePassword()">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="text-right col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                <label class="col-form-label">{{__('Forms')}}Field Matching</label>
                                            </div>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <form class="form field-matching text-right" action="javascript:void(0);" novalidate>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" id="pwd1" placeholder="{{__('Forms')}}Password" value="" required>
                                                        <input type="password" class="form-control mt-2" id="pwd2" placeholder="{{__('Forms')}}Confirm Password" value="" required>
                                                        <div class="valid-feedback" id="validPasswordField">
                                                            {{__('Forms')}}Success!
                                                        </div>
                                                        <div class="invalid-feedback" id="invalidPasswordField"></div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <input type="button" class="btn btn-sm btn-primary mr-2" name="SubmitButton" value="{{__('Forms')}}Submit" onClick="validatePasswordMatch()">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="text-right col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                <label class="col-form-label">{{__('Forms')}}URL Checking</label>
                                            </div>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <form class="form url-checking text-right" action="javascript:void(0);" novalidate>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="urlID" placeholder="{{__('Forms')}}Please enter an URL" value="" required>
                                                        <div class="valid-feedback">
                                                            {{__('Forms')}}Success!
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            {{__('Forms')}}Invalid URL
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <input type="button" class="btn btn-sm btn-primary mr-2" name="SubmitButton" value="{{__('Forms')}}Submit" onClick="isURL()">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="text-right col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                <label class="col-form-label">{{__('Forms')}}Only Numbers</label>
                                            </div>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <form class="form number-checking text-right" action="javascript:void(0);" novalidate>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="numberID" placeholder="{{__('Forms')}}Please enter a number" value="" required>
                                                        <div class="valid-feedback">
                                                            {{__('Forms')}}Success!
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            {{__('Forms')}}Only numeric values are allowed
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <input type="button" class="btn btn-sm btn-primary mr-2" name="SubmitButton" value="{{__('Forms')}}Submit" onClick="validateNumeric()">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="text-right col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                <label class="col-form-label">{{__('Forms')}}Min 6 Characters</label>
                                            </div>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <form class="form min-checking text-right" action="javascript:void(0);" novalidate>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="minID" placeholder="" value="" required>
                                                        <div class="valid-feedback">
                                                            {{__('Forms')}} Success!
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            {{__('Forms')}}Minimum 6 characters required
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <input type="button" class="btn btn-sm btn-primary mr-2" name="SubmitButton" value="{{__('Forms')}}Submit" onClick="validateMin()">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="text-right col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                <label class="col-form-label">{{__('Forms')}}Max 6 Characters</label>
                                            </div>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <form class="form max-checking text-right" action="javascript:void(0);" novalidate>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="maxID" placeholder="" value="" required>
                                                        <div class="valid-feedback">
                                                            {{__('Forms')}}Success!
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            {{__('Forms')}}Maximum 6 characters required
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <input type="button" class="btn btn-sm btn-primary mr-2" name="SubmitButton" value="{{__('Forms')}}Submit" onClick="validateMax()">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
    {!! Html::script('assets/js/forms/forms-validation.js') !!}
@endpush

@push('custom-scripts')

@endpush
