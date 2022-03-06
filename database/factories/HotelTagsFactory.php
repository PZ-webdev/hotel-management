<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HotelTagsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_room' => rand(1, Room::count()),
            'id_tags' => rand(1, Tag::count()),
        ];
    }
}
