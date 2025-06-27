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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('List Group')}}</span></li>
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
                                                <h4>{{__('Basic Listgroup')}}</h4>
                                                <p class="ml-3">{{__('The most basic list group is an unordered list with list items and the proper classes. Build upon it with the options that follow, or with your own CSS as needed.')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <ul class="list-group">
                                            <li class="list-group-item"><i class="las la-home"></i> {{__('Home')}}</li>
                                            <li class="list-group-item"><i class="las la-user"></i> {{__('About Us')}}</li>
                                            <li class="list-group-item"><i class="las la-box"></i> {{__('Orders')}}</li>
                                            <li class="list-group-item"><i class="las la-envelope"></i> {{__('Messages')}}</li>
                                            <li class="list-group-item"><i class="las la-phone"></i> {{__('Contact Us')}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Active Listgroup')}}</h4>
                                                <p class="ml-3">{{__('Add')}} <code>.active</code> to a <code>.list-group-item</code> {{__('to indicate the current active selection.')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <ul class="list-group">
                                            <li class="list-group-item active"><i class="las la-home"></i>{{__('Home')}} </li>
                                            <li class="list-group-item"><i class="las la-user"></i> {{__('About Us')}}</li>
                                            <li class="list-group-item"><i class="las la-box"></i> {{__('Orders')}}</li>
                                            <li class="list-group-item"><i class="las la-envelope"></i> {{__('Messages')}}</li>
                                            <li class="list-group-item"><i class="las la-phone"></i> {{__('Contact Us')}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Disabled Listgroup')}}</h4>
                                                <p class="ml-3">{{__('Add')}} <code>.disabled</code> to a <code>.list-group-item</code> {{__('to make it')}} <em>appear</em> {{__('disabled')}}.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <ul class="list-group">
                                            <li class="list-group-item disabled"><i class="las la-home"></i> {{__('Home')}}</li>
                                            <li class="list-group-item"><i class="las la-user"></i> {{__('About Us')}}</li>
                                            <li class="list-group-item"><i class="las la-box"></i>{{__('Orders')}} </li>
                                            <li class="list-group-item"><i class="las la-envelope"></i>{{__('Messages')}} </li>
                                            <li class="list-group-item"><i class="las la-phone"></i> {{__('Contact Us')}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Listgroup with links and buttons')}}</h4>
                                                <p class="ml-3">{{__('Use')}} <code>&lt;a&gt;</code>s or <code>&lt;button&gt;</code>s to create <em>actionable</em> {{__('list group items with hover, disabled, and active states by adding')}} <code>.list-group-item-action</code>.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <ul class="list-group">
                                            <div class="list-group">
                                                <a href="#" class="list-group-item list-group-item-action active">
                                                    {{__('Home')}}
                                                </a>
                                                <a href="#" class="list-group-item list-group-item-action">{{__('About Us')}}</a>
                                                <button type="button" class="list-group-item list-group-item-action">{{__('Orders')}}</button>
                                                <button type="button" class="list-group-item list-group-item-action">{{__('Messages')}}</button>
                                                <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">{{__('Contact Us')}}</a>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Flush Listgroup')}}</h4>
                                                <p class="ml-3">{{__('Add')}} <code>.list-group-flush</code> {{__('to remove some borders and rounded corners to render list group items edge-to-edge in a parent container (e.g., cards).')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><i class="las la-home"></i> {{__('Home')}}</li>
                                            <li class="list-group-item"><i class="las la-user"></i> {{__('About Us')}}</li>
                                            <li class="list-group-item"><i class="las la-box"></i> {{__('Orders')}}</li>
                                            <li class="list-group-item"><i class="las la-envelope"></i> {{__('Messages')}}</li>
                                            <li class="list-group-item"><i class="las la-phone"></i> {{__('Contact Us')}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Listgroup Horizontal')}}</h4>
                                                <p class="ml-3">{{__('Add')}} <code>.list-group-horizontal</code> {{__('to change the layout of list group items from vertical to horizontal across all breakpoints. Alternatively, choose a responsive variant')}} <code>.list-group-horizontal-{sm|md|lg|xl}</code> {{__('to make a list group horizontal starting at that breakpoint’s')}} <code>min-width</code>.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <ul class="list-group list-group-horizontal mb-3">
                                            <li class="list-group-item">{{__('Home')}}</li>
                                            <li class="list-group-item">{{__('About Us')}}</li>
                                            <li class="list-group-item">{{__('Contact Us')}}</li>
                                        </ul>
                                        <ul class="list-group list-group-horizontal-sm mb-3">
                                            <li class="list-group-item">{{__('Home')}}</li>
                                            <li class="list-group-item">{{__('About Us')}}</li>
                                            <li class="list-group-item">{{__('Contact Us')}}</li>
                                        </ul>
                                        <ul class="list-group list-group-horizontal-md">
                                            <li class="list-group-item">{{__('Home')}}</li>
                                            <li class="list-group-item">{{__('About Us')}}</li>
                                            <li class="list-group-item">{{__('Contact Us')}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Contextual classes')}}</h4>
                                                <p class="ml-3">{{__('Use contextual classes to style list items with a stateful background and color.')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <ul class="list-group">
                                            <li class="list-group-item">{{__('Default')}}</li>
                                            <li class="list-group-item list-group-item-primary">{{__('Primary')}}</li>
                                            <li class="list-group-item list-group-item-secondary">{{__('Secondary')}}</li>
                                            <li class="list-group-item list-group-item-success">{{__('Success')}}</li>
                                            <li class="list-group-item list-group-item-danger">{{__('Danger')}}</li>
                                            <li class="list-group-item list-group-item-warning">{{__('Warning')}}</li>
                                            <li class="list-group-item list-group-item-info">{{__('Info')}}</li>
                                            <li class="list-group-item list-group-item-light">{{__('Light')}}</li>
                                            <li class="list-group-item list-group-item-dark">{{__('Dark')}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Contextual classes with Link')}}</h4>
                                                <p class="ml-3">{{__('Use contextual classes to style list items with a stateful background and color.')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item">{{__('Default')}}</a>
                                            <a href="#" class="list-group-item list-group-item-primary">{{__('Primary')}}</a>
                                            <a href="#" class="list-group-item list-group-item-secondary">{{__('Secondary')}}</a>
                                            <a href="#" class="list-group-item list-group-item-success">{{__('Success')}}</a>
                                            <a href="#" class="list-group-item list-group-item-danger">{{__('Danger')}}</a>
                                            <a href="#" class="list-group-item list-group-item-warning">{{__('Warning')}}</a>
                                            <a href="#" class="list-group-item list-group-item-info">{{__('Info')}}</a>
                                            <a href="#" class="list-group-item list-group-item-light">{{__('Light')}}</a>
                                            <a href="#" class="list-group-item list-group-item-dark">{{__('Dark')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Custom Content')}}</h4>
                                                <p class="ml-3">{{__('Add nearly any HTML within, even for linked list groups like the one below, with the help of flexbox utilities.')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1 text-white">{{__('List group item heading')}}</h5>
                                                    <small>{{__('3 days ago')}}</small>
                                                </div>
                                                <p class="mb-1 text-white">{{__('Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.')}}</p>
                                                <small>{{__('vDonec id elit non mi porta.')}}</small>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">{{__('List group item heading')}}</h5>
                                                    <small class="text-muted">{{__('3 days ago')}}</small>
                                                </div>
                                                <p class="mb-1">{{__('Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.')}}</p>
                                                <small class="text-muted">{{__('Donec id elit non mi porta.')}}</small>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">{{__('List group item heading')}}</h5>
                                                    <small class="text-muted">{{__('3 days ago')}}</small>
                                                </div>
                                                <p class="mb-1">{{__('Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.')}}</p>
                                                <small class="text-muted">{{__('Donec id elit non mi porta.')}}</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('With Badges')}}</h4>
                                                <p class="ml-3">{{__('Add badges to any list group item to show unread counts, activity, and more with the help of some utilities.')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                {{__('Unread Emails')}}
                                                <span class="badge badge-primary badge-pill">14</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                {{__('Tasks to do')}}
                                                <span class="badge badge-success badge-pill">2</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                {{__('Notifications')}}
                                                <span class="badge badge-danger badge-pill">99+</span>
                                            </li>
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
