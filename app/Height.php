<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Height extends Model
{
    protected $guarded = ['id'];

    public function measurement()
    {
        return $this->hasOne(Measurement::class, 'id','measurement_id');
    }
}
