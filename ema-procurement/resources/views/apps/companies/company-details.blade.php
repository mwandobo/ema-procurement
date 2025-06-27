@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/ui-elements/pagination.css') !!}
    {!! Html::style('assets/css/forms/theme-checkbox-radio.css') !!}
    {!! Html::style('plugins/jquery-ui/jquery-ui.min.css') !!}
    {!! Html::style('assets/css/apps/companies.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('Apps')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Company Details')}}</span></li>
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
                        <div class="card-box">
                            <div class="row w-100">
                                <div class="col-xl-12 col-lg-12 align-self-center w-100">
                                    <a href="{{ url('/apps/companies/lists') }}" class="btn btn-sm btn-primary p-1"><i class="las la-arrow-left"></i> {{__('Back')}}</a>
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-8 company-detail-container mt-5">
                                    <div class="d-flex align-items-start">
                                        <img src="{{ url('assets/img/company-1.jpg') }}" alt="avatar">
                                        <div class="company-info">
                                            <p class="name mb-1"> {{__('Cube House')}}</p>
                                            <p class="text-muted font-12 mb-1"><i class="las la-map-marker font-15"></i> {{__('Chicago, USA')}}</p>
                                            <a class="text-primary font-12 mb-2 d-block" href="#"> {{__('www.domainname.com')}}</a>
                                            <p> {{__('Cube House is an American multinational technology conglomerate headquartered in California. It was popularised in the 1960s with the release of Letraset sheets containing more recently with desktop publishing software like Aldus PageMaker.')}}</p>
                                            <div class="d-flex">
                                                <a class="btn btn-sm btn-outline-primary mr-2"> {{__('Send Mail')}}</a>
                                                <a class="btn btn-sm btn-primary"> {{__('Call Now')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 company-detail-container mt-5">
                                    <div class="company-info-right">
                                        <p> {{__('Total Projects :')}} <a> {{__('10')}}</a></p>
                                        <p> {{__('Team Members :')}} <a> {{__('17')}}</a></p>
                                        <p> {{__('Status :')}} <a class="badge badge-success text-light"> {{__('Active')}}</a></p>
                                        <p> {{__('Partnered Since :')}} <a> {{__('2001')}}</a></p>
                                        <p> {{__('No. of Years :')}} <a> {{__('19 yrs')}}</a></p>
                                        <div class="d-flex social-media align-items-center justify-content-between">
                                            <p class="mb-0"> {{__('Connect :')}} </p>
                                            <div>
                                                <a href=""><i class="lab la-facebook-square"></i></a>
                                                <a href=""><i class="lab la-twitter"></i></a>
                                                <a href=""><i class="lab la-linkedin-in"></i></a>
                                                <a href=""><i class="lab la-github"></i></a>
                                                <a href=""><i class="lab la-dribbble"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tab Starts -->
                        <div class="card-box">
                            <div class="w-100 animated-underline-content">
                                <ul class="nav nav-tabs  mb-3" id="lineTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="underline-about-tab" data-toggle="tab" href="#underline-about" role="tab" aria-controls="underline-about" aria-selected="true"> {{__('About')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="underline-project-tab" data-toggle="tab" href="#underline-project" role="tab" aria-controls="underline-project" aria-selected="false"> {{__('Projects')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="underline-team-tab" data-toggle="tab" href="#underline-team" role="tab" aria-controls="underline-team" aria-selected="false"> {{__('Team')}}</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="lineTabContent-3">
                                    <div class="tab-pane fade show active" id="underline-about" role="tabpanel" aria-labelledby="underline-about-tab">
                                        <div class="d-flex flex-wrap">
                                            <div class="col-xl-3 col-lg-4 col-md-4">
                                                <div class="contact-info mb-4">
                                                    <p><a href="#"><i class="las la-globe"></i> {{__('www.domainname.com')}}</a></p>
                                                    <p><a href="#"><i class="lar la-envelope"></i> {{__('info@mail.com')}}</a></p>
                                                    <p><a href="#"><i class="lar la-envelope"></i> {{__('contact@mail.com')}}</a></p>
                                                    <p><a href="#"><i class="las la-phone"></i> {{__('(+1) 458 5857 578')}}</a></p>
                                                    <p><a href="#"><i class="las la-phone"></i> {{__('(+91) 689 4586 102')}}</a></p>
                                                </div>
                                                <div class="contact-info mb-4">
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10746.967560723306!2d-119.86682531362423!3d36.79233081031697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCalifornia%2C%20USA!5e0!3m2!1sen!2sin!4v1593079394959!5m2!1sen!2sin" width="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-4 col-md-4">
                                                <div class="contact-info mb-4">
                                                    <p class="strong"> {{__('About')}}</p>
                                                    <p class="font-12"> {{__('Cube House is an American multinational technology conglomerate headquartered in California. It was popularised in the 1960s with the release of Letraset sheets containing more recently with desktop publishing software like Aldus PageMaker.Cube House is an American multinational technology conglomerate headquartered in California. It was popularised in the 1960s with the release of Letraset sheets containing more recently with desktop publishing software like Aldus PageMaker.')}}</p>
                                                    <hr>
                                                    <p class="strong"> {{__('Skills')}}</p>
                                                    <div class="d-flex flex-wrap align-items-center skills-container">
                                                        <span> {{__('.Net')}}</span>
                                                        <span> {{__('Java')}}</span>
                                                        <span> {{__('Node JS')}}</span>
                                                        <span> {{__('Javascript')}}</span>
                                                        <span> {{__('Angular JS')}}</span>
                                                        <span> {{__('PHP')}}</span>
                                                        <span> {{__('Laravel')}}</span>
                                                        <span> {{__('AWS Server')}}</span>
                                                        <span> {{__('Cake PHP')}}</span>
                                                        <span> {{__('Ionic')}}</span>
                                                        <span> {{__('React')}}</span>
                                                        <span> {{__('Vue')}}</span>
                                                        <span> {{__('Flutter')}}</span>
                                                    </div>
                                                    <hr>
                                                    <p class="strong"> {{__('Language Preferred')}}</p>
                                                    <div class="d-flex flex-wrap align-items-center language-container">
                                                        <a class="d-flex mr-3">
                                                            <img src="{{ url('assets/img/flag/usa-flag.png') }}" class="flag-width" alt="flag">
                                                            <span class="align-self-center">&nbsp;{{__('English')}}</span>
                                                        </a>
                                                        <a class="d-flex mr-3">
                                                            <img src="{{ url('assets/img/flag/spain-flag.png') }}" class="flag-width" alt="flag">
                                                            <span class="align-self-center">&nbsp;{{__('Spanish')}}</span>
                                                        </a>
                                                        <a class="d-flex">
                                                            <img src="{{ url('assets/img/flag/france-flag.png') }}" class="flag-width" alt="flag">
                                                            <span class="align-self-center">&nbsp;{{__('French')}}</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4">
                                                <div class="contact-info mb-4">
                                                    <div class="right-big-banner">
                                                        <img src="{{ url('assets/img/company-8.jpg') }}" class="img" alt="logo">
                                                        <p class="project-name"> {{__('Track Ongoing Project')}}</p>
                                                        <p class="project-date"> {{__('Started on 19 July 2020')}}</p>
                                                        <button class="btn btn-sm btn-primary mb-2">
                                                            Details
                                                        </button>
                                                        <p class="text-center font-11"><a class="text-primary" href=""> {{__('Learn More')}}</a></p>
                                                    </div>
                                                </div>
                                                <div class="contact-info mb-2">
                                                    <div class="right-big-banner">
                                                        <img src="{{ url('assets/img/company-5.jpg') }}" class="img" alt="logo">
                                                        <p class="project-name"> {{__('Track Ongoing Project')}}</p>
                                                        <p class="project-date"> {{__('Started on 08 August 2020')}}</p>
                                                        <button class="btn btn-sm btn-primary mb-2">
                                                            Details
                                                        </button>
                                                        <p class="text-center font-11"><a class="text-primary" href=""> {{__('Learn More')}}</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Projects -->
                                    <div class="tab-pane fade" id="underline-project" role="tabpanel" aria-labelledby="underline-project-tab">
                                        <div class="row w-100 m-0">
                                            <div class="col-xl-3 col-lg-4 col-md-4 mb-4">
                                                <div class="card single-project">
                                                    <img src="{{ url('assets/img/company-7.jpg') }}" class="card-img-top" alt="widget-card-2">
                                                    <div class="card-body">
                                                        <p class="meta-date"> {{__('25 Sep 2019')}}</p>
                                                        <h5 class="card-title"> {{__('Hightech Software')}}</h5>
                                                        <p class="card-text"> {{__('Node JS, Angular, AWS, Cloudinary Platform')}}</p>
                                                        <div class="team">
                                                            <img src="{{ url('assets/img/profile-1.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-2.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-3.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-4.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                        </div>
                                                        <div class="meta-info">
                                                            <div class="meta-action">
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Completed :')}}</span> <span> {{__('31%')}}</span>
                                                                </div>
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Team Size :')}}</span><span> {{__('40')}}</span>
                                                                </div>
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Deadline :')}}</span><span> {{__('31 Sep 2020')}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 mb-4">
                                                <div class="card single-project">
                                                    <img src="{{ url('assets/img/company-8.jpg') }}" class="card-img-top" alt="widget-card-2">
                                                    <div class="card-body">
                                                        <p class="meta-date"> {{__('12 June 2019')}}</p>
                                                        <h5 class="card-title"> {{__('Vision Website')}}</h5>
                                                        <p class="card-text"> {{__('Java, HTML, CSS, AWS, Cloudinary Platform')}}</p>
                                                        <div class="team">
                                                            <img src="{{ url('assets/img/profile-7.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-8.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-9.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-10.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                        </div>
                                                        <div class="meta-info">
                                                            <div class="meta-action">
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Completed :')}}</span> <span> {{__('51%')}}</span>
                                                                </div>
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Team Size :')}}</span><span> {{__('4')}}</span>
                                                                </div>
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Deadline :')}}</span><span> {{__('31 Dec 2020')}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 mb-4">
                                                <div class="card single-project">
                                                    <img src="{{ url('assets/img/company-3.jpg') }}" class="card-img-top" alt="widget-card-2">
                                                    <div class="card-body">
                                                        <p class="meta-date"> {{__('25 Sep 2019')}}</p>
                                                        <h5 class="card-title"> {{__('Innovation')}}</h5>
                                                        <p class="card-text"> {{__('.Net, Java, Node JS, Javascript, Angular JS, Vue')}}</p>
                                                        <div class="team">
                                                            <img src="{{ url('assets/img/profile-11.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-12.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-13.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-14.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                        </div>
                                                        <div class="meta-info">
                                                            <div class="meta-action">
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Completed :')}}</span> <span> {{__('37%')}}</span>
                                                                </div>
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Team Size :')}}</span><span> {{__('8')}}</span>
                                                                </div>
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Deadline :')}}</span><span> {{__('20 Dec 2020')}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 mb-4">
                                                <div class="card single-project">
                                                    <img src="{{ url('assets/img/company-4.jpg') }}" class="card-img-top" alt="widget-card-2">
                                                    <div class="card-body">
                                                        <p class="meta-date"> {{__('27 July 2020')}}</p>
                                                        <h5 class="card-title"> {{__('Circle WebApp')}}</h5>
                                                        <p class="card-text"> {{__('Node JS, Angular, AWS, Cloudinary Platform')}}</p>
                                                        <div class="team">
                                                            <img src="{{ url('assets/img/profile-12.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-13.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-14.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-15.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                        </div>
                                                        <div class="meta-info">
                                                            <div class="meta-action">
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Completed :')}}</span> <span> {{__('91%')}}</span>
                                                                </div>
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Team Size :')}}</span><span> {{__('5')}}</span>
                                                                </div>
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Deadline :')}}</span><span> {{__('31 May 2020')}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 mb-4">
                                                <div class="card single-project">
                                                    <img src="{{ url('assets/img/company-5.jpg') }}" class="card-img-top" alt="widget-card-2">
                                                    <div class="card-body">
                                                        <p class="meta-date"> {{__('11 Oct 2019')}}</p>
                                                        <h5 class="card-title"> {{__('Linc Software')}}</h5>
                                                        <p class="card-text"> {{__('Java, HTML, CSS, AWS, Cloudinary Platform')}}</p>
                                                        <div class="team">
                                                            <img src="{{ url('assets/img/profile-21.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-22.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-23.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-24.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                        </div>
                                                        <div class="meta-info">
                                                            <div class="meta-action">
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Completed :')}}</span> <span> {{__('69%')}}</span>
                                                                </div>
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Team Size :')}}</span><span> {{__('4')}}</span>
                                                                </div>
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Deadline :')}}</span><span> {{__('31 Jan 2020')}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 mb-4">
                                                <div class="card single-project">
                                                    <img src="{{ url('assets/img/company-6.jpg') }}" class="card-img-top" alt="widget-card-2">
                                                    <div class="card-body">
                                                        <p class="meta-date"> {{__('25 Sep 2019')}}</p>
                                                        <h5 class="card-title"> {{__('Union Banco')}}</h5>
                                                        <p class="card-text"> {{__('Node JS, Angular, AWS, Cloudinary Platform')}}</p>
                                                        <div class="team">
                                                            <img src="{{ url('assets/img/profile-23.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-24.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-25.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-26.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                        </div>
                                                        <div class="meta-info">
                                                            <div class="meta-action">
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Completed :')}}</span> <span> {{__('68%')}}</span>
                                                                </div>
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Team Size :')}}</span><span> {{__('4')}}</span>
                                                                </div>
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Deadline :')}}</span><span> {{__('25 Feb 2020')}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 mb-4">
                                                <div class="card single-project">
                                                    <img src="{{ url('assets/img/company-2.jpg') }}" class="card-img-top" alt="widget-card-2">
                                                    <div class="card-body">
                                                        <p class="meta-date"> {{__('25 Sep 2019')}}</p>
                                                        <h5 class="card-title"> {{__('HT Software')}}</h5>
                                                        <p class="card-text"> {{__('Java, HTML, CSS, AWS, Cloudinary Platform')}}</p>
                                                        <div class="team">
                                                            <img src="{{ url('assets/img/profile-25.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-26.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-27.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-28.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                        </div>
                                                        <div class="meta-info">
                                                            <div class="meta-action">
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Completed :')}}</span> <span> {{__('85%')}}</span>
                                                                </div>
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Team Size :')}}</span><span> {{__('4')}}</span>
                                                                </div>
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Deadline :')}}</span><span> {{__('20 Oct 2020')}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-4 mb-4">
                                                <div class="card single-project">
                                                    <img src="{{ url('assets/img/company-7.jpg') }}" class="card-img-top" alt="widget-card-2">
                                                    <div class="card-body">
                                                        <p class="meta-date"> {{__('25 Sep 2019')}}</p>
                                                        <h5 class="card-title"> {{__('Hightech Software')}}</h5>
                                                        <p class="card-text"> {{__('Node JS, Angular, AWS, Cloudinary Platform')}}</p>
                                                        <div class="team">
                                                            <img src="{{ url('assets/img/profile-4.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-5.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-6.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                            <img src="{{ url('assets/img/profile-7.jpg') }}" class="rounded-circle avatar-xxs mr-1"/>
                                                        </div>
                                                        <div class="meta-info">
                                                            <div class="meta-action">
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Completed :')}}</span> <span> {{__('51%')}}</span>
                                                                </div>
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Team Size :')}}</span><span> {{__('4')}}</span>
                                                                </div>
                                                                <div class="meta-bottom-info">
                                                                    <span> {{__('Deadline :')}}</span><span> {{__('31 Dec 2020')}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Team -->
                                    <div class="tab-pane fade" id="underline-team" role="tabpanel" aria-labelledby="underline-team-tab">
                                        <div class="row w-100 m-0">
                                            <div class="col-xl-6 col-lg-6 col-md-6 mb-4">
                                                <div class="card single-team">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="user-profile">
                                                                <img src="{{ url('assets/img/profile-7.jpg') }}" class="" alt="...">
                                                                <div class="text-center mt-2">
                                                                    <a href="" class="font-25 text-primary"><i class="lab la-facebook-square"></i></a>
                                                                    <a href="" class="font-25 text-info"><i class="lab la-twitter"></i></a>
                                                                    <a href="" class="font-25 text-danger"><i class="lab la-youtube"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="user-info">
                                                                <h5 class="card-user_name"> {{__('Johny Kilomion')}}</h5>
                                                                <p class="card-user_occupation"> {{__('Manager')}}</p>
                                                                <div class="card-star_rating">
                                                                    <span class="badge badge-primary mb-1"> {{__('4 Years')}}</span>
                                                                    <span class="badge badge-primary"> {{__('Java Expert')}}</span>
                                                                    <span class="badge badge-primary"> {{__('30+ Projects')}}</span>
                                                                </div>
                                                                <p class="card-text"> {{__('Maecenas nec mi vel lacus condimentum rhoncus dignissim egestas orci. Integer blandit porta placerat.')}} </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 mb-4">
                                                <div class="card single-team">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="user-profile">
                                                                <img src="{{ url('assets/img/profile-4.jpg') }}" class="" alt="...">
                                                                <div class="text-center mt-2">
                                                                    <a href="" class="font-25 text-primary"><i class="lab la-facebook-square"></i></a>
                                                                    <a href="" class="font-25 text-info"><i class="lab la-twitter"></i></a>
                                                                    <a href="" class="font-25 text-danger"><i class="lab la-youtube"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="user-info">
                                                                <h5 class="card-user_name"> {{__('Nora Noyui')}}</h5>
                                                                <p class="card-user_occupation"> {{__('Digital Marketing')}}</p>
                                                                <div class="card-star_rating">
                                                                    <span class="badge badge-primary mb-1"> {{__('4 Years')}}</span>
                                                                    <span class="badge badge-primary"> {{__('SEO Expert')}}</span>
                                                                    <span class="badge badge-primary"> {{__('30+ Projects')}}</span>
                                                                </div>
                                                                <p class="card-text"> {{__('It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.')}} </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 mb-4">
                                                <div class="card single-team">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="user-profile">
                                                                <img src="{{ url('assets/img/profile-3.jpg') }}" class="" alt="...">
                                                                <div class="text-center mt-2">
                                                                    <a href="" class="font-25 text-primary"><i class="lab la-facebook-square"></i></a>
                                                                    <a href="" class="font-25 text-info"><i class="lab la-twitter"></i></a>
                                                                    <a href="" class="font-25 text-danger"><i class="lab la-youtube"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="user-info">
                                                                <h5 class="card-user_name"> {{__('Bear Gryllis')}}</h5>
                                                                <p class="card-user_occupation"> {{__('UI/UX Designer')}}</p>
                                                                <div class="card-star_rating">
                                                                    <span class="badge badge-primary mb-1"> {{__('5 Years')}}</span>
                                                                    <span class="badge badge-primary"> {{__('Ionic Expert')}}</span>
                                                                    <span class="badge badge-primary"> {{__('3+ Projects')}}</span>
                                                                </div>
                                                                <p class="card-text"> {{__('Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).')}} </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 mb-4">
                                                <div class="card single-team">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="user-profile">
                                                                <img src="{{ url('assets/img/profile-2.jpg') }}" class="" alt="...">
                                                                <div class="text-center mt-2">
                                                                    <a href="" class="font-25 text-primary"><i class="lab la-facebook-square"></i></a>
                                                                    <a href="" class="font-25 text-info"><i class="lab la-twitter"></i></a>
                                                                    <a href="" class="font-25 text-danger"><i class="lab la-youtube"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="user-info">
                                                                <h5 class="card-user_name"> {{__('Kathrine Lopez')}}</h5>
                                                                <p class="card-user_occupation"> {{__('System Admin')}}</p>
                                                                <div class="card-star_rating">
                                                                    <span class="badge badge-primary mb-1"> {{__('10 Years')}}</span>
                                                                    <span class="badge badge-primary"> {{__('.Net Expert')}}</span>
                                                                    <span class="badge badge-primary"> {{__('20+ Projects')}}</span>
                                                                </div>
                                                                <p class="card-text"> {{__('The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters and she is just fantastic')}} </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 mb-4">
                                                <div class="card single-team">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="user-profile">
                                                                <img src="{{ url('assets/img/profile-1.jpg') }}" class="" alt="...">
                                                                <div class="text-center mt-2">
                                                                    <a href="" class="font-25 text-primary"><i class="lab la-facebook-square"></i></a>
                                                                    <a href="" class="font-25 text-info"><i class="lab la-twitter"></i></a>
                                                                    <a href="" class="font-25 text-danger"><i class="lab la-youtube"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="user-info">
                                                                <h5 class="card-user_name"> {{__('Jin Johnson')}}</h5>
                                                                <p class="card-user_occupation"> {{__('Web Developer')}}</p>
                                                                <div class="card-star_rating">
                                                                    <span class="badge badge-primary mb-1"> {{__('2 Years')}}</span>
                                                                    <span class="badge badge-primary"> {{__('Angular Expert')}}</span>
                                                                    <span class="badge badge-primary"> {{__('5+ Projects')}}</span>
                                                                </div>
                                                                <p class="card-text"> {{__('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.')}}  </p>
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
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/jquery-ui/jquery-ui.min.js') !!}
    {!! Html::script('assets/js/apps/companies.js') !!}
@endpush

@push('custom-scripts')

@endpush
