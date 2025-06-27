<?php

namespace App\Models\Facility;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = "facilities_activities";

    protected $fillable = [
    'module_id',
   'user_id',
    'module',
    'date',
    'activity', 
    'added_by'];
    
   
    public function user(){
    
        return $this->belongsTo('App\Models\User','user_id');
      }

     
}
