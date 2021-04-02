<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Destination extends Model
{
    protected $fillable = [
        'name',
        'alias',
        'city_id',
        'location_image',
        'status'
    ];

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
}
