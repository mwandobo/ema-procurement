<?php

namespace App\Http\Controllers\Bar\POS;

use App\Http\Controllers\Controller;
use App\Models\Bar\POS\Client;
use App\Models\Bar\POS\Activity;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClientController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
   {
       //
       $client = Client::where('user_id',auth()->user()->added_by)->get();     
       return view('bar.pos.client.client',compact('client'));
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
    $data = $request->all();
    $data['user_id'] = auth()->user()->added_by;
    $client = Client::create($data);

    if ($client) {
        Activity::create([
            'added_by' => auth()->user()->added_by,
            'user_id' => auth()->user()->id,
            'module_id' => $client->id,
            'module' => 'Client',
            'activity' => "Client " . $client->name . " Created",
        ]);
    }

    // Return JSON for AJAX
    if ($request->ajax()) {
        return response()->json([
            'success' => true,
            'id' => $client->id,
            'name' => $client->name,
        ]);
    }

    // fallback for non-AJAX requests
    return redirect()->route('bar_pos_client.index')->with('success', 'Client Created Successfully');
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
       $data =  Client::find($id);
       return view('bar.pos.client.client',compact('data','id'));

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
       $client = Client::find($id);
       $data=$request->post();
       $data['user_id']=auth()->user()->added_by;
       $client->update($data);

 if(!empty($client)){
                    $activity =Activity::create(
                        [ 
                             'added_by'=>auth()->user()->added_by,
 'user_id'=>auth()->user()->id,
                            'module_id'=>$id,
                             'module'=>'Client',
                            'activity'=>"Client " .  $client->name. "  Updated",
                        ]
                        );                      
       }

       Toastr::success('Client Updated Successfully','Success');
       return redirect(route('bar_pos_client.index'));
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

       $client = Client::find($id);
if(!empty($client)){
                    $activity =Activity::create(
                        [ 
                             'added_by'=>auth()->user()->added_by,
 'user_id'=>auth()->user()->id,
                            'module_id'=>$id,
                             'module'=>'Client',
                            'activity'=>"Client " .  $client->name. "  Deleted",
                        ]
                        );                      
       }
       $client->delete();

       Toastr::success('Client Deleted Successfully','Success');
       return redirect(route('bar_pos_client.index'));
   }
}
