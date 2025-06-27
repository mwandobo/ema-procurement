@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/ui-elements/pagination.css') !!}
    {!! Html::style('plugins/jquery-ui/jquery-ui.min.css') !!}
    {!! Html::style('assets/css/elements/tooltip.css') !!}
    {!! Html::style('assets/css/apps/ecommerce.css') !!}
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
                                <li class="breadcrumb-item" aria-current="page"><a href="apps_ecommerce.html">{{__('Ecommerce')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Customers')}}</span></li>
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
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-7 filtered-list-search align-self-center">
                                    <form class="form-inline my-2 my-lg-0">
                                        <div class="">
                                            <i class="las la-search toggle-search"></i>
                                            <input type="text" id="input-search" class="form-control search-form-control  ml-lg-auto" placeholder="{{__('Search Customers')}}">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-5 text-sm-right text-center align-self-center">
                                    <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                        <button class="btn btn-primary btn-sm"><i class="las la-plus"></i> {{__('Add New Customer')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                <div class="widget ecommerce-table">
                                    <div class="widget-heading">
                                        <h5 class=""> {{__('List of Customers')}}</h5>
                                        <div class="dropdown custom-dropdown-icon">
                                            <a class="font-17 mr-3 pointer"><i class="las la-sync-alt"></i></a>
                                            <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span> {{__('Export')}}</span> <i class="las la-angle-down"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown" style="will-change: transform;">
                                                <a class="dropdown-item" data-value=".xlsx" href="javascript:void(0);">{{__('Export in .xlsx')}}</a>
                                                <a class="dropdown-item" data-value=".csv" href="javascript:void(0);">{{__('Export in .csv')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        <div class="th-content">
                                                            <div class="login-one-inputs check">
                                                                <input class="inp-cbx" id="cbx" type="checkbox" style="display: none"/>
                                                                <label class="cbx" for="cbx">
                                                                                <span>
                                                                                    <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                    </svg>
                                                                                </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th><div class="th-content"> {{__('Customer Name')}}</div></th>
                                                    <th><div class="th-content"> {{__('Phone/Email')}}</div></th>
                                                    <th><div class="th-content"> {{__('Wallet balance')}}</div></th>
                                                    <th><div class="th-content"> {{__('Last Order')}}</div></th>
                                                    <th><div class="th-content"> {{__('Status')}}</div></th>
                                                    <th><div class="th-content"> {{__('Joining Date')}}</div></th>
                                                    <th><div class="th-content"> {{__('Details')}}</div></th>
                                                    <th><div class="th-content"> {{__('Action')}}</div></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="login-one-inputs check">
                                                            <input class="inp-cbx" id="cbx2" type="checkbox" style="display: none"/>
                                                            <label class="cbx" for="cbx2">
                                                                            <span>
                                                                                <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                </svg>
                                                                            </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{__('Jim Carry')}}
                                                    </td>
                                                    <td>{{__('80124 57856')}} <br> {{__('jim@mail.com')}}</td>
                                                    <td>{{__('$12,989')}}</td>
                                                    <td>{{__('28.01.2020')}}</td>
                                                    <td>
                                                        <span class="badge badge-success-teal light">{{__('Active')}}</span>
                                                    </td>
                                                    <td>{{__('30.10.2016')}}</td>
                                                    <td>
                                                        <a  class="btn btn-sm btn-info">{{__('Details')}}</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-danger ml-2" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="login-one-inputs check">
                                                            <input class="inp-cbx" id="cbx3" type="checkbox" style="display: none"/>
                                                            <label class="cbx" for="cbx3">
                                                                            <span>
                                                                                <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                </svg>
                                                                            </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{__('Justin Williamson')}}
                                                    </td>
                                                    <td>{{__('85474 12457')}} <br>{{__('justin@mail.com')}}</td>
                                                    <td>{{__('$2,989')}}</td>
                                                    <td>{{__('18.10.2020')}}</td>
                                                    <td>
                                                        <span class="badge badge-warning light">{{__('Inactive')}}</span>
                                                    </td>
                                                    <td>{{__('28.01.2016')}}</td>
                                                    <td>
                                                        <a  class="btn btn-sm btn-info">{{__('Details')}}</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-danger ml-2" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="login-one-inputs check">
                                                            <input class="inp-cbx" id="cbx4" type="checkbox" style="display: none"/>
                                                            <label class="cbx" for="cbx4">
                                                                            <span>
                                                                                <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                </svg>
                                                                            </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{__('Kane Pulock')}}
                                                    </td>
                                                    <td>{{__('74147 58525')}} <br>{{__('kane@mail.com')}}</td>
                                                    <td>{{__('$1,989')}}</td>
                                                    <td>{{__('14.05.2020')}}</td>
                                                    <td>
                                                        <span class="badge badge-danger light">{{__('Blocked')}}</span>
                                                    </td>
                                                    <td>{{__('14.05.2016')}}</td>
                                                    <td>
                                                        <a  class="btn btn-sm btn-info">{{__('Details')}}</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-danger ml-2" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="login-one-inputs check">
                                                            <input class="inp-cbx" id="cbx5" type="checkbox" style="display: none"/>
                                                            <label class="cbx" for="cbx5">
                                                                            <span>
                                                                                <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                </svg>
                                                                            </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{__('Cameron Jones')}}
                                                    </td>
                                                    <td>{{__('74512 12589')}} <br>{{__('cameron@mail.com')}}</td>
                                                    <td>{{__('$5,989')}}</td>
                                                    <td>{{__('24.10.2020')}}</td>
                                                    <td>
                                                        <span class="badge badge-success-teal light">{{__('Active')}}</span>
                                                    </td>
                                                    <td>{{__('14.10.2017')}}</td>
                                                    <td>
                                                        <a  class="btn btn-sm btn-info">{{__('Details')}}</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-danger ml-2" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="login-one-inputs check">
                                                            <input class="inp-cbx" id="cbx6" type="checkbox" style="display: none"/>
                                                            <label class="cbx" for="cbx6">
                                                                            <span>
                                                                                <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                </svg>
                                                                            </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{__('Aaron Bancroft')}}
                                                    </td>
                                                    <td>{{__('74000 00589')}} <br>{{__('aaron@mail.com')}}</td>
                                                    <td>{{__('$1,478')}}</td>
                                                    <td>{{__('14.05.2020')}}</td>
                                                    <td>
                                                        <span class="badge badge-success-teal light">{{__('Active')}}</span>
                                                    </td>
                                                    <td>{{__('24.05.2019')}}</td>
                                                    <td>
                                                        <a  class="btn btn-sm btn-info">{{__('Details')}}</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-danger ml-2" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="login-one-inputs check">
                                                            <input class="inp-cbx" id="cbx7" type="checkbox" style="display: none"/>
                                                            <label class="cbx" for="cbx7">
                                                                            <span>
                                                                                <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                </svg>
                                                                            </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{__('Jilly Williams')}}
                                                    </td>
                                                    <td>{{__('74123 45789')}} <br>{{__('jimmy@mail.com')}}</td>
                                                    <td>{{__('$1,456')}}</td>
                                                    <td>{{__('25.01.2020')}}</td>
                                                    <td>
                                                        <span class="badge badge-warning light">{{__('Inactive')}}</span>
                                                    </td>
                                                    <td>{{__('15.01.2015')}}</td>
                                                    <td>
                                                        <a  class="btn btn-sm btn-info">{{__('Details')}}</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-danger ml-2" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="login-one-inputs check">
                                                            <input class="inp-cbx" id="cbx8" type="checkbox" style="display: none"/>
                                                            <label class="cbx" for="cbx8">
                                                                            <span>
                                                                                <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                </svg>
                                                                            </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{__('Daniel Johnson')}}
                                                    </td>
                                                    <td>{{__('87458 45789')}} <br>{{__('dan@mail.com')}}</td>
                                                    <td>{{__('$9,745')}}</td>
                                                    <td>{{__('15.08.2020')}}</td>
                                                    <td>
                                                        <span class="badge badge-danger light">{{__('Blocked')}}</span>
                                                    </td>
                                                    <td>{{__('15.08.2008')}}</td>
                                                    <td>
                                                        <a  class="btn btn-sm btn-info">{{__('Details')}}</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-danger ml-2" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="login-one-inputs check">
                                                            <input class="inp-cbx" id="cbx9" type="checkbox" style="display: none"/>
                                                            <label class="cbx" for="cbx9">
                                                                            <span>
                                                                                <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                </svg>
                                                                            </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{__('Jane Salah')}}
                                                    </td>
                                                    <td>{{__('77458 05789')}} <br>{{__('jane@mail.com')}}</td>
                                                    <td>{{__('$2,145')}}</td>
                                                    <td>{{__('20.01.2020')}}</td>
                                                    <td>
                                                        <span class="badge badge-success-teal light">{{__('Active')}}</span>
                                                    </td>
                                                    <td>{{__('18.01.2019')}}</td>
                                                    <td>
                                                        <a  class="btn btn-sm btn-info">{{__('Details')}}</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-danger ml-2" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="pagination p13 text-center w-100 mt-4">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('assets/js/apps/ecommerce.js') !!}
@endpush

@push('custom-scripts')

@endpush
