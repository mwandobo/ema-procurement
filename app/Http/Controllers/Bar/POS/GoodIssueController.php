<?php

namespace App\Http\Controllers\Bar\POS;

use App\Http\Controllers\Controller;
use App\Models\Accounting\AccountCodes;
use App\Models\Accounting\JournalEntry;
use App\Models\Inventory\FieldStaff;
use App\Models\Bar\POS\GoodIssue;
use App\Models\Bar\POS\GoodIssueItem;
use App\Models\Bar\POS\InvoiceHistory;
use App\Models\Bar\POS\PurchaseHistory;
use App\Models\Inventory\Location;
use App\Models\Bar\POS\Items;
use App\Models\Bar\POS\Activity;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

use App\Models\Bar\POS\Category;
use Illuminate\Support\Facades\DB;

class GoodIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $issue = GoodIssue::where('added_by', auth()->user()->added_by)->get();
        //$location=Location::where('added_by',auth()->user()->added_by)->where('main','0')->get();
        $location = Location::where('disabled', '0')->get();
        $inventory = Items::where('added_by', auth()->user()->added_by)->get();
        //$staff=FieldStaff::where('added_by',auth()->user()->added_by)->get();;
        $staff = User::whereNull('member_id')->whereNull('visitor_id')->where('disabled', 0)->get();
        return view('bar.pos.purchases.good_issue', compact('issue', 'inventory', 'location', 'staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
/*     
    public function realtime_stock_report(Request $request)
{
    $categoryId = $request->input('category_id');
    $locationId = $request->input('location');

    $products = Items::with(['location', 'category'])
        ->when($categoryId, function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        })
        ->when($locationId, function ($query) use ($locationId) {
            $query->whereHas('goodIssues', function ($goodIssuesQuery) use ($locationId) {
                $goodIssuesQuery->where('location', $locationId);
            });
        })
        ->get();

    $report = [];

    foreach ($products as $product) {
        $itemId = $product->id;

        // Fetch details like Due, Return, and Quantities as before, but without date filtering
        $due = PurchaseHistory::where('item_id', $itemId)
            ->where('type', 'Purchases')
            ->where('added_by', auth()->user()->added_by)
            ->sum('quantity');

        $return = PurchaseHistory::where('item_id', $itemId)
            ->where('type', 'Debit Note')
            ->where('added_by', auth()->user()->added_by)
            ->sum('quantity');

        $rgood = GoodIssueItem::where('item_id', $itemId)
            ->where('status', 1)
            ->where('added_by', auth()->user()->added_by)
            ->sum('quantity');

        $good = GoodIssueItem::where('item_id', $itemId)
            ->where('start', $itemId)
            ->where('status', 1)
            ->where('added_by', auth()->user()->added_by)
            ->sum('quantity');

        $sqty = InvoiceHistory::where('item_id', $itemId)
            ->where('type', 'Sales')
            ->where('added_by', auth()->user()->added_by)
            ->sum('quantity');

        $cn = InvoiceHistory::where('item_id', $itemId)
            ->where('type', 'Credit Note')
            ->where('added_by', auth()->user()->added_by)
            ->sum('quantity');

        $qty = $due - $return;
        $inv = $sqty - $cn;
        $cr = $product->bottle > 0 ? $inv / $product->bottle : 0;
        $cq = round($cr, 1);

        $b = $qty + $rgood - $good - $cq;
        $balance = floor($b);

        $salesPrice = $product->sales_price ?? 0;
        $stockValue = $salesPrice * $balance;

       $locationId = GoodIssueItem::where('item_id', $itemId)
            ->where('status', 1)
            ->value('location');  

        $location = $locationId ? \App\Models\Inventory\Location::find($locationId) : null;
        $locationName = $location ? $location->name : 'Unknown';

        // Preparing the report data
        $report[] = [
            'location' => $locationName,
            'location_id' => $locationId,
            'product_name' => $product->name,
            'quantity' => $balance,
            'category' => $product->category ? $product->category->name : 'Uncategorized',
            'unit' => $product->unit ?? 'N/A',
            'price' => $salesPrice,
            'stock_value' => $stockValue,
        ];
    }
    
    dd($report);

    return view('bar.pos.report.realtime_stock', [
        'report' => $report,
        'categories' => Category::all(),
        'locations' => Location::all(),
    ]);
}

  */
  
  
  public function realtime_stock_report(Request $request)
{
    $stockReport = [];

    $selectedLocation = $request->input('location');

    // Return empty array by default when no location is selected
    if (!$selectedLocation) {
        return view('bar.pos.report.realtime_stock', [
            'stockReport' => $stockReport,
            'locations' => Location::all(),
            'selectedLocation' => $selectedLocation,
        ]);
    }

    $items = Items::all();
    $locations = Location::all();

    foreach ($items as $item) {
        $productStock = [
            'product' => $item->name,
            'sales_price' => $item->sales_price,
            'locations' => [],
        ];

        $filteredLocations = $locations;

        // Filter by specific location if not 'all'
        if ($selectedLocation != 'all') {
            $filteredLocations = $locations->where('id', $selectedLocation);
        }

        foreach ($filteredLocations as $location) {
            $due = PurchaseHistory::where('item_id', $item->id)
                ->where('location', $location->id)
                ->where('type', 'Purchases')
                ->where('added_by', auth()->user()->added_by)
                ->sum('quantity');

            $return = PurchaseHistory::where('item_id', $item->id)
                ->where('location', $location->id)
                ->where('type', 'Debit Note')
                ->where('added_by', auth()->user()->added_by)
                ->sum('quantity');

            $rgood = GoodIssueItem::where('item_id', $item->id)
                ->where('location', $location->id)
                ->where('status', 1)
                ->where('added_by', auth()->user()->added_by)
                ->sum('quantity');

            $good = GoodIssueItem::where('item_id', $item->id)
                ->where('start', $location->id)
                ->where('status', 1)
                ->where('added_by', auth()->user()->added_by)
                ->sum('quantity');

            $sqty = InvoiceHistory::where('item_id', $item->id)
                ->where('location', $location->id)
                ->where('type', 'Sales')
                ->where('added_by', auth()->user()->added_by)
                ->sum('quantity');

            $cn = InvoiceHistory::where('item_id', $item->id)
                ->where('location', $location->id)
                ->where('type', 'Credit Note')
                ->where('added_by', auth()->user()->added_by)
                ->sum('quantity');

            $qty = $due - $return;
            $inv = $sqty - $cn;
            $cr = $inv / ($item->bottle ?: 1); 
            $cq = round($cr, 1);

            $b = $qty + $rgood - $good - $cq;
            $balance = floor($b);

            $finalQuantity = max($balance, 0);

            $stockValue = $finalQuantity * $item->sales_price;

            $productStock['locations'][] = [
                'location' => $location->name,
                'quantity' => $finalQuantity,
                'stock_value' => $stockValue,
            ];
        }

        if (!empty($productStock['locations'])) {
            $stockReport[] = $productStock;
        }
    }

    return view('bar.pos.report.realtime_stock', [
        'stockReport' => $stockReport,
        'locations' => $locations,
        'selectedLocation' => $selectedLocation,
    ]);
}




  
  
  
  
  
  
  
  
     
     
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
        if ($request->location == $request->start) {
            Toastr::error('You have Chosen the same Location', 'Error');
            return redirect(route('bar_pos_issue.index'));
        } else {
            $data['date'] = $request->date;
            $data['location'] = $request->location;
            $data['start'] = $request->start;
            $data['staff'] = $request->staff;
            $data['status'] = 0;
            $data['added_by'] = auth()->user()->added_by;

            $issue = GoodIssue::create($data);

            $nameArr = $request->item_id;
            $qtyArr = $request->quantity;

            if (!empty($nameArr)) {
                for ($i = 0; $i < count($nameArr); $i++) {
                    if (!empty($nameArr[$i])) {
                        $items = [
                            'item_id' => $nameArr[$i],
                            'status' => 0,
                            'date' => $request->date,
                            'location' => $request->location,
                            'start' => $request->start,
                            'quantity' => $qtyArr[$i],
                            'order_no' => $i,
                            'added_by' => auth()->user()->added_by,
                            'issue_id' => $issue->id,
                        ];

                        GoodIssueItem::create($items);

                        $loc = Location::find($request->location);
                        $st_loc = Location::find($request->start);
                        $itm = Items::find($nameArr[$i]);

                        if (!empty($issue)) {
                            $activity = Activity::create([
                                'added_by' => auth()->user()->added_by,
                                'user_id' => auth()->user()->id,
                                'module_id' => $issue->id,
                                'module' => 'Good Issue',
                                'activity' => 'Good issue for ' . $itm->name . ' from ' . $st_loc->name . '  to  ' . $loc->name . ' is Created',
                            ]);
                        }
                    }
                }
            }

            Toastr::success('Good Issue Created Successfully', 'Success');
            return redirect(route('bar_pos_issue.index'));
        }
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
        $data = GoodIssue::find($id);
        //$location=Location::where('added_by',auth()->user()->added_by)->where('main','0')->get();
        $location = Location::where('disabled', '0')->get();
        $inventory = Items::where('added_by', auth()->user()->added_by)->get();
        //$staff=FieldStaff::where('added_by',auth()->user()->added_by)->get();;
        $staff = User::whereNull('member_id')->whereNull('visitor_id')->where('disabled', 0)->get();
        $items = GoodIssueItem::where('issue_id', $id)->get();
        return view('bar.pos.purchases.good_issue', compact('items', 'inventory', 'location', 'staff', 'data', 'id'));
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

        if ($request->location == $request->start) {
            Toastr::error('You have Chosen the same Location', 'Error');
            return redirect(route('bar_pos_issue.index'));
        } else {
            $issue = GoodIssue::find($id);

            $data['date'] = $request->date;
            $data['location'] = $request->location;
            $data['start'] = $request->start;
            $data['staff'] = $request->staff;
            $data['added_by'] = auth()->user()->added_by;
            $issue->update($data);

            $nameArr = $request->item_id;
            $qtyArr = $request->quantity;
            $remArr = $request->removed_id;
            $expArr = $request->saved_id;

            if (!empty($remArr)) {
                for ($i = 0; $i < count($remArr); $i++) {
                    if (!empty($remArr[$i])) {
                        GoodIssueItem::where('id', $remArr[$i])->delete();
                    }
                }
            }

            if (!empty($nameArr)) {
                for ($i = 0; $i < count($nameArr); $i++) {
                    if (!empty($nameArr[$i])) {
                        $items = [
                            'item_id' => $nameArr[$i],
                            'date' => $request->date,
                            'location' => $request->location,
                            'start' => $request->start,
                            'quantity' => $qtyArr[$i],
                            'order_no' => $i,
                            'added_by' => auth()->user()->added_by,
                            'issue_id' => $id,
                        ];

                        if (!empty($expArr[$i])) {
                            GoodIssueItem::where('id', $expArr[$i])->update($items);
                        } else {
                            GoodIssueItem::create($items);
                        }

                        $loc = Location::find($request->location);
                        $st_loc = Location::find($request->start);
                        $itm = Items::find($nameArr[$i]);

                        if (!empty($issue)) {
                            $activity = Activity::create([
                                'added_by' => auth()->user()->added_by,
                                'user_id' => auth()->user()->id,
                                'module_id' => $id,
                                'module' => 'Good Issue',
                                'activity' => 'Good issue for ' . $itm->name . ' from ' . $st_loc->name . '  to  ' . $loc->name . ' is Updated',
                            ]);
                        }
                    }
                }
            }

            Toastr::success('Good Issue Updated Successfully', 'Success');
            return redirect(route('bar_pos_issue.index'));
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        GoodIssueItem::where('issue_id', $id)->delete();

        $issue = GoodIssue::find($id);

        $items = GoodIssueItem::where('issue_id', $id)->get();
        foreach ($items as $i) {
            $loc = Location::find($i->location);
            $st_loc = Location::find($i->start);
            $itm = Items::find($i->item_id);

            if (!empty($issue)) {
                $activity = Activity::create([
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'Good Issue',
                    'activity' => 'Good issue for ' . $itm->name . ' from ' . $st_loc->name . '  to  ' . $loc->name . ' is Deleted',
                ]);
            }
        }

        $issue->delete();

        Toastr::success('Good Issue Deleted Successfully', 'Success');
        return redirect(route('bar_good_issue.index'));
    }

    public function approve($id)
    {
        //
        $item = GoodIssueItem::where('issue_id', $id)->get();
        $total = 0;

        foreach ($item as $i) {
            $issue = GoodIssue::find($id);

            $inv = Items::where('id', $i->item_id)->first();

            $loc = Location::where('id', $i->location)->first();

            $lq['crate'] = $loc->crate + $i->quantity;
            $lq['bottle'] = $loc->bottle + $i->quantity * $inv->bottle;
            Location::where('id', $i->location)->update($lq);

            $main_loc = Location::where('id', $i->start)->first();
            $main_lq['crate'] = $main_loc->crate - $i->quantity;
            $main_lq['bottle'] = $main_loc->bottle - $i->quantity * $inv->bottle;
            Location::where('id', $i->start)->update($main_lq);

            $total += $inv->cost_price * $i->quantity;

            $loc = Location::find($i->location);
            $st_loc = Location::find($i->start);
            $itm = Items::find($i->item_id);

            if (!empty($issue)) {
                $activity = Activity::create([
                    'added_by' => auth()->user()->added_by,
                    'user_id' => auth()->user()->id,
                    'module_id' => $id,
                    'module' => 'Good Issue',
                    'activity' => 'Good issue for ' . $itm->name . ' from ' . $st_loc->name . '  to  ' . $loc->name . ' is Approved',
                ]);
            }
        }

        $d = $issue->date;

        $codes = AccountCodes::where('account_name', 'Bar Stock (Counter)')->first();
        $journal = new JournalEntry();
        $journal->account_id = $codes->id;
        $date = explode('-', $d);
        $journal->date = $d;
        $journal->year = $date[0];
        $journal->month = $date[1];
        $journal->transaction_type = 'pos_inventory_issue';
        $journal->name = 'POS Good Issue of Inventory ';
        $journal->income_id = $id;
        $journal->debit = $total;
        $journal->added_by = auth()->user()->added_by;
        $journal->notes = 'POS Inventory Issued from ' . $st_loc->name . '  to  ' . $loc->name;
        $journal->save();

        $cr = AccountCodes::where('account_name', 'Bar Stock')->first();
        $journal = new JournalEntry();
        $journal->account_id = $cr->id;
        $date = explode('-', $d);
        $journal->date = $d;
        $journal->year = $date[0];
        $journal->month = $date[1];
        $journal->transaction_type = 'pos_inventory_issue';
        $journal->name = 'POS Good Issue of Inventory ';
        $journal->income_id = $id;
        $journal->credit = $total;
        $journal->added_by = auth()->user()->added_by;
        $journal->notes = 'POS Inventory Issued from ' . $st_loc->name . '  to  ' . $loc->name;
        $journal->save();

        GoodIssue::where('id', $id)->update(['status' => '1']);
        GoodIssueItem::where('issue_id', $id)->update(['status' => '1']);

        Toastr::success('Good Issue Approved Successfully', 'Success');
        return redirect(route('bar_pos_issue.index'));
    }

    public function findQuantity(Request $request)
    {
        $item = $request->item;
        $location = $request->location;

        $item_info = Items::where('id', $item)->first();
        $location_info = Location::find($request->location);

        if ($item_info->quantity > 0) {
            $due = PurchaseHistory::where('item_id', $item)
                ->where('location', $location)
                ->where('type', 'Purchases')
                ->where('added_by', auth()->user()->added_by)
                ->sum('quantity');
            $return = PurchaseHistory::where('item_id', $item)
                ->where('location', $location)
                ->where('type', 'Debit Note')
                ->where('added_by', auth()->user()->added_by)
                ->sum('quantity');

            $rgood = GoodIssueItem::where('item_id', $item)
                ->where('location', $location)
                ->where('status', 1)
                ->where('added_by', auth()->user()->added_by)
                ->sum('quantity');
            $good = GoodIssueItem::where('item_id', $item)
                ->where('start', $location)
                ->where('status', 1)
                ->where('added_by', auth()->user()->added_by)
                ->sum('quantity');

            $sqty = InvoiceHistory::where('item_id', $item)
                ->where('location', $location)
                ->where('type', 'Sales')
                ->where('added_by', auth()->user()->added_by)
                ->sum('quantity');
            $cn = InvoiceHistory::where('item_id', $item)
                ->where('location', $location)
                ->where('type', 'Credit Note')
                ->where('added_by', auth()->user()->added_by)
                ->sum('quantity');

            $qty = $due - $return;
            $inv = $sqty - $cn;
            $cr = $inv / $item_info->bottle;
            $cq = round($cr, 1);

            $b = $qty + $rgood - $good - $cq;
            $balance = floor($b);

            //dd($qty);

            if ($balance > 0) {
                if ($request->id > $balance) {
                    $price = 'You have exceeded your Stock. Choose quantity between 1.00 and ' . number_format($balance, 2);
                } elseif ($request->id <= 0) {
                    $price = 'Choose quantity between 1.00 and ' . number_format($balance, 2);
                } else {
                    $price = '';
                }
            } else {
                $price = $location_info->name . ' Stock Balance  is Zero.';
            }
        } else {
            $price = 'Your Stock Balance is Zero.';
        }
        return response()->json($price);
    }

    public function findQuantity2(Request $request)
    {
        $item = $request->item;

        $item_info = Items::where('id', $item)->first();
        if ($item_info->quantity > 0) {
            if ($request->id > $item_info->quantity) {
                $price = 'You have exceeded your Stock. Choose quantity between 1.00 and ' . $item_info->quantity;
            } elseif ($request->id <= 0) {
                $price = 'Choose quantity between 1.00 and ' . $item_info->quantity;
            } else {
                $price = '';
            }
        } else {
            $price = 'Your Stock Balance is Zero.';
        }

        return response()->json($price);
    }

    public function findService(Request $request)
    {
        switch ($request->id) {
            case 'Service':
                $type_id = Service::where('status', '=', '0')->get();
                return response()->json($type_id);

                break;

            case 'Maintenance':
                $type_id = Maintainance::where('status', '=', '0')->get();
                return response()->json($type_id);

                break;
        }
    }

    public function discountModal(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        if ($type == 'issue') {
            $data = GoodIssueItem::where('issue_id', $id)->get();
            return view('bar.pos.purchases.view_issue', compact('id', 'data'));
        }
    }
}
