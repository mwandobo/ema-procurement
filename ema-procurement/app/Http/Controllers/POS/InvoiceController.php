<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use App\Models\Accounting\AccountCodes;
use App\Models\Accounting\Accounts;
use App\Models\Currency;
use App\Models\Inventory;
use App\Models\InventoryHistory;
use App\Models\POS\Activity;
use App\Models\POS\InvoicePayments;
use App\Models\POS\InvoiceHistory;
use App\Models\POS\PurchaseHistory;
//use App\Models\POS\Items;
use App\Models\Facility\Items;
use App\Models\Accounting\JournalEntry;
use App\Models\Inventory\Location;
use App\Models\Payments\Payment_methodes;
//use App\Models\invoice_items;
use App\Models\POS\Client;
use App\Models\InventoryList;
use App\Models\ServiceType;
use App\Models\POS\Invoice;
use App\Models\POS\InvoiceItems;


use App\Models\Facility\Items as FacilityItems;
use App\Models\User;
use PDF;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $currency= Currency::all();
        $invoices = Invoice::all()->where('invoice_status',1);
        $client = Client::all();
        $name =Items::all();
        $bank_accounts=AccountCodes::where('account_group','Cash And Banks')->get(); 
        $location = Location::where('added_by',auth()->user()->added_by)->where('disabled','0')->get();
        $type="";
        
       return view('pos.sales.invoice',compact('name','client','currency','invoices','type','bank_accounts','location'));
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
          $count=Invoice::count();
        $pro=$count+1;
        $data['reference_no']= "S0".$pro;
        $data['client_id']=$request->client_id;
        $data['invoice_date']=$request->invoice_date;
        $data['due_date']=$request->due_date;
      $data['location']=$request->location;
        $data['exchange_code']=$request->exchange_code;
        $data['exchange_rate']=$request->exchange_rate;
        $data['invoice_amount']='1';
        $data['due_amount']='1';
        $data['invoice_tax']='1';
        $data['status']='0';
        $data['sales_type']=$request->sales_type;
        $data['bank_id']=$request->bank_id;
        $data['good_receive']='0';
        $data['invoice_status']=1;
        $data['added_by']= auth()->user()->added_by;

        $invoice = Invoice::create($data);
        
        $amountArr = str_replace(",","",$request->amount);
        $totalArr =  str_replace(",","",$request->tax);

        $nameArr =$request->item_name ;
        $qtyArr = $request->quantity  ;
        $priceArr = $request->price;
        $rateArr = $request->tax_rate ;
        $unitArr = $request->unit  ;
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

                    $items = array(
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
            //$cost['reference_no']= "SALES-".$invoice->id."-".$data['invoice_date'];
            $cost['due_amount'] =  $cost['invoice_amount'] + $cost['invoice_tax'];
            InvoiceItems::where('id',$invoice->id)->update($cost);
        }    

    if(!empty($invoice)){
                    $activity =Activity::create(
                        [ 
                             'added_by'=>auth()->user()->added_by,
 'user_id'=>auth()->user()->id,
                            'module_id'=>$invoice->id,
                             'module'=>'Invoice',
                            'activity'=>"Invoice with reference no  " .  $invoice->reference_no. "  is Created",
                        ]
                        );                      
       }

        Invoice::find($invoice->id)->update($cost);

        
        return redirect(route('invoice.show',$invoice->id));
        
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
        $invoices = Invoice::find($id);
        $invoice_items=InvoiceItems::where('invoice_id',$id)->where('due_quantity','>', '0')->get();
        $payments=InvoicePayments::where('invoice_id',$id)->get();
        
        return view('pos.sales.invoice_details',compact('invoices','invoice_items','payments'));
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
        $currency= Currency::all();
         $client=Client::all();
        $name =Items::all();        
        $data=Invoice::find($id);
        $items=InvoiceItems::where('invoice_id',$id)->get();
         $bank_accounts=AccountCodes::where('account_group','Cash And Banks')->get();
