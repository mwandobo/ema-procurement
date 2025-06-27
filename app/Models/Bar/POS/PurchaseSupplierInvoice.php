<?php

namespace App\Models\Bar\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;

class PurchaseSupplierInvoice extends Model
{
    use HasFactory;

    protected $table  = "store_pos_purchase_items_supplied_inv";

    protected $guarded = ['id'];
    
    public function supplier()
{
    return $this->belongsTo(Supplier::class, 'supplier_id');
}

    
}