    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModal">
              Add Item
                      
</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
 
                <form id="form" role="form" enctype="multipart/form-data" action="{{route('orders.add_order')}}"  method="post" >
                   
      
                @csrf
        <div class="modal-body">

   
            <input type="hidden"   id="id" name="id"  class="form-control id"  value="<?php echo $id ?>">
             <input type="hidden"   id="user_type" name="user_type"  class="form-control user_type1"  value="<?php echo $data->user_type ?>">
             <input type="hidden"   id="user_id" name="user_id"  class="form-control user1"  value="<?php echo $data->user_id ?>">
             <input type="hidden"   id="location" name="location"  class="form-control location1"  value="<?php echo $data->location ?>">
            
                           <div class=""> <p class="form-control-static errors_2_bal" id="errors" style="text-align:center;color:red;"></p></div>

                                                <h4 align="center">Enter Menu Items</h4>
                                                 <div class=""> <p class="form-control-static item_errors2" id="errors" style="text-align:center;color:red;"></p>   </div>
                                                    <hr>
                                                    <button type="button" name="add"
                                                        class="btn btn-success btn-xs add2"><i class="fas fa-plus"> Add
                                                            Menu Items</i></button><br>
                                                    <br>
       
 <div class="table-responsive">
                                        
                                        <div class="cart4" id="cart4">
                                        
                                        <div class="row body">
                                        
                                        
                                        </div>
                                        </div>
                                        
                                        
                                        
                                        <br>

<div class="cart5" id="cart5">
<div class="row body1">
 <div class="table-responsive">
   <br><table class="table" id="table1">
    <thead style="display: @if(!empty($items))  @else none @endif ;">
    <tr>
                                                    
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Total Cost</th>
                                                    <th scope="col">Total Tax</th>
                                                     <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                     <tbody>
              @if (!empty($id))
                                                    @if (!empty($items))
                                                    @foreach ($items as $i)
                                                    
                                                    @php
                                                     
                                                                
                                                       if($i->type == 'Bar'){

                                                         $a = App\Models\Bar\POS\Items::find($i->item_name);;  
                                                       }
                                                          
                                                      else if($i->type == 'Kitchen'){
                                                         $a = App\Models\restaurant\Menu::find($i->item_name);   
                                                       } 
                                                       
                                                      
                                                    @endphp
                                                    
                                                    <tr class="trlst{{$i->id}}_edit">
                                                       <td>{{$a->name}}</td>
                                                      <td>{{ isset($i) ? number_format($i->quantity,2) : '' }}
                                                      <div class=""> <span class="form-control-static errors_2lst{{$i->id}}_edit" id="errors" style="text-align:center;color:red;"></span></div></td>
                                                      <td>{{ isset($i) ? number_format($i->price,2) : '' }}</td>
                                                      <td>{{ isset($i) ? number_format($i->total_cost,2) : '' }}</td>
                                                      <td>{{ isset($i) ? number_format($i->total_tax,2) : '' }}</td>
  <td>
<a class="list-icons-item text-info edit1" title="Check" href="javascript:void(0)" data-target="#appFormModal" data-toggle="modal" data-button_id="{{$i->id}}_edit"><i class="icon-pencil7" style="font-size:18px;"></i></a>&nbsp;&nbsp;
<a class="list-icons-item text-danger rem" title="Delete" href="javascript:void(0)" data-button_id="{{$i->id}}_edit" value="{{$i->id}}"><i class="icon-trash" style="font-size:18px;"></i></a>
</td>
                                                    </tr>
                                                     
                                                     
                                                     @endforeach
                                                    @endif
                                                    @endif
                                                                 
             </tbody>
            </table>

</div>

