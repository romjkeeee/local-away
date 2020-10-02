<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QaForm extends Model
{
    protected $guarded = ['id'];

    public function qa()
    {
        return $this->hasOne(Qa::class, 'id', 'qa_id');
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
}
