<?php

namespace App\Services\Processors;


use App\Order;
use App\Transaction;
use Illuminate\Support\Str;

abstract class Processor
{
    protected string $alias;
    protected string $transactionTokenParam = 'trans_token';

    public static function instance($alias): ?Processor
    {
        try {
            return app(__NAMESPACE__ . '\\' . Str::studly($alias), ['alias' => $alias]);
        } catch (\Exception $e) {
            logger()->channel('payment')->error($e);
            return new NullProcessor('null-processor');
        }
    }

    public function __construct($alias)
    {
        $this->alias = $alias;

        foreach (config('payments.' . $alias, []) as $property => $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public abstract function create(Transaction $transaction, array $items = []): array;

    public abstract function verify(): bool;

    public abstract function extractTransactionToken(): string;

    /**
     * @return Transaction|object|null
     */
    public function retrieveTransaction(): ?Transaction
    {
        return Transaction::findByToken($this->extractTransactionToken());
    }
}
