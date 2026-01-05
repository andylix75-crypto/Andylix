<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artisan>
 */
class ArtisanFactory extends Factory
{
    protected $model = \App\Models\Artisan::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'mantra' => fake()->sentence(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'is_available' => fake()->boolean(),
            'is_week_end' => fake()->boolean(),
            'is_feries' => fake()->boolean(),
            'is_ugrent' => fake()->boolean(),
        ];
    }
}
