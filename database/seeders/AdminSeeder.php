<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Str;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);
    }
}
