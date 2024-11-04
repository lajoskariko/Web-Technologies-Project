@extends('layouts.app')

@section('content')
<h2>Music Library</h2>
<div class="music-grid">
    @foreach($songs as $song)
    <div class="song-card" data-src="{{ asset('music/' . $song->file) }}" data-title="{{ $song->title }}" data-artist="{{ $song->artist }}">
        <img src="{{ asset('images/covers/' . $song->cover_image) }}" alt="{{ $song->title }}">
        <h3>{{ $song->title }}</h3>
        <p>{{ $song->artist }}</p>
    </div>
    @endforeach
</div>
@endsection