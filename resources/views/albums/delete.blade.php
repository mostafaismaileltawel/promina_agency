
@extends('welcome')
@section('containt')


<h2>This album is not empty. Choose an action:</h2>
 

<form action="{{ route('albums.delete-photos',$album->id) }}" class="row g-3" method="POST">
    @csrf
    @method('DELETE')
    <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Delete All Photos</button>
  </div>
</form>

 <form action="{{ route('albums.move-photos',$album->id) }}"  class="row g-3"  method="POST">
    @csrf
    <label>Move Photos To:</label>

     <select class="form-select" name="album_id">
        @foreach ($albums as $otherAlbum)
              <option value="{{ $otherAlbum->id }}">{{ $otherAlbum->name }}</option>
        @endforeach  
    </select>    
    
     <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Move photo</button>
  </div>
    </form>
   @endsection