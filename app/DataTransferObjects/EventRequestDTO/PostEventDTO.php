<?php

namespace App\DataTransferObjects\EventRequestDTO;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class PostEventDTO extends Data
{
    public string $name;
    public string $date;
    public UploadedFile $poster;
    public int $venueId;
}