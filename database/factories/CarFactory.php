<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand' => $this->faker->randomElement(['Alfa Romeo', 'Audi', 'BMW', 'Ford', 'Fiat', 'Kia' ]),
            'model' => $this->faker->word(),
            'year' => $this->faker->numberBetween(1990, 2023),
            'max_speed' => $this->faker->numberBetween(160, 260),
            'is_automatic' => $this->faker->boolean(),
            'engine' => $this->faker->randomElement(['petrol', 'diesel', 'hybrid', 'electric']),
            'number_of_doors' => $this->faker->randomElement([3, 5])
        ];
    }
}
