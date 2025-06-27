@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/pages/timeline.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Timeline')}}</span></li>
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
                    <div class="col-12">
                        <div class="timeline">
                            <article class="timeline-item">
                                <h2 class="m-0 d-none">&nbsp;</h2>
                                <div class="time-show mt-0">
                                    <a href="#" class="btn btn-primary width-lg">{{__('Today')}}</a>
                                </div>
                            </article>
                            <article class="timeline-item timeline-item-left">
                                <div class="timeline-desk">
                                    <div class="timeline-box">
                                        <span class="arrow-alt"></span>
                                        <span class="timeline-icon"><i class="lar la-dot-circle"></i></span>
                                        <h4 class="mt-0 font-16">{{__('56 Minutes ago')}}</h4>
                                        <p class="text-muted"><small>{{__('02:15 pm')}}</small></p>
                                        <p class="mb-0">{{__('On the other hand, we denounce with righteous indignation and dislike men who are so beguiled')}}</p>
                                    </div>
                                </div>
                                <div class="timeline-option">
                                    <img src="{{ url('assets/img/lightbox-1.jpg') }}" class="timeline-img"/>
                                    <img src="{{ url('assets/img/lightbox-2.jpg') }}" class="timeline-img"/>
                                    <img src="{{ url('assets/img/lightbox-3.jpg') }}" class="timeline-img"/>
                                    <img src="{{ url('assets/img/lightbox-1.jpg') }}" class="timeline-img"/>
                                    <img src="{{ url('assets/img/lightbox-2.jpg') }}" class="timeline-img"/>
                                    <img src="{{ url('assets/img/lightbox-3.jpg') }}" class="timeline-img"/>
                                    <img src="{{ url('assets/img/lightbox-1.jpg') }}" class="timeline-img"/>
                                    <img src="{{ url('assets/img/lightbox-2.jpg') }}" class="timeline-img"/>
                                    <img src="{{ url('assets/img/lightbox-3.jpg') }}" class="timeline-img"/>
                                </div>
                            </article>
                            <article class="timeline-item">
                                <div class="timeline-option text-right">
                                    <div class="media text-center">
                                        <img class="align-self-center mr-3 rounded-circle ml-auto mr-auto" src="{{ url('assets/img/lightbox-4.jpg') }}" height="150px" width="150px">
                                        <i class="las la-play video-icon"></i>
                                    </div>
                                </div>
                                <div class="timeline-desk">
                                    <div class="timeline-box">
                                        <span class="arrow"></span>
                                        <span class="timeline-icon"><i class="lar la-dot-circle"></i></span>
                                        <h4 class="mt-0 font-16">{{__('9 hours ago')}}</h4>
                                        <p class=" text-muted"><small>{{__('04:18 am')}}</small></p>
                                        <p class="mb-0">{{__('consectetur adipisicing elit. Iusto, optio, dolorum')}} <a href="#">{{__('John deon')}}</a> x{{__('ohn deon')}} </p>
                                    </div>
                                </div>
                            </article>
                            <article class="timeline-item timeline-item-left">
                                <div class="timeline-desk">
                                    <div class="timeline-box">
                                        <span class="arrow-alt"></span>
                                        <span class="timeline-icon"><i class="lar la-dot-circle"></i></span>
                                        <h4 class="mt-0 font-16">{{__('21 hours ago')}}</h4>
                                        <p class="text-muted"><small>{{__('21 hours ago')}}x</small></p>
                                        <p>{{__('On the other hand, we denounce with righteous indignation and dislike men who are so beguiled')}}</p>
                                        <div class="timeline-album">
                                            <a href="javascript: void(0);">
                                                <img alt="" src="{{ url('assets/img/lightbox-1.jpg') }}">
                                            </a>
                                            <a href="javascript: void(0);">
                                                <img alt="" src="{{ url('assets/img/lightbox-2.jpg') }}">
                                            </a>
                                            <a href="javascript: void(0);">
                                                <img alt="" src="{{ url('assets/img/lightbox-3.jpg') }}">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-option pt-1">
                                    <blockquote class="blockquote mt-5 ml-3">
                                        <p class="mb-0">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.')}}</p>
                                        <footer class="blockquote-footer">{{__('Someone famous in')}} <cite title="{{__('Source Title')}}">{{__('Source Title')}}</cite></footer>
                                    </blockquote>
                                </div>
                            </article>
                            <article class="timeline-item">
                                <div class="timeline-desk">
                                    <div class="timeline-box">
                                        <span class="arrow"></span>
                                        <span class="timeline-icon"><i class="lar la-dot-circle"></i></span>
                                        <h4 class="mt-0 font-16">{{__('23 hours ago')}}</h4>
                                        <p class="text-muted"><small>{{__('06:15 pm')}}</small></p>
                                        <p class="mb-0">{{__('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour')}}</p>
                                    </div>
                                </div>
                            </article>
                            <article class="timeline-item  timeline-item-left">
                                <div class="timeline-desk">
                                    <div class="panel">
                                        <div class="timeline-box">
                                            <span class="arrow-alt"></span>
                                            <span class="timeline-icon"><i class="lar la-dot-circle"></i></span>
                                            <h4 class="mt-0 font-16">{{__('24 hours ago')}}</h4>
                                            <p class="text-muted"><small>{{__('06:15 pm')}}</small></p>
                                            <p class="mb-0">{{__('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="timeline-item">
                                <h2 class="m-0 d-none">&nbsp;</h2>
                                <div class="time-show">
                                    <a href="#" class="btn btn-primary width-lg">{{__('Last 3 month')}}</a>
                                </div>
                            </article>
                            <article class="timeline-item">
                                <div class="timeline-option text-right">
                                    <div class="media text-center">
                                        <img class="align-self-center mr-3 rounded-circle ml-auto mr-auto" src="{{ url('assets/img/lightbox-2.jpg') }}" height="150px" width="150px">
                                        <i class="las la-play video-icon"></i>
                                    </div>
                                </div>
                                <div class="timeline-desk">
                                    <div class="panel">
                                        <div class="timeline-box">
                                            <span class="arrow"></span>
                                            <span class="timeline-icon"><i class="lar la-dot-circle"></i></span>
                                            <h4 class="mt-0 font-16">{{__('31 June 2020')}}</h4>
                                            <p class="text-muted"><small>{{__('02:31 pm')}}</small></p>
                                            <p class="mb-0">{{__('On the other hand, we denounce with righteous indignation and dislike men who are so beguiled')}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="timeline-item timeline-item-left">
                                <div class="timeline-desk">
                                    <div class="panel">
                                        <div class="timeline-box">
                                            <span class="arrow-alt"></span>
                                            <span class="timeline-icon"><i class="lar la-dot-circle"></i></span>
                                            <h4 class="mt-0 font-16">{{__('28 May 2020')}}</h4>
                                            <p class="text-muted"><small>{{__('05:35 am')}}</small></p>
                                            <p class="mb-0">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-option pt-1">
                                    <blockquote class="blockquote mt-5 ml-3">
                                        <p class="mb-0">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.')}}</p>
                                        <footer class="blockquote-footer">{{__('Someone famous in')}} <cite title="{{__('Source Title')}}">{{__('Source Title')}}</cite></footer>
                                    </blockquote>
                                </div>
                            </article>
                            <article class="timeline-item">
                                <div class="timeline-desk">
                                    <div class="panel">
                                        <div class="timeline-box">
                                            <span class="arrow"></span>
                                            <span class="timeline-icon"><i class="lar la-dot-circle"></i></span>
                                            <h4 class="mt-0 font-16">{{__('08:25 am')}}</h4>
                                            <p class="text-muted"><small>{{__('08:25 am')}}</small></p>
                                            <p class="mb-0">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="timeline-item">
                                <h2 class="m-0 d-none">&nbsp;</h2>
                                <div class="time-show">
                                    <a href="#" class="btn btn-primary width-lg">{{__('Last Year')}}</a>
                                </div>
                            </article>
                            <article class="timeline-item timeline-item-left">
                                <div class="timeline-desk">
                                    <div class="panel">
                                        <div class="timeline-box">
                                            <span class="arrow-alt"></span>
                                            <span class="timeline-icon"><i class="lar la-dot-circle"></i></span>
                                            <h4 class="mt-0 font-16">{{__('21 December 2019')}}</h4>
                                            <p class="text-muted"><small>{{__('05:25 pm')}}</small></p>
                                            <p class="mb-0">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-option">
                                    <img src="{{ url('assets/img/lightbox-1.jpg') }}" class="timeline-img"/>
                                    <img src="{{ url('assets/img/lightbox-2.jpg') }}" class="timeline-img"/>
                                    <img src="{{ url('assets/img/lightbox-3.jpg') }}" class="timeline-img"/>
                                    <img src="{{ url('assets/img/lightbox-1.jpg') }}" class="timeline-img"/>
                                    <img src="{{ url('assets/img/lightbox-3.jpg') }}" class="timeline-img"/>
                                    <img src="{{ url('assets/img/lightbox-3.jpg') }}" class="timeline-img"/>
                                    <img src="{{ url('assets/img/lightbox-1.jpg') }}" class="timeline-img"/>
                                    <img src="{{ url('assets/img/lightbox-2.jpg') }}" class="timeline-img"/>
                                    <img src="{{ url('assets/img/lightbox-3.jpg') }}" class="timeline-img"/>
                                </div>
                            </article>
                            <article class="timeline-item">
                                <div class="timeline-desk">
                                    <div class="panel">
                                        <div class="timeline-box">
                                            <span class="arrow"></span>
                                            <span class="timeline-icon"><i class="lar la-dot-circle"></i></span>
                                            <h4 class="mt-0 font-16">{{__('16 November 2019')}}</h4>
                                            <p class="text-muted"><small>{{__('12:32 pm')}}</small></p>
                                            <p class="mb-0">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
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
