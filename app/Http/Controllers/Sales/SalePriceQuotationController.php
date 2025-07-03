<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Sales\SalePreQuotation;
use App\Models\Sales\SalePreQuotationItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SalePriceQuotationController extends Controller
{

    public function index()
    {
        $salesQuotations=SalePreQuotation::with('client')->get();
        return view('sales.quotation-price-approval.index',compact('salesQuotations'));
    }

    public function show($id, Request $request)
    {
        $saleQuotation = SalePreQuotation::find($id);
        $saleQuotationItems = SalePreQuotationItem::with('store')->where('sale_pre_quotation_id', $id)->get();
        return view('sales.quotation-price-approval.show', compact('saleQuotation', 'saleQuotationItems',));
    }

    public function pdf($id)
    {
        $saleQuotation = SalePreQuotation::find($id);
        $saleQuotationItems = SalePreQuotationItem::with('store')->where('sale_pre_quotation_id', $id)->get();

        view()->share(['saleQuotation' => $saleQuotation, 'saleQuotationItems' => $saleQuotationItems]);

        return PDF::loadView('sales.quotation-price-approval.pdf-view')->setPaper('a4', 'portrait')->download('SALE PRE-QUOTATION REF NO # ' .  $saleQuotation->reference_no . ".pdf");
    }
}
