<?php

declare(strict_types=1);

namespace App\Clients;

use App\Dto\ReserveDto;

interface ClientInterface
{
    public function getShows(): array;

    public function getShowEvents(int $showId): array;

    public function getEventPlaces(int $eventId): array;

    public function reservePlaces(ReserveDto $dto): array;
}
