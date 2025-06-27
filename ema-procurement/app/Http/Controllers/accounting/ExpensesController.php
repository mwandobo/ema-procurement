<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;


use App\Models\Accounting\GroupAccount;
use App\Models\Accounting\AccountCodes;
use App\Models\Accounting\Expenses;
use Illuminate\Http\Request;
use App\Models\Accounting\JournalEntry;
use App\Models\Accounting\Accounts;
use App\Models\Accounting\Transaction;
use App\Models\Payments\Currency;
use App\Models\Payments\Payment_methodes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\View;
use PDF;

class ExpensesController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_method = Payment_methodes::all();
      $expense = Expenses::where('multiple','0')->where('added_by',auth()->user()->added_by)->orderBy('date', 'DESC')->get();;
      $currency = Currency::all();
 $bank_accounts=AccountCodes::where('added_by',auth()->user()->added_by)->where('account_group','Cash And Banks')->get() ;
     $chart_of_accounts =AccountCodes::where('account_group','!=','Cash And Banks')->where('added_by',auth()->user()->added_by)->get() ;       
          $group_account = GroupAccount::where('added_by',auth()->user()->added_by)->get();
        return view('accounting.expenses.data', compact('expense','group_account','chart_of_accounts','payment_method','bank_accounts','currency'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
          if($request->type =='multiple'){

     $nameArr =$request->account_id ;
 $amountArr = $request->amount  ;
 $notesArr = $request->notes;

 $count=Expenses::count();
        $pro=$count+1;
        $reference= "DGC-EXP-".$pro;

$cost['amount'] = 0;
        if(!empty($nameArr)){
            for($i = 0; $i < count($nameArr); $i++){
                if(!empty($nameArr[$i])){
                   $cost['amount'] += $amountArr[$i];
                  
                }
            }

             $items = array(
                  'name' =>  $request->name,
                    'reference' =>    $reference ,
                    'type' =>  'Expenses',
                    'amount' =>   $cost['amount'] ,
                     'date' => $request->date , 
                     'bank_id' =>  $request->bank_id ,
                    'status'  => '0' ,
                     'view'  => '1' ,
                      'multiple'  => '0' ,
                    'added_by' => auth()->user()->added_by,
                    'payment_method' =>  $request->payment_method

);

                    $total_expenses = Expenses::create($items);  ; 
         
        }    


  if(!empty($nameArr)){
        for($i = 0; $i < count($nameArr); $i++){
            if(!empty($nameArr[$i])){
             $random = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(4/strlen($x)) )),1,4);
            
                $t = array(
                   'name' =>  $request->name,
                    'reference' =>    $reference,
                    'type' =>  'Expenses',
                    'amount' =>  $amountArr[$i] ,
                     'date' => $request->date , 
                     'bank_id' =>  $request->bank_id ,
                     'account_id' =>  $nameArr[$i] , 
                     'notes'  => $notesArr[$i] , 
                    'exchange_code' =>   $request->exchange_code,
                   'exchange_rate'=>  $request->exchange_rate,
                    'status'  => '0' ,
                      'view'  => '1' ,
                      'multiple'  => '1' ,
                      'multiple_id'  =>  $total_expenses->id ,
                    'trans_id' => 'TRANS_EXP_'.$random,
                    'added_by' => auth()->user()->added_by,
                    'payment_method' =>  $request->payment_method
                        );

                     $expenses = Expenses::create($t);  ; 

            }
        }
    }    


           
}

else{


 $count=Expenses::count();
        $pro=$count+1;
        $reference= "DGC-EXP-".$pro;

            $expenses = new Expenses();
            $expenses->name = $request->name;
             $expenses->type='Expenses';
       $expenses->amount = $request->amount ;
         $expenses->date  = $request->date  ;
         $expenses->account_id  = $request->account_id  ;
             $expenses->bank_id  = $request->bank_id ;
             $expenses->notes  = $request->notes ;
             $expenses->reference  = $reference ;
             $expenses->status  = '0' ;
            $expenses->view  = '0' ;
             $expenses->multiple = '0' ;
             $expenses->exchange_code =   $request->exchange_code;
             $expenses->exchange_rate=  $request->exchange_rate;
             $random = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(4/strlen($x)) )),1,4);
             $expenses->trans_id = "TRANS_EXP_".$random;
             $expenses->added_by = auth()->user()->added_by;
             $expenses->payment_method =  $request->payment_method;
             $expenses->save();
}
        
          Toastr::success('Expenses Added Successfully','Success');
            return redirect(route('expenses.index'));
        }
   

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
       $data= Expenses::find($id);


