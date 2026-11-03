<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;

class AkademikController extends Controller
{
    public function beranda()
    {
        $jumlah = [
            'Program Studi' => Prodi::count(),
            'Dosen'         => Dosen::count(),
            'Mahasiswa'     => Mahasiswa::count(),
            'Mata Kuliah'   => MataKuliah::count(),
        ];

        return view('beranda', compact('jumlah'));
    }



    public function dosen()
    {
        $dosens = Dosen::orderBy('nama')->get();

        return view('dosen.index', compact('dosens'));
    }

    public function prodi()
    {
        $prodis = Prodi::withCount('mahasiswa')->orderBy('kode')->get();

        return view('prodi.index', compact('prodis'));
    }

    public function mahasiswa(Request $request)
    {
        $q = $request->query('q');
        $prodiId = $request->query('prodi');

        $mahasiswas = Mahasiswa::with('prodi')
            ->denganNilai()
            ->cari($q)
            ->diProdi($prodiId)
            ->orderBy('nim')
            ->paginate(10)
            ->withQueryString();

        $prodis = Prodi::orderBy('kode')->get();

        return view('mahasiswa.index', compact('mahasiswas', 'prodis', 'q', 'prodiId'));
    }

    public function mahasiswaShow(Mahasiswa $mahasiswa)
    {
        $mahasiswa->load(['prodi', 'dosenWali', 'mataKuliah.dosen', 'ukm']);
        return view('mahasiswa.show', compact('mahasiswa'));
    }



    public function matkul()
    {
        $matkuls = MataKuliah::with('dosen')->denganPeserta()->orderBy('kode')->get();

        $ringkasan = [
            'Mata Kuliah'   => $matkuls->count(),
            'Total SKS'     => $matkuls->sum('sks'),
            'Total Peserta' => $matkuls->sum('mahasiswa_count'),
        ];

        $perDosen = $matkuls
            ->groupBy(fn($mk) => $mk->dosen->nama)
            ->map(fn($kelompok) => [
                'jumlah' => $kelompok->count(),
                'sks'    => $kelompok->sum('sks'),
            ]);

        return view('matkul.index', compact('matkuls', 'ringkasan', 'perDosen'));
    }

    public function matkulShow(MataKuliah $matkul)
    {
        $matkul->load([
            'dosen',
            'mahasiswa' => fn($rel) => $rel->orderByPivot('nilai', 'desc'),
        ]);

        $peserta = $matkul->mahasiswa;
        $distribusi = $peserta->countBy(fn($m) => $m->pivot->huruf)->sortKeys();

        return view('matkul.show', compact('matkul', 'peserta', 'distribusi'));
    }

    public function peringkat()
    {
        $mahasiswas = Mahasiswa::with('prodi')
            ->denganNilai()
            ->orderByDesc('rata_nilai')
            ->take(10)
            ->get();

        return view('peringkat', compact('mahasiswas'));
    }
}
