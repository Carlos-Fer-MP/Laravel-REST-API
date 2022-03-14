<?php

namespace App\Http\resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkEntryResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'data' => [
                'startDate' => $this->startDate()->value(),
                'endDate' => $this->endDate()->value(),
            ]
        ];
    }
}
