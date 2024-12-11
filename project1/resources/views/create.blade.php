<x-app-layout>
    <body>
            <form action="/submit-music" method="post" enctype="multipart/form-data">
                    <h1 class='create-header'>Create a song!</h1>
                    <div class='create-center'>
                        <label for="title" class='create-label'>Title:</label>
                        <input type="text" id="title" name="title" class='create-title'required>
                    </div>

                    <div class='create-center'>
                        <label for="artist" class='create-label'>Artist:</label>
                        <input type="text" id="artist" name="artist" class='create-artist' required>
                    </div>

                    <div class='create-center'>
                        <label for="album" class='create-label'>Album:</label>
                        <input type="text" id="album" name="album" class='create-album' required>
                    </div>

                    <div class='create-center'>
                        <label for="release-date" class='create-label'>Release Date:</label>
                        <input type="date" id="release-date" name="release_date" class='create-release' required>
                    </div>

                    <div class='create-center'>
                        <label for="picture" class='create-label-picture'>Upload Picture:</label>
                        <input type="file" id="picture" name="picture" accept="image/*" class='create-image'required>
                    </div>
                    <div class='create-center'>
                        <button type="submit" class='create-submit'>Submit</button>
                    </div>
            </form>
    </body>
</x-app-layout>