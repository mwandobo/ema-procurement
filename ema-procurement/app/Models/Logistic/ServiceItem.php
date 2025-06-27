<?php

namespace App\Models\Logistic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceItem extends Model
{
    use HasFactory;

    protected $table = "service_items";

    protected $fillable = [      
         'service_id',  
        'minor',  
        'order_no', 
        'added_by'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\user');
    }
}
