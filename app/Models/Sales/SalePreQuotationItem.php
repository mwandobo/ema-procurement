<?php

namespace App\Models\Sales;

use App\Models\Inventory\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SalePreQuotationItem extends Model
{
    use HasFactory;

    protected $table = "sale_pre_quotation_item";

    protected $guarded = ['id'];

    public function store()
    {
        return $this->belongsTo(Location::class, 'store_id');
    }


}
