<?php

namespace App\Models\Bar\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderTracking extends Model
{
    use HasFactory;

    protected $table  = "store_purchase_order_tracking";

    protected $guarded = ['id'];
}