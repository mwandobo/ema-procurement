@extends('layout.master')

@push('plugin-styles')

@endpush

@push('style')
    <style>
        .display-4 {
            word-break: break-word;
        }
    </style>
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Jumbotron')}}</span></li>
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
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Jumbotron')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="mb-4">{{__('Lightweight, flexible component for showcasing hero unit style content.')}}</p>
                                        <div class="jumbotron">
                                            <h1 class="display-4">{{__('Hello, world!')}}</h1>
                                            <p class="lead">{{__('This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.')}}</p>
                                            <hr class="my-4">
                                            <p>{{__('It uses utility classes for typography and spacing to space content out within the larger container.')}}</p>
                                            <p class="lead">
                                                <a class="btn btn-primary btn-lg" href="#" role="button">{{__('Learn more')}}</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Jumbotron Fluid')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="mb-4">{{__('To make the jumbotron full width, and without rounded corners, add the')}} <code>.jumbotron-fluid</code> modifier class and add a <code>.container</code> or <code>.container-fluid</code> within.</p>
                                        <div class="jumbotron jumbotron-fluid">
                                            <div class="container">
                                                <h1 class="display-4">{{__('Fluid jumbotron')}}</h1>
                                                <p class="lead">{{__('This is a modified jumbotron that occupies the entire horizontal space of its parent.')}}</p>
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
