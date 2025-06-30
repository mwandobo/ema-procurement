<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="formModal">
            Supplier Invoice
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <form id="form" role="form" enctype="multipart/form-data" action="{{route('bar_purchase.supplier_invoice')}}" method="post">
        @csrf
        <div class="modal-body">
            <input type="hidden" id="purchase_id" name="purchase_id" class="form-control user"
                value="<?php echo $id ?>">
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
                        @if(!empty($purchase_items))
                        @foreach ($purchase_items as $i)
                        <tr class="line_items">
                            <td><select name="item_name[]"
                                    class="form-control  m-b item_name" required
                                    disabled>
                                    <option value="">Select Item</option>@foreach($name
                                    as $n) <option value="{{ $n->id}}"
                                        @if(isset($i))@if($n->id == $i->item_name)
                                        selected @endif @endif >({{$n->item_code}}) - {{$n->name}}</option>
                                    @endforeach
                                </select></td>
                            <?php
                            // $due = App\Models\Bar\POS\PurchaseHistory::where('purchase_id', $id)->where('item_id', $i->item_name)->where('type', 'Purchases')->sum('quantity');
                            // $return = App\Models\Bar\POS\PurchaseHistory::where('purchase_id', $id)->where('item_id', $i->item_name)->where('type', 'Debit Note')->sum('quantity');

                            $due=App\Models\Bar\POS\PurchaseHistory::where('purchase_id',$purchases->id)->where('item_id',$i->item_name)->where('type', 'Purchase Supplier Invoice')->sum('quantity');

                            $qty = $due;
                            ?>

                            <td><input type="number" name="quantity[]"
                                    class="form-control item_quantity"
                                    placeholder="quantity" id="quantity" data-sub_category_id={{$i->order_no}}
                                    value="{{ isset($i) ? $i->quantity - $qty : ''}}" min="1" max="{{$i->quantity - $qty}}"
                                    required />
                                <div class="">
                                    <p class="form-control-static errors{{$i->order_no}}" id="errors" style="text-align:center;color:red;"></p>
                                </div>
                            </td>

                            <input type="hidden" name="purchase_items_id[]"
                                class="form-control name_list_mm"
                                value="{{ isset($i) ? $i->id : ''}}" />

                            <input type="hidden" name="items_id[]"
                                class="form-control name_list"
                                value="{{ isset($i) ? $i->items_id : ''}}" />

                            <td><button type="button" name="remove"
                                    class="btn btn-danger btn-xs remove"
                                    value="{{ isset($i) ? $i->id : ''}}"><i class="icon-trash"></i></button></td>
                        </tr>
                        @endforeach
                        @endif

                    </tbody>
                </table>
            </div>

            <div class="form-row mt-3">

                <div class="form-group col-md-3">
                    <label for="shipment_cost">PO Number</label>
                    <input type="text" class="form-control" name="po_number" id="po_number" placeholder="Enter PO Number" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="shipment_cost">PI Number</label>
                    <input type="text" class="form-control" name="pi_number" id="pi_number" placeholder="Enter PI Number" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="payment_mode">Payment Method</label>
                    <select class="form-control m-b" name="payment_mode" id="payment_mode" required>
                        <option value="{{ old('payment_mode')}}" disabled>Choose option</option>
                        <option value="Cash">Cash</option>
                        <option value="Credit">Credit</option>

                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="credit_limit">Select Credit Limit</label>
                    <input type="date" class="form-control m-b" name="credit_limit" id="credit_limit" value="{{ old('credit_limit') }}" required>
                </div>


                <!-- Currency Select -->
                <div class="form-group col-md-3">
                    <label for="currency">Currency</label>
                    <select class="form-control m-b" name="currency" id="currency" required>
                        <option value="{{ old('currency')}}">Choose option</option>
                        @if(isset($currency))
                        @foreach($currency as $row)

                        @if($row->code == 'TZS')
                        <option value="{{ $row->code }}" selected>{{ $row->name }}</option>
                        @else
                        <option value="{{ $row->code }}">{{ $row->name }}</option>
                        @endif

                        @endforeach
                        @endif
                    </select>
                </div>

                <!-- Exchange Rate Input -->
                <div class="form-group col-md-3">
                    <label for="exchange_rate">Exchange Rate</label>
                    <input type="number" step="0.0001" min="0" class="form-control" name="exchange_rate" id="exchange_rate" placeholder="Enter exchange rate" required>
                </div>

                <!-- Shipment Cost Input -->
                <div class="form-group col-md-3">
                    <label for="shipment_cost">Shipment Cost</label>
                    <input type="number" step="0.01" min="0" class="form-control" name="shipment_cost" id="shipment_cost" placeholder="Enter shipment cost" required>
                </div>

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
