<?php

namespace App\Services;

use App\DataTransferObjects\EventRequestDTO\GetEventDTO;
use App\DataTransferObjects\VenueRequestDTO\DeleteVenueDTO;
use App\DataTransferObjects\VenueRequestDTO\PostVenueDTO;
use App\DataTransferObjects\VenueRequestDTO\PutVenueDTO;
use App\Models\Venue;

class VenueService
{

    public function createVenue(PostVenueDTO $dto): void
    {
        Venue::create($dto->toArray());
    }

    public function updateVenue(PutVenueDTO $dto): void
    {
        $venue = $this->findById($dto->id);
        $venue->update($dto->toArray());
    }

    private function findById(int $id): Venue
    {
        return Venue::findOrFail($id);
    }

    public function deleteVenue(DeleteVenueDTO $dto): void
    {
        $venue = $this->findById($dto->id);
        $venue->events()->update(['venue_id' => null]);
        $venue->delete();
    }

    public function getVenue(GetEventDTO $getDTO): Venue
    {
        return $this->findById($getDTO->id);
    }
}