@extends('welcome')
@section('containt')
    <a href="{{ route('albums.show', $album->id) }}" class="btn btn-primary " style="margin:10px;">Album name :
        {{ $album->name }}</a>
    <div>
        <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-primary  "style="width:120px;">Edit Album</a>
        <a href="{{ route('albums.create-photo', $album->id) }}" class="btn btn-primary g-1 " style="width:120px;">add photo</a>
        <form action="{{ route('albums.delete', ['album' => $album]) }}" method="POST" style="margin-top:5px;">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger mb-3">Delete Album</button>

        </form>
    </div>
    @if ($album->pictures->count() > 0)
        @foreach ($album->pictures as $picture)
            <div class="col-md-4">

                <div class="card " style="width: 18rem;">
                    <img src="{{ $picture->image_url }}" class="card-img-top" wstyle="width: 18rem;">

                </div>
            </div>
        @endforeach
    @else
        <p>No photos in this album.</p>
    @endif
@endsection
