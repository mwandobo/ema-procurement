<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalePreQuotation extends Model
{
    use HasFactory;

    protected $table = "sale_pre_quotations";

    protected $guarded = ['id'];

    public function client()
    {
        return $this->belongsTo(\App\Models\Bar\POS\Client::class, 'client_id');
    }

    public function user()
    {

        return $this->belongsTo('App\Models\User', 'added_by');
    }

    public function items()
    {
        return $this->belongsToMany(
            \App\Models\Bar\POS\Items::class,
            'sale_pre_quotation_item',    // Pivot table
            'sale_pre_quotation_id',      // Foreign key to this model
            'item_id'                     // Foreign key to Items model (corrected from items_id)
        )
            ->withPivot('store_id', 'quantity', 'price', 'unit', 'id')
            ->withTimestamps();
    }
}
