@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
    <h1>Tambah Mahasiswa</h1>

    <form class="formulir" method="POST" action="/mahasiswa">
        @csrf

        <div>
            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim">
        </div>
        <div>
            <label for="nama">Nama lengkap</label>
            <input type="text" id="nama" name="nama">
        </div>
        <div>
            <label for="angkatan">Angkatan</label>
            <input type="text" id="angkatan" name="angkatan">
        </div>
        <div>
            <label for="prodi_id">Program studi</label>
            <select id="prodi_id" name="prodi_id">
                <option value="">-- pilih --</option>
                @foreach ($prodis as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="dosen_wali_id">Dosen wali (boleh kosong)</label>
            <select id="dosen_wali_id" name="dosen_wali_id">
                <option value="">-- belum ditentukan --</option>
                @foreach ($dosens as $d)
                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Simpan</button>
        <a href="/mahasiswa">Batal</a>
    </form>
@endsection
