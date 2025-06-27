@extends('layout.master')

@push('plugin-styles')

<!-- fonts library -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">


<link rel="stylesheet" href="{{ asset('plugins/line-awesome-1.3.0/css/line-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">


{!! Html::style('assets/css/forms/form-widgets.css') !!}
{!! Html::style('assets/css/forms/multiple-step.css') !!}
{!! Html::style('assets/css/forms/radio-theme.css') !!}
{!! Html::style('assets/css/tables/tables.css') !!}


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
.select2-container {
  border: 1px ridge  #9E9E9E;

}
.help-block {
  color:red;

}
.has-error {
  background-color:#f8d7da;

}

</style>

@endpush


@section('content')
<!-- Main Body Starts -->
<div class="login-one">
    <div class="container-fluid login-one-container">
        <div class="p-30 h-100">
            <div class="row main-login-one h-100">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 p-0">
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
                                                                    <h5 class="text-center"><strong>Edit Member Information</strong>


                                                                    </h5>
                                                                    <p class="text-center">Fill all required fields</p>
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

                                                                    <div class="row">
                                                                        <div class="col-md-12 mx-0">
                                                                            <form id="msform" name="msform"
                                                                                action="{{route('member_reg_admin_updates', $data->id)}}"
                                                                                enctype="multipart/form-data"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('PUT')

                                                                                <ul id="progressbar">
                                                                                    <li class="active" id="account">
                                                                                        <strong>Personal</strong>
                                                                                    </li>
                                                                                </ul>

                                                                                <fieldset class="tab" id = "tab-1">
                                                                                    <div class="form-card">
                                                                                        <h5 class="fs-title mb-4">
                                                                                            Personal Information</h5>

                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <label class="pay">Full
                                                                                                    Name*</label>
                                                                                                <input type="text"
                                                                                                    name="full_name"
                                                                                                    id="full_name"
                                                                                                    value="{{ old('full_name', $data->full_name) }}"
                                                                                                    class="form-control mb-3 @error('full_name') is-invalid @enderror"  />
                                                                                                    @error('full_name')
                                                                                                    <div
                                                                                                        class="alert alert-danger">
                                                                                                        {{ $message }}</div>
                                                                                                    @enderror
                                                                                            </div>
                                                                                            
                                                                                        
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <label
                                                                                                    class="pay">Nationality*</label>
                                                                                                  <select  id="nationality" name="nationality" class=" m-b list-dt form-control mb-3 " required>
                                                                                                  <option value ="">Select Nationality</option>
                                                                                                                     @if(!empty($country))
                                                                                                                     <option value="{{$data->nationality}}">{{$data->nationality}}</option>
                                                                                                                    @foreach($country as $row)
                                                                                                                    <option value="{{$row->name}}">{{$row->name}}</option>
                                                                                                                    @endforeach
                                                                                                                    @endif
                                                                                                                </select>
                                                                                            </div>

                                                                                            <div class="col-md-6">
                                                                                                <label
                                                                                                    class="pay">Address</label>
                                                                                                <textarea type="text"
                                                                                                    name="address"
                                                                                                    class="form-control mb-3"
                                                                                                    rows="3">{{ old('address', $data->address) }}</textarea>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <label class="pay">Birth
                                                                                                    Date</label>
                                                                                                <input type="date"
                                                                                                    name="d_o_birth"
                                                                                                    value="{{ old('d_o_birth', $data->d_o_birth) }}"
                                                                                                    placeholder=""
                                                                                                    class="form-control mb-3"
                                                                                                    rows="3">

                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <label>{{__('Gender')}}</label>
                                                                                                <div
                                                                                                    class="custom-radio-1">
                                                                                                    <label for="rdo-1"
                                                                                                        class="btn-radio">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            value="Male"
                                                                                                            {{ (old('gender') == 'Male') ? 'checked' : ''}}
                                                                                                            id="rdo-1"
                                                                                                            name="gender">
                                                                                                        <svg width="20px"
                                                                                                            height="20px"
                                                                                                            viewBox="0 0 20 20">
                                                                                                            <circle
                                                                                                                cx="10"
                                                                                                                cy="10"
                                                                                                                r="9">
                                                                                                            </circle>
                                                                                                            <path
                                                                                                                d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z"
                                                                                                                class="inner">
                                                                                                            </path>
                                                                                                            <path
                                                                                                                d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z"
                                                                                                                class="outer">
                                                                                                            </path>
                                                                                                        </svg>
                                                                                                        <span>{{__('Male')}}</span>
                                                                                                    </label>
                                                                                                    <label for="rdo-2"
                                                                                                        class="btn-radio">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            value="Female"
                                                                                                            {{ (old('gender') == 'Female') ? 'checked' : ''}}
                                                                                                            id="rdo-2"
                                                                                                            name="gender">
                                                                                                        <svg width="20px"
                                                                                                            height="20px"
                                                                                                            viewBox="0 0 20 20">
                                                                                                            <circle
                                                                                                                cx="10"
                                                                                                                cy="10"
                                                                                                                r="9">
                                                                                                            </circle>
                                                                                                            <path
                                                                                                                d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z"
                                                                                                                class="inner">
                                                                                                            </path>
                                                                                                            <path
                                                                                                                d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z"
                                                                                                                class="outer">
                                                                                                            </path>
                                                                                                        </svg>
                                                                                                        <span>{{__('Female')}}</span>
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="input-group mb-3">
                                                                                            <div
                                                                                                class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text font-17" style="background:#17a2b8; width:30px;text-align:center;">@</span>
                                                                                            </div>
                                                                                            <input type="text"
                                                                                                name="email" 
                                                                                                class="form-control email"
                                                                                                value="{{ old('email', $data->email) }}">
                                                                                        </div>
                                                                                        <div class=""> <p class="form-control-static" id="errors" style="text-align:center;color:red;"></p>   </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div
                                                                                                    class="input-group mb-3">
                                                                                                    <div
                                                                                                        class="input-group-prepend">
                                                                                                        <span
                                                                                                            class="input-group-text" style="background:#17a2b8; width:30px;text-align:center;"><i
                                                                                                                class="las la-phone-volume font-17"></i></span>
                                                                                                    </div>
                                                                                                    <input type="text"
                                                                                                        name="phone1" value="{{old('phone1', $data->phone1)}}"
                                                                                                        placeholder="Contact No1."
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div
                                                                                                    class="input-group mb-3">
                                                                                                    <div
                                                                                                        class="input-group-prepend" style="background:#17a2b8; width:30px;text-align:center;">
                                                                                                        <span
                                                                                                            class="input-group-text"><i
                                                                                                                class="las la-phone-volume font-17"></i></span>
                                                                                                    </div>
                                                                                                    <input type="text"
                                                                                                        name="phone2" value="{{old('phone2', $data->phone2)}}"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                        <div class="form-card">
                                                                                        <label
                                                                                            class="col-lg-2 col-form-label">Upload
                                                                                           Pasport Size</label>
                                                                                        <div class="col-lg-8">
                                                                                            @if(!@empty($data->picture))
                                                                                            <img src="{{url('public/assets/img/logo')}}/{{$data->picture}}"
                                                                                                alt="{{$data->name}}"
                                                                                                width="100">
                                                                                            <input type="file"
                                                                                                name="picture"
                                                                                                value="{{$data->picture }}"
                                                                                                class="form-control"
                                                                                                onchange="loadBigFile(event)">
                                                                                            @else
                                                                                            <input type="file"
                                                                                                name="picture" 
                                                                                                class="form-control"
                                                                                                onchange="loadBigFile(event)">
                                                                                            @endif

                                                                                            <br>
                                                                                            <img id="big_output"
                                                                                                width="100">
                                                                                        </div>
                                                                                    </div>


                                                                                        <label class="pay">State briefly
                                                                                            your reason for
                                                                                            wanting to become a member
                                                                                            of the club:*</label>
                                                                                        <textarea type="text"
                                                                                            name="membership_reason"
                                                                                            placeholder=""
                                                                                            class="form-control mb-3"
                                                                                            rows="3">{{ old('membership_reason', $data->membership_reason) }}</textarea>
                                                                                        <label class="pay">State here
                                                                                            any other information
                                                                                            you feel may assist your
                                                                                            application:*</label>
                                                                                        <textarea type="text"
                                                                                            name="other_info"
                                                                                            placeholder=""
                                                                                            class="form-control mb-3"
                                                                                            rows="3">{{ old('other_info', $data->other_info) }}</textarea>
                                                                                    </div>

                                                                                    <input type="submit"
                                                                                        name="make_payment"
                                                                                        id="saveButton"
                                                                                        class=" action-button btn btn-primary"
                                                                                        value="Update" />
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


        var id = $(this).val();

        if (id == 1) {
            $('#family').show();
            $('#location').hide();
        } else if (id == 2) {
            $('#family').hide();
            $('#location').hide();
        } else if (id == 3) {
            $('#family').hide();
            $('#location').hide();
        } else if (id == 4) {
            $('#family').hide();
            $('#location').hide();
        } else if (id == 5) {
            $('#family').hide();
            $('#location').show();
        }

        // $('#data').hide();
        //var id = 2;
        // console.log('hi cons');
        // $.ajax({
        //     url: '{{url("member_class")}}',
        //     type: "GET",
        //     data: {
        //         id: id,

        //     },
        //     dataType: "json",
        //     success: function(response) {
        //         console.log('hi cons');
        //         console.log(response);
        //         $("#data").empty();
        //         // $.each(response, function(key, value) {

        //         //     $('#data').html(response.html);

        //         // });

        //     }

        // });


    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {


    var count = 0;


    function autoCalcSetup() {
        $('table#cart').jAutoCalc('destroy');
        $('table#cart tr.line_items').jAutoCalc({
            keyEventsFire: true,
            decimalPlaces: 2,
            emptyAsZero: true
        });
        $('table#cart').jAutoCalc({
            decimalPlaces: 2
        });
    }
    autoCalcSetup();


    $('.add').on("click", function(e) {

        count++;
        var html = '';
        html += '<tr class="line_items">';

        html +=
            '<td><input type="text" name="name[]" class="form-control item_quantity" data-category_id="' +
            count + '"placeholder ="full name" id ="quantity" required /></td>';
        html += '<td><input type="date" name="birth_date[]" class="form-control item_price' + count +
            '" placeholder ="birth date" required  value=""/></td>';

        html +=
            '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><i class="icon-file-upload"></i></button></td>';

        if (count < 5) {
            $('#cart > tbody').append(html);
        }

        autoCalcSetup();
    });

    $(document).on('click', '.remove', function() {
        $(this).closest('tr').remove();
        autoCalcSetup();
    });


    $(document).on('click', '.rem', function() {
        var btn_value = $(this).attr("value");
        $(this).closest('tr').remove();
        $('tfoot').append(
            '<input type="hidden" name="removed_id[]"  class="form-control name_list" value="' +
            btn_value + '"/>');
        autoCalcSetup();
    });

});
</script>

<script>
    $(document).ready(function() {
    
      
    
        $(document).on('change', '.email', function() {
            var id = $(this).val();
            $.ajax({
                url: '{{url("members/findEmail")}}',
                type: "GET",
                data: {
                    id: id,
                },
                dataType: "json",
                success: function(data) {
                  console.log(data);
                $("#errors").empty();
                $("#next").attr("disabled", false);
                 if (data != '') {
               $("#errors").append(data);
               $("#next").attr("disabled", true);
    } else {
      
    }
                
           
                }
    
            });
    
        });

    });
    </script>
@endpush