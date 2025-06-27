@extends('layout.master')

@push('plugin-styles')
{!! Html::style('assets/css/forms/form-widgets.css') !!}
{!! Html::style('assets/css/forms/multiple-step.css') !!}
{!! Html::style('assets/css/forms/radio-theme.css') !!}
{!! Html::style('assets/css/tables/tables.css') !!}
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);"></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Member Aplication Steps</span>
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
                                                <h5 class="text-center"><strong>Sign Up Your Membership Account</strong>
                                                </h5>
                                                <p class="text-center">Fill all form field to go to next step</p>
                                                <div class="row">
                                                    <div class="col-md-12 mx-0">
                                                        <form id="msform">
                                                            <ul id="progressbar">
                                                                <li class="active" id="account">
                                                                    <strong>Personal</strong>
                                                                </li>
                                                                <li id="personal"><strong>Dependants</strong></li>
                                                                <li id="payment"><strong>Other info</strong></li>
                                                                <li id="confirm"><strong>Finish</strong></li>
                                                            </ul>

                                                            <fieldset>
                                                                <div class="form-card">
                                                                    <h5 class="fs-title mb-4">Personal Information</h5>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label class="pay">First Name*</label>
                                                                            <input type="text" name="fname"
                                                                                placeholder="First Name"
                                                                                class="form-control mb-3" />
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="pay">Surname*</label>
                                                                            <input type="text" name="sname"
                                                                                placeholder="SurName"
                                                                                class="form-control mb-3" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label class="pay">Nationality*</label>
                                                                            <input type="text" name="nationality"
                                                                                placeholder="Natianality"
                                                                                class="form-control mb-3" />
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="pay">P.O. Box*</label>
                                                                            <input type="text" name="pobox"
                                                                                placeholder="P.O. Box"
                                                                                class="form-control mb-3" />
                                                                        </div>
                                                                    </div>
                                                                    <label>{{__('Gender')}}</label>
                                                                    <div class="custom-radio-1">
                                                                        <label for="rdo-1" class="btn-radio">
                                                                            <input type="radio" id="rdo-1"
                                                                                name="radio-grp">
                                                                            <svg width="20px" height="20px"
                                                                                viewBox="0 0 20 20">
                                                                                <circle cx="10" cy="10" r="9"></circle>
                                                                                <path
                                                                                    d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z"
                                                                                    class="inner"></path>
                                                                                <path
                                                                                    d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z"
                                                                                    class="outer"></path>
                                                                            </svg>
                                                                            <span>{{__('Male')}}</span>
                                                                        </label>
                                                                        <label for="rdo-2" class="btn-radio">
                                                                            <input type="radio" id="rdo-2"
                                                                                name="radio-grp">
                                                                            <svg width="20px" height="20px"
                                                                                viewBox="0 0 20 20">
                                                                                <circle cx="10" cy="10" r="9"></circle>
                                                                                <path
                                                                                    d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z"
                                                                                    class="inner"></path>
                                                                                <path
                                                                                    d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z"
                                                                                    class="outer"></path>
                                                                            </svg>
                                                                            <span>{{__('Female')}}</span>
                                                                        </label>
                                                                    </div>

                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span
                                                                                class="input-group-text font-17">@</span>
                                                                        </div>
                                                                        <input type="text" name="email"
                                                                            class="form-control" placeholder="Email">
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i
                                                                                    class="las la-phone-volume font-17"></i></span>
                                                                        </div>
                                                                        <input type="text" name="phno"
                                                                            placeholder="Contact No."
                                                                            class="form-control" />
                                                                    </div>

                                                                    <label class="pay">Select Class of
                                                                        Membership*</label>
                                                                    <select class="list-dt form-control mb-3" id="month"
                                                                        name="expmonth">
                                                                        <option selected>Select Class of Membership
                                                                        </option>
                                                                        <option>FULL FAMILY MEMBER</option>
                                                                        <option>SINGLE MEMBER</option>
                                                                        <option>TEMPORARY MEMBER</option>
                                                                        <option>JUNIOR MEMBER</option>
                                                                        <option>COUNTRY MEMBER</option>
                                                                    </select>
                                                                    <label class="pay">State briefly your reason for
                                                                        wanting to become a member of the club:*</label>
                                                                    <textarea type="text" name="holdername"
                                                                        placeholder="" class="form-control mb-3"
                                                                        rows="3"></textarea>
                                                                    <label class="pay">State here any other information
                                                                        you feel may assist your application:*</label>
                                                                    <textarea type="text" name="holdername"
                                                                        placeholder="" class="form-control mb-3"
                                                                        rows="3"></textarea>
                                                                </div>

                                                                <input type="button" name="next"
                                                                    class="next action-button btn btn-primary"
                                                                    value="Next Step" />
                                                            </fieldset>
                                                            <fieldset>
                                                                <div class="form-card">
                                                                    <h5 class="fs-title mb-4">Dependants Information
                                                                    </h5>
                                                                    <label class="pay">Spouse’s full name(If to be
                                                                        included in the membership)*</label>
                                                                    <input type="text" name="holdername"
                                                                        placeholder="Spouse’s full name"
                                                                        class="form-control mb-3" />
                                                                    <label class="pay">Names of children: (Under 18
                                                                        years of age may be included in the
                                                                        membership)*</label>

                                                                    <table class="table mb-0">
                                                                        <thead class="thead-light">
                                                                            <tr>
                                                                                <th>{{__('CHILDREN NAME')}}</th>
                                                                                <th>{{__('DATE OF BIRTH')}}</th>
                                                                                <th>{{__('ACTION')}}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="children_table_id">
                                                                            <tr>
                                                                                <td><input type="text"
                                                                                        name="children_name"
                                                                                        placeholder="Children Name"
                                                                                        class="form-control mb-3" />
                                                                                </td>
                                                                                <td> <input type="date"
                                                                                        name="designation"
                                                                                        class="form-control mb-3" />
                                                                                </td>
                                                                                {{-- <td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><i class="fas fa-trash"></i></button></td> --}}
                                                                                <td><a href="javascript:void(0);"
                                                                                        name="remove"
                                                                                        class="bs-tooltip font-20 text-danger ml-2 remove"
                                                                                        title=""
                                                                                        data-original-title="{{__('Delete')}}"><i
                                                                                            class="las la-trash"></i></a>
                                                                                </td>

                                                                            </tr>
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr class="line_items">
                                                                                <td colspan="2"></td>

                                                                                <td colspan="1"><button type="button"
                                                                                        name="add"
                                                                                        class="btn btn-success btn-xs add"><i
                                                                                            class="fas fa-plus"> Add
                                                                                            Row</i></button></td>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                                <input type="button" name="previous"
                                                                    class="previous action-button-previous btn btn-outline-primary"
                                                                    value="Previous" />
                                                                <input type="button" name="next"
                                                                    class="next action-button btn btn-primary"
                                                                    value="Next Step" />
                                                            </fieldset>
                                                            <fieldset>
                                                                <div class="form-card">
                                                                    <h5 class="fs-title mb-4">Other Information</h5>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label class="pay">Business Name*</label>
                                                                            <input type="text" name="businessname"
                                                                                placeholder="Business Name"
                                                                                class="form-control mb-3" />
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="pay">Business address*</label>
                                                                            <input type="text" name="businessaddress"
                                                                                placeholder="Business address"
                                                                                class="form-control mb-3" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label class="pay">Employer*</label>
                                                                            <input type="text" name="employer"
                                                                                placeholder="Employer"
                                                                                class="form-control mb-3" />
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="pay">Designation*</label>
                                                                            <input type="text" name="designation"
                                                                                placeholder="Designation"
                                                                                class="form-control mb-3" />
                                                                        </div>
                                                                    </div>

                                                                    <label class="pay">Sports*</label>
                                                                    <table class="table mb-0">
                                                                        <thead class="thead-light">
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>{{__('SPORTS PLAYED')}}</th>
                                                                                <th>{{__('YEARS PLAYED')}}</th>
                                                                                <th>{{__('LAVEL')}}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">1</th>
                                                                                <td>{{__('Tennis')}}</td>
                                                                                <td><input type="number"
                                                                                        name="designation"
                                                                                        placeholder="Number of Years"
                                                                                        class="form-control mb-3" />
                                                                                </td>
                                                                                <td> <select
                                                                                        class="list-dt form-control mb-3"
                                                                                        id="month" name="expmonth">
                                                                                        <option selected>Select Your
                                                                                            Lavel</option>
                                                                                        <option>BEGINNER</option>
                                                                                        <option>AVERAGE</option>
                                                                                        <option>ABOVE AVERAGE</option>
                                                                                    </select></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">2</th>
                                                                                <td>{{__('Golf (state handicap)')}}</td>
                                                                                <td><input type="number"
                                                                                        name="designation"
                                                                                        placeholder="Number of Years"
                                                                                        class="form-control mb-3" />
                                                                                </td>
                                                                                <td> <select
                                                                                        class="list-dt form-control mb-3"
                                                                                        id="month" name="expmonth">
                                                                                        <option selected>Select Your
                                                                                            Lavel</option>
                                                                                        <option>BEGINNER</option>
                                                                                        <option>AVERAGE</option>
                                                                                        <option>ABOVE AVERAGE</option>
                                                                                    </select></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">3</th>
                                                                                <td>{{__('Squash')}}</td>
                                                                                <td><input type="number"
                                                                                        name="designation"
                                                                                        placeholder="Number of Years"
                                                                                        class="form-control mb-3" />
                                                                                </td>
                                                                                <td> <select
                                                                                        class="list-dt form-control mb-3"
                                                                                        id="month" name="expmonth">
                                                                                        <option selected>Select Your
                                                                                            Lavel</option>
                                                                                        <option>BEGINNER</option>
                                                                                        <option>AVERAGE</option>
                                                                                        <option>ABOVE AVERAGE</option>
                                                                                    </select></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">4</th>
                                                                                <td>{{__('Football/Soccer')}}</td>
                                                                                <td><input type="number"
                                                                                        name="designation"
                                                                                        placeholder="Number of Years"
                                                                                        class="form-control mb-3" />
                                                                                </td>
                                                                                <td> <select
                                                                                        class="list-dt form-control mb-3"
                                                                                        id="month" name="expmonth">
                                                                                        <option selected>Select Your
                                                                                            Lavel</option>
                                                                                        <option>BEGINNER</option>
                                                                                        <option>AVERAGE</option>
                                                                                        <option>ABOVE AVERAGE</option>
                                                                                    </select></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">5</th>
                                                                                <td>{{__('Cricket')}}</td>
                                                                                <td><input type="number"
                                                                                        name="designation"
                                                                                        placeholder="Number of Years"
                                                                                        class="form-control mb-3" />
                                                                                </td>
                                                                                <td> <select
                                                                                        class="list-dt form-control mb-3"
                                                                                        id="month" name="expmonth">
                                                                                        <option selected>Select Your
                                                                                            Lavel</option>
                                                                                        <option>BEGINNER</option>
                                                                                        <option>AVERAGE</option>
                                                                                        <option>ABOVE AVERAGE</option>
                                                                                    </select></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <br>
                                                                    <label class="pay">Particulars of membership of
                                                                        other clubs, if any*</label>
                                                                    <textarea type="text" name="holdername"
                                                                        placeholder="" class="form-control mb-3"
                                                                        rows="3"></textarea>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label class="pay">Select Proposer’s
                                                                                name*</label>
                                                                            <select class="list-dt form-control mb-3"
                                                                                id="month" name="expmonth">
                                                                                <option selected>Select Proposer’s name
                                                                                </option>
                                                                                <option>FULL FAMILY MEMBER</option>
                                                                                <option>SINGLE MEMBER</option>
                                                                                <option>TEMPORARY MEMBER</option>
                                                                                <option>JUNIOR MEMBER</option>
                                                                                <option>COUNTRY MEMBER</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="pay">Select Seconder’s
                                                                                name*</label>
                                                                            <select class="list-dt form-control mb-3"
                                                                                id="month" name="expmonth">
                                                                                <option selected>Select Seconder’s name
                                                                                </option>
                                                                                <option>FULL FAMILY MEMBER</option>
                                                                                <option>SINGLE MEMBER</option>
                                                                                <option>TEMPORARY MEMBER</option>
                                                                                <option>JUNIOR MEMBER</option>
                                                                                <option>COUNTRY MEMBER</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input type="button" name="previous"
                                                                    class="previous action-button-previous btn btn-outline-primary"
                                                                    value="Previous" />
                                                                <input type="button" name="make_payment"
                                                                    class="next action-button btn btn-primary"
                                                                    value="Confirm" />
                                                            </fieldset>
                                                            <fieldset>
                                                                <div class="form-card">
                                                                    <h5 class="fs-title mb-4 text-center">Congrats !
                                                                    </h5><br>
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-md-3">
                                                                            <svg class="checkmark"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 52 52">
                                                                                <circle class="checkmark__circle"
                                                                                    cx="26" cy="26" r="25"
                                                                                    fill="none" />
                                                                                <path class="checkmark__check"
                                                                                    fill="none"
                                                                                    d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                                                            </svg>
                                                                        </div>
                                                                    </div> <br><br>
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-md-7 text-center">
                                                                            <p>You Have Successfully Signed Up</p>
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
    </div>
