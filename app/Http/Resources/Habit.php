<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Habit extends JsonResource
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
            'name' => $this->name,
            'data' => [
                'accomplishment_amount' => $this->accomplishments->count()
            ]
        ];
    }
}