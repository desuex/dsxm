<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        $tags = Tag::factory(20)->create();

        Post::factory(50)
        ->create()
            ->each(function ($post) use ($tags) {
                $post->tags()->attach($tags->random(rand(1, 5)));
            });
    }
}
