<?php

namespace App\Http\Requests\EventRequests;

use App\DataTransferObjects\EventRequestDTO\PostEventDTO;
use App\DataTransferObjects\Interfaces\RequestInterfaceDTO;
use Illuminate\Foundation\Http\FormRequest;

class PostEventRequest extends FormRequest implements RequestInterfaceDTO
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => ['required', 'string'],
            'date'    => ['required', 'date'],
            'poster'  => ['nullable', 'image',],
            'venueId' => ['required', 'exists:venues,id'],
        ];
    }

    public function getDTO(): PostEventDTO
    {
        return PostEventDTO::from($this->all());
    }
}
