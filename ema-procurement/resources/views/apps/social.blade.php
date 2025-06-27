@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/apps/social.css') !!}
    {!! Html::style('plugins/dropzone/dropzone.min.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area Starts -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('Apps')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Social')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area Starts -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="layout-top-spacing mb-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing">
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="pb-0"> {{__('Stories')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div id="content_1" class="tabcontent story-area">
                                                    <div class="story-container-1">
                                                        <div class="single-create-story">
                                                            <img src="{{ url('assets/img/profile-17.jpg') }}" class="single-create-story-bg"/>
                                                            <div class="create-story-author">
                                                                <img src="{{ url('assets/img/plus.png') }}"/>
                                                                <p> {{__('Create a story')}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="single-story">
                                                            <img src="{{ url('assets/img/lightbox-5.jpg') }}" class="single-story-bg"/>
                                                            <div class="story-author">
                                                                <img src="{{ url('assets/img/profile-5.jpg') }}"/>
                                                                <p> {{__('John')}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="single-story">
                                                            <img src="{{ url('assets/img/lightbox-7.jpg') }}" class="single-story-bg"/>
                                                            <div class="story-author">
                                                                <img src="{{ url('assets/img/profile-26.jpg') }}"/>
                                                                <p> {{__('Mike')}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="single-story">
                                                            <img src="{{ url('assets/img/lightbox-8.jpg') }}" class="single-story-bg"/>
                                                            <div class="story-author">
                                                                <img src="{{ url('assets/img/profile-28.jpg') }}"/>
                                                                <p> {{__('Lisa')}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="single-story">
                                                            <img src="{{ url('assets/img/lightbox-9.jpg') }}" class="single-story-bg"/>
                                                            <div class="story-author">
                                                                <img src="{{ url('assets/img/profile-21.jpg') }}"/>
                                                                <p> {{__('William')}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="single-story">
                                                            <img src="{{ url('assets/img/lightbox-7.jpg') }}" class="single-story-bg"/>
                                                            <div class="story-author">
                                                                <img src="{{ url('assets/img/profile-19.jpg') }}"/>
                                                                <p> {{__('Jonthy')}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="single-story">
                                                            <img src="{{ url('assets/img/lightbox-4.jpg') }}" class="single-story-bg"/>
                                                            <div class="story-author">
                                                                <img src="{{ url('assets/img/profile-26.jpg') }}"/>
                                                                <p> {{__('Steve')}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="single-story">
                                                            <img src="{{ url('assets/img/lightbox-8.jpg') }}" class="single-story-bg"/>
                                                            <div class="story-author">
                                                                <img src="{{ url('assets/img/profile-16.jpg') }}"/>
                                                                <p> {{__('Jenni')}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="single-story">
                                                            <img src="{{ url('assets/img/lightbox-6.jpg') }}" class="single-story-bg"/>
                                                            <div class="story-author">
                                                                <img src="{{ url('assets/img/profile-21.jpg') }}"/>
                                                                <p> {{__('Sagarika')}}</p>s
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="pb-0"> {{__('Stories')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div id="content_2" class="tabcontent">
                                                    <div class="story-container-2">
                                                        <div class="single-story">
                                                            <div class="story-dp">
                                                                <img src="{{ url('assets/img/profile-19.jpg') }}"/>
                                                                <img src="{{ url('assets/img/plus.png') }}" class="add-story"/>
                                                            </div>
                                                            <div class="story-author">
                                                                <p class="name"> {{__('John Doe')}}</p>
                                                                <p class="time"> {{__('Tap to add a story')}}</p>
                                                            </div>
                                                        </div>
                                                        <p class="divider"> {{__('Recently Added')}}</p>
                                                        <div class="single-story">
                                                            <div class="story-dp unseen">
                                                                <img src="{{ url('assets/img/profile-29.jpg') }}"/>
                                                            </div>
                                                            <div class="story-author">
                                                                <p class="name"> {{__('Katharina Nielsen')}}</p>
                                                                <p class="time"> {{__('Today, 12:33')}}</p>
                                                            </div>
                                                        </div>
                                                        <p class="divider"> {{__('Viewed Stories')}}</p>
                                                        <div class="single-story">
                                                            <div class="story-dp seen">
                                                                <img src="{{ url('assets/img/profile-28.jpg') }}"/>
                                                            </div>
                                                            <div class="story-author">
                                                                <p class="name"> {{__('Martha Lawson')}}</p>
                                                                <p class="time"> {{__('Today, 02:33')}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-footer p-2 text-center bg-light-primary">
                                        <a class="text-primary strong" href="#"> {{__('View All')}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 layout-spacing">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="pb-0"> {{__('Events')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div id="content_2" class="tabcontent">
                                                    <div class="d-flex align-center mb-2">
                                                        <i class="las la-calendar font-19 mr-1 text-primary"></i>
                                                        <a class="text-primary"> {{__('15 events invites')}}</a>
                                                    </div>
                                                    <div>
                                                        <i class="las la-birthday-cake font-19 mr-1 text-danger"></i>
                                                        <a class="text-danger"> {{__('Heta Gangar\'s birthday. Wish him')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="pb-0"> {{__('Pages')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div id="content_2" class="tabcontent">
                                                    <div class="d-flex align-center mb-2">
                                                        <img src="{{ url('assets/img/headphones.jpg') }}" width="30" height="30" class="rounded-circle img-thumbnail mr-2"/>
                                                        <a class="text-dark"> {{__('Headphone Market')}}</a>
                                                    </div>
                                                    <div class="d-flex align-center">
                                                        <img src="{{ url('assets/img/laptop.jpg') }}" width="30" height="30" class="rounded-circle img-thumbnail mr-2"/>
                                                        <a class="text-dark"> {{__('Laptop Market')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-footer p-2 text-center bg-light-primary">
                                        <a class="text-primary strong" href="#"> {{__('View All')}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-content widget-content-area bg-gradient-secondary">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div id="content_2" class="tabcontent birthday-section">
                                                    <div class="d-flex align-center justify-content-between">
                                                        <a class="left-icon"><i class="las la-birthday-cake"></i></a>
                                                        <a class="right-icon" href="javascript:void(0);">
                                                            <i class="las la-ellipsis-h"></i>
                                                        </a>
                                                    </div>
                                                    <div class="text-center">
                                                        <div class="position-relative d-inline-flex mt-2">
                                                            <img class="birth-user" src="{{ url('assets/img/profile-18.jpg') }}"/>
                                                            <span class="birth-year">29</span>
                                                        </div>
                                                        <h5 class="birth-msg">
                                                            {{__('We thought you wouldn\'t want to miss a chance to wish him happy birthday!')}}
                                                        </h5>
                                                        <button class="btn btn-secondary"> {{__('Wish Her')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-content widget-content-area tab-horizontal-line pt-0">
                                        <ul class="nav nav-tabs" id="animateLine" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="animated-underline-home-tab" data-toggle="tab" href="#animated-underline-home" role="tab" aria-controls="animated-underline-home" aria-selected="true"> {{__('Make Post')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="animated-underline-about-tab" data-toggle="tab" href="#animated-underline-about" role="tab" aria-controls="animated-underline-about" aria-selected="false"> {{__('Media')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="animated-underline-messages-tab" data-toggle="tab" href="#animated-underline-messages" role="tab" aria-controls="animated-underline-messages" aria-selected="false"> {{__('Live Video')}}</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content make-post-tab" id="animateLineContent-4">
                                            <div class="tab-pane fade active show" id="animated-underline-home" role="tabpanel" aria-labelledby="animated-underline-home-tab">
                                                <div class="media">
                                                    <img class="mr-3 " src="{{ url('assets/img/profile-22.jpg') }}" alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <textarea class="form-control" placeholder="{{__('What is on your mind? Share it with the world')}}"></textarea>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div>
                                                    <a class="create-post-button mr-2 primary" href="javascript:void(0)">
                                                        <i class="las la-camera"></i>
                                                        {{__('Photo')}}
                                                    </a>
                                                    <a class="create-post-button mr-2 danger" href="javascript:void(0)">
                                                        <i class="las la-grin-alt"></i>
                                                        {{__('Feeling')}}
                                                    </a>
                                                    <a class="create-post-button mr-2" href="javascript:void(0)">
                                                        <i class="las la-ellipsis-h"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="animated-underline-about" role="tabpanel" aria-labelledby="animated-underline-about-tab">
                                                <div id="dropzone">
                                                    <form action="/upload" class="dropzone needsclick dz-clickable" id="demo-upload">
                                                        <div class="dz-message needsclick">
                                                            <button type="button" class="dz-button"> {{__('Drop files here or click to upload.')}}</button>
                                                            <br>
                                                            <span class="note needsclick"> (This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="animated-underline-messages" role="tabpanel" aria-labelledby="animated-underline-messages-tab">
                                                <div class="row mt-3 mb-4">
                                                    <div class="col-md-6">
                                                        <h4> {{__('Get Started')}}</h4>
                                                        <p> {{__('Choose how you want to start setting up your live video.')}}</p>
                                                    </div>
                                                    <div class="col-md-3 mb-2">
                                                        <a class="live-option" href="javascript:void(0)">
                                                            <i class="las la-camera"></i>
                                                            {{__('Use Camera')}}
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 mb-2">
                                                        <a class="live-option" href="javascript:void(0)">
                                                            <i class="las la-video"></i>
                                                            {{__('Recorded Video')}}
                                                        </a>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary"> {{__('Go Live')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="pb-0"> {{__('Trending')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="media mt-3">
                                                    <i class="las la-chart-line mr-2 font-19 text-primary"></i>
                                                    <div class="media-body">
                                                        <a class="mt-1 font-14 text-reset" href="javascript:void(0);">
                                                            <strong class="text-primary"> {{__('Lorem Ipsum:')}}</strong>
                                                            <span class="text-muted">
                                                                        {{__('Lorem Ipsum has been the industry\'s standard')}}
                                                                    </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="media mt-3">
                                                    <i class="las la-chart-line mr-2 font-19 text-primary"></i>
                                                    <div class="media-body">
                                                        <a class="mt-1 font-14 text-reset" href="javascript:void(0);">
                                                            <strong class="text-primary"> {{__('Dolor beguiled:')}}</strong>
                                                            <span class="text-muted">
                                                                        {{__('Lorem Ipsum has been the industry\'s standard')}}
                                                                    </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="media mt-3">
                                                    <i class="las la-chart-line mr-2 font-19 text-primary"></i>
                                                    <div class="media-body">
                                                        <a class="mt-1 font-14 text-reset" href="javascript:void(0);">
                                                            <strong class="text-primary">{{__('Bonorum et Malorum:')}}</strong>
                                                            <span class="text-muted">
                                                                        {{__('Lorem Ipsum has been the industry\'s standard')}}
                                                                    </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="media mt-3">
                                                    <i class="las la-chart-line mr-2 font-19 text-primary"></i>
                                                    <div class="media-body">
                                                        <a class="mt-1 font-14 text-reset" href="javascript:void(0);">
                                                            <strong class="text-primary"> {{__('Contrary to popular:')}}</strong>
                                                            <span class="text-muted">
                                                                        {{__('Lorem Ipsum has been the industry\'s standard')}}
                                                                    </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="media mt-3">
                                                    <i class="las la-chart-line mr-2 font-19 text-primary"></i>
                                                    <div class="media-body">
                                                        <a class="mt-1 font-14 text-reset" href="javascript:void(0);">
                                                            <strong class="text-primary"> {{__('Lorem Ipsum:')}}</strong>
                                                            <span class="text-muted">
                                                                        {{__('Lorem Ipsum has been the industry\'s standard')}}
                                                                    </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="pb-0"> {{__('People you may know')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="people-may-know">
                                                    <div class="single-item">
                                                        <div class="single-item-img"><img src="{{ url('assets/img/profile-11.jpg') }}" class="rounded-circle" alt=""></div>
                                                        <p class="single-item-author"> {{__('Katharina Nielsen')}}</p>
                                                        <p class="single-item-text"> {{__('California, USA')}}</p>
                                                        <p class="single-item-option">
                                                            <button type="button" class="btn btn-sm btn-outline-primary px-1 py-0"> <i class="las la-ellipsis-h font-17"></i> </button>
                                                        </p>
                                                    </div>
                                                    <div class="single-item">
                                                        <div class="single-item-img"><img src="{{ url('assets/img/profile-12.jpg') }}" class="rounded-circle" alt=""></div>
                                                        <p class="single-item-author"> {{__('Sucheta Dalal')}}</p>
                                                        <p class="single-item-text"> {{__('Sao Paolo, Brazil')}}</p>
                                                        <p class="single-item-option">
                                                            <button type="button" class="btn btn-sm btn-outline-primary px-1 py-0"> <i class="las la-ellipsis-h font-17"></i> </button>
                                                        </p>
                                                    </div>
                                                    <div class="single-item">
                                                        <div class="single-item-img"><img src="{{ url('assets/img/profile-13.jpg') }}" class="rounded-circle" alt=""></div>
                                                        <p class="single-item-author"> {{__('Ulrich Nielsen')}}</p>
                                                        <p class="single-item-text"> {{__('Winden, Germany')}}</p>
                                                        <p class="single-item-option">
                                                            <button type="button" class="btn btn-sm btn-outline-primary px-1 py-0">     <i class="las la-ellipsis-h font-17"></i>
                                                            </button>
                                                        </p>
                                                    </div>
                                                    <div class="single-item">
                                                        <div class="single-item-img"><img src="{{ url('assets/img/profile-14.jpg') }}" class="rounded-circle" alt=""></div>
                                                        <p class="single-item-author"> {{__('Jennifer Lawso')}}n</p>
                                                        <p class="single-item-text"> {{__('New Delhi, India')}}</p>
                                                        <p class="single-item-option">
                                                            <button type="button" class="btn btn-sm btn-outline-primary px-1 py-0">     <i class="las la-ellipsis-h font-17"></i>
                                                            </button>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4> {{__('Posts Type 1')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div id="content_6" class="tabcontent">
                                                    <div class="posted-post">
                                                        <div class="row post-author">
                                                            <div class="col-md-6 pal">
                                                                <img src="{{ url('assets/img/profile-17.jpg') }}" />
                                                                <div class="">
                                                                    <h5 class="post-author-name"> {{__('Jade Neesham')}}</h5>
                                                                    <p class="post-date">
                                                                        {{__('Yesterday, 12:35')}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 par">
                                                                <a href="javascript:void(0);">
                                                                    <i class="las la-ellipsis-h"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <h5 class="post-text">
                                                            {{__('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.')}}
                                                        </h5>
                                                        <div class="post-body-1 t2">
                                                            <div class="left">
                                                                <div class="image-container">
                                                                    <img src="{{ url('assets/img/lightbox-3.jpg') }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="post-number-container">
                                                            <div class="post-number like">
                                                                <i class="las la-heart"></i>
                                                                <a> {{__('25 Like')}}</a>
                                                            </div>
                                                            <div class="post-number comment">
                                                                <i class="las la-comments"></i>
                                                                <a> {{__('32 Comments')}}</a>
                                                            </div>
                                                            <div class="post-number share">
                                                                <i class="las la-share-alt"></i>
                                                                <a> {{__('11 Share')}}</a>
                                                            </div>
                                                            <div class="post-number bookmark">
                                                                <i class="las la-bookmark"></i>
                                                                <a> {{__('56 Bookmark')}}</a>
                                                            </div>
                                                        </div>
                                                        <div class="post-input-area">
                                                            <img src="{{ url('assets/img/profile-17.jpg') }}" />
                                                            <div class="input-container">
                                                                <input type="text" placeholder="{{__('Write your comment')}}"/>
                                                                <a href="javascript:void(0);" title="{{__('Add Emoji')}}">
                                                                    <i class="las la-grin-beam"></i>
                                                                </a>
                                                                <a href="javascript:void(0);" title="{{__('Add Image')}}">
                                                                    <i class="las la-image"></i>
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
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4> {{__('Posts Type 2')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div id="content_6" class="tabcontent">
                                                    <div class="posted-post">
                                                        <div class="row post-author">
                                                            <div class="col-md-6 pal">
                                                                <img src="{{ url('assets/img/profile-17.jpg') }}" />
                                                                <div class="">
                                                                    <h5 class="post-author-name"> {{__('Jade Neesham')}}</h5>
                                                                    <p class="post-date">
                                                                        {{__('Yesterday, 12:35')}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 par">
                                                                <a href="javascript:void(0);">
                                                                    <i class="las la-ellipsis-h"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <h5 class="post-text">
                                                            {{__('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.')}}
                                                        </h5>
                                                        <div class="post-body-1 t3">
                                                            <div class="left">
                                                                <div class="image-container">
                                                                    <img src="{{ url('assets/img/lightbox-7.jpg') }}" />
                                                                </div>
                                                            </div>
                                                            <div class="right">
                                                                <div class="image-container">
                                                                    <img src="{{ url('assets/img/lightbox-4.jpg') }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="post-number-container">
                                                            <div class="post-number like">
                                                                <i class="las la-heart"></i>
                                                                <a> {{__('25 Like')}}</a>
                                                            </div>
                                                            <div class="post-number comment">
                                                                <i class="las la-comments"></i>
                                                                <a> {{__('32 Comments')}}</a>
                                                            </div>
                                                            <div class="post-number share">
                                                                <i class="las la-share-alt"></i>
                                                                <a> {{__('11 Share')}}</a>
                                                            </div>
                                                            <div class="post-number bookmark">
                                                                <i class="las la-bookmark"></i>
                                                                <a> {{__('56 Bookmark')}}</a>
                                                            </div>
                                                        </div>
                                                        <div class="post-input-area">
                                                            <img src="{{ url('assets/img/profile-17.jpg') }}" />
                                                            <div class="input-container">
                                                                <input type="text" placeholder="{{__('Write your comment')}}"/>
                                                                <a href="javascript:void(0);" title="{{__('Add Emoji')}}">
                                                                    <i class="las la-grin-beam"></i>
                                                                </a>
                                                                <a href="javascript:void(0);" title="{{__('Add Image')}}">
                                                                    <i class="las la-image"></i>
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
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4> {{__('Posts Type 3')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div id="content_6" class="tabcontent">
                                                    <div class="posted-post">
                                                        <div class="row post-author">
                                                            <div class="col-md-6 pal">
                                                                <img src="{{ url('assets/img/profile-17.jpg') }}" />
                                                                <div class="">
                                                                    <h5 class="post-author-name"> {{__('Jade Neesham')}}</h5>
                                                                    <p class="post-date">
                                                                        {{__('Yesterday, 12:35')}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 par">
                                                                <a href="javascript:void(0);">
                                                                    <i class="las la-ellipsis-h"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <h5 class="post-text">
                                                            {{__('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.')}}
                                                        </h5>
                                                        <div class="post-body-1">
                                                            <div class="left">
                                                                <div class="image-container">
                                                                    <img src="{{ url('assets/img/lightbox-1.jpg') }}" />
                                                                </div>
                                                            </div>
                                                            <div class="right">
                                                                <div class="image-container">
                                                                    <img src="{{ url('assets/img/lightbox-2.jpg') }}" />
                                                                </div>
                                                                <div class="image-container">
                                                                    <img src="{{ url('assets/img/lightbox-8.jpg') }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="post-number-container">
                                                            <div class="post-number like">
                                                                <i class="las la-heart"></i>
                                                                <a> {{__('25 Like')}}</a>
                                                            </div>
                                                            <div class="post-number comment">
                                                                <i class="las la-comments"></i>
                                                                <a> {{__('32 Comments')}}</a>
                                                            </div>
                                                            <div class="post-number share">
                                                                <i class="las la-share-alt"></i>
                                                                <a> {{__('11 Share')}}</a>
                                                            </div>
                                                            <div class="post-number bookmark">
                                                                <i class="las la-bookmark"></i>
                                                                <a> {{__('56 Bookmark')}}</a>
                                                            </div>
                                                        </div>
                                                        <div class="post-input-area">
                                                            <img src="{{ url('assets/img/profile-17.jpg') }}" />
                                                            <div class="input-container">
                                                                <input type="text" placeholder="{{__('Write your comment')}}"/>
                                                                <a href="javascript:void(0);" title="{{__('Add Emoji')}}">
                                                                    <i class="las la-grin-beam"></i>
                                                                </a>
                                                                <a href="javascript:void(0);" title="{{__('Add Image')}}">
                                                                    <i class="las la-image"></i>
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
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4> {{__('Posts Type 4')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div id="content_6" class="tabcontent">
                                                    <div class="posted-post">
                                                        <div class="row post-author">
                                                            <div class="col-md-6 pal">
                                                                <img src="{{ url('assets/img/profile-17.jpg') }}" />
                                                                <div class="">
                                                                    <h5 class="post-author-name"> {{__('Jade Neesham')}}</h5>
                                                                    <p class="post-date">
                                                                        {{__('Yesterday, 12:35')}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 par">
                                                                <a href="javascript:void(0);">
                                                                    <i class="las la-ellipsis-h"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <h5 class="post-text">
                                                            {{__('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.')}}
                                                        </h5>
                                                        <div class="post-body-1 t4">
                                                            <div class="left">
                                                                <div class="image-container">
                                                                    <img src="{{ url('assets/img/lightbox-9.jpg') }}" />
                                                                </div>
                                                            </div>
                                                            <div class="right">
                                                                <div class="image-container">
                                                                    <img src="{{ url('assets/img/lightbox-5.jpg') }}" />
                                                                </div>
                                                                <div class="image-container ex">
                                                                    <img src="{{ url('assets/img/lightbox-6.jpg') }}" />
                                                                    <a class="epn">+2</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="post-number-container">
                                                            <div class="post-number like">
                                                                <i class="las la-heart"></i>
                                                                <a> {{__('25 Like')}}</a>
                                                            </div>
                                                            <div class="post-number comment">
                                                                <i class="las la-comments"></i>
                                                                <a> {{__('32 Comments')}}</a>
                                                            </div>
                                                            <div class="post-number share">
                                                                <i class="las la-share-alt"></i>
                                                                <a> {{__('11 Share')}}</a>
                                                            </div>
                                                            <div class="post-number bookmark">
                                                                <i class="las la-bookmark"></i>
                                                                <a> {{__('56 Bookmark')}}</a>
                                                            </div>
                                                        </div>
                                                        <div class="post-input-area">
                                                            <img src="{{ url('assets/img/profile-17.jpg') }}" />
                                                            <div class="input-container">
                                                                <input type="text" placeholder="{{__('Write your comment')}}"/>
                                                                <a href="javascript:void(0);" title="{{__('Add Emoji')}}">
                                                                    <i class="las la-grin-beam"></i>
                                                                </a>
                                                                <a href="javascript:void(0);" title="{{__('Add Image')}}">
                                                                    <i class="las la-image"></i>
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
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4> {{__('Comments')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div id="content_6" class="tabcontent">
                                                    <div class="posted-post">
                                                        <div class="row post-author">
                                                            <div class="col-md-6 pal">
                                                                <img src="{{ url('assets/img/profile-17.jpg') }}" />
                                                                <div class="">
                                                                    <h5 class="post-author-name"> {{__('Jade Neesham')}}</h5>
                                                                    <p class="post-date">
                                                                        {{__('Yesterday, 12:35')}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 par">
                                                                <a href="javascript:void(0);">
                                                                    <i class="las la-ellipsis-h"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <h5 class="post-text">
                                                            {{__('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.')}}
                                                        </h5>
                                                        <div class="post-body-1 t5">
                                                            <div class="left">
                                                                <div class="image-container">
                                                                    <img src="{{ url('assets/img/lightbox-3.jpg') }}" />
                                                                </div>
                                                            </div>
                                                            <div class="right">
                                                                <div class="image-container">
                                                                    <img src="{{ url('assets/img/lightbox-4.jpg') }}" />
                                                                </div>
                                                                <div class="image-container">
                                                                    <img src="{{ url('assets/img/lightbox-2.jpg') }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="post-number-container">
                                                            <div class="post-number like">
                                                                <i class="las la-heart"></i>
                                                                <a> {{__('25 Like')}}</a>
                                                            </div>
                                                            <div class="post-number comment">
                                                                <i class="las la-comments"></i>
                                                                <a> {{__('32 Comments')}}</a>
                                                            </div>
                                                            <div class="post-number share">
                                                                <i class="las la-share-alt"></i>
                                                                <a> {{__('11 Share')}}</a>
                                                            </div>
                                                            <div class="post-number bookmark">
                                                                <i class="las la-bookmark"></i>
                                                                <a> {{__('56 Bookmark')}}</a>
                                                            </div>
                                                        </div>
                                                        <div class="post-input-area">
                                                            <img src="{{ url('assets/img/profile-17.jpg') }}" />
                                                            <div class="input-container">
                                                                <input type="text" placeholder="{{__('Write your comment')}}"/>
                                                                <a href="javascript:void(0);" title="{{__('Add Emoji')}}">
                                                                    <i class="las la-grin-beam"></i>
                                                                </a>
                                                                <a href="javascript:void(0);" title="{{__('Add Image')}}">
                                                                    <i class="las la-image"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="post-user-comment-box mt-3">
                                                            <div class="media">
                                                                <img class="mr-2 avatar-sm rounded-circle" src="{{ url('assets/img/profile-18.jpg') }}" alt="Generic placeholder image">
                                                                <div class="media-body">
                                                                    <h5 class="mt-0 font-13 mb-0"><a href="contacts-profile.html" class="text-reset"> {{__('Jennifer Gill')}}</a> <small class="text-muted"> {{__('3 hours ago')}}</small></h5>
                                                                    <p class="text-muted font-13 mt-1"> {{__('Wow! that\'s really cool and perfect for you')}}</p>
                                                                    <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="las la-reply"></i> {{__('Reply')}}</a>
                                                                    <div class="media mt-3">
                                                                        <a class="pr-2" href="#">
                                                                            <img src="{{ url('assets/img/profile-19.jpg') }}" class="avatar-sm rounded-circle" alt="Generic placeholder image">
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <h5 class="mt-0 font-13 mb-0"><a href="contacts-profile.html" class="text-reset"> {{__('John Samson')}}</a> <small class="text-muted"> {{__('5 hours ago5 hours ago')}}</small></h5>
                                                                            <p class="text-muted font-13 mt-1"> {{__('Just in case middle of a timelapse world and beyond. Amazing Moment with you guys.')}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="media mt-2 align-center">
                                                                <a class="pr-2" href="#">
                                                                    <img src="{{ url('assets/img/profile-18.jpg') }}" class="rounded-circle" alt="Generic placeholder image" height="31">
                                                                </a>
                                                                <div class="media-body">
                                                                    <input type="text" id="simpleinput" class="form-control border-0 form-control-sm" placeholder="{{__('Add comment')}}">
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
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/dropzone/dropzone.min.js') !!}
@endpush

@push('custom-scripts')

@endpush
