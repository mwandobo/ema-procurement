@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/dragitems/dragula.css') !!}
    {!! Html::style('plugins/dragitems/example.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Basic UI')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Drag Items')}}</span></li>
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
                                                <h4>{{__('Basic Drag Items')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="type-1">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="text-center strong text-primary">{{__('Choose Employee')}}</p>
                                                    <div id="left-defaults" class="dragula">
                                                        <div class="media  d-md-flex d-block text-sm-left text-center">
                                                            <img alt="avatar" src="{{ url('assets/img/profile-2.jpg') }}" class="img-fluid ">
                                                            <div class="media-body">
                                                                <div class="d-xl-flex d-block justify-content-between">
                                                                    <div class="">
                                                                        <h6 class="">{{__('Abigail Johnson')}}</h6>
                                                                        <p class="">{{__('Software Developer')}}</p>
                                                                    </div>
                                                                    <div>
                                                                        <button class="btn btn-primary btn-sm">{{__('Profile')}}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media  d-md-flex d-block text-sm-left text-center">
                                                            <img alt="avatar" src="{{ url('assets/img/profile-3.jpg') }}" class="img-fluid ">
                                                            <div class="media-body">
                                                                <div class="d-xl-flex d-block justify-content-between">
                                                                    <div class="">
                                                                        <h6 class="">{{__('Benjamin Blake')}}</h6>
                                                                        <p class="">{{__('IT Manager')}}</p>
                                                                    </div>
                                                                    <div>
                                                                        <button class="btn btn-primary btn-sm">{{__('Profile')}}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media  d-md-flex d-block text-sm-left text-center">
                                                            <img alt="avatar" src="{{ url('assets/img/profile-4.jpg') }}" class="img-fluid ">
                                                            <div class="media-body">
                                                                <div class="d-xl-flex d-block justify-content-between">
                                                                    <div class="">
                                                                        <h6 class="">{{__('Jasmine Juie')}}</h6>
                                                                        <p class="">{{__('Tech Support')}}</p>
                                                                    </div>
                                                                    <div>
                                                                        <button class="btn btn-primary btn-sm">{{__('Profile')}}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media  d-md-flex d-block text-sm-left text-center">
                                                            <img alt="avatar" src="{{ url('assets/img/profile-5.jpg') }}" class="img-fluid ">
                                                            <div class="media-body">
                                                                <div class="d-xl-flex d-block justify-content-between">
                                                                    <div class="">
                                                                        <h6 class="">{{__('Evan Bower')}}</h6>
                                                                        <p class="">{{__('Executive')}}</p>
                                                                    </div>
                                                                    <div>
                                                                        <button class="btn btn-primary btn-sm">{{__('Profile')}}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media  d-md-flex d-block text-sm-left text-center">
                                                            <img alt="avatar" src="{{ url('assets/img/profile-6.jpg') }}" class="img-fluid ">
                                                            <div class="media-body">
                                                                <div class="d-xl-flex d-block justify-content-between">
                                                                    <div class="">
                                                                        <h6 class="">{{__('Olivia Chapman')}}</h6>
                                                                        <p class="">{{__('Accountant')}}</p>
                                                                    </div>
                                                                    <div>
                                                                        <button class="btn btn-primary btn-sm">{{__('Profile')}}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="text-center strong text-primary">{{__('Selected Employee')}}</p>
                                                    <div id="right-defaults" class="dragula">
                                                        <div class="media  d-md-flex d-block text-sm-left text-center">
                                                            <img alt="avatar" src="{{ url('assets/img/profile-7.jpg') }}" class="img-fluid ">
                                                            <div class="media-body">
                                                                <div class="d-xl-flex d-block justify-content-between">
                                                                    <div class="">
                                                                        <h6 class="">{{__('David Bond')}}</h6>
                                                                        <p class="">{{__('UI/UX Developer')}}</p>
                                                                    </div>
                                                                    <div>
                                                                        <button class="btn btn-primary btn-sm">{{__('Profile')}}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media  d-md-flex d-block text-sm-left text-center">
                                                            <img alt="avatar" src="{{ url('assets/img/profile-8.jpg') }}" class="img-fluid ">
                                                            <div class="media-body">
                                                                <div class="d-xl-flex d-block justify-content-between">
                                                                    <div class="">
                                                                        <h6 class="">{{__('Wanda Campbell')}}</h6>
                                                                        <p class="">{{__('Hardware Engineer')}}</p>
                                                                    </div>
                                                                    <div>
                                                                        <button class="btn btn-primary btn-sm">{{__('Profile')}}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media  d-md-flex d-block text-sm-left text-center">
                                                            <img alt="avatar" src="{{ url('assets/img/profile-9.jpg') }}" class="img-fluid ">
                                                            <div class="media-body">
                                                                <div class="d-xl-flex d-block justify-content-between">
                                                                    <div class="">
                                                                        <h6 class="">{{__('Vanessa Alsop')}}</h6>
                                                                        <p class="">{{__('Backend Developer')}}</p>
                                                                    </div>
                                                                    <div>
                                                                        <button class="btn btn-primary btn-sm">{{__('Profile')}}</button>
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
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('You can drag any element')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="drag-any">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div id="left-drag-any" class="dragula">
                                                        <div class="media d-block text-sm-left text-center">
                                                            <h6>{{__('It\'s a heading')}}</h6>
                                                            <p>{{__('I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.')}}</p>
                                                        </div>
                                                        <p class="p-2">{{__('Drag me, I\'m just a simple text')}}</p>
                                                        <div class="media  d-md-flex d-block text-sm-left text-center">
                                                            <p>{{__('Nor again is there anyone who loves or pursues or desires to ')}}<a href="#" class="text-primary strong">{{__('click on a link')}}</a>, {{__('because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.')}}</p>
                                                        </div>
                                                        <div class="media  d-md-flex d-block text-sm-left text-center">
                                                            <img alt="avatar" src="{{ url('assets/img/profile-1.jpg') }}" class="img-fluid ">
                                                            <img alt="avatar" src="{{ url('assets/img/profile-2.jpg') }}" class="img-fluid ">
                                                            <img alt="avatar" src="{{ url('assets/img/profile-3.jpg') }}" class="img-fluid ">
                                                            <img alt="avatar" src="{{ url('assets/img/profile-4.jpg') }}" class="img-fluid ">
                                                            <img alt="avatar" src="{{ url('assets/img/profile-5.jpg') }}" class="img-fluid ">
                                                            <img alt="avatar" src="{{ url('assets/img/profile-12.jpg') }}" class="img-fluid ">
                                                        </div>
                                                        <div class="media  d-md-flex d-block text-sm-left text-center">
                                                            <input class="form-control" placeholder="{{__('It\'s a text input')}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div id="right-drag-any" class="dragula">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Delete User')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class='type-2'>
                                            <div class='row'>
                                                <div class="col-md-6">
                                                    <p class="text-center strong text-primary">{{__('Select a user')}}</p>
                                                    <div id='left-rm-spill' class='dragula'>
                                                        <div class="media d-block d-sm-flex text-sm-left text-center">
                                                            <img class="" src="{{ url('assets/img/profile-15.jpg') }}" alt="avatar">
                                                            <div class="media-body">
                                                                <h6 class="">{{__('Abigail Johnson')}}</h6>
                                                                <p class="">{{__('Software Developer')}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="media d-block d-sm-flex text-sm-left text-center">
                                                            <img class="" src="{{ url('assets/img/profile-14.jpg') }}" alt="avatar">
                                                            <div class="media-body">
                                                                <h6 class="">{{__('Benjamin Blake')}}</h6>
                                                                <p class="">{{__('IT Manager')}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="media d-block d-sm-flex text-sm-left text-center">
                                                            <img class="" src="{{ url('assets/img/profile-11.jpg') }}" alt="avatar">
                                                            <div class="media-body">
                                                                <h6 class="">{{__('Evan Bower')}}</h6>
                                                                <p class="">{{__('Executive')}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="media d-block d-sm-flex text-sm-left text-center">
                                                            <img class="" src="{{ url('assets/img/profile-12.jpg') }}" alt="avatar">
                                                            <div class="media-body">
                                                                <h6 class="">{{__('Wanda Campbell')}}</h6>
                                                                <p class="">{{__('Hardware Engineer')}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="media d-block d-sm-flex text-sm-left text-center">
                                                            <img class="" src="{{ url('assets/img/profile-6.jpg') }}" alt="avatar">
                                                            <div class="media-body">
                                                                <h6 class="">{{__('David Bond')}}</h6>
                                                                <p class="">{{__('UI/UX Developer')}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="media d-block d-sm-flex text-sm-left text-center">
                                                            <img class="" src="{{ url('assets/img/profile-7.jpg') }}" alt="avatar">
                                                            <div class="media-body">
                                                                <h6 class="">{{__('Olivia Chapman')}}</h6>
                                                                <p class="">{{__('Accountant')}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="text-center strong text-primary">{{__('Deleted User')}}</p>
                                                    <div id='right-rm-spill' class='dragula'>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Drag element using handle')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class='type-3'>
                                            <div class='row'>
                                                <div class="col-md-6">
                                                    <div id='left-lovehandles' class='dragula'>
                                                        <div class="media  d-md-flex d-block text-sm-left text-center">
                                                            <img alt="avatar" src="{{ url('assets/img/profile-2.jpg') }}" class="img-fluid ">
                                                            <div class="media-body">
                                                                <div class="d-xl-flex d-block justify-content-between">
                                                                    <div class="">
                                                                        <h6 class="">{{__('Abigail Johnson')}}</h6>
                                                                        <p class="">{{__('Software Developer')}}</p>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="handle"><i class="las la-arrows-alt"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media  d-md-flex d-block text-sm-left text-center">
                                                            <img alt="avatar" src="{{ url('assets/img/profile-3.jpg') }}" class="img-fluid ">
                                                            <div class="media-body">
                                                                <div class="d-xl-flex d-block justify-content-between">
                                                                    <div class="">
                                                                        <h6 class="">{{__('Benjamin Blake')}}</h6>
                                                                        <p class="">{{__('IT Manager')}}</p>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="handle"><i class="las la-arrows-alt"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media  d-md-flex d-block text-sm-left text-center">
                                                            <img alt="avatar" src="{{ url('assets/img/profile-4.jpg') }}" class="img-fluid ">
                                                            <div class="media-body">
                                                                <div class="d-xl-flex d-block justify-content-between">
                                                                    <div class="">
                                                                        <h6 class="">{{__('Jasmine Juie')}}</h6>
                                                                        <p class="">{{__('Tech Support')}}</p>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="handle"><i class="las la-arrows-alt"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div id='right-lovehandles' class='dragula'>
                                                        <div class="media  d-md-flex d-block text-sm-left text-center">
                                                            <img alt="avatar" src="{{ url('assets/img/profile-7.jpg') }}" class="img-fluid ">
                                                            <div class="media-body">
                                                                <div class="d-xl-flex d-block justify-content-between">
                                                                    <div class="">
                                                                        <h6 class="">{{__('David Bond')}}</h6>
                                                                        <p class="">{{__('UI/UX Developer')}}</p>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="handle"><i class="las la-arrows-alt"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media  d-md-flex d-block text-sm-left text-center">
                                                            <img alt="avatar" src="{{ url('assets/img/profile-8.jpg') }}" class="img-fluid ">
                                                            <div class="media-body">
                                                                <div class="d-xl-flex d-block justify-content-between">
                                                                    <div class="">
                                                                        <h6 class="">{{__('Wanda Campbell')}}</h6>
                                                                        <p class="">{{__('Hardware Engineer')}}</p>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="handle"><i class="las la-arrows-alt"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media  d-md-flex d-block text-sm-left text-center">
                                                            <img alt="avatar" src="{{ url('assets/img/profile-9.jpg') }}" class="img-fluid ">
                                                            <div class="media-body">
                                                                <div class="d-xl-flex d-block justify-content-between">
                                                                    <div class="">
                                                                        <h6 class="">{{__('Vanessa Alsop')}}</h6>
                                                                        <p class="">{{__('Backend Developer')}}</p>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="handle"><i class="las la-arrows-alt"></i></span>
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
    {!! Html::script('plugins/dragitems/dragula.min.js') !!}
    {!! Html::script('plugins/dragitems/custom-dragula.js') !!}
@endpush

@push('custom-scripts')

@endpush
