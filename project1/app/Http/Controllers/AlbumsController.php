<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumsController extends Controller
{
    public function albumView()
    {
        $albums = Album::paginate(10);
        return view('album', compact('albums'));
    }
}
