<?php

namespace App\Models\Facility;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = "facilities_invoices";
    protected  $guarded = ['id'];


    public function invoice_items(){

        return $this->hasMany('App\Models\Facility\InvoiceItems','id');
    }
    
    public function client(){
    
        return $this->BelongsTo('App\Models\POS\Client','client_id');
    }
 public function  store(){
    
        return $this->belongsTo('App\Models\Inventory\Location','location');
      }

 public function user()
    {
        return $this->belongsTo('App\Models\User','created_by');
    }

}
