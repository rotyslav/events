@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Create Venue</h1>
        <form action="{{ route('venue.store') }}">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control">
            <br>
            <input type="submit" class="btn btn-primary">
        </form>
        @include('layouts.errors')
    </div>
@endsection