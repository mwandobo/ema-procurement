<?php

namespace App\Http\Controllers\Bar\POS;

use App\Http\Controllers\Controller;
use App\Models\Accounting\AccountCodes;
use App\Models\POS\InvoicePayments;
use App\Models\Accounting\JournalEntry;
use App\Models\Payment\Payment_methodes;
use App\Models\POS\Invoice;
// use App\Models\POS\Client;
use Illuminate\Http\Request;
use App\Models\Accounting\Transaction;
use App\Models\Accounting\Accounts;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Bar\POS\CustomerCredibility;
use App\Models\Bar\POS\Client;

class InvoicePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bar.pos.sales.invoice_payments');
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

        $receipt = $request->all();
        $sales = Invoice::find($request->invoice_id);

        $count = InvoicePayments::count();
        $pro = $count + 1;

        if ($receipt['amount'] <= $sales->due_amount) {
            if ($receipt['amount'] >= 0) {
                $receipt['trans_id'] = 'TRANS_SP_' . $pro;
                $receipt['added_by'] = auth()->user()->added_by;
                $receipt['account_id'] = $request->account_id;

                //update due amount from invoice table
                $data['due_amount'] = $sales->due_amount - $receipt['amount'];
                if ($data['due_amount'] != 0) {
                    $data['status'] = 2;
                } else {
                    $data['status'] = 3;
                }
                $sales->update($data);

                $payment = InvoicePayments::create($receipt);

                $supp = Client::find($sales->client_id);

                $cr = AccountCodes::where('id', '$request->account_id')->first();
                $journal = new JournalEntry();
                $journal->account_id = $request->account_id;
                $date = explode('-', $request->date);
                $journal->date = $request->date;
                $journal->year = $date[0];
                $journal->month = $date[1];
                $journal->transaction_type = 'pos_invoice_payment';
                $journal->name = 'Invoice Payment';
                $journal->debit = $receipt['amount'] * $sales->exchange_rate;
                $journal->payment_id = $payment->id;
                $journal->client_id = $sales->client_id;
                $journal->currency_code = $sales->currency_code;
                $journal->exchange_rate = $sales->exchange_rate;
                $journal->added_by = auth()->user()->added_by;
                $journal->notes = 'Deposit for Sales Invoice No ' . $sales->reference_no . ' by Client ' . $supp->name;
                $journal->save();

                $codes = AccountCodes::where('account_name', 'Receivables Control')->first();
                $journal = new JournalEntry();
                $journal->account_id = $codes->id;
                $date = explode('-', $request->date);
                $journal->date = $request->date;
                $journal->year = $date[0];
                $journal->month = $date[1];
                $journal->transaction_type = 'pos_invoice_payment';
                $journal->name = 'Invoice Payment';
                $journal->credit = $receipt['amount'] * $sales->exchange_rate;
                $journal->payment_id = $payment->id;
                $journal->client_id = $sales->client_id;
                $journal->currency_code = $sales->currency_code;
                $journal->exchange_rate = $sales->exchange_rate;
                $journal->added_by = auth()->user()->added_by;
                $journal->notes = 'Clear Receivable for Invoice No  ' . $sales->reference_no . ' by Client ' . $supp->name;
                $journal->save();

                $account = Accounts::where('account_id', $request->account_id)->first();

                if (!empty($account)) {
                    $balance = $account->balance + $payment->amount;
                    $item_to['balance'] = $balance;
                    $account->update($item_to);
                } else {
                    $cr = AccountCodes::where('id', $request->account_id)->first();

                    $new['account_id'] = $request->account_id;
                    $new['account_name'] = $cr->account_name;
                    $new['balance'] = $payment->amount;
                    $new[' exchange_code'] = $sales->currency_code;
                    $new['added_by'] = auth()->user()->added_by;
                    $balance = $payment->amount;
                    Accounts::create($new);
                }

                // save into tbl_transaction

                $transaction = Transaction::create([
                    'module' => 'POS Invoice Payment',
                    'module_id' => $payment->id,
                    'account_id' => $request->account_id,
                    'code_id' => $codes->id,
                    'name' => 'POS Invoice Payment with reference ' . $payment->trans_id,
                    'transaction_prefix' => $payment->trans_id,
                    'type' => 'Income',
                    'amount' => $payment->amount,
                    'credit' => $payment->amount,
                    'total_balance' => $balance,
                    'date' => date('Y-m-d', strtotime($request->date)),
                    'paid_by' => $sales->client_id,
                    'payment_methods_id' => $payment->payment_method,
                    'status' => 'paid',
                    'notes' => 'This deposit is from pos invoice  payment. The Reference is ' . $sales->reference_no . ' by Client ' . $supp->name,
                    'added_by' => auth()->user()->added_by,
                ]);

                Toastr::success('Payment Added successfully', 'Success');
                return redirect(route('invoice.index'));
            } else {
                Toastr::error('Amount should not be equal or less to zero', 'Error');
                return redirect(route('invoice.index'));
            }
        } else {
            Toastr::error('Amount should  be less than Invoice amount', 'Error');
            return redirect(route('invoice.index'));
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
        $data = InvoicePayments::find($id);
        $invoice = Invoice::find($data->invoice_id);
        $payment_method = Payment_methodes::all();
        $bank_accounts = AccountCodes::where('account_group', 'Cash and Cash Equivalent')->get();
        return view('pos.invoices.invoice_edit_payments', compact('invoice', 'payment_method', 'data', 'id', 'bank_accounts'));
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
        $payment = InvoicePayments::find($id);

        $receipt = $request->all();
        $sales = Invoice::find($request->invoice_id);

        if ($receipt['amount'] <= $sales->due_amount) {
            if ($receipt['amount'] >= 0) {
                $receipt['added_by'] = auth()->user()->added_by;

                //update due amount from invoice table
                if ($payment->amount <= $receipt['amount']) {
                    $diff = $receipt['amount'] - $payment->amount;
                    $data['due_amount'] = $sales->due_amount - $diff;
                }

                if ($payment->amount > $receipt['amount']) {
                    $diff = $payment->amount - $receipt['amount'];
                    $data['due_amount'] = $sales->due_amount + $diff;
                }

                $account = Accounts::where('account_id', $request->account_id)->first();

                if (!empty($account)) {
                    if ($payment->amount <= $receipt['amount']) {
                        $diff = $receipt['amount'] - $payment->amount;
                        $balance = $account->balance + $diff;
                    }

                    if ($payment->amount > $receipt['amount']) {
                        $diff = $payment->amount - $receipt['amount'];
                        $balance = $account->balance - $diff;
                    }

                    $item_to['balance'] = $balance;
                    $account->update($item_to);
                } else {
                    $cr = AccountCodes::where('id', $request->account_id)->first();

                    $new['account_id'] = $request->account_id;
                    $new['account_name'] = $cr->account_name;
                    $new['balance'] = $receipt['amount'];
                    $new[' exchange_code'] = $sales->exchange_code;
                    $new['added_by'] = auth()->user()->added_by;

                    $balance = $receipt['amount'];
                    Accounts::create($new);
                }

                if ($data['due_amount'] != 0) {
                    $data['status'] = 2;
                } else {
                    $data['status'] = 3;
                }
                $sales->update($data);

                $payment->update($receipt);

                $supp = Client::find($sales->client_id);

                $cr = AccountCodes::where('id', '$request->account_id')->first();
                $journal = JournalEntry::where('transaction_type', 'pos_invoice_payment')->where('payment_id', $payment->id)->whereNotNull('debit')->first();
                $journal->account_id = $request->account_id;
                $date = explode('-', $request->date);
                $journal->date = $request->date;
                $journal->year = $date[0];
                $journal->month = $date[1];
                $journal->transaction_type = 'pos_invoice_payment';
                $journal->name = 'Invoice Payment';
                $journal->debit = $receipt['amount'] * $sales->exchange_rate;
                $journal->payment_id = $payment->id;
                $journal->client_id = $sales->client_id;
                $journal->currency_code = $sales->exchange_code;
                $journal->exchange_rate = $sales->exchange_rate;
                $journal->added_by = auth()->user()->added_by;
                $journal->notes = 'Deposit for Sales Invoice No ' . $sales->reference_no . ' by Client ' . $supp->name;
                $journal->update();

                $codes = AccountCodes::where('account_group', 'Receivables')->first();
                $journal = JournalEntry::where('transaction_type', 'pos_invoice_payment')->where('payment_id', $payment->id)->whereNotNull('credit')->first();
                $journal->account_id = $request->account_id;
                $date = explode('-', $request->date);
                $journal->date = $request->date;
                $journal->year = $date[0];
                $journal->month = $date[1];
                $journal->transaction_type = 'pos_invoice_payment';
                $journal->name = 'Invoice Payment';
                $journal->credit = $receipt['amount'] * $sales->exchange_rate;
                $journal->payment_id = $payment->id;
                $journal->client_id = $sales->client_id;
                $journal->currency_code = $sales->exchange_code;
                $journal->exchange_rate = $sales->exchange_rate;
                $journal->added_by = auth()->user()->added_by;
                $journal->notes = 'Clear Receivable for Invoice No  ' . $sales->reference_no . ' by Client ' . $supp->name;
                $journal->update();

                // save into tbl_transaction
                $transaction = Transaction::where('module', 'POS Invoice Payment')
                    ->where('module_id', $id)
                    ->update([
                        'module' => 'POS Invoice Payment',
                        'module_id' => $payment->id,
                        'account_id' => $request->account_id,
                        'code_id' => $codes->id,
                        'name' => 'POS Invoice Payment with reference ' . $payment->trans_id,
                        'transaction_prefix' => $payment->trans_id,
                        'type' => 'Income',
                        'amount' => $payment->amount,
                        'credit' => $payment->amount,
                        'total_balance' => $balance,
                        'date' => date('Y-m-d', strtotime($request->date)),
                        'paid_by' => $sales->client_id,
                        'payment_methods_id' => $payment->payment_method,
                        'status' => 'paid',
                        'notes' => 'This deposit is from pos invoice  payment. The Reference is ' . $sales->reference_no . ' by Client ' . $supp->name,
                        'added_by' => auth()->user()->added_by,
                    ]);

                return redirect(route('invoice.index'))->with(['success' => 'Payment Added successfully']);
            } else {
                return redirect(route('invoice.index'))->with(['error' => 'Amount should not be equal or less to zero']);
            }
        } else {
            return redirect(route('invoice.index'))->with(['error' => 'Amount should  be less than Invoice amount ']);
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
    }


    
    // public function customer_credibility()
    // {
       
        
    //     return view('bar.pos.sales.credibility');
    // }


    public function credibility_index()
    {
        $credibilities = CustomerCredibility::with('clients')->get();
        $clients = Client::all();
        return view('bar.pos.sales.credibility', compact('credibilities', 'clients'));
    }

    /**
     * Show the form for creating a new customer credibility.
     *
     * @return \Illuminate\View\View
     */
    public function credibility_create()
    {
        $clients = Client::all();
        return view('bar.pos.sales.credibility', compact('clients'));
    }

    /**
     * Store a newly created customer credibility in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function credibility_store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'group_name' => 'required|string|max:255',
        //     'client_ids' => 'required|array',
        //     'client_ids.*' => 'exists:clients,id',
        //     'percentage' => 'required|numeric|min:0|max:100',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        $credibility = CustomerCredibility::create([
            'group_name' => $request->group_name,
            'percentage' => $request->percentage,
        ]);

        $credibility->clients()->attach($request->client_ids);

        return redirect()->route('customer_credibilities.credibility_index')
            ->with('success', 'Customer credibility created successfully.');
    }

    /**
     * Show the form for editing the specified customer credibility.
     *
     * @param  \App\Models\CustomerCredibility  $customerCredibility
     * @return \Illuminate\View\View
     */
    public function credibility_edit(CustomerCredibility $customerCredibility)
    {
        $clients = Client::all();
        $editCredibility = $customerCredibility;
        return view('bar.pos.sales.credibility', compact('editCredibility', 'clients'));
    }

    /**
     * Update the specified customer credibility in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerCredibility  $customerCredibility
     * @return \Illuminate\Http\RedirectResponse
     */
    public function credibility_update(Request $request, CustomerCredibility $customerCredibility)
    {
        // $validator = Validator::make($request->all(), [
        //     'group_name' => 'required|string|max:255',
        //     'client_ids' => 'required|array',
        //     'client_ids.*' => 'exists:clients,id',
        //     'percentage' => 'required|numeric|min:0|max:100',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        $customerCredibility->update([
            'group_name' => $request->group_name,
            'percentage' => $request->percentage,
        ]);

        $customerCredibility->clients()->sync($request->client_ids);

        return redirect()->route('customer_credibilities.credibility_index')
            ->with('success', 'Customer credibility updated successfully.');
    }

    /**
     * Remove the specified customer credibility from storage.
     *
     * @param  \App\Models\CustomerCredibility  $customerCredibility
     * @return \Illuminate\Http\RedirectResponse
     */
    public function credibility_destroy(CustomerCredibility $customerCredibility)
    {
        $customerCredibility->clients()->detach();
        $customerCredibility->delete();

        return redirect()->route('customer_credibilities.credibility_index')
            ->with('success', 'Customer credibility deleted successfully.');
    }


    
}

