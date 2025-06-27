<?php

namespace App\Models\Logistic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;
    protected $table = "trucks";

    protected $fillable = ['truck_name','reg_no','driver','truck_type','capacity','driver_status','fuel','truck_status','tyre','staff','location','added_by','type'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User','added_by');
    }

    public function driver()
    {
        return $this->belongsTo('App\Models\Driver','driver');
    }
          
public function region()
    {
        return $this->belongsTo('App\Models\Region','location');
    }
 public function  movement_crop_types(){

        return $this->belongsTo('App\Models\Crops_type','crop_type');
      }
public function route()
    {
        return $this->belongsTo('App\Models\Route','route_id');
    }
}
