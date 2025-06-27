<?php

namespace App\Models\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnPurchases extends Model
{
    use HasFactory;

    protected $table = "pos_return_purchases";
    protected  $guarded = ['id'];


    public function purchase(){

        return $this->BelongsTo('App\Models\POS\Purchase','purchase_id');
    }
    
    public function supplier(){
    
        //return $this->BelongsTo('App\Models\POS\Supplier','supplier_id');
 return $this->BelongsTo('App\Models\Supplier','supplier_id');
    }

}
