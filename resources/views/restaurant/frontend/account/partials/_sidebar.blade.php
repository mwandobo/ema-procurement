<div class="col-lg-4 col-md-4 margin-top-0">
    <div class="boxed-widget margin-top-30 margin-bottom-50">
        <ul class="listing-details-sidebar">
            {{-- <li><a href="{{ route('account.profile') }}"><i class="sl sl-icon-user"></i> {{__('frontend.profile')}}</a></li>
            <li><a  href="{{ route('account.password')  }}"><i class="sl sl-icon-settings"></i> {{ __('frontend.change_password') }}</a></li>
            <li><a href="{{ route('account.order') }}"><i class="sl sl-icon-basket"></i> {{__('frontend.my_orders')}}</a></li>
            <li><a href="{{ route('account.reservations') }}"><i class="sl sl-icon-check"></i> {{__('frontend.my_reservations')}}</a></li>
            <li><a  href="{{ route('account.transaction')  }}"><i class="sl sl-icon-paper-clip"></i> {{ __('frontend.transaction') }}</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="sl sl-icon-power"></i> {{ __('logout') }}</a> --}}
                <li><a href=""><i class="sl sl-icon-user"></i> {{__('frontend.profile')}}</a></li>
                <li><a  href=""><i class="sl sl-icon-settings"></i> {{ __('frontend.change_password') }}</a></li>
                <li><a href=""><i class="sl sl-icon-basket"></i> {{__('frontend.my_orders')}}</a></li>
                <li><a href=""><i class="sl sl-icon-check"></i> {{__('frontend.my_reservations')}}</a></li>
                <li><a  href=""><i class="sl sl-icon-paper-clip"></i> {{ __('frontend.transaction') }}</a></li>
                <li><a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="sl sl-icon-power"></i> {{ __('logout') }}</a>
                <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                </form>
        </ul>
    </div>
</div>
