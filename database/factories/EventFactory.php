<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        return [
            'name'     => $this->faker->word(),
            'date'     => Carbon::now(),
            'poster'   => 'public/posters/default.png',
            'venue_id' => Venue::pluck('id')->random(),
        ];
    }
}
