<?php

namespace App\Http\Controllers\restaurant;

use App\Http\Controllers\Controller;
use App\Models\restaurant\Restaurant;
use App\Models\Inventory\Location;
use App\Models\Member\Member;
use App\Models\Member\MemberTransaction;
use App\Models\restaurant\Menu;
use App\Models\restaurant\MenuComponent;
use App\Models\restaurant\Order;
use App\Models\restaurant\OrderItem;
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
use App\Models\Bar\POS\PurchaseHistory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use PDF;

use App\Traits\SalesReport;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = Order::where('created_by', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
        //$location=Location::where('created_by',auth()->user()->added_by)->where('main','0')->get();
        $location = Location::leftJoin('location_manager', 'locations.id', 'location_manager.location_id')
            ->where('locations.disabled', '0')
            ->where('locations.added_by', auth()->user()->added_by)
            ->where('location_manager.manager', auth()->user()->id)
            ->select('locations.*')
            ->orderBy('locations.created_at', 'asc')
            ->get();
        $type = '';
        $bank_accounts = AccountCodes::where('account_group', 'Cash And Banks')->get();
        $currency = Currency::all();
        $name = Items::all();
        return view('restaurant.orders.index', compact('index', 'type', 'location', 'bank_accounts', 'currency', 'name'));
    }

    use SalesReport;

    public function all_sale_report(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $userType = $request->input('user_type');
        $locationId = $request->input('location');

        $locations = Location::all();

        if (empty($startDate) || empty($endDate)) {
            $report = [];
            return view('restaurant.orders.sale_report', compact('report', 'locations'));
        }

        $report = $this->generateSalesReport($startDate, $endDate, $userType, $locationId);

        return view('restaurant.orders.sale_report', compact('report', 'locations', 'startDate', 'endDate'));
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
        $count = Order::count();
        $pro = $count + 1;
        $data['reference_no'] = 'DGC-ORD-' . $pro;
        $data['user_id'] = $request->user_id;
        $data['user_type'] = $request->user_type;
        $data['invoice_date'] = date('Y-m-d');
        $data['location'] = $request->location;
        $data['account_id'] = $request->account_id;
        $data['exchange_code'] = $request->exchange_code;
        $data['exchange_rate'] = $request->exchange_rate;
        $data['notes'] = $request->notes;
        $data['invoice_amount'] = '1';
        $data['due_amount'] = '1';
        $data['invoice_tax'] = '1';
        $data['status'] = '0';
        $data['good_receive'] = '0';
        $data['invoice_status'] = 1;
        $data['created_by'] = auth()->user()->id;
        $data['added_by'] = auth()->user()->added_by;

        $invoice = Order::create($data);

        $amountArr = str_replace(',', '', $request->amount);
        $totalArr = str_replace(',', '', $request->tax);

        $nameArr = $request->item_name;
        $qtyArr = $request->quantity;
        $priceArr = $request->price;
        $rateArr = $request->tax_rate;
        $typeArr = $request->type;
        $costArr = str_replace(',', '', $request->total_cost);
        $taxArr = str_replace(',', '', $request->total_tax);

        $savedArr = $request->item_name;

        $cost['invoice_amount'] = 0;
        $cost['invoice_tax'] = 0;
        if (!empty($nameArr)) {
            for ($i = 0; $i < count($nameArr); $i++) {
                if (!empty($nameArr[$i])) {
                    $cost['invoice_amount'] += $costArr[$i];
                    $cost['invoice_tax'] += $taxArr[$i];

                    $items = [
                        'type' => 'Bar',
                        'item_name' => $nameArr[$i],
                        'quantity' => $qtyArr[$i],
                        'due_quantity' => $qtyArr[$i],
                        'tax_rate' => $rateArr[$i],
                        'price' => $priceArr[$i],
                        'total_cost' => $costArr[$i],
                        'total_tax' => $taxArr[$i],
                        'items_id' => $savedArr[$i],
                        'order_no' => $i,
                        'added_by' => auth()->user()->added_by,
                        'invoice_id' => $invoice->id,
                    ];

                    OrderItem::create($items);
                }
            }

            // $cost['due_amount'] = $cost['invoice_amount'] + $cost['invoice_tax'];
            $cost['due_amount'] = $cost['invoice_amount'];
            
            OrderItem::where('id', $invoice->id)->update($cost);
        }

        Order::find($invoice->id)->update($cost);

        if (!empty($nameArr)) {
            for ($i = 0; $i < count($nameArr); $i++) {
                $saved = Items::find($savedArr[$i]);

                $lists = [
                    'quantity' => $qtyArr[$i],
                    'item_id' => $savedArr[$i],
                    'added_by' => auth()->user()->added_by,
                    'client_id' => $request->user_id,
                    'invoice_date' => $data['invoice_date'],
                    'location' => $data['location'],
                    'type' => 'Sales',
                    'invoice_id' => $invoice->id,
                ];

                InvoiceHistory::create($lists);

                //$inv=Items::where('id',$nameArr[$i])->first();
                // $q=$inv->quantity - $qtyArr[$i];
                //Items::where('id',$nameArr[$i])->update(['quantity' => $q]);

                $loc = Location::where('id', $data['location'])->first();
                $cr = $qtyArr[$i] / $saved->bottle;
                $cq = round($cr, 1);
                $lq['crate'] = $loc->crate - $cq;
                $lq['bottle'] = $loc->bottle - $qtyArr[$i];
                Location::where('id', $data['location'])->update($lq);
            }
        }

        Toastr::success('Order Created Successfully', 'Success');
        return redirect(route('orders.index'));
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
        $invoices = Order::find($id);
        $invoice_items = OrderItem::where('invoice_id', $id)->get();
        $payments = OrderPayments::where('invoice_id', $id)->get();
        return view('restaurant.orders.order_details', compact('invoices', 'invoice_items', 'payments'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currency = Currency::all();
        $data = Order::find($id);
        $items = OrderItem::where('invoice_id', $id)->get();
        $type = '';

        if ($data->user_type == 'Visitor') {
            $user = Visitor::where('status', '5')->get();
        } elseif ($data->user_type == 'Member') {
            $date = date('Y-m-d');
            $user = Member::where('disabled', 0)->where('due_date', '>=', $date)->get();
        }

        //$location=Location::where('added_by',auth()->user()->added_by)->where('main','0')->get();
        $location = Location::leftJoin('location_manager', 'locations.id', 'location_manager.location_id')
            ->where('locations.disabled', '0')
            ->where('locations.added_by', auth()->user()->added_by)
            ->where('location_manager.manager', auth()->user()->id)
            ->select('locations.*')
            ->orderBy('locations.created_at', 'asc')
            ->get();
        $bank_accounts = AccountCodes::where('account_group', 'Cash And Banks')->get();
        $currency = Currency::all();
        $name = Items::all();
        return view('restaurant.orders.index', compact('currency', 'data', 'id', 'items', 'type', 'location', 'bank_accounts', 'user', 'name'));
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

        if ($request->edit_type == 'receive') {
            $invoice = Order::find($id);

            $old = OrderItem::where('invoice_id', $id)->get();

            foreach ($old as $o) {
                $oinv = Items::where('id', $o->item_name)->first();
                $oloc = Location::where('id', $invoice->location)->first();
                $ocr = $o->due_quantity / $oinv->bottle;
                $ocq = round($ocr, 1);
                $olq['crate'] = $oloc->crate + $ocq;
                $olq['bottle'] = $oloc->bottle + $o->due_quantity;
                Location::where('id', $invoice->location)->update($olq);
            }

            $data['user_id'] = $request->user_id;
            $data['user_type'] = $request->user_type;
            $data['invoice_date'] = date('Y-m-d');
            $data['location'] = $request->location;
            $data['account_id'] = $request->account_id;
            $data['exchange_code'] = $request->exchange_code;
            $data['exchange_rate'] = $request->exchange_rate;
            $data['notes'] = $request->notes;
            $data['invoice_amount'] = '1';
            $data['due_amount'] = '1';
            $data['invoice_tax'] = '1';
            $data['good_receive'] = '1';
            $data['status'] = '1';
            $data['created_by'] = auth()->user()->id;
            $data['added_by'] = auth()->user()->added_by;

            $invoice->update($data);

            $amountArr = str_replace(',', '', $request->amount);
            $totalArr = str_replace(',', '', $request->tax);

            $nameArr = $request->item_name;
            $qtyArr = $request->quantity;
            $priceArr = $request->price;
            $rateArr = $request->tax_rate;
            $typeArr = $request->type;
            $costArr = str_replace(',', '', $request->total_cost);
            $taxArr = str_replace(',', '', $request->total_tax);
            $remArr = $request->removed_id;
            $expArr = $request->saved_items_id;
            $savedArr = $request->item_name;

            $cost['invoice_amount'] = 0;
            $cost['invoice_tax'] = 0;

            if (!empty($remArr)) {
                for ($i = 0; $i < count($remArr); $i++) {
                    if (!empty($remArr[$i])) {
                        OrderItem::where('id', $remArr[$i])->delete();
                    }
                }
            }

            if (!empty($nameArr)) {
                for ($i = 0; $i < count($nameArr); $i++) {
                    if (!empty($nameArr[$i])) {
                        $cost['invoice_amount'] += $costArr[$i];
                        $cost['invoice_tax'] += $taxArr[$i];

                        $items = [
                            'type' => 'Bar',
                            'item_name' => $nameArr[$i],
                            'quantity' => $qtyArr[$i],
                            'due_quantity' => $qtyArr[$i],
                            'tax_rate' => $rateArr[$i],
                            'price' => $priceArr[$i],
                            'total_cost' => $costArr[$i],
                            'total_tax' => $taxArr[$i],
                            'items_id' => $savedArr[$i],
                            'order_no' => $i,
                            'added_by' => auth()->user()->added_by,
                            'invoice_id' => $id,
                        ];

                        if (!empty($expArr[$i])) {
                            OrderItem::where('id', $expArr[$i])->update($items);
                        } else {
                            OrderItem::create($items);
                        }
                    }
                }
               // $cost['due_amount'] = $cost['invoice_amount'] + $cost['invoice_tax'];
               $cost['due_amount'] = $cost['invoice_amount'];
               
                Order::where('id', $id)->update($cost);
            }

            InvoiceHistory::where('invoice_id', $id)->delete();

            if (!empty($nameArr)) {
                for ($i = 0; $i < count($nameArr); $i++) {
                    $saved = Items::find($savedArr[$i]);

                    $lists = [
                        'quantity' => $qtyArr[$i],
                        'item_id' => $savedArr[$i],
                        'added_by' => auth()->user()->added_by,
                        'client_id' => $request->user_id,
                        'invoice_date' => $data['invoice_date'],
                        'location' => $data['location'],
                        'type' => 'Sales',
                        'invoice_id' => $id,
                    ];

                    InvoiceHistory::create($lists);

                    //$inv=Items::where('id',$nameArr[$i])->first();
                    // $q=$inv->quantity - $qtyArr[$i];
                    //Items::where('id',$nameArr[$i])->update(['quantity' => $q]);

                    $loc = Location::where('id', $data['location'])->first();
                    $cr = $qtyArr[$i] / $saved->bottle;
                    $cq = round($cr, 1);
                    $lq['crate'] = $loc->crate - $cq;
                    $lq['bottle'] = $loc->bottle - $qtyArr[$i];
                    Location::where('id', $data['location'])->update($lq);
                }
            }

            if (!empty($nameArr)) {
                for ($i = 0; $i < count($nameArr); $i++) {
                    if (!empty($nameArr[$i])) {
                        $x_lists = [
                            'quantity' => $qtyArr[$i],
                            'price' => $priceArr[$i],
                            'item_id' => $savedArr[$i],
                            'added_by' => auth()->user()->added_by,
                            'user_id' => $request->user_id,
                            'invoice_date' => $data['invoice_date'],
                            'location' => $data['location'],
                            'type' => 'Sales',
                            'item_type' => 'Bar',
                            'invoice_id' => $id,
                        ];

                        OrderHistory::create($x_lists);
                    }
                }
            }

            $inv = Order::find($id);

            if ($inv->user_type == 'Member') {
                $member = Member::find($inv->user_id);
                // save into member_transaction
                $a = route('orders_receipt', ['download' => 'pdf', 'id' => $id]);

                $mem_transaction = MemberTransaction::create([
                    'module' => 'Order Payment',
                    'module_id' => $inv->id,
                    'member_id' => $inv->user_id,
                    'name' => 'Order Payment with reference ' . $inv->reference_no,
                    'transaction_prefix' => $inv->reference_no,
                    'type' => 'Payment',
                    'amount' => $inv->due_amount,
                    'debit' => $inv->due_amount,
                    'total_balance' => $member->balance - $inv->due_amount,
                    'date' => date('Y-m-d', strtotime($inv->invoice_date)),
                    'paid_by' => $inv->client_id,
                    'status' => 'paid',
                    'notes' => 'This payment is for order payment. The Reference is ' . $inv->reference_no . ' by Member ' . $member->full_name,
                    'link' => $a,
                    'added_by' => auth()->user()->added_by,
                ]);
            }

            if ($inv->user_type == 'Visitor') {
                $supp = Visitor::find($inv->user_id);
                $user = $supp->first_name . ' ' . $supp->last_name;
                $income = AccountCodes::where('account_name', 'Receivables Control')->first();

                Visitor::find($inv->user_id)->update(['balance' => $supp->balance - $inv->due_amount]);
            } elseif ($inv->user_type == 'Member') {
                $supp = Member::find($inv->user_id);
                $user = $supp->full_name;
                $income = AccountCodes::where('account_name', 'Receivables Control')->first();
                Member::find($inv->user_id)->update(['balance' => $supp->balance - $inv->due_amount]);
            }

            $cr = AccountCodes::where('account_name', 'Bar Drinking Sales')->first();
            $journal = new JournalEntry();
            $journal->account_id = $cr->id;
            $date = explode('-', $inv->invoice_date);
            $journal->date = $inv->invoice_date;
            $journal->year = $date[0];
            $journal->month = $date[1];
            $journal->transaction_type = 'orders';
            $journal->name = 'Orders';
            $journal->credit = $inv->invoice_amount * $inv->exchange_rate;
            $journal->income_id = $inv->id;

            if ($inv->user_type == 'Visitor') {
                $journal->visitor_id = $inv->user_id;
            } elseif ($inv->user_type == 'Member') {
                $journal->member_id = $inv->user_id;
            }

            $journal->currency_code = $inv->exchange_code;
            $journal->exchange_rate = $inv->exchange_rate;
            $journal->added_by = auth()->user()->added_by;
            $journal->notes = 'Sales for Invoice No ' . $inv->reference_no . ' to Client ' . $user;
            $journal->save();

            if ($inv->invoice_tax > 0) {
                $tax = AccountCodes::where('account_name', 'VAT OUT')->first();
                $journal = new JournalEntry();
                $journal->account_id = $tax->id;
                $date = explode('-', $inv->invoice_date);
                $journal->date = $inv->invoice_date;
                $journal->year = $date[0];
                $journal->month = $date[1];
                $journal->transaction_type = 'orders';
                $journal->name = 'Orders';
                $journal->credit = $inv->invoice_tax * $inv->exchange_rate;
                $journal->income_id = $inv->id;

                if ($inv->user_type == 'Visitor') {
                    $journal->visitor_id = $inv->user_id;
                } elseif ($inv->user_type == 'Member') {
                    $journal->member_id = $inv->user_id;
                }
                $journal->currency_code = $inv->exchange_code;
                $journal->exchange_rate = $inv->exchange_rate;
                $journal->added_by = auth()->user()->added_by;
                $journal->notes = 'Sales Tax for Invoice No ' . $inv->reference_no . ' to Client ' . $user;
                $journal->save();
            }

            $journal = new JournalEntry();
            $journal->account_id = $income->id;
            $date = explode('-', $inv->invoice_date);
            $journal->date = $inv->invoice_date;
            $journal->year = $date[0];
            $journal->month = $date[1];
            $journal->transaction_type = 'orders';
            $journal->name = 'Orders';
            $journal->income_id = $inv->id;

            if ($inv->user_type == 'Visitor') {
                $journal->visitor_id = $inv->user_id;
            } elseif ($inv->user_type == 'Member') {
                $journal->member_id = $inv->user_id;
            }

            $journal->debit = $inv->due_amount * $inv->exchange_rate;
            $journal->currency_code = $inv->exchange_code;
            $journal->exchange_rate = $inv->exchange_rate;
            $journal->added_by = auth()->user()->added_by;
            $journal->notes = 'Receivables for Sales Invoice No ' . $inv->reference_no . ' to Client ' . $user;
            $journal->save();

            //invoice payment

            $sales = Order::find($inv->id);
            $method = Payment_methodes::where('name', 'Cash')->first();

            $count = OrderPayments::count();
            $pro = $count + 1;

            $receipt['trans_id'] = 'TRANS_ORD_' . $pro;
            $receipt['invoice_id'] = $inv->id;
            $receipt['account_id'] = $request->account_id;
            $receipt['amount'] = $inv->due_amount;
            $receipt['date'] = $inv->invoice_date;
            $receipt['payment_method'] = $method->id;
            $receipt['added_by'] = auth()->user()->added_by;

            //update due amount from invoice table
            $b['due_amount'] = 0;
            $b['status'] = 3;

            $sales->update($b);

            $payment = OrderPayments::create($receipt);

            /*
  
               $codes= AccountCodes::where('account_name','Receivables Control')->first();
            $journal = new JournalEntry();
          $journal->account_id =$codes->id;
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
          
  */

            Toastr::success('Order Updated Successfully', 'Success');
            return redirect(route('orders.index'));
        } else {
            $invoice = Order::find($id);

            $old = OrderItem::where('invoice_id', $id)->get();

            foreach ($old as $o) {
                $oinv = Items::where('id', $o->item_name)->first();
                $oloc = Location::where('id', $invoice->location)->first();
                $ocr = $o->due_quantity / $oinv->bottle;
                $ocq = round($ocr, 1);
                $olq['crate'] = $oloc->crate + $ocq;
                $olq['bottle'] = $oloc->bottle + $o->due_quantity;
                Location::where('id', $invoice->location)->update($olq);
            }

            $data['user_id'] = $request->user_id;
            $data['user_type'] = $request->user_type;
            $data['invoice_date'] = date('Y-m-d');
            $data['location'] = $request->location;
            $data['account_id'] = $request->account_id;
            $data['exchange_code'] = $request->exchange_code;
            $data['exchange_rate'] = $request->exchange_rate;
            $data['notes'] = $request->notes;
            $data['invoice_amount'] = '1';
            $data['due_amount'] = '1';
            $data['invoice_tax'] = '1';
            $data['created_by'] = auth()->user()->id;
            $data['added_by'] = auth()->user()->added_by;

            $invoice->update($data);

            $amountArr = str_replace(',', '', $request->amount);
            $totalArr = str_replace(',', '', $request->tax);

            $nameArr = $request->item_name;
            $qtyArr = $request->quantity;
            $priceArr = $request->price;
            $rateArr = $request->tax_rate;
            $typeArr = $request->type;
            $costArr = str_replace(',', '', $request->total_cost);
            $taxArr = str_replace(',', '', $request->total_tax);
            $remArr = $request->removed_id;
            $expArr = $request->saved_items_id;
            $savedArr = $request->item_name;

            $cost['invoice_amount'] = 0;
            $cost['invoice_tax'] = 0;

            if (!empty($remArr)) {
                for ($i = 0; $i < count($remArr); $i++) {
                    if (!empty($remArr[$i])) {
                        OrderItem::where('id', $remArr[$i])->delete();
                    }
                }
            }

            if (!empty($nameArr)) {
                for ($i = 0; $i < count($nameArr); $i++) {
                    if (!empty($nameArr[$i])) {
                        $cost['invoice_amount'] += $costArr[$i];
                        $cost['invoice_tax'] += $taxArr[$i];

                        $items = [
                            'type' => 'Bar',
                            'item_name' => $nameArr[$i],
                            'quantity' => $qtyArr[$i],
                            'due_quantity' => $qtyArr[$i],
                            'tax_rate' => $rateArr[$i],
                            'price' => $priceArr[$i],
                            'total_cost' => $costArr[$i],
                            'total_tax' => $taxArr[$i],
                            'items_id' => $savedArr[$i],
                            'order_no' => $i,
                            'added_by' => auth()->user()->added_by,
                            'invoice_id' => $id,
                        ];

                        if (!empty($expArr[$i])) {
                            OrderItem::where('id', $expArr[$i])->update($items);
                        } else {
                            OrderItem::create($items);
                        }
                    }
                }
                // $cost['due_amount'] = $cost['invoice_amount'] + $cost['invoice_tax'];
                
                $cost['due_amount'] = $cost['invoice_amount'];
                
                Order::where('id', $id)->update($cost);
            }

            InvoiceHistory::where('invoice_id', $id)->delete();

            if (!empty($nameArr)) {
                for ($i = 0; $i < count($nameArr); $i++) {
                    $saved = Items::find($savedArr[$i]);

                    $lists = [
                        'quantity' => $qtyArr[$i],
                        'item_id' => $savedArr[$i],
                        'added_by' => auth()->user()->added_by,
                        'client_id' => $request->user_id,
                        'invoice_date' => $data['invoice_date'],
                        'location' => $data['location'],
                        'type' => 'Sales',
                        'invoice_id' => $invoice->id,
                    ];

                    InvoiceHistory::create($lists);

                    //$inv=Items::where('id',$nameArr[$i])->first();
                    // $q=$inv->quantity - $qtyArr[$i];
                    //Items::where('id',$nameArr[$i])->update(['quantity' => $q]);

                    $loc = Location::where('id', $data['location'])->first();
                    $cr = $qtyArr[$i] / $saved->bottle;
                    $cq = round($cr, 1);
                    $lq['crate'] = $loc->crate - $cq;
                    $lq['bottle'] = $loc->bottle - $qtyArr[$i];
                    Location::where('id', $data['location'])->update($lq);
                }
            }

            Toastr::success('Order Updated Successfully', 'Success');
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
        $invoice = Order::find($id);

        $old = OrderItem::where('invoice_id', $id)->get();

        foreach ($old as $o) {
            $oinv = Items::where('id', $o->item_name)->first();
            $oloc = Location::where('id', $invoice->location)->first();
            $ocr = $o->due_quantity / $oinv->bottle;
            $ocq = round($ocr, 1);
            $olq['crate'] = $oloc->crate + $ocq;
            $olq['bottle'] = $oloc->bottle + $o->due_quantity;
            Location::where('id', $invoice->location)->update($olq);
        }

        InvoiceHistory::where('invoice_id', $id)->delete();
        OrderItem::where('invoice_id', $id)->delete();
        OrderPayments::where('invoice_id', $id)->delete();

        $invoice->delete();

        Toastr::success('Order Deleted Successfully', 'Success');
        return redirect(route('orders.index'));
    }

    public function cancel($id)
    {
        //
        $invoice = Order::find($id);
        $data['status'] = 4;
        $invoice->update($data);

        $old = OrderItem::where('invoice_id', $id)->get();

        foreach ($old as $o) {
            $oinv = Items::where('id', $o->item_name)->first();
            $oloc = Location::where('id', $invoice->location)->first();
            $ocr = $o->due_quantity / $oinv->bottle;
            $ocq = round($ocr, 1);
            $olq['crate'] = $oloc->crate + $ocq;
            $olq['bottle'] = $oloc->bottle + $o->due_quantity;
            Location::where('id', $invoice->location)->update($olq);
        }

        InvoiceHistory::where('invoice_id', $id)->delete();

        Toastr::success('Cancelled Successfully', 'Success');
        return redirect(route('orders.index'));
    }

    public function receive($id)
    {
        //
        $currency = Currency::all();
        $data = Order::find($id);
        $items = OrderItem::where('invoice_id', $id)->get();
        $type = 'receive';

        if ($data->user_type == 'Visitor') {
            $user = Visitor::where('status', '5')->get();
        } elseif ($data->user_type == 'Member') {
            $date = date('Y-m-d');
            $user = Member::where('disabled', 0)->where('due_date', '>=', $date)->get();
        }

        $date = date('Y-m-d');
        $user = Member::where('disabled', 0)->where('due_date', '>=', $date)->get();

        //$location=Location::where('added_by',auth()->user()->added_by)->where('main','0')->get();
        $location = Location::leftJoin('location_manager', 'locations.id', 'location_manager.location_id')
            ->where('locations.disabled', '0')
            ->where('locations.added_by', auth()->user()->added_by)
            ->where('location_manager.manager', auth()->user()->id)
            ->select('locations.*')
            ->orderBy('locations.created_at', 'asc')
            ->get();
        $bank_accounts = AccountCodes::where('account_group', 'Cash And Banks')->get();
        $currency = Currency::all();
        $name = Items::all();
        return view('restaurant.orders.index', compact('currency', 'data', 'id', 'items', 'type', 'location', 'bank_accounts', 'user', 'name'));
    }

    public function discountModal(Request $request)
    {
        $id = $request->id;
        $type = $request->modal_type;

        switch ($type) {
            case 'add':
                $name = Items::all();
                $data = Order::find($id);
                return view('restaurant.orders.item_modal', compact('id', 'name', 'data'));
                break;

            case 'edit':
                //dd($request->all());
                $type = $request->type[0];
                $name = $request->item_name[0];
                $qty = $request->quantity[0];
                $price = str_replace(',', '', $request->price[0]);
                $cost = $request->total_cost[0];
                $tax = $request->total_tax[0];
                $order = $request->no[0];
                $unit = $request->unit[0];
                $rate = $request->tax_rate[0];

                if (!empty($request->saved_items_id[0])) {
                    $saved = $request->saved_items_id[0];
                } else {
                    $saved = '';
                }

                if ($request->type[0] == 'Bar') {
                    $item = Items::all();
                } elseif ($request->type[0] == 'Kitchen') {
                    $item = Menu::where('status', '1')->get();
                }

                return view('restaurant.orders.edit_modal', compact('item', 'name', 'qty', 'price', 'cost', 'tax', 'unit', 'rate', 'order', 'type', 'saved'));
                break;

            default:
                break;
        }
    }

    public function add_order(Request $request)
    {
        $id = $request->id;
        $invoice = Order::find($id);

        $nameArr = $request->item_name;
        $qtyArr = $request->quantity;
        $priceArr = $request->price;
        $rateArr = $request->tax_rate;
        $typeArr = $request->type;
        $costArr = str_replace(',', '', $request->total_cost);
        $taxArr = str_replace(',', '', $request->total_tax);
        $expArr = $request->saved_items_id;
        $savedArr = $request->item_name;

        $invoice_amount = 0;
        $invoice_tax = 0;

        if (!empty($nameArr)) {
            for ($i = 0; $i < count($nameArr); $i++) {
                if (!empty($nameArr[$i])) {
                    $invoice_amount += $costArr[$i];
                    $invoice_tax += $taxArr[$i];

                    $items = [
                        'type' => 'Bar',
                        'item_name' => $nameArr[$i],
                        'quantity' => $qtyArr[$i],
                        'due_quantity' => $qtyArr[$i],
                        'tax_rate' => $rateArr[$i],
                        'price' => $priceArr[$i],
                        'total_cost' => $costArr[$i],
                        'total_tax' => $taxArr[$i],
                        'items_id' => $savedArr[$i],
                        'order_no' => $i,
                        'added_by' => auth()->user()->added_by,
                        'invoice_id' => $id,
                    ];

                    OrderItem::create($items);
                }
            }
            $cost['invoice_amount'] = $invoice->invoice_amount + $invoice_amount;
            $cost['invoice_tax'] = $invoice->invoice_tax + $invoice_tax;
            $cost['due_amount'] = $invoice->due_amount + $cost['invoice_amount'] + $cost['invoice_tax'];
            Order::where('id', $id)->update($cost);
        }

        if (!empty($nameArr)) {
            for ($i = 0; $i < count($nameArr); $i++) {
                $saved = Items::find($savedArr[$i]);

                $lists = [
                    'quantity' => $qtyArr[$i],
                    'item_id' => $savedArr[$i],
                    'added_by' => auth()->user()->added_by,
                    'client_id' => $invoice->user_id,
                    'invoice_date' => $invoice->invoice_date,
                    'location' => $invoice->location,
                    'type' => 'Sales',
                    'invoice_id' => $invoice->id,
                ];

                InvoiceHistory::create($lists);

                //$inv=Items::where('id',$nameArr[$i])->first();
                // $q=$inv->quantity - $qtyArr[$i];
                //Items::where('id',$nameArr[$i])->update(['quantity' => $q]);

                $loc = Location::where('id', $invoice->location)->first();
                $cr = $qtyArr[$i] / $saved->bottle;
                $cq = round($cr, 1);
                $lq['crate'] = $loc->crate - $cq;
                $lq['bottle'] = $loc->bottle - $qtyArr[$i];
                Location::where('id', $invoice->location)->update($lq);
            }
        }

        Toastr::success('Order Updated Successfully', 'Success');
        return redirect(route('orders.index'));
    }

    public function add_item(Request $request)
    {
        //dd($request->all());

        $data = $request->all();

        $list = '';
        $list1 = '';

        if ($request->checked_type[0] == 'Bar') {
            $type = 'Drinks';
            $type2 = 'Bar';

            $it = Items::where('id', $request->checked_item_name)->first();
            $a = $it->name;
        } elseif ($request->checked_type[0] == 'Kitchen') {
            $type = 'Food';
            $type2 = 'Kitchen';

            $it = Menu::where('id', $request->checked_item_name)->first();

            $a = $it->name;
        }

        $name = $request->checked_item_name[0];
        $qty = $request->checked_quantity[0];
        $price = str_replace(',', '', $request->checked_price[0]);
        $cost = $request->checked_total_cost[0];
        $tax = $request->checked_total_tax[0];
        $order = $request->checked_no[0];
        $unit = $request->checked_unit[0];
        $rate = $request->checked_tax_rate[0];

        if (!empty($request->saved_items_id[0])) {
            $saved = $request->saved_items_id[0];
        } else {
            $saved = '';
        }

        if (!empty($request->modal_type) && $request->modal_type == 'edit') {
            $list .= '<td>' . $a . '</td>';
            $list .= '<td>' . number_format($qty, 2) . '<div class=""> <span class="form-control-static errorslst' . $order . '" id="errors" style="text-align:center;color:red;"></span></div></td>';
            $list .= '<td>' . number_format($price, 2) . '</td>';
            $list .= '<td>' . $cost . '</td>';
            $list .= '<td>' . $tax . '</td>';
            if (!empty($saved)) {
                $list .= '<td><a class="list-icons-item text-info edit1" title="Check" href="javascript:void(0)" data-target="#appFormModal" data-toggle="modal" data-button_id="' . $order . '"><i class="icon-pencil7" style="font-size:18px;"></i></a>&nbsp&nbsp<a class="list-icons-item text-danger rem" title="Delete" href="javascript:void(0)" data-button_id="' . $order . '" value="' . $saved . '"><i class="icon-trash" style="font-size:18px;"></i></a></td>';
            } else {
                $list .= '<td><a class="list-icons-item text-info edit1" title="Check" href="javascript:void(0)" data-target="#appFormModal" data-toggle="modal" data-button_id="' . $order . '"><i class="icon-pencil7" style="font-size:18px;"></i></a>&nbsp&nbsp<a class="list-icons-item text-danger remove1" title="Delete" href="javascript:void(0)" data-button_id="' . $order . '"><i class="icon-trash" style="font-size:18px;"></i></a></td>';
            }

            $list1 .= '<input type="hidden" name="type[]" class="form-control item_type" id="type lst' . $order . '"  value="' . $type2 . '" required />';
            $list1 .= '<input type="hidden" name="item_name[]" class="form-control item_name" id="name lst' . $order . '"  value="' . $name . '" required />';
            $list1 .= '<input type="hidden" name="quantity[]" class="form-control item_quantity" id="qty lst' . $order . '"  data-category_id="lst' . $order . '" value="' . $qty . '" required />';
            $list1 .= '<input type="hidden" name="price[]" class="form-control item_price" id="price lst' . $order . '" value="' . $price . '" required />';
            $list1 .= '<input type="hidden" name="tax_rate[]" class="form-control item_rate" id="rate lst' . $order . '" value="' . $rate . '" required />';
            $list1 .= '<input type="hidden" name="total_cost[]" class="form-control item_cost" id="cost lst' . $order . '"  value="' . $cost . '" required />';
            $list1 .= '<input type="hidden" name="total_tax[]" class="form-control item_tax" id="tax lst' . $order . '"  value="' . $tax . '" required />';
            $list1 .= '<input type="hidden" name="unit[]" class="form-control item_unit" id="unit lst' . $order . '"  value="' . $unit . '"  />';
            $list1 .= '<input type="hidden" name="modal_type" class="form-control item_type" id="type lst' . $order . '"  value="edit"  />';
            $list1 .= '<input type="hidden" name="no[]" class="form-control item_type" id="no lst' . $order . '"  value="' . $order . '"  />';
            $list1 .= '<input type="hidden"  class="form-control item_idlst' . $order . '" id="item_id "  value="' . $name . '"  />';
            $list1 .= '<input type="hidden" class="form-control type_idlst' . $order . '" id="type_id"  value="' . $type2 . '" required />';

            if (!empty($saved)) {
                $list1 .= '<input type="hidden" name="saved_items_id[]" class="form-control item_saved' . $order . '" value="' . $saved . '"  required/>';
            }
        } else {
            $list .= '<tr class="trlst' . $order . '">';
            $list .= '<td>' . $a . '</td>';
            $list .= '<td>' . number_format($qty, 2) . '<div class=""> <span class="form-control-static errorslst' . $order . '" id="errors" style="text-align:center;color:red;"></span></div></td>';
            $list .= '<td>' . number_format($price, 2) . '</td>';
            $list .= '<td>' . $cost . '</td>';
            $list .= '<td>' . $tax . '</td>';
            $list .= '<td><a class="list-icons-item text-info edit1" title="Check" href="javascript:void(0)" data-target="#appFormModal" data-toggle="modal" data-button_id="' . $order . '"><i class="icon-pencil7" style="font-size:18px;"></i></a>&nbsp&nbsp<a class="list-icons-item text-danger remove1" title="Delete" href="javascript:void(0)" data-button_id="' . $order . '"><i class="icon-trash" style="font-size:18px;"></i></a></td>';
            $list .= '</tr>';

            $list1 .= '<div class="line_items" id="lst' . $order . '">';
            $list1 .= '<input type="hidden" name="type[]" class="form-control item_type" id="type lst' . $order . '"  value="' . $type2 . '" required />';
            $list1 .= '<input type="hidden" name="item_name[]" class="form-control item_name" id="name lst' . $order . '"  value="' . $name . '" required />';
            $list1 .= '<input type="hidden" name="quantity[]" class="form-control item_quantity" id="qty lst' . $order . '"  data-category_id="lst' . $order . '" value="' . $qty . '" required />';
            $list1 .= '<input type="hidden" name="price[]" class="form-control item_price" id="price lst' . $order . '" value="' . $price . '" required />';
            $list1 .= '<input type="hidden" name="tax_rate[]" class="form-control item_rate" id="rate lst' . $order . '" value="' . $rate . '" required />';
            $list1 .= '<input type="hidden" name="total_cost[]" class="form-control item_cost" id="cost lst' . $order . '"  value="' . $cost . '" required />';
            $list1 .= '<input type="hidden" name="total_tax[]" class="form-control item_tax" id="tax lst' . $order . '"  value="' . $tax . '" required />';
            $list1 .= '<input type="hidden" name="unit[]" class="form-control item_unit" id="unit lst' . $order . '"  value="' . $unit . '"  />';
            $list1 .= '<input type="hidden" name="modal_type" class="form-control item_type" id="type lst' . $order . '"  value="edit"  />';
            $list1 .= '<input type="hidden" name="no[]" class="form-control item_type" id="no lst' . $order . '"  value="' . $order . '"  />';
            $list1 .= '<input type="hidden"  class="form-control item_idlst' . $order . '" id="item_id "  value="' . $name . '"  />';
            $list1 .= '<input type="hidden" class="form-control type_idlst' . $order . '" id="type_id"  value="' . $type2 . '" required />';
            $list1 .= '</div>';
        }

        return response()->json([
            'list' => $list,
            'list1' => $list1,
        ]);
    }

    public function orders_pdfview(Request $request)
    {
        //
        $invoices = Order::find($request->id);
        $invoice_items = OrderItem::where('invoice_id', $request->id)->get();

        view()->share(['invoices' => $invoices, 'invoice_items' => $invoice_items]);

        if ($request->has('download')) {
            $pdf = PDF::loadView('restaurant.orders.order_details_pdf')->setPaper('a4', 'potrait');
            return $pdf->download('ORDER INV NO # ' . $invoices->reference_no . '.pdf');
        }
        return view('inv_pdfview');
    }

    public function orders_receipt(Request $request)
    {
        //if landscape heigth * width but if portrait widht *height      // dd($dataResult);
        //$customPaper = array(0,0,198.425,530.80);
        $customPaper = [0, 0, 198.425, 500.8];

        $invoices = Order::find($request->id);
        $invoice_items = OrderItem::where('invoice_id', $request->id)->get();
        $member = MemberTransaction::where('module_id', $request->id)
            ->where('module', 'Order Payment')
            ->first();

        view()->share(['invoices' => $invoices, 'invoice_items' => $invoice_items, 'member' => $member]);

        if ($request->has('download')) {
            $pdf = PDF::loadView('restaurant.orders.order_receipt_pdf')->setPaper($customPaper, 'portrait');
            return $pdf->download('ORDER RECEIPT INV NO # ' . $invoices->reference_no . '.pdf');
        }
        return view('orders_receipt');
    }

    public function findUser(Request $request)
    {
        if ($request->id == 'Visitor') {
            $district = Visitor::where('status', '5')->get();
        } elseif ($request->id == 'Member') {
            $date = date('Y-m-d');
            $district = Member::where('disabled', 0)->where('due_date', '>=', $date)->get();
        }

        return response()->json($district);
    }

    public function showType(Request $request)
    {
        if ($request->id == 'Bar') {
            $item = Items::all();
        } elseif ($request->id == 'Kitchen') {
            $item = Menu::where('status', '1')->get();
        }

        return response()->json($item);
    }

    public function findPrice(Request $request)
    {
        if ($request->type == 'Bar') {
            $price = Items::where('id', $request->id)->get();
        } elseif ($request->type == 'Kitchen') {
            $price = Menu::where('id', $request->id)->get();
        }

        return response()->json($price);
    }

    public function findQuantity(Request $request)
    {
        $item = $request->item;
        $type = $request->type;
        $location = $request->location;

        if ($type == 'Bar') {
            $item_info = Items::where('id', $item)->first();
            $location_info = Location::find($request->location);

            if ($item_info->quantity > 0) {
                $due = PurchaseHistory::where('item_id', $item)
                    ->where('location', $location)
                    ->where('type', 'Purchases')
                    ->where('added_by', auth()->user()->added_by)
                    ->sum('quantity');
                $return = PurchaseHistory::where('item_id', $item)
                    ->where('location', $location)
                    ->where('type', 'Debit Note')
                    ->where('added_by', auth()->user()->added_by)
                    ->sum('quantity');

                $rgood = GoodIssueItem::where('item_id', $item)
                    ->where('location', $location)
                    ->where('status', 1)
                    ->where('added_by', auth()->user()->added_by)
                    ->sum('quantity');
                $good = GoodIssueItem::where('item_id', $item)
                    ->where('start', $location)
                    ->where('status', 1)
                    ->where('added_by', auth()->user()->added_by)
                    ->sum('quantity');

                $sqty = InvoiceHistory::where('item_id', $item)
                    ->where('location', $location)
                    ->where('type', 'Sales')
                    ->where('added_by', auth()->user()->added_by)
                    ->sum('quantity');
                $cn = InvoiceHistory::where('item_id', $item)
                    ->where('location', $location)
                    ->where('type', 'Credit Note')
                    ->where('added_by', auth()->user()->added_by)
                    ->sum('quantity');

                $qty = $due - $return;
                $tqty = $qty * $item_info->bottle;
                $inv = $sqty - $cn;

                $b = $tqty + $rgood * $item_info->bottle - $good * $item_info->bottle - $inv;
                $balance = floor($b);

                //dd($balance);

                if ($balance > 0) {
                    if ($request->id > $balance) {
                        $price = 'You have exceeded your Stock. Choose quantity between 1.00 and ' . number_format($balance, 2);
                    } elseif ($request->id <= 0) {
                        $price = 'Choose quantity between 1.00 and ' . number_format($balance, 2);
                    } else {
                        $price = '';
                    }
                } else {
                    $price = $location_info->name . ' Stock Balance  is Zero.';
                }
            } else {
                $price = 'Your Stock Balance is Zero.';
            }
        } elseif ($type == 'Kitchen') {
            if ($request->id <= 0) {
                $price = 'You cannot chose quantity below zero';
            } else {
                $price = '';
            }
        }

        return response()->json($price);
    }

    public function findAmount(Request $request)
    {
        if ($request->type == 'Visitor') {
            $data = Visitor::find($request->user);
        } elseif ($request->type == 'Member') {
            $data = Member::find($request->user);
        }

        $amount = str_replace(',', '', $request->id);
        if ($data->balance > 0) {
            if ($amount > $data->balance) {
                $price = 'You have exceeded your Balance. Your Current Balance is ' . number_format($data->balance, 2);
            } else {
                $price = '';
            }
        } else {
            $price = 'Your Current Balance is Zero.';
        }

        return response()->json($price);
    }
}
