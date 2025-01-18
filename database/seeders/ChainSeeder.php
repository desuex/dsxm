<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Chain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            Chain::factory()->count(3)->create(['category_id' => $category->id]);
        }
    }
}
