@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/ui-elements/pagination.css') !!}
    {!! Html::style('assets/css/pages/notifications.css') !!}
    {!! Html::style('assets/css/forms/switch-theme.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area Starts -->
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Notifications')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area Ends -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="apps-ticket col-xl-12 col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-xl-12 col-md-12 layout-spacing">
                        <div class="notifications-table-widget">
                            <div class="widget-heading">
                                <h5 class="">{{__('Notifications')}}</h5>
                                <div class="d-none d-md-flex switch-outer-container">
                                    {{__('Do not disturb')}}
                                    <span class="switch">
                                                <label>
                                                    <input type="checkbox" checked="checked" name="select">
                                                    <span></span>
                                                </label>
                                            </span>
                                </div>
                            </div>
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th><div class="th-content">{{__('Source')}}</div></th>
                                            <th><div class="th-content">{{__('Message')}}</div></th>
                                            <th><div class="th-content">{{__('Time')}}</div></th>
                                            <th><div class="th-content">{{__('Action')}}</div></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="las la-box font-20 mr-2"></i> {{__('Ecommerce')}}
                                                </div>
                                            </td>
                                            <td style="width: 300px;">{{__('2 new orders placed')}}</td>
                                            <td>{{__('2 new orders placed')}}</td>
                                            <td>
                                                <span class="btn btn-sm btn-primary"> {{__('View')}} </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="las la-user-plus font-20 mr-2"></i> {{__('People')}}
                                                </div>
                                            </td>
                                            <td style="width: 300px;">{{__('New user registered')}}</td>
                                            <td>{{__('5 minutes ago')}}</td>
                                            <td>
                                                N/A
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="las la-ticket-alt font-20 mr-2"></i> {{__('Tickets')}}
                                                </div>
                                            </td>
                                            <td style="width: 300px;">{{__('21 queries solved')}}</td>
                                            <td>{{__('1 hour ago')}}</td>
                                            <td>
                                                <span class="btn btn-sm btn-primary"> {{__('View')}} </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center text-danger">
                                                    <i class="las la-user-shield font-20 mr-2"></i> {{__('Admin')}}
                                                </div>
                                            </td>
                                            <td style="width: 300px;">{{__('New update available')}}</td>
                                            <td>{{__('1 day ago')}}</td>
                                            <td>
                                                <span class="btn btn-sm btn-danger">{{__('Update')}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="las la-user-friends font-20 mr-2"></i> Team
                                                </div>
                                            </td>
                                            <td style="width: 300px;">{{__('Inspection assigned - B0028Z')}}</td>
                                            <td>{{__('2 days ago')}}</td>
                                            <td>
                                                N/A
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center text-danger">
                                                    <i class="las la-user-shield font-20 mr-2"></i> {{__('Admin')}}
                                                </div>
                                            </td>
                                            <td style="width: 300px;">{{__('Server will be migrated after 3 days. Take all the necessary backups')}}</td>
                                            <td>{{__('10 days ago')}}</td>
                                            <td>
                                                N/A
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="las la-user-friends font-20 mr-2"></i> {{__('Team')}}
                                                </div>
                                            </td>
                                            <td style="width: 300px;">{{__('Presentation report has been created')}}</td>
                                            <td>{{__('15 days ago')}}</td>
                                            <td>
                                                N/A
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="las la-box font-20 mr-2"></i> {{__('Ecommerce')}}
                                                </div>
                                            </td>
                                            <td style="width: 300px;">{{__('1 new order placed')}}</td>
                                            <td>{{__('15 days ago')}}</td>
                                            <td>
                                                <span class="btn btn-sm btn-primary"> {{__('View')}} </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="las la-user-plus font-20 mr-2"></i> {{__('People')}}
                                                </div>
                                            </td>
                                            <td style="width: 300px;">{{__('New user registered')}}</td>
                                            <td>{{__('25 days ago')}}</td>
                                            <td>
                                                N/A
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="pagination p13">
                                        <ul class="mx-auto">
                                            <a href="#" class="prev"><li>{{__('Prev')}}</li></a>
                                            <a href="#"><li>1</li></a>
                                            <a href="#"><li>2</li></a>
                                            <a href="#"><li>3</li></a>
                                            <a href="#"><li>4</li></a>
                                            <a href="#"><li>5</li></a>
                                            <a class="is-active" href="#"><li>6</li></a>
                                            <a href="#" class="next"><li>{{__('Next')}}</li></a>
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
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
@endpush

@push('custom-scripts')

@endpush
