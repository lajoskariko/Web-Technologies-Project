<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Album;
use App\Models\Artist;

class SearchController extends Controller
{
    public function searchView()
    {
        return view('search');
    }

    public function results(Request $request)
    {
        $query = $request->input('query');

        if (!$query) {
            return response()->json(['error' => 'No query provided'], 400);
        }

        // Search logic
        $songs = Song::where('title', 'LIKE', "%{$query}%")
            ->get();
        $albums = Album::where('name', 'LIKE', "%{$query}%")
            ->get();
        $artists = Artist::where('name', 'LIKE', "%{$query}%")
            ->get();

        // Return JSON response for AJAX
        return response()->json([
            'songs' => $songs->map(function ($song) {
                return [
                    'title' => $song->title,
                    'artist' => $song->artist->name,
                    'cover_image' => asset('storage/' . $song->cover_image),
                    'file' => asset('storage/' . $song->file),
                ];
            }),

            'albums' => $albums->map(function ($album) {
                return [
                    'name' => $album->name,
                    'artist' => $album->artist->name,
                    
                ];
            }),

            'artists' => $artists->map(function ($artist) {
                return [
                    'name' => $artist->name,
                ];
            }),
        ]);
    }

}
