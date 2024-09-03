<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\ShowEventResource;
use App\Http\Resources\ShowIndexResource;
use App\Services\ShowService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ShowController extends Controller
{
    public function __construct(
        private ShowService $service
    )
    {
    }

    public function index(): AnonymousResourceCollection
    {
        $shows = $this->service->index();

        return ShowIndexResource::collection($shows);
    }

    public function events(int $showId): AnonymousResourceCollection
    {
        $events = $this->service->getEventsById($showId);

        return ShowEventResource::collection($events);
    }
}
