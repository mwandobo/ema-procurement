<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Bar\POS\Client;
use App\Models\Bar\POS\Items;
use App\Models\Inventory\Location;
use App\Models\Sales\SalePreQuotation;
use App\Models\Sales\SalePreQuotationItem;
use Barryvdh\DomPDF\Facade\Pdf;
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

        $data['reference_no'] = "DGC-SPQ-0" . $pro;
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
        $saleQuotationItems = SalePreQuotationItem::with('store')->where('sale_pre_quotation_id', $id)->get();

        return view('sales.pre-quotation.show', compact('saleQuotation', 'saleQuotationItems',));
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required|exists:store_pos_clients,id',
            'item_name' => 'required|array',
            'quantity' => 'required|array',
            'price' => 'required|array',
            'unit' => 'required|array',
            'store_id' => 'required|array',
        ]);

        $saleQuotation = SalePreQuotation::findOrFail($id);
        $saleQuotation->client_id = $request->client_id;
        $saleQuotation->updated_at = now();
        $saleQuotation->save();

        // Delete existing items
        \DB::table('sale_pre_quotation_item')->where('sale_pre_quotation_id', $id)->delete();

        $total_amount = 0;

        // Re-insert updated line items
        foreach ($request->item_name as $index => $itemId) {
            \DB::table('sale_pre_quotation_item')->insert([
                'sale_pre_quotation_id' => $id,
                'item_id' => $itemId,
                'store_id' => $request->store_id[$index],
                'quantity' => $request->quantity[$index],
                'price' => $request->price[$index],
                'unit' => $request->unit[$index],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $total_amount += $request->quantity[$index] * $request->price[$index];
        }

        $saleQuotation->amount = $total_amount;
        $saleQuotation->save();

        return redirect()->route('pre-quotations.index')
            ->with('success', 'Pre-Quotation updated successfully with Reference #' . $saleQuotation->reference_no);
    }

    public function pdf($id)
    {
        $saleQuotation = SalePreQuotation::find($id);
        $saleQuotationItems = SalePreQuotationItem::with('store')->where('sale_pre_quotation_id', $id)->get();

        view()->share(['saleQuotation' => $saleQuotation, 'saleQuotationItems' => $saleQuotationItems]);

        return PDF::loadView('sales.pre-quotation.pdf-view')->setPaper('a4', 'portrait')->download('SALE PRE-QUOTATION REF NO # ' .  $saleQuotation->reference_no . ".pdf");
    }


    public function destroy($id)
    {
        $saleQuotation = SalePreQuotation::find($id);
        if($saleQuotation){
            $saleQuotation->delete();
        }
        return redirect(url('/v2/sales/pre-quotations'))->with('success', 'Pre-Quotation deleted successfully');
    }
}
