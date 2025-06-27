<?php

namespace App\Models\Logistic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = "services";

    protected $fillable = [      
         'mechanical',
         'date',
         'history',     
        'major',  
        'status', 
        'type',
         'facility',
         'personel',  
        'added_by'];
    
        public function user()
        {
            return $this->belongsTo('App\Models\user');
        }
        public function staff()
        {
            return $this->belongsTo('App\Models\Inventory\FieldStaff','mechanical');
        }
}
