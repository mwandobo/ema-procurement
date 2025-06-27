<?php

namespace App\Http\Controllers\Truck;

use App\Http\Controllers\Controller;
use App\Models\Accounting\AccountCodes;
use App\Models\Truck\Truck;
use App\Models\Truck\Device;
use App\Models\Truck\DeviceHistory;
use App\Models\Accounting\JournalEntry;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Carbon\Carbon;
use App\Models\Expenses;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Http;
use DB;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $trucks = Truck::all()->where('added_by', auth()->user()->added_by)->where('disabled', 0);    

        return view('truck.truck',compact('trucks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $data = $request->all();

        $data['user_id']=auth()->user()->id;
        $data['added_by']=auth()->user()->added_by;
        $data['truck_name']= $request->truck_name;
        $data['reg_no']= $request->reg_no;
        $data['capacity']= $request->capacity;
        $data['fuel']= $request->fuel;
        $data['type']= $request->type;
        $data['truck_status']= $request->truck_status;
        $data['truck_type']= $request->truck_type;


        $truck= Truck::create($data);


      
       Toastr::success('Created Successfully','Success');
        return redirect(route('truck.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data =  Truck::find($id);

        $trucks = Truck::all()->where('added_by', auth()->user()->added_by)->where('disabled',0);    

        return view('truck.truck',compact('trucks','data','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $truck=  Truck::find($id);

        $data['truck_name']= $request->truck_name;
        $data['reg_no']= $request->reg_no;
        $data['capacity']= $request->capacity;
        $data['fuel']= $request->fuel;
        $data['type']= $request->type;
        $data['truck_status']= $request->truck_status;
        $data['truck_type']= $request->truck_type;


        $truck->update($data);
     
        Toastr::success('Updated Successfully','Success');
        return redirect(route('truck.index'));

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $leave=  Truck::find($id);

        $data['disabled'] = 1;

        $leave->update($data);
        
          Toastr::success('Deleted Successfully','Success');
        return redirect(route('truck.index'));
    }

    public function device_list(){

        $devices = Device::all();    
        

        return view('truck.device_list',compact('devices'));

    }

    public function assign_device(){

        $assigned = Truck::all()->where('added_by', auth()->user()->added_by)->whereNotNull('device_id')->where('disabled',0);

        $trucks = Truck::all()->where('added_by', auth()->user()->added_by)->where('disabled',0);   
        
        $devices = Device::all()->where('status', 0);    
        

        return view('truck.assign_truck',compact('assigned','trucks', 'devices'));

    }

    public function assign_device_store(Request $request)
    {

        $truck=  Truck::find($request->truck_id);


        $data['device_id']= $request->device_id;

        $dev_m_imei = Device::where('id', $request->device_id)->first()->imei ?? "$request->device_id";

        $data['imei']= $dev_m_imei;

        $data['truck_status']= "Unavaiable";

        $truck->update($data);

        Toastr::success('Truck Assigned To Device Successfully','Success');
        return redirect()->back();

    }

    public function tracking_old_n(Request $request)
    {

        $device_mm =  Device::where('imei', $request->truck_id)->first();

        if(!empty($device_mm)){

            $url = "http://192.46.236.241/cur_location.php";

            $token = "QW12AS34TR54";

            $authorization = "Authorization: Bearer ".$token;

            $data['imei'] = $device_mm->imei;

	
            $header = array(
             'Content-Type: application/json',
             $authorization,
             );
            
             
            try {
                    $ch = curl_init();
                    curl_setopt( $ch, CURLOPT_URL, $url );
                    curl_setopt( $ch, CURLOPT_POST, true );
                    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
                    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
                    curl_setopt( $ch, CURLOPT_HTTPHEADER,$header);
                    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                    curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($data));
                    
                    $result = curl_exec($ch);
                    
                    if($result === false){
                        throw new Exception(curl_error($ch),curl_errno($ch));
                        
                    }
                    $result = json_decode($result);


                    $fetched_data['imei'] = $result->imei;
                    $fetched_data['longitude'] = $result->longitude;
                    $fetched_data['latitude'] = $result->latitude;
                    $fetched_data['altitude'] = $result->altitude;
                    $fetched_data['angle'] = $result->angle;
                    $fetched_data['satellites'] = $result->satellites;
                    $fetched_data['speed'] = $result->speed;
                    $fetched_data['sent'] = $result->sent;



            } catch (Exception $e) {
                //throw $th;
		        trigger_error(sprintf('ERROR  #%d :%s',$e->getCode(),$e->getMessage()),E_USER_ERROR);

            } 

            finally {
                if(is_resource($ch)){
                curl_close($ch);
                }

            }

            

        }
        else{

            Toastr::success('Device Not Found Successfully','Success');
            return redirect()->back();

        }

    }


    public function tracking_old_n2(Request $request)
    {
        $device_mm = Device::where('imei', $request->truck_id)->first();

        if (!$device_mm) {
            Toastr::error('Device Not Found', 'Error');
            return redirect()->back();
        }

        $url = "http://192.46.236.241/cur_location.php";
        $token = "QW12AS34TR54";

        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token,
        ];

        $data = [
            'imei' => $device_mm->imei,
        ];

        try {
            $ch = curl_init();

            // Setup for GET request with body (not standard but forced)
            curl_setopt_array($ch, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => "GET", // Force GET
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_POSTFIELDS => json_encode($data), // Send body
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false,
            ]);

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                throw new \Exception(curl_error($ch), curl_errno($ch));
            }

            $result = json_decode($response);

            if (isset($result->imei)) {
                $fetched_data = [
                    'imei' => $result->imei,
                    'longitude' => $result->longitude,
                    'latitude' => $result->latitude,
                    'altitude' => $result->altitude,
                    'angle' => $result->angle,
                    'satellites' => $result->satellites,
                    'speed' => $result->speed,
                    'sent' => $result->sent,
                ];

                // Do something with $fetched_data...

            } else {
                Toastr::error('Invalid response from tracking API', 'Error');
            }

        } catch (\Exception $e) {
            trigger_error(sprintf('CURL ERROR #%d: %s', $e->getCode(), $e->getMessage()), E_USER_ERROR);
        } finally {
            if (is_resource($ch)) {
                curl_close($ch);
            }
        }
    }



    public function tracking(Request $request)
    {
        $trucks = Truck::where('added_by', auth()->user()->added_by)->where('disabled', 0)->get();
        $truck_id = $request->truck_id;
        $fetched_data = [];

        if (!empty($truck_id)) {
            $truck = Truck::find($truck_id);

            if (!$truck) {
                Toastr::error('Truck not found.', 'Error');
                return redirect()->back();
            }

            // Assume the truck has a related device via truck->device or truck->imei
            $device_mm = Device::where('id', $truck->device_id)->first(); // or adjust relation

            if (!$device_mm) {
                Toastr::error('Device not found for this truck.', 'Error');
                return redirect()->back();
            }

            $url = "http://192.46.236.241/cur_location.php";
            $token = "QW12AS34TR54";

            $data = ['imei' => $device_mm->imei];

            try {
                $response = Http::withHeaders([
                        'Authorization' => 'Bearer ' . $token,
                        'Content-Type' => 'application/json',
                    ])
                    ->withBody(json_encode($data), 'application/json')
                    ->send('GET', $url);

                if (!$response->successful()) {
                    Toastr::error('API call failed: ' . $response->status(), 'Error');
                    return redirect()->back();
                }

                $result = $response->json();
                $deviceData = $result['data'][0] ?? null;

                if (!$deviceData) {
                    Toastr::error('No data received from device.', 'Error');
                    return redirect()->back();
                }

                $fetched_data = [
                    'imei' => $deviceData['imei'] ?? null,
                    'longitude' => $deviceData['longitude'] ?? null,
                    'latitude' => $deviceData['latitude'] ?? null,
                    'altitude' => $deviceData['altitude'] ?? null,
                    'angle' => $deviceData['angle'] ?? null,
                    'satellites' => $deviceData['satellites'] ?? null,
                    'speed' => $deviceData['speed'] ?? null,
                    'sent' => $deviceData['sent'] ?? null,
                    'date' => null,
                ];

                if (empty($fetched_data['imei']) || empty($fetched_data['sent'])) {
                    Toastr::error('Incomplete device data received.', 'Error');
                    return redirect()->back();
                }

                try {
                    $fetched_data['date'] = Carbon::createFromFormat('Y-m-d H:i:s', $fetched_data['sent'])->format('Y-m-d');
                    $fetched_data['time_sent'] = Carbon::createFromFormat('Y-m-d H:i:s', $fetched_data['sent'])->format('Y-m-d H:i:s');

                } catch (\Exception $e) {
                    Toastr::error('Invalid date format in device data.', 'Error');
                    return redirect()->back();
                }


                // Reverse geocoding with Google Maps API
                // $googleApiKey = env('GOOGLE_MAPS_API_KEY'); // or put your key directly
                $googleApiKey = "AIzaSyDv8vz14oxg6iZbw_qJFtKU8gomGJcQCPk";
                $lat = $fetched_data['latitude'];
                $lng = $fetched_data['longitude'];
                $location_name = null;

                if ($lat && $lng) {
                    $geoResponse = Http::get("https://maps.googleapis.com/maps/api/geocode/json", [
                        'latlng' => "$lat,$lng",
                        'key' => $googleApiKey,
                    ]);

                    if ($geoResponse->successful()) {
                        $geoJson = $geoResponse->json();
                        $location_name = $geoJson['results'][0]['formatted_address'] ?? null;
                    }
                }

                $fetched_data['location_name'] = $location_name;


                $device_new = $device_mm;
                if ($device_mm->time_sent !== $fetched_data['time_sent']) {
                    $device_mm->update($fetched_data);

                    DeviceHistory::create([
                        'device_id' => $device_mm->id,
                        'device_name' => $device_mm->name,
                        'imei' => $device_mm->imei,
                        'location_name' => $fetched_data['location_name'],
                        'date' => $fetched_data['date'],
                        'longitude' => $fetched_data['longitude'],
                        'latitude' => $fetched_data['latitude'],
                        'altitude' => $fetched_data['altitude'],
                        'angle' => $fetched_data['angle'],
                        'satellites' => $fetched_data['satellites'],
                        'speed' => $fetched_data['speed'],
                        'sent' => $fetched_data['sent'],
                        'time_sent' => $fetched_data['time_sent'],
                        'status' => 0,
                    ]);
                }

                $fetched_data['name'] = $device_mm->name;


                $truck_mm = Truck::where('id', $request->truck_id)->first();

                // dd($fetched_data['longitude']);


                return view('truck.tracking', compact('device_mm', 'fetched_data', 'trucks', 'truck_id', 'truck', 'truck_mm'));

            } catch (\Exception $e) {
                report($e);
                Toastr::error('Something went wrong while fetching tracking data.', 'Error');
                return redirect()->back();
            }
        }

        return view('truck.tracking', compact('trucks', 'fetched_data'));
    }




    public function tracking11(Request $request)
    {
        $trucks = Truck::all()->where('added_by', auth()->user()->added_by)->where('disabled',0);  

        $truck_id  = $request->truck_id;

        $fetched_data = [];
        
        if(!empty($truck_id)){

                $device_mm = Device::where('imei', $request->truck_id)->first();

                if (!$device_mm) {
                    Toastr::error('Device Not Found', 'Error');
                    return redirect()->back();
                }

                $url = "http://192.46.236.241/cur_location.php";
                $token = "QW12AS34TR54";

                $data = [
                    'imei' => $device_mm->imei,
                ];

                try {
                    // Send GET request with body (non-standard, but works with custom servers)
                    $response = Http::withHeaders([
                            'Authorization' => 'Bearer ' . $token,
                            'Content-Type' => 'application/json',
                        ])
                        ->withBody(json_encode($data), 'application/json')
                        ->send('GET', $url);

                    if ($response->successful()) {
                        $result = $response->json();


                        $deviceData = $result['data'][0];

                        $fetched_data = [
                            'imei' => $deviceData['imei'] ?? null,
                            'longitude' => $deviceData['longitude'] ?? null,
                            'latitude' => $deviceData['latitude'] ?? null,
                            'altitude' => $deviceData['altitude'] ?? null,
                            'angle' => $deviceData['angle'] ?? null,
                            'satellites' => $deviceData['satellites'] ?? null,
                            'speed' => $deviceData['speed'] ?? null,
                            'sent' => $deviceData['sent'] ?? null,
                            'date' => null,
                        ];

                        // Doing something with $fetched_data...

                        $fetched_data['time_sent'] = Carbon::createFromFormat('Y-m-d H:i:s', $fetched_data['sent'])->format('Y-m-d H:i:s');


                        $check_exst  = Device::where('imei', $fetched_data['imei'])->first();

                        if (empty($check_exst)) 
                        {
                            $count_dev = Device::count();
                            $pro = $count_dev + 1;
                            $dev_name = "DIY_DEV0" . $pro;

                            $fetched_data['name'] = $dev_name;
                            $fetched_data['date'] = Carbon::createFromFormat('Y-m-d H:i:s', $fetched_data['sent'])->format('Y-m-d');

                            $device_new = Device::create($fetched_data);
                        } 
                        else 
                        {
                            if (!($check_exst->time_sent === $fetched_data['time_sent'])) {

                                $fetched_data['date'] = Carbon::createFromFormat('Y-m-d H:i:s', $fetched_data['sent'])->format('Y-m-d');

                                $check_exst->update($fetched_data);
                                $device_new = $check_exst;

                            }
                            
                        }

                        if (!empty($device_new)) {

                            if (!($check_exst->time_sent === $fetched_data['time_sent'])) {

                                    $fetched_data_h = [
                                    'device_id' => $device_new->id,
                                    'device_name' => $device_new->name,
                                    'imei' => $device_new->imei,
                                    'date' => $fetched_data['date'],
                                    'time_sent' => $fetched_data['time_sent'],
                                    'longitude' => $fetched_data['longitude'],
                                    'latitude' => $fetched_data['latitude'],
                                    'altitude' => $fetched_data['altitude'],
                                    'angle' => $fetched_data['angle'],
                                    'satellites' => $fetched_data['satellites'],
                                    'speed' => $fetched_data['speed'],
                                    'sent' => $fetched_data['sent'],
                                    'status' => 0,
                                ];

                                DeviceHistory::create($fetched_data_h);


                            }

                        }

                            

                        $truck_mm = Truck::where('id', $request->truck_id)->first();

                        return view('truck.tracking',compact('device_mm','fetched_data', 'trucks',  'truck_mm', 'truck_id'));

                    } else {
                        Toastr::error('API call failed: ' . $response->status(), 'Error');
                    }

                } catch (\Exception $e) {
                    report($e);
                    Toastr::error('Something went wrong while fetching tracking data.', 'Error');
                }

        }
        else{

            return view('truck.tracking',compact('trucks','fetched_data'));


        }


        
    }

    public function tracking_history(Request $request){

        $devices = Device::all();

        //$trucks = Truck::all()->where('added_by', auth()->user()->added_by)->where('disabled',0);   
        $trucks = Truck::where('added_by', auth()->user()->added_by)->where('disabled', 0)->get();
        $histories = [];
        

        $start_date = $request->start_date;
        $end_date = $request->end_date;
    


        $truck_id = $request->truck_id;

        if (!empty($start_date) && !empty($end_date)){

                    if(!empty($truck_id)){

                        $truckMap = Truck::where('disabled', 0)->get()->keyBy('device_id');


                
                        if($truck_id == "all"){

                            $truck_details = "All Trucks";


                            $histories = DeviceHistory::whereBetween('date', [$start_date, $end_date])
                                                    ->select('*', DB::raw("'{$start_date}' as start_date"), DB::raw("'{$end_date}' as end_date"))
                                                    ->get();
                        }
                        else{

                            $dev_id = Truck::where('id', $truck_id)->first()->device_id ?? 1;

                            $trk_mm = Truck::where('id', $truck_id)->first();

                                if(!empty($trk_mm)){

                                    $truck_details = $trk_mm->truck_name."-".$trk_mm->reg_no;


                                }
                                else{

                                    $truck_details = "Scania - T620DGA";


                                }


                            $histories = DeviceHistory::where('device_id', $dev_id)
                                    ->whereBetween('date', [$start_date, $end_date])
                                    ->select('*', DB::raw("'{$start_date}' as start_date"), DB::raw("'{$end_date}' as end_date"))
                                    ->get();

                        }

                    }
                    else{

                        $truck_details = "Scania - T620DGA";

                        $histories = DeviceHistory::whereBetween('date', [$start_date, $end_date])
                                                    ->select('*', DB::raw("'{$start_date}' as start_date"), DB::raw("'{$end_date}' as end_date"))
                                                    ->get();

                    }

                return view('truck.tracking_history',compact('trucks','histories', 'devices', 'start_date','end_date','truck_details', 'truckMap'));
                
        }
        else{

                return view('truck.tracking_history',compact('trucks', 'devices', 'histories'));


        }






    }



    
            //Bear token = "QW12AS34TR54";

            // 192.46.236.241/cur_location.php API MPYA FOR IMEI FETCHING

            // $hjk['name'] = $row->reg_no;
            
            // $hjk['location']  = $row->location;
            
            // $hjk['latitude'] = $row->latitude;
            // $hjk['longitude'] = $row->longitude;
            
            // $hjk['acre'] = $row->size;


    // public function reassign_device_store(Request $request)
    // {

    //     $truck=  Truck::find($request->truck_id);


    //     $data['device']= $request->device_id;
    //     $data['imei']= $request->imei;
    //     $data['truck_status']= "Not Avaiable";

    //     $truck->update($data);

    // }



}