$bank_accounts=AccountCodes::where('added_by',auth()->user()->added_by)->where('account_group','Cash And Banks')->get() ;
     $chart_of_accounts =AccountCodes::where('account_group','!=','Cash And Banks')->where('added_by',auth()->user()->added_by)->get() ;      
     $currency = Currency::all();
     $payment_method = Payment_methodes::all();
            $group_account = GroupAccount::where('added_by',auth()->user()->added_by)->get() ;  
        return View::make('accounting.expenses.data', compact('data','currency','group_account','payment_method','id','chart_of_accounts','bank_accounts'))->render();
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
       
          $expenses= Expenses::find($id);
            $expenses->name = $request->name;
             $expenses->type='Expenses';
       $expenses->amount = $request->amount ;
         $expenses->date  = $request->date  ;
         $expenses->account_id  = $request->account_id  ;
             $expenses->bank_id  = $request->bank_id ;
             $expenses->notes  = $request->notes ;
             $expenses->reference  = $request->reference ;
             $expenses->exchange_code =   $request->exchange_code;
             $expenses->exchange_rate=  $request->exchange_rate;
             $expenses->added_by = auth()->user()->added_by;
             $expenses->payment_method =  $request->payment_method;
            $expenses->save();


$total_multiple=Expenses::find($expenses->multiple_id);
if(!empty($total_multiple)){
$multiple=Expenses::where('multiple_id',$total_multiple->id)->sum('amount');
$m['amount']=$multiple;
$total_multiple->update($m);
}
            Toastr::success('Expenses Updated Successfully','Success');
        return redirect(route('expenses.index'));
     
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        Expenses::destroy($id);
        Toastr::success('Expenses Deleted Successfully','Success');
         return redirect(route('expenses.index'));
    }




    public function first_approval($id)
    {
        //
        $purchase =  Expenses::find($id);
        $data['approval_1'] = auth()->user()->id;
      $data['approval_2'] = auth()->user()->id;
        $data['approval_1_date'] =date('Y-m-d');
         $data['approval_2_date'] =date('Y-m-d');
        $purchase->update($data);

   

       Toastr::success('First Approval is Successfully','Success');
        return redirect(route('expenses.index'));
    }

    public function second_approval($id)
    {
        //
        $purchase = Expenses::find($id);
        $data['approval_2'] = auth()->user()->id;
        $data['approval_2_date'] =date('Y-m-d');
        $purchase->update($data);

    

       Toastr::success('Second Approval is Successfully','Success');
        return redirect(route('expenses.index'));
    }



    public function second_disapproval($id)
    {
        //
        $purchase = Expenses::find($id);
          $data['approval_1'] = '';
          $data['approval_1_date'] ='';
        $purchase->update($data);

   

       Toastr::success('Disapproval is Successfully','Success');
         return redirect(route('expenses.index'));
    }

    public function final_disapproval($id)
    {
        //
        $purchase = Expenses::find($id);
        $data['approval_2'] = '';
          $data['approval_1'] = '';
        $data['approval_1_date'] ='';
         $data['approval_2_date'] ='';
        $purchase->update($data);

  
       Toastr::success('Disapproval is Successfully','Success');
        return redirect(route('expenses.index'));
    }
    public function approve($id)
    {
        //
        $expenses= Expenses::find($id);
        $data['status'] = 1;
        $data['approval_3'] = auth()->user()->id;
          $data['approval_3_date'] =date('Y-m-d');
        $expenses->update($data);
   
   if( $expenses->refill_id == NULL){
        $journal = new JournalEntry();
        $journal->account_id =    $expenses->account_id;
       $date = explode('-',  $expenses->date);
        $journal->date = $expenses->date;
        $journal->year = $date[0];
        $journal->month = $date[1];
        $journal->transaction_type = 'expense_payment';
        $journal->name = 'Expense Payment';
        $journal->payment_id=    $expenses->id;
        $journal->notes= 'Expense Payment with reference ' .$expenses->reference;
        $journal->debit =   $expenses->amount ;
        $journal->added_by=auth()->user()->id;
        $journal->save();

         $journal = new JournalEntry();
        $journal->account_id = $expenses->bank_id;
        $date = explode('-',  $expenses->date);
        $journal->date = $expenses->date;
        $journal->year = $date[0];
        $journal->month = $date[1];
        $journal->transaction_type = 'expense_payment';
        $journal->name = 'Expense Payment';
        $journal->credit =    $expenses->amount;
        $journal->payment_id=    $expenses->id;
        $journal->notes= 'Expense Payment with reference ' .$expenses->reference;
        $journal->added_by=auth()->user()->id;
        $journal->save();



}

 else {
        $journal = new JournalEntry();
        $journal->account_id =    $expenses->account_id;
      $date = explode('-',  $expenses->date);
        $journal->date = $expenses->date;
        $journal->year = $date[0];
        $journal->month = $date[1];
         $journal->transaction_type = 'fuel';
              $journal->name = 'Fuel Refill';
             $journal->payment_id=    $expenses->refill_id;
             $journal->notes= 'Fuel Refill Payment with reference ' .$expenses->reference;
        $journal->debit =   $expenses->amount ;
        $journal->save();

         $journal = new JournalEntry();
        $journal->account_id = $expenses->bank_id;
        $date = explode('-',  $expenses->date);
        $journal->date = $expenses->date;
        $journal->year = $date[0];
        $journal->month = $date[1];
        $journal->transaction_type = 'fuel';
              $journal->name = 'Fuel Refill';
             $journal->payment_id=    $expenses->refill_id;
        $journal->credit =    $expenses->amount;
      $journal->notes= 'Fuel Refill Payment with reference ' .$expenses->reference;
        $journal->save();

}


$bank_accounts=AccountCodes::where('account_id',$expenses->bank_id)->first() ;
if($bank_accounts->account_group == 'Cash and Cash Equivalent'){   
$account= Accounts::where('account_id',$expenses->bank_id)->first();

if(!empty($account)){
$balance=$account->balance - $expenses->amount ;
$item_to['balance']=$balance;
$account->update($item_to);
}

else{
  $cr= AccountCodes::where('id',$expenses->bank_id)->first();

     $new['account_id']= $expenses->bank_id;
       $new['account_name']= $cr->account_name;
      $new['balance']= 0-$expenses->amount;
       $new[' exchange_code']='TZS';
        $new['added_by']=auth()->user()->id;
$balance=0-$expenses->amount;
     Accounts::create($new);
}
        
   // save into tbl_transaction

                             $transaction= Transaction::create([
                                'module' => 'Expenses',
                                 'module_id' => $expenses->id,
                               'account_id' => $expenses->bank_id,
                                'code_id' => $expenses->account_id,
                                'name' => 'Expenses Payment with reference ' .$expenses->reference,
                                 'transaction_prefix' => $expenses->reference,
                                'type' => 'Expense',                               
                                'amount' =>$expenses->amount ,
                                'credit' => $expenses->amount,
                                 'total_balance' =>$balance,
                                 'date' => $expenses->date,
                                 'payment_methods_id'=>$expenses->payment_method,
                                   'status' => 'paid' ,
                                'notes' => 'Expenses Payment with reference ' .$expenses->reference ,
                                'added_by' =>auth()->user()->id,
                            ]);
                            

                          }


Toastr::success('Expenses Approved Successfully','Success');
return redirect(route('expenses.index'));


        
    }

