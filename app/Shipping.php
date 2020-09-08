<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'test' => 'boolean'
    ];
}
