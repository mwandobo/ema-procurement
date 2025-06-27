@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/ui-elements/pagination.css') !!}
    {!! Html::style('plugins/jquery-ui/jquery-ui.min.css') !!}
    {!! Html::style('assets/css/elements/tooltip.css') !!}
    {!! Html::style('assets/css/apps/ecommerce.css') !!}
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
                                <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/apps/ecommerce/dashboard') }}"> {{__('Ecommerce')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Products')}}</span></li>
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
        <div class="row layout-spacing layout-top-spacing" id="cancel-row">
            <div class="col-lg-12">
                <div class="">
                    <div class="widget-content searchable-container grid">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-7 filtered-list-search align-self-center">
                                    <form class="form-inline my-2 my-lg-0">
                                        <div class="">
                                            <i class="las la-search toggle-search"></i>
                                            <input type="text" id="input-search" class="form-control search-form-control  ml-lg-auto" placeholder="{{__('Search Products')}}">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-5 text-sm-right text-center align-self-center">
                                    <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                        <a href="{{ url('/apps/ecommerce/add-product') }}" title="{{__('Add a product')}}" class="pointer font-25 s-o mr-2 bs-tooltip">
                                            <i class="las la-plus-circle"></i>
                                        </a>
                                        <a href="javascript:void(0);" title="{{__('List View')}}" class="pointer font-25 view-list s-o mr-2 bs-tooltip">
                                            <i class="las la-list"></i>
                                        </a>
                                        <a title="{{__('Grid View')}}" class="pointer font-25 view-grid active-view s-o mr-2 bs-tooltip">
                                            <i class="las la-th-large"></i>
                                        </a>
                                        <a title="{{__('Filter')}}" class="pointer font-25 s-o bs-tooltip mr-2">
                                            <i class="las la-filter"></i>
                                        </a>
                                        <select class="btn btn-outline-primary btn-sm h-auto p-2" id="exampleFormControlSelect1">
                                            <option>{{__('Select Sort By')}}</option>
                                            <option> {{__('Name')}}</option>
                                            <option> {{__('Price Low to High')}}</option>
                                            <option> {{__('Price High to Low')}}</option>
                                            <option> {{__('Stock')}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="searchable-items grid card-box">
                            <div class="items items-header-section">
                                <div class="item-content">
                                    <div class="">
                                        <h4> {{__('Full Name')}}</h4>
                                    </div>
                                    <div class="product-price">
                                        <h4> {{__('Price')}}</h4>
                                    </div>
                                    <div class="product-rating">
                                        <h4 style="margin-left: 0;"> {{__('Rating')}}</h4>
                                    </div>
                                    <div class="product-stock-status">
                                        <h4 style="margin-left: 3px;"> {{__('Status')}}</h4>
                                    </div>
                                    <div class="product-stock-status">
                                        <h4 style="margin-left: 3px;"> {{__('Options')}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item-content">
                                    <div class="product-info">
                                        <img src="{{ url('assets/img/product-5.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="product-name"> {{__('Product 1')}}</p>
                                            <p class="product-category"> {{__('Category One')}}</p>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <p class="product-category-addr"><span> {{__('Price:')}} </span> {{__('$1001')}}</p>
                                    </div>
                                    <div class="product-rating">
                                        <p class="product-rating-inner"><span> {{__('Rating:')}} </span>
                                            <a class="d-flex align-center">
                                                5  <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
                                            </a>
                                        </p>
                                    </div>
                                    <div class="product-stock-status">
                                        <p class="product-stock-status-inner">
                                            <small class="badge badge-success"> {{__('In Stock')}}</small>
                                        </p>
                                    </div>
                                    <div class="action-btn">
                                        <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                        <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item-content">
                                    <div class="product-info">
                                        <img src="{{ url('assets/img/product-1.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="product-name"> {{__('Product 2')}}</p>
                                            <p class="product-category"> {{__('Category two')}}</p>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <p class="product-category-addr"><span> {{__('Price:')}} </span> {{__('$1975')}}</p>
                                    </div>
                                    <div class="product-rating">
                                        <p class="product-rating-inner"><span> {{__('Rating:')}} </span>
                                            <a class="d-flex align-center">
                                                3  <img src="assets/img/star.png" class="avatar-xxs ml-2" alt="star">
                                            </a>
                                        </p>
                                    </div>
                                    <div class="product-stock-status">
                                        <p class="product-stock-status-inner">
                                            <small class="badge badge-danger"> {{__('No Stock')}}</small>
                                        </p>
                                    </div>
                                    <div class="action-btn">
                                        <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                        <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item-content">
                                    <div class="product-info">
                                        <img src="{{ url('assets/img/product-2.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="product-name"> {{__('Product 3')}}</p>
                                            <p class="product-category"> {{__('Category Three')}}</p>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <p class="product-category-addr"><span> {{__('Price:')}} </span> {{__('$2455')}}</p>
                                    </div>
                                    <div class="product-rating">
                                        <p class="product-rating-inner"><span> {{__('Rating:')}} </span>
                                            <a class="d-flex align-center">
                                                4 <img src="{{asset('assets/img/star.png')}}" class="avatar-xxs ml-2" alt="star">
                                            </a>
                                        </p>
                                    </div>
                                    <div class="product-stock-status">
                                        <p class="product-stock-status-inner">
                                            <small class="badge badge-danger">{{__('No Stock')}}</small>
                                        </p>
                                    </div>
                                    <div class="action-btn">
                                        <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                        <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item-content">
                                    <div class="product-info">
                                        <img src="{{ url('assets/img/product-3.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="product-name"> {{__('Product 4')}}</p>
                                            <p class="product-category"> {{__('Category Four')}}</p>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <p class="product-category-addr"><span> {{__('Price:')}} </span> {{__('$1655')}}</p>
                                    </div>
                                    <div class="product-rating">
                                        <p class="product-rating-inner"><span> {{__('Rating:')}} </span>
                                            <a class="d-flex align-center">
                                                2 <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
                                            </a>
                                        </p>
                                    </div>
                                    <div class="product-stock-status">
                                        <p class="product-stock-status-inner">
                                            <small class="badge badge-success"> {{__('In Stock')}}</small>
                                        </p>
                                    </div>
                                    <div class="action-btn">
                                        <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                        <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item-content">
                                    <div class="product-info">
                                        <img src="{{ url('assets/img/product-5.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="product-name"> {{__('Product 5')}}</p>
                                            <p class="product-category"> {{__('Category Five')}}</p>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <p class="product-category-addr"><span> {{__('Price:')}} </span> {{__('$7555')}}</p>
                                    </div>
                                    <div class="product-rating">
                                        <p class="product-rating-inner"><span> {{__('Rating:')}} </span>
                                            <a class="d-flex align-center">
                                                5 <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
                                            </a>
                                        </p>
                                    </div>
                                    <div class="product-stock-status">
                                        <p class="product-stock-status-inner">
                                            <small class="badge badge-danger"> {{__('No Stock')}}</small>
                                        </p>
                                    </div>
                                    <div class="action-btn">
                                        <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                        <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item-content">
                                    <div class="product-info">
                                        <img src="{{ url('assets/img/product-2.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="product-name"> {{__('Product 6')}}</p>
                                            <p class="product-category"> {{__('Category Six')}}</p>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <p class="product-category-addr"><span> {{__('Price:')}} </span> {{__('$2655')}}</p>
                                    </div>
                                    <div class="product-rating">
                                        <p class="product-rating-inner"><span> {{__('Rating:')}} </span>
                                            <a class="d-flex align-center">
                                                5 <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
                                            </a>
                                        </p>
                                    </div>
                                    <div class="product-stock-status">
                                        <p class="product-stock-status-inner">
                                            <small class="badge badge-success"> {{__('In Stock')}}</small>
                                        </p>
                                    </div>
                                    <div class="action-btn">
                                        <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                        <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="item-content">
                                    <div class="product-info"><img src="{{ url('assets/img/product-4.jpg') }}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="product-name"> {{__('Product 7')}}</p>
                                            <p class="product-category"> {{__('Category Seven')}}</p>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <p class="product-category-addr"><span>{{__('Price:')}} </span>{{__('$8655')}}</p>
                                    </div>
                                    <div class="product-rating">
                                        <p class="product-rating-inner"><span>{{__('Rating:')}} </span>
                                            <a class="d-flex align-center">
                                                3 <img src="{{ url('assets/img/star.png') }}" class="avatar-xxs ml-2" alt="star">
                                            </a>
                                        </p>
                                    </div>
                                    <div class="product-stock-status">
                                        <p class="product-stock-status-inner">
                                            <small class="badge badge-success">{{__('In Stock')}}</small>
                                        </p>
                                    </div>
                                    <div class="action-btn">
                                        <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                        <i class="lar la-trash-alt text-danger font-20 mr-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="pagination p13 text-center w-100 mt-4">
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
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('assets/js/apps/ecommerce.js') !!}
@endpush

@push('custom-scripts')

@endpush
