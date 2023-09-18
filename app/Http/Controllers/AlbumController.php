<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Picture;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function all_album(Album $album)
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }
    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $album = new Album();
        $album->name = $request->input('name');
        $album->save();

        return redirect()->route('albums.index', ['album' => $album]);
    }

    public function show(Album $album)
    {
        return view('albums.show', compact('album'));
    }

    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

    public function update(Request $request, Album $album)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $album->name = $request->input('name');
        $album->save();

        return redirect()->route('albums.show', ['album' => $album]);
    }

    public function destroy(Album $album)
    {
        if ($album->pictures()->count() > 0) {
            $albums = Album::all();
            return view('albums.delete', ['album' => $album, 'albums' => $albums]);
        }

        $album->delete();

        return redirect()->route('albums.index');
    }

    public function deletePhotos(Album $album)
    {
        $album->pictures()->delete();

        return redirect()->route('albums.index');
    }

    public function movePhotos(Request $request, Album $album, Picture $picture)
    {
        $newAlbum = Album::find($request->input('album_id'));
        foreach ($album->pictures as $picture) {
            if ($newAlbum->id == $picture->album_id) {
                return redirect()->route('albums.index')->with('error', 'you can not chose the same album it will delete');

            } else {
                $album->pictures()->update(['album_id' => $newAlbum->id]);

            }
        }
        return redirect()->route('albums.index');
    }

    public function addPhoto(Request $request, Album $album)
    {
        $request->validate([
            'photos' => "required|array",
            'photos.*' => 'image|max:2048',
            // Assuming photo size limit is 2MB
        ]);

//     $photo = new Picture();
//      $path=$request->file('photo')->store('upload','public');
// $photo->name =$path;
//     $photo->album_id= $album->id;
//     $photo->save();
        $photos = $request->file('photos');
        dd($photos);
        foreach ($photos as $photo) {
            $path = $photo->store('upload', 'public');

            $picture = new Picture();
            $picture->name = $path;
            $picture->album_id = $album->id;
            $picture->save();
        }
        return redirect()->route('albums.index', compact('album'));

    }
    public function createphoto(Album $album)
    {
        return view('albums.create-photo', compact('album'));
    }
}
