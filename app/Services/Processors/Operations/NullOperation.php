<?php

namespace App\Services\Processors\Operations;


use Illuminate\Http\Resources\Json\JsonResource;

class NullOperation extends Operation
{
    public function process()
    {
    }

    public function success(): JsonResource
    {
        return new JsonResource([]);
    }

    public function fail(): JsonResource
    {
        return new JsonResource([]);
    }


}
