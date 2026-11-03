<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use Illuminate\Http\Request;

class UkmController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->query('kategori');

        $ukms = Ukm::withCount('anggota')
            ->with(['anggota' => fn($rel) => $rel->wherePivot('jabatan', 'ketua')])
            ->kategori($kategori)
            ->orderBy('kode')
            ->paginate(5)
            ->withQueryString();

        $daftarKategori = Ukm::orderBy('kategori')->distinct()->pluck('kategori');

        return view('ukm.index', compact('ukms', 'kategori', 'daftarKategori'));
    }

    public function show(Ukm $ukm)
    {
        $ukm->load([
            'anggota' => fn($rel) => $rel->orderByPivot('bergabung_pada'),
            'anggota.prodi',
        ]);

        return view('ukm.show', compact('ukm'));
    }
}
