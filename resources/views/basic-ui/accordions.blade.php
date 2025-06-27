@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/basic-ui/accordion.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Basic Ui')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Accordion')}}</span></li>
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
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing">
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div id="accordionBasic" class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Basic Accordion')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div id="toggleAccordion" class="basic-accordion">
                                            <div class="card">
                                                <div class="card-header" id="headingOne1">
                                                    <section class="mb-0 mt-0">
                                                        <div role="menu" class="collapsed" data-toggle="collapse" data-target="#defaultAccordionOne" aria-expanded="true" aria-controls="defaultAccordionOne">
                                                            {{__('Collapsible Group Item #1')}}
                                                        </div>
                                                    </section>
                                                </div>
                                                <div id="defaultAccordionOne" class="collapse" aria-labelledby="headingOne1" data-parent="#toggleAccordion">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <img class="mr-3 rounded-circle img-thumbnail" src="{{ url('assets/img/profile-13.jpg') }}" alt="Generic placeholder image">
                                                            <div class="media-body">
                                                                <h5 class="mt-0">{{__('Media heading')}}</h5>
                                                                <p>{{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.')}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo1">
                                                    <section class="mb-0 mt-0">
                                                        <div role="menu" class="collapsed" data-toggle="collapse" data-target="#defaultAccordionTwo" aria-expanded="false" aria-controls="defaultAccordionTwo">
                                                            {{__('Collapsible Group Item #2')}}
                                                        </div>
                                                    </section>
                                                </div>
                                                <div id="defaultAccordionTwo" class="collapse" aria-labelledby="headingTwo1" data-parent="#toggleAccordion">
                                                    <div class="card-body">
                                                        <blockquote class="blockquote text-right">
                                                            <p class="mb-0">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.')}}</p>
                                                            <footer class="blockquote-footer">{{__('Someone famous in')}} <cite title="{{__('Source Title')}}">{{__('Source Title')}}</cite></footer>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingThree1">
                                                    <section class="mb-0 mt-0">
                                                        <div role="menu" class="" data-toggle="collapse" data-target="#defaultAccordionThree" aria-expanded="false" aria-controls="defaultAccordionThree">
                                                            {{__('Collapsible Group Item #3')}}
                                                        </div>
                                                    </section>
                                                </div>
                                                <div id="defaultAccordionThree" class="collapse show" aria-labelledby="headingThree1" data-parent="#toggleAccordion">
                                                    <div class="card-body">
                                                        <p>{{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.')}}</p>
                                                        <button class="btn btn-sm btn-primary mt-4">{{__('Continue')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Click on link / Text to open accordion')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area icon-accordion-content">
                                        <div class="link-accordion" id="accordionExample">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <h2 class="mb-0 p-3 d-flex">
                                                        <a data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            {{__('Collapsible Group Item #1')}}
                                                        </a>
                                                    </h2>
                                                </div>
                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <p>{{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.')}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h2 class="mb-0 p-3 d-flex">
                                                        <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            {{__('Collapsible Group Item #2')}}
                                                        </a>
                                                    </h2>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <p>{{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.')}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingThree">
                                                    <h2 class="mb-0 p-3 d-flex">
                                                        <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            {{__('Collapsible Group Item #3')}}
                                                        </a>
                                                    </h2>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <p>{{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.')}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row layout-top-spacing">
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div id="accordionBasic" class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Basic Accordion With Icon')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div id="toggleAccordionWithIcon" class="basic-accordion-icon">
                                            <div class="card">
                                                <div class="card-header" id="basicAccordionIconheadingOne">
                                                    <section class="mb-0 mt-0">
                                                        <div role="menu" class="collapsed" data-toggle="collapse" data-target="#basicAccordionIconOne" aria-expanded="true" aria-controls="basicAccordionIconOne">
                                                            <i class="las la-home font-20"></i> {{__('Collapsible Group Item #1')}}  <div class="icons"><i class="las la-angle-down"></i></div>
                                                        </div>
                                                    </section>
                                                </div>
                                                <div id="basicAccordionIconOne" class="collapse" aria-labelledby="basicAccordionIconheadingOne" data-parent="#toggleAccordionWithIcon">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <img class="mr-3 rounded-circle img-thumbnail" src="{{ url('assets/img/profile-13.jpg') }}" alt="Generic placeholder image">
                                                            <div class="media-body">
                                                                <h5 class="mt-0">{{__('Media heading')}}</h5>
                                                                <p>{{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.')}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="basicAccordionIconheadingTwo">
                                                    <section class="mb-0 mt-0">
                                                        <div role="menu" class="collapsed" data-toggle="collapse" data-target="#basicAccordionIconTwo" aria-expanded="false" aria-controls="basicAccordionIconTwo">
                                                            <i class="las la-user font-20"></i> {{__('Collapsible Group Item #2')}}  <div class="icons"><i class="las la-angle-down"></i></div>
                                                        </div>
                                                    </section>
                                                </div>
                                                <div id="basicAccordionIconTwo" class="collapse" aria-labelledby="basicAccordionIconheadingTwo" data-parent="#toggleAccordionWithIcon">
                                                    <div class="card-body">
                                                        <blockquote class="blockquote text-right">
                                                            <p class="mb-0">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.')}}</p>
                                                            <footer class="blockquote-footer">{{__('Someone famous in')}} <cite title="{{__('Source Title')}}">{{__('Source Title')}}</cite></footer>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="basicAccordionIconheadingThree">
                                                    <section class="mb-0 mt-0">
                                                        <div role="menu" class="" data-toggle="collapse" data-target="#basicAccordionIconThree" aria-expanded="false" aria-controls="basicAccordionIconThree">
                                                            <i class="las la-tree font-20"></i> {{__('Collapsible Group Item #3')}} <div class="icons"><i class="las la-angle-down"></i></div>
                                                        </div>
                                                    </section>
                                                </div>
                                                <div id="basicAccordionIconThree" class="collapse show" aria-labelledby="basicAccordionIconheadingThree" data-parent="#toggleAccordionWithIcon">
                                                    <div class="card-body">
                                                        <p>{{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.')}}</p>
                                                        <button class="btn btn-sm btn-primary mt-4">{{__('Continue')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div id="accordionBasic" class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Basic Accordion With Icon Rotate')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div id="toggleAccordionWithIconRotate" class="basic-accordion-icon rotate">
                                            <div class="card">
                                                <div class="card-header" id="basicAccordionIconheadingRotateOne">
                                                    <section class="mb-0 mt-0">
                                                        <div role="menu" class="collapsed" data-toggle="collapse" data-target="#basicAccordionIconRotateOne" aria-expanded="true" aria-controls="basicAccordionIconRotateOne">
                                                            <i class="las la-home font-20"></i> {{__('Collapsible Group Item #1')}}  <div class="icons"><i class="las la-angle-up has-rotate"></i></div>
                                                        </div>
                                                    </section>
                                                </div>
                                                <div id="basicAccordionIconRotateOne" class="collapse" aria-labelledby="basicAccordionIconheadingRotateOne" data-parent="#toggleAccordionWithIconRotate">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <img class="mr-3 rounded-circle img-thumbnail" src="{{ url('assets/img/profile-13.jpg') }}" alt="Generic placeholder image">
                                                            <div class="media-body">
                                                                <h5 class="mt-0">{{__('Media heading')}}</h5>
                                                                {{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.')}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="basicAccordionIconheadingRotateTwo">
                                                    <section class="mb-0 mt-0">
                                                        <div role="menu" class="collapsed" data-toggle="collapse" data-target="#basicAccordionIconRotateTwo" aria-expanded="false" aria-controls="basicAccordionIconRotateTwo">
                                                            <i class="las la-user font-20"></i> {{__('Collapsible Group Item #2')}}  <div class="icons"><i class="las la-angle-up has-rotate"></i></div>
                                                        </div>
                                                    </section>
                                                </div>
                                                <div id="basicAccordionIconRotateTwo" class="collapse" aria-labelledby="basicAccordionIconheadingRotateTwo" data-parent="#toggleAccordionWithIconRotate">
                                                    <div class="card-body">
                                                        <blockquote class="blockquote text-right">
                                                            <p class="mb-0">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.')}}</p>
                                                            <footer class="blockquote-footer">{{__('Someone famous in')}} <cite title="{{__('Source Title')}}">{{__('Source Title')}}</cite></footer>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="basicAccordionIconheadingRotateThree">
                                                    <section class="mb-0 mt-0">
                                                        <div role="menu" class="" data-toggle="collapse" data-target="#basicAccordionIconRotateThree" aria-expanded="false" aria-controls="basicAccordionIconRotateThree">
                                                            <i class="las la-tree font-20"></i> {{__('Collapsible Group Item #3')}} <div class="icons"><i class="las la-angle-up has-rotate"></i></div>
                                                        </div>
                                                    </section>
                                                </div>
                                                <div id="basicAccordionIconRotateThree" class="collapse show" aria-labelledby="basicAccordionIconheadingRotateThree" data-parent="#toggleAccordionWithIconRotate">
                                                    <div class="card-body">
                                                        <p>{{__('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.')}}</p>
                                                        <button class="btn btn-sm btn-primary mt-4">{{__('Continue')}}</button>
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
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
@endpush

@push('custom-scripts')

@endpush
