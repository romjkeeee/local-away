<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Qa extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'alias' => $this->alias,
            'name' => $this->city->name ?? 'no name',
        ];
    }
}
