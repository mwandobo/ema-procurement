<?php

namespace App\Models\Cards;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardAssignment extends Model
{
    use HasFactory;

    protected $table = "tbl_card_assignments";

    protected $fillable = ['visitor_id','member_id','cards_id','added_by','status'];
}
