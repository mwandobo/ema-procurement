<?php

namespace App\Models\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseSupplierInvoice extends Model
{
    use HasFactory;

    protected $table  = "store_pos_purchase_items_supplied_inv";

    protected $guarded = ['id'];

    
}