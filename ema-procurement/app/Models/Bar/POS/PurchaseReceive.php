<?php

namespace App\Models\Bar\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  PurchaseReceive extends Model
{
    use HasFactory;
    protected $table = "store_pos_purchases_receive";
    protected  $guarded = ['id','_token'];


    public function purchase(){

        return $this->belongsTo('App\Models\Bar\POS\Purchase','purchase_id');
    }
    

 
public function supplier(){

    //return $this->BelongsTo('App\Models\POS\Supplier','supplier_id');
 return $this->BelongsTo('App\Models\Supplier','supplier_id');
}
 public function  store(){
    
        return $this->belongsTo('App\Models\Inventory\Location','location');
      }
}
