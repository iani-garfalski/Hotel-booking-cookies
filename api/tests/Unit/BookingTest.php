<?php

namespace Tests\Unit;

use App\Models\Booking;
use App\Models\Room;
use App\Models\Customer;
use App\Models\Payment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
class BookingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_booking_belongs_to_a_room(): void
    {
        $room = Room::factory()->create();
        $booking = Booking::factory()->create(['room_id' => $room->id]);

        $this->assertInstanceOf(Room::class, $booking->room);
        $this->assertEquals($room->id, $booking->room->id);
    }

    /** @test */
    public function a_booking_belongs_to_a_customer(): void
    {
        $customer = Customer::factory()->create();
        $booking = Booking::factory()->create(['customer_id' => $customer->id]);

        $this->assertInstanceOf(Customer::class, $booking->customer);
        $this->assertEquals($customer->id, $booking->customer->id);
    }

    /** @test */
    public function a_booking_can_have_many_payments(): void
    {
        $booking = Booking::factory()->create();
        $payment1 = Payment::factory()->create(['booking_id' => $booking->id]);
        $payment2 = Payment::factory()->create(['booking_id' => $booking->id]);

        $this->assertTrue($booking->payments->contains($payment1));
        $this->assertTrue($booking->payments->contains($payment2));
        $this->assertEquals(2, $booking->payments->count());
    }
}