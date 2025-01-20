<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'PHP',
                'slug' => 'php',
                'description' => 'Explore articles and tutorials about PHP programming.',
                'meta_title' => 'PHP Articles & Tutorials',
                'meta_description' => 'Learn about PHP development, best practices, and modern techniques.',
                'meta_keywords' => 'PHP, backend development, web programming',
            ],
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
                'description' => 'Dive into Laravel, the powerful PHP framework.',
                'meta_title' => 'Laravel Framework Insights',
                'meta_description' => 'Tips, tricks, and tutorials for mastering the Laravel framework.',
                'meta_keywords' => 'Laravel, PHP framework, web development',
            ],
            [
                'name' => 'Python',
                'slug' => 'python',
                'description' => 'Discover the power of Python programming.',
                'meta_title' => 'Python Programming Tutorials',
                'meta_description' => 'Learn Python programming for data science, web development, and more.',
                'meta_keywords' => 'Python, programming, data science, machine learning',
            ],
            [
                'name' => 'Other',
                'slug' => 'other',
                'description' => 'Miscellaneous topics and discussions.',
                'meta_title' => 'Other Articles',
                'meta_description' => 'Explore a variety of topics that don’t fit into other categories.',
                'meta_keywords' => 'miscellaneous, general topics',
            ],
            [
                'name' => 'Open Source',
                'slug' => 'open-source',
                'description' => 'Everything about open source projects and contributions.',
                'meta_title' => 'Open Source Contributions',
                'meta_description' => 'Learn about open source projects, tools, and how to contribute.',
                'meta_keywords' => 'open source, contributions, free software',
            ],
            [
                'name' => 'Game Development',
                'slug' => 'game-development',
                'description' => 'Insights into the exciting world of game development.',
                'meta_title' => 'Game Development Tips',
                'meta_description' => 'Learn about game engines, design, programming, and more.',
                'meta_keywords' => 'game development, game engines, Unity, Unreal',
            ],
            [
                'name' => 'Machine Learning',
                'slug' => 'machine-learning',
                'description' => 'Explore the fascinating field of machine learning.',
                'meta_title' => 'Machine Learning Tutorials',
                'meta_description' => 'Learn about AI, data modeling, and machine learning algorithms.',
                'meta_keywords' => 'machine learning, AI, artificial intelligence, data science',
            ],
            [
                'name' => 'Binary Analysis',
                'slug' => 'binary-analysis',
                'description' => 'Learn about reverse engineering and binary analysis techniques.',
                'meta_title' => 'Binary Analysis & Reverse Engineering',
                'meta_description' => 'Explore tools and techniques for binary analysis and reverse engineering.',
                'meta_keywords' => 'binary analysis, reverse engineering, low-level programming',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