@if (!empty($id))
                                                    @if (!empty($items))
                                                    @foreach ($items as $i)
                                                    
                                                    <div class="line_items" id="lst{{$i->id}}_edit">
  <input type="hidden" name="type[]" class="form-control item_type" id="type lst{{$i->id}}_edit"  value="{{ isset($i) ? $i->type : '' }}" required />                                                    
  <input type="hidden" name="item_name[]" class="form-control item_name" id="name lst{{$i->id}}_edit" value="{{ isset($i) ? $i->item_name : '' }}" required="">
  <input type="hidden" name="quantity[]" class="form-control item_quantity" id="qty lst{{$i->id}}_edit" data-category_id="lst{{$i->id}}_edit" value="{{ isset($i) ? $i->quantity : '' }}" required="">
  <input type="hidden" name="price[]" class="form-control item_price" id="price lst{{$i->id}}_edit" value="{{ isset($i) ? $i->price : '' }}" required="">
  <input type="hidden" name="tax_rate[]" class="form-control item_rate" id="rate lst{{$i->id}}_edit" value="{{ isset($i) ? $i->tax_rate : '' }}" required="">
  <input type="hidden" name="total_cost[]" class="form-control item_cost" id="cost lst{{$i->id}}_edit" value="{{ isset($i) ? $i->total_cost : '' }}" required="">
  <input type="hidden" name="total_tax[]" class="form-control item_tax" id="tax lst{{$i->id}}_edit" value="{{ isset($i) ? $i->total_tax : '' }}" required="">
  <input type="hidden" name="unit[]" class="form-control item_unit" id="unit lst{{$i->id}}_edit" value="{{ isset($i) ? $i->unit : '' }}">
  <input type="hidden" name="modal_type" class="form-control item_type" id="type lst{{$i->id}}_edit" value="edit">
  <input type="hidden" name="no[]" class="form-control item_type" id="no lst{{$i->id}}_edit" value="{{$i->id}}_edit">
  <input type="hidden" name="saved_items_id[]" class="form-control item_savedlst{{$i->id}}_edit" value="{{$i->id}}">
  <input type="hidden" id="item_id" class="form-control item_idlst{{$i->id}}_edit" value="{{ isset($i) ? $i->item_name : '' }}">
   <input type="hidden"  class="form-control type_id lst{{$i->id}}_edit" id="type "  value="{{ isset($i) ? $i->type : '' }}" required />
</div>
                                                     @endforeach
                                                    @endif
                                                    @endif

                                                 

</div>
       
     <br> <br>
<div class="row">



<div class="col-lg-1"></div><label class="col-lg-2 col-form-label"> Sub Total (+):</label>
<div class="col-lg-6 line_items">
<input type="text" name="subtotal[]" class="form-control item_total" value="{{ isset($data) ? '' : '0.00' }}" required="" jautocalc="SUM({total_cost})" readonly=""> <br>
</div><div class="col-lg-3"></div>

<div class="col-lg-1"></div><label class="col-lg-2 col-form-label">Tax (+):</label>
<div class="col-lg-6 line_items">
<input type="text" name="tax[]" class="form-control item_total" value="{{ isset($data) ? '' : '0.00' }}" required="" jautocalc="SUM({total_tax})" readonly=""> <br>
</div><div class="col-lg-3"></div>



<div class="col-lg-1"></div><label class="col-lg-2 col-form-label"> Total:</label>
<div class="col-lg-6 line_items">
<input type="text" name="amount[]" class="form-control item_total_cost" value="{{ isset($data) ? '' : '0.00' }}" required="" jautocalc="{subtotal} + {tax} " readonly="readonly" ><br> 
</div><div class="col-lg-3"></div>

</div>


</div>





</div>



                                                    <br>
        
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary"  type="submit" id="save2"><i class="icon-checkmark3 font-size-base mr-1"></i>Save</button>
            <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Close</button>
        </div>
        </form>
    
</div>

@yield('scripts')

