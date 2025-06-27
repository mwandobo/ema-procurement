<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payments\Payment_methodes;
use App\Models\Member\Member;
use App\Models\Member\MemberTransaction;
use App\Models\Member\MembershipFee;
use App\Models\Member\MembershipPayment;
use App\Models\Member\MembershipType;
use App\Models\Member\MembershipPaymentType;
use App\Models\Country;
use App\Models\Member\Charge;
use App\Models\Member\DueDate;
use App\Models\Cards\Cards;
use App\Models\Cards\CardAssignment;
use App\Models\Cards\Deposit;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Member\Dependant;
use App\Models\Accounting\AccountCodes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use DB;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\ButtonsServiceProvider;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ManageMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $members = Member::all()->where('status',0)->where('disabled',0);

        return view('members.manage_member',compact('members'));
    }

    public function member_list()
    {
        //
        $list= Member::all()->where('disabled',0)->whereNotNull('member_id');
     $membership_type = MembershipType::all();
         $country=Country::all(); 
         $corp= MembershipType::where('name','CORPORATE MEMBER')->first();
         $members = Member::where('membership_class', 1)->where('disabled',0)->get();
         
         $non_member_ids = Member::all()->where('disabled',0)->whereNull('member_id');

        return view('members.member_list',compact('list','membership_type','country', 'members','corp', 'non_member_ids'));
    }
    
     public function member_deposit_list()
    {
        //
        $list= Member::all()->where('disabled',0)->whereNotNull('member_id');
    

        return view('members.member_deposit',compact('list'));
    }
    
    public function updateMemberId(Request $request, $id)
    {
        //

         $member = Member::find($id);
         
         if(!empty($member)){
             
             $member_id_exst = Member::where('member_id', $request->member_id)->first();
             
             if(empty($member_id_exst)){
                 
                 $data['member_id']=$request->member_id;

                 $member_updt = $member->update($data);
                 
                if($member_updt){
                    
                     $user_data['email'] = $request->member_id;
                     $user_data['password'] =  Hash::make($request->member_id);
                     $user_data['is_active'] = 1;
                     
                    User::where('member_id',$member->id)->update($user_data);

                    Toastr::success('Member ID Issued Successfully','Success');
                    return redirect(route('member_list'));
                }
                else{
                 return redirect()->back()->with(['error'=>'Failed Check Your Internet Connection']);   
                }
                
             }
             else{
                 return redirect()->back()->with(['error'=>'Member ID Entered Exists']);
             }
             
             
             
         }
         else{
             
             return redirect()->back()->with(['error'=>'No Member Found By that id on Members table']);
         }
        
        
              

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
        $data = Member::find($id);
      $dep=Dependant::where('member_id',$id)->where('disabled',0)->count();
        $payment = MembershipPayment::all()->where('member_id',$id);
      $deposit = Deposit::all()->where('member_id',$id);
        return view('members.member_details',compact('data','dep','payment','deposit'));
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
        
        $member = Member::find($id);
        $membership_fee = Charge::where('membership_type',$member->membership_class)->get()->first();
         $development_fee = $membership_fee->development_fee;
         $subscription_fee = $membership_fee->subscription_fee;

         $data['member_id'] = $id;
         $data['reference_no'] = 1;
         $data['fee_type'] = 1;
         $data['amount'] = $development_fee;
         $data['due_amount'] = $development_fee;
         $data['status'] = 0;
         $data['date'] = Carbon::now()->format('Y-m-d');
         $data['due_date'] = Carbon::now()->addDays(10)->format('Y-m-d');

         $result = MembershipFee::create($data);
         MembershipFee::find($result->id)->update(['reference_no'=>'INV-'.$result->id]);
         $data['fee_type'] = 2;
         $data['amount'] = $subscription_fee;
         $data['due_amount'] = $subscription_fee;
         $result1 = MembershipFee::create($data);
         MembershipFee::find($result1->id)->update(['reference_no'=>'INV-'.$result1->id]);

         User::where('member_id',$id)->update(['is_active'=>1]);

         $member->status = 1;
        $member->due_date = Carbon::now()->format('Y-m-d');
         $member->save();


           $list['new_date']= $member->due_date;
           $list['member_id']=$id;
           $list['added_by']=auth()->user()->added_by;
            DueDate::create($list);
         

       $last_card_id = Cards::all()->last();
      if(!empty($last_card_id)){
          $reference_no = $last_card_id->id + 1;
      }else{
          $reference_no = 0;
      }


      $items['reference_no'] = "DCG-M-".sprintf('%04d',$reference_no);
      $items['added_by'] = $id;
      $items['type'] = 1;
      $cards = Cards::create($items);


      if(!empty($cards))
      $card_id = $cards->id;
      $member_id = $id;

      if(isset($card_id)){
          $cdata['member_id'] = $member_id;
          $cdata['cards_id'] = $card_id;
          $cdata['added_by'] = $id;

          $assignment  = CardAssignment::create($cdata);
       }else{

          return redirect()->back()->with(['error'=>'No Card available']);
       }
      if(!empty($assignment->id) && $assignment->id > 0){
          Cards::where('id',$card_id)->update(['status'=>2,'owner_id'=>$member_id]);
          Member::find($member_id)->update(['status'=>1,'card_id'=>$card_id]);
        //   User::where('member_id',$member_id)->update(['is_active'=>1]);

}

          Toastr::success('Member Approved Successfully','Success');
        return redirect(route('member_list'));

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
 
        
    }



