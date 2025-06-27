@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/basic-ui/custom_counter.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Basic Ui')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Counter')}}</span></li>
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
        <div class="layout-top-spacing mb-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing">
                            <div class="col-xl-6 col-lg-12 col-md-12 mb-4">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Advanced Custom Counter')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area pt-4 pb-5">
                                        <section class="advanced-custom-counters pt-5 pb-4">
                                            <h3 class="advanced-custom-counter" aria-label="$65.3M">{{__('$65.3M')}}</h3>
                                            <h3 class="advanced-custom-counter" aria-label="872K">{{__('872K')}}</h3>
                                            <h3 class="advanced-custom-counter" aria-label="$491">{{__('$491')}}</h3>
                                            <!-- <h3 class="advanced-custom-counter" aria-label="9875">9875</h3> -->
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Basic Counter Icon Vertical')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <section class="basic-counter">
                                            <div class="container">
                                                <div class="row justify-content-center text-center">
                                                    <div class="col-md-4">
                                                        <i class="las la-grin-beam font-20 mr-1 text-warning"></i>
                                                        <div class="basic-counter-container bg-gradient-warning">
                                                            <span id="count7" class="font-20 text-white strong"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <i class="las la-mug-hot font-20 mr-1 text-primary"></i>
                                                        <div class="basic-counter-container bg-gradient-primary">
                                                            <span id="count8" class="font-20 text-white strong"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <i class="las la-envelope-open font-20 mr-1 text-dark"></i>
                                                        <div class="basic-counter-container bg-gradient-dark">
                                                            <span id="count9" class="font-20 text-white strong"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 mb-4">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Basic Counter')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <section class="basic-counter">
                                            <div class="container">
                                                <div class="row justify-content-center text-center">
                                                    <div class="col-md-4">
                                                        <div class="basic-counter-container">
                                                            <span id="count1" class="font-20 text-primary strong"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="basic-counter-container">
                                                            <span id="count2" class="font-20 text-primary strong"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="basic-counter-container">
                                                            <span id="count3" class="font-20 text-primary strong"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Basic Counter Icon Horizontal')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <section class="basic-counter">
                                            <div class="container">
                                                <div class="row justify-content-center text-center">
                                                    <div class="col-md-4 d-flex align-items-center">
                                                        <i class="las la-grin-beam font-20 mr-1 text-danger"></i>
                                                        <div class="basic-counter-container bg-gradient-danger">
                                                            <span id="count4" class="font-20 text-white strong"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 d-flex align-items-center">
                                                        <i class="las la-mug-hot font-20 mr-1 text-success-teal"></i>
                                                        <div class="basic-counter-container bg-gradient-success">
                                                            <span id="count5" class="font-20 text-white strong"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 d-flex align-items-center">
                                                        <i class="las la-envelope-open font-20 mr-1 text-info"></i>
                                                        <div class="basic-counter-container bg-gradient-info">
                                                            <span id="count6" class="font-20 text-white strong"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
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
    {!! Html::script('assets/js/basicui/counter.js') !!}
@endpush

@push('custom-scripts')

@endpush
