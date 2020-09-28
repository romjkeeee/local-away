<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Collection extends Model
{
    public $fillable = ['alias','name', 'gender_id','image', 'active'];

//    public function products()
//    {
//        return $this->belongsToMany(Product::class, 'collection_products','collection_id','product_id');
//    }

    public function products()
    {
        return $this->hasMany(ShowRoomProduct::class, 'collection_id', 'id');
    }

    public function gender()
    {
        return $this->hasOne(Gender::class, 'id', 'gender_id');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['alias'] = Str::slug($value);
    }
}
