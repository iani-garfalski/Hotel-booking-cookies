<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Check if the authenticated user exists and has the admin role
        return Auth::check() && Auth::user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'room_id' => 'required|exists:rooms,id',
            'customer_id' => 'required|exists:customers,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_price' => 'required|numeric',
        ];
    }

    protected function prepareForValidation()
    {
        $this->checkRoomAvailability();
    }

    protected function checkRoomAvailability()
    {
        $room_id = $this->input('room_id');
        $check_in_date = $this->input('check_in_date');
        $check_out_date = $this->input('check_out_date');
    
        $existingBooking = Booking::where('room_id', $room_id)
            ->where(function ($query) use ($check_in_date, $check_out_date) {
                $query->whereBetween('check_in_date', [$check_in_date, $check_out_date])
                      ->orWhereBetween('check_out_date', [$check_in_date, $check_out_date])
                      ->orWhere(function ($query) use ($check_in_date, $check_out_date) {
                          $query->where('check_in_date', '<=', $check_in_date)
                                ->where('check_out_date', '>=', $check_out_date);
                      });
            })
            ->exists();
    
        if ($existingBooking) {
            throw new \Illuminate\Validation\ValidationException(
                validator([], []), response()->json(['message' => 'The room is not available for the selected dates'], 422)
            );
        }
    }
}