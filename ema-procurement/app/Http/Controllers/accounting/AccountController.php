<?php

namespace App\Http\Controllers\accounting;
use App\Http\Controllers\Controller;

use App\Models\Accounting\ChartOfAccount;
use App\Models\Accounting\GroupAccount;
use App\Models\Accounting\ClassAccount;
use App\Models\Accounting\AccountCodes;
use App\Models\Accounting\Expenses;
use App\Models\Accounting\Accounts;
use Illuminate\Http\Request;
use App\Models\Accounting\JournalEntry;
use App\Http\Requests;
use App\Models\Currency;
use App\Models\Payment_methodes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Laracasts\Flash\Flash;

class AccountController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
      //$account = Accounts::all();
      $account = AccountCodes::where('account_group','Cash And Banks')->get() ;
 $bank_accounts=AccountCodes::where('account_group','Cash And Banks')->get() ;
     $currency = Currency::all();
          $group_account = GroupAccount::all();
        return view('accounting.account.data', compact('currency','account','group_account','bank_accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
       $group_account = GroupAccount::all();
        return view('account_codes.create', compact('group_account'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          $cr= AccountCodes::where('id',$request->account_id)->first();

         $data=$request->post();
       $data['account_name']= $cr->account_name;
        $data['added_by']=auth()->user()->added_by;

$a=Accounts::where('account_id',$request->account_id)->first();

if(!empty($a)){
 Toastr::error('Account already exists','Error');
 return redirect(route('account.index'));
}

else{
        $account = Accounts::create($data);


 Toastr::success('Account Created Successfully','Success');
     return redirect(route('account.index'));
 }      

     
        }
   

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
       $data= Accounts::find($id);


 $bank_accounts=AccountCodes::where('account_group','Cash And Banks')->get() ;
     $currency = Currency::all();
            $group_account = GroupAccount::all();
        return View::make('accounting.account.data', compact('data','currency','group_account','id','bank_accounts'))->render();
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
       
          $account= Accounts::find($id);

    
          $cr= AccountCodes::where('id',$request->account_id)->first();

         $data=$request->post();
       $data['account_name']= $cr->account_name;
        $account->update($data);

 Toastr::success('Account Updated Successfully','Success');
 return redirect(route('account.index'));
     
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        Accounts::destroy($id);
        //Flash::success(trans('general.successfully_deleted'));

 Toastr::success('Account Deleted Successfully','Success');
   return redirect(route('account.index'));
    }

   

   
}
