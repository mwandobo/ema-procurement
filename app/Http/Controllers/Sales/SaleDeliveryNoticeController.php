<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Bar\POS\Client;
use App\Models\Bar\POS\Items;
use App\Models\Inventory\Location;
use App\Models\Sales\DeliveryNotice;
use App\Models\Sales\DeliveryNoticeItems;
use App\Models\Sales\SaleOrder;
use App\Models\Sales\SalePreQuotation;
use App\Models\Sales\SalePreQuotationItem;
use App\Models\Sales\SaleQuotation;
use DB;
use Illuminate\Http\Request;

class SaleDeliveryNoticeController extends Controller
{
    public function index()
    {
        $saleOrders = SaleOrder::all();
        $deliveryNotices = DeliveryNotice::with('order.quotation.client')->latest()->get();
        return view('sales.delivery-notice.index', compact('deliveryNotices', 'saleOrders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sale_order_id' => 'required',
            'item_ids' => 'required|array',
            'delivered_quantity' => 'required|array',
            'ordered_quantity' => 'required|array'
        ]);

        $user = auth()->user();
        $count = DeliveryNotice::count();
        $pro = $count + 1;

        $order = SaleOrder::find($request->sale_order_id);
        if (!$order) {

            return redirect()->route('deliveries.index')
                ->withErrors('Delivery not found');
        }

        $data['reference_no'] = "DGC-SAD-0" . $pro;
        $data['added_by'] = $user->id;
        $data['sale_order_id'] = $request->sale_order_id;
        $deliver_notice = DeliveryNotice::create($data);

        foreach ($request->item_ids as $index => $itemId) {
            DB::table('delivered_items')->insert([
                'delivery_notice_id' => $deliver_notice->id,
                'item_id' => $itemId,
                'delivered_quantity' => $request->delivered_quantity[$index],
                'ordered_quantity' => $request->ordered_quantity[$index],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect('/v2/sales/deliveries')
            ->with('success', 'Delivery Notice created successfully with Reference #' . $data['reference_no']);
    }

    public function show($id)
    {
        $deliveryNotice = DeliveryNotice::with('order')->where('id', $id )->first();
        if(!$deliveryNotice) {
            return redirect()->route('deliveries.index')->with('error', 'Delivery notice not found');
        }

        $saleQuotation = SaleQuotation::with('client')->where('id', $deliveryNotice->order->sale_quotation_id)->first();
        $deliveredItems = DeliveryNoticeItems::where('delivery_notice_id',
            $deliveryNotice->id)->get();
        return view('sales.delivery-notice.show', compact('deliveryNotice', 'deliveredItems', 'saleQuotation'));
    }

    public function edit($id)
    {
        $data= SalePreQuotation::find($id);

        $salePreQuotationItems = SalePreQuotationItem::with('store')->where('sale_pre_quotation_id', $id)->get();

        $items = Items::all();
        $stores = Location::all();
        $clients = Client::all();

        return view('sales.pre-quotation.index', compact('data', 'salePreQuotationItems', 'items', 'stores', 'clients', 'id'));
    }

}
