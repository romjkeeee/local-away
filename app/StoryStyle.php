<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoryStyle extends Model
{
    public $guarded = ['id'];

    public function travelStory()
    {
        return $this->hasOne(TravelStory::class, 'id', 'travel_stories_id');
    }

    public function gender()
    {
        return $this->hasOne(Gender::class, 'id', 'gender_id');
    }
}
