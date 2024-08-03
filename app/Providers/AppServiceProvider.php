<?php

namespace App\Providers;

use App\Services\WeatherService\Data\Weather;
use App\Services\WeatherService\WeatherFabric\WeatherFabric;
use App\Services\WeatherService\WeatherFabric\WeatherFabricInterface;
use App\Services\WeatherService\WeatherService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->when(WeatherService::class)
            ->needs(WeatherFabricInterface::class)
            ->give(function () {
                return new WeatherFabric();
            });
    }
}
