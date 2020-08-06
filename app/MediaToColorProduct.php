<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaToColorProduct extends Model
{
    protected $guarded = ['id'];

    public function images()
    {
        return $this->hasMany(Media::class, 'id', 'media_id');
    }
}
