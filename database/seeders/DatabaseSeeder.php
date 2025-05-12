<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Admin::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('password'), // Use bcrypt for hashing
        ]);

         // Create default test user
         User::factory()->testUser()->create();

    }
}
