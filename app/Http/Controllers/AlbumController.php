<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index(Request $request)
    {
        $query = Album::with('singer');

        if ($request->has('sort')) {
            $query->orderBy('title', $request->sort);
        }

        if ($request->has('singer_id')) {
            $query->where('singer_id', $request->singer_id);
        }

        $albums = $query->paginate(6);
        return response()->json($albums);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'rating' => 'required|integer|min:1|max:10',
            'number_of_songs' => 'required|integer|min:1',
            'singer_id' => 'required|exists:singers,id'
        ]);

        $album = Album::create($validated);
        return response()->json($album->load('singer'));
    }

    public function update(Request $request, Album $album)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'rating' => 'required|integer|min:1|max:10',
            'number_of_songs' => 'required|integer|min:1',
            'singer_id' => 'required|exists:singers,id'
        ]);

        $album->update($validated);
        return response()->json($album->load('singer'));
    }

    public function destroy(Album $album)
    {
        $album->delete();
        return response()->json(['message' => 'Álbum eliminado']);
    }
}