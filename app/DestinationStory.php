<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DestinationStory extends Model
{
    protected $fillable = [
        'destination_id',
        'name',
        'description',
        'image',
        'url',
        'status'
    ];

    public function destination(): HasOne
    {
        return $this->hasOne(Destination::class, 'id','destination_id');
    }
}
