<x-app-layout>
<div class="update-container">
<h1 class="admin-header">Delete Songs</h1>
@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@elseif (session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif
<ul>
    @foreach ($songs as $song)
        <li>
            {{ $song->title }} by {{ $song->artist }}
            <form action="{{ route('deleteSong', $song->id) }}" method="POST">
                @csrf
                <button type="submit" class="delete-link">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
</div>
</x-app-layout>