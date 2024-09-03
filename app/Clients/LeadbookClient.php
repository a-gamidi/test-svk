<?php

declare(strict_types=1);

namespace App\Clients;

use App\Dto\ReserveDto;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class LeadbookClient implements ClientInterface
{
    public function __construct(private PendingRequest $request)
    {
        $this->request = Http::withToken('Bearer ' . config('client.leadbook.bearer_token'))
            ->baseUrl(config('client.leadbook.base_uri'));
    }

    /**
     * @throws ConnectionException
     */
    public function getShows(): array
    {
        $response = $this->request->get('/shows')->json();

        return $response['response'];
    }

    /**
     * @throws ConnectionException
     */
    public function getShowEvents(int $showId): array
    {
        $response = $this->request->get("/shows/$showId/events")->json();

        return $response['response'];
    }

    /**
     * @throws ConnectionException
     */
    public function getEventPlaces(int $eventId): array
    {
        $response = $this->request->get("/events/$eventId/places")->json();

        return $response['response'];
    }

    /**
     * @throws ConnectionException
     */
    public function reservePlaces(ReserveDto $dto): array
    {
        $response = $this->request->asForm()->post("/events/$dto->eventId/reserve", [
            'places' => $dto->places,
            'name' => $dto->name
        ])->json();

        return $response['response'];
    }
}
