@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/editors/quill/quill.snow.css') !!}
    {!! Html::style('assets/css/apps/tasklist.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Task List')}}</span></li>
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
                <div class="mail-box-container">
                    <div class="mail-overlay"></div>
                    <div class="tab-title">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12 d-flex align-center justify-content-between">
                                <h5 class="app-title"> {{__('Task List')}}</h5>
                                <i class="las la-tasks font-25 text-primary"></i>
                            </div>
                            <div class="todoList-sidebar-scroll">
                                <div class="col-md-12 col-sm-12 col-12 mt-4 pl-0 pr-0">
                                    <ul class="nav nav-pills d-block" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link list-actions active" id="all-list" data-toggle="pill" href="#pills-inbox" role="tab" aria-selected="true"> <i class="las la-list font-20 mr-2"></i> {{__('Tasks')}} <span class="todo-badge badge">5</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link list-actions" id="todo-task-done" data-toggle="pill" href="#pills-sentmail" role="tab" aria-selected="false"><i class="lar la-check-circle font-20 mr-2"></i> {{__('Completed')}} <span class="todo-badge badge">1</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link list-actions" id="todo-task-important" data-toggle="pill" href="#pills-important" role="tab" aria-selected="false"><i class="lar la-star font-20 mr-2"></i> {{__('Important')}} <span class="todo-badge badge">2</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link list-actions" id="todo-task-trash" data-toggle="pill" href="#pills-trash" role="tab" aria-selected="false"><i class="lar la-trash-alt font-20 mr-2"></i> {{__('Trash')}}<span class="todo-badge badge">0</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <a class="btn btn-primary" id="addTask" href="#"> {{__('Add a task')}}</a>
                        </div>
                    </div>
                    <div id="todo-inbox" class="accordion todo-inbox">
                        <div class="search">
                            <i class="las la-search toggle-search"></i>
                            <input type="text" class="form-control input-search" placeholder="{{__('Search Here')}}">
                            <i class="las la-bars mail-menu d-lg-none font-20 text-primary"></i>
                        </div>
                        <div class="todo-box">
                            <div id="ct" class="todo-box-scroll">
                                <div class="todo-item all-list">
                                    <div class="todo-item-inner">
                                        <div class="n-chk text-center">
                                            <label class="new-control new-checkbox checkbox-primary">
                                                <input type="checkbox" class="new-control-input inbox-chkbox">
                                                <span class="new-control-indicator"></span>
                                            </label>
                                        </div>
                                        <div class="task-date">
                                            <span>17</span>
                                            <span> {{__('Jun')}}</span>
                                            <span> {{__('2020')}}</span>
                                        </div>
                                        <div class="todo-content">
                                            <h5 class="todo-heading"> {{__('Coordinate with business development')}}</h5>
                                            <p class="todo-text"> {{__('On the other hand, we denounce with righteous indignation and dislike men')}}</p>
                                        </div>
                                        <div class="priority-dropdown custom-dropdown-icon">
                                            <div class="dropdown p-dropdown">
                                                <a class="dropdown-toggle text-danger" href="#" role="button" id="dropdownMenuLink-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i class="las la-tag"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-1">
                                                    <a class="dropdown-item text-danger font-20" href="javascript:void(0);"> {{__('High Priority')}}</a>
                                                    <a class="dropdown-item text-warning font-20" href="javascript:void(0);"> {{__('Medium Priority')}}</a>
                                                    <a class="dropdown-item text-info font-20" href="javascript:void(0);"> {{__('Less Priority')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="action-dropdown custom-dropdown-icon">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle font-20" href="#" role="button" id="dropdownMenuLink-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i class="las la-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-2">
                                                    <a class="edit dropdown-item" href="javascript:void(0);"> {{__('Edit Task')}}</a>
                                                    <a class="important dropdown-item" href="javascript:void(0);"> {{__('Mark Important')}}</a>
                                                    <a class="dropdown-item delete" href="javascript:void(0);"> {{__('Delete Task')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="todo-item all-list">
                                    <div class="todo-item-inner">
                                        <div class="n-chk text-center">
                                            <label class="new-control new-checkbox checkbox-primary">
                                                <input type="checkbox" class="new-control-input inbox-chkbox">
                                                <span class="new-control-indicator"></span>
                                            </label>
                                        </div>
                                        <div class="task-date">
                                            <span>20</span>
                                            <span> {{__('Jun')}}</span>
                                            <span> {{__('2020')}}</span>
                                        </div>
                                        <div class="todo-content">
                                            <h5 class="todo-heading"> {{__('Draft the new contract for the B Team')}}</h5>
                                            <p class="todo-text"> {{__('But I must explain to you how all this mistaken idea of denouncing pleasure')}}</p>
                                        </div>
                                        <div class="priority-dropdown custom-dropdown-icon">
                                            <div class="dropdown p-dropdown">
                                                <a class="dropdown-toggle text-warning" href="#" role="button" id="dropdownMenuLink-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i class="las la-tag"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-1">
                                                    <a class="dropdown-item text-danger font-20" href="javascript:void(0);"> {{__('High Priority')}}</a>
                                                    <a class="dropdown-item text-warning font-20" href="javascript:void(0);"> {{__('Medium Priority')}}</a>
                                                    <a class="dropdown-item text-info font-20" href="javascript:void(0);"> {{__('Less Priority')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="action-dropdown custom-dropdown-icon">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle font-20" href="#" role="button" id="dropdownMenuLink-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i class="las la-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-2">
                                                    <a class="edit dropdown-item" href="javascript:void(0);"> {{__('Edit Task')}}</a>
                                                    <a class="important dropdown-item" href="javascript:void(0);"> {{__('Mark Important')}}</a>
                                                    <a class="dropdown-item delete" href="javascript:void(0);"> {{__('Delete Task')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="todo-item all-list">
                                    <div class="todo-item-inner">
                                        <div class="n-chk text-center">
                                            <label class="new-control new-checkbox checkbox-primary">
                                                <input type="checkbox" class="new-control-input inbox-chkbox">
                                                <span class="new-control-indicator"></span>
                                            </label>
                                        </div>
                                        <div class="task-date">
                                            <span>17</span>
                                            <span> {{__('Jun')}}</span>
                                            <span> {{__('2020')}}</span>
                                        </div>
                                        <div class="todo-content">
                                            <h5 class="todo-heading"> {{__('Server config changes')}}</h5>
                                            <p class="todo-text"> {{__('AWS server again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,')}}</p>
                                        </div>
                                        <div class="priority-dropdown custom-dropdown-icon">
                                            <div class="dropdown p-dropdown">
                                                <a class="dropdown-toggle text-warning" href="#" role="button" id="dropdownMenuLink-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i class="las la-tag"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-1">
                                                    <a class="dropdown-item text-danger font-20" href="javascript:void(0);"> {{__('High Priority')}}</a>
                                                    <a class="dropdown-item text-warning font-20" href="javascript:void(0);"> {{__('Medium Priority')}}</a>
                                                    <a class="dropdown-item text-info font-20" href="javascript:void(0);"> {{__('Less Priority')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="action-dropdown custom-dropdown-icon">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle font-20" href="#" role="button" id="dropdownMenuLink-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i class="las la-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-2">
                                                    <a class="edit dropdown-item" href="javascript:void(0);"> {{__('Edit Task')}}</a>
                                                    <a class="important dropdown-item" href="javascript:void(0);"> {{__('Mark Important')}}</a>
                                                    <a class="dropdown-item delete" href="javascript:void(0);"> {{__('Delete Task')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="todo-item all-list">
                                    <div class="todo-item-inner">
                                        <div class="n-chk text-center">
                                            <label class="new-control new-checkbox checkbox-primary">
                                                <input type="checkbox" checked class="new-control-input inbox-chkbox">
                                                <span class="new-control-indicator"></span>
                                            </label>
                                        </div>
                                        <div class="task-date">
                                            <span>13</span>
                                            <span> {{__('Jun')}}</span>
                                            <span> {{__('2020')}}</span>
                                        </div>
                                        <div class="todo-content">
                                            <h5 class="todo-heading"> {{__('Small Meeting with sales team about product launch')}}</h5>
                                            <p class="todo-text"> {{__('Sales man who chooses to enjoy a pleasure that has no annoying consequences')}}</p>
                                        </div>
                                        <div class="priority-dropdown custom-dropdown-icon">
                                            <div class="dropdown p-dropdown">
                                                <a class="dropdown-toggle text-info" href="#" role="button" id="dropdownMenuLink-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i class="las la-tag"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-1">
                                                    <a class="dropdown-item text-danger font-20" href="javascript:void(0);"> {{__('High Priority')}}</a>
                                                    <a class="dropdown-item text-warning font-20" href="javascript:void(0);"> {{__('Medium Priority')}}</a>
                                                    <a class="dropdown-item text-info font-20" href="javascript:void(0);"> {{__('Less Priority')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="action-dropdown custom-dropdown-icon">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle font-20" href="#" role="button" id="dropdownMenuLink-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i class="las la-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-2">
                                                    <a class="edit dropdown-item" href="javascript:void(0);"> {{__('Edit Task')}}</a>
                                                    <a class="important dropdown-item" href="javascript:void(0);"> {{__('Mark Important')}}</a>
                                                    <a class="dropdown-item delete" href="javascript:void(0);"> {{__('Delete Task')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="todo-item all-list">
                                    <div class="todo-item-inner">
                                        <div class="n-chk text-center">
                                            <label class="new-control new-checkbox checkbox-primary">
                                                <input type="checkbox" class="new-control-input inbox-chkbox">
                                                <span class="new-control-indicator"></span>
                                            </label>
                                        </div>
                                        <div class="task-date">
                                            <span>10</span>
                                            <span> {{__('Jun')}}</span>
                                            <span> {{__('2020')}}</span>
                                        </div>
                                        <div class="todo-content">
                                            <h5 class="todo-heading"> {{__('Make product wireframe for the design team')}}</h5>
                                            <p class="todo-text"> {{__('These cases are perfectly simple and easy to distinguish')}}</p>
                                        </div>
                                        <div class="priority-dropdown custom-dropdown-icon">
                                            <div class="dropdown p-dropdown">
                                                <a class="dropdown-toggle text-info" href="#" role="button" id="dropdownMenuLink-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i class="las la-tag"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-1">
                                                    <a class="dropdown-item text-danger font-20" href="javascript:void(0);"> {{__('High Priority')}}</a>
                                                    <a class="dropdown-item text-warning font-20" href="javascript:void(0);"> {{__('Medium Priority')}}</a>
                                                    <a class="dropdown-item text-info font-20" href="javascript:void(0);"> {{__('Less Priority')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="action-dropdown custom-dropdown-icon">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle font-20" href="#" role="button" id="dropdownMenuLink-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i class="las la-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-2">
                                                    <a class="edit dropdown-item" href="javascript:void(0);"> {{__('Edit Task')}}</a>
                                                    <a class="important dropdown-item" href="javascript:void(0);"> {{__('Mark Important')}}</a>
                                                    <a class="dropdown-item delete" href="javascript:void(0);"> {{__('Delete Task')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Task Modal -->
                <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <i class="las la-times"  data-dismiss="modal"></i>
                                <div class="compose-box">
                                    <div class="compose-content" id="addTaskModalTitle">
                                        <h5 class=""> {{__('Add Task')}}</h5>
                                        <form>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="d-flex mail-to mb-4">
                                                        <div class="w-100">
                                                            <input id="task" type="text" placeholder="{{__('Task Heading')}}" class="form-control" name="task">
                                                            <span class="validation-text"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-4">
                                                <div class="w-100">
                                                    <textarea placeholder="{{__('Task Details')}}" class="form-control"></textarea>
                                                    <p class="text-muted mb-0 mt-2 font-10 ml-2"> {{__('Details must have 100 characters')}}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-4">
                                                <div class="w-100 priority-radio">
                                                    <p>
                                                        <input type="radio" id="test1" name="radio-group" checked>
                                                        <label for="test1" class="text-danger"> {{__('High Priority')}}</label>
                                                    </p>
                                                    <p>
                                                        <input type="radio" id="test2" name="radio-group">
                                                        <label for="test2" class="text-warning"> {{__('Medium Priority')}}</label>
                                                    </p>
                                                    <p>
                                                        <input type="radio" id="test3" name="radio-group">
                                                        <label for="test3" class="text-info"> {{__('Less Priority')}}</label>
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button class="btn btn-sm btn-danger" data-dismiss="modal"> {{__('Discard')}}</button>
                                <button class="btn btn-sm btn-primary"> {{__('Add Task')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Edit Task Modal -->
                <div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog" aria-labelledby="editTaskModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <i class="las la-times"  data-dismiss="modal"></i>
                                <div class="compose-box">
                                    <div class="compose-content" id="editTaskModalTitle">
                                        <h5 class="">Task Detail</h5>
                                        <form>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="d-flex mail-to mb-4">
                                                        <div class="w-100">
                                                            <input id="task" type="text" placeholder="{{__('Task Heading')}}" class="form-control" value="{{__('Coordinate with business development')}}"  name="task">
                                                            <span class="validation-text"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex  mail-subject mb-4">
                                                <div class="w-100">
                                                    <textarea placeholder="{{__('Task Details')}}" class="form-control"> {{__('On the other hand, we denounce with righteous indignation and dislike men')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-4">
                                                <div class="w-100 priority-radio">
                                                    <p>
                                                        <input type="radio" id="test11" name="radio-group2" checked>
                                                        <label for="test11" class="text-danger"> {{__('High Priority')}}</label>
                                                    </p>
                                                    <p>
                                                        <input type="radio" id="test22" name="radio-group2">
                                                        <label for="test22" class="text-warning"> {{__('Medium Priority')}}</label>
                                                    </p>
                                                    <p>
                                                        <input type="radio" id="test33" name="radio-group2">
                                                        <label for="test33" class="text-info"> {{__('Less Priority')}}</label>
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button class="btn btn-sm btn-danger" data-dismiss="modal"> {{__('Hi')}}Discard</button>
                                <button class="btn btn-sm btn-info"> {{__('Hi')}}Save Task</button>
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
    {!! Html::script('plugins/editors/quill/quill.js') !!}
    {!! Html::script('assets/js/apps/taskList.js') !!}
@endpush

@push('custom-scripts')

@endpush
