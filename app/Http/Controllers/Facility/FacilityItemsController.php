<?php

namespace App\Http\Controllers\Facility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\ButtonsServiceProvider;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use  App\Models\Facility\Items;
use App\Models\Facility\Activity;
use App\Models\Facility\Facility;
use App\Models\Accounting\AccountCodes;
use Brian2694\Toastr\Facades\Toastr;

class FacilityItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
         $type=Facility::all();
         $accounts=AccountCodes::where('account_type','Income')->get() ;
            $items = Items::all();
          
        return view('facility.items',compact('type','accounts','items'));
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
        $data = $request->all();
        $data['added_by'] = auth()->user()->added_by;
        $items = Items::create($data);

if(!empty($items)){
                    $activity =Activity::create(
                        [ 
                             'added_by'=>auth()->user()->added_by,
 'user_id'=>auth()->user()->id,
                            'module_id'=>$items->id,
                             'module'=>'Item',
                            'activity'=>"Item " .  $items->name. "  Created",
                        ]
                        );                      
       }
 Toastr::success('Created Successfully','Success');
        return redirect(route('facility_items.index'));
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
       $data=Items::find($id);
      $type=Facility::all();
         $accounts=AccountCodes::where('account_type','Income')->get() ;
    return view('facility.items',compact('data','id','type','accounts'));
    
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
     $item=Items::find($id);
     $data = $request->all();
        $item->update($data);

if(!empty($item)){
                    $activity =Activity::create(
                        [ 
                             'added_by'=>auth()->user()->added_by,
 'user_id'=>auth()->user()->id,
                            'module_id'=>$id,
                             'module'=>'Item',
                            'activity'=>"Item " .  $item->name. "  Updated",
                        ]
                        );                      
       }
Toastr::success('Updated Successfully','Success');
    return redirect(route('facility_items.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        //
  $item=Items::find($id);
     $name=$item->name;
    $item->delete();


if(!empty($item)){
                    $activity =Activity::create(
                        [ 
                             'added_by'=>auth()->user()->added_by,
 'user_id'=>auth()->user()->id,
                            'module_id'=>$id,
                             'module'=>'Item',
                            'activity'=>"Item " .  $name. "  Deleted",
                        ]
                        );                      
       }

Toastr::success('Deleted Successfully','Success');
    return redirect(route('facility_items.index'));
    }


}
