@extends('layout.master')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-2 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Purchase Order</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            
                            <li class="nav-item">
                                <a class="nav-link @if(!empty($id)) active show @endif" id="profile-tab2"
                                    data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                    aria-selected="false"> Purchase Order</a>
                            </li>

                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                           
                            <div class="tab-pane fade @if(!empty($id)) active show @endif" id="profile2" role="tabpanel"
                                aria-labelledby="profile-tab2">

                                <div class="card">
                                    <div class="card-header">
                                        
                                        <h5>Edit Supplier Purchase Prices</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                               
                                                {{ Form::model($id, array('route' => array('bar_purchase.confirm_order_store', $id),
                                                'method' => 'PUT')) }}



                                                <!-- <input type="hidden" name="type" class="form-control name_list"
                                                    value="{{$type}}" /> -->


                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Purchase Date</label>
                                                    <div class="col-lg-4">
                                                        <input type="date" name="purchase_date"
                                                            placeholder="0 if does not exist"
                                                            value="{{ isset($data) ? $data->purchase_date : date('Y-m-d')}}"
                                                            class="form-control">
                                                    </div>
                                                    <label class="col-lg-2 col-form-label">Due Date</label>
                                                    <div class="col-lg-4">
                                                        <input type="date" name="due_date"
                                                            placeholder="0 if does not exist"
                                                            value="{{ isset($data) ? $data->due_date : strftime(date('Y-m-d', strtotime("
                                                            +10 days"))) }}" class="form-control">
                                                    </div>
                                                </div>


                                                <div class="form-group row">

                                                    <label class="col-lg-4 col-form-label">Purchase Payment Mode</label>
                                                    <div class="col-lg-8">

                                                            <select name="payment_mode" class="form-control" required>
                                                                <option value="">-- Select Mode --</option>
                                                                <option value="cash">Cash</option>
                                                                <option value="credit">Credit</option>
                                                            </select>

                                                    </div>

                                                </div>


                                                <br>
                                                <h4 align="center">Enter Item Details</h4>


                                                <!-- <input type="text" name="exchange_code"
                                                    value="{{ isset($data) ? $data->exchange_code : 'TZS'}}"
                                                    class="form-control" required> -->
                                                
                                                    <div class="form-group row">

                                                        <label  class="col-lg-2 col-form-label" for="exchange_code">Currency</label>
                                                        <div class="col-lg-4">
                                                            <select class="form-control m-b" name="exchange_code" id="exchange_code" required>
                                                                <option value="{{ old('exchange_code')}}">Choose option</option>
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
                                                    

                                                        <label  class="col-lg-2 col-form-label" for="exchange_code">Exhange Rate</label>
                                                        <div class="col-lg-4">
                                                            <input type="text" name="exchange_rate"
                                                                value="{{ isset($data) ? $data->exchange_rate : '1.00'}}"
                                                                class="form-control" required>

                                                        </div>
                                                </div> 

                                                <hr>
                                                <button type="button" name="add222" class="btn btn-success btn-xs add"><i
                                                        class="fas fa-plus"> Add item</i></button><br>
                                                <br>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="cart">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Quantity</th>
                                                                <th>Price</th>
                                                                <th>Tax</th>
                                                                <th>Total</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>


                                                        </tbody>
                                                        <tfoot >
                                                            @if(!empty($id))
                                                            @if(!empty($items))
                                                            @foreach ($items as $i)
                                                            <tr class="line_items">

                                                            @php  $item_name_mm = App\Models\Bar\POS\Items::where('id', $i->items_id)->first() ?? "-"; @endphp
                                                                <td> <input type="hidden" name="item_name[]" class="form-control item_name{{$i->order_no}}"
                                                                 value="{{ isset($i) ? $i->item_name : ''}}"> ( {{$item_name_mm->item_code}} ) {{ $item_name_mm->name }} ( {{ $i->unit }} ) </td>
                                                                <td><input type="number" name="quantity[]"
                                                                        class="form-control item_quantity{{$i->order_no}}"
                                                                        placeholder="quantity" id="quantity"
                                                                        value="{{ isset($i) ? $i->quantity : ''}}"
                                                                        required /></td>
                                                                <td><input type="text" name="price[]"
                                                                        class="form-control item_price{{$i->order_no}}"
                                                                        placeholder="price" required /></td>
                                                                <td><select name="tax_rate[]"
                                                                        class="form-control m-b item_tax'+count{{$i->order_no}}"
                                                                        required>
                                                                        <option value="0">Select Tax Rate</option>
                                                                        <option value="0">No tax
                                                                        </option>
                                                                        <option value="0.18">18%
                                                                        </option>
                                                                    </select></td>
                                                                <input type="hidden" name="total_tax[]"
                                                                    class="form-control item_total_tax{{$i->order_no}}'"
                                                                    placeholder="total" required readonly
                                                                    jAutoCalc="{quantity} * {price} * {tax_rate}" />
                                                                <input type="hidden" name="unit[]"
                                                                    class="form-control item_unit{{$i->order_no}}" value="{{ isset($i) ? $i->unit : ''}}" required />
                                                                <input type="hidden" name="saved_items_id[]"
                                                                    class="form-control item_saved{{$i->order_no}}" value="{{ isset($i) ? $i->items_id : ''}}" required />    
                                                                <td><input type="text" name="total_cost[]"
                                                                        class="form-control item_total{{$i->order_no}}"
                                                                        placeholder="total" required
                                                                        readonly jAutoCalc="{quantity} * {price}" />
                                                                </td>
                                                                <input type="hidden" name="items_id[]"
                                                                    class="form-control name_list"
                                                                    value="{{ isset($i) ? $i->id : ''}}" />
                                                                <td><button type="button" name="remove"
                                                                        class="btn btn-danger btn-xs rem"
                                                                        value="{{ isset($i) ? $i->id : ''}}"><i
                                                                            class="icon-trash"></i></button></td>
                                                            </tr>

                                                            @endforeach
                                                            @endif
                                                            @endif

                                                            <tr class="line_items">
                                                                <td colspan="3"></td>
                                                                <td ><span class="bold">Sub Total </span>: </td>
                                                                <td ><input type="text" name="subtotal[]"
                                                                        class="form-control item_total"
                                                                        placeholder="subtotal" required
                                                                        jAutoCalc="SUM({total_cost})" readonly></td>
                                                            </tr>
                                                            <tr class="line_items">
                                                                <td colspan="3"></td>
                                                                <td ><span class="bold">Tax </span>: </td>
                                                                <td><input type="text" name="tax[]"
                                                                        class="form-control item_total"
                                                                        placeholder="tax" required
                                                                        jAutoCalc="SUM({total_tax})" readonly>
                                                                </td>
                                                            </tr>
                                                            @if(!@empty($data->discount > 0))
                                                            <tr class="line_items">
                                                                <td colspan="3"></td>
                                                                <td ><span class="bold">Discount</span>: </td>
                                                                <td ><input type="text" name="discount[]"
                                                                        class="form-control item_discount"
                                                                        placeholder="total" required
                                                                        value="{{ isset($data) ? $data->discount : ''}}"
                                                                        readonly></td>
                                                            </tr>
                                                            @endif

                                                            <tr class="line_items">
                                                                <td colspan="3"></td>
                                                                @if(!@empty($data->discount > 0))
                                                                <td ><span class="bold">Total</span>: </td>
                                                                <td ><input type="text" name="amount[]"
                                                                        class="form-control item_total"
                                                                        placeholder="total" required
                                                                        jAutoCalc="{subtotal} + {tax} - {discount}"
                                                                        readonly></td>
                                                                @else
                                                                <td ><span class="bold">Total</span>: </td>
                                                                <td ><input type="text" name="amount[]"
                                                                        class="form-control item_total"
                                                                        placeholder="total" required
                                                                        jAutoCalc="{subtotal} + {tax}" readonly>
                                                                </td>
                                                                @endif
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>


                                                <br>
                                                <div class="form-group row">
                                                    <div class="col-lg-offset-2 col-lg-12">
                                                 

                                                      
                                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                            data-toggle="modal" data-target="#myModal"
                                                            type="submit">Update</button>
                                                       
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
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
</section>




