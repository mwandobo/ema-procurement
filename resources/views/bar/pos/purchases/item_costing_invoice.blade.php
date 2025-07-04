
@extends('layout.master')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-12">
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                            <h4 style="margin: 0;">Item Costing</h4>
                        </div>
                        <div class="card-body">
                            <div class="tab-content tab-bordered" id="myTab3Content">
                                <div class="tab-pane fade @if (empty($id)) active show @endif" id="home2" role="tabpanel" aria-labelledby="home-tab2">
                                    <div class="table-responsive">
                                        <table class="table datatable-basic table-striped" id="supplierInvoiceTable">
                                            <thead>
                                                <tr>
                                                    <th class="sorting" tabindex="0" aria-controls="supplierInvoiceTable" rowspan="1" colspan="1" aria-label="Item: activate to sort column ascending" style="width: 106.484px;">Item</th>
                                                    <th class="sorting" tabindex="0" aria-controls="supplierInvoiceTable" rowspan="1" colspan="1" aria-label="Previous Cost: activate to sort column ascending" style="width: 136.484px;">Previous Cost</th>
                                                    <th class="sorting" tabindex="0" aria-controls="supplierInvoiceTable" rowspan="1" colspan="1" aria-label="New Cost: activate to sort column ascending" style="width: 161.219px;">New Cost</th>
                                                    <th class="sorting" tabindex="0" aria-controls="supplierInvoiceTable" rowspan="1" colspan="1" aria-label="Average Cost: activate to sort column ascending" style="width: 101.219px;">Average Cost</th>
                                                    <th class="sorting" tabindex="0" aria-controls="supplierInvoiceTable" rowspan="1" colspan="1" aria-label="Unit: activate to sort column ascending" style="width: 101.219px;">Unit(Code)</th>
                                                    <th class="sorting" tabindex="0" aria-controls="supplierInvoiceTable" rowspan="1" colspan="1" aria-label="Sales Price: activate to sort column ascending" style="width: 101.219px;">Sales Price</th>
                                                    <th class="sorting" tabindex="0" aria-controls="supplierInvoiceTable" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 108.1094px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($costings as $costing)
                                                    <tr>
                                                        <td>{{ $costing->item ? $costing->item->item_code . ' - ' . $costing->item_name : 'N/A' }}</td>
                                                        <td>{{ number_format($costing->old_cost_item, 2) }} {{ $costing->currency }}</td>
                                                        <td>{{ number_format($costing->new_item_cost, 2) }} {{ $costing->currency }}</td>
                                                        <td>{{ number_format($costing->avg_cost_item, 2) }} {{ $costing->currency }}</td>
                                                        <td>{{ $costing->unit }}</td>
                                                        <td>{{ $costing->sales_price ? number_format($costing->sales_price, 2) : ' - ' }} {{ $costing->currency }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#salesPriceModal{{ $costing->item_id }}"><i class="fa fa-dollar-sign"></i> Add Sales Price</button>
                                                        </td>
                                                    </tr>
                                                    <!-- Modal for Sales Price -->
                                                    <div class="modal fade" id="salesPriceModal{{ $costing->item_id }}" tabindex="-1" role="dialog" aria-labelledby="salesPriceModalLabel{{ $costing->item_id }}" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="salesPriceModalLabel{{ $costing->item_id }}">Update Sales Price for {{ $costing->item_name }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('costing.update_sales_price', $costing->item_id) }}" method="POST">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="sales_price">Sales Price ({{ $costing->currency }})</label>
                                                                            <input type="number" step="0.01" class="form-control" id="sales_price" name="sales_price" value="{{ $costing->sales_price ?? '' }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade @if (!empty($id)) active show @endif" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- DataTables Bootstrap 5 CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <!-- SweetAlert -->
    <script src="{{ url('assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>

    <!-- DataTables Initialization and SweetAlert -->
    <script>
        $(document).ready(function() {
            // Check if DataTable is already initialized and destroy it
            if ($.fn.DataTable.isDataTable('#supplierInvoiceTable')) {
                $('#supplierInvoiceTable').DataTable().destroy();
            }

            // Initialize DataTable
            $('#supplierInvoiceTable').DataTable({
                autoWidth: false,
                order: [[2, 'desc']],
                columnDefs: [{ targets: [6], orderable: false }], // Disable sorting on Actions column
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Filter:</span> _INPUT_',
                    searchPlaceholder: 'Type to filter...',
                    lengthMenu: '<span>Show:</span> _MENU_',
                    paginate: {
                        'first': 'First',
                        'last': 'Last',
                        'next': $('html').attr('dir') == 'rtl' ? '←' : '→',
                        'previous': $('html').attr('dir') == 'rtl' ? '→' : '←'
                    }
                }
            });

            // Display SweetAlert for success message
            @if (session('success'))
                swal({
                    title: "Success!",
                    text: "{{ session('success') }}",
                    type: "success",
                    timer: 3000
                });
            @endif
        });
    </script>
@endsection