@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{$event->name}}</h1>
                <br>
                <h2>Date: {{ $event->date }}</h2>
                <br>
                <h2>Venue: {{ $event->venue->name }}</h2>
            </div>
            <div class="col">
                <img src="{{ Storage::url($event->poster) }}" alt="Poster">
            </div>
        </div>
    </div>
@endsection