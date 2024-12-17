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

        .song-card {
            width: 150px;
            text-align: center;
            cursor: pointer;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            transition: transform 0.3s;
        }

        .song-card:hover {
            transform: scale(1.05);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .song-card img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
            object-fit: cover;
        }

        .song-card h3 {
            margin: 0 0 5px;
            font-size: 1rem;
        }

        .song-card p {
            margin: 0;
            color: #555;
            font-size: 0.9rem;
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

    </style>

    <h2>Music Library</h2>
    <div class="music-grid">
        @foreach($songs as $song)
            <div class="song-card"
                 data-src="{{ asset('storage/' . $song->file_path) }}"
                 data-title="{{ $song->title }}"
                 data-artist="{{ $song->artist}}"
                 data-cover="{{ asset('storage/' . $song->cover_path) }}">
                <img src="{{ asset('storage/' . $song->cover_path) }}" alt="{{ $song->title }}">
                <h3>{{ $song->title }}</h3>
                <p>{{ $song->artist }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>