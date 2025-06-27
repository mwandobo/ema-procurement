<?php

namespace App\Models\restaurant;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    protected $table = 'order_history';
    protected $guarded     = ['id','_token'];
    
    
public function invoice(){

        return $this->BelongsTo('App\Models\restaurant\Order','invoice_id');
    }


   

 public function  store(){
    
        return $this->belongsTo('App\Models\Inventory\Location','location');
      }
   
}
