<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'artist_id' => \App\Models\Artist::factory(),
            'description' => fake()->sentence(),
            'cover' => 'test.jpg',
            'release_date' => fake()->date(),
        ];
    }
}