<script>
$(document).ready(function() {
   

 $(document).on('change', '.item_name', function() {
                    var id = $(this).val();
                    var sub_category_id = $(this).data('sub_category_id');
              var type= $('.type_id' + sub_category_id).val();
                    $.ajax({
            url: '{{url("restaurant/findPrice")}}',
            type: "GET",
            data: {
                id: id,
                 type: type,
            },
            dataType: "json",
            success: function(data) {
                console.log(data);

                  if(type == 'Bar'){
                $('.item_price' + sub_category_id).val(data[0]["unit_price"]);
                 }
               else if(type == 'Kitchen'){
                 $('.item_price' + sub_category_id).val(data[0]["price"]);
                 }
                $('.item_id' + sub_category_id).val(id);
               
            }

        });

    });


   
});
</script>

            <script>
            $(document).ready(function() {
 $(document).ready(function() {
    
       $(document).on('change', '.item_quantity', function() {
            var id = $(this).val();
              var sub_category_id = $(this).data('category_id');
             var item= $('.item_id' + sub_category_id).val();
                var type= $('.type_id' + sub_category_id).val();
             var location= $('.location1').val();

    console.log(location);
            $.ajax({
                url: '{{url("restaurant/findQuantity")}}',
                type: "GET",
                data: {
                    id: id,
                  item: item,
                   type: type,
                 location: location,
                },
                dataType: "json",
                success: function(data) {
                  console.log(data);
                 $('.errors_2' + sub_category_id).empty();
                $("#save2").attr("disabled", false);
                 if (data != '') {
                $('.errors_2' + sub_category_id).append(data);
               $("#save2").attr("disabled", true);
    } else {
      
    }
                
           
                }
    
            });
    
        });
    
    
    
    });
               

            });
            </script>

            <script type="text/javascript">
    $(document).ready(function() {



        var count = 0;


        function autoCalcSetup4() {
            $('div#cart4').jAutoCalc('destroy');
            $('div#cart4 div.line_items').jAutoCalc({
                keyEventsFire: true,
                decimalPlaces: 2,
                emptyAsZero: true
            });
            $('div#cart4').jAutoCalc({
                decimalPlaces: 2
            });
        }
        autoCalcSetup4();

        $('.add2').on("click", function(e) {

            count++;
            var html = '';
            html +=
                '<div class="col-lg-3 line_items" id="td'+count + '"><br><select name="checked_item_name[]" class="form-control m-b item_name" id="item_name_' +count + '"  data-sub_category_id="' +count + '"  required><option value="">Select Item</option>@foreach($name as $n)<option value="{{ $n->id}}">{{$n->name}}</option>@endforeach</select><br></div><br>';
            html +='<div class="col-lg-6 line_items" id="td'+count + '"><br>Quantity <input type="number" name="checked_quantity[]" class="form-control item_quantity" min="1" data-category_id="' +count +'"placeholder ="quantity" id ="quantity" required /><div class=""> <p class="form-control-static errors_2' +count + '" id="errors" style="text-align:center;color:red;"></p> </div><br>Price <input type="text" name="checked_price[]" class="form-control item_price' + count +'" placeholder ="price" id="price td'+count + '" required  value=""/><br>Total Cost <input type="text" name="checked_total_cost[]" class="form-control item_total' +
                count + '" placeholder ="total" id="total td'+count + '" required readonly jAutoCalc="{checked_quantity} * {checked_price}" /><br>Tax <input type="text" name="checked_total_tax[]" class="form-control item_total_tax' +
                count +'" placeholder ="tax" id="tax_rate td'+count + '" required readonly jAutoCalc="{checked_quantity} * {checked_price} * {checked_tax_rate}"   readonly/><br>';
                 html += '<input type="hidden" name="checked_no[]" class="form-control item_no' + count +'" id="no td'+count + '" value="' + count +'" required />';
            html += '<input type="hidden" name="checked_unit[]" class="form-control item_unit' + count +'" id="unit td'+count + '" placeholder ="unit" required />';
            html += '<input type="hidden" name="checked_tax_rate[]" class="form-control item_tax' + count +'" placeholder ="total" id="tax td'+count + '" value="0.18" required />';
            html += '<input type="hidden" id="item_id"  class="form-control item_id' + count +'" value="" />';
            html +='<input type="hidden" id="type_id"  class="form-control type_id' +count+'" value="Bar" />';
            html +='<input type="hidden" name="checked_type[]" id="type_name"  class="form-control type_name' +count+'" value="Bar" /></div>';
            html +='<div class="col-lg-3 text-center line_items" id="td'+count + '"><br><a class="list-icons-item text-info add3" title="Check" href="javascript:void(0)" data-save_id="' +count + '"><i class="icon-check2" style="font-size:30px;font-weight:bold;"></i></a>&nbsp&nbsp<a class="list-icons-item text-danger remove" title="Delete" href="javascript:void(0)" data-button_id="' +count + '"><i class="icon-trash" style="font-size:18px;"></i></a><br><div class=""> <p class="form-control-static body_errors_2' +count + '" id="errors" style="text-align:center;color:red;"></p></div></div>';


          
            if ( $('#cart4 > .body div').length == 0 ) {
            $('#cart4 > .body').append(html);
            autoCalcSetup4();
            
              }

            /*
             * Multiple drop down select
             */
            $('.m-b').select2({});


       
        
        
          $(document).on('change', '.item_price'+ count, function() {
                var id = $(this).val();
                $.ajax({
                url: '{{ url('format_number') }}',
                type: "GET",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                 console.log(data);
                $('.item_price' + count).val(data);
                   
                    }

                });

            });
                        
                        
        });
        
        
     $(document).on('change', '.item_name', function() {
                    var id = $(this).val();
                    var sub_category_id = $(this).data('sub_category_id');
              var type= $('.type_id' + sub_category_id).val();
                    $.ajax({
            url: '{{url("restaurant/findPrice")}}',
            type: "GET",
            data: {
                id: id,
                 type: type,
            },
            dataType: "json",
            success: function(data) {
                console.log(data);

                  if(type == 'Bar'){
                $('.item_price' + sub_category_id).val(numberWithCommas(data[0]["unit_price"]));
                 }
               else if(type == 'Kitchen'){
                 $('.item_price' + sub_category_id).val(numberWithCommas(data[0]["price"]));
                 }
                $('.item_id' + sub_category_id).val(id);
                  autoCalcSetup4();
            }

        });

    });
        

      


        $(document).on('click', '.remove', function() {
            var button_id = $(this).data('button_id');
            var contentToRemove = document.querySelectorAll('#td' + button_id);
            $(contentToRemove).remove(); 
            autoCalcSetup4();
        });

    });
