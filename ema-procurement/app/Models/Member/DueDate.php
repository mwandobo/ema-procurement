<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DueDate extends Model
{
    use HasFactory;


    protected $guarded = ['id'];
   protected $table   = 'member_due';

 
   
}
