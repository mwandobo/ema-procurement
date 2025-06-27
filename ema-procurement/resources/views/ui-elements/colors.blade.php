@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/ui-elements/alert.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Colors')}}</span></li>
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
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Theme Colors')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-primary fixed-width-xs fixed-height-xs rounded-circle"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 strong">{{__('Primary')}}</p>
                                                        <p class="mb-0 text-muted">#2262c6</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-secondary fixed-width-xs fixed-height-xs rounded-circle"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 strong">{{__('Secondary')}}</p>
                                                        <p class="mb-0 text-muted">#5c1ac3</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-success fixed-width-xs fixed-height-xs rounded-circle"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 strong">{{__('Success')}}</p>
                                                        <p class="mb-0 text-muted">#8dbf42</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-warning fixed-width-xs fixed-height-xs rounded-circle"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 strong">{{__('Warning')}}</p>
                                                        <p class="mb-0 text-muted">#e2a03f</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-danger fixed-width-xs fixed-height-xs rounded-circle"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 strong">{{__('Danger')}}</p>
                                                        <p class="mb-0 text-muted">#e7515a</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-info fixed-width-xs fixed-height-xs rounded-circle"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 strong">{{__('Danger')}}x</p>
                                                        <p class="mb-0 text-muted">#2196f3</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-dark fixed-width-xs fixed-height-xs rounded-circle"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 strong">{{__('Dark')}}</p>
                                                        <p class="mb-0 text-muted">#3b3f5c</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-light-primary fixed-width-xs fixed-height-xs rounded-circle"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 strong">{{__('Light Primary')}}</p>
                                                        <p class="mb-0 text-muted">#c2d5ff</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-light-secondary fixed-width-xs fixed-height-xs rounded-circle"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 strong">{{__('Light Secondary')}}</p>
                                                        <p class="mb-0 text-muted">#dccff7</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-light-success fixed-width-xs fixed-height-xs rounded-circle"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 strong">{{__('Light Success')}}</p>
                                                        <p class="mb-0 text-muted">#e6ffbf</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-light-warning fixed-width-xs fixed-height-xs rounded-circle"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 strong">{{__('Light Warning')}}</p>
                                                        <p class="mb-0 text-muted">#ffeccb</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-light-danger fixed-width-xs fixed-height-xs rounded-circle"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 strong">{{__('Light Danger')}}</p>
                                                        <p class="mb-0 text-muted">#ffe1e2</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-light-info fixed-width-xs fixed-height-xs rounded-circle"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 strong">{{__('Light Info')}}</p>
                                                        <p class="mb-0 text-muted">#bae7ff</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-light-dark fixed-width-xs fixed-height-xs rounded-circle"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 strong">{{__('Light Dark')}}</p>
                                                        <p class="mb-0 text-muted">#acb0c3</p>
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
                                                <h4>{{__('Other Colors')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <h6>{{__('Choose color from here. Click up and down arrow to get the "hex" colors')}}</h6>
                                                <input type="color" value="#ff0000" style="width:100px;">
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fixed-width-xs fixed-height-xs rounded-circle" style="background-color: #f7f7f7;"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 text-muted">#f7f7f7</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fixed-width-xs fixed-height-xs rounded-circle" style="background-color: #e8e8e8;"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 text-muted">#e8e8e8</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fixed-width-xs fixed-height-xs rounded-circle" style="background-color: #c7c7c7;"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 text-muted">#c7c7c7</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fixed-width-xs fixed-height-xs rounded-circle" style="background-color: #b3b3b3;"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 text-muted">#b3b3b3</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fixed-width-xs fixed-height-xs rounded-circle" style="background-color: #989898;"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 text-muted">#989898</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fixed-width-xs fixed-height-xs rounded-circle" style="background-color: #808080;"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 text-muted">#808080</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fixed-width-xs fixed-height-xs rounded-circle" style="background-color: #6b6b6b;"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 text-muted">#6b6b6b</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fixed-width-xs fixed-height-xs rounded-circle" style="background-color: #4a4a4a;"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 text-muted">#4a4a4a</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fixed-width-xs fixed-height-xs rounded-circle" style="background-color: #2d2d2d;"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 text-muted">#2d2d2d</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fixed-width-xs fixed-height-xs rounded-circle" style="background-color: #101010;"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 text-muted">#101010</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fixed-width-xs fixed-height-xs rounded-circle" style="background-color: #c70000;"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 text-muted">#c70000</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fixed-width-xs fixed-height-xs rounded-circle" style="background-color: #c7aa00;"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 text-muted">#c7aa00</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fixed-width-xs fixed-height-xs rounded-circle" style="background-color: #75c700;"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 text-muted">#75c700</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fixed-width-xs fixed-height-xs rounded-circle" style="background-color: #10c700;"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 text-muted">#10c700</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fixed-width-xs fixed-height-xs rounded-circle" style="background-color: #00c795;"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 text-muted">#00c795</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fixed-width-xs fixed-height-xs rounded-circle" style="background-color: #0094c7;"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 text-muted">#0094c7</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fixed-width-xs fixed-height-xs rounded-circle" style="background-color: #0041c7;"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 text-muted">#0041c7</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fixed-width-xs fixed-height-xs rounded-circle" style="background-color: #5200c7;"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 text-muted">#5200c7</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fixed-width-xs fixed-height-xs rounded-circle" style="background-color: #c700c5;"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 text-muted">#c700c5</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fixed-width-xs fixed-height-xs rounded-circle" style="background-color: #c70069;"></div>
                                                    <div class="ml-3">
                                                        <p class="mb-0 text-muted">#c70069</p>
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
