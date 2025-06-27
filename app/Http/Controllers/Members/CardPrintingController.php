<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Member\Member;
use App\Models\Member\MembershipFee;
use App\Models\Member\MembershipPayment;
use App\Models\Cards\Cards;
use App\Models\Cards\CardAssignment;
use App\Models\Member\Charge;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class CardPrintingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $member = Member::all()->where('disabled',0)->where('card_id','!=',null)->where('picture','!=',null);
       $cards= Member::all()->where('disabled',0)->where('issued_status',0);
       $list = Member::all()->where('disabled',0)->where('status',0)->whereNotNull('member_id');
       
       
        return view('members.card_printing',compact('member','list','cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $member = Member::find(14);
        $card = Cards::find($member->card_id)->reference_no;

        return view('members.card_preview',compact('member','card'));
    
    
    }

    public function print(Request $request)
    {
        //
        $member = Member::find(14);
        $card = Cards::find($member->card_id)->reference_no;

return view('members.card_preview',compact('member','card')); 
        
    
    
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

        $invoice = MembershipFee::find($request->invoice_id);
        $data = $request->all();
        $data['member_id'] = auth()->user()->member_id;
        $data['reference_no'] = $invoice->reference_no;
        $data['fee_type'] = $invoice->fee_type;
        $data['amount'] = $request->amount;
        $data['due_amount'] = $invoice->due_amount - $request->amount;
        $data['status'] = 0;
        $data['added_by'] = auth()->user()->id;


        if ($request->hasFile('attachment')) {
            $photo=$request->file('attachment');
            $fileType=$photo->getClientOriginalExtension();
            $fileName=rand(1,1000).date('dmyhis').".".$fileType;
            $attachment=$fileName;
            $photo->move('assets/img/logo', $fileName );
             $data['attachment'] = $attachment;

        }

        $result = MembershipPayment::create($data);
        
         Toastr::success('Payments Added Successfully .Please wait for Approval','Success');
        return redirect()->back();
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
        $member = Member::find($id);
        $card = Cards::find($member->card_id)->reference_no;

        return view('cards.card_printing.card_preview',compact('member','card','id'));
    }

    public function print_front($id){
        $member = Member::find($id);
        $card = Cards::find($member->card_id)->reference_no;
        
         $membership_type = $member->membership_class;
         
        if($membership_type == 6){
            $font = 23;
           return view('cards.card_printing.print_front_life_member2',compact('member','card','font'));
        }elseif($membership_type == 7){
            $font = 18;
           return view('cards.card_printing.print_front_honary_member',compact('member','card','font'));
        }
        elseif($membership_type == 5){
              $font = 18;
              $color="#FFD700";
          return view('cards.card_printing.print_front',compact('member','card','font','color'));
        }
        elseif($membership_type == 9){
                $font = 18;
                 $color="#FFD700";
          return view('cards.card_printing.print_front',compact('member','card','font','color'));
        }
        else{
            $font = 18;
             $color="#487bf8";
          return view('cards.card_printing.print_front',compact('member','card','font','color'));
            
        }

        

    }

    public function print_back($id){
        $member = Member::find($id);
        $card = Cards::find($member->card_id)->reference_no;
        
            $membership_type = $member->membership_class;
        if($membership_type == 6){
           return view('cards.card_printing.print_back_life_member2',compact('member','card'));
        }elseif($membership_type == 7){
            
           return view('cards.card_printing.print_back_honary_member',compact('member','card'));
        }
        elseif($membership_type == 5){
            $color = "#FFD700";
          return view('cards.card_printing.print_back',compact('member','card','color'));
        }
        elseif($membership_type == 9){
             $color = "#FFD700";
           return view('cards.card_printing.print_back',compact('member','card','color'));
        }
        else{
             $color = "#487bf8";
        return view('cards.card_printing.print_back',compact('member','card','color'));
            
        }


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
         if(!empty($member)){
            Member::find($id)->update(['issued_status'=>$member->issued_status + 1]);
         }
       
        
   

        // card assignment

      Toastr::success('Issued successfully','Success');
        return redirect()->back();
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

         $member = Member::find($id);
        
              $data['issued_status']=$member->issued_status + 1;
              $data['card_no']=$request->card;

              $member->update($data);

 Toastr::success('Card Issued Successfully','Success');
        return redirect(route('card_printing.index'));

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


public function findCard(Request $request)
   {
                $id=$request->id;
                $type = $request->type;
          if($type == 'issue'){   
           $data = Member::find($id) ;
               return view('members.issue_card',compact('data','id'));
            }
}


   public function member_card_list()
    {
        //
        $member = Member::all()->where('card_no','!=',null);
       
       
        return view('members.card_list',compact('member'));
    }

}