public function delete_list($id)
    {

      $expenses=Expenses::find($id);

          $total_multiple=Expenses::find($expenses->multiple_id);
if(!empty($total_multiple)){
$multiple=Expenses::where('multiple_id',$total_multiple->id)->sum('amount');
$m['amount']=$multiple -$expenses->amount;
$total_multiple->update($m);

if($multiple -$expenses->amount == '0'){
  Expenses::destroy($expenses->multiple_id);

}

}

 Expenses::destroy($id);
Toastr::success('Deleted Successfully','Success');
        return redirect(route('expenses.index'));

    }


  public function multiple_approve(Request $request)
    {
        //
$trans_id= $request->checked_trans_id;


  if(!empty($trans_id)){
    for($i = 0; $i < count($trans_id); $i++){
   if(!empty($trans_id[$i])){

        $expenses= Expenses::find($trans_id[$i]);

if($expenses->approval_1 == ''){
 $data['approval_1'] = auth()->user()->id;
$data['approval_2'] = auth()->user()->id;
 $data['approval_1_date'] = date('Y-m-d');
$data['approval_2_date'] =date('Y-m-d');
 $expenses->update($data);
}

else if($expenses->approval_1 != '' && $expenses->approval_2 == ''){
$data['approval_2'] = auth()->user()->id;
$data['approval_2_date'] =date('Y-m-d');
 $expenses->update($data);

}



else if($expenses->approval_1 != '' && $expenses->approval_2 != '' && $expenses->approval_3 == ''){
         $data['approval_3'] = auth()->user()->id;
       $data['approval_3_date'] =date('Y-m-d');
        $data['status'] = 1;
        $expenses->update($data);
   
        $journal = new JournalEntry();
        $journal->account_id =    $expenses->account_id;
      $date = explode('-',  $expenses->date);
        $journal->date = $expenses->date;
        $journal->year = $date[0];
        $journal->month = $date[1];
        $journal->transaction_type = 'expense_payment';
        $journal->name = 'Expense Payment';
             $journal->payment_id=    $expenses->id;
             $journal->notes= 'Expense Payment with reference ' .$expenses->reference;
        $journal->added_by=auth()->user()->added_by;
        $journal->debit =   $expenses->amount;
        $journal->save();

         $journal = new JournalEntry();
        $journal->account_id = $expenses->bank_id;
        $date = explode('-',  $expenses->date);
        $journal->date = $expenses->date;
        $journal->year = $date[0];
        $journal->month = $date[1];
        $journal->transaction_type = 'expense_payment';
        $journal->name = 'Expense Payment';
        $journal->credit =    $expenses->amount;
        $journal->payment_id=    $expenses->id;
        $journal->added_by=auth()->user()->added_by;
        $journal->notes='Expense Payment with reference ' .$expenses->reference;
        $journal->save();

 $bank_accounts=AccountCodes::where('account_id',$expenses->bank_id)->first() ;
if($bank_accounts->account_group == 'Cash and Cash Equivalent'){
    $account= Accounts::where('account_id', $expenses->bank_id)->first();

if(!empty($account)){
$balance=$account->balance -  $expenses->amount ;
$item_to['balance']=$balance;
$account->update($item_to);
}

else{
  $cr= AccountCodes::where('id', $expenses->bank_id)->first();

     $new['account_id']=  $expenses->bank_id;
       $new['account_name']= $cr->account_name;
      $new['balance']= 0- $expenses->amount;
       $new[' exchange_code']='TZS';
        $new['added_by']=auth()->user()->added_by;
$balance= 0-$expenses->amount;
     Accounts::create($new);
}
        
   // save into tbl_transaction

                             $transaction= Transaction::create([
                                'module' => 'Expenses',
                                 'module_id' => $expenses->id,
                               'account_id' =>  $expenses->bank_id,
                                'code_id' =>  $expenses->account_id,
                                'name' => 'Expense Payment with reference' .$expenses->reference,
                                 'transaction_prefix' =>  $expenses->name,
                                'type' => 'Expense',
                                'amount' => $expenses->amount ,
                                'debit' =>  $expenses->amount,
                                 'total_balance' =>$balance,
                                'date' => date('Y-m-d', strtotime( $expenses->date)),
                                   'status' => 'paid' ,
                                'notes' => 'Expense Payment with reference ' . $expenses->reference ,
                                'added_by' =>auth()->user()->added_by,
                            ]);
}                            

}


 }
                  }

     Toastr::success('Expenses Approved Successfully','Success');
        return redirect(route('expenses.index'));
    }



else{
Toastr::error('You have not chosen an entry','Error');
  return redirect(route('expenses.index'));
}

}



