<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    protected $table = "tbl_expenses";

    public $timestamps = false;

  protected  $guarded = ['id'];
    
      public function classAccount()
    {
        return $this->hasOne(ClassAccount::class, 'class_name', 'class');
    }
    
     public function journalEntry()
    {
        return $this->hasMany(JournalEntry::class, 'account_id', 'account_id');
    }

    public function account()
    {
        return $this->hasOne(ChartOfAccount::class, 'id', 'account_id');
    }
    public function bank()
    {
        return $this->hasOne(ChartOfAccount::class, 'id', 'bank_id');
    }

 public function user(){

        return $this->belongsTo('App\Models\User','added_by');
    }
public function first(){

        return $this->belongsTo('App\Models\User','approval_1');
    }
 public function second(){

        return $this->belongsTo('App\Models\User','approval_2');
    }
 public function third(){

        return $this->belongsTo('App\Models\User','approval_3');
    }
}
