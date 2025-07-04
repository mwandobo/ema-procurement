<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryNotice extends Model
{
    use HasFactory;

    protected $table = "delivery_notices";

    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(SaleOrder::class, 'sale_order_id');
    }

    public function user()
    {

        return $this->belongsTo('App\Models\User', 'added_by');
    }

    public function items()
    {
        return $this->belongsToMany(\App\Models\Bar\POS\Items::class, 'delivered_items', 'delivery_notice_id', 'item_id')
            ->withPivot('ordered_quantity', 'delivered_quantity',)
            ->withTimestamps();
    }
}
