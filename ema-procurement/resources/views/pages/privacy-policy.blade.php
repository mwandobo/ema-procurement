@extends('layout.master-auth')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/pages/privacy_policy.css') !!}
@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="privacy-header-wrapper">
        <nav class="navbar navbar-expand">
            <div class="container">
                <a class="navbar-brand" href="index-2.html">NEPTUNE</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">{{__('Dashboard')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="pages_contact_us.html">{{__('Contact Us')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row mt-5 pb-5">
                <div class="col-md-12 align-self-center order-md-0 order-1 mt-4">
                    <h1 class="text-center mb-2">{{__('Privacy Policy')}}</h1>
                    <p class="text-center mb-5">{{__('Effortless User Data Privacy')}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-3 pb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="privacy-container">
                    <div class="row">
                        <div class="col-md-6 single-privacy-option-left">
                            <h5>{{__('Privacy Policy')}}</h5>
                            <img src="{{ url('assets/img/privacy-img.png') }}" />
                            <p>{{__('Lorem ipsum dolor sit amet, consectetur elit sed adipisicing , sed do eiusmod tempor incididunt utafi labore et dolore magna aliqua')}}</p>
                            <a href="#">{{__('Learn More')}}</a>
                        </div>
                        <div class="col-md-6 single-privacy-option-right">
                            <h5>{{__('Hi')}}Terms of usage</h5>
                            <img src="{{ url('assets/img/terms-img.png') }}" />
                            <p>{{__('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur la casa de papel dolore magna aliqua')}}</p>
                            <a href="#">{{__('Learn More')}}</a>
                        </div>
                    </div>
                </div>
                <div class="privacy-details">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2>{{__('Privacy Policy')}}</h2>
                            <p>{{__('Last Updated on 02.02.2020')}}</p>
                        </div>
                        <div>
                            <a href="#" class="text-primary privacy-btn-container mr-3">
                                <i class="las la-share font-30 mr-1"></i> {{__('Share')}}
                            </a>
                            <a href="#" class="text-primary privacy-btn-container">
                                <i class="las la-print font-30 mr-1"></i> {{__('Print')}}
                            </a>
                        </div>
                    </div>
                    <hr>
                    <h5>{{__('Required by Law')}}</h5>
                    <p>
                        {{__('The most important reason Privacy Policies are useful is because you\'re most likely required by the law to have one posted on your website. The applicable laws in your region or the region you\'re conducting business in may require you to include and abide by certain clauses in your Privacy Policy.
                        For instance, in the United States, the California Online Privacy Protection Act (CalOPPA) requires websites that collect personal information from the residents of the state of California to include a statement in their Privacy Policy that discloses how you handle their information. Since there isn\'t a way to filter out visitors from California, you\'re likely required to comply with CalOPPA even if your website is ran from a location nowhere near California.')}}
                    </p>
                    <br>
                    <h5>{{__('Required by Third Party Services')}}</h5>
                    <p>{{__('Most of the third party services you use to improve your website\'s user experience, monitor analytics or display advertisements also require you to post a Privacy Policy on your website.')}}
                        {{__('According to their requirements, you should include clauses that disclose how you use these third party services, APIs, SDKs, plugins, etc.')}}
                        <br><br>
                        {{__('Some of the most popular third party services that require you to post a Privacy Policy on your website include:')}}
                        <br><br>
                        {{__('Google Analytics')}}<br>
                        {{__('Google AdSense')}}<br>
                        {{__('Google AdWords')}}<br>
                        {{__('Amazon Affiliates')}}<br>
                        {{__('ClickBank')}}<br>
                        {{__('Twitter Lead Generation')}}<br>
                        {{__('Facebook Apps')}}<br>
                        {{__('Google Play Store')}}<br>
                        {{__('Apple\'s App Store')}}<br><br>
                        {{__('Analytics services work by placing cookies on your visitors\' devices and then collecting information about them when they visit your website, such as which device(s) they use, browsing activities, etc.')}}
                        <br><br>
                        {{__('This is why third party services (like Google Analytics) require you to post a Privacy Policy that discloses your usage of their services and cookies.')}}</p>
                    <br>
                    <h5>{{__('Transparency')}}</h5>
                    <p>{{__('As more and more people online are becoming aware of privacy laws, having a Privacy Policy displayed on your website that discloses how you gather and handle your visitors\' personal information is a great way to build trust and help your website users feel secure.')}}
                        <br><br>
                        {{__('It\'s a good practice to follow even if you\'re not collecting any sort of personal information from your website\'s visitors. This is because Privacy Policies are increasingly prevalent. If a visitor sees that you don\'t have one published, she may be led to believe that you do, in fact, collect information from your visitors but aren\'t disclosing it. It\'s better to have one posted that states that you do not collect any information from your site\'s visitors. This is especially true for blogs.')}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('assets/js/pages/faq/faq.js') !!}
@endpush

@push('custom-scripts')

@endpush
