@extends('layout.master')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Purchase Order Tracking Management12</h4>
                        <small class="text-muted">View list, update status, or import tracking data.</small>
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
                                    <table class="table table-striped">
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
                                            @if($trackings->count() > 0)
                                                @foreach($trackings as $tracking)
                                                <tr>
                                                    <td>{{ $tracking->po }}</td>
                                                    <td>{{ $tracking->date }}</td>
                                                    <td>{{ $tracking->remark1 }}</td>
                                                    <td>{{ $tracking->description }}</td>
                                                    <td>{{ $tracking->quantity }}</td>
                                                    <td>{{ $tracking->uom }}</td>
                                                    <td>{{ $tracking->containers }}</td>
                                                    <td>{{ $tracking->status }}</td>
                                                    <td>{{ $tracking->etd }}</td>
                                                    <td>{{ $tracking->eta }}</td>
                                                    <td>{{ $tracking->profoma_value }}</td>
                                                    <td>{{ $tracking->bl_number }}</td>
                                                    <td>{{ $tracking->remark2 }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary">Edit</button>
                                                        <button class="btn btn-sm btn-danger">Delete</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="14" class="text-center">No tracking data found</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Update Tracking Form -->
                            <div class="tab-pane fade" id="formContent" role="tabpanel">
                                {{ Form::open(['route' => 'bar_purchase.store_purchase_order_tracking', 'method' => 'POST']) }}
                                @csrf
                                <input type="hidden" name="purchase_order_id" value="{{ $purchase->id }}">

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
                                        <textarea name="description" placeholder="Enter details here..." class="form-control" rows="2"></textarea>
                                    </div>
                                </div>

                                <a href="javascript:void(0);" id="add_more" class="addMechanical text-primary" style="float: left; padding: 8px;">
                                    <i class="icon-plus-circle2"></i> Add Item
                                </a>

                                <div class="table-responsive mt-3">
                                    <table class="table datatable-basic table-bordered" id="role_two">
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
                                        <a href="" class="btn btn-outline-primary btn-sm mb-4">
                                            <i class="fas fa-download"></i> Download Sample Template
                                        </a>

                                        <!-- Upload Form -->
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            @csrf

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
</section>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        var count = 0;
        $('.addMechanical').click(function() {
            count++;
            var html = '';
            html += '<tr class="line_items">';
            html += '<td><input type="text" name="items[' + count + '][po]" class="form-control" required></td>';
            html += '<td><input type="date" name="items[' + count + '][date]" class="form-control" required></td>';
            html += '<td><input type="text" name="items[' + count + '][remark1]" class="form-control"></td>';
            html += '<td><input type="text" name="items[' + count + '][description]" class="form-control"></td>';
            html += '<td><input type="number" name="items[' + count + '][quantity]" class="form-control"></td>';
            html += '<td><input type="text" name="items[' + count + '][uom]" class="form-control"></td>';
            html += '<td><input type="number" name="items[' + count + '][containers]" class="form-control"></td>';
            html += '<td><input type="text" name="items[' + count + '][status]" class="form-control"></td>';
            html += '<td><input type="date" name="items[' + count + '][etd]" class="form-control"></td>';
            html += '<td><input type="date" name="items[' + count + '][eta]" class="form-control"></td>';
            html += '<td><input type="number" name="items[' + count + '][profoma_value]" class="form-control"></td>';
            html += '<td><input type="text" name="items[' + count + '][bl_number]" class="form-control"></td>';
            html += '<td><input type="text" name="items[' + count + '][remark2]" class="form-control"></td>';
            html += '<td><button type="button" class="btn btn-danger btn-sm remove_re"><i class="icon-trash"></i></button></td>';
            html += '</tr>';
            $("#role_two tbody").append(html);
        });

        $(document).on('click', '.remove_re', function() {
            $(this).closest('tr').remove();
        });
    });
</script>

<script>
    $('.datatable-basic').DataTable({
            autoWidth: false,
            "columnDefs": [
                {"orderable": false, "targets": [3]}
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
@endsection
