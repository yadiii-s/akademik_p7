<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        $waktu = [
            'created_at' => now(),
            'updated_at' => now()
        ];

        $dosenIds = DB::table('dosen')
            ->orderBy('id')
            ->pluck('id')
            ->all();

        $acak = fn() => fake()->randomElement($dosenIds);

        $daftar = [
            ['TIF301', 'Pemrograman Web 2', 3, $dosenIds[0]],
            ['TIF302', 'Basis Data Lanjut', 3, $dosenIds[0]],
            ['TIF303', 'Pemrograman Berorientasi Objek', 3, $acak()],
            ['TIF304', 'Jaringan Komputer', 3, $acak()],
            ['TIF305', 'Struktur Data', 3, $acak()],
            ['TIF306', 'Matematika Diskrit', 2, $acak()],
        ];

        foreach ($daftar as [$kode, $nama, $sks, $dosenId]) {
            DB::table('mata_kuliah')->insert([
                'kode' => $kode,
                'nama' => $nama,
                'sks' => $sks,
                'dosen_id' => $dosenId,
            ] + $waktu);
        }
    }
}
