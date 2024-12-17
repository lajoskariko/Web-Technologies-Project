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
                <!-- Music Player initially hidden -->
                <div class="music-player" id="music-player" style="display: none;">
                    <div class="music-info">
                        <img id="player-cover" src="{{ asset('image/placeholder.png') }}" alt="Album Art">
                        <div class="music-details">
                            <span id="player-title" class="music-title">Song Title</span>
                            <span id="player-artist" class="music-artist">Artist Name</span>
                        </div>
                    </div>
                    <div class="player-controls">
                        <!-- Play/Pause Toggle Button -->
                    <button id="play-pause-btn" onclick="togglePlayPause()">Play</button>
                    </div>
                    <audio id="audio-player" src=""></audio>
                </div>
            
                <script>
                    const audioPlayer = document.getElementById('audio-player');
                    const playPauseButton = document.getElementById('play-pause-btn');
                    const playerTitle = document.getElementById('player-title');
                    const playerArtist = document.getElementById('player-artist');
                    const playerCover = document.getElementById('player-cover');
                    const musicPlayer = document.getElementById('music-player'); // Reference to the player div

                    // Add event listener to each song card to handle click events
                    const songCards = document.querySelectorAll('.song-card');
                    songCards.forEach(card => {
                        card.addEventListener('click', () => {
                            const src = card.getAttribute('data-src');
                            const title = card.getAttribute('data-title');
                            const artist = card.getAttribute('data-artist');
                            const cover = card.getAttribute('data-cover');

                            // Update audio source and player details
                            audioPlayer.src = src;  // Use the full path directly
                            playerTitle.textContent = title;
                            playerArtist.textContent = artist;
                            playerCover.src = cover;

                            // Show the music player
                            musicPlayer.style.display = 'flex';

                            // Play the selected song
                            audioPlayer.play();

                            // Update the play/pause button to 'Pause'
                            playPauseButton.textContent = 'Pause';
                            console.log('Playing song:', title);
                        });
                    });

                    function togglePlayPause() {
                        if (audioPlayer.paused) {
                            console.log('Audio is paused, playing now...');
                            audioPlayer.play();
                            playPauseButton.textContent = 'Pause';  // Update button text to 'Pause'
                        } else {
                            console.log('Audio is playing, pausing now...');
                            audioPlayer.pause();
                            playPauseButton.textContent = 'Play';   // Update button text to 'Play'
                        }
                    }

                </script>
            </footer>
            <script src="{{ asset('js/app.js') }}"></script>
        </div>
        
    </body>
</html>
