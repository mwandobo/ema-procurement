<?php

namespace App\Http\Controllers\Api_controllers\Restaurant\Order;

use App\Http\Controllers\Controller;
use App\Models\restaurant\Restaurant;
use App\Models\Inventory\Location;
use Carbon\Carbon;
use App\Models\Member\Member;
use App\Models\restaurant\Menu;
use App\Models\restaurant\MenuComponent;
use App\Models\restaurant\Order;
use App\Models\restaurant\OrderItem;

use App\Models\restaurant\Order23;
use App\Models\restaurant\OrderItem23;

use App\Models\User;

use App\Models\restaurant\OrderHistory;
use App\Models\restaurant\OrderPayments;
use App\Models\restaurant\Table;
use App\Models\Visitors\Visitor;
use App\Models\Accounting\AccountCodes;
use App\Models\Accounting\Accounts;
use App\Models\Currency;
use App\Models\Payments\Payment_methodes;
use App\Models\Accounting\JournalEntry;
use App\Models\Accounting\Transaction;
use App\Models\Bar\POS\GoodIssueItem;
use App\Models\Bar\POS\Items;
use App\Models\Bar\POS\InvoiceHistory;


use App\Models\Member\MemberTransaction;

use App\Models\Bar\POS\PurchaseHistory;


use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use PDF;

