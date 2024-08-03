@extends('layouts.app')
@section('content')
    <div class="container">
        <ul>
            <li>
                <a href="{{ route('event.index') }}">Events</a>
            </li>
            <li>
                <a href="{{ route('venue.index') }}">Venues</a>
            </li>
            <li>
                <a href="{{ route('weather') }}">Weather</a>
            </li>
        </ul>
    </div>
@endsection