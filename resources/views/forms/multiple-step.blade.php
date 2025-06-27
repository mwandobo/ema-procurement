@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/forms/form-widgets.css') !!}
    {!! Html::style('assets/css/forms/multiple-step.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Forms')}}Multiple Step</span></li>
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
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Forms')}}Step Type 1</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="card multiple-form-one px-0 pb-0 mb-3">
                                                    <h5 class="text-center"><strong>{{__('Forms')}}Sign Up Your User Account</strong></h5>
                                                    <p class="text-center">{{__('Forms')}}Fill all form field to go to next step</p>
                                                    <div class="row">
                                                        <div class="col-md-12 mx-0">
                                                            <form id="msform">
                                                                <ul id="progressbar">
                                                                    <li class="active" id="account"><strong>{{__('Forms')}}Account</strong></li>
                                                                    <li id="personal"><strong>{{__('Forms')}}Personal</strong></li>
                                                                    <li id="payment"><strong>{{__('Forms')}}Payment</strong></li>
                                                                    <li id="confirm"><strong>{{__('Forms')}}Finish</strong></li>
                                                                </ul>
                                                                <fieldset>
                                                                    <div class="form-card">
                                                                        <h5 class="fs-title mb-4">{{__('Forms')}}Account Information</h5>
                                                                        <div class="input-group mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text font-17">@</span>
                                                                            </div>
                                                                            <input type="text" name="email" class="form-control" placeholder="Email">
                                                                        </div>
                                                                        <input type="text" name="uname" placeholder="{{__('Forms')}}UserName" class="form-control"/>
                                                                        <span class="form-text text-muted mb-3">{{__('Forms')}}Username can't include your name</span>
                                                                        <input type="password" name="pwd" placeholder="{{__('Forms')}}Password" class="form-control"/>
                                                                        <span class="form-text text-muted mb-3">{{__('Forms')}}Password must have 8 characters</span>
                                                                        <input type="password" name="cpwd" placeholder="Confirm Password" class="form-control mb-3"/>
                                                                    </div>
                                                                    <input type="button" name="next" class="next action-button btn btn-primary" value="{{__('Forms')}}Next Step" />
                                                                </fieldset>
                                                                <fieldset>
                                                                    <div class="form-card">
                                                                        <h5 class="fs-title mb-4">{{__('Forms')}}Personal Information</h5>
                                                                        <input type="text" name="fname" placeholder="{{__('Forms')}}First Name"  class="form-control mb-3" />
                                                                        <input type="text" name="lname" placeholder="{{__('Forms')}}Last Name"  class="form-control mb-3" />
                                                                        <div class="input-group mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="las la-phone-volume font-17"></i></span>
                                                                            </div>
                                                                            <input type="text" name="phno" placeholder="{{__('Forms')}}Contact No."  class="form-control" />
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="las la-phone font-17"></i></span>
                                                                            </div>
                                                                            <input type="text" name="phno_2" placeholder="{{__('Forms')}}Alternate Contact No." class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                    <input type="button" name="previous" class="previous action-button-previous btn btn-outline-primary" value="{{__('Forms')}}Previous" />
                                                                    <input type="button" name="next" class="next action-button btn btn-primary" value="{{__('Forms')}}Next Step" />
                                                                </fieldset>
                                                                <fieldset>
                                                                    <div class="form-card">
                                                                        <h5 class="fs-title mb-4">{{__('Forms')}}Account Information</h5>
                                                                        <div class="radio-group">
                                                                            <div class='radio' data-value="credit">
                                                                                <img src="{{ url('assets/img/form-card-img.png') }}">
                                                                            </div>
                                                                            <div class='radio' data-value="paypal">
                                                                                <img src="{{ url('assets/img/form-pg-img.png') }}">
                                                                            </div>
                                                                            <br>
                                                                        </div>
                                                                        <label class="pay">{{__('Forms')}}Card Holder Name*</label>
                                                                        <input type="text" name="{{__('Forms')}}holdername" placeholder="" class="form-control mb-3"/>
                                                                        <div class="row">
                                                                            <div class="col-md-9">
                                                                                <label class="pay">{{__('Forms')}}Card Number*</label>
                                                                                <input type="text" name="{{__('Forms')}}cardno" placeholder="" class="form-control mb-3"/>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <label class="pay">CVC*</label>
                                                                                <input type="password" name="cvcpwd" placeholder="***" class="form-control mb-3"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-2 align-center d-flex">
                                                                                <label class="pay mb-0">{{__('Forms')}}Expiry Date*</label>
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                <select class="list-dt" id="month" name="expmonth">
                                                                                    <option selected>{{__('Forms')}}Month</option>
                                                                                    <option>{{__('Forms')}}January</option>
                                                                                    <option>{{__('Forms')}}February</option>
                                                                                    <option>{{__('Forms')}}March</option>
                                                                                    <option>{{__('Forms')}}April</option>
                                                                                    <option>{{__('Forms')}}May</option>
                                                                                    <option>{{__('Forms')}}June</option>
                                                                                    <option>{{__('Forms')}}July</option>
                                                                                    <option>{{__('Forms')}}August</option>
                                                                                    <option>{{__('Forms')}}September</option>
                                                                                    <option>{{__('Forms')}}vOctober</option>
                                                                                    <option>{{__('Forms')}}November</option>
                                                                                    <option>{{__('Forms')}}December</option>
                                                                                </select>
                                                                                <select class="list-dt" id="year" name="expyear">
                                                                                    <option selected>{{__('Forms')}}Year</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="button" name="previous" class="previous action-button-previous btn btn-outline-primary" value="{{__('Forms')}}Previous" />
                                                                    <input type="button" name="make_payment" class="next action-button btn btn-primary" value="{{__('Forms')}}Confirm" />
                                                                </fieldset>
                                                                <fieldset>
                                                                    <div class="form-card">
                                                                        <h5 class="fs-title mb-4 text-center">{{__('Forms')}}Congrats !</h5><br>
                                                                        <div class="row justify-content-center">
                                                                            <div class="col-md-3">
                                                                                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>
                                                                            </div>
                                                                        </div> <br><br>
                                                                        <div class="row justify-content-center">
                                                                            <div class="col-md-7 text-center">
                                                                                <p>{{__('Forms')}}You Have Successfully Signed Up</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Step Type 2</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="card multiple-form-two px-0 pb-0 mb-3">
                                                    <h5 class="text-center"><strong>{{__('Forms')}}Sign Up Your User Account</strong></h5>
                                                    <p class="text-center">{{__('Forms')}}Fill all form field to go to next step</p>
                                                    <form id="msform">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div> <br>
                                                        <fieldset>
                                                            <div class="form-card">
                                                                <div class="row">
                                                                    <div class="col-7">
                                                                        <h2 class="fs-title mb-4">{{__('Forms')}}Account Information:</h2>
                                                                    </div>
                                                                    <div class="col-5">
                                                                        <h2 class="steps">{{__('Forms')}}Step 1 - 4</h2>
                                                                    </div>
                                                                </div>
                                                                <label class="fieldlabels">{{__('Forms')}}Email</label>
                                                                <input type="email" name="email" placeholder="" class="form-control mb-3"/>
                                                                <label class="fieldlabels">{{__('Forms')}}Username</label>
                                                                <input type="text" name="uname" placeholder="{{__('Forms')}}Username can't include your name" class="form-control mb-3"/>
                                                                <label class="fieldlabels">{{__('Forms')}}Password</label>
                                                                <input type="password" name="pwd" placeholder="{{__('Forms')}}Password must have atleast 8 characters" class="form-control mb-3"/>
                                                                <label class="fieldlabels">{{__('Forms')}}Confirm Password</label>
                                                                <input type="password" name="cpwd" placeholder="" class="form-control mb-3"/>
                                                            </div>
                                                            <input type="button" name="next" class="next action-button btn btn-primary" value="{{__('Forms')}}Next" />
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="form-card">
                                                                <div class="row">
                                                                    <div class="col-7">
                                                                        <h2 class="fs-title mb-4">{{__('Forms')}}Personal Information:</h2>
                                                                    </div>
                                                                    <div class="col-5">
                                                                        <h2 class="steps">{{__('Forms')}}Step 2 - 4</h2>
                                                                    </div>
                                                                </div>
                                                                <label class="fieldlabels">{{__('Forms')}}First Name</label>
                                                                <input type="text" name="fname" placeholder="" class="form-control mb-3"/>
                                                                <label class="fieldlabels">{{__('Forms')}}Last Name</label>
                                                                <input type="text" name="lname" placeholder="" class="form-control mb-3"/>
                                                                <label class="fieldlabels">{{__('Forms')}}Contact No</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="las la-phone-volume font-17"></i></span>
                                                                    </div>
                                                                    <input type="text" name="phno" placeholder=""  class="form-control" />
                                                                </div>
                                                                <label class="fieldlabels">{{__('Forms')}}Alternate Contact No</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="las la-phone font-17"></i></span>
                                                                    </div>
                                                                    <input type="text" name="phno_2" placeholder="" class="form-control" />
                                                                </div>
                                                            </div>
                                                            <input type="button" name="previous" class="previous action-button-previous btn btn-outline-primary" value="{{__('Forms')}}Previous" />
                                                            <input type="button" name="next" class="next action-button btn btn-primary" value="{{__('Forms')}}Next" />
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="form-card">
                                                                <div class="row">
                                                                    <div class="col-7">
                                                                        <h2 class="fs-title mb-4">{{__('Forms')}}Image Upload:</h2>
                                                                    </div>
                                                                    <div class="col-5">
                                                                        <h2 class="steps">{{__('Forms')}}Step 3 - 4</h2>
                                                                    </div>
                                                                </div>
                                                                <div class="attached-files">
                                                                    <img id="image-preview" width="320">
                                                                </div>
                                                                <label for="file-upload" class="custom-file-upload mb-0">
                                                                    <a title="Attach a file" class="mr-2 pointer text-primary">
                                                                        <i class="las la-paperclip font-20"></i>
                                                                        <span class="font-17">{{__('Forms')}}Click here to attach an image</span>
                                                                    </a>
                                                                </label>
                                                                <input id="file-upload" name='upload_cont_img' type="file" accept="image/*" style="display:none;" onchange="handleFileChange()">
                                                            </div>
                                                            <input type="button" name="previous" class="previous action-button-previous btn btn-outline-primary" value="{{__('Forms')}}Previous" />
                                                            <input type="button" name="next" class="next action-button btn btn-primary" value="{{__('Forms')}}Next" />
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="form-card">
                                                                <div class="row">
                                                                    <div class="col-7">
                                                                        <h2 class="fs-title mb-4">{{__('Forms')}}Finish:</h2>
                                                                    </div>
                                                                    <div class="col-5">
                                                                        <h2 class="steps">{{__('Forms')}}Step 4 - 4</h2>
                                                                    </div>
                                                                </div> <br><br>
                                                                <h5 class="fs-title mb-4 text-center">{{__('Forms')}}Congrats !</h5><br>
                                                                <div class="row justify-content-center">
                                                                    <div class="col-3">
                                                                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>
                                                                    </div>
                                                                </div> <br><br>
                                                                <div class="row justify-content-center">
                                                                    <div class="col-7 text-center">
                                                                        <p>{{__('Forms')}}You Have Successfully Signed Up</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
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
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/forms/multiple-step.js') !!}
@endpush

@push('custom-scripts')

@endpush
