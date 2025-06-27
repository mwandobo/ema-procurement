<?php

namespace App\Models\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceHistory extends Model
{
    use HasFactory;
    protected $table = "pos_invoices_history";
    protected  $guarded = ['id','_token'];


    public function invoice(){

        //return $this->BelongsTo('App\Models\POS\Invoice','invoice_id');
   return $this->BelongsTo('App\Models\restaurant\Order','invoice_id');
    }


    
    public function client(){
    
        //return $this->BelongsTo('App\Models\POS\Client','client_id');
      
    }

 public function  store(){
    
        return $this->belongsTo('App\Models\Inventory\Location','location');
      }
}
