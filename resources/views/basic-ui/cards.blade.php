@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Bootstrap Cards')}}</span></li>
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
                            <div class="col-lg-12 col-12 h-100 layout-spacing">
                                <div class="">
                                    <div class="row">
                                        <div class="col-lg-6 col-xl-3">
                                            <!-- Simple card -->
                                            <div class="card">
                                                <img class="card-img-top img-fluid" src="{{ url('assets/img/lightbox-1.jpg') }}" alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{__('Card title')}}</h5>
                                                    <p class="card-text">{{__('Some quick example text to build on the card title and make
                                                        up the bulk of the card\'s content. With supporting text below as a natural lead-in to additional content.')}}</p>
                                                    <a href="javascript:void(0);" class="btn btn-primary mt-3">{{__('Button')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-3">
                                            <div class="card">
                                                <img class="card-img-top img-fluid" src="{{ url('assets/img/lightbox-2.jpg') }}" alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{__('Card title')}}</h5>
                                                    <p class="card-text font-13">{{__('Some quick example text to build on the card title.')}}</p>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item text-danger strong">{{__('Dapibus ac facilisis in')}}</li>
                                                </ul>
                                                <div class="card-body">
                                                    <a href="javascript:void(0);" class="card-link text-primary">{{__('Card link')}}</a>
                                                    <a href="javascript:void(0);" class="card-link text-primary">{{__('Another link')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-3">
                                            <div class="card">
                                                <img class="card-img-top img-fluid" src="{{ url('assets/img/lightbox-3.jpg') }}" alt="Card image cap">
                                                <div class="card-body">
                                                    <p class="card-text">{{__('Some quick example text to build on the card title and make
                                                        up the bulk of the card\'s content. With supporting text below as a natural lead-in to additional content.')}}</p>
                                                    <a href="javascript:void(0);" class="btn btn-primary">{{__('Button')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{__('Card title')}}</h5>
                                                    <h6 class="card-subtitle font-13">{{__('Support card subtitle')}}</h6>
                                                </div>
                                                <img class="img-fluid" src="{{ url('assets/img/lightbox-4.jpg') }}" alt="Card image cap">
                                                <div class="card-body">
                                                    <p class="card-text">{{__('Some quick example text to build on the card title and make
                                                        up the bulk of the card\'s content.')}}</p>
                                                    <a href="javascript:void(0);" class="card-link text-primary">{{__('Card link')}}</a>
                                                    <a href="javascript:void(0);" class="card-link text-primary">{{__('Another link')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <div class="card card-body">
                                                <h5 class="card-title">{{__('Special title treatment')}}</h5>
                                                <p class="card-text">{{__('With supporting text below as a natural lead-in to additional
                                                    content.')}}</p>
                                                <a href="javascript:void(0);" class="btn btn-primary btn-sm w-50">{{__('Go somewhere')}}</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card card-body">
                                                <h5 class="card-title">{{__('Special title treatment')}}</h5>
                                                <p class="card-text">{{__('With supporting text below as a natural lead-in to additional
                                                    content.')}}</p>
                                                <a href="javascript:void(0);" class="btn btn-primary btn-sm w-50">{{__('Go somewhere')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-4">
                                            <div class="card card-body">
                                                <h5 class="card-title">{{__('Special title treatment')}}</h5>
                                                <p class="card-text">{{__('With supporting text below as a natural lead-in to additional
                                                    content.')}}</p>
                                                <a href="javascript:void(0);" class="btn btn-primary btn-sm">{{__('Go somewhere')}}</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card card-body text-xs-center">
                                                <h5 class="card-title">{{__('Special title treatment')}}</h5>
                                                <p class="card-text">{{__('With supporting text below as a natural lead-in to additional
                                                    content.')}}</p>
                                                <a href="javascript:void(0);" class="btn btn-primary btn-sm">{{__('Go somewhere')}}</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card card-body text-xs-right">
                                                <h5 class="card-title">{{__('Special title treatment')}}</h5>
                                                <p class="card-text">{{__('With supporting text below as a natural lead-in to additional
                                                    content.')}}</p>
                                                <a href="javascript:void(0);" class="btn btn-primary btn-sm">{{__('Go somewhere')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="card">
                                                <h5 class="card-header bg-gradient-danger text-white">{{__('Featured')}}</h5>
                                                <div class="card-body">
                                                    <h5 class="card-title">{{__('Special title treatment')}}</h5>
                                                    <p class="card-text">{{__('With supporting text below as a natural lead-in to
                                                        additional content.')}}</p>
                                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm">{{__('Go somewhere')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-header bg-gradient-info text-white">
                                                    {{__('Quote')}}
                                                </div>
                                                <div class="card-body">
                                                    <blockquote class="card-bodyquote mb-2">
                                                        <p>{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                                            erat a ante.')}}</p>
                                                        <footer>{{__('Someone famous in ')}}<cite title="{{__('Source Title')}}">{{__('Source Title')}}</cite>
                                                        </footer>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card text-xs-center">
                                                <div class="card-header bg-gradient-dark text-white">
                                                    {{__('Featured')}}
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">{{__('With supporting text below as a natural lead-in to
                                                        additional content. Lorem ipsum dolor sit amet, consectetur adipiscing elit.')}}</p>
                                                </div>
                                                <div class="card-footer text-muted">
                                                    {{__('2 days ago')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img class="card-img-top img-fluid" src="{{ url('assets/img/lightbox-5.jpg') }}" alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{__('Card title')}}</h5>
                                                    <p class="card-text">{{__('This is a wider card with supporting text below as a
                                                        natural lead-in to additional content. This content is a little bit
                                                        longer.')}}</p>
                                                    <p class="card-text">
                                                        <small class="text-muted">{{__('Last updated 3 mins ago')}}</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{__('Card title')}}</h5>
                                                    <p class="card-text">{{__('This is a wider card with supporting text below as a
                                                        natural lead-in to additional content. This content is a little bit
                                                        longer.')}}</p>
                                                    <p class="card-text">
                                                        <small class="text-muted">{{__('Last updated 3 mins ago')}}</small>
                                                    </p>
                                                </div>
                                                <img class="card-img-bottom img-fluid" src="{{ url('assets/img/lightbox-6.jpg') }}" alt="Card image cap">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card card-inverse text-white">
                                                <img class="card-img img-fluid" src="{{ url('assets/img/lightbox-7.jpg') }}" alt="Card image">
                                                <div class="card-img-overlay">
                                                    <h5 class="card-title text-white">{{__('Card title')}}</h5>
                                                    <p class="card-text text-white">{{__('This is a wider card with supporting text below as a
                                                        natural lead-in to additional content. This content is a little bit
                                                        longer.')}}</p>
                                                    <p class="card-text text-white">
                                                        <small class="">{{__('Last updated 3 mins ago')}}</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-4">
                                            <div class="card component-card_9">
                                                <img src="{{ url('assets/img/1.jpg') }}" class="card-img-top" alt="widget-card-2">
                                                <div class="card-body">
                                                    <p class="meta-date">{{__('20 Aug 2020')}}</p>
                                                    <h5 class="card-title">{{__('Just a title')}}</h5>
                                                    <p class="card-text">{{__('This card has supporting text below as a natural lead-in to additional content.')}}</p>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <img class="rounded-circle avatar avatar-sm" src="{{ url('assets/img/profile-18.jpg') }}" />
                                                            <div class="font-15 ml-2">{{__('Lara Lawson')}}</div>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="text-danger mr-3">
                                                                <i class="las la-heart"></i> {{__('51')}}
                                                            </div>
                                                            <div class="text-info">
                                                                <i class="las la-comments"></i> {{__('250')}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card bg-gradient-dark">
                                                <div class="card-body text-center">
                                                    <img src="{{ url('assets/img/profile-7.jpg') }}" class="img-thumbnail rounded-circle avatar-lg" alt="...">
                                                    <h5 class="font-20 text-white mt-4">{{__('Shawn Mandola')}}</h5>
                                                    <p class="font-15 text-white mt-2">{{__('Senior Executive')}}</p>
                                                    <div class="d-flex align-center justify-content-center">
                                                        <i class="las la-star text-warning font-25"></i>
                                                        <i class="las la-star text-warning font-25"></i>
                                                        <i class="las la-star text-warning font-25"></i>
                                                        <i class="las la-star text-warning font-25"></i>
                                                        <i class="lar la-star text-warning font-25"></i>
                                                    </div>
                                                    <p class="font-13 text-white mt-4"> {{__('This card has supporting text below as a natural lead-in to additional content.This card has supporting text below as a natural lead-in to additional content.')}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card component-card_6">
                                                <div class="card-body">
                                                    <p class="card-text"> {{__('Maecenas nec mi vel lacus condimentum rhoncus dignissim egestas orci. Integer blandit porta placerat. Vestibulum in ultricies.')}} </p>
                                                    <div class="user-info">
                                                        <div class="media-body">
                                                            <h5 class="font-20 text-dark mt-3">{{__('Shawn Mandola')}}</h5>
                                                            <p class="font-15 text-dark mt-2">{{__('Senior Executive')}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-center">
                                                        <i class="las la-star text-warning font-25"></i>
                                                        <i class="las la-star text-warning font-25"></i>
                                                        <i class="las la-star text-warning font-25"></i>
                                                        <i class="las la-star text-warning font-25"></i>
                                                        <i class="lar la-star text-warning font-25"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card bg-gradient-secondary mt-4">
                                                <div class="card-body">
                                                    <h5 class="font-20 text-white">{{__('Rating')}}</h5>
                                                    <h6 class="font-15 text-white mt-2">{{__('(4.3)')}}</h6>
                                                    <div class="d-flex align-center">
                                                        <i class="las la-star text-white font-25"></i>
                                                        <i class="las la-star text-white font-25"></i>
                                                        <i class="las la-star text-white font-25"></i>
                                                        <i class="las la-star text-white font-25"></i>
                                                        <i class="lar la-star text-white font-25"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="card bg-secondary text-white">
                                                <div class="card-body">
                                                    <h5 class="card-title text-white">{{__('Special title treatment')}}</h5>
                                                    <p class="text-white">{{__('With supporting text below as a natural lead-in to
                                                        additional content.')}}</p>
                                                    <a href="javascript:void(0);" class="btn  text-secondary strong btn-sm">{{__('Button')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card text-white bg-primary text-xs-center">
                                                <div class="card-body">
                                                    <blockquote class="card-bodyquote">
                                                        <p class="text-white">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                                            erat a ante.')}}</p>
                                                        <footer class="text-white">{{__('Someone famous in')}} <cite title="{{__('Source Title')}}">{{__('Source Title')}}</cite>
                                                        </footer>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card text-white bg-success text-xs-center">
                                                <div class="card-body">
                                                    <blockquote class="card-bodyquote">
                                                        <p class="text-white">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                                            erat a ante.')}}</p>
                                                        <footer class="text-white">{{__('Someone famous in')}} <cite title="{{__('Source Title')}}">{{__('Source Title')}}</cite>
                                                        </footer>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="card text-white bg-info text-xs-center">
                                                <div class="card-body">
                                                    <blockquote class="card-bodyquote">
                                                        <p class="text-white">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                                            erat a ante.')}}</p>
                                                        <footer class="text-white">{{__('Someone famous in')}} <cite title="{{__('Source Title')}}">{{__('Source Title')}}</cite>
                                                        </footer>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card text-white bg-warning text-xs-center">
                                                <div class="card-body">
                                                    <blockquote class="card-bodyquote">
                                                        <p class="text-white">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                                            erat a ante.')}}</p>
                                                        <footer class="text-white">{{__('Someone famous in')}} <cite title="{{__('Source Title')}}">{{__('Source Title')}}</cite>
                                                        </footer>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card text-white bg-danger text-xs-center">
                                                <div class="card-body">
                                                    <blockquote class="card-bodyquote">
                                                        <p class="text-white">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                                            erat a ante.')}}</p>
                                                        <footer class="text-white">{{__('Someone famous in')}} <cite title="{{__('Source Title')}}">{{__('Source Title')}}</cite>
                                                        </footer>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="card text-white bg-gradient-primary text-xs-center">
                                                <div class="card-body">
                                                    <blockquote class="card-bodyquote">
                                                        <p class="text-white">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                                            erat a ante.')}}</p>
                                                        <footer class="text-white">{{__('Someone famous in')}} <cite title="{{__('Source Title')}}">{{__('Source Title')}}</cite>
                                                        </footer>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card text-white bg-pink text-xs-center">
                                                <div class="card-body">
                                                    <blockquote class="card-bodyquote">
                                                        <p>{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                                            erat a ante.')}}</p>
                                                        <footer>{{__('Someone famous in')}} <cite title="{{__('Source Title')}}">{{__('Source Title')}}</cite>
                                                        </footer>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card text-white bg-dark text-xs-center">
                                                <div class="card-body">
                                                    <blockquote class="card-bodyquote">
                                                        <p class="text-white">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                                            erat a ante.')}}</p>
                                                        <footer class="text-white">{{__('Someone famous in')}} <cite title="{{__('Source Title')}}">{{__('Source Title')}}</cite>
                                                        </footer>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title text-primary">{{__('Primary card title')}}</h5>
                                                    <p class="card-text text-primary">{{__('Some quick example text to build on the card title and make up the bulk of the card\'s content.')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title text-secondary">{{__('Secondary card title')}}</h5>
                                                    <p class="card-text text-secondary">{{__('Some quick example text to build on the card title and make up the bulk of the card\'s content.')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title text-success-teal">{{__('Success card title')}}</h5>
                                                    <p class="card-text text-success-teal">{{__('Some quick example text to build on the card title and make up the bulk of the card\'s content.')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="card-group">
                                                <div class="card">
                                                    <img class="card-img-top img-fluid" src="{{ url('assets/img/lightbox-1.jpg') }}" alt="Card image cap">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{__('Card title')}}</h5>
                                                        <p class="card-text">{{__('This is a wider card with supporting text below as a
                                                            natural lead-in to additional content. This content is a little bit
                                                            longer.')}}</p>
                                                        <p class="card-text">
                                                            <small class="text-muted">{{__('Last updated 3 mins ago')}}</small>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <img class="card-img-top img-fluid" src="{{ url('assets/img/lightbox-2.jpg') }}" alt="Card image cap">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{__('Card title')}}</h5>
                                                        <p class="card-text">{{__('This card has supporting text below as a natural
                                                            lead-in to additional content.')}}</p>
                                                        <p class="card-text">
                                                            <small class="text-muted">{{__('Last updated 3 mins ago')}}</small>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <img class="card-img-top img-fluid" src="{{ url('assets/img/lightbox-3.jpg') }}" alt="Card image cap">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{__('Card title')}}</h5>
                                                        <p class="card-text">{{__('This is a wider card with supporting text below as a
                                                            natural lead-in to additional content. This card has even longer content
                                                            than the first to show that equal height action.')}}</p>
                                                        <p class="card-text">
                                                            <small class="text-muted">{{__('Last updated 3 mins ago')}}</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="no-gutters align-items-center row">
                                                    <div class="col-md-4">
                                                        <img src="{{ url('assets/img/lightbox-4.jpg') }}" alt="Skote" class="img-fluid card-img">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <div class="card-title">{{__('Card title')}}</div>
                                                            <p class="card-text">{{__('This is a wider card with supporting text below as a natural lead-in to additional content.')}}</p>
                                                            <p class="card-text">
                                                                <small class="text-muted">{{__('Last updated 3 mins ago')}}</small>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="no-gutters align-items-center row">
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <div class="card-title">{{__('Card title')}}</div>
                                                            <p class="card-text">{{__('This is a wider card with supporting text below as a natural lead-in to additional content.')}}</p>
                                                            <p class="card-text">
                                                                <small class="text-muted">{{__('Last updated 3 mins ago')}}</small>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <img src="{{ url('assets/img/lightbox-5.jpg') }}" alt="Skote" class="img-fluid card-img">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="card-columns">
                                                <div class="card">
                                                    <img class="card-img-top img-fluid" src="{{ url('assets/img/lightbox-6.jpg') }}" alt="Card image cap">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{__('Card title that wraps to a new line')}}</h5>
                                                        <p class="card-text">{{__('This is a longer card with supporting text below as a
                                                            natural lead-in to additional content. This content is a little bit
                                                            longer.')}}</p>
                                                    </div>
                                                </div>
                                                <div class="card card-body mt-3">
                                                    <blockquote class="card-bodyquote">
                                                        <p>{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                                            erat a ante.')}}</p>
                                                        <footer>
                                                            <small class="text-muted">
                                                                {{__('Someone famous in')}} <cite title="{{__('Source Title')}}">{{__('Source Title')}}</cite>
                                                            </small>
                                                        </footer>
                                                    </blockquote>
                                                </div>
                                                <div class="card">
                                                    <img class="card-img-top img-fluid" src="{{ url('assets/img/lightbox-7.jpg') }}" alt="Card image cap">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{__('Card title')}}</h5>
                                                        <p class="card-text">{{__('This card has supporting text below as a natural
                                                            lead-in to additional content.')}}</p>
                                                        <p class="card-text">
                                                            <small class="text-muted">{{__('Last updated 3 mins ago')}}</small>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="card card-body text-xs-center mt-3">
                                                    <h5 class="card-title">{{__('Card title')}}</h5>
                                                    <p class="card-text">{{__('This card has supporting text below as a natural
                                                            lead-in to additional content.')}}</p>
                                                    <p class="card-text">
                                                        <small class="text-muted">{{__('Last updated 3 mins ago')}}</small>
                                                    </p>
                                                </div>
                                                <div class="card">
                                                    <img class="card-img img-fluid" src="{{ url('assets/img/lightbox-1.jpg') }}" alt="Card image cap">
                                                </div>
                                                <div class="card card-body text-xs-right mt-3">
                                                    <blockquote class="card-bodyquote">
                                                        <p>{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                                            erat a ante.')}}</p>
                                                        <footer>
                                                            <small class="text-muted">
                                                                {{__('Someone famous in')}}<cite title="{{__('Source Title')}}">{{__('Source Title')}}</cite>
                                                            </small>
                                                        </footer>
                                                    </blockquote>
                                                </div>
                                                <div class="card card-body mt-3">
                                                    <h5 class="card-title">{{__('Card title')}}</h5>
                                                    <p class="card-text">{{__('This is a wider card with supporting text below as a
                                                        natural lead-in to additional content. This card has even longer content
                                                        than the first to show that equal height action.')}}</p>
                                                    <p class="card-text">
                                                        <small class="text-muted">{{__('Last updated 3 mins ago')}}</small>
                                                    </p>
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
