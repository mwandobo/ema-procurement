<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberDeposit extends Model
{
    use HasFactory;
    
    protected $table = "member_deposit_tbl";


    protected $guarded = ['id'];

    public function charge_types(){
        return $this->belongsTo('App\Models\Member\ChargeType','charge_type');
    }

    public function membership_types(){
        return $this->belongsTo('App\Models\Member\MembershipType','membership_type');
    }
}
