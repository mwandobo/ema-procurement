<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Bar\POS\CustomerCredibilityClient;
use App\Models\Sales\SalePreQuotation;
use App\Models\Sales\SalePreQuotationItem;
use App\Models\Sales\SaleQuotation;
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

        return redirect()->route('quotations.show', $id)
            ->with('success', 'Payment Method created successfully for Quotation with Reference #' . $saleQuotation['reference_no']);
    }

    public function quotation_credibility_approve()
    {
        $salesQuotations=SaleQuotation::with('client')->latest()->get();
        return view('sales.quotation.index',compact('salesQuotations'));
    }
}
