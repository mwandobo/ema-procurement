@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/apps/tickets.css') !!}
    {!! Html::style('assets/css/elements/tooltip.css') !!}
    {!! Html::style('plugins/apex/apexcharts.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('Tickets')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Ticket List')}}</span></li>
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
            <div class="apps-ticket col-xl-12 col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-xl-5 col-md-5 layout-spacing">
                        <div class="numbers">
                            <div class="row">
                                <div class="col-sm-6 mb-4">
                                    <a class="single-number" href="#">
                                        <div class="value text-primary">24</div>
                                        <div class="label text-primary"> {{__('New Tickets')}}</div>
                                        <div class="trending trending-up-basic">
                                            <span>12%</span>
                                            <i class="las la-caret-up"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 mb-4">
                                    <a class="single-number" href="#">
                                        <div class="value text-success-teal">10</div>
                                        <div class="label text-success-teal"> {{__('Closed Today')}}</div>
                                        <div class="trending trending-down-basic">
                                            <span>21%</span>
                                            <i class="las la-caret-down"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mb-4">
                                    <a class="single-number" href="#">
                                        <div class="value text-info">74</div>
                                        <div class="label text-info"> {{__('Queries Marked')}}</div>
                                        <div class="trending trending-down-basic">
                                            <span>7%</span>
                                            <i class="las la-caret-down"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 mb-4">
                                    <a class="single-number" href="#">
                                        <div class="value text-danger">27</div>
                                        <div class="label text-danger"> {{__('Rejected')}}</div>
                                        <div class="trending trending-up-basic">
                                            <span>21%</span>
                                            <i class="las la-caret-up"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-md-7 layout-spacing">
                        <div class="widget">
                            <div class="widget-heading">
                                <h5 class="text-center"> {{__('Support Ticket Status')}}</h5>
                            </div>
                            <div class="widget-content">
                                <div id="conversion-rate"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-md-7 layout-spacing">
                        <div class="tickets-table-widget cmt">
                            <div class="widget-heading">
                                <h5 class=""> {{__('Customer with most tickets')}}</h5>
                                <div class="dropdown custom-dropdown-icon">
                                    <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span> {{__('Options')}}</span> <i class="las la-angle-down"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown" style="will-change: transform;">
                                        <a class="dropdown-item" data-value="Mail" href="javascript:void(0);"> {{__('Mail')}}</a>
                                        <a class="dropdown-item" data-value="Print" href="javascript:void(0);"> {{__('Print')}}</a>
                                        <a class="dropdown-item" data-value="Download" href="javascript:void(0);"> {{__('Download')}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th><div class="th-content"> {{__('Customer Name')}}</div></th>
                                            <th><div class="th-content"> {{__('Tickets')}}</div></th>
                                            <th><div class="th-content"> {{__('Last Reply')}}</div></th>
                                            <th><div class="th-content"> {{__('Satisfy Level')}}</div></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-center">
                                                    <img src="{{ url('assets/img/profile-2.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light mr-3" alt="avatar">
                                                    <p class="mb-0"> {{__('Connor Mcguere')}}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0">47</p>
                                            </td>
                                            <td>
                                                <span> {{__('Today,')}} </span><span class="font-13"> {{__('1:52pm')}}</span>
                                            </td>
                                            <td><span class="text-warning"> {{__('29.56%')}}</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-center">
                                                    <img src="{{ url('assets/img/profile-3.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light mr-3" alt="avatar">
                                                    <p class="mb-0"> {{__('Johny Borja')}}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0">75</p>
                                            </td>
                                            <td>
                                                <span> {{__('Yesterday,')}} </span><span class="font-13"> {{__('2:00am')}}</span>
                                            </td>
                                            <td><span class="text-success-teal"> {{__('92.89%')}}</span></td>
                                        </tr>
                                        <tr class="border-bottom border-light">
                                            <td>
                                                <div class="d-flex align-center">
                                                    <img src="{{ url('assets/img/profile-4.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light mr-3" alt="avatar">
                                                    <p class="mb-0"> {{__('Dingo Hernandes')}}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0">82</p>
                                            </td>
                                            <td>
                                                <span> {{__('Monday,')}} </span><span class="font-13"> {{__('5:39pm')}}</span>
                                            </td>
                                            <td><span class="text-info"> {{__('62.01%')}}</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <p class="font-13 text-center mb-3 text-muted">
                                        <a class="text-primary" href="javascript:void(0);"> {{__('Click here')}}</a> {{__('to see the full list')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-5 layout-spacing">
                        <div class="widget">
                            <div class="widget-heading">
                                <h5 class="text-center"> {{__('Customer Queries')}}</h5>
                            </div>
                            <div class="widget-content">
                                <div id="customer-queries"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-12 layout-spacing">
                        <div class="tickets-table-widget">
                            <div class="widget-heading">
                                <h5 class=""> {{__('Ticket List')}}</h5>
                                <span class="d-none d-md-block"> {{__('Click on the')}} <i class="las la-eye"></i> {{__('icon to see the ticket details')}}</span>
                            </div>
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th><div class="th-content"> {{__('Support Executive')}}</div></th>
                                            <th><div class="th-content"> {{__('Comment')}}</div></th>
                                            <th><div class="th-content"> {{__('Time')}}</div></th>
                                            <th><div class="th-content"> {{__('Status')}}</div></th>
                                            <th><div class="th-content"> {{__('Action')}}</div></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-center">
                                                    <img src="{{ url('assets/img/profile-26.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light mr-3" alt="avatar">
                                                    <p class="mb-0"> {{__('Lucky Williamson')}}</p>
                                                </div>
                                            </td>
                                            <td style="width: 300px;"> {{__('Content here, content here\', making it look like readable English')}}</td>
                                            <td> {{__('Today, 1:52pm')}}</td>
                                            <td><span class="badge outline-badge-info"> {{__('Processing')}} </span></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="apps_ticket_details.html" class="bs-tooltip font-20 text-primary" title="{{__('View')}}"><i class="las la-eye"></i></a>
                                                    <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-center">
                                                    <img src="{{ url('assets/img/profile-22.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light mr-3" alt="avatar">
                                                    <p class="mb-0">{{__('Romeo Kansas')}}</p>
                                                </div>
                                            </td>
                                            <td>{{__('There are many variations of passages of')}}</td>
                                            <td> {{__('Yesterday, 02:00pm')}}</td>
                                            <td><span class="badge outline-badge-warning"> {{__('Pending')}} </span></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="apps_ticket_details.html" class="bs-tooltip font-20 text-primary" title=" {{__('View')}}"><i class="las la-eye"></i></a>
                                                    <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-center">
                                                    <img src="{{ url('assets/img/profile-32.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light mr-3" alt="avatar">
                                                    <p class="mb-0"> {{__('Dakot Mcguere')}}</p>
                                                </div>
                                            </td>
                                            <td> {{__('Contrary to popular belief, Debit security is not simply default main')}}</td>
                                            <td> {{__('Yesterday, 3:00pm')}}</td>
                                            <td><span class="badge outline-badge-success-teal"> {{__('Completed')}} </span></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="apps_ticket_details.html" class="bs-tooltip font-20 text-primary" title="{{__('View')}}"><i class="las la-eye"></i></a>
                                                    <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-center">
                                                    <img src="{{ url('assets/img/profile-14.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light mr-3" alt="avatar">
                                                    <p class="mb-0"> {{__('Aaron Smith')}}</p>
                                                </div>
                                            </td>
                                            <td> {{__('Because main popular thought, design is not simply random text')}}</td>
                                            <td> {{__('Yesterday, 7:00pm')}}</td>
                                            <td><span class="badge outline-badge-warning"> {{__('Pending')}} </span></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="apps_ticket_details.html" class="bs-tooltip font-20 text-primary" title="{{__('View')}}"><i class="las la-eye"></i></a>
                                                    <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-center">
                                                    <img src="{{ url('assets/img/profile-2.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light mr-3" alt="avatar">
                                                    <p class="mb-0"> {{__('Apps')}}James Faulkner</p>
                                                </div>
                                            </td>
                                            <td> {{__('I must explain to you how all this mistaken idea of')}}</td>
                                            <td> {{__('Friday, 6:35pm')}}</td>
                                            <td><span class="badge outline-badge-info"> {{__('Processing')}} </span></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="apps_ticket_details.html" class="bs-tooltip font-20 text-primary" title="{{__('View')}}"><i class="las la-eye"></i></a>
                                                    <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
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
    {!! Html::script('plugins/apex/apexcharts.min.js') !!}
    {!! Html::script('assets/js/apps/tickets.js') !!}
@endpush

@push('custom-scripts')

@endpush
