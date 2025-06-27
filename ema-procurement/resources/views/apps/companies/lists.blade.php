@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/ui-elements/pagination.css') !!}
    {!! Html::style('plugins/jquery-ui/jquery-ui.min.css') !!}
    {!! Html::style('assets/css/apps/companies.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Companies')}}</span></li>
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
        <div class="row layout-spacing layout-top-spacing" id="cancel-row">
            <div class="col-lg-12">
                <div class="">
                    <div class="widget-content searchable-container grid">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 filtered-list-search align-self-center w-100">
                                    <form class="form-inline my-2 my-lg-0">
                                        <div class="">
                                            <i class="las la-search toggle-search"></i>
                                            <input type="text" id="input-search" class="form-control search-form-control  ml-lg-auto" placeholder="{{__('Search Companies')}}">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-5 text-sm-right text-center align-self-center">
                                    <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                        <a id="btn-add-company" class="pointer font-25 s-o mr-2">
                                            <i class="las la-plus-circle"></i>
                                        </a>
                                        <a class="pointer font-25 s-o">
                                            <i class="las la-cog"></i>
                                        </a>
                                        <div class="dropdown custom-dropdown-icon mt-1">
                                            <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>{{__('Sort By')}}</span> <i class="las la-angle-down"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown" style="will-change: transform;">
                                                <a class="dropdown-item" href="javascript:void(0);"> {{__('Name')}}</a>
                                                <a class="dropdown-item" href="javascript:void(0);"> {{__('Projects')}}</a>
                                                <a class="dropdown-item" href="javascript:void(0);"> {{__('Team')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add Modal -->
                                    <div class="modal fade" id="addCompanyModal" tabindex="-1" role="dialog" aria-labelledby="addCompanyModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <i class="las la-times pointer" data-dismiss="modal"></i>
                                                    <div class="add-company-box">
                                                        <div class="add-company-content">
                                                            <h5 class="text-center mb-4"> {{__('Add a Company')}}</h5>
                                                            <form id="addCompanyModalTitle">
                                                                <div class="row">
                                                                    <div class="col-md-12 text-center">
                                                                        <img id="image" src="https://via.placeholder.com/75x75" style="border-radius:50%"/>
                                                                        <input type="file" id="myfile" style="display: none;"/>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="company-name">
                                                                            <i class="las la-briefcase"></i>
                                                                            <input type="text" id="c-name" class="form-control" placeholder=" {{__('Company Name')}}">
                                                                            <span class="validation-text"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="company-email">
                                                                            <i class="las la-map-marker"></i>
                                                                            <input type="text" id="c-email" class="form-control" placeholder="{{__('Company Location')}}">
                                                                            <span class="validation-text"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="company-project">
                                                                            <i class="las la-clipboard-list"></i>
                                                                            <input type="text" id="c-designation" class="form-control" placeholder="{{__('Project')}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="company-team">
                                                                            <i class="las la-user-friends"></i>
                                                                            <input type="text" id="c-contact" class="form-control" placeholder="{{__('Team')}}">
                                                                            <span class="validation-text"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="company-description">
                                                                            <i class="las la-pen"></i>
                                                                            <input type="text" id="c-location" class="form-control" placeholder="{{__('Description')}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a data-dismiss="modal" class="pointer text-primary font-12 mr-3"> {{__('Close')}}</a>
                                                    <button class="btn btn-sm btn-primary"> {{__('Add')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editContactModal" tabindex="-1" role="dialog" aria-labelledby="editContactModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <i class="flaticon-cancel-12 close" data-dismiss="modal"></i>
                                                    <div class="add-contact-box">
                                                        <div class="add-contact-content">
                                                            <h5 class="text-center mb-4"> {{__('Edit Contact')}}</h5>
                                                            <form id="addContactModalTitle">
                                                                <div class="row">
                                                                    <div class="col-md-12 text-center">
                                                                        <img id="image" src="{{ url('assets/img/profile-5.jpg') }}" style="border-radius:50%"/>
                                                                        <input type="file" id="myfile" style="display: none;"/>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="contact-name">
                                                                            <i class="las la-user"></i>
                                                                            <input value="{{__('Azeemo Shaan')}}" type="text" id="c-name" class="form-control" placeholder="{{__('Name')}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="contact-email">
                                                                            <i class="las la-envelope"></i>
                                                                            <input value="{{__('azeemo@mail.com')}}" type="text" id="c-email" class="form-control" placeholder="{{__('Email')}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="contact-designation">
                                                                            <i class="las la-briefcase"></i>
                                                                            <input value="{{__('Web Developer')}}" type="text" id="c-designation" class="form-control" placeholder="{{__('Designation')}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="contact-contact">
                                                                            <i class="las la-phone"></i>
                                                                            <input value="{{__('California, USA')}}" type="text" id="c-contact" class="form-control" placeholder="{{__('Contact')}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="contact-location">
                                                                            <i class="las la-map-marker"></i>
                                                                            <input value="{{__('+1 (070) 123-4567')}}" type="text" id="c-location" class="form-control" placeholder="{{__('Location')}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a data-dismiss="modal" class="pointer text-primary font-12 mr-3"> {{__('Close')}}</a>
                                                    <button class="btn btn-sm btn-primary"> {{__('Submit')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="searchable-items grid card-box">
                            <div class="items">
                                <div class="item-content">
                                    <div class="user-profile">
                                        <img src="{{ url('assets/img/company-5.jpg') }}" class="light-image" alt="avatar">
                                        <img src="{{ url('assets/img/company-5.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="user-name"> {{__('Link Technology')}}</p>
                                            <p class="user-work"> {{__('California, USA')}}</p>
                                        </div>
                                    </div>
                                    <p class="font-12 text-center text-muted"> {{__('Link Technology is an American multinational technology conglomerate headquartered in California.')}}</p>
                                    <div class="d-flex company-small-details align-center justify-content-around mt-3">
                                        <div class="left text-center">
                                            <p class="font-12 text-muted  mb-0"> {{__('Projects')}}</p>
                                            <p class="font-25 text-primary strong"> {{__('12')}}</p>
                                        </div>
                                        <div class="right text-center">
                                            <p class="font-12 text-muted  mb-0"> {{__('Team')}}</p>
                                            <p class="font-25 text-primary strong"> {{__('22')}}</p>
                                        </div>
                                    </div>
                                    <div class="action-btn">
                                        <a class="btn btn-sm btn-dark" href="{{ url('/apps/companies/company-details') }}"> {{__('Details')}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item-content">
                                    <div class="user-profile">
                                        <img src="{{ url('assets/img/company-1.jpg') }}" class="light-image" alt="avatar">
                                        <img src="{{ url('assets/img/company-1.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="user-name"> {{__('Cube House')}}</p>
                                            <p class="user-work"> {{__('Chicago, USA')}}</p>
                                        </div>
                                    </div>
                                    <p class="font-12 text-center text-muted"> {{__('Cube House is an American multinational technology  conglomerate headquartered in California.')}}</p>
                                    <div class="d-flex company-small-details align-center justify-content-around mt-3">
                                        <div class="left text-center">
                                            <p class="font-12 text-muted  mb-0"> {{__('Projects')}}</p>
                                            <p class="font-25 text-primary strong"> {{__('10')}}</p>
                                        </div>
                                        <div class="right text-center">
                                            <p class="font-12 text-muted  mb-0"> {{__('Team')}}</p>
                                            <p class="font-25 text-primary strong"> {{__('17')}}</p>
                                        </div>
                                    </div>
                                    <div class="action-btn">
                                        <a class="btn btn-sm btn-dark" href="{{ url('/apps/companies/company-details') }}">{{__('Details')}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item-content">
                                    <div class="user-profile">
                                        <img src="{{ url('assets/img/company-2.jpg') }}" class="light-image" alt="avatar">
                                        <img src="{{ url('assets/img/company-2.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="user-name">{{__('Hightech')}}</p>
                                            <p class="user-work">{{__('Sao Paolo, Brazil')}}</p>
                                        </div>
                                    </div>
                                    <p class="font-12 text-center text-muted">{{__('Hightech is an multinational technology company conglomerate headquartered in Brazil.')}}</p>
                                    <div class="d-flex company-small-details align-center justify-content-around mt-3">
                                        <div class="left text-center">
                                            <p class="font-12 text-muted  mb-0">{{__('Projects')}}</p>
                                            <p class="font-25 text-primary strong">10</p>
                                        </div>
                                        <div class="right text-center">
                                            <p class="font-12 text-muted  mb-0">{{__('Team')}}</p>
                                            <p class="font-25 text-primary strong">17</p>
                                        </div>
                                    </div>
                                    <div class="action-btn">
                                        <a class="btn btn-sm btn-dark" href="{{ url('/apps/companies/company-details') }}">{{__('Details')}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item-content">
                                    <div class="user-profile">
                                        <img src="{{ url('assets/img/company-3.jpg') }}" class="light-image" alt="avatar">
                                        <img src="{{ url('assets/img/company-3.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="user-name">{{__('Innovation Tech')}}</p>
                                            <p class="user-work">{{__('Madrid, Spain')}}</p>
                                        </div>
                                    </div>
                                    <p class="font-12 text-center text-muted">{{__('Innovation Tech is an Spainish multinational technology conglomerate headquartered in Spain.')}}</p>
                                    <div class="d-flex company-small-details align-center justify-content-around mt-3">
                                        <div class="left text-center">
                                            <p class="font-12 text-muted  mb-0">{{__('Projects')}}</p>
                                            <p class="font-25 text-primary strong">2</p>
                                        </div>
                                        <div class="right text-center">
                                            <p class="font-12 text-muted  mb-0">{{__('Team')}}</p>
                                            <p class="font-25 text-primary strong">22</p>
                                        </div>
                                    </div>
                                    <div class="action-btn">
                                        <a class="btn btn-sm btn-dark" href="{{ url('/apps/companies/company-details') }}">{{__('Details')}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item-content">
                                    <div class="user-profile">
                                        <img src="{{ url('assets/img/company-4.jpg') }}" class="light-image" alt="avatar">
                                        <img src="{{ url('assets/img/company-4.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="user-name">{{__('Circle Inc.')}}</p>
                                            <p class="user-work">{{__('California, USA')}}</p>
                                        </div>
                                    </div>
                                    <p class="font-12 text-center text-muted">{{__('Circle Corporation is an American multinational technology conglomerate headquartered in USA.')}}</p>
                                    <div class="d-flex company-small-details align-center justify-content-around mt-3">
                                        <div class="left text-center">
                                            <p class="font-12 text-muted  mb-0">{{__('Projects')}}</p>
                                            <p class="font-25 text-primary strong">14</p>
                                        </div>
                                        <div class="right text-center">
                                            <p class="font-12 text-muted  mb-0">{{__('Team')}}</p>
                                            <p class="font-25 text-primary strong">37</p>
                                        </div>
                                    </div>
                                    <div class="action-btn">
                                        <a class="btn btn-sm btn-dark" href="{{ url('/apps/companies/company-details') }}"> {{__('Details')}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item-content">
                                    <div class="user-profile">
                                        <img src="{{ url('assets/img/company-7.jpg') }}" class="light-image" alt="avatar">
                                        <img src="{{ url('assets/img/company-7.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="user-name"> {{__('Hightech Joint')}}</p>
                                            <p class="user-work"> {{__('Mumbai, India')}}</p>
                                        </div>
                                    </div>
                                    <p class="font-12 text-center text-muted">{{__('Hightech Joint is an Indian multinational technology conglomerate headquartered in India.')}}</p>
                                    <div class="d-flex company-small-details align-center justify-content-around mt-3">
                                        <div class="left text-center">
                                            <p class="font-12 text-muted  mb-0">{{__('Projects')}}</p>
                                            <p class="font-25 text-primary strong">1</p>
                                        </div>
                                        <div class="right text-center">
                                            <p class="font-12 text-muted  mb-0">{{__('Team')}}</p>
                                            <p class="font-25 text-primary strong">5</p>
                                        </div>
                                    </div>
                                    <div class="action-btn">
                                        <a class="btn btn-sm btn-dark" href="{{ url('/apps/companies/company-details') }}">{{__('Details')}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item-content">
                                    <img src="{{ url('assets/img/company-5.jpg') }}" class="light-image" alt="avatar">
                                    <div class="user-profile">
                                        <img src="{{ url('assets/img/company-8.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="user-name">{{__('Vision Primary')}}</p>
                                            <p class="user-work">{{__('California, USA')}}</p>
                                        </div>
                                    </div>
                                    <p class="font-12 text-center text-muted">{{__('Vision Primary is an American multinational technology conglomerate headquartered in USA.')}}</p>
                                    <div class="d-flex company-small-details align-center justify-content-around mt-3">
                                        <div class="left text-center">
                                            <p class="font-12 text-muted  mb-0">{{__('Projects')}}</p>
                                            <p class="font-25 text-primary strong">8</p>
                                        </div>
                                        <div class="right text-center">
                                            <p class="font-12 text-muted  mb-0">{{__('Team')}}</p>
                                            <p class="font-25 text-primary strong">50</p>
                                        </div>
                                    </div>
                                    <div class="action-btn">
                                        <a class="btn btn-sm btn-dark" href="{{ url('/apps/companies/company-details') }}">{{__('Details')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination p13 text-center mt-4">
                            <ul class="mx-auto">
                                <a href="#" class="prev"><li>{{__('Prev')}}</li></a>
                                <a class="is-active" href="#"><li>1</li></a>
                                <a href="#"><li>2</li></a>
                                <a href="#"><li>3</li></a>
                                <a href="#" class="next"><li>{{__('Next')}}</li></a>
                            </ul>
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
    {!! Html::script('plugins/jquery-ui/jquery-ui.min.js') !!}
    {!! Html::script('assets/js/apps/companies.js') !!}
@endpush

@push('custom-scripts')

@endpush
