<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountCodes extends Model
{
    use HasFactory;

    protected $table = "gl_account_codes";

    public $timestamps = false;
    
      public function classAccount()
    {
        return $this->hasOne(ClassAccount::class, 'class_name', 'class');
    }
    
     public function journalEntry()
    {
        return $this->hasMany(JournalEntry::class, 'account_id', 'account_id');
    }
    public function journalEntries()
{
    return $this->hasMany(JournalEntry::class, 'account_id');
}
}
