<?php

namespace App\Models\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodIssue extends Model
{
    use HasFactory;

    protected $table  = "pos_good_issues";

    protected $guarded = ['id'];



public function store(){

    return $this->BelongsTo('App\Models\Inventory\Location','location');
}

public function approve(){

    return $this->BelongsTo('App\Models\User','staff');
}

}
