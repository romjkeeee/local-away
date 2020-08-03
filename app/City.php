<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = ['id'];

    public function qa()
    {
        return $this->hasMany(Qa::class, 'city_id', 'id');
    }
}
