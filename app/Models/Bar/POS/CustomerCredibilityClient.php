<?php

namespace App\Models\Bar\POS;

use Illuminate\Database\Eloquent\Model;

class CustomerCredibilityClient extends Model
{
    protected $table = 'customer_credibility_client';


    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function credibility()
    {
        return $this->belongsTo(CustomerCredibility::class, 'client_id');
    }
}
