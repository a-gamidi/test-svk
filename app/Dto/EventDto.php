<?php

declare(strict_types=1);

namespace App\Dto;

class EventDto
{
    public function __construct(
        public readonly int $id,
        public readonly int $showId,
        public readonly string $date
    )
    {
    }
}
