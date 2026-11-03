<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        fake()->seed(2026);

        $this->call([
            ProdiSeeder::class,
            DosenSeeder::class,
            MahasiswaSeeder::class,
            MataKuliahSeeder::class,
            NilaiSeeder::class,
            UkmSeeder::class,
        ]);
    }
}