public function disable($id)
    {
        //
        
        $data =  Member::find($id);
        $data->update(['disabled'=> '1']);
        
         $user  = User::where('member_id', $data->id)->first();
        
        if(!empty($user)){
        $item['disabled']='1';
          $user->update($item);
        }
        
        
          $dep=Dependant::where('member_id',$id)->get();
          
          if(!empty($dep[0])){
              foreach($dep as $dp){
                  Dependant::where('id',$dp->id)->update(['disabled'=> '1']);
                  
                  Member::where('is_dependant','1')->where('dependant_id',$dp->id)->update(['disabled'=> '1']);
                  $mm= Member::where('is_dependant','1')->where('dependant_id',$dp->id)->first();
                  User::where('member_id',$mm->id)->update(['disabled'=> '1']);
              }
          }
        

 Toastr::success('Deleted Successfully','Success');
        return redirect(route('member_list'));
        
    }


 public function deposit($id)
    {
        //
        $data = Member::find($id);
      $bank_accounts=AccountCodes::where('account_group','Cash And Banks')->get() ;
      $method=Payment_methodes::all() ;
    $type="member";
        return view('cards.member_deposit',compact('data','bank_accounts','type','id','method'));
    }
    
    public function change_password($id)
    {
        //
        $data = Member::find($id);
        return view('auth.change_password2',compact('data','id'));
    }
    
    public function change_password_updates(Request $request)
    {
        $this->validate($request, [
            'new-password' => 'required|string|min:8|confirmed'
        ]);

        // update password
        $usr = User::where('member_id', $request->member_id)->first();

        User::whereId($usr->id)->update([
            'password' => Hash::make($request->get('new-password'))
        ]);

             Toastr::success('Password changed successfully','Success');
                  return redirect(route('member_list'));
    }


public function discountModal(Request $request)
    {
                 $id=$request->id;
                 $type = $request->type;
                  if($type == 'date'){
                   $member = Member::find($id);
                    return view('members.adjust_date',compact('id','member'));
      }

                 }


public function save_date(Request $request)
    {
                 $id=$request->id;
                
             $member = Member::find($id);             
          $data['adjusted_date'] = $request->adjusted_date;
          $data['adjusted_reason']=$request->adjusted_reason;
           $member->update($data);

 Toastr::success('Adjusted Successfully','Success');
  return redirect(route('member_list'));

                 }

public function approve_date($id)
    {
                
             $member = Member::find($id);    

            $items['old_date']= $member->due_date;
           $items['new_date']= $member->adjusted_date;
$items['reason']= $member->adjusted_reason;
           $items['member_id']=$id;
           $items['added_by']=auth()->user()->added_by;
            DueDate::create($items);
         
           $data['due_date'] = $member->adjusted_date;

           $member->update($data);

         


 Toastr::success('Approved Successfully','Success');
  return redirect(route('member_list'));

                 }

  public function expired_members()
    {
        //
       $date=date('Y-m-d');
        $list=  Member::where('due_date', '<=', $date)->where('disabled',0)->orwhereNull('due_date')->where('status', 1)->get();
    

        return view('members.expired_members',compact('list'));
    }
    
    
  public function active_members()
    {
        //
       $date=date('Y-m-d');
        $list=  Member::where('due_date', '>', $date)->where('disabled',0)->where('status', 1)->get();
    

        return view('members.active_members',compact('list'));
    }



