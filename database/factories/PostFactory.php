<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Chain;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->unique()->slug,
            'publication_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'preview' => $this->faker->paragraph, // Markdown text
            'text' => $this->faker->realTextBetween(500, 2000),
            'is_published' => $this->faker->boolean(80), // 80% chance of being published
            'views_count' => $this->faker->numberBetween(0, 1000),
            'category_id' => Category::factory(),
            'chain_id' => $this->faker->boolean(50) ? Chain::factory() : null, // 50% chance of having a chain
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->paragraph,
            'meta_keywords' => implode(', ', $this->faker->words(5)),
            'canonical_url' => $this->faker->url,
        ];
    }
}
