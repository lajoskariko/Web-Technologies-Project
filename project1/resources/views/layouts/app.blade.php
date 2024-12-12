<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            @isset($slot)
                <main>
                    {{ $slot }}
                </main>
            @endisset
            <footer>
                <div class="music-player">
                    <div class="music-info">
                        <img src="{{ asset('image/placeholder.png') }}" alt="Album Art">
                        <div class="music-details">
                            <span class="music-title">Song Title</span>
                            <span class="music-artist">Artist Name</span>
                        </div>
                    </div>
                    <div class="player-controls">
                        <button onclick="playAudio()">Play</button>
                        <button onclick="pauseAudio()">Pause</button>
                    </div>
                    <audio id="audio-player" src="/path/to/song.mp3"></audio>
                </div>
                
                <script>
                    const audioPlayer = document.getElementById('audio-player');
                
                    function playAudio() {
                        audioPlayer.play();
                    }
                
                    function pauseAudio() {
                        audioPlayer.pause();
                    }
                </script>
                <div class="music-player">
                    <div class="music-info">
                        <img src="{{ asset('image/placeholder.png') }}" alt="Album Art">
                        <div class="music-details">
                            <span class="music-title">Song Title</span>
                            <span class="music-artist">Artist Name</span>
                        </div>
                    </div>
                    <div class="player-controls">
                        <button onclick="playAudio()">Play</button>
                        <button onclick="pauseAudio()">Pause</button>
                    </div>
                    <audio id="audio-player" src=""></audio>
                </div>
            
                <script>
                    const audioPlayer = document.getElementById('audio-player');
                    const playerTitle = document.getElementById('player-title');
                    const playerArtist = document.getElementById('player-artist');
                    const playerCover = document.getElementById('player-cover');
            
                    const songCards = document.querySelectorAll('.song-card');
                    songCards.forEach(card => {
                        card.addEventListener('click', () => {
                            const src = card.getAttribute('data-src');
                            const title = card.getAttribute('data-title');
                            const artist = card.getAttribute('data-artist');
                            const cover = card.getAttribute('data-cover');
            
                            audioPlayer.src = src;
                            playerTitle.textContent = title;
                            playerArtist.textContent = artist;
                            playerCover.src = cover;
            
                            audioPlayer.play();
                        });
                    });
            
                    function playAudio() {
                        audioPlayer.play();
                    }
            
                    function pauseAudio() {
                        audioPlayer.pause();
                    }
                </script>    
            </footer>
        
            <script src="{{ asset('js/app.js') }}"></script>
        </div>
        
    </body>
</html>
