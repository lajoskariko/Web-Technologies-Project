<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class SearchController extends Controller
{
    public function index()
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
            ->orWhere('artist', 'LIKE', "%{$query}%")
            ->orWhere('album', 'LIKE', "%{$query}%")
            ->get();

        // Return JSON response for AJAX
        return response()->json([
            'songs' => $songs->map(function ($song) {
                return [
                    'title' => $song->title,
                    'artist' => $song->artist,
                    'cover_image' => asset('images/covers/' . $song->cover_image),
                    'file' => asset('music/' . $song->file),
                ];
            }),
        ]);
    }

}
