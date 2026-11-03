<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Ukm;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UkmSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['UKM-01', 'Robotika dan IoT', 'Akademik', 2018],
            ['UKM-02', 'Paduan Suara Mahasiswa', 'Seni', 2015],
            ['UKM-03', 'Futsal', 'Olahraga', 2012],
            ['UKM-04', 'Basket', 'Olahraga', 2013],
            ['UKM-05', 'Kewirausahaan', 'Akademik', 2019],
            ['UKM-06', 'Teater Kampus', 'Seni', 2016],
            ['UKM-07', 'Bakti Sosial', 'Sosial', 2014],
            ['UKM-08', 'Fotografi dan Film', 'Seni', 2017],
        ];

        foreach ($data as [$kode, $nama, $kategori, $tahun]) {
            Ukm::create([
                'kode'          => $kode,
                'nama'          => $nama,
                'kategori'      => $kategori,
                'tahun_berdiri' => $tahun,
            ]);
        }

        // Keanggotaan dengan aturan tetap berdasarkan id mahasiswa (N)
        foreach (Mahasiswa::orderBy('id')->get() as $mhs) {
            $n = $mhs->id;

            $nomor = [(($n - 1) % 8) + 1];
            if ($n % 3 !== 0) {
                $nomor[] = (($n * 3) % 8) + 1;
            }
            if ($n % 5 === 0) {
                $nomor[] = (($n * 5) % 8) + 1;
            }
            $nomor = array_unique($nomor);

            $tanggal = Carbon::create(2024, 9, 1)->addDays($n * 7)->toDateString();

            foreach ($nomor as $urutan => $ukmId) {
                $mhs->ukm()->attach($ukmId, [
                    'jabatan'        => ($urutan === 0 && $n <= 8) ? 'ketua' : 'anggota',
                    'bergabung_pada' => $tanggal,
                ]);
            }
        }
    }
}
