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
        // Last five accomplishments
        $lastAccomplishments = $this->accomplishments->count() > 0 ? $this
                ->accomplishments
                ->toQuery()
                ->where(
                    'date',
                    '>=',
                    now()->subDays(5)->toDateTimeString()
                )->get() : [];
        return [
            'id' => $this->id,
            'name' => $this->name,
            'data' => [
                'accomplishment_amount' => $this->accomplishments->count()
            ],
            'accomplishments' => $lastAccomplishments,
        ];
    }
}