@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/tables/tables.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{ __('restaurant.import_restaurant') }}</span></li>
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
                                                    {{-- @can('restaurants_create')
                                                    <div class="card-header">
                                                        <a href="{{ route('restaurants.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> {{ __('restaurant.add_restaurant') }}</a>
                                                    </div>
                                                    @endcan --}}
                                                    <div class="card-header">
                                                        <a href="{{ route('restaurants.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> {{ __('restaurant.add_restaurant') }}</a>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group ">
                                                                                <div class="custom-file text-left">
                                                                                    <input type="file" name="file" class="custom-file-input file-upload-input" id="customFile">
                                                                                    <label class="custom-file-label" for="customFile">{{__('levels.choose_file')}}</label>
                                                                                </div>
                                                                                @error('file')
                                                                                <div class="text-danger ">{{ $message }}</div>
                                                                                @enderror
                                
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <button class="btn btn-primary form-control">{{ __('restaurant.import') }}</button>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <a href="{{asset('assets/sample/restaurantImportSample.xlsx')}}" download class="btn btn-success form-control">{{ __('restaurant.sample') }} </a>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                
                                                            <div class="col-md-4 ">
                                                                @if(session()->has('importErrors'))
                                                                <h2 class="text-center border-bottom">{{__('restaurant.validation_log')}}</h2>
                                                                @foreach(session()->get('importErrors') as $key => $values)
                                                                <div class="text-primary ">{{__('restaurant.in_row_number')}} : {{ $key }}</div>
                                                                @foreach($values as $value)
                                                                <div class="text-danger ">{{ $value }}</div>
                                                                @endforeach
                                                                @endforeach
                                
                                                                @endif
                                                            </div>
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

@endpush

@push('custom-scripts')

@endpush
