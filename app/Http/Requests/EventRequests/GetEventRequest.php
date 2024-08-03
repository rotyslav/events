<?php

namespace App\Http\Requests\EventRequests;

use App\DataTransferObjects\EventRequestDTO\GetEventDTO;
use App\DataTransferObjects\Interfaces\RequestInterfaceDTO;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\LaravelData\Data;

class GetEventRequest extends FormRequest implements RequestInterfaceDTO
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'numeric'],
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
