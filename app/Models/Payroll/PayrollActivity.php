<?php

namespace App\Models\Payroll;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollActivity extends Model
{
    use HasFactory;

    protected $table = "payroll_activities";

    protected $fillable = [
    'module_id',
    'module',
    'user_id',
    'date',
    'activity', 
    'added_by'];
    
   
    public function user(){
    
        return $this->belongsTo('App\Models\User','user_id');
      }

}
