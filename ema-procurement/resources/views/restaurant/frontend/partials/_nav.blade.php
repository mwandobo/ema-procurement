<!-- Header Container
================================================== -->
<header id="header-container" class="@yield('header-container-css') topdiv">

    <!-- Header -->
    <div id="header" class="@yield('header-css')header-top-overlay topdiv">
        <div class="container-fluid custom-nav">
            <!-- Left Side Content -->
            <div class="left-side ">
                <!-- Logo -->
                <div id="logo">
                    {{-- <a href="{{route('home')}}"><img width="100%" src=" @if(\Route::current()->getName() === " home") {{ asset("images/".setting('site_logo')) }} @else {{ asset("images/".setting('site_logo')) }} @endif" data-sticky-logo="{{ asset("images/".setting('site_logo')) }}" alt=""></a> --}}
                </div>
            </div>
            <!-- Left Side Content / End -->
            <div class="right-side d-flex justify-content-end align-items-end">
                <div class="header-widget d-inline">
                    <div class=" widget-header lala @if(auth()->user()) cart-css cart-margin-extra @endif @if(in_array(auth()->user()->myrole ?? 0, [1,3,4]))  @else cart-css @endif">
                        <div class="user-menu">
                            <div class="lang">
                                @if(!blank($language))
                                    @foreach($language as $lang )
                                        @if(Session()->has('applocale') AND Session()->get('applocale') AND setting('locale'))
                                            @if(Session()->get('applocale') == $lang->code)
                                                <span class="flag-icon flag-icon-aw ">{{ $lang->flag_icon == null ? '🇬🇧' : $lang->flag_icon }}&nbsp</span>{{ $lang->name }}
                                            @endif
                                        @else
                                            @if(setting('locale') == $lang->code)
                                            <span class="flag-icon flag-icon-aw ">{{ $lang->flag_icon == null ? '🇬🇧' : $lang->flag_icon }}&nbsp</span>{{ $lang->name }}
                                              @endif
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <ul>
                                @if(!blank($language))
                                    @foreach($language as $lang )
                                        <li>
                                            <a href="{{ route('lang.index',$lang->code) }}">
                                                <span class="flag-icon flag-icon-aw ">{{ $lang->flag_icon == null ? '🇬🇧' : $lang->flag_icon }}&nbsp</span>{{ $lang->name }}</a>
                                        </li>
                                    @endforeach
                                @endif

                            </ul>
                        </div>
                        <a href="@if(session()->get('session_cart_restaurant')){{ route('restaurant.show',[session()->get('session_cart_restaurant')])}}@else #@endif" class="icon icon-sm desktopCart"><i class="align-self-center fas fa-shopping-cart icon-cart"></i></a>
                        <button id="desktopmobilecart"  class=" desktopmobilecart icon icon-sm desktopCart"><i class="align-self-center fas fa-shopping-cart icon-cart"></i></button>
                        <span class="badge badge-pill badge-danger notify cartCount" >@if(!blank(session()->get('cart'))){{ session()->get('cart')['totalQty']}}@else 0 @endif</span>
                    </div>
                    @if(Auth::guest())
                    <a href="{{route('login')}}" class="btn btn-lg btn-outline-danger mr-2 auth-btn"><i class="sl sl-icon-login"></i>
                        {{__('topbar.sign_in')}}</a>
                    <a href="{{route('register')}}" class="btn btn-lg btn-outline-danger auth-btn"><i class="sl sl-icon-login"></i>
                        {{__('topbar.register')}}</a>
                    @else

                    <!-- User Menu -->
                    <div class="user-menu">
                        <div class="user-name"><span><img src="{{ auth()->user()->image }}" alt=""></span>{{ __('topbar.hi') }}, {{ Str::of(auth()->user()->name)->limit(10, '..') }}</div>
                        <ul>
                            <li><a href="{{ route('account.profile') }}"><i class="sl sl-icon-settings"></i> {{ __('topbar.account') }}</a></li>
                            <li><a href="{{ route('account.order') }}"><i class=" sl sl-icon-basket"></i> {{ __('topbar.my_orders') }}</a></li>
                            <li><a href="{{ route('account.reservations') }}"><i class="sl sl-icon-check"></i> {{__('topbar.reservations')}}</a></li>
                            <li> <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="sl sl-icon-power"></i> {{ __('topbar.logout') }}</a>
                                <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                </form>
                        </ul>
                    </div>

                    <?php
                    $myrole  = auth()->user()->myrole ?? 0;
                    $permissionBackend = [1, 3, 4];
                    if (in_array($myrole, $permissionBackend)) {
                        if ($myrole == 3 && !auth()->user()->restaurant){   ?>
                            <a href="{{ route('admin.restaurants.index') }}" class="btn btn-lg btn-outline-danger dashboard-btn" data-toggle="tooltip" data-placement="bottom" title="Go to dashboard">{{ __('topbar.dashboard') }}<i class="sl sl-icon-plus"></i></a>
                    <?php }else{?>
                            <a href="{{ route('admin.dashboard.index') }}" class="btn btn-lg btn-outline-danger dashboard-btn" data-toggle="tooltip" data-placement="bottom" title="Go to dashboard">{{ __('topbar.dashboard') }} <i class="sl sl-icon-plus"></i></a>

                        <?php   } ?>
                    <?php } ?>
                    @endif
                </div>

            </div>

            <!-- Responsive menu Content / End -->
            <div class="d-flex float-right">
                <div class=" mobile-cart widget-header cart-css">
                @if(Request::is('/'))
                        <a href="@if(session()->get('session_cart_restaurant')){{ route('restaurant.show',[session()->get('session_cart_restaurant')])}}@else #@endif" class="icon icon-sm"><i class="align-self-center fas fa-shopping-cart icon-cart"></i></a>
                        @else
                        <button id="mobileCartBtn"  class=" mobileCartBtn icon icon-sm "><i class="align-self-center fas fa-shopping-cart icon-cart"></i></button>
                    @endif
                    <span class="badge badge-pill badge-danger notify cartCount" >@if(!blank(session()->get('cart'))){{ session()->get('cart')['totalQty']}}@else 0 @endif</span>
                </div>
                <button class="align-middle custom-burger-button navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile_menu" aria-controls="mobile_menu" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
            </div>

            <div class="list-group mobile-menu collapse navbar-collapse" id="mobile_menu">
                <div>
                    <div class="user-menu customuser mobile_btn user_border mb-5">
                        <div class="lang">
                            @if(!blank($language))
                                @foreach($language as $lang )
                                    @if(Session()->has('applocale') AND Session()->get('applocale') AND setting('locale'))
                                        @if(Session()->get('applocale') == $lang->code)
                                            <span class="flag-icon flag-icon-aw ">{{ $lang->flag_icon == null ? '🇬🇧' : $lang->flag_icon }}&nbsp</span>{{ $lang->name }}
                                        @endif
                                    @else
                                        @if(setting('locale') == $lang->code)
                                            <span class="flag-icon flag-icon-aw ">{{ $lang->flag_icon == null ? '🇬🇧' : $lang->flag_icon }}&nbsp</span>{{ $lang->name }}
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <ul>
                            @if(!blank($language))
                                @foreach($language as $lang )
                                    <li>
                                        <a href="{{ route('lang.index',$lang->code) }}">
                                            <span class="flag-icon flag-icon-aw ">{{ $lang->flag_icon == null ? '🇬🇧' : $lang->flag_icon }}&nbsp</span>{{ $lang->name }}</a>
                                    </li>
                                @endforeach
                            @endif

                        </ul>
                    </div>

                @if(Auth::guest())
                        <div class="mobile_btn user_border">
                            <a href="{{route('login')}}" class="btn_color"><i class="sl sl-icon-login"></i>
                                {{__('topbar.sign_in')}}</a>
                        </div>
                        <div class="mobile_btn user_border">
                            <a href="{{route('register')}}" class="btn_color"><i class="sl sl-icon-login"></i>
                                {{__('topbar.register')}}</a>
                        </div>
                    @else
                        <div class="customuser user_border">
                            <div class="user-menu">
                                <div class="user-name mobile_btn">
                                    <a href="javascript:void(0)" class="btn_color"> {{ __('topbar.hi') }}, {{ Str::of(auth()->user()->name)->limit(10, '..') }}
                                    </a>
                                </div>
                                <ul>
                                    <li><a href="{{ route('account.profile') }}"><i class="sl sl-icon-settings"></i> {{ __('topbar.account') }}</a></li>
                                    <li><a href="{{ route('account.order') }}"><i class="sl sl-icon-basket"></i> {{ __('topbar.my_orders') }}</a></li>
                                    <li><a href="{{ route('account.reservations') }}"><i class="sl sl-icon-check"></i> {{__('topbar.reservations')}}</a></li>
                                    <li> <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"><i class="sl sl-icon-power"></i> {{ __('topbar.logout') }}</a>
                                        <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        @if(in_array(auth()->user()->myrole, [1, 3, 4]))
                            <div class="first mobile_btn user_border">
                                <a href="{{ route('admin.dashboard.index') }}" class="btn btn-lg btn-outline-danger dashboard-btn" data-toggle="tooltip" data-placement="bottom" title="Go to dashboard">{{ __('topbar.dashboard') }} <i class="sl sl-icon-plus"></i></a>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
            <!-- Responsive menu Content / End -->
        </div>
    </div>
    <!-- Header / End -->
</header>
<div class="clearfix"></div>
<!-- Header Container / End -->
@yield('nav')

@section('extra-js')

@endsection
