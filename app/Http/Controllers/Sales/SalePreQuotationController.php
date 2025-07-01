<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Bar\POS\Client;
use App\Models\Bar\POS\Items;
use App\Models\Inventory\Location;
use App\Models\Sales\SalePreQuotation;
use App\Models\Sales\SaleQuotationItem;
use Illuminate\Http\Request;
use Toastr;

class SalePreQuotationController extends Controller
{

    public function index()
    {
        //
        $items = Items::all();
        $stores = Location::all();
        $clients = Client::all();

        $salesQuotations=SalePreQuotation::with('client')->get();
        return view('sales.pre-quotation.index',compact('salesQuotations', 'items', 'clients', 'stores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:store_pos_clients,id',
            'item_name' => 'required|array',
            'quantity' => 'required|array',
            'price' => 'required|array',
            'unit' => 'required|array',
            'store_id' => 'required|array',
        ]);

        $user = auth()->user();
        $count = SalePreQuotation::count();
        $pro = $count + 1;

        $data['reference_no'] = "DGC-SAL-0" . $pro;
        $data['added_by'] = $user->id;
        $data['client_id'] = $request->client_id;

        $saleQuotation = SalePreQuotation::create($data);
        $total_amount = 0;

        // Insert line items into pivot table
        foreach ($request->item_name as $index => $itemId) {
            \DB::table('sale_pre_quotation_item')->insert([
                'sale_pre_quotation_id' => $saleQuotation->id,
                'item_id' => $itemId,
                'store_id' => $request->store_id[$index],
                'quantity' => $request->quantity[$index],
                'price' => $request->price[$index],
                'unit' => $request->unit[$index],
                'created_at' => now(),
                'updated_at' => now(),
            ]);


//            $discountRule = \App\Models\Bar\POS\Discount::where('item_id', $row->item_id)
//                ->where('min_quantity', '<=', $row->quantity)
//                ->where('max_quantity', '>=', $row->quantity)
//                ->first();
//            if ($discountRule) {
//                $amount = ($amount * (100 - $discountRule->value)) / 100;
//                $cost_price = ($item->cost_price * (100 - $discountRule->value)) / 100;
//            }


            $total_amount += $request->quantity[$index] * $request->price[$index];
        }



        $saleQuotation->amount = $total_amount;
        $saleQuotation->save();

        return redirect()->route('pre-quotations.index')
            ->with('success', 'Pre-Quotation created successfully with Reference #' . $data['reference_no']);
    }

    public function findItem(Request $request)
    {
        $item = Items::where('id', $request->id)->get();
        return response()->json($item);
    }

    public function show($id, Request $request)
    {
        $saleQuotation = SalePreQuotation::find($id);

        $saleQuotationItems = SaleQuotationItem::with('store')->where('sale_quotation_id', $id)->get();

        return view('sales.pre-quotation.items-details', compact('saleQuotation', 'saleQuotationItems',));
    }

    public function destroy($id)
    {
        $saleQuotation = SalePreQuotation::find($id);
        if($saleQuotation){
            $saleQuotation->delete();
        }

        Toastr::success('Deleted Successfully', 'Success');
        return redirect(url('/v2/sales/pre-quotations'));
    }

}
