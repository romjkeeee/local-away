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
        return request('data.object.client_reference_id', '');
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
                'amount' => $item['price'] * 100,
                'currency' => $transaction->currency,
            ];
        }

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'line_items' => $lineItems,
            'success_url' => $this->createUrl($transaction->token, 'success'),
            'cancel_url' => $this->createUrl($transaction->token),
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

            $this->validateCost((int) (request('data.object.amount_total') / 100));

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

    public function createClient($user){

        $this->initApiKey();

        $customer = \Stripe\Customer::create();
        $user->update(['client_id', $customer->id]);
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'mode' => 'setup',
            'customer' => $customer->id,
            'success_url' => 'localaway.com',
            'cancel_url' => 'localaway.com',
            'client_reference_id' => '',
        ]);

        return true;
    }

}
