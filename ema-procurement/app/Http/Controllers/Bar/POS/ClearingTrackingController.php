<?php

namespace App\Http\Controllers\Bar\POS;
use App\Http\Controllers\Controller;
use App\Models\Payments\Payment_methodes;
use App\Models\Supplier;
use App\Models\Bar\POS\Purchase;
use App\Models\Bar\POS\PurchaseOrderTracking;
use App\Models\Bar\POS\ClearingTracking;
use App\Models\Bar\POS\ClearingTrackingAssigment;
use App\Models\Bar\POS\Activity;
use PDF;
use App\Models\Bar\POS\EmptyHistory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\Bar\POS\PurchaseSupplierInvoice;
use App\Models\Bar\POS\PurchaseSupplierInvoicePayment;


class ClearingTrackingController extends Controller
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

    public function index() {}

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
        //dd($request->all());
        $data['reference_no'] = $request->purchase_ref;
        $data['descriptions'] = $request->descriptions;
        $data['purchase_supplier_invoive_id'] = $request->purchase_supplier_invoive_id;
        $data['user_id'] = auth()->user()->id;
        $data['added_by'] = auth()->user()->added_by;

        $purchase = ClearingTracking::create($data);

        // Collect arrays from the form
        $poArr = $request->po;
        $supplierArr = $request->supplier_name;
        $padmArr = $request->padm;
        $invoiceDateArr = $request->invoice_date;
        $blNoArr = $request->bl_no;
        $productDescriptionArr = $request->product_description;
        $containerArr = $request->no_of_container;
        $shipNameArr = $request->ship_name;
        $etaArr = $request->eta;
        $copiesArr = $request->copies;
        $hardCopiesArr = $request->hard_copies;
        $printReceiveArr = $request->print_receive;
        $traAssessmentArr = $request->tra_assessment;
        $remarkArr = $request->remark;
        $etdArr = $request->etd;
        $icdArr = $request->icd;

        if (!empty($poArr)) {
            for ($i = 0; $i < count($poArr); $i++) {
                if (!empty($poArr[$i])) {
                    $line = [
                        'store_clearing_tracking' => $purchase->id,
                        'reference_no' => $purchase->reference_no,
                        'po' => $poArr[$i] ?? null,
                        'supplier_name' => $supplierArr[$i] ?? null,
                        'padm' => $padmArr[$i] ?? null,
                        'invoice_date' => $invoiceDateArr[$i] ?? null,
                        'bl_no' => $blNoArr[$i] ?? null,
                        'product_description' => $productDescriptionArr[$i] ?? null,
                        'no_of_container' => $containerArr[$i] ?? null,
                        'ship_name' => $shipNameArr[$i] ?? null,
                        'eta' => $etaArr[$i] ?? null,
                        'copies' => $copiesArr[$i] ?? null,
                        'hard_copies' => $hardCopiesArr[$i] ?? null,
                        'print_receive' => $printReceiveArr[$i] ?? null,
                        'tra_assessment' => $traAssessmentArr[$i] ?? null,
                        'remark' => $remarkArr[$i] ?? null,
                        'etd' => $etdArr[$i] ?? null,
                        'icd' => $icdArr[$i] ?? null,
                        'user_id' => auth()->user()->id,
                        'added_by' => auth()->user()->added_by,
                    ];

                    ClearingTrackingAssigment::create($line);
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

        return redirect(route('clearing_tracking.show', $purchase->reference_no));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($reference_no)
    {
      
        $p_order = ClearingTrackingAssigment::all()->where('reference_no', $reference_no);
        
         //$p_order = ClearingTrackingAssigment::where('reference_no', $reference_no)->get();
        
        $purchase = PurchaseSupplierInvoice::where('reference_no', $reference_no)
        ->first();

        return view('bar.pos.purchases.clearing_tracking', compact('p_order', 'purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $purchase = ClearingTracking::find($id);

        if (!$purchase) {
              return redirect()->back()->with('error', 'Clearing tracking record not found.');
        }

        ClearingTrackingAssigment::where('store_clearing_tracking', $purchase->id)
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

      return redirect()->route('clearing_tracking.show', $purchase->reference_no )
        ->with('success', 'Deleted successfully.');
}

}

