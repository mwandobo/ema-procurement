@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/bootstrap-select/bootstrap-select.min.css') !!}
    {!! Html::style('assets/css/forms/form-widgets.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Bootstrap Select')}}</span></li>
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
                                                <h4>{{__('Bootstrap Select')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Basic')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="selectpicker w-100">
                                                    <option selected>{{__('Mustard')}}</option>
                                                    <option>{{__('Ketchup')}}</option>
                                                    <option>{{__('Relish')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Basic with group')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="selectpicker w-100">
                                                    <optgroup label="{{__('Picnic')}}">
                                                        <option>{{__('Mustard')}}</option>
                                                        <option>{{__('Ketchup')}}</option>
                                                        <option>{{__('Relish')}}</option>
                                                    </optgroup>
                                                    <optgroup label="{{__('Camping')}}">
                                                        <option>{{__('Tent')}}</option>
                                                        <option>{{__('Flashlight')}}</option>
                                                        <option>{{__('Toilet Paper')}}</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Multi Select')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="selectpicker w-100" multiple>
                                                    <option>{{__('Mustard')}}</option>
                                                    <option>{{__('Ketchup')}}</option>
                                                    <option>{{__('Relish')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Search Options')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="selectpicker w-100"  data-live-search="true">
                                                    <option value="BS">{{__('Bahamas')}}</option>
                                                    <option value="KH">{{__('Cambodia')}}</option>
                                                    <option value="DK">{{__('Denmark')}}</option>
                                                    <option value="EC">{{__('Ecuador')}}</option>
                                                    <option value="HT">{{__('Haiti')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Search with keywords')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="selectpicker w-100"  data-live-search="true">
                                                    <option data-tokens="1">{{__('Bahamas')}}</option>
                                                    <option data-tokens="2">{{__('Cambodia')}}</option>
                                                    <option data-tokens="3">{{__('Denmark')}}</option>
                                                    <option data-tokens="4">{{__('Ecuador')}}</option>
                                                    <option data-tokens="5">{{__('Haiti')}}</option>
                                                </select>
                                                <span class="form-text text-muted">{{__('Search between 1-5')}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Max Multi Select (2)')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="selectpicker w-100" multiple data-max-options="2">
                                                    <option>{{__('Mustard')}}</option>
                                                    <option>{{__('Ketchup')}}</option>
                                                    <option>{{__('Relish')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Forms')}}Placeholder</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="selectpicker w-100" multiple title="This is a placeholder text">
                                                    <option>{{__('Mustard')}}</option>
                                                    <option>{{__('Ketchup')}}</option>
                                                    <option>{{__('Relish')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Selected text')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="selectpicker w-100">
                                                    <option title="Combo 1">{{__('Rice,Curry,Sweet')}}</option>
                                                    <option title="Combo 2">{{__('Chow,Egg,Shake')}}</option>
                                                    <option title="Combo 3">{{__('Burger,Fries,Sauce')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Selected text')}} </label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="selectpicker w-100" multiple data-selected-text-format="count">
                                                    <option>{{__('Mustard')}}</option>
                                                    <option>{{__('Ketchup')}}</option>
                                                    <option>{{__('Relish')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Selected text (more than 3)')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="selectpicker w-100" multiple data-selected-text-format="count > 3">
                                                    <option>{{__('Mustard')}}</option>
                                                    <option>{{__('Ketchup')}}</option>
                                                    <option>{{__('Relish')}}</option>
                                                    <option>{{__('Onions')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Style individual options')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="selectpicker w-100">
                                                    <option>{{__('Mustard')}}</option>
                                                    <option class="bg-danger text-white">{{__('Ketchup')}}</option>
                                                    <option style="background: #95b3ff; color: rgb(0, 97, 177);">{{__('Relish')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Show Subtext')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="selectpicker w-100" data-show-subtext="true">
                                                    <option data-subtext="{{__('Forms')}}French's">{{__('Mustard')}}</option>
                                                    <option data-subtext="{{__('Forms')}}Heinz">{{__('Ketchup')}}</option>
                                                    <option data-subtext="{{__('Forms')}}Sweet">{{__('Relish')}}</option>
                                                    <option data-subtext="{{__('Miracle Whip')}}">{{__('Mayonnaise')}}</option>
                                                    <option data-divider="true">divider</option>
                                                    <option data-subtext="{{__('Forms')}}Honey">{{__('Barbecue Sauce')}}</option>
                                                    <option data-subtext="{{__('Forms')}}Ranch">{{__('Salad Dressing')}}</option>
                                                    <option data-subtext="{{__('Forms')}}Sweet & Spicy">{{__('Tabasco')}}</option>
                                                    <option data-subtext="{{__('Forms')}}Chunky">{{__('Salsa')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Data Size (5)')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="selectpicker w-100" data-size="5">
                                                    <option>{{__('Mustard')}}</option>
                                                    <option>{{__('Ketchup')}}</option>
                                                    <option>{{__('Relish')}}</option>
                                                    <option>{{__('Mayonnaise')}}</option>
                                                    <option>{{__('Barbecue Sauce')}}</option>
                                                    <option>{{__('Salad Dressing')}}</option>
                                                    <option>{{__('Tabasco')}}</option>
                                                    <option>{{__('Salsa')}}</option>
                                                    <option>{{__('Mustard')}}</option>
                                                    <option>{{__('Ketchup')}}</option>
                                                    <option>{{__('Relish')}}</option>
                                                    <option>{{__('Mayonnaise')}}</option>
                                                    <option>{{__('Barbecue Sauce')}}</option>
                                                    <option>{{__('Salad Dressing')}}</option>
                                                    <option>{{__('Tabasco')}}</option>
                                                    <option>{{__('Salsa')}}</option>
                                                    <option>{{__('Mustard')}}</option>
                                                    <option>{{__('Ketchup')}}</option>
                                                    <option>{{__('Relish')}}</option>
                                                    <option>{{__('Mayonnaise')}}</option>
                                                    <option>{{__('Barbecue Sauce')}}</option>
                                                    <option>{{__('Salad Dressing')}}</option>
                                                    <option>{{__('Tabasco')}}</option>
                                                    <option>{{__('Salsa')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Select / Deselect all')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="selectpicker w-100" multiple data-actions-box="true">
                                                    <option>{{__('Mustard')}}</option>
                                                    <option>{{__('Ketchup')}}</option>
                                                    <option>{{__('Relish')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Add a divider')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="selectpicker w-100">
                                                    <option>{{__('Mustard')}}</option>
                                                    <option>{{__('Ketchup')}}</option>
                                                    <option>{{__('Relish')}}</option>
                                                    <option data-divider="true">divider</option>
                                                    <option>{{__('Mustard')}}</option>
                                                    <option>{{__('Ketchup')}}</option>
                                                    <option>{{__('Relish')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Add a header')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="selectpicker w-100" data-header="{{__('Select a option below')}}">
                                                    <option>{{__('Mustard')}}</option>
                                                    <option>{{__('Ketchup')}}</option>
                                                    <option>{{__('Relish')}}</option>
                                                    <option data-divider="true">divider</option>
                                                    <option>{{__('Mustard')}}</option>
                                                    <option>{{__('Ketchup')}}</option>
                                                    <option>{{__('Relish')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Full Disable')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="selectpicker w-100" disabled>
                                                    <option>{{__('Mustard')}}</option>
                                                    <option>{{__('Ketchup')}}</option>
                                                    <option>{{__('Relish')}}</option>
                                                    <option data-divider="true">divider</option>
                                                    <option>{{__('Mustard')}}</option>
                                                    <option>{{__('Ketchup')}}</option>
                                                    <option>{{__('Relish')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Disabled Options')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="selectpicker w-100">
                                                    <option>{{__('Mustard')}}</option>
                                                    <option disabled>{{__('Ketchup (Disabled)')}}</option>
                                                    <option>{{__('Relish')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Disabled a group')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="selectpicker w-100">
                                                    <optgroup label="{{__('Picnic')}}" disabled>
                                                        <option>{{__('Mustard')}}</option>
                                                        <option>{{__('Ketchup')}}</option>
                                                        <option>{{__('Relish')}}</option>
                                                    </optgroup>
                                                    <optgroup label="{{__('Camping')}}">
                                                        <option>{{__('Tent')}}</option>
                                                        <option>{{__('Flashlight')}}</option>
                                                        <option>{{__('Toilet Paper')}}</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Custom Style')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                                <select class="selectpicker w-100" data-style="custom-styling btn btn-outline-danger">
                                                    <option>{{__('Mustard')}}</option>
                                                    <option>{{__('Ketchup')}}</option>
                                                    <option>{{__('Relish')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Success Message')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 no-margin">
                                                <select class="selectpicker w-100">
                                                    <option>{{__('Mustard')}}</option>
                                                    <option>{{__('Ketchup')}}</option>
                                                    <option>{{__('Relish')}}</option>
                                                </select>
                                                <span class="form-text text-success-teal">{{__('You have successfully selected')}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Error Message')}}</label>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 no-margin">
                                                <select class="selectpicker w-100">
                                                    <option>{{__('Mustard')}}</option>
                                                    <option>{{__('Ketchup')}}</option>
                                                    <option>{{__('Relish')}}</option>
                                                </select>
                                                <span class="form-text text-danger">{{__('Some error occurred')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-footer text-right">
                                        <button type="reset" class="btn btn-primary mr-2">{{__('Submit')}}</button>
                                        <button type="reset" class="btn btn-outline-primary">{{__('Cancel')}}</button>
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
    {!! Html::script('plugins/bootstrap-select/bootstrap-select.min.js') !!}
@endpush

@push('custom-scripts')

@endpush
