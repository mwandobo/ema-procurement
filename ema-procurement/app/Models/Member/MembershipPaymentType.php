<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipPaymentType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
      protected $table = "membership_payments_type";

    public function owner(){
        return $this->belongsTo('App\Models\Member\Member','member_id');
    }

    public function payment(){
        return $this->belongsTo('App\Models\Member\MembershipPayment','payment_id');
    }
 public function user()
    {
        return $this->belongsTo('App\Models\User','added_by');
    }
}
