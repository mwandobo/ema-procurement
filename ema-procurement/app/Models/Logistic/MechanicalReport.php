<?php

namespace App\Models\Logistic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MechanicalReport extends Model
{
    use HasFactory;

    protected $table = "mechanical_reports";

    protected $fillable = [      
         'module',
         'module_id',
         'item_name',
         'order_no',
         'date',   
        'added_by'];
    
       
}
