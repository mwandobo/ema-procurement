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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Apps')}}</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/apps/ecommerce/dashboard') }}">{{__('Ecommerce')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Sellers')}}</span></li>
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
                                            <input type="text" id="input-search-seller" class="form-control search-form-control  ml-lg-auto" placeholder="{{__('Search Sellers')}}">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-5 text-sm-right text-center align-self-center">
                                    <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                        <a title="Add a Seller" class="pointer font-25 s-o mr-2 bs-tooltip">
                                            <i class="las la-plus-circle"></i>
                                        </a>
                                        <a title="Filter" class="pointer font-25 s-o bs-tooltip mr-2">
                                            <i class="las la-filter"></i>
                                        </a>
                                        <select class="btn btn-outline-primary btn-sm h-auto p-2" id="exampleFormControlSelect1">
                                            <option>{{__('Sort By')}}</option>
                                            <option>{{__('Name')}}</option>
                                            <option>{{__('Revenue')}}</option>
                                            <option>{{__('Joined Date')}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="searchable-items grid card-box">
                            <div class="row w-100 m-0">
                                <div class="col-xl-3 col-lg-3 col-md-3 mb-4">
                                    <div class="card single-seller">
                                        <img src="{{ url('assets/img/company-7.jpg') }}" class="card-img-top" alt="widget-card-2">
                                        <div class="card-body">
                                            <p class="meta-date">{{__('hightech@mail.com')}}</p>
                                            <p class="meta-date">{{__('(+1) 1235 4586')}}</p>
                                            <h5 class="card-title mt-3">{{__('Hightech')}}</h5>
                                            <p class="card-text">{{__('Mobile, Fashion, Electronics, Groceries')}}</p>
                                            <div class="team">
                                            </div>
                                            <div class="meta-info">
                                                <div class="meta-action">
                                                    <div class="meta-bottom-info">
                                                        <span>{{__('Revenue :')}}</span><span>{{__('$2,909')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 mb-4">
                                    <div class="card single-seller">
                                        <img src="{{ url('assets/img/company-8.jpg') }}" class="card-img-top" alt="widget-card-2">
                                        <div class="card-body">
                                            <p class="meta-date">{{__('vision@mail.com')}}</p>
                                            <p class="meta-date">{{__('(+1) 1235 4586')}}</p>
                                            <h5 class="card-title mt-3">{{__('Vision')}}</h5>
                                            <p class="card-text">{{__('Mobile, Fashion, Electronics, Groceries')}}</p>
                                            <div class="team">
                                            </div>
                                            <div class="meta-info">
                                                <div class="meta-action">
                                                    <div class="meta-bottom-info">
                                                        <span>{{__('Revenue :')}}</span><span>{{__('$20,909')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 mb-4">
                                    <div class="card single-seller">
                                        <img src="{{ url('assets/img/company-3.jpg') }}" class="card-img-top" alt="widget-card-2">
                                        <div class="card-body">
                                            <p class="meta-date">{{__('innovation@mail.com')}}</p>
                                            <p class="meta-date">{{__('(+1) 7845 4586')}}</p>
                                            <h5 class="card-title mt-3">{{__('Innovation')}}</h5>
                                            <p class="card-text">{{__('Fashion, Electronics, Groceries, Laptop')}}</p>
                                            <div class="team">
                                            </div>
                                            <div class="meta-info">
                                                <div class="meta-action">
                                                    <div class="meta-bottom-info">
                                                        <span>{{__('Revenue :')}}</span><span>{{__('$20,909')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 mb-4">
                                    <div class="card single-seller">
                                        <img src="{{ url('assets/img/company-4.jpg') }}" class="card-img-top" alt="widget-card-2">
                                        <div class="card-body">
                                            <p class="meta-date">{{__('circle@mail.com')}}</p>
                                            <p class="meta-date">{{__('(+1) 5896 4586')}}</p>
                                            <h5 class="card-title mt-3">{{__('Circle')}}</h5>
                                            <p class="card-text">{{__('Fashion, Electronics, Groceries, Laptop')}}</p>
                                            <div class="team">
                                            </div>
                                            <div class="meta-info">
                                                <div class="meta-action">
                                                    <div class="meta-bottom-info">
                                                        <span>{{__('Revenue :')}}</span><span>{{__('$8,909')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 mb-4">
                                    <div class="card single-seller">
                                        <img src="{{ url('assets/img/company-5.jpg') }}" class="card-img-top" alt="widget-card-2">
                                        <div class="card-body">
                                            <p class="meta-date">{{__('linc@mail.com')}}</p>
                                            <p class="meta-date">{{__('(+1) 4758 7777')}}</p>
                                            <h5 class="card-title mt-3">{{__('Linc')}}</h5>
                                            <p class="card-text">{{__('Fashion, Electronics, Groceries, Laptop')}}</p>
                                            <div class="team">
                                            </div>
                                            <div class="meta-info">
                                                <div class="meta-action">
                                                    <div class="meta-bottom-info">
                                                        <span>{{__('Revenue :')}}</span><span>{{__('$4,145')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 mb-4">
                                    <div class="card single-seller">
                                        <img src="{{ url('assets/img/company-6.jpg') }}" class="card-img-top" alt="widget-card-2">
                                        <div class="card-body">
                                            <p class="meta-date">{{__('union@mail.com')}}</p>
                                            <p class="meta-date">{{__('(+1) 5896 4586')}}</p>
                                            <h5 class="card-title mt-3">{{__('Union Banko')}}</h5>
                                            <p class="card-text">{{__('Mobile, Electronics, Groceries, Laptop')}}</p>
                                            <div class="team">
                                            </div>
                                            <div class="meta-info">
                                                <div class="meta-action">
                                                    <div class="meta-bottom-info">
                                                        <span>{{__('Revenue :')}}</span><span>{{__('$80,784')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 mb-4">
                                    <div class="card single-seller">
                                        <img src="{{ url('assets/img/company-2.jpg') }}" class="card-img-top" alt="widget-card-2">
                                        <div class="card-body">
                                            <p class="meta-date">{{__('hightech@mail.com')}}</p>
                                            <p class="meta-date">{{__('(+1) 9568 4784')}}</p>
                                            <h5 class="card-title mt-3">{{__('Hightech')}}</h5>
                                            <p class="card-text">{{__('Fashion, Mobile, Groceries, Laptop, Electronics')}}</p>
                                            <div class="team">
                                            </div>
                                            <div class="meta-info">
                                                <div class="meta-action">
                                                    <div class="meta-bottom-info">
                                                        <span>{{__('Revenue :')}}</span><span>{{__('$4,456')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 mb-4">
                                    <div class="card single-seller">
                                        <img src="{{ url('assets/img/company-7.jpg') }}" class="card-img-top" alt="widget-card-2">
                                        <div class="card-body">
                                            <p class="meta-date">{{__('hightech@mail.com')}}</p>
                                            <p class="meta-date">{{__('(+1) 1235 4586')}}</p>
                                            <h5 class="card-title mt-3">{{__('Hightech')}}</h5>
                                            <p class="card-text">{{__('Mobile, Fashion, Electronics, Groceries')}}</p>
                                            <div class="team">
                                            </div>
                                            <div class="meta-info">
                                                <div class="meta-action">
                                                    <div class="meta-bottom-info">
                                                        <span>{{__('Revenue :')}}</span><span>{{__('$2,909')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pagination p13 text-center w-100 mt-1">
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
