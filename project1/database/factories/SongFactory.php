<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Artist;
use App\Models\Album;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'artist_id' => Artist::factory(),
            'album_id' => Album::factory(),
            'release_date' => fake()->date(),
            'file_path' => 'songAssets/source/placeholder.wav',
            'cover_path' => 'songAssets/images/placeholder.png',
        ];
    }
}
