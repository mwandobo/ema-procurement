<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Bar\POS\CustomerCredibilityClient;
use App\Models\Sales\SaleOrder;
use App\Models\Sales\SalePreQuotation;
use App\Models\Sales\SalePreQuotationItem;
use App\Models\Sales\SaleQuotation;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaleQuotationController extends Controller
{
    public function index()
    {
        $salesQuotations=SaleQuotation::with('client')->latest()->get();
        return view('sales.quotation.index',compact('salesQuotations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_decisions' => 'required|array',
            'sale_pre_quotation_id' => 'required'
        ]);

        $user = auth()->user();
        $count = SaleQuotation::count();
        $pro = $count + 1;

        $salePreQuotation = SalePreQuotation::find($request->sale_pre_quotation_id);
        $data['reference_no'] = "DGC-SAQ-0" . $pro;
        $data['added_by'] = $user->id;
        $data['client_id'] = $salePreQuotation->client_id;
        $data['amount'] = $salePreQuotation->amount;
        $data['sale_pre_quotation_id'] = $request->sale_pre_quotation_id;
        $saleQuotation = SaleQuotation::create($data);

        return redirect()->route('quotations.index')
            ->with('success', 'Quotation created successfully with Reference #' . $data['reference_no']);
    }

    public function show($id,)
    {
        $saleQuotation = SaleQuotation::find($id);
        $salePreQuotation = SalePreQuotation::with('client')->find($saleQuotation->sale_pre_quotation_id);
        $saleQuotationItems = SalePreQuotationItem::with('store')->where('sale_pre_quotation_id', $salePreQuotation->id)->get();
        return view('sales.quotation.show', compact('saleQuotation', 'saleQuotationItems',));
    }

    public function pdf($id)
    {
        $saleQuotation = SaleQuotation::find($id);
        $salePreQuotation = SalePreQuotation::find($saleQuotation->sale_pre_quotation_id);
        $saleQuotationItems = SalePreQuotationItem::with('store')->where('sale_pre_quotation_id', $salePreQuotation->id)->get();
        view()->share(['saleQuotation' => $saleQuotation, 'saleQuotationItems' => $saleQuotationItems]);

        return PDF::loadView('sales.quotation.pdf-view')->setPaper('a4', 'portrait')->download('SALE QUOTATION REF NO # ' .  $saleQuotation->reference_no . ".pdf");
    }

    public function add_payment_method( Request $request, $id)
    {
        $request->validate([
            'payment_method' => 'required',
        ]);

        $saleQuotation = SaleQuotation::find($id);
        $payment_method = $request->payment_method;
        $saleQuotation->payment_method = $request->payment_method;

        if($payment_method === 'Credit'){
           $customer_credibility =  CustomerCredibilityClient::with('credibility')->where('client_id', $saleQuotation->client_id)->first();
           if($customer_credibility){
               $credibility_amount = $saleQuotation->amount * $customer_credibility->credibility->percentage / 100;
               $saleQuotation->credibility_amount = $credibility_amount;
           } else {
               $saleQuotation->needs_credibility_approved = true;
           }

        }else {
            $saleQuotation->credibility_amount = 0;
        }

        $saleQuotation->save();

        return redirect()->route('quotations.show', $id)
            ->with('success', 'Payment Method created successfully for Quotation with Reference #' . $saleQuotation['reference_no']);
    }

    public function make_payment( Request $request, $id)
    {
        $saleQuotation = SaleQuotation::find($id);
        $saleQuotation->paid_amount += $request->amount;
        $saleQuotation->save();
        $total_paid = $saleQuotation->paid_amount + $saleQuotation->credibility_amount;

        if($total_paid >= $saleQuotation->amount){
            $count = SaleOrder::count();
            $pro = $count + 1;
            $user = auth()->user();

            $saleOrderPayload = [
                'reference_no' => "DGC-SAO-0" . $pro,
                'sale_quotation_id' => $saleQuotation->id,
                'client_id' => $saleQuotation->client_id,
                'amount' => $saleQuotation->amount,
                'added_by' => $user->id,
            ];

            $saleOrder = SaleOrder::create($saleOrderPayload);
            if($saleOrder){
                return redirect()->route('quotations.show', $id)
                    ->with('success', 'Payment Done and Order created successfully for Quotation with Reference #' . $saleQuotation['reference_no']);
            }
        }

        return redirect()->route('quotations.show', $id)
            ->with('success', 'Payment created successfully for Quotation with Reference #' . $saleQuotation['reference_no']);
    }

    public function quotation_credibility_approve()
    {
        $salesQuotations=SaleQuotation::with('client')
            ->where('needs_credibility_approved', true)
            ->latest()->get();
        return view('sales.quotation.approved.index',compact('salesQuotations'));
    }

    public function quotation_credibility_approve_show($id)
    {
        $saleQuotation=SaleQuotation::with('client')->where('id', $id)->first();
        $salePreQuotation = SalePreQuotation::with('client')->find($saleQuotation->sale_pre_quotation_id);
        $saleQuotationItems = SalePreQuotationItem::with('store')->where('sale_pre_quotation_id', $salePreQuotation->id)->get();

        return view('sales.quotation.approved.show',compact('saleQuotation', 'saleQuotationItems',));
    }

    public function quotation_approve(Request $request, $id, $type)
    {
        $saleQuotation=SaleQuotation::find($id);
        if(!$saleQuotation){
            return redirect('/v2/sales/quotations/credibility-approve')->with('error', 'Quotation not found');
        }

        if($type === 'approve'){
            $request->validate([
                'credibility' => 'required',
            ]);

            if($request->credibility > 100){
                return redirect('/v2/sales/quotations/credibility-approve/' . $id)->with('error', 'Credibility can not be greater than 100%');
            }

            $saleQuotation->credibility_amount = $saleQuotation->amount *  $request->credibility / 100;
        }

        $user = auth()->user();
        $saleQuotation->credibility_approved_1 = $type === 'approve' ? 1 : 2;
        $saleQuotation->credibility_approved_1_by = $user->id;
        $saleQuotation->credibility_approved_1_date = Carbon::now();
        $saleQuotation->save();

        return redirect('/v2/sales/quotations/credibility-approve')
            ->with('success', 'Quotation was '. $type === 'approve' ?  'Approved' : "DisApproved ".  'Successfully, Reference #' . $saleQuotation['reference_no']);
    }

    public function approve_pdf($id)
    {
        $saleQuotation = SaleQuotation::find($id);
        $salePreQuotation = SalePreQuotation::find($saleQuotation->sale_pre_quotation_id);
        $saleQuotationItems = SalePreQuotationItem::with('store')->where('sale_pre_quotation_id', $salePreQuotation->id)->get();
        view()->share(['saleQuotation' => $saleQuotation, 'saleQuotationItems' => $saleQuotationItems]);

        return PDF::loadView('sales.quotation.approved.pdf-view')->setPaper('a4', 'portrait')->download('SALE QUOTATION REF NO # ' .  $saleQuotation->reference_no . ".pdf");
    }
}
