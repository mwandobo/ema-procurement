<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodIssue extends Model
{
    use HasFactory;

    protected $table = "good_issues";

    protected $fillable = [
         'date',
        'staff',   
        'location',
        'type',  
        'type_id',  
        'added_by'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\user');
    }
}
