<?php

namespace App\Http\Controllers\Facility;

use App\Http\Controllers\Controller;
use App\Models\restaurant\Restaurant;
use App\Models\Inventory\Location;
use App\Models\Member\Member;
use App\Models\Member\MemberTransaction;
use App\Models\restaurant\Menu;
use App\Models\restaurant\MenuComponent;
use App\Models\restaurant\Order;
use App\Models\restaurant\OrderHistory;
use App\Models\restaurant\OrderPayments;
use App\Models\Visitors\Visitor;
use App\Models\Accounting\AccountCodes;
use App\Models\Accounting\Accounts;
use App\Models\Facility\Activity;
use App\Models\Facility\Facility;
use App\Models\Facility\Invoice;
use App\Models\Facility\InvoiceItems;
use App\Models\Facility\InvoicePayments;
use App\Models\Facility\InvoiceHistory;
use App\Models\Facility\Items;
use App\Models\Currency;
use App\Models\Payments\Payment_methodes;
use App\Models\Accounting\JournalEntry;
use App\Models\Accounting\Transaction;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\ButtonsServiceProvider;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

use App\Traits\SectionReport;

class InvoiceController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $index=Invoice::where('invoice_status',1)->where('created_by',auth()->user()->id)->where('added_by',auth()->user()->added_by)->orderBy('invoice_date', 'DESC')->get();
           $location=Location::leftJoin('location_manager', 'locations.id','location_manager.location_id')
                          ->where('locations.disabled','0')
                          ->where('locations.main','0')
                          ->where('locations.added_by',auth()->user()->added_by)
                            ->where('location_manager.manager',auth()->user()->id)     
                           ->select('locations.*')
                           ->orderBy('locations.created_at','asc')
                              ->get()  ;
           $type="";
        $bank_accounts=AccountCodes::where('account_group','Cash And Banks')->get() ;
         $currency= Currency::all();
      $name =Items::where('added_by',auth()->user()->added_by)->get();
            return view('facility.invoice', compact('index','type','location','bank_accounts','currency','name'));

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count=Invoice::count();
        $pro=$count+1;
        $data['reference_no']= "DGC-FS-".$pro;
        $data['client_id']=$request->user_id;
        $data['user_type']=$request->user_type;
        $data['invoice_date']=date('Y-m-d');
        $data['location']=$request->location;
        $data['account_id']=$request->account_id;
        $data['exchange_code']= $request->exchange_code;
        $data['exchange_rate']=$request->exchange_rate;
        $data['notes']=$request->notes;
        $data['invoice_amount']='1';
        $data['due_amount']='1';
        $data['invoice_tax']='1';
        $data['status']='0';
        $data['good_receive']='1';
        $data['invoice_status']=1;
         $data['created_by']= auth()->user()->id;
        $data['added_by']= auth()->user()->added_by;

        $invoice = Invoice::create($data);
        
        $amountArr = str_replace(",","",$request->amount);
        $totalArr =  str_replace(",","",$request->tax);

        $nameArr =$request->item_name ;
        $qtyArr = $request->quantity  ;
        $priceArr = $request->price;
        $rateArr = $request->tax_rate ;
        $typeArr = $request->type  ;
        $costArr = str_replace(",","",$request->total_cost)  ;
        $taxArr =  str_replace(",","",$request->total_tax );

        
        $savedArr =$request->item_name ;
        
        $cost['invoice_amount'] = 0;
        $cost['invoice_tax'] = 0;
        if(!empty($nameArr)){
            for($i = 0; $i < count($nameArr); $i++){
                if(!empty($nameArr[$i])){
                    $cost['invoice_amount'] +=$costArr[$i];
                    $cost['invoice_tax'] +=$taxArr[$i];

                       $facility=Items::find($nameArr[$i]);
                    $items = array(
                         'charge_type' => $facility->type,
                        'facility_id' => $facility->facility_id,
                        'item_name' => $nameArr[$i],
                        'quantity' =>   $qtyArr[$i],
                       'due_quantity' =>   $qtyArr[$i],
                        'tax_rate' =>  $rateArr [$i],
                           'price' =>  $priceArr[$i],
                        'total_cost' =>  $costArr[$i],
                        'total_tax' =>   $taxArr[$i],
                         'items_id' => $savedArr[$i],
                           'order_no' => $i,
                           'added_by' => auth()->user()->added_by,
                        'invoice_id' =>$invoice->id);
                       
                       InvoiceItems::create($items);  ;
    
    
                }
            }

            $cost['due_amount'] =  $cost['invoice_amount'] + $cost['invoice_tax'];
           Invoice::where('id',$invoice->id)->update($cost);
        }    

        Invoice::find($invoice->id)->update($cost);
        
        
        
    
            
    
            if(!empty($nameArr)){
                for($i = 0; $i < count($nameArr); $i++){
                    if(!empty($nameArr[$i])){
    
                        $facility=Items::find($nameArr[$i]);
                        
                        $lists= array(
                         'charge_type' => $facility->type,
                        'facility_id' => $facility->facility_id,
                            'quantity' =>   $qtyArr[$i],
                            'price' =>  $priceArr[$i],
                             'item_id' => $savedArr[$i],
                               'added_by' => auth()->user()->added_by,
                               'client_id' =>   $data['client_id'],
                               'user_type' => $data['user_type'],
                             'invoice_date' =>  $data['invoice_date'],
                             'location' =>    $data['location'],
                            'type' =>   'Sales',
                            'invoice_id' =>$invoice->id);
                           
                         InvoiceHistory::create($lists);   
                    }
                }
            
            }    



       
    
            $inv =Invoice::find($invoice->id);


