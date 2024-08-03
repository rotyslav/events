<?php

namespace App\Http\Requests\EventRequests;

use App\DataTransferObjects\EventRequestDTO\PutEventDTO;
use App\DataTransferObjects\Interfaces\RequestInterfaceDTO;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\LaravelData\Data;

class PutEventRequest extends FormRequest implements RequestInterfaceDTO
{
    public function rules(): array
    {
        return [
            'id'      => ['required'],
            'name'    => ['required', 'string'],
            'date'    => ['required', 'date'],
            'poster'  => ['nullable', 'image',],
            'venueId' => ['required', 'string', 'exists:venues,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function getDTO(): PutEventDTO
    {
        return PutEventDTO::from($this->all());
    }
}
