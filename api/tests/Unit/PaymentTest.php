<?php

namespace Tests\Unit;

use App\Models\Payment;
use App\Models\Booking;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaymentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_payment_belongs_to_a_booking(): void
    {
        $booking = Booking::factory()->create();
        $payment = Payment::factory()->create(['booking_id' => $booking->id]);

        $this->assertInstanceOf(Booking::class, $payment->booking);
        $this->assertEquals($booking->id, $payment->booking->id);
    }
}