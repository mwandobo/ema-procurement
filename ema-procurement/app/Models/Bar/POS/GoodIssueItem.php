<?php

namespace App\Models\Bar\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodIssueItem extends Model
{
    use HasFactory;

    protected $table  = "store_pos_good_issues_items";

    protected $guarded = ['id'];

    public function store(){

        return $this->BelongsTo('App\Models\Inventory\Location','location');
    }
    public function main(){

    return $this->BelongsTo('App\Models\Inventory\Location','start');
}
    
    public function item(){

        return $this->BelongsTo('App\Models\Bar\POS\Items','item_id');
    }
    
    public function location()
    {
        return $this->belongsTo(Location::class, 'location'); 
    }
}
