<?php

namespace App\Http\Requests\VenueRequests;

use App\DataTransferObjects\EventRequestDTO\GetEventDTO;
use App\DataTransferObjects\Interfaces\RequestInterfaceDTO;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\LaravelData\Data;

class GetVenueRequest extends FormRequest implements RequestInterfaceDTO
{
    public function rules(): array
    {
        return [
            'id' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function getDTO(): GetEventDTO
    {
        return GetEventDTO::from($this->all());
    }
}
