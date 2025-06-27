@extends('layout.master')

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Real Time Stock Report</h4>
                        <form method="GET" action="{{ route('realtime_stock_report') }}" class="form-inline">
                            <select name="location" class="form-control mr-2" onchange="this.form.submit()">
                                <option value="" {{ !$selectedLocation ? 'selected' : '' }}>-- Select Location --</option>
                                <option value="all" {{ $selectedLocation == 'all' ? 'selected' : '' }}>All Locations</option>
                                @foreach($locations as $location)
                                    <option value="{{ $location->id }}" {{ $selectedLocation == $location->id ? 'selected' : '' }}>
                                        {{ $location->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    <div class="card-body">

                        <!-- Location not selected -->
                        @if(!$selectedLocation)
                            <p class="text-center mt-4" style="color: #3f51b5; font-weight: bold;">Please select a location to view the real time (live) stock report.</p>

                        <!-- Report Table -->
                        @elseif(!empty($stockReport) && count($stockReport) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="stockTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Sales Price</th>
                                            <th>Locations</th>
                                            <th>Available Quantity</th>
                                            <th>Stock Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($stockReport as $index => $product)
                                            <tr>
                                                <td rowspan="{{ count($product['locations']) + 1 }}">{{ $index + 1 }}</td>
                                                <td rowspan="{{ count($product['locations']) + 1 }}">{{ $product['product'] }}</td>
                                                <td rowspan="{{ count($product['locations']) + 1 }}">{{ number_format($product['sales_price'], 2) }}</td>
                                            </tr>
                                            @foreach($product['locations'] as $location)
                                                <tr>
                                                    <td>{{ $location['location'] }}</td>
                                                    <td>{{ number_format($location['quantity'], 2) }}</td>
                                                    <td>{{ number_format($location['stock_value'], 2) }}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="font-weight-bold">
                                            <th colspan="4" class="text-left">TOTAL:</th>
                                            <th>
                                                {{ number_format(array_sum(array_map(fn($product) => array_sum(array_column($product['locations'], 'quantity')), $stockReport)), 2) }}
                                            </th>
                                            <th>
                                                {{ number_format(array_sum(array_map(fn($product) => array_sum(array_column($product['locations'], 'stock_value')), $stockReport)), 2) }}
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        @else
                            <p class="text-center text-muted mt-4">No data available for the selected location.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<!-- Include Datatables Styles -->
<link rel="stylesheet" href="{{ asset('assets/datatables/css/jquery.dataTables.css') }}">
<link rel="stylesheet" href="{{ asset('assets/datatables/css/buttons.dataTables.min.css') }}">

<!-- Include Datatables Scripts -->
<script src="{{ asset('assets/datatables/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/datatables/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/datatables/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/datatables/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/datatables/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/datatables/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/datatables/js/buttons.print.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#stockTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true, // Enables the search bar
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "dom": 'Bfrtip',
            "buttons": [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "language": {
                "search": "Filter records:", // Customize the search label
                "lengthMenu": "Display _MENU_ records per page",
                "zeroRecords": "No matching records found",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total entries)"
            }
        });
    });
</script>
@endsection
