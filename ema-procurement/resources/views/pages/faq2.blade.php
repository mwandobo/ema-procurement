@extends('layout.master-auth')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/pages/faq/faq2.css') !!}
@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="fq-header-wrapper">
        <nav class="navbar navbar-expand">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/dashboard/dashboard2') }}">NEPTUNE</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboard/dashboard1') }}">{{__('Dashboard')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="{{ url('/pages/contact-us') }}">{{__('Contact Us')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row mt-5 pb-5">
                <div class="col-md-12 align-self-center order-md-0 order-1 mt-5">
                    <h1 class="text-center mb-2">{{__('FAQ')}}</h1>
                    <p class="text-center mb-5">{{__('Frequently Asked Questions')}}</p>
                </div>
                <img src="{{ url('assets/img/baloon.png') }}" class="first-baloon"/>
                <img src="{{ url('assets/img/baloon.png') }}" class="second-baloon"/>
                <img src="{{ url('assets/img/baloon.png') }}" class="third-baloon"/>
                <img src="{{ url('assets/img/baloon.png') }}" class="fourth-baloon"/>
            </div>
        </div>
    </div>
    <div class="faq container mb-3 pb-3">
        <div class="row">
            <div class="col-md-8 left-content mt-4 pt-4 mb-5 pb-5 pr-5">
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
                                <div class="d-flex align-center justify-content-end mt-3">
                                    <p class="helpfull-heading">{{__('Found this helpfull ?')}}</p>
                                    <div class="login-one-inputs check">
                                        <input class="inp-cbx" id="cbx" type="checkbox" style="display: none">
                                        <label class="cbx" for="cbx">
                                            <span>
                                                <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                </svg>
                                            </span>
                                            <span class="text-light-black">{{__('Yes')}}</span>
                                        </label>
                                    </div>
                                </div>
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
                                <div class="d-flex align-center justify-content-end mt-3">
                                    <p class="helpfull-heading">{{__('Found this helpfull ?')}}</p>
                                    <div class="login-one-inputs check">
                                        <input class="inp-cbx" id="cbx2" type="checkbox" style="display: none">
                                        <label class="cbx" for="cbx2">
                                            <span>
                                                <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                </svg>
                                            </span>
                                            <span class="text-light-black">{{__('Yes')}}</span>
                                        </label>
                                    </div>
                                </div>
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
            <div class="col-md-4">
                <div class="question-form">
                    <h6>{{__('Ask a question')}}</h6>
                    <p>{{__('Please fill out the form to ask question')}}</p>
                    <form>
                        <input id="name" name="name" required class="faq-input" type="text" value="" placeholder="{{__('Name')}}" />
                        <input id="email" name="email" required class="faq-input" type="email" value="" placeholder="{{__('Email')}}" />
                        <textarea placeholder="Question" class="faq-input"></textarea>
                        <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                    </form>
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
