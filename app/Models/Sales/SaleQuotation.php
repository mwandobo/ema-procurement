<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleQuotation extends Model
{
    use HasFactory;

    protected $table = "sale_quotations";

    protected $guarded = ['id'];

    public function client()
    {
        return $this->belongsTo(\App\Models\Bar\POS\Client::class, 'client_id');
    }

    public function user()
    {

        return $this->belongsTo('App\Models\User', 'added_by');
    }

    public function preQuotation()
    {
        return $this->belongsTo(SalePreQuotation::class, 'sale_pre_quotation_id');
    }
}
