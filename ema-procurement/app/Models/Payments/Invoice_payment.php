<?php

namespace App\Models\Payments;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_payment extends Model
{
    use HasFactory;

    protected $table="tbl_invoice_payments";

    protected $fillable = [
        'trans_id',
        'payment_methode_id',
        'amount',
        'due_amount',
        'notes',
        'date',
        'client_id',
        'invoice_id',
        
    ];

    public function payment_methodes(){

        return $this->belongTo('App\Models\Payments\Payment_methodes','payment_methode_id');
    }
}
