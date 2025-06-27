@extends('layout.master')

@push('plugin-styles')

<style>

.help-block {
  color:red;

}
.has-error {
  background-color:#f8d7da;

}

</style>

@endpush


@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Member - Business Information</h4>
                    </div>



<!-- Main Body Starts -->
<div class="card-body">

<div class="row">
<div class="col-sm-12 ">

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


                                                               
                                                                                           <p class="">*- Fill all required fields</p><br>
                                                                        
                                                                        @if(isset($id))
                                                                       <form id="msform" name="msform"
                                                                                action="{{route('member_business_updates', $data->id)}}"
                                                                                enctype="multipart/form-data"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                        @else
                                                                        <form id="msform" name="msform"
                                                                                action="{{route('member_business_insert')}}"
                                                                                enctype="multipart/form-data"
                                                                                method="POST">
                                                                                @csrf
                                                                        @endif
                                                                            
       
                                                                                     <div class="row">
                                                                                        <input type="hidden"
                                                                                                    name="member_id"
                                                                                                    value="{{ $member_id }}"/>
                                                                                        </div>    
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <label
                                                                                                    class="pay">Business
                                                                                                    Name*</label>
                                                                                                <input type="text"
                                                                                                    name="business_name"
                                                                                                    value="{{ !empty($data) ? $data->business_name : ''}}"
                                                                                                    placeholder="Business Name"
                                                                                                    class="form-control mb-3" />
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <label
                                                                                                    class="pay">Business
                                                                                                    address*</label>
                                                                                                <input type="text"
                                                                                                    name="business_address"
                                                                                                    value="{{ !empty($data) ? $data->business_address : ''}}"
                                                                                                    placeholder="Business address"
                                                                                                    class="form-control mb-3" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <label
                                                                                                    class="pay">Employer*</label>
                                                                                                <input type="text"
                                                                                                    name="employer"
                                                                                                    placeholder="Employer"
                                                                                                    value="{{ !empty($data) ? $data->employer : ''}}"
                                                                                                    class="form-control mb-3" />
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <label
                                                                                                    class="pay">Designation*</label>
                                                                                                <input type="text"
                                                                                                    name="designation"
                                                                                                    placeholder="Designation"
                                                                                                    value="{{ !empty($data) ? $data->designation : ''}}"
                                                                                                    class="form-control mb-3" />
                                                                                            </div>
                                                                                        </div>
                                                                             <div class="form-group row">
                                                    <div class="col-lg-offset-2 col-lg-12">
                                                          @if(isset($id))
                                                                                    <input type="submit"
                                                                                        name="make_payment2"
                                                                                        id="saveButton2"
                                                                                        class=" action-button btn btn-primary float-right m-t-n-xs"
                                                                                        value="Update" />
                                                                                
                                                                                    @else
                                                                                    <input type="submit"
                                                                                        name="make_payment"
                                                                                        id="saveButton"
                                                                                        class=" action-button btn btn-primary float-right m-t-n-xs"
                                                                                        value="Save" />
                                                                                    @endif
                                                    </div>
                                                </div>
                                                                                  

                                                                            </form>


                                                                       </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


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

    $(document).on('change', '.membership_class23', function() {


        var id = $(this).val();

        if (id == 2) {
            $('#family23').hide();
        } else if (id == 1) {
            $('#family23').show();
        }
        else{
            $('#family23').hide();
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