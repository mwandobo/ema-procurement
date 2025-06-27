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
                        <h4> Member - Personal Information</h4>
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
                                                                        
                                                                        @if(isset($data->id))
                                                                       <form id="msform" name="msform"
                                                                                action="{{route('member_reg_admin_updates', $data->id)}}"
                                                                                enctype="multipart/form-data"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                        @else
                                                                        <form id="msform" name="msform"
                                                                                action="{{route('member_reg_admin')}}"
                                                                                enctype="multipart/form-data"
                                                                                method="POST">
                                                                                @csrf
                                                                        @endif
                                                                            
                                                      
                                                                               
                                                                                  
                                                                                       
                                                                                        <div class="row">

                                                                                            <div class="col-md-6">
                                                                                                <label class="pay">Full
                                                                                                    Name*</label>
                                                                                                <input type="text"
                                                                                                    name="full_name"
                                                                                                    id="full_name"
                                                                                                    required
                                                                                                    placeholder="Full Name"
                                                                                                    value="{{ !empty($data) ? $data->full_name : ''}}"
                                                                                                    class="form-control mb-3 @error('full_name') is-invalid @enderror"  />
                                                                                                    @error('full_name')
                                                                                                    <div
                                                                                                        class="alert alert-danger">
                                                                                                        {{ $message }}</div>
                                                                                                    @enderror
                                                                                            </div>
                                                                                            
                                                                                             <div class="col-md-6">
                                                                                                <label class="pay">
                                                                                                    Member ID*</label>

                                                                                                    @if(!empty(auth()->user()->member_id))
                                                                                                       <input type="text"
                                                                                                    name="member_id"
                                                                                                    required
                                                                                                    id="member_id"
                                                                                                    placeholder="Member ID"
                                                                                                    value="{{ !empty($data) ? $data->member_id : ''}}"
                                                                                                    class="form-control mb-3"  readonly/>
                                                                                                       @else
                                                                                                <input type="text"
                                                                                                    name="member_id"
                                                                                                    required
                                                                                                    id="member_id"
                                                                                                    placeholder="Member ID"
                                                                                                    value="{{ !empty($data) ? $data->member_id : ''}}"
                                                                                                    class="form-control mb-3 @error('member_id') is-invalid @enderror"  />
                                                                                                    @error('member_id')
                                                                                                    <div
                                                                                                        class="alert alert-danger">
                                                                                                        {{ $message }}</div>
                                                                                                    @enderror
                                                                                            </div>
                                                                                                     @endif
                                                                                        
                                                                                        </div>


                                                                                        
                                                                                        <div class="row">
                                                                                        
                                                                                        <div class="col-md-6">
                                                                                        <label class="pay">Select Type
                                                                                            of
                                                                                            Membership*</label>
                                                                                        <select
                                                                                            class="m-b form-control membership_class"
                                                                                            name="membership_class">
                                                                                            <option selected>Select
                                                                                                Class of Membership
                                                                                            </option>
                                                                                            @if(!empty($membership_type))
                                                                                                    @foreach($membership_type as $row)
                                                                                                    <option value="{{$row->id}}" @if(isset($data)) {{ $data->membership_class == $row->id  ? 'selected' : ''}}  @endif>{{$row->name}}</option>
                                                                                                   @endforeach
                                                                                                 @endif
                                                                                        </select>
                                                                                    </div>
                                                                                    
                                                                                        
                                                                                            <div class="col-md-6">
                                                                                                <label
                                                                                                    class="pay">Nationality*</label>
                                                                                                  <select  id="nationality" name="nationality" class=" m-b form-control ">
                                                                                                  <option value ="">Select Nationality</option>
                                                                                                                     @if(!empty($country))
                                                                                                                    @foreach($country as $row)
                                                                                                                    <option @if(isset($data)) {{ $data->nationality == $row->name  ? 'selected' : ''}}  @endif value="{{$row->name}}">{{$row->name}}</option>
                                                                                                                    @endforeach
                                                                                                                    @endif
                                                                                                                </select>
                                                                                            </div>
                                                                                             </div>
                                                                                            <br>

                                                                              <input type="hidden" class="form-control cor"  value="{{ $corp->id}}">
                                                                                                       
                                                                                                        

                                                                                      @if(!empty($data->corporate_name))
                                                                                         <div class="row" id="corporate">
                                                                                            <div class="col-md-12">
                                                                                               <label class="">
                                                                                                   Corporate Name *</label>
                                                                                                    <input type="text"
                                                                                                        name="corporate_name" value="{{ !empty($data) ? $data->corporate_name : ''}}"
                                                                                                        placeholder=" Corporate Name"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                                                                                                                     
                                                                                            </div>                                                                                      

                                                                                         @else
                                                                                          <div class="row" id="corporate" style="display:none;">
                                                                                            <div class="col-md-12">
                                                                                               <label class="">
                                                                                                   Corporate Name *</label>
                                                                                                    <input type="text"
                                                                                                        name="corporate_name" value="{{ !empty($data) ? $data->corporate_name : ''}}"
                                                                                                        placeholder=" Corporate Name"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                                                                                                                     
                                                                                            </div>
                                                                                           @endif

                                                                                       <br>
                                                                                     
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <label class="pay">Birth
                                                                                                    Date</label>
                                                                                                <input type="date"
                                                                                                    name="d_o_birth"
                                                                                                    value="{{ !empty($data) ? $data->d_o_birth : ''}}"
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
                                                                                                            {{(!empty($data))?($data->gender=='Male')?'checked':'':''}}
                                                                                                            id="rdo-1"
                                                                                                            name="gender">
                                                                                                       
                                                                                                        <span>{{__('Male')}}</span>&nbsp&nbsp
                                                                                                    </label>
                                                                                                    <label for="rdo-2"
                                                                                                        class="btn-radio">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            value="Female"
                                                                                                            {{(!empty($data))?($data->gender=='Female')?'checked':'':''}}
                                                                                                            id="rdo-2"
                                                                                                            name="gender">
                                                                                                        
                                                                                                        <span>{{__('Female')}}</span>
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div></div>
                                                                                        

                                                                                         <div class="row">
                                                                                            <div class="col-md-6">
                                                                                               <label class="">
                                                                                                   Contact No *</label>
                                                                                                    <input type="text"
                                                                                                        name="phone1" value="{{ !empty($data) ? $data->phone1 : ''}}"
                                                                                                        placeholder="Contact No1."
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                           
                                                                                            <div class="col-md-6">
                                                                                                <label class="">
                                                                                                   Other Contact No </label>
                                                                                                    <input type="text"
                                                                                                        name="phone2" value="{{ !empty($data) ? $data->phone2 : ''}}"
                                                                                                        placeholder="Other Contacts"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                       
                                                                                  <br>

                                                                                     <div class="row">
                                                                                        <div class="col-md-6">
                                                                                                <label class="">
                                                                                                    Email*</label>
                                                                                            <input type="text"
                                                                                                name="email" 
                                                                                                value="{{ !empty($data) ? $data->email : ''}}"
                                                                                                class="form-control email"
                                                                                                placeholder="Email">
                                                                                       
                                                                                        <div class=""> <p class="form-control-static" id="errors" style="text-align:center;color:red;"></p>   </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                                <label
                                                                                                    class="pay">Address</label>
                                                                                                <textarea type="text"
                                                                                                    name="address"
                                                                                                    
                                                                                                    placeholder=""
                                                                                                    class="form-control mb-3"
                                                                                                    rows="3">{{ !empty($data) ? $data->address : ''}}</textarea>

                                                                                            </div> </div>



                                                                                      
                                                                                         <div class="row">
                                                                           <div class="col-md-6">
                                                                                                <label class="pay">Membership Due
                                                                                                    Date *</label>
                                                                                                <input type="date"
                                                                                                    name="due_date"
                                                                                                    value="{{ !empty($data) ? $data->due_date : ''}}"
                                                                                                    placeholder="" required
                                                                                                    class="form-control mb-3"
                                                                                                    rows="3">

                                                                                            </div>

                                                                                            <div class="col-md-6">
                                                                                        <label
                                                                                            class="">Upload
                                                                                           Passport Size </label>
                                                                                        
                                                                                            @if(!@empty($data->picture))
                                                                                              <input type="file"
                                                                                                name="picture"
                                                                                                value="{{$data->picture }}"
                                                                                                class="form-control"
                                                                                                onchange="loadBigFile(event)"><br>
                                                                                            <img src="{{url('assets/img/member_pasport_size')}}/{{!empty($data->picture)? $data->picture : '' }}"
                                                                                                alt="{{$data->picture}}"
                                                                                                width="100"><br>
                                                                                            
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

                                                                                     
                                                                                     <br>
                                                                                    
                                                                                     <div class="row">
                                                                                        
                                                                                        <div class="col-md-6">
                                                                                        <label class="pay">Select Whether
                                                                                            You Have Dependant Or Not
                                                                                            </label>
                                                                                        <select
                                                                                            class=" m-b list-dt form-control mb-3 membership_class23"
                                                                                            name="dependant_option">
                                                                                            <option selected>Select
                                                                                                Dependant Option...
                                                                                            </option>
                                                                                            <option value="1">Yes</option>
                                                                                            <option value="2">No</option>
                                                                                                  
                                                                                        </select>
                                                                                        </div>
                                                                                    
                                                                                       
                                                                                        
                                                                                         <div class="col-md-6">
                                                                                                <label
                                                                                                    class="pay">Dependant Name/Member ID</label>
                                                                                                  <select  id="depends_on" name="depends_on" class=" m-b list-dt form-control mb-3 ">
                                                                                                  <option value ="">Select/Search Dependant Name/Member ID</option>
                                                                                                                     @if(!empty($members))
                                                                                                                    @foreach($members as $row)
                                                                                                                <option value="{{$row->id}}">{{$row->full_name}}-{{$row->member_id}}</option>
                                                                                                                    @endforeach
                                                                                                                    @endif
                                                                                                                </select>
                                                                                            
                                                                                            
                                                                                        </div>
                                                                                        </div>

                                                                           <br>
                                                                           <div class="row">

                                                                                            <div class="col-md-6">
                                                                                        <label class="pay">State briefly
                                                                                            your reason for
                                                                                            wanting to become a member
                                                                                            of the club:*</label>
                                                                                        <textarea type="text"
                                                                                            name="membership_reason"
                                                                                            placeholder=""
                                                                                            class="form-control mb-3"
                                                                                            rows="3">{{ !empty($data) ? $data->membership_reason : ''}}</textarea>
                                                                                           </div>
                                                                                          <div class="col-md-6">
                                                                                        <label class="pay">State here
                                                                                            any other information
                                                                                            you feel may assist your
                                                                                            application:*</label>
                                                                                        <textarea type="text"
                                                                                            name="other_info"
                                                                                            placeholder=""
                                                                                            class="form-control mb-3"
                                                                                            rows="3">{{ !empty($data) ? $data->other_info : ''}}</textarea>
                                                                                    </div></div>

                                                                                 

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



<script>
$(document).ready(function() {

    $(document).on('change', '.membership_class', function() {
        var id = $(this).val();
  console.log(id);

 var cor= $('.cor').val();

 if (id == cor){  
     $("#corporate").css("display", "block");   

}

else{
  $("#corporate").css("display", "none");   

}
    
    });



});

</script>
@endpush