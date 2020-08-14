<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    public $guarded = ['id'];

    public function bodyType()
    {
        return $this->hasOne(BodyType::class, 'id', 'body_type_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
