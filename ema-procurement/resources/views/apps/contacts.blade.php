@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/ui-elements/pagination.css') !!}
    {!! Html::style('assets/css/forms/theme-checkbox-radio.css') !!}
    {!! Html::style('plugins/jquery-ui/jquery-ui.min.css') !!}
    {!! Html::style('assets/css/apps/contacts.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Contacts')}}</span></li>
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
                    <div class="widget-content searchable-container list">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-7 filtered-list-search align-self-center">
                                    <form class="form-inline my-2 my-lg-0">
                                        <div class="">
                                            <i class="las la-search toggle-search"></i>
                                            <input type="text" id="input-search" class="form-control search-form-control  ml-lg-auto" placeholder="{{__('Search Contacts')}}">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-5 text-sm-right text-center align-self-center">
                                    <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                        <a id="btn-add-contact" class="pointer font-25 s-o mr-2">
                                            <i class="las la-user-plus"></i>
                                        </a>
                                        <a class="pointer font-25 view-list active-view s-o mr-2">
                                            <i class="las la-list"></i>
                                        </a>
                                        <a class="pointer font-25 view-grid s-o mr-2">
                                            <i class="las la-th-large"></i>
                                        </a>
                                        <a class="pointer font-25 s-o">
                                            <i class="las la-cog"></i>
                                        </a>
                                        <div class="dropdown custom-dropdown-icon mt-1">
                                            <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span> {{__('Sort By')}}</span> <i class="las la-angle-down"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown" style="will-change: transform;">
                                                <a class="dropdown-item" href="javascript:void(0);"> {{__('Full name')}}</a>
                                                <a class="dropdown-item" href="javascript:void(0);"> {{__('Email Id')}}</a>
                                                <a class="dropdown-item" href="javascript:void(0);"> {{__('Location')}}</a>
                                                <a class="dropdown-item" href="javascript:void(0);"> {{__('Added Date')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add Modal -->
                                    <div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <i class="flaticon-cancel-12 close" data-dismiss="modal"></i>
                                                    <div class="add-contact-box">
                                                        <div class="add-contact-content">
                                                            <h5 class="text-center mb-4"> {{__('Add a Contact')}}</h5>
                                                            <form id="addContactModalTitle">
                                                                <div class="row">
                                                                    <div class="col-md-12 text-center">
                                                                        <img id="image" src="https://via.placeholder.com/75x75" style="border-radius:50%"/>
                                                                        <input type="file" id="myfile" style="display: none;"/>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="contact-name">
                                                                            <i class="las la-user"></i>
                                                                            <input type="text" id="c-name" class="form-control" placeholder="{{__('Name')}}">
                                                                            <span class="validation-text"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="contact-email">
                                                                            <i class="las la-envelope"></i>
                                                                            <input type="text" id="c-email" class="form-control" placeholder="{{__('Email')}}">
                                                                            <span class="validation-text"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="contact-designation">
                                                                            <i class="las la-briefcase"></i>
                                                                            <input type="text" id="c-designation" class="form-control" placeholder="{{__('Designation')}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="contact-contact">
                                                                            <i class="las la-phone"></i>
                                                                            <input type="text" id="c-contact" class="form-control" placeholder="{{__('Contact')}}">
                                                                            <span class="validation-text"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="contact-location">
                                                                            <i class="las la-map-marker"></i>
                                                                            <input type="text" id="c-location" class="form-control" placeholder="{{__('Location')}}">
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
                                                                        <img id="image" src="{{ url('assets/img/profile-7.jpg') }}" style="border-radius:50%"/>
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
                        <div class="searchable-items list card-box">
                            <div class="items items-header-section">
                                <div class="item-content">
                                    <div class="">
                                        <h4> {{__('Full Name')}}</h4>
                                    </div>
                                    <div class="user-email">
                                        <h4> {{__('Email Id')}}</h4>
                                    </div>
                                    <div class="user-location">
                                        <h4 style="margin-left: 0;"> {{__('Location')}}</h4>
                                    </div>
                                    <div class="user-phone">
                                        <h4 style="margin-left: 3px;"> {{__('Contact')}}</h4>
                                    </div>
                                    <div class="user-phone">
                                        <h4 style="margin-left: 3px;"> {{__('Options')}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item-content">
                                    <div class="user-profile">
                                        <img src="{{ url('assets/img/profile-7.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="user-name"> {{__('Azeemo Shaan')}}</p>
                                            <p class="user-work"> {{__('Web Developer')}}</p>
                                        </div>
                                    </div>
                                    <div class="user-email">
                                        <p class="usr-email-addr"><span><i class="lar la-envelope"></i></span> {{__('azimo@mail.com')}}</p>
                                    </div>
                                    <div class="user-location">
                                        <p class="usr-location"><span><i class="las la-map-marker"></i></span> {{__('California, USA')}}</p>
                                    </div>
                                    <div class="user-phone">
                                        <p class="usr-ph-no"><span><i class="las la-phone"></i></span> {{__('+1 (070) 123-4567')}}</p>
                                    </div>
                                    <div class="action-btn">
                                        <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                        <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item-content">
                                    <div class="user-profile">
                                        <img src="{{ url('assets/img/profile-11.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="user-name"> {{__('Thara Darbar')}}</p>
                                            <p class="user-work"> {{__('Web Developer')}}</p>
                                        </div>
                                    </div>
                                    <div class="user-email">
                                        <p class="usr-email-addr"><span><i class="lar la-envelope"></i></span> {{__('thara@mail.com')}}</p>
                                    </div>
                                    <div class="user-location">
                                        <p class="usr-location"><span><i class="las la-map-marker"></i></span> {{__('Paris, France')}}</p>
                                    </div>
                                    <div class="user-phone">
                                        <p class="usr-ph-no"><span><i class="las la-phone"></i></span> {{__('+1 (070) 123-4567')}}</p>
                                    </div>
                                    <div class="action-btn">
                                        <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                        <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item-content">
                                    <div class="user-profile">
                                        <img src="{{ url('assets/img/profile-10.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="user-name"> {{__('Zera Ho Bayan')}}</p>
                                            <p class="user-work"> {{__('UI Designer')}}</p>
                                        </div>
                                    </div>
                                    <div class="user-email">
                                        <p class="usr-email-addr"><span><i class="lar la-envelope"></i></span> {{__('zera@mail.com')}}</p>
                                    </div>
                                    <div class="user-location">
                                        <p class="usr-location"><span><i class="las la-map-marker"></i></span> {{__('Chicago, USA')}}</p>
                                    </div>
                                    <div class="user-phone">
                                        <p class="usr-ph-no"><span><i class="las la-phone"></i></span> {{__('+1 (070) 123-4567')}}</p>
                                    </div>
                                    <div class="action-btn">
                                        <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                        <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item-content">
                                    <div class="user-profile">
                                        <img src="{{ url('assets/img/profile-3.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="user-name"> {{__('Badai Johnson')}}</p>
                                            <p class="user-work"> {{__('Team Lead')}}</p>
                                        </div>
                                    </div>
                                    <div class="user-email">
                                        <p class="usr-email-addr"><span><i class="lar la-envelope"></i></span> {{__('badai@mail.com')}}</p>
                                    </div>
                                    <div class="user-location">
                                        <p class="usr-location"><span><i class="las la-map-marker"></i></span> {{__('Madrid, Spain')}}</p>
                                    </div>
                                    <div class="user-phone">
                                        <p class="usr-ph-no"><span><i class="las la-phone"></i></span> {{__('+1 (070) 123-4567')}}</p>
                                    </div>
                                    <div class="action-btn">
                                        <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                        <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item-content">
                                    <div class="user-profile">
                                        <img src="{{ url('assets/img/profile-15.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="user-name"> {{__('Cory Anderson')}}</p>
                                            <p class="user-work"> {{__('Sales')}}</p>
                                        </div>
                                    </div>
                                    <div class="user-email">
                                        <p class="usr-email-addr"><span><i class="lar la-envelope"></i></span> {{__('cory@mail.com')}}</p>
                                    </div>
                                    <div class="user-location">
                                        <p class="usr-location"><span><i class="las la-map-marker"></i></span> {{__('Liverpool, England')}}</p>
                                    </div>
                                    <div class="user-phone">
                                        <p class="usr-ph-no"><span><i class="las la-phone"></i></span> {{__('+1 (070) 123-4567')}}</p>
                                    </div>
                                    <div class="action-btn">
                                        <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                        <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item-content">
                                    <div class="user-profile">
                                        <img src="{{ url('assets/img/profile-7.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="user-name"> {{__('Neil Pattinson')}}</p>
                                            <p class="user-work"> {{__('Database Admin')}}</p>
                                        </div>
                                    </div>
                                    <div class="user-email">
                                        <p class="usr-email-addr"><span><i class="lar la-envelope"></i></span> {{__('neil@mail.com')}}</p>
                                    </div>
                                    <div class="user-location">
                                        <p class="usr-location"><span><i class="las la-map-marker"></i></span> {{__('New York, USA')}}</p>
                                    </div>
                                    <div class="user-phone">
                                        <p class="usr-ph-no"><span><i class="las la-phone"></i></span> {{__('+1 (070) 123-4567')}}</p>
                                    </div>
                                    <div class="action-btn">
                                        <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                        <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item-content">
                                    <div class="user-profile"><img src="{{ url('assets/img/profile-29.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="user-name"> {{__('Jennie Lopez')}}</p>
                                            <p class="user-work"> {{__('CSO')}}</p>
                                        </div>
                                    </div>
                                    <div class="user-email"><p class="usr-email-addr"><span><i class="lar la-envelope"></i></span> {{__('Jennie@mail.com')}}</p>
                                    </div>
                                    <div class="user-location"><p class="usr-location"><span><i class="las la-map-marker"></i></span> {{__('Sao Paolo, Brazil')}}</p>
                                    </div>
                                    <div class="user-phone"><p class="usr-ph-no"><span><i class="las la-phone"></i></span> {{__('+1 (070) 123-4567')}}</p>
                                    </div>
                                    <div class="action-btn">
                                        <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                        <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="pagination p13 text-center mt-4 w-100">
                                <ul class="mx-auto">
                                    <a href="#" class="prev"><li> {{__('Prev')}}</li></a>
                                    <a class="is-active" href="#"><li>{{__('1')}}</li></a>
                                    <a href="#"><li>{{__('2')}}</li></a>
                                    <a href="#"><li>{{__('3')}}</li></a>
                                    <a href="#" class="next"><li>{{__('Next')}}</li></a>
                                </ul>
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
    {!! Html::script('plugins/jquery-ui/jquery-ui.min.js') !!}
    {!! Html::script('assets/js/apps/contact.js') !!}
@endpush

@push('custom-scripts')

@endpush
