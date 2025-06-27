@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/apps/mailbox.css') !!}
    {!! Html::style('assets/css/elements/tooltip.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area Starts -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Apps')}}</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('Email')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Inbox')}}</span></li>
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
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-xl-12  col-md-12">
                        <div class="card-box email-inbox">
                            <div class="email-left">
                                <a href="apps_mail_create.html" class="ripple-button m-auto ripple-button-primary btn-sm text-white font-12" type="button">
                                    <div class="ripple-ripple js-ripple">
                                        <span class="ripple-ripple__circle"></span>
                                    </div>
                                    <i class="las la-plus"></i> {{__('Create new mail')}}
                                </a>
                                <div class="email-list mt-4">
                                    <a href="javascript: void(0);" class="text-primary stronger">
                                        <i class="las la-inbox mr-2 font-17"></i>
                                        {{__('Inbox')}}<span class="badge badge-primary ml-auto">7</span>
                                    </a>
                                    <a href="javascript: void(0);">
                                        <i class="las la-star mr-2 font-17"></i> {{__('Starred')}}
                                    </a>
                                    <a href="javascript: void(0);">
                                        <i class="las la-clipboard-list mr-2 font-17"></i>
                                        {{__('Draft')}}
                                        <span class="badge badge-primary ml-auto">2</span>
                                    </a>
                                    <a href="javascript: void(0);">
                                        <i class="lar la-envelope mr-2 font-17"></i>{{__('Sent Mail')}}
                                    </a>
                                    <a href="javascript: void(0);">
                                        <i class="las la-trash mr-2 font-17"></i>{{__('Trash')}}
                                    </a>
                                    <a href="javascript: void(0);">
                                        <i class="las la-tag mr-2 font-17"></i> {{__('Important')}}
                                    </a>
                                    <a href="javascript: void(0);">
                                        <i class="las la-exclamation-circle mr-2 font-17"></i> {{__('Spam')}}
                                    </a>
                                </div>
                                <h6 class="mt-3 email-label"> {{__('Labels')}}</h6>
                                <div class="list-group b-0 mail-list">
                                    <a href="#" class="list-group-item border-0">
                                        <span class="solid-circle badge-info mr-2"></span>
                                        {{__('Project')}}
                                    </a>
                                    <a href="#" class="list-group-item border-0">
                                        <span class="solid-circle badge-success-teal mr-2"></span>
                                        {{__('Web App')}}
                                    </a>
                                    <a href="#" class="list-group-item border-0">
                                        <span class="solid-circle badge-warning mr-2"></span>
                                        {{__('Development')}}
                                    </a>
                                    <a href="#" class="list-group-item border-0">
                                        <span class="solid-circle badge-danger mr-2"></span>
                                        {{__('Expense')}}
                                    </a>
                                    <a href="#" class="list-group-item border-0">
                                        <span class="solid-circle badge-dark mr-2"></span>
                                        {{__('Server')}}
                                    </a>
                                </div>
                            </div>
                            <div class="email-right">
                                <div class="email-right-top">
                                    <div class="email-search-container">
                                        <div class="login-one-inputs check">
                                            <input class="inp-cbx selectall" id="cbx1" type="checkbox" style="display: none"/>
                                            <label class="cbx" for="cbx1">
                                                        <span>
                                                            <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                            </svg>
                                                        </span>
                                            </label>
                                        </div>
                                        <div class="mail-options">
                                            <a title="{{__('Archive')}}" data-placement="bottom"  class="font-19 mr-2 ml-3 pointer pt-1 bs-tooltip"><i class="las la-archive"></i></a>
                                            <a title="{{__('Spam')}}" data-placement="bottom"  class="font-19 mr-2 ml-2 pointer pt-1 bs-tooltip"><i class="las la-exclamation-circle"></i></a>
                                            <a title="{{__('Delete')}}" data-placement="bottom"  class="font-19 mr-2 ml-2 pointer pt-1 bs-tooltip"><i class="lar la-trash-alt"></i></a>
                                            <a title="{{__('Mark as unread')}}" data-placement="bottom"  class="font-19 mr-2 ml-2 pointer pt-1 bs-tooltip"><i class="lar la-envelope"></i></a>
                                            <a title="{{__('Snooze')}}" data-placement="bottom"  class="font-19 mr-2 ml-2 pointer pt-1 bs-tooltip"><i class="las la-stopwatch"></i></a>
                                            <a title="{{__('Labels')}}" data-placement="bottom"  class="font-19 mr-2 ml-2 pointer pt-1 bs-tooltip"><i class="las la-tag"></i></a>
                                        </div>
                                        <div class="mail-options-default">
                                            <a title="Refresh" data-placement="bottom"  class="font-19 mr-3 ml-3 pointer pt-1 bs-tooltip"><i class="las la-sync-alt"></i></a>
                                            <div class="email-search-input">
                                                <form class="email-form d-flex align-center" action="javascript:void(0);">
                                                    <i class="las la-search"></i>
                                                    <input type="text" class="mail-write-box form-control input-search" placeholder="{{__('Search')}}">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="email-options-container">
                                        <div class="dropdown custom-dropdown-icon show">
                                            <a class="email-pagination" data-toggle="dropdown" aria-expanded="false">
                                                <span> {{__('1-50 of 71')}}</span>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item current" href="javascript: void(0);"> {{__('Newest')}}</a>
                                                <a class="dropdown-item" href="javascript: void(0);"> {{__('Oldest')}}</a>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <a title="{{__('Newer')}}" data-placement="bottom" class="email-pagination-arrow font-19 mr-2 ml-3 pointer bs-tooltip"><i class="las la-angle-left"></i></a>
                                            <a title="{{__('Older')}}" data-placement="bottom" class="email-pagination-arrow font-19 mr-0 ml-2 pointer bs-tooltip"><i class="las la-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="email-right-bottom">
                                    <div class="mt-3 d-block">
                                        <ul class="message-list">
                                            <li class="unread">
                                                <div class="mail-list-left">
                                                    <div class="login-one-inputs check">
                                                        <input class="inp-cbx justone" id="cbx2" type="checkbox" style="display: none"/>
                                                        <label class="cbx" for="cbx2">
                                                                    <span>
                                                                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                        </svg>
                                                                    </span>
                                                        </label>
                                                    </div>
                                                    <a class="font-19 mr-3 ml-3 pointer pt-1 bs-tooltip email-starred">
                                                        <i class="lar la-star"></i>
                                                    </a>
                                                    <a href="" class="title"> {{__('Leon.S.Kennedy')}}</a>
                                                </div>
                                                <div class="mail-list-right">
                                                    <a href="" class="subject"> {{__('Leon.S.Kennedy has sent')}}
                                                        {{__('you a direct message on Twitter! &nbsp;–&nbsp;')}}
                                                        <span class="teaser">{{__('@LucasKriebel - Very cool :) Nicklas, You have a new direct message.')}}</span>
                                                    </a>
                                                    <div class="date"> {{__('11:49 am')}}</div>
                                                </div>
                                            </li>
                                            <li class="">
                                                <div class="mail-list-left">
                                                    <div class="login-one-inputs check">
                                                        <input class="inp-cbx justone" id="cbx3" type="checkbox" style="display: none"/>
                                                        <label class="cbx" for="cbx3">
                                                                    <span>
                                                                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                        </svg>
                                                                    </span>
                                                        </label>
                                                    </div>
                                                    <a class="font-19 mr-3 ml-3 pointer pt-1 bs-tooltip email-starred">
                                                        <i class="lar la-star"></i>
                                                    </a>
                                                    <a href="" class="title"> {{__('John, me (3)')}}</a>
                                                </div>
                                                <div class="mail-list-right">
                                                    <a href="" class="subject"> {{__('Expense Tab - you will get the entire result in a single page.')}}
                                                    </a>
                                                    <div class="date"> {{__('10:00 am')}}</div>
                                                </div>
                                            </li>
                                            <li class="">
                                                <div class="mail-list-left">
                                                    <div class="login-one-inputs check">
                                                        <input class="inp-cbx justone" id="cbx4" type="checkbox" style="display: none"/>
                                                        <label class="cbx" for="cbx4">
                                                                    <span>
                                                                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                        </svg>
                                                                    </span>
                                                        </label>
                                                    </div>
                                                    <a class="font-19 mr-3 ml-3 pointer pt-1 bs-tooltip email-starred">
                                                        <i class="lar la-star"></i>
                                                    </a>
                                                    <a href="" class="title"> {{__('Company HR')}}</a>
                                                </div>
                                                <div class="mail-list-right">
                                                    <a href="" class="subject"> {{__('Letter of appreciation - Hello, We would like to tell you that you have')}}
                                                    </a>
                                                    <div class="date"> {{__('09:00 am')}}</div>
                                                </div>
                                            </li>
                                            <li class="unread">
                                                <div class="mail-list-left">
                                                    <div class="login-one-inputs check">
                                                        <input class="inp-cbx justone" id="cbx5" type="checkbox" style="display: none"/>
                                                        <label class="cbx" for="cbx5">
                                                                    <span>
                                                                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                        </svg>
                                                                    </span>
                                                        </label>
                                                    </div>
                                                    <a class="font-19 mr-3 ml-3 pointer pt-1 bs-tooltip email-starred">
                                                        <i class="lar la-star"></i>
                                                    </a>
                                                    <a class="font-19 mr-3 pointer pt-1 bs-tooltip email-starred">
                                                        <i class="las la-paperclip"></i>
                                                    </a>
                                                    <a href="" class="title"> {{__('Indigo, me (5)')}}</a>
                                                </div>
                                                <div class="mail-list-right">
                                                    <a href="" class="subject"> {{__('Server Maintainance - Server has been restarted with the latest version')}}
                                                    </a>
                                                    <div class="date">
                                                        {{__('08:00 am')}}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="">
                                                <div class="mail-list-left">
                                                    <div class="login-one-inputs check">
                                                        <input class="inp-cbx justone" id="cbx6" type="checkbox" style="display: none"/>
                                                        <label class="cbx" for="cbx6">
                                                                    <span>
                                                                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                        </svg>
                                                                    </span>
                                                        </label>
                                                    </div>
                                                    <a class="font-19 mr-3 ml-3 pointer pt-1 bs-tooltip email-starred">
                                                        <i class="lar la-star"></i>
                                                    </a>
                                                    <a href="" class="title"> {{__('Umbrella Corporation')}}</a>
                                                </div>
                                                <div class="mail-list-right">
                                                    <a href="" class="subject"> {{__('High Maintanence Cost - We are very sorry that we can\'t afford to')}}
                                                    </a>
                                                    <div class="date">
                                                        {{__('04:00 am')}}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="">
                                                <div class="mail-list-left">
                                                    <div class="login-one-inputs check">
                                                        <input class="inp-cbx justone" id="cbx7" type="checkbox" style="display: none"/>
                                                        <label class="cbx" for="cbx7">
                                                                    <span>
                                                                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                        </svg>
                                                                    </span>
                                                        </label>
                                                    </div>
                                                    <a class="font-19 mr-3 ml-3 pointer pt-1 bs-tooltip email-starred">
                                                        <i class="lar la-star"></i>
                                                    </a>
                                                    <a href="" class="title"> {{__('BlueBerry Pvt. Ltd.')}}</a>
                                                </div>
                                                <div class="mail-list-right">
                                                    <a href="" class="subject"> {{__('Save your ideas about UI - Don\'t let this get away easily')}}
                                                    </a>
                                                    <div class="date">
                                                        {{__('02:00 am')}}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="">
                                                <div class="mail-list-left">
                                                    <div class="login-one-inputs check">
                                                        <input class="inp-cbx justone" id="cbx8" type="checkbox" style="display: none"/>
                                                        <label class="cbx" for="cbx8">
                                                                    <span>
                                                                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                        </svg>
                                                                    </span>
                                                        </label>
                                                    </div>
                                                    <a class="font-19 mr-3 ml-3 pointer pt-1 bs-tooltip email-starred">
                                                        <i class="lar la-star"></i>
                                                    </a>
                                                    <a href="" class="title"> {{__('Myntra.com')}}</a>
                                                </div>
                                                <div class="mail-list-right">
                                                    <a href="" class="subject"> {{__('Skip the draft - Share your work with 50% more space on the cloud')}}
                                                    </a>
                                                    <div class="date">
                                                        {{__('Rakhibhitsu (Instargram)')}}x
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="">
                                                <div class="mail-list-left">
                                                    <div class="login-one-inputs check">
                                                        <input class="inp-cbx justone" id="cbx9" type="checkbox" style="display: none"/>
                                                        <label class="cbx" for="cbx9">
                                                                    <span>
                                                                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                        </svg>
                                                                    </span>
                                                        </label>
                                                    </div>
                                                    <a class="font-19 mr-3 ml-3 pointer pt-1 bs-tooltip email-starred">
                                                        <i class="lar la-star"></i>
                                                    </a>
                                                    <a href="" class="title"> {{__('Rakhibhitsu (Instargram)')}}</a>
                                                </div>
                                                <div class="mail-list-right">
                                                    <a href="" class="subject"> {{__('Deleted Post - Your post has been deleted yesterday and we are very sorry')}}
                                                    </a>
                                                    <div class="date">
                                                        {{__('Oct 01')}}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="">
                                                <div class="mail-list-left">
                                                    <div class="login-one-inputs check">
                                                        <input class="inp-cbx justone" id="cbx10" type="checkbox" style="display: none"/>
                                                        <label class="cbx" for="cbx10">
                                                                    <span>
                                                                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                        </svg>
                                                                    </span>
                                                        </label>
                                                    </div>
                                                    <a class="font-19 mr-3 ml-3 pointer pt-1 bs-tooltip email-starred">
                                                        <i class="lar la-star"></i>
                                                    </a>
                                                    <a href="" class="title"> {{__('Emanuel, me (10)')}}</a>
                                                </div>
                                                <div class="mail-list-right">
                                                    <a href="" class="subject"> {{__('Old UI issue - check again, i have updated the code and restarted the server')}}
                                                    </a>
                                                    <div class="date">
                                                        {{__('Sep 30')}}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="unread">
                                                <div class="mail-list-left">
                                                    <div class="login-one-inputs check">
                                                        <input class="inp-cbx justone" id="cbx11" type="checkbox" style="display: none"/>
                                                        <label class="cbx" for="cbx11">
                                                                    <span>
                                                                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                        </svg>
                                                                    </span>
                                                        </label>
                                                    </div>
                                                    <a class="font-19 mr-3 ml-3 pointer pt-1 bs-tooltip email-starred">
                                                        <i class="lar la-star"></i>
                                                    </a>
                                                    <a class="font-19 mr-3 pointer pt-1 bs-tooltip email-starred">
                                                        <i class="las la-paperclip"></i>
                                                    </a>
                                                    <a href="" class="title"> {{__('me, Sussane (3)')}}</a>
                                                </div>
                                                <div class="mail-list-right">
                                                    <a href="" class="subject"> {{__('Confirmed Ticket - Hey you bus ticket has been confirmed and we are ready to go')}}
                                                    </a>
                                                    <div class="date">
                                                        {{__('Sep 28')}}
                                                    </div>
                                                </div>
                                            </li>
                                            <button class="btn btn-primary btn-sm float-right next-button mt-3"> {{__('Next')}}</button>
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
    {!! Html::script('assets/js/apps/custom-mailbox.js') !!}
@endpush

@push('custom-scripts')

@endpush
