@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/ui-elements/ribbons.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Ribbons')}}</span></li>
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
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="card-box ribbon-container">
                                            <div class="ribbon ribbon-primary float-left"><i class="las la-check-circle"></i> {{__('Ribbon 1')}}</div>
                                            <div class="ribbon-content">
                                                <p class="mb-0">{{__('This is a ribbon aligned from left')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="card-box ribbon-container">
                                            <div class="ribbon ribbon-secondary float-right"><i class="las la-check-circle"></i> {{__('Ribbon 1')}}</div>
                                            <div class="ribbon-content">
                                                <p class="mb-0">{{__('This is a ribbon aligned from right')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                    </div>
                                    <div class="widget-content widget-content-area ribbon-container ribbon-two">
                                        <div class="card-box">
                                            <div class="ribbon ribbon-top-left">
                                                <span>{{__('Ribbon 2')}}</span>
                                            </div>
                                            <div class="ribbon ribbon-top-right">
                                                <span>{{__('Ribbon 2')}}</span>
                                            </div>
                                        </div>
                                        <div class="ribbon-content">
                                            <p>{{__('Lorem nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam mattis dictum aliquet. Nulla sapien mauris, eleifend et sem ac, commodo dapibus odio. Vivamus pretium nec odio cursus elementum. Suspendisse molestie ullamcorper ornare.')}}</p>
                                            <p class="mb-0">{{__('Lorem nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam mattis dictum aliquet. Nulla sapien mauris, eleifend et sem ac, commodo dapibus odio. Vivamus pretium nec odio cursus elementum. Suspendisse molestie ullamcorper ornare.')}}</p>
                                            <p>{{__('Lorem nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam mattis dictum aliquet. Nulla sapien mauris, eleifend et sem ac, commodo dapibus odio. Vivamus pretium nec odio cursus elementum. Suspendisse molestie ullamcorper ornare.')}}</p>
                                            <p class="mb-0">{{__('Lorem nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam mattis dictum aliquet. Nulla sapien mauris, eleifend et sem ac, commodo dapibus odio. Vivamus pretium nec odio cursus elementum. Suspendisse molestie ullamcorper ornare.')}}</p>
                                            <p>{{__('Lorem nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam mattis dictum aliquet. Nulla sapien mauris, eleifend et sem ac, commodo dapibus odio. Vivamus pretium nec odio cursus elementum. Suspendisse molestie ullamcorper ornare.')}}</p>
                                            <p class="mb-0">{{__('Lorem nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam mattis dictum aliquet. Nulla sapien mauris, eleifend et sem ac, commodo dapibus odio. Vivamus pretium nec odio cursus elementum. Suspendisse molestie ullamcorper ornare.')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="card-box ribbon-container">
                                            <div class="glow">&nbsp;</div>
                                            <div class="ribbon ribbon-primary float-left"><i class="las la-check-circle"></i> {{__('Glow Ribbon')}}</div>
                                            <div class="ribbon-content">
                                                <p class="mb-0">{{__('This is a glowy ribbon')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="card-box">
                                            <div class="ribbon-three"></div>
                                            <div class="ribbon-content">
                                                <p class="mb-0">{{__('Lorem nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam mattis dictum aliquet.')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                    </div>
                                    <div class="widget-content widget-content-area pt-3">
                                        <div class="card-box">
                                            <div class="ribbon-four">{{__('Rounded Ribbon')}}</div>
                                            <div class="ribbon-content">
                                                <p class="mb-0 mt-3">{{__('Lorem nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam mattis dictum aliquet.')}}</p>
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
