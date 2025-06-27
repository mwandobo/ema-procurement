@extends('layout.master-auth')

@push('plugin-styles')
    {!! Html::style('assets/css/forms/form-widgets.css') !!}
    {!! Html::style('assets/css/forms/multiple-step.css') !!}
    {!! Html::style('assets/css/forms/radio-theme.css') !!}
    {!! Html::style('assets/css/tables/tables.css') !!}


@endpush


@section('content')
    <!-- Main Body Starts -->
    <div class="login-one">
        <div class="container-fluid login-one-container">
            <div class="p-30 h-100">
                <div class="row main-login-one h-100">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 p-0">
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
                                                    <li class="breadcrumb-item"><a href="javascript:void(0);"></a></li>
                                                    <li class="breadcrumb-item active" aria-current="page"><span>Cooperate Membership
                                                        Application Form</span>
                                                    </li>
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
                                                        <div class="widget-content widget-content-area">
                                                            <div class="form-group row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="card multiple-form-one px-0 pb-0 mb-3">
                                                                        <h5 class="text-center"><strong>Sign Up</strong>
                                                                        </h5>
                                                                        <p class="text-center">Fill all required
                                                                            fields</p>
                                                                        <p>
                                                                        @if ($errors->any())
                                                                            <div class="alert alert-danger">
                                                                                <ul>
                                                                                    @foreach ($errors->all() as $error)
                                                                                        <li>{{ $error }}</li>
                                                                                    @endforeach

                                                                                </ul>
                                                                            </div>
                                                                            @endif
                                                                            </p>
                                                                            @if ($message = Session::get('success'))

                                                                                <div class="alert alert-success">

                                                                                    <p>{{ $message }}</p>

                                                                                </div>

                                                                            @endif
                                                                        <div class="row">
                                                                            <div class="col-md-12 mx-0">
                                                                                <form id="msform"
                                                                                      action="{{route('register2.store')}}"
                                                                                      enctype="multipart/form-data"
                                                                                      method="POST">
                                                                                    @csrf
                                                                                    <ul id="progressbar">
                                                                                        <li class="active" id="account">
                                                                                            <strong>Personal Details</strong>
                                                                                        </li>
                                                                                        <li id="personal">
                                                                                            <strong>Application / Declaration</strong>
                                                                                        </li>
                                                                                        <li id="payment"><strong>Mandatory
                                                                                                Attachments</strong></li>
                                                                                        <li id="confirm">
                                                                                            <strong>Last Step</strong>
                                                                                        </li>
                                                                                    </ul>

                                                                                    <fieldset>
                                                                                        <div class="form-card">
                                                                                            <h5 class="fs-title mb-4">
                                                                                                Cooperate
                                                                                                Information</h5>

                                                                                            <div class="row">
                                                                                                <div class="col-md-6">
                                                                                                    <label class="pay">Company
                                                                                                        Name*</label>
                                                                                                    <input type="text"
                                                                                                           name="cname"
                                                                                                           id="cname"
                                                                                                           placeholder="Company Name"
                                                                                                           class="form-control  mb-3 @error('cname') is-invalid @enderror"/>
                                                                                                    @error('cname')
                                                                                                    <div
                                                                                                        class="alert alert-danger">
                                                                                                        {{ $message }}</div>
                                                                                                    @enderror
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <label class="pay">Type Of
                                                                                                        Organization*</label>
                                                                                                    <input type="text"
                                                                                                           name="organization"
                                                                                                           placeholder="Organization Type"
                                                                                                           class="form-control mb-3"/>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-md-6">
                                                                                                    <label
                                                                                                        class="pay">Date of incorporation / Registration*</label>
                                                                                                    <input type="date"
                                                                                                           name="regDate"
                                                                                                           placeholder="Registration Date"
                                                                                                           class="form-control mb-3"/>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <label
                                                                                                        class="pay">Certificate of incorporation / Registration No</label>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="regNo"
                                                                                                        placeholder="Registration No"
                                                                                                        class="form-control mb-3"
                                                                                                        />

                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="row">
                                                                                                <div class="col-md-6">
                                                                                                    <label
                                                                                                        class="pay">Number of Employees*</label>
                                                                                                    <input type="number"
                                                                                                           name="employeeNo"
                                                                                                           placeholder="Employees Number"
                                                                                                           class="form-control mb-3"/>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <label
                                                                                                        class="pay">Current registered head Office</label>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="regHead"
                                                                                                        placeholder="Head Officer"
                                                                                                        class="form-control mb-3"
                                                                                                    />

                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="row">
                                                                                                <div class="col-md-3">
                                                                                                    <label
                                                                                                        class="pay">P.O.BOX *</label>
                                                                                                    <input type="text"
                                                                                                           name="employeeBox"
                                                                                                           placeholder="Employees P.O.BOX"
                                                                                                           class="form-control mb-3"/>
                                                                                                </div>

                                                                                                <div class="col-md-3">
                                                                                                    <label class="pay">TIN No.
                                                                                                        *</label>
                                                                                                    <input type="text"
                                                                                                           name="tinNo"
                                                                                                           placeholder="TIN Number"
                                                                                                           class="form-control mb-3"/>
                                                                                                </div>

                                                                                                <div class="col-md-3">
                                                                                                    <label class="pay">Phone No.
                                                                                                        *</label>
                                                                                                    <div
                                                                                                        class="input-group mb-3">
                                                                                                        <div
                                                                                                            class="input-group-prepend">
                                                                                                        <span
                                                                                                            class="input-group-text"><i
                                                                                                                class="las la-phone-volume font-17"></i></span>
                                                                                                        </div>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            name="phone"
                                                                                                            placeholder="Phone No."
                                                                                                            class="form-control"/>
                                                                                                    </div>
                                                                                                </div>


                                                                                            </div>

                                                                                            <label>{{__("Contact Person's Details")}}</label>

                                                                                            <div
                                                                                                class="input-group mb-3">
                                                                                                <div
                                                                                                    class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text font-17">Name</span>
                                                                                                </div>
                                                                                                <input type="text"
                                                                                                       name="contactName"
                                                                                                       class="form-control"
                                                                                                       placeholder="Contact Personal Name">
                                                                                            </div>

                                                                                            <div
                                                                                                class="input-group mb-3">
                                                                                                <div
                                                                                                    class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text font-17">@Email</span>
                                                                                                </div>
                                                                                                <input type="text"
                                                                                                       name="email"
                                                                                                       class="form-control"
                                                                                                       placeholder="Email">
                                                                                            </div>

                                                                                            <div
                                                                                                class="input-group mb-3">
                                                                                                <div
                                                                                                    class="input-group-prepend">
                                                                                                        <span
                                                                                                            class="input-group-text"><i
                                                                                                                class="las la-phone-volume font-17"></i></span>
                                                                                                </div>
                                                                                                <input
                                                                                                    type="text"
                                                                                                    name="personalPhone"
                                                                                                    placeholder="Personal Phone No."
                                                                                                    class="form-control"/>
                                                                                            </div>

                                                                                                                                                                                   </div>

                                                                                        <input type="button" name="next"
                                                                                               class="next action-button btn btn-primary"
                                                                                                value="Next Step"/>
                                                                                    </fieldset>
                                                                                    <fieldset>
                                                                                        <div class="form-card">

                                                                                            <label> <span class="font-17">We whose particulars have been stated hereinabove, being reputable entity existing in Tanzania
                                                                                                , apply to be Cooperate member of the club, with all rights and privileges accorded to that category of membership.
                                                                                                </span>
                                                                                            </label>

                                                                                            <label> <span class="font-17">We, hereby undertake to pay all relevant fees and subscription within
                                                                                                    14 days of the grant of this application, failure of which this application and any approval hereon shall lapse. </span>
                                                                                            </label>

                                                                                            <br>
                                                                                            <br>
                                                                                            <label
                                                                                                class="pay">Application Made in*</label>
                                                                                            <input type="text"
                                                                                                   name="application"
                                                                                                   class="form-control mb-3"/>

                                                                                            <label class="pay">Date
                                                                                                *</label>
                                                                                            <input type="date"
                                                                                                   name="applicationDate"
                                                                                                   class="form-control mb-3"/>

                                                                                            <label
                                                                                                class="pay">Name of authorized Signatory*</label>
                                                                                            <input type="text"
                                                                                                   name="authorizedName"
                                                                                                   class="form-control mb-3"/>

                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input" type="checkbox" value="agree" id="flexCheckDefault" name="agree">
                                                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                                                    I agree on all the above
                                                                                                </label>
                                                                                            </div>

                                                                                        </div>


                                                                                        <input type="button"
                                                                                               name="previous"
                                                                                               class="previous action-button-previous btn btn-outline-primary"
                                                                                               value="Previous"/>
                                                                                        <input type="button" name="next"
                                                                                               class="next action-button btn btn-primary"
                                                                                               value="Next Step"/>
                                                                                    </fieldset>

                                                                                    <fieldset>
                                                                                        <div class="form-card">
                                                                                            <div
                                                                                                class="input-group mb-3">
                                                                                                <div
                                                                                                    class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text font-17">Certificate of incorporation</span>
                                                                                                </div>
                                                                                                <input type="file"
                                                                                                       name="incorporationCertificate"
                                                                                                       class="form-control"
                                                                                                />


                                                                                            </div>

                                                                                            <div
                                                                                                class="input-group mb-3">
                                                                                                <div
                                                                                                    class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text font-17">TIN Certificate</span>
                                                                                                </div>
                                                                                                <input type="file"
                                                                                                       name="tinCertificate"
                                                                                                       class="form-control"
                                                                                                />


                                                                                            </div>


                                                                                            <div
                                                                                                class="input-group mb-3">
                                                                                                <div
                                                                                                    class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text font-17">Business License</span>
                                                                                                </div>
                                                                                                <input type="file"
                                                                                                       name="businessLicense"
                                                                                                       class="form-control"
                                                                                                />


                                                                                            </div>

                                                                                            <div
                                                                                                class="input-group mb-3">
                                                                                                <div
                                                                                                    class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text font-17">Brief Organization's Profile</span>
                                                                                                </div>
                                                                                                <input type="file"
                                                                                                       name="organizationProfile"
                                                                                                       class="form-control"
                                                                                                />


                                                                                            </div>

                                                                                            <div
                                                                                                class="input-group mb-3">
                                                                                                <div
                                                                                                    class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text font-14">Filled Membership forms for each employee including their spouse and children if they have any</span>
                                                                                                </div>
                                                                                                <input type="file"
                                                                                                       name="membership"
                                                                                                       class="form-control"
                                                                                                />


                                                                                            </div>

                                                                                            <label class="pay">Other relevant information(please explain below)*</label>
                                                                                            <textarea type="text"
                                                                                                      name="infoRelevant"
                                                                                                      placeholder=""
                                                                                                      class="form-control mb-3"
                                                                                                      rows="5"></textarea>

                                                                                        </div>


                                                                                        <input type="button"
                                                                                               name="previous"
                                                                                               class="previous action-button-previous btn btn-outline-primary"
                                                                                               value="Previous"/>
                                                                                        <input type="button" name="next"
                                                                                               class="next action-button btn btn-primary"
                                                                                               value="Next Step"/>
                                                                                    </fieldset>

                                                                                    <fieldset>
                                                                                        <div class="form-card">
                                                                                            <h5 class="fs-title mb-4">
                                                                                                SLOTS REQUESTED / ADDITIONAL SLOT
                                                                                                </h5>

                                                                                            <label> <span>
                                                                                                   The minimum slots / persons allowed under Cooperate Membership is limited to five (5) persons/slots per corporate member. </span>

                                                                                            </label>

                                                                                            <label class="pay">If more than 5 state reason for additional slots below*</label>
                                                                                            <textarea type="text"
                                                                                                      name="reasons"
                                                                                                      placeholder=""
                                                                                                      class="form-control mb-3"
                                                                                                      rows="5"></textarea>
                                                                                            <h5 class="fs-title mb-4">
                                                                                                EMPLOYEES DETAILS
                                                                                            </h5>
                                                                                            <br>
                                                                                <div>
                                                                                            <button type="button" name="add"
                                                                                                    class="btn btn-success btn-xs add"><i class="fas fa-plus">
                                                                                                    Add Employees</i></button><br>
                                                                                            <br>
                                                                                            <div class="table-responsive">
                                                                                                <table class="table table-bordered" id="cart">
                                                                                                    <thead>
                                                                                                    <tr>
                                                                                                        <th>EMPLOYEE FIRST NAME</th>
                                                                                                        <th>EMPLOYEE LAST NAME</th>
                                                                                                        <th>EMPLOYEE EMAIL</th>
                                                                                                        <th>EMPLOYEE POSITION</th>
                                                                                                        <th>EMPLOYEE MOBILE NUMBER</th>
                                                                                                        <th>EMPLOYEE PICTURE</th>

                                                                                                        <th>Action</th>
                                                                                                    </tr>
                                                                                                    </thead>
                                                                                                    <tbody>


                                                                                                    </tbody>

                                                                                                </table>
                                                                                            </div>

                                                                                        </div>


