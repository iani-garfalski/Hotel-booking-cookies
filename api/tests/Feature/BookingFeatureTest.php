<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Customer;

class BookingFeatureTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_get_all_bookings()
    {
        Booking::factory()->count(5)->create();

        $response = $this->getJson('/api/bookings');

        $response->assertStatus(200)
                 ->assertJsonCount(5, 'data');
    }
}
