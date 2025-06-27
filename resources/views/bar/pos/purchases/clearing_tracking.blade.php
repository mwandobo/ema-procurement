@extends('layout.master')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">

                    <div class="card-header"
                        style="background-color: #f8f9fa; padding: 15px; border-bottom: 2px solid #dee2e6; margin-bottom: 20px;">
                        <h4 style="margin: 0; font-weight: bold; font-size: 1.5rem; color: #007bff;">
                            Clearing Tracking Activities </h4>
                    </div>

                    <div class="card-body">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="list-tab" data-toggle="tab"
                                    href="#listContent" role="tab">Tracking List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="form-tab" data-toggle="tab"
                                    href="#formContent" role="tab">Update Tracking</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="import-tab" data-toggle="tab"
                                    href="#importContent" role="tab">Import Tracking</a>
                            </li>
                        </ul>

                        <div class="tab-content mt-3">
                            <!-- Tracking List Tab -->
                            <div class="tab-pane fade show active" id="listContent" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table datatable-basic table-striped">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>PO</th>
                                                <th>Supplier Name</th>
                                                <th>PADM</th>
                                                <th>Invoice Date</th>
                                                <th>BL No</th>
                                                <th>Product Description</th>
                                                <th>No. of Container</th>
                                                <th>Ship Name</th>
                                                <th>ETA</th>
                                                <th>Copies</th>
                                                <th>Hard Copies</th>
                                                <th>Print Receive</th>
                                                <th>TRA Assessment</th>
                                                <th>Remark</th>
                                                <th>ETD</th>
                                                <th>ICD</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($p_order as $index => $row)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $row->po }}</td>
                                                <td>{{ $row->supplier_name }}</td>
                                                <td>{{ $row->padm }}</td>
                                                <td>{{ $row->invoice_date }}</td>
                                                <td>{{ $row->bl_no }}</td>
                                                <td>{{ $row->product_description }}</td>
                                                <td>{{ $row->no_of_container }}</td>
                                                <td>{{ $row->ship_name }}</td>
                                                <td>{{ $row->eta }}</td>
                                                <td>{{ $row->copies }}</td>
                                                <td>{{ $row->hard_copies }}</td>
                                                <td>{{ $row->print_receive }}</td>
                                                <td>{{ $row->tra_assessment }}</td>
                                                <td>{{ $row->remark }}</td>
                                                <td>{{ $row->etd }}</td>
                                                <td>{{ $row->icd }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="17" class="text-center text-muted">No purchase orders found.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <!-- Update Tracking Form -->
                            <div class="tab-pane fade" id="formContent" role="tabpanel">
                                {{ Form::open(['route' => 'clearing_tracking.store', 'method' => 'POST']) }}
                                @csrf
                                <input type="hidden" name="purchase_order_id"
                                    value="{{ $purchase->reference_no }}">
                                    
                                

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Purchase Order</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="purchase_ref" class="form-control-plaintext text-muted bg-light"
                                            value="{{ $purchase->reference_no }}" readonly
                                            style="border: 1px solid #e5e5e5; padding: .375rem .75rem;">
                                        <small class="form-text text-muted">This field is read-only.</small>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label class="col-lg-2 col-form-label">Description</label>
                                    <div class="col-lg-8">
                                        <textarea name="descriptions"
                                            placeholder="Enter details here..." class="form-control" rows="2"></textarea>
                                    </div>
                                </div>

                                <a href="javascript:void(0);" id="add_more" class="addMechanical text-primary" style="float: left; padding: 8px;">
                                    <i class="icon-plus-circle2"></i> Add Item
                                </a>

                                <div class="table-responsive mt-3">
                                    <table class="table  table-bordered" id="role_two">
                                        <thead>
                                            <tr>
                                                <th>PO</th>
                                                <th>Supplier Name</th>
                                                <th>PADM</th>
                                                <th>Invoice Date</th>
                                                <th>BL No</th>
                                                <th>Product Description</th>
                                                <th>No. of Container</th>
                                                <th>Ship Name</th>
                                                <th>ETA</th>
                                                <th>Copies</th>
                                                <th>Hard Copies</th>
                                                <th>Print Receive</th>
                                                <th>TRA Assessment</th>
                                                <th>Remark</th>
                                                <th>ETD</th>
                                                <th>ICD</th>
                                                <th>Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <!-- New rows added by script -->
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group mt-4">
                                    <button class="btn btn-sm btn-primary float-right" type="submit">Update Status</button>
                                </div>
                                {!! Form::close() !!}
                            </div>

                            <!-- Import Tracking Tab -->
                            <div class="tab-pane fade" id="importContent" role="tabpanel">
                                <div class="card border">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Import Tracking Data</h5>

                                        <p class="text-muted">
                                            Use the template below to prepare your data. Ensure the column order and headers match exactly.
                                        </p>

                                        <!-- Sample Download -->
                                        <a href="{{ route('clearing_tracking_sample.import') }}" class="btn btn-outline-primary btn-sm mb-4">
                                            <i class="fas fa-download"></i> Download Sample Template
                                        </a>

                                        <!-- Upload Form -->
                                        <form action="{{ route('clearing_tracking.import') }}"
                                            method="POST"
                                            enctype="multipart/form-data">

                                            @csrf

                                            <input type="hidden" name="purchase_order_id"
                                                value="{{ $purchase->reference_no }}">
                                                
                                              <input type="hidden" name="po_number"
                                              value="{{ $purchase->pi_number}}">

                                            <div class="form-group">
                                                <label class="col-lg-2 col-form-label" for="import_file"><strong>Select Excel/CSV File</strong></label>
                                                <div class="col-lg-8">
                                                    <input type="file" name="import_file" class="form-control"
                                                        accept=".xls,.xlsx,.csv" required>

                                                    <small class="form-text text-muted">
                                                        Supported formats: .xlsx, .xls, .csv</small>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-success mt-2">
                                                <i class="fas fa-upload"></i> Import File
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- tab-content -->
                    </div> <!-- card-body -->
                </div>
            </div>
        </div>
    </div>


    <!-- discount Modal -->
    <div class="modal fade" id="appFormModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        </div>
    </div>

</section>
@endsection

@section('scripts')
<script>
    $('.datatable-basic').DataTable({
        autoWidth: false,
        columnDefs: [],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: {
                'first': 'First',
                'last': 'Last',
                'next': '→',
                'previous': '←'
            }
        },
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        var count = 0;
        $('.addMechanical').click(function() {
            count++;
            var html = '';
            html += '<tr class="line_items">';
            html += '<td><input type="text" name="po[]" class="form-control" placeholder="PO" /></td>';
            html += '<td><input type="text" name="supplier_name[]" class="form-control" placeholder="Supplier Name" /></td>';
            html += '<td><input type="text" name="padm[]" class="form-control" placeholder="PADM" /></td>';
            html += '<td><input type="date" name="invoice_date[]" class="form-control" placeholder="Invoice Date" /></td>';
            html += '<td><input type="text" name="bl_no[]" class="form-control" placeholder="BL No" /></td>';
            html += '<td><input type="text" name="product_description[]" class="form-control" placeholder="Product Description" /></td>';
            html += '<td><input type="text" name="no_of_container[]" class="form-control" placeholder="No of Container" /></td>';
            html += '<td><input type="text" name="ship_name[]" class="form-control" placeholder="Ship Name" /></td>';
            html += '<td><input type="text" name="eta[]" class="form-control" placeholder="ETA" /></td>';
            html += '<td><input type="text" name="copies[]" class="form-control" placeholder="Copies" /></td>';
            html += '<td><input type="text" name="hard_copies[]" class="form-control" placeholder="Hard Copies" /></td>';
            html += '<td><input type="text" name="print_receive[]" class="form-control" placeholder="Print Receive" /></td>';
            html += '<td><input type="text" name="tra_accesement[]" class="form-control" placeholder="TRA Accesement" /></td>';
            html += '<td><input type="text" name="remark[]" class="form-control" placeholder="Remark" /></td>';
            html += '<td><input type="text" name="etd[]" class="form-control" placeholder="ETD" /></td>';
            html += '<td><input type="text" name="icd[]" class="form-control" placeholder="ICD" /></td>';
            html += '<td><button type="button" class="btn btn-danger btn-sm remove_re"><i class="icon-trash"></i></button></td>';
            html += '</tr>';
            $("#role_two tbody").append(html);
        });

        $(document).on('click', '.remove_re', function() {
            $(this).closest('tr').remove();
        });
    });
</script>



<script type="text/javascript">
    function model(id, type) {
        $.ajax({
            type: 'GET',
            url: '{{ url('
            display_modal ') }}',
            data: {
                'id': id,
                'type': type,
            },
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

    }
</script>



@endsection
