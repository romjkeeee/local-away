<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowRoomLike extends Model
{
    protected $guarded = ['id'];

//    public function product()
//    {
//        return $this->hasOne(Product::class, 'id', 'product_id');
//    }

    public function product()
    {
        return $this->hasOne(ShowRoomProduct::class, 'id', 'product_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
