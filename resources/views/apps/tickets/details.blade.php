@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/apps/tickets.css') !!}
    {!! Html::style('plugins/apex/apexcharts.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('Tickets')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Ticket Details')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area Starts -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="apps-ticket col-xl-8 col-lg-7 ticket-details mb-4">
                <div class="card d-block">
                    <div class="card-body">
                        <div class="float-right">
                            <div class="form-row">
                                <div class="col-auto">
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-3 mt-0 font-18 text-center"><a href="apps_tickets.html" class="btn btn-sm btn-primary p-1 float-left"><i class="las la-arrow-left"></i> {{__('Back')}}</a> {{__('Unable to initiate payout from last last month')}}</h4>
                        <div class="clerfix"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="mt-2 mb-1 font-13"> {{__('Ticket Type :')}}</label>
                                <p class="strong">
                                    <i class="las la-ticket-alt font-19 text-primary mr-1 align-middle"></i> {{__('Payout')}}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="mt-2 mb-1 font-13"> {{__('Reported By :')}}</label>
                                <div class="media">
                                    <img src="{{ url('assets/img/profile-2.jpg') }}" alt="Symond" class="rounded-circle mr-2" height="24">
                                    <div class="media-body">
                                        <p class="strong"> {{__('Symond Andrews')}} </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="mt-2 mb-1 font-13"> {{__('Assigned To :')}}</label>
                                <div class="media">
                                    <img src="{{ url('assets/img/profile-3.jpg') }}" alt="Debmalya" class="rounded-circle mr-2" height="24">
                                    <div class="media-body">
                                        <p class="strong"> {{__('Debmalya Sen')}} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="mt-2 mb-1 font-13"> {{__('Created On :')}}</label>
                                <p class="strong"> {{__('15 Aug 2020')}} <small class="text-muted"> {{__('2:45 PM')}}</small></p>
                            </div>
                            <div class="col-md-6">
                                <label class="mt-2 mb-1 font-13"> {{__('Updated On :')}}</label>
                                <p class="strong"> {{__('22 Aug 2020')}} <small class="text-muted"> {{__('3:00 PM')}}</small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="mt-2 mb-1 font-13"> {{__('Status :')}}</label>
                                <div class="form-group">
                                    <select class="btn btn-outline-primary btn-sm h-auto p-2" id="exampleFormControlSelect1">
                                        <option> {{__('Pending')}}</option>
                                        <option> {{__('Open')}}</option>
                                        <option> {{__('Closed')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="mt-2 mb-1 font-13"> {{__('Priority :')}}</label>
                                <div class="form-row">
                                    <div class="form-group">
                                        <select class="btn btn-outline-primary btn-sm h-auto p-2" id="exampleFormControlSelect1">
                                            <option> {{__('Low')}}</option>
                                            <option> {{__('Medium')}}</option>
                                            <option> {{__('High')}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label class="mt-4 mb-1 font-13"> {{__('Message :')}}</label>
                        <p class="mb-0 strong">
                            {{__('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.')}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="apps-ticket col-xl-4 col-lg-5 ticket-details mb-4">
                <div class="card d-block">
                    <div class="card-body">
                        <h4 class="mb-3 mt-0 font-18"> {{__('Attachments')}}</h4>
                        <div class="d-flex mb-0">
                            <div class="w-100">
                                <div class="">
                                    <div class="card mb-1 shadow-none border-0">
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
                                                    <a href="javascript:void(0);" class="text-success-teal strong"> {{__('issue_1.jpg')}}</a>
                                                    <p class="mb-0"> {{__('3.25 MB')}}</p>
                                                </div>
                                                <div class="col-auto">
                                                    <a title="Download issue_1.jpg" href="javascript:void(0);" class="font-25 text-primary mr-2 bs-tooltip">
                                                        <i class="las la-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-1 shadow-none border-0">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar-sm">
                                                                <span class="avatar-sm background-info text-white rounded d-flex align-center justify-content-center">
                                                                    .DOC
                                                                </span>
                                                    </div>
                                                </div>
                                                <div class="col pl-0">
                                                    <a href="javascript:void(0);" class="text-info strong"> {{__('issue_list.doc')}}</a>
                                                    <p class="mb-0"> {{__('3.25 MB')}}</p>
                                                </div>
                                                <div class="col-auto">
                                                    <a title="{{__('Download issue_list.doc')}}" href="javascript:void(0);" class="font-25 text-primary mr-2 bs-tooltip">
                                                        <i class="las la-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-1 shadow-none border-0">
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
                                                    <a href="javascript:void(0);" class="text-success-teal strong"> {{__('issue_2.jpg')}}</a>
                                                    <p class="mb-0"> {{__('3.25 MB')}}</p>
                                                </div>
                                                <div class="col-auto">
                                                    <a title="{{__('Download issue_2.jpg')}}" href="javascript:void(0);" class="font-25 text-primary mr-2 bs-tooltip">
                                                        <i class="las la-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-1 shadow-none border-0">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar-sm">
                                                                <span class="avatar-sm background-danger text-white rounded d-flex align-center justify-content-center">
                                                                    .PDF
                                                                </span>
                                                    </div>
                                                </div>
                                                <div class="col pl-0">
                                                    <a href="javascript:void(0);" class="text-danger strong"> {{__('changes.jpg')}}</a>
                                                    <p class="mb-0">{{__('3.25 MB')}}</p>
                                                </div>
                                                <div class="col-auto">
                                                    <a title="{{__('Download changes.jpg')}}" href="javascript:void(0);" class="font-25 text-primary mr-2 bs-tooltip">
                                                        <i class="las la-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-0 shadow-none border-0">
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
                                                    <a href="javascript:void(0);" class="text-success-teal strong"> {{__('ui-desing.jpg')}}</a>
                                                    <p class="mb-0"> {{__('3.25 MB')}}</p>
                                                </div>
                                                <div class="col-auto">
                                                    <a title="{{__('Download ui-desing.jpg')}}" href="javascript:void(0);" class="font-25 text-primary mr-2 bs-tooltip">
                                                        <i class="las la-download"></i>
                                                    </a>
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
            <div class="apps-ticket col-xl-12 col-lg-12 ticket-details">
                <div class="card d-block">
                    <div class="card-body">
                        <h4 class="mt-0 font-18"> {{__('Customer Support Discussion')}}</h4>
                        <div class="media mt-4">
                            <img class="mr-2 rounded-circle" src="{{ url('assets/img/profile-22.jpg') }}" alt="Generic placeholder image" height="32">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1 font-15"> {{__('Jonathan Andrews')}}
                                    <small class="text-muted float-right font-11"> {{__('3 hours ago')}}</small>
                                </h5>
                                <span class="font-13"> {{__('The standard chunk of design used since the servre is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from Cicero are also reproduced in their exact original form, accompanied by English versions from the server translation by H. Rackham.')}}</span>
                                <br>
                                <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="las la-reply"></i> {{__('Reply')}}</a>
                            </div>
                        </div>
                        <div class="media mt-4">
                            <img class="mr-2 rounded-circle" src="{{ url('assets/img/profile-24.jpg') }}" alt="{{__('Apps')}}Generic placeholder image" height="32">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1 font-15"> {{__('Kim Grey')}}
                                    <small class="text-muted float-right font-11"> {{__('5 hours ago')}}</small>
                                </h5>
                                <span class="font-13"> {{__('If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.')}}</span>
                                <br>
                                <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="las la-reply"></i> {{__('Reply')}}</a>
                            </div>
                        </div>
                        <div class="media mt-4">
                            <img class="mr-2 rounded-circle" src="{{ url('assets/img/profile-26.jpg') }}" alt="Generic placeholder image" height="32">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1 font-15"> {{__('Jonathan Andrews')}}
                                    <small class="text-muted float-right font-11"> {{__('11 hours ago')}}</small>
                                </h5>
                                <span class="font-13"> {{__('Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).')}}</span>
                                <br>
                                <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="las la-reply"></i> {{__('Reply')}}</a>
                            </div>
                        </div>
                        <div class="form-group mb-0 align-center d-flex mt-5">
                            <textarea name="txt" placeholder="{{__('Type here')}}" class="form-control" required=""></textarea>
                            <i class="las la-paperclip font-25 ml-2 pointer"></i>
                            <a class="ml-2 btn-sm btn btn-primary"> {{__('Add')}}</a>
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
    {!! Html::script('plugins/apex/apexcharts.min.js') !!}
    {!! Html::script('assets/js/apps/tickets.js') !!}
@endpush

@push('custom-scripts')

@endpush
