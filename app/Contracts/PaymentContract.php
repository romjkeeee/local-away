<?php

namespace App\Contracts;


interface PaymentContract
{
    /**
     * @param int $amount
     * @param string $id of payment transaction which need to refund
     * @return array
     */
public function refund(int $amount, string $id): array;
}
