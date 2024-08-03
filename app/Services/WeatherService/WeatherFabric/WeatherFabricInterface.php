<?php

namespace App\Services\WeatherService\WeatherFabric;

use App\Services\WeatherService\Data\Weather;

interface WeatherFabricInterface
{
    public function createWeather(string $weatherJson): Weather;
}