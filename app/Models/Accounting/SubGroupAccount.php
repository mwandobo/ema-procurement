<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubGroupAccount extends Model
{
    use HasFactory;

    protected $table = "gl_account_sub_group";
protected  $guarded = ['id'];

    public $timestamps = false;
    
     public function classAccount()
    {
        return $this->hasOne(ClassAccount::class, 'class_name', 'class');
    }
    
       
     public function accountCodes()
    {
        return $this->hasMany(AccountCodes::class,'account_group','name');
    }

}
