<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeightMetric extends Model
{
    protected $guarded = ['id'];

    public function height()
    {
        return $this->hasOne(Height::class, 'id','height_id');
    }
}
