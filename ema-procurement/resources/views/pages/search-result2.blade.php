@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/ui-elements/pagination.css') !!}
    {!! Html::style('assets/css/pages/search_result.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Search Result 2')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav d-flex align-center ml-auto ">
                <a class="btn btn-danger btn-sm" href="{{url('/pages/search-result')}}">{{__('View Other')}} <i class="las la-arrow-right"></i></a>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget">
                            <div class="widget-content widget-content-area">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group m-t-10">
                                            <input type="text" class="form-control" value="Prod">
                                            <span class="input-group-append">
                                                        <button type="button" class="btn btn-primary">{{__('Search')}}</button>
                                                    </span>
                                        </div>
                                        <div class="mt-4 d-flex align-items-center justify-content-between">
                                            <div>
                                                <h6 class="text-muted">{{__('Search Results for')}}</h6>
                                                <h6 class="font-20"><span class="stronger">{{__('Prod')}}</span></h6>
                                                <div class="d-flex align-items-center mt-3 flex-wrap">
                                                    <div class="result-single-option">
                                                        <p>{{__('Total Result')}}</p>
                                                        <p>{{__('1256')}}</p>
                                                    </div>
                                                    <div class="result-single-option">
                                                        <p>{{__('Total Pages')}}</p>
                                                        <p>{{__('102')}}</p>
                                                    </div>
                                                    <div class="result-single-option">
                                                        <p>{{__('Last Updated')}}</p>
                                                        <p>{{__('02.02.2020')}}</p>
                                                    </div>
                                                    <div class="result-single-option">
                                                        <a class="text-primary" href="#"><i class="las la-trash font-17"></i> {{__('Clear History')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="w-100 animated-underline-content mt-3">
                                            <ul class="nav nav-tabs  mb-3" id="lineTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="underline-product-tab" data-toggle="tab" href="#underline-product" role="tab" aria-controls="underline-product" aria-selected="true">{{__('Product')}}</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="underline-user-tab" data-toggle="tab" href="#underline-user" role="tab" aria-controls="underline-user" aria-selected="false">{{__('User')}}</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="lineTabContent-3">
                                                <!-- PRODUCT -->
                                                <div class="tab-pane fade active show" id="underline-product" role="tabpanel" aria-labelledby="underline-product-tab">
                                                    <div class="searchable-items card-box list">
                                                        <div class="items items-header-section">
                                                            <div class="item-content">
                                                                <div class="">
                                                                    <h4>{{__('Full Name')}}</h4>
                                                                </div>
                                                                <div class="product-price">
                                                                    <h4>{{__('Price')}}</h4>
                                                                </div>
                                                                <div class="product-rating">
                                                                    <h4 style="margin-left: 0;">{{__('Rating')}}</h4>
                                                                </div>
                                                                <div class="product-stock-status">
                                                                    <h4 style="margin-left: 3px;">{{__('Status')}}</h4>
                                                                </div>
                                                                <div class="product-stock-status">
                                                                    <h4 style="margin-left: 3px;">{{__('Options')}}</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="items">
                                                            <div class="item-content">
                                                                <div class="product-info">
                                                                    <img src="{{ url('assets/img/product-5.jpg') }}" alt="avatar">
                                                                    <div class="user-meta-info">
                                                                        <p class="product-name">{{__('Options')}}x</p>
                                                                        <p class="product-category">{{__('Category One')}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">
                                                                    <p class="product-category-addr"><span>{{__('Price: ')}}</span>{{__('$1001')}}</p>
                                                                </div>
                                                                <div class="product-rating">
                                                                    <p class="product-rating-inner"><span>{{__('Rating: ')}}</span>
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
                                                                    <p class="product-rating-inner"><span>{{__('Rating: s')}}</span>
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
                                                        <div class="items">
                                                            <div class="item-content">
                                                                <div class="product-info">
                                                                    <img src="{{ url('assets/img/product-5.jpg') }}" alt="avatar">
                                                                    <div class="user-meta-info">
                                                                        <p class="product-name">{{__('Product 5')}}</p>
                                                                        <p class="product-category">{{__('Category Five')}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">
                                                                    <p class="product-category-addr"><span>{{__('Price: ')}}</span>{{__('$7555')}}</p>
                                                                </div>
                                                                <div class="product-rating">
                                                                    <p class="product-rating-inner"><span>{{__('Rating: ')}}</span>
                                                                        <a class="d-flex align-center">
                                                                            5 <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
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
                                                                        <p class="product-name">{{__('Product 6')}}</p>
                                                                        <p class="product-category">{{__('Category Six')}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">
                                                                    <p class="product-category-addr"><span>{{__('Price: ')}}</span>{{__('$2655')}}</p>
                                                                </div>
                                                                <div class="product-rating">
                                                                    <p class="product-rating-inner"><span>{{__('Rating: ')}}</span>
                                                                        <a class="d-flex align-center">
                                                                            5 <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
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
                                                                <div class="product-info"><img src="{{ url('assets/img/product-4.jpg') }}" alt="avatar">
                                                                    <div class="user-meta-info">
                                                                        <p class="product-name">{{__('Product 7')}}</p>
                                                                        <p class="product-category">{{__('Catgeory Seven')}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">
                                                                    <p class="product-category-addr"><span>{{__('Price: ')}}</span>{{__('$8655')}}</p>
                                                                </div>
                                                                <div class="product-rating">
                                                                    <p class="product-rating-inner"><span>{{__('Rating: ')}}</span>
                                                                        <a class="d-flex align-center">
                                                                            3 <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
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
                                                <!-- USER -->
                                                <div class="tab-pane fade" id="underline-user" role="tabpanel" aria-labelledby="underline-user-tab">
                                                    <div class="searchable-items list card-box">
                                                        <div class="items items-header-section">
                                                            <div class="item-content">
                                                                <div class="">
                                                                    <h4>{{__('Full Name')}}</h4>
                                                                </div>
                                                                <div class="user-email">
                                                                    <h4>{{__('Email Id')}}</h4>
                                                                </div>
                                                                <div class="user-location">
                                                                    <h4 style="margin-left: 0;">{{__('Location')}}</h4>
                                                                </div>
                                                                <div class="user-phone">
                                                                    <h4 style="margin-left: 3px;">{{__('Contact')}}</h4>
                                                                </div>
                                                                <div class="user-phone">
                                                                    <h4 style="margin-left: 3px;">{{__('Options')}}</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="items">
                                                            <div class="item-content">
                                                                <div class="user-profile">
                                                                    <img src="{{ url('assets/img/profile-5.jpg') }}" alt="avatar">
                                                                    <div class="user-meta-info">
                                                                        <p class="user-name">{{__('Azeemo Shaan')}}</p>
                                                                        <p class="user-work">{{__('Web Developer')}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="user-email">
                                                                    <p class="usr-email-addr"><span><i class="lar la-envelope"></i></span>{{__('azimo@mail.com')}}</p>
                                                                </div>
                                                                <div class="user-location">
                                                                    <p class="usr-location"><span><i class="las la-map-marker"></i></span>{{__('California, USA')}}</p>
                                                                </div>
                                                                <div class="user-phone">
                                                                    <p class="usr-ph-no"><span><i class="las la-phone"></i></span>{{__('+1 (070) 123-4567')}}</p>
                                                                </div>
                                                                <div class="action-btn">
                                                                    <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                                                    <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="items">
                                                            <div class="item-content">
                                                                <div class="user-profile">
                                                                    <img src="{{ url('assets/img/profile-11.jpg') }}" alt="avatar">
                                                                    <div class="user-meta-info">
                                                                        <p class="user-name">{{__('Thara Darbar')}}</p>
                                                                        <p class="user-work">{{__('Web Developer')}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="user-email">
                                                                    <p class="usr-email-addr"><span><i class="lar la-envelope"></i></span>{{__('thara@mail.com')}}</p>
                                                                </div>
                                                                <div class="user-location">
                                                                    <p class="usr-location"><span><i class="las la-map-marker"></i></span>{{__('Paris, France')}}</p>
                                                                </div>
                                                                <div class="user-phone">
                                                                    <p class="usr-ph-no"><span><i class="las la-phone"></i></span>{{__('+1 (070) 123-4567')}}</p>
                                                                </div>
                                                                <div class="action-btn">
                                                                    <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                                                    <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="items">
                                                            <div class="item-content">
                                                                <div class="user-profile">
                                                                    <img src="{{ url('assets/img/profile-12.jpg') }}" alt="avatar">
                                                                    <div class="user-meta-info">
                                                                        <p class="user-name">{{__('Zera Ho Bayan')}}</p>
                                                                        <p class="user-work">{{__('UI Designer')}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="user-email">
                                                                    <p class="usr-email-addr"><span><i class="lar la-envelope"></i></span>{{__('zera@mail.com')}}</p>
                                                                </div>
                                                                <div class="user-location">
                                                                    <p class="usr-location"><span><i class="las la-map-marker"></i></span>{{__('Chicago, USA')}}</p>
                                                                </div>
                                                                <div class="user-phone">
                                                                    <p class="usr-ph-no"><span><i class="las la-phone"></i></span>{{__('+1 (070) 123-4567')}}</p>
                                                                </div>
                                                                <div class="action-btn">
                                                                    <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                                                    <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="items">
                                                            <div class="item-content">
                                                                <div class="user-profile">
                                                                    <img src="{{ url('assets/img/profile-14.jpg') }}" alt="avatar">
                                                                    <div class="user-meta-info">
                                                                        <p class="user-name">{{__('Badai Johnson')}}</p>
                                                                        <p class="user-work">{{__('Team Lead')}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="user-email">
                                                                    <p class="usr-email-addr"><span><i class="lar la-envelope"></i></span>{{__('badai@mail.com')}}</p>
                                                                </div>
                                                                <div class="user-location">
                                                                    <p class="usr-location"><span><i class="las la-map-marker"></i></span>{{__('Madrid, Spain')}}</p>
                                                                </div>
                                                                <div class="user-phone">
                                                                    <p class="usr-ph-no"><span><i class="las la-phone"></i></span>{{__('+1 (070) 123-4567')}}</p>
                                                                </div>
                                                                <div class="action-btn">
                                                                    <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                                                    <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="items">
                                                            <div class="item-content">
                                                                <div class="user-profile">
                                                                    <img src="{{ url('assets/img/profile-15.jpg') }}" alt="avatar">
                                                                    <div class="user-meta-info">
                                                                        <p class="user-name">{{__('Cory Anderson')}}</p>
                                                                        <p class="user-work">{{__('Sales')}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="user-email">
                                                                    <p class="usr-email-addr"><span><i class="lar la-envelope"></i></span>{{__('cory@mail.com')}}</p>
                                                                </div>
                                                                <div class="user-location">
                                                                    <p class="usr-location"><span><i class="las la-map-marker"></i></span>{{__('Liverpool, England')}}</p>
                                                                </div>
                                                                <div class="user-phone">
                                                                    <p class="usr-ph-no"><span><i class="las la-phone"></i></span>{{__('+1 (070) 123-4567')}}</p>
                                                                </div>
                                                                <div class="action-btn">
                                                                    <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                                                    <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="items">
                                                            <div class="item-content">
                                                                <div class="user-profile">
                                                                    <img src="{{ url('assets/img/profile-17.jpg') }}" alt="avatar">
                                                                    <div class="user-meta-info">
                                                                        <p class="user-name">{{__('Neil Pattinson')}}</p>
                                                                        <p class="user-work">{{__('Database Admin')}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="user-email">
                                                                    <p class="usr-email-addr"><span><i class="lar la-envelope"></i></span>{{__('neil@mail.com')}}</p>
                                                                </div>
                                                                <div class="user-location">
                                                                    <p class="usr-location"><span><i class="las la-map-marker"></i></span>{{__('New York, USA')}}</p>
                                                                </div>
                                                                <div class="user-phone">
                                                                    <p class="usr-ph-no"><span><i class="las la-phone"></i></span>{{__('+1 (070) 123-4567')}}</p>
                                                                </div>
                                                                <div class="action-btn">
                                                                    <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                                                    <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="items">
                                                            <div class="item-content">
                                                                <div class="user-profile"><img src="{{ url('assets/img/profile-29.jpg') }}" alt="avatar">
                                                                    <div class="user-meta-info">
                                                                        <p class="user-name">{{__('Jennie Lopez')}}</p>
                                                                        <p class="user-work">{{__('CSO')}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="user-email"><p class="usr-email-addr"><span><i class="lar la-envelope"></i></span>{{__('Jennie@mail.com')}}</p>
                                                                </div>
                                                                <div class="user-location"><p class="usr-location"><span><i class="las la-map-marker"></i></span>{{__('Sao Paolo, Brazil')}}</p>
                                                                </div>
                                                                <div class="user-phone"><p class="usr-ph-no"><span><i class="las la-phone"></i></span>{{__('+1 (070) 123-4567')}}</p>
                                                                </div>
                                                                <div class="action-btn">
                                                                    <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                                                    <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-4">
                                                <div class="pagination p13 text-center">
                                                    <ul class="mx-auto">
                                                        <a href="#" class="prev"><li>{{__('Prev')}}</li></a>
                                                        <a class="is-active" href="#"><li>1</li></a>
                                                        <a href="#"><li>2</li></a>
                                                        <a href="#"><li>3</li></a>
                                                        <a href="#" class="next"><li>{{__('Next')}}</li></a>
                                                    </ul>
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
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
@endpush

@push('custom-scripts')

@endpush
