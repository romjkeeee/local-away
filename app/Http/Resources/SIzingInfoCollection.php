<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SIzingInfoCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $types = '';
        if (SizingTypeCollection::collection($this->sizing_types) != null){
            $types = SizingTypeCollection::collection($this->sizing_types);
        }
        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => $this->image,
            'gender_id' => $this->gender_id,
            'sizing_guide' => $this->sizing_guide,
            'sizing_types' => $types
        ];
    }
}
