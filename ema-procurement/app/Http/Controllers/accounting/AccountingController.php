<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;

use App\Models\Accounting\ClassAccount;
use App\Models\Accounting\JournalEntry;
use App\Traits\Calculate_netProfitTrait2;
use App\Traits\Calculate_netProfitTrait5;
use App\Models\Accounting\ChartOfAccount;
use App\Models\Expense;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Member\Member;
use App\Models\Supplier;
use App\Models\Accounting\AccountCodes;
use App\Models\Accounting\Accounts;
use App\Models\Accounting\BankReconciliation;
use App\Models\Accounting\Transaction;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\ButtonsServiceProvider;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AccountingController extends Controller
{
  


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trial_balance(Request $request)
    {
       
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        return view('accounting.accounting.trial_balance',
            compact('start_date',
                'end_date'));
    }
    public function journal(Request $request)
    {
       
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $account_id=$request->account_id;
        $chart_of_accounts = [];
        foreach (ChartOfAccount::all() as $key) {
            $chart_of_accounts[$key->id] = $key->name;
        }
        if($request->isMethod('post')){
            $data=JournalEntry::where('account_id', $request->account_id)->whereBetween('date',[$start_date,$end_date])->get();
        }else{
            $data=[];
        }
        return view('accounting.accounting.journal',
            compact('start_date',
                'end_date','chart_of_accounts','data','account_id'));
    }

      use Calculate_netProfitTrait2;
     use Calculate_netProfitTrait5;
    public function ledger(Request $request)
    {
       
        $start_date = $request->start_date;
        $second_date = $request->second_date;
        $end_date = $request->end_date;

  $income = ClassAccount::where('class_type','Income')->get();
           $cost = ClassAccount::where('class_type','Expense')->get();
           $expense= ClassAccount::where('class_type','Expense')->get();


        
              if(!empty($start_date) || !empty($end_date)){
          $net_profit = $this->get_netProfit5($start_date, $second_date,$end_date);
          $net_tax= $this->get_netProfit5($start_date, $second_date,$end_date);
        }
        
else{
     $net_profit ='';    
  $net_tax ='';       
}

        
         $net_p = $this->get_netProfit2();
         $net_t = $this->get_netProfit2();

        return view('accounting.accounting.ledger',
            compact('start_date','second_date','income','expense','end_date',
                'cost' ,'net_profit','net_p' ,'net_tax','net_t'));
    }
    
    public function create_manual_entry(Request $request)
    {
       
         if($request->ajax()) {
            $data = JournalEntry::select('*')->where('added_by',auth()->user()->added_by)->latest()->get();
            // dd($data);
            
            return Datatables::of($data)
                    ->addIndexColumn()
                        ->editColumn('account_code', function ($row) {
                     $code =AccountCodes::find($row->account_id);
                    return  $code->account_codes;
                    
                            })
                            
                    ->editColumn('account_name', function ($row) {
                     $code =AccountCodes::find($row->account_id);
                    return  $code->account_name;
                            })
                          ->editColumn('debit', function ($row) {
                        return number_format($row->debit,2);
                   })
                       ->editColumn('credit', function ($row) {
                        return number_format($row->credit,2);
                   })
                     ->editColumn('date', function ($row) {
                        $newDate = date("d/m/Y", strtotime($row->date));
                        return $newDate;
                   })

                   ->rawColumns(['date'])
                    ->make(true);
                    
                     
        }
        
      
      
         $supplier=Supplier::all();
         $date=date('Y-m-d');
        $client=Member::where('disabled',0)->where('due_date', '>', $date)->get();
        $user =User::whereNull('member_id')->whereNull('visitor_id')->where('disabled','0')->get();
       $chart_of_accounts = AccountCodes::all()->whereNotIn('account_name', ['VAT IN', 'VAT OUT','Retained income']);
        
         
         
        return view('accounting.accounting.create_manual_entry',
            compact('chart_of_accounts','client', 'supplier','user'));
       
       
    }
   public function store_manual_entry(Request $request)
    {
       

        
        $accArr =$request->account_id ;
        $debitArr = str_replace(",","",$request->debit) ;
        $creditArr =str_replace(",","",$request->credit) ;
        $notesArr = $request->notes;
        $typeArr = $request->type;
        
        
         if(!empty($accArr)){
        for($i = 0; $i < count($accArr); $i++){
            if(!empty($accArr[$i])){
                
        $vat=AccountCodes::find($accArr[$i]);
        $vat_in=AccountCodes::where('account_name','VAT IN')->where('added_by',auth()->user()->added_by)->get()->first()->id;
        $vat_out=AccountCodes::where('account_name','VAT OUT')->where('added_by',auth()->user()->added_by)->get()->first()->id;
       
           
         $journal = new JournalEntry();
         
         if($vat->account_name == 'Value Added Tax (VAT)'){
            
             
             if($debitArr[$i] > 0){
          $journal->account_id=$vat_in;
             }
             
            else if($creditArr[$i] > 0){
          $journal->account_id=$vat_out;
             }
             
          } 
          else{
         $journal->account_id = $accArr[$i];
          }
          
         $date = explode('-', $request->date);
         $journal->date = $request->date;
         $journal->year = $date[0];
         $journal->month = $date[1];
         $journal->name = 'Manual Entry';
         $journal->transaction_type = 'manual_entry';
         $journal->debit = $debitArr[$i];
         $journal->credit = $creditArr[$i];
         if($typeArr[$i] == 'Client'){
         $journal->member_id  = $request->client_id[$i] ;
         }
         elseif($typeArr[$i] == 'Supplier'){
         $journal->supplier_id  = $request->supplier_id[$i] ;
         }
         elseif($typeArr[$i] == 'User'){
         $journal->user_id  = $request->user_id[$i] ;
         }
         
         $journal->notes = $notesArr[$i];
         $journal->added_by=auth()->user()->added_by;
         $journal->save();

        
         
         
         
          $debit=AccountCodes::find($accArr[$i]);
    if($debit->account_group == 'Cash And Banks' && $debitArr[$i] > 0){

     $account= Accounts::where('account_id', $accArr[$i])->first();

if(!empty($account)){
$balance=$account->balance +  $debitArr[$i] ;
$item_to['balance']=$balance;
$account->update($item_to);
}

else{
  $cr= AccountCodes::where('id', $accArr[$i])->first();

     $new['account_id']= $accArr[$i];
       $new['account_name']= $cr->account_name;
      $new['balance']= 0+$debitArr[$i];
       $new[' exchange_code']='TZS';
        $new['added_by']=auth()->user()->added_by;
$balance=0+ $debitArr[$i];
     Accounts::create($new);
}
        
   // save into tbl_transaction
                            $transaction= Transaction::create([
                                'module' => 'Journal Entry',
                                 'module_id' =>  $journal->id,
                               'account_id' =>  $accArr[$i],
                                'name' => 'Journal Entry Payment',
                                'type' => 'Income',
                                'amount' => $debitArr[$i] ,
                                'credit' =>  $debitArr[$i],
                                 'total_balance' =>$balance,
                                'date' => date('Y-m-d', strtotime($request->date)),
                                   'status' => 'paid' ,
                                'notes' => 'This income is from journal entry payment.' ,
                                'added_by' =>auth()->user()->added_by,
                            ]);


}



$credit=AccountCodes::find($accArr[$i]);
    if($credit->account_group == 'Cash And Banks' && $creditArr[$i] > 0){

     $account= Accounts::where('account_id',$accArr[$i])->first();

if(!empty($account)){
$balance=$account->balance - $creditArr[$i] ;
$item_to['balance']=$balance;
$account->update($item_to);
}

else{
  $cr= AccountCodes::where('id',$accArr[$i])->first();

     $new['account_id']=$accArr[$i];
       $new['account_name']= $cr->account_name;
      $new['balance']= 0-$creditArr[$i];
       $new[' exchange_code']='TZS';
        $new['added_by']=auth()->user()->added_by;
$balance=0-$creditArr[$i];
     Accounts::create($new);
}
        
   // save into tbl_transaction
                            $transaction= Transaction::create([
                                'module' => 'Journal Entry',
                                 'module_id' =>  $journal->id,
                               'account_id' => $accArr[$i],
                                'name' => 'Journal Entry Payment',
                                'type' => 'Expense',
                                'amount' =>$creditArr[$i] ,
                                'debit' => $creditArr[$i],
                                 'total_balance' =>$balance,
                                'date' => date('Y-m-d', strtotime($request->date)),
                                   'status' => 'paid' ,
                                'notes' => 'This expense is from journal entry payment.' ,
                                'added_by' =>auth()->user()->id,
                            ]);


}


        
               

            }
        }
        
        Toastr::success('Added Successfully','Success');
        return redirect('accounting/manual_entry');
    }    
 
         
       
else{
     Toastr::error('You have not chosen an account','Error');
        return redirect('accounting/manual_entry');
} 

    }

    public function bank_statement(Request $request)
    {
       
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $account_id=$request->account_id;
        $chart_of_accounts = [];
        foreach (AccountCodes::where('account_group','Cash And Banks')->get() as $key) {
            $chart_of_accounts[$key->id] = $key->account_name;
        }
        if($request->isMethod('post')){
            $data=JournalEntry::where('account_id', $request->account_id)->whereBetween('date',[$start_date,$end_date])->orderBy('date','desc')->get();
        }else{
            $data=[];
        }

        if($request->isMethod('post')){
            $open_debit=JournalEntry::where('account_id', $request->account_id)->where('date','<', $start_date)->sum('debit');
        }else{
            $open_debit=[];
        }

        if($request->isMethod('post')){
            $open_credit=JournalEntry::where('account_id', $request->account_id)->where('date','<', $start_date)->sum('credit');
        }else{
            $open_credit=[];
        }
        return view('accounting.accounting.bank_statement',
            compact('start_date',
                'end_date','chart_of_accounts','data','account_id','open_debit','open_credit'));
    }

    public function bank_reconciliation(Request $request)
    {
       
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $account_id=$request->account_id;
        $chart_of_accounts = [];
        foreach (AccountCodes::where('account_group','Cash And Banks')->get() as $key) {
            $chart_of_accounts[$key->id] = $key->account_name;
        }
        if($request->isMethod('post')){
            $data=JournalEntry::where('reconcile', 0)->where('account_id', $request->account_id)->whereBetween('date',[$start_date,$end_date])->orderBy('date','desc')->get();
        }else{
            $data=[];
        }

       

        return view('accounting.accounting.bank_reconciliation',
            compact('start_date',
                'end_date','chart_of_accounts','data','account_id'));
    }


    public function save_reconcile(Request $request)
    {

$trans_id= $request->checked_trans_id;


  if(!empty($trans_id)){
    for($i = 0; $i < count($trans_id); $i++){
   if(!empty($trans_id[$i])){
    
             $acc = JournalEntry::find($trans_id[$i]);       
                  $items = array(
                    'name' =>  $acc->name,
                    'account_id' => $acc->account_id,
                     'transaction_type' => $acc->transaction_type,
                    'date' => date('Y-m-d'),
                    'payment_id' => $acc->payment_id,
                    'debit' =>$acc->debit,
                    'credit' =>   $acc->credit,
                    'currency_code' => $acc->currency_code,
                    'notes' => $acc->notes,
                    'added_by' =>  auth()->user()->added_by);

                    BankReconciliation::create($items);  ;

                    JournalEntry::where('id',$trans_id[$i])->update(['reconcile' => '1']);

                  }
                  }
  Toastr::success('Reconciled Successfully','Success');
  return redirect(route('reconciliation.report'))->with(['success'=>'Reconciled Successfully']);
                }


else{
  Toastr::error('You have not chosen an entry','Error');
  return redirect(route('reconciliation.view'));
}

              
   
}

    public function reconciliation_report()
    {
        //
        $data= BankReconciliation::all();
       return view('accounting.accounting.reconciliation_report',compact('data'));
    }
    
    public function discountModal(Request $request)
    {
        $id = $request->id;
        $modal_type = $request->modal_type;  
       
        //dd($request->all());

        switch ($modal_type) {

                
                 case 'edit':
                     
         $supplier=Supplier::all();
         $date=date('Y-m-d');
        $client=Member::where('due_date', '>', $date)->where('disabled',0)->get();
        $user =User::whereNull('member_id')->whereNull('visitor_id')->where('disabled','0')->get();
       $chart_of_accounts = AccountCodes::all()->whereNotIn('account_name', ['VAT IN', 'VAT OUT','Retained income']);
        
                  
          $type=$request->type[0];
          $notes=$request->notes[0];
          $acc=$request->account_id[0];
          $debit=str_replace(",","",$request->debit[0]);
          $credit=str_replace(",","",$request->credit[0]);
          $client_id  = $request->client_id[0] ;
          $supplier_id  = $request->supplier_id[0] ;
          $user_id  = $request->user_id[0] ;
          $order=$request->no[0];
                  
                  if(!empty($request->saved_items_id[0])){
                  $saved=$request->saved_items_id[0];
                  }
                  else{
                   $saved='';   
                  }
                  
                return view('accounting.accounting.edit_modal', compact('type','notes','acc','debit','credit','client_id','supplier_id','user_id','order','modal_type','saved','chart_of_accounts','client', 'supplier','user',));
                break;

            default:
                break;
        }
    }
    
    
    public function add_item(Request $request)
    {
        //dd($request->all());

       $data=$request->all();
       
       
        
          $list = '';
          $list1 = ''; 

          
      
          $type=$request->checked_type[0];
          $notes=$request->checked_notes[0];
          $acc=$request->checked_account_id[0];
          $debit=str_replace(",","",$request->checked_debit[0]);
          $credit=str_replace(",","",$request->checked_credit[0]);
          $client_id  = $request->checked_client_id[0] ;
          $supplier_id  = $request->checked_supplier_id[0] ;
          $user_id  = $request->checked_user_id[0] ;
          $order=$request->checked_no[0];
          
         $name=AccountCodes::where('id',$acc)->first();
          
        if($type == 'Client'){
       
        $client=Member::where('id', $client_id)->first();
        $a = 'Member - '.$client->full_name; 
         }
         elseif($type == 'Supplier'){
        $supp=Supplier::where('id', $supplier_id)->first();
        $a = $type .' - '.$supp->name; 
         }
         elseif($type == 'User'){
        $user=User::where('id', $user_id)->first();
        $a = 'Staff - '.$user->name; 
         }
         
          else{
        $a = $type ; 
         }

          
          if(!empty($request->saved_items_id[0])){
            $saved=$request->saved_items_id[0];
            }
            else{
            $saved='';   
                  }
          
          if(!empty($request->modal_type) && $request->modal_type == 'edit'){
            $list .= '<td>'.$a.'</td>';
            $list .= '<td>'.$name->account_name.'</td>';
            $list .= '<td>'.number_format($debit,2).'</td>';
            $list .= '<td>'.number_format($credit,2).'</td>';
            $list .= '<td>'.$notes.'</td>';
             if(!empty($saved)){
            $list .='<td><a class="list-icons-item text-info edit1" title="Check" href="javascript:void(0)" data-target="#appFormModal" data-toggle="modal" data-button_id="' .$order.'"><i class="icon-pencil7" style="font-size:18px;"></i></a>&nbsp&nbsp<a class="list-icons-item text-danger rem" title="Delete" href="javascript:void(0)" data-button_id="' .$order. '" value="'.$saved.'"><i class="icon-trash" style="font-size:18px;"></i></a></td>';
                }
            else{
            $list .='<td><a class="list-icons-item text-info edit1" title="Check" href="javascript:void(0)" data-target="#appFormModal" data-toggle="modal" data-button_id="' .$order.'"><i class="icon-pencil7" style="font-size:18px;"></i></a>&nbsp&nbsp<a class="list-icons-item text-danger remove1" title="Delete" href="javascript:void(0)" data-button_id="' .$order. '"><i class="icon-trash" style="font-size:18px;"></i></a></td>';
            }
            
            $list1 .= '<input type="hidden" name="type[]" class="form-control type" id="name type'.$order.'"  value="'.$type.'" required />';
            $list1 .= '<input type="hidden" name="account_id[]" class="form-control account" id="account_id lst'.$order.'"  value="'.$acc.'" required />';
            $list1 .= '<input type="hidden" name="debit[]" class="form-control debit" id="debit lst'.$order.'" value="'.number_format($debit,2).'" required />';
            $list1 .= '<input type="hidden" name="credit[]" class="form-control credit" id="credit lst'.$order.'" value="'.number_format($credit,2).'" required />';
            $list1 .= '<input type="hidden" name="notes[]" class="form-control item_desc" id="desc lst'.$order.'"  value="'.$notes.'"  />';
            $list1 .= '<input type="hidden" name="client_id[]" class="form-control item_client" id="client lst'.$order.'"  value="'.$client_id.'" required />';
            $list1 .= '<input type="hidden" name="supplier_id[]" class="form-control item_supplier" id="supplier lst'.$order.'"  value="'.$supplier_id.'" required />';
            $list1 .= '<input type="hidden" name="user_id[]" class="form-control item_user" id="user lst'.$order.'"  value="'.$user_id.'"  />';
            $list1 .= '<input type="hidden" name="modal_type" class="form-control item_type" id="type lst'.$order.'"  value="edit"  />';
            $list1 .= '<input type="hidden" name="no[]" class="form-control item_type" id="no lst'.$order.'"  value="'.$order.'"  />';
            
            if(!empty($saved)){
            $list1 .= '<input type="hidden" name="saved_items_id[]" class="form-control item_saved'.$order.'" value="'.$saved.'"  required/>';
                }
          }
            else{
            $list .= '<tr class="trlst'.$order.'">';
             $list .= '<td>'.$a.'</td>';
            $list .= '<td>'.$name->account_name.'</td>';
            $list .= '<td>'.number_format($debit,2).'</td>';
            $list .= '<td>'.number_format($credit,2).'</td>';
            $list .= '<td>'.$notes.'</td>';
            $list .='<td><a class="list-icons-item text-info edit1" title="Check" href="javascript:void(0)" data-target="#appFormModal" data-toggle="modal" data-button_id="' .$order.'"><i class="icon-pencil7" style="font-size:18px;"></i></a>&nbsp&nbsp<a class="list-icons-item text-danger remove1" title="Delete" href="javascript:void(0)" data-button_id="' .$order. '"><i class="icon-trash" style="font-size:18px;"></i></a></td>';
            $list .= '</tr>';
                    
            $list1 .= '<div class="line_items" id="lst'.$order.'">';
             $list1 .= '<input type="hidden" name="type[]" class="form-control type" id="name type'.$order.'"  value="'.$type.'" required />';
            $list1 .= '<input type="hidden" name="account_id[]" class="form-control account" id="account_id lst'.$order.'"  value="'.$acc.'" required />';
            $list1 .= '<input type="hidden" name="debit[]" class="form-control debit" id="debit lst'.$order.'" value="'.number_format($debit,2).'" required />';
            $list1 .= '<input type="hidden" name="credit[]" class="form-control credit" id="credit lst'.$order.'" value="'.number_format($credit,2).'" required />';
            $list1 .= '<input type="hidden" name="notes[]" class="form-control item_desc" id="desc lst'.$order.'"  value="'.$notes.'"  />';
            $list1 .= '<input type="hidden" name="client_id[]" class="form-control item_client" id="client lst'.$order.'"  value="'.$client_id.'" required />';
            $list1 .= '<input type="hidden" name="supplier_id[]" class="form-control item_supplier" id="supplier lst'.$order.'"  value="'.$supplier_id.'" required />';
            $list1 .= '<input type="hidden" name="user_id[]" class="form-control item_user" id="user lst'.$order.'"  value="'.$user_id.'"  />';
            $list1 .= '<input type="hidden" name="modal_type" class="form-control item_type" id="type lst'.$order.'"  value="edit"  />';
            $list1 .= '<input type="hidden" name="no[]" class="form-control item_type" id="no lst'.$order.'"  value="'.$order.'"  />';
            $list1 .= '</div>';
            }


             return response()->json([
            'list'          => $list,
            'list1' => $list1
    ]);
        
    }
    
    
}
