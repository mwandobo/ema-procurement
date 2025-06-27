<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;


    protected $guarded = ['id'];

 
    public function membership_types(){
        return $this->belongsTo('App\Models\Member\MembershipType','membership_class');
    }

    public function sports(){
        return $this->hasMany('App\Models\Member\Sports','member_id');
    }
    public function membership_fees(){
        return $this->hasMany('App\Models\Member\MembershipFee','member_id');
    }
    public function membership_payments(){
        return $this->hasMany('App\Models\Member\MembershipPayment','member_id');
    }

    public function business(){
        return $this->hasOne('App\Models\Member\Business','member_id');
    }

    public function dependant(){
        return $this->hasMany('App\Models\Member\Dependant','member_id');
    }

   public function card(){
        return $this->belongsTo('App\Models\Cards\Cards','card_id');
    }

}
