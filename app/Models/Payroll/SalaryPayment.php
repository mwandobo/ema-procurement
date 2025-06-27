<?php

namespace App\Models\Payroll;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryPayment extends Model
{
    use HasFactory;

    protected $table = "salary_payments";

    protected $fillable = ['salary_payment_id','user_id','payment_month','fine_deduction','payment_type','comments','paid_date','deduct_from','account_id','added_by','payment_amount']; 

 public function method(){

        return $this->belongsTo('App\Models\Payments\Payment_methodes','payment_type');
    }
  public function account(){

        return $this->belongsTo('App\Models\Accounting\AccountCodes','account_id');
    }

}
