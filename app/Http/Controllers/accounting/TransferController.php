<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;
use App\Models\Accounting\ChartOfAccount;
use App\Models\Accounting\GroupAccount;
use App\Models\Accounting\ClassAccount;
use App\Models\Accounting\AccountCodes;
use App\Models\Accounting\Expenses;
use App\Models\Accounting\Accounts;
use App\Models\Accounting\Transaction;
use App\Models\Accounting\Transfer;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use App\Models\JournalEntry;
use App\Http\Requests;
use App\Models\Currency;
use App\Models\Payments\Payment_methodes;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Laracasts\Flash\Flash;
use Brian2694\Toastr\Facades\Toastr;

class TransferController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
      $transfer=Transfer::orderBy('date', 'DESC')->get();
  $bank_accounts=AccountCodes::where('account_group','Cash And Banks')->get() ;
     $currency = Currency::all();
     $payment_method = Payment_methodes::all();
        return view('accounting.transfer.data', compact('payment_method','transfer','currency','bank_accounts'));
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

      if($request->to_account_id == $request->from_account_id){

 Toastr::error('You have chosen the same from and to account.','Error');
 return redirect(route('transfer.index'));
}

else{
$account= Accounts::where('account_id',$request->from_account_id)->first();

if(!empty($account)){
 $balance=$account->balance;
}

else{
     $balance='0';
 }    


$count=Transfer::count();
        $pro=$count+1;
        $reference= "DGC-TRSF-".$pro;

      $data=$request->post();
          $random = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(4/strlen($x)) )),1,4);
         $data['reference'] = "TRANS_".$random;
       $data['ref']  = $reference ;
        $data['added_by']=auth()->user()->added_by;
   $transfer=Transfer::create($data);

 Toastr::success('Transfer Created Successfully','Success');
     return redirect(route('transfer.index'));


        
     
 }      

     
        }
   

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
         $data=Transfer::find($id);
  $bank_accounts=AccountCodes::where('account_group','Cash And Banks')->get() ;
     $currency = Currency::all();
     $payment_method = Payment_methodes::all();
        return View::make('accounting.transfer.data', compact('data','currency','payment_method','id','bank_accounts'))->render();


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
       
          $transfer= Transfer::find($id);

    
             if($request->to_account_id == $request->from_account_id){

 Toastr::error('You have chosen the same from and to account.','Error');
 return redirect(route('transfer.index'));
}

else{
$account= Accounts::where('account_id',$request->from_account_id)->first();

if(!empty($account)){
 $balance=$account->balance;
}

else{
     $balance='0';
 }    





      $data=$request->post();
        $data['added_by']=auth()->user()->added_by;
   $transfer->update($data);

     Toastr::success('Transfer Created Successfully','Success');
     return redirect(route('transfer.index'));



        
     
 }      



     
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
       Transfer::destroy($id);
        //Flash::success(trans('general.successfully_deleted'));

    Toastr::success('Transfer Deleted Successfully','Success');
     return redirect(route('transfer.index'));

    }

     public function approve($id)
    {
        //
        $transfer= Transfer::find($id);
        $data['status'] = 1;
        $data['approve_by']=auth()->user()->added_by;
        $transfer->update($data);

$from_account= Accounts::where('account_id',$transfer->from_account_id)->first();
$to_account= Accounts::where('account_id',$transfer->to_account_id)->first();

if(!empty($from_account)){
$from_balance=$from_account->balance - $transfer->amount  ;
$item['balance']=$from_balance;
$from_account->update($item);

}

else{
  $dr= AccountCodes::where('id',$transfer->from_account_id)->first();

     $new['account_id']= $transfer->from_account_id;
       $new['account_name']= $dr->account_name;
      $new['balance']= 0-$transfer->amount;
       $new[' exchange_code']=$transfer->exchange_code;
        $new['added_by']=auth()->user()->added_by;
     Accounts::create($new);

$from_balance=0-$transfer->amount;
}



if(!empty($to_account)){
$to_balance=$transfer->amount + $to_account->balance;
$item_to['balance']=$to_balance;
$to_account->update($item_to);


}

else{
  $cr= AccountCodes::where('id',$transfer->to_account_id)->first();

     $new['account_id']= $transfer->to_account_id;
       $new['account_name']= $cr->account_name;
      $new['balance']= $transfer->amount;
       $new[' exchange_code']='TZS';
        $new['added_by']=auth()->user()->added_by;
     Accounts::create($new);

$to_balance=$transfer->amount;;
}

  $from= AccountCodes::where('id',$transfer->from_account_id)->first();
  $to= AccountCodes::where('id',$transfer->to_account_id)->first();

        $journal = new JournalEntry();
        $journal->account_id = $transfer->to_account_id;
        $date = explode('-',  $transfer->date);
        $journal->date = $transfer->date;
        $journal->year = $date[0];
        $journal->month = $date[1];
        $journal->transaction_type = 'transfer';
        $journal->name = 'Transfer Payment';
        $journal->payment_id =    $transfer->id;
          $journal->added_by=auth()->user()->added_by;
        $journal->notes='Money Transfer From '.$from->account_name.' to ' .$to->account_name;
        $journal->debit=     $transfer->amount;
        $journal->save();

        $journal = new JournalEntry();
        $journal->account_id =    $transfer->from_account_id;
       $date = explode('-',  $transfer->date);
        $journal->date = $transfer->date;
        $journal->year = $date[0];
        $journal->month = $date[1];
        $journal->transaction_type = 'transfer';
        $journal->name = 'Transfer Payment';
        $journal->payment_id =    $transfer->id;
          $journal->added_by=auth()->user()->added_by;
          $journal->notes='Money Transfer From '.$from->account_name.' to ' .$to->account_name;
        $journal->credit=    $transfer->amount;
        $journal->save();
    
       

 // save into tbl_transaction
                            $transaction= Transaction::create([
                                'module' => 'Transfer',
                                 'module_id' => $transfer->id,
                               'account_id' => $transfer->from_account_id,
                                'name' => 'Transfer Payment with reference  ' .$transfer->ref,
                                 'transaction_prefix' => $transfer->ref,
                                'type' => 'Transfer',
                                'amount' =>$transfer->amount ,
                                'debit' => $transfer->amount,
                                 'total_balance' =>$from_balance,
                                'date' => date('Y-m-d', strtotime($transfer->date)),
                                   'status' => 'paid' ,
                                'notes' => 'This is a transfer payment from '.$from->account_name.' to ' .$to->account_name ,
                                'added_by' =>auth()->user()->added_by,
                            ]);


 $transaction= Transaction::create([
                                'module' => 'Transfer',
                                 'module_id' => $transfer->id,
                               'account_id' => $transfer->to_account_id,
                                'name' => 'Transfer Payment with reference  ' .$transfer->ref,
                                 'transaction_prefix' => $transfer->ref,
                                'type' => 'Transfer',
                                'amount' =>$transfer->amount ,
                                'credit' => $transfer->amount,
                                 'total_balance' =>$to_balance,
                                'date' => date('Y-m-d', strtotime($transfer->date)),
                                   'status' => 'paid' ,
                                'notes' => 'This is a transfer payment from '.$from->account_name.' to ' .$to->account_name ,
                                'added_by' =>auth()->user()->added_by,
                            ]);
      
 Toastr::success('Approved Successfully','Success');
     return redirect(route('transfer.index'));

        
    }


   
}
