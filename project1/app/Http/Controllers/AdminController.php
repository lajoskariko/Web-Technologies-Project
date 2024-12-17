<?php

namespace App\Http\Controllers;
use App\Models\Song;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminView()
    {
        return view('admin');
    }

    public function createView()
    {
        return view('create');
    }

    public function createSong(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|min:2',
            'artist' => 'required|string|min:2',
            'album' => 'required|string|min:2',
            'release_date' => 'required|date',
        ]);

        // Create the song
        $song->artist = $validated['artist'];
        $song->title = $validated['title'];
        $song->album = $validated['album'];
        $song->release_date = $validated['release_date'];
        $song->save();

        return redirect()->route('library')->with('success', 'Song created successfully!');
    }

    public function updateView($id = null)
    {
        if ($id) {
            // If an ID is provided, fetch the song to edit
            $song = Song::find($id);
            if (!$song) {
                return redirect()->route('update')->with('error', 'Song not found!');
            }
            return view('update', compact('song')); // Return only the song to be edited
        } else {
            // If no ID is provided, show all songs
            $songs = Song::all();
            return view('update', compact('songs')); // Return the list of songs
        }
    }

    public function updateSong(Request $request, $id)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|min:2',
            'artist' => 'required|string|min:2',
            'album' => 'required|string|min:2',
            'release_date' => 'required|date',
        ]);

        // Update the song
        $song = Song::find($id);
        if ($song) {
            $song->artist = $validated['artist'];
            $song->title = $validated['title'];
            $song->album = $validated['album'];
            $song->release_date = $validated['release_date'];
            $song->save();

            return redirect()->route('update')->with('success', 'Song updated successfully!');
        } else {
            return redirect()->route('update')->with('error', 'Song not found!');
        }
    }

    public function deleteView()
    {
        return view('delete');
    }
}
