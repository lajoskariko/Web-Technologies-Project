<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

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

        // Search logic with joins
        $songs = Song::with(['artist', 'album'])
            ->where('title', 'LIKE', "%{$query}%")
            ->orWhereHas('artist', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('album', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->get();

        // Return JSON response for AJAX
        return response()->json([
            'songs' => $songs->map(function ($song) {
                return [
                    'title' => $song->title,
                    'artist' => $song->artist->name,
                    'album' => $song->album->name,
                    'cover_image' => asset('storage/' . $song->cover_path),
                    'file_path' => asset('storage/' . $song->file_path),
                ];
            }),
        ]);
    }
}