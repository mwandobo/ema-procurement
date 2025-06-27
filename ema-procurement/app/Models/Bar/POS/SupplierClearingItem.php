<?php

namespace App\Models\Bar\POS;

use App\Models\Bar\POS\Items;

use Illuminate\Database\Eloquent\Model;

class SupplierClearingItem extends Model
{
    protected $table = 'store_pos_supplier_clearing_items';
    protected $guarded = ['id'];
    
    public function item()
    {
        return $this->belongsTo(Items::class, 'item_id', 'id');
    }
}