public function transaction_report(Request $request)
    {
       
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $account_id=$request->account_id;
        $chart_of_accounts = [];
        foreach (Member::all()->where('disabled',0)->where('status',1) as $key) {
            $chart_of_accounts[$key->id] = $key->full_name .' - '.  $key->member_id ;


        }
        if($request->isMethod('post')){
            $data=MemberTransaction::where('member_id', $request->account_id)->whereBetween('date',[$start_date,$end_date])->get();
        }else{
            $data=[];
        }

       

        return view('members.transaction_report',
            compact('start_date',
                'end_date','chart_of_accounts','data','account_id'));
    }
    
    
    public function registration_report(Request $request)
    {
       
     $start_date = $request->start_date;
        $end_date = $request->end_date; 
        $location_id = $request->location_id;
        
        $location =  MembershipType::all();
         
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
        
        $rowDatampya = "SELECT * FROM members WHERE created_at BETWEEN '".$start_date."' AND '".$end_date."' AND membership_class IN ($location_id) ";
        
        $data = DB::select($rowDatampya);
 
                
        $dt =  Datatables::of($data);
        
           $dt = $dt->addIndexColumn();
             
       
             $dt = $dt->editColumn('name', function ($row) {

            return $row->full_name.' - '.$row->member_id;
               
            });
                    
        $dt = $dt->editColumn('class', function ($row){
            $c = MembershipType::find($row->membership_class); 
            
            if(!empty($c)){
                
                 if(!empty($c->class)){
                
                $class=$c->name.' - '.$c->class;
                 }
                 else{
                   $class=$c->name;   
                 }
            }
            
            else{
                $class='';
            }
                        
        return $class;
        });
        
         $dt = $dt->editColumn('dev', function ($row){
            $c = Charge::where('membership_type',$row->membership_class)->first(); 
            
            if(!empty($c)){
                
                
               $class=number_format($c->development_fee,2);
            }
            
            else{
               $class=number_format(0,2);
            }
                        
        return $class;
        });
        
        
         $dt = $dt->editColumn('sub', function ($row){
            $c = Charge::where('membership_type',$row->membership_class)->first(); 
            
            if(!empty($c)){
                
                
               $class=number_format($c->subscription_fee,2);
            }
            
            else{
               $class=number_format(0,2);
            }
                        
        return $class;
        });
        
         $dt = $dt->editColumn('join', function ($row){
             
        $total=MembershipPaymentType::leftJoin('membership_payments', 'membership_payments.id', '=', 'membership_payments_type.payment_id')
        ->where('membership_payments.member_id', $row->id)
        ->where('membership_payments_type.fee_type','Joining Fee')
        ->sum('membership_payments_type.amount');
            
        return number_format($total,2);
        });
        
       $dt = $dt->editColumn('date', function ($row) {
        $newDate = date("d/m/Y", strtotime($row->created_at));
        return $newDate;
               });
               
          $dt = $dt->rawColumns(['date']);
        return $dt->make(true);
        }
     
     
     

        return view('members.registration_report',
            compact('data','start_date','end_date','location','x','z','location_id'));
    }
    
     public function fee_report(Request $request)
    {
       
     $start_date = $request->start_date;
        $end_date = $request->end_date; 
        
        /*
        $location_id = $request->location_id;
        
        $location =  MembershipType::all();
         
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
                 
                 
                 
 */      
        
       $data=[];
        
             
       if ($request->ajax()) {
        
        $rowDatampya = "SELECT membership_payments_type.amount as amount, membership_payments_type.status , membership_payments_type.fee_type as type, membership_payments.date as date,membership_payments.member_id as member 
                       FROM membership_payments_type LEFT JOIN membership_payments ON membership_payments.id = membership_payments_type.payment_id
                       WHERE membership_payments.date BETWEEN '".$start_date."' AND '".$end_date."' AND membership_payments_type.status = '1' ";
        
        $data = DB::select($rowDatampya);
 
                
        $dt =  Datatables::of($data);
        
           $dt = $dt->addIndexColumn();
             
       
             $dt = $dt->editColumn('name', function ($row) {
                 
                 $m=Member::find($row->member);
                 if(!empty($m)){
                      return $m->full_name.' - '.$m->member_id;
                 }
                else{
                    return '';
                }
                           
               
            });
                    
        $dt = $dt->editColumn('class', function ($row){
             $m=Member::find($row->member);
            $c = MembershipType::find($m->membership_class); 
            
            if(!empty($c)){
                
                 if(!empty($c->class)){
                
                $class=$c->name.' - '.$c->class;
                 }
                 else{
                   $class=$c->name;   
                 }
            }
            
            else{
                $class='';
            }
                        
        return $class;
        });
        
         $dt = $dt->editColumn('amount', function ($row){

       $class=number_format($row->amount,2);
            
        return $class;
        });
        
        $dt = $dt->editColumn('type', function ($row){

       $class=$row->type;
            
        return $class;
        });
        
       $dt = $dt->editColumn('date', function ($row) {
        $newDate = date("d/m/Y", strtotime($row->date));
        return $newDate;
               });
               
          $dt = $dt->rawColumns(['date']);
        return $dt->make(true);
        }
     
     
     

        return view('members.fee_report',
            compact('data','start_date','end_date'));
    }




public function transaction_list($id)
    {
       
             $member=Member::find($id);
            $data=MemberTransaction::where('member_id', $id)->get();
       
        return view('members.transaction_list',
            compact('data','member'));
    }

}
