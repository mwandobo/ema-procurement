@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/apex/apexcharts.css') !!}
    {!! Html::style('assets/css/dashboard/dashboard_3.css') !!}
    {!! Html::style('plugins/flatpickr/flatpickr.css') !!}
    {!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
    {!! Html::style('assets/css/elements/tooltip.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Dashboards')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Dashboard 3')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav d-flex align-center ml-auto right-side-filter">
                <li class="nav-item more-dropdown">
                    <div class="input-group input-group-sm">
                        <input id="rangeCalendarFlatpickr" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Date')}}">
                        <div class="input-group-append">
                                    <span class="input-group-text bg-primary border-primary" id="basic-addon2">
                                        <i class="lar la-calendar"></i>
                                    </span>
                        </div>
                    </div>
                </li>
                <li class="nav-item more-dropdown">
                    <a href="javascript: void(0);" data-original-title="{{__('Reload Data')}}" data-placement="bottom" class="btn btn-primary dash-btn btn-sm ml-2 bs-tooltip">
                        <i class="las la-sync"></i>
                    </a>
                </li>
                <li class="nav-item custom-dropdown-icon">
                    <a href="javascript: void(0);" data-original-title="{{__('Filter')}}" data-placement="bottom" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary dash-btn btn-sm ml-2 bs-tooltip">
                        <i class="las la-filter"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                        <a class="dropdown-item" data-value="Filter 1" href="javascript:void(0);">{{__('Filter 1')}}</a>
                        <a class="dropdown-item" data-value="Filter 2" href="javascript:void(0);">{{__('Filter 2')}}</a>
                        <a class="dropdown-item" data-value="Filter 3" href="javascript:void(0);">{{__('Filter 3')}}</a>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <!-- 4 AREAS -->
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
                <div class="widget 4-areas">
                    <div class="f-100">
                        <div class="card-box">
                            <i class="las la-info-circle text-muted float-right bs-tooltip" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
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
                            <i class="las la-info-circle text-muted float-right bs-tooltip" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
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
                            <i class="las la-info-circle text-muted float-right bs-tooltip" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
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
                            <i class="las la-info-circle text-muted float-right bs-tooltip" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
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
                                <img class="d-block w-100" src="{{asset('assets/img/1.jpg')}}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('assets/img/2.jpg')}}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('assets/img/3.jpg')}}" alt="Third slide">
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
                        <img src="{{asset('assets/img/profile-21.jpg')}}" alt="Avatar" class="img-thumbnail rounded-circle mb-3">
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
                            <img src="{{asset('assets/img/apple-desktop.png')}}" alt="apple" height="150">
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
                            <img src="{{asset('assets/img/apple-phone.png')}}" alt="apple" height="150">
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
                            <img src="{{asset('assets/img/apple-watch.png')}}" alt="apple" height="150">
                        </div>
                        <div class="card-body pb-0">
                            <h4 class="card-title text-danger"> {{ __('Hot Trending') }}</h4>
                            <p class="m-0 text-danger"> {{ __('Latest technology with heart rate sensor and speedometer.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 3 PRODUCT ENDS -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget dashboard-table">
                    <div class="widget-heading">
                        <h5 class=""> {{ __('Top Selling Products') }}</h5>
                        <div class="dropdown custom-dropdown-icon">
                            <a class="font-17 mr-3 pointer"><i class="las la-sync-alt"></i></a>
                            <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span> {{ __('Options') }}</span> <i class="las la-angle-down"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown" style="will-change: transform;">
                                <a class="dropdown-item" data-value="Mail" href="javascript:void(0);"> {{ __('Mail') }}</a>
                                <a class="dropdown-item" data-value="Print" href="javascript:void(0);"> {{ __('Print') }}</a>
                                <a class="dropdown-item" data-value="Download" href="javascript:void(0);"> {{ __('Download') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th><div class="th-content"> {{ __('Product Info') }}</div></th>
                                    <th><div class="th-content"> {{ __('Price') }}</div></th>
                                    <th><div class="th-content"> {{ __('Quantity') }}</div></th>
                                    <th><div class="th-content"> {{ __('Amount') }}</div></th>
                                    <th><div class="th-content"> {{ __('User Rating') }}</div></th>
                                    <th><div class="th-content"> {{ __('Action') }}</div></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        {{ __('Zen 2389 Mobile') }}
                                    </td>
                                    <td> {{ __('$999') }}</td>
                                    <td> {{ __('58') }}</td>
                                    <td> {{ __('$12,989') }}</td>
                                    <td>
                                        <div class="d-flex align-center">
                                            {{ __('5') }}  <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-muted" title="{{ __('View') }}"><i class="las la-eye"></i></a>
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary ml-2" title="{{ __('Edit') }}"><i class="las la-pen"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> {{ __('Lenovo G-30 Laptop') }}</td>
                                    <td> {{ __('$1999') }}</td>
                                    <td> {{ __('58') }}</td>
                                    <td> {{ __('$102,989') }}</td>
                                    <td>
                                        <div class="d-flex align-center">
                                            {{ __('5') }}  <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-muted" title="{{ __('View') }}"><i class="las la-eye"></i></a>
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary ml-2" title="{{ __('Edit') }}"><i class="las la-pen"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> {{ __('Half Sleeve Shirt') }}</td>
                                    <td> {{ __('$499') }}</td>
                                    <td> {{ __('50') }}</td>
                                    <td> {{ __('$25,989') }}</td>
                                    <td>
                                        <div class="d-flex align-center">
                                            {{ __('4') }}  <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-muted" title="{{ __('View') }}"><i class="las la-eye"></i></a>
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary ml-2" title="{{ __('Edit') }}"><i class="las la-pen"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> {{ __('Leather Shoes') }}</td>
                                    <td> {{ __('$899') }}</td>
                                    <td> {{ __('80') }}</td>
                                    <td> {{ __('$95,989') }}</td>
                                    <td>
                                        <div class="d-flex align-center">
                                            {{ __('5') }}  <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-muted" title="{{ __('View') }}"><i class="las la-eye"></i></a>
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary ml-2" title="{{ __('Edit') }}"><i class="las la-pen"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-bottom border-light">
                                    <td> {{ __('Lightweight Jacket') }}</td>
                                    <td> {{ __('$20') }}</td>
                                    <td> {{ __('184') }}</td>
                                    <td> {{ __('$5,989') }}</td>
                                    <td>
                                        <div class="d-flex align-center">
                                            {{ __('5') }}  <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-muted" title="{{ __('View') }}"><i class="las la-eye"></i></a>
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary ml-2" title="{{ __('Edit') }}"><i class="las la-pen"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <p class="font-13 text-center mt-4 mb-1 text-muted">
                                <a class="text-primary" href="javascript:void(0);">{{ __('Click here') }}</a> {{ __('to see the full product list') }}
                            </p>
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
    {!! Html::script('plugins/apex/apexcharts.min.js') !!}
    {!! Html::script('plugins/flatpickr/flatpickr.js') !!}
    {!! Html::script('assets/js/dashboard/dashboard_3.js') !!}
    {!! Html::script('plugins/counter/jquery.countTo.js') !!}
    {!! Html::script('assets/js/components/custom-counter.js') !!}
@endpush

@push('custom-scripts')

@endpush
