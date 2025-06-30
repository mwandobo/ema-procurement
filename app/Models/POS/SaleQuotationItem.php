<?php

namespace App\Models\POS;

use App\Models\Inventory\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SaleQuotationItem extends Model
{
    use HasFactory;

    protected $table = "sale_quotation_item";

    protected $guarded = ['id'];

    public function store()
    {
        return $this->belongsTo(Location::class, 'store_id');
    }


}