if($inv->user_type == 'Member'){ 
$member=Member::find($inv->client_id);
// save into member_transaction

    $a=route('facility_sales_receipt',['download'=>'pdf','id'=>$invoice->id]);

                             $mem_transaction= MemberTransaction::create([
                                'module' => 'Facility Sales Payment',
                                 'module_id' => $inv->id,
                              'member_id' => $inv->client_id,
                                'name' => 'Facility Sales Payment with reference ' .$inv->reference_no,
                                 'transaction_prefix' => $inv->reference_no,
                                'type' => 'Payment',
                                'amount' =>$inv->due_amount ,
                                'debit' => $inv->due_amount,
                                 'total_balance' =>$member->balance - $inv->due_amount,
                                'date' => date('Y-m-d', strtotime($inv->invoice_date)),
                                'paid_by' => $inv->client_id,
                                   'status' => 'paid' ,
                                'notes' => 'This payment is for member facility payment. The Reference is ' .$inv->reference_no .' by Member '. $member->full_name  ,
                                'link'=> $a,
                                'added_by' =>auth()->user()->added_by,
                            ]);

}



          $itm=InvoiceItems::where('invoice_id',$invoice->id)->get();

       foreach($itm as $x){
         
              if($inv->user_type == 'Visitor'){
            $supp=Visitor::find($inv->client_id);
           $user=$supp->first_name ." ". $supp->last_name;

     $income= AccountCodes::where('account_name','Receivables Control')->first();

       Visitor::find($inv->client_id)->update(['balance'=>$supp->balance - ($x->total_cost + $x->total_tax)]); 
             }

          else if($inv->user_type == 'Member'){
            $supp=Member::find($inv->client_id);
           $user=$supp->full_name ;

      $income= AccountCodes::where('account_name','Receivables Control')->first();;

      Member::find($inv->client_id)->update(['balance'=>$supp->balance -  ($x->total_cost + $x->total_tax)]) ;
             }


             $acc=Items::find($x->item_name);

            $cr= AccountCodes::where('id',$acc->code_id)->first();

            $journal = new JournalEntry();
          $journal->account_id = $acc->code_id;
          $date = explode('-',$inv->invoice_date);
          $journal->date =   $inv->invoice_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
         $journal->transaction_type = 'facility_sales';
          $journal->name = 'Facility Sales';
          $journal->credit = ($x->total_cost + $x->total_tax) *  $inv->exchange_rate;
          $journal->income_id= $inv->id;

          if($inv->user_type == 'Visitor'){
            $journal->visitor_id= $inv->client_id;
             }
          else if($inv->user_type == 'Member'){
           $journal->member_id= $inv->client_id;
             }

           $journal->currency_code =  $inv->exchange_code;
          $journal->exchange_rate= $inv->exchange_rate;
          $journal->added_by=auth()->user()->added_by;
             $journal->notes= " Facility Sales for Invoice No " .$inv->reference_no ." to Client ". $user ;
          $journal->save();

        
       
        
          $journal = new JournalEntry();
          $journal->account_id = $income->id;
          $date = explode('-',$inv->invoice_date);
          $journal->date =   $inv->invoice_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
           $journal->transaction_type = 'facility_sales';
          $journal->name = 'Facility Sales';
          $journal->income_id= $inv->id;

        if($inv->user_type == 'Visitor'){
            $journal->visitor_id= $inv->client_id;
             }
          else if($inv->user_type == 'Member'){
           $journal->member_id= $inv->client_id;
             }

          $journal->debit =($x->total_cost + $x->total_tax) *  $inv->exchange_rate;
          $journal->currency_code =  $inv->exchange_code;
          $journal->exchange_rate= $inv->exchange_rate;
          $journal->added_by=auth()->user()->added_by;
            $journal->notes= "Receivables for Facility Sales Invoice No " .$inv->reference_no ." to Client ". $user ;
          $journal->save();
  }  
        

          //invoice payment


          $sales =Invoice::find($inv->id);
          $method= Payment_methodes::where('name','Cash')->first();
    
          $count=InvoicePayments::count();
          $pro=$count+1;

          $receipt['trans_id'] = "TRANS_FS_".$pro;
          $receipt['invoice_id'] = $inv->id;
          $receipt['account_id'] = $request->account_id;
          $receipt['amount'] = $inv->due_amount;
          $receipt['date'] = $inv->invoice_date;
          $receipt['payment_method'] = $method->id;
          $receipt['added_by'] = auth()->user()->added_by;
          
          //update due amount from invoice table
          $b['due_amount'] =  0;
          $b['status'] = 3;
  
          
                  $sales->update($b);
                   
                  $payment = InvoicePayments::create($receipt);
  
                  
  /*
                  $codes= AccountCodes::where('account_name','Receivables Control')->first();
            $journal = new JournalEntry();
          $journal->account_id = $codes->id;
          $date = explode('-',$inv->invoice_date);
          $journal->date =   $inv->invoice_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
         $journal->transaction_type = 'facility_sales_payments';
          $journal->name = 'Facility Sales Payment';
          $journal->debit = $receipt['amount'] *  $sales->exchange_rate;
          $journal->payment_id= $payment->id;
          if($inv->user_type == 'Visitor'){
            $journal->visitor_id= $inv->client_id;
             }
          else if($inv->user_type == 'Member'){
           $journal->member_id= $inv->client_id;
             }
           $journal->currency_code =   $sales->currency_code;
          $journal->exchange_rate=  $sales->exchange_rate;
            $journal->added_by=auth()->user()->added_by;
             $journal->notes= "Deposit for Facility Sales Invoice No " .$sales->reference_no ." by Client ". $user ;
          $journal->save();
  
  
         
          $journal = new JournalEntry();
          $journal->account_id = $codes->id;
          $date = explode('-',$inv->invoice_date);
          $journal->date =   $inv->invoice_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
            $journal->transaction_type =  'facility_sales_payments';
          $journal->name = 'Facility Sales Payment';
          $journal->credit =$receipt['amount'] *  $sales->exchange_rate;
            $journal->payment_id= $payment->id;
        if($inv->user_type == 'Visitor'){
            $journal->visitor_id= $inv->client_id;
             }
          else if($inv->user_type == 'Member'){
           $journal->member_id= $inv->client_id;
             }
           $journal->currency_code =   $sales->currency_code;
          $journal->exchange_rate=  $sales->exchange_rate;
          $journal->added_by=auth()->user()->added_by;
           $journal->notes= "Clear Receivable for Facility Sales Invoice No  " .$sales->reference_no ." by Client ". $user ;
          $journal->save();
          
        
    */    
        

       

        Toastr::success('Service Created Successfully','Success');
        return redirect(route('facility_sales.index'));
    }

   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $invoices = Invoice::find($id);
        $invoice_items=InvoiceItems::where('invoice_id',$id)->where('due_quantity','>', '0')->get();
        $payments=InvoicePayments::where('invoice_id',$id)->get();

        return view('facility.invoice_details',compact('invoices','invoice_items','payments'));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data=Invoice::find($id);
        $items=InvoiceItems::where('invoice_id',$id)->get();
        $type="";
        $bank_accounts=AccountCodes::where('account_group','Cash And Banks')->get() ;
         $currency= Currency::all();
      $name =Items::where('added_by',auth()->user()->added_by)->get();
 $location=Location::leftJoin('location_manager', 'locations.id','location_manager.location_id')
                          ->where('locations.disabled','0')
                          ->where('locations.main','0')
                          ->where('locations.added_by',auth()->user()->added_by)
                            ->where('location_manager.manager',auth()->user()->id)     
                           ->select('locations.*')
                           ->orderBy('locations.created_at','asc')
                              ->get()  ;

