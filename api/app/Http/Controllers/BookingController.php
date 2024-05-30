<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use App\Http\Resources\BookingResource;
use App\Events\BookingCreated;
use App\Events\BookingCanceled;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with(['room', 'customer', 'payments'])->get();
        return BookingResource::collection($bookings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingRequest $request)
    {
        $booking = Booking::create($request->validated());
        event(new BookingCreated($booking));
        return new BookingResource($booking);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $booking = Booking::find($id);

        if (is_null($booking)) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        return new BookingResource($booking);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);

        if ($booking) {
            // Fire the canceled event
            event(new BookingCanceled($booking));

            $booking->delete();
            return response()->json(['message' => 'Booking canceled successfully'], 200);
        }

        return response()->json(['message' => 'Booking not found'], 404);
    }
}
