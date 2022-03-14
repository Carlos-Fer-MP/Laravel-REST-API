<?php

namespace App\Http\resources;

use Illuminate\Http\resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class UserResource extends JsonResource
{
    #[ArrayShape(['data' => "array"])] public function toArray($request): array
    {
        // Map Domain User model values
        return [
            'data' => [
                'name' => $this->name()->value(),
                'email' => $this->email()->value(),
                'emailVerifiedDate' => $this->emailVerifiedDate()->value(),
            ]
        ];
    }
}
