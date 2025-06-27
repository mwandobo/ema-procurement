@extends('frontend.layouts.app')
@section('header-css')
    not-sticky
@endsection
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="booking-confirmation-page">
                    <i class="fa fa-check-circle"></i>
                    <h2 class="margin-top-30">{{__('frontend.thanks_for_your_booking')}}</h2>
                    <p>{{__("frontend.confirmation_email")}} <span class="text-danger">{{auth()->user()->email}}</span></p>
                    <a href="{{route('account.reservations')}}" class="button margin-top-30">{{__('frontend.check_your_reservation')}}</a>
                </div>

            </div>
        </div>
    </div>
@endsection

