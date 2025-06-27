@extends('layout.master-auth')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/pages/contact_us.css') !!}
@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="contact-us">
        <div class="skew-div"></div>
        <div class="contact-us-content">
            <div class="content-container">
                <div class="content-left">
                    <h6 class="contact-heading mt-5">{{__('Contact Us')}}</h6>
                    <p class="contact-subheading">{{__('Feel like contacting us? Submit your queries here and we will get back to you as soon as possible')}}</p>
                    <p class="contact-details mt-5">
                        <i class="las la-phone-volume mr-3 font-30"></i> {{__('+1 45874 58585')}}
                    </p>
                    <p class="contact-details">
                        <i class="lar la-envelope mr-3 font-30"></i> {{__('contact@companyname.com')}}
                    </p>
                    <div class="blink-address-container">
                        <div class="blink-address">
                            <p class="mb-2 font-17">{{__('Amazing Company Name')}}</p>
                            <p class="font-12">{{__('98 Winn St, Woburn, MA 01801, United States')}}</p>
                            <div class="blink">
                                <div class="circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-right">
                    <div class="contact-right-form-container">
                        <div class="contact-form-header mb-4 mt-2">
                            <h4>{{__('Get in touch')}}</h4>
                            <p>{{__('We are always here to help out whatever way we can')}}</p>
                        </div>
                        <form class="contact-form">
                            <div class="row">
                                <div class="col-md-6 mb-5">
                                    <div class="contact-input">
                                        <input id="fname" name="fname" required class="coming-soon-input" type="text" value="" placeholder=" " />
                                        <label>{{__('First Name')}}</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <div class="contact-input">
                                        <input id="lname" name="lname" required class="coming-soon-input" type="text" value="" placeholder=" " />
                                        <label>{{__('Last Name')}}</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <div class="contact-input">
                                        <input id="email" name="email" required class="coming-soon-input" type="email" value="" placeholder=" " />
                                        <label>{{__('Email Address')}}</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <div class="contact-input">
                                        <input id="contact" name="contact" required class="coming-soon-input" type="text" value="" placeholder=" " />
                                        <label>{{__('Contact No.')}}</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="contact-input">
                                        <textarea class="coming-soon-textarea" placeholder=" " value=""></textarea>
                                        <label>{{__('Message')}}</label>
                                    </div>
                                </div>
                                <div class="login-one-inputs check">
                                    <input class="inp-cbx" id="cbx" type="checkbox" style="display: none">
                                    <label class="cbx" for="cbx">
                      <span>
                          <svg width="12px" height="10px" viewBox="0 0 12 10">
                              <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                          </svg>
                      </span>
                                        <span class="text-light-black">{{__('Send me newsletters twice a month')}}</span>
                                    </label>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <button type="submit" class="form-submit">
                                        {{__('Submit')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ url('assets/img/contact_us_bg_1.png') }}" class="skew-div-image"/>
        <div class="contact-us-main-bg-container">
            <img src="{{ url('assets/img/contact_us_bg_3.jpg') }}" class="contact-us-main-bg"/>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('assets/js/libs/jquery-3.6.0.min.js') !!}
    {!! Html::script('bootstrap/js/bootstrap.min.js') !!}
@endpush

@push('custom-scripts')

@endpush
