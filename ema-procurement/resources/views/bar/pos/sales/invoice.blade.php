@extends('layout.master')
@push('plugin-styles')
    <style>
        .body>.line_items {
            border: 1px solid #ddd;
        }

        .c261b1ca9 {
            width: 100%;
            display: flex;
            flex-direction: row;
            text-transform: uppercase;
            border: none;
            font-size: 12px;
            font-weight: 500;
            margin: 0;
            padding: 24px 0 0;
            padding: var(--spacing-3) 0 0 0;
        }

        .c261b1ca9:after,
        .c261b1ca9:before {
            content: "";
            border-bottom: 1px solid #c2c8d0;
            flex: 1 0 auto;
            height: 0.5em;
            margin: 0;
        }
    </style>

@endpush

@section('content')

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header"
                        style="background-color: #f8f9fa; padding: 15px; border-bottom: 2px solid #dee2e6; margin-bottom: 20px;">
                        <h4 style="margin: 0; font-weight: bold; font-size: 1.5rem; color: #007bff;">
                            Invoices</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if (empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Invoices
                                    List</a>
                            </li>

                          

                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if (empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="table-responsive">
                                    <table class="table datatable-basic table-striped">
                                        <thead>
                                            <tr>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 156.484px;">Ref No</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 186.484px;">Client Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 136.484px;">Quotation Date</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 141.219px;">Due Amount</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 121.219px;">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 168.1094px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($invoices))
                                            @foreach ($invoices as $row)
                                            <tr class="gradeA even" role="row">

                                                <td>
                                                    <a class="nav-link" id="profile-tab2"
                                                        href="{{ route('bar_invoice.show',$row->id)}}" role="tab"
                                                        aria-selected="false">{{$row->reference_no}}</a>
                                                </td>
                                                <td>
                                                    {{$row->client->name }}
                                                </td>

                                                <td>{{$row->invoice_date}}</td>

                                                <td>{{number_format($row->due_amount,2)}} {{$row->exchange_code}}</td>
                                                <td>
                                                    @if($row->status == 0)
                                                    <div class="badge badge-danger badge-shadow">Not Approved</div>
                                                    @elseif($row->status == 1)
                                                    <div class="badge badge-warning badge-shadow">Not Paid</div>
                                                    @elseif($row->status == 2)
                                                    <div class="badge badge-info badge-shadow">Partially Paid</div>
                                                    @elseif($row->status == 3)
                                                    <span class="badge badge-success badge-shadow">Fully Paid</span>
                                                    @elseif($row->status == 4)
                                                    <span class="badge badge-danger badge-shadow">Cancelled</span>

                                                    @endif
                                                </td>


                                                <td>
                                                    <div class="form-inline">
                                                        @if($row->good_receive == 0)
                                                        <a class="list-icons-item text-primary" title="Edit"
                                                            onclick="return confirm('Are you sure?')"
                                                            href="{{ route('bar_invoice.edit', $row->id)}}"><i
                                                                class="icon-pencil7"></i></a>&nbsp


                                                        {!! Form::open(['route' => ['bar_invoice.destroy',$row->id],
                                                        'method' => 'delete']) !!}
                                                        {{ Form::button('<i class="icon-trash"></i>', ['type' =>
                                                        'submit','style' => 'border:none;background: none;', 'class' =>
                                                        'list-icons-item text-danger', 'title' => 'Delete', 'onclick' =>
                                                        "return confirm('Are you sure?')"]) }}
                                                        {{ Form::close() }}
                                                        @endif
                                                        &nbsp

                                                        <div class="dropdown">
                                                            <a href="#"
                                                                class="list-icons-item dropdown-toggle text-teal"
                                                                data-toggle="dropdown"><i class="icon-cog6"></i></a>

                                                            <div class="dropdown-menu">

                                                                @if($row->status == 0 && $row->status != 4 &&
                                                                $row->status != 3 && $row->good_receive == 0)
                                                                <li> <a class="nav-link" id="profile-tab2"
                                                                        href="{{ route('bar_invoice.receive',$row->id)}}"
                                                                        role="tab" aria-selected="false">Approve
                                                                        Invoice</a>
                                                                </li>
                                                                @endif
                                                                @if($row->status != 0 && $row->status != 4 &&
                                                                $row->status != 3 && $row->good_receive == 1)
                                                                <li> <a class="nav-link" id="profile-tab2"
                                                                        href="{{ route('bar_invoice.pay',$row->id)}}"
                                                                        role="tab" aria-selected="false">Make
                                                                        Payments</a>
                                                                </li>
                                                                @endif
                                                                @if($row->good_receive == 0)
                                                                <li class="nav-item"><a class="nav-link" title="Cancel"
                                                                        onclick="return confirm('Are you sure?')"
                                                                        href="{{ route('bar_invoice.cancel', $row->id)}}">Cancel
                                                                        Invoice</a></li>
                                                                @endif

                                                                <a class="nav-link" id="profile-tab2"
                                                                    href="{{ route('pos_invoice_pdfview',['download'=>'pdf','id'=>$row->id]) }}"
                                                                    role="tab" aria-selected="false">Download PDF</a>
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

                           

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>





<!-- supplier Modal -->
<div class="modal fade" data-backdrop="" id="appFormModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">

    </div>
</div>


<!-- supplier Modal -->
<div class="modal fade" data-backdrop="" id="app2FormModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">

    </div>
</div>


@endsection

@section('scripts')
        <script>
        $('.datatable-basic').DataTable({
            autoWidth: false,
            "ordering": false,
            order: [
                [2, 'desc']
            ],
            "columnDefs": [{
                "orderable": false,
                "targets": [3]
            }],
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



            $(document).on('change', '.location', function () {
                $(".item_quantity").change();

            });

            $(document).on('change', '.item_quantity', function () {
                var id = $(this).val();
                var type = $('.name_type').val();
                var sub_category_id = $(this).data('category_id');
                var item = $('.item_id' + sub_category_id).val();
                var location = $('.location').val();

                console.log(location);
                $.ajax({
                    url: '{{ url('pos/sales/findInvQuantity') }}',
                    type: "GET",
                    data: {
                        id: id,
                        item: item,
                        location: location,
                    },
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        if (type == 'receive') {
                            $('.errors' + sub_category_id).empty();
                            $("#save").attr("disabled", false);
                            $(".add_edit_form").attr("disabled", false);
                            if (data != '') {
                                $('.errors' + sub_category_id).append(data);
                                $("#save").attr("disabled", true);
                                $(".add_edit_form").attr("disabled", true);
                            } else {

                            }
                        }

                    }

                });

            });



        });
    </script>






    <script type="text/javascript">
        function model(id, type) {


            $.ajax({
                type: 'GET',
                url: '{{ url('pos/sales/invModal') }}',
                data: {
                    'id': id,
                    'type': type,
                },
                cache: false,
                async: true,
                success: function (data) {
                    //alert(data);
                    $('#appFormModal > .modal-dialog').html(data);


                },
                error: function (error) {
                    $('#appFormModal').modal('toggle');

                }
            });

        }

        function saveClient(e) {

            $.ajax({
                type: 'GET',
                url: '{{ url('pos/sales/save_client') }}',
                data: $('.addClientForm').serialize(),
                dataType: "json",
                success: function (response) {
                    console.log(response);

                    var id = response.id;
                    var name = response.name;

                    var option = "<option value='" + id + "'  selected>" + name + " </option>";

                    $('#client_id').append(option);
                    $('#appFormModal').hide();



                }
            });
        }


        function model2(id, type) {


            $.ajax({
                type: 'GET',
                url: '{{ url('pos/sales/invModal') }}',
                data: {
                    'id': id,
                    'type': type,
                },
                cache: false,
                async: true,
                success: function (data) {
                    //alert(data);
                    $('#app2FormModal > .modal-dialog').html(data);


                },
                error: function (error) {
                    $('#app2FormModal').modal('toggle');

                }
            });

        }
    </script>

    <script>
        $(document).ready(function () {

            $(document).on('change', '.sales', function () {
                var id = $(this).val();
                console.log(id);


                if (id == 'Cash Sales') {
                    $('.bank1').show();
                    $('.bank2').show();
                    $("#bank_id").prop('required', true);

                } else {
                    $('.bank1').hide();
                    $('.bank2').hide();
                    $("#bank_id").prop('required', false);

                }

            });



        });
    </script>



    <script type="text/javascript">

        function attach_model(id, type) {

            $.ajax({
                type: 'GET',
                url: '{{ url('pos/sales/attachModal') }}',
                data: {
                    'id': id,
                    'type': type,
                },
                cache: false,
                async: true,
                success: function (data) {
                    //alert(data);
                    $('.table-img').html(data);
                    $('#invoice_id').val(id);


                },
                error: function (error) {
                    $('#attachFormModal').modal('toggle');

                }
            });

        }


    </script>

    <script>
        $(document).ready(function () {
            $(".item_quantity").trigger('change');

            $(document).on('click', '.save', function (event) {

                $('.item_errors').empty();

                if ($('#cart1 > .body1 .line_items').length == 0) {
                    event.preventDefault();
                    $('.item_errors').append('Please Add Items.');
                }

                else {

                }

            });

        });
    </script>



    </script>


    <script type="text/javascript">


        function numberWithCommas(x) {
            var parts = x.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }

    </script>


@endsection
