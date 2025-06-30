<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Bar\POS\Client;
use App\Models\Bar\POS\Items;
use App\Models\Inventory\Location;
use App\Models\POS\PurchaseItems;
use App\Models\POS\SaleQuotation;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class SaleQuotationController extends Controller
{

    public function index()
    {
        //
        $items = Items::all();
        $stores = Location::all();
        $clients = Client::all();

        $salesQuotations=SaleQuotation::with('client')->get();
        return view('sales.quotation.index',compact('salesQuotations', 'items', 'clients', 'stores'));
    }

    public function store(Request $request)
    {
        Log::info('Creating SaleQuotation - Form Data:', $request->all());

        $request->validate([
            'client_id' => 'required|exists:store_pos_clients,id',
            'item_name' => 'required|array',
            'quantity' => 'required|array',
            'price' => 'required|array',
            'unit' => 'required|array',
            'store_id' => 'required|array',
        ]);

        $user = auth()->user();
        $count = SaleQuotation::count();
        $pro = $count + 1;

        $data['reference_no'] = "DGC-SAL-0" . $pro;
        $data['added_by'] = $user->id;
        $data['client_id'] = $request->client_id;

        $saleQuotation = SaleQuotation::create($data);

        // Insert line items into pivot table
        foreach ($request->item_name as $index => $itemId) {
            \DB::table('sale_quotation_item')->insert([
                'sale_quotation_id' => $saleQuotation->id,
                'item_id' => $itemId,
                'store_id' => $request->store_id[$index],
                'quantity' => $request->quantity[$index],
                'price' => $request->price[$index],
                'unit' => $request->unit[$index],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('quotations.index')
            ->with('success', 'Quotation created successfully with Reference #' . $data['reference_no']);
    }

    public function findItem(Request $request)
    {
        $item = Items::where('id', $request->id)->get();
        return response()->json($item);
    }



}
