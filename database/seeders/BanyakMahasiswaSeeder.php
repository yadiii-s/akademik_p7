<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BanyakMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $waktu = ['created_at' => now(), 'updated_at' => now()];
        $prodiIds = DB::table('prodis')->orderBy('id')->pluck('id')->all();
        // 100.000 baris tambahan, dimasukkan per 1.000 baris agar cepat
        for ($batch = 0; $batch < 100; $batch++) {
            $baris = [];
            for ($i = 0; $i < 1000; $i++) {
                $no = $batch * 1000 + $i;
                $baris[] = [
                    'nim' => '99' . str_pad($no, 6, '0', STR_PAD_LEFT),
                    'nama' => fake()->name(),
                    'angkatan' => fake()->numberBetween(2018, 2025),
                    'prodi_id' => fake()->randomElement($prodiIds),
                ] + $waktu;
            }
            DB::table('mahasiswas')->insert($baris);
        }

        DB::table('mahasiswas')->insert([
            'nim' => '99999999',
            'nama' => 'Zulkifli Paling Akhir',
            'angkatan' => 2025,
            'prodi_id' => $prodiIds[0],
        ] + $waktu);
    }
}
