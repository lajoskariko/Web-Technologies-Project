<x-app-layout>
    @foreach ($songs as $song)
    <h2>{{ $song->title }}</h2>
    <p>{{ $song->file_path }}</p>
    <p>{{ $song->cover_path }}</p>
    <a href="{{ route('trackeditor.show', $song->id) }}">View</a>
    <a href="{{ route('trackeditor.edit', $song->id) }}">Edit</a>
    <form action="{{ route('trackeditor.destroy', $song->id) }}" method="trackeditor">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endforeach
</x-app-layout>