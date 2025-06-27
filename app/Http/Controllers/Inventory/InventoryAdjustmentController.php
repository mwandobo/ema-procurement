<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Bar\POS\Batches;
use App\Models\Bar\POS\Stocks;
use App\Models\Inventory\InventoryAdjustment;
use App\Models\Inventory\Location;
use App\Models\Bar\POS\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Brian2694\Toastr\Facades\Toastr;

class InventoryAdjustmentController extends Controller
{
    /**
     * Display a listing of the inventory adjustments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
   // dd(98);
        $query = InventoryAdjustment::with(['batch', 'user', 'location']);
        
       // dd($query);


        $adjustments = $query->orderBy('created_at', 'desc')->paginate(15);
        $locations = Location::all();
        $items = Items::with(['batches.stocks'])->get();
        return view('inventory.adjustments.index', compact('adjustments', 'locations', 'items'));
    }

    /**
     * Store a newly created inventory adjustment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'batch_id' => 'required|exists:store_item_batches,id',
            'adjustment_type' => ['required', Rule::in(['add', 'remove'])],
            'quantity' => 'required|integer|min:1',
            'location_id' => 'required|exists:locations,id',
            'reason' => 'required|string',
        ]);


        DB::beginTransaction();

        try {
            // Find the batch and item using relationships
            $batch = Batches::with(['item', 'stocks'])->findOrFail($validatedData['batch_id']);

            
            // Fetch stock for the selected batch at the specific location/store
            $stock = Stocks::where('batch_id', $batch->id)
            ->where('store_id', $validatedData['location_id'])
            ->first();
            
            // Ensure removing stock doesn't result in negative inventory
            if ($validatedData['adjustment_type'] === 'remove' && 
                ($stock->quantity - $validatedData['quantity']) < 0) {
                    Toastr::error('Cannot remove more stock than available.', 'Error');
                return back()->withInput();
            }

            // Set the adjusted_by to current user
            $validatedData['adjusted_by'] = Auth::id();

            // Let model events handle the rest
            InventoryAdjustment::create($validatedData);

            DB::commit();
            Toastr::success('Inventory adjustment completed successfully.', 'Success');
            return redirect()->route('inventory.adjustments.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('An error occurred: ' . $e->getMessage(), 'Error');
            return back()->withInput();
        }
    }

    /**
     * Display the specified inventory adjustment.
     *
     * @param  \App\Models\Inventory\InventoryAdjustment  $inventoryAdjustment
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryAdjustment $adjustment)
    {
        $adjustment->load(['batch', 'user', 'location']);
        return view('inventory.adjustments.show', compact('adjustment'));
    }
    

    /**
     * Remove the specified inventory adjustment from storage.
     *
     * @param  \App\Models\Inventory\InventoryAdjustment  $adjustment
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryAdjustment $adjustment)
    {
        DB::beginTransaction();

        try {
            // Revert stock if the adjustment was a 'remove'
            $this->revertStock($adjustment);

            // Delete the adjustment
            $adjustment->delete();

            DB::commit();
            Toastr::success('Inventory adjustment deleted successfully.', 'Success');
            return redirect()->route('inventory.adjustments.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('An error occurred: ' . $e->getMessage(), 'Error');
            return back();
        }
    }

    /**
     * Reverts the stock quantity based on the inventory adjustment type.
     *
     * @param \App\Models\Inventory\InventoryAdjustment $adjustment
     * @return void
     */
    private function revertStock(InventoryAdjustment $adjustment)
    {
        $item = Items::findOrFail($adjustment->item_id);
        
        if ($adjustment->adjustment_type === 'remove') {
            $item->quantity += $adjustment->quantity;  // Add quantity back to item
        } else {
            $item->quantity -= $adjustment->quantity;  // Subtract quantity from item
        }
        
        $item->save();
    }

    /**
     * Display the modal with adjustment details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAdjustmentModal(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        
        if ($type == 'adjustment') {
            $adjustment = InventoryAdjustment::with(['batch', 'user', 'location'])->findOrFail($id);
            return view('inventory.adjustments.modal', compact('adjustment'));
        }
        
        return response()->json(['error' => 'Invalid request']);
    }
}