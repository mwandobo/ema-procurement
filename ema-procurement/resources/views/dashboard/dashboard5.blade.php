@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/apex/apexcharts.css') !!}
    {!! Html::style('assets/css/dashboard/dashboard_5.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Dashboard 5')}}</span></li>
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
                                                    <img src="{{asset('assets/img/product-1.jpg')}}" class="avatar-md object-cover" alt="">
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
                                                    <img src="{{asset('assets/img/product-2.jpg')}}" class="avatar-md object-cover" alt="">
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
                                                    <img src="{{asset('assets/img/product-3.jpg')}}" class="avatar-md object-cover" alt="">
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
                                                    <img src="{{asset('assets/img/product-4.jpg')}}" class="avatar-md object-cover" alt="">
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
                                                    <img src="{{asset('assets/img/product-5.jpg')}}" class="avatar-md object-cover" alt="">
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
                        <div class="widget widget-chart-two bg-primary">
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
                                        <div class="inner-img mr-2"><img class="img-thumbnail" src="{{asset('assets/img/product-1.jpg')}}" alt="Product-1" data-original-title="" title=""></div>
                                        <div class="inner-img ml-2"><img class="img-thumbnail" src="{{asset('assets/img/product-5.jpg')}}" alt="Product-2" data-original-title="" title=""></div>
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
                                            <img class="avatar-md rounded-circle" src="{{asset('assets/img/profile-14.jpg')}}" alt="Image description" />
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
                                            <img class="avatar-md rounded-circle" src="{{asset('assets/img/profile-14.jpg')}}" alt="Image description" />
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
    {!! Html::script('assets/js/dashboard/dashboard_5.js') !!}
@endpush

@push('custom-scripts')

@endpush
