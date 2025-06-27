<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodDisposal extends Model
{
    use HasFactory;

    protected $table = "good_disposals";

    protected $fillable = [
         'date',      
       'item_id',
        'staff',            
        'quantity', 
        'added_by'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\user');
    }
}
