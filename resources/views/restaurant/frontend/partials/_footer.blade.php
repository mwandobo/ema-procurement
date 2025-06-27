<!-- Footer
================================================== -->
<div id="footer" class="sticky-footer margin-top-10">
    <!-- Main -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="footer-img d-flex align-items-start">
                    {{-- <img class="footer-logo" src="{{ asset("images/".setting('site_logo')) }}" alt=""> --}}
                </div>
                <p class="margin-top-3 footer-logo-p">
                    {{-- {{ Str::of(strip_tags(setting('site_description')))->limit(140, '..') }} --}}
                </p>
                <ul class="social-icons margin-top-20">
                    {{-- @if(setting('facebook'))
                    <li><a class="facebook" href="{{ url(setting('facebook')) }}"><i class="icon-facebook"></i></a></li>
                    @endif
                    @if(setting('twitter'))
                    <li><a class="twitter" href="{{ url(setting('twitter')) }}"><i class="icon-twitter"></i></a></li>
                    @endif
                    @if(setting('instagram'))
                    <li><a class="instagram" href="{{ url(setting('instagram')) }}"><i class="icon-instagram"></i></a>
                    </li>
                    @endif
                    @if(setting('youtube'))
                    <li><a class="youtube" href="{{ url(setting('youtube')) }}"><i class="icon-youtube"></i></a></li>
                    @endif --}}
                </ul>
            </div>
            <div class="col-sm-3">
                <h4 class="title">{{__('footer.about')}}</h4>
                <ul class="list-unstyled">
                    {{-- @if(!blank($footermenus))
                        @foreach($footermenus as $footer_menu)
                            @if($footer_menu->footer_menu_section_id == \App\Enums\FooterMenuSection::ABOUT)
                                <li class="about_li"> <a href="{{ route('page', $footer_menu) }}">{{ $footer_menu->title }}</a></li>
                            @endif
                        @endforeach
                    @endif --}}
                </ul>
            </div>
            <div class="col-sm-3">
                <h4 class="title">{{__('footer.services')}}</h4>
                <ul class="list-unstyled">
                    {{-- @if(!blank($footermenus))
                        @foreach($footermenus as $footer_menu)
                            @if($footer_menu->footer_menu_section_id == \App\Enums\FooterMenuSection::SERVICES)
                                <li class="about_li"> <a href="{{ route('page', $footer_menu) }}">{{ $footer_menu->title }}</a></li>
                            @endif
                        @endforeach
                    @endif --}}
                </ul>
            </div>


            <div class="col-sm-3">
                <h4>{{__('footer.contact_us')}}</h4>
                <div class="text-widget footer-logo-p margint_top_10">
                    {{-- {{__('footer.phone')}}:<span>{{setting('site_phone_number')}} </span><br>
                    {{__('footer.email')}}:<span> <a href="mailto:link">{{setting('site_email')}}</a> </span><br>
                    {{__('footer.address')}}:<span>{{setting('site_address')}}</span> <br> --}}
                </div>
                <div class="text-widget my-5">
                    {{-- @if(setting('android_app_link') || setting('ios_app_link'))
                    @if(setting('android_app_link'))
                    <a href="{{ setting('android_app_link') }}" class="d-block mb-2">
                        <img class="footer-logo" src="{{ asset('themes/images/google-play.png') }}" alt="">
                    </a>
                    @endif
                    @if(setting('ios_app_link'))
                    <a href="{{ setting('ios_app_link') }}" class="d-block mb-2">
                        <img class="footer-logo" src="{{ asset('themes/images/unnamed.png') }}" alt="">
                    </a>
                    @endif
                    @endif --}}
                </div>


            </div>

        </div>

        <!-- Copyright -->
        <div class="row">
            <div class="col-md-12">
                {{-- <div class="copyrights copyright-font">{{setting('site_footer')}}</div> --}}
            </div>
        </div>

    </div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>
