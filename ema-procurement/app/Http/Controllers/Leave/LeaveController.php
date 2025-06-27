<?php

namespace App\Http\Controllers\Leave;

use App\Http\Controllers\Controller;
use App\Models\Accounting\AccountCodes;
use App\Models\Leave\Leave;
use App\Models\Leave\LeaveCategory;
use App\Models\Accounting\JournalEntry;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Expenses;
use Brian2694\Toastr\Facades\Toastr;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = LeaveCategory::all(); 
        $staff=User::where('disabled','0')->whereNull('member_id')->whereNull('visitor_id')->get();   
        $leave = Leave::all();    
        $bank_accounts=AccountCodes::where('account_group','Cash And Banks')->where('added_by',auth()->user()->added_by)->get();
        return view('leave.leave',compact('category','staff','leave','bank_accounts'));
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
        $data = $request->all();
        $data['added_by']=auth()->user()->id;
        $data['application_status']='1';
        
         $start = strtotime($request->leave_start_date);
          if(!empty($request->leave_end_date)){
          $end = strtotime($request->leave_start_date);
           $days_between = ceil(abs($end - $start) / 86400);
          }
          else{
          $days_between = 1;
          }

      $data['days'] = $days_between;



        if ($request->hasFile('attachment')) {
                    $file=$request->file('attachment');
                    $fileType=$file->getClientOriginalExtension();
                    $fileName=rand(1,1000).date('dmyhis').".".$fileType;
                    $name=$fileName;
                    $path = public_path(). "/assets/files/leave";
                    $file->move($path, $fileName );
                    
                    $data['attachment'] = $name;
                }else{
                        $data['attachment'] = null;
                }


        $leave= Leave::create($data);


      
       Toastr::success('Created Successfully','Success');
        return redirect(route('leave.index'));
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

    public function discountModal(Request $request)
    {
               
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
        $data =  Leave::find($id);
         $category = LeaveCategory::all(); 
        $staff=User::where('disabled','0')->whereNull('member_id')->whereNull('visitor_id')->get();     
         $bank_accounts=AccountCodes::where('account_group','Cash And Banks')->where('added_by',auth()->user()->added_by)->get();
        return view('leave.leave',compact('category','staff','data','id','bank_accounts'));
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
        $leave=  Leave::find($id);

   $data = $request->all();
      $data['added_by']=auth()->user()->id;

        if ($request->hasFile('attachment')) {
                    $file=$request->file('attachment');
                    $fileType=$file->getClientOriginalExtension();
                    $fileName=rand(1,1000).date('dmyhis').".".$fileType;
                    $name=$fileName;
                    $path = public_path(). "/assets/files/leave";
                    $file->move($path, $fileName );
                    
                    $data['attachment'] = $name;
                }else{
                        $data['attachment'] = null;
                }

                
         $start = strtotime($request->leave_start_date);
          if(!empty($request->leave_end_date)){
          $end = strtotime($request->leave_start_date);
           $days_between = ceil(abs($end - $start) / 86400);
          }
          else{
          $days_between = 1;
          }

      $data['days'] = $days_between;

        $leave->update($data);
        
        
      Toastr::success('Updated Successfully','Success');
        return redirect(route('leave.index'));

       
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
        $leave=  Leave::find($id);
        $leave->delete();
        
          Toastr::success('Deleted Successfully','Success');
        return redirect(route('leave.index'));
    }

    public function category(Request $request)
    {
        //
        $data = $request->all();
        $data['added_by']=auth()->user()->id;
        $category =LeaveCategory::create($data);
       
       if ($request->ajax()) {

            return response()->json($category);
       }
    }
    
     public function findDays(Request $request)
    {
        //
          $start = strtotime($request->id);
          if(!empty($request->date)){
          $end = strtotime($request->date);
           $days_between = ceil(abs($end - $start) / 86400);
          }
          else{
          $days_between = 1;
          }
         
          
          //dd($days_between);
          
          $start_year=date('Y-m-d', strtotime('first day of january this year'));
           $end_year=date('Y-m-d', strtotime('last day of december this year'));
            
        $category =LeaveCategory::find($request->category);
        if(strtolower($category->leave_category) == 'annual leave'){
           $user=User::find($request->user);
           
           if($user->leave_balance < $days_between ){
              $data='You have exceeded your days of leave. You are left with '.  $user->leave_balance.' days';  
           }
           
           else{
             $data='';    
           }
           
        }
        
        else{
             if($category->limitation == 'Yes'){
                 
        $leave= Leave::where('staff_id',$request->user)->where('leave_category_id',$request->category)->where('application_status',2)->whereBetween('leave_start_date',[$start_year,$end_year])->whereBetween('leave_end_date',[$start_year,$end_year])->sum('days');
        
        
       
 
            
             $balance= $category->days - $leave ;
             
              if($balance < $days_between ){
              $data='You have exceeded your days of leave. You are left with '.  $balance.' days';  
           }
           
           else{
             $data='';    
           }
             
             
             }
             
             else{
                $data='';    
             }
        }
       
   
   
   
   
            return response()->json($data);
       
    }
    
    
      public function findPaid(Request $request)
    {
        //
        $category =LeaveCategory::find($request->id);
        if($category->paid == 'Yes'){
            $data='Yes';
        }
       
    else{
          $data='';
    }
            return response()->json($data);
       
    }


    public function approve($id)
    {
        //
        $leave = Leave::find($id);
        $data['application_status'] = 2;
    $data['approve_by'] = auth()->user()->id;;
        $leave->update($data);
        
        
          $user=User::find($leave->staff_id);
        
          $category =LeaveCategory::find($leave->leave_category_id);
        if(strtolower($category->leave_category) == 'annual leave'){
            
              $start = strtotime($leave->leave_start_date);
          if(!empty($leave->leave_end_date)){
          $end = strtotime($leave->leave_end_date);
           $days_between = ceil(abs($end - $start) / 86400);
          }
          else{
          $days_between = 1;
          }
          
          $balance=$user->leave_balance - $days_between;
             User::find($leave->staff_id)->update(['leave_balance' =>$balance ]); 
        }
        
        
        if(!empty($leave->amount)){
           
            
             if($leave->pay_type == 'Cash'){
                 
            $cr= AccountCodes::where('account_name','Leave passage assistance')->where('added_by', auth()->user()->added_by)->first();
            $journal = new JournalEntry();
          $journal->account_id = $cr->id;
          $date = explode('-',$leave->leave_start_date);
          $journal->date =   $leave->leave_start_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
          $journal->transaction_type = 'leave';
          $journal->name = 'Leave';
          $journal->debit = $leave->amount;
          $journal->income_id= $leave->id;
           $journal->user_id= $leave->staff_id;
          $journal->added_by=auth()->user()->added_by;
           $journal->notes= "Leave on Cash to user  ". $user->name ;
          $journal->save();
          
           $journal = new JournalEntry();
           $codes= AccountCodes::where('account_name','Staff Leave')->where('added_by', auth()->user()->added_by)->first();
          $journal->account_id =$codes->id;
         $date = explode('-',$leave->leave_start_date);
          $journal->date =   $leave->leave_start_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
          $journal->transaction_type = 'leave';
          $journal->name = 'Leave';
          $journal->credit = $leave->amount;
          $journal->income_id= $leave->id;
           $journal->user_id= $leave->staff_id;
          $journal->added_by=auth()->user()->added_by;
           $journal->notes= "Leave on Cash to user  ". $user->name ;
          $journal->save();
          
          
           $journal = new JournalEntry();
          $codes= AccountCodes::where('account_name','Staff Leave')->where('added_by', auth()->user()->added_by)->first();
          $journal->account_id =$codes->id;
         $date = explode('-',$leave->leave_start_date);
          $journal->date =   $leave->leave_start_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
          $journal->transaction_type = 'leave';
          $journal->name = 'Paid Leave';
          $journal->debit = $leave->amount;
          $journal->income_id= $leave->id;
           $journal->user_id= $leave->staff_id;
          $journal->added_by=auth()->user()->added_by;
           $journal->notes= "Paid Leave on Cash to user  ". $user->name ;
          $journal->save();
        

          $journal = new JournalEntry();
          $journal->account_id =$leave->bank_id;
         $date = explode('-',$leave->leave_start_date);
          $journal->date =   $leave->leave_start_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
          $journal->transaction_type = 'leave';
          $journal->name = 'Paid Leave';
          $journal->credit = $leave->amount;
          $journal->income_id= $leave->id;
           $journal->user_id= $leave->staff_id;
          $journal->added_by=auth()->user()->added_by;
           $journal->notes= "Paid Leave on Cash to user  ". $user->name ;
          $journal->save();
    
            
        }
        
        else{
            
             $cr= AccountCodes::where('account_name','Leave passage assistance')->where('added_by', auth()->user()->added_by)->first();
            $journal = new JournalEntry();
          $journal->account_id = $cr->id;
          $date = explode('-',$leave->leave_start_date);
          $journal->date =   $leave->leave_start_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
          $journal->transaction_type = 'leave';
          $journal->name = 'Leave';
          $journal->debit = $leave->amount;
          $journal->income_id= $leave->id;
           $journal->user_id= $leave->staff_id;
          $journal->added_by=auth()->user()->added_by;
           $journal->notes= "Leave on Cash to user  ". $user->name ;
          $journal->save();
          
           $journal = new JournalEntry();
           $codes= AccountCodes::where('account_name','Staff Leave')->where('added_by', auth()->user()->added_by)->first();
          $journal->account_id =$codes->id;
         $date = explode('-',$leave->leave_start_date);
          $journal->date =   $leave->leave_start_date ;
          $journal->year = $date[0];
          $journal->month = $date[1];
          $journal->transaction_type = 'leave';
          $journal->name = 'Leave';
          $journal->credit = $leave->amount;
          $journal->income_id= $leave->id;
           $journal->user_id= $leave->staff_id;
          $journal->added_by=auth()->user()->added_by;
           $journal->notes= "Leave on Cash to user  ". $user->name ;
          $journal->save();
          
            
        }
        
        
        }    
        
        
        Toastr::success('Approved Successfully','Success');
        return redirect(route('leave.index'));
    }

     public function reject($id)
    {
        //
        $leave = Leave::find($id);
        $data['application_status'] = 3;
        $leave->update($data);
        
        Toastr::success('Rejected Successfully','Success');
        return redirect(route('leave.index'));
    }

}
