<?php

namespace Database\Factories;

use App\Models\Competences;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Competences>
 */
class CompetencesFactory extends Factory
{
    protected $model = Competences::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'competence'=>$this->faker->unique->word        
        ];
    }
}
