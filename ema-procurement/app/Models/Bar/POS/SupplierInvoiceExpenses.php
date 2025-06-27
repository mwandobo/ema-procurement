<?php

namespace App\Models\Bar\POS;

use App\Models\Bar\POS\SupplierClearingItem;
use App\Models\PurchaseSupplierInvoice;
use Illuminate\Database\Eloquent\Model;

class SupplierInvoiceExpenses extends Model
{
    protected $table = 'store_pos_supplier_clearing_expenses';
    protected $guarded = ['id'];

    public function items()
    {
        return $this->hasMany(SupplierClearingItem::class, 'reference_no', 'reference_no');
    }

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseSupplierInvoice::class, 'reference_no', 'reference_no');
    }
}