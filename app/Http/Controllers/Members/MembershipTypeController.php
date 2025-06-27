<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member\Member;
use App\Models\Member\Charge;
use App\Models\Member\MemberDeposit;
use App\Models\Member\ChargeType;
use App\Models\Member\MembershipType;
use Brian2694\Toastr\Facades\Toastr;

class MembershipTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $type = MembershipType::all()->where('disabled','0');

        return view('members.member_type',compact('type'));
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
        $data  = $request->all();
       $data['added_by']=auth()->user()->added_by;

        MembershipType::create($data);

         Toastr::success('Created Successfully','Success');
        return redirect(route('membership_type.index'));
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

        $data = MembershipType::find($id);

        return view('members.member_type',compact('data','id'));
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
        $data  = $request->all();
         $data['added_by']=auth()->user()->added_by;

        MembershipType::find($id)->update($data);

       Toastr::success('Updated Successfully','Success');
        return redirect(route('membership_type.index'));
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $data['disabled']='1';
       MembershipType::find($id)->update($data);

        Toastr::success('Deleted Successfully','Success');
          return redirect(route('membership_type.index'));
        //
    }
}
