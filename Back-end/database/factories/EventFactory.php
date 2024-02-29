<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'name' => fake()->sentence(3),
            'description' => fake()->paragraph(2),
            'start_date' => fake()->dateTime('now', '+3 days'),
            'end_date' => fake()->dateTime('+3 days', '+1 month'),
        ];
    }
}
