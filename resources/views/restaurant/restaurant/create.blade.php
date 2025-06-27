@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/tables/tables.css') !!}
    <link rel="stylesheet" href="{{ asset('assets/restaurant/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/restaurant/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/restaurant/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/restaurant/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{ __('levels.restaurant') }}</span></li>
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
                                        <form action="{{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5 class="mb-0">{{ __('restaurant.restaurant_information') }}</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="form-row">
                                                                <div class="form-group col">
                                                                    <label for="name">{{ __('levels.name') }}</label> <span class="text-danger">*</span>
                                                                    <input id="name" type="text" name="name"
                                                                           class="form-control form-control-sm @error('name') is-invalid @enderror"
                                                                           value="{{ old('name') }}">
                                                                    @error('name')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                            
                                                                <div class="form-group col">
                                                                    <label>{{ __('levels.delivery_charge') }}</label>
                                                                    <input type="text" name="delivery_charge"
                                                                           class="form-control form-control-sm @error('delivery_charge') is-invalid @enderror"
                                                                           value="{{ old('delivery_charge') }}">
                                                                    @error('delivery_charge')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                            
                                                            <div class="form-row">
                                                                <div class="form-group col">
                                                                    <label for="opening_time">{{ __('levels.opening_time') }}</label>
                                                                    <input id="opening_time" type="text" name="opening_time"
                                                                           class="date-picker-w form-control form-control-sm timepicker date-w @error('opening_time') is-invalid @enderror"
                                                                           value="{{ old('opening_time') }}">
                                                                    @error('opening_time')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                            
                                                                <div class="form-group col">
                                                                    <label for="closing_time">{{ __('levels.closing_time') }}</label>
                                                                    <input id="closing_time" type="text" name="closing_time"
                                                                           class="form-control form-control-sm timepicker @error('closing_time') is-invalid @enderror"
                                                                           value="{{ old('closing_time') }}">
                                                                    @error('closing_time')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col">
                                                                    <label for="cuisines">{{ __('cuisine.cuisines') }} </label>
                                                                    <select id="cuisines" name="cuisines[]"
                                                                            class="form-control select2 @error('cuisines') is-invalid @enderror"
                                                                            multiple="multiple">
                                                                        @if(!blank($cuisines))
                                                                            @foreach($cuisines as $cuisine)
                                                                                <option value="{{ $cuisine->id }}">{{ $cuisine->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                    @error('cuisines')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{ __('levels.restaurant_address') }}</label> <span class="text-danger">*</span>
                                                                <textarea name="restaurantaddress"
                                                                          class="form-control address-textarea-height @error('restaurantaddress') is-invalid @enderror"
                                                                          id="restaurantaddress">{{ old('restaurantaddress') }}</textarea>
                                                                @error('restaurantaddress')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                            
                                                            <div class="form-group">
                                                                <label>{{ __('levels.description') }}</label>
                                                                <textarea name="description"
                                                                          class="form-control address-textarea-height @error('description') is-invalid @enderror"
                                                                          id="description">{{ old('description') }}</textarea>
                                                                @error('description')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                            
                                                            <div class="form-group">
                                                                <label for="restaurant_logo">{{ __('restaurant.logo') }}</label>
                                                                <div class="custom-file">
                                                                    <input name="restaurant_logo" type="file"
                                                                           class="custom-file-input @error('restaurant_logo') is-invalid @enderror"
                                                                           id="restaurant_logo" onchange="readURL(this,'previewImage');">
                                                                    <label class="custom-file-label"
                                                                           for="restaurant_logo">{{ __('Choose file') }}</label>
                                                                </div>
                                                                @if ($errors->has('restaurant_logo'))
                                                                    <div class="help-block text-danger">
                                                                        {{ $errors->first('restaurant_logo') }}
                                                                    </div>
                                                                @endif
                                                                <img class="img-thumbnail mt-4 mb-3 admin-banner-img-hight" id="previewImage"
                                                                     src="{{ asset('assets/img/default/restaurant.png') }}" alt="your image" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="customFile">{{ __('restaurant.background_image') }}</label>
                                                                <div class="custom-file">
                                                                    <input name="image" type="file"
                                                                           class="custom-file-input @error('image') is-invalid @enderror" id="customFile"
                                                                           onchange="readURL(this,'previewImage2');">
                                                                    <label class="custom-file-label" for="customFile">{{ __('levels.choose_file') }}</label>
                                                                </div>
                                                                @if ($errors->has('image'))
                                                                    <div class="help-block text-danger">
                                                                        {{ $errors->first('image') }}
                                                                    </div>
                                                                @endif
                                                                <img class="img-thumbnail mt-4 mb-3 admin-banner-img-hight" id="previewImage2"
                                                                     src="{{ asset('assets/img/default/restaurant.png') }}" alt="your image" />
                                                            </div>
                                                        </div>
                                                    </div>
                            
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5 class="mb-0">{{ __('restaurant.restaurant_status') }}</h5>
                                                        </div>
                                                        <div class="card-body">
                            
                                                            <div class="form-row">
                                                                <div class="form-group col">
                                                                    <label>{{ __('levels.delivery') }}</label> <span class="text-danger">*</span>
                                                                    <select name="delivery_status"
                                                                            class="form-control form-control-sm-custom @error('delivery_status') is-invalid @enderror">
                                                                        @foreach(trans('delivery_statuses') as $delivery_statusKey => $delivery_status)
                                                                            <option value="{{ $delivery_statusKey }}"
                                                                                {{ (old('delivery_status') == $delivery_statusKey) ? 'selected' : '' }}>
                                                                                {{ $delivery_status }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('delivery_status')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col">
                                                                    <label>{{ __('levels.pickup') }}</label> <span class="text-danger">*</span>
                                                                    <select name="pickup_status"
                                                                            class="form-control form-control-sm-custom @error('pickup_status') is-invalid @enderror">
                                                                        @foreach(trans('pickup_statuses') as $pickup_statusKey => $pickup_status)
                                                                            <option value="{{ $pickup_statusKey }}"
                                                                                {{ (old('pickup_status') == $pickup_statusKey) ? 'selected' : '' }}>
                                                                                {{ $pickup_status }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('pickup_status')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                            
                                                            <div class="form-row">
                                                                <div class="form-group col">
                                                                    <label>{{ __('levels.table') }}</label> <span class="text-danger">*</span>
                                                                    <select name="table_status"
                                                                            class="form-control form-control-sm-custom @error('table_status') is-invalid @enderror">
                                                                        @foreach(trans('table_statuses') as $table_statusKey => $table_status)
                                                                            <option value="{{ $table_statusKey }}"
                                                                                {{ (old('table_status') == $table_statusKey) ? 'selected' : '' }}>
                                                                                {{ $table_status }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('table_status')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                            
                                                                <div class="form-group col">
                                                                    <label>{{ __('levels.current_status') }}</label> <span class="text-danger">*</span>
                                                                    <select name="current_status"
                                                                            class="form-control form-control-sm-custom @error('current_status') is-invalid @enderror">
                                                                        @foreach(trans('current_statuses') as $current_statusKey => $current_status)
                                                                            <option value="{{ $current_statusKey }}"
                                                                                {{ (old('current_status') == $current_statusKey) ? 'selected' : '' }}>
                                                                                {{ $current_status }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('current_status')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                            
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-6">
                                                                    <label>{{ __('levels.status') }}</label> <span class="text-danger">*</span>
                                                                    <select name="status"
                                                                            class="form-control form-control-sm-custom @error('status') is-invalid @enderror">
                                                                        @foreach(trans('statuses') as $statusKey => $status)
                                                                            <option value="{{ $statusKey }}"
                                                                                {{ (old('status') == $statusKey) ? 'selected' : '' }}>{{ $status }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('status')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-sm-6">
                                                                    <label>{{ __('levels.waiter_status') }}</label> <span class="text-danger">*</span>
                                                                    <select name="waiter_status"
                                                                            class="form-control form-control-sm-custom @error('waiter_status') is-invalid @enderror">
                                                                        @foreach(trans('waiter_statuses') as $waiter_statusKey => $waiter_status)
                                                                            <option value="{{ $waiter_statusKey }}"
                                                                                {{ (old('waiter_status') == $waiter_statusKey) ? 'selected' : '' }}>{{ $waiter_status }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('waiter_status')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-primary" type="submit">{{ __('levels.submit') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                            
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5>{{ __('restaurant.restaurant_location') }}</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="form-row">
                                                                <div class="form-group col">
                                                                    <label for="lat">{{ __('levels.latitude') }}</label> <span
                                                                        class="text-danger">*</span>
                                                                    <input type="text" name="lat" id="lat"
                                                                           class="form-control form-control-sm @error('lat') is-invalid @enderror"
                                                                           value="{{ old('lat') }}">
                                                                    @error('lat')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col">
                                                                    <label for="long">{{ __('levels.longitude') }}</label> <span
                                                                        class="text-danger">*</span>
                                                                    <input type="text" id="long" name="long"
                                                                           class="form-control form-control-sm @error('long') is-invalid @enderror"
                                                                           value="{{ old('long') }}">
                                                                    @error('long')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div id="googleMap"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                            
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5>{{ __('restaurant.restaurant_owner_information') }}</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="form-row">
                                                                <div class="form-group col">
                                                                    <label for="first_name">{{ __('levels.first_name') }}</label>
                                                                    <span class="text-danger">*</span>
                                                                    <input id="first_name" type="text" name="first_name"
                                                                           class="form-control form-control-sm @error('first_name') is-invalid @enderror"
                                                                           value="{{ old('first_name') }}">
                                                                    @error('first_name')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                            
                                                                <div class="form-group col">
                                                                    <label for="last_name">{{ __('levels.last_name') }}</label>
                                                                    <span class="text-danger">*</span>
                                                                    <input id="last_name" type="text" name="last_name"
                                                                           class="form-control form-control-sm @error('last_name') is-invalid @enderror"
                                                                           value="{{ old('last_name') }}">
                                                                    @error('last_name')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                            
                                                            <div class="form-row">
                                                                <div class="form-group col">
                                                                    <label for="email">{{ __('levels.email') }}</label><span class="text-danger">
                                                                    *</span>
                                                                    <input id="email" type="email" name="email"
                                                                           class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                                           value="{{ old('email') }}">
                                                                    @error('email')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                            
                                                                <div class="form-group col">
                                                                    <label for="username">{{ __('levels.username') }}</label>
                                                                    <input id="username" type="text" name="username"
                                                                           class="form-control form-control-sm @error('username') is-invalid @enderror"
                                                                           value="{{ old('username') }}">
                                                                    @error('username')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                            
                                                            <div class="form-row">
                                                                <div class="form-group col">
                                                                    <label for="password">{{ __('levels.password') }}</label><span class="text-danger">
                                                                    *</span>
                                                                    <input id="password" type="password" name="password"
                                                                           class="form-control form-control-sm @error('password') is-invalid @enderror"
                                                                           value="{{ old('password') }}">
                                                                    @error('password')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col">
                                                                    <label for="phone">{{ __('levels.phone') }}</label><span class="text-danger">
                                                                    *</span>
                                                                    <input id="phone" type="text" name="phone"
                                                                           class="form-control form-control-sm @error('phone') is-invalid @enderror"
                                                                           value="{{ old('phone') }}" onkeypress='validate(event)'>
                                                                    @error('phone')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                            
                                                            <div class="form-group">
                                                                <label for="address">{{ __('levels.address') }}</label>
                                                                <span class="text-danger">*</span>
                                                                <textarea name="address"
                                                                          class="form-control address-textarea-height @error('address') is-invalid @enderror"
                                                                          id="address">{{ old('address') }}</textarea>
                                                                @error('address')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                            
                                                            <div class="form-row">
                                                                <div class="form-group col">
                                                                    <label>{{ __('levels.deposit_amount') }}</label>
                                                                    <input type="number" name="deposit_amount"
                                                                           class="form-control form-control-sm @error('deposit_amount') is-invalid @enderror"
                                                                           value="{{ old('deposit_amount') }}">
                                                                    @error('deposit_amount')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                            
                                                                <div class="form-group col">
                                                                    <label>{{ __('levels.status') }}</label> <span class="text-danger">*</span>
                                                                    <select name="userstatus"
                                                                            class="form-control form-control-sm-custom @error('userstatus') is-invalid @enderror">
                                                                        @foreach(trans('user_statuses') as $key => $userstatus)
                                                                            <option value="{{ $key }}" {{ (old('userstatus') == $key) ? 'selected' : '' }}>
                                                                                {{ $userstatus }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('userstatus')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
<script src="{{ asset('assets/restaurant/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
{{-- <script async
        src="https://maps.googleapis.com/maps/api/js?key={{ setting('google_map_api_key') }}&libraries=places&callback=initMap">
</script> --}}
<script src="{{ asset('js/restaurant/create.js') }}"></script>
<script src="{{ asset('js/phone_validation/index.js') }}"></script>

@endpush
