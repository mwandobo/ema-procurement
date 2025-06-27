@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/basic-ui/custom_lightbox.css') !!}
    {!! Html::style('plugins/lightbox/css/lightgallery.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Lightbox')}}</span></li>
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
                        <div class="row layout-spacing layout-top-spacing">
                            <div class="col-lg-12">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Lightbox')}}</h4>
                                                <p class="ml-3">{{__('Click on the image to see the most advanced and option riched lightbox.')}}</p>
                                                <p class="ml-3 text-muted font-12"> {{__('Change the')}} <code>data-src</code> and <code>img src=""</code> {{__('to change the image and ')}}<code>data-sub-html</code> {{__('to change description and sub heading')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="demo-gallery">
                                            <ul id="lightgallery" class="list-unstyled row">
                                                <li class="col-xs-6 col-sm-4 col-md-4" data-responsive="{{asset('assets/img/lightbox-1.jpg')}}" data-src="{{asset('assets/img/lightbox-1.jpg')}}" data-sub-html="<h4>Amazing lightbox</h4><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>">
                                                    <a href="">
                                                        <img class="img-responsive" src="{{ url('assets/img/lightbox-1.jpg') }}">
                                                    </a>
                                                </li>
                                                <li class="col-xs-6 col-sm-4 col-md-4" data-responsive="{{asset('assets/img/lightbox-2.jpg')}}" data-src="{{asset('assets/img/lightbox-2.jpg')}}" data-sub-html="<h4>Touch and support for mobile devices.</h4><p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>">
                                                    <a href="">
                                                        <img class="img-responsive" src="{{ url('assets/img/lightbox-2.jpg') }}">
                                                    </a>
                                                </li>
                                                <li class="col-xs-6 col-sm-4 col-md-4" data-responsive="{{asset('assets/img/lightbox-3.jpg')}}" data-src="{{asset('assets/img/lightbox-3.jpg')}}" data-sub-html="<h4>Double-click/Double-tap to see actual size of the image.</h4><p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>">
                                                    <a href="">
                                                        <img class="img-responsive" src="{{ url('assets/img/lightbox-3.jpg') }}">
                                                    </a>
                                                </li>
                                                <li class="col-xs-6 col-sm-4 col-md-4" data-responsive="{{asset('assets/img/lightbox-4.jpg')}}" data-src="{{asset('assets/img/lightbox-4.jpg')}}" data-sub-html="<h4>Easily customizable via CSS (SCSS) and Settings.</h4><p> It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>">
                                                    <a href="">
                                                        <img class="img-responsive" src="{{ url('assets/img/lightbox-4.jpg') }}">
                                                    </a>
                                                </li>
                                                <li class="col-xs-6 col-sm-4 col-md-4" data-responsive="{{asset('assets/img/lightbox-5.jpg')}}" data-src="{{asset('assets/img/lightbox-5.jpg')}}" data-sub-html="<h4>Touch and support for mobile devices.</h4><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>">
                                                    <a href="">
                                                        <img class="img-responsive" src="{{ url('assets/img/lightbox-5.jpg') }}">
                                                    </a>
                                                </li>
                                                <li class="col-xs-6 col-sm-4 col-md-4" data-responsive="{{asset('assets/img/lightbox-6.jpg')}}" data-src="{{asset('assets/img/lightbox-6.jpg')}}" data-sub-html="<h4>Social sharing.</h4><p>It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>">
                                                    <a href="">
                                                        <img class="img-responsive" src="{{ url('assets/img/lightbox-6.jpg') }}">
                                                    </a>
                                                </li>
                                                <li class="col-xs-6 col-sm-4 col-md-4" data-responsive="{{asset('assets/img/lightbox-7.jpg')}}" data-src="{{asset('assets/img/lightbox-7.jpg')}}" data-sub-html="<h4>Supports zoom.</h4><p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>">
                                                    <a href="">
                                                        <img class="img-responsive" src="{{ url('assets/img/lightbox-7.jpg') }}">
                                                    </a>
                                                </li>
                                                <li class="col-xs-6 col-sm-4 col-md-4" data-responsive="{{asset('assets/img/lightbox-8.jpg')}}" data-src="{{asset('assets/img/lightbox-8.jpg')}}" data-sub-html="<h4>Keyboard Navigation for desktop.</h4><p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text layout. </p>">
                                                    <a href="">
                                                        <img class="img-responsive" src="{{ url('assets/img/lightbox-8.jpg') }}">
                                                    </a>
                                                </li>
                                                <li class="col-xs-6 col-sm-4 col-md-4" data-responsive="{{asset('assets/img/lightbox-9.jpg')}}" data-src="{{asset('assets/img/lightbox-9.jpg')}}" data-sub-html="<h4>Responsive images.</h4><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>">
                                                    <a href="">
                                                        <img class="img-responsive" src="{{ url('assets/img/lightbox-9.jpg') }}">
                                                    </a>
                                                </li>
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
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#lightgallery').lightGallery();
        });
    </script>
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/lightbox/js/lightgallery-all.min.js') !!}
    {!! Html::script('plugins/lightbox/js/jquery.mousewheel.min.js') !!}
@endpush

@push('custom-scripts')

@endpush
