<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roomTypes = array('Jednoosobowe', 'Dwuosobowe', 'Trzyosobowe', 'Rodzinny', 'Ze Zwierzętami', 'Dla niepełnosprawnych');

        foreach ($roomTypes as $item) {
            RoomType::create([
                'name' => $item,
                'slug' => Str::slug($item),
                'surface' => '25',
                'description' => 'Opis kategorii pokoju',
                'check_in' => '14:00:00',
                'check_out' => '10:00:00',
            ]);
        }
    }
}
