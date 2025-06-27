<?php

namespace App\Models\Facility;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItems extends Model
{
    use HasFactory;

    protected $table = "facilities_invoice_items";
    protected  $guarded = ['id'];

public function invoice(){

        //return $this->BelongsTo('App\Models\POS\Invoice','invoice_id');
   return $this->BelongsTo('App\Models\Facility\Invoice','invoice_id');
    }


public function item(){

   return $this->BelongsTo('App\Models\Facility\Items','item_name');
    }

}
