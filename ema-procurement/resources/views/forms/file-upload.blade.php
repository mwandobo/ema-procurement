@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/forms/form-widgets.css') !!}
    {!! Html::style('assets/css/forms/file-upload.css') !!}
    {!! Html::style('plugins/dropzone/dropzone.min.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Forms')}}File Upload</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Starts / Breadcrumb Area  -->
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
                                                <h4>{{__('Forms')}}File Input</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="attached-files">
                                                    <img id="image-preview" width="320">
                                                </div>
                                                <label for="file-upload" class="custom-file-upload mb-0">
                                                    <a title="Attach a file" class="mr-2 pointer text-primary">
                                                        <i class="las la-paperclip font-20"></i>
                                                        <span class="font-17">{{__('Forms')}}Click here to attach an image</span>
                                                    </a>
                                                </label>
                                                <input id="file-upload" name='upload_cont_img' type="file" accept="image/*" style="display:none;" onchange="handleFileChange()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Forms')}}Dropzone</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div id="dropzone">
                                                    <form action="/upload" class="dropzone needsclick dz-clickable" id="demo-upload">
                                                        <div class="dz-message needsclick">
                                                            <button type="button" class="dz-button">{{__('Forms')}}Drop files here or click to upload.</button>
                                                            <br>
                                                            <span class="note needsclick">{{__('Forms')}}(This is just a demo dropzone. Selected files are <strong>not</strong> {{__('Forms')}}actually uploaded.)</span>
                                                        </div>
                                                    </form>
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
    {!! Html::script('assets/js/forms/file-upload.js') !!}
    {!! Html::script('plugins/dropzone/dropzone.min.jss') !!}
@endpush

@push('custom-scripts')

@endpush
