<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Qa extends Model
{
    protected $guarded = ['id'];

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function setCityIdAttribute($value)
    {
        $this->attributes['city_id'] = $value;
        $value = City::query()->where('id',$value)->first();
        $this->attributes['alias'] = Str::slug($value->name);
    }
}
