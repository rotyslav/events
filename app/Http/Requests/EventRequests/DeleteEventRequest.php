<?php

namespace App\Http\Requests\EventRequests;

use App\DataTransferObjects\EventRequestDTO\DeleteEventDTO;
use App\DataTransferObjects\Interfaces\RequestInterfaceDTO;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\LaravelData\Data;

class DeleteEventRequest extends FormRequest implements RequestInterfaceDTO
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'exists:events,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function getDTO(): DeleteEventDTO
    {
        return DeleteEventDTO::from($this->all());
    }
}
