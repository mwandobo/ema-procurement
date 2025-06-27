<?php

namespace App\Models\restaurant ;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPayments extends Model
{
    use HasFactory;

    protected $table = "order_payments";

    protected $guarded = ['id'];

    public function payment(){
    
        return $this->BelongsTo('App\Models\Accounting\AccountCodes','account_id');
    }
}
