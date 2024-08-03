<?php

namespace App\Http\Requests\VenueRequests;

use App\DataTransferObjects\Interfaces\RequestInterfaceDTO;
use App\DataTransferObjects\VenueRequestDTO\DeleteVenueDTO;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\LaravelData\Data;

class DeleteVenueRequest extends FormRequest implements RequestInterfaceDTO
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'exists:venues,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function getDTO(): DeleteVenueDTO
    {
        return DeleteVenueDTO::from($this->all());
    }
}
