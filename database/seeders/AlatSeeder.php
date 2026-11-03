<?php

namespace Database\Seeders;

use App\Models\Alat;
use Illuminate\Database\Seeder;

class AlatSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['LAB-001', 'Komputer Desktop i5', 'Komputer', 30, 'baik', 8500000, '2024-01-15'],
            ['LAB-002', 'Monitor 24 inci', 'Monitor', 30, 'baik', 1800000, '2024-01-15'],
            ['LAB-003', 'Switch 24 Port', 'Jaringan', 3, 'baik', 2500000, '2023-08-20'],
            ['LAB-004', 'Router Mikrotik', 'Jaringan', 4, 'perbaikan', 1200000, '2023-08-20'],
            ['LAB-005', 'Proyektor', 'Presentasi', 2, 'rusak', 6500000, '2022-03-10'],
            ['LAB-006', 'Keyboard USB', 'Periferal', 35, 'baik', 150000, '2024-01-15'],
            ['LAB-007', 'Mouse USB', 'Periferal', 35, 'baik', 90000, '2024-01-15'],
            ['LAB-008', 'Printer Laser', 'Periferal', 2, 'perbaikan', 3200000, '2022-11-05'],
            ['LAB-009', 'Kabel UTP (roll)', 'Jaringan', 5, 'baik', 950000, '2024-02-01'],
            ['LAB-010', 'Laptop Demo <b>Dosen</b>', 'Komputer', 1, 'baik', 12000000, '2025-05-12'],
        ];

        foreach ($data as [$kode, $nama, $kategori, $jumlah, $kondisi, $harga, $tanggal]) {
            Alat::create([
                'kode'         => $kode,
                'nama'         => $nama,
                'kategori'     => $kategori,
                'jumlah'       => $jumlah,
                'kondisi'      => $kondisi,
                'harga'        => $harga,
                'tanggal_beli' => $tanggal,
            ]);
        }
    }
}
