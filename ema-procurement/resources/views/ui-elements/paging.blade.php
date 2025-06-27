@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/ui-elements/pagination.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('UI Elements')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Paging')}}</span></li>
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
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Pagination One')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="pagination p1">
                                            <ul>
                                                <a href="#"><li><i class="las la-angle-left"></i></li></a>
                                                <a class="is-active" href="#"><li>1</li></a>
                                                <a href="#"><li>2</li></a>
                                                <a href="#"><li>3</li></a>
                                                <a href="#"><li>4</li></a>
                                                <a href="#"><li>5</li></a>
                                                <a href="#"><li>6</li></a>
                                                <a href="#"><li><i class="las la-angle-right"></i></li></a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Pagination Two')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="pagination p2">
                                            <ul>
                                                <a href="#"><li><i class="las la-angle-left"></i></li></a>
                                                <a href="#"><li>1</li></a>
                                                <a class="is-active" href="#"><li>2</li></a>
                                                <a href="#"><li>3</li></a>
                                                <a href="#"><li>4</li></a>
                                                <a href="#"><li>5</li></a>
                                                <a href="#"><li>6</li></a>
                                                <a href="#"><li><i class="las la-angle-right"></i></li></a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Pagination Three')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="pagination p3">
                                            <ul>
                                                <a href="#"><li><i class="las la-angle-left"></i></li></a>
                                                <a href="#"><li>1</li></a>
                                                <a href="#"><li>2</li></a>
                                                <a class="is-active" href="#"><li>3</li></a>
                                                <a href="#"><li>4</li></a>
                                                <a href="#"><li>5</li></a>
                                                <a href="#"><li>6</li></a>
                                                <a href="#"><li><i class="las la-angle-right"></i></li></a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Pagination Four')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="pagination p4">
                                            <ul>
                                                <a href="#"><li></li></a>
                                                <a href="#"><li></li></a>
                                                <a href="#"><li></li></a>
                                                <a class="is-active" href="#"><li></li></a>
                                                <a href="#"><li></li></a>
                                                <a href="#"><li></li></a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Pagination Five')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="pagination p5">
                                            <ul>
                                                <a href="#"><li></li></a>
                                                <a href="#"><li></li></a>
                                                <a href="#"><li></li></a>
                                                <a href="#"><li></li></a>
                                                <a class="is-active" href="#"><li></li></a>
                                                <a href="#"><li></li></a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Pagination Six')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="pagination p6">
                                            <ul>
                                                <a href="#"><li></li></a>
                                                <a href="#"><li></li></a>
                                                <a href="#"><li></li></a>
                                                <a href="#"><li></li></a>
                                                <a class="is-active" href="#"><li></li></a>
                                                <a href="#"><li></li></a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Pagination Seven')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="pagination p7">
                                            <ul>
                                                <a class="is-active" href="#"><li>{{__('Previous')}}</li></a>
                                                <a href="#"><li>{{__('Next')}}</li></a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Pagination Eight')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="pagination p8">
                                            <ul>
                                                <a class="is-active" href="#"><li><i class="las la-angle-left"></i></li></a>
                                                <a href="#"><li><i class="las la-angle-right"></i></li></a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Pagination Nine')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="pagination p9">
                                            <ul>
                                                <a href="#"><li>1</li></a>
                                                <a href="#"><li>2</li></a>
                                                <a href="#"><li>3</li></a>
                                                <a class="is-active" href="#"><li>4</li></a>
                                                <a href="#"><li>5</li></a>
                                                <a href="#"><li>6</li></a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Pagination Ten')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="pagination p10">
                                            <ul>
                                                <a href="#"><li>1</li></a>
                                                <a href="#"><li>2</li></a>
                                                <a href="#"><li>3</li></a>
                                                <a href="#"><li>4</li></a>
                                                <a class="is-active" href="#"><li>5</li></a>
                                                <a href="#"><li>6</li></a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Pagination Eleven')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="pagination p11">
                                            <ul>
                                                <a href="#"><li>{{__('Previous')}}</li></a>
                                                <a class="is-active" href="#"><li>{{__('Next')}}</li></a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Pagination Twelve')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="pagination p12">
                                            <ul>
                                                <a href="#"><li>{{__('Previous')}}</li></a>
                                                <a href="#"><li>1</li></a>
                                                <a href="#"><li>2</li></a>
                                                <a href="#"><li>3</li></a>
                                                <a href="#"><li>4</li></a>
                                                <a href="#"><li>5</li></a>
                                                <a class="is-active" href="#"><li>6</li></a>
                                                <a href="#"><li>{{__('Next')}}</li></a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Pagination Thirteen')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="pagination p13">
                                            <ul>
                                                <a href="#" class="prev"><li>{{__('Prev')}}</li></a>
                                                <a href="#"><li>1</li></a>
                                                <a href="#"><li>2</li></a>
                                                <a href="#"><li>3</li></a>
                                                <a href="#"><li>4</li></a>
                                                <a href="#"><li>5</li></a>
                                                <a class="is-active" href="#"><li>6</li></a>
                                                <a href="#" class="next"><li>{{__('Next')}}</li></a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Default Pagination')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <nav>
                                            <ul class="pagination pagination-rounded">
                                                <li class="page-item">
                                                    <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                                        <span aria-hidden="true">«</span>
                                                        <span class="sr-only">{{__('Previous')}}</span>
                                                    </a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a></li>
                                                <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                                                <li class="page-item active"><a class="page-link" href="javascript: void(0);">3</a></li>
                                                <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                                    <span aria-hidden="true">»</span>
                                                    <span class="sr-only">{{__('Next')}}</span>
                                                </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Default Pagination Sizing')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <nav>
                                                    <ul class="pagination pagination-lg">
                                                        <li class="page-item">
                                                            <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                                                <span aria-hidden="true">«</span>
                                                                <span class="sr-only">{{__('Previous')}}</span>
                                                            </a>
                                                        </li>
                                                        <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a></li>
                                                        <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                                                <span aria-hidden="true">»</span>
                                                                <span class="sr-only">{{__('Next')}}</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                            <div class="col-md-6">
                                                <nav>
                                                    <ul class="pagination pagination-sm">
                                                        <li class="page-item">
                                                            <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                                                <span aria-hidden="true">«</span>
                                                                <span class="sr-only">{{__('Previous')}}</span>
                                                            </a>
                                                        </li>
                                                        <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a></li>
                                                        <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                                                <span aria-hidden="true">»</span>
                                                                <span class="sr-only">{{__('Next')}}</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>
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
    {!! Html::script('assets/js/loader.js') !!}
@endpush

@push('custom-scripts')

@endpush
