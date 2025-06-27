<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    use HasFactory;

    protected $table = "gl_account_type";

    public $timestamps = false;
    
  public function classAccount()
    {
        return $this->hasMany(ClassAccount::class, 'class_type', 'type');
    }
}
