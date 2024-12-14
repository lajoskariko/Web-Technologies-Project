<x-app-layout>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .hero {
            text-align: center;
            padding: 50px 0;
        }

        .hero h1 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .hero p {
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            background: #3490dc;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background: #2779bd;
        }

        .music-player {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: #333;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            box-sizing: border-box;
        }

        .music-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .music-info img {
            width: 50px;
            height: 50px;
            border-radius: 5px;
            object-fit: cover;
        }

        .music-details {
            display: flex;
            flex-direction: column;
            font-size: 0.9rem;
        }

        .music-title {
            font-weight: bold;
            font-size: 1rem;
        }

        .music-artist {
            font-size: 0.8rem;
            color: #bbb;
        }

        .player-controls button {
            background: #555;
            color: #fff;
            border: none;
            padding: 8px 14px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
            margin-left: 10px;
        }

        .player-controls button:hover {
            background: #666;
        }
    </style>

    <div class="hero">
        <h1>Welcome to MusicLibrary</h1>
        <p>Your daily dose of awesome music</p>
        <a href="{{ route('library') }}" class="btn">Explore Now</a>
    </div>

    <div class="music-player">
        <div class="music-info">
            <img src="/path/to/album-art.jpg" alt="Album Art">
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
</x-app-layout>