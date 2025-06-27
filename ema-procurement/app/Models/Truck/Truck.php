<?php

namespace App\Models\Truck;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;
    
    protected $table = "trucks";

    protected  $guarded = ['id'];
}