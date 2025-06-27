<?php

namespace App\Models\Bar\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Bar\POS\Items;

class Costing extends Model
{
    use HasFactory;

    protected $table = "store_pos_purchase_items_costing";
    protected  $guarded = ['id'];
    
public function item()
{
    return $this->belongsTo(Items::class, 'item_id');
}

}