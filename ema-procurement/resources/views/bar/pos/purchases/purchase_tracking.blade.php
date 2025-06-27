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
                            Shipment Tracking Management </h4>
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
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>PO</th>
                                                <th>Date</th>
                                                <th>Remark</th>
                                                <th>Description</th>
                                                <th>Qty</th>
                                                <th>UOM</th>
                                                <th>Containers</th>
                                                <th>Status</th>
                                                <th>ETD</th>
                                                <th>ETA</th>
                                                <th>Profoma Value</th>
                                                <th>BL Number</th>
                                                <th>Remark</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @if(!empty($p_order))
                                            @foreach($p_order as $row)
                                            <tr class="gradeA even" role="row">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->po }}</td>
                                                <td>{{ $row->date }}</td>
                                                <td>{{ $row->remark }}</td>
                                                <td>{{ $row->description }}</td>
                                                <td>{{ $row->qty }}</td>
                                                <td>{{ $row->uom }}</td>
                                                <td>{{ $row->containers }}</td>
                                                <td>{{ $row->status }}</td>
                                                <td>{{ $row->etd}}</td>
                                                <td>{{ $row->eta}}</td>
                                                <td>{{ $row->p_value}}</td>
                                                <td>{{ $row->bl}}</td>
                                                <td>{{ $row->remark_2 }}</td>

                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Update Tracking Form -->
                            <div class="tab-pane fade" id="formContent" role="tabpanel">
                                {{ Form::open(['route' => 'purchase_order_tracking.store', 'method' => 'POST']) }}
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
                                                <th>Date</th>
                                                <th>Remark</th>
                                                <th>Description</th>
                                                <th>Qty</th>
                                                <th>UOM</th>
                                                <th>Containers</th>
                                                <th>Status</th>
                                                <th>ETD</th>
                                                <th>ETA</th>
                                                <th>Profoma Value</th>
                                                <th>BL Number</th>
                                                <th>Remark</th>
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
                                        <a href="{{ route('diy_purchase_tracking_sample_g.import') }}"
                                         class="btn btn-outline-primary btn-sm mb-4">
                                            <i class="fas fa-download"></i> Download Sample Template
                                        </a>

                                        <!-- Upload Form -->
                                       <form action="{{ route('purchase_order.import') }}" 
                                           method="POST" 
                                           enctype="multipart/form-data">

                                            @csrf
                                            
                                          <input type="hidden" name="purchase_order_id"
                                           value="{{ $purchase->reference_no }}">
                                           
                                            <input type="hidden" name="po_number"
                                           value="{{ $purchase->po_number}}">

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
            html += '<td><input type="text" name="po[]" class="form-control item_po" data-category_id="' + count + '" placeholder="po" id="po_' + count + '" /></td>';
            html += '<td><input type="date" name="date[]" class="form-control item_date" data-category_id="' + count + '" placeholder="date" id="date_' + count + '" /></td>';
            html += '<td><input type="text" name="remark[]" class="form-control item_remark" data-category_id="' + count + '" placeholder="remark" id="remark_' + count + '" /></td>';
            html += '<td><input type="text" name="description[]" class="form-control item_description" data-category_id="' + count + '" placeholder="description" id="description_' + count + '" /></td>';
            html += '<td><input type="number" name="qty[]" class="form-control item_qty" data-category_id="' + count + '" placeholder="qty" id="qty_' + count + '" required /></td>';
            html += '<td><input type="text" name="uom[]" class="form-control item_uom" data-category_id="' + count + '" placeholder="uom" id="uom_' + count + '" /></td>';
            html += '<td><input type="text" name="containers[]" class="form-control item_containers" data-category_id="' + count + '" placeholder="containers" id="containers_' + count + '" /></td>';
            html += '<td><input type="text" name="status[]" class="form-control item_status" data-category_id="' + count + '" placeholder="status" id="status_' + count + '" /></td>';
            html += '<td><input type="text" name="ETD[]" class="form-control item_etd" data-category_id="' + count + '" placeholder="ETD" id="etd_' + count + '" /></td>';
            html += '<td><input type="text" name="ETA[]" class="form-control item_eta" data-category_id="' + count + '" placeholder="ETA" id="eta_' + count + '" /></td>';
            html += '<td><input type="text" name="p_value[]" class="form-control item_p_value" data-category_id="' + count + '" placeholder="profoma value" id="p_value_' + count + '" /></td>';
            html += '<td><input type="text" name="BL[]" class="form-control item_bl" data-category_id="' + count + '" placeholder="BL number" id="bl_' + count + '" /></td>';
            html += '<td><input type="text" name="remark_2[]" class="form-control item_remark2" data-category_id="' + count + '" placeholder="remark 2" id="remark2_' + count + '" /></td>';
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
            url: '{{ url('display_modal') }}',
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
</script>



@endsection
