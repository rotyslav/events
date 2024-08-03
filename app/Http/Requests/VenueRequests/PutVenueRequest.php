<?php

namespace App\Http\Requests\VenueRequests;

use App\DataTransferObjects\Interfaces\RequestInterfaceDTO;
use App\DataTransferObjects\VenueRequestDTO\PutVenueDTO;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\LaravelData\Data;

class PutVenueRequest extends FormRequest implements RequestInterfaceDTO
{
    public function rules(): array
    {
        return [
            'id'   => ['required', 'integer', 'exists:venues,id'],
            'name' => ['required', 'string', 'max:255', 'min:3'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function getDTO(): PutVenueDTO
    {
        return PutVenueDTO::from($this->all());
    }
}
