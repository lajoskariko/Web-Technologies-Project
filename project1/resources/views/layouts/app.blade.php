<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music Library</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar">
        @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
        @endif
        <div class="logo">
            <a href="{{ route('home') }}">Music<span>Library</span></a>
        </div>
        <ul class="nav-links">
            <li><a href="{{ route('library') }}">Library</a></li>
            <li><a href="{{ route('search') }}">Search</a></li>
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <div class="audio-player">
        <div class="controls">
            <button id="prev-btn">⏮</button>
            <button id="play-btn">▶️</button>
            <button id="next-btn">⏭</button>
        </div>
        <div class="track-info">
            <span id="track-title">No track selected</span>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>