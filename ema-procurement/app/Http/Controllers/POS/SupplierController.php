<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Farmer;
use App\Models\User;
use App\Models\POS\Supplier;
use App\Models\POS\Activity;
use Brian2694\Toastr\Facades\Toastr;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
        $supply=Supplier::all();
        return view('pos.supplier.manage-supplier')->with("supply",$supply);
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
        // $data= new Supply();
        $this->validate($request,[
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            
        ]); 
        
           
        $data=$request->all();
        $data['user_id']=auth()->user()->added_by;
        $result=Supplier::create($data);

if(!empty($result)){
                    $activity =Activity::create(
                        [ 
                             'added_by'=>auth()->user()->added_by,
 'user_id'=>auth()->user()->id,
                            'module_id'=>$result->id,
                             'module'=>'Supplier',
                            'activity'=>"Supplier " .  $result->name. "  Created",
                        ]
                        );                      
       }

        Toastr::success('Supplier Created Successfully','Success');
       return redirect(route('supplier.index'));
     
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
 $data=Supplier::find($id);
 return view('pos.supplier.manage-supplier',compact('data','id'));
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
        
        $this->validate($request,[
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required',
           
        ]); 
        
        $data=Supplier::find($id);
        $result=$request->all();
        $data->update($result);

 if(!empty($data)){
                    $activity =Activity::create(
                        [ 
                             'added_by'=>auth()->user()->added_by,
 'user_id'=>auth()->user()->id,
                            'module_id'=>$id,
                             'module'=>'Supplier',
                            'activity'=>"Supplier " .  $request->name. "  Updated",
                        ]
                        );                      
       }
Toastr::success('Supplier Updated Successfully','Success');
        return redirect(route('supplier.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Supplier::find($id);
        $data->delete();

 if(!empty($data)){
                    $activity =Activity::create(
                        [ 
                             'added_by'=>auth()->user()->added_by,
 'user_id'=>auth()->user()->id,
                            'module_id'=>$id,
                             'module'=>'Supplier',
                            'activity'=>"Supplier " .  $data->name. "  Deleted",
                        ]
                        );                      
       }

 Toastr::success('Supplier Deleted Successfully','Success');
         return redirect(route('supplier.index'));
    }
}
