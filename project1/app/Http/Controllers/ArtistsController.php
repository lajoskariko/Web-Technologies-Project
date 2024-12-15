<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistsController extends Controller
{
    public function artistView()
    {
        $artists = Artist::paginate(15);
        return view('artist', compact('artists'));
    }
}
