<?php

namespace App\Services;

use App\DataTransferObjects\EventRequestDTO\DeleteEventDTO;
use App\DataTransferObjects\EventRequestDTO\GetEventDTO;
use App\DataTransferObjects\EventRequestDTO\PostEventDTO;
use App\DataTransferObjects\EventRequestDTO\PutEventDTO;
use App\Models\Event;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class EventService
{
    public function createEvent(PostEventDTO $dto): void
    {
        Event::create([
            'name'     => $dto->name,
            'date'     => $dto->date,
            'poster'   => $this->createPoster($dto->poster),
            'venue_id' => $dto->venueId,
        ]);
    }

    private function createPoster(UploadedFile $poster): string
    {
        $posterPath = $poster->store('public/posters');
        $poster     = Image::read(Storage::path($posterPath));
        $size       = 800;
        if ($poster->width() > $size || $poster->height() > $size) {
            $width  = $poster->width() <= $size ? $poster->width() : $size;
            $height = $poster->height() <= $size ? $poster->height() : $size;
            $poster->crop($width, $height, position: 'center');
        }
        $poster->save(Storage::path($posterPath));

        return $posterPath;
    }

    public function updateEvent(PutEventDTO $dto): void
    {
        $event = $this->findById($dto->id);
        $event->update([
            'name'     => $dto->name,
            'date'     => $dto->date,
            'venue_id' => $dto->venueId,
        ]);
        if (isset($dto->poster)) {
            $event->poster = $this->createPoster($dto->poster);
        }
        $event->save();
    }

    public function getEvent(GetEventDTO $dto): Event
    {
        return $this->findById($dto->id);
    }

    public function deleteEvent(DeleteEventDTO $dto): void
    {
        $this->findById($dto->id)->delete();
    }

    private function findById(string $id): Event
    {
        return Event::findOrFail($id);
    }
}