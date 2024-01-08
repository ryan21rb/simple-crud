<?php

namespace Database\Seeders;

use App\Models\mobil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        mobil::create([
            'id_mobil' => 2,
            'merek' => 'Toyota',
            'warna' => 'Blue',
            'keterangan' => 'Sedan',
        ]);
    }
}
