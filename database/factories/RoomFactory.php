<?php

namespace Database\Factories;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
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
            'description' => $this->faker->text($maxNbChars = 1000),
            'room_type' => rand(1, RoomType::count()),
            'room_fee' => $this->faker->numberBetween($min = 150, $max = 800),
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }
}
