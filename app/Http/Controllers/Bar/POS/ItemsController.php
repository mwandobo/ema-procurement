<?php

namespace App\Http\Controllers\Bar\POS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\ButtonsServiceProvider;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Models\Bar\POS\Items;
use App\Models\Bar\POS\Category;
use App\Models\Bar\POS\Activity;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Inventory\Location;
use App\Models\Bar\POS\PurchaseHistory;
use App\Models\Accounting\AccountCodes;
use App\Models\Accounting\JournalEntry;
use App\Models\Bar\POS\EmptyHistory;

use App\Models\Bar\POS\Batches;
use App\Models\Bar\POS\Stocks;

use App\Traits\ProductsReport;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
    {
        $category = Category::where('added_by', auth()->user()->added_by)
            ->where('disabled', '0')
            ->get();

        if ($request->ajax()) {
            $data = Items::select('id', 'name','item_code', 'quantity', 'unit')
                ->where('added_by', auth()->user()->added_by);

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('name', function ($row) {
                    return $row->name;
                })
                ->editColumn('item_code', function ($row) {
                    return $row->item_code;
                })
                ->editColumn('quantity', function ($row) {
                    return number_format($row->quantity, 2);
                })
                ->editColumn('unit', function ($row) {
                    return $row->unit;
                })
                ->editColumn('action', function ($row) {
                    $action = '
                        <div class="form-inline">
                            <a href="' . route('bar_items.edit', $row->id) . '" title="Edit" class="list-icons-item text-primary">
                                <i class="icon-pencil7"></i>
                            </a>&nbsp;
                            <a href="javascript:void(0)" onclick="deleteItem(' . $row->id . ')" title="Delete" class="list-icons-item text-danger delete">
                                <i class="icon-trash"></i>
                            </a>&nbsp;
                            <div class="dropdown">
                                <a href="#" class="list-icons-item dropdown-toggle text-teal" data-toggle="dropdown">
                                    <i class="icon-cog6"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a href="#" onclick="model(' . $row->id . ')" class="nav-link" title="Update" data-toggle="modal" data-target="#appFormModal">
                                        Update Quantity
                                    </a>
                                </div>
                            </div>
                        </div>';
                    return $action;
                })
                ->rawColumns(['action', 'name', 'unit', 'quantity'])
                ->make(true);
        }

        return view('bar.pos.items.index', compact('category'));
    }

    use ProductsReport;

    public function products_report(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $categoryId = $request->input('category_id');

        $report = $this->generateReport($startDate, $endDate, $categoryId);

        $categories = \App\Models\Bar\POS\Category::all();

        $totalQuantity = collect($report)->sum('quantity');
        $totalSalesPrice = collect($report)->sum('sales_price');
        $totalCostPrice = collect($report)->sum('cost_price');

        return view('bar.pos.report.products_report', compact('report', 'startDate', 'endDate', 'categoryId', 'categories', 'totalQuantity', 'totalSalesPrice', 'totalCostPrice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $data['unit_price'] = $request->sales_price;
        $data['added_by'] = auth()->user()->added_by;
        $items = Items::create($data);

        if (!empty($items)) {
            $activity = Activity::create([
                'added_by' => auth()->user()->added_by,
                'user_id' => auth()->user()->id,
                'module_id' => $items->id,
                'module' => 'Inventory',
                'activity' => 'Inventory ' . $items->name . '  Created',
            ]);
        }

        Toastr::success('Created Successfully', 'Success');
        return redirect(route('bar_items.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        return view('bar.pos.items.update', compact('id'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function batch_items(Request $request){
       
       $items = Batches::all();
       
       return view('bar.pos.items.batch_items',compact('items'));
     }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Items::find($id);
        $category = Category::where('added_by', auth()->user()->added_by)
            ->where('disabled', '0')
            ->get();
        return view('bar.pos.items.index', compact('data', 'id', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $item = Items::find($id);
        $data = $request->all();
        $data['unit_price'] = $request->sales_price;
        $item->update($data);

        if (!empty($item)) {
            $activity = Activity::create([
                'added_by' => auth()->user()->added_by,
                'user_id' => auth()->user()->id,
                'module_id' => $id,
                'module' => 'Inventory',
                'activity' => 'Inventory ' . $item->name . '  Updated',
            ]);
        }
        Toastr::success('Updated Successfully', 'Success');
        return redirect(route('bar_items.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        //
        $item = Items::find($id);
        $name = $item->name;
        $item->delete();

        if (!empty($item)) {
            $activity = Activity::create([
                'added_by' => auth()->user()->added_by,
                'user_id' => auth()->user()->id,
                'module_id' => $id,
                'module' => 'Inventory',
                'activity' => 'Inventory ' . $name . '  Deleted',
            ]);
        }

        return response()->json(['success' => 'Deleted Successfully']);
    }

    public function update_quantity(Request $request)
    {
        //
        $item = Items::find($request->id);
        $data['quantity'] = $item->quantity + $request->quantity;
        $item->update($data);

        $loc = Location::where('main', '1')->first();

        $lists = [
            'quantity' => $request->quantity,
            'item_id' => $item->id,
            'added_by' => auth()->user()->added_by,
            'purchase_date' => $request->purchase_date,
            'location' => $loc->id,
            'type' => 'Purchases',
        ];

        PurchaseHistory::create($lists);

        $lq['crate'] = $loc->crate + $request->quantity;
        $lq['bottle'] = $loc->bottle + $request->quantity * $item->bottle;

        if ($item->empty == '1') {
            $pur_items = [
                'item_id' => $item->id,
                'purpose' => 'Purchase Empty',
                'date' => $request->purchase_date,
                'has_empty' => $item->empty,
                'empty_in_purchase' => $request->quantity,
                'purchase_case' => $request->quantity,
                'purchase_bottle' => $request->quantity * $item->bottle,
                'added_by' => auth()->user()->added_by,
            ];

            EmptyHistory::create($pur_items);
        }

        $cost = abs($item->cost_price * $request->quantity);

        if ($item->cost_price * $request->quantity > 0) {
            $cr = AccountCodes::where('account_name', 'Bar Stock')->first();
            $journal = new JournalEntry();
            $journal->account_id = $cr->id;
            $date = explode('-', $request->purchase_date);
            $journal->date = $request->purchase_date;
            $journal->year = $date[0];
            $journal->month = $date[1];
            $journal->transaction_type = 'pos_update_item';
            $journal->name = 'Items';
            $journal->debit = $cost;
            $journal->income_id = $item->id;
            $journal->added_by = auth()->user()->id;
            $journal->notes = 'POS Item Update for ' . $item->name;
            $journal->save();

            $codes = AccountCodes::where('account_name', 'Balance Control Account')->first();
            $journal = new JournalEntry();
            $journal->account_id = $codes->id;
            $date = explode('-', $request->purchase_date);
            $journal->date = $request->purchase_date;
            $journal->year = $date[0];
            $journal->month = $date[1];
            $journal->transaction_type = 'pos_update_item';
            $journal->name = 'Items';
            $journal->income_id = $item->id;
            $journal->credit = $cost;
            $journal->added_by = auth()->user()->id;
            $journal->notes = 'POS Item Update for ' . $item->name;
            $journal->save();
        } else {
            $codes = AccountCodes::where('account_name', 'Balance Control Account')->first();
            $journal = new JournalEntry();
            $journal->account_id = $codes->id;
            $date = explode('-', $request->purchase_date);
            $journal->date = $request->purchase_date;
            $journal->year = $date[0];
            $journal->month = $date[1];
            $journal->transaction_type = 'pos_update_item';
            $journal->name = 'Items';
            $journal->income_id = $item->id;
            $journal->debit = $cost;
            $journal->added_by = auth()->user()->id;
            $journal->notes = 'POS Item Update for ' . $item->name;
            $journal->save();

            $cr = AccountCodes::where('account_name', 'Bar Stock')->first();
            $journal = new JournalEntry();
            $journal->account_id = $cr->id;
            $date = explode('-', $request->purchase_date);
            $journal->date = $request->purchase_date;
            $journal->year = $date[0];
            $journal->month = $date[1];
            $journal->transaction_type = 'pos_update_item';
            $journal->name = 'Items';
            $journal->credit = $cost;
            $journal->income_id = $item->id;
            $journal->added_by = auth()->user()->id;
            $journal->notes = 'POS Item Update for ' . $item->name;
            $journal->save();
        }

        Toastr::success('Uppdated Successfully', 'Success');
        return redirect(route('bar_items.index'));
    }
}
