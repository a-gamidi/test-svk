<?php

namespace App\Http\Controllers;

use App\Dto\ReserveDto;
use App\Http\Requests\ReserveRequest;
use App\Http\Resources\EventPlacesResource;
use App\Http\Resources\ReserveResponseResource;
use App\Services\EventService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EventController extends Controller
{
    public function __construct(
        private EventService $service
    )
    {
    }

    public function places(int $eventId): AnonymousResourceCollection
    {
        $places = $this->service->getPlacesById($eventId);

        return EventPlacesResource::collection($places);
    }

    public function reserve(int $eventId, ReserveRequest $request): ReserveResponseResource
    {
        $response = $this->service->reserveEventPlaces(
            new ReserveDto(
                eventId: $eventId,
                places: $request->input('places'),
                name: $request->input('name')
            )
        );

        return ReserveResponseResource::make($response);
    }
}
