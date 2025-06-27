@extends('layout.master')

@push('plugin-styles')
    <link rel="stylesheet" href="{{ asset('assets/css/loader.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/apex/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard/dashboard_1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard/dashboard_2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard/dashboard_3.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard/dashboard_4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard/dashboard_5.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/flatpickr/flatpickr.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/elements/tooltip.css') }}">
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
                                <li class="breadcrumb-item" aria-current="page"><span> {{ __('Widgets') }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Starts / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
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
                                            <img class="rounded-circle avatar-xs" src="assets/img/company-1.jpg" alt="profile">
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
                                            <img class="rounded-circle avatar-xs" src="assets/img/company-2.jpg" alt="profile">
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
                                            <img class="rounded-circle avatar-xs" src="assets/img/company-3.jpg" alt="profile">
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
                                            <img class="rounded-circle avatar-xs" src="assets/img/company-4.jpg" alt="profile">
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
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-three">
                    <div class="widget-content">
                        <div class="widget-heading">
                            <h5 class=""> {{ __('Customer Queries') }}</h5>
                            <span class="w-numeric-title"> {{ __('Status of last 8 days') }}</span>
                        </div>
                        <div class="w-chart">
                            <div id="daily-sales"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-three">
                    <div class="widget-heading">
                        <h5 class=""> {{ __('Total Customer Issues') }}</h5>
                        <span class="w-numeric-title"> {{ __('Year 2020') }}</span>
                    </div>
                    <div class="widget-content">
                        <div class="customer-issues">
                            <div class="customer-issue-list">
                                <div class="customer-issue-details">
                                    <div class="customer-issues-info">
                                        <h6 class="mb-2 font-12 text-success-teal"> {{ __('Resolved') }}</h6>
                                        <p class="issues-count mb-2 font-12 text-success-teal"> {{ __('69000') }}</p>
                                    </div>
                                    <div class="customer-issues-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-success position-relative" role="progressbar" style="width: 69%" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"><span class="success-teal"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-issue-list">
                                <div class="customer-issue-details">
                                    <div class="customer-issues-info">
                                        <h6 class="mb-2 font-12 text-secondary"> {{ __('In Progress') }}</h6>
                                        <p class="issues-count mb-2 font-12 text-secondary"> {{ __('2500') }}</p>
                                    </div>
                                    <div class="customer-issues-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-secondary  position-relative" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"><span class="secondary"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-issue-list">
                                <div class="customer-issue-details">
                                    <div class="customer-issues-info">
                                        <h6 class="mb-2 font-12 text-warning"> {{ __('Pending') }}</h6>
                                        <p class="issues-count mb-2 font-12 text-warning"> {{ __('8500') }}</p>
                                    </div>
                                    <div class="customer-issues-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-warning position-relative" role="progressbar" style="width: 11%" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100"><span class="warning"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-three widget-best-seller">
                    <div class="widget-heading mb-4">
                        <h5> {{ __('Best CSE of the month') }}</h5>
                        <span class="w-numeric-title"> {{__('Victor Smith')}}</span>
                    </div>
                    <div class="bs-content row">
                        <div class="col-md-6">
                            <img src="assets/img/trophy.png" class="best-seller-trophy"/>
                        </div>
                        <div class="col-md-6 text-right">
                            <img src="assets/img/profile-1.jpg" class="avatar-sm rounded-circle">
                            <h1 class="mb-0"> {{ __('12481') }}</h1>
                            <p class="mb-4"> {{ __('queries resolved') }}</p>
                            <a class="btn btn-primary btn-sm"> {{ __('View All') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5 class=""> {{ __('Target Sales') }}</h5>
                    </div>
                    <div class="widget-content">
                        <div id="targetSales" class=""></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-two">
                    <div class="widget-heading text-center">
                        <ul class="tabs tab-pills list-unstyled">
                            <li>
                                <div class="dropdown  custom-dropdown-icon">
                                    <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>{{__('2020')}}</span> <i class="las la-angle-down"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                                        <a class="dropdown-item" data-value="Settings" href="javascript:void(0);"> {{__('2019')}}</a>
                                        <a class="dropdown-item" data-value="Settings" href="javascript:void(0);">{{__('2018')}}</a>
                                        <a class="dropdown-item" data-value="Mail" href="javascript:void(0);">{{__('2017')}}</a>
                                        <a class="dropdown-item" data-value="Print" href="javascript:void(0);">{{__('2016')}}</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="widget-content mt-40">
                        <div id="companyGrowth" class=""></div>
                        <p class="font-17 text-center mb-0 text-muted">
                            <a class="text-primary" href="javascript:void(0);">{{ __('10%') }}</a>  {{ __('more than 2019') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-activity-four pb-0">
                    <div class="widget-heading">
                        <h5 class="text-center"> {{ __('User Conversion Rate') }}</h5>
                    </div>
                    <div class="widget-content">
                        <div id="conversion-rate"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-activity-four">
                    <div class="widget-heading">
                        <h5 class=""> {{ __('Sales Summary') }}</h5>
                    </div>
                    <div class="widget-content">
                        <div class="sales-summary-content d-flex mb-3 mt-4">
                            <div class="sales-summary-icon mr-3">
                                <i class="las la-chart-bar sales-primary-icon"></i>
                            </div>
                            <div class="sales-progress flex-grow-1">
                                <span class="font-12"> {{ __('Sales') }}</span>
                                <span class="font-12 float-right">{{ __('$8190') }}</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="70" style="width:70%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="sales-summary-content d-flex mb-3">
                            <div class="sales-summary-icon mr-3">
                                <i class="las la-file-invoice-dollar sales-info-icon"></i>
                            </div>
                            <div class="sales-progress flex-grow-1">
                                <span class="font-12">{{ __('Revenue') }}</span>
                                <span class="font-12 float-right"> {{ __('$4290') }}</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="50" style="width:50%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="sales-summary-content d-flex mb-3">
                            <div class="sales-summary-icon mr-3">
                                <i class="las la-file-invoice-dollar sales-warning-icon"></i>
                            </div>
                            <div class="sales-progress flex-grow-1">
                                <span class="font-12"> {{ __('Budget') }}</span>
                                <span class="font-12 float-right"> {{ __('$3333') }}</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="40" style="width:40%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="sales-summary-content d-flex mb-0">
                            <div class="sales-summary-icon mr-3">
                                <i class="las las la-hand-holding-usd sales-success-icon"></i>
                            </div>
                            <div class="sales-progress flex-grow-1">
                                <span class="font-12"> {{ __('Income') }}</span>
                                <span class="font-12 float-right"> {{ __('$2571') }}</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="35" style="width:35%"></div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-block btn-primary mt-4"> {{ __('View Full Report') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widtget d-flex widget-six mb-4">
                    <div class="widget-six-icon-container background-primary center">
                        <i class="las la-mobile text-white font-25"></i>
                    </div>
                    <div class="p-3 flex-grow-1">
                        <span class="m-2 strong text-primary"> {{ __('Mobile') }}</span>
                        <span class="float-right pt-1 font-12"> {{ __('$2899') }}</span>
                        <p class="ml-2 mt-2 mb-0 font-12 strong"> {{ __('Total 758 sold') }}</p>
                    </div>
                </div>
                <div class="widtget d-flex widget-six mb-4">
                    <div class="widget-six-icon-container background-secondary center">
                        <i class="las la-laptop text-white font-25"></i>
                    </div>
                    <div class="p-3 flex-grow-1">
                        <span class="m-2 strong text-secondary"> {{ __('Laptop') }}</span>
                        <span class="float-right pt-1 font-12"> {{ __('$2141') }}</span>
                        <p class="ml-2 mt-2 mb-0 font-12 strong"> {{ __('Total 68 sold') }}</p>
                    </div>
                </div>
                <div class="widtget d-flex widget-six mb-4">
                    <div class="widget-six-icon-container background-warning center">
                        <i class="las la-book text-white font-25"></i>
                    </div>
                    <div class="p-3 flex-grow-1">
                        <span class="m-2 strong text-warning"> {{ __('Books') }}</span>
                        <span class="float-right pt-1 font-12"> {{ __('$1122') }}</span>
                        <p class="ml-2 mt-2 mb-0 font-12 strong"> {{ __('Total 435 sold') }}</p>
                    </div>
                </div>
                <div class="widtget d-flex widget-six mb-0">
                    <div class="widget-six-icon-container background-success-teal center">
                        <i class="las la-camera text-white font-25"></i>
                    </div>
                    <div class="p-3 flex-grow-1">
                        <span class="m-2 strong text-success-teal"> {{ __('Camera') }}</span>
                        <span class="float-right pt-1 font-12"> {{ __('$231') }}</span>
                        <p class="ml-2 mt-2 mb-0 font-12 strong"> {{ __('Total 123 sold') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-three widget-best-seller">
                    <div class="widget-heading mb-0">
                        <h5> {{ __('Social Media Traffic') }}</h5>
                        <!-- <span class="w-numeric-title">Calculated in last 7 days</span> -->
                    </div>
                    <div class="widget-content">
                        <div id="social-media-traffic"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widtget widget-six mb-4 text-center">
                    <i class="lab la-facebook-square text-primary font-45 mt-3"></i>
                    <div class="p-3 flex-grow-1">
                        <span class="m-2 strong text-primary"> Facebook</span>
                        <span class="d-block mb-0 font-12 text-muted">28000</span>
                    </div>
                </div>
                <div class="widtget widget-six mb-4 text-center">
                    <i class="lab la-instagram text-danger font-45 mt-3"></i>
                    <div class="p-3 flex-grow-1">
                        <span class="m-2 strong text-danger">Instagram</span>
                        <span class="d-block mb-0 font-12 text-muted">20250</span>
                    </div>
                </div>
                <div class="widtget widget-six text-center">
                    <i class="lab la-whatsapp text-success-teal font-45 mt-3"></i>
                    <div class="p-3 flex-grow-1">
                        <span class="m-2 strong text-success-teal">Whatsapp</span>
                        <span class="d-block mb-0 font-12 text-muted">17589</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-activity-four">
                    <div class="widget-heading">
                        <h5 class=""> {{ __('Active Status') }}</h5>
                        <span class="w-numeric-title"> {{ __('Users') }}</span>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 user-status-container">
                            <div class="widget-content">
                                <div id="user-status-progress1"></div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 pl-0">
                            <div class="widget-content pl-0">
                                <h6 class="mb-3 text-light-black"> {{ __('Active Users') }}</h6>
                                <div class="flex-grow-1">
                                    <span class="font-15"><small class="font-15 text-light-black strong mr-2"> {{__('32,678')}}</small> {{ __('Email Accounts') }}</span>
                                    <span class="float-right"> {{('75%')}} </span>
                                    <div class="progress progress-sm mt-2">
                                        <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="75" style="width:75%"></div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="font-15"><small class="font-15 text-light-black strong mr-2"> {{__('3,717')}}</small> {{ __('Pending Requests') }}</span>
                                    <span class="float-right"> {{('25%')}}</span>
                                    <div class="progress progress-sm  mt-2">
                                        <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="25" style="width:25%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 pr-0 mt-10">
                            <div class="widget-content pr-0">
                                <h6 class="mb-3 text-light-black"> {{ __('Deactive Users') }}</h6>
                                <div class="flex-grow-1">
                                    <span class="font-15"><small class="font-15 text-light-black strong mr-2"> {{__('12,678')}}</small> {{ __('Email Accounts') }}</span>
                                    <span class="float-right">{{('35%')}}</span>
                                    <div class="progress progress-sm mt-2">
                                        <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="35" style="width:35%"></div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="font-15"><small class="font-15 text-light-black strong mr-2"> {{('35,710')}}</small> {{ __('Pending Requests') }}</span>
                                    <span class="float-right"> {{('65%')}}</span>
                                    <div class="progress progress-sm  mt-2">
                                        <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="65" style="width:65%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 user-status-container">
                            <div class="widget-content">
                                <div id="user-status-progress2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <div>
                            <h5 class=""> {{ __('Social Media Campaigns') }}</h5>
                            <span class="w-numeric-title"> {{ __('Overview of all campaigns') }}</span>
                        </div>
                        <ul class="tabs tab-pills list-unstyled">
                            <li>
                                <div class="dropdown  custom-dropdown-icon">
                                    <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span> {{('2020')}}</span> <i class="las la-angle-down"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                                        <a class="dropdown-item" data-value="Settings" href="javascript:void(0);"> {{('2019')}}</a>
                                        <a class="dropdown-item" data-value="Settings" href="javascript:void(0);"> {{('2018')}}</a>
                                        <a class="dropdown-item" data-value="Mail" href="javascript:void(0);"> {{('2017')}}</a>
                                        <a class="dropdown-item" data-value="Print" href="javascript:void(0);"> {{('2016')}}</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="widget-content">
                        <div id="social-media-campaigns1" class=""></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <div>
                            <h5 class=""> {{ __('Ongoing Projects') }}</h5>
                            <span class="w-numeric-title"> {{ __('Overview of this month') }}</span>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="mb-2 border-bottom border-light pb-2">
                            <span class="text-primary font-15"> {{ __('Node.Js Project') }}</span>
                            <span class="float-right text-success-teal font-12"><i class="las la-clock"></i> {{ __('5 days ago') }}</span>
                            <h6 class="text-muted font-12 mt-1 mb-2"> {{ __('Started on : 03/05/2020') }}</h6>
                            <p class="font-12 mb-0 text-muted"> {{ __('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.') }}</p>
                        </div>
                        <div class="mb-2 border-bottom border-light pb-2">
                            <span class="text-primary font-15"> {{ __('Swift Project') }}</span>
                            <span class="float-right text-danger font-12"><i class="las la-clock"></i> {{ __('19 days ago') }}</span>
                            <h6 class="text-muted font-12 mt-1 mb-2"> {{ __('Started on : 13/03/2020') }}</h6>
                            <p class="font-12 mb-0 text-muted"> {{ __('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.') }}</p>
                        </div>
                        <div>
                            <span class="text-primary font-15"> {{ __('Angular Project') }}</span>
                            <span class="float-right text-success-teal font-12"><i class="las la-clock"></i> {{ __('1 days ago') }}</span>
                            <h6 class="text-muted font-12 mt-1 mb-2"> {{ __('Started on : 30/04/2020') }}</h6>
                            <p class="font-12 mb-0 text-muted"> {{ __('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <div>
                            <h5 class=""> {{ __('To do list') }}</h5>
                            <span class="w-numeric-title"> {{ __('Tasks which assigned to you') }}</span>
                        </div>
                        <a class="text-success-teal font-25 pointer" id="showToDoinput"><i class="las la-plus-circle"></i></a>
                    </div>
                    <div class="widget-content">
                        <div class="display-none todo-input-container" id="toDoInputContainer">
                            <div class="form-group mb-0 align-center d-flex">
                                <input id="t-text" type="text" name="txt" placeholder="{{ __('Title') }}" class="form-control" required="">
                                <a class="ml-2 btn-sm btn btn-primary">{{ __('Add') }}</a>
                            </div>
                        </div>
                        <div class="to-do-list-area">
                            <h6 class="font-12 text-muted mt-3 mb-3"> {{ __('Important') }}</h6>
                            <div class="single-to-do">
                                <div>
                                    <div class="login-one-inputs check">
                                        <input class="inp-cbx" id="cbx" type="checkbox" style="display: none"/>
                                        <label class="cbx" for="cbx">
                                                    <span>
                                                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                        </svg>
                                                    </span>
                                            <span class="text-light-black"> {{ __('Need AWS server backup at 10:00 am') }}</span>
                                        </label>
                                    </div>
                                </div>
                                <span class="badge outline-badge-primary"> {{ __('Primary') }} </span>
                            </div>
                        </div>
                        <div class="to-do-list-area mt-2">
                            <h6 class="font-12 text-muted mt-3 mb-3"> {{ __('Regular') }}</h6>
                            <div class="single-to-do">
                                <div>
                                    <div class="login-one-inputs check">
                                        <input class="inp-cbx" id="cbx2" type="checkbox" style="display: none"/>
                                        <label class="cbx" for="cbx2">
                                                    <span>
                                                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                        </svg>
                                                    </span>
                                            <span class="text-light-black"> {{ __('Project graph need to check') }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-block btn-primary mt-4" href="apps_taskList.html"> {{ __('View full To Do App') }}</a>
                </div>
            </div>
        </div>
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget top-welcome">
                    <div class="f-100">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="media">
                                    <div class="mr-3">
                                        <img src="assets/img/profile-16.jpg" alt="" class="avatar-md rounded-circle img-thumbnail">
                                    </div>
                                    <div class="align-self-center media-body">
                                        <div class="text-muted">
                                            <p class="mb-2 text-primary"> {{ __('Welcome to dashboard') }}</p>
                                            <h5 class="mb-1"> {{ __('Sara') }}</h5>
                                            <p class="mb-0"> {{ __('System Admin') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="align-self-center col-lg-5">
                                <div class="text-lg-center mt-4 mt-lg-0">
                                    <div class="row">
                                        <div class="col-3">
                                            <div>
                                                <p class="text-muted text-truncate mb-2"> {{ __('Projects') }}</p>
                                                <h5 class="mb-0"> {{ __('48') }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div>
                                                <p class="text-muted text-truncate mb-2"> {{ __('Team') }}</p>
                                                <h5 class="mb-0"> {{ __('40') }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div>
                                                <p class="text-muted text-truncate mb-2"> {{ __('Clients') }}</p>
                                                <h5 class="mb-0"> {{ __('18') }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div>
                                                <p class="text-muted text-truncate mb-2"> {{ __('Sellers') }}</p>
                                                <h5 class="mb-0"> {{ __('98') }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none d-lg-flex col-lg-3 align-items-end justify-content-center flex-column">
                                <button class="btn btn-primary">
                                    {{ __('Settings') }}
                                </button>
                                <button class="btn btn-info mt-2">
                                    {{ __('My Chat') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 4 COLUMNS -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                <div class="widget bg-gradient-danger">
                    <div class="f-100">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="text-white">
                                    <h5 class="text-white"> {{ __('Pending Tasks !') }}</h5>
                                    <p class="blink_me text-white mt-1"> {{ __('Deadline Tomorrow') }}</p>
                                    <ul class="pl-3 mb-0">
                                        <li class="py-1"> {{ __('Seller Payments') }}</li>
                                        <li class="py-1"> {{ __('Check Payouts') }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="align-self-end col-md-5">
                                <img src="assets/img/dashboard-image-uw.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 layout-spacing">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="widget">
                            <div class="d-flex align-items-center mb-3">
                                <div class="mr-3">
                                            <span class="quick-category-icon qc-primary rounded-circle">
                                                <i class="las la-shopping-cart"></i>
                                            </span>
                                </div>
                                <h5 class="font-size-14 mb-0"> {{ __('Orders') }}</h5>
                            </div>
                            <div class="text-muted mt-3">
                                <h5 class="mb-2"> {{ __('1,452') }}
                                    <i class="las la-angle-up text-success-teal"></i>
                                </h5>
                                <div class="d-flex">
                                    <span class="badge badge-success-teal font-size-12"> {{ __('+ 0.2%') }} </span>
                                    <span class="ml-2 text-truncate"> {{ __('From last month') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="widget">
                            <div class="d-flex align-items-center mb-3">
                                <div class="mr-3">
                                            <span class="quick-category-icon qc-primary rounded-circle">
                                                <i class="las la-hand-holding-usd"></i>
                                            </span>
                                </div>
                                <h5 class="font-size-14 mb-0"> {{ __('Profit') }}</h5>
                            </div>
                            <div class="text-muted mt-3">
                                <h5 class="mb-2"> {{ __('$200') }}
                                    <i class="las la-angle-down text-danger"></i>
                                </h5>
                                <div class="d-flex">
                                    <span class="badge badge-danger font-size-12"> {{ __('- 5.4%') }} </span>
                                    <span class="ml-2 text-truncate"> {{ __('From last month') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="widget">
                            <div class="d-flex align-items-center mb-3">
                                <div class="mr-3">
                                            <span class="quick-category-icon qc-primary rounded-circle">
                                                <i class="las la-user"></i>
                                            </span>
                                </div>
                                <h5 class="font-size-14 mb-0"> {{ __('Customer') }}</h5>
                            </div>
                            <div class="text-muted mt-3">
                                <h5 class="mb-2"> {{ __('9,887') }}
                                    <i class="las la-angle-up text-success-teal"></i>
                                </h5>
                                <div class="d-flex">
                                    <span class="badge badge-success-teal font-size-12"> {{ __('+ 25%') }} </span>
                                    <span class="ml-2 text-truncate"> {{ __('From last month') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 4 COLUMNS END-->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing ">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5 class=""> {{ __('Weather Report') }}</h5>
                        <h6 class="pt-1"> {{ __('Sydney, Australia') }}</h6>
                    </div>
                    <div class="widget-content">
                        <div class="monthly-weather-report">
                            <div class="d-sm-flex d-block justify-content-between mb-4">
                            </div>
                            <div class="row weather-report-container justify-content-between">
                                <div class="col-xl-4 col-md-5">
                                    <div class="tempareture-box-2 d-flex justify-content-sm-center justify-content-between mb-4 mb-sm-0">
                                        <div class="tempareture-box-icon">
                                            <i class="las la-sun slow-spin text-warning font-135"></i>
                                        </div>
                                        <div class="tempareture-box-content text-center ml-4">
                                            <div class="temp-top">
                                                <span class="font-65 text-warning">18°C</span>
                                            </div>
                                            <div class="temp-bottom">
                                                <a> {{ __('Yesterday - ') }}<span class="temp-1 strong text-primary">24°C</span></a>
                                                <a> {{ __('Tomorrow -') }} <span class="temp-2 strong text-primary">22°C</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="row monthly-weather-report-inner">
                                        <div class="col-sm-4 col-6">
                                            <div class="media pt-3 align-items-center pb-3">
                                                        <span class="mr-3 text-warning font-45">
                                                            <i class="las la-sun"></i>
                                                        </span>
                                                <div class="media-body">
                                                    <h5> {{ __('Warm') }}</h5>
                                                    <p> {{ __('Clear') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="media pt-3 align-items-center pb-3">
                                                        <span class="mr-3 text-black font-45">
                                                            <i class="las la-moon"></i>
                                                        </span>
                                                <div class="media-body">
                                                    <h5> {{ __('Night') }}</h5>
                                                    <p> {{ __('Pleasant') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="media pt-3 align-items-center pb-3">
                                                        <span class="mr-3 text-info font-45">
                                                            <i class="las la-cloud-rain"></i>
                                                        </span>
                                                <div class="media-body">
                                                    <h5> {{ __('Cloudy') }}</h5>
                                                    <p> {{ __('Raining') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="media pt-3 align-items-center pb-3">
                                                        <span class="mr-3 text-info font-45">
                                                            <i class="las la-tint"></i>
                                                        </span>
                                                <div class="media-body">
                                                    <h5> {{ __('58%') }}</h5>
                                                    <p> {{ __('Humidity') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="media pt-3 align-items-center pb-3">
                                                        <span class="mr-3 text-dpink font-45">
                                                            <i class="las la-wind"></i>
                                                        </span>
                                                <div class="media-body">
                                                    <h5> {{ __('17 mph') }}</h5>
                                                    <p> {{ __('Wind Speed') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="media pt-3 align-items-center pb-3">
                                                        <span class="mr-3 text-info font-45">
                                                            <i class="las la-cloud-moon-rain"></i>
                                                        </span>
                                                <div class="media-body">
                                                    <h5> {{ __('29.57 ml') }}</h5>
                                                    <p> {{ __('Rainfall') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-primary text-white mt-3">
                            <div class="mb-0">
                                <div class="">
                                    <div class="whole-week-days d-flex flex-wrap justify-content-sm-around p-3">
                                        <div class="item">
                                            <h6 class="text-white mb-0"> {{ __('Mon') }}</h6>
                                            <div class="d-flex align-items-center mt-1">
                                                <span class="env-icon"><i class="las la-cloud-moon font-35"></i></span>
                                                <div class="temp-count ml-2">
                                                    <h6 class="text-white mb-0"> {{ __('58°F') }}</h6>
                                                    <p class="mb-0 text-white"> {{ __('28°C') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <h6 class="text-white mb-0"> {{ __('Tue') }}</h6>
                                            <div class="d-flex align-items-center mt-1">
                                                <span class="env-icon"><i class="las la-cloud-sun font-35"></i></span>
                                                <div class="temp-count ml-2">
                                                    <h6 class="text-white mb-0"> {{ __('60°F') }}</h6>
                                                    <p class="mb-0 text-white"> {{ __('29°C') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <h6 class="text-white mb-0"> {{ __('Wed') }}</h6>
                                            <div class="d-flex align-items-center mt-1">
                                                <span class="env-icon"><i class="las la-cloud-moon font-35"></i></span>
                                                <div class="temp-count ml-2">
                                                    <h6 class="text-white mb-0">{{ __('60°F') }}</h6>
                                                    <p class="mb-0 text-white">{{ __('30°C') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <h6 class="text-white mb-0"> {{ __('Thu') }}</h6>
                                            <div class="d-flex align-items-center mt-1">
                                                <span class="env-icon"><i class="las la-cloud-sun font-35"></i></span>
                                                <div class="temp-count ml-2">
                                                    <h6 class="text-white mb-0"> {{ __('40°F') }}</h6>
                                                    <p class="mb-0 text-white">{{ __('19°C') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <h6 class="text-white mb-0"> {{ __('Fri') }}</h6>
                                            <div class="d-flex align-items-center mt-1">
                                                <span class="env-icon"><i class="las la-cloud-sun-rain font-35"></i></span>
                                                <div class="temp-count ml-2">
                                                    <h6 class="text-white mb-0"> {{ __('46°F') }}</h6>
                                                    <p class="mb-0 text-white">{{ __('23°C') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <h6 class="text-white mb-0"> {{ __('Sat') }}</h6>
                                            <div class="d-flex align-items-center mt-1">
                                                <span class="env-icon"><i class="las la-cloud-moon font-35"></i></span>
                                                <div class="temp-count ml-2">
                                                    <h6 class="text-white mb-0">{{ __('48°F') }}</h6>
                                                    <p class="mb-0 text-white">{{ __('28°C') }}</p>
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
            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5 class=""> {{ __('Top Seller Performance') }}</h5>
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
                        <div class="tabs tab-content row">
                            <div class="left-area col-lg-4">
                                <h6 class="mb-0 mt-4"> {{ __('WS Retail') }}</h6>
                                <p> {{ __('Best Seller of the month') }}</p>
                                <h4 class="mt-3"> {{ __('$3,808') }}</h4>
                                <div class="d-flex">
                                    <span class="badge badge-success-teal font-size-12"> {{ __('+ 25%') }} </span>
                                    <span class="ml-2 text-truncate"> {{ __('more sales') }}</span>
                                </div>
                                <button class="btn btn-sm btn-primary mt-4"> {{ __('View Details') }}</button>
                                <p class="mb-0 mt-4"> {{ __('Last Month') }}</p>
                                <p> {{ __('$2,405') }}</p>
                            </div>
                            <div class="right-area col-lg-8">
                                <div id="content_1" class="tabcontent">
                                    <div id="bestSeller"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-two">
                    <div class="widget-heading">
                        <h5 class="text-center"> {{ __('Top Selling Product') }}</h5>
                    </div>
                    <div class="widget-content mt-4">
                        <img src="assets/img/product-1.jpg" class="rounded-circle avatar-md img-thumbnail m-auto object-cover"/>
                        <h6 class="text-center mt-2"> {{ __('Product One') }}</h6>
                        <p class="text-center"> {{ __('$5,458') }}</p>
                        <div class="d-flex justify-content-center mb-4">
                            <span class="badge badge-success font-size-12"> {{ __('+ 25%') }} </span>
                            <span class="ml-2 text-truncate"> {{ __('From last month') }}</span>
                        </div>
                        <img src="assets/img/product-4.jpg" class="rounded-circle avatar-md img-thumbnail m-auto object-cover"/>
                        <h6 class="text-center mt-2"> {{ __('Product Two') }}</h6>
                        <p class="text-center"> {{ __('$5,458') }}</p>
                        <div class="d-flex justify-content-center mb-4">
                            <span class="badge badge-danger font-size-12"> {{ __('- 25%') }} </span>
                            <span class="ml-2 text-truncate"> {{ __('From last month') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 layout-spacing">
                <div class="row">
                    <div class="col-md-6">
                        <div class="widget widget-chart-one">
                            <div class="widget-heading">
                                <h5 class=""> {{ __('Sales details of product') }}</h5>
                            </div>
                            <div class="widget-content">
                                <div class="d-flex justify-content-between">
                                    <p class="font-35 text-success-teal"> {{ __('$74,989') }}</p>
                                    <i class="lar la-chart-bar font-45 text-success-teal"></i>
                                </div>
                                <p> {{ __('Total 175 Sales') }}</p>
                                <a class="btn btn-sm btn-primary"> {{ __('View Details') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="widget widget-chart-one">
                            <div class="widget-heading">
                                <h5 class=""> {{ __('Pending payment of product') }}</h5>
                            </div>
                            <div class="widget-content">
                                <div class="d-flex justify-content-between">
                                    <p class="font-35 text-warning"> {{ __('$24,989') }}</p>
                                    <i class="lar la-chart-bar font-45 text-warning"></i>
                                </div>
                                <p> {{ __('Total 98 clients') }}</p>
                                <a class="btn btn-sm btn-warning"> {{ __('View Details') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="widget widget-chart-one">
                            <div class="widget-heading">
                                <h5 class=""> {{ __('Recent Items') }}</h5>
                                <ul class="tabs tab-pills">
                                    <li>
                                        <div class="dropdown  custom-dropdown-icon">
                                            <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span> {{ __('Options') }}</span> <i class="las la-angle-down"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                                                <a class="dropdown-item" data-value="Print" href="javascript:void(0);"> {{ __('Print') }}</a>
                                                <a class="dropdown-item" data-value="Download" href="javascript:void(0);"> {{ __('Download') }}</a>
                                                <a class="dropdown-item" data-value="Share" href="javascript:void(0);"> {{ __('Share') }}</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget-content">
                                <div class="d-flex flex-column">
                                    <div class="media recent-items w-100 align-items-center mt-2 mb-4">
                                        <img src="assets/img/product-1.jpg" alt="">
                                        <div class="media-body ml-4 mt-sm-3">
                                            <h5 class="mb-1"> {{__('1005 Farland Street,West Roxbury')}}</h5>
                                            <p> {{__('05 Jul 2018, Fergus Douchebag')}}</p>
                                        </div>
                                        <a class="badge badge-success-teal text-white mr-2"> {{ __('Completed') }}</a>
                                        <a class="badge badge-warning text-white d-none d-md-block"> {{ __('Pending') }}</a>
                                    </div>
                                    <div class="media recent-items w-100 align-items-center mb-4">
                                        <img src="assets/img/product-2.jpg" alt="">
                                        <div class="media-body ml-4 mt-sm-3">
                                            <h5 class="mb-1"> {{__('845 Nrarland Street,east Opobury')}} </h5>
                                            <p> {{__('12 Jul 2019, Fergus Douchebag')}}</p>
                                        </div>
                                        <a class="badge badge-info text-white mr-2"> {{ __('Processing') }}</a>
                                        <a class="badge badge-success text-white d-none d-md-block"> {{ __('Done') }}</a>
                                    </div>
                                    <div class="media recent-items w-100 align-items-center mb-4">
                                        <img src="assets/img/product-3.jpg" alt="">
                                        <div class="media-body ml-4 mt-sm-3">
                                            <h5 class="mb-1"> {{__('8/D Talbagan Street,North 24 midland Opobury')}}</h5>
                                            <p> {{__('12 Jul 2019, Jonas Ferguson')}}</p>
                                        </div>
                                        <a class="badge badge-danger text-white mr-2"> {{ __('Failed') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-content">
                        <div class="agent-info text-center">
                            <div class="agent-img pb-3">
                                <img src="assets/img/profile-5.jpg" class="img-thumbnail rounded-circle" alt="image">
                            </div>
                            <h5 class="text-dark"> {{__('Hermann P. Schnitzel')}}</h5>
                            <p> {{ __('Agent of Property') }}</p>
                            <h6 class="mb-3 mt-3"><span class="text-primary pr-2"><i class="fa fa-phone"></i></span> {{ __('(+1) 774-238-0096') }}</h6>
                        </div>
                        <form action="index.html" class="agent-req-form mt-2">
                            <h6 class="text-muted text-center mb-4"> {{ __('Request Inquiry') }}</h6>
                            <div class="form-group">
                                <input type="text" placeholder=" {{ __('Full Name *') }}" class="form-control bg-white text-muted">
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder=" {{ __('Email ID *') }}" class="form-control bg-white text-muted">
                            </div>
                            <div class="form-group">
                                <input type="tel" placeholder=" {{ __('Phone No *') }}" class="form-control bg-white text-muted">
                            </div>
                            <div class="form-group">
                                <textarea rows="3" placeholder=" {{ __('Message *') }}" class="form-control bg-white text-muted"></textarea>
                            </div>
                            <div class="form-group text-right mb-0">
                                <button type="submit" class="btn btn-sm btn-outline-primary"> {{ __('Submit Request') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget-chart-one">
                    <div class="widget-content overflow-hidden">
                        <div class="ticker-wrap">
                            <div class="ticker-heading bg-gradient-info">
                                <p> {{ __('Overview') }}</p>
                            </div>
                            <div class="ticker">
                                <div class="ticker-item"> {{ __('Letterpress chambray brunch.') }}</div>
                                <div class="ticker-item"> {{ __('Vice mlkshk crucifix beard chillwave meditation hoodie asymmetrical Helvetica.') }}</div>
                                <div class="ticker-item"> {{ __('Ugh PBR&B kale chips Echo Park.') }}</div>
                                <div class="ticker-item"> {{ __('Gluten-free mumblecore chambray mixtape food truck.') }} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row layout-top-spacing">
            <!-- 4 AREAS -->
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
                <div class="widget 4-areas">
                    <div class="f-100">
                        <div class="card-box">
                            <i class="las la-info-circle text-muted float-right bs-tooltip" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{ __('More Info') }}"></i>
                            <h6 class="mt-0 font-16"> {{ __('Revenue Status') }}</h6>
                            <h2 class="text-primary my-3 text-center">
                                $<span class="s-counter2 s-counter"> {{ __('710') }}</span>
                            </h2>
                            <p class="text-muted mb-0"> {{ __('Income: $22506') }}
                                <span class="float-right">
                                            <i class="las la-angle-up text-success-teal mr-1"></i> {{ __('10.25%') }}
                                        </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
                <div class="widget 4-areas">
                    <div class="f-100">
                        <div class="card-box">
                            <i class="las la-info-circle text-muted float-right bs-tooltip" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{ __('More Info') }}"></i>
                            <h6 class="mt-0 font-16"> {{ __('Total Sales') }}</h6>
                            <h2 class="text-primary my-3 text-center">
                                $<span class="s-counter3 s-counter"> {{ __('510') }}</span>
                            </h2>
                            <p class="text-muted mb-0"> {{ __('This Month: $506') }}
                                <span class="float-right">
                                            <i class="las la-angle-down text-danger mr-1"></i> {{ __('5.00%') }}
                                        </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
                <div class="widget 4-areas">
                    <div class="f-100">
                        <div class="card-box">
                            <i class="las la-info-circle text-muted float-right bs-tooltip" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{ __('More Info') }}"></i>
                            <h6 class="mt-0 font-16"> {{ __('New Users') }}</h6>
                            <h2 class="text-primary my-3 text-center">
                                <span class="s-counter4 s-counter"> {{ __('223') }}</span>K
                            </h2>
                            <p class="text-muted mb-0"> {{ __('Total: 9.4M') }}
                                <span class="float-right">
                                            <i class="las la-angle-up text-success-teal mr-1"></i> {{ __('15.30%') }}
                                        </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
                <div class="widget 4-areas">
                    <div class="f-100">
                        <div class="card-box">
                            <i class="las la-info-circle text-muted float-right bs-tooltip" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{ __('More Info') }}"></i>
                            <h6 class="mt-0 font-16"> {{ __('Orders') }}</h6>
                            <h2 class="text-primary my-3 text-center">
                                <span class="s-counter5 s-counter"> {{ __('302') }}</span>
                            </h2>
                            <p class="text-muted mb-0"> {{ __('Total: 3.2K') }}
                                <span class="float-right">
                                            <i class="las la-angle-up text-success-teal mr-1"></i> {{ __('2.30%') }}
                                        </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 4 AREAS -->
            <!-- REVENUE -->
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5 class=""> {{ __('Revenue Comparison') }}</h5>
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
                                <div id="revenue"></div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="widget-rounded-circle card-box">
                                            <div class="row">
                                                <div class="col-4 pt-1">
                                                    <div class="avatar-sm rounded-circle bg-primary text-center">
                                                        <i class="las la-chart-line pt-1 font-25"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 pl-0">
                                                    <div class="text-left">
                                                        <h6 class="mt-1 mb-0">$<span data-plugin="counterup"> {{ __('58,947') }}</span></h6>
                                                        <p class="text-muted mb-1 text-truncate"> {{ __('Total Sales') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="widget-rounded-circle card-box">
                                            <div class="row">
                                                <div class="col-4 pt-1">
                                                    <div class="avatar-sm rounded-circle bg-success text-center">
                                                        <i class="las la-file-invoice-dollar pt-1 font-25"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 pl-0">
                                                    <div class="text-left">
                                                        <h6 class="mt-1 mb-0">$<span data-plugin="counterup"> {{ __('45,458') }}</span></h6>
                                                        <p class="text-muted mb-1 text-truncate"> {{ __('Total Revenue') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="widget-rounded-circle card-box">
                                            <div class="row">
                                                <div class="col-4 pt-1">
                                                    <div class="avatar-sm rounded-circle bg-danger text-center">
                                                        <i class="las la-bullseye pt-1 font-25"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 pl-0">
                                                    <div class="text-left">
                                                        <h6 class="mt-1 mb-0">$<span data-plugin="counterup"> {{ __('58,000') }}</span></h6>
                                                        <p class="text-muted mb-1 text-truncate"> {{ __('Target Revenue') }}</p>
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
            </div>
            <!-- REVENUE ENDS-->
            <!-- TARGET VS ACTUAL -->
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5 class=""> {{ __('Target vs Actual') }}</h5>
                    </div>
                    <div class="widget-content">
                        <div id="targetvsactual" class=""></div>
                        <div class="row mt-0 text-center">
                            <div class="col-4">
                                <p class="text-muted font-15 mb-1 text-truncate"> {{ __('Target') }}</p>
                                <h4><i class="fe-arrow-down text-danger mr-1"></i> {{ __('$3.8k') }}</h4>
                            </div>
                            <div class="col-4">
                                <p class="text-muted font-15 mb-1 text-truncate"> {{ __('Last week') }}</p>
                                <h4><i class="fe-arrow-up text-success mr-1"></i> {{ __('$1.1k') }}</h4>
                            </div>
                            <div class="col-4">
                                <p class="text-muted font-15 mb-1 text-truncate"> {{ __('Last Month') }}</p>
                                <h4><i class="fe-arrow-down text-danger mr-1"></i> {{ __('$25k') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- TARGET VS ACTUAL ENDS-->
            <!-- EARNINGS -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-activity-four earnings">
                    <div class="widget-heading">
                        <h5> {{ __('Earnings') }}</h5>
                        <p> {{ __('JAN,20 - JUL,20') }}</p>
                    </div>
                    <div class="widget-content">
                        <div class="earning-details mb-3">
                            <h2 class="mb-1">
                                <span> {{ __('$4295.36') }}</span>
                                <i class="las la-arrow-up text-success-teal"></i>
                            </h2>
                            <span class="text-muted"> {{ __('Total Earnings') }}</span>
                        </div>
                        <div class="earnings-container">
                            <div id="earnings"></div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-sm btn-info mr-2"> {{ __('View All') }}</button>
                            <button class="btn btn-sm btn-danger"> {{ __('Share') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- EARNINGS ENDS-->
            <!-- PRODUCT CAROUSEL -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing product-carousel">
                <div class="product-carousel-inner">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active m"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="assets/img/1.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/img/2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/img/3.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only"> {{ __('Previous') }}</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only"> {{ __('Next') }}</span>
                        </a>
                    </div>
                    <a class="add-product-plus">
                        <i class="las la-plus"></i>
                    </a>
                </div>
                <div class="widget card-body">
                    <h4 class="card-title"> {{ __('Our Products') }}</h4>
                    <p> {{ __('This is a general sub title which can be used as product description or other description.') }}</p>
                    <div >
                        <span class="badge bg-light-primary mr-2"> {{ __('Sales') }}</span>
                        <span class="badge bg-light-success mr-2"> {{ __('Design') }}</span>
                        <span class="badge bg-light-warning mr-2"> {{ __('Developer') }}</span>
                    </div>
                </div>
            </div>
            <!-- PRODUCT CAROUSEL ENDS-->
            <!-- SMALL PROFILE -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing small-profile">
                <div class="widget widget-chart-one">
                    <div class="d-flex justify-content-end mb-4">
                        <span class="badge bg-light-primary mr-2"> {{ __('Designer') }}</span>
                    </div>
                    <div class="text-center mb-4">
                        <img src="assets/img/profile-21.jpg" alt="Avatar" class="img-thumbnail rounded-circle mb-3">
                        <h5 class="mb-0 stronger"> {{ __('Oliver Murphy') }}</h5>
                        <a class="text-primary" href="#"> {{ __('@oliver_murphy') }}</a>
                        <div class="d-flex justify-content-center align-items-center mt-4">
                            <div class="dash-followers mr-4">
                                <div class="d-flex justify-content-center align-items-center">
                                    <button type="button" class="btn bg-light-secondary px-2">
                                        <i class="lar la-user"></i>
                                    </button>
                                    <div class="ml-2">
                                        <h5 class="mb-0"> {{ __('365k') }}</h5>
                                        <span class="grey"> {{ __('Followers') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dash-ratings">
                                <div class="d-flex justify-content-center align-items-center">
                                    <button type="button" class="btn bg-light-secondary px-2">
                                        <i class="las la-star"></i>
                                    </button>
                                    <div class="ml-2">
                                        <h5 class="mb-0"> {{ __('4.7') }}</h5>
                                        <span class="grey"> {{ __('Ratings') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="mt-4">
                        <span> {{ __('Todays Earnings') }}</span>
                        <small class="ml-1"> {{ __('$25k') }}</small>
                    </h6>
                    <div class="progress mb-0">
                        <div role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-light-primary text-primary font-11 strong" style="width: 30%;"> {{ __('30%') }}</div>
                        <div role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-light-success text-success-teal font-11 strong" style="width: 20%;"> {{ __('20%') }}</div>
                        <div role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-light-info text-info font-11 strong" style="width: 35%;"> {{ __('35%') }}</div>
                    </div>
                </div>
            </div>
            <!-- SMALL PROFILE ENDS -->
            <!-- WALLET BALANCE -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one wallet-balance">
                    <div class="widget-heading mb-2">
                        <h5 class=""> {{ __('Wallet Balance') }}</h5>
                        <select class="custom-select custom-select-sm ml-2 ">
                            <option value="1"> {{ __('January') }}</option>
                            <option value="2"> {{ __('February') }}</option>
                            <option value="3"> {{ __('March') }}</option>
                            <option value="4"> {{ __('April') }}</option>
                        </select>
                    </div>
                    <div class="widget-content">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mt-4">
                                    <p> {{ __('Available Balance') }}</p>
                                    <h4> {{ __('$1,212.00') }}</h4>
                                    <p class="text-muted mb-4"> {{ __('+ 123.00 ( 9.2 % )') }}
                                        <i class="las la-arrow-up text-success-teal"></i>
                                    </p>
                                    <div class="row">
                                        <div class="col-6">
                                            <div>
                                                <p class="mb-2"> {{ __('Income') }}</p>
                                                <h5> {{ __('$6,302') }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <p class="mb-2"> {{ __('Expense') }}</p>
                                                <h5> {{ __('$9,204') }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <a class="btn btn-primary btn-sm" href="/dashboard-crypto"> {{ __('View more') }} <i class="mdi mdi-arrow-right ml-1"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="wallet-balance-container">
                                    <div id="walletBalance" class=""></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="align-self-center">
                                    <div class="mt-4 pt-2">
                                        <p class="mb-2 text-success-teal">
                                            <i class="las la-square-full"></i> {{ __('Income') }}
                                        </p>
                                        <h5> {{ __('$180') }}
                                            <span class="text-muted font-11 light"> {{ __('(75%) for the month of JAN') }}</span>
                                        </h5>
                                    </div>
                                    <div class="mt-4 pt-2">
                                        <p class="mb-2 text-warning">
                                            <i class="las la-square-full"></i> {{ __('Referral') }}
                                        </p>
                                        <h5> {{ __('$162') }}
                                            <span class="text-muted font-11 light"> {{ __('(67%) for the month of JAN') }}</span>
                                        </h5>
                                    </div>
                                    <div class="mt-4 pt-2">
                                        <p class="mb-2 text-danger">
                                            <i class="las la-square-full"></i> {{ __('Expense') }}
                                        </p>
                                        <h5> {{ __('$200') }}
                                            <span class="text-muted font-11 light"> {{ __('(83%) for the month of JAN') }}</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- WALLET BALANCE ENDS-->
            <!-- 3 PRODUCT STARTS -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one wallet-balance bg-light-warning mt-5">
                    <div class="card-content">
                        <div class="card-img overlap text-center">
                            <img src="assets/img/apple-desktop.png" alt="apple" height="150">
                        </div>
                        <div class="card-body pb-0">
                            <h4 class="card-title text-warning"> {{ __('New Arrival') }}</h4>
                            <p class="m-0 text-warning"> {{ __('Amazing product with max performance and fast processor') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one wallet-balance bg-light-info mt-5">
                    <div class="card-content">
                        <div class="card-img overlap text-center">
                            <img src="assets/img/apple-phone.png" alt="apple" height="150">
                        </div>
                        <div class="card-body pb-0">
                            <h4 class="card-title text-primary"> {{ __('Most Popular') }}</h4>
                            <p class="m-0 text-primary"> {{ __('Best phone in the market. Most popular among youth') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one wallet-balance bg-light-danger mt-5">
                    <div class="card-content">
                        <div class="card-img overlap text-center">
                            <img src="assets/img/apple-watch.png" alt="apple" height="150">
                        </div>
                        <div class="card-body pb-0">
                            <h4 class="card-title text-danger"> {{ __('Hot Trending') }}</h4>
                            <p class="m-0 text-danger"> {{ __('Latest technology with heart rate sensor and speedometer.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 3 PRODUCT ENDS -->
        </div>
        <div class="row layout-top-spacing">
            <!-- 4 AREAS -->
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget 4-areas">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-4">
                                <div class="avatar-md d-flex align-items-center justify-content-center rounded-circle bg-light-info text-center">
                                    <i class="las la-globe font-35"></i>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="text-right">
                                    <h3 class="text-dark my-1"> {{ __('100M') }}</h3>
                                    <p class="text-muted mb-1 text-truncate"> {{ __('Total Global Reach') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="text-uppercase"> {{ __('Target') }} <span class="float-right"> {{ __('150M') }}</span></h6>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                    <span class="sr-only"> {{ __('60% Complete') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget 4-areas">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-4">
                                <div class="avatar-md d-flex align-items-center justify-content-center rounded-circle bg-light-secondary text-center">
                                    <i class="las la-certificate font-35"></i>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="text-right">
                                    <h3 class="text-dark my-1"> {{ __('98') }}</h3>
                                    <p class="text-muted mb-1 text-truncate"> {{ __('Presigious Awards') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="text-uppercase"> {{ __('Target') }} <span class="float-right">{{ __('100') }}</span></h6>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                    <span class="sr-only"> {{ __('98% Complete') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget 4-areas">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-4">
                                <div class="avatar-md d-flex align-items-center justify-content-center rounded-circle bg-light-success text-center">
                                    <i class="lar la-handshake font-35"></i>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="text-right">
                                    <h3 class="text-dark my-1"> {{ __('745') }}</h3>
                                    <p class="text-muted mb-1 text-truncate"> {{ __('New Clients') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="text-uppercase"> {{ __('Target') }} <span class="float-right"> {{ __('1000') }}</span></h6>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                    <span class="sr-only"> {{ __('75% Complete') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget 4-areas">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-4">
                                <div class="avatar-md d-flex align-items-center justify-content-center rounded-circle bg-light-danger text-center">
                                    <i class="lar la-thumbs-down font-35"></i>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="text-right">
                                    <h3 class="text-dark my-1"> {{ __('2200') }}</h3>
                                    <p class="text-muted mb-1 text-truncate"> {{ __('Negative Feedback') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="text-uppercase"> {{ __('Target') }} <span class="float-right"> {{ __('200') }}</span></h6>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%">
                                    <span class="sr-only"> {{ __('15% Complete') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 4 AREAS -->
            <!-- VISIT AND SALES -->
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5 class=""> {{ __('Visit and Sales Statistics') }}</h5>
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
                                <div id="visitAndSales"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- VISIT AND SALES ENDS-->
            <!-- STATISTICS -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one gradient-purple-bliss">
                    <div class="widget-heading">
                        <h5 class="text-white light"> {{ __('Statistics') }}</h5>
                    </div>
                    <div class="widget-content">
                        <div class="p-2 text-center">
                            <a class="text-white font-medium-1 pointer"> {{ __('Month') }}</a>
                            <a class="btn bg-light-primary text-primary stronger mx-3 px-3"> {{ __('Week') }}</a>
                            <a class="text-white font-medium-1 pointer"> {{ __('Day') }}</a>
                        </div>
                        <div class="mt-3 text-center">
                            <div class="font-35 d-block">
                                <span class="text-white"> {{ __('$708.89') }}</span>
                                <i class="las la-arrow-up text-success"></i>
                            </div>
                            <span class="font-15 text-white"> {{ __('This Week +98.44') }}</span>
                        </div>
                        <div id="statistics" class=""></div>
                    </div>
                </div>
            </div>
            <!-- STATISTICS ENDS-->
            <!-- SOCIAL TRAFFIC -->
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-activity-four">
                    <div class="widget-heading">
                        <!-- <h5>Social Presence</h5>
                        <span class="w-numeric-title">Calculated in last 7 days</span> -->
                    </div>
                    <div class="widget-content">
                        <div class="text-center mb-4">
                            <div class="avatar-md mx-auto mb-4 rounded-circle bg-light-primary font-25 d-flex justify-content-center align-items-center">
                                <i class="lab la-facebook text-primary"></i>
                            </div>
                            <p class="font-16 text-muted mb-2"></p>
                            <h6>
                                <a class="text-dark"> {{ __('Facebook -') }} <span class="text-muted font-15"> {{ __('125 traffic') }}</span> </a>
                            </h6>
                            <p class="text-muted"> {{ __('The generated facebook therefore always free from posts, big images, or words etc.') }}</p>
                            <a class="text-primary font-16" href=""> {{ __('Learn more') }} <i class="las la-angle-right"></i></a>
                            <div class="mb-0 mt-4 row">
                                <div class="col-4">
                                    <div class="social-source text-center mt-3">
                                        <i class="lab la-facebook-f text-primary font-25"></i>
                                        <p class="text-muted mb-0"> {{ __('77.2K') }}</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="social-source text-center mt-3">
                                        <i class="lab la-twitter text-info font-25"></i>
                                        <p class="text-muted mb-0"> {{ __('44.2K') }}</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="social-source text-center mt-3">
                                        <i class="lab la-instagram text-danger font-25"></i>
                                        <p class="text-muted mb-0"> {{ __('25.1K') }}</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="social-source text-center mt-3">
                                        <i class="lab la-linkedin-in text-info font-25"></i>
                                        <p class="text-muted mb-0"> {{ __('10.2K') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SOCIAL TRAFFIC ENDS-->
            <!-- TOP COUNTRIES -->
            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-three widget-best-seller">
                    <div class="widget-heading mb-0"></div>
                    <div class="text-center">
                        <div class="mb-4">
                            <i class="las la-map-marked-alt font-45 text-danger"></i>
                        </div>
                        <h3> {{ __('11,789 Sales') }}</h3>
                        <p> {{ __('San Francisco (Top Country)') }}</p>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-centered table-nowrap mb-2">
                            <tbody>
                            <tr>
                                <td style="width: 30%;"><p class="mb-0"> {{ __('San Francisco') }}</p></td>
                                <td style="width: 25%;"><h5 class="mb-0"> {{ __('11,789') }}</h5></td>
                                <td>
                                    <div class="bg-transparent progress"><div class="progress-bar bg-primary" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" style="width: 94%;"></div></div>
                                </td>
                            </tr>
                            <tr>
                                <td><p class="mb-0"> {{ __('California') }}</p></td>
                                <td><h5 class="mb-0"> {{ __('10,952') }}</h5></td>
                                <td>
                                    <div class="bg-transparent progress"><div class="progress-bar bg-success" role="progressbar" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100" style="width: 82%;"></div></div>
                                </td>
                            </tr>
                            <tr>
                                <td><p class="mb-0"> {{__('Paris')}}</p></td>
                                <td><h5 class="mb-0"> {{__('10,075')}}</h5></td>
                                <td>
                                    <div class="bg-transparent progress"><div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div></div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- TOP COUNTRIES ENDS-->
            <!-- ADD PROJECT -->
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-three add-project">
                    <div class="iq-card dash-hover-gradient iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between border-0">
                            <div class="mb-0 font-size-32 text-dark">
                                <i class="las la-file-invoice-dollar font-45"></i>
                            </div>
                        </div>
                        <div class="iq-card-body mt-4">
                            <h3> {{ __('Sales') }}</h3>
                            <p class="mb-0"> {{ __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.') }}</p>
                        </div>
                        <div class="card-action font-size-14 mt-3">
                            <span class="float-right"> {{ __('Tommorow') }}</span>
                            <i class="ri-timer-2-line"></i> {{ __('2:30pm') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-three add-project">
                    <div class="iq-card dash-hover-gradient iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between border-0">
                            <div class="mb-0 font-size-32 text-dark">
                                <i class="las la-headset font-45"></i>
                            </div>
                        </div>
                        <div class="iq-card-body mt-4">
                            <h3> {{ __('Support') }}</h3>
                            <p class="mb-0"> {{ __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.') }}</p>
                        </div>
                        <div class="card-action font-size-14 mt-3">
                            <span class="float-right"> {{ __('Tommorow') }}</span>
                            <i class="ri-timer-2-line"></i> {{ __('2:30pm') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-three add-project">
                    <div class="iq-card dash-hover-gradient iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between border-0">
                            <div class="mb-0 font-size-32 text-dark">
                                <i class="las la-user-shield font-45"></i>
                            </div>
                        </div>
                        <div class="iq-card-body mt-4">
                            <h3> {{ __('Account') }}</h3>
                            <p class="mb-0"> {{ __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.') }}</p>
                        </div>
                        <div class="card-action font-size-14 mt-3">
                            <span class="float-right"> {{ __('Tommorow') }}</span>
                            <i class="ri-timer-2-line"></i> {{ __('2:30pm') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-three add-project p-0">
                    <div class="iq-card dash-hover-blank d-flex align-items-center iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body text-center">
                            <h5 class=""> {{ __('Add New Project') }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ADD PROJECT ENDS-->
            <!-- ONGOING TASK -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-three add-project">
                    <div class="widget-heading mb-0">
                        <h5> {{ __('Ongoing Task') }}</h5>
                        <span class="w-numeric-title"> {{ __('System Team') }}</span>
                    </div>
                    <div class="widget-content">
                        <ul class="task-lists m-0 p-0 mt-4">
                            <li class="d-flex mb-4 align-items-center">
                                <div class="user-img img-fluid"><img src="{{asset('assets/img/profile-1.jpg')}}" alt="story-img" class="rounded-circle avatar-sm"></div>
                                <div class="media-support-info ml-3">
                                    <h6 class="mb-0"> {{ __('Make New Home Page') }}</h6>
                                    <p class="mb-0 font-size-12"> {{ __('Feb 14, 2020') }}</p>
                                </div>
                            </li>
                            <li class="d-flex mb-4 align-items-center">
                                <div class="user-img img-fluid"><img src="{{asset('assets/img/profile-2.jpg')}}" alt="story-img" class="rounded-circle avatar-sm"></div>
                                <div class="media-support-info ml-3">
                                    <h6 class="mb-0"> {{ __('Redesign the Dashboard') }}</h6>
                                    <p class="mb-0 font-size-12">{{ __('Feb 10, 2020') }}</p>
                                </div>
                            </li>
                            <li class="d-flex mb-4 align-items-center">
                                <div class="user-img img-fluid"><img src="{{asset('assets/img/profile-3.jpg')}}" alt="story-img" class="rounded-circle avatar-sm"></div>
                                <div class="media-support-info ml-3">
                                    <h6 class="mb-0"> {{ __('Analysis New Product') }}</h6>
                                    <p class="mb-0 font-size-12"> {{ __('Feb 10, 2020') }}</p>
                                </div>
                            </li>
                            <li class="d-flex mb-4 align-items-center">
                                <div class="user-img img-fluid"><img src="{{asset('assets/img/profile-4.jpg')}}" alt="story-img" class="rounded-circle avatar-sm"></div>
                                <div class="media-support-info ml-3">
                                    <h6 class="mb-0"> {{ __('Update Dashboard 3') }}</h6>
                                    <p class="mb-0 font-size-12"> {{ __('Feb 12, 2020') }}</p>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="user-img img-fluid"><img src="{{asset('assets/img/profile-5.jpg')}}" alt="story-img" class="rounded-circle avatar-sm"></div>
                                <div class="media-support-info ml-3">
                                    <h6 class="mb-0"> {{ __('Solve Support Ticket') }}</h6>
                                    <p class="mb-0 font-size-12"> {{ __('Feb 14, 2020') }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- ONGOING TASK ENDS-->
            <!-- AMOUNT -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-six bg-light-danger p-4 mb-4 mt-4">
                    <div class="d-flex align-items-center">
                        <div class="col-md-9 p-0">
                            <p class="text-danger"> {{ __('Amount Due') }}</p>
                            <h2 class="text-danger"> {{ __('$5450.90') }} </h2>
                            <h6 class="text-danger mb-0"> {{ __('From WS Retail') }}</h6>
                            <p class="text-danger mb-0"> {{ __('Payment for next week') }} </p>
                        </div>
                        <div class="col-md-3 chart-icon text-right p-0">
                            <i class="las la-coins font-45 text-danger"></i>
                        </div>
                    </div>
                </div>
                <div class="widget widget-six bg-light-success p-4">
                    <div class="d-flex align-items-center">
                        <div class="col-md-9 p-0">
                            <p class="text-success-teal"> {{ __('Amount Recieved') }}</p>
                            <h2 class="text-success-teal"> {{ __('$2450.90') }} </h2>
                            <h6 class="text-success-teal mb-0"> {{ __('Milestone Completed') }} </h6>
                            <p class="text-success-teal mb-0"> {{ __('All payment recieved') }} </p>
                        </div>
                        <div class="col-md-3 chart-icon text-right p-0">
                            <i class="las la-hand-holding-usd font-45 text-success-teal"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- AMOUNT ENDS-->
            <!-- SCHEDULE -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-three">
                    <div class="widget-heading mb-0">
                        <h5> {{ __('Schedule') }}</h5>
                        <span class="w-numeric-title"> {{ __('Todays Schedule') }}</span>
                    </div>
                    <div class="widget-content">
                        <ul class="schedule-lists m-0 p-0 mt-4">
                            <li class="d-flex justify-content-between mb-4 align-items-center">
                                <div class="media-support-info">
                                    <h6 class="mb-2"> {{ __('Skype call with Ruby') }}</h6>
                                    <p class="mb-0"><span class="badge badge-primary"> {{ __('11:45 am') }}</span> {{ __('USA') }}</p>
                                </div>
                                <div class="d-flex">
                                    <a href="javascript:void(0);" class="bs-tooltip" title="" data-original-title="{{__('Jeremy Lawson')}}">
                                        <img src="{{asset('assets/img/profile-4.jpg')}}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar">
                                    </a>
                                    <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="" data-original-title="{{__('Dino Morea')}}">
                                        <img src="{{asset('assets/img/profile-5.jpg')}}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar">
                                    </a>
                                    <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="" data-original-title="{{__('Anna Ivanovic')}}">
                                        <img src="{{asset('assets/img/profile-6.jpg')}}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar">
                                    </a>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between mb-4 align-items-center">
                                <div class="media-support-info">
                                    <h6 class="mb-2"> {{ __('Meeting with Team') }}</h6>
                                    <p class="mb-0"><span class="badge badge-info"> {{ __('10:30 am') }}</span> {{ __('Canada') }}</p>
                                </div>
                                <div class="d-flex">
                                    <a href="javascript:void(0);" class="bs-tooltip" title="" data-original-title="{{__('Shin Chan')}}">
                                        <img src="{{asset('assets/img/profile-5.jpg')}}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar">
                                    </a>
                                    <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="" data-original-title="{{__('Nobi Kopilu')}}">
                                        <img src="{{asset('assets/img/profile-8.jpg')}}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar">
                                    </a>
                                    <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="" data-original-title="{{__('Shimi Williams')}}">
                                        <img src="{{asset('assets/img/profile-9.jpg')}}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar">
                                    </a>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between mb-4 align-items-center">
                                <div class="media-support-info">
                                    <h6 class="mb-2"> {{ __('Analysing with Client') }}</h6>
                                    <p class="mb-0"><span class="badge badge-warning text-white"> {{ __('02:00 pm') }}</span> {{ __('Africa') }}</p>
                                </div>
                                <div class="d-flex">
                                    <a href="javascript:void(0);" class="bs-tooltip" title="" data-original-title="{{__('Ding Dong')}}">
                                        <img src="{{asset('assets/img/profile-11.jpg')}}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar">
                                    </a>
                                    <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="" data-original-title="{{__('King Lomi')}}">
                                        <img src="{{asset('assets/img/profile-12.jpg')}}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar">
                                    </a>
                                    <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="" data-original-title="{{__('Rafa Matic')}}">
                                        <img src="{{asset('assets/img/profile-13.jpg')}}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar">
                                    </a>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between mb-4 align-items-center">
                                <div class="media-support-info">
                                    <h6 class="mb-2"> {{ __('Meeting with Team') }}</h6>
                                    <p class="mb-0"><span class="badge badge-success"> {{ __('03:30 am') }}</span> {{ __('Australia') }}</p>
                                </div>
                                <div class="d-flex">
                                    <a href="javascript:void(0);" class="bs-tooltip" title="" data-original-title="{{__('Joe Jonas')}}">
                                        <img src="{{asset('assets/img/profile-14.jpg')}}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar">
                                    </a>
                                    <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="" data-original-title="{{__('Viku Hami')}}">
                                        <img src="{{asset('assets/img/profile-15.jpg')}}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar">
                                    </a>
                                    <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="" data-original-title="{{__('Novac Federer')}}">
                                        <img src="{{asset('assets/img/profile-16.jpg')}}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar">
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--SCHEDULE ENDS-->
        </div>
        <div class="row layout-top-spacing">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 layout-spacing">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget dashboard-table bg-light-warning">
                            <div class="widget-content">
                                <a href="#" class="box">
                                    <div class="box-body">
                                                <span class="text-warning font-45">
                                                    <i class="lar la-chart-bar"></i>
                                                </span>
                                        <div class="text-warning stronger font-17 mb-2"> {{ __('Sales Stats') }}</div>
                                        <div class="text-dark"> {{ __('70% Up for 20') }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="widget dashboard-table">
                            <div class="widget-content">
                                <a href="#" class="box">
                                    <div class="box-body">
                                                <span class="text-primary font-45">
                                                    <i class="las la-shopping-basket"></i>
                                                </span>
                                        <div class="text-primary stronger font-17 mb-2"> {{ __('My Cart') }}</div>
                                        <div class="text-dark"> {{ __('Value $89,000') }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="widget dashboard-table bg-light-info">
                            <div class="widget-content">
                                <a href="#" class="box">
                                    <div class="box-body">
                                                <span class="text-info font-45">
                                                    <i class="las la-globe-americas"></i>
                                                </span>
                                        <div class="text-info stronger font-17 mb-2"> {{ __('Global') }}</div>
                                        <div class="text-dark"> {{ __('2.5M Users') }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 layout-spacing">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget widget-chart-two">
                            <div class="widget-heading">
                                <h5 class=""> {{ __('Trending Product') }}</h5>
                            </div>
                            <div class="widget-content mt-4">
                                <div class="table-responsive">
                                    <table class="table no-border mb-4">
                                        <thead>
                                        <tr>
                                            <th class="p-0" style="width: 50px"></th>
                                            <th class="p-0" style="min-width: 150px"></th>
                                            <th class="p-0" style="min-width: 160px"></th>
                                            <th class="p-0" style="min-width: 100px"></th>
                                            <th class="p-0" style="min-width: 40px"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="text-center">
                                                    <img src="assets/img/product-1.jpg" class="avatar-md object-cover" alt="">
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark strong"> {{ __('Vivamus consectetur') }}</a>
                                                <span class="text-muted d-block"> {{ __('Pharetra, Nulla , Nec') }}</span>
                                            </td>
                                            <td class="text-right">
                                                            <span class="text-muted strong">
                                                                {{ __('California') }}
                                                            </span>
                                            </td>
                                            <td class="text-right">
                                                <span class="badge badge-primary"> {{ __('Approved') }}</span>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="text-primary font-30 arrow-right-hover">
                                                    <i class="las la-arrow-right"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="text-center">
                                                    <img src="assets/img/product-2.jpg" class="avatar-md object-cover" alt="">
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark strong"> {{ __('Biuasht Hiopuiai') }}</a>
                                                <span class="text-muted d-block"> {{ __('Jio, Kilukta, Angola') }}</span>
                                            </td>
                                            <td class="text-right">
                                                            <span class="text-muted strong">
                                                                {{ __('Tokyo') }}
                                                            </span>
                                            </td>
                                            <td class="text-right">
                                                <span class="badge badge-warning"> {{ __('Pending') }}</span>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="text-primary font-30 arrow-right-hover">
                                                    <i class="las la-arrow-right"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="text-center">
                                                    <img src="assets/img/product-3.jpg" class="avatar-md object-cover" alt="">
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark strong"> {{ __('Diar Vogilo Product') }}</a>
                                                <span class="text-muted d-block"> {{ __('Dinajpur, Garia') }}</span>
                                            </td>
                                            <td class="text-right">
                                                            <span class="text-muted strong">
                                                                {{ __('Kolkata') }}
                                                            </span>
                                            </td>
                                            <td class="text-right">
                                                <span class="badge badge-danger"> {{ __('Failed') }}</span>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="text-primary font-30 arrow-right-hover">
                                                    <i class="las la-arrow-right"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="text-center">
                                                    <img src="assets/img/product-4.jpg" class="avatar-md object-cover" alt="">
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark strong"> {{ __('Las Hathplay') }}</a>
                                                <span class="text-muted d-block"> {{ __('Dakshindari, Bagan') }}</span>
                                            </td>
                                            <td class="text-right">
                                                            <span class="text-muted strong">
                                                                {{ __('Vigamox') }}
                                                            </span>
                                            </td>
                                            <td class="text-right">
                                                <span class="badge badge-info"> {{ __('Processing') }}</span>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="text-primary font-30 arrow-right-hover">
                                                    <i class="las la-arrow-right"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="text-center">
                                                    <img src="assets/img/product-5.jpg" class="avatar-md object-cover" alt="">
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark strong"> {{ __('Clarion Orpat') }}</a>
                                                <span class="text-muted d-block"> {{ __('New Garia') }}</span>
                                            </td>
                                            <td class="text-right">
                                                            <span class="text-muted strong">
                                                                 {{ __('Refresh') }}
                                                            </span>
                                            </td>
                                            <td class="text-right">
                                                <span class="badge badge-success-teal"> {{ __('Completed') }}</span>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="text-primary font-30 arrow-right-hover">
                                                    <i class="las la-arrow-right"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p class="font-13 text-center mt-0 mb-3 text-muted">
                                    <a class="text-primary" href="javascript:void(0);"> {{ __('Click here') }}</a> {{ __('to see the full list') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget widget-chart-two bg-secondary">
                            <i class="lab la-google-play top-right-big"></i>
                            <div class="widget-heading pt-4 mb-0">
                                <h5 class="text-white pt-5"> {{ __('Play Store') }}</h5>
                            </div>
                            <div class="widget-content mt-4 pr-3 pl-3">
                                <p class="py-15 font-15 text-white mb-4"> {{ __('Offering discounts for') }} <br> {{ __('online store and earn') }}<br> {{ __('loyalty Points') }}
                                </p>
                                <a href="#" class="btn btn-sm btn-light text-secondary"> {{ __('Join Now') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="widget widget-chart-two bg-danger">
                            <i class="lab la-adobe top-right-big"></i>
                            <div class="widget-heading pt-4 mb-0">
                                <h5 class="text-white pt-5"> {{ __('Adobe') }}</h5>
                            </div>
                            <div class="widget-content mt-4 pr-3 pl-3">
                                <p class="py-15 font-15 text-white mb-4"> {{ __('Offering discounts for') }} <br> {{ __('online store and earn') }}<br> {{ __('loyalty Points') }}
                                </p>
                                <a href="#" class="btn btn-sm btn text-danger"> {{ __('Pay Now') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5 class=""> {{ __('Notification') }}
                        </h5>
                        <ul class="tabs tab-pills">
                            <li>
                                <div class="dropdown  custom-dropdown-icon">
                                    <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span> {{ __('Options') }}</span> <i class="las la-angle-down"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                                        <a class="dropdown-item" data-value="Settings" href="javascript:void(0);"> {{ __('Today') }}</a>
                                        <a class="dropdown-item" data-value="Settings" href="javascript:void(0);"> {{ __('Yesterday') }}</a>
                                        <a class="dropdown-item" data-value="Mail" href="javascript:void(0);"> {{ __('Last Week') }}</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="widget-content">
                        <div class="pt-0">
                            <div class="media mb-3">
                                <div class="media-body">
                                    <p class="text-danger stronger font-13 mb-2"> {{ __('20-04-2020') }} <span class="text-dark light"> {{ __('10:10') }}</span></p>
                                    <h6 class="stronger"> {{ __('Updated Product') }}<span class="dot-notification"></span></h6>
                                    <span>{{ __('Quisque a consequat ante sit amet magna...') }}</span>
                                </div>
                            </div>
                            <div class="media mb-3">
                                <div class="media-body">
                                    <p class="text-danger stronger font-13 mb-2"> {{ __('12-10-2020') }}
                                        <span class="text-dark light"> {{ __('09:16') }}</span>
                                        <span class="badge badge-secondary font-12 ml-3"> {{ __('New') }}</span>
                                    </p>
                                    <h6 class="stronger"> {{ __('Tello just like your product') }}<span class="dot-notification"></span></h6>
                                    <span> {{ __('Quisque a consequat ante sit amet magna...') }} </span>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-body">
                                    <div class="d-flex mb-3">
                                        <div class="inner-img mr-2"><img class="img-thumbnail" src="assets/img/product-1.jpg" alt="Product-1" data-original-title="" title=""></div>
                                        <div class="inner-img ml-2"><img class="img-thumbnail" src="assets/img/product-5.jpg" alt="Product-2" data-original-title="" title=""></div>
                                    </div><span class="mt-3"> {{ __('Quisque a consequat ante sit amet magna...') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget widget-chart-one">
                            <div class="widget-heading">
                                <h5 class=""> {{ __('Appointment') }}</h5>
                            </div>
                            <div class="widget-content">
                                <table class="table table-bordernone table-responsive mb-0">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <img class="avatar-md rounded-circle" src="assets/img/profile-14.jpg" alt="Image description" />
                                            <div class="status-circle bg-primary"></div>
                                        </td>
                                        <td class="img-content-box">
                                            <span class="d-flex strong"> {{ __('Jennifer Winston, Califonia') }}</span><span class="text-muted font-12">  {{ __('Now') }}</span>
                                        </td>
                                        <td>
                                            <p class="m-0 text-primary font-13 strong"> {{ __('28 Sept') }}</p>
                                        </td>
                                        <td class="text-right">
                                            <div class="button btn btn-sm btn-outline-primary"> {{ __('Done') }}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img class="avatar-md rounded-circle" src="assets/img/profile-14.jpg" alt="Image description" />
                                            <div class="status-circle bg-primary"></div>
                                        </td>
                                        <td class="img-content-box">
                                            <span class="d-flex strong"> {{ __('Jennifer Winston, Califonia') }}</span><span class="text-muted font-12">{{ __('11:00') }}</span>
                                        </td>
                                        <td>
                                            <p class="m-0 text-primary font-13 strong"> {{ __('25 Sept') }}</p>
                                        </td>
                                        <td class="text-right">
                                            <div class="button btn btn-sm btn-outline-danger"> {{ __('Pendng') }}
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="widget widget-chart-one bg-gradient-secondary">
                            <div class="widget-heading">
                                <h5 class="text-white"> {{ __('Alert') }}</h5>
                                <div class="dot-right-icon"><i class="las la-ellipsis-h"></i></div>
                            </div>
                            <div class="widget-content">
                                <h6 class="text-white"> {{ __('10% off For drama lights Couslations...') }}</h6>
                                <span class="text-white font-13"> {{ __('Lorem Ipsum is simply dummy...It is a long established fact that a reader will be distracted by.Lorem Ipsum is simply dummy...It is a long established fact that a reader will be distracted by') }}  </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-three">
                    <div class="widget-heading">
                        <h5 class=""> {{ __('Total Customer Issues') }}</h5>
                        <span class="w-numeric-title"> {{ __('Year 2020') }}</span>
                    </div>
                    <div class="widget-content">
                        <div class="customer-issues">
                            <div class="customer-issue-list">
                                <div class="customer-issue-details">
                                    <div class="customer-issues-info">
                                        <h6 class="mb-2 font-12 text-success-teal"> {{ __('Resolved') }}</h6>
                                        <p class="issues-count mb-2 font-12 text-success-teal"> {{ __('69000') }}</p>
                                    </div>
                                    <div class="customer-issues-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-success position-relative" role="progressbar" style="width: 69%" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"><span class="success-teal"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-issue-list">
                                <div class="customer-issue-details">
                                    <div class="customer-issues-info">
                                        <h6 class="mb-2 font-12 text-secondary"> {{ __('In Progress') }}</h6>
                                        <p class="issues-count mb-2 font-12 text-secondary"> {{ __('2500') }}</p>
                                    </div>
                                    <div class="customer-issues-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-secondary  position-relative" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"><span class="secondary"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-issue-list">
                                <div class="customer-issue-details">
                                    <div class="customer-issues-info">
                                        <h6 class="mb-2 font-12 text-warning"> {{ __('Pending') }}</h6>
                                        <p class="issues-count mb-2 font-12 text-warning"> {{ __('8500') }}</p>
                                    </div>
                                    <div class="customer-issues-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-warning position-relative" role="progressbar" style="width: 11%" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100"><span class="warning"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-5">
                                <p class="mb-2 text-muted font-20"> {{ __('Total sources') }}</p>
                                <h4 class="stronger"> {{ __('$ 7652') }}</h4>
                                <div class="text-success stronger">
                                    <i class="las la-arrow-up font-17"></i> {{ __('2.2 %') }}
                                </div>
                            </div>
                            <p class="font-13 text-center mt-5 mb-1 text-muted">
                                <a class="text-primary" href="javascript:void(0);"> {{ __('Click here') }}</a> {{ __('to see the full list') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-three">
                    <div class="widget-heading">
                        <h5 class=""> {{ __('Activity') }}</h5>
                    </div>
                    <div class="widget-content">
                        <div class="">
                            <ol class="activity-feed">
                                <li class="feed-item">
                                    <div class="feed-item-list">
                                        <span class="date"> {{ __('Jan 22') }}</span>
                                        <span class="activity-text"> {{ __('Responded to need “Volunteer') }}
                                                    {{ __('Activities') }}”</span>
                                    </div>
                                </li>
                                <li class="feed-item">
                                    <div class="feed-item-list">
                                        <span class="date">{{ __('Jan 23') }}</span>
                                        <span class="activity-text"> {{ __('At vero eos et accusamus et iusto odio') }}
                                                    {{ __('dignissimos ducimus qui deleniti atque...') }}<a href="#" class="text-success-teal font-13"> {{ __('Widgets') }}Read more</a></span>
                                    </div>
                                </li>
                                <li class="feed-item">
                                    <div class="feed-item-list">
                                        <span class="date">{{ __('Jan 18') }}</span>
                                        <span class="activity-text"> {{ __('Completed to need this and must be do that in this') }}</span>
                                    </div>
                                </li>
                                <li class="feed-item">
                                    <div class="feed-item-list">
                                        <span class="date"> {{ __('Project Starts') }}</span>
                                    </div>
                                </li>
                            </ol>
                            <div class="text-center">
                                <a href="#" class="btn btn-sm btn-outline-primary"> {{ __('Load More') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-three">
                    <div class="widget-heading">
                        <h5 class=""> {{ __('Project Series') }}</h5>
                    </div>
                    <div class="widget-content">
                        <div id="projectSeries"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/apex/apexcharts.min.js') !!}
    {!! Html::script('plugins/flatpickr/flatpickr.js') !!}
    {!! Html::script('assets/js/dashboard/dashboard_1.js') !!}
    {!! Html::script('assets/js/dashboard/dashboard_2.js') !!}
    {!! Html::script('assets/js/dashboard/dashboard_3.js') !!}
    {!! Html::script('assets/js/dashboard/dashboard_4.js') !!}
    {!! Html::script('assets/js/dashboard/dashboard_5.js') !!}
    {!! Html::script('plugins/counter/jquery.countTo.js') !!}
    {!! Html::script('assets/js/components/custom-counter.js') !!}
@endpush

@push('custom-scripts')

@endpush
