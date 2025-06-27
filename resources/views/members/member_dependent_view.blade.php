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
                        <h4> Member - Dependant Information</h4>
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
                                                                        
                                                                      
                                                                        <form id="msform" name="msform"
                                                                                action="{{route('member_dependent_insert')}}"
                                                                                enctype="multipart/form-data"
                                                                                method="POST">
                                                                                @csrf
                                                                       
                                                                            
       
                                                                                     <div class="row">
                                                                                        <input type="hidden"
                                                                                                    name="id"
                                                                                                    value="{{ $id }}"/>
                                                                                       
                                                                            <input type="hidden" class="dep"
                                                                                                    name="dep"
                                                                                                    value="{{ $dep }}"/>
                                                                                        </div>    

                                                                                        <button type="button"
                                                                                                name="add"
                                                                                                class="btn btn-success btn-xs add"><i
                                                                                                    class="fas fa-plus">
                                                                                                    Add Dependents
                                                                                                   </i></button><br>
                                                                                            <br>
                                                                                            <div
                                                                                                class="table-responsive">
                                                                                                <table
                                                                                                    class="table table-bordered"
                                                                                                    id="cart">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th>Name *</th>
                                                                                                             <th>Date of Birth *</th>
                                                                                                               <th>Gender *</th>
                                                                                                                <th>Profile Picture</th>
                                                                                                            <th>Action</th>
                                                                                                            
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>


                                                                                                    </tbody>

                                                                                                </table>
                                                                                            </div>

                                                                               <br>
                                                                             <div class="form-group row">
                                                    <div class="col-lg-offset-2 col-lg-12">
                             
                                                                                    <input type="submit"
                                                                                        name="make_payment"
                                                                                        id="saveButton"
                                                                                        class=" action-button btn btn-primary float-right m-t-n-xs"
                                                                                        value="Save" />
                                                                                   
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

<script type="text/javascript">
$(document).ready(function() {

    var count = 0;
    var a= $('.dep').val();
   var b= 5 - a;
    $('.add').on("click", function(e) {

        count++;
        var html = '';
        html += '<tr class="line_items">';
        html +='<td><input type="text" name="name[]" class="form-control item_quantity" data-category_id="' +count + '"placeholder ="Full Name" id ="quantity" required /></td>';
        html += '<td><input type="date" name="birth_date[]" class="form-control item_price' + count +'" placeholder ="birth date" required  value=""/></td>';
        html +='<td><select class="form-control m-b" name="gender[]"  data-category_id="' +count + '" required  id="main' +count + '"><option value="">Select</option><option  value="Male">Male</option><option value="Female">Female</option></select></td>';
         html +='<td><input type="file" name="picture[]" class="form-control picture" id ="picture"  onchange="loadBigFile(event,' +count + ')" data-category_id="' +count + '" /> <br><img id="big_output'+count + '" width="100"></td>';
        html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><i class="icon-trash"></i></button></td>';

          if (count < b+ 1) {
            $('#cart > tbody').append(html);
        }
 $('.m-b').select2({
                            });
      
    });

    $(document).on('click', '.remove', function() {
        $(this).closest('tr').remove();
      
    });




});
</script>


<script>
function loadBigFile(event,category) {
  
      
       console.log(category);
    var output=document.getElementById('big_output'+ category);
    output.src=URL.createObjectURL(event.target.files[0]);
  }
</script>


@endpush