class OrderController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
           $orders = Order23::where('added_by', $id)->get();
          
          
          if($orders->isNotEmpty()){

            foreach($orders as $row){

                $data = $row;
                if (!empty($row->location)) {
                    $data['location_id'] = intval($row->location);
                    $location = Location::find(intval($row->location));
                    if(!empty($location)){
                        $loc2= Location::where('id', $row->location)->value('name');


                        $data['location'] = $loc2;
                    }

                    else{
                        $data['location'] = null;

                    }

                    
                }
                else{
                    $data['location_id'] = null;


                    $data['location'] = null;
                }

             
               


                if($row->status == 0){
                    $data['status'] = 'Not Approved';
                }
                elseif($row->status == 1){
                    $data['status'] = 'Not Paid';
                }
                elseif($row->status == 2){
                    $data['status'] = 'Partially Paid';
                }
                elseif($row->status == 3){
                    $data['status'] = 'Fully Paid';
                }
                elseif($row->status == 4){
                    $data['status'] = 'Cancelled';
                }
                elseif($row->status == 7){
                    $data['status'] = 'Paid';
                }
                elseif($row->status == 5){
                    $data['status'] = 'Delivered';
                }

                $farmers[] = $data;
     
            }

            $response=['success'=>true,'error'=>false,'message'=>'successfully','orders'=>$farmers];
            return response()->json($response,200);
        }
        else{

            $response=['success'=>false,'error'=>true,'message'=>'No Orders found'];
            return response()->json($response,200);
        }
        
        
            // return view('restaurant.orders.index', compact('index','type','location','bank_accounts','currency'));

    }
    
    public function order_index(int $id)
    {
        $usr = User::find($id);
       
       if(!empty($usr)){
           
           
            $added_by = $usr->added_by;
            
            // where('created_by',auth()->user()->id)->orderBy('created_at', 'desc')->get()

                $invoices = Order::where('created_by', $usr->id)->orderBy('created_at', 'desc')->get();
        
                
                if($invoices->isNotEmpty()){
        
                    foreach($invoices as $row){

                        $data = $row;
                        
                        if (!empty($row->location)) {
                            $data['location_id'] = intval($row->location);
                            $location = Location::find($row->location);
                            if(!empty($location)){
                                $loc2= Location::where('id', $row->location)->value('name');
        
        
                                $data['location'] = $loc2;
                            }
        
                            else{
                                $data['location'] = null;
        
                            }
        
                            
                        }
                        else{
                            $data['location_id'] = null;
        
        
        
                            $data['location'] = null;
                        }
                        
                        if($row->user_type == "Visitor"){
                            
                            if(!empty($row->user_id)){
        
                                $data_buyer =  Visitor::find(intval($row->user_id));
                                
                                $data['buyer'] =  $data_buyer->first_name ." ". $data_buyer->last_name;
                                
                                if(!empty($data_buyer->balance)){
                                    
                                    $data['current_balance'] = $data_buyer->balance;
                                }
                                else{
                                    
                                    $data['current_balance'] = "0.00";
                                    
                                }
                                
                                
                                
                                
            
                            }
                            else{
            
                                $data['buyer'] =  null;
                                
                                $data['current_balance'] = "0.00";
            
                            }
        
                            
                            
                        }
                        elseif($row->user_type == "Member"){
                            
                            if(!empty($row->user_id)){
                                
                                $data_buyer =  Member::find(intval($row->user_id));
        
                                $data['buyer'] =  $data_buyer->full_name ." ". $data_buyer->member_id;
                                
                                if(!empty($data_buyer->balance)){
                                    
                                    $data['current_balance'] = $data_buyer->balance;
                                }
                                else{
                                    
                                    $data['current_balance'] = "0.00";
                                    
                                }
            
                            }
                            else{
            
                                $data['buyer'] =  null;
                                
                                $data['current_balance'] = "0.00";
            
                            }
                            
                        }
                        else{
                            
                            $data['buyer'] =  null;
                            
                            $data['current_balance'] = "0.00";
                        }
                        
                        // $region = Region::find($row->region);
                        
                        
                        $data['invoice_total_cost'] = $row->invoice_amount + $row->invoice_tax;
                        
                        // $data['invoice_total_cost'] = $row->invoice_amount + $row->invoice_tax;
                        
                        
        
        
                       
        
        
                        if($row->status == 0){
                            $data['status'] = 'Not Approved';
                        }
                        elseif($row->status == 1){
                            $data['status'] = 'Not Paid';
                        }
                        elseif($row->status == 2){
                            $data['status'] = 'Partially Paid';
                        }
                        elseif($row->status == 3){
                            $data['status'] = 'Fully Paid';
                        }
                        elseif($row->status == 4){
                            $data['status'] = 'Cancelled';
                        }
                        elseif($row->status == 5){
                            $data['status'] = 'Received';
                        }
        
                        elseif($row->status == 6){
                            $data['status'] = 'Scanned and Paid';
                        }
                        elseif($row->status == 7){
                            $data['status'] = 'Paid';
                        }
        
                        $farmers[] = $data;
             
                    }
        
                    $response=['success'=>true,'error'=>false,'message'=>'successfully','orders'=>$farmers];
                    return response()->json($response,200);
                }
                else{
        
                    $response=['success'=>false,'error'=>true,'message'=>'No Inventory found'];
                    return response()->json($response,200);
                } 
       }
       else{
                $response=['success'=>false,'error'=>true,'message'=>'No User found by that id'];
                return response()->json($response,200);
       }
    }
    
    public function store_location(int $id){
        
        // $location=Location::where('main','0')->get();
        
        $usr = User::find($id);
       
       if(!empty($usr)){
           
           
            $added_by = $usr->added_by;
        
            $location=Location::leftJoin('location_manager', 'locations.id','location_manager.location_id')
                              ->where('locations.disabled','0')
                              ->where('locations.added_by',$usr->added_by)
                                ->where('location_manager.manager',$usr->id)     
                               ->select('locations.*')
                               ->orderBy('locations.created_at','asc')
                                  ->get()  ;
            
            if($location->isNotEmpty()){
    
            foreach($location as $row){
    
                $data = $row;
    
                $farmers[] = $data;
     
            }
    
            $response=['success'=>true,'error'=>false,'message'=>'successfully','store'=>$farmers];
            return response()->json($response,200);
            }
            else{
        
                $response=['success'=>false,'error'=>true,'message'=>'No Store found'];
                return response()->json($response,200);
            }
            
       }    
        
        else{
                $response=['success'=>false,'error'=>true,'message'=>'No User found by that id'];
                return response()->json($response,200);
       }
        
    }
    
    
    public function accounts(){
        
        $bank_accounts=AccountCodes::where('account_group','Cash And Banks')->get();
        
        if($bank_accounts->isNotEmpty()){

        foreach($bank_accounts as $row){

            $data = $row;

            $farmers[] = $data;
 
        }

        $response=['success'=>true,'error'=>false,'message'=>'successfully','accounts'=>$farmers];
        return response()->json($response,200);
        }
        else{
    
            $response=['success'=>false,'error'=>true,'message'=>'No Accounts found'];
            return response()->json($response,200);
        }
        
    }
    
    public function currency(){
        
        $currency= Currency::all();
        
        if($currency->isNotEmpty()){

        foreach($currency as $row){

            $data = $row;

            $farmers[] = $data;
 
        }

        $response=['success'=>true,'error'=>false,'message'=>'successfully','currency'=>$farmers];
        return response()->json($response,200);
        }
        else{
    
            $response=['success'=>false,'error'=>true,'message'=>'No Currency found'];
            return response()->json($response,200);
        }
        
    }
    
    public function members(){
        
        $date = Carbon::now()->format('Y-m-d');
        
        $members= Member::where('disabled',0)->where('due_date', '>=', $date)->get();
        
        if($members->isNotEmpty()){

        foreach($members as $row){

            $data = $row;
            
            $data_buyer =  Member::find(intval($row->id));
        
            $data['buyer'] =  $data_buyer->full_name ." ". $data_buyer->member_id;

            $farmers[] = $data;
 
        }

        $response=['success'=>true,'error'=>false,'message'=>'successfully','members'=>$farmers];
        return response()->json($response,200);
        }
        else{
    
            $response=['success'=>false,'error'=>true,'message'=>'No Members found'];
            return response()->json($response,200);
        }
        
    }
    
    public function vistors(){
        
        // $date = Carbon::now()->format('Y-m-d');
        
        $vistors= Visitor::where('status','5')->get();
        
        if($vistors->isNotEmpty()){

        foreach($vistors as $row){

            $data = $row;
            
            $data_buyer =  Visitor::find(intval($row->id));
                                
            $data['buyer'] =  $data_buyer->first_name ." ". $data_buyer->last_name;

            $farmers[] = $data;
 
        }

        $response=['success'=>true,'error'=>false,'message'=>'successfully','visitors'=>$farmers];
        return response()->json($response,200);
        }
        else{
    
            $response=['success'=>false,'error'=>true,'message'=>'No Visitors found'];
            return response()->json($response,200);
        }
        
    }
    
    public function order_items(){
        
        // $date = Carbon::now()->format('Y-m-d');
        
        $items = Items::where('quantity', '>', 0)->get();
        
        if($items->isNotEmpty()){

        foreach($items as $row){

            $data = $row;

            $farmers[] = $data;
 
        }

        $response=['success'=>true,'error'=>false,'message'=>'successfully','items'=>$farmers];
        return response()->json($response,200);
        }
        else{
    
            $response=['success'=>false,'error'=>true,'message'=>'No Bar items found'];
            return response()->json($response,200);
        }
        
    }
    
    public function order_items_quantity_checking(int $item_id, int $location_id, int $id){
        
        // $date = Carbon::now()->format('Y-m-d');
        
            $usr = User::find($id);
            
            if(!empty($usr)){
                
                $location_info = Location::find($location_id);
         
                $item_info = Items::where('id', $item_id)->first();  
            
                if ($item_info->quantity > 0) {
    
                        $due=PurchaseHistory::where('item_id',$item_id)->where('location',$location_id)->where('type', 'Purchases')->where('added_by',$usr->added_by)->sum('quantity');
                        $return=PurchaseHistory::where('item_id',$item_id)->where('location',$location_id)->where('type', 'Debit Note')->where('added_by',$usr->added_by)->sum('quantity');    
                                                                              
                        $rgood=GoodIssueItem::where('item_id',$item_id)->where('location',$location_id)->where('status',1)->where('added_by',$usr->added_by)->sum('quantity');
                        $good=GoodIssueItem::where('item_id',$item_id)->where('start',$location_id)->where('status',1)->where('added_by',$usr->added_by)->sum('quantity');
                        
                        $sqty= InvoiceHistory::where('item_id', $item_id)->where('location',$location_id)->where('type', 'Sales')->where('added_by',$usr->added_by)->sum('quantity'); 
                         $cn= InvoiceHistory::where('item_id', $item_id)->where('location',$location_id)->where('type', 'Credit Note')->where('added_by',$usr->added_by)->sum('quantity');
                        
                        $qty=$due-$return;
                        $tqty=$qty * $item_info->bottle;
                        $inv=$sqty-$cn ;
                        
                        
                        $b=($tqty + ($rgood * $item_info->bottle)) - ($good  * $item_info->bottle) - $inv;
                        $balance=floor($b);
                        
                        //dd($balance);
                        
                         if ($balance > 0) {
                        
                            
                            //$quantity = number_format($balance,2);
                            
                            $quantity = $balance;
                            
                            $response=['success'=>true,'error'=>false,'message'=>'successfully','items_quantity'=>$quantity];
                            return response()->json($response,200);
                        
                        
                        }
                        
                        else{
                            
                            $quantity = $balance;
                            
                            $response=['success'=>true,'error'=>false,'message'=>'successfully','items_quantity'=>$quantity];
                            return response()->json($response,200);
                        
                        }
                    
                    
                    }
                    
                else{
                    
                    // $price="Your Stock Balance is Zero." ;
                    
                    $quantity = 0;
                    
                    $response=['success'=>true,'error'=>false,'message'=>'successfully','items_quantity'=>$quantity];
                    return response()->json($response,200);
                
                }
                
            }
            else{
    
                $response=['success'=>false,'error'=>true,'message'=>'No User found by id'];
                return response()->json($response,200);
            }
        
        
    }
    
    public function member_visitor_amount_spend(int $buyer_id, String $buyer_type)
    {
             if($buyer_type == 'Visitor'){
                    $data= Visitor::find($buyer_id); 
             }
    
            elseif($buyer_type == 'Member'){
                $data= Member::find($buyer_id);         
             }
    
         if ($data->balance  > 0) {
    
            //  $wallet_balance = number_format($data->balance,2);
            
             $n_wallet_balance = $data->balance;
             
            //  $n_wallet_balance = floatval($data->balance);
                                    
            $response=['success'=>true,'error'=>false,'message'=>'successfully','buyer_balance'=>$n_wallet_balance];
            return response()->json($response,200);
        
        }
        
        else{
            
            // $wallet_balance = number_format($data->balance,2);
            
            if($data->balance  == 0){
                
                $n_wallet_balance =  "0.00";
                
            }
            else{
                
                $n_wallet_balance = $data->balance;
                
            }
            
            
            
            // $n_wallet_balance = floatval($data->balance);
                                    
            $response=['success'=>true,'error'=>false,'message'=>'successfully','buyer_balance'=>$n_wallet_balance];
            return response()->json($response,200);
        
        
        }
    
    
    }
    
    public function kitchen_items(){
        
        // $date = Carbon::now()->format('Y-m-d');
        
        $items = Menu::where('status','1')->get();
        
        if($items->isNotEmpty()){

        foreach($items as $row){

            $data = $row;

            $farmers[] = $data;
 
        }

        $response=['success'=>true,'error'=>false,'message'=>'successfully','items'=>$farmers];
        return response()->json($response,200);
        }
        else{
    
            $response=['success'=>false,'error'=>true,'message'=>'No Kitchen items found'];
            return response()->json($response,200);
        }
        
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
        $nowDate = Carbon::now()->format('Y-m-d');
        
        $count=Order23::where('added_by', $request->id)->count();
        $pro=$count+1;
        $data['reference_no']= "DGC-ORD-".$pro;
        $data['user_id']=$request['user_id'];
        $data['user_type']=$request['user_type'];
        $data['invoice_date']= $nowDate;
        $data['location']=$request['location'];
        $data['account_id']=$request['account_id'];
        $data['exchange_code']=$request['exchange_code'];
        $data['exchange_rate']=$request['exchange_rate'];
        $data['notes']=$request['notes'];
        
        $total_cost = $request['quantity'] * $request['price'];
        
        $subtotal = $total_cost;
  
          //purchase_amount
        $data['invoice_amount'] = $subtotal;
          //purchase_tax
        // $data['invoice_tax'] = $request->total_tax;
        
        //  $data['invoice_tax'] = 'invoice_tax';
        
        $tax = 0.18;
        
        $total_tax  = $tax * $total_cost;
        
        $data['invoice_tax'] = $total_tax;
          //subtotal+total
        // $data['due_amount'] = $request->due_amount;
        
        $data['due_amount'] = $data['invoice_amount'] + $data['invoice_tax'];
          
          
        // $data['invoice_amount']='1';
        // $data['due_amount']='16678';
        // $data['invoice_tax']='1';
        
        $data['status']='0';
        $data['good_receive']='0';
        $data['invoice_status']=1;
        
        $data['added_by']= $request['id'];

        $invoice = Order23::create($data);
        
        
        
        
                        $iyt = OrderItem23::where('invoice_id', $invoice->id)->orderBy('created_at', 'desc')->first();

                        if (!empty($iyt)) {
                            $iy = $iyt->order_no + 1;
                        } else {
                            $iy = 1;
                        }


                        $items23 = array(
                            'type' => $request['type'],
                        'item_name' => $request['item_name'],
                        'quantity' =>   $request['quantity'],
                       'due_quantity' =>   $request['quantity'],
                        'tax_rate' =>  $tax,
                           'price' =>  $request['price'],
                        'total_cost' =>  $total_cost,
                        'total_tax' =>   $total_tax,
                         'items_id' => $request['item_id'],
                         'reference_no' => $invoice->reference_no,
                         'due_amount' => $invoice->due_amount,
                           'order_no' => $iy,
                           'added_by' => $request['id'],
                           'invoice_amount' => $invoice->invoice_amount,
                           'invoice_tax' => $invoice->invoice_tax,
                        'invoice_id' =>$invoice->id);
                       
                     $pt =   OrderItem23::create($items23);
                     
                  
     
        if($invoice)
        {
           
        
            $response=['success'=>true,'error'=>false, 'message' => 'Order Created successful', 'order' => $invoice];
            return response()->json($response, 200);
        }
        else
        {
            
            $response=['success'=>false,'error'=>true,'message'=>'Failed to  Create Order Successfully'];
            return response()->json($response,200);
        }

    }
    
 
    
    public function order_store(Request $request)
    {


        $usr = User::find($request->input('id'));
        
        // dd($request->input('id'));
       
       if(!empty($usr)){
           
           
            $added_by = $usr->added_by;

           
        $count=Order::count();
        $pro=$count+1;
        $data['reference_no']= "DGC-ORD-".$pro;
        $data['user_id']=$request->user_id;
        $data['user_type']=$request->user_type; 
        
        $data['invoice_date']=date('Y-m-d');
        
        // $data['invoice_date']= $request->invoice_date;
        
        $data['location']=$request->location;
        $data['account_id']=$request->account_id;
        if($request->exchange_code == "Euro"){
              $data['exchange_code'] = "EUR";
          }
          elseif($request->exchange_code == "US Dollar"){
              $data['exchange_code'] ="USD";
          }
          elseif($request->exchange_code == "Tanzania Shilling"){
              $data['exchange_code'] = "TZS";
          }
          else{
             $data['exchange_code'] = $request->exchange_code; 
          }
        $data['exchange_rate']= $request->exchange_rate;
        $data['notes'] = $request->notes;
        
        $subtotal = $request->sub_total;
  
          //purchase_amount
          $data['invoice_amount'] = $subtotal;
          //purchase_tax
          $data['invoice_tax'] = $request->total_tax;
         
         
        //   $data['due_amount'] = doubleval($request->sub_total) + doubleval($request->total_tax);
          
        $data['status']=1;
        
        $data['good_receive']='1';
  
        $data['invoice_status']=1;
          
        $data['created_by']= $usr->id;
        $data['added_by']= $added_by;
  
          $invoice = Order::create($data);
          
          $due_amount_mm = $invoice->invoice_amount + $invoice->invoice_tax;
          
          Order::where('id', $invoice->id)->update(['due_amount' => $due_amount_mm]);
          
        //   =============
        
        
        
            $inv = Order::find($invoice->id);
            
            // ---start
            
            
            
            if($inv->user_type == 'Member'){ 
                
                $member=Member::find($inv->user_id);
                // save into member_transaction
                 $a=route('orders_receipt',['download'=>'pdf','id'=>$inv->id]);
                
                                             $mem_transaction= MemberTransaction::create([
                                                'module' => 'Order Payment',
                                                 'module_id' => $inv->id,
                                              'member_id' => $inv->user_id,
                                                'name' => 'Order Payment with reference ' .$inv->reference_no,
                                                 'transaction_prefix' => $inv->reference_no,
                                                'type' => 'Payment',
                                                'amount' =>$inv->due_amount ,
                                                'debit' => $inv->due_amount,
                                                 'total_balance' =>$member->balance - $inv->due_amount,
                                                'date' => date('Y-m-d', strtotime($inv->invoice_date)),
                                                'paid_by' => $inv->client_id,
                                                   'status' => 'paid' ,
                                                'notes' => 'This payment is for order payment. The Reference is ' .$inv->reference_no .' by Member '. $member->full_name  ,
                                                 'link'=> $a,
                                                'added_by' =>$added_by,
                                            ]);
                
                }


       
              if($inv->user_type == 'Visitor'){
                  
                        $supp=Visitor::find($inv->user_id);
                       $user=$supp->first_name ." ". $supp->last_name;
                     $income= AccountCodes::where('account_name','Receivables Control')->first();
            
                   Visitor::find($inv->user_id)->update(['balance'=>$supp->balance - $inv->due_amount]) ;
             }

          else if($inv->user_type == 'Member'){
              
                    $supp=Member::find($inv->user_id);
                   $user=$supp->full_name ;
                  $income= AccountCodes::where('account_name','Receivables Control')->first();
              Member::find($inv->user_id)->update(['balance'=>$supp->balance - $inv->due_amount]) ;
              
             }

            $cr= AccountCodes::where('account_name','Bar Drinking Sales')->first();
            $journal = new JournalEntry();
          $journal->account_id = $cr->id;
          $date = explode('-',$inv->invoice_date);
          $journal->date =   $inv->invoice_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
         $journal->transaction_type ='orders';
          $journal->name = 'Orders';
          $journal->credit = $inv->invoice_amount *  $inv->exchange_rate;
          $journal->income_id= $inv->id;

          if($inv->user_type == 'Visitor'){
            $journal->visitor_id= $inv->user_id;
             }
          else if($inv->user_type == 'Member'){
           $journal->member_id= $inv->user_id;
             }

           $journal->currency_code =  $inv->exchange_code;
          $journal->exchange_rate= $inv->exchange_rate;
          $journal->added_by=$added_by;
             $journal->notes= "Sales for Invoice No " .$inv->reference_no ." to Client ". $user ;
          $journal->save();

        
        if($inv->invoice_tax > 0){
         $tax= AccountCodes::where('account_name','VAT OUT')->first();
            $journal = new JournalEntry();
          $journal->account_id = $tax->id;
          $date = explode('-',$inv->invoice_date);
          $journal->date =   $inv->invoice_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
             $journal->transaction_type = 'orders';
          $journal->name = 'Orders';
          $journal->credit= $inv->invoice_tax *  $inv->exchange_rate;
          $journal->income_id= $inv->id;

          if($inv->user_type == 'Visitor'){
            $journal->visitor_id= $inv->user_id;
             }
          else if($inv->user_type == 'Member'){
           $journal->member_id= $inv->user_id;
             }
           $journal->currency_code =  $inv->exchange_code;
          $journal->exchange_rate= $inv->exchange_rate;
           $journal->added_by=$added_by;
             $journal->notes= "Sales Tax for Invoice No " .$inv->reference_no ." to Client ". $user ;
          $journal->save();
        }
        
        
          $journal = new JournalEntry();
          $journal->account_id = $income->id;
          $date = explode('-',$inv->invoice_date);
          $journal->date =   $inv->invoice_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
          $journal->transaction_type = 'orders';
          $journal->name = 'Orders';
          $journal->income_id= $inv->id;

        if($inv->user_type == 'Visitor'){
            $journal->visitor_id= $inv->user_id;
             }
          else if($inv->user_type == 'Member'){
           $journal->member_id= $inv->user_id;
             }

          $journal->debit =$inv->due_amount *  $inv->exchange_rate;
          $journal->currency_code =  $inv->exchange_code;
          $journal->exchange_rate= $inv->exchange_rate;
          $journal->added_by=$added_by;
            $journal->notes= "Receivables for Sales Invoice No " .$inv->reference_no ." to Client ". $user ;
          $journal->save();
    



          //invoice payment


          $sales =Order::find($inv->id);
          $method= Payment_methodes::where('name','Cash')->first();
    
          $count=OrderPayments::count();
          $pro=$count+1;

          $receipt['trans_id'] = "TRANS_ORD_".$pro;
          $receipt['invoice_id'] = $inv->id;
          $receipt['account_id'] = $request->account_id;
          $receipt['amount'] = $inv->due_amount;
          $receipt['date'] = $inv->invoice_date;
          $receipt['payment_method'] = $method->id;
          $receipt['added_by'] = $added_by;
          
          //update due amount from invoice table
          $b['due_amount'] =  0;
          $b['status'] = 3;
  
          
          $sales->update($b);
           
          $payment = OrderPayments::create($receipt);
            
            
            // ---enddd
                      
                 
  
                //   if (!empty($invoice->location)) {
                //       $invoice['location_id'] = intval($invoice->location);
  
                //       $loc2= Location::where('id', $invoice->location)->value('name');
  
  
                //       $invoice['location'] = $loc2;
                //   }
                //   else{
                //       $invoice['location_id'] = null;
  
                //       // $loc2= Location::where('id', $row->location)->value('name');
  
  
                //       $invoice['location'] = null;
                //   }

                  
                //   if(!empty($invoice->client_id)){
                //     $invoice['client_id'] =  intval($invoice->client_id);
                //     }
                //     else{
                //         $invoice['client_id'] =  null;
                //     }


                //   $client_id = Client::find(intval($invoice->client_id));
                //   if(!empty($client_id)){
  
                //   $invoice['client'] =  Client::find(intval($invoice->client_id))->name;
  
                //   $invoice['client_tin'] =  Client::find(intval($invoice->client_id))->TIN;
  
                //   $invoice['client_email'] =  Client::find(intval($invoice->client_id))->email;
  
                //   $invoice['client_phone'] =  Client::find(intval($invoice->client_id))->phone;
  
                //   $invoice['client_address'] =  Client::find(intval($invoice->client_id))->address;
                //   }
                //   else{
  
                //       $invoice['client'] =  null;
  
                //       $invoice['client_tin'] =  null;
      
                //       $invoice['client_email'] =  null;
      
                //       $invoice['client_phone'] =  null;
      
                //       $invoice['client_address'] =  null;
                //   }
  
           
  
                //       $invoice['invoice_id'] = $invoice->id;

                //     //   $region = Region::find($invoice->region);

                
                //         if(!empty($invoice->region)){

                //             $invoice['region']  = $invoice->region;

                //         }
                //         else{
                //             $invoice['region']  = null;

                //         }
  
                //         if(!empty($invoice->store_id)){

                //             $invoice['store_id']  = intval($invoice->store_id);

                //         }
                //         else{
                //             $invoice['store_id']  = null;

                //         }
                
                
                 if (!empty($inv->location)) {
                            $inv['location_id'] = intval($inv->location);
                            $location = Location::find($inv->location);
                            if(!empty($location)){
                                $loc2= Location::where('id', $inv->location)->value('name');
        
        
                                $inv['location'] = $loc2;
                            }
        
                            else{
                                $inv['location'] = null;
        
                            }
        
                            
                        }
                        else{
                            $inv['location_id'] = null;
        
        
        
                            $inv['location'] = null;
                        }
                        
                        if($inv->user_type == "Visitor"){
                            
                            if(!empty($inv->user_id)){
        
                                $data_buyer =  Visitor::find(intval($inv->user_id));
                                
                                $inv['buyer'] =  $data_buyer->first_name ." ". $data_buyer->last_name;
            
                            }
                            else{
            
                                $inv['buyer'] =  null;
            
                            }
        
                            
                            
                        }
                        elseif($inv->user_type == "Member"){
                            
                            if(!empty($inv->user_id)){
                                
                                $data_buyer =  Member::find(intval($inv->user_id));
        
                                $inv['buyer'] =  $data_buyer->full_name ." ". $data_buyer->member_id;
            
                            }
                            else{
            
                                $inv['buyer'] =  null;
            
                            }
                            
                        }
                        else{
                            
                            $inv['buyer'] =  null;
                        }
                        
                        
                        $inv['invoice_total_cost'] = $inv->invoice_amount + $inv->invoice_tax;
  
  
  
                  if($inv->status == 0){
                      $inv['status'] = 'Not Approved';
                  }
                  elseif($inv->status == 1){
                      $inv['status'] = 'Not Paid';
                  }
                  elseif($inv->status == 2){
                      $inv['status'] = 'Partially Paid';
                  }
                  elseif($inv->status == 3){
                      $inv['status'] = 'Fully Paid';
                  }
                  elseif($inv->status == 4){
                      $inv['status'] = 'Cancelled';
                  }
                  elseif($inv->status == 5){
                      $inv['status'] = 'Received';
                  }
  
                  elseif($inv->status == 6){
                      $inv['status'] = 'Scanned and Paid';
                  }
                  elseif($inv->status == 7){
                    $inv['status'] = 'Paid';
                }
  
              if($invoice)
              {
              
  
              $response=['success'=>true,'error'=>false, 'message' => 'Order Created successful', 'order' => $inv];
              return response()->json($response, 200);
              }
              else
              {
              
              $response=['success'=>false,'error'=>true,'message'=>'Failed to  Create Order Successfully'];
              return response()->json($response,200);
              }
  

        
        }
       else{
                $response=['success'=>false,'error'=>true,'message'=>'No User found by that id'];
                return response()->json($response,200);
       } 

        
    }
    
    
    public function item_index(int $id){
        $invoices=OrderItem::where('invoice_id', $id)->orderBy('created_at', 'desc')->get();
        
        if($invoices->isNotEmpty()){

            foreach($invoices as $row){

                $data = $row;

                $data['invoice_id'] = intval($row->invoice_id);


                $data['purchase_item_id'] = intval($row->id);


                // $data['id'] = intval($row->items_id);
                $data['tax_rate'] = strval($row->tax_rate);
                
                $data['item_name'] = Items::find(intval($row->items_id))->name;

                $data['inventory_id'] = intval($row->items_id);

                $farmers[] = $data;
     
            }

            $response=['success'=>true,'error'=>false,'message'=>'successfully','order_item'=>$farmers];
            return response()->json($response,200);
        }
        else{

            $response=['success'=>false,'error'=>true,'message'=>'No order Item found'];
            return response()->json($response,200);
        } 
    }

    public function item_indexOff(int $id, int $lastId){

        $invoices=OrderItem::where('invoice_id', $id)->where('id', '>', $lastId)->orderBy('created_at', 'desc')->get();
        
        if($invoices->isNotEmpty()){

            foreach($invoices as $row){

                $data = $row;

                $data['invoice_id'] = intval($row->invoice_id);


                $data['purchase_item_id'] = intval($row->id);
                
                $data['item_name'] = Items::find(intval($row->items_id))->name;
                
                $data['tax_rate'] = strval($row->tax_rate);


                // $data['id'] = intval($row->items_id);

                $data['inventory_id'] = intval($row->items_id);

                $farmers[] = $data;
     
            }

            $response=['success'=>true,'error'=>false,'message'=>'successfully','order_item'=>$farmers];
            return response()->json($response,200);
        }
        else{

            $response=['success'=>false,'error'=>true,'message'=>'No Order Item found'];
            return response()->json($response,200);
        } 

    }

    public function order_items_store(Request $request){

        $this->validate($request,[
            'item_id' => 'required',
            'tax_rate' => 'required',   

            'price' => 'required',
            'total' => 'required',
            'tax' =>'required',

            'invoice_id' => 'required',

        ]);

        

        $invoice = Order::find(intval($request->invoice_id));



        if(!empty($invoice)){

            

            $iyt = OrderItem::where('invoice_id', $invoice->id)->orderBy('created_at', 'desc')->first();

                    if(!empty($iyt)){
                        $iy = $iyt->order_no + 1;
                    }
                    else{
        
                        $iy = 1;
                    }
                     
 
                     $d=Items::where('id',$request->item_id)->first();

                     if(!empty($d)){

                        

                             
                              $items23 = array(
                                 'type' => 'Bar',
                                  'item_name' => $request->item_id,
                                  'quantity' =>   $request->quantity,
                                    'due_quantity' => $request->quantity,
                                  'tax_rate' =>  $request->tax_rate,
                                  'price' =>  $request->price,
                                  'total_cost' =>  $request->total,
                                  'total_tax' =>   $request->tax,
                                    'items_id' => $request->item_id,
                                     'order_no' => $iy,
                                     'added_by' => $invoice->added_by,
                                  'invoice_id' =>$invoice->id);
                                 
                              $dt2 =   OrderItem::create($items23);  ;
                               
                               
    
    
                            //    error_log("++++++++++++++++++++++++++++  invoice items    ========================");
                            
                                      
                                                
                                                $lists= array(
                                                'quantity' =>   $request->quantity,
                                                 'item_id' => $request->item_id,
                                                   'added_by' => $invoice->added_by,
                                                   'client_id' =>   $invoice->user_id,
                                                 'invoice_date' =>  $invoice->invoice_date,
                                                 'location' =>   $invoice->location,
                                                'type' =>   'Sales',
                                                'invoice_id' =>$invoice->id);
                                               
                                             $dt25568 = InvoiceHistory::create($lists); 
                                             
                                             $loc=Location::where('id',$invoice->location)->first();
                                            $cr=$request->quantity/$d->bottle;
                                            $cq=round($cr, 1);
                                            $lq['crate']=$loc->crate - $cq;
                                            $lq['bottle']=$loc->bottle - $request->quantity;
                                            Location::where('id',$invoice->location)->update($lq);
                                                
                                           
                                            
                                            $x_lists= array(
                                            'quantity' =>   $request->quantity,
                                             'price' =>   $request->price,
                                             'item_id' => $request->item_id,
                                               'added_by' => $invoice->added_by,
                                               'user_id' =>   $request->user_id,
                                             'invoice_date' =>  $invoice->invoice_date,
                                             'location' =>    $invoice->location,
                                            'type' =>   'Sales',
                                              'item_type' =>  'Bar',
                                            'invoice_id' =>$invoice->id);
                                           
                                         OrderHistory::create($x_lists);   
    
                                                  
                 
                                     $dt2['tax_rate'] = $dt2->tax_rate;
    
                                     $dt2['quantity'] = $dt2->quantity;

                                    $dt2['inventory_id'] = intval($dt2->items_id);
                                    
                                    $dt2['item_name'] = Items::find(intval($dt2->items_id))->name;

     
       
          
                        $response=['success'=>true,'error'=>false, 'message' => 'Invoice Items Created successful', 'order_item' => $dt2];
                        return response()->json($response, 200);


                     }
                     else{

                        $response=['success'=>false,'error'=>true,'message'=>'Failed to  Create Invoice Items Cause There is no item by that id in inventory'];
                        return response()->json($response,200); 
                     }
 
                    

        }
        else
        {
                      
            $response=['success'=>false,'error'=>true,'message'=>'Failed to  Create Invoice Items Successfully'];
             return response()->json($response,200);
        } 
    }

    
    public function item_sales_delete(int $id){

        $invoice_item = OrderItem::find($id);

        $invoice_id = $invoice_item->invoice_id; 

        $invoice = Order::find($invoice_id);





        $data['invoice_amount'] = $invoice->invoice_amount -  $invoice_item->total_cost;

        $data['invoice_tax'] = $invoice->invoice_tax - $invoice_item->total_tax;

        $data['due_amount'] = $invoice->due_amount - $invoice_item->total_tax - $invoice_item->total_cost;


       


               


                    $invoice->update($data);

                    $invoice_items12 = InvoiceItems::where('invoice_id', $invoice_id)->update($data);

                    $inv=Items::where('id',$invoice_item->items_id)->first();
                    
                    $loc=Location::where('id',$invoice->location)->first();
                    $cr=$request->quantity/$inv->bottle;
                    $cq=round($cr, 1);
                    $lq['crate']=$loc->crate + $cq;
                    $lq['bottle']=$loc->bottle + $request->quantity;
                    Location::where('id',$invoice->location)->update($lq);
            
            
                  $invoice_items99 =  $invoice_item->delete();


        if($invoice_items99)
        {
            

            $response=['success'=>true,'error'=>false,'message'=>'Deleted Successfully'];
            return response()->json($response,200);
        }
        else
        {
            
            $response=['success'=>false,'error'=>true,'message'=>'Failed to Deleted Successfully'];
            return response()->json($response,200);
        }

    }

    public function item_sales_update(Request $request){

        $this->validate($request,[
            'item_id' => 'required',
            'tax_rate' => 'required',   

            'price' => 'required',
            'total' => 'required',
            'tax' =>'required',

            'invoice_id' => 'required',

        ]);
      

            $itm = Items::where('id',$request->item_id)->first();

            if(!empty($itm)){

                    $invoice = Order::find($request->invoice_id);
                    

                    if (!empty($invoice)) {




                        if(!empty($request->purchase_item_id)){
                            
                            // if($request->tax_rate == 18){
                            //          $tax_rate = 0.18;
                            //      }else{
                            //           $tax_rate = $request->tax_rate;
                            //      }

                        $invoice_item = OrderItem::find($request->purchase_item_id);

                        $d=Items::where('id', $request->item_id)->first();

                        $items23 = array(
                            'type' => 'Bar',
                                  'item_name' => $request->item_id,
                                  'quantity' =>   $request->quantity,
                                    'due_quantity' => $request->quantity,
                                  'tax_rate' =>  $request->tax_rate,
                                  'price' =>  $request->price,
                                  'total_cost' =>  $request->total,
                                  'total_tax' =>   $request->tax,
                                    'items_id' => $request->item_id,
                                     'order_no' => $iy,
                                     'added_by' => $invoice->added_by,
                                  'invoice_id' =>$invoice->id);

                        $invoice_item_updated =  OrderItem::where('id',$invoice_item->id)->update($items23);

                        // $purchase_item_updated = $pt122->update($items23);

                        // $pt =  PurchaseItems::create($items23);;

                        // $inv=Items::where('id',$request->item_id)->first();
                        // $q=$inv->quantity - $request->quantity;
                        // Items::where('id',$request->item_id)->update(['quantity' => $q]);
                
                        //     $loc=Location::where('id',$invoice->location)->first();
                        // $lq['quantity']=$loc->quantity - $request->quantity;
                        // Location::where('id',$invoice->location)->update($lq);

                       

                        if ($invoice_item_updated) {
                            $response=['success'=>true,'error'=>false, 'message' => 'Invoice Item Updated successful',];
                            return response()->json($response, 200);
                        }
                        else
                        {
                                                
                            $response=['success'=>false,'error'=>true,'message'=>'Failed to  Update Invoice Item Successfully'];
                            return response()->json($response,200);
                        }

                        // --------------------------------------------

                        }
                        else{

                            
                        // ----------------------------
                        $iyt = OrderItem::where('invoice_id', $invoice->id)->orderBy('created_at', 'desc')->first();

                        if (!empty($iyt)) {
                            $iy = $iyt->order_no + 1;
                        } else {
                            $iy = 1;
                        }
                        
                                // if($request->tax_rate == 18){
                                //      $tax_rate = 0.18;
                                //  }else{
                                //       $tax_rate = $request->tax_rate;
                                //  }

                        $d=Items::where('id', $request->item_id)->first();

                        $items23 = array(
                            'type' => 'Bar',
                                  'item_name' => $request->item_id,
                                  'quantity' =>   $request->quantity,
                                    'due_quantity' => $request->quantity,
                                  'tax_rate' =>  $request->tax_rate,
                                  'price' =>  $request->price,
                                  'total_cost' =>  $request->total,
                                  'total_tax' =>   $request->tax,
                                    'items_id' => $request->item_id,
                                     'order_no' => $iy,
                                     'added_by' => $invoice->added_by,
                                  'invoice_id' =>$invoice->id);

                        $pt =  OrderItem::create($items23);;

                        // $inv=Items::where('id',$request->item_id)->first();
                        // $q=$inv->quantity - $request->quantity;
                        // Items::where('id',$request->item_id)->update(['quantity' => $q]);
                
                        //     $loc=Location::where('id',$invoice->location)->first();
                        // $lq['quantity']=$loc->quantity - $request->quantity;
                        // Location::where('id',$invoice->location)->update($lq);

                        

                        if ($pt) {
                            $response=['success'=>true,'error'=>false, 'message' => 'Invoice Created successful'];
                            return response()->json($response, 200);
                        }
                        else
                        {
                                                
                            $response=['success'=>false,'error'=>true,'message'=>'Failed to  Create Invoice Successfully'];
                            return response()->json($response,200);
                        }

                        // --------------------------------------------
                        }


                    }
                        else
                        {
                            
                            $response=['success'=>false,'error'=>true,'message'=>'Purchase Not found'];
                            return response()->json($response,200);
                        }
            }
            else{

                $response=['success'=>false,'error'=>true,'message'=>'Items not found'];
                return response()->json($response,200);
            }
    }
    
    // public function order_items_store(Request $request){
        
    // }
    
   
    
    public function order_receive(int $id){
        
           $invoice  = Order23::find($id);
         
            $data['status']= 5;
    
          $inv =  $invoice->update($data);
          
          
          if($invoice->status == 0){
                    $invoice['status'] = 'Not Approved';
                }
                elseif($invoice->status == 1){
                    $invoice['status'] = 'Not Paid';
                }
                elseif($invoice->status == 2){
                    $invoice['status'] = 'Partially Paid';
                }
                elseif($invoice->status == 3){
                    $invoice['status'] = 'Fully Paid';
                }
                elseif($invoice->status == 4){
                    $invoice['status'] = 'Cancelled';
                }
                elseif($invoice->status == 7){
                    $invoice['status'] = 'Paid';
                }
                elseif($invoice->status == 5){
                    $invoice['status'] = 'Delivered';
                }
          
          if ($inv) {

                               

          $response=['success'=>true,'error'=>false, 'message' => 'Order Delivered successful', 'order' => $invoice];
          return response()->json($response, 200);
        }
         else{
                                                
              $response=['success'=>false,'error'=>true,'message'=>'Failed to  Delivered Order Successfully'];
              return response()->json($response,200);
             }
        
    }
    
    public function order_cancel(int $id){
        
           $invoice  = Order23::find($id);
         
            $data['status']= 4;
    
          $inv =  $invoice->update($data);
          
          if($invoice->status == 0){
                    $invoice['status'] = 'Not Approved';
                }
                elseif($invoice->status == 1){
                    $invoice['status'] = 'Not Paid';
                }
                elseif($invoice->status == 2){
                    $invoice['status'] = 'Partially Paid';
                }
                elseif($invoice->status == 3){
                    $invoice['status'] = 'Fully Paid';
                }
                elseif($invoice->status == 4){
                    $invoice['status'] = 'Cancelled';
                }
                elseif($invoice->status == 7){
                    $invoice['status'] = 'Paid';
                }
                elseif($invoice->status == 5){
                    $invoice['status'] = 'Delivered';
                }
          
          if ($inv) {

          $response=['success'=>true,'error'=>false, 'message' => 'Order Delivered successful', 'order' => $invoice];
          return response()->json($response, 200);
        }
         else{
                                                
              $response=['success'=>false,'error'=>true,'message'=>'Failed to  Delivered Order Successfully'];
              return response()->json($response,200);
             }
        
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
        $invoices =Order::find($id);
        $invoice_items=OrderItem::where('invoice_id',$id)->get();
       return view('restaurant.orders.order_details',compact('invoices','invoice_items'));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       $currency= Currency::all();
        $data=Order::find($id);
        $items=OrderItem::where('invoice_id',$id)->get();
        $type="";

             if($data->user_type == 'Visitor'){
       $user= Visitor::where('status','5')->get(); 
         }
         else if($data->user_type == 'Visitor'){
           $date=date('Y-m-d');
            $user= Member::where('due_date', '>=', $date) ->get();        
                 }

       

       $location=Location::where('added_by',auth()->user()->added_by)->where('main','0')->get();
        $bank_accounts=AccountCodes::where('account_group','Cash And Banks')->get() ;
         $currency= Currency::all();
       return view('restaurant.orders.index',compact('currency','data','id','items','type','location','bank_accounts','user'));

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
       
//dd($request->edit_type);

         if($request->edit_type == 'receive'){
            $invoice  =Order::find($id);
          $data['user_id']=$request->user_id;
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
                   OrderItem::where('id',$remArr[$i])->delete();        
                       }
                   }
               }
    
            if(!empty($nameArr)){
                for($i = 0; $i < count($nameArr); $i++){
                    if(!empty($nameArr[$i])){
                        $cost['invoice_amount'] +=$costArr[$i];
                        $cost['invoice_tax'] +=$taxArr[$i];
    
                        $items = array(
                          'type' => $typeArr[$i],
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
                                OrderItem::where('id',$expArr[$i])->update($items);  
          
          }
          else{
              OrderItem::create($items);   
          }
                      
               
         
  
                    }
                }
                $cost['due_amount'] =  $cost['invoice_amount'] + $cost['invoice_tax'];
               Order::where('id',$id)->update($cost);
            }    
    
            
    
            if(!empty($nameArr)){
                for($i = 0; $i < count($nameArr); $i++){
    
                            if($typeArr[$i] == 'Bar'){
                        $saved=Items::find($savedArr[$i]);
                        
                        $lists= array(
                            'quantity' =>   $qtyArr[$i],
                             'item_id' => $savedArr[$i],
                               'added_by' => auth()->user()->added_by,
                               'client_id' =>   $request->user_id,
                             'invoice_date' =>  $data['invoice_date'],
                             'location' =>    $data['location'],
                            'type' =>   'Sales',
                            'invoice_id' =>$id);
                           
                         InvoiceHistory::create($lists);   
          
                        //$inv=Items::where('id',$nameArr[$i])->first();
                       // $q=$inv->quantity - $qtyArr[$i];
                        //Items::where('id',$nameArr[$i])->update(['quantity' => $q]);

                        $loc=Location::where('id',$data['location'])->first();
                        $cr=$qtyArr[$i]/$saved->bottle;
                        $cq=round($cr, 1);
                        $lq['crate']=$loc->crate - $cq;
                        $lq['bottle']=$loc->bottle - $qtyArr[$i];
                        Location::where('id',$data['location'])->update($lq);
                    }
                }
            
            }    



           if(!empty($nameArr)){
                for($i = 0; $i < count($nameArr); $i++){
                    if(!empty($nameArr[$i])){
    
                        
                        $x_lists= array(
                            'quantity' =>   $qtyArr[$i],
                             'item_id' => $savedArr[$i],
                               'added_by' => auth()->user()->added_by,
                               'user_id' =>   $request->user_id,
                             'invoice_date' =>  $data['invoice_date'],
                             'location' =>    $data['location'],
                            'type' =>   'Sales',
                              'item_type' =>  $typeArr[$i],
                            'invoice_id' =>$id);
                           
                         OrderHistory::create($x_lists);   

                    }
                }
            
            }    
    
           

    
            $inv =Order::find($id);
       
              if($inv->user_type == 'Visitor'){
            $supp=Visitor::find($inv->user_id);
           $user=$supp->first_name ." ". $supp->last_name;
             }

          else if($inv->user_type == 'Member'){
            $supp=Member::find($inv->user_id);
           $user=$supp->full_name ;
             }

            $cr= AccountCodes::where('account_name','Bar Drinking Sales')->first();
            $journal = new JournalEntry();
          $journal->account_id = $cr->id;
          $date = explode('-',$inv->invoice_date);
          $journal->date =   $inv->invoice_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
         $journal->transaction_type ='orders';
          $journal->name = 'Orders';
          $journal->credit = $inv->invoice_amount *  $inv->exchange_rate;
          $journal->income_id= $inv->id;

          if($inv->user_type == 'Visitor'){
            $journal->visitor_id= $inv->user_id;
             }
          else if($inv->user_type == 'Member'){
           $journal->member_id= $inv->user_id;
             }

           $journal->currency_code =  $inv->exchange_code;
          $journal->exchange_rate= $inv->exchange_rate;
          $journal->added_by=auth()->user()->added_by;
             $journal->notes= "Sales for Invoice No " .$inv->reference_no ." to Client ". $user ;
          $journal->save();

        
        if($inv->invoice_tax > 0){
         $tax= AccountCodes::where('account_name','VAT OUT')->first();
            $journal = new JournalEntry();
          $journal->account_id = $tax->id;
          $date = explode('-',$inv->invoice_date);
          $journal->date =   $inv->invoice_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
             $journal->transaction_type = 'orders';
          $journal->name = 'Orders';
          $journal->credit= $inv->invoice_tax *  $inv->exchange_rate;
          $journal->income_id= $inv->id;

          if($inv->user_type == 'Visitor'){
            $journal->visitor_id= $inv->user_id;
             }
          else if($inv->user_type == 'Member'){
           $journal->member_id= $inv->user_id;
             }
           $journal->currency_code =  $inv->exchange_code;
          $journal->exchange_rate= $inv->exchange_rate;
           $journal->added_by=auth()->user()->added_by;
             $journal->notes= "Sales Tax for Invoice No " .$inv->reference_no ." to Client ". $user ;
          $journal->save();
        }
        
          $codes=AccountCodes::where('account_name','Receivables Control')->first();
          $journal = new JournalEntry();
          $journal->account_id = $codes->id;
          $date = explode('-',$inv->invoice_date);
          $journal->date =   $inv->invoice_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
          $journal->transaction_type = 'orders';
          $journal->name = 'Orders';
          $journal->income_id= $inv->id;

        if($inv->user_type == 'Visitor'){
            $journal->visitor_id= $inv->user_id;
             }
          else if($inv->user_type == 'Member'){
           $journal->member_id= $inv->user_id;
             }

          $journal->debit =$inv->due_amount *  $inv->exchange_rate;
          $journal->currency_code =  $inv->exchange_code;
          $journal->exchange_rate= $inv->exchange_rate;
          $journal->added_by=auth()->user()->added_by;
            $journal->notes= "Receivables for Sales Invoice No " .$inv->reference_no ." to Client ". $user ;
          $journal->save();
    



          //invoice payment


          $sales =Order::find($inv->id);
          $method= Payment_methodes::where('name','Cash')->first();
    
          $count=OrderPayments::count();
          $pro=$count+1;

          $receipt['trans_id'] = "TRANS_ORD_".$pro;
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
                   
                  $payment = OrderPayments::create($receipt);
  
                  
  
                 $cr= AccountCodes::where('id',$request->account_id)->first();
            $journal = new JournalEntry();
          $journal->account_id = $request->account_id;
          $date = explode('-',$inv->invoice_date);
          $journal->date =  $inv->invoice_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
         $journal->transaction_type = 'orders_payments';
          $journal->name = 'Orders  Payment';
          $journal->debit = $receipt['amount'] *  $sales->exchange_rate;
          $journal->payment_id= $payment->id;
          if($inv->user_type == 'Visitor'){
            $journal->visitor_id= $inv->user_id;
             }
          else if($inv->user_type == 'Member'){
           $journal->member_id= $inv->user_id;
             }
           $journal->currency_code =   $sales->currency_code;
          $journal->exchange_rate=  $sales->exchange_rate;
            $journal->added_by=auth()->user()->added_by;
             $journal->notes= "Deposit for Sales Invoice No " .$sales->reference_no ." by Client ". $user ;
          $journal->save();
  
  
          $codes= AccountCodes::where('account_name','Receivables Control')->first();
          $journal = new JournalEntry();
          $journal->account_id = $codes->id;
          $date = explode('-',$inv->invoice_date);
          $journal->date =   $inv->invoice_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
            $journal->transaction_type =  'orders_payments';
          $journal->name = 'Orders Payment';
          $journal->credit =$receipt['amount'] *  $sales->exchange_rate;
            $journal->payment_id= $payment->id;
        if($inv->user_type == 'Visitor'){
            $journal->visitor_id= $inv->user_id;
             }
          else if($inv->user_type == 'Member'){
           $journal->member_id= $inv->user_id;
             }
           $journal->currency_code =   $sales->currency_code;
          $journal->exchange_rate=  $sales->exchange_rate;
          $journal->added_by=auth()->user()->added_by;
           $journal->notes= "Clear Receivable for Invoice No  " .$sales->reference_no ." by Client ". $user ;
          $journal->save();
          
  $account= Accounts::where('account_id',$request->account_id)->first();
  
  if(!empty($account)){
  $balance=$account->balance + $payment->amount ;
  $item_to['balance']=$balance;
  $account->update($item_to);
  }
  
  else{
    $cr= AccountCodes::where('id',$request->account_id)->first();
  
       $new['account_id']= $request->account_id;
         $new['account_name']= $cr->account_name;
        $new['balance']= $payment->amount;
         $new[' exchange_code']= $sales->currency_code;
          $new['added_by']=auth()->user()->added_by;
  $balance=$payment->amount;
       Accounts::create($new);
  }
          
     // save into tbl_transaction
  
                               $transaction= Transaction::create([
                                  'module' => 'POS Invoice Payment',
                                   'module_id' => $payment->id,
                                 'account_id' => $request->account_id,
                                  'code_id' => $codes->id,
                                  'name' => 'POS Invoice Payment with reference ' .$payment->trans_id,
                                   'transaction_prefix' => $payment->trans_id,
                                  'type' => 'Income',
                                  'amount' =>$payment->amount ,
                                  'credit' => $payment->amount,
                                   'total_balance' =>$balance,
                                  'date' => date('Y-m-d', strtotime($request->invoice_date)),
                                  'paid_by' => $sales->client_id,
                                  'payment_methods_id' =>$payment->payment_method,
                                     'status' => 'paid' ,
                                  'notes' => 'This deposit is from pos invoice  payment. The Reference is ' .$sales->reference_no .' by Client '. $user  ,
                                  'added_by' =>auth()->user()->added_by,
                              ]);

           Toastr::success('Order Updated Successfully','Success');
        return redirect(route('orders.index'));
    

        }

        else{
        $invoice = Order::find($id);
          $data['user_id']=$request->user_id;
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
                   OrderItem::where('id',$remArr[$i])->delete();        
                       }
                   }
               }
    
            if(!empty($nameArr)){
                for($i = 0; $i < count($nameArr); $i++){
                    if(!empty($nameArr[$i])){
                        $cost['invoice_amount'] +=$costArr[$i];
                        $cost['invoice_tax'] +=$taxArr[$i];
    
                        $items = array(
                          'type' => $typeArr[$i],
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
                                OrderItem::where('id',$expArr[$i])->update($items);  
          
          }
          else{
              OrderItem::create($items);   
          }
                      
                 
  
                    }
                }
                $cost['due_amount'] =  $cost['invoice_amount'] + $cost['invoice_tax'];
                Order::where('id',$id)->update($cost);
            }    
             Toastr::success('Order Updated Successfully','Success');
        return redirect(route('orders.index'));

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

       OrderItem::where('invoice_id', $id)->delete();
       OrderPayments::where('invoice_id', $id)->delete();
       
        $invoices =Order::find($id);
        $invoices->delete();

        Toastr::success('Order Deleted Successfully','Success');
        return redirect(route('orders.index'));
    }


 public function cancel($id)
    {
        //
        $invoice = Order::find($id);
        $data['status'] = 4;
        $invoice->update($data);

        Toastr::success('Cancelled Successfully','Success');
        return redirect(route('orders.index'));
    }
   

    public function receive($id)
    {
        //
        $currency= Currency::all();
        $data=Order::find($id);
        $items=OrderItem::where('invoice_id',$id)->get();
        $type="receive";

             if($data->user_type == 'Visitor'){
       $user= Visitor::where('status','5')->get(); 
         }
         else if($data->user_type == 'Member'){
            $date=date('Y-m-d');
            $user= Member::where('due_date', '>=', $date) ->get(); 
            
                 }

       

       $location=Location::where('added_by',auth()->user()->added_by)->where('main','0')->get();
        $bank_accounts=AccountCodes::where('account_group','Cash And Banks')->get() ;
         $currency= Currency::all();
       return view('restaurant.orders.index',compact('currency','data','id','items','type','location','bank_accounts','user'));
    }


  
    
    public function orders_pdfview(Request $request)
    {
        //
        $invoices =Order::find($request->id);
        $invoice_items=OrderItem::where('invoice_id',$request->id)->get();

        view()->share(['invoices'=>$invoices,'invoice_items'=> $invoice_items]);

        if($request->has('download')){
        $pdf = PDF::loadView('restaurant.orders.order_details_pdf')->setPaper('a4', 'potrait');
         return $pdf->download('ORDER INV NO # ' .  $invoices->reference_no . ".pdf");
        }
       return view('inv_pdfview');
    }

    public function findUser(Request $request)
    {
         if($request->id == 'Visitor'){
       $district= Visitor::where('status','5')->get(); 
         }

         else if($request->id == 'Member'){

          $date=date('Y-m-d');
            $district= Member::where('due_date', '>=', $date) ->get(); 
        
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
         if($request->type == 'Bar'){
       $price= Items::where('id',$request->id)->get(); 
         }

         else if($request->type == 'Kitchen'){

           $price=Menu::where('id',$request->id)->get(); 
        
                 }
                                                                                          
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

 
}
