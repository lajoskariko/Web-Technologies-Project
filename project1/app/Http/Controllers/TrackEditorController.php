<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class TrackEditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trackeditor = Song::all();
        return view('trackeditor.index', compact('trackeditor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trackeditor.create');
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
        return redirect()->route('trackeditor.index')
                         ->with('success', 'Song created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        return view('trackeditor.show', compact('trackeditor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        return view('trackeditor.edit', compact('trackeditor'));
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
        return redirect()->route('trackeditor.index')
                         ->with('success', 'Song updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        $song->delete();
        return redirect()->route('trackeditor.index')
                         ->with('success', 'Song deleted successfully.');
    }
}