if($data->user_type == 'Visitor'){
       $user= Visitor::where('status','5')->get(); 
         }
         else if($data->user_type == 'Member'){
           $date=date('Y-m-d');
            $user= Member::where('disabled',0)->where('due_date', '>=', $date) ->get();      

                 }
       return view('facility.invoice',compact('currency','data','id','items','type','location','bank_accounts','name','user'));

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
        



         if($request->edit_type == 'receive'){

            $invoice  =Invoice::find($id);
          $data['client_id']=$request->user_id;
        $data['user_type']=$request->user_type;
        $data['invoice_date']=date('Y-m-d');
        $data['location']=$request->location;
        $data['account_id']=$request->account_id;
        $data['exchange_code']=$request->exchange_code;
        $data['exchange_rate']=$request->exchange_rate;
      $data['notes']=$request->notes;
            $data['invoice_amount']='1';
            $data['due_amount']='1';
            $data['invoice_tax']='1';
            $data['good_receive']='1';
            $data['status']='1';
            $data['invoice_status']='1';
             $data['created_by']= auth()->user()->id;
            $data['added_by']= auth()->user()->added_by;
    
            $invoice->update($data);
            
            $amountArr = str_replace(",","",$request->amount);
            $totalArr =  str_replace(",","",$request->tax);
    
            $nameArr =$request->item_name ;
        $qtyArr = $request->quantity  ;
        $priceArr = $request->price;
        $rateArr = $request->tax_rate ;
        $typeArr = $request->type  ;
        $costArr = str_replace(",","",$request->total_cost)  ;
        $taxArr =  str_replace(",","",$request->total_tax );
            $remArr = $request->removed_id ;
            $expArr = $request->saved_items_id ;
            $savedArr =$request->item_name ;
            
            $cost['invoice_amount'] = 0;
            $cost['invoice_tax'] = 0;
    
       if (!empty($remArr)) {
                for($i = 0; $i < count($remArr); $i++){
                   if(!empty($remArr[$i])){        
                   InvoiceItems::where('id',$remArr[$i])->delete();        
                       }
                   }
               }
    
            if(!empty($nameArr)){
                for($i = 0; $i < count($nameArr); $i++){
                    if(!empty($nameArr[$i])){
                        $cost['invoice_amount'] +=$costArr[$i];
                        $cost['invoice_tax'] +=$taxArr[$i];
    
                         $facility=Items::find($nameArr[$i]);

                        $items = array(
                         'charge_type' => $facility->type,
                        'facility_id' => $facility->facility_id,
                        'item_name' => $nameArr[$i],
                        'quantity' =>   $qtyArr[$i],
                       'due_quantity' =>   $qtyArr[$i],
                        'tax_rate' =>  $rateArr [$i],
                           'price' =>  $priceArr[$i],
                        'total_cost' =>  $costArr[$i],
                        'total_tax' =>   $taxArr[$i],
                             'items_id' => $savedArr[$i],
                               'order_no' => $i,
                               'added_by' => auth()->user()->added_by,
                            'invoice_id' =>$id);
                           
                            if(!empty($expArr[$i])){
                                InvoiceItems::where('id',$expArr[$i])->update($items);  
          
          }
          else{
             InvoiceItems::create($items);   
          }
                      
                 
  
                    }
                }
                $cost['due_amount'] =  $cost['invoice_amount'] + $cost['invoice_tax'];
                 Invoice::where('id',$id)->update($cost);
            }    

    
            
    
            if(!empty($nameArr)){
                for($i = 0; $i < count($nameArr); $i++){
                    if(!empty($nameArr[$i])){
    
                        $facility=Items::find($nameArr[$i]);
                        
                        $lists= array(
                         'charge_type' => $facility->type,
                        'facility_id' => $facility->facility_id,
                            'quantity' =>   $qtyArr[$i],
                            'price' =>  $priceArr[$i],
                             'item_id' => $savedArr[$i],
                               'added_by' => auth()->user()->added_by,
                               'client_id' =>   $data['client_id'],
                               'user_type' => $data['user_type'],
                             'invoice_date' =>  $data['invoice_date'],
                             'location' =>    $data['location'],
                            'type' =>   'Sales',
                            'invoice_id' =>$id);
                           
                         InvoiceHistory::create($lists);   
                    }
                }
            
            }    



       
    
            $inv =Invoice::find($id);


if($inv->user_type == 'Member'){ 
$member=Member::find($inv->client_id);
// save into member_transaction

    $a=route('facility_sales_receipt',['download'=>'pdf','id'=>$id]);

                             $mem_transaction= MemberTransaction::create([
                                'module' => 'Facility Sales Payment',
                                 'module_id' => $inv->id,
                              'member_id' => $inv->client_id,
                                'name' => 'Facility Sales Payment with reference ' .$inv->reference_no,
                                 'transaction_prefix' => $inv->reference_no,
                                'type' => 'Payment',
                                'amount' =>$inv->due_amount ,
                                'debit' => $inv->due_amount,
                                 'total_balance' =>$member->balance - $inv->due_amount,
                                'date' => date('Y-m-d', strtotime($inv->invoice_date)),
                                'paid_by' => $inv->client_id,
                                   'status' => 'paid' ,
                                'notes' => 'This payment is for member facility payment. The Reference is ' .$inv->reference_no .' by Member '. $member->full_name  ,
                                'link'=> $a,
                                'added_by' =>auth()->user()->added_by,
                            ]);

}



          $itm=InvoiceItems::where('invoice_id',$id)->get();

       foreach($itm as $x){
         
              if($inv->user_type == 'Visitor'){
            $supp=Visitor::find($inv->client_id);
           $user=$supp->first_name ." ". $supp->last_name;

     $income=AccountCodes::where('account_name','Visitor`s card deposit')->first();

       Visitor::find($inv->client_id)->update(['balance'=>$supp->balance - ($x->total_cost + $x->total_tax)]); 
             }

          else if($inv->user_type == 'Member'){
            $supp=Member::find($inv->client_id);
           $user=$supp->full_name ;

      $income=AccountCodes::where('account_name','Member`s card deposit')->first();;

      Member::find($inv->client_id)->update(['balance'=>$supp->balance -  ($x->total_cost + $x->total_tax)]) ;
             }


             $acc=Items::find($x->item_name);

            $cr= AccountCodes::where('id',$acc->code_id)->first();

            $journal = new JournalEntry();
          $journal->account_id = $acc->code_id;
          $date = explode('-',$inv->invoice_date);
          $journal->date =   $inv->invoice_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
         $journal->transaction_type = 'facility_sales';
          $journal->name = 'Facility Sales';
          $journal->credit = ($x->total_cost + $x->total_tax) *  $inv->exchange_rate;
          $journal->income_id= $inv->id;

          if($inv->user_type == 'Visitor'){
            $journal->visitor_id= $inv->client_id;
             }
          else if($inv->user_type == 'Member'){
           $journal->member_id= $inv->client_id;
             }

           $journal->currency_code =  $inv->exchange_code;
          $journal->exchange_rate= $inv->exchange_rate;
          $journal->added_by=auth()->user()->added_by;
             $journal->notes= " Facility Sales for Invoice No " .$inv->reference_no ." to Client ". $user ;
          $journal->save();

        
       
        
          $journal = new JournalEntry();
          $journal->account_id = $income->id;
          $date = explode('-',$inv->invoice_date);
          $journal->date =   $inv->invoice_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
           $journal->transaction_type = 'facility_sales';
          $journal->name = 'Facility Sales';
          $journal->income_id= $inv->id;

        if($inv->user_type == 'Visitor'){
            $journal->visitor_id= $inv->client_id;
             }
          else if($inv->user_type == 'Member'){
           $journal->member_id= $inv->client_id;
             }

          $journal->debit =($x->total_cost + $x->total_tax) *  $inv->exchange_rate;
          $journal->currency_code =  $inv->exchange_code;
          $journal->exchange_rate= $inv->exchange_rate;
          $journal->added_by=auth()->user()->added_by;
            $journal->notes= "Receivables for Facility Sales Invoice No " .$inv->reference_no ." to Client ". $user ;
          $journal->save();
  }  
        

          //invoice payment


          $sales =Invoice::find($inv->id);
          $method= Payment_methodes::where('name','Cash')->first();
    
          $count=InvoicePayments::count();
          $pro=$count+1;

          $receipt['trans_id'] = "TRANS_FS_".$pro;
          $receipt['invoice_id'] = $inv->id;
          $receipt['account_id'] = $request->account_id;
          $receipt['amount'] = $inv->due_amount;
          $receipt['date'] = $inv->invoice_date;
          $receipt['payment_method'] = $method->id;
          $receipt['added_by'] = auth()->user()->added_by;
          
          //update due amount from invoice table
          $b['due_amount'] =  0;
          $b['status'] = 3;
  
          
                  $sales->update($b);
                   
                  $payment = InvoicePayments::create($receipt);
  
                  
  
                  $codes= AccountCodes::where('account_name','Receivables Control')->first();
            $journal = new JournalEntry();
          $journal->account_id = $codes->id;
          $date = explode('-',$inv->invoice_date);
          $journal->date =   $inv->invoice_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
         $journal->transaction_type = 'facility_sales_payments';
          $journal->name = 'Facility Sales Payment';
          $journal->debit = $receipt['amount'] *  $sales->exchange_rate;
          $journal->payment_id= $payment->id;
          if($inv->user_type == 'Visitor'){
            $journal->visitor_id= $inv->client_id;
             }
          else if($inv->user_type == 'Member'){
           $journal->member_id= $inv->client_id;
             }
           $journal->currency_code =   $sales->currency_code;
          $journal->exchange_rate=  $sales->exchange_rate;
            $journal->added_by=auth()->user()->added_by;
             $journal->notes= "Deposit for Facility Sales Invoice No " .$sales->reference_no ." by Client ". $user ;
          $journal->save();
  
  
         
          $journal = new JournalEntry();
          $journal->account_id = $codes->id;
          $date = explode('-',$inv->invoice_date);
          $journal->date =   $inv->invoice_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
            $journal->transaction_type =  'facility_sales_payments';
          $journal->name = 'Facility Sales Payment';
          $journal->credit =$receipt['amount'] *  $sales->exchange_rate;
            $journal->payment_id= $payment->id;
        if($inv->user_type == 'Visitor'){
            $journal->visitor_id= $inv->client_id;
             }
          else if($inv->user_type == 'Member'){
           $journal->member_id= $inv->client_id;
             }
           $journal->currency_code =   $sales->currency_code;
          $journal->exchange_rate=  $sales->exchange_rate;
          $journal->added_by=auth()->user()->added_by;
           $journal->notes= "Clear Receivable for Facility Sales Invoice No  " .$sales->reference_no ." by Client ". $user ;
          $journal->save();
          


           Toastr::success('Service Updated Successfully','Success');
        return redirect(route('facility_sales.index'));
    

        }

        else{


        $invoice = Invoice::find($id);
         $data['client_id']=$request->user_id;
        $data['user_type']=$request->user_type;
        $data['invoice_date']=date('Y-m-d');
        $data['location']=$request->location;
        $data['account_id']=$request->account_id;
        $data['exchange_code']=$request->exchange_code;
        $data['exchange_rate']=$request->exchange_rate;
      $data['notes']=$request->notes;
        $data['invoice_amount']='1';
        $data['due_amount']='1';
        $data['invoice_tax']='1';
            $data['invoice_amount']='1';
            $data['due_amount']='1';
            $data['invoice_tax']='1';
             $data['created_by']= auth()->user()->id;
            $data['added_by']= auth()->user()->added_by;
    
            $invoice->update($data);
            
            $amountArr = str_replace(",","",$request->amount);
            $totalArr =  str_replace(",","",$request->tax);
    
            $nameArr =$request->item_name ;
        $qtyArr = $request->quantity  ;
        $priceArr = $request->price;
        $rateArr = $request->tax_rate ;
        $typeArr = $request->type  ;
        $costArr = str_replace(",","",$request->total_cost)  ;
        $taxArr =  str_replace(",","",$request->total_tax );
            $remArr = $request->removed_id ;
            $expArr = $request->saved_items_id ;
            $savedArr =$request->item_name ;
            
            $cost['invoice_amount'] = 0;
            $cost['invoice_tax'] = 0;
    
            if (!empty($remArr)) {
                for($i = 0; $i < count($remArr); $i++){
                   if(!empty($remArr[$i])){        
                   InvoiceItems::where('id',$remArr[$i])->delete();        
                       }
                   }
               }
    
            if(!empty($nameArr)){
                for($i = 0; $i < count($nameArr); $i++){
                    if(!empty($nameArr[$i])){
                        $cost['invoice_amount'] +=$costArr[$i];
                        $cost['invoice_tax'] +=$taxArr[$i];
    
                         $facility=Items::find($nameArr[$i]);

                        $items = array(
                         'charge_type' => $facility->type,
                        'facility_id' => $facility->facility_id,
                        'item_name' => $nameArr[$i],
                        'quantity' =>   $qtyArr[$i],
                       'due_quantity' =>   $qtyArr[$i],
                        'tax_rate' =>  $rateArr [$i],
                           'price' =>  $priceArr[$i],
                        'total_cost' =>  $costArr[$i],
                        'total_tax' =>   $taxArr[$i],
                             'items_id' => $savedArr[$i],
                               'order_no' => $i,
                               'added_by' => auth()->user()->added_by,
                            'invoice_id' =>$id);
                           
                            if(!empty($expArr[$i])){
                                InvoiceItems::where('id',$expArr[$i])->update($items);  
          
          }
          else{
             InvoiceItems::create($items);   
          }
                      
                 
  
                    }
                }
                $cost['due_amount'] =  $cost['invoice_amount'] + $cost['invoice_tax'];
                 Invoice::where('id',$id)->update($cost);
            }    


             Toastr::success('Service Updated Successfully','Success');
        return redirect(route('facility_sales.index'));

}

    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      InvoiceItems::where('invoice_id', $id)->delete();
      InvoicePayments::where('invoice_id', $id)->delete();
       
        $invoices =Invoice::find($id);
        $invoices->delete();

        Toastr::success('Service Deleted Successfully','Success');
        return redirect(route('facility_sales.index'));
    }


 public function cancel($id)
    {
        //
        $invoice = Invoice::find($id);
        $data['status'] = 4;
        $invoice->update($data);

        Toastr::success('Cancelled Successfully','Success');
        return redirect(route('facility_sales.index'));
    }
   

    public function receive($id)
    {
        //

      $data=Invoice::find($id);
        $items=InvoiceItems::where('invoice_id',$id)->get();
        $type="receive";
        $bank_accounts=AccountCodes::where('account_group','Cash And Banks')->get() ;
         $currency= Currency::all();
      $name =Items::where('added_by',auth()->user()->added_by)->get();
 $location=Location::leftJoin('location_manager', 'locations.id','location_manager.location_id')
                          ->where('locations.disabled','0')
                          ->where('locations.main','0')
                          ->where('locations.added_by',auth()->user()->added_by)
                            ->where('location_manager.manager',auth()->user()->id)     
                           ->select('locations.*')
                           ->orderBy('locations.created_at','asc')
                              ->get()  ;

if($data->user_type == 'Visitor'){
       $user= Visitor::where('status','5')->get(); 
         }
         else if($data->user_type == 'Member'){
           $date=date('Y-m-d');
            $user= Member::where('disabled',0)->where('due_date', '>=', $date) ->get();      

                 }
       return view('facility.invoice',compact('currency','data','id','items','type','location','bank_accounts','name','user'));
          
     
    }


  
    
    public function invoice_pdfview(Request $request)
    {
        //
        $invoices =Invoice::find($request->id);
        $invoice_items=InvoiceItems::where('invoice_id',$request->id)->get();

        view()->share(['invoices'=>$invoices,'invoice_items'=> $invoice_items]);

        if($request->has('download')){
        $pdf = PDF::loadView('facility.invoice_details_pdf')->setPaper('a4', 'potrait');
         return $pdf->download('FACILITY SALES INV NO # ' .  $invoices->reference_no . ".pdf");
        }
       return view('invoice_pdfview');
    }

    public function invoice_receipt(Request $request){

        //if landscape heigth * width but if portrait widht *height      // dd($dataResult);
        $customPaper = array(0,0,198.425,494.80);

       $invoices =Invoice::find($request->id);
        $invoice_items=InvoiceItems::where('invoice_id',$request->id)->get();

      $member= MemberTransaction::where('module_id',$request->id)->where('module','Facility Sales Payment')->first();

        view()->share(['invoices'=>$invoices,'invoice_items'=> $invoice_items,'member'=>$member]);

        if($request->has('download')){
        $pdf = PDF::loadView('facility.invoice_receipt_pdf')->setPaper($customPaper, 'portrait');
         return $pdf->download('FACILITY SALES RECEIPT NO # ' .  $invoices->reference_no . ".pdf");
        }
       return view('invoice_receipt');

    }



  public function add_item(Request $request)
    {
        //dd($request->all());

       $data=$request->all();
       
       
        
          $list = '';
          $list1 = ''; 
          
            
            
            $it=Items::where('id',$request->checked_item_name)->first();
                $a =  $it->name ;
      
       
       
          $name=$request->checked_item_name[0];
          $qty=$request->checked_quantity[0];
          $price=str_replace(",","",$request->checked_price[0]);
          $cost=$request->checked_total_cost[0];
          $tax=$request->checked_total_tax[0];
          $order=$request->checked_no[0];
          $unit=$request->checked_unit[0];
          $rate=$request->checked_tax_rate[0];
          
          if(!empty($request->saved_items_id[0])){
            $saved=$request->saved_items_id[0];
            }
            else{
            $saved='';   
                  }
          
          if(!empty($request->type) && $request->type == 'edit'){
            $list .= '<td>'.$a.'</td>';
            $list .= '<td>'.number_format($qty,2).'<div class=""> <span class="form-control-static errorslst'.$order.'" id="errors" style="text-align:center;color:red;"></span></div></td>';
            $list .= '<td>'.number_format($price,2).'</td>';
            $list .= '<td>'.$cost.'</td>';
             if(!empty($saved)){
            $list .='<td><a class="list-icons-item text-info edit1" title="Check" href="javascript:void(0)" data-target="#appFormModal" data-toggle="modal" data-button_id="' .$order.'"><i class="icon-pencil7" style="font-size:18px;"></i></a>&nbsp&nbsp<a class="list-icons-item text-danger rem" title="Delete" href="javascript:void(0)" data-button_id="' .$order. '" value="'.$saved.'"><i class="icon-trash" style="font-size:18px;"></i></a></td>';
                }
            else{
            $list .='<td><a class="list-icons-item text-info edit1" title="Check" href="javascript:void(0)" data-target="#appFormModal" data-toggle="modal" data-button_id="' .$order.'"><i class="icon-pencil7" style="font-size:18px;"></i></a>&nbsp&nbsp<a class="list-icons-item text-danger remove1" title="Delete" href="javascript:void(0)" data-button_id="' .$order. '"><i class="icon-trash" style="font-size:18px;"></i></a></td>';
            }
            

            $list1 .= '<input type="hidden" name="item_name[]" class="form-control item_name" id="name lst'.$order.'"  value="'.$name.'" required />';
            $list1 .= '<input type="hidden" name="quantity[]" class="form-control item_quantity" id="qty lst'.$order.'"  data-category_id="lst'.$order.'" value="'.$qty.'" required />';
            $list1 .= '<input type="hidden" name="price[]" class="form-control item_price" id="price lst'.$order.'" value="'.$price.'" required />';
            $list1 .= '<input type="hidden" name="tax_rate[]" class="form-control item_rate" id="rate lst'.$order.'" value="'.$rate.'" required />';
            $list1 .= '<input type="hidden" name="total_cost[]" class="form-control item_cost" id="cost lst'.$order.'"  value="'.$cost.'" required />';
            $list1 .= '<input type="hidden" name="total_tax[]" class="form-control item_tax" id="tax lst'.$order.'"  value="'.$tax.'" required />';
            $list1 .= '<input type="hidden" name="unit[]" class="form-control item_unit" id="unit lst'.$order.'"  value="'.$unit.'"  />';
            $list1 .= '<input type="hidden" name="type" class="form-control item_type" id="type lst'.$order.'"  value="edit"  />';
            $list1 .= '<input type="hidden" name="no[]" class="form-control item_type" id="no lst'.$order.'"  value="'.$order.'"  />';
            $list1 .= '<input type="hidden"  class="form-control item_idlst'.$order.'" id="item_id "  value="'.$name.'"  />';
            $list1 .= '<input type="hidden" class="form-control type_idlst'.$order.'" id="type_id"  value="" required />';
            
            if(!empty($saved)){
            $list1 .= '<input type="hidden" name="saved_items_id[]" class="form-control item_saved'.$order.'" value="'.$saved.'"  required/>';
                }
          }
            else{
            $list .= '<tr class="trlst'.$order.'">';
            $list .= '<td>'.$a.'</td>';
            $list .= '<td>'.number_format($qty,2).'<div class=""> <span class="form-control-static errorslst'.$order.'" id="errors" style="text-align:center;color:red;"></span></div></td>';
            $list .= '<td>'.number_format($price,2).'</td>';
            $list .= '<td>'.$cost.'</td>';
            $list .='<td><a class="list-icons-item text-info edit1" title="Check" href="javascript:void(0)" data-target="#appFormModal" data-toggle="modal" data-button_id="' .$order.'"><i class="icon-pencil7" style="font-size:18px;"></i></a>&nbsp&nbsp<a class="list-icons-item text-danger remove1" title="Delete" href="javascript:void(0)" data-button_id="' .$order. '"><i class="icon-trash" style="font-size:18px;"></i></a></td>';
            $list .= '</tr>';
                    
            $list1 .= '<div class="line_items" id="lst'.$order.'">';
            $list1 .= '<input type="hidden" name="item_name[]" class="form-control item_name" id="name lst'.$order.'"  value="'.$name.'" required />';
            $list1 .= '<input type="hidden" name="quantity[]" class="form-control item_quantity" id="qty lst'.$order.'"  data-category_id="lst'.$order.'" value="'.$qty.'" required />';
            $list1 .= '<input type="hidden" name="price[]" class="form-control item_price" id="price lst'.$order.'" value="'.$price.'" required />';
            $list1 .= '<input type="hidden" name="tax_rate[]" class="form-control item_rate" id="rate lst'.$order.'" value="'.$rate.'" required />';
            $list1 .= '<input type="hidden" name="total_cost[]" class="form-control item_cost" id="cost lst'.$order.'"  value="'.$cost.'" required />';
            $list1 .= '<input type="hidden" name="total_tax[]" class="form-control item_tax" id="tax lst'.$order.'"  value="'.$tax.'" required />';
            $list1 .= '<input type="hidden" name="unit[]" class="form-control item_unit" id="unit lst'.$order.'"  value="'.$unit.'"  />';
            $list1 .= '<input type="hidden" name="type" class="form-control item_type" id="type lst'.$order.'"  value="edit"  />';
            $list1 .= '<input type="hidden" name="no[]" class="form-control item_type" id="no lst'.$order.'"  value="'.$order.'"  />';
            $list1 .= '<input type="hidden"  class="form-control item_idlst'.$order.'" id="item_id "  value="'.$name.'"  />';
            $list1 .= '<input type="hidden" class="form-control type_idlst'.$order.'" id="type_id"  value="" required />';
            $list1 .= '</div>';
            }


             return response()->json([
            'list'          => $list,
            'list1' => $list1
    ]);
        
    }


    public function findUser(Request $request)
    {
         if($request->id == 'Visitor'){
       $district= Visitor::where('status','5')->get(); 
         }

         else if($request->id == 'Member'){

          $date=date('Y-m-d');
            $district= Member::where('disabled',0)->where('due_date', '>=', $date) ->get(); 
        
                 }
                                                                                          
               return response()->json($district);

}


  public function showType(Request $request)
    {
         if($request->id == 'Bar'){
       $item= Items::all(); 
         }

         else if($request->id == 'Kitchen'){

           $item=Menu::where('status','1')->get(); 
        
                 }
                                                                                          
               return response()->json($item);

}

 

 public function findPrice(Request $request)
    {
       $price= Items::where('id',$request->id)->get(); 
                                                                                          
               return response()->json($price);

} 


 public function findQuantity(Request $request)
    {
 
$item=$request->item;
$type=$request->type;
$location=$request->location;



 if($type == 'Bar'){
$item_info=Items::where('id', $item)->first();  
$good=GoodIssueItem::where('item_id',$item)->where('location',$location)->where('status',1)->sum('quantity');
$qty=$good * $item_info->bottle;

$sales=InvoiceHistory::where('item_id',$item)->where('location',$location)->where('type','Sales')->sum('quantity');

$balance=$qty-$sales;

 if ($balance > 0) {

if($request->id >  $balance ){
$price="You have exceeded your Stock. Choose quantity between 1.00 and ".  $balance  ;
}
else if($request->id <=  0){
$price="Choose quantity between 1.00 and ".  $balance  ;
}
else{
$price='' ;
 }

}

else{
$price="Your Stock Balance is Zero." ;

}

}

  else if($type == 'Kitchen'){

 if($request->id <=  0){
$price="You cannot chose quantity below zero"  ;
}
else{
$price='' ;
 }


}


                return response()->json($price);                      
 
    }
    
    
    
    public function section_report(Request $request)
    {
       
   $start_date = $request->start_date;
        $end_date = $request->end_date; 
 
                 
                 
       
        
       $data=[];
        
             
       if ($request->ajax()) {
           
        $added_by = auth()->user()->added_by;
        
        $rowDatampya = "SELECT facilities_invoices_history.item_id as id,facility_items.name , SUM(facilities_invoices_history.quantity) AS total_qty,SUM(facilities_invoices_history.quantity * facilities_invoices_history.price) AS total_price
                       FROM `facilities_invoices_history` JOIN facility_items ON facility_items.id=facilities_invoices_history.item_id  
                        WHERE facilities_invoices_history.invoice_date BETWEEN '".$start_date."' AND '".$end_date."'  GROUP by facilities_invoices_history.item_id ";
        
        $data = DB::select($rowDatampya);
 
                
        $dt =  Datatables::of($data);
             
        $dt = $dt->editColumn('name', function ($row) {
                
                       
                    $name= $row->name ; 

                    return '<a href="#"   class="item" data-id = "'.$row->id.'" data-type="sales" data-toggle="modal" data-target="#viewModal">'.$name.'</a>';
               
           
            });
                    
        $dt = $dt->editColumn('qty', function ($row){
                        
        return number_format($row->total_qty,2);
        });
        
        $dt = $dt->editColumn('cost', function ($row){
                        
        return number_format($row->total_price,2);
        });

       $dt = $dt->rawColumns(['name']);
        return $dt->make(true);
        }
     
     
     

        return view('facility.section_report',
            compact('data','start_date','end_date'));
    
    }


