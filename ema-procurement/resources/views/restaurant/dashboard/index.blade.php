@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/tables/tables.css') !!}
	{!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/apex/apexcharts.css') !!}
    {!! Html::style('assets/css/dashboard/dashboard_3.css') !!}
    {!! Html::style('plugins/flatpickr/flatpickr.css') !!}
    {!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
    {!! Html::style('assets/css/elements/tooltip.css') !!}
	{!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{ __('dashboard.dashboard')}}</span></li>
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
								{{-- new cose start  --}}
									<div class="row">
									{{-- @if (auth()->user()->myrole == 1) --}}
									@if (true)
									 
									           <!-- 4 AREAS -->
											   {{-- total order --}}
											   <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
												<div class="widget 4-areas">
													<div class="f-100">
														<div class="card-box">
															<i class="lar la-paper-plane text-muted float-right bs-tooltip" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
															<h6 class="mt-0 font-16"> {{ __('dashboard.total_orders') }}</h6>
															<h2 class="text-primary my-3 text-center">
																<span class="s-counter2 s-counter"> {{ $totalOrders }}</span>
															</h2>
															<p class="text-muted mb-0"> {{ __('Total: ') }} {{ $totalOrders }}
																
															</p>
														</div>
													</div>
												</div>
											</div>
											{{-- total user --}}
											<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
												<div class="widget 4-areas">
													<div class="f-100">
														<div class="card-box">
															<i class="lar la-user text-muted float-right bs-tooltip" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
															<h6 class="mt-0 font-16"> {{ __('dashboard.total_customers')  }}</h6>
															<h2 class="text-primary my-3 text-center">
																<span class="s-counter3 s-counter"> {{ $totalUsers }}</span>
															</h2>
															<p class="text-muted mb-0"> {{ __('Total: ') }} {{ $totalUsers }}
																
															</p>
														</div>
													</div>
												</div>
											</div>
											{{-- total shop --}}
											<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
												<div class="widget 4-areas">
													<div class="f-100">
														<div class="card-box">
															<i class="las la-university text-muted float-right bs-tooltip" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
															<h6 class="mt-0 font-16"> {{ __('dashboard.total_restaurants') }}</h6>
															<h2 class="text-primary my-3 text-center">
																<span class="s-counter4 s-counter"> {{ $totalRestaurants }}</span>
															</h2>
															<p class="text-muted mb-0"> {{ __('Total: ') }}{{ $totalRestaurants }}
																
															</p>
														</div>
													</div>
												</div>
											</div>
											{{-- total income --}}
											<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
												<div class="widget 4-areas">
													<div class="f-100">
														<div class="card-box">
															<i class="las la-money-bill text-muted float-right bs-tooltip" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
															<h6 class="mt-0 font-16"> {{ __('dashboard.available_credit') }}</h6>
															<h2 class="text-primary my-3 text-center">
																<span class="s-counter5 s-counter"> {{ number_format($totalIncome, 2) }}</span>
															</h2>
															<p class="text-muted mb-0"> {{ __('Total: ') }}{{ number_format($totalIncome, 2) }}
																{{-- <span class="float-right">
																			<i class="las la-angle-up text-success-teal mr-1"></i> {{ __('2.30%') }}
																		</span> --}}
															</p>
														</div>
													</div>
												</div>
											</div>
											<!-- 4 AREAS -->

									@elseif(auth()->user()->myrole == 3)
										<div class="col-lg-3 col-md-6 col-sm-6 col-12">
											<div class="widget 4-areas">
												<div class="card-icon bg-warning">
													<i class="las la-cubes"></i>
												</div>
												<div class="card-wrap">
													<div class="card-header">
														<h4>{{ __('dashboard.pending_orders') }}</h4>
													</div>
													<div class="card-body">
														{{ $ownerNotificationOrders }}
													</div>
												</div>
											</div>
										</div>
										{{-- total order --}}
										<div class="col-lg-3 col-md-6 col-sm-6 col-12">
											<div class="widget 4-areas">
												<div class="card-icon bg-primary">
													<i class="lar la-paper-plane"></i>
												</div>
												<div class="card-wrap">
													<div class="card-header">
														<h4>{{ __('dashboard.total_orders') }}</h4>
													</div>
													<div class="card-body">
														{{ $ownerTotalOrders }}
													</div>
												</div>
											</div>
										</div>
											{{-- total Booking --}}
										<div class="col-lg-3 col-md-6 col-sm-6 col-12">
											<div class="widget 4-areas">
												<div class="card-icon bg-danger">
													<i class="las la-table"></i>
												</div>
												<div class="card-wrap">
													<div class="card-header">
														<h4>{{ __('dashboard.total_booking') }}</h4>
													</div>
													<div class="card-body">
														{{ $ownerTotalReservations }}
													</div>
												</div>
											</div>
										</div>
											{{-- total income --}}
										<div class="col-lg-3 col-md-6 col-sm-6 col-12">
											<div class="widget 4-areas">
												<div class="card-icon bg-success">
													<i class="las la-money-bill"></i>
												</div>
												<div class="card-wrap">
													<div class="card-header">
														<h4>{{ __('dashboard.available_credit') }}</h4>
													</div>
													<div class="card-body">
														{{ $userCredit}}
													</div>
												</div>
											</div>
										</div>
									@elseif(auth()->user()->myrole == 4)
												{{-- Notification order --}}
										<div class="col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="widget 4-areas">
												<div class="card-icon bg-primary">
													<i class="las la-cubes"></i>
												</div>
												<div class="card-wrap">
													<div class="card-header">
														<h4>{{ __('dashboard.total_notification_order') }}</h4>
													</div>
													<div class="card-body">
														{{ $notificationOrders }}
													</div>
												</div>
											</div>
										</div>
											{{-- total Order --}}
										<div class="col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="widget 4-areas">
												<div class="card-icon bg-danger">
													<i class="lar la-paper-plane"></i>
												</div>
												<div class="card-wrap">
													<div class="card-header">
														<h4>{{ __('dashboard.total_orders') }}</h4>
													</div>
													<div class="card-body">
														{{ $totalDaliveryOrders }}
													</div>
												</div>
											</div>
										</div>
											{{-- total income --}}
										<div class="col-lg-4 col-md-6 col-sm-6 col-12">
											<div class="widget 4-areas">
												<div class="card-icon bg-success">
													<i class="las la-money-bill"></i>
												</div>
												<div class="card-wrap">
													<div class="card-header">
														<h4>{{ __('dashboard.available_credit') }}</h4>
													</div>
													<div class="card-body">
														{{ $userCredit}}
													</div>
												</div>
											</div>
										</div>
							
									@endif
							
									</div>

									<!-- SUMMARY -->
									<div class="row">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
										<div class="widget widget-chart-one">
										
											<div class="widget-content">
												<div class="tabs tab-content">
													<div id="content_1" class="tabcontent">
														<div id="earningGraph"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
									</div>
									<!-- SUMMARY ENDS-->
									<div class="row">
										
												<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12  layout-spacing">
													<div class="widget-content widget-content-area br-6">
												<div class="table-header">
													<div class="row">
														<div class="col-lg-6 col-md-6 col-sm-6 col-12">
															<h4>{{ __('dashboard.recent_orders') }} <span class="badge badge-primary">{{ $recentOrders->count() }}</span></h4></div> 
														
													<div class="col-lg-6 col-md-6 col-sm-6 col-12">
														<a href="{{ route('orders.index') }}" class="btn btn-primary float-right">{{ __('dashboard.view_more') }} <i class="las la-chevron-right"></i></a>
													</div>
													</div>
													
												</div>
												<div class="table-responsive mb-4">
													<div class="table-responsive table-invoice">
														<table class="table table-striped">
															<tr>
																<th>{{ __('levels.name') }}</th>
																<th>{{ __('levels.status') }}</th>
																<th>{{ __('levels.total') }}</th>
																<th>{{ __('levels.action') }}</th>
															</tr>
															@if(!blank($recentOrders))
																@foreach($recentOrders as $order)
																		@if($loop->index > 4)
																			@break
																		@endif
																	<tr>
																		<td>{{ $order->user->name }}</td>
																		<td>{{ trans('order_status.' . $order->status) }}</td>
																		<td>{{ number_format($order->total, 2) }}</td>
																		<td>
																			<a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-icon btn-primary"><i class="lar la-eye"></i></a>
																		</td>
																	</tr>
																@endforeach
															@endif
														</table>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
											<div class="widget widget-chart-one">
												<div class="widget-content">
													<div class="agent-info text-center">
														<div class="agent-img pb-3">
															<a href="{{ route('profile') }}">
																<img src="{{ auth()->user()->image }}" class="img-thumbnail rounded-circle" alt="image">
															</a>
														</div>
														<p>
															{{ auth()->user()->getrole->name ?? '' }}
														</p>
													</div>
													<div class="list-group">
														<li class="list-group-item list-group-item-action"><i class="fa fa-user"></i> {{ auth()->user()->name }}</li>
														<li class="list-group-item list-group-item-action"><i class="fa fa-envelope"></i> {{ auth()->user()->email }}</li>
														<li class="list-group-item list-group-item-action"><i class="fa fa-phone"></i> {{ auth()->user()->phone }}</li>
														<li class="list-group-item list-group-item-action"><i class="fa fa-map"></i> {{ auth()->user()->address }}</li>
													</div>
												</div>
											</div>
										</div>
									</div>
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
{!! Html::script('assets/js/loader.js') !!}
{!! Html::script('plugins/apex/apexcharts.min.js') !!}
{!! Html::script('plugins/flatpickr/flatpickr.js') !!}
{!! Html::script('assets/js/dashboard/dashboard_3.js') !!}
{!! Html::script('plugins/counter/jquery.countTo.js') !!}
{!! Html::script('assets/js/components/custom-counter.js') !!}

@endpush

@push('custom-scripts')
<script src="{{ asset('assets/restaurant/highcharts/highcharts.js') }}"></script>
	<script src="{{ asset('assets/restaurant/highcharts/highcharts-more.js') }}"></script>
	<script src="{{ asset('assets/restaurant/highcharts/data.js') }}"></script>
	<script src="{{ asset('assets/restaurant/highcharts/drilldown.js') }}"></script>
	<script src="{{ asset('assets/restaurant/highcharts/exporting.js') }}"></script>
	@include('restaurant.vendor.installer.update.OrderIncomeGraph')

@endpush
