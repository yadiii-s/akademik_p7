<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    public function run(): void
    {
        $waktu = [
            'created_at' => now(),
            'updated_at' => now()
        ];

        DB::table('prodi')->insert([
            [
                'kode' => 'TI',
                'nama' => 'Teknik Informatika',
                'jenjang' => 'D4',
                'ketua_prodi' => 'Aris Rismayana'
            ] + $waktu,

            [
                'kode' => 'TK',
                'nama' => 'Teknik Komputer',
                'jenjang' => 'D3',
                'ketua_prodi' => null
            ] + $waktu,

            [
                'kode' => 'MI',
                'nama' => 'Manajemen Informatika',
                'jenjang' => 'D3',
                'ketua_prodi' => null
            ] + $waktu,
        ]);
    }
}
