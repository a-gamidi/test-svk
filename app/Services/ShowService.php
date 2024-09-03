<?php

declare(strict_types=1);

namespace App\Services;

use App\Clients\ClientInterface;
use App\Dto\EventDto;
use App\Dto\ShowDto;

class ShowService
{
    public function __construct(
        private ClientInterface $client
    )
    {
    }

    public function index(): array
    {
        $shows = $this->client->getShows();

        $result = [];
        foreach ($shows as $show) {
            $result[] = new ShowDto(
                id: $show['id'],
                name: $show['name']
            );
        }

        return $result;
    }

    public function getEventsById(int $showId): array
    {
        $events = $this->client->getShowEvents($showId);

        $result = [];
        foreach ($events as $event) {
            $result[] = new EventDto(
                id: $event['id'],
                showId: $event['showId'],
                date: $event['date']
            );
        }

        return $result;
    }
}
