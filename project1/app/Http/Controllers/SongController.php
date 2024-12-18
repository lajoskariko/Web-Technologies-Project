<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::all();
        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file_path' => 'required',
            'cover_path' => 'required',
        ]);

        Song::create($request->all());
        return redirect()->route('songs.index')
                         ->with('success', 'Song created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        return view('songs.show', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        return view('songs.edit', compact('song'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        $request->validate([
            'title' => 'required',
            'file_path' => 'required',
            'cover_path' => 'required',
        ]);

        $song->update($request->all());
        return redirect()->route('songs.index')
                         ->with('success', 'Song updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        $song->delete();
        return redirect()->route('songs.index')
                         ->with('success', 'Song deleted successfully.');
    }
}