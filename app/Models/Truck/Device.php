<?php

namespace App\Models\Truck;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    
    protected $table = "device";

    protected  $guarded = ['id'];
}