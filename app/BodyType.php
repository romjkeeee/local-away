<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BodyType extends Model
{
    public $guarded = ['id'];

    public function gender()
    {
        return $this->hasOne(Gender::class, 'id', 'gender_id');
    }
}
