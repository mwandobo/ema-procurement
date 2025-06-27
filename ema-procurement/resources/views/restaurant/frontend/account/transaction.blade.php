@extends('frontend.layouts.app')
@section('main-content')
    <div class="container-fluid margin-top-20">
        <div class="row sticky-wrapper">
            @include('frontend.account.partials._sidebar')
            <section class="col-lg-8 col-md-8 padding-left-30">
                <h4 class="headline margin-top-0 margin-bottom-30">{{__('frontend.my_transaction_list')}}</h4>
                <table class="basic-table ">
                    <thead>
                    <tr>
                        <th>{{ __('frontend.id') }}</th>
                        <th>{{ __('frontend.type') }}</th>
                        <th>{{ __('frontend.date') }}</th>
                        <th>{{ __('frontend.amount') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!blank($transactions))
                        @php $i = 0 @endphp
                        @foreach ($transactions as $transaction)
                            @php $i++ @endphp
                            <tr>
                                <td class="py-3"><a class="nav-link-style fw-medium fs-sm" href="#" data-bs-toggle="modal">{{$i}}</a></td>
                                <td class="py-3">{{ trans('transaction_types.'.$transaction->type) }}</td>
                                <td class="py-3"><span class="tag tag-danger">{{ food_date_format_with_day($transaction->created_at) }}</span></td>
                                <td class="py-3">{{ transactionCurrencyFormat($transaction) }}</td>
                            </tr>
                        @endforeach
                        @else
                        <h5 class="mb-0">{{ __('frontend.transaction_yet') }}</h5>

                    @endif
                    </tbody>
                </table>
            </section>
        </div>
    </div>

@endsection
