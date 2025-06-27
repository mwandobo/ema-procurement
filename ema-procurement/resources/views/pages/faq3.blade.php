@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/pages/faq/faq3.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('FAQ 3')}}</span></li>
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
        <div class="layout-top-spacing mb-5">
            <div class="col-md-12">
                <div class="row faq-3-container">
                    <div class="col-md-12">
                        <div class="faq">
                            <div class="layout-spacing pb-5">
                                <div class="faq-container layout-top-spacing">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2>{{__('FAQ')}}</h2>
                                            <p class="sub-heading">{{__('Frequently Asked Questions')}}</p>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="accordion" id="simple_faq">
                                                        <div class="card">
                                                            <div class="card-header" id="fqheadingOne">
                                                                <div class="mb-0" data-toggle="collapse" role="navigation" data-target="#fqcollapseOne" aria-expanded="false" aria-controls="fqcollapseOne">
                                                                    <span class="faq-q-title">{{__('How to search on a browser ?')}}</span> <i class="las la-angle-down float-right"></i>
                                                                </div>
                                                            </div>
                                                            <div id="fqcollapseOne" class="collapse" aria-labelledby="fqheadingOne" data-parent="#simple_faq">
                                                                <<div class="card-body">
                                                                    <p>{{__('Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.')}} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="fqheadingTwo">
                                                                <div class="mb-0" data-toggle="collapse" role="navigation" data-target="#fqcollapseTwo" aria-controls="fqcollapseTwo">
                                                                    <span class="faq-q-title">{{__('How to start a admin panel ?')}}</span> <i class="las la-angle-down float-right"></i>
                                                                </div>
                                                            </div>
                                                            <div id="fqcollapseTwo" class="collapse" aria-labelledby="fqheadingTwo" data-parent="#simple_faq">
                                                                <div class="card-body">
                                                                    <p>{{__('Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.')}} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="fqheadingThree">
                                                                <div class="mb-0" data-toggle="collapse" role="navigation" data-target="#fqcollapseThree" aria-expanded="false" aria-controls="fqcollapseThree">
                                                                    <span class="faq-q-title">{{__('Which is the best way to use Javascript ?')}}</span><i class="las la-angle-down float-right"></i>
                                                                </div>
                                                            </div>
                                                            <div id="fqcollapseThree" class="collapse" aria-labelledby="fqheadingThree" data-parent="#simple_faq">
                                                                <div class="card-body">
                                                                    <p>{{__('Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.')}} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="fqheadingFour">
                                                                <div class="mb-0" data-toggle="collapse" role="navigation" data-target="#fqcollapseFour" aria-expanded="false" aria-controls="fqcollapseFour">
                                                                    <span class="faq-q-title">{{__('How to upload files on production ?')}}</span><i class="las la-angle-down float-right"></i>
                                                                </div>
                                                            </div>
                                                            <div id="fqcollapseFour" class="collapse" aria-labelledby="fqheadingFour" data-parent="#simple_faq">
                                                                <div class="card-body">
                                                                    <p>{{__('Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.')}} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="fqheadingFive">
                                                                <div class="mb-0" data-toggle="collapse" role="navigation" data-target="#fqcollapseFive" aria-expanded="false" aria-controls="fqcollapseFive">
                                                                    <span class="faq-q-title">{{__('What should you do if you get an error ?')}}</span><i class="las la-angle-down float-right"></i>
                                                                </div>
                                                            </div>
                                                            <div id="fqcollapseFive" class="collapse" aria-labelledby="fqheadingFive" data-parent="#simple_faq">
                                                                <div class="card-body">
                                                                    <p>{{__('Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.')}} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="fqheadingSix">
                                                                <div class="mb-0" data-toggle="collapse" role="navigation" data-target="#fqcollapseSix" aria-expanded="true" aria-controls="fqcollapseSix">
                                                                    <span class="faq-q-title">{{__('What should you do if you get an error ?')}}</span><i class="las la-angle-down float-right"></i>
                                                                </div>
                                                            </div>
                                                            <div id="fqcollapseSix" class="collapse show" aria-labelledby="fqheadingSix" data-parent="#simple_faq">
                                                                <div class="card-body">
                                                                    <p>{{__('Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.')}} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="accordion" id="simple_faq1">
                                                        <div class="card">
                                                            <div class="card-header" id="fqheadingOne1">
                                                                <div class="mb-0" data-toggle="collapse" role="navigation" data-target="#fqcollapseOne1" aria-expanded="true"
                                                                     aria-controls="fqcollapseOne1">
                                                                    <span class="faq-q-title">{{__('How to download the image from internet ?')}}</span> <i class="las la-angle-down float-right"></i>
                                                                </div>
                                                            </div>
                                                            <div id="fqcollapseOne1" class="collapse show" aria-labelledby="fqheadingOne1" data-parent="#simple_faq1">
                                                                <div class="card-body">
                                                                    <p>{{__('Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.')}} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="fqheadingTwo2">
                                                                <div class="mb-0" data-toggle="collapse" role="navigation" data-target="#fqcollapseTwo2" aria-expanded="false" aria-controls="fqcollapseTwo2">
                                                                    <span class="faq-q-title">{{__('How to download an app from app store ?')}}</span> <i class="las la-angle-down float-right"></i>
                                                                </div>
                                                            </div>
                                                            <div id="fqcollapseTwo2" class="collapse" aria-labelledby="fqheadingTwo2" data-parent="#simple_faq1">
                                                                <div class="card-body">
                                                                    <p>{{__('Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.')}} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="fqheadingThree3">
                                                                <div class="mb-0" data-toggle="collapse" role="navigation" data-target="#fqcollapseThree3" aria-expanded="false" aria-controls="fqcollapseThree3">
                                                                    <span class="faq-q-title">{{__('What is MVC architecture ?')}}</span><i class="las la-angle-down float-right"></i>
                                                                </div>
                                                            </div>
                                                            <div id="fqcollapseThree3" class="collapse" aria-labelledby="fqheadingThree3" data-parent="#simple_faq1">
                                                                <div class="card-body">
                                                                    <p>{{__('Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.')}} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="fqheadingFour4">
                                                                <div class="mb-0" data-toggle="collapse" role="navigation" data-target="#fqcollapseFour4" aria-expanded="false" aria-controls="fqcollapseFour4">
                                                                    <span class="faq-q-title">{{__('What is the proper way to shutdown ?')}}</span><i class="las la-angle-down float-right"></i>
                                                                </div>
                                                            </div>
                                                            <div id="fqcollapseFour4" class="collapse" aria-labelledby="fqheadingFour4" data-parent="#simple_faq1">
                                                                <div class="card-body">
                                                                    <p>{{__('Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.')}} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="fqheadingFive5">
                                                                <div class="mb-0" data-toggle="collapse" role="navigation" data-target="#fqcollapseFive5" aria-expanded="false" aria-controls="fqcollapseFive5">
                                                                    <span class="faq-q-title">{{__('How to start a computer ?')}}</span><i class="las la-angle-down float-right"></i>
                                                                </div>
                                                            </div>
                                                            <div id="fqcollapseFive5" class="collapse" aria-labelledby="fqheadingFive5" data-parent="#simple_faq1">
                                                                <div class="card-body">
                                                                    <p>{{__('Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.')}} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="fqheadingSix6">
                                                                <div class="mb-0" data-toggle="collapse" role="navigation" data-target="#fqcollapseSix6" aria-controls="fqcollapseSix6">
                                                                    <span class="faq-q-title">{{__('Which is the best browser ?')}}</span><i class="las la-angle-down float-right"></i>
                                                                </div>
                                                            </div>
                                                            <div id="fqcollapseSix6" class="collapse" aria-labelledby="fqheadingSix6" data-parent="#simple_faq1">
                                                                <div class="card-body">
                                                                    <p>{{__('Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.')}} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mt-5">
                                                <a class="btn btn-sm btn-warning" href="pages_faq.html">{{__('FAQ 1')}}</a>
                                                <a class="btn btn-sm btn-danger" href="pages_faq_2.html">{{__('FAQ 1')}}x</a>
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
