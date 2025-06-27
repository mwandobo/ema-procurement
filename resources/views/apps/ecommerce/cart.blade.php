@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/ui-elements/pagination.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Cart')}}</span></li>
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
                    <div class="widget-content searchable-container cart-area">
                        <div class="row mb-4 mt-3">
                            <div class="col-md-7 cart-table">
                                <div class="card-box">
                                    <table class="table table-responsive table-borderless table-centered mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>{{__('Product')}}</th>
                                            <th>{{__('Price')}}</th>
                                            <th>{{__('Quantity')}}</th>
                                            <th>{{__('Total')}}</th>
                                            <th style="width: 50px;"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <img src="{{ url('assets/img/product-1.jpg') }}" alt="contact-img" title="contact-img" class="rounded-circle mr-3" height="48" width="48" style="object-fit: cover;
                                                            ">
                                                <p class="mb-0 mt-3 d-inline-block align-middle font-16">
                                                    <a href="{{ url('/apps/ecommerce/product-details') }}" class="text-reset font-family-secondary">{{__('Jose Headphone')}}</a>
                                                    <br>
                                                    <small class="mr-2"><b>{{__('Size:')}}</b> {{__('Large')}} </small>
                                                    <small><b>{{__('Apps')}}Color:</b> {{__('Black')}}
                                                    </small>
                                                </p>
                                            </td>
                                            <td>
                                                {{__('$100.00')}}
                                            </td>
                                            <td>
                                                <input type="number" min="1" value="5" class="form-control" placeholder="{{__('Qty')}}" style="width: 90px;">
                                            </td>
                                            <td>
                                                {{__('$500.00')}}
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ url('assets/img/product-2.jpg') }}" alt="contact-img" title="contact-img" class="rounded-circle mr-3" height="48" width="48" style="object-fit: cover;
                                                            ">
                                                <p class="mb-0 mt-3 d-inline-block align-middle font-16">
                                                    <a href="{{ url('/apps/ecommerce/product-details') }}" class="text-body font-family-secondary">{{__('Zikkon Camera')}}</a>
                                                    <br>
                                                    <small class="mr-2"><b>{{__('Model:')}}</b> {{__('ZK90R')}} </small>
                                                    <small><b>{{__('Color:')}}</b> {{__('Black')}} </small>
                                                </p>
                                            </td>
                                            <td>
                                                {{__('$500.00')}}
                                            </td>
                                            <td>
                                                <input type="number" min="1" value="1" class="form-control" placeholder="{{__('Qty')}}" style="width: 90px;">
                                            </td>
                                            <td>
                                                {{__('$500.00')}}
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ url('assets/img/product-3.jpg') }}" alt="contact-img" title="contact-img" class="rounded-circle mr-3" height="48" width="48" style="object-fit: cover;
                                                            ">
                                                <p class="mb-0 mt-3 d-inline-block align-middle font-16">
                                                    <a href="{{ url('/apps/ecommerce/product-details') }}" class="text-body font-family-secondary">{{__('My Notebook')}}</a>
                                                    <br>
                                                    <small class="mr-2"><b>{{__('Size:')}}</b> {{__('Medium')}} </small>
                                                    <small><b>{{__('Apps')}}Color:</b> {{__('Grey')}} </small>
                                                </p>
                                            </td>
                                            <td>
                                                {{__('$5000')}}
                                            </td>
                                            <td>
                                                <input type="number" min="1" value="1" class="form-control" placeholder="{{__('Qty')}}" style="width: 90px;">
                                            </td>
                                            <td>
                                                {{__('$5000.00')}}
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ url('assets/img/product-4.jpg') }}" alt="contact-img" title="contact-img" class="rounded-circle mr-3" height="48" width="48" style="object-fit: cover;
                                                            ">
                                                <p class="mb-0 mt-3 d-inline-block align-middle font-16">
                                                    <a href="{{ url('/apps/ecommerce/product-details') }}" class="text-body font-family-secondary">{{__('Canvas Shoe')}}</a>
                                                    <br>
                                                    <small class="mr-2"><b>{{__('Size:')}}</b> {{__('Large')}} </small>
                                                    <small><b>{{__('Apps')}}Color:</b> {{__('Green')}} </small>
                                                </p>
                                            </td>
                                            <td>
                                                {{__('$100.00')}}
                                            </td>
                                            <td>
                                                <input type="number" min="1" value="1" class="form-control" placeholder="{{__('Qty')}}" style="width: 90px;">
                                            </td>
                                            <td>
                                                {{__('$100.00')}}
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card-box">
                                    <h6 class="mb-3">{{__('Card Details')}}</h6>
                                    <div class="card bg-primary text-white visa-card mb-0">
                                        <div class="card-body">
                                            <div>
                                                <div class="text-left">
                                                    <i class="lab la-cc-visa font-45 text-white"></i>
                                                </div>
                                            </div>
                                            <div class="mt-3 row">
                                                <div class="col-4">
                                                    <p>
                                                        <i class="las la-asterisk m-1 text-white"></i>
                                                        <i class="las la-asterisk m-1 text-white"></i>
                                                        <i class="las la-asterisk m-1 text-white"></i>
                                                    </p>
                                                </div>
                                                <div class="col-4">
                                                    <p>
                                                        <i class="las la-asterisk m-1 text-white"></i>
                                                        <i class="las la-asterisk m-1 text-white"></i>
                                                        <i class="las la-asterisk m-1 text-white"></i>
                                                    </p>
                                                </div>
                                                <div class="col-4">
                                                    <p>
                                                        <i class="las la-asterisk m-1 text-white"></i>
                                                        <i class="las la-asterisk m-1 text-white"></i>
                                                        <i class="las la-asterisk m-1 text-white"></i>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <h5 class="text-white float-right mb-0">{{__('12/22')}}</h5>
                                                <h5 class="text-white mb-0">{{__('Fredrick Taylor')}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-box">
                                    <div class="border border-light p-3 mt-4 rounded mb-3">
                                        <h6 class="mb-3">{{__('Order Summary')}}</h6>
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody>
                                                <tr>
                                                    <td>{{__('Sub Total :')}}</td>
                                                    <td>{{__('$6100.00')}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-success-teal"> {{__('Discount :')}} </td>
                                                    <td class="text-success-teal"> {{__('-$100.00')}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{__('Shipping Charge :')}}</td>
                                                    <td>{{__('$25.00')}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{__('Estimated Tax :')}} </td>
                                                    <td>{{__('$10.00')}}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{__('GrandTotal :')}}</th>
                                                    <th>{{__('$6035.00')}}</th>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a class="w-100 btn btn-dark mb-0 ml-3 mr-3"><i class="las la-arrow-left"></i> {{__('Go Back')}}</a>
                                        <a href="{{ url('/apps/ecommerce/checkout') }}" class="w-100 btn btn-outline-primary mb-0 ml-3 mr-3">{{__('Continue')}} <i class="las la-arrow-right"></i></a>
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
