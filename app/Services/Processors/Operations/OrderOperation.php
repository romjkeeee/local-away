<?php

namespace App\Services\Processors\Operations;


use App\Order;
use App\Status;

class OrderOperation extends Operation
{
    public function process()
    {
        $order = Order::findByTransactionId($this->transaction->id);
        $order->status_id = Status::payed()->id;
        $order->save();

        $this->transaction->status_id = Status::payed()->id;
        $this->transaction->external_id = request('data.object.id');
        $this->transaction->save();
    }
}
