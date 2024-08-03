@extends('layouts.app')
@section('content')
    <div class="container" style="width: 600px;">
        <form action="{{ route('venue.update') }}" method="post">
            @csrf
            @method('PUT')
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ $venue->name }}" class="form-control">
            <br>
            <input type="submit" class="btn btn-primary" value="Update">
            <input type="hidden" name="id" value="{{ $venue->id }}">
        </form>
        <form action="{{ route('venue.delete') }}" method="post">
            @csrf
            @method('DELETE')
            <br>
            <input type="submit" class="btn btn-danger" value="Delete">
            <input type="hidden" name="id" value="{{ $venue->id }}">
        </form>
    </div>
@endsection