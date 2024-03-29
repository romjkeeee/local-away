<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class Status extends Model
{
    /**
     * @param string $name
     * @return static|object
     */
    private static function find(string $name)
    {
        $status = static::query()->where(['name' => $name])->first();
        return $status ?: new static(['name' => 'UNKNOWN']);
    }

    public static function pendingPayment()
    {
        return static::find('PENDING_PAYMENT');
    }

    public static function payed()
    {
        return static::find('PAYED');
    }

    public static function boxPayed()
    {
        return static::find('BOX_PAYED');
    }

    public static function shopPayed()
    {
        return static::find('SHOP_PAYED');
    }

    public static function paymentFailed()
    {
        return static::find('PAYMENT_FAILED');
    }

    public static function fullPayment()
    {
        return static::find('FULL_PAYMENT');
    }

    public static function boxAndShopPayed()
    {
        return static::find('BOX_AND_SHOP_PAYED');
    }

    public static function boxLoading()
    {
        return static::find('BOX_LOADING');
    }

    public static function sendToCustomer()
    {
        return static::find('SEND_TO_CUSTOMER');
    }

    public static function delivered()
    {
        return static::find('DELIVERED');
    }

    public static function productRefund()
    {
        return static::find('PRODUCT_REFUND');
    }

    public static function refunded()
    {
        return static::find('REFUNDED');
    }
}
