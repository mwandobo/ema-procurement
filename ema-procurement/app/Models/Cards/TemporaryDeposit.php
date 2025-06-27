<?php

namespace App\Models\Cards;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryDeposit extends Model
{
    use HasFactory;

    protected $table = "tbl_temp_deposits";

    protected  $guarded = ['id'];
}
