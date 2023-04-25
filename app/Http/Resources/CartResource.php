<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // Map Domain Cart model values
        return [
            'data' => [
                'quantity' => $this->quantity()->value(),
                'price' => $this->price()->value(),
            ]
        ];
    }
}
