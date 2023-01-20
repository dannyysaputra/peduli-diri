<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker as faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Journey>
 */
class JourneyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'tanggal' => $this->faker->dateTimeBetween('-2 year', 'now'),
            'jam' => $this->faker->time(),
            'lokasi' => $this->faker->streetAddress(),
            'suhu' => $this->faker->numberBetween(32, 36)
        ];
    }
}
