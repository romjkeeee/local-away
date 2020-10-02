<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TravelStory extends Model
{
    public $guarded = ['id'];


    public function storyStyle()
    {
        return $this->hasMany(StoryStyle::class, 'travel_stories_id', 'id');
    }

    public function travel_story_image_gender()
    {
        return $this->belongsToMany(Gender::class, 'travel_story_images','travel_stories_id', 'gender_id');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['alias'] = Str::slug($value);
    }

}
