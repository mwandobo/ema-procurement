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

class ChargesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $charge = Charge::all();

        $charge_type = ChargeType::all();
        $membership_type = MembershipType::all();

        return view('members.charge',compact('charge','charge_type','membership_type'));
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
    
    public function member_deposit_list()
    {
        //
        $members = Member::all()->where('status','!=',0);

        return view('members.member_deposit_list',compact('members'));
    }
    
    public function member_deposit_index(){
        
        // $charge = MemberDeposit::all();

        $charge_type = ChargeType::all();
        $membership_type = MembershipType::all();

        return view('members.deposit_charge',compact('charge_type','membership_type'));
    }
    
    public function member_deposit_store(Request $request)
    {

        
           $data['charge_type'] = $request->charge_type;
           $data['membership_type'] = $request->membership_type;
           $data['development_fee'] =$request->development_fee;
           $data['subscription_fee'] = $request->subscription_fee;
           $data['status'] = 1;
           $data['added_by'] = auth()->user()->id;

           $deposit = MemberDeposit::create($data);

          return redirect(route('member_deposit_index.index'));
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
       $num=$request->subscription_fee/365;

        if(is_float($num)){
        $intpart=floor($num);
         $data['days']= $intpart;
       }
      else{
         $data['days']=$num;
}
     
        $charges = Charge::create($data);

         Toastr::success('Charges Created Successfully','Success');
        return redirect(route('manage_charge.index'));
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
        $data = Charge::find($id);

        $charge_type = ChargeType::all();
        $membership_type = MembershipType::all();

        return view('members.charge',compact('data','id','charge_type','membership_type'));
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
     $num=$request->subscription_fee/365;

        if(is_float($num)){
        $intpart=floor($num);
         $data['days']= $intpart;
       }
      else{
         $data['days']=$num;
}
        $charges = Charge::find($id)->update($data);

       Toastr::success('Charges Updated Successfully','Success');
        return redirect(route('manage_charge.index'));
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


        $charges = Charge::find($id)->delete();

        Toastr::success('Charges Deleted Successfully','Success');
        return redirect(route('manage_charge.index'));
        //
    }
}
