<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SizingType extends Model
{
    public $fillable = ['sizing_category_id','title'];

    public function sizing_category()
    {
        return $this->hasOne(SizingCategory::class, 'id', 'sizing_category_id');
    }

    public function sizings()
    {
        return $this->belongsToMany(Sizing::class,'sizing_type_sizings','sizing_type_id')->having('sizing_id');
    }
}
