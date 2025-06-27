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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Typography')}}</span></li>
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
                            <div class="col-lg-6 layout-spacing d-none d-md-block">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Display Headings')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <h1 class="display-1">{{__('Display 1')}}</h1>
                                        <div class="clearfix"></div>
                                        <h1 class="display-2">{{__('Display 2')}}</h1>
                                        <div class="clearfix"></div>
                                        <h1 class="display-3">{{__('Display 3')}}</h1>
                                        <div class="clearfix"></div>
                                        <h1 class="display-4">{{__('Display 4')}}</h1>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Headings')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <h1>{{__('Heading 1')}}</h1>
                                        <p class="sub-header">
                                            {{__('Your awesome text goes here.')}}
                                        </p>
                                        <div class="clearfix"></div>
                                        <h2>{{__('Heading 2')}}</h2>
                                        <p class="sub-header">
                                            {{__('Your awesome text goes here.')}}
                                        </p>
                                        <div class="clearfix"></div>
                                        <h3>{{__('Heading 3')}}</h3>
                                        <p class="sub-header">
                                            {{__('Your awesome text goes here.')}}
                                        </p>
                                        <div class="clearfix"></div>
                                        <h4>{{__('Heading 4')}}</h4>
                                        <p class="sub-header">
                                            {{__('Your awesome text goes here.')}}
                                        </p>
                                        <div class="clearfix"></div>
                                        <h5>{{__('Heading 5')}}</h5>
                                        <p class="sub-header">
                                            {{__('Your awesome text goes here.')}}
                                        </p>
                                        <div class="clearfix"></div>
                                        <h6>{{__('Heading 6')}}</h6>
                                        <p class="sub-header">
                                            {{__('Your awesome text goes here.')}}
                                        </p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Inline text elements')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="sub-header">
                                            {{__('Your awesome text goes here.')}}
                                        </p>
                                        <p class="lead">
                                            {{__('Your title goes here')}}
                                        </p>
                                        <p>{{__('You can use the mark tag to')}} <mark>highlight</mark> {{__('text.')}}</p>
                                        <p><del>{{__('This line of text is meant to be treated as deleted text.')}}</del></p>
                                        <p><s>{{__('This line of text is meant to be treated as no longer accurate.')}}</s></p>
                                        <p><ins>{{__('This line of text is meant to be treated as an addition to the document.')}}</ins></p>
                                        <p><u>{{__('This line of text will render as underlined')}}</u></p>
                                        <p><small>{{__('This line of text is meant to be treated as fine print.')}}</small></p>
                                        <p><strong>{{__('This line rendered as bold text.')}}</strong></p>
                                        <p><em>{{__('This line rendered as italicized text.')}}</em></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Text Colors')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="text-success-teal">
                                            {{__('Etiam porta sem malesuada magna mollis euismod.')}}
                                        </p>
                                        <p class="text-muted">
                                            {{__('Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.')}}
                                        </p>
                                        <p class="text-primary">
                                            {{__('Nullam id dolor id nibh ultricies vehicula ut id elit.')}}
                                        </p>
                                        <p class="text-success">
                                            {{__('Duis mollis, est non commodo luctus, nisi erat porttitor ligula.')}}
                                        </p>
                                        <p class="text-info">
                                            {{__('Maecenas sed diam eget risus varius blandit sit amet non magna.')}}
                                        </p>
                                        <p class="text-warning">
                                            {{__('Etiam porta sem malesuada magna mollis euismod.')}}
                                        </p>
                                        <p class="text-danger">
                                            {{__('Donec ullamcorper nulla non metus auctor fringilla.')}}
                                        </p>
                                        <p class="text-dark">
                                            {{__('Nullam id dolor id nibh ultricies vehicula ut id elit.')}}
                                        </p>
                                        <p class="text-secondary m-b-0">
                                            {{__('Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.')}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Unordered List')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <ul>
                                            <li>
                                                {{__('Lorem ipsum dolor sit amet')}}
                                            </li>
                                            <li>
                                                {{__('Consectetur adipiscing elit')}}
                                            </li>
                                            <li>
                                                {{__('Integer molestie lorem at massa')}}
                                            </li>
                                            <li>
                                                {{__('Facilisis in pretium nisl aliquet')}}
                                            </li>
                                            <li>
                                                {{__('Nulla volutpat aliquam velit')}}
                                                <ul>
                                                    <li>
                                                        {{__('Phasellus iaculis neque')}}
                                                    </li>
                                                    <li>
                                                        {{__('Purus sodales ultricies')}}
                                                    </li>
                                                    <li>
                                                        {{__('Vestibulum laoreet porttitor sem')}}
                                                    </li>
                                                    <li>
                                                        {{__('Ac tristique libero volutpat at')}}
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                {{__('Faucibus porta lacus fringilla vel')}}
                                            </li>
                                            <li>
                                                {{__('Aenean sit amet erat nunc')}}
                                            </li>
                                            <li>
                                                {{__('Eget porttitor lorem')}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Ordered List')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <ol>
                                            <li>
                                                {{__('Lorem ipsum dolor sit amet')}}
                                            </li>
                                            <li>
                                                {{__('Consectetur adipiscing elit')}}
                                            </li>
                                            <li>
                                                {{__('Integer molestie lorem at massa')}}
                                            </li>
                                            <li>
                                                {{__('Facilisis in pretium nisl aliquet')}}
                                            </li>
                                            <li>
                                                {{__('Nulla volutpat aliquam velit')}}
                                                <ol>
                                                    <li>
                                                        {{__('Phasellus iaculis neque')}}
                                                    </li>
                                                    <li>
                                                        {{__('Purus sodales ultricies')}}
                                                    </li>
                                                    <li>
                                                        {{__('Vestibulum laoreet porttitor sem')}}
                                                    </li>
                                                    <li>
                                                        {{__('Ac tristique libero volutpat at')}}
                                                    </li>
                                                </ol>
                                            </li>
                                            <li>
                                                {{__('Faucibus porta lacus fringilla vel')}}
                                            </li>
                                            <li>
                                                {{__('Aenean sit amet erat nunc')}}
                                            </li>
                                            <li>
                                                {{__('Eget porttitor lorem')}}
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Unstyled')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="sub-header">
                                            <strong>{{__('This only applies to immediate children list items')}}
                                                </strong>, {{__('meaning you will need to add the class for any nested lists as well.')}}
                                        </p>
                                        <ul class="list-unstyled">
                                            <li>
                                                {{__('Lorem ipsum dolor sit amet')}}
                                            </li>
                                            <li>
                                                {{__('Integer molestie lorem at massa')}}
                                                <ul>
                                                    <li>
                                                        {{__('Phasellus iaculis neque')}}
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                {{__('Faucibus porta lacus fringilla vel')}}
                                            </li>
                                            <li>
                                                {{__('Eget porttitor lorem')}}
                                            </li>
                                        </ul>
                                        <h5>Inline</h5>
                                        <p class="text-muted m-b-15">
                                            {{__('Place all list items on a single line with ')}}<code>
                                                display: inline-block;</code>
                                            {{__('and some light padding.')}}
                                        </p>
                                        <ul class="list-inline m-b-0">
                                            <li class="list-inline-item">
                                                {{__('Lorem ipsum')}}
                                            </li>
                                            <li class="list-inline-item">
                                                {{__('Phasellus iaculis')}}
                                            </li>
                                            <li class="list-inline-item">
                                                {{__('Nulla volutpat')}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Blockquotes')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="sub-header">
                                            {{__('Your awesome text goes here.')}}
                                        </p>
                                        <blockquote class="blockquote">
                                            <p class="mb-0">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.')}}</p>
                                            <footer class="blockquote-footer">{{__('Someone famous in')}} <cite title="{{__('Source Title')}}">{{__('Source Title')}}</cite></footer>
                                        </blockquote>
                                        <p class="text-muted m-b-15 m-t-20">
                                            {{__('Use text utilities as needed to change the alignment of your blockquote.')}}
                                        </p>
                                        <blockquote class="blockquote text-center">
                                            <p class="mb-0">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.')}}</p>
                                            <footer class="blockquote-footer">{{__('Someone famous in')}} <cite title="{{__('Source Title')}}">{{__('Source Title')}}e</cite></footer>
                                        </blockquote>
                                        <blockquote class="blockquote text-right">
                                            <p class="mb-0">{{__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.')}}</p>
                                            <footer class="blockquote-footer">{{__('Someone famous in')}} <cite title="{__('Source Title')}}">{{__('Source Title')}}</cite></footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Description list alignment')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <p class="text-muted m-b-30">
                                            {{__('Align terms and descriptions horizontally by using our grid system’s predefined classes (or semantic mixins). For longer terms, you can optionally add a')}} <code class="highlighter-rouge">.text-truncate</code> {{__('class to truncate the text with an ellipsis.')}}
                                        </p>
                                        <dl class="row">
                                            <dt class="col-sm-3">{{__('Description lists')}}</dt>
                                            <dd class="col-sm-9">{{__('A description list is perfect for defining terms.')}}</dd>
                                            <dt class="col-sm-3">{{__('Euismod')}}</dt>
                                            <dd class="col-sm-9">
                                                <p>{{__('Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.')}}</p>
                                                <p>{{__('Donec id elit non mi porta gravida at eget metus.')}}</p>
                                            </dd>
                                            <dt class="col-sm-3">{{__('Malesuada porta')}}</dt>
                                            <dd class="col-sm-9">{{__('Etiam porta sem malesuada magna mollis euismod.')}}</dd>
                                            <dt class="col-sm-3 text-truncate">{{__('Truncated term is truncated')}}</dt>
                                            <dd class="col-sm-9">{{__('Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.')}}</dd>
                                            <dt class="col-sm-3">{{__('vNesting')}}</dt>
                                            <dd class="col-sm-9">
                                                <dl class="row">
                                                    <dt class="col-sm-4">{{__('Nested definition list')}}</dt>
                                                    <dd class="col-sm-8">{{__('Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc.')}}</dd>
                                                </dl>
                                            </dd>
                                        </dl>
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
