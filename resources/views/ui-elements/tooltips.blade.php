@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/ui-elements/tooltip.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Tooltips')}}</span></li>
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
                                                <h4>{{__('Default Tooltip')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <a href="javascript:void(0);" class="btn btn-primary mb-3 rounded bs-tooltip lol" title="{{__('Tooltip using ANCHOR tag')}}">
                                            {{__('Link')}}
                                        </a>
                                        <button type="button" class="btn btn-secondary mb-3 rounded bs-tooltip" title="{{__('Tooltip using BUTTON tag')}}">
                                            {{__('Button')}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Default tooltip position')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <button type="button" class="btn btn-success mb-2 rounded bs-tooltip" data-placement="top" title="{__('Tooltip on top')}}">
                                            {{__('Top')}}
                                        </button>
                                        <button type="button" class="btn btn-danger mb-2 rounded bs-tooltip" data-placement="right" title="{__('Tooltip on right')}}">
                                            {{__('Right')}}
                                        </button>
                                        <button type="button" class="btn btn-warning mb-2 rounded bs-tooltip" data-placement="bottom" title="{__('Tooltip on bottom')}}">
                                            {{__('Bottom')}}
                                        </button>
                                        <button type="button" class="btn btn-info mb-2 rounded bs-tooltip" data-placement="left" title="{__('Tooltip on left')}}">
                                            {{__('Left')}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4> {{__('Tippy Tooltip (Placement)')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list">
                                            <button id="placementTop" class="btn btn-primary mb-1">{{__('Top')}}</button>
                                            <button id="placementTopStart" class="btn btn-info mb-1">{{__('Top Start (Left)')}}</button>
                                            <button id="placementTopEnd" class="btn btn-danger mb-1">{{__('Top End (Right)')}}</button>
                                            <button id="placementRight" class="btn btn-success mb-1">{{__('Right')}}</button>
                                            <button id="placementRightStart" class="btn btn-warning mb-1">{{__('Right Start (Vertically Top)')}}</button>
                                            <button id="placementRightEnd" class="btn btn-dark mb-1">{{__('Right End (Vertically Bottom)')}}</button>
                                            <button id="placementBottom" class="btn btn-secondary mb-1">{{__('Bottom')}}</button>
                                            <button id="placementBottomStart" class="btn btn-soft-danger mb-1">{{__('Bottom Start (left)')}}</button>
                                            <button id="placementBottomEnd" class="btn btn-soft-primary mb-1">{{__('Bottom End (Right)')}}</button>
                                            <button id="placementLeft" class="btn btn-soft-secondary mb-1">{{__('Left')}}</button>
                                            <button id="placementLeftStart" class="btn btn-soft-success mb-1">{{__('Left Start (Vertically Top)')}}</button>
                                            <button id="placementLeftEnd" class="btn btn-soft-warning mb-1">{{__('Left End (Vertically Bottom)')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Tippy Tooltip (Arrows)')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list">
                                            <button id="defaultArrow" class="btn btn-primary mb-1">{{__('Default')}}</button>
                                            <button id="noArrow" class="btn btn-info mb-1">{{__('No Arrow')}}</button>
                                            <button id="roundArrow" class="btn btn-danger mb-1">{{__('Round Arrow')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Tippy Tooltip (Allow HTML)')}} </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list">
                                            <button id="allowHtml" class="btn btn-primary mb-1">{{__('Allow HTML')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Tippy Tooltip (Animations) ')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list">
                                            <button id="animationShiftAway" class="btn btn-primary mb-1">{{__('Shift Away')}}</button>
                                            <button id="animationShiftToward" class="btn btn-info mb-1">{{__('Shift Toward')}}</button>
                                            <button id="animationScale" class="btn btn-danger mb-1">{{__('Scale')}}</button>
                                            <button id="animationPerspective" class="btn btn-dark mb-1">{{__('Perspective')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Tooltip Background')}} </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="button-list">
                                            <button type="button" class="mb-1 btn btn-primary blue"> {{__('Blue')}} </button>
                                            <button type="button" class="mb-1 btn btn-success green"> {{__('Green')}} </button>
                                            <button type="button" class="mb-1 btn btn-info lblue "> {{__('Light Blue')}} </button>
                                            <button type="button" class="mb-1 btn btn-danger red"> {{__('Red')}} </button>
                                            <button type="button" class="mb-1 btn btn-warning yellow"> {{__('Yellow')}} </button>
                                            <button type="button" class="mb-1 btn btn-secondary purple"> {{__('Purple')}} </button>
                                            <button type="button" class="mb-1 btn btn-dark black"> {{__('Black')}} </button>
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
    {!! Html::script('https://unpkg.com/popper.js@1') !!}
    {!! Html::script('https://unpkg.com/tippy.js@4') !!}
    {!! Html::script('assets/js/ui-elements/tippy-tooltip.js') !!}
@endpush

@push('custom-scripts')

@endpush
