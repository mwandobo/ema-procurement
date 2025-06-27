<?php

namespace App\Http\Controllers\Cards;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\URL;

use App\Libraries\MyString;
use App\Models\Cards\Deposit;
use App\Models\Member\Member;
use App\Models\Member\MemberTransaction;
use App\Models\Cards\Cards;
use App\Models\Visitors\Visitor;
use App\Models\Visitors\VisitingDetails;
use App\Models\Cards\TemporaryDeposit;
use App\Models\Company;
use App\Models\Accounting\AccountCodes;
use App\Models\Accounting\Accounts;
use App\Models\Accounting\JournalEntry;
use App\Models\Accounting\Transaction;
use Brian2694\Toastr\Facades\Toastr;
use Pesapal;
use Illuminate\Http\Request;
use PDF;
use App\Models\Payments\Payment_methodes;
use Illuminate\Support\Facades\Http;

class MemberDepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(!empty(auth()->user()->company_id)){
        $company = Company::find(auth()->user()->company_id);

        $deposits = Deposit::all()->where('company_id',auth()->user()->company_id)->where('card_id',$company->card_id);

        return view('cards.member_deposit',compact('deposits'));
        }
        else{

        $member = Member::find(auth()->user()->member_id);

        $deposits = Deposit::all()->where('member_id',auth()->user()->member_id)->where('card_id',$member->card_id);

        return view('cards.member_deposit',compact('deposits'));
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


      if($request->type =='member'){

     $member = Member::find($request->member_id);

 $random = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(4/strlen($x)) )),1,5);

           $card = Cards::find($member->card_id);
           $data['member_id'] = $request->member_id;
           $data['ref_no'] = $card->reference_no;
           $data['card_id'] =$member->card_id;
           $data['debit'] = $request->amount;
           $data['trans_id'] = "GCD".$random;
           $data['account_id'] = $request->account_id;
           $data['date'] = $request->date;
           $data['method_id'] = $request->method_id;
           $data['cheque_no'] = $request->cheque_no;
           $data['cheque_issue'] = $request->cheque_issue;
           $data['status'] = 1;
           $data['added_by'] = auth()->user()->id;
        
           $deposit = Deposit::create($data);
           $temp_deposit = TemporaryDeposit::create($data);



           $cr= AccountCodes::where('id','$request->account_id')->first();
          $journal = new JournalEntry();
        $journal->account_id = $request->account_id;
        $date = explode('-',$request->date);
        $journal->date =   $request->date ;
        $journal->year = $date[0];
        $journal->month = $date[1];
       $journal->transaction_type = 'member_deposit';
        $journal->name = 'Member Deposit';
        $journal->debit =$request->amount;
        $journal->payment_id= $deposit->id;
        $journal->member_id= $request->member_id;
          $journal->added_by=auth()->user()->added_by;
           $journal->notes= "Member Deposit with reference ".$deposit->trans_id ." by Member ".$member->full_name ;
        $journal->save();


        $codes=  AccountCodes::where('account_name','Receivables Control')->first();
        $journal = new JournalEntry();
        $journal->account_id = $codes->id;
          $date = explode('-',$request->date);
        $journal->date =   $request->date ;
        $journal->year = $date[0];
        $journal->month = $date[1];
         $journal->transaction_type = 'member_deposit';
        $journal->name = 'Member Deposit';
        $journal->credit =$request->amount;
        $journal->payment_id= $deposit->id;
        $journal->member_id= $request->member_id;
          $journal->added_by=auth()->user()->added_by;
           $journal->notes=  "Member Deposit with reference ".$deposit->trans_id ." by Member ".$member->full_name ;
        $journal->save();
        
$account= Accounts::where('account_id',$request->account_id)->first();

if(!empty($account)){
$balance=$account->balance + $request->amount ;
$item_to['balance']=$balance;
$account->update($item_to);
}

else{
  $cr= AccountCodes::where('id',$request->account_id)->first();

     $new['account_id']= $request->account_id;
       $new['account_name']= $cr->account_name;
      $new['balance']= $request->amount;
       $new[' exchange_code']= 'TZS';
        $new['added_by']=auth()->user()->added_by;
$balance=$request->amount;
     Accounts::create($new);
}
        
   // save into tbl_transaction

                             $transaction= Transaction::create([
                                'module' => 'Member Deposit',
                                 'module_id' => $deposit->id,
                               'account_id' => $request->account_id,
                                'code_id' => $codes->id,
                                'name' => 'Member Deposit with reference ' .$deposit->trans_id,
                                 'transaction_prefix' => $deposit->trans_id,
                                'type' => 'Income',
                                'amount' =>$request->amount ,
                                'credit' => $request->amount,
                                 'total_balance' =>$balance,
                                'date' => date('Y-m-d', strtotime($request->date)),
                                'paid_by' => $request->member_id,
                                   'status' => 'paid' ,
                                'notes' => 'This deposit is from member deposit payment. The Reference is ' .$deposit->trans_id .' by Member '. $member->full_name  ,
                                'added_by' =>auth()->user()->added_by,
                            ]);


