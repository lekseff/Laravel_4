<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Fakecar;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new Fakecar($this->faker));
        $v = $this->faker->vehicleArray();

        return [
            'brand' => $v['brand'],
            'model' => $v['model'],
            'price' => fake()->numberBetween(1_000_000, 5_000_000),
        ];
    }
}
