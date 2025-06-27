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
                                                <li class="breadcrumb-item active" aria-current="page"><span>Membership
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
                                                                    <p class="text-center">Select Registration Type</p>
                                                                    <div class="row">
                                                                        <div class="col-md-12 mx-0">
                                                                            <form id="msform"
                                                                                action="{{route('member_type')}}"
                                                                                method="POST">
                                                                                @csrf


                                                                                <fieldset>
                                                                                    <div class="form-card">
                                                                                        <h5 class="fs-title mb-4">
                                                                                            Registration Type</h5>

                                                                                        <div class="row">
                                                                                            <div class="col-md-12">

                                                                                                <select
                                                                                                    class="list-dt form-control mb-3"
                                                                                                    id="month"
                                                                                                    name="type">
                                                                                                    <option selected>
                                                                                                        Select
                                                                                                        Registration Type
                                                                                                    </option>
                                                                                                    <option value="0">Cooperate
                                                                                                    </option>
                                                                                                    <option value="1">
                                                                                                        Non-Cooperate
                                                                                                    </option>

                                                                                                </select>
                                                                                            </div>

                                                                                        </div>
                                                                                       
                                                                                     

                                                                                
                                                                                     

                                                                                       
                                                                                      
                                                                                   
                                                                                 
                                                                                    </div>

                                                                                    <input type="submit" name="next"
                                                                                        class="next1 action-button btn btn-primary"
                                                                                        o value="submit" />
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
<Script>
function validateForm() {
    //alert('hi')

    let x = document.getElementById('fname')
    let y = $('#fname').val();
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
<script src="{{ asset('assets/js/loader.js') }}"></script>
<script src="{{ asset('assets/js/libs/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('plugins/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('plugins/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/authentication/auth_1.js') }}"></script>
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

    alert("hello");
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
    // if (count < 4) {
    //     count++
    //     $('#children_table_id').append(html);
    // }

});
$(document).on('click', '.remove', function() {
    count--
    $(this).closest('tr').remove();
});
</Script>

@endpush