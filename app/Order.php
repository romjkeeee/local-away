<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @property int $id
 * @property int $transaction_id
 * @property int $sum
 * @property int $status_id
 *
 * @property Transaction $transaction
 * @property OrderProduct[] $order_products_all
 * @property OrderProduct[]|\Illuminate\Database\Eloquent\Collection $quiz_products
 */
class Order extends Model
{
    public $guarded = ['id'];

    /**
     * @param int $transactionId
     * @return static|\Illuminate\Database\Eloquent\Builder|Model
     */
    public static function findByTransactionId(int $transactionId)
    {
        return static::query()
            ->where(['transaction_id' => $transactionId])
            ->firstOrFail();
    }

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

    public function order_products_all()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id')->withDefault();
    }

    /**
     * @param string $processor
     * @return Transaction|object
     */
    public function getTransaction(string $processor): Transaction
    {
        if ($this->transaction->id) {
            return $this->transaction;
        }

        $serviceFee = $this->quiz_products->count() > 0 ? config('app.box_fee') : 0;

        $transaction = $this->transaction()->create([
            'operation' => 'order',
            'origin_cost' => $this->sum,
            'service_fee' => $serviceFee,
            'processor' => $processor,
            'cost' => $this->sum + $serviceFee,
            'description' => 'Pay for products',
        ]);

        $this->transaction_id = $transaction->id;
        $this->save();

        return $transaction;
    }

    public function getProductItems(): array
    {
        $items = [];

        foreach ($this->order_products_all as $orderProduct) {
            $image = $orderProduct->product->getMedia('images')->first();

            $items[] = [
                'name' => $orderProduct->product->name,
                'image' => $image ? $image->getFullUrl() : '',
                'quantity' => $orderProduct->count,
                'price' => $orderProduct->price,
            ];
        }

        if (count($this->quiz()->get())) {
            foreach ($this->quiz()->get() as $quiz) {
                $data = [
                    'name' => 'Travel box',
                    'image' => Box::query()->first()->image,
                    'quantity' => 1,
                    'price' => $quiz->price,
                ];
                array_push($items,$data);
            }
        }

        return $items;
    }
}
