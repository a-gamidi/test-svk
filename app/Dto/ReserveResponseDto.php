<?php

declare(strict_types=1);

namespace App\Dto;

class ReserveResponseDto
{
    public function __construct(
        public readonly bool $success,
        public readonly string $reservationId,
    )
    {
    }
}
