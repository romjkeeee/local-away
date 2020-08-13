<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClothesCategory extends Model
{
    public $guarded = ['id'];

    public function costs()
    {
        return $this->belongsToMany(Cost::class,'clother_category_costs','clothe_category_id', 'cost_id');
    }
}