public function multiple_disapproval(Request $request)
    {
        //
$trans_id= $request->checked_trans_id;


  if(!empty($trans_id)){
    for($i = 0; $i < count($trans_id); $i++){
   if(!empty($trans_id[$i])){

        $expenses= Expenses::find($trans_id[$i]);


if($expenses->approval_1 != '' && $expenses->approval_2 == ''){
 $data['approval_1'] = '';
$data['approval_1_date'] ='';
 $expenses->update($data);

}



else if($expenses->approval_1 != '' && $expenses->approval_2 != '' && $expenses->approval_3 == ''){
        $data['approval_2'] = '';
          $data['approval_1'] = '';
           $data['approval_1_date'] ='';
           $data['approval_2_date'] ='';
        $expenses->update($data);
        

}


 }
                  }

     Toastr::success('Disapproval is Successfully','Success');
        return redirect(route('expenses.index'));
    }



else{
Toastr::error('You have not chosen an entry','Error');
  return redirect(route('expenses.index'));
}

}

public function findList(Request $request)
   {
                $id=$request->id;
                $type = $request->type;
          if($type == 'view'){   
           $expense = Expenses::where('multiple_id',$id)->get() ;
              $data= Expenses::find($id) ;
               return view('accounting.expenses.list',compact('expense','id','data'));
            }
  else if($type == 'disapprove'){   
           $expense = Expenses::where('multiple_id',$id)->where('status','0')->where('approval_1', '>' ,'0')->get() ;
             $data= Expenses::find($id) ;
               return view('accounting.expenses.disapprove_list',compact('expense','id','data'));
            }
}


public function multiple_pdfview(Request $request)
    {
        //
        $expenses =Expenses::find($request->id);
        $items=Expenses::where('multiple_id',$request->id)->get() ;;

        view()->share(['expenses'=>$expenses ,'items'=> $items]);

        if($request->has('download')){
        $pdf = PDF::loadView('accounting.expenses.list_details_pdf')->setPaper('a4', 'potrait');
         return $pdf->download('PAYMENTS REF NO # ' .  $expenses->reference . ".pdf");
        }
        return view('multiple_pdfview');
    }


}
