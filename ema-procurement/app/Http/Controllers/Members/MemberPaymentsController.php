<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Member\Member;
use App\Models\Member\MembershipFee;
use App\Models\Member\MembershipPayment;
use App\Models\Member\MembershipPaymentType;
use App\Models\Member\MemberTransaction;
use App\Models\Cards\Cards;
use App\Models\Cards\CardAssignment;
use App\Models\User;
use App\Models\Member\Charge;
use App\Models\Member\DueDate;
use App\Models\Accounting\JournalEntry;
use App\Models\Accounting\AccountCodes;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use PDF;

class MemberPaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $payment = MembershipPayment::all()->where('status', 0);
        $members = Member::all()->where('disabled', 0)->where('status', 1)->where('is_dependant', 0);
        $accounts = AccountCodes::where('account_group', 'Fee from Income')->where('sub_group', 'Subscription Membership fees')->get();
        return view('members.paymentlist', compact('payment', 'members', 'accounts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


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

        $x = str_replace(",", "", $request->fee_amount);
        $amount = 0;

        for ($a = 0; $a < count($x); $a++) {

            $amount  += $x[$a];
        }


        //dd($amount);

        if ($amount > 0) {

            if ($request->hasFile('attachment')) {
                $filenameWithExt = $request->file('attachment')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('attachment')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $path = $request->file('attachment')->move('assets/img/fee', $fileNameToStore);
            } else {
                $fileNameToStore = '';
            }

            $data['member_id'] = $request->member_id;
            $data['reference_no'] = $request->reference_no;
            $data['income_id'] = $request->income_id;
            $data['date'] = $request->date;
            $data['notes'] = $request->notes;
            $data['amount'] = 20000;
            $data['attachment'] = $fileNameToStore;
            $data['added_by'] = auth()->user()->added_by;
            $result = MembershipPayment::create($data);


            $nameArr = $request->fee_type;
            $costArr = str_replace(",", "", $request->fee_amount);



            $cost['amount'] = 0;
            if (!empty($nameArr)) {
                for ($i = 0; $i < count($nameArr); $i++) {
                    if (!empty($costArr[$i] > 0)) {

                        $cost['amount'] += $costArr[$i];

                        $items = array(
                            'fee_type' => $nameArr[$i],
                            'amount' =>  $costArr[$i],
                            'added_by' => auth()->user()->added_by,
                            'payment_id' => $result->id
                        );


                        MembershipPaymentType::create($items);
                    }
                }
            }

            MembershipPayment::find($result->id)->update($cost);

            Toastr::success('Payments Created Successfully', 'Success');
            return redirect(route('member_payments.index'));
        } else {

            Toastr::error('Amount should be greater than zero', 'Error');
            return redirect(route('member_payments.index'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $invoice_id = $id;
        $deposits = MembershipPayment::all()->where('member_id', auth()->user()->member_id);

        return view('members.deposit', compact('deposits', 'invoice_id', 'id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = MembershipPayment::find($id);
        $members = Member::all()->where('disabled', 0)->where('status', 1) > where('is_dependant', 0);
        $accounts = AccountCodes::where('account_group', 'Fee from Income')->where('sub_group', 'Subscription Membership fees')->get();
        $sub = MembershipPaymentType::where('payment_id', $id)->where('fee_type', 'Subscription Fee')->first();
        $dev = MembershipPaymentType::where('payment_id', $id)->where('fee_type', 'Development Fee')->first();
        $rein = MembershipPaymentType::where('payment_id', $id)->where('fee_type', 'Reinstatement Fee')->first();
        $join = MembershipPaymentType::where('payment_id', $id)->where('fee_type', 'Joining Fee')->first();
        return view('members.paymentlist', compact('data', 'members', 'id', 'accounts', 'sub', 'dev', 'rein', 'join'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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

        $x = str_replace(",", "", $request->fee_amount);
        $amount = 0;

        for ($a = 0; $a < count($x); $a++) {
            $amount  += $x[$a];
        }


        if ($amount > 0) {



            $result = MembershipPayment::find($id);


            if ($request->hasFile('attachment')) {
                $filenameWithExt = $request->file('attachment')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('attachment')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $path = $request->file('attachment')->move('assets/img/fee', $fileNameToStore);
            } else {
                $fileNameToStore = '';
            }

            $data['member_id'] = $request->member_id;
            $data['reference_no'] = $request->reference_no;
            $data['income_id'] = $request->income_id;
            $data['date'] = $request->date;
            $data['notes'] = $request->notes;
            $data['amount'] = 20000;
            $data['attachment'] = $fileNameToStore;
            $data['added_by'] = auth()->user()->added_by;

            if (!empty($result->attachment)) {
                if ($request->hasFile('attachment')) {
                    unlink('assets/img/fee/' . $result->attachment);
                }
            }

            $result->update($data);


            $nameArr = $request->fee_type;
            $costArr = str_replace(",", "", $request->fee_amount);
            $expArr = $request->saved_items_id;
            $remArr = $request->removed_id;


            if (!empty($remArr)) {
                for ($i = 0; $i < count($remArr); $i++) {
                    if (!empty($remArr[$i])) {
                        MembershipPaymentType::where('id', $remArr[$i])->delete();
                    }
                }
            }

            $cost['amount'] = 0;


            if (!empty($nameArr)) {
                for ($i = 0; $i < count($nameArr); $i++) {
                    if (!empty($nameArr[$i])) {

                        $cost['amount'] += $costArr[$i];
                        //dd($expArr[$i]);

                        $items = array(
                            'fee_type' => $nameArr[$i],
                            'amount' =>  $costArr[$i],
                            'added_by' => auth()->user()->added_by,
                            'payment_id' => $id
                        );

                        if (!empty($expArr[$i]) && $costArr[$i] > 0) {
                            MembershipPaymentType::where('id', $expArr[$i])->update($items);
                        } else if (empty($expArr[$i]) && $costArr[$i] > 0) {
                            MembershipPaymentType::create($items);
                        }
                    }
                }
            }


            MembershipPayment::find($id)->update($cost);

            Toastr::success('Payments Updated Successfully', 'Success');
            return redirect(route('member_payments.index'));
        } else {

            Toastr::error('Amount should be greater than zero', 'Error');
            return redirect(route('member_payments.index'));
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

        MembershipPaymentType::where('payment_id', $id)->delete();

        $result = MembershipPayment::find($id);
        $result->delete();

        Toastr::success('Payments Deleted Successfully', 'Success');
        return redirect(route('member_payments.index'));
    }


    public function findAmount(Request $request)
    {

        $member = $request->member;
        $id = str_replace(",", "", $request->id);

        $member_info = Member::where('id', $member)->first();
        if ($member_info->balance  > 0) {

            if ($id >  $member_info->balance) {
                $price = "You have exceeded your Balance. Choose amount less than " .  number_format($member_info->balance, 2);
            } else if ($id <=  0) {
                $price = "Choose amount between 1.00 and " .  number_format($member_info->balance, 2);
            } else {
                $price = '';
            }
        } else {
            $price = "Your  Balance is Zero.";
        }

        return response()->json($price);
    }


    public function approve($id)
    {
        //
        $deposit = MembershipPayment::find($id);
        $data['status'] = 1;
        $deposit->update($data);

        MembershipPaymentType::where('payment_id', $id)->update(['status' => '1']);

        $supp = Member::find($deposit->member_id);
        $user = $supp->full_name . " - " . $supp->member_id;

        /*
         $codes= AccountCodes::where('account_name','Member`s card deposit')->first();
        $journal = new JournalEntry();
        $journal->account_id = $codes->id;
        $date = explode('-',  $deposit->date);
        $journal->date = $deposit->date;
        $journal->year = $date[0];
        $journal->month = $date[1];
        $journal->transaction_type = 'member_fee';
        $journal->name = 'Member Fee Payment';
        $journal->payment_id =    $deposit->id;
       $journal->member_id= $deposit->member_id;
        $journal->notes= "Member Fee Payment with reference " .$deposit->reference_no ." by Member ". $user ;
        $journal->debit=    $deposit->amount;
        $journal->added_by=auth()->user()->added_by;
        $journal->save();
*/

        $rec = AccountCodes::where('account_name', 'Receivables Control')->first();
        $journal = new JournalEntry();
        $journal->account_id = $rec->id;
        $date = explode('-',  $deposit->date);
        $journal->date = $deposit->date;
        $journal->year = $date[0];
        $journal->month = $date[1];
        $journal->transaction_type = 'member_fee';
        $journal->name = 'Member Fee Payment';
        $journal->payment_id =    $deposit->id;
        $journal->member_id = $deposit->member_id;
        $journal->notes = "Member Fee Payment with reference " . $deposit->reference_no . " by Member " . $user;
        $journal->debit =    $deposit->amount;
        $journal->added_by = auth()->user()->added_by;
        $journal->save();

        $journal = new JournalEntry();
        $journal->account_id =    $deposit->income_id;
        $date = explode('-',  $deposit->date);
        $journal->date = $deposit->date;
        $journal->year = $date[0];
        $journal->month = $date[1];
        $journal->transaction_type = 'member_fee';
        $journal->name = 'Member Fee Payment';
        $journal->payment_id =    $deposit->id;
        $journal->member_id = $deposit->member_id;
        $journal->notes = "Member Fee Payment with reference " . $deposit->reference_no . " by Member " . $user;
        $journal->credit =   $deposit->amount;
        $journal->added_by = auth()->user()->added_by;
        $journal->save();





        /*
        $journal = new JournalEntry();
        $journal->account_id = $rec->id;
        $date = explode('-',  $deposit->date);
        $journal->date = $deposit->date;
        $journal->year = $date[0];
        $journal->month = $date[1];
       $journal->transaction_type = 'member_fee';
        $journal->name = 'Member Fee Payment';
        $journal->payment_id =    $deposit->id;
       $journal->member_id= $deposit->member_id;
        $journal->notes= "Member Fee Payment with reference " .$deposit->reference_no ." by Member ". $user ;
        $journal->credit=    $deposit->amount;
        $journal->added_by=auth()->user()->added_by;
        $journal->save();
  */

        $member = Member::find($deposit->member_id);

        // save into member_transaction

        $a = route('member_payments_receipt', ['download' => 'pdf', 'id' => $id]);

        $mem_transaction = MemberTransaction::create([
            'module' => 'Fee Payment',
            'module_id' => $deposit->id,
            'member_id' => $deposit->member_id,
            'account_id' => $deposit->income_id,
            'code_id' => $rec->id,
            'name' => 'Member Fee Payment with reference ' . $deposit->reference_no,
            'transaction_prefix' => $deposit->reference_no,
            'type' => 'Payment',
            'amount' => $deposit->amount,
            'debit' => $deposit->amount,
            'total_balance' => $member->balance - $deposit->amount,
            'date' => date('Y-m-d', strtotime($deposit->date)),
            'paid_by' => $deposit->member_id,
            'status' => 'paid',
            'notes' => 'This payment is from member fee payment. The Reference is ' . $deposit->reference_no . ' by Member ' . $member->full_name,
            'link' => $a,
            'added_by' => auth()->user()->added_by,
        ]);



        $sub = MembershipPaymentType::where('payment_id', $deposit->id)->where('fee_type', 'Subscription Fee')->first();
        if (!empty($sub)) {
            $membership_fee = Charge::where('membership_type', $member->membership_class)->get()->first();
            $subscription_fee = $membership_fee->subscription_fee;

            $num = ($sub->amount * 365) / $subscription_fee;


            if (is_float($num)) {
                $intpart = floor($num);
                $i = $intpart;
            } else {
                $i = $num;
            }





            $list['old_date'] = $member->due_date;
            $list['new_date'] = date('Y-m-d', strtotime("+$i days", strtotime($member->due_date)));
            $list['member_id'] = $deposit->member_id;
            $list['added_by'] = auth()->user()->added_by;
            DueDate::create($list);


                $items['balance'] = $member->balance - $deposit->amount;
                $items['due_date'] = date('Y-m-d', strtotime("+$i days", strtotime($member->due_date)));
                $member->update($items);
                
            //  $dependents = Member::where('member_id', 'LIKE', '1755.%')->get();
                
                $member_id = $member->member_id;
                
                $member_id_number = preg_replace('/\D/', '', $member_id);
                
                $dependents = Member::where('member_id', 'LIKE', "{$member_id_number}.%")->get();

            //    dd($dependents);
                
                if ($dependents->isNotEmpty()) {
                    foreach ($dependents as $dependent) {
                        $dependent->update(['due_date' => $items['due_date']]);
                    }
                }

        }

        Toastr::success('Payments Approved Successfully', 'Success');
        return redirect(route('member_payments.index'));
    }


    public function payment_receipt(Request $request)
    {

        //if landscape heigth * width but if portrait widht *height      // dd($dataResult);
        $customPaper = array(0, 0, 198.425, 494.80);

        $invoices = MembershipPayment::find($request->id);
        $items = MembershipPaymentType::where('payment_id', $request->id)->get();

        $member = MemberTransaction::where('module_id', $request->id)->where('module', 'Fee Payment')->first();
        if (!empty($member)) {
            $balance = $member->total_balance;
        } else {
            $balance = Member::where('id', $invoices->member_id)->get()->first()->balance;
        }

        view()->share(['invoices' => $invoices, 'balance' => $balance, 'items' => $items]);

        if ($request->has('download')) {
            $pdf = PDF::loadView('members.payment_receipt_pdf')->setPaper($customPaper, 'portrait');
            return $pdf->download('FEE PAYMENT RECEIPT NO # ' .  $invoices->reference_no . ".pdf");
        }
        return view('invoice_receipt');
    }


    public function file_preview(Request $request)
    {
        $id = $request->id;

        $data = MembershipPayment::find($id);
        $filename =  $data->attachment;
        return view('members.file_preview', compact('filename'));
    }
}
