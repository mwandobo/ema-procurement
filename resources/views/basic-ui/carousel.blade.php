@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/basic-ui/custom-carousel.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('Basic Ui')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Carousel')}}</span></li>
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
                            <div class="col-lg-6 col-md-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4> {{__('Simple Carousel')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div id="slidesOnly" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img class="d-block w-100" src="{{ url('assets/img/1.jpg') }}" alt="First slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100" src="{{ url('assets/img/2.jpg') }}" alt="Second slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100" src="{{ url('assets/img/3.jpg') }}" alt="Third slide">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Carousel with controls')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div id="controls" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img class="d-block w-100" src="{{ url('assets/img/3.jpg') }}" alt="First slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100"src="{{ url('assets/img/2.jpg') }}" alt="Second slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100" src="{{ url('assets/img/1.jpg') }}" alt="Third slide">
                                                        </div>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#controls" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">{{__('Previous')}}</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#controls" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">{{__('Next')}}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Carousel with indicators')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div id="indicators" class="carousel slide" data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <li data-target="#indicators" data-slide-to="0" class="active m"></li>
                                                        <li data-target="#indicators" data-slide-to="1"></li>
                                                        <li data-target="#indicators" data-slide-to="2"></li>
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img class="d-block w-100" src="{{ url('assets/img/3.jpg') }}" alt="First slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100" src="{{ url('assets/img/1.jpg') }}" alt="Second slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100" src="{{ url('assets/img/2.jpg') }}" alt="Third slide">
                                                        </div>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#indicators" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">{{__('Previous')}}</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#indicators" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">{{__('Next')}}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Carousel with captions')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div id="captions" class="carousel slide" data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <li data-target="#captions" data-slide-to="0" class="active"></li>
                                                        <li data-target="#captions" data-slide-to="1"></li>
                                                        <li data-target="#captions" data-slide-to="2"></li>
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img class="d-block w-100" src="{{ url('assets/img/1.jpg') }}" alt="First slide">
                                                            <div class="carousel-caption d-none d-sm-block">
                                                                <h3>{{__('First label')}}</h3>
                                                                <h5>{{__('Nulla vitae elit libero, a pharetra augue mollis.')}}</h5>
                                                            </div>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100" src="{{ url('assets/img/3.jpg') }}" alt="Second slide">
                                                            <div class="carousel-caption d-none d-sm-block">
                                                                <h3>{{__('Second label')}}</h3>
                                                                <h5>{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.')}}</h5>
                                                            </div>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100" src="{{ url('assets/img/2.jpg') }}" alt="Third slide">
                                                            <div class="carousel-caption d-none d-sm-block">
                                                                <h3>{{__('Third label')}}</h3>
                                                                <h5>{{__('Praesent commodo cursus magna, vel scelerisque nisl.')}}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#captions" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">{{__('Previous')}}</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#captions" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">{{__('Next')}}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Custom Carousel')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area  custom-carousel">
                                        <div class="container" style="max-width: 928px;">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 p-0">
                                                    <div id="style1" class="carousel slide custom-carousel" data-ride="carousel">
                                                        <ol class="carousel-indicators">
                                                            <li data-target="#style1" data-slide-to="0" class="active"></li>
                                                            <li data-target="#style1" data-slide-to="1"></li>
                                                            <li data-target="#style1" data-slide-to="2"></li>
                                                        </ol>
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <img class="d-block w-100 slide-image" src="{{ url('assets/img/1.jpg') }}" alt="First slide">
                                                                <div class="carousel-caption">
                                                                    <h3>{{__('Custom slide 1')}}</h3>
                                                                    <div class="media align-items-center">
                                                                        <img src="{{ url('assets/img/profile-6.jpg') }}" class="" alt="avatar">
                                                                        <div class="media-body">
                                                                            <h6 class="user-name">{{__('Sara Jones')}}</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img class="d-block w-100 slide-image" src="{{ url('assets/img/3.jpg') }}" alt="Second slide">
                                                                <div class="carousel-caption">
                                                                    <h3>{{__('Custom slide 2')}}</h3>
                                                                    <div class="media align-items-center">
                                                                        <img src="{{ url('assets/img/profile-7.jpg') }}" class="" alt="avatar">
                                                                        <div class="media-body">
                                                                            <h6 class="user-name">{{__('Motella Khargu')}}</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img class="d-block w-100 slide-image" src="{{ url('assets/img/2.jpg') }}" alt="Third slide">
                                                                <div class="carousel-caption">
                                                                    <h3>{{__('Custom slide 3')}}</h3>
                                                                    <div class="media align-items-center">
                                                                        <img src="{{ url('assets/img/profile-8.jpg') }}" class="" alt="avatar">
                                                                        <div class="media-body">
                                                                            <h6 class="user-name">{{__('Tiki Williams')}}</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a class="carousel-control-prev" href="#style1" role="button" data-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">{{__('Previous')}}</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#style1" role="button" data-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">{{__('Next')}}</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Carousel with fade animation')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div id="carouselExampleControlss" class="carousel slide carousel-fade" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img class="d-block w-100" src="{{ url('assets/img/3.jpg') }}" alt="First slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100" src="{{ url('assets/img/2.jpg') }}" alt="Second slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100" src="{{ url('assets/img/1.jpg') }}" alt="Third slide">
                                                        </div>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleControlss" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">{{__('Previous')}}</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleControlss" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">{{__('Next')}}</span>
                                                    </a>
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
