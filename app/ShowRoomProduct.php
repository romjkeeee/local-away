<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowRoomProduct extends Model
{
    protected $guarded = ['id'];

    protected $appends = ['liked', 'disliked'];

    public function getLikedAttribute()
    {
        $userId = auth('api')->user();
        if ($userId) {
            $like = $this->like->first(function ($key, $value) use ($userId) {
                return $key->user_id == $userId->id;
            });

            if ($like) {
                return true;
            }
        }
        return false;
    }

    public function getDislikedAttribute()
    {
        $userId = auth('api')->user();
        if ($userId) {
            $like = $this->dislike->first(function ($key, $value) use ($userId) {
                return $key->user_id === $userId->id;
            });

            if ($like) {
                return true;
            }
        }
        return false;
    }

    public function like()
    {
        return $this->hasMany(ShowRoomLike::class, 'product_id', 'id')->where('type', 'like');
    }

    public function dislike()
    {
        return $this->hasMany(ShowRoomLike::class, 'product_id', 'id')->where('type', 'dislike');
    }
}
