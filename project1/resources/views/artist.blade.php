<x-app-layout>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        h2 {
            margin-bottom: 15px;
        }

        .music-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        .artist-card {
            width: 150px;
            text-align: center;
            cursor: pointer;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            transition: transform 0.3s;
        }

        .artist-card:hover {
            transform: scale(1.05);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .artist-card img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
            object-fit: cover;
        }

        .artist-card h3 {
            margin: 0 0 5px;
            font-size: 1rem;
        }

        .artist-card p {
            margin: 0;
            color: #555;
            font-size: 0.9rem;
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
            padding: 10px 20px;
            box-sizing: border-box;
            z-index: 999;
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

    <h2>Artists</h2>
    <div class="music-grid">
        @foreach($artists as $artist)
        {{-- TODO This is hardcoded, needs fix --}}
        <div class="artist-card" data-src="{{ asset('music/' . $artist->file) }}" data-title="{{ $artist->title }}">
            <img src="{{ asset('images/covers/' . $artist->cover_image) }}" alt="{{ $artist->title }}">
            <h3>{{ $artist->title }}</h3>
            <h3>{{ $artist->name }}</h3>
        </div>
        @endforeach
    </div>

    <div>
        {{ $artists->links() }}
    </div>

    <div class="music-player">
        <div class="music-info">
            <img id="player-cover" src="" alt="Album Art">
            <div class="music-details">
                <span class="music-title" id="player-title">No song selected</span>
                <span class="music-artist" id="player-artist"></span>
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
</x-app-layout>