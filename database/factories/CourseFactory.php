<?php

namespace Database\Factories;

use App\Models\Docent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Math', 'Philosophy', 'Systemic', 'OOP']),
            'docent_id' => Docent::all()->random()->id,
        ];
    }
}
