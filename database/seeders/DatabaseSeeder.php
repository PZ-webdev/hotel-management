<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(200)->create();
        \App\Models\RoomType::factory(5)->create();
        \App\Models\Room::factory(30)->create();
        \App\Models\Tag::factory(5)->create();
        \App\Models\HotelTags::factory(500)->create();
        \App\Models\Rating::factory(2000)->create();
        \App\Models\Reservation::factory(1000)->create();
    }
}
