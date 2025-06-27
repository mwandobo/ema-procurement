@extends('layout.master-auth')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/pages/faq/faq.css') !!}
@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="fq-header-wrapper">
        <nav class="navbar navbar-expand">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">NEPTUNE</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}"> {{__('Dashboard')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="{{ url('/pages/contact-us') }}">{{__('Contact Us')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12 align-self-center order-md-0 order-1 mt-5">
                    <h1 class="text-center mb-5">{{__('Hello, How can we help ?')}}</h1>
                    <div class="faq-input-group mb-4">
                        <i class="las la-search faq-input-icon"></i>
                        <input id="text" name="text" required class="faq-input" type="text" value="" placeholder="{{__('Ask a question')}}" />
                        <button type="submit" class="btn btn-primary" value="">{{__('Search')}}</button>
                    </div>
                    <p class="text-center">{{__('or choose a category to quickly find the help you need')}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="faq container mb-5 pb-5">
        <ul class="nav nav-pills justify-content-center mb-5 mt-5" id="pills-tab" role="tablist">
            <li class="nav-item m-4">
                <a class="active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                    <i class="lar la-flag"></i>
                    {{__('Getting Started')}}
                </a>
            </li>
            <li class="nav-item m-4">
                <a class="" id="pills-plan-tab" data-toggle="pill" href="#pills-plan" role="tab" aria-controls="pills-plan" aria-selected="false">
                    <i class="las la-list"></i>
                    {{__('Our Plans')}}
                </a>
            </li>
            <li class="nav-item m-4">
                <a class="" id="pills-question-tab" data-toggle="pill" href="#pills-question" role="tab" aria-controls="pills-question" aria-selected="false">
                    <i class="las la-question"></i>
                    {{__('General Questions')}}x
                </a>
            </li>
            <li class="nav-item m-4">
                <a class="" id="pills-usage-tab" data-toggle="pill" href="#pills-usage" role="tab" aria-controls="pills-usage" aria-selected="false">
                    <i class="las la-book"></i>
                    {{__('Usage Guides')}}
                </a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active text-center" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <h4>{{__('Getting Started')}}</h4>
                <p class="mb-5">{{__('This page is an overview of the documentation and related resources.')}}</p>
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="fqheadingOne">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseOne" aria-expanded="false" aria-controls="fqcollapseOne">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('How to install ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseOne" class="collapse" aria-labelledby="fqheadingOne" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="fqheadingTwo">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseTwo" aria-expanded="false" aria-controls="fqcollapseTwo">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('What is the primary requirement ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseTwo" class="collapse" aria-labelledby="fqheadingTwo" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="fqheadingThird">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseThird" aria-expanded="false" aria-controls="fqcollapseThird">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('How can i customize the main page ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseThird" class="collapse" aria-labelledby="fqheadingThird" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="fqheadingFour">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseFour" aria-expanded="false" aria-controls="fqcollapseFour">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('How secure are your payment information ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseFour" class="collapse" aria-labelledby="fqheadingFour" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="fqheadingFive">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseFive" aria-expanded="false" aria-controls="fqcollapseFive">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('Can i upload the files to the server without package.json ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseFive" class="collapse" aria-labelledby="fqheadingFive" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="fqheadingSix">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseSix" aria-expanded="false" aria-controls="fqcollapseSix">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('Do i need to pay full amount ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseSix" class="collapse" aria-labelledby="fqheadingSix" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade text-center" id="pills-plan" role="tabpanel" aria-labelledby="pills-plan-tab">
                <h4>{{__('Our Plans')}}</h4>
                <p class="mb-5">{{__('You will get all the pricing related queries here.')}}</p>
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="fqheadingOne">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseOne" aria-expanded="false" aria-controls="fqcollapseOne">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('Do i need to pay full amount?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseOne" class="collapse" aria-labelledby="fqheadingOne" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="fqheadingTwo">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseTwo" aria-expanded="false" aria-controls="fqcollapseTwo">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('What is the primary requirement ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseTwo" class="collapse" aria-labelledby="fqheadingTwo" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="fqheadingThird">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseThird" aria-expanded="false" aria-controls="fqcollapseThird">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('How can i customize the main page ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseThird" class="collapse" aria-labelledby="fqheadingThird" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="fqheadingFour">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseFour" aria-expanded="false" aria-controls="fqcollapseFour">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('How secure are your payment information ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseFour" class="collapse" aria-labelledby="fqheadingFour" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="fqheadingFive">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseFive" aria-expanded="false" aria-controls="fqcollapseFive">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('Can i upload the files to the server without package.json ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseFive" class="collapse" aria-labelledby="fqheadingFive" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="fqheadingSix">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseSix" aria-expanded="false" aria-controls="fqcollapseSix">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('Do i need to pay full amount ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseSix" class="collapse" aria-labelledby="fqheadingSix" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade text-center" id="pills-question" role="tabpanel" aria-labelledby="pills-question-tab">
                <h4> {{__('General Questions')}}</h4>
                <p class="mb-5">{{__('All the general and common questions are listed down here.')}}</p>
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="fqheadingOne">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseOne" aria-expanded="false" aria-controls="fqcollapseOne">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('How to open a file ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseOne" class="collapse" aria-labelledby="fqheadingOne" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="fqheadingTwo">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseTwo" aria-expanded="false" aria-controls="fqcollapseTwo">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('What is the primary requirement ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseTwo" class="collapse" aria-labelledby="fqheadingTwo" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="fqheadingThird">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseThird" aria-expanded="false" aria-controls="fqcollapseThird">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('How can i customize the main page ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseThird" class="collapse" aria-labelledby="fqheadingThird" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="fqheadingFour">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseFour" aria-expanded="false" aria-controls="fqcollapseFour">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('How secure are your payment information ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseFour" class="collapse" aria-labelledby="fqheadingFour" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="fqheadingFive">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseFive" aria-expanded="false" aria-controls="fqcollapseFive">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('Can i upload the files to the server without package.json ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseFive" class="collapse" aria-labelledby="fqheadingFive" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="fqheadingSix">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseSix" aria-expanded="false" aria-controls="fqcollapseSix">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('Do i need to pay full amount ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseSix" class="collapse" aria-labelledby="fqheadingSix" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade text-center" id="pills-usage" role="tabpanel" aria-labelledby="pills-usage-tab">
                <h4> {{__('Usage Guides')}}</h4>
                <p class="mb-5">{{__('This guide will help you to understand the app in a better way.')}}</p>
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="fqheadingOne">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseOne" aria-expanded="false" aria-controls="fqcollapseOne">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('What is the condition of using the app ?')}} </span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseOne" class="collapse" aria-labelledby="fqheadingOne" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="fqheadingTwo">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseTwo" aria-expanded="false" aria-controls="fqcollapseTwo">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('What is the primary requirement ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseTwo" class="collapse" aria-labelledby="fqheadingTwo" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="fqheadingThird">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseThird" aria-expanded="false" aria-controls="fqcollapseThird">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('How can i customize the main page ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseThird" class="collapse" aria-labelledby="fqheadingThird" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="fqheadingFour">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseFour" aria-expanded="false" aria-controls="fqcollapseFour">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('How secure are your payment information ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseFour" class="collapse" aria-labelledby="fqheadingFour" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="fqheadingFive">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseFive" aria-expanded="false" aria-controls="fqcollapseFive">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('Can i upload the files to the server without package.json ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseFive" class="collapse" aria-labelledby="fqheadingFive" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="fqheadingSix">
                            <div class="mb-0 collapsed" data-toggle="collapse" role="navigation" data-target="#fqcollapseSix" aria-expanded="false" aria-controls="fqcollapseSix">
                                <span class="round-dot"></span>
                                <span class="faq-q-title">{{__('Do i need to pay full amount ?')}}</span>
                                <div class="faq-arrow-container">
                                    <i class="las la-angle-up"></i>
                                </div>
                            </div>
                        </div>
                        <div id="fqcollapseSix" class="collapse" aria-labelledby="fqheadingSix" data-parent="#accordionExample" >
                            <div class="card-body">
                                <p>{{__('It\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.')}} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
    @include('include.footer')
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/js/libs/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
    <script src="{{ asset('assets/js/pages/faq/faq.js') }}"></script>
@endpush

@push('custom-scripts')

@endpush
