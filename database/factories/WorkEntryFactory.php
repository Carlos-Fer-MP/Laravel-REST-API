<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkEntry>
 */
class WorkEntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'id' => $this->faker->uuid(),
            'userId' => $this->faker->uuid(),
            'startDate' => $this->faker->date('Y-m-d'),
            'endDate' => $this->faker->date('Y-m-d'),


        ];
    }
}
