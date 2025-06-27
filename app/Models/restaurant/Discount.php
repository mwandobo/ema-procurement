<?php

namespace App\Models\restaurant;

use App\Models\restaurant\Restaurant;
use Shipu\Watchable\Traits\WatchableTrait;

class Discount extends BaseModel
{

    protected $table       = 'discounts';
    protected $fillable    = ['order_id', 'coupon_id', 'amount','status'];


    public function coupons()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function orders(){
        return $this->belongsTo(Order::class);
    }

}
