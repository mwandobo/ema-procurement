@extends('layout.master')

@push('plugin-styles')
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Clipboard')}}</span></li>
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
                                                <h4>{{__('Basic Clipboard')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <label class="col-md-3 d-flex align-items-center mb-0">{{__('Type and copy')}}</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="clipboard_1" placeholder="{{__('Type some value to copy')}}">
                                                    <div class="input-group-append">
                                                        <a href="#" class="btn btn-soft-primary" data-clipboard="true" data-clipboard-target="#clipboard_1">
                                                            <i class="la la-copy"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-4">
                                            <label class="col-md-3">{{__('Textarea copy')}}</label>
                                            <div class="col-md-9 text-right">
                                                <textarea class="form-control" id="clipboard_2" rows="6">{{__('Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga.')}}</textarea>
                                                <div class="mt-2"></div>
                                                <a href="#" class="btn btn-sm btn-primary" data-clipboard="true" data-clipboard-target="#clipboard_2">{{__('Copy to clipboard')}}</a>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-4">
                                            <label class="col-md-3">{{__('Cut from textarea')}}</label>
                                            <div class="col-md-9 text-right">
                                                <textarea class="form-control" id="clipboard_3" rows="6">{{__('Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga.')}}</textarea>
                                                <div class="mt-2"></div>
                                                <a href="#" class="btn btn-sm btn-primary" data-clipboard="true" data-clipboard-action="cut" data-clipboard-target="#clipboard_3">{{__('Cut to clipboard')}}</a>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-4">
                                            <label class="col-md-3">{{__('Copy from a div')}}</label>
                                            <div class="col-md-9 text-right">
                                                <div id="clipboard_4" class="rounded bg-light-dark p-3 text-left">{{__('Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis,nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga.')}}  </div>
                                                <div class="mt-2"></div>
                                                <a href="#" class="btn btn-sm btn-primary" data-clipboard="true" data-clipboard-target="#clipboard_4">{{__('Copy to clipboard')}}</a>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-4">
                                            <label class="col-md-3 mb-0 d-flex align-center">{{__('Copy hidden text')}}</label>
                                            <div class="col-md-9">
                                                <a href="#" class="btn btn-sm btn-primary" data-clipboard-text="{{__('Forms')}}You have just copied a hidden text">{{__('Copy')}}</a>
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
    <script>
        $(document).ready(function() {
            App.init();
            var clipboard = new ClipboardJS('.btn');
            clipboard.on('success', function(e) {
                console.log(e);
                alert('Done!');
            });
            clipboard.on('error', function(e) {
                console.log(e);
                alert('Not Copied!');
            });
        });
    </script>
    {!! Html::script('plugins/clipboard-js/clipboard.min.js') !!}
@endpush

@push('custom-scripts')

@endpush
