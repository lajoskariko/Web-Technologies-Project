<x-app-layout>
    <div class="update-container">
        <h1 class="admin-header">Update Songs</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <!-- Error Message -->
        @if (session('error'))
            <div class="error-message">{{ session('error') }}</div>
        @endif

        <!-- Song List -->
        @if (!isset($song))
            <h2>Select a Song to Update:</h2>
            <ul>
                @foreach ($songs as $song)
                    <li>
                        {{ $song->title }} by {{ $song->artist }}
                        <!-- Correct edit URL -->
                        <a href="{{ route('edit.song', $song->id) }}" class="update-link">Edit</a>
                    </li>
                @endforeach
            </ul>
        @else
            <!-- Song Update Form -->
            <h2>Edit Song: {{ $song->title }}</h2>
            <form action="{{ route('update.song', $song->id) }}" method="POST" class="update-form">
                @csrf
                @method('PUT')

                <!-- Title Field -->
                <label for="title">Song Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title', $song->title) }}" required>

                <!-- Artist Field -->
                <label for="artist">Artist:</label>
                <input type="text" id="artist" name="artist" value="{{ old('artist', $song->artist) }}" required>

                <!-- Album Field -->
                <label for="album">Album:</label>
                <input type="text" id="album" name="album" value="{{ old('album', $song->album) }}" required>

                <!-- Release Date Field -->
                <label for="release_date">Release Date:</label>
                <input type="date" id="release_date" name="release_date" value="{{ old('release_date', $song->release_date) }}" required>

                <!-- Submit Button -->
                <button type="submit" class="update-submit">Update Song</button>
            </form>
        @endif
    </div>
</x-app-layout>
