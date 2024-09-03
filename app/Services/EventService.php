<?php

declare(strict_types=1);

namespace App\Services;

use App\Clients\ClientInterface;
use App\Dto\PlaceDto;
use App\Dto\ReserveDto;
use App\Dto\ReserveResponseDto;

class EventService
{
    public function __construct(
        private ClientInterface $client
    )
    {
    }

    public function getPlacesById(int $eventId): array
    {
        $places = $this->client->getEventPlaces($eventId);

        $result = [];
        foreach ($places as $place) {
            $result[] = new PlaceDto(
                id: $place['id'],
                x: $place['x'],
                y: $place['y'],
                width: $place['width'],
                height: $place['height'],
                isAvailable: (bool)$place['is_available']
            );
        }

        return $result;
    }

    public function reserveEventPlaces(ReserveDto $dto): ReserveResponseDto
    {
        $response = $this->client->reservePlaces($dto);

        return new ReserveResponseDto(
            success: (bool)$response['success'],
            reservationId: $response['reservation_id']
        );
    }
}
