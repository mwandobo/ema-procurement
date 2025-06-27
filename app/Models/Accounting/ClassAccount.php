<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassAccount extends Model
{
    use HasFactory;

    protected $table = "gl_account_class";

    public $timestamps = false;
    
  public function groupAccount()
    {
        return $this->hasMany(GroupAccount::class, 'class', 'class_name');
    }
    
   public function accountType()
    {
        return $this->hasOne(AccountType::class, 'type', 'class_type');
    }
}
