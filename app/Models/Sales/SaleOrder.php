<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    use HasFactory;

    protected $table = "sale_orders";

    protected $guarded = ['id'];

    public function client()
    {
        return $this->belongsTo(\App\Models\Bar\POS\Client::class, 'client_id');
    }

    public function quotation()
    {
        return $this->belongsTo(SaleQuotation::class, 'sale_quotation_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'added_by');
    }
}
