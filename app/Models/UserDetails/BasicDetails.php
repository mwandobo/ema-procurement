<?php

namespace App\Models\UserDetails;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicDetails extends Model
{
    use HasFactory;
    protected $table = "basic_details";
   protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo('App/Models/User','user_id');
    }
}    

