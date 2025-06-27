<?php

namespace App\Models\Truck;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceHistory extends Model
{
    use HasFactory;
    
    protected $table = "device_history";

    protected  $guarded = ['id'];
}