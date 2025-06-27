<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use App\Models\AccountCodes;
use App\Models\Currency;
use App\Models\Inventory;
use App\Models\InventoryHistory;
use App\Models\POS\InvoicePayments;
use App\Models\POS\InvoiceHistory;
use App\Models\POS\PurchaseHistory;
use App\Models\POS\Items;
use App\Models\JournalEntry;
use App\Models\Location;
use App\Models\Payment_methodes;
//use App\Models\invoice_items;
use App\Models\Client;
use App\Models\InventoryList;
use App\Models\ServiceType;
use App\Models\POS\Invoice;
use App\Models\POS\InvoiceItems;
use App\Models\Facility\InvoiceHistory as FacilityHistory;
use App\Models\Facility\Items as FacilityItems;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\ButtonsServiceProvider;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;


use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function __construct()
    {
        $this->middleware('auth');
    }

    
public function purchase_report(Request $request)
    {
       
$data=Items::where('added_by',auth()->user()->added_by)->get();
     

        return view('pos.report.purchase_report',
            compact('data'));
    
    }

public function sales_report(Request $request)
    {
       
$data=Items::where('added_by',auth()->user()->added_by)->get();
     

        return view('pos.report.sales_report',
            compact('data'));
    
    }
public function balance_report(Request $request)
    {
       
$data=Items::where('added_by',auth()->user()->added_by)->get();
     

        return view('pos.report.balance_report',
            compact('data'));
    
    }
    
    
     public function inventory_report(Request $request)
    {
       
$data=Items::all()->where('quantity','>', '0');

$start_date = $request->start_date;
        $end_date = $request->end_date;
     

        return view('pos.report.inventory_report',
            compact('data','start_date','end_date'));
    
    }
    
    
    public function good_issue_report(Request $request)
    {
       
$data=Items::all()->where('quantity','>', '0');

$start_date = $request->start_date;
        $end_date = $request->end_date;
     

        return view('pos.report.good_issue_report',
            compact('data','start_date','end_date'));
    
    }
    
    

 



}
