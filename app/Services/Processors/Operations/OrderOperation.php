<?php

namespace App\Services\Processors\Operations;


use App\{Http\Resources\OrderResource, Order, Status};
use Illuminate\Http\Resources\Json\JsonResource;

class OrderOperation extends Operation
{
    private function findOrder(): Order
    {
        return Order::findByTransactionId($this->transaction->id);
    }

    public function process()
    {
        $order = $this->findOrder();
        $order->status_id = Status::payed()->id;
        $order->save();
        if (count($order->order_products_all()->get())){
            foreach ($order->order_products_all()->get() as $products){
                $products->status_id = Status::payed()->id;
                $products->update();
            }
        }
        if (count($order->quiz()->get())){
            foreach ($this->quiz()->get() as $quiz){
                $quiz->status_id = Status::payed()->id;
                $quiz->update();
            }
        }

        $this->transaction->status_id = Status::payed()->id;
        $this->transaction->external_id = request('data.object.id');
        $this->transaction->save();
    }

    public function success(): JsonResource
    {
        return new OrderResource($this->findOrder());
    }

    public function fail(): JsonResource
    {
        return new OrderResource($this->findOrder());
    }
}
