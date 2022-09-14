<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CovidStatistic>
 */
class CovidStatisticFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return  [
            'confirmed' => rand(0, 99999),
            'recovered' => rand(0, 99999),
            'deaths' =>  rand(0, 99999),
            'country' => [
                'en' => $this->faker->sentence($nbWords = 7, $variableNbWords = true),
                'ka' => $this->faker->sentence($nbWords = 7, $variableNbWords = true),
            ],
        ];
    }
}
