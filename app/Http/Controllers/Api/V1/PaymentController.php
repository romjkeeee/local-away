<?php

namespace App\Http\Controllers\Api\V1;


use App\{Http\Controllers\Controller,
    Http\Requests\OrderCreateRequest,
    Order,
    Transaction,
    Services\Processors\Processor,
    User};

class PaymentController extends Controller
{
    protected string $publicKey;
    protected string $secretKey;
    protected int $tolerance = 0;

    protected function initApiKey()
    {
        \Stripe\Stripe::setApiKey($this->secretKey);
    }

    public function create(OrderCreateRequest $request)
    {
        $processor = Processor::instance(config('app.default_processor'));
        try {
            /** @var Order $order */
            $order = Order::query()->where('id', $request->get('order_id'))->first();
            if (!$order) {
                throw new \Exception('Order not exists');
            }
            $user = User::query()->where('id', $order->user_id)->first();
            if ($user->client_id) {

                return $this->successResponse(
                    $processor->create(
                        $order->getTransaction($processor->getAlias()),
                        $order->getProductItems()
                    )
                );
            }else{

                $customer = \Stripe\Customer::create();
                $user->update(['client_id', $customer->id]);
                $session = \Stripe\Checkout\Session::create([
                    'payment_method_types' => ['card'],
                    'mode' => 'setup',
                    'customer_id' => $customer->id,
                    'success_url' => '',
                    'cancel_url' => '',
                    'client_reference_id' => '',
                ]);
                $this->create($order->id);
            }
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
