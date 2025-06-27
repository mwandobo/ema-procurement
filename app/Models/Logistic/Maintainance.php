<?php

namespace App\Models\Logistic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintainance extends Model
{
    use HasFactory;

    protected $table = "maintainances";

    protected $fillable = [      
         'report',
         'type',
         'facility',
         'personel',
         'mechanical',
         'date',
         'maintainance_type',
         'reason',     
        'status',   
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