</div>


<!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
{!! Html::script('assets/js/forms/multiple-step.js') !!}
@endpush

@push('custom-scripts')
<Script>
var count = 1;
//function of get data when order button clickes
$(document).on("click", '.makeorder', function(e) {
    const taget_order = $(this).val();
    const json_order_details = JSON.parse(taget_order);
    $('#requred_quantiy_id').val(json_order_details.quantity);
    $('#hidden_order_id').val(json_order_details.id);
    temp_account_dropdawn = account_dropdawn.filter(data => data.crops_type.crop_name ==
        json_order_details.crop_types.crop_name);
});
$('.add').on("click", function(e) {

    var html = '';
    html += '<tr>';
    html +=
        '<td><input type="text" name="children_name" placeholder="Children Name" class="form-control mb-3"/></td>';
    html +=
        '<td> <input type="date" name="designation"  class="form-control mb-3"/></td>';
    html +=
        '<td><a href="javascript:void(0);" name="remove" class="bs-tooltip font-20 text-danger ml-2 remove" title="" data-original-title="{{__('
    Delete ')}}"><i class="las la-trash"></i></a></td>';
    html += ' </tr>';
    if (count < 4) {
        count++
        $('#children_table_id').append(html);
    }

});
$(document).on('click', '.remove', function() {
    count--
    $(this).closest('tr').remove();
});
</Script>

@endpush