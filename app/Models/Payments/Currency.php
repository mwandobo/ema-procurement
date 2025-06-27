<?php

namespace App\Models\Payments;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $table = "tbl_currencies";

    public $timestamps = false;
    

       
     public function userdetails()
    {
         return $this->hasMany('App\Models\UserDetails','code');
    }
}
