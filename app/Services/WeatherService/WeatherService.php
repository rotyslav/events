<?php

namespace App\Services\WeatherService;

use App\Services\WeatherService\Data\Weather;
use App\Services\WeatherService\WeatherFabric\WeatherFabricInterface;
use DateTime;
use DateTimeZone;
use Exception;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Stevebauman\Location\Facades\Location;

readonly class WeatherService
{
    public function __construct(
        private WeatherFabricInterface $weatherFabric,
    ) {
    }

    /**
     * @throws Exception
     */
    public function getWeather(): Weather
    {
        $weatherJson = Cache::get('weather');
        if (!$weatherJson) {
            $weatherJson = $this->sendRequest();
            Cache::put('weather', $weatherJson, now()->addMinutes(15));
        }

        return $this->weatherFabric->createWeather($weatherJson);

    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function sendRequest(): Response
    {
        $time        = new DateTime('now'.' 10:00:00', new DateTimeZone('UTC'));
        $apiKey      = '93b912e8-504e-11ef-aa85-0242ac130004-93b914be-504e-11ef-aa85-0242ac130004';
        $apiEndPoint = 'https://api.stormglass.io/v2/weather/point';
        $params      = ['airTemperature', 'cloudCover', 'windSpeed', 'humidity'];
        $location    = Location::get('66.102.0.0');

        $response = Http::withHeaders([
            'Authorization' => $apiKey,
        ])->withQueryParameters([
            'lat'    => $location->latitude,
            'lng'    => $location->longitude,
            'params' => implode(',', $params),
            'start'  => $time->getTimestamp(),
            'end'    => $time->getTimestamp(),
            'source' => 'noaa',
        ])->get($apiEndPoint);

        return $response;
    }

    public function getIp()
    {
        return Cache::get(Auth::id());
    }
}