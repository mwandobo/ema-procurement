@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/jquery-ui/jquery-ui.min.css') !!}
    {!! Html::style('assets/css/elements/tooltip.css') !!}
    {!! Html::style('assets/css/apps/ecommerce.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area Starts -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Apps')}}</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="apps_ecommerce.html">{{__('Ecommerce')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Order Details')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area Ends -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="row layout-spacing layout-top-spacing" id="cancel-row">
            <div class="col-lg-12">
                <div class="">
                    <div class="widget-content searchable-container grid">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card-box">
                                    <h5 class="header-title mb-3">{{__('Track Your Order')}}</h5>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <h6 class="mt-0">{{__('Order ID:')}}</h6>
                                                <p>{{__('#SK898789')}}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <h6 class="mt-0">{{__('Tracking ID:')}}</h6>
                                                <p>{{__('78451245')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="track-order-list">
                                        <ul class="list-unstyled">
                                            <li class="completed">
                                                <h6 class="mt-0 mb-1 font-13">{{__('Order Placed')}}</h6>
                                                <p class="text-muted font-12">{{__('June 05 2020')}} <small class="text-muted">{{__('09:22 AM')}}</small> </p>
                                            </li>
                                            <li class="completed">
                                                <h6 class="mt-0 mb-1 font-13">{{__('Packed')}}</h6>
                                                <p class="text-muted font-12">{{__('June 06 2020')}} <small class="text-muted">{{__('07:10 AM')}}</small></p>
                                            </li>
                                            <li>
                                                <span class="active-dot dot"></span>
                                                <h6 class="mt-0 mb-1 font-13">{{__('Shipped')}}</h6>
                                                <p class="text-muted font-12">{{__('June 07 2020')}} <small class="text-muted">{{__('10:10 AM')}}</small></p>
                                            </li>
                                            <li>
                                                <h6 class="mt-0 mb-1 font-13"> {{__('Delivered')}}</h6>
                                                <p class="text-muted font-12">{{__('Estimated delivery within 1 days')}}</p>
                                            </li>
                                        </ul>
                                        <div class="text-center mt-4">
                                            <a href="#" class="btn btn-sm btn-primary">{{__('View Details')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card-box order-detail-table">
                                    <h5 class="header-title mb-3">{{__('Items from Order #SK898789')}}</h5>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-centered mb-0">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>{{__('Product name')}}</th>
                                                <th>{{__('Quantity')}}</th>
                                                <th>{{__('Price')}}</th>
                                                <th>{{__('Total')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">{{__('White Full Sleeve Shirt')}}</th>
                                                <td>{{__('1')}}</td>
                                                <td>{{__('$50')}}</td>
                                                <td>{{__('$50')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">{{__('Red Full Sleeve Shirt')}}</th>
                                                <td>{{__('2')}}2</td>
                                                <td>{{__('$100')}}</td>
                                                <td>{{__('$100')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">{{__('Purple Full Sleeve Shirt')}}</th>
                                                <td>{{__('1')}}1</td>
                                                <td>{{__('$60')}}</td>
                                                <td>{{__('$60')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="3" class="text-right">{{__('Sub Total :')}}</th>
                                                <td><div class="font-weight-bold">{{__('$310')}}</div></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="3" class="text-right">{{__('Shipping Charge :')}}</th>
                                                <td>{{__('$50')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="3" class="text-right">{{__('Estimated Tax :')}}</th>
                                                <td>{{__('$40')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="3" class="text-right">{{__('Grand Total :')}}</th>
                                                <td><div class="strong text-success-teal">{{__('$400')}}</div></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-box order-details-box">
                                    <h5 class="header-title mb-3">{{__('Shipping Information')}}</h5>
                                    <h6 class="font-family-primary font-weight-semibold">{{__('Nick Johnson')}}</h6>
                                    <p class="mb-2 font-13"><span class="font-weight-semibold mr-2">{{__('Address:')}}</span> {{__('123 Amarilon Lane, CA 97458')}}</p>
                                    <p class="mb-2 font-13"><span class="font-weight-semibold mr-2">{{__('Phone:')}}</span> {{__('(123) 123-4567')}}</p>
                                    <p class="mb-0 font-13"><span class="font-weight-semibold mr-2">{{__('Mobile:')}}</span> {{__('(+01) 98765 43210')}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-box order-details-box">
                                    <h5 class="header-title mb-3">{{__('Billing Information')}}</h5>
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <p class="mb-2 font-13"><span class="font-weight-semibold mr-2">{{__('Payment Type:')}}</span> {{__('Debit Card')}}</p>
                                            <p class="mb-2 font-13"><span class="font-weight-semibold mr-2">{{__('Card Type:')}}</span> {{__('Mastercard 1234')}}</p>
                                            <p class="mb-2 font-13"><span class="font-weight-semibold mr-2">{{__('Valid Date:')}}</span> {{__('12/2030')}}</p>
                                            <p class="mb-0 font-13"><span class="font-weight-semibold mr-2">{{__('CVV:')}}</span> {{__('xxx')}}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-box order-details-box">
                                    <h6 class="header-title mb-3">{{__('Delivery Info')}}</h6>
                                    <div class="text-center">
                                        <i class="las la-truck font-25 text-light-black"></i>
                                        <h5><b>{{__('Delivery Company')}}</b></h5>
                                        <p class="mb-1 font-13"><span class="font-weight-semibold">{{__('Order ID :')}}</span> {{__('SK898789')}}</p>
                                        <p class="mb-0 font-13"><span class="font-weight-semibold">{{__('Payment Mode :')}}</span> {{__('Card')}}</p>
                                    </div>
                                </div>
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
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('assets/js/apps/ecommerce.js') !!}
@endpush

@push('custom-scripts')

@endpush
