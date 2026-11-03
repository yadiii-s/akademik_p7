<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function create()
    {
        $prodis = Prodi::orderBy('kode')->get();
        $dosens = Dosen::orderBy('nama')->get();

        return view('mahasiswa.create', compact('prodis', 'dosens'));
    }

    public function store(Request $request)
    {
        $mahasiswa = Mahasiswa::create($request->all());

        return redirect('/mahasiswa/' . $mahasiswa->nim);
    }
}
