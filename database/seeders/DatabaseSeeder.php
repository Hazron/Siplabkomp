<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'usertype' => 'mahasiswa',
            'name' => 'Hazron',
            'email' => 'hazron@gmail.com',
            'password' => 'hazronhazron',
        ]);
        User::factory()->create([
            'usertype' => 'admin',
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'password' => 'admin',
        ]);
    }
}
