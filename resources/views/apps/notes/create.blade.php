@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/apps/notes.css') !!}
    {!! Html::style('assets/css/forms/theme-checkbox-radio.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('Notes')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Create Note')}}</span></li>
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
        <div class="row app-notes layout-top-spacing" id="cancel-row">
            <div class="col-lg-12">
                <div class="app-hamburger-container">
                    <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
                </div>
                <div class="app-container">
                    <div class="card-box">
                        <div class="app-note-container">
                            <div class="app-note-overlay"></div>
                            <div class="tab-title">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12 text-center">
                                        <a href="{{ url('/apps/notes/list') }}" id="btn-add-notes" class="ripple-button m-auto ripple-button-primary btn-sm text-white font-12" type="button">
                                            <div class="ripple-ripple js-ripple">
                                                <span class="ripple-ripple__circle"></span>
                                            </div>
                                            <i class="las la-arrow-left"></i> {{__('Back')}}
                                        </a>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-12 mt-4">
                                        <ul class="nav nav-pills d-block" id="pills-tab3" role="tablist">
                                            <li class="nav-item">
                                                <a href="{{ url('/apps/notes/list') }}" class="nav-link list-actions" id="all-notes"><i class="las la-pen-nib mr-2 font-17"></i> {{__('All Notes')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('/apps/notes/list') }}" class="nav-link list-actions" id="note-fav"><i class="las la-star mr-2 font-17"></i> {{__('Favourites')}}</a>
                                            </li>
                                        </ul>
                                        <hr/>
                                        <p class="label-section"> {{__('Labels')}}</p>
                                        <ul class="nav nav-pills d-block group-list" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link list-actions g-dot-primary"> {{__('Blue')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list-actions g-dot-warning"> {{__('Yellow')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list-actions g-dot-success"> {{__('Purple')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list-actions g-dot-danger"> {{__('Red')}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div id="ct" class="note-container note-grid create-note ml-3 pr-1">
                                <div class="note-options mb-3">
                                    <a title="{{__('Archive')}}" data-placement="bottom"  class="s-o font-19 mr-2 ml-3 pointer pt-1 bs-tooltip"><i class="las la-archive"></i></a>
                                    <a title="{{__('Pinned')}}" data-placement="bottom"  class="s-o font-19 mr-2 ml-2 pointer pt-1 bs-tooltip"><i class="las la-thumbtack"></i></a>
                                    <a title="{{__('Set Reminder')}}" data-placement="bottom"  class="s-o font-19 mr-2 ml-2 pointer pt-1 bs-tooltip"><i class="las la-stopwatch"></i></a>
                                    <a title="{{__('Delete')}}" data-placement="bottom"  class="s-o font-19 mr-2 ml-2 pointer pt-1 bs-tooltip"><i class="lar la-trash-alt"></i></a>
                                    <a title="{{__('Labels')}}" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true" class="s-o font-19 mr-0 ml-2 pointer pt-1 bs-tooltip"><i class="las la-tag"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right notes-dropdown">
                                        <a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-primary" href="javascript:void(0);"> {{__('Blue')}}</a>
                                        <a class="note-work label-group-item label-work dropdown-item position-relative g-dot-warning" href="javascript:void(0);"> {{__('Yellow')}}</a>
                                        <a class="note-social label-group-item label-social dropdown-item position-relative g-dot-success" href="javascript:void(0);"> {{__('Purple')}}</a>
                                        <a class="note-important label-group-item label-important dropdown-item position-relative g-dot-danger" href="javascript:void(0);"> {{__('Red')}}</a>
                                    </div>
                                </div>
                                <div class="d-flex align-center w-100">
                                    <div class="d-flex align-center w-100">
                                        <!-- <a class="mr-4">Title</a> -->
                                        <div class="form-group mb-0 w-100">
                                            <input type="text" class="form-control" placeholder="{{__('Enter Note Title')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="create-note-container mt-4">
                                            <textarea id="demo1"> {{__('To view the exact changes click on eye icon in the toolbar.')}}
                                            </textarea>
                                </div>
                                <div class="d-flex align-center justify-content-end mt-4">
                                    <a class="btn btn-sm btn-primary"> {{__('Save')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="notesMailModal" tabindex="-1" role="dialog" aria-labelledby="notesMailModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                <div class="notes-box">
                                    <div class="notes-content">
                                        <form action="javascript:void(0);" id="notesMailModalTitle">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="d-flex note-title">
                                                        <input type="text" id="n-title" class="form-control" maxlength="25" placeholder="{{__('Title')}}">
                                                    </div>
                                                    <span class="validation-text"></span>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="d-flex note-description">
                                                        <textarea id="n-description" class="form-control" maxlength="60" placeholder="{{__('Description')}}" rows="3"></textarea>
                                                    </div>
                                                    <span class="validation-text"></span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="btn-n-save" class="float-left btn"> {{__('Save')}}</button>
                                <button class="btn" data-dismiss="modal"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> {{__('Discard')}}</button>
                                <button id="btn-n-add" class="btn"> {{__('Add')}}</button>
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
    {!! Html::script('plugins/editors/markdown/simplemde.min.js') !!}
    {!! Html::script('assets/js/apps/notes.js') !!}
    {!! Html::script('plugins/editors/markdown/custom-markdown.js') !!}
@endpush

@push('custom-scripts')

@endpush
