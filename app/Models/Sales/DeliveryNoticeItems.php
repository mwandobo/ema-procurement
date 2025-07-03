<?php

namespace App\Models\Sales;

use App\Models\Bar\POS\Items;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryNoticeItems extends Model
{
    use HasFactory;

    protected $table = "delivered_items";

    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(SaleOrder::class, 'sale_order_id');
    }

    public function user()
    {

        return $this->belongsTo('App\Models\User', 'added_by');
    }

    public function item()
    {
        return $this->belongsTo(Items::class, 'item_id');
    }

    public function delivery_notice()
    {
        return $this->belongsTo(DeliveryNotice::class, 'delivery_notice_id');
    }
}
