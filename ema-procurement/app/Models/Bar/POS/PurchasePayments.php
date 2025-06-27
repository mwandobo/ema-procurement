<?php

namespace App\Models\Bar\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;

class PurchasePayments extends Model
{
    use HasFactory;

    protected $table = "store_pos_purchase_payments";

    protected $guarded = ['id'];

  public function payment(){
    
        return $this->BelongsTo('App\Models\Accounting\AccountCodes','account_id');
    }

public function first(){

        return $this->belongsTo('App\Models\User','approval_1');
    }
 public function second(){

        return $this->belongsTo('App\Models\User','approval_2');
    }
 public function user(){

        return $this->belongsTo('App\Models\User','added_by');
    }
    
    public function invoice()
    {
        return $this->belongsTo(PurchaseSupplierInvoice::class, 'invoice_id');
    }
    
        public function supplier()
{
    return $this->belongsTo(Supplier::class, 'supplier_id');
}

}
