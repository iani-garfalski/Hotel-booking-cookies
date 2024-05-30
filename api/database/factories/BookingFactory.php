<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Room;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_id' => Room::factory(),
            'customer_id' => Customer::factory(),
            'check_in_date' => $this->faker->dateTimeBetween('+0 days', '+1 month'),
            'check_out_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'total_price' => $this->faker->randomFloat(2, 100, 1000),
        ];
    }
}
