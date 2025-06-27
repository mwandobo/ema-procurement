<?php

namespace App\Models\Bar\POS;

use Illuminate\Database\Eloquent\Model;

class CustomerCredibility extends Model
{
    protected $fillable = ['group_name', 'percentage'];

    public function clients()
    {
        return $this->belongsToMany('App\Models\Bar\POS\Client', 'customer_credibility_client', 'credibility_id', 'client_id');
    }
}