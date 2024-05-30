<?php

namespace Tests\Unit;

use App\Models\Customer;
use App\Models\Booking;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_customer_can_have_many_bookings(): void
    {
        $customer = Customer::factory()->create();
        $booking1 = Booking::factory()->create(['customer_id' => $customer->id]);
        $booking2 = Booking::factory()->create(['customer_id' => $customer->id]);

        $this->assertTrue($customer->bookings->contains($booking1));
        $this->assertTrue($customer->bookings->contains($booking2));
        $this->assertEquals(2, $customer->bookings->count());
    }
}
