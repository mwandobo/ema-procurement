@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/tables/tables.css') !!}
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/apex/apexcharts.css') !!}
    {!! Html::style('assets/css/dashboard/dashboard_3.css') !!}
    {!! Html::style('plugins/flatpickr/flatpickr.css') !!}
    {!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
    {!! Html::style('assets/css/elements/tooltip.css') !!}
    <link rel="stylesheet" href="{{ asset('assets/restaurant/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/restaurant/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{ __('order.orders') }}</span></li>
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

                                {{-- new codes start--}}
                                <section class="section">
                                    <div class="section-body">
                                        <div class="row">
                                             <!-- 4 AREAS -->
											   {{-- total order --}}
											   <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
												<div class="widget 4-areas">
													<div class="f-100">
														<div class="card-box">
															<i class="lar la-plus-square text-muted float-right bs-tooltip" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
															<h6 class="mt-0 font-16"> {{ __('order.total_order') }}</h6>
															<h2 class="text-primary my-3 text-center">
																<span class="s-counter2 s-counter"> {{ $total_order }}</span>
															</h2>
															<p class="text-muted mb-0"> {{ __('Total: ') }} {{ $total_order }}
																
															</p>
														</div>
													</div>
												</div>
											</div>
											{{-- total pending --}}
											<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
												<div class="widget 4-areas">
													<div class="f-100">
														<div class="card-box">
															<i class="lar la-paper-plane text-muted float-right bs-tooltip" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
															<h6 class="mt-0 font-16"> {{ __('order.order_pending') }}</h6>
															<h2 class="text-primary my-3 text-center">
																<span class="s-counter3 s-counter"> {{ $pending_order }}</span>
															</h2>
															<p class="text-muted mb-0"> {{ __('Total: ') }} {{ $pending_order }}
																
															</p>
														</div>
													</div>
												</div>
											</div>
											{{-- total process --}}
											<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
												<div class="widget 4-areas">
													<div class="f-100">
														<div class="card-box">
															<i class="lar la-star text-muted float-right bs-tooltip" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
															<h6 class="mt-0 font-16"> {{ __('order.order_process') }}</h6>
															<h2 class="text-primary my-3 text-center">
																<span class="s-counter4 s-counter"> {{ $process_order }}</span>
															</h2>
															<p class="text-muted mb-0"> {{ __('Total: ') }}{{ $process_order }}
																
															</p>
														</div>
													</div>
												</div>
											</div>
											{{-- complete --}}
											<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
												<div class="widget 4-areas">
													<div class="f-100">
														<div class="card-box">
															<i class="las la-check text-muted float-right bs-tooltip" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
															<h6 class="mt-0 font-16"> {{ __('order.order_completed') }}</h6>
															<h2 class="text-primary my-3 text-center">
																<span class="s-counter5 s-counter"> {{ $completed_order }}</span>
															</h2>
															<p class="text-muted mb-0"> {{ __('Total: ') }}{{ $completed_order }}
																{{-- <span class="float-right">
																			<i class="las la-angle-up text-success-teal mr-1"></i> {{ __('2.30%') }}
																		</span> --}}
															</p>
														</div>
													</div>
												</div>
											</div>
											<!-- 4 AREAS -->
                                    </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-8 offset-sm-2">
                                                                <div class="input-group input-daterange" id="date-picker">
                                                                    <select class="form-control" id="status" name="status" id="">
                                                                        @foreach(trans('order_status') as $key => $status)
                                                                            <option value="{{ $key }}">{{ $status }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <input autocomplete="off" class="form-control" id="start_date" type="text" name="start_date" value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}">
                                                                    <input autocomplete="off" class="form-control" id="end_date" type="text" name="end_date" value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="button" id="refresh"> {{ __('levels.refresh') }}</button>
                                                                    </div>
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="button" id="date-search">{{ __('levels.search') }}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                            
                                                        <div class="table-responsive">
                                                            <table class="table table-striped" id="main-table" data-url="{{ route("orders.get-orders") }}" data-status="{{ \App\Enums\OrderStatus::PENDING }}" data-hidecolumn="{{ auth()->user()->can('orders_show') || auth()->user()->can('orders_edit') || auth()->user()->can('orders_delete') }}">
                                                                <thead>
                                                                <tr>
                                                                    <th>{{ __('levels.code') }}</th>
                                                                    <th>{{ __('levels.name') }}</th>
                                                                    <th>{{ __('levels.address') }}</th>
                                                                    <th>{{ __('levels.date') }}</th>
                                                                    <th>{{ __('levels.status') }}</th>
                                                                    <th>{{ __('levels.total') }}</th>
                                                                    <th>{{ __('levels.actions') }}</th>
                                                                </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                {{-- new codes end --}}

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
{!! Html::script('assets/js/loader.js') !!}
{!! Html::script('plugins/apex/apexcharts.min.js') !!}
{!! Html::script('plugins/flatpickr/flatpickr.js') !!}
{!! Html::script('assets/js/dashboard/dashboard_3.js') !!}
{!! Html::script('plugins/counter/jquery.countTo.js') !!}
{!! Html::script('assets/js/components/custom-counter.js') !!}

@endpush

@push('custom-scripts')
<script src="{{ asset('assets/restaurant/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/restaurant/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/restaurant/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/restaurant/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/orders/index.js') }}"></script>

@endpush

