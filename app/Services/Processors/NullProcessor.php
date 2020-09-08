<?php

namespace App\Services\Processors;


use App\Transaction;

class NullProcessor extends Processor
{
    public function create(Transaction $transaction, array $items = []): array
    {
        return [];
    }

    public function verify(): bool
    {
        return false;
    }

    public function extractTransactionToken(): string
    {
        return '';
    }
}
