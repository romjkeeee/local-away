<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sizing extends Model
{
    public $guarded = ['id'];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_sizes');
    }

    public function measurement()
    {
        return $this->hasOne(Measurement::class, 'id','measurement_id');
    }

    public function sizing_type()
    {
        return $this->belongsToMany(SizingType::class,'sizing_type_sizings');
    }
}
