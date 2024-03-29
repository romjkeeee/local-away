<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Color extends Model
{
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_colors');
    }
}
