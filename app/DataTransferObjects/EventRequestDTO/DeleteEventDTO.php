<?php

namespace App\DataTransferObjects\EventRequestDTO;

use Spatie\LaravelData\Data;

class DeleteEventDTO extends Data
{
    public int $id;
}