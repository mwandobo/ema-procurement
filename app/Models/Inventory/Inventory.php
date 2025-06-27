<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = "inventories";

    protected $fillable = [
    'name',
    'unit',
    'quantity',
    'price',
    'type',
    'added_by'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\user');
    }


    
}
