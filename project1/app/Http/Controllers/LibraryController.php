<?php

namespace App\Http\Controllers;

use App\Models\Song;

class LibraryController extends Controller
{
    public function libraryView()
    {
        $songs = Song::all();
        return view('library', compact('songs'));
    }
}