<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dtaxt>
 */
class DtaxtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'details' => $this->faker->text(),
            'age' => $this->faker->numberBetween(18, 65),
            'city' => $this->faker->city()
        ];
    }
}
