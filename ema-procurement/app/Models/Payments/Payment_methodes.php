<?php

namespace App\Models\Payments;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_methodes extends Model
{
    use HasFactory;

    protected $table = "payment_methodes";

    protected $fillable = [
        'name',
        'description',
    ];

    public function payments()
    {
        return $this->hasMany('App\Models\Payments\Payments','id');
    }

    
    public function invoice_payment()
    {
        return $this->hasMany('App\Models\Payments\Invoice_payment','id');
    }
}
