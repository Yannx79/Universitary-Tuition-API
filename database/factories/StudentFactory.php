<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'career' => fake()->randomElement(['Systems Engineering', 'Industrial Engineering', 'Medicine', 'Administration']),
            'faculty' => fake()->randomElement(['Engineering and Architecture', 'Medicine']),
            'people_id' => Person::all()->random()->id,
        ];
    }
}
