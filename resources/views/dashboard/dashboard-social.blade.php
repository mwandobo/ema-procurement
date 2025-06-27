@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/basic-ui/tabs.css') !!}
    {!! Html::style('assets/css/dashboard/dashboard_social.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Dashboards')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Dashboard Social')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav d-flex align-center ml-auto right-side-filter">
                <li class="nav-item more-dropdown">
                    <div class="input-group input-group-sm">
                        <input id="rangeCalendarFlatpickr" class="form-control flatpickr flatpickr-input active" type="text" placeholder="{{__('Select Date')}}">
                        <div class="input-group-append">
                                    <span class="input-group-text bg-primary border-primary" id="basic-addon2">
                                        <i class="lar la-calendar"></i>
                                    </span>
                        </div>
                    </div>
                </li>
                <li class="nav-item more-dropdown">
                    <a href="javascript: void(0);" data-original-title="{{__('Reload Data')}}" data-placement="bottom" class="btn btn-primary dash-btn btn-sm ml-2 bs-tooltip">
                        <i class="las la-sync"></i>
                    </a>
                </li>
                <li class="nav-item custom-dropdown-icon">
                    <a href="javascript: void(0);" data-original-title="{{__('Filter')}}" data-placement="bottom" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary dash-btn btn-sm ml-2 bs-tooltip">
                        <i class="las la-filter"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                        <a class="dropdown-item" data-value="Filter 1" href="javascript:void(0);">{{__('Filter 1')}}</a>
                        <a class="dropdown-item" data-value="Filter 2" href="javascript:void(0);">{{__('Filter 2')}}</a>
                        <a class="dropdown-item" data-value="Filter 3" href="javascript:void(0);">{{__('Filter 3')}}</a>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-12">
                <img src="{{asset('assets/img/timeline.jpg')}}" class="img-fluid rounded" alt="timeline image">
                <div class="user-data text-center bg-white rounded pb-2 mb-md-2">
                    <img src="{{asset('assets/img/profile-1.jpg')}}" class="img-fluid rounded-circle social-profile-image shadow-lg border border-3" alt="timeline image" style="margin-top: -130px; width: 150px; height: 150px;">
                    <h4 class="mt-3 mb-0">John Doe</h4>
                    <p class="m-0">San Francisco, CA</p>
                </div>
            </div>
        </div>
        <div class="row layout-top-spacing">
            <!-- Left Panel -->
            <div class="col-lg-3 col-md-12 col-sm-12 layout-spacing">
                <div class="card shadow-bottom">
                    <h5 class="card-header">{{__('Profile Intro')}} </h5>
                    <div class="card-body">
                        <div class="about-me">
                            <h6 class="card-title mb-1">{{__('About Me')}}</h6>
                            <p class="font-small-3">{{__('Hi, I’m John Doe, I’m 30 & I work as a Digital Designer.')}}</p>
                        </div>
                        <div class="favourite-show mt-3">
                            <h6 class="card-title mb-1">{{__('Favourite TV Shows')}}</h6>
                            <p class="font-small-3">
                                {{__('Breaking Good, RedDevil, People of Interest, The Running Dead, Found,
                                American Guy.')}}
                            </p>
                        </div>
                        <div class="favourite-band mt-3">
                            <h6 class="card-title mb-1">{{__('Favourite Music Bands')}}</h6>
                            <p class="font-small-3">
                                {{__('Arctic Monkeys, Bloc Party, People of Interest, The Running Dead,
                                Found, American Guy.')}}
                            </p>
                        </div>
                        <div class="favourite-food mt-3">
                            <h6 class="card-title mb-1">{{__('Favourite Food')}}</h6>
                            <p class="font-small-3">{{__('Pizza, burger, Guacamole, Tomato Salsa, Enchiladas, Guilt-Free Chilli')}}</p>
                        </div>
                    </div>
                </div>
                <!-- friends-list -->
                <div class="card shadow-none mt-3">
                    <h5 class="card-header">{{__('Friends List')}}</h5>
                    <div class="card-body">
                        <div class="friends-list">
                            <div class="fs-sm d-flex align-items-center">
                                <a href="#" class="btn-m-s">
                                    <img src="{{asset('assets/img/profile-2.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                </a>
                                <a href="#" class="btn-m-s">
                                    <img src="{{asset('assets/img/profile-3.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                </a>
                                <a href="#" class="btn-m-s">
                                    <img src="{{asset('assets/img/profile-4.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                </a>
                                <a href="#" class="btn-m-s">
                                    <img src="{{asset('assets/img/profile-5.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                </a>
                                <a href="#" class="btn-m-s">
                                    <img src="{{asset('assets/img/profile-6.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                </a>
                                <a href="#" class="btn-m-s">
                                    <img src="{{asset('assets/img/profile-7.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                </a>
                                <a href="#" class="btn-m-s fs-xs">
                                <span data-hasmore="+7" class="rounded-circle avatar-sm">
                                    <img src="{{asset('assets/img/profile-8.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- My Spotify Playlist -->
                <div class="card shadow-none mt-3">
                    <h5 class="card-header">{{__('My Spotify Playlist')}}</h5>
                    <div class="card-body">
                        <div class="spotify-playlist">
                            <div class="row">
                                <div class="col-3 my-auto">
                                    <img src="{{asset('assets/img/lightbox-1.jpg')}}" alt="" class="img-fluid width-30">
                                </div>
                                <div class="col-6 font-small-3 pl-0">
                                    <h6 class="m-0">{{__('All Around')}}</h6>
                                    <p class="m-0">{{__('justin bieber')}}</p>
                                </div>
                                <div class="col-3 p-0">
                                    <p>4:56</p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3 my-auto">
                                    <img src="{{asset('assets/img/lightbox-2.jpg')}}" alt="" class="img-fluid width-30">
                                </div>
                                <div class="col-6 font-small-3 pl-0">
                                    <h6 class="m-0">{{__('All I Want')}}</h6>
                                    <p class="m-0">{{__('justin bieber')}}</p>
                                </div>
                                <div class="col-3 p-0">
                                    <p>4:56</p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3 my-auto">
                                    <img src="{{asset('assets/img/lightbox-3.jpg')}}" alt="" class="img-fluid width-30">
                                </div>
                                <div class="col-6 font-small-3 pl-0">
                                    <h6 class="m-0">{{__('All Matters')}}</h6>
                                    <p class="m-0">{{__('justin bieber')}}</p>
                                </div>
                                <div class="col-3 p-0">
                                    <p>4:56</p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3 my-auto">
                                    <img src="{{asset('assets/img/lightbox-4.jpg')}}" alt="" class="img-fluid width-30">
                                </div>
                                <div class="col-6 font-small-3 pl-0">
                                    <h6 class="m-0">{{__('As Long')}}</h6>
                                    <p class="m-0">{{__('justin bieber')}}</p>
                                </div>
                                <div class="col-3 p-0">
                                    <p>4:56</p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3 my-auto">
                                    <img src="{{asset('assets/img/lightbox-5.jpg')}}" alt="" class="img-fluid width-30">
                                </div>
                                <div class="col-6 font-small-3 pl-0">
                                    <h6 class="m-0">{{__('Beauty Beat')}}</h6>
                                    <p class="m-0">{{__('justin bieber')}}</p>
                                </div>
                                <div class="col-3 p-0">
                                    <p>4:56</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Twitter Feed -->
                <div class="card shadow-none mt-3">
                    <h5 class="card-header">{{__('Twitter Feed')}}</h5>
                    <div class="card-body">
                        <div class="twitter-feed">
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{asset('assets/img/profile-10.jpg')}}" alt="" class="img-fluid">
                                </div>
                                <div class="col-9 font-small-3 pl-0">
                                    <p class="m-0">{{__('I just submitted this instagram Redesign concept')}}</p>
                                    <p class="m-0">{{__('@@james_spiegelOK')}}</p>
                                </div>
                                <div class="col-12 font-small-3 mt-1">
                                    <p class="text-primary m-0">{{__('#Dowboy #profile')}}</p>
                                    <p class="text-muted">{{__('2 hours ago')}}</p>
                                </div>
                            </div>
                            <hr class="m-0">
                            <div class="row mt-3">
                                <div class="col-3">
                                    <img src="{{asset('assets/img/profile-11.jpg')}}" alt="" class="img-fluid">
                                </div>
                                <div class="col-9 font-small-3 pl-0">
                                    <p class="m-0">{{__('I just submitted this instagram Redesign concept')}}</p>
                                    <p class="m-0">{{__('@@james_spiegelOK')}}</p>
                                </div>
                                <div class="col-12 font-small-3 mt-1">
                                    <p class="text-primary m-0">{{__('#Dowboy #profile')}}</p>
                                    <p class="text-muted">{{__('2 hours ago')}}</p>
                                </div>
                            </div>
                            <hr class="m-0">
                            <div class="row mt-3">
                                <div class="col-3">
                                    <img src="{{asset('assets/img/profile-13.jpg')}}" alt="" class="img-fluid">
                                </div>
                                <div class="col-9 font-small-3 pl-0">
                                    <p class="m-0">{{__('I just submitted this instagram Redesign concept')}}</p>
                                    <p class="m-0">{{__('@@james_spiegelOK')}}</p>
                                </div>
                                <div class="col-12 font-small-3 mt-1">
                                    <p class="text-primary m-0">{{__('#Dowboy #profile')}}</p>
                                    <p class="text-muted">{{__('2 hours ago')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Feed Section -->
            <div class="col-lg-6 col-md-12 col-sm-12 layout-spacing">
                <!-- Write Post -->
                <div class="card shadow-none">
                    <div class="card-body p-1">
                        <div class="feed-tabs p-1 bg-light">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link px-1 py-1 px-sm-1 active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                        <i class="las la-heartbeat mr-1"></i>
                                        {{__('Status')}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-1 py-1 px-sm-1" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                        <i class="las la-camera mr-1"></i>
                                        {{__('Multimedia')}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-1 py-1" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                                        <i class="las la-edit mr-1"></i>
                                        {{__('Blog Post')}}
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"></div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"></div>
                            </div>
                        </div>
                        <div class="write-post">
                            <div class="border-0 flex-1 position-relative shadow-top">
                                <div class="pt-2 pb-1 pr-2 pl-2 rounded-0 position-relative" tabindex="-1">
                                    <span class="avatar-md rounded-circle d-block position-absolute" style="background-image:url('/assets/img/profile-1.jpg'); background-size: cover;"></span>
                                    <div class="pl-3 ml-5">
                                        <textarea class="form-control border-0 p-1 fs-sm bg-transparent" rows="4" placeholder="{{__('What\'s on your mind John?...')}}"></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr class="m-0">
                            <div class="row px-1">
                                <div class="col-6 pt-2">
                                    <div class="d-flex flex-row align-items-center flex-wrap flex-shrink-0">
                                        <a href="javascript:void(0);" class="btn btn-icon fs-xl width-1 mr-1" data-toggle="tooltip" data-original-title="{{__('More options')}}" data-placement="top">
                                            <i class="las la-ellipsis-v color-fusion-300"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="{{__('Attach files')}}" data-placement="top">
                                            <i class="las la-paperclip color-fusion-300"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="{{__('Insert photo')}}" data-placement="top">
                                            <i class="las la-camera color-fusion-300"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 pt-2">
                                    <button type="button" class="btn btn-primary btn-glow mr-1 mb-1 float-right">
                                        {{__('Post Status')}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Post 1 -->
                <div class="card shadow-none mt-3">
                    <div class="card-body p-2">
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-lg-4 col-3">
                                        <img src="{{asset('assets/img/profile-13.jpg')}}" alt="" class="avatar-md img-fluid rounded-circle width-50">
                                    </div>
                                    <div class="col-lg-8 col-7 p-0">
                                        <h5 class="m-0">{{__('Elaine Dreyfuss')}}</h5>
                                        <p class="text-muted">{{__('2 hours ago')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <i class="las la-ellipsis-v-alt float-right"></i>
                            </div>
                        </div>
                        <div class="write-post">
                            <div class="col-sm-12 px-2">
                                <p>
                                    {{__('When searching for videos of a different singer, Scooter Braun, a former marketing
                                    executive of So So Def Recordings, clicked on one of Bieber\'s 2007 videos by')}}
                                </p>
                            </div>
                            <hr class="m-0">
                            <div class="row p-1">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-4 pr-0">
                                            <span><i class="las la-heart h4 text-danger"></i> 120</span>
                                        </div>
                                        <div class="col-8 pl-0">
                                            <div class="fs-sm d-flex align-items-center">
                                                <a href="#" class="btn-m-s">
                                                    <img src="{{asset('assets/img/profile-20.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </a>
                                                <a href="#" class="btn-m-s">
                                                    <img src="{{asset('assets/img/profile-21.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </a>
                                                <a href="#" class="btn-m-s">
                                                    <img src="{{asset('assets/img/profile-22.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </a>
                                                <a href="#" class="btn-m-s">
                                                    <img src="{{asset('assets/img/profile-23.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </a>
                                                <a href="#" class="btn-m-s">
                                                    <img src="{{asset('assets/img/profile-24.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </a>
                                                <a href="#" class="btn-m-s">
                                                    <img src="{{asset('assets/img/profile-25.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </a>
                                                <a href="#" class="btn-m-s fs-xs">
                                                <span data-hasmore="+7" class="rounded-circle avatar-sm">
                                                    <img src="{{asset('assets/img/profile-26.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <span class="pr-1"><i class="las la-comment h4 align-middle"></i> 44</span>
                                        <span class="pr-1"><i class="las la-share h4 align-middle"></i> 23</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- User Post 2 -->
                <div class="card shadow-none mt-3">
                    <div class="card-body p-2">
                        <div class="row p-2">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-lg-4 col-3">
                                        <img src="{{asset('assets/img/profile-28.jpg')}}" alt="" class="avatar-md img-fluid rounded-circle width-50">
                                    </div>
                                    <div class="col-lg-8 col-7 p-0">
                                        <h6 class="m-0">{{__('Elaine Dreyfuss')}}</h6>
                                        <p class="text-muted">{{__('4 hours ago')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <i class="las la-ellipsis-v float-right"></i>
                            </div>
                        </div>
                        <div class="write-post">
                            <div class="col-sm-12 px-2">
                                <p>
                                    {{__('When searching for videos of a different singer, Scooter Braun, a former marketing
                                    executive of So So Def Recordings, clicked on one of Bieber\'s 2007 videos by')}}
                                </p>
                            </div>
                            <hr class="m-0">
                            <div class="row p-1">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-sm-4 col-3 pr-0">
                                            <span><i class="las la-heart h4 text-danger"></i> 120</span>
                                        </div>
                                        <div class="col-sm-8 col-7 pl-0">
                                            <div class="fs-sm d-flex align-items-center">
                                                <a href="#" class="btn-m-s">
                                                    <img src="{{asset('assets/img/profile-10.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </a>
                                                <a href="#" class="btn-m-s">
                                                    <img src="{{asset('assets/img/profile-11.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </a>
                                                <a href="#" class="btn-m-s">
                                                    <img src="{{asset('assets/img/profile-12.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </a>
                                                <a href="#" class="btn-m-s">
                                                    <img src="{{asset('assets/img/profile-13.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </a>
                                                <a href="#" class="btn-m-s">
                                                    <img src="{{asset('assets/img/profile-14.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </a>
                                                <a href="#" class="btn-m-s">
                                                    <img src="{{asset('assets/img/profile-15.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </a>
                                                <a href="#" class="btn-m-s fs-xs">
                                                <span data-hasmore="+7" class="rounded-circle avatar-sm">
                                                    <img src="{{asset('assets/img/profile-16.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <span class="pr-1"><i class="las la-comment h4 align-middle"></i> 44</span>
                                        <span class="pr-1"><i class="las la-share h4 align-middle"></i> 23</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- User Post 3 -->
                <div class="card shadow-none mt-3">
                    <div class="card-body p-2">
                        <div class="row p-2">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-lg-4 col-3">
                                        <img src="{{asset('assets/img/profile-1.jpg')}}" alt="" class="avatar-md img-fluid rounded-circle width-50">
                                    </div>
                                    <div class="col-lg-8 col-7 p-0">
                                        <h6 class="m-0">{{__('Elaine Dreyfuss')}}</h6>
                                        <p class="text-muted">{{__('2 hours ago')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <i class="las la-ellipsis-v float-right"></i>
                            </div>
                        </div>
                        <div class="write-post">
                            <div class="col-sm-12 px-2 pb-2">
                                <img src="{{asset('assets/img/party-flyer.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <hr class="m-0">
                            <div class="row p-1">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-lg-4 col-3 pr-0">
                                            <span><i class="las la-heart h4 text-danger"></i> 120</span>
                                        </div>
                                        <div class="col-lg-8 col-7 pl-0">
                                            <div class="fs-sm d-flex align-items-center">
                                                <a href="#" class="btn-m-s">
                                                    <img src="{{asset('assets/img/profile-1.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </a>
                                                <a href="#" class="btn-m-s">
                                                    <img src="{{asset('assets/img/profile-2.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </a>
                                                <a href="#" class="btn-m-s">
                                                    <img src="{{asset('assets/img/profile-3.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </a>
                                                <a href="#" class="btn-m-s">
                                                    <img src="{{asset('assets/img/profile-4.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </a>
                                                <a href="#" class="btn-m-s">
                                                    <img src="{{asset('assets/img/profile-5.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </a>
                                                <a href="#" class="btn-m-s">
                                                    <img src="{{asset('assets/img/profile-6.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </a>
                                                <a href="#" class="btn-m-s fs-xs">
                                                <span data-hasmore="+7" class="rounded-circle avatar-sm">
                                                    <img src="{{asset('assets/img/profile-7.jpg')}}" class="avatar-sm rounded-circle" alt="aa">
                                                </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <span class="pr-1"><i class="las la-comment h4 align-middle"></i> 44</span>
                                        <span class="pr-1"><i class="las la-share h4 align-middle"></i> 23</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Panel -->
            <div class="col-lg-3 col-md-12 col-sm-12 layout-spacing">
                <!-- Birthday Card -->
                <div class="card text-white bg-gradient-dark text-xs-center mb-3">
                    <div class="card-body">
                        <i class="las la-award text-danger float-right font-20"></i>
                        <img src="{{asset('assets/img/profile-8.jpg')}}" alt="" class="img-fluid rounded-circle" style="width: 50px; height: 50px;">
                        <p class="text-white mb-25">{{__('Today is')}}</p>
                        <h4 class="text-light">{{__('Marina Valentine’s Birthday!')}}</h4>
                        <p class="card-text text-white">{{__('Some quick example text to build on the card.')}}</p>
                    </div>
                </div>
                <!-- Last Photos -->
                <div class="card shadow-none mt-3">
                    <h5 class="card-header">{{__('Last Photos')}}</h5>
                    <div class="card-body">
                        <div class="last-photos">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{asset('assets/img/bg-1.jpg')}}" alt="" class="img-fluid mb-2 rounded">
                                </div>
                                <div class="col-4">
                                    <img src="{{asset('assets/img/bg-2.jpg')}}" alt="" class="img-fluid mb-2 rounded">
                                </div>
                                <div class="col-4">
                                    <img src="{{asset('assets/img/bg-3.jpg')}}" alt="" class="img-fluid mb-2 rounded">
                                </div>
                                <div class="col-4">
                                    <img src="{{asset('assets/img/bg-4.jpg')}}" alt="" class="img-fluid mb-2 rounded">
                                </div>
                                <div class="col-4">
                                    <img src="{{asset('assets/img/bg-5.jpg')}}" alt="" class="img-fluid mb-2 rounded">
                                </div>
                                <div class="col-4">
                                    <img src="{{asset('assets/img/bg-6.jpg')}}" alt="" class="img-fluid mb-2 rounded">
                                </div>
                                <div class="col-4">
                                    <img src="{{asset('assets/img/bg-7.jpg')}}" alt="" class="img-fluid mb-2 rounded">
                                </div>
                                <div class="col-4">
                                    <img src="{{asset('assets/img/bg-8.jpg')}}" alt="" class="img-fluid mb-2 rounded">
                                </div>
                                <div class="col-4">
                                    <img src="{{asset('assets/img/bg-9.jpg')}}" alt="" class="img-fluid rounded">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Last Blog -->
                <div class="card shadow-none mt-3">
                    <h5 class="card-header">{{__('Last Blog')}}</h5>
                    <div class="card-body">
                        <div class="last-blog">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h6>{{__('The emergence and growth of blogs')}}</h6>
                                    <p class="mt-1">
                                        {{__('Many blogs provide commentary on a particular subject or topic digital
                                        images.')}}
                                    </p>
                                    <p class="mt-3">{{__('5 hours ago')}}</p>
                                    <hr>
                                </div>
                                <div class="col-sm-12">
                                    <h6>{{__('On 16 February 2011')}}</h6>
                                    <p class="mt-1">
                                        {{__('Many blogs provide commentary on a particular subject or topic digital
                                        images.')}}
                                    </p>
                                    <p class="mt-3">{{__('10 hours ago')}}</p>
                                    <hr>
                                </div>
                                <div class="col-sm-12">
                                    <h6>{{__('With posts written by large numbers')}}</h6>
                                    <p class="mt-1">
                                        {{__('Many blogs provide commentary on a particular subject or topic digital
                                        images.')}}
                                    </p>
                                    <p class="mt-3">{{__('23 hours ago')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Last Video -->
                <div class="card shadow-none mt-3">
                    <h5 class="card-header">{{__('Last Video')}}</h5>
                    <div class="card-body">
                        <div class="last-video">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe src="https://www.youtube.com/embed/fRh_vgS2dFE" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe width="1280" height="720" src="https://www.youtube.com/embed/cBVGlBWQzuc" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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
