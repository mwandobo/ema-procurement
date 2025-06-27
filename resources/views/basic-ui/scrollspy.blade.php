@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/basic-ui/scrollspy.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Scrollspy')}}</span></li>
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
                            <div class="col-lg-12 col-12 layout-spacing scroll-spy">
                                <div class="statbox widget box box-shadow mb-5 pb-3">
                                    <div class="card-body">
                                        <h4 class="header-title">{{__('Example in navbar')}}</h4>
                                        <p class="text-muted font-14 mb-3">{{__('If you scroll the area below you can see the active class changes. Open Dropdown and you will see the changes overthere too')}}</p>
                                        <nav id="navbar-example-one" class="navbar navbar-light bg-light">
                                            <a class="navbar-brand" href="#">{{__('Navbar')}}</a>
                                            <ul class="nav nav-pills">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#home">{{__('Home')}}</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#about">{{__('About')}}</a>
                                                </li>
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle arrow-none active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <i class="mdi mdi-chevron-down"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#one">{{__('Option 1')}}</a>
                                                        <a class="dropdown-item" href="#two">{{__('Option 3')}}</a>
                                                        <div role="separator" class="dropdown-divider"></div>
                                                        <a class="dropdown-item active" href="#three">{{__('Option 3')}}</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </nav>
                                        <div data-spy="scroll" data-target="#navbar-example-one" data-offset="0" class="scrollspy-example">
                                            <h5 id="home">{{__('Home')}}</h5>
                                            <p>
                                                {{__('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.')}}
                                            </p>
                                            <br>
                                            <h5 id="about">{{__('About')}}</h5>
                                            <p>
                                                {{__('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.')}}
                                            </p>
                                            <br>
                                            <h5 id="one">{{__('one')}}</h5>
                                            <p>
                                                {{__('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.')}}
                                            </p>
                                            <br>
                                            <h5 id="two">{{__('two')}}</h5>
                                            <p>
                                                {{__('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.')}}
                                            </p>
                                            <br>
                                            <h5 id="three"></h5>
                                            <p>
                                                {{__('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.')}}
                                            </p>
                                            <p>
                                                {{__('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.')}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="statbox widget box box-shadow mb-5 pb-3 example-2">
                                    <div class="card-body">
                                        <h4 class="header-title">{{__('Example with nested navbar')}}</h4>
                                        <p class="text-muted font-14 mb-3">{{__('Scrollspy also works with nested')}} <code>.nav</code> navbar.
                                            {{__('If a nested')}} <code>.nav</code> has <code>.active</code>{{__('class then its parents will also has active class')}}
                                            <code>.active</code>.</p>
                                        <div class="d-flex">
                                            <div class="col-2 p-4 bg-light">
                                                <nav id="navbar-example-two" class="navbar navbar-light flex-column align-items-start">
                                                    <a class="navbar-brand mb-2" href="#">{{__('Navbar')}}</a>
                                                    <nav class="nav nav-pills flex-column">
                                                        <a class="nav-link active" href="#item-1">{{__('Item 1')}}</a>
                                                        <nav class="nav nav-pills flex-column">
                                                            <a class="nav-link ml-3 my-1" href="#item-1-1">{{__('Item 1-1')}}</a>
                                                            <a class="nav-link ml-3 my-1" href="#item-1-2">{{__('Item 1-2')}}</a>
                                                        </nav>
                                                        <a class="nav-link" href="#item-2">{{__('Item 2')}}</a>
                                                        <a class="nav-link" href="#item-3">{{__('Item 3')}}</a>
                                                        <nav class="nav nav-pills flex-column">
                                                            <a class="nav-link ml-3 my-1" href="#item-3-1">{{__('Item 3-1')}}</a>
                                                            <a class="nav-link ml-3 my-1" href="#item-3-2">{{__('Item 3-2')}}</a>
                                                        </nav>
                                                    </nav>
                                                </nav>
                                            </div>
                                            <div class="col-10">
                                                <div data-spy="scroll" data-target="#navbar-example-two" data-offset="0" class="scrollspy-example" style="height: 320px;">
                                                    <h4 id="item-1">{{__('Item 1')}}</h4>
                                                    <p>
                                                        {{__('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.')}}
                                                    </p>
                                                    <br>
                                                    <h5 id="item-1-1">{{__('Item 1-1')}}</h5>
                                                    <p>
                                                        {{__('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.')}}
                                                    </p>
                                                    <br>
                                                    <h5 id="item-1-2">{{__('Item 1-2')}}</h5>
                                                    <p>
                                                        {{__('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.')}}
                                                    </p>
                                                    <br>
                                                    <h4 id="item-2">{{__('Item 2')}}</h4>
                                                    <p>
                                                        {{__('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.')}}
                                                    </p>
                                                    <br>
                                                    <h4 id="item-3">{{__('Item 3')}}</h4>
                                                    <p>
                                                        {{__('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.')}}
                                                    </p>
                                                    <br>
                                                    <h5 id="item-3-1">{{__('Item 3-1')}}</h5>
                                                    <p>
                                                        {{__('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.')}}
                                                    </p>
                                                    <h5 id="item-3-2">{{__('Item 3-2')}}</h5>
                                                    <p>
                                                        {{__('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.')}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="statbox widget box box-shadow mb-5 pb-3 example-3">
                                    <div class="card-body">
                                        <h4 class="header-title">{{__('Item 3-2')}}x</h4>
                                        <p class="text-muted font-14 mb-3">{{__('Scrollspy also works with list group')}}</p>
                                        <div class="d-flex">
                                            <div class="col-2 p-4 bg-light">
                                                <div id="navbar-example-three" class="list-group">
                                                    <a class="list-group-item list-group-item-action active" href="#list-item-1">{{__('Item 1')}}</a>
                                                    <a class="list-group-item list-group-item-action" href="#list-item-2">{{__('Item 2')}}</a>
                                                    <a class="list-group-item list-group-item-action" href="#list-item-3">{{__('Item 3')}}</a>
                                                    <a class="list-group-item list-group-item-action" href="#list-item-4">{{__('Item 4')}}</a>
                                                    <a class="list-group-item list-group-item-action" href="#list-item-5">{{__('Item 5')}}</a>
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div data-spy="scroll" data-target="#navbar-example-three" data-offset="0" class="scrollspy-example">
                                                    <h4 id="list-item-1">{{__('Item 1')}}</h4>
                                                    <p>
                                                        {{__('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.')}}
                                                    </p>
                                                    <br>
                                                    <h4 id="list-item-2">{{__('Item 2')}}</h4>
                                                    <p>
                                                        {{__('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.')}}
                                                    </p>
                                                    <br>
                                                    <h4 id="list-item-3">{{__('Item 3')}}</h4>
                                                    <p>
                                                        {{__('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.')}}
                                                    </p>
                                                    <br>
                                                    <h4 id="list-item-4">{{__('Item 4')}}</h4>
                                                    <p>
                                                        {{__('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.')}}
                                                    </p>
                                                    <br>
                                                    <h4 id="list-item-5">{{__('Item 5')}}</h4>
                                                    <p>
                                                        {{__('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.')}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
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
