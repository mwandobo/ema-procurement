<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function member(){
        return $this->hasOne('App\Models\Member\Member','id');
    }

}
