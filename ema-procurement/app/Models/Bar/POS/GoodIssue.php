<?php

namespace App\Models\Bar\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodIssue extends Model
{
    use HasFactory;

    protected $table  = "store_pos_good_issues";

    protected $guarded = ['id'];



public function store(){

    return $this->BelongsTo('App\Models\Inventory\Location','location');
}

public function main(){

    return $this->BelongsTo('App\Models\Inventory\Location','start');
}

public function approve(){

    return $this->BelongsTo('App\Models\User','staff');
}

}