// save into member_transaction

$a=route('member_deposit_receipt',['download'=>'pdf','id'=>$deposit->id]);

                             $mem_transaction= MemberTransaction::create([
                                'module' => 'Member Deposit',
                                 'module_id' => $deposit->id,
                          'member_id' => $request->member_id,
                               'account_id' => $request->account_id,
                                'code_id' => $codes->id,
                                'name' => 'Member Deposit with reference ' .$deposit->trans_id,
                                 'transaction_prefix' => $deposit->trans_id,
                                'type' => 'Deposit',
                                'amount' =>$request->amount ,
                                'credit' => $request->amount,
                                 'total_balance' =>$member->balance + $request->amount,
                                'date' => date('Y-m-d', strtotime($request->date)),
                                'paid_by' => $request->member_id,
                                   'status' => 'paid' ,
                                'notes' => 'This deposit is from member deposit payment. The Reference is ' .$deposit->trans_id .' by Member '. $member->full_name  ,
                                    'link'=> $a,
                                'added_by' =>auth()->user()->added_by,
                            ]);


Member::find($request->member_id)->update(['balance'=>$member->balance + $request->amount]) ;


        //     $dateT = $request->date;


        //     $key = "891bf62609dcbefad622090d577294dcab6d0607";
        //     //   $number = "0747022515";
        //   $number = $data->msisdn;
        //   $message = "Thank you $member->full_name, $member->member_id, for depositing Tsh. $data->amount on $dateT with receipt no: $deposit->trans_id to Gymkhana Club. Your deposit balance is now Tsh. $member->balance. \n Powered by UjuziNet.";
        //   $option11 = 1;
        //   $type = "sms";
        //   $useRandomDevice = 1;
        //   $prioritize = 1;
          
        //   $response = Http::withHeaders(['Content-Type' => 'application/json'])->send('GET',"https://sms.ema.co.tz/services/send.php?key=$key&number=$number&message=$message&devices=1&type=sms&useRandomDevice=1&prioritize=1")->json();
           

   Toastr::success('Deposited Successfully','Success');
        return redirect(route('member_list'));

      }




      else if($request->type =='visitor'){

      $member = Visitor::find($request->member_id);
     $visitor = VisitingDetails::where('visitor_id',$request->member_id)->get()->first();
        $card = Cards::find($visitor->card_id);
        
        

$random = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(4/strlen($x)) )),1,5);

           $card = Cards::find($visitor->card_id);
           $data['visitor_id'] = $request->member_id;
           if(!empty($card)){
           $data['ref_no'] = $card->reference_no;
           }
           else{
            $data['ref_no'] = '';    
           }
           $data['card_id'] =$visitor->card_id;
           $data['debit'] = $request->amount;
         $data['trans_id'] = "GCD".$random;
          $data['account_id'] = $request->account_id;
          $data['date'] = $request->date;
           $data['status'] = 1;
           $data['added_by'] = auth()->user()->id;

        
           $deposit = Deposit::create($data);
           $temp_deposit = TemporaryDeposit::create($data);



           $cr= AccountCodes::where('id','$request->account_id')->first();
          $journal = new JournalEntry();
        $journal->account_id = $request->account_id;
        $date = explode('-',$request->date);
        $journal->date =   $request->date ;
        $journal->year = $date[0];
        $journal->month = $date[1];
       $journal->transaction_type = 'visitor_deposit';
        $journal->name = 'Visitor Deposit';
        $journal->debit =$request->amount;
        $journal->payment_id= $deposit->id;
        $journal->visitor_id= $request->member_id;
          $journal->added_by=auth()->user()->added_by;
           $journal->notes= "Visitor Deposit with reference ".$deposit->trans_id ." by Visitor ".$member->first_name ." ". $member->last_name; 
        $journal->save();


        $codes= AccountCodes::where('account_name','Visitor`s card deposit')->first();
        $journal = new JournalEntry();
        $journal->account_id = $codes->id;
          $date = explode('-',$request->date);
        $journal->date =   $request->date ;
        $journal->year = $date[0];
        $journal->month = $date[1];
         $journal->transaction_type = 'visitor_deposit';
        $journal->name = 'Visitor Deposit';
        $journal->credit =$request->amount;
        $journal->payment_id= $deposit->id;
        $journal->visitor_id= $request->member_id;
          $journal->added_by=auth()->user()->added_by;
          $journal->notes= "Visitor Deposit with reference ".$deposit->trans_id ." by Visitor ".$member->first_name ." ". $member->last_name; 
        $journal->save();
        
