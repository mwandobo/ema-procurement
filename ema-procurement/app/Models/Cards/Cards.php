<?php

namespace App\Models\Cards;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Visitors\Visitor;

class Cards extends Model
{
    use HasFactory;

    protected $table = "tbl_cards";

    public $timestamps = false;

    protected $fillable = [
        'reference_no',
        'type',
        'status',
        'owner_id',
        'added_by'];

        public function visitor()
        {
            return $this->belongsToMany(Visitor::class, 'tbl_card_assignments');
        }
    

}
