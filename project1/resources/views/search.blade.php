<x-app-layout>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        h2, h3 {
            margin-bottom: 15px;
        }

        .search-form {
            margin-bottom: 30px;
        }

        .search-form input[type="text"] {
            width: 300px;
            padding: 8px;
            margin-right: 10px;
        }

        .search-form button {
            padding: 8px 16px;
            background: #3490dc;
            border: none;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
        }

        .search-form button:hover {
            background: #2779bd;
        }

        .music-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
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
                    <div class="song-card"
                         data-src="{{ asset('music/' . $song->file) }}"
                         data-title="{{ $song->title }}"
                         data-artist="{{ $song->artist }}"
                         data-cover="{{ asset('images/covers/' . $song->cover_image) }}">
                        <img src="{{ asset('images/covers/' . $song->cover_image) }}" alt="{{ $song->title }}">
                        <h3>{{ $song->title }}</h3>
                        <p>{{ $song->artist }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    @endif
</x-app-layout>