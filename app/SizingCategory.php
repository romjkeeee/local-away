<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SizingCategory extends Model
{
    public $guarded = ['id'];

    public function sizings()
    {
        return $this->belongsToMany(Sizing::class,'sizing_category_sizings','sizing_categories_id');
    }

    public function sizing_types()
    {
        return $this->hasMany(SizingType::class,'sizing_category_id','id');
    }

    public function sizing_guide()
    {
        return $this->hasOne(SizingGuide::class,'sizing_category_id','id')->where('active', true);
    }

    public function gender()
    {
        return $this->hasOne(Gender::class, 'id', 'gender_id');
    }
}
