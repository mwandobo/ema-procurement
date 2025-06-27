
    <!-- Scripts
    ================================================== -->
    <script type="text/javascript" src="{{asset('js/themes/scripts/jquery-3.4.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/themes/scripts/jquery-migrate-3.1.0.min.js')}}"></script>
     <script src="{{ asset('js/frontend/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('js/themes/scripts/mmenu.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/themes/scripts/chosen.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/themes/scripts/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/themes/scripts/rangeslider.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/themes/scripts/magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/themes/scripts/waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/themes/scripts/counterup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/themes/scripts/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/themes/scripts/tooltips.min.js')}}"></script>
    <!-- slider -->

    <script type="text/javascript" src="{{asset('js/themes/library/custom-carousel/js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/themes/library/custom-carousel/js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- end -->

    <script type="text/javascript" src="{{asset('themes/scripts/custom.js')}}"></script>

    <!-- Maps -->

    <!-- Style Switcher
    ================================================== -->
    <script src="{{asset('js/themes/scripts/switcher.js')}}"></script>

    <script src="{{ asset('assets/restaurant/izitoast/dist/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('js/frontend/js/script.js') }}" type="text/javascript"></script>

    <!-- custom javascript -->
    <script type="application/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script type="text/javascript">
        @if(session('success'))
            iziToast.success({
                title: 'Success',
                message: '{{ session('success') }}',
                position: 'topRight'
            });
        @endif

        @if(session('error'))
            iziToast.error({
                title: 'Error',
                message: '{{ session('error') }}',
                position: 'topRight'
            });
        @endif
    </script>

@yield('extra-js')

    @livewireScripts
@yield('livewire-scripts')
