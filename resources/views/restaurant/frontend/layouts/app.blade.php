<!DOCTYPE html>
<html>
@include('restaurant.frontend.partials._head')
<body class="@yield('body-css')">
    <!-- Wrapper -->
    <div id="main-wrapper">
        {{-- @include('restaurant.frontend.partials._nav') --}}

        @yield('main-content')

        @if (!request()->is('search'))
            {{-- @include('restaurant.frontend.partials._footer') --}}
        @endif
    </div>
    <!-- Wrapper / End -->
    @include('restaurant.frontend.partials._scripts')
</body>
</html>
