@extends('layout.master-auth')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/pages/helpdesk.css') !!}
@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="helpdesk-header-wrapper">
        <nav class="navbar navbar-expand">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/dashboard/dashboard2') }}">NEPTUNE</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{__('Toggle navigation')}}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link text-primary" target="_blank" href="{{ url('/pages/contact-us') }}"> {{__('Which is the best browser ?')}}x</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row mt-5 pb-5">
                <div class="col-md-12 align-self-center order-md-0 order-1 mt-5">
                    <h1 class="mb-2">{{__('Helpdesk')}}</h1>
                    <p class="mb-5">
                        <a href="{{ url('/dashboard/dashboard1') }}">{{__('Dashboard')}}</a> / <a>{{__('Helpdesk')}}</a>
                    </p>
                </div>
                <div class="helpdesk-input-group">
                    <input id="text" name="text" required="" class="helpdesk-input" type="text" value="" placeholder="{{__('Search here')}}">
                    <button><i class="las la-search"></i> {{__('Search')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="d-flex align-items-center single-helpdesk-option mb-3 active">
                    <i class="las la-cog text-primary"></i>
                    <div class="ml-3">
                        <h6 class="text-primary">{{__('Search here')}}x</h6>
                        <p>{{__('Get started fast with installation')}}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center single-helpdesk-option mb-3">
                    <i class="las la-user-shield text-primary"></i>
                    <div class="ml-3">
                        <h6 class="text-primary">{{__('User Account')}}</h6>
                        <p>{{__('All the user related queries')}}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center single-helpdesk-option mb-3">
                    <i class="las la-sliders-h text-primary"></i>
                    <div class="ml-3">
                        <h6 class="text-primary">{{__('Product Features')}}</h6>
                        <p>{{__('Have some issue with the product?')}}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center single-helpdesk-option mb-3">
                    <i class="las la-code text-primary"></i>
                    <div class="ml-3">
                        <h6 class="text-primary">{{__('Customization')}}</h6>
                        <p>{{__('Customization is available too')}}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center single-helpdesk-option mb-3">
                    <i class="lar la-credit-card text-primary"></i>
                    <div class="ml-3">
                        <h6 class="text-primary">{{__('Payment Gateway')}}</h6>
                        <p>{{__('Payment related queries')}}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center single-helpdesk-option mb-3">
                    <i class="las la-lock text-primary"></i>
                    <div class="ml-3">
                        <h6 class="text-primary">{{__('Security Options')}}</h6>
                        <p>{{__('Your security is our priority')}}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center single-helpdesk-option mb-3">
                    <i class="las la-network-wired text-primary"></i>
                    <div class="ml-3">
                        <h6 class="text-primary">{{__('API Guidelines')}}</h6>
                        <p>{{__('Only for developers')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 card">
                <div class="helpdesk-option-detail card-body">
                    <h6 class="mt-2 mb-4"><strong>{{__('Only for developers')}}x</strong></h6>
                    <p>{{__('Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).')}}</p>
                    <blockquote>
                        <p>{{__('The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced')}}</p>
                    </blockquote>
                    <div class="mt-5 position-relative black-overlay">
                        <img src="{{ url('assets/img/lightbox-1.jpg') }}" width="100%"/>
                        <i class="lar la-play-circle video-play-icon"></i>
                    </div>
                    <p class="mt-5">{{__('Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).')}}</p>
                    <ul>
                        <li>{{__('Many desktop publishing packages')}}</li>
                        <li>{{__('Various versions have evolved over the years')}}</li>
                        <li>{{__('The standard chunk of Lorem Ipsum')}}</li>
                    </ul>
                    <div class="d-flex align-items-center justify-content-between bg-gradient-success p-3 rounded mt-5">
                        <p class="text-light mb-0">{{__('Updated on : 02.02.2020')}}</p>
                        <p class="text-light mb-0 social-share">{{__('Share :')}}
                            <i class="lab la-facebook-f"></i>
                            <i class="lab la-twitter"></i>
                            <i class="lab la-instagram"></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="card d-block">
                    <div class="card-body">
                        <h4 class="mt-0 font-18">{{__('Join Discussion')}}</h4>
                        <div class="media mt-4">
                            <img class="mr-2 rounded-circle" src="{{ url('assets/img/profile-23.jpg') }}" alt="Generic placeholder image" height="32">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1 font-15">{{__('Jonathan Andrews')}}
                                    <small class="text-muted float-right font-11">{{__('3 hours ago')}}</small>
                                </h5>
                                <span class="font-13">{{__('The standard chunk of design used since the servre is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from Cicero are also reproduced in their exact original form, accompanied by English versions from the server translation by H. Rackham.')}}</span>
                                <br>
                                <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="las la-reply"></i> {{__('Reply')}}</a>
                            </div>
                        </div>
                        <div class="media mt-4">
                            <img class="mr-2 rounded-circle" src="{{ url('assets/img/profile-22.jpg') }}" alt="Generic placeholder image" height="32">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1 font-15">{{__('Kim Grey')}}
                                    <small class="text-muted float-right font-11">{{__('5 hours ago')}}</small>
                                </h5>
                                <span class="font-13">{{__('If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.')}}</span>
                                <br>
                                <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="las la-reply"></i> {{__('Reply')}}</a>
                            </div>
                        </div>
                        <div class="media mt-4">
                            <img class="mr-2 rounded-circle" src="{{ url('assets/img/profile-23.jpg') }}" alt="Generic placeholder image" height="32">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1 font-15">{{__('Jonathan Andrews')}}
                                    <small class="text-muted float-right font-11">{{__('11 hours ago')}}</small>
                                </h5>
                                <span class="font-13">{{__('Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).')}}</span>
                                <br>
                                <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="las la-reply"></i> {{__('Reply')}}</a>
                            </div>
                        </div>
                        <div class="form-group mb-0 align-items-center d-flex mt-5">
                            <textarea name="txt" placeholder="Type here" class="form-control" required=""></textarea>
                            <a class="ml-2 btn-sm btn btn-primary bg-gradient-primary">{{__('Hi')}}Add</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5 text-center helpdesk-team">
                <h5>{{__('Didn\'t find an answer?')}}</h5>
                <p>{{__('Our team is just an email away and ready to answer all questions')}}</p>
                <div class="d-flex align-items-center justify-content-center">
                    <div class="single-user mt-4 mr-3 ml-3">
                        <a href="#"><img src="{{ url('assets/img/profile-21.jpg') }}" class="rounded-circle" height="70px"/></a>
                        <h6>{{__('Jhon Show')}}</h6>
                        <p>{{__('Support')}}</p>
                    </div>
                    <div class="single-user mt-4 mr-3 ml-3">
                        <a href="#"><img src="{{ url('assets/img/profile-20.jpg') }}" class="rounded-circle" height="70px"/></a>
                        <h6>{{__('David Buckner')}}</h6>
                        <p>{{__('Support')}}</p>
                    </div>
                    <div class="single-user mt-4 mr-3 ml-3">
                        <a href="#"><img src="{{ url('assets/img/profile-15.jpg') }}" class="rounded-circle" height="70px"/></a>
                        <h6>{{__('Rudi Bowner')}}</h6>
                        <p>{{__('Developer')}}</p>
                    </div>
                    <div class="single-user mt-4 mr-3 ml-3">
                        <a href="#"><img src="{{ url('assets/img/profile-23.jpg') }}" class="rounded-circle" height="70px"/></a>
                        <h6>{{__('Hary Roy')}}</h6>
                        <p>{{__('Systems')}}</p>
                    </div>
                    <div class="single-user mt-4 mr-3 ml-3">
                        <a href="#"><img src="{{ url('assets/img/profile-25.jpg') }}" class="rounded-circle" height="70px"/></a>
                        <h6>{{__('Sara Johnson')}}</h6>
                        <p>{{__('UI/UX Support')}}</p>
                    </div>
                    <div class="single-user mt-4 mr-3 ml-3">
                        <a href="#"><img src="{{ url('assets/img/profile-21.jpg') }}" class="rounded-circle" height="70px"/></a>
                        <h6>{{__('Kim carry')}}</h6>
                        <p>{{__('Developer')}}</p>
                    </div>
                    <div class="single-user mt-4 mr-3 ml-3">
                        <a href="#"><img src="{{ url('assets/img/profile-22.jpg') }}" class="rounded-circle" height="70px"/></a>
                        <h6>{{__('Jim Laker')}}</h6>
                        <p>{{__('System')}}</p>
                    </div>
                </div>
                <a class="btn btn-primary mt-5 btn-sm bg-gradient-primary" href="pages_contact_us.html">{{__('Contact Us')}}</a>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
    @include('include.footer')
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('assets/js/pages/helpdesk.js') !!}
@endpush

@push('custom-scripts')

@endpush
