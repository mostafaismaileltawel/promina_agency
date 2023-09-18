
@extends('welcome')
@section('containt')
 <form class="row g-3" action="{{ route('albums.store') }}" method="POST">
    @csrf
 
  <div >
    <label class="form-label" >Album Name : </label>
    <input type="text" class="form-control form-control-lg"  name="name">
    <div>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
  </div>
 
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">save album</button>
  </div>
</form>
@endsection
