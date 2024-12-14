<?php

namespace App\Http\Controllers;

use App\Models\Song;

class LibraryController extends Controller
{
    public function libraryView()
    {
        $songs = Song::paginate(20);
        return view('library', compact('songs'));
    }
}