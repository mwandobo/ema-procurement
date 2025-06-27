@extends('frontend.layouts.app')
@section('header-css')
    not-sticky
@endsection
@section('main-content')
    <div id="titlebar" class="custom-padding">
        <div class="container-fluid custom-container">
            <div class="row no-margin-row">
                <div class="col-md-12">
                    <h2>{{ __('frontend.booking') }}</h2>
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{ route('home') }}">{{ __('frontend.home') }}</a></li>
                            <li>{{ __('frontend.booking') }}</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid custom-container">
        <div class="row no-margin-row">
            <div class="col-lg-8 col-md-8">
                <h3 class="margin-top-0 margin-bottom-30">{{ __('frontend.personal_details') }}</h3>
                <form action="{{ route('restaurant.reservation.store',['restaurant_id'=>$restaurant->id,'reservation_date'=>$reservationDate,'time_slot'=>$timeSlot->id,'guest'=>$guest]) }}" method="GET"
                      enctype="multipart/form-data">
                    <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
                    <input type="hidden" name="reservation_date" value="{{$reservationDate}}">
                    <input type="hidden" name="guest" value="{{$guest}}">
                    <input type="hidden" name="time_slot" value="{{$timeSlot->id}}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(auth()->user())
                        <div class="row no-margin-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('frontend.first_name') }}  <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="{{ __('frontend.first_name') }}" name="first_name" value="{{ old('first_name',auth()->user()->first_name) }}">
                                    @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('frontend.last_name') }}  <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="{{ __('frontend.last_name') }}" name="last_name" value="{{ old('last_name',auth()->user()->last_name) }}">
                                    @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label>{{ __('frontend.email_address') }}  <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('frontend.email_address') }}" name="email" value="{{ old('email',auth()->user()->email) }}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('frontend.phone') }}  <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="{{ __('frontend.phone') }}" name="phone" value="{{ old('phone',auth()->user()->phone) }}" onkeypress='validate(event)'>
                                   @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row no-margin-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('frontend.first_name') }}  <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="{{ __('frontend.first_name') }}" name="first_name" value="{{ old('first_name') }}">
                                    @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('frontend.last_name') }}  <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="{{ __('frontend.last_name') }}" name="last_name" value="{{ old('last_name') }}">
                                    @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('frontend.email_address') }}  <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('frontend.email_address') }}" name="email" value="{{ old('email') }}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('frontend.phone') }}  <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="{{ __('frontend.phone') }}" name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif
                    <button type="submit" class="button booking-confirmation-btn margin-top-40 margin-bottom-65">{{__('frontend.confirm_booking')}}</button>
                </form>
            </div>

            <div class="col-lg-4 col-md-4 margin-top-0 margin-bottom-60">
                <div class="listing-item-container compact order-summary-widget">
                    <div class="listing-item">
                        <img src="{{ asset($restaurant->image) }}" alt="">
                        <div class="listing-item-content">
                            <div class="numerical-rating" data-rating="5.0"></div>
                            <h3>{{$restaurant->name}}</h3>
                            <span>{{$restaurant->address}}</span>
                        </div>
                    </div>
                </div>
                <div class="boxed-widget opening-hours summary margin-top-0">
                    <h3><i class="fa fa-calendar-check-o"></i> {{__('frontend.booking_summary')}}</h3>
                    <ul>
                        <li>{{ __('frontend.date') }} <span>{{$reservationDate}}</span></li>
                        <li>{{ __('frontend.hour') }} <span>{{ date('h:i A', strtotime($timeSlot->start_time)) }} - {{ date('h:i A', strtotime($timeSlot->end_time)) }}</span></li>
                        <li>{{ __('frontend.guests') }} <span>{{$guest}} {{ __('frontend.adults') }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra-js')
<script src="{{ asset('js/phone_validation/index.js') }}"></script>
@endsection
