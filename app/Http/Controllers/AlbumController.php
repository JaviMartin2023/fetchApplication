<?php
namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Singer;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::with('singer')->get();
        return view('albums.index', compact('albums'));
    }

    public function create()
    {
        $singers = Singer::all();
        return view('albums.create', compact('singers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'singer_id' => 'required|exists:singers,id',
            'year' => 'required|integer',
            'number_of_songs' => 'required|integer',
            'rating' => 'required|numeric|min:0|max:10',
        ]);

        $album = Album::create($request->all());
        return redirect()->route('albums.index');
    }

    public function edit($id)
    {
        $album = Album::find($id);
        $singers = Singer::all();
        return view('albums.edit', compact('album', 'singers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'singer_id' => 'required|exists:singers,id',
            'year' => 'required|integer',
            'number_of_songs' => 'required|integer',
            'rating' => 'required|numeric|min:0|max:10',
        ]);

        $album = Album::find($id);
        $album->update($request->all());
        return redirect()->route('albums.index');
    }

    public function destroy($id)
    {
        Album::destroy($id);
        return redirect()->route('albums.index');
    }
}