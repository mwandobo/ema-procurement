@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/pages/pricing.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Pricing')}}</span></li>
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
        <div class="layout-top-spacing mb-5">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-4 bg-light-info p-4 rounded">
                        <img src="{{ url('assets/img/logo.png') }}" height="60px" class="mb-5"/>
                        <div class="plan-left">
                            <h5>{{__('for Every Business')}}x</h5>
                            <h5>{{__('for Every Business')}}</h5>
                            <p>{{__('Choose plan that works best for you. Feel free to connect with us if you face any kind of issue')}}</p>
                        </div>
                        <div class="small-testimonial mb-3">
                            <h6>{{__('"Amazing and totally satisfied with the service."')}}</h6>
                            <div class="media">
                                <img class="mr-3 avatar-sm rounded-circle" src="{{ url('assets/img/profile-28.jpg') }}">
                                <div class="media-body">
                                    <h5 class="mt-0 font-13 text-light strong mb-0">{{__('Anna Jonas')}}</h5>
                                    <p class="mt-0 font-12 text-light mb-0">{{__('Cras sit')}} </p>
                                </div>
                            </div>
                        </div>
                        <div class="media mt-1 happy-container">
                            <i class="lar la-laugh-beam font-45 mr-2 text-light"></i>
                            <div class="media-body mt-1">
                                <h5 class="mt-0 font-13 text-light strong mb-0">{{__('24000+')}}</h5>
                                <p class="mt-0 font-12 text-light mb-0">{{__('Happy Customers')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-md-8 p-4 rounded plan-right">
                        <h4 class="mt-3">{{__('Get started now. Cancel anytime')}}x</h4>
                        <p class="mb-4">{{__('Get started now. Cancel anytime')}}</p>
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                                <div class="single-plan">
                                    <i class="las la-motorcycle main-icon"></i>
                                    <h6 class="main-title">{{__('Starter')}}</h6>
                                    <p class="plan-price">
                                        <span class="dollar">$</span>10 <span class="plan-month">{{__('/ month')}}</span>
                                    </p>
                                    <div class="d-flex multi-option">
                                        <i class="lar la-check-circle"></i>
                                        <a>{{__('Industry Relevance')}}</a>
                                    </div>
                                    <div class="d-flex multi-option">
                                        <i class="lar la-check-circle"></i>
                                        <a>{{__('Developer API')}}</a>
                                    </div>
                                    <div class="d-flex multi-option">
                                        <i class="lar la-check-circle"></i>
                                        <a>{{__('Search Analytics')}}</a>
                                    </div>
                                    <div class="d-flex multi-option">
                                        <i class="lar la-check-circle"></i>
                                        <a>{{__('Cross Domain Search')}}</a>
                                    </div>
                                    <a class="btn btn-primary btn-sm mt-4 mb-2">
                                        {{__('Start Trial ')}}<i class="las la-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                                <div class="single-plan most-popular">
                                    <i class="las la-car-side main-icon"></i>
                                    <h6 class="main-title d-flex align-center">{{__('Business')}} <span class="badge badge-primary font-10"> {{__('Most Popular')}}</span></h6>
                                    <p class="plan-price">
                                        <span class="dollar">$</span>20 <span class="plan-month">{{__('/ month')}}</span>
                                    </p>
                                    <div class="d-flex multi-option">
                                        <i class="lar la-check-circle"></i>
                                        <a>{{__('All of Starter +')}}</a>
                                    </div>
                                    <div class="d-flex multi-option">
                                        <i class="lar la-check-circle"></i>
                                        <a>{{__('Custom Reporting')}}</a>
                                    </div>
                                    <div class="d-flex multi-option">
                                        <i class="lar la-check-circle"></i>
                                        <a>{{__('Content Updates')}}</a>
                                    </div>
                                    <div class="d-flex multi-option">
                                        <i class="lar la-check-circle"></i>
                                        <a>{{__('History Analytics')}}</a>
                                    </div>
                                    <a class="btn btn-primary btn-sm mt-4 mb-2">
                                        {{__('Start Trial ')}} <i class="las la-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                                <div class="single-plan">
                                    <i class="las la-truck-moving main-icon"></i>
                                    <h6 class="main-title">{{__('Premium')}}</h6>
                                    <p class="plan-price">
                                        <span class="dollar">$</span>40 <span class="plan-month">{{__('/ month')}}</span>
                                    </p>
                                    <div class="d-flex multi-option">
                                        <i class="lar la-check-circle"></i>
                                        <a>{{__('All of Business +')}}</a>
                                    </div>
                                    <div class="d-flex multi-option">
                                        <i class="lar la-check-circle"></i>
                                        <a>{{__('Service Levels')}}</a>
                                    </div>
                                    <div class="d-flex multi-option">
                                        <i class="lar la-check-circle"></i>
                                        <a>{{__('Security Controls')}}</a>
                                    </div>
                                    <div class="d-flex multi-option">
                                        <i class="lar la-check-circle"></i>
                                        <a>{{__('Account Manager')}}</a>
                                    </div>
                                    <a class="btn btn-primary btn-sm mt-4 mb-2">
                                        {{__('Start Trial ')}}<i class="las la-angle-right"></i>
                                    </a>
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
