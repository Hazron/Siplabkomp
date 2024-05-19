<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ruangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data yang ingin diisi ke tabel 'ruang'
        $ruangs = [
            ['nama_lab' => 'ICT 1'],
            ['nama_lab' => 'ICT 2'],
            ['nama_lab' => 'Komputasi Sains'],
        ];

        // Memasukkan data ke tabel menggunakan query builder
        foreach ($ruangs as $ruang) {
            DB::table('ruang')->insert($ruang);
        }
    }
}
