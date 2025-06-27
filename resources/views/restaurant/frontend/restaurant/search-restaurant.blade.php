
@if(isset($restaurants))
    @foreach($restaurants as $restaurant)
        <div class="col-lg-6 col-md-6">
            <a href="{{route('restaurant.show',[$restaurant])}}" class="listing-item-container compact" data-marker-id="1">
                <div class="listing-item">
                    <div class="listing-badge now-open">{{__('frontend.now_open')}}</div>
                    <img src="{{ $restaurant->image   }}" alt="{{ $restaurant->slug }}">
                    <div class="listing-item-content">
                        <h3>{{Str::limit($restaurant->name, 100)}} <i class="verified-icon"></i></h3>
                        <span>{{$restaurant->address}}</span>
                    </div>
                    <div class=" deliveryChargeBtn text-white text-center h5"> <span >{{currencyName($restaurant->delivery_charge)}}</span> {{__('frontend.delivery_fee')}}</div>
                </div>
            </a>
        </div>
    @endforeach
@endif
