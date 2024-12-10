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
            return redirect()->route('search')->with('error', 'Please enter a search term.');
        }

        $songs = Song::where('title', 'LIKE', "%{$query}%")
                     ->orWhere('artist', 'LIKE', "%{$query}%")
                     ->orWhere('album', 'LIKE', "%{$query}%")
                     ->get();

        return view('search', compact('songs'));
    }
}
