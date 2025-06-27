@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Notifications')}}</span></li>
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
                        <div class="row layout-top-spacing" id="cancel-row">
                            <div class="col-lg-12 col-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Bootstrap Toasts')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area pb-5">
                                        <button id="toast-btn" class="btn btn-primary">{{__('Open Toast')}}</button>
                                        <div style="position: absolute; top: 0; right: 0;z-index: 9999; margin-left: 20px; margin-right: 20px;">
                                            <div class="toast toast-primary fade hide" role="alert" data-delay="600000" aria-live="assertive" aria-atomic="true">
                                                <div class="toast-header">
                                                    <strong class="mr-auto">{{__('Toast')}}</strong>
                                                    <small class="meta-time">{{__('just now')}}</small>
                                                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="toast-body">
                                                    {{__('This is a bootstrap toast message.')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Simple Notification')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info default">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Top Left')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info top-left">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Top Center')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info top-center">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Top Right')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info top-right">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Bottom Left')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info bottom-left">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Bottom Center')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info bottom-center">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Bottom right')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info bottom-right">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('No Action')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info no-action">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Action Text')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info action-text">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Action Text Color')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info text-color">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Click Callback')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info click-callback">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4  layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Duration')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn btn-info duration">{{__('Show')}}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="text-center">{{__('Background Color')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area text-center">
                                        <button class="btn mb-2 btn-primary notification-bg-primary">{{__('Primary')}}</button>
                                        <button class="btn mb-2 btn-info notification-bg-info">{{__('Info')}}</button>
                                        <button class="btn mb-2 btn-success notification-bg-success">{{__('Success')}}</button>
                                        <button class="btn mb-2 btn-warning notification-bg-warning">{{__('Warning')}}</button>
                                        <button class="btn mb-2 btn-danger notification-bg-danger">{{__('Danger')}}</button>
                                        <button class="btn mb-2 btn-dark notification-bg-dark">{{__('Dark')}}</button>
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
    {!! Html::script('plugins/notification/snackbar/snackbar.min.js') !!}
    {!! Html::script('assets/js/basicui/notifications.js') !!}
    <script>
        var toastButton = document.getElementById("toast-btn");
        toastButton.onclick = function() {
            $('.toast').toast('show');
        }
    </script>
@endpush
