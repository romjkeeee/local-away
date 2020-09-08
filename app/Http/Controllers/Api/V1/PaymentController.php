<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\Http\Requests\OrderCreateRequest;
use App\Order;
use App\Services\Processors\Processor;

class PaymentController extends Controller
{
    public function create(OrderCreateRequest $request)
    {
        $processor = Processor::instance(config('app.default_processor'));

        try {
            /** @var Order $order */
            $order = Order::query()->find($request->get('order_id'));
            if (!$order) {
                throw new \Exception('Order not exists');
            }

            return $this->successResponse(
                $processor->create(
                    $order->getTransaction($processor->getAlias()),
                    $order->getProductItems()
                )
            );
        } catch (\Exception $e) {
            logger()->channel('payment')->error($e);

            return $this->errorResponse($e->getMessage());
        }
    }

    public function process($processor)
    {
        logger()->channel('payment')->debug(json_encode($_POST));
        logger()->channel('payment')->debug(json_encode($_SERVER));
        logger()->channel('payment')->debug(request()->getContent());

        try {
            $processor = Processor::instance($processor);
            $transaction = $processor->retrieveTransaction();

            if ($transaction && $transaction->isPending() && $processor->verify()) {
                $transaction->response = json_encode(request()->all());
                $transaction->getOperation()->process();
            }
        } catch (\Exception $e) {
            logger()->channel('payment')->error($e);
        }
    }
}
