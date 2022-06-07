<?php

namespace Database\Seeders;

use App\Models\HotelTags;
use App\Models\Rating;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
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
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        User::factory(200)->create();
        $this->call(RoomTypeSeeder::class);
        Room::factory(30)->create();
        $this->call(TagSeeder::class);
        HotelTags::factory(50)->create();
        Rating::factory(2000)->create();
        Reservation::factory(100)->create();
    }
}
