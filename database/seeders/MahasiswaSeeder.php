<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $waktu = [
            'created_at' => now(),
            'updated_at' => now()
        ];

        $prodiIds = DB::table('prodi')
            ->orderBy('id')
            ->pluck('id')
            ->all();

        $dosenIds = DB::table('dosen')
            ->orderBy('id')
            ->pluck('id')
            ->all();

        DB::table('mahasiswa')->insert([
            'nim' => 'D112411049',
            'nama' => 'Cahyadi Suherman',
            'angkatan' => 2024,
            'prodi_id' => $prodiIds[0],
            'dosen_wali_id' => $dosenIds[0],
        ] + $waktu);

        for ($i = 2; $i <= 30; $i++) {
            DB::table('mahasiswa')->insert([
                'nim' => '2024' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'nama' => fake()->name(),
                'angkatan' => 2024,
                'prodi_id' => fake()->randomElement($prodiIds),
                'dosen_wali_id' => fake()->randomElement($dosenIds),
            ] + $waktu);
        }
    }
}
