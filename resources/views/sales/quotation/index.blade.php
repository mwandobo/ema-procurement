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
                            <h4>Sales Quotations</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2"
                                       data-toggle="tab"
                                       href="#home2" role="tab" aria-controls="home" aria-selected="true">Sales
                                        Quotations
                                        List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if(!empty($id)) active show @endif" id="profile-tab2"
                                       data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                       aria-selected="false">New Sale Quotation</a>
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
                                                    style="width: 136.484px;">Client Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 161.219px;">Due Amount
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 168.1094px;">Actions
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(!@empty($salesQuotations))
                                                @foreach ($salesQuotations as $row)
                                                    <tr class="gradeA even" role="row">
                                                        <td>
                                                            <a class="nav-link" id="profile-tab2"
                                                               href="{{ route('quotations.show',$row->id)}}" role="tab"
                                                               aria-selected="false">{{$row->reference_no}}</a>
                                                        </td>
                                                        <td> {{$row->client->name}}</td>
                                                        <td> {{$row->due_amount}}</td>
                                                        <td>
                                                            <div class="form-inline">
                                                                @if($row->approval_1 == '')

                                                                    <a class="list-icons-item text-primary"
                                                                       title="Edit"
                                                                       onclick="return confirm('Are you sure?')"
                                                                       href="{{ route('purchase.edit', $row->id)}}"><i
                                                                            class="icon-pencil7"></i></a>&nbsp


                                                                    {!! Form::open(['route' => ['purchase.destroy',$row->id],
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
                                                                           href="{{ route('purchase_pdfview',['download'=>'pdf','id'=>$row->id]) }}"
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
                                                <h5>Create Sale Quotation</h5>
                                            @else
                                                <h5>Edit Sale Quotation</h5>
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 ">
                                                    @if(isset($id))
                                                        {{ Form::model($id, array('route' => array('quotations.update', $id), 'method' => 'PUT')) }}

                                                    @else
                                                        {{ Form::open(['route' => 'quotations.store']) }}
                                                        @method('POST')
                                                    @endif


                                                    <input type="hidden" name="type"
                                                           class="form-control name_list"/>


                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">Clients Name</label>
                                                        <div class="col-lg-4">
                                                            <select class="form-control m-b" name="client_id" required
                                                                    id="supplier_id">
                                                                <option value="">Select Client Name</option>
                                                                @if(!empty($clients))
                                                                    @foreach($clients as $row)

                                                                        <option @if(isset($data))
                                                                                    {{  $data->client_id == $row->id  ? 'selected' : ''}}
                                                                                @endif value="{{ $row->id}}">{{$row->name}}</option>

                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>

                                                        <br>
                                                        <h4 align="center">Enter Item Details</h4>
                                                        <hr>

                                                        <button type="button" name="add"
                                                                class="btn btn-success btn-xs add">
                                                            <i
                                                                class="fas fa-plus"> Add item</i></button>
                                                        <br>
                                                        <br>
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered" id="cart">
                                                                <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Quantity</th>
                                                                    <th>Store</th>
                                                                    <th>Price</th>
                                                                    <th>Unit</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>


                                                                </tbody>
                                                                <tfoot>
                                                                @if(!empty($id))
                                                                    @if(!empty($items))
                                                                        @foreach ($items as $i)
                                                                            <tr class="line_items">
                                                                                <td><select name="item_name[]"
                                                                                            class="form-control m-b item_name"
                                                                                            required
                                                                                            data-sub_category_id={{$i->order_no}}>
                                                                                        <option value="">Select Item
                                                                                            Name
                                                                                        </option>@foreach($name ?? ''
                                                                    as $n)
                                                                                            <option value="{{ $n->id}}"
                                                                                                    @if(isset($i))@if($n->id == $i->item_name)
                                                                                                        selected @endif @endif >{{$n->name}}</option>
                                                                                        @endforeach
                                                                                    </select></td>
                                                                                <td><input type="number"
                                                                                           name="quantity[]"
                                                                                           class="form-control item_quantity{{$i->order_no}}"
                                                                                           placeholder="quantity"
                                                                                           id="quantity"
                                                                                           value="{{ isset($i) ? $i->quantity : ''}}"
                                                                                           required/></td>
                                                                                <td><input type="text" name="price[]"
                                                                                           class="form-control item_price{{$i->order_no}}"
                                                                                           placeholder="price" required
                                                                                           value="{{ isset($i) ? $i->price : ''}}"/>
                                                                                </td>
                                                                                <td><input type="text" name="unit[]"
                                                                                           class="form-control item_unit{{$i->order_no}}"
                                                                                           placeholder="unit" disabled
                                                                                           value="{{ isset($i) ? $i->unit : ''}}"/>
                                                                                <input type="hidden"
                                                                                       name="saved_items_id[]"
                                                                                       class="form-control item_saved{{$i->order_no}}"
                                                                                       value="{{ isset($i) ? $i->id : ''}}"
                                                                                       required/>
                                                                                <td><input type="text"
                                                                                           name="total_cost[]"
                                                                                           class="form-control item_total{{$i->order_no}}"
                                                                                           placeholder="total" required
                                                                                           value="{{ isset($i) ? $i->total_cost : ''}}"
                                                                                           readonly
                                                                                           jAutoCalc="{quantity} * {price}"/>
                                                                                </td>
                                                                                <input type="hidden" name="items_id[]"
                                                                                       class="form-control name_list"
                                                                                       value="{{ isset($i) ? $i->id : ''}}"/>
                                                                                <td>
                                                                                    <button type="button" name="remove"
                                                                                            class="btn btn-danger btn-xs rem"
                                                                                            value="{{ isset($i) ? $i->id : ''}}">
                                                                                        <i class="icon-trash"></i>
                                                                                    </button>
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
                                                                       href="{{ route('purchase.index')}}">
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


        <div class="modal fade show" data-backdrop="" id="appFormModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formModal">Add Supplier</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="addClientForm" method="post" action="javascript:void(0)">
                            @csrf
                            <div class="modal-body">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 ">

                                            <div class="form-group row"><label
                                                    class="col-lg-2 col-form-label">Name</label>

                                                <div class="col-lg-10">
                                                    <input type="text" name="name" id="name"
                                                           class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group row"><label
                                                    class="col-lg-2 col-form-label">Phone</label>

                                                <div class="col-lg-10">
                                                    <input type="text" name="phone" id="phone"
                                                           class="form-control" placeholder="+255713000000" required>
                                                </div>
                                            </div>

                                            <div class="form-group row"><label
                                                    class="col-lg-2 col-form-label">Email</label>
                                                <div class="col-lg-10">
                                                    <input type="email" name="email" id="email"
                                                           class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-group row"><label
                                                    class="col-lg-2 col-form-label">Address</label>

                                                <div class="col-lg-10">
                                                <textarea name="address" id="address" class="form-control"
                                                          required>  </textarea>


                                                </div>
                                            </div>

                                            <div class="form-group row"><label
                                                    class="col-lg-2 col-form-label">TIN</label>

                                                <div class="col-lg-10">
                                                    <input type="text" name="TIN" id="TIN"
                                                           value="{{ isset($data) ? $data->TIN : ''}}"
                                                           class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-group row"><label
                                                    class="col-lg-2 col-form-label">VAT</label>

                                                <div class="col-lg-10">
                                                    <input type="text" name="VAT" id="VAT"
                                                           value="{{ isset($data) ? $data->VAT : ''}}"
                                                           class="form-control" required>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer bg-whitesmoke br">
                                <button type="submit" class="btn btn-primary" id="save" onclick="saveSupplier(this)"
                                        data-dismiss="modal">Save
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>


                        </form>

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

            $('.add').on("click", function (e) {
                count++;
                var html = '';

                html += '<tr class="line_items">';

                // Item select (populated later via JS or server)
                html += '<td><select name="item_name[]" class="form-control m-b item_name" required data-sub_category_id="' + count + '">';
                html += '<option value="">Select Item</option>';
                @foreach($items as $n)
                    html += '<option value="{{ $n->id }}">{{ $n->name }}</option>';
                @endforeach
                    html += '</select></td>';



                // Quantity input
                html += '<td><input type="number" name="quantity[]" class="form-control item_quantity" placeholder="Quantity" data-category_id="' + count + '" required /></td>';

                html += '<td><select name="store_id[]" class="form-control m-b item_store" required>';
                html += '<option value="">Select Store</option>';
                @foreach($stores as $store)
                    html += '<option value="{{ $store->id }}">{{ $store->name }}</option>';
                @endforeach
                    html += '</select></td>';


                // Price input
                html += '<td><input type="text" name="price[]" class="form-control item_price' + count + '" placeholder="Price" required /></td>';

                // Unit input
                html += '<td><input type="text" name="unit[]" class="form-control item_unit' + count + '" placeholder="Unit" readonly /></td>';

                // Store select (example with dummy options – replace with real data)


                // Remove button
                html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><i class="icon-trash"></i></button></td>';

                html += '</tr>';

                $('tbody').append(html);
                autoCalcSetup();

                $('.m-b').select2({});
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



    <script type="text/javascript">
        function model(id, type) {
            $('#appFormModal').modal('toggle');



            // $.ajax({
            //     type: 'GET',
            //     url: '/courier/public/discountModal/',
            //     data: {
            //         'id': id,
            //         'type': type,
            //     },
            //     cache: false,
            //     async: true,
            //     success: function (data) {
            //         //alert(data);
            //         $('.modal-dialog').html(data);
            //     },
            //     error: function (error) {
            //         $('#appFormModal').modal('toggle');
            //
            //     }
            // });

        }

        function saveSupplier(e) {

            var name = $('#name').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var address = $('#address').val();
            var TIN = $('#TIN').val();
            var VAT = $('#VAT').val();

            $.ajax({
                type: 'GET',
                url: '{{url("tyre/addSupp")}}',
                data: {
                    'name': name,
                    'phone': phone,
                    'email': email,
                    'address': address,
                    'TIN': TIN,
                    'VAT': VAT,
                },
                dataType: "json",
                success: function (response) {
                    console.log(response);

                    var id = response.id;
                    var name = response.name;

                    var option = "<option value='" + id + "'  selected>" + name + " </option>";

                    $('#supplier_id').append(option);
                    $('#appFormModal').hide();


                }
            });
        }
    </script>

@endsection
