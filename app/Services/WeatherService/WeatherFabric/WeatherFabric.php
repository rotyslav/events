<?php

namespace App\Services\WeatherService\WeatherFabric;

use App\Services\WeatherService\Data\Weather;

class WeatherFabric implements WeatherFabricInterface
{
    public function createWeather(string $weatherJson): Weather
    {
        $data = json_decode($weatherJson)->hours[0];

        return new Weather(
            airTemperature: $data->airTemperature->noaa,
            airHumidity: $data->humidity->noaa,
            windSpeed: $data->windSpeed->noaa,
            cloudCover: $data->cloudCover->noaa,
        );
    }
}