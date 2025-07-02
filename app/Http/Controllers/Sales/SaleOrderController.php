<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Sales\SaleOrder;
use App\Models\Sales\SalePreQuotation;
use App\Models\Sales\SalePreQuotationItem;
use App\Models\Sales\SaleQuotation;
use App\Models\Inventory\Location;


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

    public function fetchItemsByOrder($orderId)
    {
        $saleOrder = SaleOrder::with('quotation.preQuotation.items')->find($orderId);

        if (!$saleOrder || !$saleOrder->quotation || !$saleOrder->quotation->preQuotation) {
            return response()->json(['items' => []]);
        }

//        dd( $saleOrder->quotation->preQuotation->items);


        $items = $saleOrder->quotation->preQuotation->items->map(function ($item) {

            $store = Location::find($item->pivot->store_id);
            return [
                'id' => $item->id,
                'name' => $item->name ?? 'N/A',
                'quantity' => $item->pivot->quantity ?? 1,
                'price' => $item->cost_price ?? 0,
                'unit' => $item->unit ?? '',
                'store' => $store->name ?? 'N/A',
            ];
        });

        return response()->json(['items' => $items ]);
    }
}
