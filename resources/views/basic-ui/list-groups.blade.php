@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/basic-ui/list_groups.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('List Groups')}}</span></li>
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
                        <div class="row layout-top-spacing list-groups-area">
                            <div class="col-md-6">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="card-body">
                                        <h4 class="header-title">{{__('Basic Example')}}</h4>
                                        <p class="sub-header">{{__('The most basic list group is an unordered list with list items and the proper classes.')}}
                                        </p>
                                        <ul class="list-group">
                                            <li class="list-group-item"><i class="las la-book mr-3 font-17"></i>{{__('Cras justo odio')}}</li>
                                            <li class="list-group-item"><i class="las la-camera mr-3 font-17"></i>{{__('Dapibus ac facilisis in')}}</li>
                                            <li class="list-group-item"><i class="las la-cube mr-3 font-17"></i>{{__('Morbi leo risus')}}</li>
                                            <li class="list-group-item"><i class="las la-eye mr-3 font-17"></i>{{__('Porta ac consectetur ac')}}</li>
                                            <li class="list-group-item"><i class="las la-home mr-3 font-17"></i>{{__('Vestibulum at eros')}}</li>
                                        </ul>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div>
                            <div class="col-md-6">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="card-body">
                                        <h4 class="header-title">{{__('Active items')}}</h4>
                                        <p class="sub-header">{{__('Add')}} <code>.active</code> to a <code>.list-group-item</code> {{__('to indicate the current active selection.')}}</p>
                                        <ul class="list-group">
                                            <li class="list-group-item active">{{__('}Cras justo odio')}}</li>
                                            <li class="list-group-item">{{__('Dapibus ac facilisis in')}}</li>
                                            <li class="list-group-item">{{__('Morbi leo risus')}}</li>
                                            <li class="list-group-item">{{__('Porta ac consectetur ac')}}</li>
                                            <li class="list-group-item">{{__('Vestibulum at eros')}}</li>
                                        </ul>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div>
                            <div class="col-md-6">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="card-body">
                                        <h4 class="header-title">{{__('Disabled items')}}</h4>
                                        <p class="sub-header">{{__('Add')}} <code>.disabled</code> to a <code>.list-group-item</code> to make it <em>appear</em> {{__('disabled. Click, Hover will not work here')}}</p>
                                        <ul class="list-group">
                                            <li class="list-group-item disabled">{{__('Cras justo odio')}}</li>
                                            <li class="list-group-item">{{__('Dapibus ac facilisis in')}}</li>
                                            <li class="list-group-item">{{__('Morbi leo risus')}}</li>
                                            <li class="list-group-item">{{__('Porta ac consectetur ac')}}</li>
                                            <li class="list-group-item">{{__('Vestibulum at eros')}}</li>
                                        </ul>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div>
                            <div class="col-md-6">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="card-body">
                                        <h4 class="header-title">{{__('Links and Buttons')}}</h4>
                                        <p class="sub-header">{{__('Use')}} <code>&lt;a&gt;</code>s or <code>&lt;button&gt;</code>s to create <em>actionable</em> {{__('list group items by adding')}} <code>.list-group-item-action</code>.</p>
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                {{__('Cras justo odio')}}
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">{{__('Dapibus ac facilisis in')}}</a>
                                            <button type="button" class="list-group-item list-group-item-action">{{__('Morbi leo risus')}}</button>
                                            <button type="button" class="list-group-item list-group-item-action">{{__('Porta ac consectetur ac')}}</button>
                                            <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">{{__('Vestibulum at eros')}}</a>
                                        </div>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div>
                            <div class="col-md-6">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="card-body">
                                        <h4 class="header-title">{{__('Flush')}}</h4>
                                        <p class="sub-header">{{__('Add')}} <code>.list-group-flush</code> {{__('to remove some borders and rounded corners to render list group items edge-to-edge in a parent container.')}}</p>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">{{__('Cras justo odio')}}</li>
                                            <li class="list-group-item">{{__('Dapibus ac facilisis in')}}</li>
                                            <li class="list-group-item">{{__('Morbi leo risus')}}</li>
                                            <li class="list-group-item">{{__('Porta ac consectetur ac')}}</li>
                                            <li class="list-group-item">{{__('Vestibulum at eros')}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="card-body">
                                        <h4 class="header-title">{{__('List group with image')}}</h4>
                                        <p class="sub-header">{{__('Add')}} <code>.disabled</code> to a <code>.list-group-item</code> {{__('to make it')}} <em>appear</em> {{__('disabled. Click, Hover will not work here')}}</p>
                                        <ul class="list-group list-group-media">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="media">
                                                    <div class="mr-3">
                                                        <img alt="avatar" src="{{ url('assets/img/profile-1.jpg') }}" class="img-fluid rounded-circle">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6>{{__('Jon Snow')}}</h6>
                                                        <p>{{__('Senior Developer')}}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action active">
                                                <div class="media">
                                                    <div class="mr-3">
                                                        <img alt="avatar" src="{{ url('assets/img/profile-2.jpg') }}" class="img-fluid rounded-circle">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6>{{__('Jeremy Lawson')}}</h6>
                                                        <p>{{__('Systems')}}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action ">
                                                <div class="media">
                                                    <div class="mr-3">
                                                        <img alt="avatar" src="{{ url('assets/img/profile-3.jpg') }}" class="img-fluid rounded-circle">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6>{{__('Josh Williamson')}}</h6>
                                                        <p>{{__('UI/UX Designer')}}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action ">
                                                <div class="media">
                                                    <div class="mr-3">
                                                        <img alt="avatar" src="{{ url('assets/img/profile-20.jpg') }}" class="img-fluid rounded-circle">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6>{{__('Sara Jonas')}}</h6>
                                                        <p>{{__('UI/UX Designer')}}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div>
                            <div class="col-md-6">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="card-body">
                                        <h4 class="header-title">{{__('Contextual classes')}}</h4>
                                        <p class="sub-header">{{__('Use contextual classes to style list items with a stateful background and color.')}}</p>
                                        <ul class="list-group">
                                            <li class="list-group-item">{{__('Dapibus ac facilisis in')}}</li>
                                            <li class="list-group-item list-group-item-primary">{{__('A simple primary list group item')}}</li>
                                            <li class="list-group-item list-group-item-secondary">{{__('A simple secondary list group item')}}</li>
                                            <li class="list-group-item list-group-item-success">{{__('A simple success list group item')}}</li>
                                            <li class="list-group-item list-group-item-danger">{{__('A simple danger list group item')}}</li>
                                            <li class="list-group-item list-group-item-warning">{{__('A simple warning list group item')}}</li>
                                            <li class="list-group-item list-group-item-info">{{__('A simple info list group item')}}</li>
                                            <li class="list-group-item list-group-item-light">{{__('A simple light list group item')}}</li>
                                            <li class="list-group-item list-group-item-dark">{{__('A simple dark list group item')}}</li>
                                        </ul>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div>
                            <div class="col-md-6">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="card-body">
                                        <h4 class="header-title">{{__('Contextual classes with Link')}}</h4>
                                        <p class="sub-header">{{__('Use contextual classes to style list items with a stateful background and color.')}}</p>
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action">{{__('Dapibus ac facilisis in')}}</a>
                                            <a href="#" class="list-group-item list-group-item-action list-group-item-primary">{{__('A simple primary list group item')}}</a>
                                            <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">{{__('A simple secondary list group item')}}</a>
                                            <a href="#" class="list-group-item list-group-item-action list-group-item-success">{{__('A simple success list group item')}}</a>
                                            <a href="#" class="list-group-item list-group-item-action list-group-item-danger">{{__('A simple danger list group item')}}</a>
                                            <a href="#" class="list-group-item list-group-item-action list-group-item-warning">{{__('A simple warning list group item')}}</a>
                                            <a href="#" class="list-group-item list-group-item-action list-group-item-info">{{__('A simple info list group item')}}</a>
                                            <a href="#" class="list-group-item list-group-item-action list-group-item-light">{{__('A simple light list group item')}}</a>
                                            <a href="#" class="list-group-item list-group-item-action list-group-item-dark">{{__('A simple dark list group item')}}</a>
                                        </div>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div>
                            <div class="col-md-6">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="card-body">
                                        <h4 class="header-title">{{__('With badges')}}</h4>
                                        <p class="sub-header">{{__('Add badges to any list group item to show unread counts, activity, and more with the help of some utilities.')}}</p>
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                {{__('Unread Mails')}}
                                                <span class="badge badge-primary badge-pill">20</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                {{__('Pending Tasks')}}
                                                <span class="badge badge-success badge-pill">40</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                {{__('Notifications')}}
                                                <span class="badge badge-danger badge-pill">99+</span>
                                            </li>
                                        </ul>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
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
