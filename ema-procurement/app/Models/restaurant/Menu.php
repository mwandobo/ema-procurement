<?php

namespace App\Models\restaurant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
 
    use HasFactory;

    protected $table = 'menus';
    protected $fillable = ['status', 'name', 'price', 'user_id'];
}