$location =  Location::all();
        $type="";
       return view('pos.sales.invoice',compact('name','client','currency','data','id','items','type','bank_accounts','location'));
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

        if($request->type == 'receive'){
            $invoice = Invoice::find($id);
            $data['client_id']=$request->client_id;
            $data['invoice_date']=$request->invoice_date;
            $data['due_date']=$request->due_date;
         $data['location']=$request->location;
            $data['exchange_code']=$request->exchange_code;
            $data['exchange_rate']=$request->exchange_rate;
            //$data['reference_no']="INV-".$id."-".$data['invoice_date'];
            $data['invoice_amount']='1';
            $data['due_amount']='1';
            $data['invoice_tax']='1';
            $data['good_receive']='1';
       $data['sales_type']=$request->sales_type;
        $data['bank_id']=$request->bank_id;
            $data['status']='1';
            $data['added_by']= auth()->user()->added_by;
    
            $invoice->update($data);
            
            $amountArr = str_replace(",","",$request->amount);
            $totalArr =  str_replace(",","",$request->tax);
    
            $nameArr =$request->item_name ;
            $qtyArr = $request->quantity  ;
            $priceArr = $request->price;
            $rateArr = $request->tax_rate ;
            $unitArr = $request->unit  ;
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
    
                        $items = array(
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
                      
                  if(!empty($qtyArr[$i])){
   
            }
         
  
                    }
                }
                $cost['due_amount'] =  $cost['invoice_amount'] + $cost['invoice_tax'];
                Invoice::where('id',$id)->update($cost);
            }    
    
            
    
            if(!empty($nameArr)){
                for($i = 0; $i < count($nameArr); $i++){
                    if(!empty($nameArr[$i])){
    
                        $lists= array(
                            'quantity' =>   $qtyArr[$i],
                             'item_id' => $savedArr[$i],
                               'added_by' => auth()->user()->added_by,
                               'client_id' =>   $data['client_id'],
                                'location' =>$data['location'],
                             'invoice_date' =>  $data['invoice_date'],
                            'type' =>   'Sales',
                            'invoice_id' =>$id);
                           
                         InvoiceHistory::create($lists);   
          
                        $inv=Items::where('id',$nameArr[$i])->first();
                        $q=$inv->quantity - $qtyArr[$i];
                        Items::where('id',$nameArr[$i])->update(['quantity' => $q]);
                    }
                }
            
            }    
    



    
            $inv = Invoice::find($id);
            $supp=Client::find($inv->client_id);


               $itm=InvoiceItems::where('invoice_id',$id)->get();

       foreach($itm as $x){
              
          $acc=FacilityItems::find($x->item_name);

            $cr= AccountCodes::where('id',$acc->code_id)->first();

            $journal = new JournalEntry();
          $journal->account_id = $acc->code_id;;
          $date = explode('-',$inv->invoice_date);
          $journal->date =   $inv->invoice_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
         $journal->transaction_type = 'pos_invoice';
          $journal->name = 'Invoice';
          $journal->credit = $x->total_cost *  $inv->exchange_rate;
          $journal->income_id= $inv->id;
         $journal->client_id= $inv->client_id;
           $journal->currency_code =  $inv->exchange_code;
          $journal->exchange_rate= $inv->exchange_rate;
          $journal->added_by=auth()->user()->added_by;
             $journal->notes= "Sales for Invoice No " .$inv->reference_no ." to Client ". $supp->name ;
          $journal->save();
        
        if($inv->invoice_tax > 0){
         $tax= AccountCodes::where('account_name','VAT OUT')->first();
            $journal = new JournalEntry();
          $journal->account_id = $tax->id;
          $date = explode('-',$inv->invoice_date);
          $journal->date =   $inv->invoice_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
             $journal->transaction_type = 'pos_invoice';
          $journal->name = 'Invoice';
          $journal->credit=$x->total_tax *  $inv->exchange_rate;
          $journal->income_id= $inv->id;
           $journal->client_id= $inv->client_id;
           $journal->currency_code =  $inv->exchange_code;
          $journal->exchange_rate= $inv->exchange_rate;
           $journal->added_by=auth()->user()->added_by;
             $journal->notes= "Sales Tax for Invoice No " .$inv->reference_no ." to Client ". $supp->name ;
          $journal->save();
        }
        
         $codes=AccountCodes::where('account_name','Receivables Control')->first();
          $journal = new JournalEntry();
          $journal->account_id = $codes->id;
          $date = explode('-',$inv->invoice_date);
          $journal->date =   $inv->invoice_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
          $journal->transaction_type = 'pos_invoice';
          $journal->name = 'Invoice';
          $journal->income_id= $inv->id;
        $journal->client_id= $inv->client_id;
          $journal->debit =($x->total_cost + $x->total_tax) *  $inv->exchange_rate;
          $journal->currency_code =  $inv->exchange_code;
          $journal->exchange_rate= $inv->exchange_rate;
          $journal->added_by=auth()->user()->added_by;
            $journal->notes= "Receivables for Sales Invoice No " .$inv->reference_no ." to Client ". $supp->name ;
          $journal->save();
    
}

      if(!empty($invoice)){
                    $activity =Activity::create(
                        [ 
                             'added_by'=>auth()->user()->added_by,
 'user_id'=>auth()->user()->id,
                            'module_id'=>$id,
                             'module'=>'Invoice',
                            'activity'=>"Invoice with reference no  " .  $invoice->reference_no. "  is Approved",
                        ]
                        );                      
       }


