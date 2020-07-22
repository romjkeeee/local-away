<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SizingGuide extends Model
{
    public $guarded = ['id'];

    public function sizing_category()
    {
        return $this->hasOne(SizingCategory::class, 'id', 'sizing_category_id');
    }
}
