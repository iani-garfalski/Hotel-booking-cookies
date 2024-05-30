<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'room_id' => $this->room_id,
            'customer_id' => $this->customer_id,
            'check_in_date' => $this->check_in_date,
            'check_out_date' => $this->check_out_date,
            'total_price' => $this->total_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'room' => new RoomResource($this->whenLoaded('room')),
            'customer' => new CustomerResource($this->whenLoaded('customer')),
            'payments' => PaymentResource::collection($this->whenLoaded('payments')),
        ];
    }
}
