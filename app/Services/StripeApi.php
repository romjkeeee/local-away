<?php

namespace App\Services;


use App\Contracts\PaymentContract;

class StripeApi implements PaymentContract
{
    private string $secretKey;

    public function __construct()
    {
        $this->secretKey = config('payments.stripe.secretKey');

        \Stripe\Stripe::setApiKey($this->secretKey);
    }

    /**
     * @param int $amount refund amount
     * @param string $id payment_intent from webhook event see transaction response.
     *                   Example: pi_1HOhHAEI72nOy8sy0Y0O6YNX
     * @return array
     * @throws \Stripe\Exception\ApiErrorException
     */
    public function refund(int $amount, string $id): array
    {
        return \Stripe\Refund::create([
            'amount' => $amount,
            'payment_intent' => $id,
        ])->toArray();
    }
}
