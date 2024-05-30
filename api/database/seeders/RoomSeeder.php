<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            'number' => '101',
            'type' => 'single',
            'price_per_night' => 100,
            'status' => 'available',
        ]);

        Room::create([
            'number' => '102',
            'type' => 'double',
            'price_per_night' => 150,
            'status' => 'available',
        ]);

        Room::create([
            'number' => '103',
            'type' => 'suite',
            'price_per_night' => 200,
            'status' => 'unavailable',
        ]);
    }
}