<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderQuizSetting extends Model
{
    public $guarded = ['id'];

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function quiz_products()
    {
        return $this->hasMany(OrderProduct::class, 'order_quiz_id', 'id');
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }
}
