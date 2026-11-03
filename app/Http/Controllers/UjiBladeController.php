<?php

namespace App\Http\Controllers;

class UjiBladeController extends Controller
{
    public function index()
    {
        $data = [
            'nama' => 'Aris Rismayana',
            'nim' => '20240001',
            'ipk' => 2.7,
            'catatan' =>
            '<script>document.body.style.background="tomato"</script>Mahasiswa aktif',
            'matkul' => [
                ['nama' => 'Pemrograman Web 2', 'sks' => 3, 'nilai' => 78.73],
                ['nama' => 'Basis Data Lanjut', 'sks' => 3, 'nilai' => 68.03],
                ['nama' => 'Struktur Data', 'sks' => 3, 'nilai' => 74.48],
                ['nama' => 'Matematika Diskrit', 'sks' => 2, 'nilai' => 52.10],
            ],
            'riwayat' => ['Semester 1 selesai', 'Semester 2 selesai'],
        ];

        return view('uji-blade', $data);
    }
}
