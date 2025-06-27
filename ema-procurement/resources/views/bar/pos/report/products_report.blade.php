@extends('layout.master')

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Products Report</h4>
                    </div>
                    <div class="card-body">

                        <!-- Filter Form -->
                        <div class="mb-4">
                            <form method="GET" action="{{ route('products_report') }}" class="form-inline">
                                <div class="form-group mr-3">
                                    <label for="start_date" class="mr-2">Start Date</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request()->input('start_date') }}">
                                </div>
                                <div class="form-group mr-3">
                                    <label for="end_date" class="mr-2">End Date</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request()->input('end_date') }}">
                                </div>
                                <div class="form-group mr-3">
                                    <label for="category_id" class="mr-2">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">All Categories</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ request()->input('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mr-2">Filter</button>
                                    <a href="{{ route('products_report') }}" class="btn btn-secondary">Reset</a>
                                </div>
                            </form>
                        </div>

                        <!-- Report Table -->
                        @if(request()->has('start_date') && request()->has('end_date'))
                            @if(!empty($report) && count($report) > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th>Sales Price</th>
                                                <th>Cost Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($report as $data)
                                                <tr>
                                                    <td>{{ $data['sn'] }}</td>
                                                    <td>{{ $data['name'] }}</td>
                                                    <td>{{ $data['category'] }}</td>
                                                    <td>{{ number_format($data['quantity'], 2) }}</td>
                                                    <td>{{ $data['unit'] }}</td>
                                                    <td>{{ number_format($data['sales_price'], 2) }}</td>
                                                    <td>{{ number_format($data['cost_price'], 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                         <tfoot>
                                            <tr class="font-weight-bold">
                                                <th colspan="3" class="text-left">TOTAL:</th>
                                                <th>{{ number_format($totalQuantity, 2) }}</th>
                                                <th></th>
                                                <th>{{ number_format($totalSalesPrice, 2) }}</th>
                                                <th>{{ number_format($totalCostPrice, 2) }}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            @else
                                <p class="text-center text-muted mt-4">No data available for the selected filters.</p>
                            @endif
                        @else
                            <p class="text-center text-muted mt-4">Please select Start and End dates to view the report.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('scripts')
<link rel="stylesheet" href="{{ asset('assets/datatables/css/jquery.dataTables.css') }}">
<link rel="stylesheet" href="{{ asset('assets/datatables/css/buttons.dataTables.min.css') }}">

<script src="{{ asset('assets/datatables/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/datatables/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/datatables/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/datatables/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/datatables/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/datatables/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/datatables/js/buttons.print.min.js') }}"></script>
@endsection
