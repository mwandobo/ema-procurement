<?php

namespace App\Http\Controllers\Bar\POS;

use App\Http\Controllers\Controller;
use App\Models\Accounting\AccountCodes;
use App\Models\Accounting\JournalEntry;
use App\Models\Currency;
use App\Models\Inventory;
use App\Models\Inventory\Location as InventoryLocation;
use App\Models\InventoryHistory;
use App\Models\Bar\POS\InvoiceHistory;
use App\Models\Bar\POS\SupplierOrder;
use App\Models\Bar\POS\PurchaseReceive;
use App\Models\Bar\POS\PurchaseHistory;
use App\Models\Bar\POS\PurchasePayments;
use App\Models\Bar\POS\Activity;
use App\Models\Location;
use App\Models\Payments\Payment_methodes;
use App\Models\PurchaseInventory;
use App\Models\PurchaseItemInventory;
use App\Models\Supplier;
use App\Models\InventoryList;
use App\Models\ServiceType;
use App\Models\Bar\POS\Purchase;
use App\Models\Bar\POS\PurchaseItems;
use App\Models\Bar\POS\Items;
use App\Models\Bar\POS\Batches;
use App\Models\Bar\POS\Costing;

use Carbon\Carbon;


use App\Models\Bar\POS\Stocks;
use App\Models\Bar\POS\PurchaseOrderTracking;
use App\Models\Bar\POS\PurchaseSupplierInvoice;
use App\Models\Bar\POS\PurchaseSupplierInvoicePayment;
use App\Models\Bar\POS\SupplierInvoiceExpenses;
use App\Models\Bar\POS\SupplierClearingItem;
use App\Models\User;
// use PDF;
use App\Models\MechanicalItem;
use App\Models\MechanicalRecommedation;
use App\Models\Bar\POS\EmptyHistory;
use App\Models\Bar\POS\Supplier as POSSupplier;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $currency = Currency::all();
        $purchases = Purchase::all()->where('order_status', 1);
        $supplier = Supplier::all();
        $name = Items::all();
        //$location = InventoryLocation::where('main','1')->get();;
        $location = InventoryLocation::where('main', '1')->where('disabled', '0')->get();;
        $type = "";
        return view('bar.pos.purchases.index', compact('name', 'supplier', 'currency', 'purchases', 'location', 'type'));
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

        $count = Purchase::count();
        $pro = $count + 1;
        $data['reference_no'] = "P0" . $pro;
        $data['supplier_id'] = $request->supplier_id;
        $data['purchase_date'] = $request->purchase_date;
        $data['due_date'] = $request->due_date;
        $data['location'] = $request->location;
        $data['exchange_code'] = $request->exchange_code;
        $data['exchange_rate'] = $request->exchange_rate;
        $data['purchase_amount'] = '1';
        $data['due_amount'] = '1';
        $data['purchase_tax'] = '1';
        $data['status'] = '0';
        $data['good_receive'] = '0';
        $data['purchase_costing'] = 0;

        $data['added_by'] = auth()->user()->added_by;

        $purchase = Purchase::create($data);

        $amountArr = str_replace(",", "", $request->amount);
        $totalArr =  str_replace(",", "", $request->tax);

        $nameArr = $request->item_name;
        $qtyArr = $request->quantity;
        $priceArr = $request->price;
        $rateArr = $request->tax_rate;
        $unitArr = $request->unit;
        $costArr = str_replace(",", "", $request->total_cost);
        $taxArr =  str_replace(",", "", $request->total_tax);


        $savedArr = $request->item_name;

        $cost['purchase_amount'] = 0;
        $cost['purchase_tax'] = 0;
        $cost['total_quantity'] = 0;

        if (!empty($nameArr)) {
            for ($i = 0; $i < count($nameArr); $i++) {
                if (!empty($nameArr[$i])) {
                    $cost['purchase_amount'] += $costArr[$i];
                    $cost['purchase_tax'] += $taxArr[$i];
                    $cost['total_quantity'] += $qtyArr[$i];

                    $items = array(
                        'item_name' => $nameArr[$i],
                        'quantity' =>   $qtyArr[$i],
                        'due_quantity' =>   $qtyArr[$i],
                        'tax_rate' =>  $rateArr[$i],
                        'unit' => $unitArr[$i],
                        'price' =>  $priceArr[$i],
                        'total_cost' =>  $costArr[$i],
                        'total_tax' =>   $taxArr[$i],
                        'items_id' => $savedArr[$i],
                        'order_no' => $i,
                        'added_by' => auth()->user()->added_by,
                        'purchase_id' => $purchase->id
                    );

                    PurchaseItems::create($items);;
                }
            }
            //$cost['reference_no']= "PUR-".$purchase->id."-".$data['purchase_date'];
            $cost['due_amount'] =  $cost['purchase_amount'] + $cost['purchase_tax'];
            $cost['due_quantity'] =  $cost['total_quantity'];
        }

        Purchase::find($purchase->id)->update($cost);;

        if (!empty($purchase)) {
            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $purchase->id,
                    'module' => 'Purchase',
                    'activity' => "Purchase with reference no " .  $purchase->reference_no . "  is Created",
                ]
            );
        }

        return redirect(route('bar_purchase.show', $purchase->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        //
        $purchases = Purchase::find($id);
        $purchase_items = PurchaseItems::where('purchase_id', $id)->where('due_quantity', '>', '0')->get();
        $payments = PurchasePayments::where('purchase_id', $id)->get();
        $name = Items::all();
        $items = Items::select('name', 'item_code')->get();
        $supplier = Supplier::all();
        $currency = Currency::all();
        $location = InventoryLocation::where('disabled', '0')->where('main', 1)->get();
        $orders = SupplierOrder::where('purchase_id', $id)->get();
        $old = SupplierOrder::where('purchase_id', $id)->where('status', '1')->first();

        switch ($request->type) {
            case 'receive':
                return view('bar.pos.purchases.item_details', compact('currency','purchases', 'items', 'purchase_items', 'payments', 'id', 'name'));
                break;
            case 'supplier_invoice':
                return view('bar.pos.purchases.purchase_supplier_invoice', compact('currency','purchases', 'items', 'purchase_items', 'payments', 'id', 'name'));
                break;    
            case 'costing':
                return view('bar.pos.purchases.costing_item_details', compact('purchases', 'purchase_items', 'items', 'payments', 'id', 'name'));
                break;
            case 'order':
                return view('bar.pos.purchases.create_order', compact('purchases', 'purchase_items', 'payments', 'items', 'id', 'name', 'supplier', 'location'));
                break;
            case 'supplier':
                return view('bar.pos.purchases.confirm_supplier', compact('purchases', 'purchase_items', 'items', 'payments', 'id', 'name', 'supplier', 'location', 'orders', 'old'));
                break;
            default:
                if ($purchases->order_status == '1') {
                    return view('bar.pos.purchases.purchase_details', compact('purchases', 'purchase_items', 'items', 'payments'));
                } else {
                    return view('bar.pos.purchases.order_details', compact('purchases', 'purchase_items', 'items', 'payments', 'orders'));
                }
        }
    }

    
    public function store_costing_items_batches(Request $request)
    {

        $purchase = Purchase::where('id', $request->purchase_id)->first();

        // dd($purchase);

        $nameArr = $request->purchase_items_id;
        $priceArr = $request->price;
        $expiryArr = $request->expiry_date;
        // $descriptionArr =  $request->description;

        // dd($nameArr);

        $savedArr = $request->purchase_items_id;


        $cost['purchase_costing'] = 1;

        if (!empty($nameArr)) {
            for ($i = 0; $i < count($nameArr); $i++) {
                if (!empty($nameArr[$i])) {


                    $saved = Items::find($savedArr[$i]);

                    $pro = Batches::count();

                    $pro = $pro + 1;


                    // dd($saved);


                    $purchase_item = PurchaseItems::where('purchase_id', $purchase->id)->where('items_id', $saved->id)->first();

                    $purch_qnt = PurchaseReceive::where('purchase_id', $purchase->id)->where('item_id', $saved->id)->sum('quantity');

                    $lists = array(
                        'item_id' => $savedArr[$i],
                        'item_name' => $saved->name,
                        'batch_code' => $saved->name . " - BT0" . $pro,
                        'purchase_price' => $purchase_item->total_cost,
                        'selling_price' => $priceArr[$i],
                        'quantity' =>   $purch_qnt,
                        'unit' => $purchase_item->unit,
                        // 'description' => $descriptionArr,
                        'date' => $purchase->purchase_date,
                        'expiry_date' => $expiryArr[$i],
                        'purchase_id' => $purchase->id,
                        'user_id' => auth()->user()->id,
                        'added_by' => auth()->user()->added_by
                    );

                    $batch_mm =  Batches::create($lists);

                    $locv = InventoryLocation::where('main', 1)->first();


                    $stock_batch = array(
                        'store_id' => $locv->id,
                        'batch_id' => $batch_mm->id,
                        'batch_code' => $batch_mm->batch_code,
                        'quantity' => $batch_mm->quantity,
                        'status' => $request->status,
                        'user_id' => auth()->user()->id,
                        'added_by' => auth()->user()->added_by
                    );

                    Stocks::create($stock_batch);
                }
            }

            $purchase->update($cost);
        }

        Toastr::success('Purchase Costing updated Successfully', 'Success');
        return redirect(route('bar_purchase.index'));
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
        $currency = Currency::all();
        $supplier = Supplier::all();
        $name = Items::all();
        //$location = InventoryLocation::where('added_by',auth()->user()->added_by)->where('main','1')->get();;
        $location = InventoryLocation::where('main', '1')->where('disabled', '0')->get();;
        $data = Purchase::find($id);
        $items = PurchaseItems::where('purchase_id', $id)->get();

        // dd($items);
        $type = "";
        return view('bar.pos.purchases.purchase_requisition', compact('name', 'supplier', 'currency', 'location', 'data', 'id', 'items', 'type'));
    
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

        if ($request->type == 'receive') {
            $purchase = Purchase::find($id);
            $data['supplier_id'] = $request->supplier_id;
            $data['purchase_date'] = $request->purchase_date;
            $data['due_date'] = $request->due_date;
            $data['location'] = $request->location;
            $data['exchange_code'] = $request->exchange_code;
            $data['exchange_rate'] = $request->exchange_rate;
            //$data['reference_no']="PUR-".$id."-".$data['purchase_date'];
            $data['purchase_amount'] = '1';
            $data['due_amount'] = '1';
            $data['purchase_tax'] = '1';
            $data['good_receive'] = '1';
            $data['added_by'] = auth()->user()->added_by;

            $purchase->update($data);

            $amountArr = str_replace(",", "", $request->amount);
            $totalArr =  str_replace(",", "", $request->tax);

            $nameArr = $request->item_name;
            $qtyArr = $request->quantity;
            $priceArr = $request->price;
            $rateArr = $request->tax_rate;
            $unitArr = $request->unit;
            $costArr = str_replace(",", "", $request->total_cost);
            $taxArr =  str_replace(",", "", $request->total_tax);
            $remArr = $request->removed_id;
            $expArr = $request->saved_items_id;
            $savedArr = $request->item_name;

            $cost['purchase_amount'] = 0;
            $cost['purchase_tax'] = 0;

            if (!empty($remArr)) {
                for ($i = 0; $i < count($remArr); $i++) {
                    if (!empty($remArr[$i])) {
                        PurchaseItems::where('id', $remArr[$i])->delete();
                    }
                }
            }

            if (!empty($nameArr)) {
                for ($i = 0; $i < count($nameArr); $i++) {
                    if (!empty($nameArr[$i])) {
                        $cost['purchase_amount'] += $costArr[$i];
                        $cost['purchase_tax'] += $taxArr[$i];

                        $items = array(
                            'item_name' => $nameArr[$i],
                            'quantity' =>   $qtyArr[$i],
                            'due_quantity' =>   $qtyArr[$i],
                            'tax_rate' =>  $rateArr[$i],
                            'unit' => $unitArr[$i],
                            'price' =>  $priceArr[$i],
                            'total_cost' =>  $costArr[$i],
                            'total_tax' =>   $taxArr[$i],
                            'items_id' => $savedArr[$i],
                            'order_no' => $i,
                            'added_by' => auth()->user()->added_by,
                            'purchase_id' => $id
                        );

                        if (!empty($expArr[$i])) {
                            PurchaseItems::where('id', $expArr[$i])->update($items);
                        } else {
                            PurchaseItems::create($items);
                        }

                        // if(!empty($qtyArr[$i])){
                        // for($x = 1; $x <= $qtyArr[$i]; $x++){    
                        // $name=Inventory::where('id', $savedArr[$i])->first();
                        // $dt=date('Y',strtotime($data['purchase_date']));
                        //$lists = array(
                        //'serial_no' => $name->name."_" .$id."_".$x."_" .$dt,                      
                        //'brand_id' => $savedArr[$i],
                        // 'added_by' => auth()->user()->added_by,
                        // 'purchase_id' =>   $id,
                        // 'purchase_date' =>  $data['purchase_date'],
                        //  'location' => $data['location'],
                        // 'status' => '0');


                        //InventoryList::create($lists);   

                        //}
                        //}


                    }
                }
                $cost['due_amount'] =  $cost['purchase_amount'] + $cost['purchase_tax'];
                Purchase::where('id', $id)->update($cost);
            }



            if (!empty($nameArr)) {
                for ($i = 0; $i < count($nameArr); $i++) {
                    if (!empty($nameArr[$i])) {

                        $saved = Items::find($savedArr[$i]);

                        $lists = array(
                            'quantity' =>   $qtyArr[$i],
                            'item_id' => $savedArr[$i],
                            'added_by' => auth()->user()->added_by,
                            'supplier_id' => $data['supplier_id'],
                            'location' =>    $data['location'],
                            'purchase_date' =>  $data['purchase_date'],
                            'type' =>   'Purchases',
                            'purchase_id' => $id
                        );

                        PurchaseHistory::create($lists);

                        $inv = Items::where('id', $nameArr[$i])->first();
                        $q = $inv->quantity + $qtyArr[$i];
                        Items::where('id', $nameArr[$i])->update(['quantity' => $q]);

                        $loc = InventoryLocation::where('id', $data['location'])->first();
                        $lq['crate'] = $loc->crate + $qtyArr[$i];
                        $lq['bottle'] = $loc->bottle + ($qtyArr[$i] * $saved->bottle);
                        InventoryLocation::where('id', $data['location'])->update($lq);
                    }
                }
            }




            if (!empty($nameArr)) {
                for ($i = 0; $i < count($nameArr); $i++) {
                    $saved = Items::find($savedArr[$i]);
                    if ($saved->empty == '1') {

                        $pur_items = array(
                            'item_id' => $savedArr[$i],
                            'purpose' =>  'Purchase Empty',
                            'purchase_id' => $id,
                            'date' =>  $data['purchase_date'],
                            'has_empty' =>    $saved->empty,
                            'description' => $saved->description,
                            'empty_in_purchase' => $qtyArr[$i],
                            'purchase_case' => $qtyArr[$i],
                            'purchase_bottle' => $qtyArr[$i] * $saved->bottle,
                            'added_by' => auth()->user()->added_by
                        );


                        EmptyHistory::create($pur_items);
                    }
                }
            }


            $inv = Purchase::find($id);
            $supp = Supplier::find($inv->supplier_id);
            $cr = AccountCodes::where('account_name', 'Bar Stock')->first();
            $journal = new JournalEntry();
            $journal->account_id = $cr->id;
            $date = explode('-', $inv->purchase_date);
            $journal->date =   $inv->purchase_date;
            $journal->year = $date[0];
            $journal->month = $date[1];
            $journal->transaction_type = 'pos_purchase';
            $journal->name = 'Purchases';
            $journal->debit = $inv->purchase_amount *  $inv->exchange_rate;
            $journal->income_id = $inv->id;
            $journal->supplier_id = $inv->supplier_id;
            $journal->currency_code =  $inv->exchange_code;
            $journal->exchange_rate = $inv->exchange_rate;
            $journal->added_by = auth()->user()->added_by;
            $journal->notes = "Purchase for Purchase Order " . $inv->reference_no . " by Supplier " . $supp->name;
            $journal->save();

            if ($inv->purchase_tax > 0) {
                $tax = AccountCodes::where('account_name', 'VAT IN')->first();
                $journal = new JournalEntry();
                $journal->account_id = $tax->id;
                $date = explode('-', $inv->purchase_date);
                $journal->date =   $inv->purchase_date;
                $journal->year = $date[0];
                $journal->month = $date[1];
                $journal->transaction_type = 'pos_purchase';
                $journal->name = 'Purchases';
                $journal->debit = $inv->purchase_tax *  $inv->exchange_rate;
                $journal->income_id = $inv->id;
                $journal->supplier_id = $inv->supplier_id;
                $journal->currency_code =  $inv->exchange_code;
                $journal->exchange_rate = $inv->exchange_rate;
                $journal->added_by = auth()->user()->added_by;
                $journal->notes = "Purchase Tax for Purchase Order " . $inv->reference_no . " by Supplier " .  $supp->name;
                $journal->save();
            }

            $codes = AccountCodes::where('account_name', 'Creditors Control Account')->first();
            $journal = new JournalEntry();
            $journal->account_id = $codes->id;
            $date = explode('-', $inv->purchase_date);
            $journal->date =   $inv->purchase_date;
            $journal->year = $date[0];
            $journal->month = $date[1];
            $journal->transaction_type = 'pos_purchase';
            $journal->name = 'Purchases';
            $journal->income_id = $inv->id;
            $journal->supplier_id = $inv->supplier_id;
            $journal->credit = $inv->due_amount *  $inv->exchange_rate;
            $journal->currency_code =  $inv->exchange_code;
            $journal->exchange_rate = $inv->exchange_rate;
            $journal->added_by = auth()->user()->added_by;
            $journal->notes = "Credit for Purchase Order  " . $inv->reference_no . " by Supplier " .  $supp->name;
            $journal->save();

            if (!empty($purchase)) {
                $activity = Activity::create(
                    [
                        'added_by' => auth()->user()->added_by,
                        'user_id' => auth()->user()->id,
                        'module_id' => $id,
                        'module' => 'Purchase',
                        'activity' => "Purchase with reference no " .  $purchase->reference_no . "  Goods Received",
                    ]
                );
            }


            return redirect(route('bar_purchase.show', $id));
        } else if ($request->type == 'approve') {
            $purchase = Purchase::find($id);
            $data['supplier_id'] = $request->supplier_id;
            $data['purchase_date'] = $request->purchase_date;
            $data['due_date'] = $request->due_date;
            $data['location'] = $request->location;
            $data['exchange_code'] = $request->exchange_code;
            $data['exchange_rate'] = $request->exchange_rate;
            $data['purchase_amount'] = '1';
            $data['due_amount'] = '1';
            $data['purchase_tax'] = '1';
            $data['added_by'] = auth()->user()->added_by;
            $data['approval_1'] = auth()->user()->id;
            $data['approval_1_date'] = date('Y-m-d');
            $data['status'] = 1;
            $data['purchase_status'] = 1;

            $purchase->update($data);

            $amountArr = str_replace(",", "", $request->amount);
            $totalArr =  str_replace(",", "", $request->tax);

            $nameArr = $request->item_name;
            $qtyArr = $request->quantity;
            $priceArr = $request->price;
            $rateArr = $request->tax_rate;
            $unitArr = $request->unit;
            $costArr = str_replace(",", "", $request->total_cost);
            $taxArr =  str_replace(",", "", $request->total_tax);
            $remArr = $request->removed_id;
            $expArr = $request->saved_items_id;
            $savedArr = $request->item_name;

            $cost['purchase_amount'] = 0;
            $cost['purchase_tax'] = 0;
            $cost['total_quantity'] = 0;

            if (!empty($remArr)) {
                for ($i = 0; $i < count($remArr); $i++) {
                    if (!empty($remArr[$i])) {
                        PurchaseItems::where('id', $remArr[$i])->delete();
                    }
                }
            }

            if (!empty($nameArr)) {
                for ($i = 0; $i < count($nameArr); $i++) {
                    if (!empty($nameArr[$i])) {
                        $cost['purchase_amount'] += $costArr[$i];
                        $cost['purchase_tax'] += $taxArr[$i];
                        $cost['total_quantity'] += $qtyArr[$i];
                        $items = array(
                            'item_name' => $nameArr[$i],
                            'quantity' =>   $qtyArr[$i],
                            'due_quantity' =>   $qtyArr[$i],
                            'tax_rate' =>  $rateArr[$i],
                            'unit' => $unitArr[$i],
                            'price' =>  $priceArr[$i],
                            'total_cost' =>  $costArr[$i],
                            'total_tax' =>   $taxArr[$i],
                            'items_id' => $savedArr[$i],
                            'order_no' => $i,
                            'added_by' => auth()->user()->added_by,
                            'purchase_id' => $id
                        );

                        if (!empty($expArr[$i])) {
                            PurchaseItems::where('id', $expArr[$i])->update($items);
                        } else {
                            PurchaseItems::create($items);
                        }
                    }
                }
                $cost['due_amount'] =  $cost['purchase_amount'] + $cost['purchase_tax'];
                $cost['due_quantity'] =  $cost['total_quantity'];
                Purchase::where('id', $id)->update($cost);
            }

            if (!empty($purchase)) {
                $p = Purchase::find($id);
                $user = User::find($p->approval_1);
                $activity = Activity::create(
                    [
                        'added_by' => auth()->user()->added_by,
                        'user_id' => auth()->user()->id,
                        'module_id' => $id,
                        'module' => 'Purchase',
                        'activity' => "First Approval of Purchase with reference no " .  $purchase->reference_no . " by " . $user->name,
                    ]
                );
            }

            //return redirect(route('bar_purchase.show',$id));

            Toastr::success('First Approval is Successfully', 'Success');
            return redirect(route('bar_purchase.order'));
        } 
        else {
            $purchase = Purchase::find($id);
            //$data['supplier_id']=$request->supplier_id;
            $data['purchase_date'] = $request->purchase_date;
            $data['due_date'] = $request->due_date;
            //$data['location']=$request->location;
            $data['exchange_code'] = $request->exchange_code;
            $data['exchange_rate'] = $request->exchange_rate;
            $data['purchase_amount'] = '1';
            $data['due_amount'] = '1';
            $data['purchase_tax'] = '1';
            $data['added_by'] = auth()->user()->added_by;

            $purchase->update($data);

            $amountArr = str_replace(",", "", $request->amount);
            $totalArr =  str_replace(",", "", $request->tax);

            $nameArr = $request->item_name;
            $qtyArr = $request->quantity;
            $priceArr = $request->price;
            $rateArr = $request->tax_rate;
            $unitArr = $request->unit;
            $costArr = str_replace(",", "", $request->total_cost);
            $taxArr =  str_replace(",", "", $request->total_tax);
            $remArr = $request->removed_id;
            $expArr = $request->saved_items_id;
            $savedArr = $request->item_name;

            $cost['purchase_amount'] = 0;
            $cost['purchase_tax'] = 0;
            $cost['total_quantity'] = 0;

            if (!empty($remArr)) {
                for ($i = 0; $i < count($remArr); $i++) {
                    if (!empty($remArr[$i])) {
                        PurchaseItems::where('id', $remArr[$i])->delete();
                    }
                }
            }

            if (!empty($nameArr)) {
                for ($i = 0; $i < count($nameArr); $i++) {
                    if (!empty($nameArr[$i])) {
                        $cost['purchase_amount'] += $costArr[$i];
                        $cost['purchase_tax'] += $taxArr[$i];
                        $cost['due_quantity'] =  $cost['total_quantity'];

                        $items = array(
                            'item_name' => $nameArr[$i],
                            'quantity' =>   $qtyArr[$i],
                            'due_quantity' =>   $qtyArr[$i],
                            'tax_rate' =>  $rateArr[$i],
                            'unit' => $unitArr[$i],
                            'price' =>  $priceArr[$i],
                            'total_cost' =>  $costArr[$i],
                            'total_tax' =>   $taxArr[$i],
                            'items_id' => $savedArr[$i],
                            'order_no' => $i,
                            'added_by' => auth()->user()->added_by,
                            'purchase_id' => $id
                        );

                        if (!empty($expArr[$i])) {
                            PurchaseItems::where('id', $expArr[$i])->update($items);
                        } else {
                            PurchaseItems::create($items);
                        }
                    }
                }
                $cost['due_amount'] =  $cost['purchase_amount'] + $cost['purchase_tax'];
                $cost['due_quantity'] =  $cost['total_quantity'];
                Purchase::where('id', $id)->update($cost);
            }

            if (!empty($purchase)) {
                $activity = Activity::create(
                    [
                        'added_by' => auth()->user()->added_by,
                        'user_id' => auth()->user()->id,
                        'module_id' => $id,
                        'module' => 'Purchase',
                        'activity' => "Purchase with reference no " .  $purchase->reference_no . "  is Updated",
                    ]
                );
            }

            return redirect(route('bar_purchase.show', $id));
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
        PurchaseItems::where('purchase_id', $id)->delete();
        PurchasePayments::where('purchase_id', $id)->delete();
        // InventoryHistory::where('purchase_id', $id)->delete();
        $purchases = Purchase::find($id);

        if (!empty($purchases)) {
            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'Purchase',
                    'activity' => "Purchase with reference no " .  $purchases->reference_no . "  is Deleted",
                ]
            );
        }
        $purchases->delete();

        Toastr::success('Deleted Successfully', 'Success');
        return redirect(route('bar_purchase.index'));
    }

    public function findPrice(Request $request)
    {
        $price = Items::where('id', $request->id)->get();
        return response()->json($price);
    }
    public function discountModal(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        if ($type == 'reference') {
            return view('inventory.addreference', compact('id'));
        } elseif ($type == 'maintainance') {
            $name = ServiceType::all();
            return view('inventory.addmaintainance', compact('id', 'name', 'type'));
        } elseif ($type == 'service') {
            $name = ServiceType::all();
            return view('inventory.addmaintainance', compact('id', 'name', 'type'));
        } elseif ($type == 'mechanical_maintainance') {
            $item =  MechanicalItem::where('module_id', $id)->where('module', 'maintainance')->get();
            $notes =   MechanicalRecommedation::where('module_id', $id)->where('module', 'maintainance')->get();
            return view('inventory.viewreport', compact('id', 'item', 'type', 'notes'));
        } elseif ($type == 'mechanical_service') {
            $item =  MechanicalItem::where('module_id', $id)->where('module', 'service')->get();
            $notes =   MechanicalRecommedation::where('module_id', $id)->where('module', 'service')->get();
            return view('inventory.viewreport', compact('id', 'item', 'type', 'notes'));
        } elseif ($type == 'requisition_maintainance') {
            $item =  Inventory::all();
            $module =   'Maintainance';
            return view('inventory.addrequistion', compact('id', 'item', 'module', 'id'));
        } elseif ($type == 'requisition_service') {
            $item =  Inventory::all();
            $module =   'Service';
            return view('inventory.addrequistion', compact('id', 'item', 'module', 'id'));
        }
    }

    public function save_reference(Request $request)
    {
        //
        $inv =   InventoryList::find($request->id);
        $data['reference'] = $request->reference;
        $data['assign_reference'] = '1';
        $inv->update($data);

        return redirect(route('inventory.list'))->with(['success' => 'Inventory Reference Assigned Successfully']);
    }


    public function approve($id)
    {
        //
        $purchase = Purchase::find($id);
        $data['status'] = 1;
        $purchase->update($data);

        if (!empty($purchase)) {
            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'Purchase',
                    'activity' => "Purchase with reference no " .  $purchase->reference_no . "  is Approved",
                ]
            );
        }
        Toastr::success('Approved Successfully', 'Success');
        return redirect(route('bar_purchase.index'));
    }

    public function cancel($id)
    {
        //
        $purchase = Purchase::find($id);
        $data['status'] = 4;
        $purchase->update($data);

        if (!empty($purchase)) {
            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'Purchase',
                    'activity' => "Purchase with reference no " .  $purchase->reference_no . "  is Cancelled",
                ]
            );
        }
        Toastr::success('Cancelled Successfully', 'Success');
        return redirect(route('bar_purchase.index'));
    }



    public function receive($id)
    {
        //
        $currency = Currency::all();
        $supplier = Supplier::all();
        $name = Items::all();
        //$location = InventoryLocation::where('added_by',auth()->user()->added_by)->where('main','1')->get();;
        $location = InventoryLocation::where('main', '1')->where('disabled', '0')->get();;
        $data = Purchase::find($id);
        $items = PurchaseItems::where('purchase_id', $id)->get();
        $type = "receive";
        return view('bar.pos.purchases.index', compact('name', 'supplier', 'currency', 'location', 'data', 'id', 'items', 'type'));
    }

    public function first_approval($id)
    {
        //
        $currency = Currency::all();
        $supplier = Supplier::all();
        $name = Items::all();
        $location = InventoryLocation::where('main', '1')->where('disabled', '0')->get();;
        $data = Purchase::find($id);
        $items = PurchaseItems::where('purchase_id', $id)->get();
        $type = "approve";
        return view('bar.pos.purchases.purchase_requisition', compact('name', 'supplier', 'currency', 'location', 'data', 'id', 'items', 'type'));
    }


    public function second_approval($id)
    {
        //
        $purchase = Purchase::find($id);
        $data['approval_2'] = auth()->user()->id;
        $data['approval_2_date'] = date('Y-m-d');
        $purchase->update($data);

        if (!empty($purchase)) {
            $p = Purchase::find($id);
            $user = User::find($p->approval_2);
            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'Purchase',
                    'activity' => "Second Approval of Purchase with reference no " .  $purchase->reference_no . " by " . $user->name,
                ]
            );
        }

        Toastr::success('First Approval is Successfully', 'Success');
        return redirect(route('bar_purchase.index'));
    }

    public function final_approval($id)
    {
        //
        $purchase = Purchase::find($id);
        $data['approval_3'] = auth()->user()->id;
        $data['approval_3_date'] = date('Y-m-d');
        //$data['status'] = 1;
        //$data['purchase_status'] = 1;
        $purchase->update($data);

        if (!empty($purchase)) {
            $p = Purchase::find($id);
            $user = User::find($p->approval_3);
            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'Purchase',
                    'activity' => "Final Approval of Purchase with reference no " .  $purchase->reference_no . " by " . $user->name,
                ]
            );
        }

        Toastr::success('Final Approval is Successfully', 'Success');
        return redirect(route('bar_purchase.index'));
    }



    public function second_disapproval($id)
    {
        //
        $purchase = Purchase::find($id);
        $data['approval_1'] = '';
        $data['approval_1_date'] = '';
        $purchase->update($data);

        if (!empty($purchase)) {
            $user = User::find(auth()->user()->id);
            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'Purchase',
                    'activity' => "First  Approval has been reversed for Purchase with reference no " .  $purchase->reference_no . " by " . $user->name,
                ]
            );
        }

        Toastr::success('Disapproval is Successfully', 'Success');
        return redirect(route('bar_purchase.requisition'));
    }

    public function final_disapproval($id)
    {
        $purchase = Purchase::find($id);
        $data['approval_2'] = '';
        $data['approval_2_date'] = '';
        $data['disapprove_status'] = 1;
        
        $purchase->update($data);

        if (!empty($purchase)) {
            $user = User::find(auth()->user()->id);
            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'Purchase',
                    'activity' => "First and Second Approval has been reversed for Purchase with reference no " .  $purchase->reference_no . " by " . $user->name,
                ]
            );
        }

        Toastr::success('Disapproval is Successfully', 'Success');
        return redirect(route('bar_purchase.index'));
    }


    public function save_order(Request $request)
    {
        $id = $request->purchase_id;
        $location = $request->location;
        $supplier = $request->supplier_id;

        $purchase = Purchase::find($id);

        $lists = array(
            'quantity' =>  $purchase->total_quantity,
            'added_by' => auth()->user()->added_by,
            'supplier_id' =>  $supplier,
            'location' =>     $location,
            'purchase_date' =>  $purchase->purchase_date,
            'purchase_id' => $id
        );

        SupplierOrder::create($lists);


        if (!empty($purchase)) {
            $user = Supplier::find($request->supplier_id);
            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'Purchase',
                    'activity' => " Purchase Order created with reference no " .  $purchase->reference_no . " to supplier  " . $user->name,
                ]
            );
        }

        Toastr::success('Created Successfully', 'Success');
        return redirect(route('bar_purchase.show', $id));
    }

    public function save_supplier(Request $request)
    {
        //
        $supplier = $request->supplier_id;
        $order = SupplierOrder::find($supplier);

        $purchase = Purchase::find($order->purchase_id);

        if ($request->old_id != $request->supplier_id) {
            $old = SupplierOrder::where('purchase_id', $purchase->id)->where('status', '1')->update([
                'status' => '0'
            ]);


            $lists['status'] = '1';
            $order->update($lists);
        }


        $data['supplier_id'] = $order->supplier_id;
        $data['location'] = $order->location;
        $purchase->update($data);


        $lists['status'] = '1';
        $order->update($lists);




        if (!empty($purchase)) {
            $user = Supplier::find($order->supplier_id);
            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $order->purchase_id,
                    'module' => 'Purchase',
                    'activity' => " Purchase Order confirmed with reference no " .  $purchase->reference_no . " to supplier  " . $user->name,
                ]
            );
        }

        Toastr::success('Confirmed Successfully', 'Success');
        return redirect(route('bar_purchase.show', $order->purchase_id));
    }

    public function get_purchase_order_tracking(int $purchase_order_id)
    {
        $trackings = PurchaseOrderTracking::where('purchase_id', $purchase_order_id)->latest('updated_at')->get();

        $purchase = Purchase::find($purchase_order_id);

        return view('bar.pos.purchases.purchase_tracking', compact('trackings', 'purchase'));
    }


    public function create_purchase_order_tracking(int $purchase_order_id)
    {
        // Fetch all shipment planning records
        // $shipments = ShipmentPlanning::all();

        $purchase = Purchase::find($purchase_order_id);

        return view('bar.pos.purchases.purchase_tracking_create', compact('purchase'));
    }

    public function store_purchase_order_tracking(Request $request)
    {
        $tracking_pur = array(
            'purchase_id' => $request->purchase_order_id,
            'purchase_reference' => $request->purchase_ref,
            'description' => $request->description,
            'status' => $request->status,
            'user_id' => auth()->user()->id,
            'added_by' => auth()->user()->added_by
        );


        PurchaseOrderTracking::create($tracking_pur);

        // return redirect()->route('cf.tracking.index')
        // ->with('success', 'Shipment status updated successfully'); 


        Toastr::success('Tracking Status updated Successfully', 'Success');
        return redirect(route('bar_purchase.index'));
    }


    public function purchase_supplier_invoice(Request $request)
    {
    
        $id = $request->purchase_id;
        $nameArr = $request->items_id;
        $qtyArr = $request->quantity;
        $savedArr = $request->items_id;
        $purchase_itemArr = $request->purchase_items_id;
        
        $shipment_cost = $request->shipment_cost;
        $currency = $request->currency;

        $purchase = Purchase::find($id);
        
        Purchase::where('id', $id)->update([
          'exchange_rate_2' => $request->exchange_rate,
          'shipment_cost' => $request->shipment_cost,
          'currency' => $request->currency,
          'supplier_status' => 1,
        ]);

        // $count_mm = PurchaseSupplierInvoice::where('purchase_id',$purchase->id)->groupBy('reference_no')->count();

        $count_mm = PurchaseSupplierInvoice::where('purchase_id', $purchase->id)->distinct('reference_no')->count();

        $count_mm = $count_mm + 1;

        $reference_no = $purchase->reference_no." - S0".$count_mm;

        $supplier_cost['purchase_amount'] = 0;

        $supplier_cost['purchase_amount'] = 0;

        $supplier_cost['purchase_amount_b4_exchange'] = 0;



        if (!empty($nameArr)) {
            for ($i = 0; $i < count($nameArr); $i++) {
                if (!empty($nameArr[$i])) {

                    $saved = Items::find($savedArr[$i]);

                    $purchase_items_mm = PurchaseItems::where('id', $purchase_itemArr[$i])->first();

                    if ($purchase_items_mm->total_tax > 0) {
                        $total_tax = (($purchase_items_mm->price * $qtyArr[$i]) * 0.18);
                    } else {
                        $total_tax = 0;
                    }

                    $total_cost = $purchase_items_mm->price * $qtyArr[$i] * $request->exchange_rate;

                    $total_cost_b4_exchange = $purchase_items_mm->price * $qtyArr[$i];


                    $supplier_cost['purchase_amount'] += $total_cost;

                    $supplier_cost['purchase_amount_b4_exchange'] += $total_cost_b4_exchange;




                    $lists = array(
                        'quantity' =>   $qtyArr[$i],
                        'item_id' => $savedArr[$i],
                        'item_name' => $saved->name,
                        'currency' => $request->currency,
                        'reference_no' => $reference_no,
                        'po_number' => $request->po_number,
                        'pi_number' => $request->pi_number,
                        'credit_limit' => $request->credit_limit,
                        'payment_mode' => $request->payment_mode,
                        'exchange_rate' => $request->exchange_rate,
                        'shipment_cost' => $request->shipment_cost,
                        'supplier_date' =>  Carbon::now()->format('Y-m-d'),
                        'tax_rate' =>  $purchase_items_mm->tax_rate,
                        'unit' => $purchase_items_mm->unit,
                        'price' =>  $purchase_items_mm->price,
                        'total_cost' =>  $total_cost,
                        'total_cost_b4_exchange' => $total_cost_b4_exchange,
                        'total_tax' =>   $total_tax,
                        'order_no' => $i,
                        'user_id' => auth()->user()->id,
                        'added_by' => auth()->user()->added_by,
                        'supplier_id' => $purchase->supplier_id,
                        'location' =>    $purchase->location,
                        'purchase_date' =>  $purchase->purchase_date,
                        'purchase_id' => $id
                    );

                    PurchaseSupplierInvoice::create($lists);

                    $purchase->due_quantity -= $qtyArr[$i];
                    $complete_supplier_status = $purchase->due_quantity <= 0 ? 2 : 1;
                    $purchase->complete_supplier_status = $complete_supplier_status;
                    $purchase->save();


                    $lists33 = array(
                        'quantity' =>   $qtyArr[$i],
                        'item_id' => $savedArr[$i],
                        'added_by' => auth()->user()->added_by,
                        'supplier_id' => $purchase->supplier_id,
                        'location' =>    $purchase->location,
                        'purchase_date' =>  $purchase->purchase_date,
                        'type' =>   'Purchase Supplier Invoice',
                        'purchase_id' => $id
                    );

                    PurchaseHistory::create($lists33);


                    // $dq = Purchase::find($id);
                    // $pdq = $dq->due_quantity - $qtyArr[$i];
                    
                    // if($pdq <= 0)
                    // {
                    // $complete_supplier_status = 2;
                    // }
                    // else{
                    //  $complete_supplier_status = 1;
                    // }
                    // Purchase::where('id', $id)->update(['due_quantity' => $pdq,'complete_supplier_status' => $complete_supplier_status  ]);


                   
                }
            }
        }

        PurchaseSupplierInvoice::where('reference_no', $reference_no)->update($supplier_cost);;





        if (!empty($purchase)) {
            $user = User::find(auth()->user()->id);
            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'Purchase',
                    'activity' => "Purchase Supplier Invoiced for Purchase with reference no " .  $purchase->reference_no . " by " . $user->name,
                ]
            );
        }

        Toastr::success('Purchase Supplier Invoice Done Successfully', 'Success');
        return redirect(route('bar_purchase.index'));
    }




    public function grn222(Request $request)
    {
    
        $id = $request->purchase_id;
        $nameArr = $request->items_id;
        $qtyArr = $request->quantity;
        $savedArr = $request->items_id;
        
        $exchange_rate_2 = $request->exchange_rate_2;
        $shipment_cost = $request->shipment_cost;
        $currency = $request->currency;

        $purchase = Purchase::find($id);
        
        Purchase::where('id', $id)->update([
          'exchange_rate_2' => $request->exchange_rate_2,
          'shipment_cost' => $request->shipment_cost,
          'currency' => $request->currency,
          'supplier_status' => 1,
        ]);

        

        if (!empty($nameArr)) {
            for ($i = 0; $i < count($nameArr); $i++) {
                if (!empty($nameArr[$i])) {

                    $saved = Items::find($savedArr[$i]);

                    $lists = array(
                        'quantity' =>   $qtyArr[$i],
                        'item_id' => $savedArr[$i],
                        'added_by' => auth()->user()->added_by,
                        'supplier_id' => $purchase->supplier_id,
                        'location' =>    $purchase->location,
                        'purchase_date' =>  $purchase->purchase_date,
                        'type' =>   'Purchases',
                        'purchase_id' => $id
                    );

                    PurchaseHistory::create($lists);
                    PurchaseReceive::create($lists);

                    $it = Items::where('id', $nameArr[$i])->first();
                    $q = $it->quantity + $qtyArr[$i];
                    Items::where('id', $nameArr[$i])->update(['quantity' => $q]);

                    $loc = InventoryLocation::where('id', $purchase->location)->first();
                    $lq['crate'] = $loc->crate + $qtyArr[$i];
                    $lq['bottle'] = $loc->bottle + ($qtyArr[$i] * $saved->bottle);
                    InventoryLocation::where('id', $purchase->location)->update($lq);


                    if ($saved->empty == '1') {

                        $pur_items = array(
                            'item_id' => $savedArr[$i],
                            'purpose' =>  'Purchase Empty',
                            'purchase_id' => $id,
                            'date' => $purchase->purchase_date,
                            'has_empty' =>    $saved->empty,
                            'description' => $saved->description,
                            'empty_in_purchase' => $qtyArr[$i],
                            'purchase_case' => $qtyArr[$i],
                            'purchase_bottle' => $qtyArr[$i] * $saved->bottle,
                            'added_by' => auth()->user()->added_by
                        );


                        EmptyHistory::create($pur_items);
                    }


                    $dq = Purchase::find($id);
                    $pdq = $dq->due_quantity - $qtyArr[$i];
                    
                    if($pdq <= 0)
                    {
                    $complete_supplier_status = 2;
                    }
                    else{
                     $complete_supplier_status = 1;
                    }
                    Purchase::where('id', $id)->update(['due_quantity' => $pdq,'complete_supplier_status' => $complete_supplier_status  ]);


                    $inv = Purchase::find($id);
                    $supp = Supplier::find($inv->supplier_id);

                    $itm = PurchaseItems::where('purchase_id', $id)->where('item_name', $savedArr[$i])->first();
                    $acc = Items::find($savedArr[$i]);

                    if ($itm->total_tax > 0) {
                        $total_tax = (($itm->price * $qtyArr[$i]) * 0.18);
                    } else {
                        $total_tax = 0;
                    }
                    $cost = $itm->price * $qtyArr[$i];

                    $cr = AccountCodes::where('account_name', 'Bar Stock')->first();
                    $journal = new JournalEntry();
                    $journal->account_id = $cr->id;
                    $date = explode('-', $inv->purchase_date);
                    $journal->date =   $inv->purchase_date;
                    $journal->year = $date[0];
                    $journal->month = $date[1];
                    $journal->transaction_type = 'bar_pos_purchase';
                    $journal->name = 'Bar Purchases';
                    $journal->debit = ($itm->price * $qtyArr[$i]) *  $inv->exchange_rate;
                    $journal->income_id = $inv->id;
                    $journal->supplier_id = $inv->supplier_id;
                    $journal->currency_code =  $inv->exchange_code;
                    $journal->exchange_rate = $inv->exchange_rate;
                    $journal->added_by = auth()->user()->added_by;
                    $journal->notes = "Purchase for Purchase Order " . $inv->reference_no . " by Supplier " . $supp->name;
                    $journal->save();

                    if ($itm->total_tax > 0) {
                        $tax = AccountCodes::where('account_name', 'VAT IN')->first();
                        $journal = new JournalEntry();
                        $journal->account_id = $tax->id;
                        $date = explode('-', $inv->purchase_date);
                        $journal->date =   $inv->purchase_date;
                        $journal->year = $date[0];
                        $journal->month = $date[1];
                        $journal->transaction_type = 'bar_pos_purchase';
                        $journal->name = 'Bar Purchases';
                        $journal->debit = (($itm->price * $qtyArr[$i]) * 0.18) *  $inv->exchange_rate;
                        $journal->income_id = $inv->id;
                        $journal->supplier_id = $inv->supplier_id;
                        $journal->currency_code =  $inv->exchange_code;
                        $journal->exchange_rate = $inv->exchange_rate;
                        $journal->added_by = auth()->user()->added_by;
                        $journal->notes = "Purchase Tax for Purchase Order " . $inv->reference_no . " by Supplier " .  $supp->name;
                        $journal->save();
                    }

                    $codes = AccountCodes::where('account_name', 'Creditors Control Account')->first();
                    $journal = new JournalEntry();
                    $journal->account_id = $codes->id;
                    $date = explode('-', $inv->purchase_date);
                    $journal->date =   $inv->purchase_date;
                    $journal->year = $date[0];
                    $journal->month = $date[1];
                    $journal->transaction_type = 'bar_pos_purchase';
                    $journal->name = 'Bar Purchases';
                    $journal->income_id = $inv->id;
                    $journal->supplier_id = $inv->supplier_id;
                    $journal->credit = ($cost + $total_tax) *  $inv->exchange_rate;
                    $journal->currency_code =  $inv->exchange_code;
                    $journal->exchange_rate = $inv->exchange_rate;
                    $journal->added_by = auth()->user()->added_by;
                    $journal->notes = "Credit for Purchase Order  " . $inv->reference_no . " by Supplier " .  $supp->name;
                    $journal->save();
                }
            }
        }






        if (!empty($purchase)) {
            $user = User::find(auth()->user()->id);
            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'Purchase',
                    'activity' => "Good Receive for Purchase with reference no " .  $purchase->reference_no . " by " . $user->name,
                ]
            );
        }

        Toastr::success('Good Receive Done Successfully', 'Success');
        return redirect(route('bar_purchase.index'));
    }
    
    
    public function grn(Request $request)
    {
        $id = $request->purchase_supplier_invoice_id;
        $inv_itemArry = $request->invoice_item_id;
        $nameArr = $request->items_id;
        $qtyArr = $request->quantity;
        $savedArr = $request->items_id;

        $purchase = PurchaseSupplierInvoice::find($id);

        if (empty($nameArr) || count($nameArr) !== count($inv_itemArry) || count($nameArr) !== count($qtyArr) || count($nameArr) !== count($savedArr)) {
            Toastr::error('Invalid or mismatched input data', 'Error');
            return redirect(route('supplier_invoice'));
        }

        if (!empty($nameArr)) {
            for ($i = 0; $i < count($nameArr); $i++) {
                if (!empty($nameArr[$i])) {
                    try {
                        $saved = Items::find($savedArr[$i]);
                        if (!$saved) {
                            continue;
                        }

                        $lists = array(
                            'quantity' => $qtyArr[$i],
                            'item_id' => $savedArr[$i],
                            'added_by' => auth()->user()->added_by,
                            'supplier_id' => $purchase->supplier_id,
                            'location' => $purchase->location,
                            'purchase_date' => $purchase->purchase_date,
                            'type' => 'Purchases',
                            'purchase_id' => $inv_itemArry[$i]
                        );

                        PurchaseHistory::create($lists);
                        PurchaseReceive::create($lists);

                        $it = Items::find($nameArr[$i]);
                        if (!$it) {
                            continue;
                        }
                        $q = $it->quantity + $qtyArr[$i];
                        Items::where('id', $nameArr[$i])->update(['quantity' => $q]);

                        $pdq = $qtyArr[$i];

                        $purchase_item = PurchaseSupplierInvoice::find($inv_itemArry[$i]);
                        if (!$purchase_item) {
                            continue;
                        }

                        $rec_qty = empty($purchase_item->received_qty) ? 0 : $purchase_item->received_qty;
                        $new_pdq = $rec_qty + $pdq;
                        PurchaseSupplierInvoice::where('id', $inv_itemArry[$i])->update(['received_qty' => $new_pdq]);

                        if ($request->receive_status == "Complete") {
                            if (empty($purchase_item->total_cost) || empty($purchase_item->reference_no)) {
                                Toastr::error('Missing purchase data for costing', 'Error');
                                return redirect(route('supplier_invoice'));
                            }

                            $receive_status_mm = "Complete";

                            $purchase_cost = $purchase_item->total_cost;
                            $tax_item_clearing_expenses = SupplierClearingItem::where('reference_no', $purchase_item->reference_no)
                                ->where('item_id', $purchase_item->item_id)
                                ->sum('item_tax');
                            $clearing_cost = SupplierInvoiceExpenses::where('reference_no', $purchase_item->reference_no)
                                ->sum('clearing_cost');
                            $shipping_cost = SupplierInvoiceExpenses::where('reference_no', $purchase_item->reference_no)
                                ->sum('shipping_cost');
                            $shipment_cost = $purchase_item->shipment_cost;

                            $qty_total = PurchaseSupplierInvoice::where('reference_no', $purchase_item->reference_no)
                                ->sum('quantity');

                            $ratio_qty = $purchase_item->quantity / $qty_total;

                            $clearing_cost_ratio_qty = $clearing_cost * $ratio_qty;
                            $shipping_cost_ratio_qty = $shipping_cost * $ratio_qty;
                            $shipment_cost_ratio_qty = $shipment_cost * $ratio_qty;

                            $costing_item = $purchase_cost + $tax_item_clearing_expenses + $clearing_cost_ratio_qty + $shipping_cost_ratio_qty + $shipment_cost_ratio_qty;
                            $new_cost_b4_av = $it->cost_price + $costing_item;



                            $avg_cost_item = $it->cost_price != 0 ? $new_cost_b4_av / 2 : $new_cost_b4_av;

                            // $new_item_cost = $avg_cost_item;

                            $old_cost_item = $it->cost_price;
                           // Items::where('id', $nameArr[$i])->update(['cost_price' => $new_item_cost]);

                            $listCostings = array(
                                'quantity' => $qtyArr[$i],
                                'item_id' => $savedArr[$i],
                                'item_name' => $saved->name,
                                'costing_item' => $costing_item,
                                'new_item_cost' => $new_cost_b4_av,
                                'avg_cost_item' => $avg_cost_item,
                                'old_cost_item' => $old_cost_item,
                                'added_by' => auth()->user()->added_by,
                                'currency' => $purchase->currency,
                                'unit' => $purchase->unit,
                                'purchase_date' => $purchase->purchase_date,
                                'reference_no' => $purchase->reference_no,
                                'purchase_supplier_invoice_id' => $inv_itemArry[$i]
                            );

                            Costing::create($listCostings);


                        PurchaseSupplierInvoice::where('id', $inv_itemArry[$i])->update(['receive_status' => $receive_status_mm]);

                        }
                    } catch (\Exception $e) {
                        Toastr::error('An error occurred: ' . $e->getMessage(), 'Error');
                        return redirect(route('supplier_invoice'));
                    }
                }
            }
        }

        if (!empty($purchase)) {
            $user = User::find(auth()->user()->id);
            $activity = Activity::create([
                'added_by' => auth()->user()->added_by,
                'user_id' => auth()->user()->id,
                'module_id' => $id,
                'module' => 'Purchase',
                'activity' => "Good Receive for Purchase with reference no " . $purchase->reference_no . " by " . $user->name,
            ]);
        }

        Toastr::success('Good Receive Done Successfully', 'Success');
        return redirect(route('supplier_invoice'));
    }
        
        
    


    public function grn_old(Request $request)
    {
    
        $id = $request->purchase_supplier_invoice_id;
        $inv_itemArry = $request->invoice_item_id;
        $nameArr = $request->items_id;
        $qtyArr = $request->quantity;
        $savedArr = $request->items_id;
        

        $purchase = PurchaseSupplierInvoice::find($id);

        // $pdq = 0;
        

        if (!empty($nameArr)) {
            for ($i = 0; $i < count($nameArr); $i++) {
                if (!empty($nameArr[$i])) {

                    $saved = Items::find($savedArr[$i]);

                    $lists = array(
                        'quantity' =>   $qtyArr[$i],
                        'item_id' => $savedArr[$i],
                        'added_by' => auth()->user()->added_by,
                        'supplier_id' => $purchase->supplier_id,
                        'location' =>    $purchase->location,
                        'purchase_date' =>  $purchase->purchase_date,
                        'type' =>   'Purchases',
                        'purchase_id' => $id
                    );

                    PurchaseHistory::create($lists);
                    PurchaseReceive::create($lists);

                    $it = Items::where('id', $nameArr[$i])->first();
                    $q = $it->quantity + $qtyArr[$i];
                    Items::where('id', $nameArr[$i])->update(['quantity' => $q]);

                    // $loc = InventoryLocation::where('id', $purchase->location)->first();
                    // $lq['crate'] = $loc->crate + $qtyArr[$i];
                    // $lq['bottle'] = $loc->bottle + ($qtyArr[$i] * $saved->bottle);
                    // InventoryLocation::where('id', $purchase->location)->update($lq);


                    // if ($saved->empty == '1') {

                    //     $pur_items = array(
                    //         'item_id' => $savedArr[$i],
                    //         'purpose' =>  'Purchase Empty',
                    //         'purchase_id' => $id,
                    //         'date' => $purchase->purchase_date,
                    //         'has_empty' =>    $saved->empty,
                    //         'description' => $saved->description,
                    //         'empty_in_purchase' => $qtyArr[$i],
                    //         'purchase_case' => $qtyArr[$i],
                    //         'purchase_bottle' => $qtyArr[$i] * $saved->bottle,
                    //         'added_by' => auth()->user()->added_by
                    //     );


                    //     EmptyHistory::create($pur_items);
                    // }


                    // $dq = PurchaseSupplierInvoice::find($id);
                    $pdq =  $qtyArr[$i];
                    

                    PurchaseSupplierInvoice::where('id', $inv_itemArry[$i])->update(['received_qty' => $pdq]);


                    $inv = PurchaseSupplierInvoice::find($id);

                    if(!empty($inv->supplier_id)){

                        $supp = Supplier::find($inv->supplier_id);


                    }
                    else{

                        $supp = Supplier::find($inv->supplier_id);


                    }

                    $itm = PurchaseSupplierInvoice::where('reference_no', $inv->reference_no)->where('item_id', $savedArr[$i])->first();

                    $acc = Items::find($savedArr[$i]);

                    if ($itm->total_tax > 0) {
                        $total_tax = (($itm->price * $qtyArr[$i]) * 0.18);
                    } else {
                        $total_tax = 0;
                    }
                    
                    $cost = $itm->price * $qtyArr[$i];

                    $cr = AccountCodes::where('account_name', 'Bar Stock')->first();
                    $journal = new JournalEntry();
                    $journal->account_id = $cr->id;
                    $date = explode('-', $inv->purchase_date);
                    $journal->date =   $inv->purchase_date;
                    $journal->year = $date[0];
                    $journal->month = $date[1];
                    $journal->transaction_type = 'bar_pos_purchase';
                    $journal->name = 'Bar Purchases';
                    $journal->debit = ($itm->price * $qtyArr[$i]) *  $inv->exchange_rate;
                    $journal->income_id = $inv->id;
                    $journal->supplier_id = $inv->supplier_id;
                    $journal->currency_code =  $inv->exchange_code;
                    $journal->exchange_rate = $inv->exchange_rate;
                    $journal->added_by = auth()->user()->added_by;
                    $journal->notes = "Purchase for Purchase Order " . $inv->reference_no . " by Supplier " . $supp->name;
                    $journal->save();

                    if ($itm->total_tax > 0) {
                        $tax = AccountCodes::where('account_name', 'VAT IN')->first();
                        $journal = new JournalEntry();
                        $journal->account_id = $tax->id;
                        $date = explode('-', $inv->purchase_date);
                        $journal->date =   $inv->purchase_date;
                        $journal->year = $date[0];
                        $journal->month = $date[1];
                        $journal->transaction_type = 'bar_pos_purchase';
                        $journal->name = 'Bar Purchases';
                        $journal->debit = (($itm->price * $qtyArr[$i]) * 0.18) *  $inv->exchange_rate;
                        $journal->income_id = $inv->id;
                        $journal->supplier_id = $inv->supplier_id;
                        $journal->currency_code =  $inv->exchange_code;
                        $journal->exchange_rate = $inv->exchange_rate;
                        $journal->added_by = auth()->user()->added_by;
                        $journal->notes = "Purchase Tax for Purchase Order " . $inv->reference_no . " by Supplier " .  $supp->name;
                        $journal->save();
                    }

                    $codes = AccountCodes::where('account_name', 'Creditors Control Account')->first();
                    $journal = new JournalEntry();
                    $journal->account_id = $codes->id;
                    $date = explode('-', $inv->purchase_date);
                    $journal->date =   $inv->purchase_date;
                    $journal->year = $date[0];
                    $journal->month = $date[1];
                    $journal->transaction_type = 'bar_pos_purchase';
                    $journal->name = 'Bar Purchases';
                    $journal->income_id = $inv->id;
                    $journal->supplier_id = $inv->supplier_id;
                    $journal->credit = ($cost + $total_tax) *  $inv->exchange_rate;
                    $journal->currency_code =  $inv->exchange_code;
                    $journal->exchange_rate = $inv->exchange_rate;
                    $journal->added_by = auth()->user()->added_by;
                    $journal->notes = "Credit for Purchase Order  " . $inv->reference_no . " by Supplier " .  $supp->name;
                    $journal->save();
                }
            }
        }






        if (!empty($purchase)) {
            $user = User::find(auth()->user()->id);
            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'Purchase',
                    'activity' => "Good Receive for Purchase with reference no " .  $purchase->reference_no . " by " . $user->name,
                ]
            );
        }

        Toastr::success('Good Receive Done Successfully', 'Success');
        return redirect(route('supplier_invoice'));
    }

    public function confirm_order_old(Request $request, $id)
    {
        //
        $purchase = Purchase::find($id);
        $data['order_status'] = 1;
        $data['payment_mode'] = $request->payment_mode;
        $purchase->update($data);

        if (!empty($purchase)) {

            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'Purchase',
                    'activity' => "Purchase Order with reference no " .  $purchase->reference_no . " has been confirmed .",
                ]
            );
        }

        Toastr::success('Confirmed Successfully', 'Success');
        return redirect(route('bar_purchase.index'));
    }


    public function confirm_order(Request $request, $id)
    {
        $currency = Currency::all();
        $supplier = Supplier::all();
        $name = Items::all();
        //$location = InventoryLocation::where('added_by',auth()->user()->added_by)->where('main','1')->get();;
        $location = InventoryLocation::where('main', '1')->where('disabled', '0')->get();;
        $data = Purchase::find($id);
        $items = PurchaseItems::where('purchase_id', $id)->get();

        $type = "";
        
        return view('bar.pos.purchases.supplier_purchases_price', compact('name', 'supplier', 'currency', 'location', 'data', 'id', 'items', 'type'));
    

    }

    public function confirm_order_store(Request $request, $id)
    {
        // dd($id);
            $purchase = Purchase::find($id);
            //$data['supplier_id']=$request->supplier_id;
            $data['purchase_date'] = $request->purchase_date;
            $data['due_date'] = $request->due_date;
            //$data['location']=$request->location;
            $data['exchange_code'] = $request->exchange_code;
            $data['exchange_rate'] = $request->exchange_rate;
            $data['purchase_amount'] = '1';
            $data['due_amount'] = '1';
            $data['purchase_tax'] = '1';
            $data['order_status'] = 1;
            $data['payment_mode'] = $request->payment_mode;
            $data['added_by'] = auth()->user()->added_by;

            $purchase->update($data);

            $amountArr = str_replace(",", "", $request->amount);
            $totalArr =  str_replace(",", "", $request->tax);

            $nameArr = $request->item_name;
            $qtyArr = $request->quantity;
            $priceArr = $request->price;
            $rateArr = $request->tax_rate;
            $unitArr = $request->unit;
            $costArr = str_replace(",", "", $request->total_cost);
            $taxArr =  str_replace(",", "", $request->total_tax);
            $remArr = $request->removed_id;
            $expArr = $request->items_id;
            $savedArr = $request->item_name;

            $cost['purchase_amount'] = 0;
            $cost['purchase_tax'] = 0;
            $cost['purchase_amount_base'] = 0;
            $cost['purchase_tax_base'] = 0;
            $cost['total_quantity'] = 0;

            if (!empty($remArr)) {
                for ($i = 0; $i < count($remArr); $i++) {
                    if (!empty($remArr[$i])) {
                        PurchaseItems::where('id', $remArr[$i])->delete();
                    }
                }
            }

            if (!empty($nameArr)) {
                for ($i = 0; $i < count($nameArr); $i++) {
                    if (!empty($nameArr[$i])) {
                        $cost['purchase_amount_base'] += $costArr[$i];
                        $cost['purchase_amount'] += ( $costArr[$i] * $purchase->exchange_rate );
                        $cost['purchase_tax_base'] +=  $taxArr[$i];
                        $cost['purchase_tax'] += ( $taxArr[$i] * $purchase->exchange_rate );

                        $cost['due_quantity'] =  $cost['total_quantity'];

                        $items = array(
                            'item_name' => $nameArr[$i],
                            'quantity' =>   $qtyArr[$i],
                            'due_quantity' =>   $qtyArr[$i],
                            'tax_rate' =>  $rateArr[$i],
                            'unit' => $unitArr[$i],
                            'price' =>  $priceArr[$i],
                            'total_cost_base' =>  $costArr[$i],
                            'total_cost' =>  $costArr[$i] * $purchase->exchange_rate,
                            'total_tax_base' =>   $taxArr[$i],
                            'total_tax' =>   $taxArr[$i] * $purchase->exchange_rate,
                            'items_id' => $savedArr[$i],
                            'order_no' => $i,
                            'added_by' => auth()->user()->added_by,
                            'purchase_id' => $id
                        );

                        if (!empty($expArr[$i])) {
                            PurchaseItems::where('id', $expArr[$i])->update($items);
                        } else {
                            PurchaseItems::create($items);
                        }
                    }
                }
                $cost['due_amount'] =  $cost['purchase_amount'] + $cost['purchase_tax'];
                $cost['due_quantity'] =  $cost['total_quantity'];
                Purchase::where('id', $id)->update($cost);
            }



                
            if (!empty($purchase)) {

                $activity = Activity::create(
                    [
                        'added_by' => auth()->user()->added_by,
                        'user_id' => auth()->user()->id,
                        'module_id' => $id,
                        'module' => 'Purchase',
                        'activity' => "Purchase Order with reference no " .  $purchase->reference_no . " has been confirmed .",
                    ]
                );
            }

            Toastr::success('Confirmed Successfully', 'Success');
            return redirect(route('bar_purchase.index'));

            // return redirect(route('bar_purchase.order'));
       
       
    }


     public function supplier_purchase_price($id){

        $currency = Currency::all();
        $supplier = Supplier::all();
        $name = Items::all();
        //$location = InventoryLocation::where('added_by',auth()->user()->added_by)->where('main','1')->get();;
        $location = InventoryLocation::where('main', '1')->where('disabled', '0')->get();;
        $data = Purchase::find($id);
        $items = PurchaseItems::where('purchase_id', $id)->get();

        $type = "";
        
        return view('bar.pos.purchases.supplier_purchase_price', compact('name', 'supplier', 'currency', 'location', 'data', 'id', 'items', 'type'));
    
        
    }



    public function issue($id)
    {
        //
        $purchase = Purchase::find($id);

        $items = PurchaseItems::where('purchase_id', $id)->get();

        $data['purchase_amount'] = 0;
        $data['purchase_tax'] = 0;
        $data['due_quantity'] = 0;

        foreach ($items as $i) {

            $due = PurchaseHistory::where('purchase_id', $id)->where('item_id', $i->item_name)->where('type', 'Purchases')->where('added_by', auth()->user()->added_by)->sum('quantity');
            $return = PurchaseHistory::where('purchase_id', $id)->where('item_id', $i->item_name)->where('type', 'Debit Note')->where('added_by', auth()->user()->added_by)->sum('quantity');
            $qty = $due - $return;

            $prev['due_quantity'] = $qty;
            $prev['total_tax'] = ($i->price *  $qty) *  $i->tax_rate;
            $prev['total_cost'] = $i->price *  $qty;

            PurchaseItems::where('id', $i->id)->update($prev);

            $data['purchase_amount'] += $prev['total_cost'];
            $data['purchase_tax'] += $prev['total_tax'];
            $data['due_quantity'] += $qty;
        }



        $purchase_amount = PurchaseItems::where('purchase_id', $id)->sum('total_cost');
        $purchase_tax = PurchaseItems::where('purchase_id', $id)->sum('total_tax');

        $data['due_amount'] =  $purchase_amount + $purchase_tax;
        $data['good_receive'] = 1;
        $purchase->update($data);

        if (!empty($purchase)) {
            $user = User::find(auth()->user()->id);
            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'Purchase',
                    'activity' => "Purchase with reference no " .  $purchase->reference_no . " has been issued by " . $user->name,
                ]
            );
        }

        Toastr::success('Issued Successfully', 'Success');
        return redirect(route('bar_purchase.index'));
    }


    public function purchase_requisition()
    {
        //
        $currency = Currency::all();
        $purchases = Purchase::all()->where('purchase_status', 0)->where('good_receive', 0)->where('order_status', 0);
        $supplier = Supplier::all();
        $name = Items::all();
        $items = Items::select('name', 'item_code')->get();
        $location = InventoryLocation::where('disabled', '0')->get();
        $type = "";
        return view('bar.pos.purchases.purchase_requisition', compact('name', 'items', 'supplier', 'currency', 'purchases', 'location', 'type'));
    }
    public function purchase_order()
    {
        //
        $currency = Currency::all();
        $purchases = Purchase::all()->where('purchase_status', 1)->where('good_receive', 0)->where('order_status', 0);;
        $supplier = Supplier::all();
        $name = Items::all();
        $location = InventoryLocation::where('disabled', '0')->get();
        $type = "";
        return view('bar.pos.purchases.purchase_order', compact('name', 'supplier', 'currency', 'purchases', 'location', 'type'));
    }


    public function make_payment($id)
    {
        //
        $invoice = Purchase::find($id);
        $payment_method = Payment_methodes::all();
        $bank_accounts = AccountCodes::where('account_group', 'Cash And Banks')->get();
        return view('bar.pos.purchases.purchase_payments', compact('invoice', 'payment_method', 'bank_accounts'));
    }

    public function inv_pdfview(Request $request)
    {
        //
        $purchases = Purchase::find($request->id);
        $purchase_items = PurchaseItems::where('purchase_id', $request->id)->get();

        view()->share(['purchases' => $purchases, 'purchase_items' => $purchase_items]);

        if ($request->has('download')) {
            if ($purchases->order_status == '1') {
                $pdf = PDF::loadView('bar.pos.purchases.purchase_details_pdf')->setPaper('a4', 'potrait');
            } else {
                $pdf = PDF::loadView('bar.pos.purchases.order_details_pdf')->setPaper('a4', 'potrait');
            }
            return $pdf->download('BAR PURCHASES REF NO # ' .  $purchases->reference_no . ".pdf");
        }
        return view('inv_pdfview');
    }

    public function order_pdfview(Request $request)
    {
        //
        $order = SupplierOrder::find($request->id);
        $purchases = Purchase::find($order->purchase_id);
        $purchase_items = PurchaseItems::where('purchase_id', $order->purchase_id)->get();

        view()->share(['purchases' => $purchases, 'purchase_items' => $purchase_items, 'order' => $order]);

        if ($request->has('download')) {
            $pdf = PDF::loadView('bar.pos.purchases.order_pdf')->setPaper('a4', 'potrait');
            return $pdf->download('PURCHASES ORDER REF NO # ' .  $purchases->reference_no . ".pdf");
        }
        return view('order_pdfview');
    }
    public function issue_pdfview(Request $request)
    {
        //
        $purchases = Purchase::find($request->id);
        $purchase_items = PurchaseItems::where('purchase_id', $request->id)->get();

        view()->share(['purchases' => $purchases, 'purchase_items' => $purchase_items]);

        if ($request->has('download')) {
            $pdf = PDF::loadView('bar.pos.purchases.issue_supplier_pdf')->setPaper('a4', 'potrait');
            return $pdf->download('ISSUED PURCHASES REF NO # ' .  $purchases->reference_no . ".pdf");
        }
        return view('issue_pdfview');
    }

    public function creditors_report(Request $request)
    {

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $account_id = $request->account_id;
        $chart_of_accounts = [];
        foreach (Supplier::where('user_id', auth()->user()->added_by)->get() as $key) {
            $chart_of_accounts[$key->id] = $key->name;
        }
        if ($request->isMethod('post')) {
            $data = Purchase::where('supplier_id', $request->account_id)->whereBetween('purchase_date', [$start_date, $end_date])->where('status', '!=', 0)->get();
        } else {
            $data = [];
        }



        return view(
            'bar.pos.purchases.creditors_report',
            compact(
                'start_date',
                'end_date',
                'chart_of_accounts',
                'data',
                'account_id'
            )
        );
    }

    public function supplier_invoice()
    {
        $invoices = PurchaseSupplierInvoice::select('purchase_id', 'reference_no', 'purchase_date', 'supplier_id', 'total_cost', 'supplier_date', 'purchase_amount')
        ->groupBy('reference_no')    
        ->get();

       // dd($invoices);

        return view('bar.pos.purchases.supplier_invoice', compact('invoices'));
    }
    
    public function supplier_invoice_show($reference_no)
    {
        $invoice_main = PurchaseSupplierInvoice::where('reference_no', $reference_no)->first();
        $invoice_items = PurchaseSupplierInvoice::where('reference_no', $reference_no)->get();
        
        return view('bar.pos.purchases.supplier_invoice_show', compact('invoice_main', 'invoice_items', 'reference_no'));
    }


    public function supplier_invoice_show_pdf($reference_no)
    {
        $invoice_main = PurchaseSupplierInvoice::where('reference_no', $reference_no)->first();
        $invoice_items = PurchaseSupplierInvoice::where('reference_no', $reference_no)->get();

        $pdf = Pdf::loadView('bar.pos.purchases.supplier_invoice_show_pdf', compact('invoice_main', 'invoice_items', 'reference_no'));

        $pdf->setPaper('A4', 'portrait');
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ]);

        return $pdf->stream('invoice_' . $reference_no . '.pdf', ['Attachment' => true]);
    }


    public function supplier_invoice_modal_show($reference_no, Request $request)
    {
        $invoice_main = PurchaseSupplierInvoice::where('id', $reference_no)->first();

        $name = Items::all();


        $id = $invoice_main->id;

        $invoice_items = PurchaseSupplierInvoice::where('reference_no', $invoice_main->reference_no)->get();

        switch ($request->type) {
            case 'receive':
                return view('bar.pos.purchases.item_details', compact('invoice_main','invoice_items','id','name'));
                break;
            default:
                Toastr::success('No type found Successfully', 'Success');
                return redirect(route('supplier_invoice'));
        }

        //return view('bar.pos.purchases.supplier_invoice_show', compact('invoice_main', 'invoice_items'));
    }

    public function supplier_invoice_payment($reference_no = null)
    {
        $invoice_main = null;
        $invoice_items = null;
        $supplier_name = null;

        if ($reference_no) {
            $invoice_main = PurchaseSupplierInvoice::where('reference_no', $reference_no)
                ->select('id', 'purchase_amount', 'currency', 'purchase_date', 'supplier_date', 'supplier_id', 'reference_no')
                ->firstOrFail();

            $invoice_items = PurchaseSupplierInvoice::where('reference_no', $reference_no)
                ->select('item_name')
                ->get();

            $supplier = Supplier::where('id', $invoice_main->supplier_id)->select('name')->first();
            $supplier_name = $supplier ? $supplier->name : 'Supplier Name';
        }

        $invoices = PurchaseSupplierInvoice::with('supplier')->get();
        // $payments = PurchasePayments::where('type', 'supplier')
        //     ->with(['invoice.supplier'])
        //     ->get();

        $payments = PurchasePayments::where('type', 'supplier')
            ->when($reference_no, function ($query, $reference_no) {
                return $query->where('reference_no', $reference_no);
            })
            ->with(['invoice.supplier'])
            ->get();

        return view('bar.pos.purchases.supplier_invoice_payment', compact('invoice_main', 'invoice_items', 'supplier_name', 'reference_no', 'invoices', 'payments'));
    }

  public function process_supplier_payment(Request $request, $reference_no)
{
    $request->validate([
        'reference_no' => 'required|string',
        'payment_method' => 'required|string',
        'account_type' => 'required|string',
        'account_no' => 'required|string',
        'amount' => 'required|numeric|min:0',
        'payment_date' => 'required|date',
        'attachment' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        'description' => 'nullable|string|max:500',
    ]);

    $invoice = PurchaseSupplierInvoice::where('reference_no', $reference_no)->firstOrFail();

    $attachmentPath = null;
    if ($request->hasFile('attachment')) {
        $attachmentPath = $request->file('attachment')->store('payment');
    }

    PurchasePayments::create([
        'invoice_id' => $invoice->id,
        'reference_no' => $reference_no,
        'amount' => $request->amount,
        'payment_method' => $request->payment_method,
        'account_type' => $request->account_type,
        'account_no' => $request->account_no,
        'payment_date' => $request->date,
        'attachment' => $attachmentPath,
        'description' => $request->description,
        'type' => 'supplier',
        'created_at' => now(),
    ]);

    $invoice->update(['status' => 'paid']);

    return response()->json([
        'message' => 'Payment to Supplier processed successfully!',
        'redirect' => route('payment.supplier', ['reference_no' => $reference_no])
    ]);
}


