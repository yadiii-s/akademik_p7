@extends('layouts.app')
@section('title', $ukm->nama)

@section('content')
    <h1>{{ $ukm->nama }}</h1>
    <p>{{ $ukm->kode }} · {{ $ukm->kategori }} · berdiri {{ $ukm->tahun_berdiri }}</p>

    <h2>Anggota ({{ $ukm->anggota->count() }})</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Jabatan</th>
                <th>Bergabung</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ukm->anggota as $m)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="/mahasiswa/{{ $m->nim }}">{{ $m->nim }}</a></td>
                    <td>{{ $m->nama }}</td>
                    <td>{{ $m->prodi->nama }}</td>
                    <td>
                        <x-badge :warna="$m->pivot->jabatan == 'ketua' ? 'hijau' : 'biru'">{{ $m->pivot->jabatan }}</x-badge>
                    </td>
                    <td>{{ \Illuminate\Support\Carbon::parse($m->pivot->bergabung_pada)->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><a href="/ukm">&larr; Kembali ke daftar UKM</a></p>
@endsection
