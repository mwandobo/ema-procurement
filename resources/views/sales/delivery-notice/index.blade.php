@extends('layout.master')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Delivery Notices</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2"
                                       data-toggle="tab"
                                       href="#home2" role="tab" aria-controls="home" aria-selected="true">Delivery
                                        Notices
                                        List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if(!empty($id)) active show @endif" id="profile-tab2"
                                       data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                       aria-selected="false">
                                        @if(empty($id))
                                           Create Delivery Notices
                                        @else
                                        Edit Delivery Notices
                                        @endif
                                       </a>
                                </li>

                            </ul>
                            <div class="tab-content tab-bordered" id="myTab3Content">
                                <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                     aria-labelledby="home-tab2">
                                    <div class="table-responsive">
                                        <table class="table datatable-basic table-striped">
                                            <thead>
                                            <tr>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 156.484px;">Ref No
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 136.484px;">Order
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 136.484px;">Client Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 161.219px;">Delivery Date
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 168.1094px;">Actions
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(!@empty($deliveryNotices))
                                                @foreach ($deliveryNotices as $row)
                                                    <tr class="gradeA even" role="row">
                                                        <td>
                                                            <a class="nav-link" id="profile-tab2"
                                                               href="{{ url('v2/sales/deliveries',$row->id)}}"
                                                               role="tab"
                                                               aria-selected="false">{{$row->reference_no}}</a>
                                                        </td>
                                                        <td> {{$row->order?->reference_no}}</td>
                                                        <td> {{$row->order?->quotation->client?->name}}</td>
                                                        <td>{{Carbon\Carbon::parse($row->created_at)->format('d/m/Y')}} </td>
                                                        <td>
                                                            <div class="form-inline">
                                                                @if($row->approval_1 == '')

                                                                    <a class="list-icons-item text-primary"
                                                                       title="Edit"
                                                                       href="{{ url('v2/sales/deliveries/'.  $row->id .'/edit')}}"><i
                                                                                class="icon-pencil7"></i></a>&nbsp


                                                                    {!! Form::open(['url' => ['/v2/sales/deliveries', $row->id],
                                                                    'method' => 'delete']) !!}
                                                                    {{ Form::button('<i class="icon-trash"></i>', ['type' => 'submit', 'style' => 'border:none;background: none;', 'class' => 'list-icons-item text-danger', 'title' => 'Delete', 'onclick' => "return confirm('Are you sure?')"]) }}
                                                                    {{ Form::close() }}
                                                                    &nbsp
                                                                @endif
                                                                <div class="dropdown">
                                                                    <a href="#"
                                                                       class="list-icons-item dropdown-toggle text-teal"
                                                                       data-toggle="dropdown"><i class="icon-cog6"></i></a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="nav-link" id="profile-tab2"
                                                                           href="{{ url('/v2/sales/deliveries/' .$row->id .'/pdf' ) }}"
                                                                           role="tab" aria-selected="false">Download
                                                                            PDF</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade @if(!empty($id)) active show @endif" id="profile2"
                                     role="tabpanel"
                                     aria-labelledby="profile-tab2">

                                    <div class="card">
                                        <div class="card-header">
                                            @if(empty($id))
                                                <h5>Create Delivery Notices</h5>
                                            @else
                                                <h5>Edit Delivery Notices</h5>
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 ">
                                                    @if(isset($id))
                                                        {{ Form::model($id, ['url' => "/v2/sales/deliveries/{$id}", 'method' => 'PUT']) }}
                                                    @else
                                                        {{ Form::open(['url' => '/v2/sales/deliveries', 'method' => 'POST']) }}
                                                        @method('POST')
                                                    @endif
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">Sale Order</label>
                                                        <div class="col-lg-4">
                                                            <select class="form-control m-b" name="sale_order_id"
                                                                    required
                                                                    id="sale_order_id">
                                                                <option value="">Select Sale Order</option>
                                                                @if(!empty($saleOrders))
                                                                    @foreach($saleOrders as $row)
                                                                        <option @if(isset($data))
                                                                                    {{  $data->sale_order_id === $row->id  ? 'selected' : ''}}
                                                                                @endif value="{{ $row->id}}">{{$row->reference_no}}</option>

                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <h4 align="center">Enter Item Details</h4>
                                                    <hr>

                                                    <br>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="cart">
                                                            <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Price</th>
                                                                <th>Quantity</th>
                                                                <th>Unit</th>
                                                                <th>Store</th>
                                                                <th>Delivery Quantity</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                            <tfoot>
                                                            @if(!empty($id))
                                                                @if(!empty($deliveryItems))
                                                                    @foreach ($deliveryItems as $i)
                                                                        <tr class="line_items">
                                                                            <td><p>({{$i->item?->item_code}})
                                                                                    - {{$i->item?->name}} </p></td>
                                                                            <td><p> {{$i->item?->cost_price}} </p></td>
                                                                            <td><p> {{$i->ordered_quantity}} </p></td>
                                                                            <td><p> {{$i->item->unit}} </p></td>
                                                                            <td><p> {{$i->salePreQuotationItem?->store->name}} </p></td>
                                                                            <td>
                                                                                <input type="number"
                                                                                       name="ordered_quantity[]"
                                                                                       class="form-control"
                                                                                       value="{{ $i->ordered_quantity }}"
                                                                                       hidden/>
                                                                                <input type="number"
                                                                                       name="delivered_quantity[]"
                                                                                       class="form-control"
{{--                                                                                       value="${item.quantity}"--}}
                                                                                       value="{{ $i->delivered_quantity}}"
                                                                                       required/>
                                                                                <input type="number" name="item_ids[]"
                                                                                       class="form-control"
                                                                                       value="{{ $i->item->id }}"
                                                                                       hidden/>
                                                                                <input type="number" name="pivot_item_ids[]"
                                                                                       class="form-control"
                                                                                       value="{{ $i->salePreQuotationItem->id }}"
                                                                                       hidden/>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                    <br>
                                                    <div class="form-group row">
                                                        <div class="col-lg-offset-2 col-lg-12">
                                                            @if(!@empty($id))

                                                                <a class="btn btn-sm btn-danger float-right m-t-n-xs"
                                                                   href="{{ url('v2/sales/deliveries')}}">
                                                                    cancel
                                                                </a>
                                                                <button
                                                                        class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                                        data-toggle="modal" data-target="#myModal"
                                                                        type="submit">Update
                                                                </button>
                                                            @else
                                                                <button
                                                                        class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                                        type="submit">Save
                                                                </button>
                                                            @endif
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
                {"targets": [3]}
            ],
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            "language": {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: {
                    'first': 'First',
                    'last': 'Last',
                    'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
                    'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
                }
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
                    url: '{{url("v2/sales/item")}}',
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
            $('#sale_order_id').on('change', function () {
                const orderId = $(this).val();
                if (!orderId) return;

                $.ajax({
                    url: `/v2/sales/orders/fetch-items-by-order/${orderId}`,
                    type: 'GET',
                    success: function (response) {
                        console.log(response)
                        const items = response.items;
                        const tbody = $('#cart tbody');
                        tbody.empty(); // clear old items

                        items.forEach((item, index) => {
                            const row = `
                    <tr class="line_items">
                        <td>  <p> ${item.name} <p/></td>
                        <td>  <p> ${item.price} <p/></td>
                        <td>  <p> ${item.quantity} <p/></td>
                        <td>  <p> ${item.unit} <p/></td>
                        <td>  <p> ${item.store} <p/></td>
                        <td>
                            <input type="number" name="delivered_quantity[]" class="form-control" value="${item.quantity}" required />
                            <input type="number" name="ordered_quantity[]" class="form-control" value="${item.quantity}" hidden />
                            <input type="number" name="item_ids[]" class="form-control" value="${item.id}" hidden />
                            <input type="number" name="pivot_item_ids[]" class="form-control" value="${item.pivot_id}" hidden />
                        </td>
                    </tr>
                `;
                            tbody.append(row);
                        });

                        autoCalcSetup(); // re-initialize calculations
                        $('.m-b').select2({});
                    },
                    error: function (err) {
                        alert('Failed to fetch items.' + err);
                    }
                });
            });

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

@endsection
