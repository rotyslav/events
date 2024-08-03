<?php

namespace App\DataTransferObjects\VenueRequestDTO;

use Spatie\LaravelData\Data;

class PutVenueDTO extends Data
{
    public int $id;
    public string $name;
}