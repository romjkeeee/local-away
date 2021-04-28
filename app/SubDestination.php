<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubDestination extends Model
{
    protected $fillable = [
        'destination_story_id',
        'name',
        'image',
        'api_city',
        'url',
        'status'
    ];

    public function destinationStory(): HasOne
    {
        return $this->hasOne(DestinationStory::class, 'id','destination_story_id');
    }
}
