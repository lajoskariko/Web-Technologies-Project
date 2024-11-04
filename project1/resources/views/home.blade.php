@extends('layouts.app')

@section('content')
<div class="hero">
    <h1>Welcome to MusicLibrary</h1>
    <p>Your daily dose of awesome music</p>
    <a href="{{ route('library') }}" class="btn">Explore Now</a>
</div>
@endsection