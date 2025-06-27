@extends('frontend.layouts.app')
@section('main-content')
    <div class="container-fluid margin-top-20">
    <div class="row sticky-wrapper">
        @include('frontend.account.partials._sidebar')
        <section class="col-lg-8 col-md-8 padding-left-30">
            <h4 class="headline margin-top-0 margin-bottom-30">{{__('frontend.my_recent_orders')}}</h4>
            <table class="basic-table myorder-table ">
                <thead>
                <tr>
                    <th>{{__('frontend.order')}}#</th>
                    <th>{{__('frontend.date_purchased')}}</th>
                    <th>{{__('frontend.status')}}</th>
                    <th>{{__('frontend.total')}}</th>
                    <th>{{__('frontend.details')}}</th>
                </tr>
                </thead>
                <tbody>
                @if(!blank($orders))
                    @foreach($orders as $order)
                        <tr>
                    <td class="py-3"><a class="nav-link-style fw-medium fs-sm" href="{{ route('account.order.show', $order->id)}}" data-bs-toggle="modal">{{$order->order_code}}</a></td>
                    <td class="py-3">{{\Carbon\Carbon::parse($order->created_at)->format('d M Y, h:i A')}}</td>
                    @if($order->status == \App\Enums\OrderStatus::CANCEL)
                        @php ( $statusColor = 'tag-danger')
                    @elseif($order->status == \App\Enums\OrderStatus::COMPLETED)
                        @php ( $statusColor = 'tag-success')
                            @elseif($order->status == \App\Enums\OrderStatus::PROCESS)
                        @php ( $statusColor = 'bg-primary')
                    @else
                        @php ( $statusColor = 'tag-warning')
                    @endif
                    <td class="py-3"><span class="tag {{$statusColor}}">{{trans('order_status.' . $order->status)}}</span></td>
                    <td class="py-3">{{currencyFormat($order->total)}}</td>
                    <td class="text-center"><a class="btn themeCustomColor h5 text-white text-center" href="{{ route('account.order.show', $order->id)}}" data-bs-toggle="modal"><i class="fas fa-eye"></i></a></td>

                </tr>
                @endforeach
                    @endif
                </tbody>
            </table>
        </section>
    </div>
</div>
@endsection

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endsection
@section('extra-js')
    <script src="{{ asset('assets/modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/frontend/order/index.js') }}"></script>
@endsection
