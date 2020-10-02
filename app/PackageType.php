<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageType extends Model
{
    protected $guarded = ['id'];

    public function gender()
    {
        return $this->hasOne(Gender::class, 'id', 'gender_id');
    }
}
