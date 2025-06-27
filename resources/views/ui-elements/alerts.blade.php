@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/ui-elements/alert.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Alerts')}}</span></li>
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
                                                <h4>{{__('Basic Alerts')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="alert alert-primary mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Primary!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                        <div class="alert alert-warning mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Warning!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                        <div class="alert alert-success mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Success!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                        <div class="alert alert-info mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Info!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                        <div class="alert alert-dark mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Dark!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                        <div class="alert alert-danger mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Danger!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Gradient Alerts')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="alert alert-primary bg-gradient-primary mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Primary!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                        <div class="alert alert-warning bg-gradient-warning mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Warning!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                        <div class="alert alert-success bg-gradient-success mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Success!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                        <div class="alert alert-info bg-gradient-info mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Info!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                        <div class="alert alert-dark bg-gradient-dark mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Dark!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                        <div class="alert alert-danger bg-gradient-danger mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Danger!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Outline Alerts')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="alert alert-outline-primary mb-4 text-primary" role="alert">
                                            <button type="button" class="close text-primary" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Primary!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                        <div class="alert alert-outline-warning text-warning mb-4" role="alert">
                                            <button type="button" class="close text-warning" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Warning!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                        <div class="alert alert-outline-dark text-dark mb-4" role="alert">
                                            <button type="button" class="close text-dark" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Dark!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                        <div class="alert alert-outline-danger text-danger mb-4" role="alert">
                                            <button type="button" class="close text-danger" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Danger!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                        <div class="alert alert-outline-success text-success mb-4" role="alert">
                                            <button type="button" class="close text-success" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Success!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                        <div class="alert alert-outline-info text-info mb-4" role="alert">
                                            <button type="button" class="close text-info" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Info!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Light Alerts')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="alert alert-light-info text-info mb-4" role="alert">
                                            <button type="button" class="close text-info" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Info!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                        <div class="alert alert-light-primary text-primary mb-4" role="alert">
                                            <button type="button" class="close text-primary" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Info!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                        <div class="alert alert-light-dark text-dark mb-4" role="alert">
                                            <button type="button" class="close text-dark" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Info!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                        <div class="alert alert-light-danger text-danger mb-4" role="alert">
                                            <button type="button" class="close text-danger" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Info!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                        <div class="alert alert-light-success text-success mb-4" role="alert">
                                            <button type="button" class="close text-success" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Info!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                        <div class="alert alert-light-warning text-warning mb-4" role="alert">
                                            <button type="button" class="close text-warning" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times"></i>
                                            </button>
                                            <strong>{{__('Info!')}}</strong> {{__('Lorem Ipsum is simply dummy text of the.')}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Alerts with icon')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="alert alert-icon-left alert-light-success mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times text-success"></i>
                                            </button>
                                            <i class="las la-check-double"></i>
                                            <strong>{{__('Success!')}}</strong> {{__('Lorem Ipsum dummy printing.')}}
                                        </div>
                                        <div class="alert alert-icon-right alert-light-warning mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times text-warning"></i>
                                            </button>
                                            <i class="las la-exclamation-triangle"></i>
                                            <strong>{{__('Hi')}}Warning!</strong> {{__('Lorem Ipsum dummy printing.')}}
                                        </div>
                                        <div class="alert alert-icon-left alert-light-info mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times text-info"></i>
                                            </button>
                                            <i class="las la-exclamation-circle"></i>
                                            <strong>{{__('Info!')}}</strong> {{__('Lorem Ipsum dummy printing.')}}
                                        </div>
                                        <div class="alert alert-icon-right alert-light-primary mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times text-primary"></i>
                                            </button>
                                            <i class="las la-grin-beam"></i>
                                            <strong>{{__('Primary!')}}</strong> {{__('Lorem Ipsum dummy printing.')}}
                                        </div>
                                        <div class="alert alert-icon-left alert-light-danger mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times text-danger"></i>
                                            </button>
                                            <i class="las la-trash-alt"></i>
                                            <strong>{{__('Danger!')}}</strong> {{__('Lorem Ipsum dummy printing.')}}
                                        </div>
                                        <div class="alert alert-icon-right alert-light-dark mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times text-dark"></i>
                                            </button>
                                            <i class="las la-moon"></i>
                                            <strong>{{__('Dark!')}}</strong> {{__('Lorem Ipsum dummy printing.')}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Alerts with Button')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="alert alert-icon-button-left alert-light-success text-success-teal mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times text-success-teal"></i>
                                            </button>
                                            <i class="las la-check-double text-success-teal font-20"></i>
                                            <strong>{{__('Success!')}}</strong> {{__('Lorem Ipsum dummy printing.')}}
                                            <button type="button" class="btn btn-sm bg-gradient-success float-right mr-2 text-white" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                {{__('Dismiss')}}
                                            </button>
                                        </div>
                                        <div class="alert alert-icon-button-left alert-light-warning text-warning mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times text-warning"></i>
                                            </button>
                                            <i class="las la-exclamation-triangle text-warning font-20"></i>
                                            <strong>{{__('Warning!')}}</strong> {{__('Lorem Ipsum dummy printing.')}}
                                            <button type="button" class="btn btn-sm bg-gradient-warning float-right mr-2 text-white" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                {{__('Dismiss')}}
                                            </button>
                                        </div>
                                        <div class="alert alert-icon-button-left alert-light-info text-info mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times text-info"></i>
                                            </button>
                                            <i class="las la-exclamation-circle text-info font-20"></i>
                                            <strong>{{__('Info!')}}</strong> {{__('Lorem Ipsum dummy printing.')}}
                                            <button type="button" class="btn btn-sm bg-gradient-info float-right mr-2 text-white" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                {{__('Dismiss')}}
                                            </button>
                                        </div>
                                        <div class="alert alert-icon-button-left alert-light-primary text-primary mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times text-primary"></i>
                                            </button>
                                            <i class="las la-grin-beam text-primary font-20"></i>
                                            <strong>{{__('Primary!')}}</strong> {{__('Lorem Ipsum dummy printing.')}}
                                            <button type="button" class="btn btn-sm bg-gradient-primary float-right mr-2 text-white" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                {{__('Dismiss')}}
                                            </button>
                                        </div>
                                        <div class="alert alert-icon-button-left alert-light-danger text-danger mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}Close">
                                                <i class="las la-times text-danger"></i>
                                            </button>
                                            <i class="las la-trash-alt text-danger font-20"></i>
                                            <strong>{{__('Danger!')}}</strong> {{__('Lorem Ipsum dummy printing.')}}
                                            <button type="button" class="btn btn-sm bg-gradient-danger float-right mr-2 text-white" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                {{__('Dismiss')}}
                                            </button>
                                        </div>
                                        <div class="alert alert-icon-button-left alert-light-dark text-dark mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                <i class="las la-times text-dark"></i>
                                            </button>
                                            <i class="las la-trash-alt text-dark font-20"></i>
                                            <strong>{{__('Dark!')}}</strong> {{__('Lorem Ipsum dummy printing.')}}
                                            <button type="button" class="btn btn-sm bg-gradient-dark float-right mr-2 text-white" data-dismiss="alert" aria-label="{{__('Close')}}">
                                                {{__('Dismiss')}}
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
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
@endpush

@push('custom-scripts')

@endpush
