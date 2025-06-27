@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/tables/tables.css') !!}
	<link rel="stylesheet" href="{{ asset('assets/restaurant/select2/dist/css/select2.min.css') }}">
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{ __('table.table') }}</span></li>
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
											<div class="row">
												<div class="col-12 col-md-6 col-lg-6">
													<div class="card">
														<form action="{{ route('tables.update', $table) }}" method="POST">
															@csrf
															@method('PUT')
															<div class="card-body">
																@if(auth()->user()->myrole == 1)
																	<div class="form-group">
																		<label for="area">{{ __('levels.restaurant') }}</label> <span class="text-danger">*</span>
																		<select name="restaurant_id" id="area"
																				class="select2 form-control @error('restaurant_id') is-invalid red-border @enderror">
																			<option value="">{{ __('levels.select_restaurant') }}</option>
																			@if(!blank($restaurants))
																				@foreach($restaurants as $restaurant)
																					<option value="{{ $restaurant->id }}"
																						{{ (old('restaurant_id', $table->restaurant_id) == $restaurant->id) ? 'selected' : '' }}> {{ $restaurant->name }}
																					</option>
																				@endforeach
																			@endif
																		</select>
																		@error('restaurant_id')
																		<div class="invalid-feedback">
																			{{ $message }}
																		</div>
																		@enderror
																	</div>
																@else
																	<input type="hidden" name="restaurant_id" value="{{auth()->user()->restaurant->id ?? 0}}">
																@endif
																<div class="form-group">
																	<label>{{ __('levels.name') }}</label> <span class="text-danger">*</span>
																	<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $table->name) }}">
																	@error('name')
																		<div class="invalid-feedback">
																			{{ $message }}
																		</div>
																	@enderror
																</div>
																<div class="form-group">
																	<label>{{ __('levels.capacity') }}</label> <span class="text-danger">*</span>
																	<input type="number" name="capacity" class="form-control @error('capacity') is-invalid @enderror" value="{{ old('capacity', $table->capacity) }}">
																	@error('capacity')
																		<div class="invalid-feedback">
																			{{ $message }}
																		</div>
																	@enderror
																</div>

																<div class="form-group">
																	<label>{{ __('levels.status') }}</label> <span class="text-danger">*</span>
																	<select name="status" class="form-control @error('status') is-invalid @enderror">
																		@foreach(trans('statuses') as $key => $status)
																			<option value="{{ $key }}" {{ (old('status', $table->status) == $key) ? 'selected' : '' }}>{{ $status }}</option>
																		@endforeach
																	</select>
																	@error('status')
																		<div class="invalid-feedback">
																			{{ $message }}
																		</div>
																	@enderror
																</div>
															</div>

															<div class="card-footer">
																<button class="btn btn-primary mr-1" type="submit">{{ __('levels.submit') }}</button>
															</div>
														</form>
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

@endpush

@push('custom-scripts')
<script src="{{ asset('assets/restaurant/select2/dist/js/select2.full.min.js') }}"></script>
@endpush