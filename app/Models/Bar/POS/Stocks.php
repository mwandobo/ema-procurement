<?php

namespace App\Models\Bar\POS;

use App\Models\Inventory\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    use HasFactory;

    protected $table = "store_item_stocks";
    protected  $guarded = ['id'];


    public function batch()
    {
        return $this->belongsTo(Batches::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}

 
