@extends('layout.master')

@push('plugin-styles')

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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Grid')}}</span></li>
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
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Grid options')}}</h4>
                                                <p class="ml-3">{{__('See how aspects of the Bootstrap grid system work across multiple devices with a handy table.')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped mb-0">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th class="text-center">
                                                        {{__('Extra small')}}<br>
                                                        <small>&lt;576px</small>
                                                    </th>
                                                    <th class="text-center">
                                                        {{__('Small')}}<br>
                                                        <small>≥576px</small>
                                                    </th>
                                                    <th class="text-center">
                                                        {{__('Medium')}}<br>
                                                        <small>≥768px</small>
                                                    </th>
                                                    <th class="text-center">
                                                        {{__('Large')}}<br>
                                                        <small>≥992px</small>
                                                    </th>
                                                    <th class="text-center">
                                                        {{__('Extra large')}}<br>
                                                        <small>≥1200px</small>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">{{__('Max container width')}}</th>
                                                    <td>{{__('None (auto)')}}</td>
                                                    <td>540px</td>
                                                    <td>720px</td>
                                                    <td>960px</td>
                                                    <td>1140px</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">{{__('Class prefix')}}</th>
                                                    <td><code>.col-</code></td>
                                                    <td><code>.col-sm-</code></td>
                                                    <td><code>.col-md-</code></td>
                                                    <td><code>.col-lg-</code></td>
                                                    <td><code>.col-xl-</code></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">{{__('# of columns')}}</th>
                                                    <td colspan="5">12</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">{{__('Gutter width')}}</th>
                                                    <td colspan="5">{{__('24px (12px on each side of a column)')}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">{{__('Nestable')}}</th>
                                                    <td colspan="5">{{__('Yes')}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-nowrap" scope="row">{{__('Yes')}}x</th>
                                                    <td colspan="5">{{__('Yes')}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Example')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="structure">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-12
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-11">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-11
                                                    </div>
                                                </div>
                                                <div class="col-lg-1">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-1
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-10">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-10
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-2
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-9
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-3
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-8
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-4
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-7">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-7
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-5
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-6
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-6
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-5
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-7
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-4
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-8
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-3
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-9
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-2
                                                    </div>
                                                </div>
                                                <div class="col-lg-10">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-10
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-1
                                                    </div>
                                                </div>
                                                <div class="col-lg-11">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-11
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-2
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-3
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-4
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-2
                                                    </div>
                                                </div>
                                                <div class="col-lg-1">
                                                    <div class="grid-container bg-light-dark p-3 mb-2">
                                                        col-lg-1
                                                    </div>
                                                </div>
                                            </div> <!-- end row -->
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
