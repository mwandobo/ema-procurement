<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    use HasFactory;

    protected $table = "journal_entries";
    protected $guarded = ['id','_token'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function chart()
    {
        return $this->hasOne(ChartOfAccount::class, 'id', 'account_id');
    }

    public function valuations()
    {
        return $this->hasMany(AssetValuation::class, 'asset_id', 'id')->orderBy('date', 'desc');
    }
    
    public function accountCodes()
    {
        return $this->hasOne(AccountCodes::class, 'account_id', 'account_id');
    }
public function borrower()
    {
        return $this->hasOne(Borrower::class, 'id', 'borrower_id');
    }
    
public function classAccount()
{
    return $this->belongsTo(ClassAccount::class, 'class_account_id'); 
}
public function accountCode()
{
    return $this->belongsTo(AccountCodes::class, 'account_id'); 
}

}
