<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NilaiSeeder extends Seeder
{
    public function run(): void
    {
        $waktu = [
            'created_at' => now(),
            'updated_at' => now()
        ];

        $mhsIds = DB::table('mahasiswa')
            ->orderBy('id')
            ->pluck('id')
            ->all();

        $mkIds = DB::table('mata_kuliah')
            ->orderBy('id')
            ->pluck('id')
            ->all();

        foreach ($mhsIds as $mhsId) {
            foreach (fake()->randomElements($mkIds, 4, false) as $mkId) {
                DB::table('mahasiswa_mata_kuliah')->insert([
                    'mahasiswa_id' => $mhsId,
                    'mata_kuliah_id' => $mkId,
                    'semester' => '2026-Ganjil',
                    'nilai' => fake()->randomFloat(2, 55, 100),
                ] + $waktu);
            }
        }
    }
}
