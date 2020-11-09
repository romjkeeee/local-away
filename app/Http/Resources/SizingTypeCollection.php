<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SizingTypeCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        if (count($this->sizings) >= 1) {
            $data = [
                'id' => $this->id,
                'sizing_category_id' => $this->sizing_category_id,
                'title' => $this->title,
                'sizings' => SizingsCollection::collection($this->sizings)
            ];
        }
        return $data ?? null;

    }


}
