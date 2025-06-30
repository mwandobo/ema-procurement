<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use App\Models\Accounting\AccountCodes;
use App\Models\Currency;
use App\Models\Inventory;
use App\Models\InventoryHistory;
use App\Models\POS\InvoiceHistory;
use App\Models\POS\Activity;
use App\Models\POS\SupplierOrder;
use App\Models\POS\PurchaseHistory;
use App\Models\POS\PurchaseReceive;
use App\Models\POS\PurchasePayments;
use App\Models\Accounting\JournalEntry;
use App\Models\Inventory\Location;
use App\Models\Payments\Payment_methodes;
//use App\Models\Purchase_items;
use App\Models\PurchaseInventory;
use App\Models\PurchaseItemInventory;
//use App\Models\POS\Supplier;
use App\Models\Supplier;
use App\Models\InventoryList;
use App\Models\ServiceType;
use App\Models\POS\Purchase;
use App\Models\POS\PurchaseItems;
use App\Models\POS\Items;
use App\Models\User;
use PDF;
use App\Models\MechanicalItem;
use App\Models\MechanicalRecommedation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SalesController extends Controller
{

    public function index()
    {
        //
        $currency= Currency::all();
        $purchases=Purchase::all()->where('order_status',1);
        $supplier=Supplier::all();
        $name =Items::all();
        $location = Location::all();
        $type="";
       return view('pos.purchases.index',compact('name',));
    }

}
