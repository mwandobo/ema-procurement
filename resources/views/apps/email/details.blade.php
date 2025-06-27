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
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('Apps')}}</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('Email')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Email Details')}}</span></li>
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
                    <div class="col-xl-12 col-md-12">
                        <div class="card-box email-inbox">
                            <div class="email-left">
                                <a href="{{ url('/apps/email/inbox') }}" class="ripple-button m-auto ripple-button-primary btn-sm text-white font-12" type="button">
                                    <div class="ripple-ripple js-ripple">
                                        <span class="ripple-ripple__circle"></span>
                                    </div>
                                    <i class="las la-arrow-left"></i> {{__('Back to Inbox')}}
                                </a>
                                <div class="email-list mt-4">
                                    <a href="javascript: void(0);">
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
                                        <i class="lar la-envelope mr-2 font-17"></i> {{__('Sent Mail')}}
                                    </a>
                                    <a href="javascript: void(0);">
                                        <i class="las la-trash mr-2 font-17"></i> {{__('Trash')}}
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
                                <div class="email-right-top flex-column align-items-start">
                                    <div class="email-search-container pl-0">
                                        <div class="mail-options d-flex">
                                            <a title="{{__('Archive')}}" data-placement="bottom"  class="font-19 mr-0 ml-0 justify-content-start pointer pt-1 bs-tooltip"><i class="las la-archive"></i></a>
                                            <a title="{{__('Spam')}}" data-placement="bottom"  class="font-19 mr-2 ml-0 pointer pt-1 bs-tooltip"><i class="las la-exclamation-circle"></i></a>
                                            <a title="{{__('Delete')}}" data-placement="bottom"  class="font-19 mr-2 ml-0 pointer pt-1 bs-tooltip"><i class="lar la-trash-alt"></i></a>
                                            <a title="{{__('Mark as unread')}}" data-placement="bottom"  class="font-19 mr-2 ml-0 pointer pt-1 bs-tooltip"><i class="lar la-envelope"></i></a>
                                            <a title="{{__('Snooze')}}" data-placement="bottom"  class="font-19 mr-2 ml-0 pointer pt-1 bs-tooltip"><i class="las la-stopwatch"></i></a>
                                            <a title="{{__('Labels')}}" data-placement="bottom"  class="font-19 mr-2 ml-0 pointer pt-1 bs-tooltip"><i class="las la-tag"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="email-right-bottom">
                                    <div class="mt-4 d-block">
                                        <h5 class="font-18"> {{__('Please resolve these queries before sending quotes')}}</h5>
                                        <hr>
                                        <div class="media mb-3 mt-1">
                                            <img class="d-flex mr-2 rounded-circle" src="{{ url('assets/img/profile-5.jpg') }}" alt="placeholder image" height="32">
                                            <div class="media-body">
                                                <small class="float-right"> {{__('Jun 26, 2020, 7:14 PM')}}</small>
                                                <h6 class="m-0 font-14"> {{__('Samuel Johnson')}}</h6>
                                                <small class="text-muted"> {{__('From: samuel@domain.com')}}</small>
                                            </div>
                                        </div>
                                        <p> {{__('Hello !')}}</p>
                                        <p> {{__('I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness :')}}</p>
                                        <ol>
                                            <li> {{__('Why do we use it?')}}</li>
                                            <li> {{__('Where does it come from?')}}</li>
                                            <li> {{__('Where can I get some?')}}</li>
                                        </ol>
                                        <p> {{__('To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it?')}}</p>
                                        <p><b> {{__('Warm Regards,')}}</b> <br> {{__('Samuel Johnson')}}</p>
                                        <hr>
                                        <h5 class="mb-3"> {{__('Attachments')}}</h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card mb-1 shadow-none border border-light">
                                                    <div class="p-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <div class="avatar-sm">
                                                                            <span class="avatar-sm background-info text-white rounded d-flex align-center justify-content-center">
                                                                                .MP4
                                                                            </span>
                                                                </div>
                                                            </div>
                                                            <div class="col pl-0">
                                                                <a href="javascript:void(0);" class="text-info strong"> {{__('Ui-Issue.mp4')}}</a>
                                                                <p class="mb-0"> {{__('10.25 MB')}}</p>
                                                            </div>
                                                            <div class="col-auto">
                                                                <!-- Button -->
                                                                <a href="javascript:void(0);" class="font-25 text-primary mr-2">
                                                                    <i class="las la-download"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-12">
                                                <div class="card mb-1 shadow-none border border-light">
                                                    <div class="p-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <div class="avatar-sm">
                                                                            <span class="avatar-sm background-success-teal text-white rounded d-flex align-center justify-content-center">
                                                                                .JPG
                                                                            </span>
                                                                </div>
                                                            </div>
                                                            <div class="col pl-0">
                                                                <a href="javascript:void(0);" class="text-success-teal strong"> {{__('design-changes.jpg')}}</a>
                                                                <p class="mb-0"> {{__('3.25 MB')}}</p>
                                                            </div>
                                                            <div class="col-auto">
                                                                <!-- Button -->
                                                                <a href="javascript:void(0);" class="font-25 text-primary mr-2">
                                                                    <i class="las la-download"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-12">
                                                <div class="card mb-1 shadow-none border border-light">
                                                    <div class="p-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <div class="avatar-sm">
                                                                            <span class="avatar-sm background-primary text-white rounded d-flex align-center justify-content-center">
                                                                                .ZIP
                                                                            </span>
                                                                </div>
                                                            </div>
                                                            <div class="col pl-0">
                                                                <a href="javascript:void(0);" class="text-primary strong"> {{__('backend-changes.zip')}}</a>
                                                                <p class="mb-0"> {{__('9.50 MB')}}</p>
                                                            </div>
                                                            <div class="col-auto">
                                                                <!-- Button -->
                                                                <a href="javascript:void(0);" class="font-25 text-primary mr-2">
                                                                    <i class="las la-download"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row-->
                                        <div class="mt-3 text-right">
                                            <a href="" class="btn btn-sm btn-primary mr-2"><i class="mdi mdi-reply mr-1"></i> {{__('Reply')}}</a>
                                            <a href="" class="btn btn-sm btn-dark"> {{__('Forward')}} <i class="mdi mdi-forward ml-1"></i></a>
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
    {!! Html::script('assets/js/apps/custom-mailbox.js') !!}
@endpush

@push('custom-scripts')

@endpush
