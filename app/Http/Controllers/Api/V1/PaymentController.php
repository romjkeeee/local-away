<?php

namespace App\Http\Controllers\Api\V1;


use App\{Http\Controllers\Controller,
    Http\Requests\OrderCreateRequest,
    Order,
    Services\Processors\Stripe,
    Transaction,
    Services\Processors\Processor,
    User};

class PaymentController extends Controller
{
    public function create(OrderCreateRequest $request)
    {
        $processor = Processor::instance(config('app.default_processor'));
        try {
            /** @var Order $order */
            $order = Order::query()->where('id', $request->get('order_id'))->first();
            if (!$order) {
                throw new \Exception('Order not exists');
            }
                return $this->successResponse(
                    $processor->create(
                        $order->getTransaction($processor->getAlias()),
                        $order->getProductItems(),
                    )
                );
        }
        catch
            (\Exception $e) {
                logger()->channel('payment')->error($e);

                return $this->errorResponse($e->getMessage());
            }

    }

    public function process(Processor $processor)
    {
        logger()->channel('payment')->debug(json_encode($_POST));
        logger()->channel('payment')->debug(json_encode($_SERVER));
        logger()->channel('payment')->debug(request()->getContent());

        try {
            $transaction = $processor->retrieveTransaction();

            if ($transaction && $transaction->isPending() && $processor->verify()) {
                $transaction->response = json_encode(request()->all());
                $transaction->getOperation()->process();
            }
            $json = json_decode(request()->getContent(), true);
            $order = Order::query()->where('transaction_id', $transaction->id)->first();
            $user = User::query()->where('id', $order->user_id)->first();
            $user->update([
                'client_id' => $json['data']['object']['customer']
            ]);
        } catch (\Exception $e) {
            logger()->channel('payment')->error($e);
        }
    }

    public function success(Transaction $transaction)
    {
        return $transaction->getOperation()->success();
    }

    public function fail(Transaction $transaction)
    {
        return $transaction->getOperation()->fail();
    }
}
