<?php

namespace App\Services\Processors;


use App\Transaction;

class Stripe extends Processor
{
    protected string $publicKey;
    protected string $secretKey;
    protected string $webhookSecretKey;
    protected int $tolerance = 0;

    protected function initApiKey()
    {
        \Stripe\Stripe::setApiKey($this->secretKey);
    }

    public function extractTransactionToken(): string
    {
        return request('data.object.client_reference_id');
    }

    public function create(Transaction $transaction, array $items = []): array
    {
        $this->initApiKey();

        $lineItems = [];
        foreach ($items as $item) {
            $lineItems[] = [
                'name' => e($item['name']),
                'images' => $item['image'] ? [$item['image']] : [],
                'quantity' => $item['quantity'],
                'amount' => $transaction->cost,
                'currency' => $transaction->currency,
            ];
        }

        $urlParams = [
            $this->transactionTokenParam => $transaction->token
        ];

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'success_url' => url(config('app.front_url') . '/payment/success', $urlParams),
            'cancel_url' => url(config('app.front_url') . '/payment/cancel', $urlParams),
            'client_reference_id' => $transaction->token,
        ]);

        return [
            'sessionId' => $session->id ?? '',
            'publicKey' => $this->publicKey,
        ];
    }

    public function verify(): bool
    {
        $this->initApiKey();

        $event = null;
        try {
            if ((int) $this->transaction->cost != (int) request('data.object.amount_total')) {
                throw new \Exception('Cost not equals');
            }

            $event = \Stripe\Webhook::constructEvent(
                request()->getContent(),
                $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '',
                $this->webhookSecretKey,
                $this->tolerance
            );

            if ($event && $event->type == 'checkout.session.completed') {
                return true;
            }
        } catch(\Throwable $e) {
            logger()->channel('payment')->error($e);
        }

        return false;
    }
}
