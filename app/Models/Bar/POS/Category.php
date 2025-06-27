<?php

namespace App\Models\Bar\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table  = "pos_item_categories";

    protected $guarded = ['id'];


}
