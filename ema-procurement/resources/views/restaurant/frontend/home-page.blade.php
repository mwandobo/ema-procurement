@extends('layout.master')

@push('plugin-styles')
{!! Html::style('plugins/table/datatable/datatables.css') !!}
{!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Other Pages')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> <a href="#" data-toggle="modal" data-target="#shop-info-modal">
                                    {{ $restaurant->name }}
                                    </a> </span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    
    <div class="modal fade" id="shop-info-modal" tabindex="-1" aria-labelledby="shop-info-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content custom-border">
                <div class="modal-header custom-padding-design">
                    <img src="{{ $restaurant->image }}">
                    <button type="button" class="close custom-close-style" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body custom-size">
                    <div class="main-body">
                        <div class="row no-margin-row">
                            <div class="col-md-12">
                                <div class="shop-info-box">
                                    <h2 class="header">{{ $restaurant->name }}</h2>
                                    <p class="cuisines">
                                        @if(!blank($restaurant->cuisines))
                                        <span class="listing-tag custom-listing-tag">
                                            @foreach($restaurant->cuisines as $cuisine)
                                            {{$cuisine->name}}
                                            @if(!$loop->last)
                                            <span>.</span>
                                            @endif
                                            @endforeach
                                        </span>
                                        @endif
                                    </p>
                                    <p class="shop-time">{{ __('frontend.open') }}
                                        {{ date('h:i A', strtotime($restaurant->opening_time)) }} -
                                        {{ date('h:i A', strtotime($restaurant->closing_time)) }}</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="tab-list-style">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#about"
                                                role="tab" aria-controls="about"
                                                aria-selected="true">{{ __('frontend.about') }}</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#reviews"
                                                role="tab" aria-controls="profile"
                                                aria-selected="false">{{ __('frontend.reviews') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="row no-margin-row">
                        <div class="col-md-12">
                            <div class="tab-content custom-margin" id="myTabContent">
                                <div class="tab-pane fade show active" id="about" role="tabpanel"
                                    aria-labelledby="about-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="delivery-hours">
                                                <h2>{{ __('frontend.delivery_hours') }}</h2>
                                                <p>{{ __('frontend.mon') }} - {{ __('frontend.sun') }}
                                                    {{ date('h:i A', strtotime($restaurant->opening_time)) }} -
                                                    {{ date('h:i A', strtotime($restaurant->closing_time)) }}</p>
                                            </div>
                                            <div class="address">
                                                <h2>{{ __('frontend.address') }}</h2>
                                                <address>
                                                    {{ $restaurant->address }}
                                                </address>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="qr-code-box">
                                                <img id="qrImage" width="100%"
                                                    class="bd-placeholder-img card-img-top img-fluid"
                                                    src="data:image/png;base64,{!! $qrCode !!}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if($order_status)
                                            <form action="{{ route('restaurant.ratings-update') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div id="add-review" class="add-review-box custom-width">
                                                    <h3 class="">{{__('frontend.add_review')}}</h3>
                                                    <p class="comment-notes">{{__('frontend.email_not_published')}}</p>
                                                    <div class="sub-ratings-container">
                                                        <div class="add-sub-rating">
                                                            <div class="sub-rating-title">{{ __('frontend.service') }} <i
                                                                    class="tip"
                                                                    data-tip-content="{{ __('frontend.auality_customer') }}"></i>
                                                            </div>
                                                            <div class="sub-rating-stars">
                                                                <div class="clearfix"></div>
                                                                <div class="leave-rating">
                                                                    <input type="radio" value="5" name="rating"
                                                                        {{ 5 == old('rating') ? 'checked' : ''}}
                                                                        id="rating-5">
                                                                    <label for="rating-5" class="fa fa-star"></label>
                                                                    <input type="radio" value="4" name="rating"
                                                                        {{ 4 == old('rating') ? 'checked' : ''}}
                                                                        id="rating-4">
                                                                    <label for="rating-4" class="fa fa-star"></label>
                                                                    <input type="radio" value="3" name="rating"
                                                                        {{ 3 == old('rating') ? 'checked' : ''}}
                                                                        id="rating-3">
                                                                    <label for="rating-3" class="fa fa-star"></label>
                                                                    <input type="radio" value="2" name="rating"
                                                                        {{ 2 == old('rating') ? 'checked' : ''}}
                                                                        id="rating-2">
                                                                    <label for="rating-2" class="fa fa-star"></label>
                                                                    <input type="radio" value="1" name="rating"
                                                                        {{ 1 == old('rating') ? 'checked' : ''}}
                                                                        id="rating-1">
                                                                    <label for="rating-1" class="fa fa-star"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
                                                    <input type="hidden" name="status" value="5">
                                                    <div class="form-group">
                                                        <label>{{ __('auality_customer.review') }} <span
                                                                class="text-danger">*</span></label>
                                                        <textarea name="review" type="text" cols="40" rows="3"
                                                            aria-label="With textarea"
                                                            placeholder="auality_customer.write_review"
                                                            class="form-control @error('review') is-invalid @enderror">{{old('review')}}</textarea>
                                                        @if($errors->has('review'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('review') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <button type="submit"
                                                        class="button">{{__('frontend.submit_review')}}</button>
                                                </div>
                                            </form>
                                            @endif
    
                                            @if(!blank($ratings))
                                            <section class="comments listing-reviews custom-comment">
                                                <ul>
                                                    @foreach($ratings as $rating)
                                                    <li>
                                                        <div class="avatar"><img src="{{$rating->user->image}}" alt="" />
                                                        </div>
                                                        <div class="comment-content">
                                                            <div class="arrow-comment"></div>
                                                            <div class="comment-by">
                                                                {{$rating->user->name}}
                                                                <span
                                                                    class="date">{{ $rating->updated_at->format('d M Y, h:i A') }}</span>
                                                                <div class="star-rating" data-rating="{{$rating->rating}}">
                                                                </div>
                                                            </div>
                                                            <p>{{$rating->review}}</p>
                                                        </div>
    
                                                        @if(!$loop->last)
                                                        <hr>
                                                        @endif
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </section>
                                            <!-- Pagination -->
                                            <div class="clearfix"></div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- Pagination -->
                                                    <div class="pagination-container margin-top-30">
                                                        <nav class="pagination">
                                                            @if ($ratings->lastPage() > 1)
                                                            <ul>
                                                                @for ($i = 1; $i <= $ratings->lastPage(); $i++)
                                                                    <li>
                                                                        <a class="{{ ($ratings->currentPage() == $i) ? 'current-page' : '' }}"
                                                                            href="{{ $ratings->url($i) }}">{{ $i }}</a>
                                                                    </li>
                                                                    @endfor
                                                                    <li
                                                                        class="sl sl-icon-arrow-right {{ ($ratings->currentPage() == $ratings->lastPage()) ? ' disabled' : '' }}">
                                                                        <a
                                                                            href="{{ route('restaurant.show',[$ratings->currentPage()+1]) }}"></a>
                                                                    </li>
                                                            </ul>
                                                            @endif
                                                        </nav>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
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
    <div class="layout-px-spacing">
        <div class="row layout-spacing pt-4">
            <div class="col-xl-12 col-lg-12 col-md-12">

                
            <!-- SUMMARY ENDS-->
            <div class="row">
                
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="table-responsive mb-4">
                            <div id="basic-dt_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row"><div class="col-sm-12">
                                                
                            <table id="basic-dt" class="table table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="basic-dt_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="basic-dt" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 98px;">{{ __('levels.image') }}</th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-dt" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 134px;">{{ __('levels.name') }}</th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-dt" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 80px;">{{ __('levels.price') }}</th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-dt" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">{{ __('levels.status') }}</th>
                                    <th class="no-content sorting" tabindex="0" aria-controls="basic-dt" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 1px;">{{ __('levels.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @livewire('show-page', ['restaurant' => $restaurant])
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">{{ __('levels.image') }}</th>
                                    <th rowspan="1" colspan="1">{{ __('levels.name') }}</th>
                                    <th rowspan="1" colspan="1">{{ __('levels.price') }}</th>
                                    <th rowspan="1" colspan="1">{{ __('levels.status') }}</th>
                                    <th rowspan="1" colspan="1">{{ __('levels.action') }}</th>
                                </tr>
                                </tfoot>
                            </table></div></div></div>
                        </div>
                        
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one">
                <div class="widget-content">
                    <div class="cart-modal">
                        <div class="topCartSection bg-white margin-bottom-60">
                            <button class="text-danger cartClose"><i class="lar la-times-circle"></i></button>
                        </div>
                        @livewire('order-cart', ['restaurant' => $restaurant])
                    
                    </div>
                   <!-- Modal -->
                 @livewire('show-cart', ['restaurant' => $restaurant])
                </div>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
    
    
    

    {{-- new codes end --}}
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
{!! Html::script('plugins/table/datatable/datatables.js') !!}
@endpush

@push('custom-scripts')
@livewireScripts
<script>
    $(document).ready(function() {
        $('#basic-dt').DataTable({
            "language": {
                "paginate": {
                    "previous": "<i class='las la-angle-left'></i>",
                    "next": "<i class='las la-angle-right'></i>"
                }
            },
            "lengthMenu": [5,10,15,20],
            "pageLength": 5
        });
        $('#dropdown-dt').DataTable({
            "language": {
                "paginate": {
                    "previous": "<i class='las la-angle-left'></i>",
                    "next": "<i class='las la-angle-right'></i>"
                }
            },
            "lengthMenu": [5,10,15,20],
            "pageLength": 5
        });
        $('#last-page-dt').DataTable({
            "pagingType": "full_numbers",
            "language": {
                "paginate": {
                    "first": "<i class='las la-angle-double-left'></i>",
                    "previous": "<i class='las la-angle-left'></i>",
                    "next": "<i class='las la-angle-right'></i>",
                    "last": "<i class='las la-angle-double-right'></i>"
                }
            },
            "lengthMenu": [3,6,9,12],
            "pageLength": 3
        });
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = parseInt( $('#min').val(), 10 );
                var max = parseInt( $('#max').val(), 10 );
                var age = parseFloat( data[3] ) || 0; // use data for the age column
                if ( ( isNaN( min ) && isNaN( max ) ) ||
                    ( isNaN( min ) && age <= max ) ||
                    ( min <= age   && isNaN( max ) ) ||
                    ( min <= age   && age <= max ) )
                {
                    return true;
                }
                return false;
            }
        );
        var table = $('#range-dt').DataTable({
            "language": {
                "paginate": {
                    "previous": "<i class='las la-angle-left'></i>",
                    "next": "<i class='las la-angle-right'></i>"
                }
            },
            "lengthMenu": [5,10,15,20],
            "pageLength": 5
        });
        $('#min, #max').keyup( function() { table.draw(); } );
        $('#export-dt').DataTable( {
            dom: '<"row"<"col-md-6"B><"col-md-6"f> ><""rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>>',
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'btn btn-primary' },
                    { extend: 'csv', className: 'btn btn-primary' },
                    { extend: 'excel', className: 'btn btn-primary' },
                    { extend: 'pdf', className: 'btn btn-primary' },
                    { extend: 'print', className: 'btn btn-primary' }
                ]
            },
            "language": {
                "paginate": {
                    "previous": "<i class='las la-angle-left'></i>",
                    "next": "<i class='las la-angle-right'></i>"
                }
            },
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        } );
        // Add text input to the footer
        $('#single-column-search tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
        } );
        // Generate Datatable
        var table = $('#single-column-search').DataTable({
            "language": {
                "paginate": {
                    "previous": "<i class='las la-angle-left'></i>",
                    "next": "<i class='las la-angle-right'></i>"
                }
            },
            "lengthMenu": [5,10,15,20],
            "pageLength": 5
        });
        // Search
        table.columns().every( function () {
            var that = this;
            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );
        var table = $('#toggle-column').DataTable( {
            "language": {
                "paginate": {
                    "previous": "<i class='las la-angle-left'></i>",
                    "next": "<i class='las la-angle-right'></i>"
                }
            },
            "lengthMenu": [5,10,15,20],
            "pageLength": 5
        } );
        $('a.toggle-btn').on( 'click', function (e) {
            e.preventDefault();
            // Get the column API object
            var column = table.column( $(this).attr('data-column') );
            // Toggle the visibility
            column.visible( ! column.visible() );
            $(this).toggleClass("toggle-clicked");
        } );
    } );
</script>
<script src="{{ asset('js/order-cart.js') }}"></script>
<script src="{{ asset('assets/restaurant/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/restaurant/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/restaurant/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/menu-item/index.js') }}"></script>

@endpush
