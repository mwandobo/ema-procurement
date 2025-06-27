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
                                                    <hr>
                                                    <button type="button" name="add"
                                                        class="btn btn-success btn-xs add2"><i class="fas fa-plus"> Add
                                                            Menu Items</i></button><br>
                                                    <br>
       

             <div class="table-responsive">
                                                <table class="table table-bordered" id="cart1">
                                                    <thead>
                                                        <tr>
                                                              <th>Name <span class=""
                                                                style="color:red;">*</span></th>
                                                                    <th>Quantity <span class=""
                                                                style="color:red;">*</span></th>
                                                                    <th>Price <span class=""
                                                                style="color:red;">*</span></th>
                                                                    <th>Total <span class=""
                                                                style="color:red;">*</span></th>
                                                                    <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                    
                                                     <tfoot>

                                                                <tr class="line_items">
                                                                    <td colspan="2"></td>
                                                                    <td><span class="bold">Sub Total </span>: </td>
                                                                    <td><input type="text" name="subtotal[]"
                                                                            class="form-control item_total"
                                                                            placeholder="subtotal" required
                                                                            jAutoCalc="SUM({total_cost})" readonly></td>
                                                                </tr>
                                                                <tr class="line_items">
                                                                    <td colspan="2"></td>
                                                                    <td><span class="bold">Tax </span>: </td>
                                                                    <td><input type="text" name="tax[]"
                                                                            class="form-control item_total"
                                                                            placeholder="tax" required
                                                                            jAutoCalc="SUM({total_tax})" readonly>
                                                                    </td>
                                                                </tr>

                                                                <tr class="line_items">
                                                                    <td colspan="2"></td>

                                                                    <td><span class="bold">Total</span>: </td>
                                                                    <td><input type="text" name="amount[]"
                                                                            class="form-control item_total_cost"
                                                                            placeholder="total" required
                                                                            jAutoCalc="{subtotal} + {tax}" readonly>
                                                                    </td>

                                                                </tr>
                                                            </tfoot>
                                                </table>
           




        </div> </div>
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


                function autoCalcSetup() {
                    $('table#cart1').jAutoCalc('destroy');
                    $('table#cart1 tr.line_items').jAutoCalc({
                        keyEventsFire: true,
                        decimalPlaces: 2,
                        emptyAsZero: true
                    });
                    $('table#cart1').jAutoCalc({
                        decimalPlaces: 2
                    });
                }
                autoCalcSetup();

               
                $('.add2').on("click", function(e) {

                    count++;
                    var html = '';
                    html += '<tr class="line_items">';
                    html +=
                        '<td><select name="item_name[]" class="form-control m-b item_name" id="item_name_' +count + '"  data-sub_category_id="' +count + '"  required><option value="">Select Item</option> @foreach($name as $n)<option value="{{ $n->id}}">{{$n->name}}</option>@endforeach</select></td>';
                    html +=
                        '<td><input type="number" step="0.01" name="quantity[]" class="form-control item_quantity" data-category_id="' +
                        count + '"placeholder ="quantity" id ="quantity" required /><div class=""><p class="form-control-static errors_2'+count+'" id="errors" style="text-align:center;color:red;"></p></div></td>';
                    html += '<td><input type="number" step="0.01" name="price[]" class="form-control item_price' +
                        count + '" placeholder ="price" required  value=""/><div class=""></td>';
                    html += '<input name="tax_rate[]" class="form-control item_tax' + count +
                        '" required type="hidden" value="0.18">';
                    html +=
                        '<input type="hidden" name="total_tax[]" class="form-control item_total_tax' +
                        count +
                        '" placeholder ="total" required readonly jAutoCalc="{quantity} * {price} * {tax_rate}"   />';
                     html +='<input type="hidden" id="item_id"  class="form-control item_id' +count+'" value="" />';
                     html +='<input type="hidden" id="type_id"  class="form-control type_id' +count+'" value="Bar" />';
                    html +=
                        '<td><input type="text" name="total_cost[]" class="form-control item_total' +
                        count +
                        '" placeholder ="total" required readonly jAutoCalc="{quantity} * {price}" /></td>';
                    html +=
                        '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove2"><i class="icon-trash"></i></button></td>';

                    $('#cart1 > tbody').append(html);
/*
             * Multiple drop down select
             */
            $('.m-b').select2({
                            });
                    autoCalcSetup();
                });

                $(document).on('click', '.remove2', function() {
                    $(this).closest('tr').remove();
                    autoCalcSetup();
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
