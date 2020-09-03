<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClothesCategory extends Model
{
    public $fillable = ['title', 'gender_id', 'active'];
    public $with = ['costs'];

    public function costs()
    {
        return $this->belongsToMany(Cost::class,'clother_category_costs','clothe_category_id', 'cost_id')->where('status', true);
    }

    public function gender()
    {
        return $this->hasOne(Gender::class, 'id', 'gender_id');
    }
}
