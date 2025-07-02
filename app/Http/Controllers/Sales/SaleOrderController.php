<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Sales\SaleOrder;
use App\Models\Sales\SalePreQuotation;
use App\Models\Sales\SalePreQuotationItem;
use App\Models\Sales\SaleQuotation;

class SaleOrderController extends Controller
{
    public function index()
    {
        $saleOrders=SaleOrder::with(['quotation.client',])->latest()->get();
        return view('sales.order.index',compact('saleOrders'));
    }

    public function show($id)
    {
        $saleOrder=SaleOrder::find($id);
        $saleQuotation = SaleQuotation::find($saleOrder->sale_quotation_id);
        $salePreQuotation = SalePreQuotation::with('client')->find($saleQuotation->sale_pre_quotation_id);
        $saleQuotationItems = SalePreQuotationItem::with('store')->where('sale_pre_quotation_id', $salePreQuotation->id)->get();
        return view('sales.order.show', compact('saleQuotation', 'saleQuotationItems',));
    }
}
