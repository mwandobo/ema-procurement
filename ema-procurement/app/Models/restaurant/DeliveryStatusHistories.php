<?php

namespace App\Models\restaurant;



use Illuminate\Database\Eloquent\Model;

class DeliveryStatusHistories extends Model
{
    protected $table       = 'delivery_status_histories';
    protected $fillable    = ['order_id', 'user_id', 'status'];
    protected $casts = [
        'status' => 'int',
    ];

}
