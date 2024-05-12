<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Docent>
 */
class DocentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contract_type' => fake()->randomElement(['Contract for work', 'Fixed-term employment contract', 'Indefinite-term employment contract', 
            'Apprenticeship contract', 'Temporary contract']),
            'people_id' => Person::all()->random()->id
        ];
    }
}
