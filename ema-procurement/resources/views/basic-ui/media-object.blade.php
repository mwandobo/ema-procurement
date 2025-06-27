@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/basic-ui/custom_media_object.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Media Object')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Starts / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing media-object-area">
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
                                                <h4>{{__('Default')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="media">
                                            <img class="rounded" src="{{ url('assets/img/profile-10.jpg') }}" alt="pic1">
                                            <div class="media-body">
                                                <h4 class="media-heading">{{__('It\'s a Heading')}}</h4>
                                                <p class="media-text">{{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Image border')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="media">
                                            <img class="rounded img-thumbnail" src="{{ url('assets/img/profile-10.jpg') }}" alt="pic1">
                                            <div class="media-body">
                                                <h4 class="media-heading">{{__('It\'s a Heading')}}</h4>
                                                <p class="media-text">{{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Image on right')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="media">
                                            <div class="media-body">
                                                <h4 class="media-heading">{{__('It\'s a Heading')}}</h4>
                                                <p class="media-text">
                                                    {{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.')}}
                                                </p>
                                            </div>
                                            <img class="rounded" src="{{ url('assets/img/profile-10.jpg') }}" alt="pic1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('RTL')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area media-right-aligned">
                                        <div class="media">
                                            <div class="media-body text-right">
                                                <h4 class="media-heading">{{__('It\'s a Heading')}}</h4>
                                                <p class="media-text"> {{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.')}}</p>
                                            </div>
                                            <img class="rounded" src="{{ url('assets/img/profile-10.jpg') }}" alt="pic1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Image top aligned')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="media">
                                            <img class="rounded" src="{{ url('assets/img/profile-10.jpg') }}" alt="pic1">
                                            <div class="media-body">
                                                <h4 class="media-heading">{{__('It\'s a Heading')}}</h4>
                                                <p class="media-text"> {{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Image middle aligned')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="media">
                                            <img class="align-self-center rounded" src="{{ url('assets/img/profile-10.jpg') }}" alt="pic1">
                                            <div class="media-body">
                                                <h4 class="media-heading">{{__('It\'s a Heading')}}</h4>
                                                <p class="media-text">{{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Image bottom aligned')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="media">
                                            <img class="align-self-end rounded" src="{{ url('assets/img/profile-10.jpg') }}" alt="pic1">
                                            <div class="media-body">
                                                <h4 class="media-heading">{{__('It\'s a Heading')}}</h4>
                                                <p class="media-text">{{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Media list')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <ul class="list-unstyled">
                                            <li class="media">
                                                <img class="rounded" src="{{ url('assets/img/profile-10.jpg') }}" alt="pic1">
                                                <div class="media-body">
                                                    <h4 class="media-heading">{{__('It\'s a Heading')}}</h4>
                                                    <p class="media-text">{{__('Cras sit amet nibh libero, in gravida nulla.Nulla vel metus scelerisque ante sollicitudin.')}} </p>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <img class="rounded" src="{{ url('assets/img/profile-11.jpg') }}" alt="pic1">
                                                <div class="media-body">
                                                    <h4 class="media-heading">{{__('It\'s a Heading')}}</h4>
                                                    <p class="media-text">{{__('Cras sit amet nibh libero, in gravida nulla.Nulla vel metus scelerisque ante sollicitudin.')}} </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Nesting media object')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area nesting">
                                        <div class="media">
                                            <img class="meta-usr-img rounded" src="{{ url('assets/img/profile-10.jpg') }}" alt="pic1">
                                            <div class="media-body">
                                                <h4 class="media-heading">{{__('It\'s a Heading')}}</h4>
                                                <p class="media-text">{{__('Cras sit amet nibh libero, in gravida nulla.Nulla vel metus scelerisque ante sollicitudin. ')}}</p>
                                                <div class="media">
                                                    <a class="meta-usr-img" href="javascript:void(0);">
                                                        <img class="rounded" src="{{ url('assets/img/profile-11.jpg') }}" alt="pic2">
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">{{__('It\'s a Heading')}}</h4>
                                                        <p class="media-text">{{__('Cras sit amet nibh libero, in gravida nulla.Nulla vel metus scelerisque ante sollicitudin.')}} </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Media object with bottom option')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area notation-text">
                                        <div class="media">
                                            <img class="rounded" src="{{ url('assets/img/profile-4.jpg') }}" alt="pic1">
                                            <div class="media-body">
                                                <h4 class="media-heading">{{__('Heading')}}</h4>
                                                <p class="media-text">{{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.')}}</p>
                                                <div class="media-notation">
                                                    <a href="javascript:void(0);" class="text-danger"><i class="las la-heart"></i> {{__('Like')}} </a>
                                                    <a href="javascript:void(0);" class="text-primary"><i class="las la-comment-alt"></i> {{__('Comment')}} </a>
                                                    <a href="javascript:void(0);" class="text-warning"><i class="las la-share"></i> {{__('Share')}} </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="mediaObjectBadge" class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Badge')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area m-o-label">
                                        <div class="media">
                                            <img class="rounded" src="{{ url('assets/img/profile-10.jpg') }}" alt="pic1">
                                            <div class="media-body">
                                                <h4 class="media-heading"><span class="media-title">{{__('It\'s a Heading')}}</span><span class="badge badge-primary ml-3">{{__('Badge')}}</span></h4>
                                                <p class="media-text">{{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="mediaObjectDropdown" class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Dropdown Option')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area m-o-dropdown-list">
                                        <div class="media">
                                            <img class=" rounded" src="{{ url('assets/img/profile-10.jpg') }}" alt="pic1">
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <span class="media-title"> {{__('It\'s a Heading')}}</span>
                                                    <div class="dropdown-list dropdown" role="group">
                                                        <a href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="las la-ellipsis-h"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0);"><span>{{__('Option 1')}}</span></a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><span>{{__('Option 2')}}</span></a>
                                                            <span class="dropdown-divider"></span>
                                                            <a class="dropdown-item" href="javascript:void(0);"><span>{{__('Options 3')}}</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="media-text">{{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.')}}</p>
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
