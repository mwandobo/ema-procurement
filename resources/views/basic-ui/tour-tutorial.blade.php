@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/basic-ui/tour_tutorial.css') !!}
    {!! Html::style('plugins/hopscotch/hopscotch.min.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Tour Tutorial')}}</span></li>
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
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow p-4">
                                    <div class="jumbotron">
                                        <div class="container" id="upperContent">
                                            <img src="{{ url('assets/img/profile-10.jpg') }}" class="rounded-circle img-thumbnail img" />
                                            <h1 class="display-4 mt-2">{{__('Hello, world!')}}</h1>
                                            <p class="mt-3">{{__('Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.')}}</p>
                                            <p class="mt-3 mb-0">
                                                <a class="btn btn-primary btn-sm" href="#" role="button">{{__('Learn more »')}}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <!-- Example row of columns -->
                                        <div class="row">
                                            <div class="col-md-4" id="lowerContentLeft">
                                                <h2 class="d-inline ">{{__('Heading')}}</h2>
                                                <p class="mt-3">{{__('Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.')}}</p>
                                                <p class="mt-3">
                                                    <a class="btn btn-secondary" href="#" role="button">{{__('View details »')}}</a>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <h2>{{__('Heading')}}</h2>
                                                <p>{{__('Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.')}}</p>
                                                <p class="mt-3">
                                                    <a class="btn btn-secondary" href="#" role="button">{{__('View details »')}}</a>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <h2>{{__('Heading')}}</h2>
                                                <p>{{__('Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.')}}</p>
                                                <p class="mt-3">
                                                    <a class="btn btn-secondary" href="#" role="button">{{__('View details »')}}</a>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div id="documentation">
                                            <p class="documentation font-20 w-50">{{__('All the options and events can be found in')}} <a href="http://fenixrepo.fao.org/cdn/faostat/js/hopscotch/0.2.6/demo/" target="_blank" class="text-primary strong">{{__('official documentation')}}</a></p>
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
    {!! Html::script('plugins/hopscotch/hopscotch.js') !!}
    {!! Html::script('assets/js/basicui/tour_tutorial.js') !!}
@endpush

@push('custom-scripts')

@endpush
