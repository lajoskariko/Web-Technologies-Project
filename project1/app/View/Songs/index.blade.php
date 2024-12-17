@foreach ($songs as $song)
    <h2>{{ $song->title }}</h2>
    <p>{{ $song->file_path }}</p>
    <p>{{ $song->cover_path}}</p>
    <a href="{{ route('songs.show', $song->id) }}">View</a>
    <a href="{{ route('songs.edit', $song->id) }}">Edit</a>
    <form action="{{ route('songs.destroy', $song->id) }}" method="SONG">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endforeach