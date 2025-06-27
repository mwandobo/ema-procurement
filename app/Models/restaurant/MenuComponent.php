<?php

namespace App\Models\restaurant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuComponent extends Model
{
 
    use HasFactory;

    protected $table = 'menu_component';
    protected $fillable = ['menu_id', 'name', 'user_id','order_no'];
}