{{--                                                                                            <table class="table mb-0 " id="cart23">--}}
{{--                                                                                                <thead--}}
{{--                                                                                                    class="thead-light">--}}
{{--                                                                                                <tr>--}}
{{--                                                                                                    <th>#</th>--}}
{{--                                                                                                    <th>{{__('NAME')}}--}}
{{--                                                                                                    </th>--}}
{{--                                                                                                    <th>{{__('POSITION')}}--}}
{{--                                                                                                    </th>--}}
{{--                                                                                                    <th>{{__('MOBILE NUMBER')}}--}}
{{--                                                                                                    </th>--}}

{{--                                                                                                    <th>{{__('Action')}}--}}
{{--                                                                                                    </th>--}}
{{--                                                                                                </tr>--}}
{{--                                                                                                </thead>--}}
{{--                                                                                                <tbody>--}}
{{--                                                                                                <tr>--}}
{{--                                                                                                    <th scope="row">1--}}
{{--                                                                                                    </th>--}}
{{--                                                                                                    <td>--}}
{{--                                                                                                        <input--}}
{{--                                                                                                            type="text"--}}
{{--                                                                                                            name="employeeName[]"--}}
{{--                                                                                                            placeholder="Enter Employee Name"--}}
{{--                                                                                                            class="form-control mb-3"/>--}}
{{--                                                                                                    </td>--}}
{{--                                                                                                    <td><input--}}
{{--                                                                                                            type="text"--}}
{{--                                                                                                            name="employeePosition[]"--}}
{{--                                                                                                            placeholder="Enter Employee Position"--}}
{{--                                                                                                            class="form-control mb-3"/>--}}
{{--                                                                                                    </td>--}}
{{--                                                                                                    <td>--}}
{{--                                                                                                        <input--}}
{{--                                                                                                            type="tel"--}}
{{--                                                                                                            name="employeePhone[]"--}}
{{--                                                                                                            placeholder="Enter Mobile Number"--}}
{{--                                                                                                            class="form-control mb-3"/>--}}
{{--                                                                                                    </td>--}}

{{--                                                                                                    <td>--}}
{{--                                                                                                        Action--}}
{{--                                                                                                    </td>--}}
{{--                                                                                                </tr>--}}
{{--                                                                                                <tr>--}}
{{--                                                                                                    <th scope="row">2--}}
{{--                                                                                                    </th>--}}
{{--                                                                                                    <td>--}}
{{--                                                                                                        <input--}}
{{--                                                                                                            type="text"--}}
{{--                                                                                                            name="employeeName[]"--}}
{{--                                                                                                            placeholder="Enter Employee Name"--}}
{{--                                                                                                            class="form-control mb-3"/>--}}
{{--                                                                                                    </td>--}}
{{--                                                                                                    <td><input--}}
{{--                                                                                                            type="text"--}}
{{--                                                                                                            name="employeePosition[]"--}}
{{--                                                                                                            placeholder="Enter Employee Position"--}}
{{--                                                                                                            class="form-control mb-3"/>--}}
{{--                                                                                                    </td>--}}
{{--                                                                                                    <td>--}}
{{--                                                                                                        <input--}}
{{--                                                                                                            type="tel"--}}
{{--                                                                                                            name="employeePhone[]"--}}
{{--                                                                                                            placeholder="Enter Mobile Number"--}}
{{--                                                                                                            class="form-control mb-3"/>--}}
{{--                                                                                                    </td>--}}

{{--                                                                                                    <td>--}}
{{--                                                                                                        Action--}}
{{--                                                                                                    </td>--}}
{{--                                                                                                </tr>--}}
{{--                                                                                                <tr>--}}
{{--                                                                                                    <th scope="row">3--}}
{{--                                                                                                    </th>--}}
{{--                                                                                                    <td>--}}
{{--                                                                                                        <input--}}
{{--                                                                                                            type="text"--}}
{{--                                                                                                            name="employeeName[]"--}}
{{--                                                                                                            placeholder="Enter Employee Name"--}}
{{--                                                                                                            class="form-control mb-3"/>--}}
{{--                                                                                                    </td>--}}
{{--                                                                                                    <td><input--}}
{{--                                                                                                            type="text"--}}
{{--                                                                                                            name="employeePosition[]"--}}
{{--                                                                                                            placeholder="Enter Employee Position"--}}
{{--                                                                                                            class="form-control mb-3"/>--}}
{{--                                                                                                    </td>--}}
{{--                                                                                                    <td>--}}
{{--                                                                                                        <input--}}
{{--                                                                                                            type="tel"--}}
{{--                                                                                                            name="employeePhone[]"--}}
{{--                                                                                                            placeholder="Enter Mobile Number"--}}
{{--                                                                                                            class="form-control mb-3"/>--}}
{{--                                                                                                    </td>--}}

{{--                                                                                                    <td>--}}
{{--                                                                                                        Action--}}
{{--                                                                                                    </td>--}}
{{--                                                                                                </tr>--}}
{{--                                                                                                <tr>--}}
{{--                                                                                                    <th scope="row">4--}}
{{--                                                                                                    </th>--}}
{{--                                                                                                    <td>--}}
{{--                                                                                                        <input--}}
{{--                                                                                                            type="text"--}}
{{--                                                                                                            name="employeeName[]"--}}
{{--                                                                                                            placeholder="Enter Employee Name"--}}
{{--                                                                                                            class="form-control mb-3"/>--}}
{{--                                                                                                    </td>--}}
{{--                                                                                                    <td><input--}}
{{--                                                                                                            type="text"--}}
{{--                                                                                                            name="employeePosition[]"--}}
{{--                                                                                                            placeholder="Enter Employee Position"--}}
{{--                                                                                                            class="form-control mb-3"/>--}}
{{--                                                                                                    </td>--}}
{{--                                                                                                    <td>--}}
{{--                                                                                                        <input--}}
{{--                                                                                                            type="tel"--}}
{{--                                                                                                            name="employeePhone[]"--}}
{{--                                                                                                            placeholder="Enter Mobile Number"--}}
{{--                                                                                                            class="form-control mb-3"/>--}}
{{--                                                                                                    </td>--}}

{{--                                                                                                    <td>--}}
{{--                                                                                                        Action--}}
{{--                                                                                                    </td>--}}
{{--                                                                                                </tr>--}}
{{--                                                                                                <tr>--}}
{{--                                                                                                    <th scope="row">5--}}
{{--                                                                                                    </th>--}}
{{--                                                                                                    <td>--}}
{{--                                                                                                        <input--}}
{{--                                                                                                            type="text"--}}
{{--                                                                                                            name="employeeName[]"--}}
{{--                                                                                                            placeholder="Enter Employee Name"--}}
{{--                                                                                                            class="form-control mb-3"/>--}}
{{--                                                                                                    </td>--}}
{{--                                                                                                    <td><input--}}
{{--                                                                                                            type="text"--}}
{{--                                                                                                            name="employeePosition[]"--}}
{{--                                                                                                            placeholder="Enter Employee Position"--}}
{{--                                                                                                            class="form-control mb-3"/>--}}
{{--                                                                                                    </td>--}}
{{--                                                                                                    <td>--}}
{{--                                                                                                        <input--}}
{{--                                                                                                            type="tel"--}}
{{--                                                                                                            name="employeePhone[]"--}}
{{--                                                                                                            placeholder="Enter Mobile Number"--}}
{{--                                                                                                            class="form-control mb-3"/>--}}
{{--                                                                                                    </td>--}}

{{--                                                                                                    <td>--}}
{{--                                                                                                        Action--}}
{{--                                                                                                    </td>--}}

{{--                                                                                                </tr>--}}
{{--                                                                                                </tbody>--}}
{{--                                                                                            </table>--}}
                                                                                            <br>


                                                                                        </div>
                                                                                        <input type="button"
                                                                                               name="previous"
                                                                                               class="previous action-button-previous btn btn-outline-primary"
                                                                                               value="Previous"/>
                                                                                        <input type="submit"
                                                                                               name="make_payment"
                                                                                               id="saveButton"
                                                                                               class=" action-button btn btn-primary"
                                                                                               value="Save"/>
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
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>


        function validateForm() {
            //alert('hi')

            let x = document.getElementById('cname')
            let y = $('#cname').val();
            if (x == "") {

                return false;
            }
            alert(y);
        }
    </script>

    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/forms/multiple-step.js') !!}
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
@endpush
@push('custom-scripts')

<script>
  var loadBigFile=function(event){
    var output=document.getElementById('big_output');
    output.src=URL.createObjectURL(event.target.files[0]);
  };
</script>

    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('change', '.membership_class', function() {

                alert("hi")
                var id = $(this).val();
                var total = $('#qty').val();
                $.ajax({
                    url: '{{url("member_class")}}',
                    type: "GET",
                    data: {
                        id: id,
                        total: total,
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $("#data").empty();
                        $.each(response,function(key, value)
                        {

                            $('#data').html(response.html);

                        });

                    }

                });


            });  });
    </script>
    <script type="text/javascript">

        $(document).ready(function(){


            var count = 0;


            function autoCalcSetup() {
                $('table#cart').jAutoCalc('destroy');
                $('table#cart tr.line_items').jAutoCalc({keyEventsFire: true, decimalPlaces: 2, emptyAsZero: true});
                $('table#cart').jAutoCalc({decimalPlaces: 2});
            }
            autoCalcSetup();

            $('.add1').on("change", function(e) {
                alert('hi')
            });
            $('.add').on("click", function(e) {

                count++;
                var html = '';
                html += '<tr class="line_items">';

                html += '<td><input type="text" name="employeeFirstName[]" class="form-control item_quantity" data-category_id="'+count+'"placeholder ="Employee First Name" id ="quantity"  /></td>';
                html += '<td><input type="text" name="employeeLastName[]" class="form-control item_quantity" data-category_id="'+count+'"placeholder ="Employee Last Name" id ="quantity"  /></td>';
                html += '<td><input type="text" name="employeeEmail[]" class="form-control item_quantity" data-category_id="'+count+'"placeholder ="Employee Email" id ="quantity"  /></td>';
                html += '<td><input type="text" name="employeePosition[]" class="form-control item_quantity" data-category_id="'+count+'"placeholder ="Employee Position" id ="quantity"  /></td>';
                html += '<td><input type="tel" name="employeePhone[]" class="form-control item_price'+count+'" placeholder ="Mobile Number"   value=""/></td>';
                html += '<td><input type="file" name="picture" class="form-control item_quantity" onchange="loadBigFile(event)" data-category_id="'+count+'"placeholder ="Employee Picture" id ="quantity"  /> <img id="big_output" width="100"></td>';

                html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><i class="icon-file-upload"></i></button></td>';

                $('#cart > tbody').append(html);
                autoCalcSetup();
            });

            $(document).on('click', '.remove', function(){
                $(this).closest('tr').remove();
                autoCalcSetup();
            });


            $(document).on('click', '.rem', function(){
                var btn_value = $(this).attr("value");
                $(this).closest('tr').remove();
                $('tfoot').append('<input type="hidden" name="removed_id[]"  class="form-control name_list" value="'+btn_value+'"/>');
                autoCalcSetup();
            });

        });



    </script>
@endpush
