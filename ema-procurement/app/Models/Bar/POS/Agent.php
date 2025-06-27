<?php

namespace App\Models\Bar\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $table = "store_pos_agent";
    protected  $guarded = ['id'];
}