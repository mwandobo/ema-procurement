@extends('layout.master')

@push('plugin-styles')

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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('UI Elements')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Popovers')}}</span></li>
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
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Basic Popovers')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <a class="btn btn-primary rounded bs-popover mb-3" data-container="body" data-content="{{__('Tooltip using ANCHOR tag')}}">
                                            {{__('Link')}}
                                        </a>
                                        <button type="button" class="btn btn-success rounded bs-popover mb-3" data-container="body" data-content="{{__('Tooltip using BUTTON tag')}}">
                                            {{__('Button')}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Position Popovers')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <button type="button" class="btn btn-info mr-2 rounded bs-popover mb-4 ml-2" data-container="body" data-placement="top" data-content="{{__('Tooltip on top')}}">
                                            {{__('Top')}}
                                        </button>
                                        <button type="button" class="btn btn-danger mr-2 rounded bs-popover mb-4 ml-2" data-container="body" data-placement="right" data-content="{{__('Tooltip on right')}}">
                                            {{__('Right')}}
                                        </button>
                                        <button type="button" class="btn btn-warning mr-2 rounded bs-popover mb-4 ml-2" data-container="body" data-placement="bottom" data-content="{{__('Tooltip on bottom')}}">
                                            {{__('Bottom')}}
                                        </button>
                                        <button type="button" class="btn btn-secondary mr-2 rounded bs-popover mb-4 ml-2" data-container="body" data-placement="left" data-content="{{__('Tooltip on left')}}">
                                            {{__('Left')}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Click to dismiss Popover')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <a tabindex="0" class="btn btn-dark rounded bs-popover" data-container="body" data-trigger="focus" data-placement="right" data-content="{{__('Lorem ipsum dolor sit.')}}">
                                            {{__('Popover on Right')}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Other Popover')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <button type="button" class="btn btn-secondary btn-button-2 bs-popover rounded" data-container="body" data-trigger="hover" data-content="On Hover">
                                            {{__('On Hover')}}
                                        </button>
                                        <button type="button" class="btn btn-danger btn-button-4 bs-popover rounded" data-container="body" data-delay="1000" data-content="Delay 1s">
                                            {{__('Delay')}}
                                        </button>
                                        <button type="button" class="btn btn-warning btn-button-5 bs-popover rounded" data-container="body" data-animation="false" data-content="Disabled Animation">
                                            {{__('Disabled Animation')}}
                                        </button>
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
