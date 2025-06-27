@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/ui-elements/pagination.css') !!}
    {!! Html::style('assets/css/pages/search_result.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Other Pages')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Search Result')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav d-flex align-center ml-auto ">
                <a class="btn btn-danger btn-sm" href="{{ url('/pages/search-result2') }}">{{__('View Other ')}}<i class="las la-arrow-right"></i></a>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget">
                            <div class="widget-content widget-content-area">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="input-group m-t-10">
                                            <input type="text" class="form-control" value="Admin Dashboard">
                                            <span class="input-group-append">
                                                        <button type="button" class="btn bg-gradient-primary btn-primary"><i class="fa fa-search mr-1"></i> {{__('Search')}}</button>
                                                    </span>
                                        </div>
                                        <div class="mt-4 d-flex align-items-center justify-content-between">
                                            <div>
                                                <h6>{{__('Search Results for')}} <span class="stronger">{{__('"Admin Dashboard"')}}</span></h6>
                                                <p class="text-muted font-12">{{__('125 result found')}}</p>
                                            </div>
                                            <div>
                                                <ul class="tabs tab-pills">
                                                    <li>
                                                        <div class="dropdown custom-dropdown-icon">
                                                            <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>{{__('Set Filter')}}</span> <i class="las la-angle-down"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown" style="will-change: transform;">
                                                                <a class="dropdown-item" data-value="All" href="javascript:void(0);">{{__('All')}}</a>
                                                                <a class="dropdown-item" data-value="Product" href="javascript:void(0);">{{__('Only Product')}}</a>
                                                                <a class="dropdown-item" data-value="User" href="javascript:void(0);">{{__('Only User')}}</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-12">
                                        <hr>
                                        <div class="single-result row">
                                            <div class="col-md-6 d-flex">
                                                <div class="image-container mr-3">
                                                    <img src="{{ url('assets/img/logo.png') }}" />
                                                </div>
                                                <div class="info-container">
                                                    <h6>
                                                        <a href="#" class="text-primary strong">{{__('Neptune Admin - Codecanyon')}}</a>
                                                    </h6>
                                                    <p class="text-muted font-12">{{__('by NeptuneWeb')}}</p>
                                                    <p class="font-13">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elitsed do eiusmod tempor...')}}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="lar la-clock font-20 mr-2 txet-muted"></i>
                                                    <a>{{__('02.02.2020')}}</a>
                                                </div>
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="lar la-file-alt font-20 mr-2 txet-muted"></i>
                                                    <a>{{__('500+ Pages')}}</a>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <i class="lar la-user font-20 mr-2 txet-muted"></i>
                                                    <a>{{__('Expert Level')}}</a>
                                                </div>
                                            </div>
                                            <div class="col-md-2 star-area">
                                                <div class="d-flex align-items-center">
                                                    <i class="las la-star text-warning font-20"></i>
                                                    <i class="las la-star text-warning font-20"></i>
                                                    <i class="las la-star text-warning font-20"></i>
                                                    <i class="las la-star text-warning font-20"></i>
                                                    <i class="lar la-star-half text-warning font-20"></i>
                                                </div>
                                                <p class="text-warning font-17 strong pl-1 mt-3 mb-0">4.7</p>
                                                <p class="text-muted font-12 pl-1 mt-3">{{__('1,248 Users')}}</p>
                                            </div>
                                            <div class="col-md-2 buy-now-area">
                                                <p>
                                                    <a class="text-muted font-17"><del>{{__('$22')}}</del></a>
                                                    <a class="text-success-teal strong font-20 ml-2">{{__('$22')}}</a>
                                                </p>
                                                <a class="btn btn-primary bg-gradient-primary">{{__('Buy Now')}}</a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="single-result">
                                            <h6 class="mb-1">
                                                <a href="#" class="text-primary">{{__('Neptune - Responsive Admin Template')}}</a>
                                            </h6>
                                            <div class="font-13 text-success mb-2 text-truncate">
                                                {{__('https://codecanyon.net/')}}
                                            </div>
                                            <p class="mb-0 text-muted font-12">
                                                {{__('Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.')}}
                                            </p>
                                        </div>
                                        <hr>
                                        <div class="single-result">
                                            <h6 class="mb-1">
                                                <a href="#" class="text-primary">{{__('Neptune - Bootstrap Multipurpose Admin Template')}}</a>
                                            </h6>
                                            <div class="font-13 text-success mb-2 text-truncate">
                                                {{__('https://codecanyon.net/')}}
                                            </div>
                                            <p class="mb-0 text-muted font-12">
                                                {{__('Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.')}}
                                            </p>
                                        </div>
                                        <hr>
                                        <div class="single-result">
                                            <h6 class="mb-1">
                                                <a href="#" class="text-primary">{{__('Neptune - HTML ADMIN TEMPLATE')}}</a>
                                            </h6>
                                            <div class="font-13 text-success mb-2 text-truncate">
                                                {{__('https://codecanyon.net/')}}
                                            </div>
                                            <p class="mb-0 text-muted font-12">
                                                {{__('Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum.')}}
                                            </p>
                                            <div class="mt-2">
                                                <img src="{{ url('assets/img/lightbox-1.jpg') }}" height="48" alt="image">
                                                <img src="{{ url('assets/img/lightbox-8.jpg') }}" height="48" alt="image">
                                                <img src="{{ url('assets/img/lightbox-1.jpg') }}" height="48" alt="image">
                                                <img src="{{ url('assets/img/lightbox-8.jpg') }}" height="48" alt="image">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="single-result">
                                            <h6 class="mb-1">
                                                <a href="#" class="text-primary">{{__('Neptune - Bootstrap Multipurpose Admin Template')}}</a>
                                            </h6>
                                            <div class="font-13 text-success mb-2 text-truncate">
                                                {{__('https://codecanyon.net/')}}
                                            </div>
                                            <p class="mb-0 text-muted font-12">
                                                {{__('Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.')}}
                                            </p>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <div class="pagination p13 text-center">
                                            <ul class="mx-auto">
                                                <a href="#" class="prev"><li>{{__('Prev')}}</li></a>
                                                <a class="is-active" href="#"><li>1</li></a>
                                                <a href="#"><li>2</li></a>
                                                <a href="#"><li>3</li></a>
                                                <a href="#" class="next"><li>{{__('Next')}}</li></a>
                                            </ul>
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
