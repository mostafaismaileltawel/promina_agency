
@extends('welcome')

@section('containt')

<form action="{{ route('albums.update', ['album' => $album]) }}" form class="row g-3"   method="POST">
    @csrf
    @method('PUT')
    <label for="name">Album Name:</label>
    <input type="text" name="name" value="{{ $album->name }}" class="form-control form-control-lg">
<div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Update</button>
  </div>
  </form>
   {{--  <form action="{{ route('albums.add-photo', ['album' => $album]) }}" form class="row g-3"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            {{--  <label for="photo">Photo:</label>  --}}
                            {{--  <input type="file" name="photo" accept="image/*">  --}}
                            {{--  <div>
                                <label for="formFileLg" class="form-label">Chose image</label>
                                <input class="form-control form-control-lg" name="photo" type="file" accept="image/*" >
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">Upload Photo</button>
                            </div>
                        </form>    --}}
@endsection