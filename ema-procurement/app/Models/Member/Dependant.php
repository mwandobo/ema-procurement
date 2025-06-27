<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function member(){
        return $this->belongsTo('App\Models\Member\Member','id');
    }
}
