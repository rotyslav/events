<?php

namespace App\DataTransferObjects\Interfaces;

use Spatie\LaravelData\Data;

interface RequestInterfaceDTO
{
    public function getDTO(): Data;
}