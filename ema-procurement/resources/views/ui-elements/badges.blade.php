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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('UI Elements')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Badges')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Starts / Breadcrumb Area  -->
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
                                                <h4>{{__('Default Badges')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <span class="badge badge-primary">{{__('Primary')}}</span>
                                        <span class="badge badge-info">{{__('Info')}}</span>
                                        <span class="badge badge-success">{{__('Success')}}</span>
                                        <span class="badge badge-secondary">{{__('Secondary')}}</span>
                                        <span class="badge badge-warning">{{__('Warning')}}</span>
                                        <span class="badge badge-danger">{{__('Danger')}}</span>
                                        <span class="badge badge-dark">{{__('Dark')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Outline Badges')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <span class="badge outline-badge-primary">{{__('Primary')}}</span>
                                        <span class="badge outline-badge-info">{{__('Info')}}</span>
                                        <span class="badge outline-badge-success">{{__('Success')}}</span>
                                        <span class="badge outline-badge-secondary">{{__('Secondary')}}</span>
                                        <span class="badge outline-badge-warning">{{__('Warning')}}</span>
                                        <span class="badge outline-badge-danger">{{__('Danger')}}</span>
                                        <span class="badge outline-badge-dark">{{__('Dark')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing offset-md-3">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Rounded Badges')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <span class="badge badge-rounded badge-primary">{{__('Primary')}}</span>
                                        <span class="badge badge-rounded outline-badge-primary">{{__('Primary')}}</span>
                                        <span class="badge badge-rounded badge-danger">{{__('Danger')}}</span>
                                        <span class="badge badge-rounded outline-badge-danger">{{__('Danger')}}</span>
                                        <span class="badge badge-rounded badge-warning">{{__('Warning')}}</span>
                                        <span class="badge badge-rounded outline-badge-warning">{{__('Warning')}}</span>
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
