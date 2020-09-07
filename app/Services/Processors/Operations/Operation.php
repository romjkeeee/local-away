<?php

namespace App\Services\Processors\Operations;


use App\Transaction;
use Illuminate\Support\Str;

abstract class Operation
{
    protected Transaction $transaction;

    public static function instance(string $slug, array $parameters = []): ?Operation
    {
        try {
            return app(__NAMESPACE__ . '\\' . Str::studly($slug . '-operation'), $parameters);
        } catch (\Exception $e) {
            logger()->channel('payment')->error($e);
            return new NullOperation($parameters['transaction']);
        }
    }

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    abstract public function process();
}
