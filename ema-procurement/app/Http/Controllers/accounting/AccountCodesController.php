<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;


use App\Models\Accounting\ChartOfAccount;
use App\Models\Accounting\GroupAccount;
use App\Models\Accounting\ClassAccount;
use App\Models\Accounting\AccountCodes;
use App\Models\Accounting\SubGroupAccount;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class AccountCodesController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $user=auth()->user()->added_by;
        $codes = AccountCodes::where('added_by',$user)->where('account_status','Active')->orderBy('account_codes','asc')->get();
         //$codes = AccountCodes::orderBy('account_codes','asc')->get();
          $group_account = GroupAccount::where('added_by',$user)->get();
    
        return view('accounting.account_codes.data', compact('codes','group_account'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
       $group_account = GroupAccount::all();
        return view('accounting.account_codes.create', compact('group_account'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
      $validatedData = $request->validate([
        'account_name' => 'required',
        'account_group' => 'required',
          'account_status' => 'required',
    ]);
 
  
  $added_by = auth()->user()->added_by;
     
      
            $account_codes = new AccountCodes();
           
      $sub=SubGroupAccount::find($request->sub_group);;
 
       $account_codes->account_name = $request->account_name ;
        $account_codes->account_group  = $request->account_group  ;
        $account_codes->account_status  = $request->account_status  ;

      if(!empty($sub)){
       $account_codes->sub_group=$sub->sub_group;
}

      $group=GroupAccount::where('name', $request->account_group)->where('added_by',$added_by)->first();                                 
      $account_codes->account_type= $group->type;
          $account_codes->added_by = auth()->user()->added_by;

  
 $max_codes=AccountCodes::where('account_group',$request->account_group)->where('added_by',$added_by)->max('account_codes');
 $before=AccountCodes::where('account_group',$request->account_group)->where('added_by',$added_by)->where('account_codes',$max_codes)->first();
          if(!empty($before)){
      $count=AccountCodes::where('account_group',$request->account_group)->where('added_by',$added_by)->count();
                if($count == '99'){
          Toastr::error('You have exceeded the limit for the group.','Error');
  return redirect(route('account_codes.index'));

}
            else{
          $account_codes->account_codes =     $max_codes +1;
         $account_codes->order_no = $before->order_no +1;
}
}
 else{
            $account_codes->account_codes = $group->group_id +1;
         $account_codes->order_no = '0';

}
           


            $account_codes->save();

            AccountCodes::where('id',$account_codes->id)->update(['account_id' => $account_codes->id]);

              $chart_of_account = new ChartOfAccount();
              $chart_of_account->id =  $account_codes->id;
             $chart_of_account->account_codes = $account_codes->account_codes;
            $chart_of_account->account_name = $request->account_name ;
               $chart_of_account->name = $request->account_name ;
                $chart_of_account->gl_code = $account_codes->account_codes;
           $chart_of_account->account_type =     $account_codes->account_type ;
              $chart_of_account->active = $request->account_status  ;
                $chart_of_account->added_by =auth()->user()->added_by;
            $chart_of_account->save();
            
        
        
        Toastr::success('Account Code Created Successfully','Success');
        return redirect('account_codes');
        }
   

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
  $user=auth()->user()->added_by;
       $data= AccountCodes::find($id);
            $group_account =GroupAccount::where('added_by',$user)->get();
          $sub = SubGroupAccount::where('added_by',$user)->where('disabled','0')->where('name',$data->account_group)->get();
        return View::make('accounting.account_codes.data', compact('data','group_account','id','sub'))->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    $account_codes= AccountCodes::find($id);

              $sub=SubGroupAccount::find($request->sub_group);;
     

         $account_codes->account_codes = $request->account_codes;
       $account_codes->account_name = $request->account_name ;
        $account_codes->account_group  = $request->account_group  ;
        $account_codes->account_status  = $request->account_status  ;

         if(!empty($sub)){
       $account_codes->sub_group=$sub->sub_group;
}

 $added_by = auth()->user()->added_by;

     $group=GroupAccount::where('name', $request->account_group)->where('added_by',$added_by)->first();                                 
      $account_codes->account_type= $group->type;



  $old = AccountCodes::find($id);

          if($old->account_group != $request->account_group){
 $max_codes=AccountCodes::where('account_group',$request->account_group)->where('added_by',$added_by)->max('account_codes');
 $before=AccountCodes::where('account_group',$request->account_group)->where('added_by',$added_by)->where('account_codes',$max_codes)->first();
          if(!empty($before)){
     $count=AccountCodes::where('account_group',$request->account_group)->where('added_by',$added_by)->count();
                if($count == '99'){
   Toastr::error('You have exceeded the limit for the group.','Error');

}
            else{
          $account_codes->account_codes =     $max_codes+1;
         $account_codes->order_no = $before->order_no +1;
}
}
 else{
            $account_codes->account_codes = $group->group_id +1;
         $account_codes->order_no = '0';

}
  }

else{
$account_codes->account_codes =   $old->account_codes;
}         
            $account_codes->save();

          ChartOfAccount::where('id',$account_codes->id)->update([
              'account_codes' =>$account_codes->account_codes,
              'account_name' =>$request->account_name,
              'account_type' => $account_codes->account_type,
                 'name' =>$request->account_name,
                  'gl_code' =>$account_codes->account_codes,
                    'active' =>$request->account_status,
          ]);
       Toastr::success('Account Code Updated Successfully','Success');
     return redirect('account_codes');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        AccountCodes::destroy($id);
          ChartOfAccount::where('id',$id)->delete();

          Toastr::success('Account Codes Deleted Successfully','Success');
        return redirect('account_codes');
    }


public function findSub(Request $request)
    {

        $district= SubGroupAccount::where('name',$request->id)->where('disabled','0')->get();                                                                                    
               return response()->json($district);

}
}
