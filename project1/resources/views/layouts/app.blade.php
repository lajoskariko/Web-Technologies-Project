<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            @isset($slot)
                <main>
                    {{ $slot }}
                </main>
            @endisset
            <footer>
                <!-- Music Player initially hidden -->
                <div class="music-player" id="music-player" style="display: none; transform: translateY(100%); transition: transform 0.5s ease-in-out;">
                    <div class="music-info">
                        <img id="player-cover" src="{{ asset('image/placeholder.png') }}" alt="Album Art">
                        <div class="music-details">
                            <span id="player-title" class="music-title">Song Title</span>
                            <span id="player-artist" class="music-artist">Artist Name</span>
                        </div>
                    </div>
                    <div class="player-controls">
                        <div class="button-container">
                            <button id="play-pause-btn" onclick="togglePlayPause()">
                                <i class="fas fa-pause"></i>
                            </button>
                        </div>
                        <div class="progress-container">
                            <div class="progress-bar" id="progress-bar">
                            </div>
                        </div>
                        <div class="volume-container">
                            <i class="fas fa-volume-up"></i>
                            <input type="range" id="volume-slider" min="0" max="1" step="0.01" value="0.05">
                        </div>
                    <audio id="audio-player" src=""></audio>
                </div>
            
                <script>
                    const audioPlayer = document.getElementById('audio-player');
                    const playPauseButton = document.getElementById('play-pause-btn');
                    const playerTitle = document.getElementById('player-title');
                    const playerArtist = document.getElementById('player-artist');
                    const playerCover = document.getElementById('player-cover');
                    const musicPlayer = document.getElementById('music-player');
                    const progressBar = document.getElementById('progress-bar');
                    const volumeSlider = document.getElementById('volume-slider');
            
                    const songCards = document.querySelectorAll('.song-card');
                    songCards.forEach(card => {
                        card.addEventListener('click', () => {
                            const src = card.getAttribute('data-src');
                            const title = card.getAttribute('data-title');
                            const artist = card.getAttribute('data-artist');
                            const cover = card.getAttribute('data-cover');
            
                            if (!audioPlayer.paused) {
                                audioPlayer.play();
                            }
            
                            audioPlayer.src = src;
                            playerTitle.textContent = title;
                            playerArtist.textContent = artist;
                            playerCover.src = cover;
            
                            // Show and slide in the music player
                            musicPlayer.style.display = 'flex';
                            setTimeout(() => {
                                musicPlayer.style.transform = 'translateY(0)';
                            }, 10);
            
                            audioPlayer.play();
                            playPauseButton.innerHTML = pauseIcon;
                        });
                    });
            
                    audioPlayer.addEventListener('timeupdate', () => {
                        const progress = (audioPlayer.currentTime / audioPlayer.duration) * 100;
                        progressBar.style.width = `${progress}%`;
                    });
            
                    volumeSlider.addEventListener('input', () => {
                        audioPlayer.volume = volumeSlider.value;
                    });
            
                    function togglePlayPause() {
                        const playIcon = '<i class="fas fa-play"></i>';
                        const pauseIcon = '<i class="fas fa-pause"></i>';
                        if (audioPlayer.paused) {
                            audioPlayer.play();
                            playPauseButton.innerHTML = pauseIcon; // Switch to pause icon
                        } else {
                            audioPlayer.pause();
                            playPauseButton.innerHTML = playIcon; // Switch to play icon
                        }
                    }
                </script>
            </footer>           
        </div>        
    </body>
</html>
