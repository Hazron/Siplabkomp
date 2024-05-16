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
            'nim' => 'F1E121162', 
            'nomor_hp' => '089627459153',
            'angkatan' => '2021',
            'program_studi' => 'Sistem Informasi',
            'fotoprofile' => 'tes',
            'kelas' => 'R005'
        ]);
        User::factory()->create([
            'usertype' => 'admin',
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'password' => 'admin',
            'nim' => 'F1E1211421', 
            'nomor_hp' => '089627459144',
            'angkatan' => '2021',
            'program_studi' => 'Sistem Informasi',
            'fotoprofile' => 'tes',
            'kelas' => 'R005'
        ]);
        User::factory()->create([
            'usertype' => 'superadmin',
            'name' => 'superadmin',
            'email' => 'super@gmail.com',
            'password' => 'super',
            'nim' => 'F1E1211618', 
            'nomor_hp' => '0896274591123',
            'angkatan' => '2021',
            'program_studi' => 'Sistem Informasi',
            'fotoprofile' => 'tes',
            'kelas' => 'R005'
        ]);
    }
}
