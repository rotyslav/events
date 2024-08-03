@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Air Temperature: {{ $weather->airTemperature }}</h3>
        <br>
        <h3>Humidity: {{ $weather->airHumidity }}</h3>
        <br>
        <h3>Cloud Cover: {{ $weather->cloudCover }}</h3>
        <br>
        <h3>Wind Speed: {{ $weather->windSpeed }}</h3>
        <br>
    </div>
@endsection