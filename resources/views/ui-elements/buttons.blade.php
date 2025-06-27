@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/ui-elements/buttons.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Buttons')}}</span></li>
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
                        <div class="row layout-top-spacing button-container">
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Default Buttons')}}</h4>
                                                <p class="sub-header">
                                                    {{__('Use the button classes on an')}}  <code>&lt;a&gt;</code>, <code>&lt;button&gt;</code>, or <code>&lt;input&gt;</code> {{__('Hi')}}element.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list">
                                            <button type="button" class="btn btn-primary">{{__('Primary')}}</button>
                                            <button type="button" class="btn btn-success">{{__('Success')}}</button>
                                            <button type="button" class="btn btn-info">{{__('Info')}}</button>
                                            <button type="button" class="btn btn-warning">{{__('Warning')}}</button>
                                            <button type="button" class="btn btn-danger">{{__('Danger')}}</button>
                                            <button type="button" class="btn btn-dark">{{__('Dark')}}</button>
                                            <button type="button" class="btn btn-secondary">{{__('Secondary')}}</button>
                                            <button type="button" class="btn btn-white">{{__('White')}}</button>
                                            <button type="button" class="btn btn-link">{{__('Link')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Rounded Button')}}</h4>
                                                <p class="sub-header">
                                                    {{__('Add')}} <code>.btn-rounded</code> {{__('to default button to get rounded corners.')}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list">
                                            <button type="button" class="btn btn-primary btn-rounded">{{__('Primary')}}</button>
                                            <button type="button" class="btn btn-success btn-rounded">{{__('Success')}}</button>
                                            <button type="button" class="btn btn-info btn-rounded">{{__('Info')}}</button>
                                            <button type="button" class="btn btn-warning btn-rounded">{{__('Warning')}}</button>
                                            <button type="button" class="btn btn-danger btn-rounded">{{__('Danger')}}</button>
                                            <button type="button" class="btn btn-dark btn-rounded">{{__('Dark')}}</button>
                                            <button type="button" class="btn btn-secondary btn-rounded">{{__('Secondary')}}</button>
                                            <button type="button" class="btn btn-white btn-rounded">{{__('White')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Ripple Effect Buttons')}}</h4>
                                                <p class="sub-header">
                                                    {{__('Click on the buttons to see the ripple effect')}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list">
                                            <button class="ripple-button ripple-button-primary" type="button">
                                                <div class="ripple-ripple js-ripple">
                                                    <span class="ripple-ripple__circle" style="top: 16px; left: 56.875px;"></span>
                                                </div>
                                                {{__('Primary')}}
                                            </button>
                                            <button class="ripple-button ripple-button-success" type="button">
                                                <div class="ripple-ripple js-ripple">
                                                    <span class="ripple-ripple__circle" style="top: 16px; left: 56.875px;"></span>
                                                </div>
                                                {{__('Success')}}
                                            </button>
                                            <button class="ripple-button ripple-button-info" type="button">
                                                <div class="ripple-ripple js-ripple">
                                                    <span class="ripple-ripple__circle" style="top: 16px; left: 56.875px;"></span>
                                                </div>
                                                {{__('Info')}}
                                            </button>
                                            <button class="ripple-button ripple-button-warning" type="button">
                                                <div class="ripple-ripple js-ripple">
                                                    <span class="ripple-ripple__circle" style="top: 16px; left: 56.875px;"></span>
                                                </div>
                                                {{__('Warning')}}
                                            </button>
                                            <button class="ripple-button ripple-button-danger" type="button">
                                                <div class="ripple-ripple js-ripple">
                                                    <span class="ripple-ripple__circle" style="top: 16px; left: 56.875px;"></span>
                                                </div>
                                                {{__('Danger')}}
                                            </button>
                                            <button class="ripple-button ripple-button-dark" type="button">
                                                <div class="ripple-ripple js-ripple">
                                                    <span class="ripple-ripple__circle" style="top: 16px; left: 56.875px;"></span>
                                                </div>
                                                {{__('Dark')}}
                                            </button>
                                            <button class="ripple-button ripple-button-secondary" type="button">
                                                <div class="ripple-ripple js-ripple">
                                                    <span class="ripple-ripple__circle" style="top: 16px; left: 56.875px;"></span>
                                                </div>
                                                {{__('Secondary')}}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Gradient Button')}}</h4>
                                                <p class="sub-header">
                                                    {{__('Add')}} <code>.bg-gradient-*</code> {{__('class to button to get the gradient effect.')}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list">
                                            <button type="button" class="btn bg-gradient-primary text-white">{{__('Primary')}}</button>
                                            <button type="button" class="btn bg-gradient-success text-white">{{__('Success')}}</button>
                                            <button type="button" class="btn bg-gradient-info text-white">{{__('Info')}}</button>
                                            <button type="button" class="btn bg-gradient-warning text-white">{{__('Warning')}}</button>
                                            <button type="button" class="btn bg-gradient-danger text-white">{{__('Danger')}}</button>
                                            <button type="button" class="btn bg-gradient-dark text-white">{{__('Dark')}}</button>
                                            <button type="button" class="btn bg-gradient-secondary text-white">{{__('Secondary')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Outline Buttons')}}</h4>
                                                <p class="sub-header">
                                                    {{__('Use a classes')}} <code>.btn-outline-**</code> {{__('to quickly create a bordered buttons.')}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list">
                                            <button type="button" class="btn btn-outline-primary">{{__('Primary')}}</button>
                                            <button type="button" class="btn btn-outline-success">{{__('Success')}}</button>
                                            <button type="button" class="btn btn-outline-info">{{__('Info')}}</button>
                                            <button type="button" class="btn btn-outline-warning">{{__('Warning')}}</button>
                                            <button type="button" class="btn btn-outline-danger">{{__('Danger')}}</button>
                                            <button type="button" class="btn btn-outline-dark">{{__('Dark')}}</button>
                                            <button type="button" class="btn btn-outline-secondary">{{__('Secondary')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Outline Rounded Button')}}</h4>
                                                <p class="sub-header">
                                                    {{__('Add')}}  <code>.btn-rounded</code> {{__('to default button to get rounded corners.')}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list">
                                            <button type="button" class="btn btn-outline-primary btn-rounded">{{__('Primary')}}</button>
                                            <button type="button" class="btn btn-outline-success btn-rounded">{{__('Success')}}</button>
                                            <button type="button" class="btn btn-outline-info btn-rounded">{{__('Info')}}</button>
                                            <button type="button" class="btn btn-outline-warning btn-rounded">{{__('Warning')}}</button>
                                            <button type="button" class="btn btn-outline-danger btn-rounded">{{__('Danger')}}</button>
                                            <button type="button" class="btn btn-outline-dark btn-rounded">{{__('Hi')}}</button>
                                            <button type="button" class="btn btn-outline-secondary btn-rounded">{{__('Secondary')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Soft Buttons')}}</h4>
                                                <p class="sub-header">
                                                    {{__('Use a classes')}} <code>.btn-soft-**</code> {{__('to quickly create buttons with soft background.')}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list">
                                            <button type="button" class="btn btn-soft-primary  ">{{__('Primary')}}</button>
                                            <button type="button" class="btn btn-soft-success  ">{{__('Success')}}</button>
                                            <button type="button" class="btn btn-soft-info  ">{{__('Info')}}</button>
                                            <button type="button" class="btn btn-soft-warning  ">{{__('Warning')}}</button>
                                            <button type="button" class="btn btn-soft-danger  ">{{__('Danger')}}</button>
                                            <button type="button" class="btn btn-soft-dark  ">{{__('Dark')}}</button>
                                            <button type="button" class="btn btn-soft-secondary ">{{__('Secondary')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Soft Rounded Button')}}</h4>
                                                <p class="sub-header">
                                                    {{__('Add')}} <code>.btn-rounded</code> {{__('to default button to get rounded corners.')}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list">
                                            <button type="button" class="btn btn-soft-primary btn-rounded  ">{{__('Primary')}}</button>
                                            <button type="button" class="btn btn-soft-success btn-rounded  ">{{__('Success')}}</button>
                                            <button type="button" class="btn btn-soft-info btn-rounded  ">{{__('Info')}}</button>
                                            <button type="button" class="btn btn-soft-warning btn-rounded  ">{{__('Warning')}}</button>
                                            <button type="button" class="btn btn-soft-danger btn-rounded  ">{{__('Danger')}}</button>
                                            <button type="button" class="btn btn-soft-dark btn-rounded  ">{{__('Dark')}}</button>
                                            <button type="button" class="btn btn-soft-secondary btn-rounded ">{{__('Secondary')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Buttons Labels')}}</h4>
                                                <p class="sub-header">
                                                    {{__('Put')}} <code>&lt;span&gt;</code> with class <code>.btn-label</code> and any <code>icon</code> {{__('inside it. If you want to
                                                    put icon on right side then add class')}} <code>.btn-label-right</code> in <code>&lt;span&gt;</code>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list">
                                            <button type="button" class="btn btn-success">
                                                <span class="btn-label"><i class="las la-check-double"></i></span>{{__('Success')}}
                                            </button>
                                            <button type="button" class="btn btn-danger">
                                                <span class="btn-label"><i class="las la-times-circle"></i></span>{{__('Danger')}}
                                            </button>
                                            <button type="button" class="btn btn-info">
                                                <span class="btn-label"><i class="las la-info-circle"></i></span>{{__('Info')}}
                                            </button>
                                            <button type="button" class="btn btn-warning">
                                                <span class="btn-label"><i class="las la-exclamation-triangle"></i></span>{{__('Warning')}}
                                            </button>
                                            <button type="button" class="btn btn-dark">
                                                <span class="btn-label"><i class="las la-moon"></i></span>{{__('Dark')}}
                                            </button>
                                        </div>
                                        <br>
                                        <div class="button-list">
                                            <button type="button" class="btn btn-success">
                                                {{__('Success')}}<span class="btn-label-right"><i class="las la-check-double"></i></span>
                                            </button>
                                            <button type="button" class="btn btn-danger">
                                                {{__('Danger')}}<span class="btn-label-right"><i class="las la-times-circle"></i></span>
                                            </button>
                                            <button type="button" class="btn btn-info">
                                                {{__('Info')}}<span class="btn-label-right"><i class="las la-info-circle"></i></span>
                                            </button>
                                            <button type="button" class="btn btn-warning">
                                                {{__('Warning')}}<span class="btn-label-right"><i class="las la-exclamation-triangle"></i></span>
                                            </button>
                                            <button type="button" class="btn btn-dark">
                                                {{__('Dark')}}<span class="btn-label-right"><i class="las la-moon"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Outline Rounded Button Labels')}}</h4>
                                                <p class="sub-header">
                                                    {{__('Add')}} <code>.btn-rounded</code> {{__('to default button to get rounded corners.')}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list">
                                            <button type="button" class="btn btn-success btn-rounded">
                                                <span class="btn-label"><i class="las la-check-double"></i></span>{{__('Success')}}
                                            </button>
                                            <button type="button" class="btn btn-danger btn-rounded">
                                                <span class="btn-label"><i class="las la-times-circle"></i></span>{{__('Danger')}}
                                            </button>
                                            <button type="button" class="btn btn-info btn-rounded">
                                                <span class="btn-label"><i class="las la-info-circle"></i></span>{{__('Info')}}
                                            </button>
                                            <button type="button" class="btn btn-warning btn-rounded">
                                                <span class="btn-label"><i class="las la-exclamation-triangle"></i></span>{{__('Warning')}}
                                            </button>
                                            <button type="button" class="btn btn-dark btn-rounded">
                                                <span class="btn-label"><i class="las la-moon"></i></span>{{__('Dark')}}
                                            </button>
                                        </div>
                                        <br>
                                        <div class="button-list">
                                            <button type="button" class="btn btn-success btn-rounded">
                                                {{__('Success')}}<span class="btn-label-right"><i class="las la-check-double"></i></span>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-rounded">
                                                {{__('Danger')}}<span class="btn-label-right"><i class="las la-times-circle"></i></span>
                                            </button>
                                            <button type="button" class="btn btn-info btn-rounded">
                                                {{__('Info')}}<span class="btn-label-right"><i class="las la-info-circle"></i></span>
                                            </button>
                                            <button type="button" class="btn btn-warning btn-rounded">
                                                {{__('Warning')}}<span class="btn-label-right"><i class="las la-exclamation-triangle"></i></span>
                                            </button>
                                            <button type="button" class="btn btn-dark btn-rounded">
                                                {{__('Dark')}}<span class="btn-label-right"><i class="las la-moon"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Button Width')}}</h4>
                                                <p class="sub-header">
                                                    {{__('Create buttons with minimum width by adding add ')}}<code>.width-xs</code>, <code>.width-sm</code>, <code>.width-md</code>, <code>.width-lg</code> or <code>.width-xl</code>.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list">
                                            <button type="button" class="btn btn-primary width-xs  ">xs</button>
                                            <button type="button" class="btn btn-success width-sm  ">{{__('Small')}}</button>
                                            <button type="button" class="btn btn-info width-md  ">{{__('Middle')}}</button>
                                            <button type="button" class="btn btn-warning width-lg  ">{{__('Large')}}</button>
                                            <button type="button" class="btn btn-danger width-xl  ">{{__('Extra Large')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Button Size')}}</h4>
                                                <p class="sub-header">
                                                    {{__('Add')}} <code>.btn-lg</code> or <code>.btn-sm</code> {{__('for additional sizes.')}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list">
                                            <button class="btn btn-primary btn-lg btn btn-primary">{{__('Large button')}}</button>
                                            <button class="btn btn-secondary btn-lg btn btn-secondary">{{__('Large button')}}</button>
                                            <button class="btn btn-primary btn-sm btn btn-primary">{{__('Small button')}}</button>
                                            <button class="btn btn-secondary btn-sm btn btn-secondary">{{__('Small button')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Button Disabled')}}</h4>
                                                <p class="sub-header">
                                                    {{__('Add the')}} <code>disabled</code> attribute to <code>&lt;button&gt;</code> {{__('buttons.')}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list">
                                            <button type="button" class="btn btn-primary disabled">{{__('Primary')}}</button>
                                            <button type="button" class="btn btn-success disabled">{{__('Success')}}</button>
                                            <button type="button" class="btn btn-info disabled">{{__('Info')}}</button>
                                            <button type="button" class="btn btn-warning disabled">{{__('Warning')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Icons Buttons')}}</h4>
                                                <p class="sub-header">
                                                    {{__('Buttons with only icon')}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list">
                                            <button type="button" class="btn btn-success font-20"><i class="las la-check-double"></i></button>
                                            <button type="button" class="btn btn-danger font-20"><i class="las la-times-circle"></i></button>
                                            <button type="button" class="btn btn-info font-20"><i class="las la-info-circle"></i></button>
                                            <button type="button" class="btn btn-warning font-20"><i class="las la-exclamation-triangle"></i></button>
                                            <button type="button" class="btn btn-dark font-20"><i class="las la-moon"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Icons Buttons')}}</h4>
                                                <p class="sub-header">
                                                    {{__('Buttons with text and icon')}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list">
                                            <button type="button" class="btn btn-success"><i class="las la-check-double"></i> {{__('Success')}}</button>
                                            <button type="button" class="btn btn-danger"><i class="las la-times-circle"></i> {{__('Danger')}}</button>
                                            <button type="button" class="btn btn-info"><i class="las la-info-circle"></i> {{__('Info')}}</button>
                                            <button type="button" class="btn btn-warning">{{__('Warning')}} <i class="las la-exclamation-triangle"></i></button>
                                            <button type="button" class="btn btn-dark">{{__('Dark')}} <i class="las la-moon"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Block Buttons')}}</h4>
                                                <p class="sub-header">
                                                    {{__('Create block level buttons,with by adding add')}} <code>.btn-block</code>.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list pr-xl-4">
                                            <button type="button" class="btn btn-block btn-lg btn-primary">{{__('Block Button')}}</button>
                                            <button type="button" class="btn btn-block btn-md btn-secondary">{{__('Block Button')}}</button>
                                            <button type="button" class="btn btn-block btn-sm btn-danger">{{__('Block Button')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Button Group Sizing')}}</h4>
                                                <p class="sub-header">
                                                    {{__('Instead of applying button sizing classes to every button in a group, just add')}} <code class="highlighter-rouge">.btn-group-*</code> to each <code class="highlighter-rouge">.btn-group</code>{{__(', including each one when nesting multiple groups.')}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-md-6 d-none d-md-block">
                                                <div class="btn-group btn-group-lg" role="group" aria-label="{__('Basic example')}}">
                                                    <button class="btn btn-secondary btn btn-secondary">{{__('Left')}}</button>
                                                    <button class="btn btn-secondary btn btn-secondary">{{__('Middle')}}</button>
                                                    <button class="btn btn-secondary btn btn-secondary">{{__('Right')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group mt-2" role="group" aria-label="{__('Basic example')}}">
                                                    <button class="btn btn-secondary btn btn-secondary">{{__('Left')}}</button>
                                                    <button class="btn btn-secondary btn btn-secondary">{{__('Middle')}}</button>
                                                    <button class="btn btn-secondary btn btn-secondary">{{__('Right')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group btn-group-sm mt-2" role="group" aria-label="{__('Hi')}}Basic example">
                                                    <button class="btn btn-secondary btn btn-secondary">{{__('Left')}}</button>
                                                    <button class="btn btn-secondary btn btn-secondary">{{__('Middle')}}</button>
                                                    <button class="btn btn-secondary btn btn-secondary">{{__('Right')}}</button>
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
                                                <h4>{{__('Vertical Button Groups')}}</h4>
                                                <p class="sub-header">
                                                    {{__('Make a set of buttons appear vertically stacked rather than horizontally. Split button dropdowns are not supported here.')}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="btn-group-vertical" role="group" aria-label="{__('Hi')}}Vertical button group">
                                            <button type="button" class="btn btn-secondary btn btn-secondary">{{__('Button')}}</button>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupVerticalDropdown" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{__('Dropdown')}} <i class="las la-angle-down"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDropdown">
                                                    <a class="dropdown-item" href="#">{{__('Dropdown link')}}</a>
                                                    <a class="dropdown-item" href="#">{{__('Dropdown link')}}</a>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary btn btn-secondary">{{__('Button')}}</button>
                                            <button type="button" class="btn btn-secondary btn btn-secondary">{{__('Button')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Button Group')}}</h4>
                                                <p class="sub-header">
                                                    {{__('Wrap a series of buttons with')}} <code class="highlighter-rouge">.btn</code> in <code class="highlighter-rouge">.btn-group</code>.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group" role="group" aria-label="{{__('Basic example')}}">
                                                    <button class="btn btn-secondary btn btn-dark">{{__('Left')}}</button>
                                                    <button class="btn btn-secondary btn btn-dark">{{__('Middle')}}</button>
                                                    <button class="btn btn-secondary btn btn-dark">{{__('Right')}}</button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-group mt-4 mt-md-0" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-dark"><i class="las la-align-left"></i></button>
                                                    <button type="button" class="btn btn-dark"><i class="las la-align-center"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-dark"><i class="las la-align-right"></i></button>
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
