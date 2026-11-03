<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $waktu = ['created_at' => now(), 'updated_at' => now()];
        DB::table('dosen')->insert([
            'nidn' => '0401018801',
            'nama' => 'Aris Rismayana',
            'email' => 'aris@contoh.ac.id',
        ] + $waktu);

        for ($i = 0; $i < 5; $i++) {
            DB::table('dosen')->insert([
                'nidn' => fake()->unique()->numerify('04########'),
                'nama' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
            ] + $waktu);
        }
    }
}
