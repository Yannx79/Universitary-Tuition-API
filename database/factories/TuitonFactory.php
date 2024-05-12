<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tuiton>
 */
class TuitonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'grade' => fake()->text(30),
            'tuiton_date' => fake()->date(),
            'student_id' => null,
            //'student_id' => fake()->randomElement(Student::all()->id),
        ];
    }
}
