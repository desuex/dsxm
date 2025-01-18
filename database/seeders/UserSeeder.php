<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create(['permissions' => 0]); // No permissions
        User::factory()->create(['permissions' => 4]); // Read only
        User::factory()->create(['permissions' => 6]); // Read and write
        User::factory()->create(['permissions' => 7]); // Full permissions
    }
}