//invoice payment
 if($inv->sales_type == 'Cash Sales'){

              $sales =Invoice::find($inv->id);
            $method= Payment_methodes::where('name','Cash')->first();
             $count=InvoicePayments::count();
            $pro=$count+1;

                $receipt['trans_id'] = "TBSPH-".$pro;
                $receipt['invoice_id'] = $inv->id;
              $receipt['amount'] = $inv->due_amount;
                $receipt['date'] = $inv->invoice_date;
               $receipt['account_id'] = $request->bank_id;
                 $receipt['payment_method'] = $method->id;
                $receipt['added_by'] = auth()->user()->added_by;
                
                //update due amount from invoice table
                $b['due_amount'] =  0;
               $b['status'] = 3;
              
                $sales->update($b);
                 
                $payment = InvoicePayments::create($receipt);

                $supp=Client::find($sales->client_id);

               $cr= AccountCodes::where('id','$request->bank_id')->first();
          $journal = new JournalEntry();
        $journal->account_id = $request->bank_id;
        $date = explode('-',$request->invoice_date);
        $journal->date =   $request->invoice_date ;
        $journal->year = $date[0];
        $journal->month = $date[1];
       $journal->transaction_type = 'pos_pharmacy_invoice_payment';
        $journal->name = 'Invoice Payment';
        $journal->debit = $receipt['amount'] *  $sales->exchange_rate;
        $journal->payment_id= $payment->id;
        $journal->client_id= $sales->client_id;
         $journal->currency_code =   $sales->currency_code;
        $journal->exchange_rate=  $sales->exchange_rate;
          $journal->added_by=auth()->user()->added_by;
           $journal->notes= "Deposit for Sales Invoice No " .$sales->reference_no ." by Client ". $supp->name ;
        $journal->save();


        $codes= AccountCodes::where('account_group','Receivables')->first();
        $journal = new JournalEntry();
        $journal->account_id = $codes->id;
          $date = explode('-',$request->invoice_date);
        $journal->date =   $request->invoice_date ;
        $journal->year = $date[0];
        $journal->month = $date[1];
          $journal->transaction_type = 'pos_pharmacy_invoice_payment';
        $journal->name = 'Invoice Payment';
        $journal->credit =$receipt['amount'] *  $sales->exchange_rate;
          $journal->payment_id= $payment->id;
      $journal->client_id= $sales->client_id;
         $journal->currency_code =   $sales->currency_code;
        $journal->exchange_rate=  $sales->exchange_rate;
        $journal->added_by=auth()->user()->added_by;
         $journal->notes= "Clear Receivable for Invoice No  " .$sales->reference_no ." by Client ". $supp->name ;
        $journal->save();
        
$account= Accounts::where('account_id',$request->bank_id)->first();

if(!empty($account)){
$balance=$account->balance + $payment->amount ;
$item_to['balance']=$balance;
$account->update($item_to);
}

else{
  $cr= AccountCodes::where('id',$request->bank_id)->first();

     $new['account_id']= $request->bank_id;
       $new['account_name']= $cr->account_name;
      $new['balance']= $payment->amount;
       $new[' exchange_code']= $sales->currency_code;
        $new['added_by']=auth()->user()->added_by;
$balance=$payment->amount;
     Accounts::create($new);
}
        
   // save into tbl_transaction

                             $transaction= Transaction::create([
                                'module' => 'POS Pharmacy Invoice Payment',
                                 'module_id' => $payment->id,
                               'account_id' => $request->bank_id,
                                'code_id' => $codes->id,
                                'name' => 'POS Invoice Payment with reference ' .$payment->trans_id,
                                 'transaction_prefix' => $payment->trans_id,
                                'type' => 'Income',
                                'amount' =>$payment->amount ,
                                'credit' => $payment->amount,
                                 'total_balance' =>$balance,
                                'date' => date('Y-m-d', strtotime($request->date)),
                                'paid_by' => $sales->client_id,
                                'payment_methods_id' =>$payment->payment_method,
                                   'status' => 'paid' ,
                                'notes' => 'This deposit is from pos invoice  payment. The Reference is ' .$sales->reference_no .' by Client '. $supp->name  ,
                                'added_by' =>auth()->user()->added_by,
                            ]);


        if(!empty($payment)){
                    $activity =Activity::create(
                        [ 
                             'added_by'=>auth()->user()->added_by,
 'user_id'=>auth()->user()->id,
                            'module_id'=>$payment->id,
                             'module'=>'Invoice Payment',
                            'activity'=>"Invoice with reference no  " .  $sales->reference_no. "  is Paid",
                        ]
                        );                      
       }        



}


            return redirect(route('invoice.show',$id));
    

        }

        else{
        $invoice = Invoice::find($id);
        $data['client_id']=$request->client_id;
        $data['invoice_date']=$request->invoice_date;
        $data['due_date']=$request->due_date;
         $data['location']=$request->location;
        $data['exchange_code']=$request->exchange_code;
        $data['exchange_rate']=$request->exchange_rate;
        $data['invoice_amount']='1';
        $data['due_amount']='1';
        $data['invoice_tax']='1';
        $data['sales_type']=$request->sales_type;
        $data['bank_id']=$request->bank_id;
        $data['added_by']= auth()->user()->added_by;

        $invoice->update($data);
        
        $amountArr = str_replace(",","",$request->amount);
        $totalArr =  str_replace(",","",$request->tax);

        $nameArr =$request->item_name ;
        $qtyArr = $request->quantity  ;
        $priceArr = $request->price;
        $rateArr = $request->tax_rate ;
        $unitArr = $request->unit  ;
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

                    $items = array(
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

        if(!empty($invoice)){
                    $activity =Activity::create(
                        [ 
                             'added_by'=>auth()->user()->added_by,
 'user_id'=>auth()->user()->id,
                            'module_id'=>$id,
                             'module'=>'Invoice',
                            'activity'=>"Invoice with reference no  " .  $invoice->reference_no. "  is Updated",
                        ]
                        );                      
       }


        return redirect(route('invoice.show',$id));

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
        //
        InvoiceItems::where('invoice_id', $id)->delete();
        InvoicePayments::where('invoice_id', $id)->delete();
       
        $invoices = Invoice::find($id);

                     if(!empty($invoices)){
                    $activity =Activity::create(
                        [ 
                             'added_by'=>auth()->user()->added_by,
 'user_id'=>auth()->user()->id,
                            'module_id'=>$id,
                             'module'=>'Invoice',
                            'activity'=>"Invoice with reference no  " .  $invoices->reference_no. "  is Deleted",
                        ]
                        );                      
       }
        $invoices->delete();

    Toastr::success('Deleted Successfully','Success');
        return redirect(route('invoice.index'));
    }

    public function findPrice(Request $request)
    {
               $price= Items::where('id',$request->id)->get();
                return response()->json($price);                      

    }
 public function findQuantity(Request $request)
    {
 
$item=$request->item;
$location=$request->location;

$item_info=Items::where('id', $item)->first();  
$location_info=Location::find($request->location);
 if ($item_info->quantity > 0) {

$pqty= PurchaseHistory::where('item_id', $item)->where('location',$location)->where('type', 'Purchases')->sum('quantity');   
$dn= PurchaseHistory::where('item_id', $item)->where('location',$location)->where('type', 'Debit Note')->sum('quantity');  

$sqty= InvoiceHistory::where('item_id', $item)->where('location',$location)->where('type', 'Sales')->sum('quantity'); 
 $cn= InvoiceHistory::where('item_id', $item)->where('location',$location)->where('type', 'Credit Note')->sum('quantity');  

$quantity=($pqty-$dn)-($sqty-$cn);

 if ($quantity > 0) {

if($request->id >  $quantity){
$price="You have exceeded your Stock. Choose quantity between 1.00 and ".  number_format($quantity,2) ;
}
else if($request->id <=  0){
$price="Choose quantity between 1.00 and ".  number_format($quantity,2) ;
}

else{
$price='' ;
 }

}

else{
$price=$location_info->name . " Stock Balance  is Zero." ;

}


}



else{
$price="Your Stock Balance is Zero." ;

}

                return response()->json($price);                      
 
    }


   public function discountModal(Request $request)
    {
                       }

         


    public function approve($id)
    {
        //
        $invoice = Invoice::find($id);
        $data['status'] = 1;
        $invoice->update($data);

     if(!empty($invoice)){
                    $activity =Activity::create(
                        [ 
                             'added_by'=>auth()->user()->added_by,
 'user_id'=>auth()->user()->id,
                            'module_id'=>$id,
                             'module'=>'Invoice',
                            'activity'=>"Invoice with reference no  " .  $invoice->reference_no. "  is Approved",
                        ]
                        );                      
       }
         Toastr::success('Approved Successfully','Success');
        return redirect(route('invoice.index'));
    }

    public function cancel($id)
    {
        //
        $invoice = Invoice::find($id);
        $data['status'] = 4;
        $invoice->update($data);
       if(!empty($invoice)){
                    $activity =Activity::create(
                        [ 
                             'added_by'=>auth()->user()->added_by,
 'user_id'=>auth()->user()->id,
                            'module_id'=>$id,
                             'module'=>'Invoice',
                            'activity'=>"Invoice with reference no  " .  $invoice->reference_no. "  is Cancelled",
                        ]
                        ); 
}

        Toastr::success('Cancelled Successfully','Success');
        return redirect(route('invoice.index'));
    }

   

    public function receive($id)
    {
        //
        $currency= Currency::all();
        $client=Client::all();
        $name =Items::all(); 
        $bank_accounts=AccountCodes::where('account_group','Cash And Banks')->get(); 
        $data=Invoice::find($id);
        $items=InvoiceItems::where('invoice_id',$id)->get();
     $location =  Location::all();
        $type="receive";
       return view('pos.sales.invoice',compact('name','client','currency','data','id','items','type','bank_accounts','location'));
    }

  public function inventory_list()
    {
        //
        $tyre= InventoryList ::all();
       return view('inventory.list',compact('tyre'));
    }
    public function make_payment($id)
    {
        //
        $invoice = Invoice::find($id);
        $payment_method = Payment_methodes::all();
        $bank_accounts=AccountCodes::where('account_group','Cash And Banks')->where('added_by',auth()->user()->added_by)->get();;
        return view('pos.sales.invoice_payments',compact('invoice','payment_method','bank_accounts'));
    }
    
    public function invoice_pdfview(Request $request)
    {
        //
        $invoices = Invoice::find($request->id);
        $invoice_items=InvoiceItems::where('invoice_id',$request->id)->get();

        view()->share(['invoices'=>$invoices,'invoice_items'=> $invoice_items]);

        if($request->has('download')){
        $pdf = PDF::loadView('pos.sales.invoice_details_pdf')->setPaper('a4', 'potrait');
         return $pdf->download('SALES INV NO # ' .  $invoices->reference_no . ".pdf");
        }
       return view('inv_pdfview');
    }
public function debtors_report(Request $request)
    {
       
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $account_id=$request->account_id;
        $chart_of_accounts = [];
        foreach (Client::where('user_id',auth()->user()->added_by)->get() as $key) {
            $chart_of_accounts[$key->id] = $key->name;
        }
        if($request->isMethod('post')){
            $data=Invoice::where('client_id', $request->account_id)->whereBetween('invoice_date',[$start_date,$end_date])->where('status','!=',0)->get();
        }else{
            $data=[];
        }

       

        return view('pos.sales.debtors_report',
            compact('start_date',
                'end_date','chart_of_accounts','data','account_id'));
    }
}
