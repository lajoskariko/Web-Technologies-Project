@extends('layouts.app')

@section('content')
<h2>Search Music</h2>
<form action="{{ route('search.results') }}" method="GET" class="search-form">
    <input type="text" name="query" placeholder="Search for songs, artists, or albums..." required>
    <button type="submit">Search</button>
</form>

@if(isset($songs))
    <h3>Search Results for "{{ request()->input('query') }}"</h3>
    @if($songs->isEmpty())
        <p>No results found.</p>
    @else
        <div class="music-grid">
            @foreach($songs as $song)
            <div class="song-card" data-src="{{ asset('music/' . $song->file) }}" data-title="{{ $song->title }}" data-artist="{{ $song->artist }}">
                <img src="{{ asset('images/covers/' . $song->cover_image) }}" alt="{{ $song->title }}">
                <h3>{{ $song->title }}</h3>
                <p>{{ $song->artist }}</p>
            </div>
            @endforeach
        </div>
    @endif
@endif
@endsection
