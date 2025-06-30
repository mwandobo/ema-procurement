<div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModal">
               Costing

</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

                <form id="form" role="form" enctype="multipart/form-data" action="{{route('bar_purchase.costing')}}"  method="post" >


                @csrf
        <div class="modal-body">


            <input type="hidden"   id="purchase_id" name="purchase_id"  class="form-control user"  value="<?php echo $id ?>">


             <div class="table-responsive">
                                                <table class="table table-bordered" id="cart">
                                                    <thead>
                                                        <tr>
                                                            <th class="col-sm-3">Name</th>
                                                            <th>Purchasing Price</th>
                                                            <th>Selling Price</th>
                                                            <th>Unit</th>
                                                            <th>Expire Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>


                                                        @if(!empty($purchase_items))
                                                        @foreach ($purchase_items as $i)
                                                        <tr class="line_items">
                                                            <td><select name="item_mm_id[]"
                                                                    class="form-control  m-b item_id" required
                                                                   disabled>
                                                                    <option value="">Select Item</option>@foreach($name
                                                                    as $n) <option value="{{ $n->id}}"
                                                                        @if(isset($i))@if($n->id == $i->item_name)
                                                                        selected @endif @endif >({{$n->item_code}}) - {{$n->name}}</option>
                                                                    @endforeach
                                                                </select></td>

                                                            <td><input type="number" name="pur_price[]"
                                                                    class="form-control"
                                                                    placeholder="price" id="pur_price" value="{{ $i->price  }}"   data-sub_category_id={{$i->order_no}}  readonly />

                                                            </td>


                                                            <td><input type="number" name="price[]"
                                                                    class="form-control"
                                                                    placeholder="price" id="price"   data-sub_category_id={{$i->order_no}} required />
                                                                   <div class=""> <p class="form-control-static errors{{$i->order_no}}" id="errors" style="text-align:center;color:red;"></p>   </div>
                                                            </td>


                                                            <td><input type="text" name="pur_unit[]"
                                                                    class="form-control"
                                                                    placeholder="pur_unit" id="pur_unit" value="{{ $i->unit  }}"   data-sub_category_id={{$i->order_no}}  readonly />

                                                            </td>


                                                            <td><input type="date" name="expiry_date[]"
                                                                    class="form-control"
                                                                    placeholder="expiry date" id="expiry_date"   data-sub_category_id={{$i->order_no}} required />
                                                                   <div class=""> <p class="form-control-static errors{{$i->order_no}}" id="errors" style="text-align:center;color:red;"></p>   </div>
                                                            </td>



                                                            <input type="hidden" name="purchase_items_id[]"
                                                                class="form-control name_list"
                                                                value="{{ isset($i) ? $i->items_id : ''}}" />



                                                        </tr>

                                                        @endforeach
                                                        @endif



                                                    </tbody>
                                                </table>





        </div> </div>
        <div class="modal-footer">
            <button class="btn btn-primary"  type="submit" id="save"><i class="icon-checkmark3 font-size-base mr-1"></i>Save</button>
            <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Close</button>
        </div>
        </form>

</div>

@yield('scripts')

<script type="text/javascript">
$(document).ready(function() {

    $(document).on('click', '.remove', function() {
        $(this).closest('tr').remove();
    });



});
</script>
<script>
/*
             * Multiple drop down select
             */
            $('.m-b').select2({
                            });
</script>
