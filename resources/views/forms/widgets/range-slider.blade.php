@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/forms/form-widgets.css') !!}
    {!! Html::style('plugins/range-slider/ion.rangeSlider.min.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Forms')}}</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">{{__('Widgets')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Range Slider')}}</span></li>
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
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Range slider options')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <label class="col-lg-3 d-flex align-center">{{__('Basic Example')}}</label>
                                            <div class="col-lg-9">
                                                <div class="ion-range-slider">
                                                    <input type="hidden" id="demo_0" class="irs-hidden-input" tabindex="-1" readonly="" value="10">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                            <label class="col-lg-3 d-flex align-center">{{__('Set type to double, specify range, show grid and add a prefix "$"')}}</label>
                                            <div class="col-lg-9">
                                                <div class="ion-range-slider">
                                                    <input type="hidden" id="demo_1" class="irs-hidden-input" tabindex="-1" readonly="" value="10">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                            <label class="col-lg-3 d-flex align-center">{{__('Set up range and step')}}</label>
                                            <div class="col-lg-9">
                                                <div class="ion-range-slider">
                                                    <input type="hidden" id="demo_2" class="irs-hidden-input" tabindex="-1" readonly="" value="10">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                            <label class="col-lg-3 d-flex align-center">{{__('Set up range and step (Steps Added)')}}</label>
                                            <div class="col-lg-9">
                                                <div class="ion-range-slider">
                                                    <input type="hidden" id="demo_3" class="irs-hidden-input" tabindex="-1" readonly="" value="10">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                            <label class="col-lg-3 d-flex align-center">{{__('Force fractional values, using fractional step 0.1')}}</label>
                                            <div class="col-lg-9">
                                                <div class="ion-range-slider">
                                                    <input type="hidden" id="demo_4" class="irs-hidden-input" tabindex="-1" readonly="" value="10">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                            <label class="col-lg-3 d-flex align-center">{{__('Using array of custom values')}}</label>
                                            <div class="col-lg-9">
                                                <div class="ion-range-slider">
                                                    <input type="hidden" id="demo_5" class="irs-hidden-input" tabindex="-1" readonly="" value="10">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                            <label class="col-lg-3 d-flex align-center">{{__('Values array could be anything, even strings')}}</label>
                                            <div class="col-lg-9">
                                                <div class="ion-range-slider">
                                                    <input type="hidden" id="demo_6" class="irs-hidden-input" tabindex="-1" readonly="" value="10">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                            <label class="col-lg-3 d-flex align-center">{{__('Change visual look of numbers')}}</label>
                                            <div class="col-lg-9">
                                                <div class="ion-range-slider">
                                                    <input type="hidden" id="demo_7" class="irs-hidden-input" tabindex="-1" readonly="" value="10">
                                                </div>
                                                <div class="demo__buttons mt-4 pt-2">
                                                    <button class="btn btn-sm btn-primary js-btn__d7" data-type="">{{__('No Separtor')}}</button>
                                                    <button class="btn btn-sm btn-warning js-btn__d7" data-type=" ">{{__('Space Separtor')}}</button>
                                                    <button class="btn btn-sm btn-danger js-btn__d7" data-type=".">{{__('. Separtor')}}</button>
                                                    <button class="btn btn-sm btn-secondary js-btn__d7" data-type=",">{{__(', Separtor')}}</button>
                                                    <button class="btn btn-sm btn-dark js-btn__d7 --active" data-type="_">{{__('_ Separtor')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                            <label class="col-lg-3 d-flex align-center">{{__('Calculating logarithm of a number')}}</label>
                                            <div class="col-lg-9">
                                                <div class="ion-range-slider">
                                                    <input type="hidden" id="demo_8" class="irs-hidden-input" tabindex="-1" readonly="" value="10">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                            <label class="col-lg-3 d-flex align-center">{{__('Decorating numbers with prefixes, postfixes and other symbols')}}</label>
                                            <div class="col-lg-9">
                                                <div class="ion-range-slider">
                                                    <input type="hidden" id="demo_9" class="irs-hidden-input" tabindex="-1" readonly="" value="10">
                                                </div>
                                                <div class="demo__buttons mt-4 pt-2">
                                                    <button class="btn btn-sm btn-primary --active js-btn__d9" data-prefix="$">{{__('$100')}}</button>
                                                    <button class="btn btn-sm btn-warning js-btn__d9" data-postfix=" €">{{__('100 €')}}</button>
                                                    <button class="btn btn-sm btn-danger js-btn__d9" data-postfix=" ₽">{{__('100 ₽')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                            <label class="col-lg-3 d-flex align-center">{{__('Using prefix and postfix at the same time')}}</label>
                                            <div class="col-lg-9">
                                                <div class="ion-range-slider">
                                                    <input type="hidden" id="demo_10" class="irs-hidden-input" tabindex="-1" readonly="" value="10">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                            <label class="col-lg-3 d-flex align-center">{{__('Lock and restrict handles')}}</label>
                                            <div class="col-lg-9">
                                                <div class="ion-range-slider">
                                                    <input type="hidden" id="demo_11" class="irs-hidden-input" tabindex="-1" readonly="" value="10">
                                                </div>
                                                <div class="demo__buttons mt-4 pt-2">
                                                    <button class="btn btn-sm btn-primary js-btn__d1" data-variant="0">{{__('Unlock both')}}</button>
                                                    <button class="btn btn-sm btn-dark --small js-btn__d1 --active" data-variant="1">{{__('Lock FROM')}}</button>
                                                    <button class="btn btn-sm btn-danger js-btn__d1" data-variant="2">{{__('Lock TO')}}</button>
                                                    <button class="btn btn-sm btn-secondary js-btn__d1" data-variant="3">{{__('Lock both')}}</button>
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
    {!! Html::script('plugins/range-slider/ion.rangeSlider.min.js') !!}
    {!! Html::script('assets/js/forms/custom-range-slider.js') !!}
@endpush

@push('custom-scripts')

@endpush
