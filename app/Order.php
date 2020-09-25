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
//        if ($this->transaction->id) {
//            return $this->transaction;
//        }

        $serviceFee = 0;

        $transaction = $this->transaction()->updateOrCreate([
            'operation' => 'order',
            'origin_cost' => $this->sum,
            'service_fee' => $serviceFee,
            'processor' => $processor,
            'cost' => $this->sum,
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
//            $image = $orderProduct->product->getMedia('images')->first();
            $media = $orderProduct->product->colorImage->where('color_id',$this->color_id)->first();
            if ($media) {
                $image = $media->product->getMedia('images')->where('id', $media->media_id)->first()->getFullUrl();
            }

            $items[] = [
                'name' => $orderProduct->product->name,
                'image' => isset($image) ? $image : '',
                'quantity' => $orderProduct->count,
                'price' => $orderProduct->price,
            ];
        }

        if (count($this->quiz()->get())) {
            foreach ($this->quiz()->get() as $quiz) {
                $cost_box_client = json_decode($quiz->costs, true);
                $data = [
                    'name' => 'Travel box',
                    'image' => Box::query()->first()->image,
                    'quantity' => 1,
                    'price' => $quiz->price + $cost_box_client['all_cost_to'],
                ];
                array_push($items,$data);
            }
        }
        return $items;
    }
}
