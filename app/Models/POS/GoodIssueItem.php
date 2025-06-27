<?php

namespace App\Models\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodIssueItem extends Model
{
    use HasFactory;

    protected $table  = "pos_good_issues_items";

    protected $guarded = ['id'];

    public function store(){

        return $this->BelongsTo('App\Models\Inventory\Location','location');
    }
    
    public function item(){

        return $this->BelongsTo('App\Models\POS\Items','item_id');
    }
    
}
