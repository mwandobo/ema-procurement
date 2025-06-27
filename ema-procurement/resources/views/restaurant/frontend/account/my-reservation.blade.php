@extends('frontend.layouts.app')

@section('main-content')
    <div class="container-fluid margin-top-20">
    <div class="row sticky-wrapper">
        @include('frontend.account.partials._sidebar')
        <section class="col-lg-8 col-md-8 padding-left-30">
            <h4 class="headline margin-top-0 margin-bottom-30">{{__('frontend.recent_reservation')}}</h4>
            <table class="basic-table ">
                <thead>
                <tr>
                    <th>{{ __('levels.date') }}</th>
                    <th>{{ __('levels.slot') }}</th>
                    <th>{{ __('levels.table') }}</th>
                    <th>{{ __('levels.guest') }}</th>
                    <th>{{ __('levels.status') }}</th>
                </tr>
                </thead>
                <tbody>
                    @if(!blank($reservations))
                        @foreach($reservations as $reservation)
                            <tr>
                                <td class="py-3"><a class="nav-link-style fw-medium fs-sm"  data-bs-toggle="modal">{{\Carbon\Carbon::parse($reservation->created_at)->format('d M Y, h:i A')}}</a></td>
                                <td class="py-3">{{date('h:i A', strtotime($reservation->timeSlot->start_time)).'-'.date('h:i A', strtotime($reservation->timeSlot->end_time))}}</td>
                                <td class="py-3">{{$reservation->table->name}}</td>
                                <td class="py-3">{{$reservation->guest_number}}</td>
                                <td class="py-3">{{ __('reservation_status.' . $reservation->status) }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </section>
    </div>
</div>
@endsection

