@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/animate.min.css') !!}
    {!! Html::style('assets/css/basic-ui/animation.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('Basic UI')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Animation')}}</span></li>
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
                    <div class="container p-0">
                        <div class="row layout-top-spacing">
                            <div class="col-lg-6 layout-spacing">
                                <div class="text-center">
                                    <div id="animateArea">
                                        <img class="img-fluid center-block" src="{{ url('assets/img/apple-watch.png') }}" alt="Card image cap">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing d-flex flex-column align-items-center justify-content-center">
                                <form class="">
                                    <div class="justify-content-center">
                                        <div class="input-group">
                                            <select class="form-control do-animation">
                                                <optgroup label="{{__('Default Animations')}}">
                                                    <option value="bounce">bounce</option>
                                                    <option value="flash">flash</option>
                                                    <option value="pulse">pulse</option>
                                                    <option value="rubberBand">rubberBand</option>
                                                    <option value="shake">shake</option>
                                                    <option value="swing">swing</option>
                                                    <option value="tada">tada</option>
                                                    <option value="wobble">wobble</option>
                                                    <option value="jello">jello</option>
                                                </optgroup>
                                                <optgroup label="{{__('Bouncing In')}}">
                                                    <option value="bounceIn">bounceIn</option>
                                                    <option value="bounceInDown">bounceInDown</option>
                                                    <option value="bounceInLeft">bounceInLeft</option>
                                                    <option value="bounceInRight">bounceInRight</option>
                                                    <option value="bounceInUp">bounceInUp</option>
                                                </optgroup>
                                                <optgroup label="{{__('Bouncing Out')}}">
                                                    <option value="bounceOut">bounceOut</option>
                                                    <option value="bounceOutDown">bounceOutDown</option>
                                                    <option value="bounceOutLeft">bounceOutLeft</option>
                                                    <option value="bounceOutRight">bounceOutRight</option>
                                                    <option value="bounceOutUp">bounceOutUp</option>
                                                </optgroup>
                                                <optgroup label="{{__('Fading In')}}">
                                                    <option value="fadeIn">fadeIn</option>
                                                    <option value="fadeInDown">fadeInDown</option>
                                                    <option value="fadeInDownBig">fadeInDownBig</option>
                                                    <option value="fadeInLeft">fadeInLeft</option>
                                                    <option value="fadeInLeftBig">fadeInLeftBig</option>
                                                    <option value="fadeInRight">fadeInRight</option>
                                                    <option value="fadeInRightBig">fadeInRightBig</option>
                                                    <option value="fadeInUp">fadeInUp</option>
                                                    <option value="fadeInUpBig">fadeInUpBig</option>
                                                </optgroup>
                                                <optgroup label="{{__('Fading Out')}}">
                                                    <option value="fadeOut">fadeOut</option>
                                                    <option value="fadeOutDown">fadeOutDown</option>
                                                    <option value="fadeOutDownBig">fadeOutDownBig</option>
                                                    <option value="fadeOutLeft">fadeOutLeft</option>
                                                    <option value="fadeOutLeftBig">fadeOutLeftBig</option>
                                                    <option value="fadeOutRight">fadeOutRight</option>
                                                    <option value="fadeOutRightBig">fadeOutRightBig
                                                    </option>
                                                    <option value="fadeOutUp">fadeOutUp</option>
                                                    <option value="fadeOutUpBig">fadeOutUpBig</option>
                                                </optgroup>
                                                <optgroup label="{{__('Flips')}}">
                                                    <option value="flip">flip</option>
                                                    <option value="flipInX">flipInX</option>
                                                    <option value="flipInY">flipInY</option>
                                                    <option value="flipOutX">flipOutX</option>
                                                    <option value="flipOutY">flipOutY</option>
                                                </optgroup>
                                                <optgroup label="{{__('Lightspeed In and Out')}}">
                                                    <option value="lightSpeedIn">lightSpeedIn</option>
                                                    <option value="lightSpeedOut">lightSpeedOut</option>
                                                </optgroup>
                                                <optgroup label="{{__('Rotating In')}}">
                                                    <option value="rotateIn">rotateIn</option>
                                                    <option value="rotateInDownLeft">rotateInDownLeft
                                                    </option>
                                                    <option value="rotateInDownRight">rotateInDownRight
                                                    </option>
                                                    <option value="rotateInUpLeft">rotateInUpLeft</option>
                                                    <option value="rotateInUpRight">rotateInUpRight
                                                    </option>
                                                </optgroup>
                                                <optgroup label="{{__('Rotating Out')}}">
                                                    <option value="rotateOut">rotateOut</option>
                                                    <option value="rotateOutDownLeft">rotateOutDownLeft
                                                    </option>
                                                    <option value="rotateOutDownRight">
                                                        rotateOutDownRight
                                                    </option>
                                                    <option value="rotateOutUpLeft">rotateOutUpLeft
                                                    </option>
                                                    <option value="rotateOutUpRight">rotateOutUpRight
                                                    </option>
                                                </optgroup>
                                                <optgroup label="{{__('Sliding In')}}">
                                                    <option value="slideInUp">slideInUp</option>
                                                    <option value="slideInDown">slideInDown</option>
                                                    <option value="slideInLeft">slideInLeft</option>
                                                    <option value="slideInRight">slideInRight</option>
                                                </optgroup>
                                                <optgroup label="{{__('Sliding Out')}}">
                                                    <option value="slideOutUp">slideOutUp</option>
                                                    <option value="slideOutDown">slideOutDown</option>
                                                    <option value="slideOutLeft">slideOutLeft</option>
                                                    <option value="slideOutRight">slideOutRight</option>
                                                </optgroup>
                                                <optgroup label="{{__('Zoom In')}}">
                                                    <option value="zoomIn">zoomIn</option>
                                                    <option value="zoomInDown">zoomInDown</option>
                                                    <option value="zoomInLeft">zoomInLeft</option>
                                                    <option value="zoomInRight">zoomInRight</option>
                                                    <option value="zoomInUp">zoomInUp</option>
                                                </optgroup>
                                                <optgroup label="{{__('Zoom Out')}}">
                                                    <option value="zoomOut">zoomOut</option>
                                                    <option value="zoomOutDown">zoomOutDown</option>
                                                    <option value="zoomOutLeft">zoomOutLeft</option>
                                                    <option value="zoomOutRight">zoomOutRight</option>
                                                    <option value="zoomOutUp">zoomOutUp</option>
                                                </optgroup>
                                                <optgroup label="{{__('Others')}}">
                                                    <option value="hinge">hinge</option>
                                                    <option value="rollIn">rollIn</option>
                                                    <option value="rollOut">rollOut</option>
                                                </optgroup>
                                            </select>
                                            <span class="input-group-append">
                                                            <button class="btn btn-sm btn-primary waves-light waves-effect do-animation" type="button">{{__('Animate Me !')}}
                                                            </button>
                                                          </span>
                                        </div>
                                        <!-- /input-group -->
                                    </div> <!-- end row-->
                                </form>
                                <p class="text-center p-3">{{__('Just add animation class name')}} <code>&#60;div class="bounce"&#62;</code> {{__('to an element to animate. Click here to read ')}}<a class="text-primary strong" href="https://animate.style/#documentation" target="_blank">{{__('Documentation')}}</a> </p>
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
    {!! Html::script('assets/js/basicui/animation.js') !!}
@endpush

@push('custom-scripts')

@endpush
