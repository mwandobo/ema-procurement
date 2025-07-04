<?php

namespace App\Http\Controllers\discounts;

use App\Http\Controllers\Controller;
use App\Models\Bar\POS\Discount;
use App\Models\Bar\POS\Items;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DiscountController extends Controller
{

    public function index()
    {
        $discounts = Discount::with(['batch', 'item'])->latest()->get();
        $items = Items::all();

        return view('inventory.discounts.index', compact('discounts', 'items'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'discount_type' => ['required', Rule::in(['percentage', 'fixed'])],
            'value' => 'required|numeric|min:0',
            'item_id' => 'required|exists:store_pos_items,id',
            'min_quantity' => 'required|numeric|min:1',
            'max_quantity' => 'nullable|numeric|gt:min_quantity',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_active' => 'sometimes|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Validate percentage doesn't exceed 100%
        if ($request->discount_type === 'percentage' && $request->value > 100) {
            return redirect()->back()
                ->withErrors(['value' => 'Percentage discount cannot exceed 100%.'])
                ->withInput();
        }

        try {
            DB::beginTransaction();

            $discount = new Discount();
            $discount->name = $request->name;
            $discount->discount_type = $request->discount_type;
            $discount->value = $request->value;
            $discount->item_id = $request->item_id;
            $discount->min_quantity = $request->min_quantity;
            $discount->max_quantity = $request->max_quantity;
            $discount->start_date = $request->start_date;
            $discount->end_date = $request->end_date;
            $discount->is_active = $request->has('is_active') ? 1 : 0;
            $discount->save();

            DB::commit();
            Toastr::success('Discount created successfully.', 'Success');
            return redirect()->route('inventory.discounts.index');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('An error occurred: ' . $e->getMessage(), 'Error');
            return redirect()->back()
                ->withInput();
        }
    }

    public function edit($id)
    {
        $editDiscount = Discount::findOrFail($id);
        $discounts = Discount::with('batch')->latest()->get();
        $items = Items::all();

        return view('inventory.discounts.index', compact('editDiscount', 'discounts', 'items'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'discount_type' => ['required', Rule::in(['percentage', 'fixed'])],
            'value' => 'required|numeric|min:0',
            'item_id' => 'required|exists:store_pos_items,id',
            'min_quantity' => 'required|numeric|min:1',
            'max_quantity' => 'nullable|numeric|gt:min_quantity',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_active' => 'sometimes|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Validate percentage doesn't exceed 100%
        if ($request->discount_type === 'percentage' && $request->value > 100) {
            Toastr::error('Percentage discount cannot exceed 100%.', 'Error');
            return redirect()->back()
                ->withInput();
        }

        try {
            DB::beginTransaction();

            $discount = Discount::findOrFail($id);
            $discount->name = $request->name;
            $discount->discount_type = $request->discount_type;
            $discount->value = $request->value;
            $discount->item_id = $request->item_id;
            $discount->min_quantity = $request->min_quantity;
            $discount->max_quantity = $request->max_quantity;
            $discount->start_date = $request->start_date;
            $discount->end_date = $request->end_date;
            $discount->is_active = $request->has('is_active') ? 1 : 0;
            $discount->save();

            DB::commit();
            Toastr::success('Discount updated successfully.', 'Success');
            return redirect()->route('inventory.discounts.index');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('An error occurred: ' . $e->getMessage(), 'Error');
            return redirect()->back()
                ->withInput();
        }
    }


    public function destroy($id)
    {
        try {
            $discount = Discount::findOrFail($id);
            $discount->delete();

            Toastr::success('Discount deleted successfully.', 'Success');
            return redirect()->route('inventory.discounts.index');
        } catch (\Exception $e) {
            Toastr::error('An error occurred: ' . $e->getMessage(), 'Error');
            return redirect()->back();
        }
    }
}
