<?php

namespace App\Models\restaurant;


use Illuminate\Database\Eloquent\Model;
use Shipu\Watchable\Traits\WatchableTrait;

class BaseModel extends Model
{
    use WatchableTrait;

    public function scopeDescending($query, $column = 'id')
    {
        return $query->orderBy($column, 'DESC');
    }
}
