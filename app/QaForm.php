<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QaForm extends Model
{
    protected $guarded = ['id'];

    public function qa()
    {
        return $this->hasOne(Qa::class, 'id', 'qa_id');
    }
}
