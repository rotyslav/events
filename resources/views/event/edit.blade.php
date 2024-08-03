@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('event.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $event->name }}">
                    <br>
                    <label class="form-label">Date</label>
                    <input type="date" name="date" class="form-control" value="{{ $event->date }}">
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
                    <input type="submit" class="btn btn-primary" value="Update">
                    <input type="hidden" name="id" value="{{ $event->id }}">
                </form>
                <form action="{{ route('event.delete', ['id' => $event->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <br>
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
                @include('layouts.errors')
            </div>
            <div class="col">
                <img src="{{ Storage::url($event->poster) }}" alt="Poster">
            </div>
        </div>
@endsection