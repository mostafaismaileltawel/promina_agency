@extends('welcome')
@section('containt')
    <form action="{{ route('albums.add-photo', $album->id) }}" form class="row g-3" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div>
            <label  class="form-label">Chose image</label>
            {{--  <input class="form-control form-control-lg" name="photo" type="file" accept="image/*">  --}}
              <input type="file" class="filepond" name="photos[]"  multiple >
           <div>
               @error('photos')
              <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Upload Photo</button>
        </div>
    </form>
@endsection
