@extends('layout.master')


@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tracking Trucks</h4>
                    </div>
                    <div class="card-body">
                        
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <br>
                                <div class="panel-heading">
                                
                                    <h6 class="panel-title"  style="font-family: 'Dancing Script', cursive;font-weight: bold; 
                                    background: linear-gradient(to right, #4CAF50, #2196F3); -webkit-background-clip: text; -webkit-text-fill-color:transparent;">

                                        @if(!empty($truck_id))
                                        For Truck {{ $truck_mm->truck_name }} with Registration No {{ $truck_mm->reg_no }}
                                        @endif
                                    </h6>
                                </div>

                                <br>
                                <div class="panel-body hidden-print">
                                    {!! Form::open(array('url' => '#', 'method' => 'post','class'=>'form-horizontal',
                                    'name' => 'form')) !!}
                                    <div class="row">


                                        <div class="col-md-8">
                                            <label class="">Trucks</label>

                                            <select name="truck_id" class="form-control m-b truck"
                                                id="truck_id" required>
                                                <option value="">Select Truck</option>

                                                @if(!empty($trucks[0]))

                                                @foreach($trucks as $br)
                                                <option value="{{$br->id}}">{{$br->truck_name}} - {{ $br->reg_no }}
                                                </option>
                                                @endforeach

                                                @endif
                                            </select>

                                        </div>


                                        <div class="col-md-4">
                                            <br><button type="submit" class="btn btn-success"
                                                id="btnFiterSubmitSearch">Search</button>
                                                
                                            <a href="{{Request::url()}}" class="btn btn-danger" >Reset</a>
                                            <br>
                                           

                                        </div>
                                    </div>

                                    {!! Form::close() !!}

                                </div>


                                 <br>
                                
                                @if(!empty($truck_id))


                                <div class="panel panel-white">
                                    <div class="panel-body ">


                                        <div class="table-responsive">
          
                                            <div id="map" style="height: 500px; width: 100%;"></div>
                                        
                                        
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
</section>


@endsection

@section('scripts')

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDv8vz14oxg6iZbw_qJFtKU8gomGJcQCPk&callback=initMap" async defer></script>
 
    <script>
        window.onload = function initMap() {
            var tanzania = { lat: -6.369028, lng: 34.888822 }; // Center of Tanzania
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 6,
                center: tanzania
            });

            @if(count($fetched_data) > 0)

        
                // Create markers
                var marker = new google.maps.Marker({
                    position: { lat: {{ $fetched_data['latitude'] }}, lng: {{ $fetched_data['longitude'] }} },
                    map: map,
                    title: "{{ $fetched_data['location_name'] }}"
                });
        
                // Create info window content
                var contentString = `
                    <h3>Location: {{ $fetched_data['location_name'] }}</h3>
                    <h3>Truck {{ $truck_mm->truck_name }} - {{ $truck_mm->reg_no }}</h3>
                    <p>Speed: {{ $fetched_data['speed'] }}</p>
                    <p>Time: {{ $fetched_data['sent'] }}</p>
                    <p>Imei: {{ $fetched_data['imei'] }}</p>
                `;
        
                attachInfoWindow(marker, contentString);
        
                

            @endif
        }
        
        // Attach an info window to each marker
        function attachInfoWindow(marker, content) {
            var infoWindow = new google.maps.InfoWindow({
                content: content
            });
        
            marker.addListener('click', function() {
                infoWindow.open(marker.get('map'), marker);
            });
        }
    </script>
    

@endsection