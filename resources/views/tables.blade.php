@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/tables/tables.css') !!}
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
                                <li class="breadcrumb-active"><a href="javascript:void(0);">{{__('Tables')}}</a></li>
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
        <div class="layout-top-spacing mb-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing">
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Basic Table')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="sub-header">
                                            {{__('For basic styling—light padding and only horizontal dividers—add the base class')}} <code>.table</code> to any <code>&lt;table&gt;</code>.
                                        </p>
                                        <br>
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{__('First Name')}}</th>
                                                    <th>{{__('Last Name')}}</th>
                                                    <th>{{__('Username')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>{{__('Mark')}}</td>
                                                    <td>{{__('Otto')}}</td>
                                                    <td>{{__('@mdo')}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>{{__('Jacob')}}</td>
                                                    <td>{{__('Thornton')}}</td>
                                                    <td>{{__('@fat')}}@fat</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>{{__('Larry')}}</td>
                                                    <td>{{__('the Bird')}}</td>
                                                    <td>{{__('@twitter')}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Inverse Table')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="sub-header">
                                            {{__('You can also invert the colors—with light text on dark backgrounds—with ')}}<code class="highlighter-rouge">.table-dark</code>.
                                        </p>
                                        <br>
                                        <table class="table table-dark mb-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('First Name')}}</th>
                                                <th>{{__('Last Name')}}</th>
                                                <th>{{__('Username')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{__('Mark')}}</td>
                                                <td>{{__('Otto')}}</td>
                                                <td>{{__('@mdo')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>{{__('Jacob')}}Jacob</td>
                                                <td>{{__('Thornton')}}</td>
                                                <td>{{__('@fat')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>{{__('Larry')}}</td>
                                                <td>{{__('the Bird')}}</td>
                                                <td>{{__('@twitter')}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Table head options')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="sub-header">
                                            {{__('Use one of two modifier classes to make')}} <code>&lt;thead&gt;</code>s {{__('appear light or dark gray.')}}
                                        </p>
                                        <br>
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('First Name')}}</th>
                                                <th>{{__('Last Name')}}</th>
                                                <th>{{__('Username')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{__('Mark')}}</td>
                                                <td>{{__('Otto')}}</td>
                                                <td>{{__('@mdo')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>{{__('Jacob')}}</td>
                                                <td>{{__('Thornton')}}</td>
                                                <td>{{__('@fat')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>{{__('Larry')}}</td>
                                                <td>{{__('the Bird')}}</td>
                                                <td>{{__('@twitter')}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Striped rows')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="sub-header">
                                            {{__('Use')}} <code>.table-striped</code> {{__('to add zebra-striping to any table row within the')}}
                                             <code>&lt;tbody&gt;</code>.
                                        </p>
                                        <br>
                                        <table class="table table-striped mb-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('First Name')}}</th>
                                                <th>{{__('Last Name')}}</th>
                                                <th>{{__('Username')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{__('Mark')}}</td>
                                                <td>{{__('Otto')}}</td>
                                                <td>{{__('@mdo')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>{{__('Jacob')}}</td>
                                                <td>{{__('Thornton')}}</td>
                                                <td>{{__('@fat')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>{{__('Larry')}}</td>
                                                <td>{{__('the Bird')}}</td>
                                                <td>{{__('@twitter')}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Bordered table')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="sub-header">
                                            {{__('Add')}} <code>.table-bordered</code> {{__('for borders on all sides of the table and cells.')}}
                                        </p>
                                        <br>
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('First Name')}}</th>
                                                <th>{{__('Last Name')}}</th>
                                                <th>{{__('Username')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{__('Mark')}}</td>
                                                <td>{{__('Otto')}}</td>
                                                <td>{{__('@mdo')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>{{__('Mark')}}</td>
                                                <td>{{__('Otto')}}</td>
                                                <td>{{__('@TwBootstrap')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>{{__('Jacob')}}</td>
                                                <td>{{__('Thornton')}}</td>
                                                <td>{{__('@fat')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td colspan="2">{{__('Larry the Bird')}}</td>
                                                <td>{{__('@twitter')}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Hoverable Rows')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="sub-header">
                                            {{__('Create responsive tables by wrapping any ')}}<code>.table</code> in <code>.table-responsive</code>
                                            {{__('to make them scroll horizontally on small devices (under 768px).')}}
                                        </p>
                                        <br>
                                        <table class="table table-hover mb-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('First Name')}}</th>
                                                <th>{{__('Last Name')}}</th>
                                                <th>{{__('Username')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{__('Mark')}}</td>
                                                <td>{{__('Otto')}}</td>
                                                <td>{{__('@mdo')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>{{__('Jacob')}}</td>
                                                <td>{{__('Thornton')}}</td>
                                                <td>{{__('@fat')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td colspan="2">{{__('Larry the Bird')}}</td>
                                                <td>{{__('@twitter')}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Small table')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="sub-header">
                                            {{__('Add')}} <code>.table-sm</code> {{__('to make tables more compact by cutting cell padding in half.')}}
                                        </p>
                                        <br>
                                        <table class="table table-sm mb-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('First Name')}}</th>
                                                <th>{{__('Last Name')}}</th>
                                                <th>{{__('Username')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{__('Mark')}}</td>
                                                <td>{{__('Otto')}}</td>
                                                <td>{{__('@mdo')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>{{__('Jacob')}}</td>
                                                <td>{{__('Thornton')}}</td>
                                                <td>{{__('@fat')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td colspan="2">{{__('Larry the Bird')}}</td>
                                                <td>{{__('@twitter')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">7</th>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">8</th>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">9</th>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Contextual classes')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="sub-header">
                                            {{__('Use contextual classes to color table rows or individual cells.')}}
                                        </p>
                                        <br>
                                        <table class="table mb-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('Heading 1')}}</th>
                                                <th>{{__('Heading 2')}}</th>
                                                <th>{{__('Heading 3')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="table-active">
                                                <th scope="row">1</th>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                            </tr>
                                            <tr class="table-success">
                                                <th scope="row">3</th>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                            </tr>
                                            <tr class="table-info">
                                                <th scope="row">5</th>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                            </tr>
                                            <tr class="table-warning">
                                                <th scope="row">7</th>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                            </tr>
                                            <tr class="table-danger">
                                                <th scope="row">9</th>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                                <td>{{__('Column content')}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Captions')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="sub-header">
                                            {{__('A')}} <code>caption</code> {{__('functions like a heading for a table. It helps users with screen readers to find a table and understand what it’s about and decide if they want to read it.')}}
                                        </p>
                                        <br>
                                        <table class="table mb-0 table">
                                            <caption>{{__('List of users')}}</caption>
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('First Name')}}</th>
                                                <th>{{__('Last Name')}}</th>
                                                <th>{{__('Username')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{__('Mark')}}</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Responsive Table')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="sub-header">
                                        <div class="mb-3 card-subtitle">{{__('Create responsive tables by wrapping any')}} <code>.table</code> in <code>.table-responsive</code>to {{__('make them scroll horizontally on small devices (under 768px).')}}</div>
                                        </p>
                                        <br>
                                        <div class="table-responsive">
                                            <table class="table mb-0 table">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{__('First Name')}}</th>
                                                    <th>{{__('Last Name')}}</th>
                                                    <th>{{__('Username')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>
                                                    <td>@fat</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Larry</td>
                                                    <td>the Bird</td>
                                                    <td>@twitter</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Table with a dropdown')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-4">
                                                <thead>
                                                <tr>
                                                    <th>{{__('Name')}}</th>
                                                    <th>{{__('Place')}}</th>
                                                    <th class="text-center">{{__('Status')}}</th>
                                                    <th class="text-center">{{__('Action')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Shaun</td>
                                                    <td>Sydney</td>
                                                    <td class="text-center"><span class="badge badge-success">{{__('Approved')}}</span></td>
                                                    <td class="text-center">
                                                        <div class="dropdown custom-dropdown">
                                                            <a class="dropdown-toggle font-20 text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="las la-cog"></i>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                                <a class="dropdown-item" href="javascript:void(0);">{{__('Edit')}}</a>
                                                                <a class="dropdown-item" href="javascript:void(0);">{{__('Delete')}}</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Alma</td>
                                                    <td>Zurich</td>
                                                    <td class="text-center"><span class="badge badge-primary">{{__('Working')}}</span></td>
                                                    <td class="text-center">
                                                        <div class="dropdown custom-dropdown">
                                                            <a class="dropdown-toggle font-20 text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="las la-cog"></i>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                                                <a class="dropdown-item" href="javascript:void(0);">{{__('Edit')}}</a>
                                                                <a class="dropdown-item" href="javascript:void(0);">{{__('Delete')}}</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Praveen</td>
                                                    <td>Kolkata</td>
                                                    <td class="text-center"><span class="badge badge-warning">{{__('Suspended')}}</span></td>
                                                    <td class="text-center">
                                                        <div class="dropdown custom-dropdown">
                                                            <a class="dropdown-toggle font-20 text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="las la-cog"></i>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink3">
                                                                <a class="dropdown-item" href="javascript:void(0);">{{__('Edit')}}</a>
                                                                <a class="dropdown-item" href="javascript:void(0);">{{__('Delete')}}</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Santos</td>
                                                    <td>Rio</td>
                                                    <td class="text-center"><span class="badge badge-danger">{{__('Hi')}}Blocked</span></td>
                                                    <td class="text-center">
                                                        <div class="dropdown custom-dropdown">
                                                            <a class="dropdown-toggle font-20 text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="las la-cog"></i>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink4">
                                                                <a class="dropdown-item" href="javascript:void(0);">{{__('Edit')}}</a>
                                                                <a class="dropdown-item" href="javascript:void(0);">{{__('Delete')}}</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Chris</td>
                                                    <td>Barbados</td>
                                                    <td class="text-center"><span class="badge badge-secondary">{{__('On leave')}}</span></td>
                                                    <td class="text-center">
                                                        <div class="dropdown custom-dropdown">
                                                            <a class="dropdown-toggle font-20 text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="las la-cog"></i>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink5">
                                                                <a class="dropdown-item" href="javascript:void(0);">{{__('Edit')}}</a>
                                                                <a class="dropdown-item" href="javascript:void(0);">{{__('Delete')}}</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Table with a footer')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <table class="table table-bordered table-hover table-condensed mb-4">
                                            <thead>
                                            <tr>
                                                <th>{{__('First Name')}}</th>
                                                <th>{{__('Last Name')}}</th>
                                                <th>{{__('Username')}}</th>
                                                <th class="text-center">{{__('Action')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td class="text-center">
                                                    <div>
                                                        <a href="#" title="{{__('Edit')}}" class="font-20 text-primary">
                                                            <i class="las la-edit"></i>
                                                        </a>
                                                        <a href="#" title="{{__('Delete')}}"  class="font-20 text-danger">
                                                            <i class="las la-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                                <td class="text-center">
                                                    <div>
                                                        <a href="#" title="{{__('Edit')}}" class="font-20 text-primary">
                                                            <i class="las la-edit"></i>
                                                        </a>
                                                        <a href="#" title="{{__('Delete')}}"  class="font-20 text-danger">
                                                            <i class="las la-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Larry</td>
                                                <td>Bird</td>
                                                <td>@twitter</td>
                                                <td class="text-center">
                                                    <div>
                                                        <a href="#" title="{{__('Edit')}}" class="font-20 text-primary">
                                                            <i class="las la-edit"></i>
                                                        </a>
                                                        <a href="#" title="{{__('Delete')}}"  class="font-20 text-danger">
                                                            <i class="las la-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Vince</td>
                                                <td>Roy</td>
                                                <td>@vroy</td>
                                                <td class="text-center">
                                                    <div>
                                                        <a href="#" title="{{__('Edit')}}" class="font-20 text-primary">
                                                            <i class="las la-edit"></i>
                                                        </a>
                                                        <a href="#" title="{{__('Delete')}}"  class="font-20 text-danger">
                                                            <i class="las la-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>{{__('FIRST NAME')}}</th>
                                                <th>{{__('LAST NAME')}}</th>
                                                <th>{{__('USERNAME')}}</th>
                                                <th class="text-center">{{__('ACTION')}}</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Table with options')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        <div class="th-content">
                                                            <div class="login-one-inputs check">
                                                                <input class="inp-cbx" id="cbx" type="checkbox" style="display: none">
                                                                <label class="cbx" for="cbx">
                                                                                <span>
                                                                                    <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                    </svg>
                                                                                </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th><div class="th-content">{{__('Name')}}</div></th>
                                                    <th><div class="th-content">{{__('Date')}}</div></th>
                                                    <th><div class="th-content">{{__('Progress')}}</div></th>
                                                    <th><div class="th-content">{{__('Team')}}</div></th>
                                                    <th><div class="th-content">{{__('Status')}}</div></th>
                                                    <th><div class="th-content">{{__('Rating')}}</div></th>
                                                    <th><div class="th-content">{{__('Action')}}</div></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="login-one-inputs check">
                                                            <input class="inp-cbx" id="cbx2" type="checkbox" style="display: none">
                                                            <label class="cbx" for="cbx2">
                                                                            <span>
                                                                                <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                </svg>
                                                                            </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>{{__('Android App Development')}}</td>
                                                    <td>{{__('Jun 20, 2018')}}</td>
                                                    <td>
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-warning" role="progressbar" style="width: 29.56%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip" title="" data-original-title="Jeremy Lawson"><img src="assets/img/profile-4.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="" data-original-title="Dino Morea"><img src="assets/img/profile-5.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="" data-original-title="Anna Ivanovic"><img src="assets/img/profile-6.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                            <span class="avatar-sm rounded-circle extra-group-people ml-m-12 border-width-2px border-solid border-light">+4</span>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-info"> {{__('Ongoing')}} </span></td>
                                                    <td>
                                                        <div class="d-flex align-center">
                                                            5  <img src="assets/img/star.png" class="avatar-xxs ml-2" alt="star">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="Edit"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="" data-original-title="Delete"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="login-one-inputs check">
                                                            <input class="inp-cbx" id="cbx3" type="checkbox" style="display: none">
                                                            <label class="cbx" for="cbx3">
                                                                            <span>
                                                                                <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                </svg>
                                                                            </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>{{__('Angular Frontend')}}</td>
                                                    <td>Aug 23, 2019</td>
                                                    <td>
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-success" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip" title="" data-original-title="Dean Jones"><img src="assets/img/profile-1.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="" data-original-title="Smirti Mandhana"><img src="assets/img/profile-2.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="" data-original-title="Kane Williamson"><img src="assets/img/profile-3.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                            <span class="avatar-sm rounded-circle extra-group-people ml-m-12 border-width-2px border-solid border-light">+2</span>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-dark"> {{__('Hold')}} </span></td>
                                                    <td>
                                                        <div class="d-flex align-center">
                                                            4  <img src="assets/img/star.png" class="avatar-xxs ml-2" alt="star">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="Edit"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="" data-original-title="Delete"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="login-one-inputs check">
                                                            <input class="inp-cbx" id="cbx4" type="checkbox" style="display: none">
                                                            <label class="cbx" for="cbx4">
                                                                            <span>
                                                                                <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                </svg>
                                                                            </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>{{__('Java Backend')}}</td>
                                                    <td>{{__('Feb 20, 2018')}}</td>
                                                    <td>
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-success-teal" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip" title="" data-original-title="John Doe"><img src="assets/img/profile-7.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="" data-original-title="Katrina Kaif"><img src="assets/img/profile-8.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="" data-original-title="Risha Sengupta"><img src="assets/img/profile-9.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                            <span class="avatar-sm rounded-circle extra-group-people ml-m-12 border-width-2px border-solid border-light">+9</span>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-success-teal"> {{__('Completed')}} </span></td>
                                                    <td>
                                                        <div class="d-flex align-center">
                                                            4  <img src="assets/img/star.png" class="avatar-xxs ml-2" alt="star">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Hi')}}Edit"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="" data-original-title="{{__('Hi')}}Delete"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="login-one-inputs check">
                                                            <input class="inp-cbx" id="cbx5" type="checkbox" style="display: none">
                                                            <label class="cbx" for="cbx5">
                                                                            <span>
                                                                                <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                </svg>
                                                                            </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>{{__('AWS Server Migration')}}</td>
                                                    <td>{{__('Sep 20, 2018')}}</td>
                                                    <td>
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip" title="" data-original-title="Kiara Lawson"><img src="assets/img/profile-10.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="" data-original-title="Kareena Morea"><img src="assets/img/profile-11.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="" data-original-title="Eli Ivanovic"><img src="assets/img/profile-12.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-warning"> {{__('Pending')}} </span></td>
                                                    <td>
                                                        <div class="d-flex align-center">
                                                            1  <img src="assets/img/star.png" class="avatar-xxs ml-2" alt="star">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="login-one-inputs check">
                                                            <input class="inp-cbx" id="cbx6" type="checkbox" style="display: none">
                                                            <label class="cbx" for="cbx6">
                                                                            <span>
                                                                                <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                </svg>
                                                                            </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>{{__('Firbase Backup')}}</td>
                                                    <td>{{__('Jan 20, 2020')}}</td>
                                                    <td>
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-danger" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip" title="" data-original-title="Dennis Mennace"><img src="assets/img/profile-13.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="" data-original-title="Gini Khurima"><img src="assets/img/profile-14.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger"> {{__('Cancelled')}} </span></td>
                                                    <td>
                                                        <div class="d-flex align-center">
                                                            2  <img src="assets/img/star.png" class="avatar-xxs ml-2" alt="star">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="login-one-inputs check">
                                                            <input class="inp-cbx" id="cbx7" type="checkbox" style="display: none">
                                                            <label class="cbx" for="cbx7">
                                                                            <span>
                                                                                <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                </svg>
                                                                            </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>{{__('iOS Swift')}}</td>
                                                    <td>{{__('Jun 20, 2017')}}</td>
                                                    <td>
                                                        <div class="progress br-30">
                                                            <div class="progress-bar br-30 bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip" title="" data-original-title="Jeremy Lawson"><img src="assets/img/profile-4.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="" data-original-title="Dino Morea"><img src="assets/img/profile-5.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="" data-original-title="Anna Ivanovic"><img src="assets/img/profile-6.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                            <span class="avatar-sm rounded-circle extra-group-people ml-m-12 border-width-2px border-solid border-light">+5</span>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-info"> {{__('Ongoing')}} </span></td>
                                                    <td>
                                                        <div class="d-flex align-center">
                                                            4  <img src="assets/img/star.png" class="avatar-xxs ml-2" alt="star">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                            <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
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
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')

@endpush

@push('custom-scripts')

@endpush
