<?php

namespace App;

use App\Services\Processors\Operations\Operation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property integer $id
 * @property string $token
 * @property string $processor
 * @property string $operation
 * @property int $origin_cost
 * @property int $service_fee
 * @property int $cost
 * @property string $currency
 * @property string $description
 * @property int $status_id
 * @property mixed $response
 * @property string $external_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at

 */
class Transaction extends Model
{
    protected $fillable = [
        'origin_cost',
        'cost',
        'processor',
        'operation',
        'description',
        'response',
        'service_fee',
    ];

    protected $casts = [
        'response' => 'array'
    ];

    public static function boot()
    {
        parent::boot();

        parent::creating(function(self $transaction) {
            $transaction->status_id = Status::pendingPayment()->id;
            $transaction->token = Str::random(40);
            $transaction->currency = 'usd';
        });
    }

    public static function findByToken($token)
    {
        return static::query()->where(['token' => $token])->first();
    }

    public function getOperation(): Operation
    {
        return Operation::instance($this->operation, ['transaction' => $this]);
    }

    public function isPending()
    {
        return $this->status_id == Status::pendingPayment()->id;
    }

    public function isSuccess()
    {
        return $this->status_id == Status::payed()->id;
    }
}
