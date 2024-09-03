<?php

declare(strict_types=1);

namespace App\Dto;

class ReserveDto
{
    public function __construct(
        public readonly int $eventId,
        public readonly array $places,
        public readonly string $name
    )
    {
    }
}
