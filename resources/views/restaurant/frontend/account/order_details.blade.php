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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Breadcrumbs')}}</span></li>
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
                                {{-- new code start --}}
                                <div class="container-fluid margin-top-20">
                                    <div class="row sticky-wrapper">
                                        <div class="col-lg-8 col-md-8 padding-left-30">
                                            <div id="invoice-print">
                                                <article class="card">
                                                    <header class="card-header"> {{__('frontend.my_orders')}} / {{ __('frontend.tracking') }}</header>
                                                    <div class="card-body">
                                                        <div class="d-flex flex-wrap justify-content-between">
                                                            <h6>{{ __('frontend.order') }} #{{ $order->order_code }} </h6>
                                                            <h6> <span class="float-right"><strong> {{ __('frontend.order_date') }}:
                                                                    </strong>{{ $order->created_at->format('d M Y, h:i A') }}</span></h6>
                                                        </div>
                                                        <div class=" row no-gutters">
                                                            <div class="col-md-4">
                                                                <strong>{{ __('frontend.billing_to') }}:</strong>
                                                                <br> {{__('frontend.name')}}: {{ $order->user->name ?? '' }}
                                                                <br> {{__('frontend.phone')}}: {{ $order->user->phone ?? '' }}
                                                                <br> {{__('frontend.address')}}: {{ $order->user->address ?? '' }}<br>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <strong>{{__('frontend.shipping_to')}}:</strong>
                                                                <br> {{__('frontend.phone')}}: {{ $order->mobile ?? '' }}
                                                                <br> {{__('frontend.address')}}: {{ $order->address ?? '' }}
                                                            </div>
                                                            <div class="col-md-4">
                                                                <strong>{{__('frontend.status')}}:</strong>
                                                                <br> {{__('frontend.payment_status')}}:
                                                                {{ trans('payment_status.' . $order->payment_status) ?? null }}
                                                                <br> {{__('frontend.payment_method')}}:
                                                                {{ trans('payment_method.' . $order->payment_method) ?? null }}<br>
                                                            </div>
                                                        </div>
                                
                                
                                                        <div class="tracking-wrap custom-font2">
                                                            @if($order->status == \App\Enums\OrderStatus::CANCEL)
                                                            <div class="step active">
                                                                <span class="icon"> <i class="fa fa-times"></i> </span>
                                                                <span class="text">{{__('frontend.order_cancel')}}</span>
                                                            </div>
                                                            @else
                                                            <div class="step {{ $order->status >= \App\Enums\OrderStatus::PENDING ? 'active' : ''}}">
                                                                <span class="icon"> <i class="fa fa-circle-notch"></i> </span>
                                                                <span class="text">{{__('frontend.order_pending')}}</span>
                                                            </div>
                                                            @endif
                                
                                                            @if($order->status == \App\Enums\OrderStatus::REJECT)
                                                            <div class="step active">
                                                                <span class="icon"> <i class="fa fa-times"></i> </span>
                                                                <span class="text">{{__('frontend.order_reject')}}</span>
                                                            </div>
                                                            @else
                                                            <div class="step {{ $order->status >= \App\Enums\OrderStatus::ACCEPT ? 'active' : ''}}">
                                                                <span class="icon"> <i class="fa fa-check"></i> </span>
                                                                <span class="text">{{__('frontend.order_accept')}}</span>
                                                            </div>
                                                            @endif
                                
                                
                                                            <div class="step {{  $order->status >= \App\Enums\OrderStatus::PROCESS ? 'active' : ''}}">
                                                                <span class="icon"> <i class="fa fa-shopping-bag"></i> </span>
                                                                <span class="text">{{__('frontend.order_process')}}</span>
                                                            </div> <!-- step.// -->
                                                            <div
                                                                class="step {{  $order->status >= \App\Enums\OrderStatus::ON_THE_WAY ? 'active' : ''}}">
                                                                <span class="icon"> <i class="fa fa-truck"></i> </span>
                                                                <span class="text"> {{__('frontend.on_the_way')}} </span>
                                                            </div> <!-- step.// -->
                                                            <div class="step {{  $order->status == \App\Enums\OrderStatus::COMPLETED ? 'active' : ''}}">
                                                                <span class="icon"> <i class="fa fa-box"></i> </span>
                                                                <span class="text">{{__('frontend.order_completed')}}</span>
                                                            </div> <!-- step.// -->
                                                        </div>
                                                        <hr>
                                                    </div> <!-- card-body.// -->
                                                </article>
                                                <article class="card mt-3">
                                                    <div class="card-body">
                                                        @if (session('status'))
                                                        <div class="alert alert-success" role="alert">
                                                            {{ session('status')}}
                                                        </div>
                                                        @endif
                                
                                                        <div class="tab-content custom-tab-content " id="v-pills-tabContent">
                                                            <div class="p-2 bg-orange d-flex justify-content-between blo">
                                                                <div scope="col">{{ __('frontend.item') }}</div>
                                                                <div scope="col" class="text-center">{{ __('frontend.price') }}</div>
                                                                <div class="text-center">{{ __('frontend.quantity') }}</div>
                                                                <div class="text-right">{{ __('frontend.totals') }}</div>
                                                            </div>
                                                            @foreach($items as $itemKey => $item)
                                                            <div class="pl-3 pr-3 d-flex justify-content-between">
                                                                <div scope="row">{{ $item->menuItem->name }}</div>
                                                                <div class="text-center">{{$item->unit_price }}</div>
                                                                <div class="text-center">{{ $item->quantity }}</div>
                                                                <div class="text-right">{{ $item->item_total }}</div>
                                                            </div>
                                                            @endforeach
                                
                                
                                                            <table class="table table-striped">
                                                                <tbody>
                                                                    @if (!blank($order->discount))
                                                                    <tr>
                                                                        <th scope="col">{{ __('frontend.discount') }}</th>
                                                                        <th scope="col"></th>
                                                                        <th class="text-right"></th>
                                                                        <td class="text-right">{{ $order->discount->amount }}</td>
                                                                    </tr>
                                                                    @endif
                                                                    <tr>
                                                                        <th scope="col"></th>
                                                                        <th scope="col"></th>
                                                                        <th class="text-right"></th>
                                                                        <th class="text-right">{{ __('frontend.subtotal') }}</th>
                                                                    </tr>
                                
                                                                    <tr>
                                                                        <th scope="col"> {{ __('frontend.order_status') }} :
                                                                            {{ trans('order_status.'.$order->status) }}</th>
                                                                        <th scope="col"></th>
                                                                        <th class="text-right"></th>
                                                                        <td class="text-right">{{ $order->sub_total }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="col"></th>
                                                                        <th scope="col"></th>
                                                                        <th class="text-right"></th>
                                                                        <th class="text-right">{{ __('frontend.delivery_charge') }}</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="col"></th>
                                                                        <th scope="col"></th>
                                                                        <th class="text-right"></th>
                                                                        <td class="text-right">{{ $order->delivery_charge }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="col"></th>
                                                                        <th scope="col"></th>
                                                                        <th class="text-right"></th>
                                                                        <th class="text-right">{{ __('frontend.total') }}</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="col"></th>
                                                                        <th scope="col"></th>
                                                                        <th class="text-right"></th>
                                                                        <td class="text-right">{{ $order->total }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div> <!-- card-body .// -->
                                                </article>
                                            </div>
                                            <div class="row">
                                                @if($order->status == \App\Enums\OrderStatus::PENDING)
                                                <div class="col">
                                                    <a href="{{ route('account.order.cancel', $order) }}" class="btn btn-danger m-2"
                                                        onclick="return confirm('{{ __('frontend.cancel_message') }}')"><i class="fa fa-times"></i>
                                                        {{ __('frontend.cancel_order') }}</a>
                                                </div>
                                                @endif
                                
                                                @if($order->attachment)
                                                <div class="text-right">
                                                    <a class="btn btn-info m-2" href="{{ route('account.order.file', $order->id) }}"><i
                                                            class="fa fa-arrow-circle-down"></i> {{ __('frontend.download') }}</a>
                                                </div>
                                                @endif
                                                <div class="@if(!$order->attachment) col @endif text-right">
                                                    <button onclick="printDiv('invoice-print')" class="btn btn-warning m-2"><i class="fa fa-print"></i>
                                                        {{ __('frontend.print') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- new code end --}}

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

