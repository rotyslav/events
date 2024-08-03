@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Create Event</h1>
        <form action="{{ route('event.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control">
            <br>
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control">
            <br>
            <label class="form-label">Venue</label>
            <select class="form-select" name="venueId">
                @foreach($venues as $venue)
                    <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                @endforeach
            </select>
            <br>
            <label class="form-label">Poster</label>
            <input type="file" name="poster" class="form-control">
            <br>
            <input type="submit" class="btn btn-primary">
        </form>
        <br>
        @include('layouts.errors')
    </div>

@endsection