use SectionReport;

public function all_sections_report(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $userType = $request->input('user_type', 'All'); // Default to All
        $sportType = $request->input('sport_type', 'All'); // Default to All sports

        // Fetch available sports
        $sports = Items::distinct()->pluck('name')->toArray();

        $reportData = [];
        if (!empty($startDate) && !empty($endDate)) {
            $reportData = $this->generateSectionReport($startDate, $endDate, $userType, $sportType);
        }
        
        // dd($reportData);

        return view('facility.all_sections_report', compact('reportData', 'startDate', 'endDate', 'userType', 'sportType', 'sports'));
    }





    
    
      public function discountModal(Request $request)
    {

         $id=$request->id;
         $type = $request->type;
         $start_date = $request->start_date;
         $end_date = $request->end_date;  
         $added_by=auth()->user()->added_by;
         
         
       
 

//dd($type);
          switch ($type) {      
          case 'sales':
          $key=Items::find($id); 
          return view('facility.sales_modal',compact('id','start_date','end_date','key'));

             break;
                    
          case 'edit':
            
            //dd($request->all());         
          $type=$request->type[0];
          $name=$request->item_name[0];
          $qty=$request->quantity[0];
          $price=str_replace(",","",$request->price[0]);
          $cost=$request->total_cost[0];
          $tax=$request->total_tax[0];
          $order=$request->no[0];
          $unit=$request->unit[0];
          $rate=$request->tax_rate[0];
          
          if(!empty($request->saved_items_id[0])){
            $saved=$request->saved_items_id[0];
            }
            else{
            $saved='';   
                  }
    
            $item= Items::where('added_by',auth()->user()->added_by)->get();
        
         
                return view('facility.edit_modal', compact('item','name','qty','price','cost','tax','unit','rate','order','type','saved'));
                break;

                                   
     

 default:
             break;

            }

                       }
    

 
}
