<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberTransaction extends Model
{
    use HasFactory;

    protected $table = "member_transactions";

    protected $guarded = ['id','_token'];

      public function chart_from()
  {
      return $this->hasOne(ChartOfAccount::class, 'id', 'account_id');
  }
 public function chart_to()
  {
      return $this->hasOne(ChartOfAccount::class, 'id', 'code_id');
  }
}
