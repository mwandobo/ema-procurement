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
                                                                    <h5 class="text-center"><strong>Register New Member</strong>


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
                                                                                action="{{route('member_sports_update', $id)}}"
                                                                                enctype="multipart/form-data"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('PUT')

                                                                                <ul id="progressbar">
                                                                                    <li class="active" id="account">
                                                                                        <strong>Sports</strong>
                                                                                    </li>
                                                                                </ul>

                                                                                <fieldset class="tab" id = "tab-1">
                                                                                    <div class="form-card">
                                                                                        <h5 class="fs-title mb-4">
                                                                                            Sports Information</h5>
                                                                                            
                                                                                             <label
                                                                                            class="pay">Sports*</label>
                                                                                        <table class="table mb-0">
                                                                                            <thead class="thead-light">
                                                                                                <tr>
                                                                                                    <th>#</th>
                                                                                                    <th>{{__('SPORTS PLAYED')}}
                                                                                                    </th>
                                                                                                    <th>{{__('YEARS PLAYED')}}
                                                                                                    </th>
                                                                                                    <th>{{__('LeVEL')}}
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                            @foreach($sports as $data)
                                                                                                <tr>
                                                                                                    <th scope="row">{{$loop->iteration }}
                                                                                                    </th>
                                                                                                    <td>
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="sport_name[]"
                                                                                                            value="{{ !empty($data) ? $data->sport_name : ''}}">
                                                                                                    </td>
                                                                                                    <td><input
                                                                                                            type="number"
                                                                                                            name="years_played[]"
                                                                                                            value="{{ !empty($data) ? $data->years_played : ''}}"
                                                                                                            class="form-control mb-3" />
                                                                                                    </td>
                                                                                                    <td> <select
                                                                                                            class="list-dt form-control mb-3"
                                                                                                            id="month"
                                                                                                            name="level[]">
                                                                                                            <option value="{{$data->level}}">{{$data->level}}</option>
                                                                                                            <option>
                                                                                                                BEGINNER
                                                                                                            </option>
                                                                                                            <option>
                                                                                                                AVERAGE
                                                                                                            </option>
                                                                                                            <option>
                                                                                                                ABOVE
                                                                                                                AVERAGE
                                                                                                            </option>
                                                                                                        </select></td>
                                                                                                </tr>
                                                                                                
                                                                                                @endforeach
                                                                                                
                                                                                            </tbody>
                                                                                        </table>

                                                                                    <input type="submit"
                                                                                        name="make_payment2"
                                                                                        id="saveButton2"
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