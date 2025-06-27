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
                                <li class="breadcrumb-item" aria-current="page"><a href="{{url('/apps/ecommerce/dashboard')}}">{{__('Ecommerce')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Product Details')}}</span></li>
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
                        <div class="card-box product-details">
                            <div class="row">
                                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12">
                                    <div class="tab-content pt-0">
                                        <a class="product-details-wishlist">
                                            <i class="lar la-heart" id="heartIcon"></i>
                                        </a>
                                        <div class="tab-pane show" id="product-1-item">
                                            <img src="{{ url('assets/img/product-detail-1.jpg') }}" alt="" class="img-fluid mx-auto d-block rounded">
                                        </div>
                                        <div class="tab-pane" id="product-2-item">
                                            <img src="{{ url('assets/img/product-detail-2.jpg') }}" alt="" class="img-fluid mx-auto d-block rounded">
                                        </div>
                                        <div class="tab-pane" id="product-3-item">
                                            <img src="{{ url('assets/img/product-detail-3.jpg') }}" alt="" class="img-fluid mx-auto d-block rounded">
                                        </div>
                                        <div class="tab-pane active" id="product-4-item">
                                            <img src="{{ url('assets/img/product-detail-4.jpg') }}" alt="" class="img-fluid mx-auto d-block rounded">
                                        </div>
                                    </div>
                                    <ul class="nav nav-pills nav-justified">
                                        <li class="nav-item">
                                            <a href="#product-1-item" data-toggle="tab" aria-expanded="false" class="nav-link product-thumb show">
                                                <img src="{{ url('assets/img/product-detail-1.jpg') }}" alt="" class="img-fluid mx-auto d-block rounded">
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#product-2-item" data-toggle="tab" aria-expanded="true" class="nav-link product-thumb">
                                                <img src="{{ url('assets/img/product-detail-2.jpg') }}" alt="" class="img-fluid mx-auto d-block rounded">
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#product-3-item" data-toggle="tab" aria-expanded="false" class="nav-link product-thumb">
                                                <img src="{{ url('assets/img/product-detail-3.jpg') }}" alt="" class="img-fluid mx-auto d-block rounded">
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#product-4-item" data-toggle="tab" aria-expanded="false" class="nav-link product-thumb active">
                                                <img src="{{ url('assets/img/product-detail-4.jpg') }}" alt="" class="img-fluid mx-auto d-block rounded">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12">
                                    <div class="mt-3 mt-xl-0">
                                        <a href="{{ url('/apps/ecommerce/products') }}" class="text-primary mb-3 d-block"><i class="las la-arrow-left"></i> {{__('Back to list')}}</a>
                                        <a class="strong">{{__('Roadstar')}}</a>
                                        <h4 class="mb-3 text-black strong">{{__('Full Sleeve Cotton Shirt with Collar')}}</h4>
                                        <p class="text-muted float-left mr-2">
                                            <i class="las la-star text-warning"></i>
                                            <i class="las la-star text-warning"></i>
                                            <i class="las la-star text-warning"></i>
                                            <i class="las la-star text-warning"></i>
                                            <i class="lar la-star text-warning"></i>
                                        </p>
                                        <p class="mb-3">
                                            <a href="" class="text-muted">{{__('4.0 (74,258 Customer Reviews )')}}</a>
                                        </p>
                                        <h4>
                                            <span class="badge badge-success">{{__('Special Price')}}</span>
                                        </h4>
                                        <h4 class="mb-3">
                                            <b>{{__('$101 USD')}}</b>
                                            <span class="text-muted ml-2">
                                                        <del>{{__('$80 USD')}}</del>
                                                    </span>
                                            <span class="text-success ml-2">{{__('20 % Off')}}</span>
                                        </h4>
                                        <h4>
                                            <span class="text-success mb-4 font-13">{{__('Instock')}}</span>
                                        </h4>
                                        <p class="text-muted mb-4">{{__('There are many variations of passages of shirt available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.')}}</p>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <p class="text-muted strong font-13">{{__('Highlights')}}</p>
                                                <div>
                                                    <p class="text-muted"><i class="lar la-check-circle"></i> {{__('Shirt has amazing fabric')}}</p>
                                                    <p class="text-muted"><i class="lar la-check-circle"></i> {{__('100% Cotton with no polyster')}}</p>
                                                    <p class="text-muted"><i class="lar la-check-circle"></i> {{__('Perfect for summer outfit')}}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <p>&nbsp;</p>
                                                <div>
                                                    <p class="text-muted"><i class="lar la-check-circle"></i> {{__('Color: Milky White')}}</p>
                                                    <p class="text-muted"><i class="lar la-check-circle"></i> {{__('Amazing fittings')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <form class="form-inline mb-4">
                                            <label class="my-1 mr-2" for="quantityinput"> {{__('Quantity')}}</label>
                                            <select class="custom-select mb-1 mr-3 pr-5" id="quantityinput">
                                                <option value="1"> {{__('1')}}</option>
                                                <option value="2"> {{__('2')}}</option>
                                                <option value="3">{{__('3')}}</option>
                                                <option value="4">{{__('4')}}</option>
                                                <option value="5">{{__('5')}}</option>
                                                <option value="6">{{__('6')}}</option>
                                                <option value="7">{{__('7')}}</option>
                                            </select>
                                            <label class="my-1 mr-2" for="sizeinput"> {{__('Products')}}Size</label>
                                            <select class="custom-select  mb-1 mr-3 pr-5" id="sizeinput">
                                                <option selected=""> {{__('Small')}}</option>
                                                <option value="1"> {{__('Medium')}}</option>
                                                <option value="2"> {{__('Large')}}</option>
                                                <option value="3"> {{__('X-large')}}</option>
                                            </select>
                                            <label class="my-1 mr-2" for="colorinput">{{__('Products')}}Color</label>
                                            <select class="custom-select mb-1 mr-3 pr-5" id="colorinput">
                                                <option value="{{__('Purple')}}">{{__('Purple')}}</option>
                                                <option value="{{__('Green')}}">{{__('Green')}}</option>
                                                <option value="{{__('Orange')}}">{{__('Orange')}}</option>
                                                <option value="{{__('Blue')}}">{{__('Blue')}}</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                                <div class="text-center w-100">
                                    <button type="button" class="btn btn-primary">
                                        <i class="las la-plus-circle"></i> {{__('Add to cart')}}
                                    </button>
                                    <button type="button" class="btn btn-dark">
                                        <i class="las la-shopping-bag"></i> {{__('Buy Now')}}
                                    </button>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="w-100 animated-underline-content mt-2 details-tab-area">
                                <ul class="nav nav-tabs  mb-3" id="lineTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="underline-specification-tab" data-toggle="tab" href="#underline-specification" role="tab" aria-controls="underline-specification" aria-selected="false"> {{__('Specification')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="underline-reviews-tab" data-toggle="tab" href="#underline-reviews" role="tab" aria-controls="underline-reviews" aria-selected="false"> {{__('Reviews')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="underline-faqs-tab" data-toggle="tab" href="#underline-faqs" role="tab" aria-controls="underline-faqs" aria-selected="true"> {{__('FAQs')}}</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="lineTabContent-3">
                                    <!-- SPECIFICATION -->
                                    <div class="tab-pane fade show active" id="underline-specification" role="tabpanel" aria-labelledby="underline-specification-tab">
                                        <div class="d-flex flex-wrap p-2">
                                            <p class="text-muted mb-4"> {{__('There are many variations of passages of shirt available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.')}}</p>
                                            <div class="row mb-3 w-100">
                                                <div class="col-md-4">
                                                    <p class="text-muted strong font-13"> {{__('Highlights')}}</p>
                                                    <div>
                                                        <p class="text-muted"><i class="lar la-check-circle"></i> {{__('Shirt has amazing fabric')}}</p>
                                                        <p class="text-muted"><i class="lar la-check-circle"></i> {{__('100% Cotton with no polyster')}}</p>
                                                        <p class="text-muted"><i class="lar la-check-circle"></i> {{__('Perfect for summer outfit')}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <p>&nbsp;</p>
                                                    <div>
                                                        <p class="text-muted"><i class="lar la-check-circle"></i> {{__('Color: Milky White')}}</p>
                                                        <p class="text-muted"><i class="lar la-check-circle"></i> {{__('Amazing fittings')}}</p>
                                                        <p class="text-muted"><i class="lar la-check-circle"></i> {{__('Best Design')}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <p>&nbsp;</p>
                                                    <div>
                                                        <p class="text-muted"><i class="lar la-check-circle"></i> {{__('Best Price')}}</p>
                                                        <p class="text-muted"><i class="lar la-check-circle"></i> {{__('Multiple Color')}}</p>
                                                        <p class="text-muted"><i class="lar la-check-circle"></i> {{__('Suitable for everyone')}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- REVIEWS -->
                                    <div class="tab-pane fade" id="underline-reviews" role="tabpanel" aria-labelledby="underline-reviews-tab">
                                        <div class="row w-100 m-0">
                                            <div class="col-md-4 mb-4">
                                                <div class="single-review">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <span class="badge badge-success-teal mr-3">5 <i class="las la-star"></i></span>
                                                        <span class="text-dark strong"> {{__('Awesome Shirt')}}</span>
                                                    </div>
                                                    <h6 class="font-13 text-muted mb-0"> {{__('Very nice product. I want to buy more.')}}</h6>
                                                    <p class="font-12 text-muted mb-0">{{__('- Jonathan Williamson')}} <span class="font-10">{{__('(12 Aug 2020)')}}</span></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <div class="single-review">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <span class="badge badge-danger mr-3">2 <i class="las la-star"></i></span>
                                                        <span class="text-dark strong"> {{__('Not So good')}}</span>
                                                    </div>
                                                    <h6 class="font-13 text-muted mb-0"> {{__('I didn\'t like it personally. Sad with quality')}}</h6>
                                                    <p class="font-12 text-muted mb-0"> {{__('- Buli Shinomo')}} <span class="font-10">{{__('(08 Jul 2020)')}}</span></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <div class="single-review">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <span class="badge badge-success-teal mr-3">5 <i class="las la-star"></i></span>
                                                        <span class="text-dark strong"> {{__('Perfect Shirt')}}</span>
                                                    </div>
                                                    <h6 class="font-13 text-muted mb-0"> {{__('Super nice product. I want to buy more.')}}</h6>
                                                    <p class="font-12 text-muted mb-0"> {{__('- Dhigmandy')}} <span class="font-10">{{__('(08 Jul 2020)')}}</span></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <div class="single-review">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <span class="badge badge-warning mr-3">3 <i class="las la-star"></i></span>
                                                        <span class="text-dark strong"> {{__('Not Good, Not Bad')}}</span>
                                                    </div>
                                                    <h6 class="font-13 text-muted mb-0"> {{__('I am not super impressed. but i like it')}}</h6>
                                                    <p class="font-12 text-muted mb-0"> {{__('-  Justin Gomez')}} <span class="font-10">{{__('(20 Apr 2020)')}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- FAQS -->
                                    <div class="tab-pane fade" id="underline-faqs" role="tabpanel" aria-labelledby="underline-faqs-tab">
                                        <div class="row w-100 m-0">
                                            <div class="accordion" id="accordion2">
                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                                            {{__('FAQ 1')}} <span class="float-right"><i class="las la-angle-down"></i></span>
                                                        </a>
                                                    </div>
                                                    <div id="collapseOne" class="accordion-body collapse">
                                                        <div class="accordion-inner">
                                                            {{__('There are many variations of passages of FAQ available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of FAQ, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.')}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                                            {{__('FAQ 2')}} <span class="float-right"><i class="las la-angle-down"></i></span>
                                                        </a>
                                                    </div>
                                                    <div id="collapseTwo" class="accordion-body collapse">
                                                        <div class="accordion-inner">
                                                            {{__('There are many variations of passages of FAQ available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of FAQ, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.')}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                                            {{__('FAQ 3')}} <span class="float-right"><i class="las la-angle-down"></i></span>
                                                        </a>
                                                    </div>
                                                    <div id="collapseThree" class="accordion-body collapse">
                                                        <div class="accordion-inner">
                                                            {{__('There are many variations of passages of FAQ available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of FAQ, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.')}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                                                            {{__('FAQ 4')}} <span class="float-right"><i class="las la-angle-down"></i></span>
                                                        </a>
                                                    </div>
                                                    <div id="collapseFour" class="accordion-body collapse">
                                                        <div class="accordion-inner">
                                                            {{__('There are many variations of passages of FAQ available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of FAQ, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.')}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-5">
                            <div class="table-responsive mt-4">
                                <table class="table table-bordered table-centered mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th> {{__('Sellers')}}</th>
                                        <th> {{__('Price')}}</th>
                                        <th> {{__('Stock Percentage')}}</th>
                                        <th> {{__('Revenue')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td> {{__('Seller Name 1')}}</td>
                                        <td> {{__('$109.58')}}</td>
                                        <td>
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-auto">
                                                    <span class="mr-2"> {{__('10%')}}</span>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td> {{__('$1,478')}}</td>
                                    </tr>
                                    <tr>
                                        <td> {{__('Seller Name 2')}}</td>
                                        <td> {{__('$109.99')}}</td>
                                        <td>
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-auto">
                                                    <span class="mr-2"> {{__('20%')}}</span>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td> {{__('$3,452')}}</td>
                                    </tr>
                                    <tr>
                                        <td> {{__('Seller Name 3')}}</td>
                                        <td> {{__('$105.87')}}</td>
                                        <td>
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-auto">
                                                    <span class="mr-2"> {{__('92%')}}</span>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 92%" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td> {{__('$5,878')}}</td>
                                    </tr>
                                    <tr>
                                        <td> {{__('Seller Name 4')}}</td>
                                        <td> {{__('$109.89')}}</td>
                                        <td>
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-auto">
                                                    <span class="mr-2"> {{__('55%')}}</span>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td> {{__('$2,123')}}</td>
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
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('assets/js/apps/ecommerce.js') !!}
@endpush

@push('custom-scripts')

@endpush
