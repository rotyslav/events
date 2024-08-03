@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{ $venue->name }}</h1>
        <br>
        <h2>Events</h2>
        <br>
        <table class="table" id="myTable">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Details</th>
            </tr>
            </thead>
            <tbody>
            @foreach($venue->events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->date }}</td>
                    <td><a href="{{ route('event.show', ['id' => $event->id])}}">Details</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection