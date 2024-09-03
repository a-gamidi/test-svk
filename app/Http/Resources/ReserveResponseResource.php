<?php

namespace App\Http\Resources;

use App\Dto\ReserveResponseDto;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin ReserveResponseDto
 */
class ReserveResponseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'success' => $this->success,
            'reservation_id' => $this->reservationId
        ];
    }
}
