<?php

declare(strict_types=1);

namespace App\Dto;

class PlaceDto
{
    public function __construct(
        public readonly int $id,
        public readonly int $x,
        public readonly int $y,
        public readonly int $width,
        public readonly int $height,
        public readonly bool $isAvailable
    )
    {
    }
}