</script>


<script type="text/javascript">
    $(document).ready(function() {


     
        function autoCalcSetup5() {
            $('div#cart5').jAutoCalc('destroy');
            $('div#cart5.div.line_items').jAutoCalc({
                keyEventsFire: true,
                decimalPlaces: 2,
                emptyAsZero: true
            });
            $('div#cart5').jAutoCalc({
                decimalPlaces: 2
            });
        }
        autoCalcSetup5();
        
        

         $(document).on('click', '.add3', function() {
            console.log(1);
            
            
            
        var button_id = $(this).data('save_id');
        $('.body_errors_2'+ button_id).empty();
        //$('.body').find('select, textarea, input').serialize();
        
        var b=$('#td' + button_id).find('.item_name').val();
        var c=$('div#td' + button_id +'.col-lg-6.line_items').find('.item_quantity').val();
        var d=$('.item_price' + button_id).val();
        
         
        
        if( b == '' || c == '' || d == '' ){
           $('.body_errors_2'+ button_id).append('Please Fill Required Fields.');
        
     }
     
     else{
        
        
         $.ajax({
                type: 'GET',
                 url: '{{ url('restaurant/add_order_item') }}',
               data: $('#cart4 > .body').find('select, textarea, input').serialize(),
                cache: false,
                async: true,
                success: function(data) {
                    console.log(data);
                    
          $('#cart5 > .body1 table thead').show();
             $('#cart5 > .body1 table tbody').append(data['list']);
             $('#cart5 > .body1').append(data['list1']);
              autoCalcSetup5();
 
                },
              


            });
            
            
            var contentToRemove = document.querySelectorAll('#td' + button_id);
            $(contentToRemove).remove(); 
            
     }
     

        });



        $(document).on('click', '.remove1', function() {
            var button_id = $(this).data('button_id');
            var contentToRemove = document.querySelectorAll('#lst' + button_id);
            $(contentToRemove).remove(); 
             $(this).closest('tr').remove();
             $(".item_quantity").change();
            autoCalcSetup5();
        });
        
        
          $(document).on('click', '.rem', function() {
            var button_id = $(this).data('button_id');
            var btn_value = $(this).attr("value");
            var contentToRemove = document.querySelectorAll('#lst' + button_id);
            $(contentToRemove).remove(); 
             $(this).closest('tr').remove();
              $('#cart5 > .body1').append('<input type="hidden" name="removed_id[]"  class="form-control name_list" value="' +btn_value + '"/>');
              $(".item_quantity").change();
            autoCalcSetup5();
        });



  $(document).on('click', '.edit1', function() {
            var button_id = $(this).data('button_id');
            
            console.log(button_id);
            $.ajax({
                type: 'GET',
                 url: '{{ url('restaurant/invModal') }}',
                 data: $('#cart5 > .body1 #lst'+button_id).find('select, textarea, input').serialize(),
                cache: false,
                async: true,
                success: function(data) {
                    //alert(data);

                    $('#appFormModal > .modal-dialog').html(data);
                },
                error: function(error) {
                    $('#appFormModal').modal('toggle');

                }


            });
           
            
        });
        
        
            $(document).on('click', '.add_edit_form', function(e) {
            e.preventDefault();
           
            var sub = $(this).data('button_id');
            console.log(sub);
            
            $.ajax({
                data: $('.addEditForm').serialize(),
                type: 'GET',
                 url: '{{ url('restaurant/add_order_item') }}',
                dataType: "json",
                success: function(data) {
                    console.log(data);
                  
                  $('#cart5 > .body1 table tbody').find('.trlst'+sub).html(data['list']);
                  $('#cart5 > .body1').find('#lst'+sub).html(data['list1']);
                    $(".item_quantity").change();
              autoCalcSetup5();
           

                }
            })
        });



    });
</script>
            


<script>
    $(document).ready(function() {
    
       $(document).on('change', '.item_total_cost', function() {
            var id = $(this).val();
             var user= $('.user1').val();
          var type= $('.user_type1').val();

           console.log(id);
            $.ajax({
                url: '{{url("restaurant/findAmount")}}',
                type: "GET",
                data: {
                    id: id,
                  user:user,
                  type:type,
                },
                dataType: "json",
                success: function(data) {
                  console.log(data);
                 $('.errors_2_bal').empty();
                $("#save2").show();
                 if (data != '') {
                $('.errors_2_bal').append(data);
               $("#save2").hide();
    } else {
      
    }
                
           
                }
    
            });
    
        });
    
    
    
    });
    </script>
    
    <script>
    $(document).ready(function() {
      $(".item_quantity").trigger('change');
      
         $(document).on('click', '.save', function(event) {
   
         $('.item_errors2').empty();

          if ( $('#cart5 > .body1 .line_items').length == 0 ) {
               event.preventDefault(); 
    $('.item_errors2').append('Please Add Items.');
}
         
         else{
            
         
          
         }
        
    });
    
    
    
    });
    </script>
    
    
 
    
    
    <script type="text/javascript">


function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}

</script>
