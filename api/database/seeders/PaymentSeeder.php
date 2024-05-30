<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment::create([
            'booking_id' => 1,
            'amount' => 400,
            'payment_date' => '2024-06-01',
            'status' => 'completed',
        ]);

        Payment::create([
            'booking_id' => 2,
            'amount' => 750,
            'payment_date' => '2024-06-10',
            'status' => 'completed',
        ]);

        Payment::create([
            'booking_id' => 3,
            'amount' => 700,
            'payment_date' => '2024-07-01',
            'status' => 'pending',
        ]);
    }
}