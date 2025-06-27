@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/apps/notes.css') !!}
    {!! Html::style('assets/css/forms/theme-checkbox-radio.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('List')}}</span></li>
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
                                        <a href="apps_notes_create.html" id="btn-add-notes" class="ripple-button m-auto ripple-button-primary btn-sm text-white font-12" type="button">
                                            <div class="ripple-ripple js-ripple">
                                                <span class="ripple-ripple__circle"></span>
                                            </div>
                                            <i class="las la-pen-nib"></i> {{__('Create new note')}}
                                        </a>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-12 mt-4">
                                        <ul class="nav nav-pills d-block" id="pills-tab3" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link list-actions active" id="all-notes"><i class="las la-pen-nib mr-2 font-17"></i> {{__('All Notes')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list-actions" id="note-fav"><i class="las la-star mr-2 font-17"></i> {{__('Favourites')}}</a>
                                            </li>
                                        </ul>
                                        <hr/>
                                        <p class="label-section"> {{__('Labels')}}</p>
                                        <ul class="nav nav-pills d-block group-list" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link list-actions g-dot-primary" id="note-personal"> {{__('Blue')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list-actions g-dot-warning" id="note-work"> {{__('Yellow')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list-actions g-dot-success" id="note-social"> {{__('Purple')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list-actions g-dot-danger" id="note-important"> {{__('Red')}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div id="ct" class="note-container note-grid">
                                <div class="note-item all-notes note-personal">
                                    <div class="note-inner-content">
                                        <div class="note-content">
                                            <p class="note-title" data-noteTitle=" {{__('Apps')}}Meeting with Kelly"> {{__('This month expense')}}</p>
                                            <p class="meta-time"> {{__('11/01/2019')}}</p>
                                            <div class="note-description-content">
                                                <p class="note-description" data-noteDescription="{{__('Curabitur facilisis vel elit sed dapibus sodales purus rhoncus.')}}"> {{__('Many desktop publishing packages and web page editors.')}}</p>
                                            </div>
                                        </div>
                                        <div class="note-action">
                                            <i class="lar la-star font-20 text-muted fav-note"></i>
                                            <i class="lar la-trash-alt font-20 text-muted delete-note"></i>
                                        </div>
                                        <div class="note-footer">
                                            <div class="tags-selector btn-group">
                                                <a class="nav-link dropdown-toggle d-icon label-group" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                                    <div class="tags">
                                                        <div class="g-dot-personal"></div>
                                                        <div class="g-dot-work"></div>
                                                        <div class="g-dot-social"></div>
                                                        <div class="g-dot-important"></div>
                                                        <i class="las la-ellipsis-v font-20"></i>
                                                    </div>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                                    <a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-personal" href="javascript:void(0);"> {{__('Blue')}}</a>
                                                    <a class="note-work label-group-item label-work dropdown-item position-relative g-dot-work" href="javascript:void(0);"> {{__('Yellow')}}</a>
                                                    <a class="note-social label-group-item label-social dropdown-item position-relative g-dot-social" href="javascript:void(0);"> {{__('Purple')}}</a>
                                                    <a class="note-important label-group-item label-important dropdown-item position-relative g-dot-important" href="javascript:void(0);"> {{__('Red')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="note-item all-notes note-fav">
                                    <div class="note-inner-content">
                                        <div class="note-content">
                                            <p class="note-title" data-noteTitle="Admin Goals"> {{__('Admin Goals')}}</p>
                                            <p class="meta-time"> {{__('11/01/2019')}}</p>
                                            <div class="note-description-content">
                                                <p class="note-description" data-noteDescription="{{__('Curabitur facilisis vel elit sed dapibus sodales purus.')}}"> {{__('Facilisis curabitur facilisis vel elit sed dapibus sodales purus.')}}</p>
                                            </div>
                                        </div>
                                        <div class="note-action">
                                            <i class="lar las la-star font-20 text-muted fav-note"></i>
                                            <i class="lar la-trash-alt font-20 text-muted delete-note"></i>
                                        </div>
                                        <div class="note-footer">
                                            <div class="tags-selector btn-group">
                                                <a class="nav-link dropdown-toggle d-icon label-group" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                                    <div class="tags">
                                                        <div class="g-dot-personal"></div>
                                                        <div class="g-dot-work"></div>
                                                        <div class="g-dot-social"></div>
                                                        <div class="g-dot-important"></div>
                                                        <i class="las la-ellipsis-v font-20"></i>
                                                    </div>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                                    <a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-personal" href="javascript:void(0);"> {{__('Blue')}}</a>
                                                    <a class="note-work label-group-item label-work dropdown-item position-relative g-dot-work" href="javascript:void(0);"> {{__('Yellow')}}</a>
                                                    <a class="note-social label-group-item label-social dropdown-item position-relative g-dot-social" href="javascript:void(0);"> {{__('Purple')}}</a>
                                                    <a class="note-important label-group-item label-important dropdown-item position-relative g-dot-important" href="javascript:void(0);"> {{__('Red')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="note-item all-notes note-work">
                                    <div class="note-inner-content">
                                        <div class="note-content">
                                            <p class="note-title" data-noteTitle="Imporant Infomation"> {{__('This week notes')}}</p>
                                            <p class="meta-time"> {{__('11/04/2019')}}</p>
                                            <div class="note-description-content">
                                                <p class="note-description" data-noteDescription="{{__('Proin a dui malesuada, laoreet mi vel, imperdiet diam quam laoreet.')}}"> {{__('On the other hand, we denounce with righteous indignation and dislike men')}}</p>
                                            </div>
                                        </div>
                                        <div class="note-action">
                                            <i class="lar la-star font-20 text-muted fav-note"></i>
                                            <i class="lar la-trash-alt font-20 text-muted delete-note"></i>
                                        </div>
                                        <div class="note-footer">
                                            <div class="tags-selector btn-group">
                                                <a class="nav-link dropdown-toggle d-icon label-group" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                                    <div class="tags">
                                                        <div class="g-dot-personal"></div>
                                                        <div class="g-dot-work"></div>
                                                        <div class="g-dot-social"></div>
                                                        <div class="g-dot-important"></div>
                                                        <i class="las la-ellipsis-v font-20"></i>
                                                    </div>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                                    <a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-personal" href="javascript:void(0);"> {{__('Apps')}}Blue</a>
                                                    <a class="note-work label-group-item label-work dropdown-item position-relative g-dot-work" href="javascript:void(0);"> {{__('Apps')}}Yellow</a>
                                                    <a class="note-social label-group-item label-social dropdown-item position-relative g-dot-social" href="javascript:void(0);"> {{__('Apps')}}Purple</a>
                                                    <a class="note-important label-group-item label-important dropdown-item position-relative g-dot-important" href="javascript:void(0);"> {{__('Apps')}}Red</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="note-item all-notes">
                                    <div class="note-inner-content">
                                        <div class="note-content">
                                            <p class="note-title" data-noteTitle="{{__('Meeting Scheduled at 4:50pm')}}">{{__('Party after office')}}</p>
                                            <p class="meta-time">{{__('11/08/2019')}}</p>
                                            <div class="note-description-content">
                                                <p class="note-description" data-noteDescription="{{__('Excepteur sint occaecat cupidatat non proident, anim id est laborum.')}}"> {{__('Again is there anyone who loves or pursues or desires to obtain pain of itself.')}}</p>
                                            </div>
                                        </div>
                                        <div class="note-action">
                                            <i class="lar la-star font-20 text-muted fav-note"></i>
                                            <i class="lar la-trash-alt font-20 text-muted delete-note"></i>
                                        </div>
                                        <div class="note-footer">
                                            <div class="tags-selector btn-group">
                                                <a class="nav-link dropdown-toggle d-icon label-group" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                                    <div class="tags">
                                                        <div class="g-dot-personal"></div>
                                                        <div class="g-dot-work"></div>
                                                        <div class="g-dot-social"></div>
                                                        <div class="g-dot-important"></div>
                                                        <i class="las la-ellipsis-v font-20"></i>
                                                    </div>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                                    <a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-personal" href="javascript:void(0);"> {{__('Blue')}}</a>
                                                    <a class="note-work label-group-item label-work dropdown-item position-relative g-dot-work" href="javascript:void(0);"> {{__('Yellow')}}</a>
                                                    <a class="note-social label-group-item label-social dropdown-item position-relative g-dot-social" href="javascript:void(0);"> {{__('Purple')}}</a>
                                                    <a class="note-important label-group-item label-important dropdown-item position-relative g-dot-important" href="javascript:void(0);"> {{__('Red')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="note-item all-notes">
                                    <div class="note-inner-content">
                                        <div class="note-content">
                                            <p class="note-title" data-noteTitle="{{__('Backup Files EOD')}}"> {{__('Upload files to cloud')}}</p>
                                            <p class="meta-time"> {{__('11/09/2019')}}</p>
                                            <div class="note-description-content">
                                                <p class="note-description" data-noteDescription="{{__('Maecenas condimentum neque mollis, egestas leo ut, gravida.')}}"> {{__('Again is there anyone who loves or pursues or desires to obtain pain of itself.')}}</p>
                                            </div>
                                        </div>
                                        <div class="note-action">
                                            <i class="lar la-star font-20 text-muted fav-note"></i>
                                            <i class="lar la-trash-alt font-20 text-muted delete-note"></i>
                                        </div>
                                        <div class="note-footer">
                                            <div class="tags-selector btn-group">
                                                <a class="nav-link dropdown-toggle d-icon label-group" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                                    <div class="tags">
                                                        <div class="g-dot-personal"></div>
                                                        <div class="g-dot-work"></div>
                                                        <div class="g-dot-social"></div>
                                                        <div class="g-dot-important"></div>
                                                        <i class="las la-ellipsis-v font-20"></i>
                                                    </div>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                                    <a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-personal" href="javascript:void(0);"> {{__('Blue')}}</a>
                                                    <a class="note-work label-group-item label-work dropdown-item position-relative g-dot-work" href="javascript:void(0);"> {{__('Yellow')}}</a>
                                                    <a class="note-social label-group-item label-social dropdown-item position-relative g-dot-social" href="javascript:void(0);"> {{__('Purple')}}</a>
                                                    <a class="note-important label-group-item label-important dropdown-item position-relative g-dot-important" href="javascript:void(0);"> {{__('Red')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="note-item all-notes note-social">
                                    <div class="note-inner-content">
                                        <div class="note-content">
                                            <p class="note-title" data-noteTitle="{{__('Download Server Logs')}}"> {{__('Send mail to sever Maintanence')}}</p>
                                            <p class="meta-time"> {{__('11/09/2019')}}</p>
                                            <div class="note-description-content">
                                                <p class="note-description" data-noteDescription="{{__('Suspendisse efficitur diam quis gravida. Nunc molestie est eros.')}}"> {{__('Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,')}}</p>
                                            </div>
                                        </div>
                                        <div class="note-action">
                                            <i class="lar la-star font-20 text-muted fav-note"></i>
                                            <i class="lar la-trash-alt font-20 text-muted delete-note"></i>
                                        </div>
                                        <div class="note-footer">
                                            <div class="tags-selector btn-group">
                                                <a class="nav-link dropdown-toggle d-icon label-group" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                                    <div class="tags">
                                                        <div class="g-dot-personal"></div>
                                                        <div class="g-dot-work"></div>
                                                        <div class="g-dot-social"></div>
                                                        <div class="g-dot-important"></div>
                                                        <i class="las la-ellipsis-v font-20"></i>
                                                    </div>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                                    <a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-personal" href="javascript:void(0);"> {{__('Blue')}}</a>
                                                    <a class="note-work label-group-item label-work dropdown-item position-relative g-dot-work" href="javascript:void(0);"> {{__('Yellow')}}</a>
                                                    <a class="note-social label-group-item label-social dropdown-item position-relative g-dot-social" href="javascript:void(0);"> {{__('Purple')}}</a>
                                                    <a class="note-important label-group-item label-important dropdown-item position-relative g-dot-important" href="javascript:void(0);"> {{__('Red')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="note-item all-notes note-important">
                                    <div class="note-inner-content">
                                        <div class="note-content">
                                            <p class="note-title" data-noteTitle=" {{__('Create new users Profile')}}"> {{__('Change profile picture')}}</p>
                                            <p class="meta-time"> {{__('11/10/2019')}}</p>
                                            <div class="note-description-content">
                                                <p class="note-description" data-noteDescription="{{__('Duis aute irure dolor in voluptate nulla pariatur.')}}"> {{__('There are many variations of passages of Lorem Ipsum available, but the majority')}}</p>
                                            </div>
                                        </div>
                                        <div class="note-action">
                                            <i class="lar la-star font-20 text-muted fav-note"></i>
                                            <i class="lar la-trash-alt font-20 text-muted delete-note"></i>
                                        </div>
                                        <div class="note-footer">
                                            <div class="tags-selector btn-group">
                                                <a class="nav-link dropdown-toggle d-icon label-group" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                                    <div class="tags">
                                                        <div class="g-dot-personal"></div>
                                                        <div class="g-dot-work"></div>
                                                        <div class="g-dot-social"></div>
                                                        <div class="g-dot-important"></div>
                                                        <i class="las la-ellipsis-v font-20"></i>
                                                    </div>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                                    <a class="note-personal label-group-item label-personal dropdown-item position-relative g-dot-personal" href="javascript:void(0);"> {{__('Blue')}}</a>
                                                    <a class="note-work label-group-item label-work dropdown-item position-relative g-dot-work" href="javascript:void(0);"> {{__('Yellow')}}</a>
                                                    <a class="note-social label-group-item label-social dropdown-item position-relative g-dot-social" href="javascript:void(0);"> {{__('Purple')}}</a>
                                                    <a class="note-important label-group-item label-important dropdown-item position-relative g-dot-important" href="javascript:void(0);"> {{__('Red')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    {!! Html::script('assets/js/ie11fix/fn.fix-padStart.js') !!}
    {!! Html::script('assets/js/apps/notes.js') !!}
@endpush

@push('custom-scripts')

@endpush
