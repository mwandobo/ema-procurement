<?php

namespace App\Models\restaurant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order23 extends Model
{

    use HasFactory;
    
    protected $table       = 'orders_shayo';
    protected $guarded     = ['id','_token'];
   
  

    public function cuisines()
    {
        return $this->belongsToMany(Cuisine::class, 'restaurant_cuisines');
    }

   

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function place()
    {
        return $this->belongsTo('App\Models\Inventory\Location','location');
   
    }


   
    public function qrCode()
    {
        return $this->hasOne(QrCode::class);
    }

   

    
}
