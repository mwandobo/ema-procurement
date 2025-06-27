@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/basic-ui/tabs.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Tabs')}}</span></li>
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
                            <div id="tabsNormal" class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Normal Tabs Horizontal')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area normal-tab">
                                        <ul class="nav nav-tabs mb-2 mt-2" id="normaltab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{__('Home')}}</a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false">{{__('About')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="message-tab" data-toggle="tab" href="#message" role="tab" aria-controls="message" aria-selected="false">{{__('Message')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">{{__('Disabled Tab')}}</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="normaltabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <p class="mb-4">
                                                    {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                </p>
                                                <p>
                                                    {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                </p>
                                            </div>
                                            <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                                                <div class="media">
                                                    <img class="mr-3" src="{{ url('assets/img/profile-22.jpg') }}" alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{__('Media heading')}}</h5>
                                                        {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                        <div class="media mt-3">
                                                            <a class="pr-3" href="#">
                                                                <img src="{{ url('assets/img/profile-21.jpg') }}" alt="Generic placeholder image">
                                                            </a>
                                                            <div class="media-body">
                                                                <h5 class="mt-0">{{__('Media heading')}}</h5>
                                                                {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="message" role="tabpanel" aria-labelledby="message-tab">
                                                <p class="">
                                                    {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="pl-3 pr-3">{{__('Add')}} <code>nav-fill</code> beside <code> &#60;ul class="nav nav-tabs nav-fill"&#62;</code> {{__('to make full width')}}</p>
                                        <br>
                                        <p class="pl-3 pr-3">{{__('Add')}} <code>justify-content-center</code> beside <code> &#60;ul class="nav nav-tabs justify-content-center"&#62;</code> {{__('to make horizontally center')}}</p>
                                        <br>
                                        <p class="pl-3 pr-3">{{__('Add')}} <code>justify-content-end</code> beside <code> &#60;ul class="nav nav-tabs justify-content-end"&#62;</code> {{__('to make horizontally right')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Normal Pills Horizontal')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area normal-pills">
                                        <ul class="nav nav-pills mb-2 mt-2" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">{{__('Home')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-about-tab" data-toggle="pill" href="#pills-about" role="tab" aria-controls="pills-about" aria-selected="false">{{__('About')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-message-tab" data-toggle="pill" href="#pills-message" role="tab" aria-controls="pills-message" aria-selected="false">{{__('Message')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">{{__('Disabled Tab')}}</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                <p class="mb-4">
                                                    {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                </p>
                                                <p>
                                                    {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                </p>
                                            </div>
                                            <div class="tab-pane fade" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">
                                                <div class="media">
                                                    <img class="mr-3" src="{{ url('assets/img/profile-22.jpg') }}" alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{__('Media heading')}}</h5>
                                                        {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                        <div class="media mt-3">
                                                            <a class="pr-3" href="#">
                                                                <img src="{{ url('assets/img/profile-21.jpg') }}" alt="Generic placeholder image">
                                                            </a>
                                                            <div class="media-body">
                                                                <h5 class="mt-0">{{__('Media heading')}}</h5>
                                                                {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-message" role="tabpanel" aria-labelledby="pills-message-tab">
                                                <p>
                                                    {{__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')}}
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="pl-3 pr-3">{{__('Add')}} <code>nav-fill</code> beside <code> &#60;ul class="nav nav-pills nav-fill"&#62;</code> {{__('to make full width')}}</p>
                                        <br>
                                        <p class="pl-3 pr-3">{{__('Add')}} <code>justify-content-center</code> beside <code> &#60;ul class="nav nav-pills justify-content-center"&#62;</code> {{__('to make horizontally center')}}</p>
                                        <br>
                                        <p class="pl-3 pr-3">{{__('Add')}} <code>justify-content-end</code> beside <code> &#60;ul class="nav nav-pills justify-content-end"&#62;</code> {{__('to make horizontally right')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Normal Tabs Vertical')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area normal-tabs-vertical">
                                        <div class="row mb-4 mt-3">
                                            <div class="col-sm-3 col-12 pr-0">
                                                <div class="nav flex-column nav-pills mb-sm-0 mb-3 text-center mx-auto" role="tablist" aria-orientation="vertical">
                                                    <a class="nav-link active" data-toggle="pill" href="#v-border-pills-home" role="tab" aria-controls="v-border-pills-home" aria-selected="true">{{__('Home')}}</a>
                                                    <a class="nav-link  text-center" data-toggle="pill" href="#v-border-pills-about" role="tab" aria-controls="v-border-pills-profile" aria-selected="false">{{__('About')}}</a>
                                                    <a class="nav-link  text-center" data-toggle="pill" href="#v-border-pills-messages" role="tab" aria-controls="v-border-pills-messages" aria-selected="false">{{__('Message')}}</a>
                                                </div>
                                            </div>
                                            <div class="col-sm-9 col-12 pl-0">
                                                <div class="tab-content" id="v-border-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="v-border-pills-home" role="tabpanel" aria-labelledby="v-border-pills-home-tab">
                                                        <p class="mb-4">
                                                            {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                        </p>
                                                        <p>
                                                        {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                        <p>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-border-pills-about" role="tabpanel" aria-labelledby="v-border-pills-about-tab">
                                                        <div class="media">
                                                            <img class="mr-3" src="{{ url('assets/img/profile-10.jpg') }}" alt="Generic placeholder image">
                                                            <div class="media-body">
                                                                <h5 class="mt-0">{{__('Media heading')}}</h5>
                                                                {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                                <div class="media mt-3">
                                                                    <a class="pr-3" href="#">
                                                                        <img src="{{ url('assets/img/profile-11.jpg') }}" alt="Generic placeholder image">
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <h5 class="mt-0">{{__('Media heading')}}</h5>
                                                                        {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-border-pills-messages" role="tabpanel" aria-labelledby="v-border-pills-messages-tab">
                                                        <p>
                                                            {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Normal Pills Vertical')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area vertical-pill">
                                        <div class="row mb-4 mt-3">
                                            <div class="col-sm-3 col-12">
                                                <div class="nav flex-column nav-pills mb-sm-0 mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <a class="nav-link text-center active mb-2" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">{{__('Home')}}</a>
                                                    <a class="nav-link text-center mb-2" data-toggle="pill" href="#v-pills-about" role="tab" aria-controls="v-pills-profile" aria-selected="false">{{__('Profile')}}</a>
                                                    <a class="nav-link text-center mb-2" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">{{__('Messages')}}</a>
                                                </div>
                                            </div>
                                            <div class="col-sm-9 col-12">
                                                <div class="tab-content" id="v-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                        <p class="mb-4">
                                                            {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                        </p>
                                                        <p>
                                                        {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                        <p>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-about" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                        <div class="media">
                                                            <img class="mr-3" src="{{ url('assets/img/profile-10.jpg') }}" alt="Generic placeholder image">
                                                            <div class="media-body">
                                                                <h5 class="mt-0">{{__('Media heading')}}</h5>
                                                                {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                                <div class="media mt-3">
                                                                    <a class="pr-3" href="#">
                                                                        <img src="{{ url('assets/img/profile-11.jpg') }}" alt="Generic placeholder image">
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <h5 class="mt-0">{{__('Media heading')}}</h5>
                                                                        {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                        <p>
                                                            {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Normal Tabs Horizontal With Line')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area tab-horizontal-line">
                                        <ul class="nav nav-tabs  mb-3" id="animateLine" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="animated-underline-home-tab" data-toggle="tab" href="#animated-underline-home" role="tab" aria-controls="animated-underline-home" aria-selected="true"> {{__('Tabs')}}Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="animated-underline-about-tab" data-toggle="tab" href="#animated-underline-about" role="tab" aria-controls="animated-underline-about" aria-selected="false"> {{__('Tabs')}}About</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="animated-underline-messages-tab" data-toggle="tab" href="#animated-underline-messages" role="tab" aria-controls="animated-underline-messages" aria-selected="false"> {{__('Tabs')}}Messages</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="animateLineContent-4">
                                            <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel" aria-labelledby="animated-underline-home-tab">
                                                <p class="mb-4">
                                                    {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                </p>
                                                <p>
                                                {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                <p>
                                            </div>
                                            <div class="tab-pane fade" id="animated-underline-about" role="tabpanel" aria-labelledby="animated-underline-about-tab">
                                                <div class="media">
                                                    <img class="mr-3" src="{{ url('assets/img/profile-10.jpg') }}" alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{__('Media heading')}}</h5>
                                                        {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                        <div class="media mt-3">
                                                            <a class="pr-3" href="#">
                                                                <img src="{{ url('assets/img/profile-11.jpg') }}" alt="Generic placeholder image">
                                                            </a>
                                                            <div class="media-body">
                                                                <h5 class="mt-0">Media heading</h5>
                                                                {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="animated-underline-messages" role="tabpanel" aria-labelledby="animated-underline-messages-tab">
                                                <p>
                                                    {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Normal Tabs Vertical With Line')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area pills-vertical-line">
                                        <div class="row mb-4 mt-3">
                                            <div class="col-sm-3 col-12">
                                                <div class="nav flex-column nav-pills mb-sm-0 mb-3 text-center mx-auto" id="v-line-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <a class="nav-link active mb-3" id="v-line-pills-home-tab" data-toggle="pill" href="#v-line-pills-home" role="tab" aria-controls="v-line-pills-home" aria-selected="true">{{__('Tabs')}}Home</a>
                                                    <a class="nav-link mb-3  text-center" id="v-line-pills-about-tab" data-toggle="pill" href="#v-line-pills-about" role="tab" aria-controls="v-line-pills-about" aria-selected="false">{{__('Tabs')}}About</a>
                                                    <a class="nav-link mb-3  text-center" id="v-line-pills-messages-tab" data-toggle="pill" href="#v-line-pills-messages" role="tab" aria-controls="v-line-pills-messages" aria-selected="false">{{__('Tabs')}}Messages</a>
                                                </div>
                                            </div>
                                            <div class="col-sm-9 col-12">
                                                <div class="tab-content" id="v-line-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="v-line-pills-home" role="tabpanel" aria-labelledby="v-line-pills-home-tab">
                                                        <p class="mb-4">
                                                            {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                        </p>
                                                        <p>
                                                        {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                        <p>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-line-pills-about" role="tabpanel" aria-labelledby="v-line-pills-about-tab">
                                                        <div class="media">
                                                            <img class="mr-3" src="{{ url('assets/img/profile-10.jpg') }}" alt="Generic placeholder image">
                                                            <div class="media-body">
                                                                <h5 class="mt-0">{{__('Media heading')}}</h5>
                                                                {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                                <div class="media mt-3">
                                                                    <a class="pr-3" href="#">
                                                                        <img src="{{ url('assets/img/profile-11.jpg') }}" alt="Generic placeholder image">
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <h5 class="mt-0">{{__('Media heading')}}</h5>
                                                                        {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-line-pills-messages" role="tabpanel" aria-labelledby="v-line-pills-messages-tab">
                                                        <p>
                                                            {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="tabsWithIcons" class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Rounded Corner Pills With Icon')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area rounded-corner-pills-icon">
                                        <ul class="nav nav-pills mb-4 mt-3  justify-content-center" id="rounded-corner-pills-icon-tab" role="tablist">
                                            <li class="nav-item ml-2 mr-2">
                                                <a class="nav-link mb-2 active text-center" id="rounded-corner-pills-icon-home-tab" data-toggle="pill" href="#rounded-corner-pills-icon-home" role="tab" aria-controls="rounded-corner-pills-icon-home" aria-selected="true"><i class="las la-home"></i> {{__('Tabs')}}Home</a>
                                            </li>
                                            <li class="nav-item ml-2 mr-2">
                                                <a class="nav-link mb-2 text-center" id="rounded-corner-pills-icon-about-tab" data-toggle="pill" href="#rounded-corner-pills-icon-about" role="tab" aria-controls="rounded-corner-pills-icon-about" aria-selected="false"><i class="las la-user-tie"></i> {{__('Tabs')}}About</a>
                                            </li>
                                            <li class="nav-item ml-2 mr-2">
                                                <a class="nav-link mb-2 text-center" id="rounded-corner-pills-icon-messages-tab" data-toggle="pill" href="#rounded-corner-pills-icon-messages" role="tab" aria-controls="rounded-corner-pills-icon-messages" aria-selected="false"><i class="las la-envelope-open-text"></i> {{__('Tabs')}}Messages</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="rounded-corner-pills-icon-tabContent">
                                            <div class="tab-pane fade show active" id="rounded-corner-pills-icon-home" role="tabpanel" aria-labelledby="rounded-corner-pills-icon-home-tab">
                                                <p class="mb-4">
                                                    {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                </p>
                                                <p>
                                                {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                <p>
                                            </div>
                                            <div class="tab-pane fade" id="rounded-corner-pills-icon-about" role="tabpanel" aria-labelledby="rounded-corner-pills-icon-about-tab">
                                                <div class="media">
                                                    <img class="mr-3" src="{{ url('assets/img/profile-10.jpg') }}" alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{__('Media heading')}}</h5>
                                                        {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                        <div class="media mt-3">
                                                            <a class="pr-3" href="#">
                                                                <img src="{{ url('assets/img/profile-11.jpg') }}" alt="Generic placeholder image">
                                                            </a>
                                                            <div class="media-body">
                                                                <h5 class="mt-0">{{__('Media heading')}}</h5>
                                                                {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="rounded-corner-pills-icon-messages" role="tabpanel" aria-labelledby="rounded-corner-pills-icon-messages-tab">
                                                <p>
                                                    {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Rounded Circle Pills With Icon')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area rounded-circle-pills-icon">
                                        <ul class="nav nav-pills mb-4 mt-3  justify-content-center" id="rounded-circle-pills-icon-tab" role="tablist">
                                            <li class="nav-item mr-2">
                                                <a class="nav-link mb-1 rounded-circle active" id="rounded-circle-pills-icon-home-tab" data-toggle="pill" href="#rounded-circle-pills-icon-home" role="tab" aria-controls="rounded-circle-pills-icon-home" aria-selected="true"><i class="las la-home"></i></a>
                                            </li>
                                            <li class="nav-item ml-2 mr-2">
                                                <a class="nav-link mb-1 rounded-circle" id="rounded-circle-pills-icon-about-tab" data-toggle="pill" href="#rounded-circle-pills-icon-about" role="tab" aria-controls="rounded-circle-pills-icon-about" aria-selected="false"><i class="las la-user-tie"></i></a>
                                            </li>
                                            <li class="nav-item ml-2 mr-2">
                                                <a class="nav-link mb-1 rounded-circle" id="rounded-circle-pills-icon-messages-tab" data-toggle="pill" href="#rounded-circle-pills-icon-messages" role="tab" aria-controls="rounded-circle-pills-icon-messages" aria-selected="false"><i class="las la-envelope-open-text"></i></a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="rounded-circle-pills-icon-tabContent">
                                            <div class="tab-pane fade show active" id="rounded-circle-pills-icon-home" role="tabpanel" aria-labelledby="rounded-circle-pills-icon-home-tab">
                                                <p class="mb-4">
                                                    {{__('Jin text here dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.')}}
                                                </p>
                                                <p>
                                                    {{__('Jin text here dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.')}}
                                                </p>
                                            </div>
                                            <div class="tab-pane fade" id="rounded-circle-pills-icon-about" role="tabpanel" aria-labelledby="rounded-circle-pills-icon-about-tab">
                                                <div class="media">
                                                    <img class="mr-3" src="{{ url('assets/img/profile-10.jpg') }}" alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{__('Media heading')}}</h5>
                                                        {{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. ')}}
                                                        <div class="media mt-3">
                                                            <a class="pr-3" href="#">
                                                                <img src="{{ url('assets/img/profile-11.jpg') }}" alt="Generic placeholder image">
                                                            </a>
                                                            <div class="media-body">
                                                                <h5 class="mt-0">{{__('Media heading')}}</h5>
                                                                {{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.')}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="rounded-circle-pills-icon-messages" role="tabpanel" aria-labelledby="rounded-circle-pills-icon-messages-tab">
                                                <p>
                                                    {{__('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.')}}
                                                </p>
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
