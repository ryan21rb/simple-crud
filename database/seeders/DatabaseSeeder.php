<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\mobil;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        mobil::create([
            'id_mobil' => 1,
            'merek' => 'Toyota',
            'warna' => 'Blue',
            'keterangan' => 'Sedan',
        ]);
    }
}
