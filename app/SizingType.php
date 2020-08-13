<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SizingType extends Model
{
    public $guarded = ['id'];

    public function sizing_category()
    {
        return $this->hasOne(SizingCategory::class, 'id', 'sizing_category_id');
    }

    public function sizings()
    {
        return $this->belongsToMany(Sizing::class,'sizing_type_sizings');
    }
}
