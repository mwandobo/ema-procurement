<?php

namespace App\Http\Controllers\Bar\POS;

use App\Http\Controllers\Controller;
use App\Models\Bar\POS\PurchaseOrderTracking;
use App\Models\Bar\POS\PurchaseOrderTrackingAssigment;
use App\Models\Bar\POS\PurchaseSupplierInvoice;
use App\Models\Bar\POS\ClearingTrackingAssigment;
use App\Models\Bar\POS\Activity;
use App\Models\Location;
use App\Models\ServiceType;
use App\Models\Bar\POS\Purchase;
use App\Models\Bar\POS\PurchaseItems;
use App\Models\Bar\POS\Items;
use App\Models\Bar\POS\Agent;
use App\Models\Bar\POS\Batches;
use App\Models\Bar\POS\Stocks;
use App\Models\User;
use PDF;
use App\Models\Bar\POS\EmptyHistory;
use App\Models\Supplier;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;


class PurchaseOrderTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function assignAgentSupplier(Request $request)
    {
    $request->validate([
        'id' => 'required|exists:store_pos_purchase_items_supplied_inv,id',
        'agent_id' => 'required|exists:suppliers,id',
    ]);

    $invoice = PurchaseSupplierInvoice::findOrFail($request->id);
    $invoice->agent_id = $request->agent_id;
    $invoice->save();

    return redirect()->back()->with('success', 'Clearing agent assigned successfully.');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
   //dd($request->purchase_ref);
    $data['reference_no'] = $request->purchase_ref;
    $data['descriptions'] = $request->descriptions;
    $data['purchase_supplier_invoive_id'] = $request->purchase_supplier_invoive_id;
    $data['user_id'] = auth()->user()->id;
    $data['added_by'] = auth()->user()->added_by;

    $purchase = PurchaseOrderTracking::create($data);
    

    $poArr = $request->po;
    $dateArr = $request->date;
    $remarkArr = $request->remark;
    $descriptionArr = $request->description;
    $qtyArr = $request->qty;
    $uomArr = $request->uom;
    $containersArr = $request->containers;
    $statusArr = $request->status;
    $etdArr = $request->ETD;
    $etaArr = $request->ETA;
    $pvalueArr = $request->p_value;
    $blArr = $request->BL;
    $remark2Arr = $request->remark_2;

    if (!empty($poArr)) {
        for ($i = 0; $i < count($poArr); $i++) {
            if (!empty($poArr[$i])) {
                $line = [
                    'purchase_order_tracking_id' => $purchase->id,
                    'reference_no' => $purchase->reference_no,
                    'po' => $poArr[$i],
                    'date' => $dateArr[$i] ?? null,
                    'remark' => $remarkArr[$i] ?? null,
                    'description' => $descriptionArr[$i] ?? null,
                    'qty' => $qtyArr[$i] ?? 0,
                    'uom' => $uomArr[$i] ?? null,
                    'containers' => $containersArr[$i] ?? null,
                    'status' => $statusArr[$i] ?? null,
                    'ETD' => $etdArr[$i] ?? null,
                    'ETA' => $etaArr[$i] ?? null,
                    'p_value' => $pvalueArr[$i] ?? null,
                    'BL' => $blArr[$i] ?? null,
                    'remark_2' => $remark2Arr[$i] ?? null,
                    'user_id' => auth()->user()->id,
                    'added_by' => auth()->user()->added_by,
                ];

                PurchaseOrderTrackingAssigment::create($line); // adjust model name if needed
            }
        }
    }

    // Log activity
    if (!empty($purchase)) {
        Activity::create([
            'added_by' => auth()->user()->added_by,
            'user_id' => auth()->user()->id,
            'module_id' => $purchase->id,
            'module' => 'Purchase',
            'activity' => "Purchase with ID " . $purchase->id . " is Created",
        ]);
    }

    return redirect(route('purchase_order_tracking.show', $purchase->reference_no));
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function show($reference_no)
    {
      
        
        $p_order = PurchaseOrderTrackingAssigment::where('reference_no', $reference_no)->get();
        
        
        $purchase = PurchaseSupplierInvoice::where('reference_no', $reference_no)
        ->first();

        return view('bar.pos.purchases.purchase_tracking', compact('p_order', 'purchase'));
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
        $data = Supplier::find($id);
        return view('bar.pos.supplier.manage-supplier', compact('data', 'id'));
    }

    public function discountModal(Request $request){
     
          $id=$request->id;
          $type = $request->type;
          
          //dd($id);
          
          if($type == 'purchase_tracking_modal'){
              
              $list = PurchaseOrderTrackingAssigment::where('purchase_order_tracking_id',$id)->get();
                    
              return view('bar.pos.purchases.purchase_tracking_modal',compact('list'));
          }elseif($type == 'clearing_tracking_modal'){
          
              $list = ClearingTrackingAssigment::where('store_clearing_tracking',$id)->get();
                    
              return view('bar.pos.purchases.clearing_tracking_modal',compact('list'));
          
          }elseif($type == 'agent_modal'){
          
              $list = Agent::all();
              
              $check_supplier = PurchaseSupplierInvoice::find($id);
                    
              return view('bar.pos.purchases.agent_modal',compact('list','id','check_supplier'));
          
          }
      
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

        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',

        ]);

        $data = POSSupplier::find($id);
        $result = $request->all();
        $data->update($result);

        if (!empty($data)) {
            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'Supplier',
                    'activity' => "Supplier " .  $request->name . "  Updated",
                ]
            );
        }
        Toastr::success('Supplier Updated Successfully', 'Success');
        return redirect(route('bar_pos_supplier.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchase = PurchaseOrderTracking::find($id);

        if (!$purchase) {
              return redirect()->back()->with('error', 'Purchase tracking record not found.');
        }

        PurchaseOrderTrackingAssigment::where('purchase_order_tracking_id', $purchase->id)
        ->delete();


        if (!empty($data)) {
            $activity = Activity::create(
                [
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'Supplier',
                    'activity' => "Supplier " .  $data->name . "  Deleted",
                ]
            );
        }
        
       $purchase->delete();

      return redirect()->route('purchase_order_tracking.show', $purchase->reference_no )
        ->with('success', 'Deleted successfully.');
}

}
