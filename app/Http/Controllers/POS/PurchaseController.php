<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use App\Models\Accounting\AccountCodes;
use App\Models\Accounting\JournalEntry;
use App\Models\Currency;
use App\Models\Inventory\Location;
use App\Models\InventoryList;
use App\Models\MechanicalItem;
use App\Models\MechanicalRecommedation;
use App\Models\Payments\Payment_methodes;
use App\Models\POS\Activity;
use App\Models\POS\Items;
use App\Models\POS\Purchase;
use App\Models\POS\PurchaseHistory;
use App\Models\POS\PurchaseItems;
use App\Models\POS\PurchasePayments;
use App\Models\POS\PurchaseReceive;
use App\Models\POS\SupplierOrder;
use App\Models\PurchaseInventory;
use App\Models\PurchaseItemInventory;
use App\Models\ServiceType;
use App\Models\Supplier;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PDF;

//use App\Models\Purchase_items;

//use App\Models\POS\Supplier;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $currency = Currency::all();
        $purchases = Purchase::all()->where('order_status', 1);
        $supplier = Supplier::all();
        $name = Items::all();
        $location = Location::all();
        $type = "";
        return view('pos.purchases.index', compact('name', 'supplier', 'currency', 'purchases', 'location', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //

        $count = Purchase::count();
        $pro = $count + 1;
        $data['reference_no'] = "DGC-PUR-0" . $pro;
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
        $data['user_id'] = auth()->user()->id;
        $data['added_by'] = auth()->user()->added_by;

        $purchase = Purchase::create($data);

        $amountArr = str_replace(",", "", $request->amount);
        $totalArr = str_replace(",", "", $request->tax);

        $nameArr = $request->item_name;
        $qtyArr = $request->quantity;
        $priceArr = $request->price;
        $rateArr = $request->tax_rate;
        $unitArr = $request->unit;
        $costArr = str_replace(",", "", $request->total_cost);
        $taxArr = str_replace(",", "", $request->total_tax);


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
                        'quantity' => $qtyArr[$i],
                        'due_quantity' => $qtyArr[$i],
                        'tax_rate' => $rateArr [$i],
                        'unit' => $unitArr[$i],
                        'price' => $priceArr[$i],
                        'total_cost' => $costArr[$i],
                        'total_tax' => $taxArr[$i],
                        'items_id' => $savedArr[$i],
                        'order_no' => $i,
                        'added_by' => auth()->user()->added_by,
                        'purchase_id' => $purchase->id
                    );

                    PurchaseItems::create($items);


                }
            }

            $cost['due_amount'] = $cost['purchase_amount'] + $cost['purchase_tax'];
            $cost['due_quantity'] = $cost['total_quantity'];
            // PurchaseItems::where('id',$purchase->id)->update($cost);
        }

        Purchase::find($purchase->id)->update($cost);

        if (!empty($purchase)) {
            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $purchase->id,
                    'module' => 'Purchase',
                    'activity' => "Purchase with reference no " . $purchase->reference_no . "  is Created",
                ]
            );
        }

        return redirect(route('purchase.show', $purchase->id));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
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
            $totalArr = str_replace(",", "", $request->tax);

            $nameArr = $request->item_name;
            $qtyArr = $request->quantity;
            $priceArr = $request->price;
            $rateArr = $request->tax_rate;
            $unitArr = $request->unit;
            $costArr = str_replace(",", "", $request->total_cost);
            $taxArr = str_replace(",", "", $request->total_tax);
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
                            'quantity' => $qtyArr[$i],
                            'due_quantity' => $qtyArr[$i],
                            'tax_rate' => $rateArr [$i],
                            'unit' => $unitArr[$i],
                            'price' => $priceArr[$i],
                            'total_cost' => $costArr[$i],
                            'total_tax' => $taxArr[$i],
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
                $cost['due_amount'] = $cost['purchase_amount'] + $cost['purchase_tax'];
                Purchase::where('id', $id)->update($cost);
            }


            if (!empty($nameArr)) {
                for ($i = 0; $i < count($nameArr); $i++) {
                    if (!empty($nameArr[$i])) {

                        $lists = array(
                            'quantity' => $qtyArr[$i],
                            'item_id' => $savedArr[$i],
                            'added_by' => auth()->user()->added_by,
                            'supplier_id' => $data['supplier_id'],
                            'location' => $data['location'],
                            'purchase_date' => $data['purchase_date'],
                            'type' => 'Purchases',
                            'purchase_id' => $id
                        );

                        PurchaseHistory::create($lists);

                        $inv = Items::where('id', $nameArr[$i])->first();
                        $q = $inv->quantity + $qtyArr[$i];
                        Items::where('id', $nameArr[$i])->update(['quantity' => $q]);
                    }
                }

            }


            $inv = Purchase::find($id);
            $supp = Supplier::find($inv->supplier_id);

            $itm = PurchaseItems::where('purchase_id', $id)->get();

            foreach ($itm as $x) {

                $acc = Items::find($x->item_name);

                $cr = AccountCodes::where('id', $acc->stock_id)->first();
                $journal = new JournalEntry();
                $journal->account_id = $acc->stock_id;
                $date = explode('-', $inv->purchase_date);
                $journal->date = $inv->purchase_date;
                $journal->year = $date[0];
                $journal->month = $date[1];
                $journal->transaction_type = 'pos_purchase';
                $journal->name = 'Purchases';
                $journal->debit = $x->total_cost * $inv->exchange_rate;
                $journal->income_id = $inv->id;
                $journal->currency_code = $inv->exchange_code;
                $journal->exchange_rate = $inv->exchange_rate;
                $journal->added_by = auth()->user()->added_by;
                $journal->notes = "Purchase for Purchase Order " . $inv->reference_no . " by Supplier " . $supp->name;
                $journal->save();

                if ($inv->purchase_tax > 0) {
                    $tax = AccountCodes::where('account_name', 'VAT IN')->first();
                    $journal = new JournalEntry();
                    $journal->account_id = $tax->id;
                    $date = explode('-', $inv->purchase_date);
                    $journal->date = $inv->purchase_date;
                    $journal->year = $date[0];
                    $journal->month = $date[1];
                    $journal->transaction_type = 'pos_purchase';
                    $journal->name = 'Purchases';
                    $journal->debit = $x->total_tax * $inv->exchange_rate;
                    $journal->income_id = $inv->id;
                    $journal->currency_code = $inv->exchange_code;
                    $journal->exchange_rate = $inv->exchange_rate;
                    $journal->added_by = auth()->user()->added_by;
                    $journal->notes = "Purchase Tax for Purchase Order " . $inv->reference_no . " by Supplier " . $supp->name;
                    $journal->save();
                }

                $codes = AccountCodes::where('account_name', 'Creditors Control Account')->first();
                $journal = new JournalEntry();
                $journal->account_id = $codes->id;
                $date = explode('-', $inv->purchase_date);
                $journal->date = $inv->purchase_date;
                $journal->year = $date[0];
                $journal->month = $date[1];
                $journal->transaction_type = 'pos_purchase';
                $journal->name = 'Purchases';
                $journal->income_id = $inv->id;
                $journal->credit = ($x->total_cost + $x->total_tax) * $inv->exchange_rate;
                $journal->currency_code = $inv->exchange_code;
                $journal->exchange_rate = $inv->exchange_rate;
                $journal->added_by = auth()->user()->added_by;
                $journal->notes = "Credit for Purchase Order  " . $inv->reference_no . " by Supplier " . $supp->name;
                $journal->save();


            }

            if (!empty($purchase)) {
                $activity = Activity::create(
                    [
                        'added_by' => auth()->user()->added_by,
                        'user_id' => auth()->user()->id,
                        'module_id' => $id,
                        'module' => 'Purchase',
                        'activity' => "Purchase with reference no " . $purchase->reference_no . "  Goods Received",
                    ]
                );
            }
            return redirect(route('purchase.show', $id));


        } else {
            if ($request->type == 'approve') {
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
                $totalArr = str_replace(",", "", $request->tax);

                $nameArr = $request->item_name;
                $qtyArr = $request->quantity;
                $priceArr = $request->price;
                $rateArr = $request->tax_rate;
                $unitArr = $request->unit;
                $costArr = str_replace(",", "", $request->total_cost);
                $taxArr = str_replace(",", "", $request->total_tax);
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
                                'quantity' => $qtyArr[$i],
                                'due_quantity' => $qtyArr[$i],
                                'tax_rate' => $rateArr [$i],
                                'unit' => $unitArr[$i],
                                'price' => $priceArr[$i],
                                'total_cost' => $costArr[$i],
                                'total_tax' => $taxArr[$i],
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
                    $cost['due_amount'] = $cost['purchase_amount'] + $cost['purchase_tax'];
                    $cost['due_quantity'] = $cost['total_quantity'];
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
                            'activity' => "First Approval of Purchase with reference no " . $purchase->reference_no . " by " . $user->name,
                        ]
                    );
                }

                //return redirect(route('purchase.show',$id));

                Toastr::success('First Approval is Successfully', 'Success');
                return redirect(route('purchase.order'));

            } else {
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
                $totalArr = str_replace(",", "", $request->tax);

                $nameArr = $request->item_name;
                $qtyArr = $request->quantity;
                $priceArr = $request->price;
                $rateArr = $request->tax_rate;
                $unitArr = $request->unit;
                $costArr = str_replace(",", "", $request->total_cost);
                $taxArr = str_replace(",", "", $request->total_tax);
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
                                'quantity' => $qtyArr[$i],
                                'due_quantity' => $qtyArr[$i],
                                'tax_rate' => $rateArr [$i],
                                'unit' => $unitArr[$i],
                                'price' => $priceArr[$i],
                                'total_cost' => $costArr[$i],
                                'total_tax' => $taxArr[$i],
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
                    $cost['due_amount'] = $cost['purchase_amount'] + $cost['purchase_tax'];
                    $cost['due_quantity'] = $cost['total_quantity'];
                    Purchase::where('id', $id)->update($cost);
                }

                if (!empty($purchase)) {
                    $activity = Activity::create(
                        [
                            'added_by' => auth()->user()->added_by,
                            'user_id' => auth()->user()->id,
                            'module_id' => $id,
                            'module' => 'Purchase',
                            'activity' => "Purchase with reference no " . $purchase->reference_no . "  is Updated",
                        ]
                    );
                }

                return redirect(route('purchase.show', $id));

            }
        }


    }

    public function show($id, Request $request)
    {

        $purchases = Purchase::find($id);
        $purchase_items = PurchaseItems::where('purchase_id', $id)->where('due_quantity', '>', '0')->get();
        $payments = PurchasePayments::where('purchase_id', $id)->get();
        $name = Items::all();
        $supplier = Supplier::all();
        $location = Location::all();
        $orders = SupplierOrder::where('purchase_id', $id)->get();
        $old = SupplierOrder::where('purchase_id', $id)->where('status', '1')->first();

        switch ($request->type) {
            case 'receive':
                return view('pos.purchases.item_details',
                    compact('purchases', 'purchase_items', 'payments', 'id', 'name'));
                break;
            case 'order':
                return view('pos.purchases.create_order',
                    compact('purchases', 'purchase_items', 'payments', 'id', 'name', 'supplier', 'location'));
                break;
            case 'supplier':
                return view('pos.purchases.confirm_supplier',
                    compact('purchases', 'purchase_items', 'payments', 'id', 'name', 'supplier', 'location', 'orders',
                        'old'));
                break;
            default:
                if ($purchases->order_status == '1') {
                    return view('pos.purchases.purchase_details', compact('purchases', 'purchase_items', 'payments'));
                } else {
                    return view('pos.purchases.order_details',
                        compact('purchases', 'purchase_items', 'payments', 'orders'));
                }
        }

    }


    public function edit($id)
    {
        //
        $currency = Currency::all();
        $supplier = Supplier::all();
        $name = Items::all();
        $location = Location::all();
        $data = Purchase::find($id);
        $items = PurchaseItems::where('purchase_id', $id)->get();
        $type = "";

        return view('pos.purchases.purchase_requisition',
            compact('name', 'supplier', 'currency', 'location', 'data', 'id', 'items', 'type'));
    }


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
                    'activity' => "Purchase with reference no " . $purchases->reference_no . "  is Deleted",
                ]
            );
        }
        $purchases->delete();

        Toastr::success('Deleted Successfully', 'Success');
        return redirect(route('purchase.index'));
    }

    public function findPrice(Request $request)
    {
        $price = Items::where('id', $request->id)->get();
        return response()->json($price);

    }

    public function discountModal(Request $request)
    {

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
                    'activity' => "Purchase with reference no " . $purchase->reference_no . "  is Approved",
                ]
            );
        }
        Toastr::success('Approved Successfully', 'Success');

        return redirect(route('purchase.index'));
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
                    'activity' => "Purchase with reference no " . $purchase->reference_no . "  is Cancelled",
                ]
            );
        }
        Toastr::success('Cancelled Successfully', 'Success');
        return redirect(route('purchase.index'));
    }

    public function first_approval($id)
    {
        //
        $currency = Currency::all();
        $supplier = Supplier::all();
        $name = Items::all();
        $location = Location::all();
        $data = Purchase::find($id);
        $items = PurchaseItems::where('purchase_id', $id)->get();
        $type = "approve";
        return view('pos.purchases.purchase_requisition',
            compact('name', 'supplier', 'currency', 'location', 'data', 'id', 'items', 'type'));
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
                    'activity' => "Second Approval of Purchase with reference no " . $purchase->reference_no . " by " . $user->name,
                ]
            );
        }

        Toastr::success('First Approval is Successfully', 'Success');
        return redirect(route('purchase.index'));
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
                    'activity' => "Final Approval of Purchase with reference no " . $purchase->reference_no . " by " . $user->name,
                ]
            );
        }

        Toastr::success('Final Approval is Successfully', 'Success');
        return redirect(route('purchase.index'));
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
                    'activity' => "First  Approval has been reversed for Purchase with reference no " . $purchase->reference_no . " by " . $user->name,
                ]
            );
        }

        Toastr::success('Disapproval is Successfully', 'Success');
        return redirect(route('purchase.requisition'));
    }

    public function final_disapproval($id)
    {
        //
        $purchase = Purchase::find($id);
        $data['approval_2'] = '';
        $data['approval_2_date'] = '';
        //$data['approval_1'] = '';
        $purchase->update($data);

        if (!empty($purchase)) {
            $user = User::find(auth()->user()->id);
            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'Purchase',
                    'activity' => "First and Second Approval has been reversed for Purchase with reference no " . $purchase->reference_no . " by " . $user->name,
                ]
            );
        }

        Toastr::success('Disapproval is Successfully', 'Success');
        return redirect(route('purchase.index'));
    }


    public function save_order(Request $request)
    {
        //
        $id = $request->purchase_id;
        $location = $request->location;
        $supplier = $request->supplier_id;


        $purchase = Purchase::find($id);


        $lists = array(
            'quantity' => $purchase->total_quantity,
            'added_by' => auth()->user()->added_by,
            'supplier_id' => $supplier,
            'location' => $location,
            'purchase_date' => $purchase->purchase_date,
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
                    'activity' => " Purchase Order created with reference no " . $purchase->reference_no . " to supplier  " . $user->name,
                ]
            );
        }

        Toastr::success('Created Successfully', 'Success');
        return redirect(route('purchase.show', $id));
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
                    'activity' => " Purchase Order confirmed with reference no " . $purchase->reference_no . " to supplier  " . $user->name,
                ]
            );
        }

        Toastr::success('Confirmed Successfully', 'Success');
        return redirect(route('purchase.show', $order->purchase_id));
    }

    public function grn(Request $request)
    {
        //
        $id = $request->purchase_id;
        $nameArr = $request->items_id;
        $qtyArr = $request->quantity;
        $savedArr = $request->items_id;

        $purchase = Purchase::find($id);

        if (!empty($nameArr)) {
            for ($i = 0; $i < count($nameArr); $i++) {
                if (!empty($nameArr[$i])) {

                    $lists = array(
                        'quantity' => $qtyArr[$i],
                        'item_id' => $savedArr[$i],
                        'added_by' => auth()->user()->added_by,
                        'supplier_id' => $purchase->supplier_id,
                        'location' => $purchase->location,
                        'purchase_date' => $purchase->purchase_date,
                        'type' => 'Purchases',
                        'purchase_id' => $id
                    );

                    PurchaseHistory::create($lists);
                    PurchaseReceive::create($lists);

                    $it = Items::where('id', $nameArr[$i])->first();
                    $q = $it->quantity + $qtyArr[$i];
                    Items::where('id', $nameArr[$i])->update(['quantity' => $q]);


                    $dq = Purchase::find($id);
                    $pdq = $dq->due_quantity - $qtyArr[$i];
                    Purchase::where('id', $id)->update(['due_quantity' => $pdq]);


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

                    $cr = AccountCodes::where('id', $acc->stock_id)->first();
                    $journal = new JournalEntry();
                    $journal->account_id = $acc->stock_id;
                    $date = explode('-', $inv->purchase_date);
                    $journal->date = $inv->purchase_date;
                    $journal->year = $date[0];
                    $journal->month = $date[1];
                    $journal->transaction_type = 'pos_purchase';
                    $journal->name = 'Purchases';
                    $journal->debit = ($itm->price * $qtyArr[$i]) * $inv->exchange_rate;
                    $journal->income_id = $inv->id;
                    $journal->currency_code = $inv->exchange_code;
                    $journal->exchange_rate = $inv->exchange_rate;
                    $journal->added_by = auth()->user()->added_by;
                    $journal->notes = "Purchase for Purchase Order " . $inv->reference_no . " by Supplier " . $supp->name;
                    $journal->save();

                    if ($itm->total_tax > 0) {
                        $tax = AccountCodes::where('account_name', 'VAT IN')->first();
                        $journal = new JournalEntry();
                        $journal->account_id = $tax->id;
                        $date = explode('-', $inv->purchase_date);
                        $journal->date = $inv->purchase_date;
                        $journal->year = $date[0];
                        $journal->month = $date[1];
                        $journal->transaction_type = 'pos_purchase';
                        $journal->name = 'Purchases';
                        $journal->debit = (($itm->price * $qtyArr[$i]) * 0.18) * $inv->exchange_rate;
                        $journal->income_id = $inv->id;
                        $journal->currency_code = $inv->exchange_code;
                        $journal->exchange_rate = $inv->exchange_rate;
                        $journal->added_by = auth()->user()->added_by;
                        $journal->notes = "Purchase Tax for Purchase Order " . $inv->reference_no . " by Supplier " . $supp->name;
                        $journal->save();
                    }

                    $codes = AccountCodes::where('account_name', 'Creditors Control Account')->first();
                    $journal = new JournalEntry();
                    $journal->account_id = $codes->id;
                    $date = explode('-', $inv->purchase_date);
                    $journal->date = $inv->purchase_date;
                    $journal->year = $date[0];
                    $journal->month = $date[1];
                    $journal->transaction_type = 'pos_purchase';
                    $journal->name = 'Purchases';
                    $journal->income_id = $inv->id;
                    $journal->credit = ($cost + $total_tax) * $inv->exchange_rate;
                    $journal->currency_code = $inv->exchange_code;
                    $journal->exchange_rate = $inv->exchange_rate;
                    $journal->added_by = auth()->user()->added_by;
                    $journal->notes = "Credit for Purchase Order  " . $inv->reference_no . " by Supplier " . $supp->name;
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
                    'activity' => "Good Receive for Purchase with reference no " . $purchase->reference_no . " by " . $user->name,
                ]
            );
        }

        Toastr::success('Good Receive Done Successfully', 'Success');
        return redirect(route('purchase.index'));
    }

    public function confirm_order($id)
    {
        //
        $purchase = Purchase::find($id);
        $data['order_status'] = 1;
        $purchase->update($data);

        if (!empty($purchase)) {

            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'Purchase',
                    'activity' => "Purchase Order with reference no " . $purchase->reference_no . " has been confirmed .",
                ]
            );
        }

        Toastr::success('Confirmed Successfully', 'Success');
        return redirect(route('purchase.index'));
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

            $due = PurchaseHistory::where('purchase_id', $id)->where('item_id', $i->item_name)->where('type',
                'Purchases')->where('added_by', auth()->user()->added_by)->sum('quantity');
            $return = PurchaseHistory::where('purchase_id', $id)->where('item_id', $i->item_name)->where('type',
                'Debit Note')->where('added_by', auth()->user()->added_by)->sum('quantity');
            $qty = $due - $return;

            $prev['due_quantity'] = $qty;
            $prev['total_tax'] = ($i->price * $qty) * $i->tax_rate;
            $prev['total_cost'] = $i->price * $qty;

            PurchaseItems::where('id', $i->id)->update($prev);

            $data['purchase_amount'] += $prev['total_cost'];
            $data['purchase_tax'] += $prev['total_tax'];
            $data['due_quantity'] += $qty;

        }


        $purchase_amount = PurchaseItems::where('purchase_id', $id)->sum('total_cost');
        $purchase_tax = PurchaseItems::where('purchase_id', $id)->sum('total_tax');

        $data['due_amount'] = $purchase_amount + $purchase_tax;
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
                    'activity' => "Purchase with reference no " . $purchase->reference_no . " has been issued by " . $user->name,
                ]
            );
        }

        Toastr::success('Issued Successfully', 'Success');
        return redirect(route('purchase.index'));
    }

    public function receive($id)
    {
        //
        $currency = Currency::all();
        $supplier = Supplier::all();
        $name = Items::all();
        $location = Location::all();
        $data = Purchase::find($id);
        $items = PurchaseItems::where('purchase_id', $id)->get();
        $type = "receive";
        return view('pos.purchases.index',
            compact('name', 'supplier', 'currency', 'location', 'data', 'id', 'items', 'type'));
    }

    public function purchase_requisition()
    {
        //
        $currency = Currency::all();
        $purchases = Purchase::all()->where('purchase_status', 0)->where('good_receive', 0)->where('order_status', 0);
        $supplier = Supplier::all();
        $name = Items::all();
        $location = Location::all();
        $type = "";
        return view('pos.purchases.purchase_requisition',
            compact('name', 'supplier', 'currency', 'purchases', 'location', 'type'));
    }

    public function purchase_order()
    {
        //
        $currency = Currency::all();
        $purchases = Purchase::all()->where('purchase_status', 1)->where('good_receive', 0)->where('order_status', 0);
        $supplier = Supplier::all();
        $name = Items::all();
        $location = Location::all();
        $type = "";
        return view('pos.purchases.purchase_order',
            compact('name', 'supplier', 'currency', 'purchases', 'location', 'type'));
    }

    public function make_payment($id)
    {
        //
        $invoice = Purchase::find($id);
        $payment_method = Payment_methodes::all();
        $bank_accounts = AccountCodes::where('account_group', 'Cash And Banks')->where('added_by',
            auth()->user()->added_by)->get();
        return view('pos.purchases.purchase_payments', compact('invoice', 'payment_method', 'bank_accounts'));
    }

    public function inv_pdfview(Request $request)
    {
        //
        $purchases = Purchase::find($request->id);
        $purchase_items = PurchaseItems::where('purchase_id', $request->id)->get();

        view()->share(['purchases' => $purchases, 'purchase_items' => $purchase_items]);

        if ($request->has('download')) {
            if ($purchases->order_status == '1') {
                $pdf = PDF::loadView('pos.purchases.purchase_details_pdf')->setPaper('a4', 'potrait');
            } else {
                $pdf = PDF::loadView('pos.purchases.order_details_pdf')->setPaper('a4', 'potrait');
            }
            return $pdf->download('PURCHASES REF NO # ' . $purchases->reference_no . ".pdf");
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
            $pdf = PDF::loadView('pos.purchases.order_pdf')->setPaper('a4', 'potrait');
            return $pdf->download('PURCHASES ORDER REF NO # ' . $purchases->reference_no . ".pdf");
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
            $pdf = PDF::loadView('pos.purchases.issue_supplier_pdf')->setPaper('a4', 'potrait');
            return $pdf->download('ISSUED PURCHASES REF NO # ' . $purchases->reference_no . ".pdf");
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
            $data = Purchase::where('supplier_id', $request->account_id)->whereBetween('purchase_date',
                [$start_date, $end_date])->where('status', '!=', 0)->get();
        } else {
            $data = [];
        }


        return view('pos.purchases.creditors_report',
            compact('start_date',
                'end_date', 'chart_of_accounts', 'data', 'account_id'));
    }

    public function summary(Request $request)
    {
        //

        $all_employee = User::where('added_by', auth()->user()->added_by)->get();

        $search_type = $request->search_type;
        $check_existing_payment = '';
        $start_date = '';
        $end_date = '';
        $by_month = '';
        $user_id = '';
        $flag = $request->flag;


        if (!empty($flag)) {
            if ($search_type == 'employee') {
                $user_id = $request->user_id;
                $check_existing_payment = Activity::where('user_id', $user_id)->get();
            } else {
                if ($search_type == 'period') {
                    $start_date = $request->start_date;
                    $end_date = $request->end_date;
                    $check_existing_payment = Activity::all()->where('added_by',
                        auth()->user()->added_by)->whereBetween('date', [$start_date, $end_date]);
                } elseif ($search_type == 'activities') {
                    $check_existing_payment = Activity::where('added_by', auth()->user()->added_by)->get();
                }
            }
        } else {
            $check_existing_payment = '';
            $start_month = '';
            $end_month = '';
            $search_type = '';
            $by_month = '';
            $user_id = '';
        }


        return view('pos.purchases.summary',
            compact('all_employee', 'check_existing_payment', 'start_date', 'end_date', 'search_type', 'user_id',
                'flag'));
    }
}
