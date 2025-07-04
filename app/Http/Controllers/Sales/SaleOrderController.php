<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Sales\SaleOrder;
use App\Models\Sales\SalePreQuotation;
use App\Models\Sales\SalePreQuotationItem;
use App\Models\Sales\SaleQuotation;
use App\Models\Inventory\Location;
use Barryvdh\DomPDF\Facade\Pdf;

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
        return view('sales.order.show', compact('saleOrder', 'saleQuotation', 'saleQuotationItems',));
    }

    public function pdf($id)
    {
        $saleOrder=SaleOrder::find($id);
        $saleQuotation = SaleQuotation::find($saleOrder->sale_quotation_id);
        $salePreQuotation = SalePreQuotation::find($saleQuotation->sale_pre_quotation_id);
        $saleQuotationItems = SalePreQuotationItem::with('store')->where('sale_pre_quotation_id', $salePreQuotation->id)->get();
        view()->share(['saleQuotation' => $saleQuotation, 'saleQuotationItems' => $saleQuotationItems]);

        return PDF::loadView('sales.order.pdf-view')->setPaper('a4', 'portrait')->download('SALE ORDER REF NO # ' .  $saleOrder->reference_no . ".pdf");
    }

    public function fetchItemsByOrder($orderId)
    {
        $saleOrder = SaleOrder::with('quotation.preQuotation.items')->find($orderId);
        if (!$saleOrder || !$saleOrder->quotation || !$saleOrder->quotation->preQuotation) {
            return response()->json(['items' => []]);
        }

        $items = $saleOrder->quotation->preQuotation->items->map(function ($item) {

            $store = Location::find($item->pivot->store_id);
            return [
                'id' => $item->id,
                'name' => $item->name ?? 'N/A',
                'quantity' => $item->pivot->quantity ?? 1,
                'price' => $item->cost_price ?? 0,
                'unit' => $item->unit ?? '',
                'store' => $store->name ?? 'N/A',
                'pivot_id' => $item->pivot->id,
            ];
        });
        return response()->json(['items' => $items ]);
    }
}
