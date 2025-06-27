@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/tagify/tagify.css') !!}
    {!! Html::style('assets/css/forms/custom-tagify.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Tagify')}}</span></li>
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
                                                <h4>{{__('Tagify')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Basic Example')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input name='basic' value='{{__('Forms')}}Tag 1, Another Tag' class='form-control'>
                                                <span class="form-text text-muted">{{__('Passing the input element as a parameter to Tagify will transform it into a tags-component.')}}
                                                            <br>
                                                            <span class="text-danger">{{__('1. Type anything then press tab')}}</span>
                                                            <br>
                                                            <span class="text-danger">{{__('2. Double Click to edit')}}</span>
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4 cld pt-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Choose from list of data')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                ​<input name='input-custom-dropdown' placeholder='{{__('Forms')}}write some tags' value='css, html, javascript' />
                                                <span class="form-text text-muted">{{__('You can use')}}
                                                            <span class="text-danger">{{__('maximum 10 tags.')}}</span> {{__('Click to see the list')}}
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4 pt-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Textarea')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                        <textarea name='tags2' placeholder='{{__('Movie names')}}'>
                                                            [{"value":"The Godfather"}, {"value":"The Matrix"}]
                                                        </textarea>
                                                <span class="form-text text-muted"> {{__('Type movie name to see the list. Like "The Shawshank Redemption"')}}
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4 pt-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Custom Look')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input class='customLook' value='{{__('some.name@website.com')}}'>
                                                <button type="button">+</button>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4 pt-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Outside of the box')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input name='tags-outside' class='form-control tagify--outside' value='css, html, javascript' placeholder='{{__('write some tags')}}'>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4 mt-5 pt-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Readonly Mode')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <input name='tags4' readonly value='tag1, tag 2, another tag'>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">{{__('Custom Tag Color')}}</label>
                                            <div class="col-lg-6 col-md-9 col-sm-12 custom-tag-color">
                                                <input name='basic2' value='{{__('Tag 1, Tag 2, Big Tag')}}' class='form-control'>
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
    {!! Html::script('plugins/tagify/tagify.min.js') !!}
    {!! Html::script('assets/js/forms/custom-tagify.js') !!}
@endpush

@push('custom-scripts')

@endpush
