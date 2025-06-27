<?php

namespace App\Models\Facility;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceHistory extends Model
{
    use HasFactory;
    protected $table = "facilities_invoices_history";
    protected  $guarded = ['id','_token'];


    public function invoice(){

        //return $this->BelongsTo('App\Models\POS\Invoice','invoice_id');
   return $this->BelongsTo('App\Models\Facility\Invoice','invoice_id');
    }


    
    public function client(){
    
        //return $this->BelongsTo('App\Models\POS\Client','client_id');
      
    }

 public function  store(){
    
        return $this->belongsTo('App\Models\Inventory\Location','location');
      }
      
       public function facility(){
    
        return $this->belongsTo('App\Models\Facility\Facility','facility_id');
      }
}
