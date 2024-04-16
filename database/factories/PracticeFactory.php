<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Practice>
 */
class PracticeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'logo' => $this->faker->numberBetween(1, 10),
            'website_url' => $this->faker->url(),
        ];
    }
}
