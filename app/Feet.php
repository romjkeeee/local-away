<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feet extends Model
{
    public $guarded = ['id'];

    public function measurement()
    {
        return $this->hasOne(Measurement::class, 'id','measurement_id');
    }
}
