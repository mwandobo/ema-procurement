@extends('frontend.layouts.app')
@push('meta')
<meta property="og:url" content="{{ route('home') }}">
<meta property="og:type" content="Foodbank">
<meta property="og:title" content="{{ setting('site_description') }}">
<meta property="og:description" content="Explore top-rated attractions, activities and more">
<meta property="og:image" content="{{ asset('images/'.setting('site_logo')) }}">
@endpush

@section('header-container-css')
{{__('fixed fullwidth')}}
@endsection
@section('header-css')
{{__('not-sticky')}}
@endsection
@section('main-content')

<!-- Content
================================================== -->
<div class="ls-container container-fluid">

    <div class="ls-inner-container content">
        <div class="fs-content">

            <!-- Search -->
            <section class="search">

                <div class="row">
                    <div class="col-md-12">

                        <!-- Filters -->
                        <div id="filters">
                            <ul class="option-set margin-bottom-10">
                                <li><a href="#" onclick="expedition('all')"
                                        class="expedition @if(Request::get('expedition')=='all' ) selected @endif"
                                        data-filter=".delivery-filter">{{__('frontend.all')}}</a></li>
                                <li><a href="#" onclick="expedition('delivery')"
                                        class="expedition @if(Request::get('expedition')=='delivery' ) selected @endif"
                                        data-filter=".delivery-filter">{{__('frontend.delivery')}}</a></li>
                                <li><a href="#" onclick="expedition('table')"
                                        class="expedition @if(Request::get('expedition')=='table' ) selected @endif"
                                        data-filter=".delivery-filter">{{__('frontend.table')}}</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <form method="GET" action="{{ route('search', Request::query()) }}" id="myForm">
                            <input type="hidden" id="lat" name="lat" value="{{Request::get('lat')}}">
                            <input type="hidden" id="long" name="long" value="{{Request::get('long')}}">
                            <input type="hidden" id="expedition" name="expedition"
                                value="{{Request::get('expedition')}} ">

                            <!-- Row With Forms -->
                            <div class="row with-forms">
                                <div class="col-fs-6">
                                    <div class="input-with-icon">
                                        <i class="sl sl-icon-magnifier"></i>
                                        <input type="text" name="query" id="search"
                                            placeholder="{{ __('frontend.search_placeholder') }}?" value="{{Request::get('query')}}" />

                                    </div>

                                </div>

                                <!-- Main Search Input -->
                                <div class="col-fs-6">
                                    <div class="main-search">
                                        <div class="input-with-icon location">
                                            <div id="autocomplete-container">
                                                <input id="autocomplete-input" type="text" placeholder="{{ __('frontend.location') }}">
                                            </div>
                                            <a href="javascript:void(0)" class="main-search-icon">
                                                <i class="im im-icon-Location current-icons"
                                                    onclick="getLocation()"></i>
                                            </a>
                                            <button class="button search-btn" type="submit">
                                                <i class="fas fa-search search-icon"></i>
                                            </button>

                                        </div>

                                    </div>

                                </div>


                                <!-- Filters -->
                                <div class="col-fs-12">

                                    <!-- Panel Dropdown / End -->
                                    <div class="panel-dropdown">
                                        <a href="#">{{__('Cuisines')}}</a>
                                        <div class="panel-dropdown-content checkboxes categories">
                                            @if(isset($cuisines))
                                            <div class="row">
                                                @foreach($cuisines as $cuisine)
                                                <div class="col-md-6">
                                                    <?php
													$checked = '';
													if (!blank(Request::get('cuisines'))) {
														$checked = in_array($cuisine->slug, Request::get('cuisines')) ? 'checked' : '';
													}
													?>
                                                    <input id="check-{{$cuisine->id}}" type="checkbox" multiple
                                                        name="cuisines[]" value="{{$cuisine->slug}}" <?= $checked ?>>
                                                    <label for="check-{{$cuisine->id}}">{{$cuisine->name}}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                            <!-- Buttons -->
                                            <div class="panel-buttons">
                                                <button class="panel-cancel">{{__('frontend.cancel')}}</button>
                                                <button class="panel-apply">{{__('frontend.apply')}}</button>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Panel Dropdown / End -->
                                    <!-- Panel Dropdown -->
                                    <div class="panel-dropdown">
                                        <a href="#">{{__('frontend.distance_radius')}}</a>
                                        <div class="panel-dropdown-content">
                                            <input class="distance-radius" type="range" min="1" max="100" step="1"
                                                name="distance" value=""
                                                data-title="Radius around selected destination">
                                            <div class="panel-buttons">
                                                <button class="panel-cancel">{{__('frontend.disable')}}</button>
                                                <button class="panel-apply">{{__('frontend.apply')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-relative d-inline-block float-right">
                                        <a class=" clearBtn  mt-0 h5 font-weight-bold"
                                            href="{{ route('search') }}">{{__('frontend.clear')}}</a>
                                    </div>
                                    <!-- Panel Dropdown / End -->
                                </div>
                                <!-- Filters / End -->
                            </div>
                        </form>

                        <!-- Row With Forms / End -->
                    </div>
                </div>

            </section>
            <!-- Search / End -->
            <section class="listings-container margin-top-30">
                <!-- Sorting / Layout Switcher -->
                <div class="row fs-switcher">
                    <div class="col-md-6">
                        <!-- Showing Results -->
                        <p class="showing-results">{{$restaurants->total()}} {{__('frontend.results_found')}} </p>
                    </div>
                </div>
                <div class="row fs-listings" id="post-data">
                    @include('frontend.restaurant.search-restaurant')
                </div>
                <!-- Pagination Container -->
                <div class="row fs-listings">
                    <div class="col-md-12">
                        <!-- Pagination -->
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Pagination -->

                                <div class="pagination-container margin-top-15 margin-bottom-40">
                                    <nav class="pagination">
                                        @if ($restaurants->lastPage() > 1)
                                        <ul>
                                            @for ($i = 1; $i <= $restaurants->lastPage(); $i++)
                                                <li>
                                                    <a class="{{ ($restaurants->currentPage() == $i) ? 'current-page' : '' }}"
                                                        href="{{ $restaurants->url($i) }}">{{ $i }}</a>
                                                </li>
                                                @endfor
                                                <li
                                                    class="sl sl-icon-arrow-right {{ ($restaurants->currentPage() == $restaurants->lastPage()) ? ' disabled' : '' }}">
                                                    <a href="{{ route('search',[$restaurants->currentPage()+1]) }}"></a>
                                                </li>
                                        </ul>
                                        @endif
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


    <div class="ls-inner-container fixed-map">

        <!-- Map -->
        <div id="fixed-map-container">
            <div id="map" data-map-zoom="9" data-map-scroll="true">
                <!-- map goes here -->
            </div>
        </div>

    </div>
</div>


@endsection


@section('extra-js')
<script>
    var restaurants = @json($mapRestaurants);
    var mapLat = '{{Request::get("lat")}}';
    var mapLong = '{{Request::get("long")}}';

</script>
<script type="text/javascript" src="{{ asset('frontend/js/map-current.js') }}"></script>
<script type="text/javascript" src="{{ asset('themes/scripts/typed.js') }}"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key={{ setting('google_map_api_key') }}&libraries=places&callback=initAutocomplete">
</script>
<script type="text/javascript" src="{{asset('themes/scripts/infobox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/scripts/markerclusterer.js')}}"></script>

<script src="{{ asset('js/search/search.js') }}"></script>
<script type="text/javascript" src="{{asset('themes/scripts/maps.js')}}"></script>

@endsection
