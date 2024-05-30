<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use App\Events\BookingCreated;

class NotifyStaffOfCreatedBooking
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\BookingCreated  $event
     * @return void
     */
    public function handle(BookingCreated $event)
    {
        $booking = $event->booking;

        // Logic to notify hotel staff about the new booking
        Log::info("New booking created: Room {$booking->room->number} has been booked by {$booking->customer->name} from {$booking->check_in_date} to {$booking->check_out_date}");

        // Here you can send an actual notification, like an email or a push notification
    }
}