$account= Accounts::where('account_id',$request->account_id)->first();

if(!empty($account)){
$balance=$account->balance + $request->amount ;
$item_to['balance']=$balance;
$account->update($item_to);
}

else{
  $cr= AccountCodes::where('id',$request->account_id)->first();

     $new['account_id']= $request->account_id;
       $new['account_name']= $cr->account_name;
      $new['balance']= $request->amount;
       $new[' exchange_code']= 'TZS';
        $new['added_by']=auth()->user()->added_by;
$balance=$request->amount;
     Accounts::create($new);
}
        
   // save into tbl_transaction

                             $transaction= Transaction::create([
                                'module' => 'Visitor Deposit',
                                 'module_id' => $deposit->id,
                               'account_id' => $request->account_id,
                                'code_id' => $codes->id,
                                'name' => 'Visitor Deposit with reference ' .$deposit->trans_id,
                                 'transaction_prefix' => $deposit->trans_id,
                                'type' => 'Income',
                                'amount' =>$request->amount ,
                                'credit' => $request->amount,
                                 'total_balance' =>$balance,
                                'date' => date('Y-m-d', strtotime($request->date)),
                                'paid_by' => $request->member_id,
                                   'status' => 'paid' ,
                                'notes' => 'This deposit is from visitor deposit payment. The Reference is ' .$deposit->trans_id .' by Visitor '. $member->first_name .' '. $member->last_name  ,
                                'added_by' =>auth()->user()->added_by,
                            ]);


 Visitor::find($request->member_id)->update(['balance'=>$member->balance + $request->amount]) ;
  VisitingDetails::where('visitor_id',$request->member_id)->update(['deposit'=>'1']) ;

   Toastr::success('Deposited Successfully','Success');
        return redirect(route('visitors.index'));

      }




       
/*
        $callbacUrl = URL::to('')."/pesapalResonse";

  
        MyString::setEnv('PESAPAL_CONSUMER_KEY','BQRCwbtaVO7uKdxDPQi/HXQ/Lk9oh3Me');
        MyString::setEnv('PESAPAL_CONSUMER_SECRET',"1+qbNhG7qirv0ElpgQ1d0I0ernw=");
       MyString::setEnv('PESAPAL_API_URL','https://demo.pesapal.com/api/PostPesapalDirectOrderV4');

       MyString::setEnv('PESAPAL_CALLBACK_URL',$callbacUrl);
       



       //Pesapal::make_payment("customerfirstname","customerlastname","customerlastname","amount","transaction_id");
          $res=Pesapal::makepayment("samwel","1000","herman","epmnzava@gmail.com","MERCHANT","453f4f4343" ,"transacto","0715438485");
      
          echo  $res;

          */

          //return redirect(route('member_card_deposit.index'));
  
    }


public function deposit_receipt(Request $request){

        //if landscape heigth * width but if portrait widht *height      // dd($dataResult);
        $customPaper = array(0,0,198.425,494.80);

       $invoices =Deposit::find($request->id);

      $member= MemberTransaction::where('module_id',$request->id)->where('module','Member Deposit')->first();

        view()->share(['invoices'=>$invoices,'member'=>$member]);

        if($request->has('download')){
        $pdf = PDF::loadView('members.deposit_receipt_pdf')->setPaper($customPaper, 'portrait');
         return $pdf->download('DEPOSIT RECEIPT NO # ' .  $invoices->trans_id . ".pdf");
        }
       return view('deposit_receipt');

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

     

        return view('cards.deposit',compact('id'));
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
        $card = Cards::find($request->card_id);
        $data['ref_no'] = 1;
        $data['visitor_id'] = $card->owner_id;
        $data['card_id'] =$request->card_id;
        $data['debit'] = $request->amount;
        $data['status'] = 1;
        $data['added_by'] = auth()->user()->id;

        $temp_deposit = TemporaryDeposit::create($data);

/*
     $callbacUrl = URL::to('')."/pesapalResonse";


     MyString::setEnv('PESAPAL_CONSUMER_KEY','BQRCwbtaVO7uKdxDPQi/HXQ/Lk9oh3Me');
     MyString::setEnv('PESAPAL_CONSUMER_SECRET',"1+qbNhG7qirv0ElpgQ1d0I0ernw=");
    MyString::setEnv('PESAPAL_API_URL','https://demo.pesapal.com/api/PostPesapalDirectOrderV4');

    MyString::setEnv('PESAPAL_CALLBACK_URL',$callbacUrl);
    



    //Pesapal::make_payment("customerfirstname","customerlastname","customerlastname","amount","transaction_id");
       $res=Pesapal::makepayment("samwel","1000","herman","epmnzava@gmail.com","MERCHANT","453f4f4343" ,"transacto","0715438485");
   
       echo  $res;

       */

       return redirect(route('card_deposit.index'));
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



 


}
