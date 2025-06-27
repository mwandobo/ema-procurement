@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/editors/quill/quill.snow.css') !!}
    {!! Html::style('plugins/editors/markdown/simplemde.min.css') !!}
@endpush

@push('style')
    <style>
        .editor-toolbar.fullscreen, .CodeMirror-fullscreen {
            z-index: 99999;
        }
    </style>
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Forms')}}Text Editor</span></li>
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
                                                <h4>{{__('Forms')}}Markdown Editor</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="">
                                                    <textarea id="demo1" placeholder="{{__('Forms')}}Type anything. Add some style then press eye button to see."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-footer text-right">
                                        <button type="reset" class="btn btn-primary mr-2">{{__('Forms')}}Submit</button>
                                        <button type="reset" class="btn btn-outline-primary">{{__('Forms')}}Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Forms')}}Quill Editor</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div id="editor">
                                                    <p>{{__('Forms')}}Hello World!</p>
                                                    <p>{{__('Forms')}}Some initial <strong>bold</strong> {{__('Forms')}}text</p>
                                                    <p><br></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-footer text-right">
                                        <button type="reset" class="btn btn-primary mr-2">{{__('Forms')}}Submit</button>
                                        <button type="reset" class="btn btn-outline-primary">{{__('Forms')}}Cancel</button>
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
    {!! Html::script('plugins/editors/quill/quill.js') !!}
    {!! Html::script('plugins/editors/markdown/simplemde.min.js') !!}
    {!! Html::script('assets/js/forms/forms-text-editor.js') !!}
@endpush

@push('custom-scripts')

@endpush
