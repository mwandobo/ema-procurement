@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/jquery-ui/jquery-ui.min.css') !!}
    {!! Html::style('plugins/dropzone/dropzone.min.css') !!}
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
                                <li class="breadcrumb-item" aria-current="page"><a href="{{url('/apps/ecommerce/dashboard')}}"> {{__('Ecommerce')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Add product')}}</span></li>
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
                        <div class="card-box add-product">
                            <h6> {{__('Basic Information')}}</h6>
                            <p class="mb-4"> {{__('Fill all information below')}}</p>
                            <form class="">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="productname" class="strong"> {{__('Product Name')}}</label>
                                            <input id="productname" name="productname" type="text" class="form-control form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="manufacturername" class=""> {{__('Manufacturer Name')}}</label>
                                            <input id="manufacturername" name="manufacturername" type="text" class="form-control form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="manufacturerbrand" class=""> {{__('Manufacturer Brand')}}</label>
                                            <input id="manufacturerbrand" name="manufacturerbrand" type="text" class="form-control form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="price" class=""> {{__('Price')}}</label>
                                            <input id="price" name="price" type="text" class="form-control form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label"> {{__('Category')}}</label>
                                            <select class="form-control select2">
                                                <option>{{__('Select')}}</option>
                                                <option value="AK"> {{__('Alaska')}}</option>
                                                <option value="HI"> {{__('Hawaii')}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tag" class="">{{__('Apps')}}Tag</label>
                                            <input id="tag" name="tag" type="text" class="form-control form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="productdesc" class="">{{__('Product Description')}}</label>
                                            <textarea class="form-control" id="productdesc" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="mr-1 btn btn-sm btn-primary">{{__('Save Changes')}}</button>
                                <button type="submit" class="btn btn-sm btn-dark">{{__('Cancel')}}</button>
                            </form>
                        </div>
                        <div class="card-box add-product">
                            <h6 class="mb-4">{{__('Product Image')}}</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="dropzone">
                                        <form action="/upload" class="dropzone needsclick dz-clickable" id="demo-upload">
                                            <div class="dz-message needsclick">
                                                <button type="button" class="dz-button">{{__('Drop files here or click to upload.')}}</button>
                                                <br>
                                                <span class="note needsclick">{{__('(This is just a demo dropzone. Selected files are')}} <strong>{{__('not')}}</strong> {{__('actually uploaded.)')}}</span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-box add-product">
                            <h6>{{__('Meta Data')}}</h6>
                            <p class="mb-4">{{__('Fill all information below')}}</p>
                            <form class="">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="metatitle" class="">{{__('Meta title')}}</label>
                                            <input id="metatitle" name="productname" type="text" class="form-control form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="metakeywords" class="">{{__('Meta Keywords')}}</label>
                                            <input id="metakeywords" name="manufacturername" type="text" class="form-control form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="metadescription" class="">{{__('Meta Description')}}</label>
                                            <textarea class="form-control" id="metadescription" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
    {!! Html::script('plugins/dropzone/dropzone.min.js') !!}
@endpush

@push('custom-scripts')

@endpush
