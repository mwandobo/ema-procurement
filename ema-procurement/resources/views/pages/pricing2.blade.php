@extends('layout.master-auth')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/pages/pricing.css') !!}
@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="pricing-2">
        <div class="pricing-header-wrapper">
            <nav class="navbar navbar-expand">
                <div class="container">
                    <a class="navbar-brand" href="index-2.html">NEPTUNE</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">{{__('Dashboard')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" target="_blank" href="pages_contact_us.html">{{__('Contact Us')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="row mt-5">
                    <div class="col-md-12 align-self-center order-md-0 order-1 mt-4">
                        <h1 class="text-center mb-4">{{__('Pricing')}}</h1>
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <a class="mr-3 text-dark d-none d-md-block">{{__('Choose')}}</a>
                            <div class="switcher-container">
                            <span class="switcher switcher-1">
                                <input type="checkbox" id="switcherOne" onclick="myFunction()">
                                <label for="switcherOne"></label>
                            </span>
                                <div class="save-msg">{{__('Save 20%')}}</div>
                            </div>
                            <a class="ml-3 text-dark d-none d-md-block">{{__('Package')}}</a>
                        </div>
                        <div>&nbsp;</div>
                        <div class="row mt-4 mb-5">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <div class="single-plan">
                                            <i class="las la-motorcycle main-icon"></i>
                                            <h6 class="main-title">{{__('Starter Plan')}}</h6>
                                            <p class="plan-price">
                                                <span class="dollar">$</span>
                                                <span id="monthlyPlan">10</span>
                                                <span id="annuallPlan">8</span>
                                                <span class="plan-month">{{__('/ month')}}</span>
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
                                    <div class="col-md-4 mb-4">
                                        <div class="single-plan most-popular box">
                                            <div class="ribbon ribbon-top-right"><span>{{__('Most Popular')}}</span></div>
                                            <i class="las la-car-side main-icon"></i>
                                            <h6 class="main-title d-flex align-center">{{__('Business Plan')}}</h6>
                                            <p class="plan-price">
                                                <span class="dollar">$</span>
                                                <span id="monthlyPlanTwo">20</span>
                                                <span id="annuallPlanTwo">16</span>
                                                <span class="plan-month">{{__('/ month')}}</span>
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
                                    <div class="col-md-4 mb-4">
                                        <div class="single-plan">
                                            <i class="las la-truck-moving main-icon"></i>
                                            <h6 class="main-title">{{__('Premium Plan')}}</h6>
                                            <p class="plan-price">
                                                <span class="dollar">$</span>
                                                <span id="monthlyPlanThree">40</span>
                                                <span id="annuallPlanThree">32</span>
                                                <span class="plan-month">{{__('/ month')}}</span>
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
                                                <a>{{__('Hi')}}{{__('Security Controls')}}</a>
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
                            <div class="col-md-1"></div>
                        </div>
                        <p class="text-center mb-4 text-dark">{{__('Interested in special options? Contact us for')}} <strong class="text-primary">{{__('Enterprise')}}</strong></p>
                        <form class="pricing-input-group mb-5">
                            <i class="lar la-envelope pricing-input-icon"></i>
                            <input id="text" name="text" required class="pricing-input" type="email" value="" placeholder="{{__('Enter your email address')}}" />
                            <button type="submit" class="btn btn-primary" value="">{{__('Submit')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('assets/js/pages/pricing.js') !!}
@endpush

@push('custom-scripts')

@endpush
