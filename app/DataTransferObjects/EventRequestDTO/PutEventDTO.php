<?php

namespace App\DataTransferObjects\EventRequestDTO;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class PutEventDTO extends Data
{
    public int $id;
    public string $name;
    public string $date;
    public UploadedFile $poster;
    public int $venueId;
}