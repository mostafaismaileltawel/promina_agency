@extends('welcome')

@section('containt')
    <form action="{{ route('albums.update', ['album' => $album]) }}" form class="row g-3" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Album Name:</label>
        <input type="text" name="name" value="{{ $album->name }}" class="form-control form-control-lg">
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Update</button>
        </div>
    </form>
@endsection
