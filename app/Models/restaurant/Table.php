<?php

namespace App\Models\restaurant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
 
    use HasFactory;

    protected $table       = 'tables';
    protected $fillable    = ['name','number','capacity', 'restaurant_id', 'color','user_id'];
   

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant\Restaurant','restaurant_id');
    }

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
