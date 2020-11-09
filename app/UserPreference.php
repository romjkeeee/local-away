<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    public $guarded = ['id'];

    public $casts = [
        'sizing' => 'json',
        'height' => 'json'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function bodyType()
    {
        return $this->hasOne(BodyType::class, 'id', 'body_type_id');
    }
}
