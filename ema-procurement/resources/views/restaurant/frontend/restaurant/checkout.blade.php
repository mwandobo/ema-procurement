@extends('layout.master')

@push('plugin-styles')

@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="layout-top-spacing mb-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing">
                            {{-- new codes start --}}
                            <div class="container-fluid custom-container margin-top-40">
                                {{-- <form id="payment-form" action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data"> --}}
                                <form id="payment-form" action="#" method="POST" enctype="multipart/form-data">
                                    <div class="row no-margin-row">
                                        <div class="col-lg-8 col-md-8">
                                            <h3 class="margin-top-0 margin-bottom-30">{{ __('frontend.costomer_details') }}</h3>
                                            @csrf
                                            <div class="row no-margin-row">
                                                <center><img class="img " style="width: 250px;height: 250px" src="{{ asset('assets/img/qrcode.png') }}"  alt=""></center>
                                                
                                                <div class="form-group col-sm-12">
                                                    <label>{{ __('frontend.qrscan') }} <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('mobile') is-invalid @enderror phone" placeholder="{{ __('frontend.qrscan') }}" name="qrscan"  onkeypress='validate(event)'>
                                                    @error('mobile')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                               
                                            </div>
                            
                                          
                                        </div>
                            
                                        <div class="col-lg-4 col-md-4 margin-top-0 margin-bottom-60">
                                            <h3 class="margin-top-0 margin-bottom-30">{{ __('frontend.order_summary') }}</h3>
                                            <div class="row no-margin-row">
                                                <div class="col-md-12 item-list">
                                                    @if(!blank($menuitems))
                                                    @foreach( $menuitems['items'] as $item)
                                                    <table class="table cart-table">
                                                        <tr>
                                                            <td class="bold">{{ $item['qty'] }}</td>
                                                            <td>{{ __('frontend.x') }}</td>
                                                            <td class="">{{ $item['name'] }}</td>
                                                            <td class="style float-right">
                                                                {{$item['totalPrice'] }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="variation-option-style">
                                                                @if(isset($item['variation']['name']) && isset($item['variation']['price']))
                                                                <b>{{ $item['variation']['name'] }}</b>
                                                                @endif
                                                                @if(!blank($item['options']))
                                                                <br>
                                                                @foreach ($item['options'] as $option)
                                                                <span>+ {{ $option['name'] }}</span><br>
                                                                @endforeach
                                                                @endif
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                    @endforeach
                                                    @endif
                                                </div>
                            
                                                <div class="col-md-12">
                                                    <hr class="hr-cart-style">
                                                    <table class="table cart-table subtotal">
                                                       
                                                        <tr>
                                                            <td>{{ __('frontend.subtotal') }}</td>
                                                            <td class="float-right">{{ $menuitems['subTotalAmount'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('frontend.discount') }}</td>
                                                            <td class="float-right">{{$menuitems['coupon_amount']}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('frontend.delivery_charge') }}</td>
                                                            <td class="float-right"></td>
                                                            <td class="float-right">{{  0 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold">{{ __('frontend.total') }}</td>
                                                            <td class="float-right"></td>
                                                            <td class="bold float-right">{{ $menuitems['totalAmount']}}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                            
                                    </div>
                                    <div class="row no-margin-row">
                                        <div class="col-lg-12 col-md-12 form-group margin-bottom-65 d-flex">
                                            <a href="{{route('restauranthome')}}" class="button continueBtn">{{ __('frontend.continue') }}</a>
                            
                                            <button type="submit" class="button booking-confirmation-btn " @if($menuitems['totalAmount'] <=0) disabled @endif>{{ __('frontend.place_order') }}</button>
                                        </div>
                                    </div>
                            
                                </form>
                            </div>
                            
                            {{-- new codes end --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')

@endpush

@push('custom-scripts')
{{-- <script>
    const siteName = "{{ setting('site_name') }}";
    const siteLogo = "{{ asset('images/'.setting('site_logo')) }}";
    const currencyName = "{{ setting('currency_name') }}";
    const razorpayKey = "{{ env('RAZORPAY_KEY') }}";
    const totalAmount = "{{ $menuitems['totalAmount'] + $restaurant->delivery_charge }}";
    const stripeKey = "{{ setting('stripe_key') }}";
</script> --}}
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('js/frontend/js/checkout/stripe.js') }}"></script>
<script src="{{ asset('js/frontend/js/image-upload.js') }}"></script>
<script src="{{ asset('js/phone_validation/index.js') }}"></script>

@endpush
