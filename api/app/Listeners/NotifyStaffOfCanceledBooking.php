<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use App\Events\BookingCanceled;

class NotifyStaffOfCanceledBooking
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
     * @param  \App\Events\BookingCanceled  $event
     * @return void
     */
    public function handle(BookingCanceled $event): void
    {
        $booking = $event->booking;

        // Logic to notify hotel staff about the canceled booking
        Log::info("Booking canceled: Room {$booking->room->number} booking by {$booking->customer->name} has been canceled.");

        // Here you can send an actual notification, like an email or a push notification
    }
}
