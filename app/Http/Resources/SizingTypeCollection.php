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
        $data ='';
        if (count($this->sizings)) {
            $data = [
                'id' => $this->id,
                'sizing_category_id' => $this->sizing_category_id,
                'title' => $this->title,
                'sizings' => $this->sizings
            ];
        }
        return $data;

    }
}
