<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;

    protected $table = "tbl_account_details";

    protected $guarded = ['id','_token'];

      public function chart()
  {
      return $this->hasOne(ChartOfAccount::class, 'id', 'account_id');
  }
  
}