@endsection

@section('scripts')
<script>
    $('.datatable-basic').DataTable({
        autoWidth: false,
        order: [[2, 'desc']],
        "columnDefs": [
            { "targets": [3] }
        ],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        "language": {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
        },

    });
</script>
<script src="{{ url('assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>

<script>
    $(document).ready(function () {

        $(document).on('click', '.remove', function () {
            $(this).closest('tr').remove();
        });

        $(document).on('change', '.item_name', function () {
            var id = $(this).val();
            var sub_category_id = $(this).data('sub_category_id');
            $.ajax({
                url: '{{url("bar/purchases/findInvPrice")}}',
                type: "GET",
                data: {
                    id: id
                },
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    $('.item_price' + sub_category_id).val(data[0]["cost_price"]);
                    $(".item_unit" + sub_category_id).val(data[0]["unit"]);

                }

            });

        });


    });
</script>



<script type="text/javascript">
    $(document).ready(function () {
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



        $(document).on('click', '.remove', function () {
            $(this).closest('tr').remove();
            autoCalcSetup();
        });


        $(document).on('click', '.rem', function () {
            var btn_value = $(this).attr("value");
            $(this).closest('tr').remove();
            $('tfoot').append(
                '<input type="hidden" name="removed_id[]"  class="form-control name_list" value="' +
                btn_value + '"/>');
            autoCalcSetup();
        });

    });
</script>





<script type="text/javascript">
    function model(id, type) {

        $.ajax({
            type: 'GET',
            url: '/courier/public/discountModal/',
            data: {
                'id': id,
                'type': type,
            },
            cache: false,
            async: true,
            success: function (data) {
                //alert(data);
                $('.modal-dialog').html(data);
            },
            error: function (error) {
                $('#appFormModal').modal('toggle');

            }
        });

    }

  
</script>

@endsection