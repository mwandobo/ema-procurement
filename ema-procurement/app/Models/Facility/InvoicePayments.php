<?php

namespace App\Models\Facility;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicePayments extends Model
{
    use HasFactory;

    
    protected $table = "facilities_invoice_payments";

    //protected $quarded = ['id','_token'];
    protected $guarded = ['id'];

 public function payment(){
    
        return $this->BelongsTo('App\Models\Accounting\AccountCodes','account_id');
    }

}

