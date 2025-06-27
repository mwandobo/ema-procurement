<?php

namespace App\Http\Controllers\Bar\POS;

use App\Http\Controllers\Controller;
use App\Models\AccountCodes;
use App\Models\Currency;
use App\Models\Inventory;
use App\Models\InventoryHistory;
use App\Models\Bar\POS\InvoicePayments;
use App\Models\Bar\POS\InvoiceHistory;
use App\Models\Bar\POS\PurchaseHistory;
use App\Models\Bar\POS\Items;
use App\Models\JournalEntry;
use App\Models\Inventory\Location;
use App\Models\Payment_methodes;
//use App\Models\invoice_items;
use App\Models\Client;
use App\Models\InventoryList;
use App\Models\ServiceType;
use App\Models\Bar\POS\Invoice;
use App\Models\Bar\POS\InvoiceItems;
use App\Models\Bar\POS\Activity;
use App\Models\restaurant\Menu;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\ButtonsServiceProvider;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;


use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function __construct()
    {
        $this->middleware('auth');
    }


 public function crate_report(Request $request)
    {
       
 $location = Location::where('locations.added_by',auth()->user()->added_by)->get()  ;
   
                        if(!empty($location[0])){                      
                         foreach($location as $loc){
                          $x[]=$loc->id;
                        
                            }
                            }
                            
                            else{
                                 $x[]='';  
                            }
                            
        $start_date = $request->start_date;
        $end_date = $request->end_date;  
        $location_id = $request->location_id; 

        $z[]=$location_id;   
        
        $a=  trim(json_encode($x), '[]'); 
                  if($location_id == $a){
                     $loc_id=$x;
                 }
                 
                 else{
                     
                  $loc_id=$z;    
                 }
                 
                 
        
       $data=[];
        
             
       if ($request->ajax()) {
           
        $added_by = auth()->user()->added_by;
        
       $rowDatampya = "SELECT store_pos_items.id as id,store_pos_items.name,
       (SELECT (SELECT coalesce(SUM(quantity), 0)  FROM `store_pos_purchases_history` WHERE store_pos_items.id=store_pos_purchases_history.item_id AND type='Purchases' AND purchase_date < '".$start_date."' AND location IN ($location_id)) - (SELECT coalesce(SUM(quantity), 0)  FROM `store_pos_purchases_history` WHERE store_pos_items.id=store_pos_purchases_history.item_id AND type='Debit Note' AND purchase_date < '".$start_date."' AND location IN ($location_id)) ) AS open_pur_qty,
       (SELECT COALESCE(SUM(store_pos_good_issues_items.quantity),0) FROM store_pos_good_issues_items WHERE store_pos_items.id=store_pos_good_issues_items.item_id AND store_pos_good_issues_items.date <'".$start_date."'  AND store_pos_good_issues_items.status ='1'  AND store_pos_good_issues_items.location IN ($location_id)) AS open_issue_in,
       (SELECT COALESCE(SUM(store_pos_good_issues_items.quantity),0) FROM store_pos_good_issues_items WHERE store_pos_items.id=store_pos_good_issues_items.item_id AND store_pos_good_issues_items.date < '".$start_date."' AND store_pos_good_issues_items.status ='1'  AND store_pos_good_issues_items.start IN ($location_id)) AS open_issue_out,
       (SELECT COALESCE (SUM(quantity), 0)  FROM `store_pos_purchases_history` WHERE store_pos_items.id=store_pos_purchases_history.item_id AND type='Purchases' AND purchase_date BETWEEN '".$start_date."' AND '".$end_date."' AND location IN ($location_id)) AS pur_qty,
       (SELECT COALESCE(SUM(quantity), 0)  FROM `store_pos_purchases_history` WHERE store_pos_items.id=store_pos_purchases_history.item_id AND type='Debit Note' AND purchase_date BETWEEN '".$start_date."' AND '".$end_date."' AND location IN ($location_id)) AS dn_qty,
       (SELECT COALESCE(SUM(store_pos_good_issues_items.quantity),0) FROM store_pos_good_issues_items WHERE store_pos_items.id=store_pos_good_issues_items.item_id AND store_pos_good_issues_items.date BETWEEN '".$start_date."' AND '".$end_date."' AND store_pos_good_issues_items.status ='1'  AND store_pos_good_issues_items.location IN ($location_id)) AS issue_in,
       (SELECT COALESCE(SUM(store_pos_good_issues_items.quantity),0) FROM store_pos_good_issues_items WHERE store_pos_items.id=store_pos_good_issues_items.item_id AND store_pos_good_issues_items.date BETWEEN '".$start_date."' AND '".$end_date."' AND store_pos_good_issues_items.status ='1'  AND store_pos_good_issues_items.start IN ($location_id)) AS issue_out
        FROM `store_pos_items` WHERE added_by = '".$added_by."' ";
        
        
        $data = DB::select($rowDatampya);
 
                
        $dt =  Datatables::of($data);
             
        $dt = $dt->editColumn('name', function ($row) {
                
                       
                    $name= $row->name ; 
                    return $name;
               
           
            });
                    
        $dt = $dt->editColumn('open', function ($row){
                        
        return '<a href="#"   class="item" data-id = "'.$row->id.'" data-type="open_qty" data-toggle="modal" data-target="#viewModal">'.number_format(($row->open_pur_qty + $row->open_issue_in ) - $row->open_issue_out  ,2).'</a>';
        });
        
       $dt = $dt->editColumn('in', function ($row){
        return '<a href="#"   class="item" data-id = "'.$row->id.'" data-type="in_qty" data-toggle="modal" data-target="#viewModal">'.number_format($row->pur_qty + $row->issue_in,2).'</a>';
       });
        $dt = $dt->editColumn('out', function ($row) {
           return '<a href="#" class="item"  data-id = "'.$row->id.'" data-type="out_qty" data-toggle="modal" data-target="#viewModal">'.number_format($row->dn_qty + $row->issue_out,2).'</a>';
       });
       
      
         $dt = $dt->editColumn('balance', function ($row) {
             $open=($row->open_pur_qty + $row->open_issue_in ) - $row->open_issue_out;
             $in=$row->pur_qty + $row->issue_in;
             $out=$row->dn_qty + $row->issue_out;
            return number_format(($open + $in) - $out ,2);
       });

       $dt = $dt->rawColumns(['open','in','out','balance']);
        return $dt->make(true);
        }
     

        return view('bar.pos.report.report_by_date',
            compact('data','start_date','end_date','location','x','z','location_id'));
    
    }


    public function bottle_report(Request $request)
    {
       
 $start_date = $request->start_date;
        $end_date = $request->end_date; 
        $location_id = $request->location_id;
        
        $location = Location::where('added_by',auth()->user()->added_by)->get()  ;
         
          if(!empty($location[0])){                      
         
         foreach($location as $loc){
          $x[]=$loc->id;
        
   
}
}

else{
     $x[]='';  
}
 
 $z[]=$location_id;
 
  $a=  trim(json_encode($x), '[]'); 
                  if($location_id == $a){
                     $loc_id=$x;
                 }
                 
                 else{
                     
                  $loc_id=$z;    
                 }
                 
                 
                 
       
        
       $data=[];
        
             
       if ($request->ajax()) {
           
        $added_by = auth()->user()->added_by;
        
        $rowDatampya = "SELECT store_pos_invoices_history.item_id as id,store_pos_items.name , SUM(store_pos_invoices_history.quantity) AS total_qty
                       FROM `store_pos_invoices_history` JOIN store_pos_items ON store_pos_items.id=store_pos_invoices_history.item_id  
                        WHERE store_pos_invoices_history.invoice_date BETWEEN '".$start_date."' AND '".$end_date."' AND store_pos_invoices_history.location IN ($location_id) GROUP by store_pos_invoices_history.item_id ";
        
        $data = DB::select($rowDatampya);
 
                
        $dt =  Datatables::of($data);
             
        $dt = $dt->editColumn('name', function ($row) {
                
                       
                    $name= $row->name ; 

                    return '<a href="#"   class="item" data-id = "'.$row->id.'" data-type="drink_sales" data-toggle="modal" data-target="#viewModal">'.$name.'</a>';
               
           
            });
                    
        $dt = $dt->editColumn('qty', function ($row){
                        
        return number_format($row->total_qty,2);
        });
        


       $dt = $dt->rawColumns(['name']);
        return $dt->make(true);
        }
     
     
     

        return view('bar.pos.report.drink_sales',
            compact('data','start_date','end_date','location','x','z','location_id'));
    
    }
    
    
    
    
    public function stock_movement_report(Request $request)
    {
       
$start_date = $request->start_date;
        $end_date = $request->end_date; 
        $location_id = $request->location_id;
        
        $location = Location::where('added_by',auth()->user()->added_by)->get()  ;
         
          if(!empty($location[0])){                      
         
         foreach($location as $loc){
          $x[]=$loc->id;
        
   
}
}

else{
     $x[]='';  
}
 
 $z[]=$location_id;
 
  $a=  trim(json_encode($x), '[]'); 
                  if($location_id == $a){
                     $loc_id=$x;
                 }
                 
                 else{
                     
                  $loc_id=$z;    
                 }
                 
                 
                 
       
        
       $data=[];
        
             
       if ($request->ajax()) {
           
        $added_by = auth()->user()->added_by;
        
        $rowDatampya = "SELECT store_pos_good_issues_items.item_id as id,store_pos_items.name , SUM(store_pos_good_issues_items.quantity) AS total_qty
                       FROM `store_pos_good_issues_items` JOIN store_pos_items ON store_pos_items.id=store_pos_good_issues_items.item_id  
                        WHERE store_pos_good_issues_items.date BETWEEN '".$start_date."' AND '".$end_date."' AND store_pos_good_issues_items.location IN ($location_id) GROUP by store_pos_good_issues_items.item_id ";
        
        $data = DB::select($rowDatampya);
 
                
        $dt =  Datatables::of($data);
             
        $dt = $dt->editColumn('name', function ($row) {
                
                       
                    $name= $row->name ; 

                    return '<a href="#"   class="item" data-id = "'.$row->id.'" data-type="movement_qty" data-toggle="modal" data-target="#viewModal">'.$name.'</a>';
               
           
            });
                    
        $dt = $dt->editColumn('qty', function ($row){
                        
        return number_format($row->total_qty,2);
        });
        


       $dt = $dt->rawColumns(['name']);
        return $dt->make(true);
        }
     
     
     
     

        return view('bar.pos.report.stock_movement_report',
            compact('data','start_date','end_date','location','x','z','location_id'));
    
    }





     public function kitchen_report(Request $request)
    {
    
     $start_date = $request->start_date;
        $end_date = $request->end_date;  
$data=Menu::all();

     

        return view('bar.pos.report.kitchen_report',
          compact('data','start_date','end_date'));
    
    }

    
