@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/tables/tables.css') !!}
    <link rel="stylesheet" href="{{ asset('assets/restaurant/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/restaurant/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Starter')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{ __('reports.restaurant_owner_Sales_report') }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="layout-top-spacing mb-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing">
                            <div class="col-lg-12 layout-spacing">
                                {{-- new codes start --}}
                                <section class="section">
                                   
                                    <div class="section-body">
                                        <div class="card">
                                            <div class="card-body">
                            
                                                <form action="<?=route('restaurant-owner-sales-report.index')?>" method="POST">
                                                    @csrf
                                                    <div class="row">
                            
                                                        @if(auth()->user()->myrole == 3)
                            
                                                            <input type="hidden" name="restaurant_id" class="form-control" value="{{ auth()->user()->restaurant->id ?? 0 }}">
                            
                                                        @else
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label>{{ __('levels.restaurant') }}</label> <span class="text-danger">*</span>
                                                                    <select name="restaurant_id" class="form-control @error('restaurant_id') is-invalid @enderror">
                                                                        <option value="">{{ __('levels.select_restaurant') }}</option>
                                                                        @if(!blank($restaurants))
                                                                            @foreach($restaurants as $restaurant)
                                                                                <option value="{{ $restaurant->id }}" {{ (old('restaurant_id', $set_restaurant_id) == $restaurant->id) ? 'selected' : '' }}>{{ $restaurant->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                    @error('restaurant_id')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        @endif
                            
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label>{{ __('reports.from_date') }}</label>
                                                                <input type="text" name="from_date" class="form-control @error('from_date') is-invalid @enderror datepicker" value="{{ old('from_date', $set_from_date) }}">
                                                                @error('from_date')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label>{{ __('reports.to_date') }}</label>
                                                                <input type="text" name="to_date" class="form-control @error('to_date') is-invalid @enderror datepicker" value="{{ old('to_date', $set_to_date) }}">
                                                                @error('to_date')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label for="">&nbsp;</label>
                                                            <button class="btn btn-primary form-control" type="submit">{{ __('reports.get_report') }}</button>
                                                        </div>
                                                    </div>
                                                </form>
                            
                                            </div>
                                        </div>
                            
                                        @if($showView)
                                            <div class="card">
                                                <div class="card-header">
                                                    <button class="btn btn-success btn-sm report-print-button" onclick="printDiv('printablediv')">{{ __('levels.print') }}</button>
                                                </div>
                                                <div class="card-body" id="printablediv">
                                                    <h5>{{ __('reports.restaurant_owner_Sales_report') }}</h5>
                                                    @if(!blank($orders))
                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>{{ __('levels.order_code') }}</th>
                                                                        <th>{{ __('levels.restaurant_name') }}</th>
                                                                        <th>{{ __('order.order_status') }}</th>
                                                                        <th>{{ __('levels.delivery_charge') }}</th>
                                                                        <th>{{ __('levels.sub_total') }}</th>
                                                                        <th>{{ __('levels.total') }}</th>
                                                                        <th>{{ __('order.payment_status') }}</th>
                                                                        <th>{{ __('order.payment_method') }}</th>
                                                                        <th>{{ __('order.paid_amount') }}</th>
                                                                    </tr>
                                                                    @foreach($orders as $order)
                                                                        <tr>
                                                                            <td>{{ $order->order_code }}</td>
                                                                            <td>{{ $order->restaurant->name }}</td>
                                                                            <td>{{ $order->getOrderStatus }}</td>
                                                                            <td>{{ $order->delivery_charge }}</td>
                                                                            <td>{{ $order->sub_total }}</td>
                                                                            <td>{{ $order->total }}</td>
                                                                            <td>{{ $order->GetPaymentStatus }}</td>
                                                                            <td>{{ $order->getPaymentMethod }}</td>
                                                                            <td>{{ $order->paid_amount }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    @else
                                                        <h4 class="text-danger">{{ __('reports.restaurant_owner_Sales_report_not_found') }}</h4>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </section>
                                {{-- new codes ends --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')

@endpush

@push('custom-scripts')
<script src="{{ asset('assets/restaurant/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/restaurant/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/restaurantownersales/index.js') }}"></script>
@endpush