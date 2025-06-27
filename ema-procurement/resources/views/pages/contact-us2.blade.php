@extends('layout.master-auth')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/pages/contact_us_2.css') !!}
@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="contact-us">
        <div class="contact-us-top">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d196281.12936705156!2d-104.99519763365042!3d39.76451867460239!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x876b80aa231f17cf%3A0x118ef4f8278a36d6!2sDenver%2C%20CO%2C%20USA!5e0!3m2!1sen!2sin!4v1595073603352!5m2!1sen!2sin" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <div class="contact-us-bottom">
            <!-- <img src="assets/img/contact_us_bg_2.jpg" class="contact-us-bottom-bg-2" /> -->
            <div class="row contact-us-container">
                <div class="col-md-7 contact-us-inner mb-4">
                    <div class="contact-header mb-4 mt-2">
                        <h4>{{__('Get in touch')}}</h4>
                        <p>{{__('We are always here to help out whatever way we can')}}</p>
                    </div>
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="contact-input">
                                    <input id="fname" name="fname" required class="coming-soon-input" type="text" value="" placeholder=" " />
                                    <label>{{__('First Name')}}</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="contact-input">
                                    <input id="lname" name="lname" required class="coming-soon-input" type="text" value="" placeholder=" " />
                                    <label>{{__('Last Name')}}</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="contact-input">
                                    <input id="email" name="email" required class="coming-soon-input" type="email" value="" placeholder=" " />
                                    <label>{{__('Email Address')}}</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="contact-input">
                                    <input id="contact" name="contact" required class="coming-soon-input" type="text" value="" placeholder=" " />
                                    <label>{{__('Contact No.')}}</label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="contact-input">
                                    <textarea class="coming-soon-textarea" placeholder=" " value=""></textarea>
                                    <label>{{__('Message')}}</label>
                                    <button type="submit" class="form-submit">
                                        <i class="lar la-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 bg-gradient-primary contact-us-inner">
                    <h6 class="contact-info-heading mb-5 mt-2">{{__('Contact Information')}}</h6>
                    <div class="contact-info">
                        <i class="las la-map-marker"></i>
                        <p>{{__('AG 193/1 New Scheme, Synthesis Park, California 20815')}}</p>
                    </div>
                    <div class="contact-info">
                        <i class="las la-phone-volume"></i>
                        <p>{{__('AG 193/1 New Scheme, Synthesis Park, California 20815')}}x</p>
                    </div>
                    <div class="contact-info">
                        <i class="lar la-envelope"></i>
                        <p><a href="mailto:contact@yourdomain.com">{{__('contact@yourdomain.com')}}</a></p>
                    </div>
                    <div class="contact-info social mt-5 mb-3">
                        <a href="javascript:void(0)"><i class="lab la-facebook-f"></i></a>
                        <a href="javascript:void(0)"><i class="lab la-twitter"></i></a>
                        <a href="javascript:void(0)"><i class="lab la-linkedin-in"></i></a>
                        <a href="javascript:void(0)"><i class="lab la-instagram"></i></a>
                    </div>
                </div>
            </div>
            <img src="{{ url('assets/img/contact_us_bg_1.png') }}" class="contact-us-bottom-bg" />
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
