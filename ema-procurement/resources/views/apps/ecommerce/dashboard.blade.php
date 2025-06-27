@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/apex/apexcharts.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('Apps')}}</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('Ecommerce')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Dashboard')}}</span></li>
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
                        <div class="card-box">
                            <div class="row w-100 m-0">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center w-100 pl-0 pr-0">
                                    <a class="btn btn-sm btn-outline-primary mb-1 mt-1">
                                        <i class="las la-home"></i>
                                    </a>
                                    <a class="btn btn-sm btn-primary mb-1 mt-1" href="{{ url('/apps/ecommerce/products') }}">
                                        <i class="las la-box font-15 align-top"></i> {{__('Products')}}
                                    </a>
                                    <a class="btn btn-sm btn-primary mb-1 mt-1" href="{{ url('/apps/ecommerce/product-details') }}">
                                        <i class="las la-th-list font-15 align-top"></i> {{__('Details')}}
                                    </a>
                                    <a class="btn btn-sm btn-primary mb-1 mt-1" href="{{ url('/apps/ecommerce/add-product') }}">
                                        <i class="las la-plus font-15 align-top"></i> {{__('Add')}}
                                    </a>
                                    <a class="btn btn-sm btn-warning mb-1 mt-1" href="{{ url('/apps/ecommerce/orders') }}">
                                        <i class="las la-list font-15 align-top"></i> {{__('Orders')}}
                                    </a>
                                    <a class="btn btn-sm btn-warning mb-1 mt-1" href="{{ url('/apps/ecommerce/order-details') }}">
                                        <i class="las la-th-list font-15 align-top"></i> {{__('Details')}}
                                    </a>
                                    <a class="btn btn-sm btn-success mb-1 mt-1" href="{{ url('/apps/ecommerce/customers') }}">
                                        <i class="las la-user-alt font-15 align-top"></i> {{__('Customers')}}
                                    </a>
                                    <a class="btn btn-sm btn-info mb-1 mt-1" href="{{ url('/apps/ecommerce/sellers') }}">
                                        <i class="lar la-user-circle font-15 align-top"></i> {{__('Sellers')}}
                                    </a>
                                    <a class="btn btn-sm btn-danger mb-1 mt-1" href="{{ url('/apps/ecommerce/cart') }}">
                                        <i class="las la-shopping-cart font-15 align-top"></i> {{__('Cart')}}
                                    </a>
                                    <a class="btn btn-sm btn-dark mb-1 mt-1" href="{{ url('/apps/ecommerce/checkout') }}">
                                        <i class="lar la-credit-card font-15 align-top"></i> {{__('Checkout')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row layout-top-spacing">
                            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                <a class="widget quick-category">
                                    <div class="quick-category-head">
                                <span class="quick-category-icon qc-primary rounded-circle">
                                    <i class="las la-shopping-cart"></i>
                                </span>
                                        <div class="ml-auto">
                                            <div class="quick-comparison qcompare-success">
                                                <span> {{ __('20%') }}</span>
                                                <i class="las la-arrow-up"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quick-category-content">
                                        <h3> {{ __('2189') }}</h3>
                                        <p class="font-17 text-primary mb-0"> {{ __('Products Sold') }}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                <a class="widget quick-category">
                                    <div class="quick-category-head">
                                <span class="quick-category-icon qc-warning rounded-circle">
                                    <i class="las la-box"></i>
                                </span>
                                        <div class="ml-auto">
                                            <div class="quick-comparison qcompare-danger">
                                                <span> {{ __('10%') }}</span>
                                                <i class="las la-arrow-down"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quick-category-content">
                                        <h3> {{ __('450') }}</h3>
                                        <p class="font-17 text-warning mb-0"> {{ __('New Orders') }}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                <a class="widget quick-category">
                                    <div class="quick-category-head">
                                <span class="quick-category-icon qc-secondary rounded-circle">
                                    <i class="las la-hand-holding-usd"></i>
                                </span>
                                        <div class="ml-auto">
                                            <div class="quick-comparison qcompare-success">
                                                <span> {{ __('40%') }}</span>
                                                <i class="las la-arrow-up"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quick-category-content">
                                        <h3> {{ __('$3465') }}</h3>
                                        <p class="font-17 text-secondary mb-0"> {{ __('Monthly Sales') }}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                <a class="widget quick-category">
                                    <div class="quick-category-head">
                                <span class="quick-category-icon qc-success-teal rounded-circle">
                                    <i class="las la-user-plus"></i>
                                </span>
                                        <div class="ml-auto">
                                            <div class="quick-comparison qcompare-danger">
                                                <span> {{ __('50%') }}</span>
                                                <i class="las la-arrow-down"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quick-category-content">
                                        <h3> {{ __('35') }}</h3>
                                        <p class="font-17 text-success-teal mb-0"> {{ __('New Customers') }}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                <div class="widget widget-chart-one">
                                    <div class="widget-heading">
                                        <h5 class=""> {{ __('Monthly Transactions') }}</h5>
                                        <ul class="tabs tab-pills">
                                            <li>
                                                <div class="dropdown  custom-dropdown-icon">
                                                    <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span> {{ __('Options') }}</span> <i class="las la-angle-down"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                                                        <a class="dropdown-item" data-value="Settings" href="javascript:void(0);"> {{ __('Quarterly') }}</a>
                                                        <a class="dropdown-item" data-value="Settings" href="javascript:void(0);"> {{ __('Half Yearly') }}</a>
                                                        <a class="dropdown-item" data-value="Mail" href="javascript:void(0);"> {{ __('Mail') }}</a>
                                                        <a class="dropdown-item" data-value="Print" href="javascript:void(0);"> {{ __('Print') }}</a>
                                                        <a class="dropdown-item" data-value="Download" href="javascript:void(0);"> {{ __('Download') }}</a>
                                                        <a class="dropdown-item" data-value="Share" href="javascript:void(0);"> {{ __('Share') }}</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="widget-content">
                                        <div class="tabs tab-content">
                                            <div id="content_1" class="tabcontent">
                                                <div id="transactionsMonthly"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                <div class="widget widget-chart-two">
                                    <div class="widget-heading">
                                        <h5 class=""> {{ __('Top countries by sales') }}</h5>
                                    </div>
                                    <div class="widget-content">
                                        <div id="chart-2" class=""></div>
                                        <p class="font-13 text-center mb-10 text-muted">
                                            <a class="text-primary" href="javascript:void(0);"> {{ __('Click here') }}</a> {{ __('to see the full list of countries') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                <div class="widget widget-chart-one">
                                    <div class="widget-heading">
                                        <h5 class=""> {{ __('Order Status') }}</h5>
                                    </div>
                                    <div class="widget-content">
                                        <div id="orderStatus" class=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                                <div class="widget widget-table-one">
                                    <div class="widget-heading">
                                        <h5 class=""> {{ __('Weekly Top Sellers') }}</h5>
                                    </div>
                                    <div class="widget-content">
                                        <div class="weekly-bestsellers">
                                            <div class="t-item">
                                                <div class="t-company-name">
                                                    <div class="t-icon">
                                                        <div class="image-container">
                                                            <img class="rounded-circle avatar-xs" src="{{asset('assets/img/company-1.jpg')}}" alt="profile">
                                                        </div>
                                                    </div>
                                                    <div class="t-name">
                                                        <h4> {{ __('WS Retail') }}</h4>
                                                        <p class="meta-date"> {{ __('USA') }}</p>
                                                    </div>
                                                </div>
                                                <div class="t-rate rate-inc">
                                                    <p><span> {{ __('6644') }}</span> <i class="las la-arrow-up"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="weekly-bestsellers">
                                            <div class="t-item">
                                                <div class="t-company-name">
                                                    <div class="t-icon">
                                                        <div class="image-container">
                                                            <img class="rounded-circle avatar-xs" src="{{asset('assets/img/company-2.jpg')}}" alt="profile">
                                                        </div>
                                                    </div>
                                                    <div class="t-name">
                                                        <h4> {{ __('Shee Huang Tee') }}</h4>
                                                        <p class="meta-date">{{ __('China') }}</p>
                                                    </div>
                                                </div>
                                                <div class="t-rate rate-inc">
                                                    <p><span> {{ __('1644') }}</span> <i class="las la-arrow-up"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="weekly-bestsellers">
                                            <div class="t-item">
                                                <div class="t-company-name">
                                                    <div class="t-icon">
                                                        <div class="image-container">
                                                            <img class="rounded-circle avatar-xs" src="{{asset('assets/img/company-3.jpg')}}" alt="profile">
                                                        </div>
                                                    </div>
                                                    <div class="t-name">
                                                        <h4> {{ __('Cambo Ghini') }}</h4>
                                                        <p class="meta-date"> {{ __('Italy') }}</p>
                                                    </div>
                                                </div>
                                                <div class="t-rate rate-inc">
                                                    <p><span> {{ __('1144') }}</span> <i class="las la-arrow-up"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="weekly-bestsellers">
                                            <div class="t-item">
                                                <div class="t-company-name">
                                                    <div class="t-icon">
                                                        <div class="image-container">
                                                            <img class="rounded-circle avatar-xs" src="{{asset('assets/img/company-4.jpg')}}" alt="profile">
                                                        </div>
                                                    </div>
                                                    <div class="t-name">
                                                        <h4> {{ __('McBaldash Apparels') }}</h4>
                                                        <p class="meta-date"> {{ __('Germany') }}</p>
                                                    </div>
                                                </div>
                                                <div class="t-rate rate-inc">
                                                    <p><span> {{ __('1100') }}</span> <i class="las la-arrow-up"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-block btn-primary"> {{ __('View All') }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                <div class="widget dashboard-table">
                                    <div class="widget-heading">
                                        <h5 class=""> {{__('Payout History')}}</h5>
                                    </div>
                                    <div class="widget-content">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th><div class="th-content"> {{__('Client')}}</div></th>
                                                    <th><div class="th-content"> {{__('Payouts')}}</div></th>
                                                    <th><div class="th-content"> {{__('Status')}}</div></th>
                                                    <th><div class="th-content"> {{__('Action')}}</div></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td> {{__('Johnson & Johnson')}}</td>
                                                    <td> {{__('$2,189')}}</td>
                                                    <td><span class="badge outline-badge-info"> {{__('Processing')}} </span></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> {{__('UC Corporation')}}</td>
                                                    <td> {{__('$9,189')}}</td>
                                                    <td><span class="badge outline-badge-warning"> {{__('Pending')}} </span></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> {{__('Web-o-Soft')}}</td>
                                                    <td> {{__('$2,189')}}</td>
                                                    <td><span class="badge outline-badge-success-teal"> {{__('Completed')}} </span></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> {{__('Sun Pharma')}}</td>
                                                    <td> {{__('$12,189')}}</td>
                                                    <td><span class="badge outline-badge-warning"> {{__('Pending')}} </span></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> {{__('Sandisko')}}</td>
                                                    <td> {{__('$19,189')}}</td>
                                                    <td><span class="badge outline-badge-info"> {{__('Processing')}} </span></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                <div class="widget ecommerce-table">
                                    <div class="widget-heading">
                                        <h5 class=""> {{__('Seller Targets')}}</h5>
                                        <div class="dropdown custom-dropdown-icon">
                                            <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span> {{__('Options')}}</span> <i class="las la-angle-down"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown" style="will-change: transform;">
                                                <a class="dropdown-item" data-value="Mail" href="javascript:void(0);"> {{__('Mail')}}</a>
                                                <a class="dropdown-item" data-value="Print" href="javascript:void(0);"> {{__('Print')}}</a>
                                                <a class="dropdown-item" data-value="Download" href="javascript:void(0);"> {{__('Download')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th><div class="th-content"> {{__('Seller Info')}}</div></th>
                                                    <th><div class="th-content"> {{__('Progress')}}</div></th>
                                                    <th><div class="th-content"> {{__('Sales')}}</div></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-center">
                                                            <img src="{{ url('assets/img/profile-6.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light mr-3" alt="avatar">
                                                            <p class="mb-0"> {{__('Connor Mcguere')}}</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-warning" role="progressbar" style="width: 29.56%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td><span class="text-warning"> {{__('29.56%')}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-center">
                                                            <img src="{{ url('assets/img/profile-5.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light mr-3" alt="avatar">
                                                            <p class="mb-0"> {{__('Johny Borja')}}</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-success-teal" role="progressbar" style="width: 92.89%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td><span class="text-success-teal"> {{__('92.89%')}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-center">
                                                            <img src="{{ url('assets/img/profile-3.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light mr-3" alt="avatar">
                                                            <p class="mb-0"> {{__('Dingo Hernandes')}}</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-info" role="progressbar" style="width: 65.01%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td><span class="text-info"> {{__('62.01%')}}</span></td>
                                                </tr>
                                                <tr class="border-bottom border-light">
                                                    <td>
                                                        <div class="d-flex align-center">
                                                            <img src="{{ url('assets/img/profile-13.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light mr-3" alt="avatar">
                                                            <p class="mb-0"> {{__('Kristopher Benny')}}</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-danger" role="progressbar" style="width: 15.28%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td><span class="text-danger"> {{__('15.28%')}}</span></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <p class="font-13 text-center mt-4 mb-1 text-muted">
                                                <a class="text-primary" href="javascript:void(0);"> {{__('Click here')}}</a> {{__('to see the full seller list')}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                <div class="widget dashboard-table">
                                    <div class="widget-heading">
                                        <h5 class=""> {{__('Top Selling Products')}}</h5>
                                        <div class="dropdown custom-dropdown-icon">
                                            <a class="font-17 mr-3 pointer"><i class="las la-sync-alt"></i></a>
                                            <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span> {{__('Options')}}</span> <i class="las la-angle-down"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown" style="will-change: transform;">
                                                <a class="dropdown-item" data-value="Mail" href="javascript:void(0);"> {{__('Mail')}}</a>
                                                <a class="dropdown-item" data-value="Print" href="javascript:void(0);"> {{__('Print')}}</a>
                                                <a class="dropdown-item" data-value="Download" href="javascript:void(0);"> {{__('Download')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th><div class="th-content"> {{__('Product Info')}}</div></th>
                                                    <th><div class="th-content"> {{__('Price')}}</div></th>
                                                    <th><div class="th-content"> {{__('Quantity')}}</div></th>
                                                    <th><div class="th-content"> {{__('Amount')}}</div></th>
                                                    <th><div class="th-content"> {{__('User Rating')}}</div></th>
                                                    <th><div class="th-content"> {{__('Action')}}</div></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        {{__('Zen 2389 Mobile')}}
                                                    </td>
                                                    <td> {{__('$999')}}</td>
                                                    <td> {{__('58')}}</td>
                                                    <td> {{__('$12,989')}}</td>
                                                    <td>
                                                        <div class="d-flex align-center">
                                                            {{__('5')}}  <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-muted" title="{{__('View')}}"><i class="las la-eye"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary ml-2" title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> {{__('Lenovo G-30 Laptop')}}</td>
                                                    <td> {{__('$1999')}}</td>
                                                    <td> {{__('58')}}</td>
                                                    <td> {{__('$102,989')}}</td>
                                                    <td>
                                                        <div class="d-flex align-center">
                                                            {{__('5')}}  <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-muted" title="{{__('View')}}"><i class="las la-eye"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary ml-2" title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> {{__('Half Sleeve Shirt')}}</td>
                                                    <td> {{__('$499')}}</td>
                                                    <td> {{__('50')}}</td>
                                                    <td> {{__('$25,989')}}</td>
                                                    <td>
                                                        <div class="d-flex align-center">
                                                            {{__('4')}}  <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-muted" title="{{__('View')}}"><i class="las la-eye"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary ml-2" title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> {{__('Leather Shoes')}}</td>
                                                    <td> {{__('$899')}}</td>
                                                    <td> {{__('80')}}</td>
                                                    <td> {{__('$95,989')}}</td>
                                                    <td>
                                                        <div class="d-flex align-center">
                                                            {{__('5')}}  <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-muted" title="{{__('View')}}"><i class="las la-eye"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary ml-2" title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom border-light">
                                                    <td> {{__('Lightweight Jacket')}}</td>
                                                    <td> {{__('$20')}}</td>
                                                    <td> {{__('184')}}</td>
                                                    <td> {{__('$5,989')}}</td>
                                                    <td>
                                                        <div class="d-flex align-center">
                                                            {{__('5')}}  <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-muted" title="{{__('View')}}"><i class="las la-eye"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary ml-2" title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <p class="font-13 text-center mt-4 mb-1 text-muted">
                                                <a class="text-primary" href="javascript:void(0);">{{__('Click here')}}</a> {{__('to see the full product list')}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                <div class="widget ecommerce-table">
                                    <div class="widget-heading">
                                        <h5 class=""> {{__('Transaction History')}}</h5>
                                        <div class="dropdown custom-dropdown-icon">
                                            <a class="font-17 mr-3 pointer"><i class="las la-sync-alt"></i></a>
                                            <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span> {{__('Options')}}</span> <i class="las la-angle-down"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown" style="will-change: transform;">
                                                <a class="dropdown-item" data-value="Mail" href="javascript:void(0);"> {{__('Mail')}}</a>
                                                <a class="dropdown-item" data-value="Print" href="javascript:void(0);"> {{__('Print')}}</a>
                                                <a class="dropdown-item" data-value="Download" href="javascript:void(0);"> {{__('Download')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th><div class="th-content"> {{__('Name')}}</div></th>
                                                    <th><div class="th-content"> {{__('Payment Mode')}}</div></th>
                                                    <th><div class="th-content"> {{__('Date')}}</div></th>
                                                    <th><div class="th-content"> {{__('Amount')}}</div></th>
                                                    <th><div class="th-content"> {{__('Status')}}</div></th>
                                                    <th><div class="th-content"> {{__('Action')}}</div></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-center">
                                                            <img src="{{ url('assets/img/profile-6.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light mr-3" alt="avatar">
                                                            <p class="mb-0"> {{__('Connor Mcguere')}}</p>
                                                        </div>
                                                    </td>
                                                    <td> {{__('COD')}}</td>
                                                    <td> {{__('28.01.2020')}}</td>
                                                    <td> {{__('$12,989')}}</td>
                                                    <td>
                                                        <span class="badge badge-info light"> {{__('Processing')}} </span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-muted" title="{{__('View')}}"><i class="las la-eye"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary ml-2" title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-center">
                                                            <img src="{{ url('assets/img/profile-8.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light mr-3" alt="avatar">
                                                            <p class="mb-0"> {{__('Lia Abraam')}}</p>
                                                        </div>
                                                    </td>
                                                    <td> {{__('COD')}}</td>
                                                    <td> {{__('18.02.2020')}}</td>
                                                    <td> {{__('$1,989')}}</td>
                                                    <td>
                                                        <span class="badge badge-warning light"> {{__('Pending')}} </span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-muted" title="{{__('View')}}"><i class="las la-eye"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary ml-2" title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-center">
                                                            <img src="{{ url('assets/img/profile-9.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light mr-3" alt="avatar">
                                                            <p class="mb-0"> {{__('Nora Fati')}}</p>
                                                        </div>
                                                    </td>
                                                    <td> {{__('Visa Card')}}</td>
                                                    <td> {{__('8.01.2020')}}</td>
                                                    <td> {{__('$1,856')}}</td>
                                                    <td>
                                                        <span class="badge badge-success-teal light"> {{__('Success')}} </span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-muted" title="{{__('View')}}"><i class="las la-eye"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary ml-2" title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-center">
                                                            <img src="{{ url('assets/img/profile-10.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light mr-3" alt="avatar">
                                                            <p class="mb-0"> {{__('Julia Roberts')}}</p>
                                                        </div>
                                                    </td>
                                                    <td> {{__('COD')}}</td>
                                                    <td> {{__('28.0501.2020')}}</td>
                                                    <td> {{__('$9,989')}}</td>
                                                    <td>
                                                        <span class="badge badge-danger light"> {{__('Failed')}} </span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-muted" title="{{__('View')}}"><i class="las la-eye"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary ml-2" title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <p class="font-13 text-center mt-4 mb-1 text-muted">
                                                <a class="text-primary" href="javascript:void(0);">{{__('Click here')}}</a> {{__('to see the full product list')}}
                                            </p>
                                        </div>
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
    {!! Html::script('plugins/jquery-ui/jquery-ui.min.js') !!}
    {!! Html::script('plugins/apex/apexcharts.min.js') !!}
    {!! Html::script('assets/js/apps/ecommerce.js') !!}
@endpush

@push('custom-scripts')

@endpush
