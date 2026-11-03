<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use Illuminate\Http\Request;

class LabController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');
        $kategori = $request->query('kategori');
        $kondisi = $request->query('kondisi');

        $query = Alat::orderBy('kode');

        if ($q) {
            $query->where('nama', 'like', "%{$q}%");
        }
        if ($kategori) {
            $query->where('kategori', $kategori);
        }
        if ($kondisi) {
            $query->where('kondisi', $kondisi);
        }

        $alats = $query->get();
        $daftarKategori = Alat::orderBy('kategori')->distinct()->pluck('kategori');

        $semua = Alat::orderBy('kode')->get();

        $ringkasan = [
            'Jenis alat'      => Alat::count(),
            'Total unit'      => Alat::sum('jumlah'),
            'Nilai aset'      => 'Rp ' . number_format(
                $semua->sum(fn($a) => $a->jumlah * $a->harga),
                0,
                ',',
                '.'
            ),
            'Rata-rata harga' => 'Rp ' . number_format(Alat::avg('harga'), 0, ',', '.'),
        ];

        $termahal = Alat::orderByDesc('harga')->first();
        $perKondisi = $semua->groupBy('kondisi')->map->count();

        return view('lab.index', compact(
            'alats',
            'q',
            'kategori',
            'kondisi',
            'daftarKategori',
            'ringkasan',
            'termahal',
            'perKondisi'
        ));
    }

    public function show(Alat $alat)
    {
        return view('lab.show', compact('alat'));
    }
}
