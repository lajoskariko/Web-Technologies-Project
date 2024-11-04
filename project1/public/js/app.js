document.addEventListener('DOMContentLoaded', () => {
    const playBtn = document.getElementById('play-btn');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const trackTitle = document.getElementById('track-title');
    const songCards = document.querySelectorAll('.song-card');

    let audio = new Audio();
    let currentTrackIndex = 0;
    let tracks = [];

    songCards.forEach((card) => {
        tracks.push({
            src: card.getAttribute('data-src'),
            title: card.getAttribute('data-title'),
            artist: card.getAttribute('data-artist')
        });

        card.addEventListener('click', () => {
            currentTrackIndex = tracks.findIndex(track => track.src === card.getAttribute('data-src'));
            playTrack();
        });
    });

    function playTrack() {
        const track = tracks[currentTrackIndex];
        audio.src = track.src;
        audio.play();
        trackTitle.textContent = `${track.title} - ${track.artist}`;
        playBtn.textContent = '⏸';
    }

    playBtn.addEventListener('click', () => {
        if (audio.paused) {
            audio.play();
            playBtn.textContent = '⏸';
        } else {
            audio.pause();
            playBtn.textContent = '▶️';
        }
    });

    nextBtn.addEventListener('click', () => {
        currentTrackIndex = (currentTrackIndex + 1) % tracks.length;
        playTrack();
    });

    prevBtn.addEventListener('click', () => {
        currentTrackIndex = (currentTrackIndex - 1 + tracks.length) % tracks.length;
        playTrack();
    });

    audio.addEventListener('ended', () => {
        playBtn.textContent = '▶️';
    });
});