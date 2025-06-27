<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodReallocation extends Model
{
    use HasFactory;

    protected $table = "good_reallocations";

    protected $fillable = [
         'date',      
       'item_id',
        'staff',   
        'source_truck',  
       'destination_truck',            
        'quantity', 
        'added_by'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\user');
    }
}
