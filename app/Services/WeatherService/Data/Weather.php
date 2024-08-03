<?php

namespace App\Services\WeatherService\Data;

use Spatie\LaravelData\Data;

class Weather extends Data
{
    public function __construct(
        public string $airTemperature,
        public string $airHumidity,
        public string $windSpeed,
        public string $cloudCover,
    ) {
    }
}