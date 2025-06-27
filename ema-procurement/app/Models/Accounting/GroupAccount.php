<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupAccount extends Model
{
    use HasFactory;

    protected $table = "gl_account_group";

    public $timestamps = false;
    
     public function classAccount()
    {
        return $this->hasOne(ClassAccount::class, 'class_name', 'class');
    }
    
      
  public function subAccount()
    {
        return $this->hasMany(SubGroupAccount::class,'name','name');
    }
 
     public function accountCodes()
    {
        return $this->hasMany(AccountCodes::class,'account_group','name');
    }

}
