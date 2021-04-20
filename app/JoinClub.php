<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JoinClub extends Model
{
    public $fillable = [
        'name',
        'email',
        'phone',
        'country',
        'zip_code',
    ];

}
