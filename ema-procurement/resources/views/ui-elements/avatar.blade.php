@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/ui-elements/avatar.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Avatar')}}</span></li>
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
                                                <h4>{{__('Different size of avatars')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="text-muted font-14 mb-3">
                                            {{__('Use the below classes to change the size of the avatars')}}
                                        </p>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="{{ url('assets/img/profile-1.jpg') }}" alt="image" class="img-fluid avatar-xxs rounded">
                                                <p>
                                                    <code>{{__('.avatar-xxs')}}</code>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <img src="{{ url('assets/img/profile-2.jpg') }}" alt="image" class="img-fluid avatar-xs rounded">
                                                <p>
                                                    <code>{{__('.avatar-xs')}}</code>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <img src="{{ url('assets/img/profile-3.jpg') }}" alt="image" class="img-fluid avatar-sm rounded">
                                                <p>
                                                    <code>{{__('.avatar-sm')}}</code>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <img src="{{ url('assets/img/profile-4.jpg') }}" alt="image" class="img-fluid avatar-md rounded">
                                                <p>
                                                    <code>{{__('.avatar-md')}}</code>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <img src="{{ url('assets/img/profile-5.jpg') }}" alt="image" class="img-fluid avatar-lg rounded">
                                                <p>
                                                    <code>{{__('.avatar-lg')}}</code>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <img src="{{ url('assets/img/profile-6.jpg') }}" alt="image" class="img-fluid avatar-xl rounded">
                                                <p class="mb-0">
                                                    <code>{{__('.avatar-xl')}}</code>
                                                </p>
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
                                                <h4>{{__('Avatars with Rounded Circle')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="text-muted font-14 mb-3">
                                            {{__('add')}} <code>.rounded-circle</code> {{__('class to make an avatar image circle')}}
                                        </p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{ url('assets/img/profile-1.jpg') }}" alt="image" class="img-fluid avatar-md rounded-circle">
                                                <p class="mt-1">
                                                    <code>.avatar-md .rounded-circle</code>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <img src="{{ url('assets/img/profile-2.jpg') }}" alt="image" class="img-fluid avatar-lg rounded-circle">
                                                <p>
                                                    <code>.avatar-lg .rounded-circle</code>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <img src="{{ url('assets/img/profile-3.jpg') }}" alt="image" class="img-fluid avatar-xl rounded-circle">
                                                <p class="mb-0">
                                                    <code>.avatar-xl .rounded-circle</code>
                                                </p>
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
                                                <h4>{{__('Avatar with initials')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="text-muted font-14 mb-3">
                                            {{__('You can use below classes to use initials of name as avatar')}}
                                        </p>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="avatar-xxs bg-primary rounded d-flex align-items-center justify-content-center font-10">
                                                    XXS
                                                </div>
                                                <p class="mb-2 font-14 mt-1">
                                                    <code>.avatar-xxs</code>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="avatar-xs bg-secondary rounded d-flex align-items-center justify-content-center">
                                                    XS
                                                </div>
                                                <p class="mb-2 font-14 mt-1">
                                                    <code>.avatar-xs</code>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="avatar-sm bg-warning rounded d-flex align-items-center justify-content-center">
                                                    SM
                                                </div>
                                                <p class="mb-2 font-14 mt-1">
                                                    <code>.avatar-sm</code>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="avatar-md bg-success rounded d-flex align-items-center justify-content-center">
                                                    MD
                                                </div>
                                                <p class="mb-2 font-14 mt-1">
                                                    <code>.avatar-md</code>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="avatar-lg bg-danger rounded d-flex align-items-center justify-content-center font-20">
                                                    LG
                                                </div>
                                                <p class="mb-2 font-14 mt-1">
                                                    <code>.avatar-lg</code>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="avatar-xl bg-dark rounded d-flex align-items-center justify-content-center font-25">
                                                    XL
                                                </div>
                                                <p class="mb-2 font-14 mt-1">
                                                    <code>.avatar-xl</code>
                                                </p>
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
                                                <h4>{{__('Rounded Circle Background')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="text-muted font-14 mb-3">
                                            {{__('You can use below classes to use initials of name as avatar in a rounded circle')}}
                                        </p>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="avatar-xs bg-secondary rounded-circle d-flex align-items-center justify-content-center">
                                                    XS
                                                </div>
                                                <p class="mb-2 font-14 mt-1">
                                                    <code>.avatar-xs</code>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="avatar-sm bg-warning rounded-circle d-flex align-items-center justify-content-center">
                                                    SM
                                                </div>
                                                <p class="mb-2 font-14 mt-1">
                                                    <code>.avatar-sm</code>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="avatar-md bg-success rounded-circle d-flex align-items-center justify-content-center">
                                                    MD
                                                </div>
                                                <p class="mb-2 font-14 mt-1">
                                                    <code>.avatar-md</code>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="avatar-lg bg-danger rounded-circle d-flex align-items-center justify-content-center font-20">
                                                    LG
                                                </div>
                                                <p class="mb-2 font-14 mt-1">
                                                    <code>.avatar-lg</code>
                                                </p>
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
                                                <h4>{{__('Different shape of images')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="text-muted font-14 mb-3">
                                            {{__('Use the below classes to change the shapes of the avatars')}}
                                        </p>
                                        <div class="row">
                                            <div class="col-md-3 text-center">
                                                <img src="{{ url('assets/img/profile-1.jpg') }}" alt="image" class="img-fluid rounded" width="120">
                                                <p class="mb-0">
                                                    <code>.rounded</code>
                                                </p>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <img src="{{ url('assets/img/profile-2.jpg') }}" alt="image" class="img-fluid rounded-circle" width="120">
                                                <p class="mb-0">
                                                    <code>.rounded-circle</code>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <img src="{{ url('assets/img/profile-3.jpg') }}" alt="image" class="img-fluid img-thumbnail" width="200">
                                                <p class="mb-0">
                                                    <code>.img-thumbnail</code>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <img src="{{ url('assets/img/profile-4.jpg') }}" alt="image" class="img-fluid rounded-circle img-thumbnail" width="120">
                                                <p class="mb-0">
                                                    <code>.rounded-circle .img-thumbnail</code>
                                                </p>
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
                                                <h4>{{__('Group of images')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="text-muted font-14 mb-3">
                                            {{__('Create and group avatars of different sizes and shapes with the css classes.
                                            Using Bootstrap\'s naming convention, you can control size of avatar including standard avatar, or scale it up to different sizes.')}}
                                        </p>
                                        <div class="avatar-group">
                                            <div class="avatar avatar-lg">
                                                <img alt="avatar" src="{{ url('assets/img/profile-1.jpg') }}" class="rounded-circle">
                                            </div>
                                            <div class="avatar avatar-lg">
                                                <img alt="avatar" src="{{ url('assets/img/profile-2.jpg') }}" class="rounded-circle">
                                            </div>
                                            <div class="avatar avatar-lg">
                                                <img alt="avatar" src="{{ url('assets/img/profile-3.jpg') }}" class="rounded-circle">
                                            </div>
                                            <div class="avatar avatar-lg">
                                                <img alt="avatar" src="{{ url('assets/img/profile-4.jpg') }}" class="rounded-circle">
                                            </div>
                                            <div class="avatar avatar-lg">
                                                <img alt="avatar" src="{{ url('assets/img/profile-5.jpg') }}" class="rounded-circle">
                                            </div>
                                            <div class="avatar avatar-lg avatar-title rounded-circle bg-dark d-flex align-items-center justify-content-center">
                                                JB
                                            </div>
                                            <div class="avatar avatar-lg avatar-title rounded-circle bg-primary d-flex align-items-center justify-content-center">
                                                PM
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