public function download_supplier_payment_pdf($reference_no, $id)
{
    $payment = PurchasePayments::where('id', $id)
        ->where('reference_no', $reference_no)
        ->with(['invoice.supplier'])
        ->firstOrFail();

    $pdf = Pdf::loadView('bar.pos.purchases.supplier_payment_pdf', compact('payment'));
    return $pdf->download('payment_' . $payment->reference_no . '.pdf');
}
    

    public function clearing_tracking_reference($reference_no)
    {
        $invoices = SupplierInvoiceExpenses::where('reference_no', $reference_no)
            ->select('id', 'reference_no', 'clearing_cost', 'shipping_cost')
            ->get();
        return view('bar.pos.purchases.clearing_tracking_reference_view', compact('invoices', 'reference_no'));
    }

    public function download_clearing_tracking_pdf($reference_no)
    {
        $invoices = SupplierInvoiceExpenses::where('reference_no', $reference_no)
            ->select('id', 'reference_no', 'clearing_cost', 'shipping_cost')
            ->get();
        $clearingItems = SupplierClearingItem::where('reference_no', $reference_no)
                ->with('item') 
                ->get(['item_id', 'item_name', 'item_tax']); 

        $groupedItems = $clearingItems->groupBy('item_name')->map(function ($items) {
                return [
                    'item_name' => ucfirst($items->first()->item_name), 
                    'item_tax' => $items->sum('item_tax'), 
                    'item_code' => $items->first()->item ? $items->first()->item->item_code : 'N/A'
                ];
            })->values();

        $pdf = Pdf::loadView('bar.pos.purchases.clearing_tracking_pdf', compact('invoices', 'clearingItems', 'groupedItems', 'reference_no'));
        return $pdf->download('clearing_tracking_' . $reference_no . '.pdf');
    }

    public function clearing_tracking_reference_add($reference_no)
    {
        $items = [];
        $purchaseItems = PurchaseSupplierInvoice::where('reference_no', $reference_no)
            ->select('id', 'item_id', 'item_name')
            ->get();
        if ($purchaseItems->isEmpty()) {
            return view('bar.pos.purchases.clearing_tracking_reference_add', compact('items', 'reference_no'))->withErrors(['reference_no' => 'No items found for this reference number.']);
        }
        $items = $purchaseItems->map(function ($item) {
            $item->item_tax = null;
            return $item;
        });
        return view('bar.pos.purchases.clearing_tracking_reference_add', compact('items', 'reference_no'));
    }

    public function clearing_tracking_reference_save(Request $request, $reference_no)
    {
        $request->validate([
            'reference_no' => 'required|string',
            'clearing_cost' => 'required|numeric|min:0',
            'shipping_cost' => 'required|numeric|min:0',
            'item_tax.*' => 'nullable|numeric|min:0',
        ]);

        if ($request->reference_no !== $reference_no) {
            Log::warning('Reference number mismatch', [
                'request_reference_no' => $request->reference_no,
                'route_reference_no' => $reference_no,
            ]);
            return response()->json(['message' => 'Reference number mismatch.'], 422);
        }

        $purchaseItems = PurchaseSupplierInvoice::where('reference_no', $reference_no)
            ->select('id', 'item_id', 'item_name')
            ->get();
        
        

        if ($purchaseItems->isEmpty()) {
            Log::warning('No purchase items found for reference_no', ['reference_no' => $reference_no]);
            return response()->json(['message' => 'No items found for this reference number.'], 422);
        }

        try {
            $expense = SupplierInvoiceExpenses::create([
                'reference_no' => $reference_no,
                'clearing_cost' => $request->clearing_cost,
                'shipping_cost' => $request->shipping_cost,
            ]);

            if (!$expense || !$expense->id) {
                Log::error('Failed to create SupplierInvoiceExpenses record', [
                    'reference_no' => $reference_no,
                    'clearing_cost' => $request->clearing_cost,
                    'shipping_cost' => $request->shipping_cost,
                ]);
                return response()->json(['message' => 'Failed to create expense record.'], 500);
            }

            Log::info('Created SupplierInvoiceExpenses', [
                'expense_id' => $expense->id,
                'reference_no' => $reference_no,
            ]);

            if ($request->has('item_tax')) {
                foreach ($purchaseItems as $item) {
                    $itemTax = $request->input('item_tax.' . $item->id);
                    if ($itemTax !== null) {
                        $clearingItem = SupplierClearingItem::create([
                            'reference_no' => $reference_no,
                            'item_id' => $item->item_id,
                            'item_name' => $item->item_name,
                            'item_tax' => $itemTax,
                            'expense_id' => $expense->id,
                        ]);
                        Log::info('Created SupplierClearingItem', [
                            'item_id' => $clearingItem->id,
                            'expense_id' => $expense->id,
                            'item_name' => $item->item_name,
                        ]);
                    }
                }
            }

            return response()->json(['message' => 'Clearing expenses saved successfully!']);
        } catch (\Exception $e) {
            Log::error('Error saving clearing expenses', [
                'reference_no' => $reference_no,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json(['message' => 'Failed to save: ' . $e->getMessage()], 500);
        }
    }

    public function clearing_tracking_reference_edit($reference_no, $id)
    {
        $invoice = SupplierInvoiceExpenses::where('reference_no', $reference_no)->findOrFail($id);
        $purchaseItems = PurchaseSupplierInvoice::where('reference_no', $reference_no)
            ->select('id', 'item_id', 'item_name')
            ->get();
        $clearingItems = SupplierClearingItem::where('reference_no', $reference_no)
            ->where('expense_id', $id)
            ->pluck('item_tax', 'item_name')
            ->toArray();
        $items = $purchaseItems->map(function ($item) use ($clearingItems) {
            $item->item_tax = $clearingItems[$item->item_name] ?? null;
            return $item;
        });

        return view('bar.pos.purchases.clearing_tracking_reference_edit', compact('invoice', 'items', 'reference_no'));
    }

    public function clearing_tracking_reference_update(Request $request, $reference_no, $id)
{
    $request->validate([
        'clearing_cost' => 'required|numeric|min:0',
        'shipping_cost' => 'required|numeric|min:0',
        'item_tax.*' => 'nullable|numeric|min:0',
    ]);

    try {
        $expense = SupplierInvoiceExpenses::where('reference_no', $reference_no)->findOrFail($id);
        $expense->update([
            'clearing_cost' => $request->clearing_cost,
            'shipping_cost' => $request->shipping_cost,
        ]);

        if (!$expense->id) {
            Log::error('Expense ID is null after update', [
                'expense_id' => $id,
                'reference_no' => $reference_no,
            ]);
            return response()->json(['message' => 'Invalid expense record.'], 500);
        }

        Log::info('Updated SupplierInvoiceExpenses', [
            'expense_id' => $expense->id,
            'reference_no' => $reference_no,
        ]);

        SupplierClearingItem::where('reference_no', $reference_no)
            ->where('expense_id', $id)
            ->delete();

        $purchaseItems = PurchaseSupplierInvoice::where('reference_no', $reference_no)
            ->select('id', 'item_id', 'item_name')
            ->get();

        if ($request->has('item_tax')) {
            foreach ($purchaseItems as $item) {
                $itemTax = $request->input('item_tax.' . $item->id);
                if ($itemTax !== null) {
                    $clearingItem = SupplierClearingItem::create([
                        'reference_no' => $reference_no,
                        'item_id' => $item->item_id,
                        'item_name' => $item->item_name,
                        'item_tax' => $itemTax,
                        'expense_id' => $expense->id,
                    ]);
                    Log::info('Created SupplierClearingItem', [
                        'item_id' => $clearingItem->id,
                        'expense_id' => $expense->id,
                        'item_name' => $item->item_name,
                    ]);
                }
            }
        }

        return response()->json(['message' => 'Clearing expenses updated successfully!']);
    } catch (\Exception $e) {
        Log::error('Error updating clearing expenses', [
            'reference_no' => $reference_no,
            'expense_id' => $id,
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);
        return response()->json(['message' => 'Failed to update: ' . $e->getMessage()], 500);
    }
}

   public function supplier_agent_payment($reference_no = null)
    {
        $invoice_main = null;
        $clearing_expense = 0;
        $supplier_name = null;

        if ($reference_no) {
            $invoice_main = PurchaseSupplierInvoice::where('reference_no', $reference_no)
                ->select('id', 'purchase_amount', 'currency', 'purchase_date', 'supplier_date', 'supplier_id', 'reference_no')
                ->firstOrFail();

            $clearing_expense = DB::table('store_pos_purchase_items_supplied_inv')
                ->where('reference_no', $reference_no)
                ->value('total_expenses') ?? 0;

            $supplier = Supplier::where('id', $invoice_main->supplier_id)->select('name')->first();
            $supplier_name = $supplier ? $supplier->name : 'Supplier Name';
        }

        $payments = PurchasePayments::where('type', 'clearing_agent')
            ->when($reference_no, function ($query, $reference_no) {
                return $query->where('reference_no', $reference_no);
            })
            ->with(['invoice.supplier'])
            ->get();

        Log::info('Clearing payments fetched', [
            'reference_no' => $reference_no,
            'payment_count' => $payments->count(),
            'payments' => $payments->toArray()
        ]);

        return view('bar.pos.purchases.supplier_agent_payment', compact('invoice_main', 'clearing_expense', 'supplier_name', 'reference_no', 'payments'));
    }

    public function process_clearing_payment(Request $request, $reference_no)
    {
        $request->validate([
            'reference_no' => 'required|string',
            'payment_method' => 'required|string',
            'account_type' => 'required|string',
            'account_no' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'attachment' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'description' => 'nullable|string|max:500',
        ]);

        $invoice = PurchaseSupplierInvoice::where('reference_no', $reference_no)->firstOrFail();

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('payment');
        }

        PurchasePayments::create([
            'invoice_id' => $invoice->id,
            'reference_no' => $reference_no,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'account_type' => $request->account_type,
            'account_no' => $request->account_no,
            'payment_date' => $request->payment_date,
            'attachment' => $attachmentPath,
            'description' => $request->description,
            'type' => 'clearing_agent',
            'created_at' => now(),
        ]);

        $invoice->update(['status' => 'paid']);

        return response()->json([
            'message' => 'Payment to Clearing Agent processed successfully!',
            'redirect' => route('payment.clearing_agent', ['reference_no' => $reference_no])
        ]);
    }

    public function download_clearing_payment_pdf($reference_no, $id)
    {
        $payment = PurchasePayments::where('id', $id)
            ->where('reference_no', $reference_no)
            ->where('type', 'clearing_agent')
            ->with(['invoice.supplier'])
            ->firstOrFail();

        $pdf = Pdf::loadView('bar.pos.purchases.supplier_payment_pdf', compact('payment'));
        return $pdf->download('clearing_payment_' . $payment->reference_no . '.pdf');
    }



     public function item_costing_invoice()
    {
       $costings = Costing::with('item')->get();

        return view('bar.pos.purchases.item_costing_invoice', compact('costings'));
    }
    
     public function update_sales_price(Request $request, $item_id)
    {
        $request->validate([
            'sales_price' => 'required|numeric|min:0',
        ]);

        $costing = Costing::where('item_id', $item_id)->firstOrFail();
        
        $costing->sales_price = $request->sales_price;
        $costing->save();

        $item = Items::findOrFail($item_id);
        $item->sales_price = $request->sales_price;
        $item->save();

        return redirect()->route('item_costing_invoice')->with('success', 'Sales price updated successfully.');
    }

}