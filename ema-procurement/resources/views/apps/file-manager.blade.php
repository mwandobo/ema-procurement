@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/apps/file-manager.css') !!}
    {!! Html::style('assets/css/elements/tooltip.css') !!}
    {!! Html::style('plugins/bootstrap-select/bootstrap-select.min.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('File Manager')}}</span></li>
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
                        <div class="card-box file-manager">
                            <div class="file-manager-left">
                                <a href="#" class="ripple-button m-auto ripple-button-primary btn-sm text-white font-12" type="button">
                                    <div class="ripple-ripple js-ripple">
                                        <span class="ripple-ripple__circle"></span>
                                    </div>
                                    <i class="las la-upload"></i> {{__('Upload New File')}}
                                </a>
                                <div class="file-manager-list mt-4">
                                    <a href="javascript: void(0);">
                                        <i class="las la-inbox mr-2 font-17"></i>
                                        {{__('My Space')}}<span class="badge badge-primary ml-auto">7</span>
                                    </a>
                                    <a href="javascript: void(0);">
                                        <i class="las la-file-upload mr-2 font-17"></i> {{__('Uploaded Files')}}
                                    </a>
                                    <a href="javascript: void(0);">
                                        <i class="las la-users mr-2 font-17"></i>
                                        {{__('Shared with me')}}
                                        <span class="badge badge-primary ml-auto">2</span>
                                    </a>
                                    <a href="javascript: void(0);">
                                        <i class="lar la-clock mr-2 font-17"></i> {{__('Recent')}}
                                    </a>
                                    <a href="javascript: void(0);">
                                        <i class="las la-star mr-2 font-17"></i> {{__('Starred')}}
                                    </a>
                                    <a href="javascript: void(0);">
                                        <i class="las la-trash mr-2 font-17"></i> {{__('Trash')}}
                                    </a>
                                    <a href="javascript: void(0);">
                                        <i class="las la-history mr-2 font-17"></i> {{__('Backups')}}
                                    </a>
                                </div>
                                <div class="position-relative">
                                    <h6 class="mt-3 file-manager-label"> {{__('Storage Details')}}<span>&nbsp;</span></h6>
                                </div>
                                <div class="list-group b-0 mail-list mt-4">
                                    <div class="flex-grow-1 pl-2 pr-2 text-left mb-3">
                                        <span class="font-13"><small class="font-15 text-light-black strong mr-2"><i class="lar la-hdd"></i></small>{{__('Total Storage')}}</span>
                                        <div class="progress progress-sm mt-1 mb-1">
                                            <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="75" style="width:75%"></div>
                                        </div>
                                        <span class="font-10 text-muted"> {{__('750 MB of 1GB')}}</span>
                                    </div>
                                    <div class="flex-grow-1 pl-2 pr-2 text-left">
                                        <span class="font-13"><small class="font-15 text-light-black strong mr-2"><i class="lar la-image"></i></small>{{__('Images')}}</span>
                                        <div class="progress progress-sm mt-1 mb-1">
                                            <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="10" style="width:10%"></div>
                                        </div>
                                        <span class="font-10 text-muted">{{__('110 MB of 1GB')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="file-manager-right">
                                <div class="file-manager-right-top align-items-start row mb-3">
                                    <div class="col-md-6 col-sm-6 d-flex align-center">
                                        <a class="mr-2 font-19 text-dark stronger">{{__('Create a folder')}}</a>
                                        <i id="addFolder" class="las la-folder-plus file-manager-icon"></i>
                                    </div>
                                    <div class="col-md-6 col-sm-6 d-flex align-center justify-content-end">
                                        <i class="las la-cog file-manager-icon mr-2"></i>
                                        <i class="las la-clock file-manager-icon" id="fileManagerHistory"></i>
                                    </div>
                                </div>
                                <div class="file-manager-bottom-history mt-4">
                                    <div class="files-table">
                                        <div class="files-t-heading">
                                            <h6>{{__('History')}}</h6>
                                        </div>
                                        <div class="file-t-content">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th><div class="th-content">{{__('File Name')}}</div></th>
                                                        <th><div class="th-content">{{__('Added')}}</div></th>
                                                        <th><div class="th-content">{{__('Modified')}}</div></th>
                                                        <th><div class="th-content">{{__('Size')}}</div></th>
                                                        <th><div class="th-content">{{__('Action')}}</div></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>{{__('Weekly Report.docx')}}</td>
                                                        <td>{{__('Jun 18, 2018')}}</td>
                                                        <td>{{__('Jun 20, 2018')}}</td>
                                                        <td>{{__('2 MB')}}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                                <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{__('Design Checklist.xlsx')}}</td>
                                                        <td>{{__('Jun 17, 2018')}}</td>
                                                        <td>{{__('Jun 19, 2018')}}</td>
                                                        <td>{{__('5.4 MB')}}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                                <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{__('Order Summary.pdf')}}</td>
                                                        <td>{{__('Jun 15, 2018')}}</td>
                                                        <td>{{__('Jun 17, 2018')}}</td>
                                                        <td>{{__('9 MB')}}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                                <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{__('UI Issue.jpg')}}</td>
                                                        <td>{{__('Jun 10, 2018')}}</td>
                                                        <td>{{__('Jun 15, 2018')}}</td>
                                                        <td>{{__('180 KB')}}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                                <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{__('Sample_Image.jpg')}}</td>
                                                        <td>{{__('Jun 4, 2018')}}</td>
                                                        <td>{{__('Jun 13, 2018')}}</td>
                                                        <td>{{__('10 KB')}}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                                <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{__('card.pdf')}}</td>
                                                        <td>{{__('Jun 1, 2018')}}</td>
                                                        <td>{{__('Jun 5, 2018')}}</td>
                                                        <td>{{__('200 KB')}}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                                <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="file-manager-bottom-default">
                                    <div class="file-manager-right-bottom">
                                        <div class="mt-4 d-block">
                                            <div class="">
                                                <h6>{{__('Folders')}}</h6>
                                            </div>
                                            <div class="folder-list">
                                                <div class="folder">
                                                    <p class="main-title">{{__('Shared with')}}</p>
                                                    <div class="d-flex">
                                                        <img src="{{ url('assets/img/profile-6.jpg') }}" class="shared-user"/>
                                                        <img src="{{ url('assets/img/profile-2.jpg') }}" class="shared-user"/>
                                                        <img src="{{ url('assets/img/profile-3.jpg') }}" class="shared-user"/>
                                                        <img src="{{ url('assets/img/profile-4.jpg') }}" class="shared-user"/>
                                                    </div>
                                                    <p class="sub-title">{{__('Folder')}}</p>
                                                    <p class="folder-name">{{__('Project Requirement')}}</p>
                                                </div>
                                                <div class="folder">
                                                    <p class="main-title">{{__('Shared with')}}</p>
                                                    <div class="d-flex">
                                                        <img src="{{ url('assets/img/profile-7.jpg') }}" class="shared-user"/>
                                                        <img src="{{ url('assets/img/profile-8.jpg') }}" class="shared-user"/>
                                                    </div>
                                                    <p class="sub-title">{{__('Folder')}}</p>
                                                    <p class="folder-name">{{__('Design Samples')}}</p>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <h6>{{__('Quick access files')}}</h6>
                                            </div>
                                            <div class="file-list">
                                                <div class="file pdf">
                                                    <i class="lar la-file-pdf file-icon"></i>
                                                    <div>
                                                        <p class="main-title">{{__('Design Specification')}}</p>
                                                        <p class="sub-title">{{__('Last Modified')}}</p>
                                                        <p class="date">{{__('20 Aug 2020')}}</p>
                                                    </div>
                                                </div>
                                                <div class="file doc">
                                                    <i class="lar la-file-word file-icon"></i>
                                                    <div>
                                                        <p class="main-title">{{__('Project Requirement')}}</p>
                                                        <p class="sub-title">{{__('Last Modified')}}</p>
                                                        <p class="date">{{__('20 Aug 2020')}}</p>
                                                    </div>
                                                </div>
                                                <div class="file xlsx">
                                                    <i class="lar la-file-excel file-icon"></i>
                                                    <div>
                                                        <p class="main-title">{{__('2020 Order Summary')}}</p>
                                                        <p class="sub-title">{{__('Last Modified')}}</p>
                                                        <p class="date">{{__('20 Aug 2020')}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 layout-spacing">
                                        <div class="files-table">
                                            <div class="files-t-heading">
                                                <h6 class="mb-0">{{__('All Files')}}</h6>
                                                <div class="search">
                                                    <i class="las la-search toggle-search"></i>
                                                    <form class="form-inline search-full form-inline search" role="search">
                                                        <div class="search-bar">
                                                            <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="{{__('Search Files')}}">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="file-t-content">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th><div class="th-content">{{__('Name')}}</div></th>
                                                            <th><div class="th-content">{{__('Owners')}}</div></th>
                                                            <th><div class="th-content">{{__('Modified')}}</div></th>
                                                            <th><div class="th-content">{{__('Size')}}</div></th>
                                                            <th><div class="th-content">{{__('Action')}}</div></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>{{__('Weekly Report.docx')}}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="javascript:void(0);" class="bs-tooltip" title="{{__('Hi')}}Jeremy Lawson"><img src="{{ url('assets/img/profile-4.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                                    <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="{{__('Hi')}}Dino Morea"><img src="{{ url('assets/img/profile-5.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                                </div>
                                                            </td>
                                                            <td>{{__('Jun 20, 2018')}}</td>
                                                            <td>{{__('2 MB')}}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                                    <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{__('Design Checklist.xlsx')}}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="javascript:void(0);" class="bs-tooltip" title="Shin Kyrien"><img src="{{ url('assets/img/profile-9.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                                </div>
                                                            </td>
                                                            <td>{{__('Jun 19, 2018')}}</td>
                                                            <td>{{__('5.4 MB')}}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                                    <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{__('Order Summary.pdf')}}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="javascript:void(0);" class="bs-tooltip" title="Bolor Johnson"><img src="{{ url('assets/img/profile-19.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                                </div>
                                                            </td>
                                                            <td>{{__('Jun 17, 2018')}}</td>
                                                            <td>{{__('9 MB')}}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                                    <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{__('UI Issue.jpg')}}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="javascript:void(0);" class="bs-tooltip" title="{{__('Rahul Nadella')}}"><img src="{{ url('assets/img/profile-21.jpg') }}" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                                                </div>
                                                            </td>
                                                            <td>{{__('Jun 15, 2018')}}</td>
                                                            <td>{{__('180 KB')}}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="" data-original-title="{{__('Edit')}}"><i class="las la-pen"></i></a>
                                                                    <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="" data-original-title="{{__('Delete')}}"><i class="las la-trash"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Create a folder Modal -->
                        <div class="modal fade" id="addFolderModal" tabindex="-1" role="dialog" aria-labelledby="addFolderModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <i class="las la-times"  data-dismiss="modal"></i>
                                        <div class="compose-box">
                                            <div class="compose-content" id="addFolderModalTitle">
                                                <h5 class="">{{__('Create a folder')}}</h5>
                                                <form>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="d-flex mail-to mb-4">
                                                                <div class="w-100">
                                                                    <input id="task" type="text" placeholder="Folder name" class="form-control" name="task">
                                                                    <span class="validation-text"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mb-4">
                                                        <div class="w-100">
                                                            <select class="selectpicker w-100" multiple data-max-options="3" title="{{__('Share this folder with')}}">
                                                                <option>{{__('Jeremy Lawson')}}</option>
                                                                <option>{{__('Dino Morea')}}</option>
                                                                <option>{{__('Bolor Johnson')}}</option>
                                                                <option>{{__('Nadel Pichungso')}}</option>
                                                                <option>{{__('Andy Flower')}}</option>
                                                                <option>{{__('Heath Streak')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="w-100 mb-4 text-right">
                                                        <form>
                                                            <label for="file-upload" class="custom-file-upload mb-0">
                                                                <a title="{{__('Attach a file')}}" class="btn btn-sm btn-primary  mr-2 pointer ">
                                                                    {{__('Add files')}}
                                                                </a>
                                                            </label>
                                                            <input id="file-upload" name='upload_cont_img' type="file" style="display:none;">
                                                        </form>
                                                    </div>
                                                    <div class="d-flex mb-4">
                                                        <div class="w-100">
                                                            <div class="">
                                                                <div class="card mb-1 shadow-none border border-light">
                                                                    <div class="p-2">
                                                                        <div class="row align-items-center">
                                                                            <div class="col-auto">
                                                                                <div class="avatar-sm">
                                                                                            <span class="avatar-sm background-success-teal text-white rounded d-flex align-center justify-content-center">
                                                                                                .JPG
                                                                                            </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col pl-0">
                                                                                <a href="javascript:void(0);" class="text-success-teal strong">{{__('design-changes.jpg')}}</a>
                                                                                <p class="mb-0">3.25 MB</p>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <!-- Button -->
                                                                                <a href="javascript:void(0);" class="font-25 text-danger mr-2">
                                                                                    <i class="las la-times-circle"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button class="btn btn-sm btn-danger" data-dismiss="modal">{{__('Close')}}</button>
                                        <button class="btn btn-sm btn-primary">{{__('Create')}}</button>
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
    {!! Html::script('assets/js/apps/file-manager.js') !!}
    {!! Html::script('plugins/bootstrap-select/bootstrap-select.min.js') !!}
@endpush

@push('custom-scripts')

@endpush
