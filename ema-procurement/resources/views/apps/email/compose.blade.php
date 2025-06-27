@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/apps/mailbox.css') !!}
    {!! Html::style('assets/css/elements/tooltip.css') !!}
    {!! Html::style('plugins/editors/markdown/simplemde.min.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area Starts -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('Apps')}}</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('Email')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Compose Email')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area Ends -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-xl-12  col-md-12">
                        <div class="card-box email-inbox">
                            <div class="email-left">
                                <a href="apps_mail.html" class="ripple-button m-auto ripple-button-primary btn-sm text-white font-12" type="button">
                                    <div class="ripple-ripple js-ripple">
                                        <span class="ripple-ripple__circle"></span>
                                    </div>
                                    <i class="las la-arrow-left"></i> {{__('Back to Inbox')}}
                                </a>
                                <div class="email-list mt-4">
                                    <a href="apps_mail.html">
                                        <i class="las la-inbox mr-2 font-17"></i>
                                        {{__('Inbox')}}<span class="badge badge-primary ml-auto">7</span>
                                    </a>
                                    <a href="javascript: void(0);">
                                        <i class="las la-star mr-2 font-17"></i> {{__('Starred')}}
                                    </a>
                                    <a href="javascript: void(0);">
                                        <i class="las la-clipboard-list mr-2 font-17"></i>
                                        Draft
                                        <span class="badge badge-primary ml-auto">2</span>
                                    </a>
                                    <a href="javascript: void(0);">
                                        <i class="lar la-envelope mr-2 font-17"></i> {{__('Sent Mail')}}
                                    </a>
                                    <a href="javascript: void(0);">
                                        <i class="las la-trash mr-2 font-17"></i> {{__('Trash')}}
                                    </a>
                                    <a href="javascript: void(0);">
                                        <i class="las la-tag mr-2 font-17"></i> {{__('Important')}}
                                    </a>
                                    <a href="javascript: void(0);">
                                        <i class="las la-exclamation-circle mr-2 font-17"></i> {{__('Spam')}}
                                    </a>
                                </div>
                                <h6 class="mt-3 email-label"> {{__('Labels')}}</h6>
                                <div class="list-group b-0 mail-list">
                                    <a href="#" class="list-group-item border-0">
                                        <span class="solid-circle badge-info mr-2"></span>
                                        {{__('Project')}}
                                    </a>
                                    <a href="#" class="list-group-item border-0">
                                        <span class="solid-circle badge-success-teal mr-2"></span>
                                        {{__('Web App')}}
                                    </a>
                                    <a href="#" class="list-group-item border-0">
                                        <span class="solid-circle badge-warning mr-2"></span>
                                        {{__('Development')}}
                                    </a>
                                    <a href="#" class="list-group-item border-0">
                                        <span class="solid-circle badge-danger mr-2"></span>
                                        {{__('Expense')}}
                                    </a>
                                    <a href="#" class="list-group-item border-0">
                                        <span class="solid-circle badge-dark mr-2"></span>
                                        {{__('Server')}}
                                    </a>
                                </div>
                            </div>
                            <div class="email-right">
                                <div class="email-right-top flex-column align-items-start">
                                    <div class="d-flex align-center w-100 mb-3">
                                        <div class="d-flex align-center w-100 mr-5">
                                            <a class="mr-2 w-25"> {{__('From')}}</a>
                                            <div class="form-group mb-0 w-75">
                                                <input type="email" class="form-control" placeholder="{{__('Enter sender email')}}">
                                            </div>
                                        </div>
                                        <div class="d-flex align-center w-100 ml-5">
                                            <a class="mr-2 w-25"> {{__('To')}}</a>
                                            <div class="form-group mb-0 w-75">
                                                <input type="email" class="form-control" placeholder="{{__('Enter reciever email')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-center w-100">
                                        <div class="d-flex align-center w-100">
                                            <a class="mr-4"> {{__('Subject')}}</a>
                                            <div class="form-group mb-0 w-100">
                                                <input type="email" class="form-control" placeholder=" {{__('Enter Subject')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="email-right-bottom">
                                    <div class="mt-4 d-block">
                                        <div class="">
                                                    <textarea id="demo1">
# How to write a mail
To view the exact changes click on eye icon in the toolbar.
You can add **bold** and *italic* text, or a link -> [links](https://google.com).
You can use the toolbar, or you can use the shortcuts like `cmd-b` or `ctrl-b`.
## Bullet List
* Point 1
* Point 2
### Numbered List
1. Point 1
2. Point 2
## Attached Image
![Yes](https://cdn0.iconfinder.com/data/icons/icons-unleashed-vol1/256/-desktop.png)
                                                    </textarea>
                                        </div>
                                        <div class="attached-files">
                                        </div>
                                        <div class="d-flex align-center justify-content-end mt-4">
                                            <form>
                                                <label for="file-upload" class="custom-file-upload mb-0">
                                                    <a title="{{__('Attach a file')}}" class="font-20 mr-2 pointer text-primary">
                                                        <i class="las la-paperclip"></i>
                                                    </a>
                                                </label>
                                                <input id="file-upload" name='upload_cont_img' type="file" style="display:none;">
                                            </form>
                                            <a title="Save as draft" class="font-20 mr-2 pointer text-primary">
                                                <i class="las la-save"></i>
                                            </a>
                                            <a class="btn btn-sm btn-primary"> {{__('Send')}}</a>
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
    {!! Html::script('assets/js/apps/custom-mailbox.js') !!}
    {!! Html::script('plugins/editors/markdown/simplemde.min.js') !!}
    {!! Html::script('plugins/editors/markdown/custom-markdown.js') !!}
@endpush

@push('custom-scripts')

@endpush
