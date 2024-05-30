<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::create([
            'room_id' => 1,
            'customer_id' => 1,
            'check_in_date' => '2024-06-01',
            'check_out_date' => '2024-06-05',
            'total_price' => 400,
        ]);

        Booking::create([
            'room_id' => 2,
            'customer_id' => 2,
            'check_in_date' => '2024-06-10',
            'check_out_date' => '2024-06-15',
            'total_price' => 750,
        ]);

        Booking::create([
            'room_id' => 3,
            'customer_id' => 3,
            'check_in_date' => '2024-07-01',
            'check_out_date' => '2024-07-07',
            'total_price' => 1400,
        ]);
    }
}