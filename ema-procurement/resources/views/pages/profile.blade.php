@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/pages/profile.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Other Pages')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Profile')}}</span></li>
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
        <div class="row layout-spacing pt-4">
            <div class="col-xl-3 col-lg-4 col-md-4 mb-4">
                <div class="profile-left">
                    <div class="image-area">
                        <img class="user-image" src="{{ url('assets/img/profile-16.jpg') }}">
                        <a href="pages_profile_edit.html" class="follow-area">
                            <i class="las la-pen"></i>
                        </a>
                    </div>
                    <div class="info-area">
                        <h6>{{__('Sara Williamson')}}</h6>
                        <p>{{__('Sara Williamson')}}x</p>
                        <button>{{__('Follow')}}</button>
                    </div>
                    <div class="profile-numbers">
                        <div class="single-number">
                            <a>
                                <span class="number">42</span>
                                <span class="number-detail">{{__('Projects')}}</span>
                            </a>
                        </div>
                        <div class="single-number">
                            <a>
                                <span class="number">{{__('9.5K')}}</span>
                                <span class="number-detail">{{__('Products')}}</span>
                            </a>
                        </div>
                        <div class="single-number">
                            <a>
                                <span class="number">04</span>
                                <span class="number-detail">{{__('9.5K')}}x</span>
                            </a>
                        </div>
                    </div>
                    <div class="profile-tabs">
                        <div class="nav flex-column nav-pills mb-sm-0 mb-3 mx-auto" id="v-border-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-border-pills-home-tab" data-toggle="pill" href="#v-border-pills-home" role="tab" aria-controls="v-border-pills-home" aria-selected="true">{{__('Home')}}</a>
                            <a class="nav-link" id="v-border-pills-team-tab" data-toggle="pill" href="#v-border-pills-team" role="tab" aria-controls="v-border-pills-team" aria-selected="false">{{__('Team')}}</a>
                            <a class="nav-link" id="v-border-pills-work-tab" data-toggle="pill" href="#v-border-pills-work" role="tab" aria-controls="v-border-pills-work" aria-selected="false">{{__('Work in progress')}}</a>
                            <a class="nav-link" id="v-border-pills-products-tab" data-toggle="pill" href="#v-border-pills-products" role="tab" aria-controls="v-border-pills-products" aria-selected="false">{{__('Products')}}</a>
                            <a class="nav-link" id="v-border-pills-orders-tab" data-toggle="pill" href="#v-border-pills-orders" role="tab" aria-controls="v-border-pills-orders" aria-selected="false">{{__('Orders')}}</a>
                            <a class="nav-link" id="v-border-pills-settings-tab" data-toggle="pill" href="#v-border-pills-settings" role="tab" aria-controls="v-border-pills-settings" aria-selected="false">{{__('Settings')}}</a>
                        </div>
                    </div>
                    <div class="highlight-info">
                        <img src="{{ url('assets/img/company-1.jpg') }}" />
                        <div class="highlight-desc">
                            <p>{{__('WS Retailer')}}</p>
                            <p>{{__('Top seller of the month')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-8">
                <div class="cover-image-area">
                    <img src="{{ url('assets/img/1.jpg') }}" class="cover-img"/>
                </div>
                <div class="row tab-area-content">
                    <div class="col-xl-7 col-lg-12 col-md-12 mb-4">
                        <div class="tab-content" id="v-border-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-border-pills-home" role="tabpanel" aria-labelledby="v-border-pills-home-tab">
                                <div class="profile-shadow">
                                    <h6 class="font-15 mb-3">{{__('Collections')}}</h6>
                                    <div class="d-flex align-items-center overflow-auto">
                                        <div class="mr-3">
                                            <img src="{{ url('assets/img/product-1.jpg') }}" class="avatar-md img-thumbnail object-cover rounded-circle"/>
                                            <p class="font-10 strong text-center mb-0">{{__('Product')}}</p>
                                        </div>
                                        <div class="mr-3">
                                            <img src="{{ url('assets/img/product-2.jpg') }}" class="avatar-md img-thumbnail object-cover rounded-circle"/>
                                            <p class="font-10 strong text-center mb-0">{{__('Product')}}</p>
                                        </div>
                                        <div class="mr-3">
                                            <img src="{{ url('assets/img/product-3.jpg') }}" class="avatar-md img-thumbnail object-cover rounded-circle"/>
                                            <p class="font-10 strong text-center mb-0">{{__('Product')}}</p>
                                        </div>
                                        <div class="mr-3">
                                            <img src="{{ url('assets/img/product-4.jpg') }}" class="avatar-md img-thumbnail object-cover rounded-circle"/>
                                            <p class="font-10 strong text-center mb-0">{{__('Product')}}</p>
                                        </div>
                                        <div class="mr-3">
                                            <img src="{{ url('assets/img/product-5.jpg') }}" class="avatar-md img-thumbnail object-cover rounded-circle"/>
                                            <p class="font-10 strong text-center mb-0">{{__('Product')}}</p>
                                        </div>
                                        <div class="ml-3 d-none d-xl-block">
                                            <p class="font-30 strong text-center text-primary mb-0">
                                                <a class="pointer"><i class="las la-arrow-right"></i></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <blockquote class="blockquote mt-4">
                                    {{__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo')}}
                                </blockquote>
                                <div class="card component-card_5">
                                    <div class="type1">
                                        <i class="lar la-envelope"></i>
                                        <span>{{__('Mail')}}</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="user-info">
                                            <img src="{{ url('assets/img/profile-7.jpg') }}" class="card-img-top avatar-md" alt="...">
                                            <div class="media-body">
                                                <h5 class="card-user_name">{{__('Mail')}}x</h5>
                                                <p class="card-user_occupation">{{__('Manager')}}</p>
                                            </div>
                                        </div>
                                        <p class="card-text"> {{__('Maecenas nec mi vel lacus condimentum rhoncus dignissim egestas orci. Integer blandit porta placerat. Vestibulum in ultricies.')}} </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-border-pills-team" role="tabpanel" aria-labelledby="v-border-pills-team-tab">
                                <div class="media">
                                    <div class="profile-shadow w-100">
                                        <h6 class="font-15 mb-3">{{__('Team')}}</h6>
                                        <div class="single-team">
                                            <div class="d-flex">
                                                <div class="team-left">
                                                    <img src="{{ url('assets/img/lightbox-9.jpg') }}" />
                                                    <p>{{__('23 Members')}}</p>
                                                </div>
                                                <div class="team-right">
                                                    <h6>{{__('Team UI Alpha')}}</h6>
                                                    <p>{{__('FORMED IN 20th Apr\'20')}}</p>
                                                    <button class="primary">{{__('Connect')}}</button>
                                                    <ul>
                                                        <li class="text-success-teal"><strong>{{__('Completed')}}</strong> {{__(': 9 Projects')}}</li>
                                                        <li class="text-info"><strong>{{__('Connect')}}x</strong> {{__(': 2 Projects')}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-team">
                                            <div class="d-flex">
                                                <div class="team-left">
                                                    <img src="{{ url('assets/img/lightbox-3.jpg') }}" />
                                                    <p>{{__('25 Members')}}</p>
                                                </div>
                                                <div class="team-right">
                                                    <h6>{{__('Development Team (America)')}}</h6>
                                                    <p>{{__('FORMED IN 20th Apr\'20')}}</p>
                                                    <button class="primary">{{__('Connect')}}</button>
                                                    <ul>
                                                        <li class="text-success-teal"><strong>{{__('Completed')}}</strong> {{__(': 4 Projects')}}</li>
                                                        <li class="text-warning"><strong>{{__('Pipeline')}}</strong> {{__(': 3 Projects')}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-team">
                                            <div class="d-flex">
                                                <div class="team-left">
                                                    <img src="{{ url('assets/img/lightbox-1.jpg') }}" />
                                                    <p>{{__('7 Members')}}</p>
                                                </div>
                                                <div class="team-right">
                                                    <h6>{{__('Sales Team')}}</h6>
                                                    <p>{{__('FORMED IN 18th Jun\'20')}}</p>
                                                    <button class="primary">{{__('Connect')}}</button>
                                                    <ul>
                                                        <li class="text-success-teal"><strong>{{__('Completed')}}</strong> {{__(': 4 Projects')}}</li>
                                                        <li class="text-warning"><strong>{{__('Pipeline')}}</strong> {{__(': 3 Projects')}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-border-pills-work" role="tabpanel" aria-labelledby="v-border-pills-work-tab">
                                <div class="media">
                                    <div class="profile-shadow w-100">
                                        <h6 class="font-15 mb-3">{{__('Work in progress')}}</h6>
                                        <div class="progress-list">
                                            <div class="single-progress">
                                                <div class="progress-details">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6 class="mb-2 font-12 text-success-teal">{{__('Resolved')}}</h6>
                                                        <p class="mb-2 font-12 text-success-teal strong">{{__('69000')}}</p>
                                                    </div>
                                                    <div class="progress-stats">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-success position-relative" role="progressbar" style="width: 69%" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"><span class="success-teal"></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-progress">
                                                <div class="progress-details">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6 class="mb-2 font-12 text-secondary">{{__('In Progress')}}</h6>
                                                        <p class="mb-2 font-12 text-secondary strong">{{__('2500')}}</p>
                                                    </div>
                                                    <div class="progress-stats">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-secondary  position-relative" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"><span class="secondary"></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-progress">
                                                <div class="progress-details">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6 class="mb-2 font-12 text-warning">{{__('Pending')}}</h6>
                                                        <p class="mb-2 font-12 text-warning strong">{{__('8500')}}</p>
                                                    </div>
                                                    <div class="progress-issues-stats">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-warning position-relative" role="progressbar" style="width: 11%" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100"><span class="warning"></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-progress">
                                                <div class="progress-details">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6 class="mb-2 font-12 text-danger">{{__('Failed')}}</h6>
                                                        <p class="mb-2 font-12 text-danger strong">{{__('8500')}}</p>
                                                    </div>
                                                    <div class="progress-issues-stats">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-danger position-relative" role="progressbar" style="width: 11%" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100"><span class="danger"></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-border-pills-products" role="tabpanel" aria-labelledby="v-border-pills-products-tab">
                                <div class="searchable-items card-box grid">
                                    <div class="items">
                                        <div class="item-content">
                                            <div class="product-info">
                                                <img src="{{ url('assets/img/product-5.jpg') }}" alt="avatar">
                                                <div class="user-meta-info">
                                                    <p class="product-name">{{__('Product 1')}}</p>
                                                    <p class="product-category">{{__('Category One')}}</p>
                                                </div>
                                            </div>
                                            <div class="product-price">
                                                <p class="product-category-addr"><span>{{__('Price:')}} </span>{{__('$1001')}}</p>
                                            </div>
                                            <div class="product-rating">
                                                <p class="product-rating-inner"><span>{{__('Rating:')}} </span>
                                                    <a class="d-flex align-center">
                                                        5  <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="product-stock-status">
                                                <p class="product-stock-status-inner">
                                                    <small class="badge badge-success">{{__('In Stock')}}</small>
                                                </p>
                                            </div>
                                            <div class="action-btn">
                                                <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                                <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="item-content">
                                            <div class="product-info">
                                                <img src="{{ url('assets/img/product-1.jpg') }}" alt="avatar">
                                                <div class="user-meta-info">
                                                    <p class="product-name">{{__('Product 2')}}</p>
                                                    <p class="product-category">{{__('Category two')}}</p>
                                                </div>
                                            </div>
                                            <div class="product-price">
                                                <p class="product-category-addr"><span>{{__('Price: ')}}</span>{{__('$1975')}}</p>
                                            </div>
                                            <div class="product-rating">
                                                <p class="product-rating-inner"><span>{{__('Rating: ')}}</span>
                                                    <a class="d-flex align-center">
                                                        3  <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="product-stock-status">
                                                <p class="product-stock-status-inner">
                                                    <small class="badge badge-danger">{{__('No Stock')}}</small>
                                                </p>
                                            </div>
                                            <div class="action-btn">
                                                <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                                <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="item-content">
                                            <div class="product-info">
                                                <img src="{{ url('assets/img/product-2.jpg') }}" alt="avatar">
                                                <div class="user-meta-info">
                                                    <p class="product-name">{{__('Product 3')}}</p>
                                                    <p class="product-category">{{__('Category Three')}}</p>
                                                </div>
                                            </div>
                                            <div class="product-price">
                                                <p class="product-category-addr"><span>{{__('Price: ')}}</span>{{__('$2455')}}</p>
                                            </div>
                                            <div class="product-rating">
                                                <p class="product-rating-inner"><span>{{__('Rating: ')}}</span>
                                                    <a class="d-flex align-center">
                                                        4 <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="product-stock-status">
                                                <p class="product-stock-status-inner">
                                                    <small class="badge badge-danger">{{__('No Stock')}}</small>
                                                </p>
                                            </div>
                                            <div class="action-btn">
                                                <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                                <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="item-content">
                                            <div class="product-info">
                                                <img src="{{ url('assets/img/product-3.jpg') }}" alt="avatar">
                                                <div class="user-meta-info">
                                                    <p class="product-name">{{__('Product 4')}}</p>
                                                    <p class="product-category">{{__('Category Four')}}</p>
                                                </div>
                                            </div>
                                            <div class="product-price">
                                                <p class="product-category-addr"><span>{{__('Price: ')}}</span>{{__('$1655')}}</p>
                                            </div>
                                            <div class="product-rating">
                                                <p class="product-rating-inner"><span>{{__('Rating: ')}}</span>
                                                    <a class="d-flex align-center">
                                                        2 <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="product-stock-status">
                                                <p class="product-stock-status-inner">
                                                    <small class="badge badge-success">{{__('In Stock')}}</small>
                                                </p>
                                            </div>
                                            <div class="action-btn">
                                                <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                                <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-border-pills-orders" role="tabpanel" aria-labelledby="v-border-pills-orders-tab">
                                <div class="media">
                                    <div class="profile-shadow w-100">
                                        <h6 class="font-15 mb-3">{{__('Orders')}}</h6>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th><div class="th-content">{{__('Order ID')}}</div></th>
                                                    <th><div class="th-content">{{__('Status')}}</div></th>
                                                    <th><div class="th-content">{{__('Details')}}</div></th>
                                                    <th><div class="th-content">{{__('Action')}}</div></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        {{__('#SK898789')}}
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-success-teal light">{{__('Paid')}}</span>
                                                    </td>
                                                    <td>
                                                        <a href="apps_ecommerce_order_details.html" class="btn btn-sm btn-info">{{__('Details')}}</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-danger ml-2" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        #SK451245
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-warning light">{{__('Pending')}}</span>
                                                    </td>
                                                    <td>
                                                        <a href="apps_ecommerce_order_details.html" class="btn btn-sm btn-info">{{__('Details')}}</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-danger ml-2" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        #SK123475
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-danger light">{{__('Failed')}}</span>
                                                    </td>
                                                    <td>
                                                        <a href="apps_ecommerce_order_details.html" class="btn btn-sm btn-info">{{__('Details')}}</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-danger ml-2" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        {{__('#SK747101')}}
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-success-teal light">{{__('Success')}}</span>
                                                    </td>
                                                    <td>
                                                        <a href="apps_ecommerce_order_details.html" class="btn btn-sm btn-info">{{__('Details')}}</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-danger ml-2" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        #SK747101
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-success-teal light">{{__('Success')}}</span>
                                                    </td>
                                                    <td>
                                                        <a href="apps_ecommerce_order_details.html" class="btn btn-sm btn-info">{{__('Details')}}</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-danger ml-2" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        {{__('#SK147854')}}
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-warning light">{{__('Pending')}}</span>
                                                    </td>
                                                    <td>
                                                        <a href="apps_ecommerce_order_details.html" class="btn btn-sm btn-info">{{__('Details')}}</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-danger ml-2" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        {{__('#SK123630')}}
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-danger light">{{__('Failed')}}</span>
                                                    </td>
                                                    <td>
                                                        <a href="apps_ecommerce_order_details.html" class="btn btn-sm btn-info">{{__('Details')}}</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-danger ml-2" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        {{__('#SK124574')}}
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-success-teal light">{{__('Success')}}</span>
                                                    </td>
                                                    <td>
                                                        <a href="apps_ecommerce_order_details.html" class="btn btn-sm btn-info">{{__('Details')}}</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-danger ml-2" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        #SK963258
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-success-teal light">{{__('Success')}}</span>
                                                    </td>
                                                    <td>
                                                        <a href="apps_ecommerce_order_details.html" class="btn btn-sm btn-info">{{__('Details')}}</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-danger ml-2" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
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
                            <div class="tab-pane fade" id="v-border-pills-settings" role="tabpanel" aria-labelledby="v-border-pills-settings-tab">
                                <div class="media">
                                    <div class="profile-shadow w-100">
                                        <h6 class="font-15 mb-3">{{__('Settings')}}</h6>
                                        <div class="tab-pane rightbar-tab active" id="settings-tab" role="tabpanel">
                                            <h6 class="right-bar-heading p-2 px-3 mt-2 text-uppercase">{{__('Account Setting')}} </h6>
                                            <div class="px-2">
                                                <div class="switch-container mb-3 pl-2">
                                                    <label class="switch">
                                                        <input type="checkbox" checked="">
                                                        <span class="slider round primary-switch"></span>
                                                    </label>
                                                    <p class="ml-3 text-dark">{{__('Sync Contacts')}}</p>
                                                </div>
                                                <div class="switch-container mb-3 pl-2">
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="slider round primary-switch"></span>
                                                    </label>
                                                    <p class="ml-3 text-dark">{{__('Auto Update')}}</p>
                                                </div>
                                                <div class="switch-container mb-3 pl-2">
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="slider round primary-switch"></span>
                                                    </label>
                                                    <p class="ml-3 text-dark">{{__('Recieve Notifications')}}</p>
                                                </div>
                                            </div>
                                            <h6 class="right-bar-heading p-2 px-3 mt-2 text-uppercase">{{__('Mail Setting')}} </h6>
                                            <div class="px-2">
                                                <div class="switch-container mb-3 pl-2">
                                                    <label class="switch">
                                                        <input type="checkbox" checked="">
                                                        <span class="slider round primary-switch"></span>
                                                    </label>
                                                    <p class="ml-3 text-dark">{{__('Mail Auto Responder')}}</p>
                                                </div>
                                                <div class="switch-container mb-3 pl-2">
                                                    <label class="switch">
                                                        <input type="checkbox" checked="">
                                                        <span class="slider round primary-switch"></span>
                                                    </label>
                                                    <p class="ml-3 text-dark">{{__('Auto Trash Delete')}}</p>
                                                </div>
                                                <div class="switch-container mb-3 pl-2">
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="slider round primary-switch"></span>
                                                    </label>
                                                    <p class="ml-3 text-dark">{{__('Custom Signature')}}</p>
                                                </div>
                                            </div>
                                            <h6 class="right-bar-heading p-2 px-3 mt-2 text-uppercase">{{__('Chat Setting')}} </h6>
                                            <div class="px-2">
                                                <div class="switch-container mb-3 pl-2">
                                                    <label class="switch">
                                                        <input type="checkbox" checked="">
                                                        <span class="slider round primary-switch"></span>
                                                    </label>
                                                    <p class="ml-3 text-dark">{{__('Show Online')}}</p>
                                                </div>
                                                <div class="switch-container mb-3 pl-2">
                                                    <label class="switch">
                                                        <input type="checkbox" checked="">
                                                        <span class="slider round primary-switch"></span>
                                                    </label>
                                                    <p class="ml-3 text-dark">{{__('Chat Notifications')}}</p>
                                                </div>
                                            </div>
                                            <div class="px-2 text-center pt-4">
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger">
                                                    {{__('Set Default')}}
                                                </a>
                                                <button class="ripple-button ripple-button-primary btn-sm" type="button">
                                                    <div class="ripple-ripple js-ripple">
                                                        <span class="ripple-ripple__circle"></span>
                                                    </div>
                                                    {{__('Ripple Effect')}}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-12 col-md-12">
                        <div class="profile-info">
                            <h5>{{__('General Information')}}</h5>
                            <div class="single-profile-info">
                                <h6>{{__('Bio')}}</h6>
                                <p>{{__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.')}}</p>
                            </div>
                            <div class="single-profile-info">
                                <h6>{{__('Website')}}</h6>
                                <p><a href="https://www.demowebsite.com" target="_blank">{{__('www.demowebsite.com')}}</a></p>
                            </div>
                            <div class="single-profile-info">
                                <h6>{{__('Email')}}</h6>
                                <p><a href="mailto:info@demowebsite.com">{{__('info@demowebsite.com')}}</a></p>
                            </div>
                            <div class="single-profile-info">
                                <h6>{{__('Contact Us')}}</h6>
                                <p>{{__('(+1) 1024 2014')}}</p>
                            </div>
                            <div class="single-profile-info">
                                <h6>{{__('Skills')}}</h6>
                                <span class="badge badge-primary"> {{__('UI/UX')}} </span>
                                <span class="badge badge-info"> {{__('Photoshop')}} </span>
                                <span class="badge badge-secondary"> {{__('Angular')}} </span>
                                <span class="badge outline-badge-danger"> {{__('Java')}} </span>
                            </div>
                            <div class="single-profile-info social">
                                <h6>{{__('Social')}}</h6>
                                <a href="https://www.facebook.com" target="_blank"><i class="lab la-facebook text-primary"></i></a>
                                <a href="https://www.twitter.com" target="_blank"><i class="lab la-twitter text-info"></i></a>
                                <a href="https://www.linkedin.com" target="_blank"><i class="lab la-linkedin text-primary"></i></a>
                                <a href="https://www.instagram.com" target="_blank"><i class="lab la-instagram text-danger"></i></a>
                                <a href="https://www.github.com" target="_blank"><i class="lab la-github text-black"></i></a>
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
@endpush

@push('custom-scripts')

@endpush