public function purchase_report(Request $request)
    {
       
$data=Items::all();
     

        return view('bar.pos.report.purchase_report',
            compact('data'));
    
    }

public function sales_report(Request $request)
    {
       
$data=Items::all();
     

        return view('bar.pos.report.sales_report',
            compact('data'));
    
    }
public function balance_report(Request $request)
    {
       
$data=Items::all();
     

        return view('bar.pos.report.balance_report',
            compact('data'));
    
    }
    
    
    
    public function discountModal(Request $request)
    {

         $id=$request->id;
         $type = $request->type;
         $start_date = $request->start_date;
         $end_date = $request->end_date;  
         $location_id = $request->loc_id;
         $added_by=auth()->user()->added_by;
         
         
       
    $location=Location::where('added_by',auth()->user()->added_by)->get()  ;
   
                        if(!empty($location[0])){                      
                         foreach($location as $loc){
                          $x[]=$loc->id;
                        
                            }
                            }
                            
                            else{
                                 $x[]='';  
                            }


        $z[]=$location_id;   
        
        $a=  trim(json_encode($x), '[]'); 
                  if($location_id == $a){
                     $loc_id=$x;
                 }
                 
                 else{
                     
                  $loc_id=$z;    
                 }

//dd($type);
          switch ($type) {      
          case 'open_qty':
          $key=Items::find($id); 
          return view('bar.pos.report.modal.open_qty',compact('id','start_date','end_date','loc_id','key'));
                    break;
          case 'pur_qty':
          $key=Items::find($id);      
          return view('bar.pos.report.modal.pur_qty',compact('id','start_date','end_date','loc_id','key'));
                    break;
                    
          $key=Items::find($id);   
          return view('bar.pos.report.modal.sales_drink',compact('id','start_date','end_date','loc_id','key'));
                    break;         
                    
          case 'drink_sales':
          $key=Items::find($id);      
          return view('bar.pos.report.modal.drink_sales',compact('id','start_date','end_date','loc_id','key'));
                    break;  
                    

           case 'in_qty':
          $key=Items::find($id); 
          return view('bar.pos.report.modal.in_qty',compact('id','start_date','end_date','loc_id','key'));
                    break;
          case 'out_qty':
          $key=Items::find($id);  
          return view('bar.pos.report.modal.out_qty',compact('id','start_date','end_date','loc_id','key'));
                    break; 
                 
                     case 'movement_qty':
          $key=Items::find($id);      
          return view('bar.pos.report.modal.movement_qty',compact('id','start_date','end_date','loc_id','key'));
                    break; 
                   
                    
                                   
     

 default:
             break;

            }

                       }

    

   
public function summary(Request $request)
    {
        //

    $all_employee=User::where('added_by',auth()->user()->added_by)->get();

 $search_type = $request->search_type;
 $check_existing_payment='';
$start_date='';
$end_date='';
$by_month='';
$user_id='';
$flag = $request->flag;

 

if (!empty($flag)) {
            if ($search_type == 'employee') {
             $user_id = $request->user_id;
             $check_existing_payment =Activity::where('user_id', $user_id)->get();
            }
          
            else if ($search_type == 'period') {
              $start_date = $request->start_date;
              $end_date= $request->end_date;
             $check_existing_payment = Activity::all()->where('added_by',auth()->user()->added_by)->whereBetween('date',[$start_date,$end_date]);
            }
           elseif ($search_type == 'activities') {
             $check_existing_payment =Activity::where('added_by',auth()->user()->added_by)->get();
            }
}
else{
 $check_existing_payment='';
$start_month='';
$end_month='';
$search_type='';
$by_month='';
$user_id='';
        }

 

 return view('bar.pos.report.activity',compact('all_employee','check_existing_payment','start_date','end_date','search_type','user_id','flag'));
    }

}
