<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="formModal">
            Goods Receive
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <form id="form" role="form" enctype="multipart/form-data" action="{{route('bar_purchase.grn')}}" method="post">
        @csrf
        <div class="modal-body">
            <input type="hidden" id="purchase_supplier_invoice_id" name="purchase_supplier_invoice_id" class="form-control user"
                value="<?php echo $id ?>">

            <div class="form-group">
                <label><strong>Receiving Status:</strong></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="receive_status" id="completeReceived" value="Complete">
                    <label class="form-check-label" for="completeReceived">Complete</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="receive_status" id="partialReceived" value="partial" checked>
                    <label class="form-check-label" for="partialReceived">Partial</label>
                </div>
            </div>


            <div class="table-responsive">
                <table class="table table-bordered" id="cart">
                    <thead>
                        <tr>
                            <th class="col-sm-3">Name</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($invoice_items))
                        @foreach ($invoice_items as $i)
                        <tr class="line_items">
                            <td><select name="item_name[]"
                                    class="form-control  m-b item_name" required
                                    disabled>
                                    <option value="">Select Item</option>@foreach($name
                                    as $n) <option value="{{ $n->id}}"
                                        @if(isset($i))@if($n->id == $i->item_id)
                                        selected @endif @endif >({{$n->item_code}}) - {{$n->name}}</option>
                                    @endforeach
                                </select></td>
                            <?php
                            $due = App\Models\Bar\POS\PurchaseHistory::where('purchase_id', $id)->where('item_id', $i->item_name)->where('type', 'Purchases')->sum('quantity');
                            $return = App\Models\Bar\POS\PurchaseHistory::where('purchase_id', $id)->where('item_id', $i->item_name)->where('type', 'Debit Note')->sum('quantity');
                            $qty = $due - $return;
                            ?>

                            <td><input type="number" name="quantity[]"
                                    class="form-control item_quantity"
                                    placeholder="quantity" id="quantity" data-sub_category_id={{$i->order_no}}
                                    value="{{ isset($i) ? $i->quantity - $i->received_qty : ''}}" min="1" max="{{$i->quantity - $i->received_qty}}"
                                    required />
                                <div class="">
                                    <p class="form-control-static errors{{$i->order_no}}" id="errors" style="text-align:center;color:red;"></p>
                                </div>
                            </td>

                            <input type="hidden" name="items_id[]"
                                class="form-control name_list"
                                value="{{ isset($i) ? $i->item_id : ''}}" />

                            <input type="hidden" name="invoice_item_id[]"
                                class="form-control name_list"
                                value="{{ isset($i) ? $i->id : ''}}" />



                            <td><button type="button" name="remove"
                                    class="btn btn-danger btn-xs remove"
                                    value="{{ isset($i) ? $i->id : ''}}"><i class="icon-trash"></i></button></td>
                        </tr>
                        @endforeach
                        @endif

                    </tbody>
                </table>
            </div>

        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit" id="save"><i class="icon-checkmark3 font-size-base mr-1"></i>Save</button>
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
    $('.m-b').select2({});
</script>
