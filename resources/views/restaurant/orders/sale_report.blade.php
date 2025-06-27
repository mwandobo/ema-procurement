@extends('layout.master')

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Sales Report</h4>
                    </div>
                    <div class="card-body">

                        <div class="panel-heading mb-4">
                            <h6 class="panel-title">
                                @if(!empty($startDate) && !empty($endDate))
                                    For the period: 
                                    <b>{{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }} 
                                        to {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}</b>
                                @else
                                    Please select valid start and end dates to view the report.
                                @endif
                            </h6>
                        </div>

                        <!-- Filter Form -->
                        <div class="panel-body hidden-print">
                            {!! Form::open(['url' => route('all_sale_report'), 'method' => 'GET', 'class' => 'form-horizontal']) !!}
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Start Date</label>
                                    <input name="start_date" type="date" class="form-control" 
                                        value="{{ request()->input('start_date') }}">
                                </div>
                                <div class="col-md-3">
                                    <label>End Date</label>
                                    <input name="end_date" type="date" class="form-control" 
                                        value="{{ request()->input('end_date') }}">
                                </div>
                                <div class="col-md-2">
                                    <label>User Type</label>
                                    <select name="user_type" class="form-control">
                                        <option value="All" {{ request()->input('user_type') === 'All' ? 'selected' : '' }}>All</option>
                                        <option value="Member" {{ request()->input('user_type') === 'Member' ? 'selected' : '' }}>Member</option>
                                        <option value="Visitor" {{ request()->input('user_type') === 'Visitor' ? 'selected' : '' }}>Visitor</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label>Location</label>
                                    <select name="location" class="form-control">
                                        <option value="All" {{ request()->input('location') === 'All' ? 'selected' : '' }}>All</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}" {{ request()->input('location') == $location->id ? 'selected' : '' }}>
                                                {{ $location->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 mt-4">
                                    <button type="submit" class="btn btn-success">Search</button>
                                    <a href="{{ route('all_sale_report') }}" class="btn btn-danger">Reset</a>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>

                        <br>

                        <!-- Report Table -->
                        @if(!empty($report) && count($report) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Customer Name</th>
                                            <th>Customer Type</th>
                                            <th>Location</th>
                                            <th>Products</th>
                                            <th>Total Quantity</th>
                                            <th>Total Amount</th>
                                            <th>Salesperson</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($report as $key => $data)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $data['full_name'] }}</td>
                                                <td>{{ $data['user_type'] }}</td>
                                                <td>{{ $data['location'] }}</td>
                                                <td>{{ implode(', ', $data['items']) }}</td>
                                                <td>{{ $data['total_quantity'] }}</td>
                                                <td>{{ number_format($data['total_cost'], 2) }}</td>
                                                <td>{{ $data['sales_person'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th>{{ array_sum(array_column($report, 'total_quantity')) }}</th>
                                            <th>{{ number_format(array_sum(array_column($report, 'total_cost')), 2) }}</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        @else
                            <p class="text-center text-muted mt-4">No data available. Please select valid start and end dates to view the report.</p>
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
