<?php

namespace App\Models\Cards;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $table = "tbl_deposits";

   protected  $guarded = ['id'];

  public function payment(){
    
        return $this->BelongsTo('App\Models\Accounting\AccountCodes','account_id');
    }

 public function user()
    {
        return $this->belongsTo('App\Models\User','added_by');
    }
 public function owner(){
        return $this->belongsTo('App\Models\Member\Member','member_id');
    }
}
