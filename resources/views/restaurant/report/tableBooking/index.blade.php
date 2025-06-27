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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{ __('reports.reservation_report') }}</span></li>
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
                                
                                                <form action="<?= route('reservation-report.index') ?>" method="POST">
                                                    @csrf
                                                    <div class="row">
                                
                                                        @if(auth()->user()->myrole == 3)
                                
                                                        <input type="hidden" name="restaurant_id" class="form-control" value="{{ auth()->user()->restaurant->id ?? 0 }}">
                                
                                                        @else
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label>{{ __('levels.restaurant') }}</label> 
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
                                                <button class="btn btn-success btn-sm report-print-button" onclick="printDiv('printablediv')">{{ __('Print') }}</button>
                                            </div>
                                            <div class="card-body" id="printablediv">
                                                <h5>{{ __('reports.reservation_report') }}</h5>
                                                @if(!blank($reservations))
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>{{__('levels.id')}}</th>
                                                                <th>{{ __('levels.restaurant_name') }}</th>
                                                                <th>{{ __('levels.table') }}</th>
                                                                <th>{{ __('levels.date') }}</th>
                                                                <th>{{ __('levels.slot') }}</th>
                                                                <th>{{ __('levels.guest') }}</th>
                                                                <th>{{ __('levels.name') }}</th>
                                                            </tr>
                                                            
                                                            @php $i=0; @endphp
                                                            @foreach($reservations as $reservation)
                                                            <tr>
                                                                <td>{{ $i+=1 }}</td>
                                                                <td>{{ $reservation->table->restaurant->name }}</td>
                                                                <td>{{ $reservation->table->name }}</td>
                                                                <td>{{ date('d M Y', strtotime($reservation->created_at))}}</td>
                                                                <td>{{date('h:i A', strtotime($reservation->timeSlot->start_time)).'-'.date('h:i A', strtotime($reservation->timeSlot->end_time))}}</td>
                                                                <td>{{ $reservation->guest_number}}</td>
                                                                <td>{{ $reservation->first_name.' '.$reservation->last_name}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </thead>
                                                    </table>
                                                </div>
                                                @else
                                                <h4 class="text-danger">{{ __('reports.reservation_report_not_found') }}</h4>
                                                @endif
                                            </div>
                                        </div>
                                        @endif
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
<script src="{{ asset('assets/restaurant/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/restaurant/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/reservationreport/index.js') }}"></script>

@endpush