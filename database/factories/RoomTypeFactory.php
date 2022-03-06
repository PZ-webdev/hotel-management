<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoomType>
 */
class RoomTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence($nbWords = 2, $variableNbWords = true),
            'slug' => $this->faker->slug($nbWords = 2, $variableNbWords = true),
            'surface' => $this->faker->biasedNumberBetween($min = 10, $max = 40),
            'description' => $this->faker->text($maxNbChars = 200),
            'check_in' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'check_out' => $this->faker->time($format = 'H:i:s', $max = 'now'),
        ];
    }
}
