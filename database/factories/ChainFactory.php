<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Chain;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChainFactory extends Factory
{
    protected $model = Chain::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->words(3, true),
            'slug' => $this->faker->unique()->slug,
            'category_id' => Category::factory(),
            'short_description' => $this->faker->paragraph,
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->paragraph,
            'meta_keywords' => implode(', ', $this->faker->words(5)),
            'canonical_url' => $this->faker->url,
        ];
    }
}
