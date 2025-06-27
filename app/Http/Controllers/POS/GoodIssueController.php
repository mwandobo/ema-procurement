<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use App\Models\Accounting\AccountCodes;
use App\Models\Accounting\JournalEntry;
use App\Models\Inventory\FieldStaff;
use App\Models\User;
use App\Models\POS\GoodIssue;
use App\Models\POS\GoodIssueItem;
use App\Models\Inventory\Location;
use App\Models\POS\Items;
use App\Models\POS\Activity;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class GoodIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $issue= GoodIssue::where('added_by',auth()->user()->added_by)->get();;
        $location=Location::where('main','0')->get();
        $inventory= Items::all();;
        //$staff=FieldStaff::where('added_by',auth()->user()->added_by)->get();;
         $staff= User::whereNull('member_id')->whereNull('visitor_id')->where('disabled',0)->get();;
       return view('pos.purchases.good_issue',compact('issue','inventory','location','staff'));
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
        $data['date']=$request->date;
         $data['name']=$request->name;
        $data['staff']=$request->staff;
        $data['status']= 0;
        $data['added_by']= auth()->user()->added_by;

        $issue = GoodIssue::create($data);
        
       

        $nameArr =$request->item_id ;
        $qtyArr =$request->quantity ;

        if(!empty($nameArr)){
            for($i = 0; $i < count($nameArr); $i++){
                if(!empty($nameArr[$i])){


                    $items = array(
                        'item_id' => $nameArr[$i],
                        'status' => 0,
                         'date'=>$request->date,
                        'quantity' =>    $qtyArr[$i],
                           'order_no' => $i,
                           'added_by' => auth()->user()->added_by,
                        'issue_id' =>$issue->id);

                    
                   GoodIssueItem::create($items);

                   $loc=User::find($request->staff);
                  $itm=Items::find($nameArr[$i]);

               if(!empty($issue)){
                    $activity =Activity::create(
                        [ 
                             'added_by'=>auth()->user()->added_by,
 'user_id'=>auth()->user()->id,
                            'module_id'=>$issue->id,
                             'module'=>'Good Issue',
                            'activity'=>"Good issue for ".$itm->name . " to  " .$loc->name ." is Created",
                        ]
                        );                      
       }

    
                }
            }
           
        }    


        Toastr::success('Good Issue Created Successfully','Success');
        return redirect(route('pos_issue.index'));
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
        $data=GoodIssue::find($id);
        $location=Location::where('main','0')->get();
        $inventory= Items::all();;
        //$staff=FieldStaff::where('added_by',auth()->user()->added_by)->get();;
         $staff= User::whereNull('member_id')->whereNull('visitor_id')->where('disabled',0)->get();;
        $items=GoodIssueItem::where('issue_id',$id)->get();
       return view('pos.purchases.good_issue',compact('items','inventory','location','staff','data','id'));
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

        $issue=GoodIssue::find($id);

        $data['date']=$request->date;  
       $data['name']=$request->name;
        $data['staff']=$request->staff;
        $data['added_by']= auth()->user()->added_by;
        $issue->update($data);
        
       
        $nameArr =$request->item_id ;
        $qtyArr =$request->quantity ;
        $remArr = $request->removed_id ;
        $expArr = $request->saved_id ;




           
        if (!empty($remArr)) {
            for($i = 0; $i < count($remArr); $i++){
               if(!empty($remArr[$i])){        
               GoodIssueItem::where('id',$remArr[$i])->delete();   
                            
                   }
               }
           }

           



        if(!empty($nameArr)){
            for($i = 0; $i < count($nameArr); $i++){
                if(!empty($nameArr[$i])){


                    $items = array(
                        'item_id' => $nameArr[$i],
                        'date'=>$request->date,
                        'quantity' =>    $qtyArr[$i],
                           'order_no' => $i,
                           'added_by' => auth()->user()->added_by,
                        'issue_id' =>$id);
                       
                    
                   
                            if(!empty($expArr[$i])){
                                GoodIssueItem::where('id',$expArr[$i])->update($items);                              
                             }
                          else{
                         GoodIssueItem::create($items);  
                       
                          }                         
                     
                $loc=User::find($request->staff);
                  $itm=Items::find($nameArr[$i]);

               if(!empty($issue)){
                    $activity =Activity::create(
                        [ 
                             'added_by'=>auth()->user()->added_by,
 'user_id'=>auth()->user()->id,
                            'module_id'=>$issue->id,
                             'module'=>'Good Issue',
                            'activity'=>"Good issue for ".$itm->name . " to  " .$loc->name ." is Updated",
                        ]
                        );                      
       }

    
                }
            }
           
        }    

        Toastr::success('Good Issue Updated Successfully','Success');
        return redirect(route('pos_issue.index'));
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
        GoodIssueItem::where('issue_id', $id)->delete();

        $issue =  GoodIssue::find($id);

          $items= GoodIssueItem::where('issue_id',$id)->get();
          foreach($items as $i){
                  $loc=User::find($issue->staff);
                  $itm=Items::find($i->item_id);

               if(!empty($issue)){
                    $activity =Activity::create(
                        [ 
                             'added_by'=>auth()->user()->added_by,
 'user_id'=>auth()->user()->id,
                            'module_id'=>$id,
                             'module'=>'Good Issue',
                            'activity'=>"Good issue for ".$itm->name . " to  " .$loc->name ." is Deleted",
                        ]
                        );                      
       }
}

        $issue->delete();

        Toastr::success('Good Issue Deleted Successfully','Success');
        return redirect(route('good_issue.index'));
    }

    public function approve($id){
        //
 $item=GoodIssueItem::where('issue_id',$id)->get();
 $total=0;

foreach($item as $i){

$issue=GoodIssue::find($id);


 $inv=Items::where('id',$i->item_id)->first();
 $q=$inv->quantity - $i->quantity;
Items::where('id',$i->item_id)->update(['quantity' => $q]);


$total= $inv->cost_price *  $i->quantity;


 $loc=User::find($issue->staff);
               if(!empty($issue)){
                    $activity =Activity::create(
                        [ 
                             'added_by'=>auth()->user()->added_by,
 'user_id'=>auth()->user()->id,
                            'module_id'=>$id,
                             'module'=>'Good Issue',
                            'activity'=>"Good issue for ".$inv->name . " to  " .$loc->name ." is Approved",
                        ]
                        );                      
       }


  $d=$issue->date;

  $codes= AccountCodes::where('id',$inv->cost_id)->first();
  $journal = new JournalEntry();
  $journal->account_id = $codes->id;
   $date = explode('-',$d);
  $journal->date =   $d ;
  $journal->year = $date[0];
  $journal->month = $date[1];
  $journal->transaction_type = 'pos_inventory_issue';
  $journal->name = 'POS Good Issue of Inventory ';
  $journal->income_id= $id;
  $journal->debit =$total;
 $journal->added_by=auth()->user()->added_by;
$journal->notes="POS Inventory ".$inv->name . " issued to  " .$loc->name ;
  $journal->save();

  $cr= AccountCodes::where('id',$inv->stock_id)->first();
  $journal = new JournalEntry();
  $journal->account_id = $cr->id;
  $date = explode('-',$d);
  $journal->date =   $d ;
  $journal->year = $date[0];
  $journal->month = $date[1];
  $journal->transaction_type = 'pos_inventory_issue';
  $journal->name = 'POS Good Issue of Inventory ';
  $journal->income_id= $id;
    $journal->credit = $total;
 $journal->added_by=auth()->user()->added_by;
 $journal->notes="POS Inventory ".$inv->name . " issued to  " .$loc->name ;
  $journal->save();


}



 

GoodIssue::where('id',$id)->update(['status' => '1']);;
GoodIssueItem::where('issue_id',$id)->update(['status' => '1']);;

       Toastr::success('Good Issue Approved Successfully','Success');
        return redirect(route('pos_issue.index'));
    }


    public function findQuantity(Request $request)
    {
 
$item=$request->item;


$item_info=Items::where('id', $item)->first();  
 if ($item_info->quantity > 0) {

if($request->id >  $item_info->quantity){
$price="You have exceeded your Stock. Choose quantity between 1.00 and ".  $item_info->quantity ;
}
else if($request->id <=  0){
$price="Choose quantity between 1.00 and ".  $item_info->quantity ;
}
else{
$price='' ;
 }

}

else{
$price="Your Stock Balance is Zero." ;

}

                return response()->json($price);                      
 
    }

    public function findService(Request $request)
    {

 switch ($request->id) {
        case 'Service':
              $type_id= Service::where('status','=','0')->get();                                                                                    
               return response()->json($type_id);
                      
            break;

       case 'Maintenance':
           $type_id= Maintainance::where('status','=','0')->get(); 
                return response()->json($type_id);
                      
            break;

    

    }

}
    

public function discountModal(Request $request)
{
             $id=$request->id;
             $type = $request->type;
              if($type == 'issue'){
                $data=GoodIssueItem::where('issue_id',$id)->get();
                return view('pos.purchases.view_issue',compact('id','data'));
  }

             }

}
