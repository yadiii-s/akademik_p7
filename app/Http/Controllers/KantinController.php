<?php

namespace App\Http\Controllers;

class KantinController extends Controller
{
    private function dataMenu(): array
    {
        return [
            [
                'nama' => 'Nasi Goreng Spesial',
                'kategori' => 'Makanan',
                'harga' => 18000,
                'stok' => 12
            ],
            [
                'nama' => 'Mie Ayam Bakso',
                'kategori' => 'Makanan',
                'harga' => 15000,
                'stok' => 0
            ],
            [
                'nama' => 'Es Teh Manis',
                'kategori' => 'Minuman',
                'harga' => 5000,
                'stok' => 40
            ],
            [
                'nama' => 'Kopi Susu Gula Aren',
                'kategori' => 'Minuman',
                'harga' => 14000,
                'stok' => 3
            ],
            [
                'nama' => 'Pisang Goreng Keju',
                'kategori' => 'Camilan',
                'harga' => 10000,
                'stok' => 8
            ],
            [
                'nama' => 'Roti Bakar <b>Coklat</b>',
                'kategori' => 'Camilan',
                'harga' => 12000,
                'stok' => 0
            ],
        ];
    }

    private function tampilkan(array $menu)
    {
        return view('kantin.index', [
            'menu' => $menu,
            'total' => count($menu),
            'habis' => collect($menu)->where('stok', 0)->count(),
        ]);
    }

    public function index()
    {
        return $this->tampilkan($this->dataMenu());
    }

    public function kosong()
    {
        return $this->tampilkan([]);
    }

    public function tentang()
    {
        return view('kantin.tentang');
    }
}
