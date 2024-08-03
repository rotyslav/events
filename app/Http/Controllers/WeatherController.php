<?php

namespace App\Http\Controllers;

use App\Services\WeatherService\WeatherService;
use Illuminate\Http\Client\ConnectionException;

class WeatherController extends Controller
{
    public function __construct(
        readonly private WeatherService $service
    ) {
    }

    /**
     * @throws ConnectionException
     */
    public function index()
    {
        $weather = $this->service->getWeather();

        return view('weather.index', ['weather' => $weather]);
    }
}
