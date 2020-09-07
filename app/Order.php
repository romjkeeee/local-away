<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $guarded = ['id'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function package_type()
    {
        return $this->hasOne(PackageType::class, 'id', 'package_type_id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function address()
    {
        return $this->hasOne(UserAddress::class, 'id', 'address_id');
    }

    public function quiz()
    {
        return $this->hasMany(OrderQuizSetting::class, 'order_id', 'id');
    }

    public function order_products()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id')->whereNull('order_quiz_id');
    }

    public function quiz_products()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id')->whereNotNull('order_quiz_id');
    }
}
