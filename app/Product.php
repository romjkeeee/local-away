<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    public $fillable = ['alias','name', 'gender_id', 'status','product_category_id', 'boutiques_id', 'price'];

    protected $with = ['sizes', 'colors', 'colorImage', 'gender','category', 'boutique'];

    public function boutique()
    {
        return $this->hasOne(Boutique::class, 'id', 'boutiques_id');
    }

    public function category()
    {
        return $this->hasOne(ProductCategory::class, 'id','product_category_id');
    }
    public function sizes()
    {
        return $this->belongsToMany(Sizing::class, 'product_sizes');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_colors');
    }

    public function gender()
    {
        return $this->hasOne(Gender::class, 'id', 'gender_id');
    }

    public function colorImage()
    {
        return $this->hasMany(MediaToColorProduct::class, 'product_id', 'id');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['alias'] = Str::slug($value);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }

    public function toArray()
    {
        $data = parent::toArray();

        $images = [];

        foreach ($this->getMedia('images') as $key => $value) {
            $images[$key]['id'] = $value->id;
            $images[$key]['link'] = $value->getFullUrl();
        }

        $data['images'] = $images;

        return $data;
    }
}
