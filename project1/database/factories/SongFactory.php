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
    protected $model = \App\Models\Song::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),          // Random 3-word song title
            'artist' => $this->faker->name(),             // Random artist name
            'album' => $this->faker->sentence(2),         // Random 2-word album name
            'release_date' => $this->faker->date(),               // Random year
        ];
    }
}
