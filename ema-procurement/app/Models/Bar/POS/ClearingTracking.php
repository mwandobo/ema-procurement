<?php

namespace App\Models\Bar\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClearingTracking extends Model
{
    use HasFactory;

    protected $table = "store_clearing_tracking";
    protected  $guarded = ['id'];
}