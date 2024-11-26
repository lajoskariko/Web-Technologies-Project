@extends('layouts.app')

@section('content')
<h2>Search Music</h2>
<form id="search-form" class="search-form">
    <input type="text" id="search-query" name="query" placeholder="Search for songs, artists, or albums..." required>
    <button type="submit">Search</button>
</form>

<div id="search-results">
    <!-- Search results will be dynamically inserted here -->
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchForm = document.getElementById('search-form');
        const searchResults = document.getElementById('search-results');

        searchForm.addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            const query = document.getElementById('search-query').value;

            if (!query.trim()) {
                alert('Please enter a search term.');
                return;
            }

            // AJAX request to fetch search results
            fetch("{{ route('search.results') }}", {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest', // Identify as AJAX request
                },
                body: JSON.stringify({ query: query }),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.songs.length === 0) {
                    searchResults.innerHTML = `<p>No results found for "${query}".</p>`;
                } else {
                    let html = `<h3>Search Results for "${query}"</h3><div class="music-grid">`;

                    data.songs.forEach(song => {
                        html += `
                        <div class="song-card" data-src="${song.file}" data-title="${song.title}" data-artist="${song.artist}">
                            <img src="${song.cover_image}" alt="${song.title}">
                            <h3>${song.title}</h3>
                            <p>${song.artist}</p>
                        </div>`;
                    });

                    html += `</div>`;
                    searchResults.innerHTML = html;
                }
            })
            .catch(error => {
                console.error('Error fetching search results:', error);
                searchResults.innerHTML = '<p>An error occurred. Please try again later.</p>';
            });
        });
    });
</script>
@endsection
