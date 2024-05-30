<?php

namespace Tests\Unit;

use App\Models\Room;
use App\Models\Booking;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoomTest extends TestCase
{
    public function testFactoryCreatesRoom()
    {
        // Create a room using the RoomFactory
        $room = Room::factory()->create();

        // Assert that the room was created successfully
        $this->assertInstanceOf(Room::class, $room);
        $this->assertNotNull($room->id);
        // Add more assertions to check other attributes if needed
    }

    public function testFactoryCreatesBookingWithRoom()
    {
        // Create a booking with an associated room using the BookingFactory
        $booking = Booking::factory()->create();

        // Assert that the booking was created successfully
        $this->assertInstanceOf(Booking::class, $booking);
        $this->assertNotNull($booking->id);
        $this->assertInstanceOf(Room::class, $booking->room);
        // Add more assertions to check other attributes and relationships if needed
    }
}
