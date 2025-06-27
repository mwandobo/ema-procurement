@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/ui-elements/dropdown.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('UI Elements')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Dropdowns')}}</span></li>
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
                        <div class="row layout-top-spacing dropdown-area">
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Single Dropdowns')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{__('Dropdown button')}} <i class="las la-angle-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                                        <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="dropdown">
                                                    <a class="btn btn-primary dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{__('Dropdown link ')}}<i class="las la-angle-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="">
                                                        <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Something else here')}}x</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="btn-group mb-2">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('Primary')}} <i class="las la-angle-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">{{__('Separated link')}}</a>
                                            </div>
                                        </div>
                                        <div class="btn-group mb-2">
                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('Secondary')}} <i class="las la-angle-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">{{__('Separated link')}}</a>
                                            </div>
                                        </div>
                                        <div class="btn-group mb-2">
                                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('Success')}} <i class="las la-angle-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">{{__('Separated link')}}</a>
                                            </div>
                                        </div>
                                        <div class="btn-group mb-2">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('Danger')}} <i class="las la-angle-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">{{__('Separated link')}}</a>
                                            </div>
                                        </div>
                                        <div class="btn-group mb-2">
                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('Info')}} <i class="las la-angle-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">{{__('Separated link')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Dropdown from right & left')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="btn-group mb-2 dropright">
                                            <button type="button" class="btn btn-soft-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{__('Right')}} <i class="las la-angle-right"></i>
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">{{__('Separated link')}}</a>
                                            </div>
                                        </div>
                                        <div class="btn-group mb-2 dropright">
                                            <button type="button" class="btn btn-primary">
                                                {{__('Split Right')}}
                                            </button>
                                            <button type="button" class="btn btn-primary dropdown-toggle-split dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="las la-angle-right"></i>
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">{{__('Separated link')}}</a>
                                            </div>
                                        </div>
                                        <div class="btn-group dropleft mb-2">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="las la-angle-left"></i> {{__('Left')}}</button>
                                            <div class="dropdown-menu" aria-labelledby="btnDropLeft">
                                                <a href="#" class="dropdown-item">{{__('Action')}}</a>
                                                <a href="#" class="dropdown-item">{{__('Another action')}}</a>
                                                <a href="#" class="dropdown-item">{{__('Something else here')}}</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item">{{__('Separated link')}}</a>
                                            </div>
                                        </div>
                                        <div class="btn-group mb-2 dropleft">
                                            <button type="button" class="btn btn-secondary dropdown-toggle-split dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="las la-angle-left"></i>
                                            </button>
                                            <button type="button" class="btn btn-secondary">
                                                {{__('Split Left')}}
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">{{__('Separated link')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Dropdown Up')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="btn-group dropup">
                                            <button type="button" class="btn btn-soft-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('Dropup')}} <i class="las la-angle-up"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">{{__('Separated link')}}</a>
                                            </div>
                                        </div>
                                        <div class="btn-group dropup">
                                            <button type="button" class="btn btn-danger">
                                                {{__('Split dropup')}}
                                            </button>
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="las la-angle-up"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Different Sizes')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="btn-group mb-2">
                                            <button type="button" class="btn btn-info btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('Large')}} <i class="las la-angle-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">{{__('Separated link')}}</a>
                                            </div>
                                        </div>
                                        <div class="btn-group mb-2">
                                            <button type="button" class="btn btn-dark btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{__('Small')}} <i class="las la-angle-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">{{__('Separated link')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Custom Dropdowns and with icons')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="dropdown dropup custom-dropdown">
                                                    <a class="dropdown-toggle font-30" href="#" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="las la-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">{{__('Separated link')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="dropdown dropup custom-dropdown">
                                                    <a class="dropdown-toggle font-30" href="#" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="las la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">{{__('Separated link')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="dropdown dropup custom-dropdown">
                                                    <a class="dropdown-toggle font-30" href="#" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <img src="{{ url('assets/img/profile-1.jpg') }}" class="rounded-circle img-thumbnail avatar-sm"/>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">{{__('Separated link')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="dropdown dropup custom-dropdown">
                                                    <a class="dropdown-toggle font-30" href="#" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="las la-bell"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Another action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Something else here')}}</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">{{__('Separated link')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Custom Dropdowns')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{__('Active Item')}} <i class="las la-angle-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item" href="#">{{__('Regular link')}}</a>
                                                        <a class="dropdown-item active" href="#">{{__('Active link')}}</a>
                                                        <a class="dropdown-item" href="#">{{(__('Another link'))}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{__('With Header')}} <i class="las la-angle-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <h6 class="dropdown-header">{{__('It\'s a header')}}</h6>
                                                        <a class="dropdown-item" href="#">{{__('Action')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Action')}}x</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary   dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{__('Disabled')}} <i class="las la-angle-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item" href="#">{{__('Regular link')}}</a>
                                                        <a class="dropdown-item disabled" href="#" tabindex="-1" aria-disabled="true">{{__('Disabled link')}}</a>
                                                        <a class="dropdown-item" href="#">{{__('Another link')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{__('With Icons')}} <i class="las la-angle-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                                                            <i class="las la-envelope font-15 mr-2"></i>{{__('Regular Link')}}</span>
                                                        </a>
                                                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                                                            <i class="las la-bell font-15 mr-2"></i>{{__('Another Link')}}</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{__('Another Link')}}x <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <form class="p-2">
                                                            <div class="form-group">
                                                                <label>{{__('Email address')}}</label>
                                                                <input type="email" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{__('Password')}}</label>
                                                                <input type="password" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">
                                                                        {{__('Remember me')}}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary btn-sm">{{__('Sign in')}}</button>
                                                        </form>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">{{__('Forgot password ?')}}</a>
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
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
@endpush

@push('custom-scripts')

@endpush
