@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/apex/apexcharts.css') !!}
    {!! Html::style('assets/css/dashboard/dashboard_1.css') !!}
    {!! Html::style('plugins/flatpickr/flatpickr.css') !!}
    {!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
    {!! Html::style('assets/css/elements/tooltip.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area  -->
    @can('view-dashboard')
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('Dashboards')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Dashboard 1')}}</span></li>
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
                    <a href="javascript: void(0);" data-original-title="{{__('Reload Data')}}"data-placement="bottom" class="btn btn-primary dash-btn btn-sm ml-2 bs-tooltip">
                        <i class="las la-sync"></i>
                    </a>
                </li>
                <li class="nav-item custom-dropdown-icon">
                    <a href="javascript: void(0);" data-original-title="{{__('Filter')}}" data-placement="bottom" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary dash-btn btn-sm ml-2 bs-tooltip">
                        <i class="las la-filter"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                        <a class="dropdown-item" data-value="Filter 1" href="javascript:void(0);"> {{__('Filter 1')}}</a>
                        <a class="dropdown-item" data-value="Filter 2" href="javascript:void(0);"> {{__('Filter 2')}}</a>
                        <a class="dropdown-item" data-value="Filter 3" href="javascript:void(0);"> {{__('Filter 3')}}</a>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    @endcan
    <!--  Navbar Ends / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            @can('view-dashboard')
            <div class="col-xl-2 col-lg-12 col-md-12 col-sm-12 layout-spacing">
                <div class="widget quick-category bg-blue p-3">
                    <div class="quick-category-head">
                                <span class="quick-category-icon text-blue bg-white">
                                    <i class="las la-file-alt"></i>
                                </span>
                        <div class="ml-2">
                            <h6>{{__('Invoice')}}</h6>
                            <p>{{__('about sales')}}</p>
                        </div>
                    </div>
                    <div class="quick-category-content">
                        <div class="single-qc-cte">
                            <div class="d-flex align-items-center mb-1">
                                <h3>15</h3>
                                <span>80%</span>
                            </div>
                            <p class="font-13 text-white mb-0">{{__('Remaining')}}</p>
                        </div>
                        <hr>
                        <div class="single-qc-cte">
                            <div class="d-flex align-items-center mb-1">
                                <h3>5</h3>
                                <span>20%</span>
                            </div>
                            <p class="font-13 text-white mb-0">{{__('Sent')}}</p>
                        </div>
                        <hr>
                        <div class="single-qc-cte">
                            <div class="d-flex align-items-center mb-1">
                                <h3>20</h3>
                                <span>100%</span>
                            </div>
                            <p class="font-13 text-white mb-0">{{__('Total Invoice')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5>{{__('Invoice')}}Network Information</h5>
                        <div class="ml-auto">
                            <i class="las la-shield-alt top-right-icon"></i>
                        </div>
                    </div>
                    <hr>
                    <div class="widget-content login-info">
                        <p>{{__('Last Login: ')}} <span>21 July 2021</span> at 3:07 PM</p>
                        <p>IPv4: <span>66.29.194.121</span> <img src="{{asset('assets/img/flag/usa-flag.png')}}" height="20px" width="20px" alt="flag"> USA</p>
                        <p>IPv6 : <span>2430:3060:90d:1e68:c945:d12f:6a5d:cc7a</span></p>
                        <p>ISP: <span>Spectrum</span></p>
                        <p>Chrome/9.1.2 (Macintosh, Intel Mac OS X)</p>
                        <a href="javascript:void(0)" class="text-blue strong pt-3">{{__('View Full History')}}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-12 col-md-12 col-sm-12 layout-spacing">
                <div class="widget quick-category bg-orange p-3">
                    <div class="quick-category-head">
                                <span class="quick-category-icon text-orange bg-white">
                                    <i class="las la-chart-area"></i>
                                </span>
                        <div class="ml-2">
                            <h6>{{__('Stats')}}</h6>
                            <p>{{__('about projects')}}</p>
                        </div>
                    </div>
                    <div class="quick-category-content">
                        <div class="single-qc-cte">
                            <div class="d-flex align-items-center mb-1">
                                <h3>5</h3>
                                <span>30%</span>
                            </div>
                            <p class="font-13 text-white mb-0">{{__('Ongoing')}}</p>
                        </div>
                        <hr>
                        <div class="single-qc-cte">
                            <div class="d-flex align-items-center mb-1">
                                <h3>1</h3>
                                <span>90%</span>
                            </div>
                            <p class="font-13 text-white mb-0">{{__('Almost Complete')}}</p>
                        </div>
                        <hr>
                        <div class="single-qc-cte">
                            <div class="d-flex align-items-center mb-1">
                                <h3>7</h3>
                                <span>100%</span>
                            </div>
                            <p class="font-13 text-white mb-0">{{__('Completed')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 layout-spacing">
                <div class="widget pb-1">
                    <div class="quick-category-head">
                                <span class="quick-category-icon text-white bg-info">
                                    <i class="las la-chart-bar"></i>
                                </span>
                        <div class="ml-2">
                            <h6 class="text-info">{{__('Project Completion')}}</h6>
                            <p class="text-info">{{__('Last 8 months')}}</p>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="tabs tab-content">
                            <div class="tabcontent">
                                <div id="taskStatistics"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5>{{__('Current Projects')}}</h5>
                    </div>
                    <hr>
                    <div class="widget-content login-info">
                        <div class="row">
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-2">
                                <div class="p-3 br-6 border border-light">
                                    <h6 class="text-info strong mb-1">
                                        {{__('Umbrella Corporation')}}
                                    </h6>
                                    <p class="text-muted font-12 mb-4">{{__('Website Development')}}</p>
                                    <div class="d-flex align-items-center mb-4 flex-wrap">
                                        <div class="d-flex align-items-center mr-4 mb-2">
                                            <span class="badge badge-success-teal font-11">5</span>
                                            <a class="ml-2 font-12">{{__('Done')}}</a>
                                        </div>
                                        <div class="d-flex align-items-center mr-4 mb-2">
                                            <span class="badge badge-warning font-11">3</span>
                                            <a class="ml-2 font-12">{{__('Progress')}}</a>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="badge badge-danger font-11">2</span>
                                            <a class="ml-2 font-12">{{__('Pending')}}</a>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mb-1">
                                        <div class="progress-bar bg-success-teal" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-2">
                                <div class="p-3 br-6 border border-light">
                                    <h6 class="text-info strong mb-1">
                                        {{__('Share Team')}}
                                    </h6>
                                    <p class="text-muted font-12 mb-4">{{__('CRM Management')}}</p>
                                    <div class="d-flex align-items-center mb-4 flex-wrap">
                                        <div class="d-flex align-items-center mr-4 mb-2">
                                            <span class="badge badge-success-teal font-11">10</span>
                                            <a class="ml-2 font-12">{{__('Done')}}</a>
                                        </div>
                                        <div class="d-flex align-items-center mr-4 mb-2">
                                            <span class="badge badge-warning font-11">10</span>
                                            <a class="ml-2 font-12">{{__('Progress')}}</a>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="badge badge-danger font-11">10</span>
                                            <a class="ml-2 font-12">{{__('Pending')}}</a>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mb-1">
                                        <div class="progress-bar bg-success-teal" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 34%" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-2">
                                <div class="p-3 br-6 border border-light">
                                    <h6 class="text-info strong mb-1">
                                        {{__('Urban Living')}}
                                    </h6>
                                    <p class="text-muted font-12 mb-4">{{__('App Development')}}</p>
                                    <div class="d-flex align-items-center mb-4 flex-wrap">
                                        <div class="d-flex align-items-center mr-4 mb-2">
                                            <span class="badge badge-success-teal font-11">6</span>
                                            <a class="ml-2 font-12">{{__('Done')}}</a>
                                        </div>
                                        <div class="d-flex align-items-center mr-4 mb-2">
                                            <span class="badge badge-warning font-11">2</span>
                                            <a class="ml-2 font-12">{{__('Progress')}}</a>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="badge badge-danger font-11">2</span>
                                            <a class="ml-2 font-12">{{__('Pending')}}</a>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mb-1">
                                        <div class="progress-bar bg-success-teal" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                            <img src="{{asset('assets/img/trophy.png')}}" class="best-seller-trophy"/>
                        </div>
                        <div class="col-md-6 text-right">
                            <img src="{{asset('assets/img/profile-1.jpg')}}" class="avatar-sm rounded-circle">
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
                    <a class="btn btn-block btn-primary mt-4" href="{{ url('/apps/task-list')}}"> {{ __('View full To Do App') }}</a>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-expense-summary dashboard-table">
                    <div class="widget-heading">
                        <h5 class=""> {{__('Expense Summary')}}</h5>
                    </div>
                    <div class="widget-content">
                        <div class="row">
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing pb-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th><div class="th-content"> {{__('Last Month Expense')}}</div></th>
                                            <th class="text-right"><div class="th-content"> {{__('Amount')}}</div></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td> {{__('Subscription')}}</td>
                                            <td class="text-right"> {{__('$99.00')}}</td>
                                        </tr>
                                        <tr>
                                            <td> {{__('Server Cost')}}</td>
                                            <td class="text-right"> {{__('$999.00')}}</td>
                                        </tr>
                                        <tr>
                                            <td> {{__('Hosting')}}</td>
                                            <td class="text-right"> {{__('$71.00')}}</td>
                                        </tr>
                                        <tr>
                                            <td> {{__('Electricity')}}</td>
                                            <td class="text-right"> {{__('$59.00')}}</td>
                                        </tr>
                                        <tr>
                                            <td> {{__('Office')}}</td>
                                            <td class="text-right"> {{__('$199.00')}}</td>
                                        </tr>
                                        <tr>
                                            <td> {{__('Misc')}}</td>
                                            <td class="text-right"> {{__('$599.00')}}</td>
                                        </tr>
                                        <tr>
                                            <td class="strong text-primary"> {{__('Total')}}</td>
                                            <td class="text-right strong text-primary"> {{__('$2026.00')}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="flex-grow-1 pl-2 pr-2">
                                    <span class="font-15"><small class="font-15 text-light-black strong mr-2"> {{__('$2,026')}}</small> {{__('Total Expense')}}</span>
                                    <span class="float-right"> {{__('65%')}}</span>
                                    <div class="progress progress-sm mt-2">
                                        <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="75" style="width:75%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing pb-0">
                                <div id="expenseSummary" class=""></div>
                                <p class="text-center"> {{__('Extra Expense')}}</p>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th><div class="th-content"> {{__('Expense')}}</div></th>
                                            <th class="text-right"><div class="th-content"> {{__('Amount')}}</div></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td> {{__('Office')}}</td>
                                            <td class="text-right"> {{__('$799.00')}}</td>
                                        </tr>
                                        <tr>
                                            <td> {{__('Misc')}}</td>
                                            <td class="text-right"> {{__('$3500.00')}}</td>
                                        </tr>
                                        <tr>
                                            <td class="strong text-danger"> {{__('Total')}}</td>
                                            <td class="text-right strong text-danger"> {{__('$4299.00')}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing pb-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th><div class="th-content"> {{__('This Month Expense')}}</div></th>
                                            <th class="text-right"><div class="th-content"> {{__('Amount')}}</div></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td> {{__('Subscription')}}</td>
                                            <td class="text-right"> {{__('$99.00')}}</td>
                                        </tr>
                                        <tr>
                                            <td> {{__('Server Cost')}}</td>
                                            <td class="text-right"> {{__('$999.00')}}</td>
                                        </tr>
                                        <tr>
                                            <td> {{__('Hosting')}}</td>
                                            <td class="text-right"> {{__('$71.00')}}</td>
                                        </tr>
                                        <tr>
                                            <td> {{__('Electricity')}}</td>
                                            <td class="text-right"> {{__('$59.00')}}</td>
                                        </tr>
                                        <tr>
                                            <td> {{__('Office')}}</td>
                                            <td class="text-right"> {{__('$999.00')}}</td>
                                        </tr>
                                        <tr>
                                            <td> {{__('Misc')}}</td>
                                            <td class="text-right"> {{__('$4099.00')}}</td>
                                        </tr>
                                        <tr>
                                            <td class="strong text-info"> {{__('Total')}}</td>
                                            <td class="text-right strong text-info"> {{__('$7526.00')}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="flex-grow-1 pl-2 pr-2">
                                    <span class="font-15"><small class="font-15 text-light-black strong mr-2"> {{__('$7,526')}}</small> {{__('Total Expense')}}</span>
                                    <span class="float-right"> {{__('75%')}}</span>
                                    <div class="progress progress-sm mt-2">
                                        <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" style="width:75%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget dashboard-table">
                    <div class="widget-heading">
                        <h5 class=""> {{__('Projects')}}</h5>
                    </div>
                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th><div class="th-content"> {{__('Name')}}</div></th>
                                    <th><div class="th-content"> {{__('Starts Date')}}</div></th>
                                    <th><div class="th-content"> {{__('Ends on')}}</div></th>
                                    <th><div class="th-content"> {{__('Team')}}</div></th>
                                    <th><div class="th-content"> {{__('Status')}}</div></th>
                                    <th><div class="th-content"> {{__('Client')}}</div></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td> {{__('Android App Development')}}</td>
                                    <td> {{__('Jun 20, 2018')}}</td>
                                    <td> {{__('Dec 21, 2020')}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip" title="{{__('Jeremy Lawson')}}"><img src="{{ url('assets/img/profile-4.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="{{__('Dino Morea')}}"><img src="{{ url('assets/img/profile-5.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="{{__('Anna Ivanovic')}}"><img src="{{ url('assets/img/profile-6.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <span class="avatar-sm rounded-circle extra-group-people ml-m-12 border-width-2px border-solid border-light"> {{__('+4')}}</span>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-info"> {{__('Ongoing')}} </span></td>
                                    <td> {{__('RN Groups')}}</td>
                                </tr>
                                <tr>
                                    <td> {{__('Angular Frontend')}}</td>
                                    <td> {{__('Aug 23, 2019')}}</td>
                                    <td> {{__('Jan 01, 2020')}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip" title="{{__('hi')}}Dean Jones"><img src="{{ url('assets/img/profile-1.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="{{__('hi')}}Smirti Mandhana"><img src="{{ url('assets/img/profile-2.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="{{__('hi')}}Kane Williamson"><img src="{{ url('assets/img/profile-3.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <span class="avatar-sm rounded-circle extra-group-people ml-m-12 border-width-2px border-solid border-light"> {{__('+2')}}</span>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-info"> {{__('Ongoing')}} </span></td>
                                    <td> {{__('Bose')}}</td>
                                </tr>
                                <tr>
                                    <td> {{__('Java Backend')}}</td>
                                    <td> {{__('Feb 20, 2018')}}</td>
                                    <td> {{__('Dec 21, 2019')}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip" title="{{__('John Doe')}}"><img src="{{ url('assets/img/profile-7.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="{{__('Katrina Kaif')}}"><img src="{{ url('assets/img/profile-8.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title=" {{__('Risha Sengupta')}}"><img src="{{ url('assets/img/profile-9.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <span class="avatar-sm rounded-circle extra-group-people ml-m-12 border-width-2px border-solid border-light"> {{__('+9')}}</span>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-success-teal"> {{__('Completed')}} </span></td>
                                    <td> {{__('Reliance')}}</td>
                                </tr>
                                <tr>
                                    <td> {{__('AWS Server Migration')}}</td>
                                    <td> {{__('Sep 20, 2018')}}</td>
                                    <td> {{__('Mar 21, 2020')}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip" title="{{__('Kiara Lawson')}}"><img src="{{ url('assets/img/profile-10.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="{{__('Kareena Morea')}}"><img src="{{ url('assets/img/profile-11.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="{{__('Eli Ivanovic')}}"><img src="{{ url('assets/img/profile-12.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-warning"> {{__('Pending')}} </span></td>
                                    <td> {{__('Amazon')}}</td>
                                </tr>
                                <tr>
                                    <td> {{__('Firbase Backup')}}</td>
                                    <td> {{__('Jan 20, 2020')}}</td>
                                    <td> {{__('Mar 21, 2020')}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip" title="{{__('Dennis Mennace')}}"><img src="{{ url('assets/img/profile-13.jpg') }}"  class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="{{__('Gini Khurima')}}"><img src="{{ url('assets/img/profile-14.jpg') }}"  class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-danger"> {{__('Cancelled')}} </span></td>
                                    <td> {{__('Corporation')}}</td>
                                </tr>
                                <tr>
                                    <td> {{__('iOS Swift')}}</td>
                                    <td> {{__('Jun 20, 2017')}}</td>
                                    <td> {{__('Dec 21, 2020')}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip" title="{{__('Jeremy Lawson')}}"><img src="{{ url('assets/img/profile-4.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="{{__('Dino Morea')}}"><img src="{{ url('assets/img/profile-5.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="{{__('Anna Ivanovic')}}"><img src="{{ url('assets/img/profile-6.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <span class="avatar-sm rounded-circle extra-group-people ml-m-12 border-width-2px border-solid border-light"> {{__('+5')}}</span>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-info"> {{__('Ongoing')}} </span></td>
                                    <td> {{__('Umbrella')}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
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
                <div class="widget dashboard-table">
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
            @endcan
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/apex/apexcharts.min.js') !!}
    {!! Html::script('plugins/flatpickr/flatpickr.js') !!}
    {!! Html::script('assets/js/dashboard/dashboard_1.js') !!}
@endpush

@push('custom-scripts')

@endpush
