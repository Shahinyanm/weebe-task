<?php

namespace App\Services;

use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class EventService
{
    /**
     * @return Collection
     */
    public function fetchEventsWithWorkshops(): Collection
    {
        return Event::with('workshops')->get();
    }

    /**
     * @return Collection
     */
    public function fetchAllEvents(): Collection
    {
        return Event::all();
    }

    /**
     * @return Builder[]|Collection
     */
    public function fetchFutureEvents(): array|Collection
    {
        return Event::query()
            ->with('workshops')
            ->whereHas('workshops', static fn($query) => $query->whereDate('start', '>', now())
            )->get();
    }
}