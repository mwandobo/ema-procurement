@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/tables/tables.css') !!}
    <link rel="stylesheet" href="{{ asset('assets/restaurant/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/restaurant/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('cuisine.cuisines') }}</span></li>
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
                                            <div class="col-12">
                                                <div class="card">
                                                    {{-- @can('cuisine_create')
                                                        <div class="card-header">
                                                            <a href="{{ route('cuisine.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> {{ __('cuisine.add_cuisine') }}</a>
                                                        </div>
                                                    @endcan --}}
                                                    <div class="card-header">
                                                        <a href="{{ route('cuisine.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> {{ __('cuisine.add_cuisine') }}</a>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-6 offset-sm-3">
                                                                <div class="input-group input-daterange" id="date-picker">
                                                                    <select class="form-control" id="status" name="status">
                                                                        <option value="">{{ __('levels.select_status') }}</option>
                                                                        @foreach(trans('statuses') as $key => $status)
                                                                            <option value="{{ $key }}">{{ $status }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <select class="form-control" id="requested" name="requested">
                                                                        <option value="">{{ __('levels.select_request') }}</option>
                                                                        @foreach(trans('category_requests') as $key => $requested)
                                                                            <option value="{{ $key }}">{{ $requested }}</option>
                                                                        @endforeach
                                                                    </select>
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
                                                            <table class="table table-striped" id="maintable" data-url="{{ route('cuisine.index') }}" data-status="{{ \App\Enums\Status::ACTIVE }}" data-hidecolumn="{{ auth()->user()->can('cuisine_edit') || auth()->user()->can('cuisine_delete') }}">
                                                                <thead>
                                                                    <tr>
                                                                        <th>{{ __('levels.id') }}</th>
                                                                        <th>{{ __('levels.image') }}</th>
                                                                        <th>{{ __('levels.name') }}</th>
                                                                        <th>{{ __('levels.created_by') }}</th>
                                                                        <th>{{ __('levels.status') }}</th>
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

<script src="{{ asset('assets/restaurant/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/restaurant/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/restaurant/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/cuisine/index.js') }}"></script>

@endpush