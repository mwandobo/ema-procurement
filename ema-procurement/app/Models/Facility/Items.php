<?php

namespace App\Models\Facility;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "facility_items";


 public function facility(){
    
        return $this->BelongsTo('App\Models\Facility\Facility','facility_id');
    }
}
