<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Sales\SalePreQuotation;
use App\Models\Sales\SalePreQuotationItem;
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
        return view('sales.quotation-price-approval.items-details', compact('saleQuotation', 'saleQuotationItems',));
    }
}
